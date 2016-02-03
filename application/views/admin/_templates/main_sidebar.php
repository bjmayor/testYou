<?php
defined('BASEPATH') OR exit('No direct script access allowed');

?>

            <aside class="main-sidebar">
                <section class="sidebar">
<?php if ($admin_prefs['user_panel'] == TRUE): ?>
                    <!-- Sidebar user panel -->
                    <div class="user-panel">
                        <div class="pull-left image">
                            <img src="<?php echo base_url($avatar_dir . '/m_001.png'); ?>" class="img-circle" alt="User Image">
                        </div>
                        <div class="pull-left info">
                            <p><?php echo $user_login['firstname'].$user_login['lastname']; ?></p>
                            <a href="#"><i class="fa fa-circle text-success"></i> <?php echo lang('menu_online'); ?></a>
                        </div>
                    </div>

<?php endif; ?>
<?php if ($admin_prefs['sidebar_form'] == TRUE): ?>
                    <!-- Search form -->
                    <form action="#" method="get" class="sidebar-form">
                        <div class="input-group">
                            <input type="text" name="q" class="form-control" placeholder="<?php echo lang('menu_search'); ?>...">
                            <span class="input-group-btn">
                                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
                            </span>
                        </div>
                    </form>

<?php endif; ?>
                    <!-- Sidebar menu -->
                    <ul class="sidebar-menu">
                        <li>
                            <a href="<?php echo site_url('/'); ?>">
                                <i class="fa fa-home text-primary"></i> <span>到前台首页</span>
                            </a>
                        </li>

                        <li class="header text-uppercase">常用菜单</li>
                        

                        <li class="<?=active_link_controller('question')?>">
                            <a href="<?php echo site_url('admin/question/main'); ?>">
                                <i class="fa fa-file"></i> <span>添加问题</span>
                            </a>
                        </li>

                        <li class="<?=active_link_controller('loadjson')?>">
                            <a href="<?php echo site_url('admin/loadjson/index'); ?>">
                                <i class="fa fa-file"></i> <span>导入问题</span>
                            </a>
                        </li>

                        <li class="<?=active_link_controller('page')?>"><a href="<?php echo site_url('admin/page/page');?>"><i class="fa fa-th"></i> <span>题库管理</span></a></li>
                        <li class="header text-uppercase">系统管理菜单</li>
                        <li class="<?=active_link_controller('users')?>">
                            <a href="<?php echo site_url('admin/users'); ?>">
                                <i class="fa fa-user"></i> <span>用户管理</span>
                            </a>
                        </li>
                        <li class="<?=active_link_controller('groups')?>">
                            <a href="<?php echo site_url('admin/groups'); ?>">
                                <i class="fa fa-shield"></i> <span>用户组管理</span>
                            </a>
                        </li>
                        
                        <li class="<?=active_link_controller('files')?>">
                            <a href="<?php echo site_url('admin/files'); ?>">
                                <i class="fa fa-file"></i> <span>文件上传</span>
                            </a>
                        </li>
                        <li class="<?=active_link_controller('database')?>">
                            <a href="<?php echo site_url('admin/database'); ?>">
                                <i class="fa fa-database"></i> <span>数据库结构</span>
                            </a>
                        </li>


                    </ul>
                </section>
            </aside>
