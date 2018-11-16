<?php if(isset($hotel_detail) && !empty($hotel_detail)) { ?>
<section class="room_detail_panel">
	<div class="container">
    	<div class="col-md-8">
        <div class="hotel_slidshow">
        	<div id="slider" class="flexslider">
          <ul class="slides">
            <?php foreach($hotel_detail->hotel_images as $img) { ?>
                <li>
  	    	    <img src="<?php echo $img->image;?>" />
  	    		</li>
            <?php } ?>
  	    		<!--<li>
  	    	    <img src="<?php echo base_url();?>assets/images/room_detail2.jpg" />
  	    		</li>
  	    		
                 <li>
  	    	    <img src="<?php echo base_url();?>assets/images/room_detail3.jpg" />
  	    		</li>
  	    		<li>
  	    	    <img src="<?php echo base_url();?>assets/images/room_detail4.jpg" />
  	    		</li>
                 <li>
  	    	    <img src="<?php echo base_url();?>assets/images/room_detail5.jpg" />
  	    		</li>
  	    		<li>
  	    	    <img src="<?php echo base_url();?>assets/images/room_detail6.jpg" />
  	    		</li>-->
          </ul>
        </div>
        <div id="carousel" class="flexslider">
          <ul class="slides">
           <!-- <li>
  	    	    <img src="<?php echo base_url();?>assets/images/room_detail1.jpg" />
  	    		</li>
  	    		<li>
  	    	    <img src="<?php echo base_url();?>assets/images/room_detail2.jpg" />
  	    		</li>
  	    		
                 <li>
  	    	    <img src="<?php echo base_url();?>assets/images/room_detail3.jpg" />
  	    		</li>
  	    		<li>
  	    	    <img src="<?php echo base_url();?>assets/images/room_detail4.jpg" />
  	    		</li>
                 <li>
  	    	    <img src="<?php echo base_url();?>assets/images/room_detail5.jpg" />
  	    		</li>
  	    		<li>
  	    	    <img src="<?php echo base_url();?>assets/images/room_detail6.jpg" />
  	    		</li>-->
  	    		
          </ul>
          </div>
          </div>
          
          
         
<div id="romm_detail_tab">
<ul class="resp-tabs-list">
<li>overview</li>
<li>amenities</li>
<li>package</li>
<!--<li>rates</li>-->
</ul>
<div class="resp-tabs-container">
<div>
	<div class="hotel_overview">
	<h2>overview <span>room</span></h2>
<p><?php if($this->session->userdata('site_lang') == 'arabic'){ echo !empty($hotel_detail->name_ar)?$hotel_detail->name_ar:$hotel_detail->name; }else{ echo $hotel_detail->name; }?>.</p>
<p><?php if($this->session->userdata('site_lang') == 'arabic'){ echo !empty($hotel_detail->description_ar)?$hotel_detail->description_ar:$hotel_detail->description; }else{ echo $hotel_detail->description; }?>.</p>
</div></div>
<div>

	<div class="hotel_amenities">
    	<h2><span>Property amenities </span></h2>
        <p><?php if($this->session->userdata('site_lang') == 'arabic'){ echo !empty($hotel_detail->property_amenity->p_name_ar)?$hotel_detail->property_amenity->p_name_ar:$hotel_detail->property_amenity->p_name; }else{ echo $hotel_detail->property_amenity->p_name; }?></p>
        <h2><span>Room amenities </span></h2>
        <p><?php if($this->session->userdata('site_lang') == 'arabic'){ echo !empty($hotel_detail->room_amenity->am_name_ar)?$hotel_detail->room_amenity->am_name_ar:$hotel_detail->room_amenity->am_name; }else{ echo $hotel_detail->room_amenity->am_name; }?></p>
        <!--<ul>
           
           <li><div class="amenity"><i class="fa fa-wifi"></i> <span></span></div></li>          
        </ul>-->
    </div>

</div>
<div>
<div class="hotel_availability">
	<h2>availability <span>room</span></h2>
    <h5>enter date to search hotel availability</h5>
    <div class="availability_form">
    	<form><div class="row">
    	<div class="col-md-3"><input class="input-text-book" placeholder="check in" type="date"></div>
        <div class="col-md-3"><input class="input-text-book" placeholder="check out" type="date"></div>
        <div class="col-md-3"><input class="input-text-book" placeholder="adults" type="number"></div>
        <div class="col-md-3"><button><img src="<?php echo base_url();?>assets/images/search.png"></button></div></div>
        </form>
    </div>
    <form id="bookingform" action="<?php echo site_url('pre_booking');?>" method="post">
    <table class="table-responsive">
    	<tr><th>room types</th><th>price</th><th>no. rooms</th><th>action</th></tr>
        <?php foreach($hotel_detail->RoomDetails->RoomDetail as $key => $room){ ?>        
            <tr>
                <td>
                    <img src="<?php echo base_url();?>assets/images/1.jpeg"> <h6><?=$room->Type?></h6><p><?=$room->RoomDescription?></p>
                </td>
                <td>
                    $<?=round($room->TotalRate,2)?>/night
                </td>
                <td>
                    <select name="no_of_rooms"><option>1</option><option>2</option></select>
                </td>
                <td>
                    <input name="room_type" type="hidden" value="<?=$room->Type?>">
                    <input name="session_id" type="hidden" value="<?php foreach($hotel_detail->SearchSessionId as $ss){ echo $ss; }?>">
                    <input name="arrivalDate" type="hidden" value="<?php foreach($hotel_detail->ArrivalDate as $arv){ echo $arv; }?>">
                    <input name="departureDate" type="hidden" value="<?php foreach($hotel_detail->DepartureDate as $d){ echo $d; }?>">
                    <input name="currency" type="hidden" value="<?php foreach($hotel_detail->Currency as $cr){ echo $cr; }?>">
                    <input name="nationality" type="hidden" value="<?php foreach($hotel_detail->GuestNationality as $n){ echo $n; }?>">
                    <input name="hotel_id" type="hidden" value="<?php  echo $hotel_detail->hotel_id; ?>">
                    <input name="room_rate" type="hidden" value="<?php  echo $room->TotalRate; ?>">
                    <button class="btn btn-danger">BOOK NOW</button>
                </td>
            </tr>
        
        <?php } ?>        
    </table>
    </form>
</div>
</div>
<div>
<div class="hotel_rates">
	<h2>rates <span>room</span></h2>
    
    <table class="table-responsive">
    	<tr><th> rate period</th><th>nightly</th><th>weekend nightly</th><th>weekly</th><th>monthly</th><th>event</th></tr>
        <tr><td> <h3>spring/ summer season<span>jun 1- aug 31</span></h3></td><td>$320</td><td>$150</td><td>$560</td><td>$160</td><td>$850</td></tr> 
        <tr><td> <h3>fall / summer season<span>jun 1- aug 31</span></h3></td><td>$320</td><td>$150</td><td>$560</td><td>$160</td><td>$850</td></tr> <tr><td> <h3>christmus season<span>jun 1- aug 31</span></h3></td><td>$320</td><td>$150</td><td>$560</td><td>$160</td><td>$850</td></tr>
        
         
    </table>
</div>


</div>


</div>
</div>












        </div>
    	<div class="col-md-4">
        	<div class="hotel_summery">	
            	<div class="hotel_summery_title">
                	<h2>$<?php  foreach($hotel_detail->price as $p)  echo round($p,2); ?></h2>
                    <h3>from / per night</h3>
                </div>
                <div class="hotle_summery_cont">
                	<img src="<?php echo base_url();?>assets/images/hotle_logo.png">
                    <table>                    	
                        <tr><td>star</td><td><?=$hotel_detail->rating?> star</td></tr>
                        <tr><td>Address</td><td><?php if($this->session->userdata('site_lang') == 'arabic'){ echo !empty($hotel_detail->address_ar)?$hotel_detail->address_ar:$hotel_detail->address; }else{ echo $hotel_detail->address; }?></td></tr>
                        <tr><td>City</td><td><?php if($this->session->userdata('site_lang') == 'arabic'){ echo !empty($hotel_detail->city_ar)?$hotel_detail->city_ar:$hotel_detail->city; }else{ echo $hotel_detail->city; }?></td></tr>
                        <tr><td>Country</td><td><?php if($this->session->userdata('site_lang') == 'arabic'){ echo !empty($hotel_detail->country_ar)?$hotel_detail->country_ar:$hotel_detail->country; }else{ echo $hotel_detail->country; }?></td></tr>
                        <tr><td>live chat</td><td>support</td></tr>
                        <tr><td>email</td><td>support@gmail.com</td></tr>
                    </table>
                 
                    	<!--<div class="col-md-8"><a href="#" class="book_now"><i class="fa fa-heart"></i> book now</a>  </div>-->
                        <div class="col-md-4 book_print"><a href="#"><i class="fa fa-print"></i></a>  <a href="#"><i class="fa fa-share"></i></a>  </div>
                        
                   
                </div>
                
                <div class="hotel_map">
                	<img src="<?php echo base_url();?>assets/images/map.png">
                </div>
                <div class="hotel_book_box">
                	<a href="#"><i class="fa fa-heart"></i> booking this listing</a>
                    <p>159 people bookmarked this hotel</p>
                    <ul>
                    	<li><a href="#" class="facebook"><i class="fa fa-facebook"> </i> share</a></li>
                        <li><a href="#" class="twitter"><i class="fa fa-twitter"> </i> share</a></li>
                        <li><a href="#" class="google"><i class="fa fa-google-plus"> </i> share</a></li>
                    </ul>
                </div>
                <div class="hotel_accept_card">
                	<h3>we accept</h3>
                    <p>159 people bookmarked this hotel</p>
                    <ul>
                    	<li><a href="#"><img src="<?php echo base_url();?>assets/images/card1.png"></a></li>
                       <li><a href="#"><img src="<?php echo base_url();?>assets/images/card2.png"></a></li>
                       <li><a href="#"><img src="<?php echo base_url();?>assets/images/card3.png"></a></li>
                       <li><a href="#"><img src="<?php echo base_url();?>assets/images/card4.png"></a></li>
                       <li><a href="#"><img src="<?php echo base_url();?>assets/images/card6.png"></a></li>
                       
                    </ul>
                </div>
                
                
                 <div class="hotel_custmer_review">
                	<h3>coustomer review</h3>
                    <div id="slider1" class="flexslider">
          <ul class="slides">
            <li>
  	    	   <div class="cust_detail">
               Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum nibh urna, euismod ut ornare non, volutpat vel tortor. Integer laoreet placerat suscipit. 
               </div>
               	<div class="cust_img"><img src="<?php echo base_url();?>assets/images/coust.png"></div>
                	<div class="cust_info"><h4>johe deo </h4><p>Lorem ipsum dolor sit amet, consectetur </p></div>
                	
  	    		</li>
                 <li>
  	    	   <div class="cust_detail">
               Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum nibh urna, euismod ut ornare non, volutpat vel tortor. Integer laoreet placerat suscipit. 
               </div>
               	<div class="cust_img"><img src="<?php echo base_url();?>assets/images/coust.png"></div>
                	<div class="cust_info"><h4>johe deo </h4><p>Lorem ipsum dolor sit amet, consectetur </p></div>
                	
  	    		</li>
  	    		
  	    		
                
          </ul>
        </div>
                
                </div>
                
            </div>
        	
        </div>
    </div>
    
</section>
<?php } else{ ?>
<section class="room_detail_panel">
	<div class="container">
    	<div class="col-md-8">
            <h2>Something went wrong , Please <a href="<?php echo site_url();?>hotel_list">Go back</a></h2>
        </div>
    </div>    
</section>
<?php }?>