<section class="room_detail_panel">
    <?php if(!$error) {?>
	<div class="container">
    	<div class="col-md-8">
        
		<br><br>
	<?php $detail = $booking_detail->PreBookingRequest->PreBooking;
        //echo "<pre>";  print_r($detail->RoomDetails->RoomDetail); die;
        $BookingAfterPrice = $booking_detail->PreBookingDetails->BookingAfterPrice;
        $Difference = $booking_detail->PreBookingDetails->Difference;
        $name = $booking_detail->name;
        $address = $booking_detail->address;
        $image = $booking_detail->image;
        $room = $detail->RoomDetails->RoomDetail;
        $cancel = $detail->CancellationInformations->CancellationInformation;
        $Adults = explode('|',$room->Adults);
        $Children = explode('|',$room->Children);
        //echo "<pre>"; print_r(explode('|',$room->Adults));die;?>
        <?php if($booking_detail->PreBookingDetails->Status != 'Falses') { ?>
                <?php  if($this->session->userdata('is_logged_in')){ ?>
                 
                        <form class="booking-form" action="<?php echo base_url().'pre_booking/buy/'; ?>" method="post">
                            <?php $k=0; foreach(explode('|',$room->Adults) as $rows){?>
                            <h2>Room <?=$k+1?></h2>
                                <?php for($i=0; $i< $Adults[$k] ; $i++){?>
                                <div class="form_box">
                                 <h2 class="book_sum_title">Adult <?=$i+1?> Info</h2>
                                 
                                     <div class="col-md-12 form-group">
                                         <div class="row">
                                                 <div class="col-md-2">
                                                     <select class="form-control" name="salutation[]" >
                                                         <option>Mr</option>
                                                         <option>Mrs</option>
                                                         <option>Ms</option>
                                                     </select>
                                                 </div>
                                                 <div class="col-md-5">
                                                     <input placeholder="First Name"  name="fname[]" class="form-control" type="text" required>
                                                 </div>
                                                 <div class="col-md-5">
                                                     <input placeholder="last Name" name="laname[]" class="form-control" type="text" required>
                                                 </div>
                                                 <input type="hidden" name="is_child[]" value="No">
                                                 <input placeholder="enter your age" name="child_age[]" class="form-control" type="hidden">
                                         </div>
                                     </div>
                                     
                                 </div>
                                <?php } ?>
                                <?php for($i=0; $i< $Children[$k] ; $i++){?>
                                <div class="form_box">
                                 <h2 class="book_sum_title">Child <?=$i+1?> Info</h2>
                                 
                                     <div class="col-md-12 form-group">
                                         <div class="row">
                                                 <div class="col-md-2">
                                                     <select class="form-control" name="salutation[]" >
                                                         <option>Mr</option>
                                                         <option>Mrs</option>
                                                         <option>Ms</option>
                                                     </select>
                                                 </div>
                                                 <div class="col-md-5">
                                                     <input placeholder="First Name"  name="fname[]" class="form-control" type="text" required>
                                                 </div>
                                                 <div class="col-md-5">
                                                     <input placeholder="last Name" name="laname[]" class="form-control" type="text" required>
                                                 </div>
                                         </div>
                                     </div>
                                     <input type="hidden" name="is_child[]" value="Yes">
                                     
                                     <div class="col-md-12 form-group">			
                                         <input placeholder="enter your age" name="child_age[]" class="form-control" type="text" required>			
                                     </div>
                             
                                 </div>
                                <?php } ?>
                        <?php $k++; } ?>
                        
                        
                            <input name="SearchSessionId" type="hidden" value="<?=$detail->SearchSessionId?>">
                            <input name="ArrivalDate" type="hidden" value="<?=$detail->ArrivalDate?>">
                            <input name="DepartureDate" type="hidden" value="<?=$detail->DepartureDate?>">
                            <input name="GuestNationality" type="hidden" value="<?=$detail->GuestNationality?>">
                            <input name="CountryCode" type="hidden" value="<?=$detail->CountryCode?>">
                            <input name="City" type="hidden" value="<?=$detail->City?>">
                            <input name="Address" type="hidden" value="<?=$address?>">
                            <input name="Currency" type="hidden" value="<?=$detail->Currency?>">
                            <input name="Adults" type="hidden" value="<?=$room->Adults?>">
                            <input name="Children" type="hidden" value="<?=$room->Children?>">
                            <input name="ChildrenAges" type="hidden" value="<?=$room->ChildrenAges?>">                            
                            <input name="hotel_name" type="hidden" value="<?=$name?>">
                            <input name="room_type" type="hidden" value="<?=$room->Type?>">
                             <input name="total_amt" type="hidden" value="<?=$room->TotalRate?>">
                             <input name="final_amt" type="hidden" value="<?=round($BookingAfterPrice,2)?>">
                             <input name="TotalRooms" type="hidden" value="<?=$room->TotalRooms?>">
                                 <input name="item_number" type="hidden" value="<?=$detail->HotelId?>">
                                 <input name="booking_key" type="hidden" value="<?=$room->BookingKey?>">                
                        <br><br><button class="btn btn-danger">Pay Now</button><br><br><br><br><br><br>
                         </form>
                         <br>
                <?php } else { ?>
                <div class="col-md-6">
                                <div class="login_for_panel">
                                    <h2><?php echo $this->lang->line('login'); ?></h2>
                                    <?php if($this->session->flashdata('validate_credentials')) : ?>
                                    <div class="alert alert-danger">
                                            <strong><?php echo $this->session->flashdata('validate_credentials'); ?></strong> 
                                    </div>
                                <?php endif; ?>
                                    <table class="table-responsive table table_text">
        
                                        <tbody>
                                            <form action="<?= base_url ('pre_booking/set_validation');?>" method="post">
                                            <tr>
                                                <td><div class="input_wrap">
                                                    <input type="text" class="login_input" placeholder="<?php echo $this->lang->line('enter_Email'); ?>" name="email" value="<?= $this->input->post('email'); ?>"><i class="fa fa-user"></i></div>
                                                <?= form_error('email'); ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><div class="input_wrap">
                                                    <input type="password" class="login_input" placeholder="<?php echo $this->lang->line('enter_password'); ?>" name="password"> <i class="fa fa-lock"></i></div>
                                                    <?= form_error('password'); ?>
                                                    </td>
                                            </tr>
                                            <tr><td><div class="pull-left"><input type="checkbox" name="remember"><?php echo $this->lang->line('Remember_Me'); ?></div> <a href="<?= base_url('forgot');?>" class="pull-right"><?php echo $this->lang->line('Forgot_Password'); ?></a></td></tr>
                                            <tr>
                                                <td><input type="submit" class="login_btn" value="<?php echo $this->lang->line('login'); ?>">
                                                 
                                            </td>
                                                </td>
                                            </tr>
                                            </form>
                                            <tr><td> <h3><?php echo $this->lang->line('or_login_with'); ?></h3></td></tr>
        
                                            <tr><td>
                                                <div class="social_icon_login">
                                                    <a href="" class="facebook"><i class="fa fa-facebook"> </i> facebook</a>
                                                    <a href="<?php echo $this->googleplus->loginURL(); ?>" class="google"><i class="fa fa-google-plus"> </i> google</a></div></td>
                                                </tr>
                                                <tr><td><p><?php echo $this->lang->line('Not_a_member_yet?'); ?> <a href="<?= base_url('registration'); ?>"><?php echo $this->lang->line('Sign-up_Now!'); ?></a></p></td></tr>
        
                                            </tbody></table>
                                        </div>
                                    </div>
                <?php } ?>
    <?php } else { ?>
    <div class="col-md-6">
        <div class="login_for_panel">
            <h3>Room not Available  </h3>  <br>                    
            <h4>Reason : <?php echo $booking_detail->PreBookingDetails->Reason; ?></h4> <br>
            <h6>Please book another room , from <a href="<?php echo site_url('hotel_detail/index/'.$detail->HotelId);; ?>">here</a></h6>
        </div>
    </div>
    <?php } ?>
	<div class="total-payment">                		
				<div class="total-payment__title">
                    
					<h4 class="no-margin">Cancellation Policy</h4>
				</div>
				<div class="form-group">
					<?php foreach($cancel as $c){?>
        <p>Cancellation From - <strong><?=$c->StartDate?></strong> to - <strong><?=$c->EndDate?></strong></p>
        <p>ChargeAmount would be - <strong><?=$c->ChargeAmount?> AED</strong></p>
        <?php } ?>
        <p><strong>Note</strong> - <?php echo $detail->CancellationInformations->Info;?></p>
				</div>
		    </div>
    	<br>
	<br>
	<!--<div class="form_box">
		<h2 class="book_sum_title">Booking summary</h2>
			<form class="booking-form">		
				<div class="col-md-12 form-group">
					<input placeholder="enater Card holder name" class="form-control" type="email">
				</div>

				<div class="col-md-12 form-group">
					<input placeholder="enatr Card number" class="form-control" type="email">
				</div>

				<div class="col-md-12 form-group">
					<div class="row">
							<div class="col-md-6">
								<select class="form-control">
									<option selected disabled>Expiration date</option>
									<option>lorem ipsum</option>
									<option>lorem ipsum</option>
								</select>
							</div>
							<div class="col-md-6">
								<select class="form-control">
									<option>Expiration Year</option>
									<option>lorem ipsum</option>
									<option>lorem ipsum</option>
								</select>
							</div>				
					</div>
				</div>
				
				<div class="col-md-12 form-group">
					<input placeholder="Security code" class="form-control" type="text">
				</div>
				
				
				
				
				<br>
				
			</form>
	</div>-->
	
	<br>
	<br>
	<br>
	
	<div class="blocks">
					<li>
						<p class="display-table">
							<span class="display-table-cell">
								<img src="<?php echo base_url();?>assets/images/Untitled-1.png" class="margin-right-sm" alt=""> 
							</span> 
							<span class="display-table-cell credit-card">
								<span class="credit-card__security-text">100% Secure</span> 
								We use 128-bit SSL encryption. </span> 
						</p>
					</li>
					<li>
						<p class="display-table">
							<span class="display-table-cell">
								<img src="<?php echo base_url();?>assets/images/Untitled-2.png" class="margin-right-sm" alt=""> 
							</span> 
							<span class="display-table-cell credit-card">
								<span class="credit-card__security-text">Trusted worldwide</span> 
								 We do not store or view your card data.  </span> 
						</p>
					</li>
					<li>
						<p class="display-table">
							<span class="display-table-cell">
								<img src="<?php echo base_url();?>assets/images/Untitled-3.png" class="margin-right-sm" alt=""> 
							</span> 
							<span class="display-table-cell credit-card">
								<span class="credit-card__security-text">Easy payment</span> 
								 We accept the following payment methods:  </span> 
						</p>
					</li>
				</div>

</div>

    	<div class="col-md-4">
		   <br>
		   <br>
        	<div class="booking_summery">
				<div class="booking_summery_inner">
					<h2 class="book_sum_title text-center">Booking summary</h2>
					<div class="hotel_padding">
						<div class="hotel_details_panel">	
							<div class="col-md-8 col-md-offset-2"><img src="<?=$image?>"></div>
							<br>
							<div class="col-md-12 text-center"><br>
								<h4> <?=$name?></h4>
								<form> <input type="text" class="rating rating-loading" value="4" data-size="xs" title=""></form>
								<p class="text-primary"><i class="fa fa-map-marker"> </i> &nbsp <?=$address?></p>
							</div>
						</div>
						<div class="hotel_details_panel__checkout">
							<ul class="no-margin no-padding">
								<li><b> Check-in date</b><span class="pull-right"><?=$detail->ArrivalDate?></span></li>
								<li><b> Check-out date</b><span class="pull-right"><?=$detail->DepartureDate?></span></li>
								<li><b> GuestNationality</b> <span class="pull-right"><?=$detail->GuestNationality?></span></li>
							</ul>
						</div>
					</div>
				</div>
            </div>
            
            	<div class="booking_summery_second">
					<div class="">
						<h2 class="book_sum_title">Selected rooms</h2>
						<ul>
							<div class="room-info ">
                                <?php $k=0; foreach(explode('|',$room->Type) as $val){?>
								<li>									
									<div class="room-includes">
										<i class="fa fa-hotel"></i> &nbsp
										<span><?=substr(explode('|',$room->Type)[$k],0,20)?></span>
										<span class="number-of-people pull-right"><?=explode('|',$room->Adults)[$k]?><span> Adults </span></span>										
									</div>
									<div class="room-includes">
										<i class="fa fa-check"></i> &nbsp
										<span></span>
										<span class="number-of-people pull-right"><?=explode('|',$room->Children)[$k]?>
										<span>Children </span></span>
									</div>
								</li>
                                <?php $k++; } ?>
							
								<li>									
									<div class="room-includes">
										
										<span></span>
										<span class="number-of-people pull-right"></span>										
									</div>									
								</li>
                                <li>									
									<div class="room-includes">
										
										<span>Total Rooms</span>
										<span class="number-of-people pull-right"><?=$room->TotalRooms?></span>										
									</div>									
								</li>
							</div>
						</ul>
						<div class="hotel-policy">
							<a class="cancellation-link">
								<i class="fa fa-question-circle text-primary"></i> &nbsp View cancellation policy</a>
						</div>
					</div>
                </div>
                
			<div class="total-payment">
				<div class="total-payment__msg vat">
					<div class="tooltip-container">Total <a class="tooltip-container"> <i class="fa fa-question-circle"></i></a>
						<span class="pull-right tourfee_price"><?=round(explode('|',$room->TotalRate)[0] * count(explode('|',$room->TotalRate)),2);?> AED</span>
					</div>
                    <div class="tooltip-container">Additional <a class="tooltip-container"> <i class="fa fa-question-circle"></i></a>
						<span class="pull-right tourfee_price"><?=$room->Difference?> AED</span>
					</div>
				</div>
				<div class="total-payment__title">
					<div class="pull-left">
						<h4 class="no-margin">Total (incl. VAT)</h4>
					</div>
					<h2 class="pull-right color"><?php echo round($BookingAfterPrice,2); ?> AED</h2>
				</div>
			</div>				            
			<div class="total-payment">                		
				<div class="total-payment__title">
					<h4 class="no-margin">Do you have a voucher code?</h4>
				</div>
				<div class="form-group">
					<div class="input-group btn-block">
						<input id="payment-apply-coupon-code-input" placeholder="Enter Voucher Code" class="form-control">
					</div>
				</div>
		    </div>
					   
			<div class="total-payment">
				<div class="total-payment__msg vat">							
						<h3 class="panel-title">
							<span class="text-chambray font-weight-600"> Need help?</span>
						</h3>
						<hr>							
					<p>Our team is available 24/7.</p>
					<p class="need-help__meta need-help__meta--phone">
					<i class="fa fa-phone"></i> &nbsp
						<a href="#" class="text-latin">+971 (4) 518 2000</a></p>
					<p class="need-help__meta need-help__meta--email">
						<i class="fa fa-envelope-o"></i> &nbsp
							<a href="#" class="text-latin">support@demo.com</a>
					</p>
				</div>                        
			</div>					   
		</div>
        	
        </div>
    </div>
    <?php }else { ?>
    <h3>Something went wrong, please try again.</h3>
    <?php } ?>
</section>