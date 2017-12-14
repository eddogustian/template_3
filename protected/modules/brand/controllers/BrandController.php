<?php

class BrandController extends RController
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';
	public $defaultAction = 'admin';
	
	protected function beforeAction($event)
    {
		// Check User Access
		if(!AppComponent::get_user_access('brand', 'status'))
			$this->redirect(Yii::app()->baseUrl.'/index.php/site/forbidden');
		else
			return true;
    }
	
	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'rights', // perform access control for CRUD operations
			// 'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		// Check User Access
		if(!AppComponent::get_user_access('brand', 'create'))
			$this->redirect(Yii::app()->baseUrl.'/index.php/site/forbidden');

		$model=new BrandMdl;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['BrandMdl']))
		{
			$model->attributes=$_POST['BrandMdl'];
			if($model->save()){
				Yii::app()->user->setState("message", Yii::app()->params['saved_successfully']);
				$this->redirect(array('admin'));
			}
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		// Check User Access
		if(!AppComponent::get_user_access('brand', 'update'))
			$this->redirect(Yii::app()->baseUrl.'/index.php/site/forbidden');
		
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['BrandMdl']))
		{
			$model->attributes=$_POST['BrandMdl'];
			if($model->save()){
				Yii::app()->user->setState("message", Yii::app()->params['updated_successfully']);
				$this->redirect(array('admin'));
			}
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		// Check User Access
		if(!AppComponent::get_user_access('brand', 'delete'))
			$this->redirect(Yii::app()->baseUrl.'/index.php/site/forbidden');
	
		// $this->loadModel($id)->delete();
		if($this->loadModel($id)->remove()->save())
			Yii::app()->user->setState("message", Yii::app()->params['deleted_successfully']);

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('BrandMdl');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new BrandMdl('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['BrandMdl']))
			$model->attributes=$_GET['BrandMdl'];
		
		if (isset($_GET['download_pdf']))
			$this->downloadPdf($model);

		if (isset($_GET['download_excel']))
			$this->downloadExcel($model);

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return BrandMdl the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=BrandMdl::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param BrandMdl $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='brand-mdl-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

    public function downloadPdf($model){
		// Check User Access
		if(!AppComponent::get_user_access('brand', 'print'))
			$this->redirect(Yii::app()->baseUrl.'/index.php/site/forbidden');
		
		$get_data = $model->downloadDataByFilter();
		$data = array();
		if (is_array($get_data)){
			foreach ($get_data as $key => $value) {
				if ($value instanceof BrandMdl){
					$user = User::model()->findByPk($value->user_created);
					$data_tmp = array(
						'brand_name'=>$value->brand_name,
						'brand_type'=>$value->brand_type,
						'time_created'=>$value->time_created != '0000-00-00 00:00:00' ? date("d/m/Y",strtotime($value->time_created)) : '-',
						'user_created'=>!empty($value->user_created) ? ucfirst($user->profile->firstname) : '-',	
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
		if(!AppComponent::get_user_access('brand', 'print'))
			$this->redirect(Yii::app()->baseUrl.'/index.php/site/forbidden');
		
		ini_set( 'memory_limit', '256M' );
		
    	$objPHPExcel = new PHPExcel();
		$objPHPExcel->getProperties()->setCreator(CHtml::encode(Yii::app()->name))
			->setLastModifiedBy(CHtml::encode(Yii::app()->name))
			->setTitle("Brand Report")
			->setSubject("Brand Report")
			->setDescription("Brand Report")
			->setKeywords("download, Brand")
			->setCategory("Download");
	
		$objPHPExcel->getActiveSheet()->setTitle('DATA BRAND');
		$worksheet = $objPHPExcel->getActiveSheet();
	
		$data = $model->downloadDataByFilter();
		
		$xlFieldName = array(
			'No',
			'Brand Name',
			'Brand Type',
			'Date Created',
			'Created By',
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
				if ($value instanceof BrandMdl){
					$no++;
					$rowId++;
					
					$user = User::model()->findByPk($value->user_created);

					$worksheet->setCellValueByColumnAndRow($colId++, $rowId, $no);
					$worksheet->setCellValueByColumnAndRow($colId++, $rowId, $value->brand_name);
					$worksheet->setCellValueByColumnAndRow($colId++, $rowId, $value->brand_type);
					$worksheet->setCellValueByColumnAndRow($colId++, $rowId, $value->time_created != '0000-00-00 00:00:00' ? date("d/m/Y",strtotime($value->time_created)) : '-');
					$worksheet->setCellValueByColumnAndRow($colId++, $rowId, !empty($value->user_created) ? ucfirst($user->profile->firstname) : '-');
				}
			}
		}
	
		$objPHPExcel->setActiveSheetIndex(0);
		$filename = 'Brand Report - '.date("YmdHis");
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
