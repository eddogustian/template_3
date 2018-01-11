<?php

class LoginController extends Controller
{
	public $defaultAction = 'login';
	public $layout = '//layouts/main_login';

	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
		if (Yii::app()->user->isGuest) {
			$model=new UserLogin;
			// collect user input data
			if(isset($_POST['UserLogin']))
			{
				$model->attributes=$_POST['UserLogin'];
				// validate user input and redirect to previous page if valid
				if($model->validate()) {
					$this->lastViset();
					Yii::app()->user->setState("message", "Login success.");
					
					if (Yii::app()->user->returnUrl=='/index.php')
						// $this->redirect(Yii::app()->controller->module->returnUrl);
						$this->redirect(Yii::app()->baseUrl.'/index.php/site');
					else
						// $this->redirect(Yii::app()->user->returnUrl);
						$this->redirect(Yii::app()->baseUrl.'/index.php/site');
				}
				else{
					Yii::app()->user->setState("error", "Username or Password is incorrect.");
				}
			}
			// display the login form
			$this->render('/user/login',array('model'=>$model));
		} else
			// $this->redirect(Yii::app()->controller->module->returnUrl);
			$this->redirect(Yii::app()->baseUrl.'/index.php/site');
	}
	
	private function lastViset() {
		$lastVisit = User::model()->notsafe()->findByPk(Yii::app()->user->id);
		$lastVisit->lastvisit = time();
		$lastVisit->save();
	}

}