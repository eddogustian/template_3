<?php

class AdminController extends RController
{
	public $defaultAction = 'admin';
	public $layout='//layouts/column2';
	
	private $_model;
	
	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return CMap::mergeArray(parent::filters(),array(
			'rights', // perform access control for CRUD operations
		));
	}
	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete','create','update','view','updatemyprofile'),
				'users'=>UserModule::getAdmins(),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}
	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		// Check User Access
		if(!AppComponent::get_user_access('user', 'status'))
			$this->redirect(Yii::app()->baseUrl.'/index.php/site/forbidden');

		$model=new UserMdl('search');
        $model->unsetAttributes();  // clear any default values
        if(isset($_GET['UserMdl']))
            $model->attributes=$_GET['UserMdl'];

		if (isset($_GET['download_pdf']))
			$this->downloadPdf($model);

		if (isset($_GET['download_excel']))
			$this->downloadExcel($model);

        $this->render('index',array(
            'model'=>$model,
        ));
		/*$dataProvider=new CActiveDataProvider('User', array(
			'pagination'=>array(
				'pageSize'=>Yii::app()->controller->module->user_page_size,
			),
		));

		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));//*/
	}


	/**
	 * Displays a particular model.
	 */
	public function actionView()
	{
		// Check User Access
		if(!AppComponent::get_user_access('user', 'status'))
			$this->redirect(Yii::app()->baseUrl.'/index.php/site/forbidden');

		$model = $this->loadModel();
		$this->render('view',array(
			'model'=>$model,
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		// Check User Access
		if(!AppComponent::get_user_access('user', 'create'))
			$this->redirect(Yii::app()->baseUrl.'/index.php/site/forbidden');
		
		$model=new User;
		$profile=new Profile;
		$this->performAjaxValidation(array($model,$profile));
		if(isset($_POST['User']))
		{
			$model->attributes=$_POST['User'];
			$model->activkey=Yii::app()->controller->module->encrypting(microtime().$model->password);
			$profile->attributes=$_POST['Profile'];
			$profile->user_id=0;
			if($model->validate()&&$profile->validate()) {
				$model->password=Yii::app()->controller->module->encrypting($model->password);
				if($model->save()) {
					$profile->user_id=$model->id;
					$profile->save();

					$itemname = 'Admin';
					if($profile->level == 'guest')
						$itemname = 'Guest';

					$sql = "INSERT INTO AuthAssignment (itemname, userid) VALUES ('$itemname','$model->id')";
					$command=Yii::app()->db->createCommand($sql);
					$command->execute(); // execute the non-query SQL
					
				}

				Yii::app()->user->setState("message", Yii::app()->params['saved_successfully']);
				$this->redirect(Yii::app()->baseUrl."/index.php/user/admin");

			} else $profile->validate();
		}

		$this->render('create',array(
			'model'=>$model,
			'profile'=>$profile,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionUpdate()
	{
		// Check User Access
		if(!AppComponent::get_user_access('user', 'update'))
			$this->redirect(Yii::app()->baseUrl.'/index.php/site/forbidden');
		
		$model=$this->loadModel();
		$profile=$model->profile;
		$this->performAjaxValidation(array($model,$profile));
		if(isset($_POST['User']))
		{
			$model->attributes=$_POST['User'];
			$profile->attributes=$_POST['Profile'];
			
			if($model->validate()&&$profile->validate()) {
				$old_password = User::model()->notsafe()->findByPk($model->id);
				if ($old_password->password!=$model->password) {
					$model->password=Yii::app()->controller->module->encrypting($model->password);
					$model->activkey=Yii::app()->controller->module->encrypting(microtime().$model->password);
				}
				$model->save();
				$profile->save();

				$itemname = 'Admin';
				if($profile->level == 'guest')
					$itemname = 'Guest';

				$sql = "UPDATE AuthAssignment SET itemname = '$itemname' WHERE userid = '$model->id'";
				$command=Yii::app()->db->createCommand($sql);
				$command->execute(); // execute the non-query SQL
				
				Yii::app()->user->setState("message", Yii::app()->params['updated_successfully']);
				$this->redirect(Yii::app()->baseUrl."/index.php/user/admin");

			} else $profile->validate();
		}

		$this->render('update',array(
			'model'=>$model,
			'profile'=>$profile,
		));
	}

	public function actionUpdatemyprofile()
	{
		$model=$this->loadModel();
		if(Yii::app()->user->id != $model->id)
			$this->redirect(Yii::app()->baseUrl.'/index.php/site/forbidden');

		$profile=$model->profile;
		$this->performAjaxValidation(array($model,$profile));
		if(isset($_POST['User']))
		{
			$model->attributes=$_POST['User'];
			$profile->attributes=$_POST['Profile'];
			
			if($model->validate()&&$profile->validate()) {
				$old_password = User::model()->notsafe()->findByPk($model->id);
				if ($old_password->password!=$_POST['User']['password']) {
					$model->password=Yii::app()->controller->module->encrypting($_POST['User']['password']);
					$model->activkey=Yii::app()->controller->module->encrypting(microtime().$_POST['User']['password']);
				}
				$model->save();
				$profile->save();

				Yii::app()->user->setState("message", Yii::app()->params['updated_successfully']);
				$this->redirect(Yii::app()->baseUrl."/index.php/user/user/view/id/".$model->id);

			} else $profile->validate();
		}

		$this->render('update_my_profile',array(
			'model'=>$model,
			'profile'=>$profile,
		));
	}


	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'index' page.
	 */
	public function actionDelete($id)
	{
		// Check User Access
		if(!AppComponent::get_user_access('user', 'delete'))
			$this->redirect(Yii::app()->baseUrl.'/index.php/site/forbidden');
	
		$model = $this->loadModel($id);
		$profile = Profile::model()->findByPk($id);
		
		$sql = "DELETE FROM AuthAssignment WHERE userid = '$id'";
		$command=Yii::app()->db->createCommand($sql);
		$command->execute(); // execute the non-query SQL
		
		$profile->delete();
		$model->delete();

		Yii::app()->user->setState("message", Yii::app()->params['deleted_successfully']);

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(Yii::app()->baseUrl."/index.php/user/admin");
	
	}
	
	/**
     * Performs the AJAX validation.
     * @param CModel the model to be validated
     */
    protected function performAjaxValidation($validate)
    {
        if(isset($_POST['ajax']) && $_POST['ajax']==='user-form')
        {
            echo CActiveForm::validate($validate);
            Yii::app()->end();
        }
    }
	
	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 */
	public function loadModel()
	{
		if($this->_model===null)
		{
			if(isset($_GET['id']))
				$this->_model=User::model()->notsafe()->findbyPk($_GET['id']);
			if($this->_model===null)
				throw new CHttpException(404,'The requested page does not exist.');
		}
		return $this->_model;
	}

    public function downloadPdf($model){
		// Check User Access
		if(!AppComponent::get_user_access('user', 'print'))
			$this->redirect(Yii::app()->baseUrl.'/index.php/site/forbidden');
	
		$get_data = $model->downloadDataByFilter();
		$data = array();
		if (is_array($get_data)){
			foreach ($get_data as $key => $value) {
				if ($value instanceof User){
					$data_tmp = array(
						'username'=>$value->username,
						'email'=>$value->email,
						'create_at'=>$value->create_at != '0000-00-00 00:00:00' ? date("d/m/Y",strtotime($value->create_at)) : '-',
						'lastvisit_at'=>$value->lastvisit_at != '0000-00-00 00:00:00' ? date("d/m/Y H:i:s",strtotime($value->lastvisit_at)) : '-',
						'superuser'=>$value->superuser != 0 ? 'Yes' : 'No',
						'status'=>$value->status != 0 ? 'Active' : 'Not Active',						
					);
				}
				array_push($data,$data_tmp);
			}
		}
		
		# mPDF
		// $mPDF1 = Yii::app()->ePdf->mpdf();
	
		# You can easily override default constructor's params
		$mPDF1 = Yii::app()->ePdf->mpdf('A5');
	
		# render (full page)
		$mPDF1->WriteHTML($this->renderPartial('report_pdf',array(
			'data'=>$data,
		),true));
	
		# Load a stylesheet
		// $stylesheet = file_get_contents(Yii::getPathOfAlias('webroot.css') . '/main.css');
		// $mPDF1->WriteHTML($stylesheet, 1);
	
		# renderPartial (only 'view' of current controller)
		// $mPDF1->WriteHTML($this->renderPartial('index', array(), true));
	
		# Renders image
		// $mPDF1->WriteHTML(CHtml::image(Yii::getPathOfAlias('webroot.css') . '/bg.gif' ));
	
		# Outputs ready PDF
		$mPDF1->Output();
	}
	
    public function downloadExcel($model){
		// Check User Access
		if(!AppComponent::get_user_access('user', 'print'))
			$this->redirect(Yii::app()->baseUrl.'/index.php/site/forbidden');
		
		ini_set('memory_limit', '256M');
		
    	$objPHPExcel = new PHPExcel();
		$objPHPExcel->getProperties()->setCreator(CHtml::encode(Yii::app()->name))
			->setLastModifiedBy(CHtml::encode(Yii::app()->name))
			->setTitle("User Report")
			->setSubject("User Report")
			->setDescription("User Report")
			->setKeywords("download, User")
			->setCategory("Download");
	
		$objPHPExcel->getActiveSheet()->setTitle('DATA USER');
		$worksheet = $objPHPExcel->getActiveSheet();
	
		$data = $model->downloadDataByFilter();

		$xlFieldName = array(
			'No',
			'User Name',
			'Email',
			'Registration Date',
			'Last Visit',
			'Superuser',
			'Status',
		);
	
		$colId = 0;
		$rowId = 1;
		foreach ($xlFieldName as $key => $value) {
			$worksheet->setCellValueByColumnAndRow($colId++, $rowId, $value);
		}
	
		$no = 0;
		if (is_array($data)){
			foreach ($data as $key => $value) {
				$colId = 0;
				if ($value instanceof User){
					$no++;
					$rowId++;
					
					$worksheet->setCellValueByColumnAndRow($colId++, $rowId, $no);
					$worksheet->setCellValueByColumnAndRow($colId++, $rowId, $value->username);
					$worksheet->setCellValueByColumnAndRow($colId++, $rowId, $value->email);
					$worksheet->setCellValueByColumnAndRow($colId++, $rowId, $value->create_at != '0000-00-00 00:00:00' ? date("d/m/Y",strtotime($value->create_at)) : '-');
					$worksheet->setCellValueByColumnAndRow($colId++, $rowId, $value->lastvisit_at != '0000-00-00 00:00:00' ? date("d/m/Y H:i:s",strtotime($value->lastvisit_at)) : '-');
					$worksheet->setCellValueByColumnAndRow($colId++, $rowId, $value->superuser != 0 ? 'Yes' : 'No');
					$worksheet->setCellValueByColumnAndRow($colId++, $rowId, $value->status != 0 ? 'Active' : 'Not Active');
				}
			}
		}
	
		$objPHPExcel->setActiveSheetIndex(0);
		$filename = 'User Report - '.date("YmdHis");
		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="'.$filename.'.xls"');
		header('Cache-Control: max-age=0');
		header('Cache-Control: max-age=1');
		header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
		header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
		header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
		header ('Pragma: public'); // HTTP/1.0
	
		$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
		$objWriter->save('php://output');
		Yii::app()->end();
    }
    
}