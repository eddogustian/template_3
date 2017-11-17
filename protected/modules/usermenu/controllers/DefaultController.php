<?php

class DefaultController extends Controller
{
	protected function beforeAction($event)
    {
		if(!Yii::app()->user->isGuest){
			// Check User Access
			if(!AppComponent::get_user_access('usermenu', 'status'))
				$this->redirect(Yii::app()->baseUrl.'/index.php/site/forbidden');
			else
				return true;
		}
		else
			$this->redirect(Yii::app()->baseUrl.'/index.php/user/login');
    }
	
	public function actionIndex()
	{
		// $this->render('index');
		$this->redirect(Yii::app()->baseUrl.'/index.php/usermenu/usermenu');
	}
}