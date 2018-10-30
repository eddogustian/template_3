<?php

// change the following paths if necessary
// $yii=dirname(__FILE__).'/../yii/framework/yii.php';
$yii=dirname(__FILE__).'/../yii-1.1.19.5/framework/yii.php';
$config=dirname(__FILE__).'/protected/config/main.php';

// remove the following lines when in production mode
defined('YII_DEBUG') or define('YII_DEBUG',true);
// specify how many levels of call stack should be shown in each log message
defined('YII_TRACE_LEVEL') or define('YII_TRACE_LEVEL',3);

require_once($yii);
$app = Yii::createWebApplication($config);

// Add Extensions
$useEXcel = 1;

if ($useEXcel){

	Yii::import('ext.yiiexcel.YiiExcel', true);
	Yii::registerAutoloader(array('YiiExcel', 'autoload'), true);

	// Optional:
	//	As we always try to run the autoloader before anything else, we can use it to do a few
	//		simple checks and initialisations
	// PHPExcel_Shared_ZipStreamWrapper::register();

	if (ini_get('mbstring.func_overload') & 2) {
	    throw new Exception('Multibyte function overloading in PHP must be disabled for string functions (2).');
	}
	// PHPExcel_Shared_String::buildCharacterSets();

}
$app->run();