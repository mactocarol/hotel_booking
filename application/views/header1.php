<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title><?=$page_title?></title>

    <link href="<?php echo base_url();?>assets/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/css/style.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/css/jslider.css" rel="stylesheet">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <?php if($page == 'hotel_detail') {?>
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/flexslider.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/easy-responsive-tabs.css" type="text/css" media="screen" />
    <?php } ?>

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

<header>
	<div class="container">
    	<div class="col-md-6">
        	<ul class="pull-left social_icon">
            	<li><i class="fa fa-phone"> </i><a href="#"> 1800-3568-4879</a></li>
                <li><i class="fa fa-envelope"> </i><a href="#"> contact@gmail.com</a></li>
            </ul>
        </div>
        <div class="col-md-6">
        	<ul class="pull-right">
            	<li><a href="#"><i class="fa fa-twitter"></i> </a></li>
                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                <li><a href="#"><i class="fa fa-linkedin"></i> </a></li>
                <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                <li><a href="#"><i class="fa fa-google"></i></a></li>
                <li>
                    <select style="color:black;" onchange="javascript:window.location.href='<?php echo base_url(); ?>LanguageSwitcher/switchLang/'+this.value;">
                        <option value="english" <?php if($this->session->userdata('site_lang') == 'english') echo 'selected="selected"'; ?>>English</option>
                        <option value="arabic" <?php if($this->session->userdata('site_lang') == 'arabic') echo 'selected="selected"'; ?>>Arabic</option>    
                    </select>
                </li>
                  <li><a href="#">My account</a></li>
                <li><a href="#">login</a></li>
            </ul>
        </div>
    	
    </div>
</header>
<section class="banner_outer">
	<div class="banner_img">
		<img src="<?php echo base_url();?>assets/images/slider1.jpg">
	</div>
    <div class="banner_inner">
    	<div class="top_header">
        <div class="container">
        		<div class="col-md-4"><a href="#" class="logo"><img src="<?php echo base_url();?>assets/images/logo.png"></a></div>
        <div class="col-md-8">
            <nav class="navbar navbar-default pull-right">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
          </div>
          <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
              <li <?php if($page == 'home') echo 'class="active"';?>><a href="<?php echo site_url();?>home"><?php echo $this->lang->line('Home'); ?></a></li>
              <li <?php if($page == 'about_us') echo 'class="active"';?>><a href="<?php echo site_url();?>about_us"><?php echo $this->lang->line('About'); ?></a></li>
              <li <?php if($page == 'hotel_list') echo 'class="active"';?>><a href="<?php echo site_url();?>hotel_list"><?php echo $this->lang->line('Hotels'); ?></a></li>
              <li <?php if($page == 'packages') echo 'class="active"';?>><a href="<?php echo site_url();?>packages"><?php echo $this->lang->line('Packages'); ?></a></li>
              <li <?php if($page == 'contact_us') echo 'class="active"';?>><a href="<?php echo site_url();?>contact_us"><?php echo $this->lang->line('Contact'); ?></a></li>
              
            </ul>
           </div>
          </div><!--/.nav-collapse -->
      </nav>
      		</div>
        </div>
		
		<div class="col-md-12 text-center bradcrum">
			<h1><?php echo $page_title; ?></h1>
			<p><?php echo $page_text; ?></p>
		</div>
        
    </div>
</section>