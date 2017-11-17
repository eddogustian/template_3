<?php

class UsermenuModule extends CWebModule
{
	public function init()
	{
		// this method is called when the module is being created
		// you may place code here to customize the module or the application

		// import the module-level models and components
		$this->setImport(array(
			'usermenu.models.*',
			'usermenu.components.*',
		));
	}

	public function beforeControllerAction($controller, $action)
	{
		if(parent::beforeControllerAction($controller, $action))
		{
			// this method is called before any module controller action is performed
			// you may place customized code here
			return true;
		}
		else
			return false;
	}

	public static function t($str='',$params=array(),$dic='user') {
		if (Yii::t("UserMenuModule", $str)==$str)
		    return Yii::t("UserMenuModule.".$dic, $str, $params);
        else
            return Yii::t("UserMenuModule", $str, $params);
	}
	
}
