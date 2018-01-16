                    <div class="page-sidebar navbar-collapse collapse">
                        <!-- BEGIN SIDEBAR MENU -->
                        <!-- DOC: Apply "page-sidebar-menu-light" class right after "page-sidebar-menu" to enable light sidebar menu style(without borders) -->
                        <!-- DOC: Apply "page-sidebar-menu-hover-submenu" class right after "page-sidebar-menu" to enable hoverable(hover vs accordion) sub menu mode -->
                        <!-- DOC: Apply "page-sidebar-menu-closed" class right after "page-sidebar-menu" to collapse("page-sidebar-closed" class must be applied to the body element) the sidebar sub menu mode -->
                        <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
                        <!-- DOC: Set data-keep-expand="true" to keep the submenues expanded -->
                        <!-- DOC: Set data-auto-speed="200" to adjust the sub menu slide up/down speed -->
                        <ul class="page-sidebar-menu  page-header-fixed " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200" style="padding-top: 20px">
                            <!-- DOC: To remove the sidebar toggler from the sidebar you just need to completely remove the below "sidebar-toggler-wrapper" LI element -->
                            <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
                            <li class="sidebar-toggler-wrapper hide">
                                <div class="sidebar-toggler">
                                    <span></span>
                                </div>
                            </li>
                            <!-- END SIDEBAR TOGGLER BUTTON -->
                            <li class="nav-item <?=Yii::app()->controller->id == 'site' && Yii::app()->controller->action->id == 'index' ? 'active open' : ''?>">
                                <a href="<?=Yii::app()->baseUrl.'/index.php/site'?>" class="nav-link">
                                    <i class="fa fa-tachometer"></i>
                                    <span class="title">Dashboard</span>
                                    <?=Yii::app()->controller->id == 'site' ? '<span class="selected"></span>' : ''?>
                                </a>
                            </li>
                            
                            <?php
                                $user_menu = AppComponent::get_user_menu();
                                foreach($user_menu as $row):
                                    $arr = explode('/',$row['menu_url']);
                                    $controller_id = $arr['1'];
                            ?>
                                <li class="nav-item <?=Yii::app()->controller->id == $controller_id && Yii::app()->controller->action->id != 'updatemyprofile' ? 'active open' : ''?>">
                                    <a href="<?=Yii::app()->createUrl($row['menu_url']);?>" class="nav-link ">
                                        <i class="<?=$row['menu_icon']?>"></i>
                                        <span class="title"><?=$row['menu_name']?></span>
                                        <?=Yii::app()->controller->id == $controller_id ? '<span class="selected"></span>' : ''?>
                                    </a>
                                </li>
                            <?php
                                endforeach;
                            ?>
                            
                        </ul>
                        <!-- END SIDEBAR MENU -->
                    </div>