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

    <link href="<?php echo base_url(); ?>assets/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body class="home">

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
	<div class="banner_img"><img src="<?php echo base_url(); ?>assets/images/slider1.jpg"></div>
    <div class="banner_inner">
    	<div class="top_header">
        <div class="container">
        		<div class="col-md-4"><a href="#" class="logo"><img src="<?php echo base_url(); ?>assets/images/logo.png"></a></div>
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
              <li <?php if($page == 'home') echo 'class="active"';?>><a href="<?php echo site_url();?>/home"><?php echo $this->lang->line('Home'); ?></a></li>
              <li <?php if($page == 'about_us') echo 'class="active"';?>><a href="<?php echo site_url();?>/about_us"><?php echo $this->lang->line('About'); ?></a></li>
              <li <?php if($page == '') echo 'class="active"';?>><a href="#">Corporate</a></li>
              <li <?php if($page == '') echo 'class="active"';?>><a href="#">group package</a></li>
              <li <?php if($page == 'contact_us') echo 'class="active"';?>><a href="<?php echo site_url();?>/contact_us"><?php echo $this->lang->line('Contact'); ?></a></li>
              
            </ul>
           </div>
          </div><!--/.nav-collapse -->
      </nav>
      		</div>
        </div>
        <div class="container">
        
            <div class="banner_content">
            	<div class="col-md-6">
                	
                    <div id="horizontalTab">
<ul class="resp-tabs-list">
<li>Local Package </li>
<li>Airport Transfer + Hotel </li>
<li>Hotel Only</li>
</ul>
<div class="resp-tabs-container">
<div>
<p>Includes Airport Transfer, City Tour and Hotel Stay</p>
<form>
	<table>
    	<tr><td colspan="2"><input type="text" class="input-text-book" placeholder="Destination: Country, City,Airport,..."></td></tr>
        <tr><td><input type="date" class="input-text-book" placeholder="check in"></td><td><input type="date" class="input-text-book" placeholder="check out"></td></tr>
          <tr><td><input type="number" class="input-text-book" placeholder="Adults"></td><td><input type="number" class="input-text-book" placeholder="Children"></td></tr>
          <tr><td colspan="2"><input type="number" class="input-text-book" placeholder="Age of Children"></td></tr>
          <tr><td colspan="2">
          						<div class="select_wrap"><select class="input-select-book"><option selected>Nationality/residence</option><option>india</option><option>Afghanistan</option><option>Albania</option></select> </div><img src="<?php echo base_url(); ?>assets/images/que_icon.png">
          </td></tr>
           <tr><td colspan="2"><input type="submit" class="input-btn-book btn-primary read_more_btn" value="book now"></td></tr>
    </table>
</form>


</div>
<div>
<p>Includes Airport Transfer, City Tour and Hotel Stay</p>
<form>
	<table>
    	<tr><td colspan="2"><input type="text" class="input-text-book" placeholder="Destination: Country, City,Airport,..."></td></tr>
        <tr><td><input type="date" class="input-text-book" placeholder="check in"></td><td><input type="date" class="input-text-book" placeholder="check out"></td></tr>
          <tr><td><input type="number" class="input-text-book" placeholder="Adults"></td><td><input type="number" class="input-text-book" placeholder="Children"></td></tr>
          <tr><td colspan="2"><input type="number" class="input-text-book" placeholder="Age of Children"></td></tr>
          <tr><td colspan="2">
          						<div class="select_wrap"><select class="input-select-book"><option selected>Nationality/residence</option><option>india</option><option>Afghanistan</option><option>Albania</option></select> </div><img src="<?php echo base_url(); ?>assets/images/que_icon.png">
          </td></tr>
           <tr><td colspan="2"><input type="submit" class="input-btn-book btn-primary read_more_btn" value="book now"></td></tr>
    </table>
</form>


</div>
<div>
<p>Includes Airport Transfer, City Tour and Hotel Stay</p>
<form>
	<table>
    	<tr><td colspan="2"><input type="text" class="input-text-book" placeholder="Destination: Country, City,Airport,..."></td></tr>
        <tr><td><input type="date" class="input-text-book" placeholder="check in"></td><td><input type="date" class="input-text-book" placeholder="check out"></td></tr>
          <tr><td><input type="number" class="input-text-book" placeholder="Adults"></td><td><input type="number" class="input-text-book" placeholder="Children"></td></tr>
          <tr><td colspan="2"><input type="number" class="input-text-book" placeholder="Age of Children"></td></tr>
          <tr><td colspan="2">
          						<div class="select_wrap"><select class="input-select-book"><option selected>Nationality/residence</option><option>india</option><option>Afghanistan</option><option>Albania</option></select> </div><img src="<?php echo base_url(); ?>assets/images/que_icon.png">
          </td></tr>
           <tr><td colspan="2"><input type="submit" class="input-btn-book btn-primary read_more_btn" value="book now"></td></tr>
    </table>
</form>

</div>
</div>
</div>
                    
                </div>
                <div class="col-md-6">
                	<h1>let's discover the <span>world together</span></h1>
                    <p>Over 450 airlines at your fingertips!</p>
                    <a href="#" class="btn-primary read_more_btn">read more</a>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="package_outer">
    <div class="container">
    <div class="title_tour">
    	<h2>Popular Tour Packages</h2>
        <p>Etiam porta sem malesuada magna mollis euismod. Maecenas sed diam eget risus varius blandit sit amet non magna. Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor.</p>
        </div>
        <div class="col-md-4">
        	<div class="package_inner">
            	<img src="<?php echo base_url(); ?>assets/images/package1.jpg">
                <div class="package_inner_cont">
                <div class="package_title">
                	<div class="col-md-8"><h4>Local Package</h4></div>
                    <div class="col-md-4"><h5>From</h5><span>300$</span></div>
                </div>
                <h3><i class="fa fa-clock-o"></i> 8 days 7 nights</h3>
                <div class="rating">
                	<i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <span> (1 review)</span>
                </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
        	<div class="package_inner">
            	<img src="<?php echo base_url(); ?>assets/images/package2.jpg"> <div class="package_inner_cont">
                <div class="package_title">
                	<div class="col-md-8"><h4>Local Package</h4></div>
                    <div class="col-md-4"><h5>From</h5><span>300$</span></div>
                </div>
                <h3><i class="fa fa-clock-o"></i> 8 days 7 nights</h3>
                <div class="rating">
                	<i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <span> (1 review)</span>
                </div>
            </div>
            </div>
        </div>
        
        <div class="col-md-4">
        	<div class="package_inner">
            	<img src="<?php echo base_url(); ?>assets/images/package3.jpg"> <div class="package_inner_cont">
                <div class="package_title">
                	<div class="col-md-8"><h4>Local Package</h4></div>
                    <div class="col-md-4"><h5>From</h5><span>300$</span></div>
                </div>
                <h3><i class="fa fa-clock-o"></i> 8 days 7 nights</h3>
                <div class="rating">
                	<i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <span> (1 review)</span>
                </div>
                </div>
            </div>
        </div>
    </div>
</section>    

     
     <section class="booking_why_outre">
    <div class="container"><div class="title_tour">
    	<h2>why book with us</h2>
        <p>Etiam porta sem malesuada magna mollis euismod. Maecenas sed diam eget risus varius blandit sit amet non magna. Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor.</p>
        
        </div></div>
        <div class="tour_img_outer">
        <div class="ttour_img_outer-wrap">
            <div class="tour-image">
                <img src="<?php echo base_url(); ?>assets/images/book1.jpg" alt="">
            </div>
        	<div class="tour-overlay"></div>
       		<div class="tour-overlay-front"></div>
        
        <div class="tourmaster-tour-category-head">
        	<h3>Cheap Flights to Over 15,000 Destinations</h3>
            <p>Fly around the world with tajawal. Book your airline tickets to over 15,000 destinations including exciting places like Dubai, Vienna and Madrid with tajawal now and travel at affordable rates.</p>
        </div>
        
        </div>
        </div>
        
        <div class="tour_img_outer">
        <div class="ttour_img_outer-wrap">
            <div class="tour-image">
               <img src="<?php echo base_url(); ?>assets/images/book2.jpg" alt="">
            </div>
        	<div class="tour-overlay"></div>
       		<div class="tour-overlay-front"></div>
        
        <div class="tourmaster-tour-category-head">
        	<h3>Cheap Flights to Over 15,000 Destinations</h3>
            <p>Fly around the world with tajawal. Book your airline tickets to over 15,000 destinations including exciting places like Dubai, Vienna and Madrid with tajawal now and travel at affordable rates.</p>
        </div>
        
        </div>
        </div>
        
        <div class="tour_img_outer">
        <div class="ttour_img_outer-wrap">
            <div class="tour-image">
                 <img src="<?php echo base_url(); ?>assets/images/book3.jpg" alt="">
            </div>
        	<div class="tour-overlay"></div>
       		<div class="tour-overlay-front"></div>
        
        <div class="tourmaster-tour-category-head">
        	<h3>Cheap Flights to Over 15,000 Destinations</h3>
            <p>Fly around the world with tajawal. Book your airline tickets to over 15,000 destinations including exciting places like Dubai, Vienna and Madrid with tajawal now and travel at affordable rates.</p>
        </div>
        
        </div>
        </div>
        
        <div class="tour_img_outer">
        <div class="ttour_img_outer-wrap">
            <div class="tour-image">
                 <img src="<?php echo base_url(); ?>assets/images/book4.jpg" alt="">
            </div>
        	<div class="tour-overlay"></div>
       		<div class="tour-overlay-front"></div>
        
        <div class="tourmaster-tour-category-head">
        	<h3>Cheap Flights to Over 15,000 Destinations</h3>
            <p>Fly around the world with tajawal. Book your airline tickets to over 15,000 destinations including exciting places like Dubai, Vienna and Madrid with tajawal now and travel at affordable rates.</p>
        </div>
        
        </div>
        </div>
        
</section>

<section class="newsletter_outer">
    <div class="container"><div class="title_tour">
    	<h2>join the newsletter</h2>
        <p>Fly around the world with tajawal</p></div>
        <div class="newsletter_inner">
        <form>
        	<input type="email" placeholder="your email" class="input_text">
            <input type="submit" class="submit_btn" value="subscribs">
        </form>
        </div>
	</div>
</section>

<section class="travel_spcial">
    <div class="container"><div class="title_tour">
    	<h2>travel spcials</h2>
        <p>Etiam porta sem malesuada magna mollis euismod. Maecenas sed diam eget risus varius blandit sit amet non magna. Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor.</p>
        </div>
        <div class="col-md-3">
        	<div class="travel_spcial_box">
            <div class="travel_spcial_box_inner">    	<img src="<?php echo base_url(); ?>assets/images/1.jpeg"></div>
                <div class="travel_spcial_box_overlay">
                	<h3><a href="#">Change your place and get the fresh air</a></h3>
                    <span>
                        <span><i class="icon_clock_alt"></i></span>
                        <a href="#">June 6, 2016</a>
                   </span>
                </div>
            </div>
        </div>
        
        <div class="col-md-3">
        	<div class="travel_spcial_box">
            <div class="travel_spcial_box_inner">    	<img src="<?php echo base_url(); ?>assets/images/2.jpg"></div>
                <div class="travel_spcial_box_overlay">
                	<h3><a href="#">Change your place and get the fresh air</a></h3>
                    <span>
                        <span><i class="icon_clock_alt"></i></span>
                        <a href="#">June 6, 2016</a>
                   </span>
                </div>
            </div>
        </div>
        
        <div class="col-md-3">
        	<div class="travel_spcial_box">
            <div class="travel_spcial_box_inner">    	<img src="<?php echo base_url(); ?>assets/images/3.jpg"></div>
                <div class="travel_spcial_box_overlay">
                	<h3><a href="#">Change your place and get the fresh air</a></h3>
                    <span>
                        <span><i class="icon_clock_alt"></i></span>
                        <a href="#">June 6, 2016</a>
                   </span>
                </div>
            </div>
        </div>
        
        <div class="col-md-3">
        	<div class="travel_spcial_box">
            <div class="travel_spcial_box_inner">    	<img src="<?php echo base_url(); ?>assets/images/4.jpg"></div>
                <div class="travel_spcial_box_overlay">
                	<h3><a href="#">Change your place and get the fresh air</a></h3>
                    <span>
                        <span><i class="icon_clock_alt"></i></span>
                        <a href="#">June 6, 2016</a>
                   </span>
                </div>
            </div>
        </div>
        
        </div></section>

<?php $this->load->view('footer'); ?>