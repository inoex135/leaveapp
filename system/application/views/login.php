<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="en-US">
<head>
	<title>Log In</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8;charset=utf-8" />
        <link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url();?>css/zoo/reset.css" />
        <link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url();?>css/zoo/grid.css" />
        <link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url();?>css/zoo/typography.css" />
        <link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url();?>css/zoo/layout.css" />
        <link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url();?>css/zoo/form.css" />	
</head>

<body id="login">
    <div id="topbar" class="container_16">
        <h1 id="logo">Javan Internal Accounting and Worklog</h1>
    </div>

    <div id="page" class="clearfix">
        <div class="container_16">
            <div id="panel" class="grid_6 push_5">
                <form method="POST" action="">
                    <div class="titlebar">
                        Login Panel
                    </div>                    
                    <div class="spacer clearfix">
			
                            <div class="input text">
                                <label>Username</label>
                                <input type="text" name="username"/>
                            </div>
                            <div class="input text">
                                <label>Password</label>
                                <input type="password" name="password"/>
                            </div>
                    </div>
                    <div class="titlebar">
                        <div class="submit">
                            <input type="submit" name="submit" class="button-primary" value="Login" />                            
                        </div>

                    </div>
                    <div class="titlebar">
                        Role admin : username = admin, password=admin
                    </div>
                    <div class="titlebar">
                        Role staff : username = staff, password=staff
                    </div>
                    <div class="titlebar">
                        Role supervisor : username = supervisor, password=supervisor
                    </div>
                    <div class="titlebar">
                        Role manager : username = manager, password=manager
                    </div>
                    <div class="titlebar">
                        Role hr departement : username = ada, password=asd
                    </div>
                </form>
            </div>
        </div>
    </div>    
</body>
</html>
