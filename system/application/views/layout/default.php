<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"  dir="ltr" lang="en-US">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8;charset=utf-8" />
        <title>Javan Online Leave Applications</title>
        <link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url();?>css/zoo/reset.css" />
        <link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url()?>css/zoo/grid.css" />
        <link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url()?>css/zoo/typography.css" />
        <link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url()?>css/zoo/layout.css" />
        <link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url()?>css/zoo/form.css" />
        <link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url()?>css/zoo/view.css" />
        <link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url()?>css/zoo/table.css" />
        <link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url()?>css/zoo/pagination.css" />
        <link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url()?>css/zoo/jquery.footbar.css" />
        <script type="text/javascript" src="<?php echo base_url()?>js/jquery-1.4.2.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url()?>js/jquery.footbar.js"></script>
        <script type="text/javascript" src="<?php echo base_url()?>js/timer.js"></script>
        <script type="text/javascript" src="<?php echo base_url()?>js/jquery.nap.js"></script>


    </head>
    <body>
        <div class="container_16">
            <div id="topbar" class="">
                <div class="grid_6 alpha">
                    <h1 id="logo">Javan Online Leave Applications</h1>
                </div>
                <div class="grid_2">
                    <div id="feedbackButton"><div class="spacer"><a href="#feedback" onclick="toggleFeedback()">Feedback</a></div></div>
                </div>
                <div class="grid_8" id="topmenu">
                    <ul class="menu">
                        <li><?php echo anchor('logout','logout');?></li>
                        <li><?php //echo $html->link('Profile','/change_profile',array('title'=>'change profile'));?></li>
                        <li class="plain"><strong><?php echo $username?></strong> role <strong><?php echo $role?></strong></li>
                    </ul>
                </div>
            </div>
            <div id="page" class="clearfix">
                <div class="grid_3 alpha" id="library">
                    <div class="spacer">
                        <ul class="sidenav">
                            <li>                                
                                <ul>
                                    <?php if($role=='admin'):?>
                                    <li><span class="icon icon-6"></span><span class="name"><?php echo anchor('admin/typeofleaves', 'Type of Leave');?></span></li>
                                    <li><span class="icon icon-6"></span><span class="name"><?php echo anchor('admin/users', 'User');?></span></li>
                                    <?php else:?>
                                    <li><span class="icon icon-6"></span><span class="name"><?php echo anchor('front/leave', 'Leave Request');?></span></li>
                                    <?php endif;?>
                                </ul>
                            </li>                            
                        </ul>
                    </div>
                </div>
                <div class="grid_13" id="content">
                    <div class="spacer">
                        <?php if(isset($_SESSION['Message']['flash']) && !empty($_SESSION['Message']['flash'])): ?>
                        <div id="flash"><?php //echo $this->Session->flash() ?></div>
                        <?php endif; ?>
                        <?php echo $content_for_layout?>
                    </div>
                </div>
            </div>
        </div>

        <?php //echo $this->element('footbar/main') ?>
        <?php //echo $this->element('sql_dump'); ?>
    </body>
</html>
