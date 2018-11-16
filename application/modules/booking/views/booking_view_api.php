<section class="room_detail_panel">
	<div class="container">
    	<div class="col-md-8">
        	<div class="booking-information travelo-box">
                            <h2>Booking <span>Confirmation</span></h2>
                            <hr>
                            <?php $detail = $booking_detail->BookingRequest->Booking;
                            $booking_code = $booking_detail->BookingDetails->BookingCode;
                            $booking_status = $booking_detail->BookingDetails->BookingStatus;
                            $booking_price = $booking_detail->BookingDetails->BookingPrice;
                            //echo "<pre>";  print_r($booking_detail->BookingDetails);die;
                            $BookingAfterPrice = $booking_detail->BookingDetails->BookingAfterPrice;
                            $Difference = $booking_detail->BookingDetails->Difference;
                            $name = $booking_detail->name;?>
                            <div class="booking-confirmation clearfix">
                                <i class="soap-icon-recommend icon circle"></i>
                                <?php if($booking_code && ($booking_status == 'Confirmed')) { ?>
                                <div class="message">
                                    <h4 class="main-message">Thank You. Your Booking Order is <?=$booking_status?> Now.</h4>
                                    <p>A confirmation email has been sent to your provided email address.</p>                                    
                                </div>
                                <form class="booking-form" action="<?php echo base_url().'booking/print_invoice'; ?>" method="post">
                                <input type="hidden" name="detail" value='<?php echo json_encode($booking_detail);?>'>
                                <input type="hidden" name="user_search" value='<?php echo $user_search;?>'>
                                <input type="hidden" name="user_hotel" value='<?php echo $user_hotel;?>'>
                                <input type="hidden" name="booking_code" value="<?php print_r($booking_code);?>">
                                <input type="hidden" name="booking_status" value="<?php print_r($booking_status);?>">
                                <input type="hidden" name="booking_price" value="<?php print_r($booking_price);?>">
                                <input type="hidden" name="vpc_OrderInfo" value="<?php print_r($_GET['vpc_OrderInfo']);?>">                                
                                <button type="submit" class="button btn-small print-button uppercase">print Details</button>
                                </form>
                                <?php } else { ?>
                                <div class="message">
                                    <h2><span>Your Booking Order is <?=$booking_status?>.</span></h2>
                                    <p>please select hotel and book again.</p>                                    
                                </div>
                                <?php } ?>
                                
                            </div>
                            <hr>
                            <?php if($booking_code && $booking_id) { ?>
                            <h2>Traveler <span>Information</span></h2>
                            <dl class="term-description">
                                <dt>Booking code:</dt><dd><?=$booking_code?></dd>
                                <dt>Txn id:</dt><dd><?php echo $txn_id; ?></dd>
                                <dt>Booking status:</dt><dd><?=$booking_status?></dd>
                                <dt>Booking price:</dt><dd><?=round($booking_price,2)?></dd>
                                <dt>&nbsp;</dt><dd>&nbsp;</dd>
                                

                                <dt>Hotel name - </dt><dd><?=$detail->Name?></dd>
                                <dt>Address - </dt><dd><?=$Address?></dd>                                
                                <dt>ArrivalDate - </dt><dd><?=$detail->ArrivalDate?></dd>
                                <dt>DepartureDate - </dt><dd><?=$detail->DepartureDate?></dd>
                                <dt>GuestNationality - </dt><dd><?=$detail->GuestNationality?></dd>
                                <dt><?php $room = $detail->RoomDetails->RoomDetail;?></dd>
                                <dt><h4>RoomDetails </h4></dt>
                                <?php for($p=0;$p<$room->TotalRooms;$p++){?>
                                <dt><h5>Room-<?=$p+1?></h5></dt>
                                <dt>Type - </dt><dd><?=explode('|',$room->Type)[$p]?></dd>
                                <dt>Adults - </dt><dd><?=explode('|',$room->Adults)[$p]?></dd>
                                <dt>Children - </dt><dd><?=explode('|',$room->Children)[$p]?></dd>
                                
                                <p><?php $guests = $room->Guests[$p];?></p>
                                <dt><strong>Guests </strong></dt>
                                <?php foreach($guests as $g) { 
                                if(!$g->IsChild){ ?>
                                <dt>(Adult) Name - </dt><dd><?=$g->Salutation.' '.$g->FirstName.' '.$g->LastName?></dd>
                                <dt></dt><dd></dd>
                                <?php } else {?>
                                <dt>(Child) Name - </dt><dd><?=$g->Salutation.' '.$g->FirstName.' '.$g->LastName?></dd>                                
                                <dt>Age - </dt><dd><?=$g->Age?></dd>
                                <dt></dt><dd></dd>
                                <?php }?>
                                <?php } }?>
                                <dt>TotalRooms - </dt><dd><?=$room->TotalRooms?></dd>
                                <dt>TotalRate - </dt><dd><?=round($booking_price,2)?></dd>
                            </dl>
                            <?php } ?>
                            <hr>
                            <h2>Payment</h2>
                            <p>Praesent dolor lectus, rutrum sit amet risus vitae, imperdiet cursus neque. Nulla tempor nec lorem eu suscipit. Donec dignissim lectus a nunc molestie consectetur. Nulla eu urna in nisi adipiscing placerat. Nam vel scelerisque magna. Donec justo urna, posuere ut dictum quis.</p>
                            <br>
                            <p class="red-color">Payment is made by Credit Card Via Paypal.</p>
                            <hr>
                            <h2>View Booking <span>Details</span></h2>
                            <p>Praesent dolor lectus, rutrum sit amet risus vitae, imperdiet cursus neque. Nulla tempor nec lorem eu suscipit. Donec dignissim lectus a nunc molestie consectetur. Nulla eu urna in nisi adipiscing placerat. Nam vel scelerisque magna. Donec justo urna, posuere ut dictum quis.</p>
                            <br>
                            <a href="#" class="red-color underline view-link">https://www.travelo.com/booking-details/?=f4acb19f-9542-4a5c-b8ee</a>
                        </div>
        </div>
    	<div class="col-md-4">
        	<div class="hotel_summery">	
            	
                
                <div class="total-payment help_panel">
				<div class="total-payment__msg vat">							
						<h3 class="panel-title">
							Need help?
						</h3>
												
					<p>We would be more than happy to help you. Our team advisor are 24/7 at your service to help you.</p>
					<p class="need-help__meta need-help__meta--phone">
					<i class="fa fa-phone"></i> &nbsp;
						<a href="#" class="text-latin">+971 (4) 518 2000</a></p>
					<p class="need-help__meta need-help__meta--email">
						<i class="fa fa-envelope-o"></i> &nbsp;
							<a href="#" class="text-latin">support@demo.com</a>
					</p>
				</div>                        
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