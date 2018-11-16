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
    <link href="<?php echo base_url(); ?>assets/css/jquery-ui.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
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
                  <?php
                        if($this->session->userdata('is_logged_in')):
                    ?>
                    <li><a href="<?= base_url('myaccounts'); ?>">My account</a></li>
                    <?php endif; ?>
                    <?php
                        if(!$this->session->userdata('is_logged_in')):
                    ?>
                    <li><a href="<?= base_url('user_login');?>">login</a>
                    <?php endif; ?>   
                    <?php
                        if($this->session->userdata('is_logged_in')):
                    ?>   
                    <li><a href="<?= base_url('user_login/logout'); ?>">Logout</a></li></li>
                    <?php endif; ?>
            </ul>
        </div>
    	
    </div>
</header>
<section class="banner_outer">
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
        <div class="container">
        
            <div class="banner_content">
            	<div class="col-md-6">
                	
                    <div id="horizontalTab">
<ul class="resp-tabs-list">
<li>Local Package </li>
</ul>
<div class="resp-tabs-container">
<div>
<form id="home_page_form" method="get" action="<?php echo site_url('hotel_list/lists');?>" >

    <table>
        <tr>
            <td colspan="2"><div class="form-group">
                <input type="text" id="destination" name="destination"  class="input-text-book" placeholder="Destination: Country, City,Airport,...">
                <input type="hidden" id="destination_hidden"  name="city" class="input-text-book">
            </div></td>
        </tr>
        <tr>
            <td><div class="form-group">
                <input type="text" name="check_in" class="input-text-book" id="datepicker" placeholder="check in" autocomplete="off" readonly>
                <!--<input type="text" id="datepicker" placeholder="Date Of Birth" class="input-text-login"> <i class="fa fa-calendar"></i>-->
            </div></td>
            <td><div class="form-group">
                <input type="text" name="check_out" id="datepicker1" class="input-text-book" placeholder="check out" autocomplete="off" readonly>
            </div></td>
        </tr>
        <tr>
            <td colspan="2">
            <div class="form-group">
                    <select class="form-control" name="noofroom" id="noofrooms" onchange="show_div(this.value);">
                        <option value="1">No. of Rooms</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                    </select>
            </div>
            </td>
        </tr>
        
        <tr style="position:relative;">
             <td colspan="2">
            <div class="form-group">
                <input type="button" class="input-text-book book_menu" value="2Guests/1Room ">
                <div id="check_details" class='check_tag' style="display: block; z-index: 9;">
                    <select name="room" id="rooms">
                        <option value="Single Rooms">Rooms</option>
                        <option value="Single">Single</option>
                        <option value="Double">Double</option>
                        <option value="Triple">Triple</option>
                        <option value="Quad">Quad</option>
                        <option value="Queen">Queen</option>
                        <option value="King">King</option>
                    </select>
                    <select id="adults" name="adults" required>
                        <option value="1">Adult(s)</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
                    <select class="chil_no" name="child" required>
                        <option value="0">Children</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
                    <input type="button" name="" value="close" id="close" style="float: right;">
                    <br><br>
                    <label class="1stchildren_age">Child 1 Age</label>
                    <select class="1stchildren_age" name="children_age[]">                        
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                    </select>
                    <label class="2stchildren_age">Child 2 Age</label>
                    <select class="2stchildren_age" name="children_age[]">                        
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                    </select>
                    <label class="3stchildren_age">Child 3 Age</label>
                    <select class="3stchildren_age" name="children_age[]">                        
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                    </select><br><br>
                    <label class="4stchildren_age">Child 4 Age</label>
                    <select class="4stchildren_age" name="children_age[]">                        
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                    </select>
                    <label class="5stchildren_age">Child 5 Age</label>
                    <select class="5stchildren_age" name="children_age[]">                        
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                    </select>
                </div>
                <!--<input type="number" name="children" class="input-text-book" placeholder="Children">-->
                <!--<div class="dropdown cus_dropdown">
                <button class="btn btn_custom dropdown-toggle" type="button" data-toggle="dropdown">Dropdown Example
                <span class="caret"></span></button>
                    <ul class="dropdown-menu">
                        <li>
                           

                        </li>
                        <li><a href="#">CSS</a></li>
                        <li><a href="#">JavaScript</a></li>
                    </ul>
            </div>-->
            </div></td>
              <!--<td><div class="form-group">
               
                 <select name="rating" class="input-text-book">
                        <option value="">Rating</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
            </div></td>-->
        </tr>
        
        <tr id="sec" style="display:none">
             <td colspan="2">
            <div class="form-group">
                <input type="button" class="input-text-book book_menu1" value="2Guests/1Room ">
                <div id="check_details1" class='check_tag' >
                    <select name="room1" id="rooms1">
                        <option value="Single Rooms">Rooms</option>
                        <option value="Single">Single</option>
                        <option value="Double">Double</option>
                        <option value="Triple">Triple</option>
                        <option value="Quad">Quad</option>
                        <option value="Queen">Queen</option>
                        <option value="King">King</option>
                    </select>
                    <select id="adults1" name="adults1" required>
                        <option value="1">Adult(s)</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
                    <select class="chil_no1" name="child1" required>
                        <option value="0">Children</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
                    <input type="button" name="" value="close" id="close1" style="float: right;">
                    <br><br>
                    <label class="1stchildren_age1">Child 1 Age</label>
                    <select class="1stchildren_age1" name="children_age1[]">                        
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                    </select>
                    <label class="2stchildren_age1">Child 2 Age</label>
                    <select class="2stchildren_age1" name="children_age1[]">                        
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                    </select>
                    <label class="3stchildren_age1">Child 3 Age</label>
                    <select class="3stchildren_age1" name="children_age1[]">                        
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                    </select><br><br>
                    <label class="4stchildren_age1">Child 4 Age</label>
                    <select class="4stchildren_age1" name="children_age1[]">                        
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                    </select>
                    <label class="5stchildren_age1">Child 5 Age</label>
                    <select class="5stchildren_age1" name="children_age1[]">                        
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                    </select>
                </div>                
            </div></td>              
        </tr>
        
        <tr id="three" style="display:none">
             <td colspan="2">
            <div class="form-group">
                <input type="button" class="input-text-book book_menu2" value="2Guests/1Room ">
                <div id="check_details2" class='check_tag' >
                    <select name="room2" id="rooms2">
                        <option value="Single Rooms">Rooms</option>
                        <option value="Single">Single</option>
                        <option value="Double">Double</option>
                        <option value="Triple">Triple</option>
                        <option value="Quad">Quad</option>
                        <option value="Queen">Queen</option>
                        <option value="King">King</option>
                    </select>
                    <select id="adults2" name="adults2" required>
                        <option value="1">Adult(s)</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
                    <select class="chil_no2" name="child2" required>
                        <option value="0">Children</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
                    <input type="button" name="" value="close" id="close2" style="float: right;">
                    <br><br>
                    <label class="1stchildren_age2">Child 1 Age</label>
                    <select class="1stchildren_age2" name="children_age2[]">                        
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                    </select>
                    <label class="2stchildren_age2">Child 2 Age</label>
                    <select class="2stchildren_age2" name="children_age2[]">                        
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                    </select>
                    <label class="3stchildren_age2">Child 3 Age</label>
                    <select class="3stchildren_age2" name="children_age2[]">                        
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                    </select><br><br>
                    <label class="4stchildren_age2">Child 4 Age</label>
                    <select class="4stchildren_age2" name="children_age2[]">                        
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                    </select>
                    <label class="5stchildren_age2">Child 5 Age</label>
                    <select class="5stchildren_age2" name="children_age2[]">                        
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                    </select>
                </div>                
            </div></td>              
        </tr>
        
        <tr>
            <td colspan="2">
                <div class="select_wrap">
                    <select name="nationality" class="input-select-book form-control">
                        <option value="">Nationality/residence</option>
                        <?php foreach($countries as $row){?>
                        <option value="<?=$row['code']?>"><?=$row['name']?></option>
                        <?php } ?>
                    </select> 
                </div>
                <img src="<?php echo base_url(); ?>assets/images/que_icon.png">
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <input type="submit" class="input-btn-book btn-primary read_more_btn" value="book now">
            </td>
            
        </tr>
        
    </table>

</form>
<table>
    <tr>
            <td colspan="2">
            <center><?php if($this->session->userdata('prebooking') == '1'){ echo "<a href='".site_url('pre_booking')."'><button class='bt btn-danger'>Continue your booking</button></a>"; }?></center>
            </td>
        </tr>
</table>

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
        <div class="col-md-4 col-sm-4">
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
        <div class="col-md-4 col-sm-4">
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
        
        <div class="col-md-4 col-sm-4">
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
        <div class="col-md-3 col-sm-3">
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
        
        <div class="col-md-3 col-sm-3">
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
        
        <div class="col-md-3 col-sm-3">
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
        
        <div class="col-md-3 col-sm-3">
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
  <link rel="stylesheet" href="<?php echo base_url();?>/assets/css/jquery-ui.css">
  <style>
  .btn_custom {
    background: #fff none repeat scroll 0 0;
    border-bottom: 1px solid red;
    border-radius: 0;
    padding: 13px;
    width: 100%;
}
  </style>
  <script>
        function show_div(num){
            if(num == 3){
                $("#sec").show();
                $("#three").show();
            }
            if(num == 2){                                
                $("#sec").show();
                $("#three").hide();
            }
            if(num == 1){                                
                $("#sec").hide();
                $("#three").hide();
            }
        }
    </script>
<?php $this->load->view('footer'); ?>