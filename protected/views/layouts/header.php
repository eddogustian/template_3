            <div class="page-header navbar navbar-fixed-top">
                <!-- BEGIN HEADER INNER -->
                <div class="page-header-inner ">
                    <!-- BEGIN LOGO -->
                    <div class="page-logo">
                        <a href="<?=Yii::app()->baseUrl.'/index.php/site'?>">
							<img src="<?php echo Yii::app()->baseUrl; ?>/themes/metronic/img/logo-header.png" alt="logo" class="logo-default" /> 
						</a>
                        <div class="menu-toggler sidebar-toggler">
                            <span></span>
                        </div>
                    </div>
                    <!-- END LOGO -->
                    <!-- BEGIN RESPONSIVE MENU TOGGLER -->
                    <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse">
                        <span></span>
                    </a>
                    <!-- END RESPONSIVE MENU TOGGLER -->
                    <!-- BEGIN TOP NAVIGATION MENU -->
                    <div class="top-menu">
                        <ul class="nav navbar-nav pull-right">
                            <!-- BEGIN USER LOGIN DROPDOWN -->
                            <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                            <?php 
                                $user = User::model()->findByPk(Yii::app()->user->id);
                            ?>
                            <li class="dropdown dropdown-user">
                                <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                    <img alt="" class="img-circle" src="<?php echo Yii::app()->baseUrl; ?>/themes/metronic/layout/img/avatar.png" />
                                    <span class="username username-hide-on-mobile"> <?=ucfirst($user->profile->firstname)?> </span>
                                    <i class="fa fa-angle-down"></i>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-default">
                                    <li>
                                        <a href="<?=Yii::app()->createUrl("user/user/view/id/".Yii::app()->user->id)?>">
                                            <i class="icon-user"></i> My Profile 
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?=Yii::app()->createUrl("user/logout")?>">
                                            <i class="icon-logout"></i> Log Out
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <!-- END USER LOGIN DROPDOWN -->
                        </ul>
                    </div>
                    <!-- END TOP NAVIGATION MENU -->
                </div>
                <!-- END HEADER INNER -->
            </div>