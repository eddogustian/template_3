<!DOCTYPE html>
<!-- 
Template Name: Metronic - Responsive Admin Dashboard Template build with Twitter Bootstrap 3.3.7
Version: 4.7.5
Author: KeenThemes
Website: http://www.keenthemes.com/
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Dribbble: www.dribbble.com/keenthemes
Like: www.facebook.com/keenthemes
Purchase: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
Renew Support: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
    <!--<![endif]-->
    <!-- BEGIN HEAD -->
    <head>
        <meta charset="utf-8" />
        <title><?php echo CHtml::encode($this->pageTitle); ?></title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="Preview page of <?php echo CHtml::encode($this->pageTitle); ?>" name="description" />
        <meta content="<?php echo Yii::app()->params['authors']; ?>" name="author" />
        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
        <link href="<?php echo Yii::app()->baseUrl; ?>/themes/metronic/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo Yii::app()->baseUrl; ?>/themes/metronic/plugins/simple-line-icons/css/simple-line-icons.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo Yii::app()->baseUrl; ?>/themes/metronic/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- END GLOBAL MANDATORY STYLES -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <link href="<?php echo Yii::app()->baseUrl; ?>/themes/metronic/plugins/bootstrap-daterangepicker/css/bootstrap-daterangepicker.css" rel="stylesheet" type="text/css" />
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL STYLES -->
        <link href="<?php echo Yii::app()->baseUrl; ?>/themes/metronic/css/components.min.css" rel="stylesheet" id="style_components" type="text/css" />
        <link href="<?php echo Yii::app()->baseUrl; ?>/themes/metronic/css/plugins.min.css" rel="stylesheet" type="text/css" />
        <!-- END THEME GLOBAL STYLES -->
        <!-- BEGIN THEME LAYOUT STYLES -->
        <link href="<?php echo Yii::app()->baseUrl; ?>/themes/metronic/layout/css/layout.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo Yii::app()->baseUrl; ?>/themes/metronic/layout/css/themes/darkblue.min.css" rel="stylesheet" type="text/css" id="style_color" />
        <link href="<?php echo Yii::app()->baseUrl; ?>/themes/metronic/layout/css/custom.min.css" rel="stylesheet" type="text/css" />
        <!-- END THEME LAYOUT STYLES -->
        <link rel="shortcut icon" href="<?php echo Yii::app()->baseUrl; ?>/themes/metronic/img/logo.png" /> 

        <!--[if lt IE 9]>
		<script src="<?php echo Yii::app()->baseUrl; ?>/themes/metronic/plugins/respond.min.js"></script>
		<script src="<?php echo Yii::app()->baseUrl; ?>/themes/metronic/plugins/excanvas.min.js"></script> 
		<script src="<?php echo Yii::app()->baseUrl; ?>/themes/metronic/plugins/ie8.fix.min.js"></script> 
		<![endif]-->
        <!-- BEGIN CORE PLUGINS -->
        <script src="<?php echo Yii::app()->baseUrl; ?>/themes/metronic/plugins/jquery.min.js" type="text/javascript"></script>
        <script src="<?php echo Yii::app()->baseUrl; ?>/themes/metronic/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="<?php echo Yii::app()->baseUrl; ?>/themes/metronic/plugins/js.cookie.min.js" type="text/javascript"></script>
        <script src="<?php echo Yii::app()->baseUrl; ?>/themes/metronic/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
        <script src="<?php echo Yii::app()->baseUrl; ?>/themes/metronic/plugins/jquery.blockui.min.js" type="text/javascript"></script>
        <!-- END CORE PLUGINS -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <script src="<?php echo Yii::app()->baseUrl; ?>/themes/metronic/plugins/bootstrap-daterangepicker/js/moment.min.js" type="text/javascript"></script>
        <script src="<?php echo Yii::app()->baseUrl; ?>/themes/metronic/plugins/bootstrap-daterangepicker/js/bootstrap.daterangepicker.js" type="text/javascript"></script>
        <script src="<?php echo Yii::app()->baseUrl; ?>/themes/metronic/plugins/jquery-inputmask/jquery.inputmask.bundle.min.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL SCRIPTS -->
        <script src="<?php echo Yii::app()->baseUrl; ?>/themes/metronic/scripts/app.min.js" type="text/javascript"></script>
        <!-- END THEME GLOBAL SCRIPTS -->
        <!-- BEGIN THEME LAYOUT SCRIPTS -->
        <script src="<?php echo Yii::app()->baseUrl; ?>/themes/metronic/layout/scripts/layout.min.js" type="text/javascript"></script>
        <script src="<?php echo Yii::app()->baseUrl; ?>/themes/metronic/scripts/quick-sidebar.min.js" type="text/javascript"></script>
        <script src="<?php echo Yii::app()->baseUrl; ?>/themes/metronic/scripts/quick-nav.min.js" type="text/javascript"></script>
        <!-- END THEME LAYOUT SCRIPTS -->
    </head>
    <!-- END HEAD -->

    <!-- BEGIN BODY -->
    <body class="page-header-fixed page-sidebar-closed-hide-logo page-content-white">
        <div class="page-wrapper">
            <!-- BEGIN HEADER -->
            <?php 
				if (!Yii::app()->user->isGuest) {
					$this->renderPartial('application.views.layouts.header'); 
				}
			?>
            <!-- END HEADER -->
            <!-- BEGIN HEADER & CONTENT DIVIDER -->
            <div class="clearfix"> </div>
            <!-- END HEADER & CONTENT DIVIDER -->
            <!-- BEGIN CONTAINER -->
            <div class="page-container">
                <!-- BEGIN SIDEBAR -->
                <div class="page-sidebar-wrapper">
                    <!-- BEGIN SIDEBAR -->
                    <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
                    <!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
                    <?php 
						if (!Yii::app()->user->isGuest) {
							$this->renderPartial('application.views.layouts.sidebar'); 
						}
					?>
                    <!-- END SIDEBAR -->
                </div>
                <!-- END SIDEBAR -->
                <!-- BEGIN CONTENT -->
                <div class="page-content-wrapper">
                    <!-- BEGIN CONTENT BODY -->
                    <div class="page-content">
                        
						<?php echo $content; ?>
						
                    </div>
                    <!-- END CONTENT BODY -->
                </div>
                <!-- END CONTENT -->
            </div>
            <!-- END CONTAINER -->
            <!-- BEGIN FOOTER -->
            <?php 
				if (!Yii::app()->user->isGuest) {
					$this->renderPartial('application.views.layouts.footer'); 
				}
			?>
            <!-- END FOOTER -->
        </div>

        <script>
            $(document).ready(function()
            {
                <?php
                if(!isset($_GET['yt0'])){
                    echo "
                        $('#filter_collapse').attr('class','expand');
                        $('#body_collapse').hide();
                    ";
                }
                ?>
                $(".only_number").inputmask({mask:"9",repeat:10,greedy:!1})
            })
        </script>

    </body>
    <!-- END BODY -->
</html>