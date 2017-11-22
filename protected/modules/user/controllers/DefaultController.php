<?php

class DefaultController extends Controller
{
	
	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$user = User::model()->findByPk(Yii::app()->user->id);
		if($user->profile->level != 'admin')
			$this->redirect(Yii::app()->baseUrl.'/index.php/site/forbidden');
		// else
		// 	$this->redirect(Yii::app()->baseUrl.'/index.php/user/admin');

		$dataProvider=new CActiveDataProvider('User', array(
			'criteria'=>array(
		        'condition'=>'status>'.User::STATUS_BANNED,
		    ),
			'pagination'=>array(
				'pageSize'=>Yii::app()->controller->module->user_page_size,
			),
		));

		$this->render('/user/index',array(
			'dataProvider'=>$dataProvider,
		));
	}

}