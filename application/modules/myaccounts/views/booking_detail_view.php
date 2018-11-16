<section class="profile_wrap">
    <div class="container">
        <?php include_once('side_bar.php'); ?>
        <div class="col-md-9">
            <div class="registration_wrap_inner">
                <?php if($this->session->flashdata('password_sucess') || $this->session->flashdata('sucess')) : ?>
                    <div class="alert alert-success">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong><?php echo $this->session->flashdata('password_sucess'); ?><?php echo $this->session->flashdata('sucess'); ?><?php echo $this->session->flashdata('image') ?></strong> 
                    </div>
                <?php endif; ?>
                <?php if($this->session->flashdata('image')) : ?>
                    <div class="alert alert-danger" role="alert">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong><?php echo $this->session->flashdata('image') ?></strong> 
                    </div>
                <?php endif; ?>
                <a href="<?php echo site_url('myaccounts/booking_history/');?>"><button class="btn btn-danger">Back</button></a>
                <a href="<?php echo site_url('myaccounts/cancel_order/'.$booking_id);?>" onclick=" var c = confirm('Are you sure want to cancel this order?'); if(!c) return false;"><button class="btn btn-danger">Cancel Order</button></a>
                <form id="profile_form" action="<?= base_url('myaccounts/change_profile');?>" method="post">
                    <table class="table-bordered positining ">
                        <tr style="text-align: center;">                            
                            <td >Hotel</td>
                            <td><?php echo isset($hotelinfo->HotelName)  ? $hotelinfo->HotelName : ''; ?></td>                            
                        </tr>
                        
                        <tr style="text-align: center;">
                            <td >Check In</td>
                            <td><?php echo isset($booking->CheckIn)  ? $booking->CheckIn : ''; ?></td>                            
                        </tr>
                        <tr style="text-align: center;">
                            <td >Check Out</td>
                            <td><?php echo isset($booking->CheckOut)  ? $booking->CheckOut : ''; ?></td>                            
                        </tr>
                        <tr style="text-align: center;">
                            <td >Booking Date</td>
                            <td><?php echo isset($booking->Bookingdate)  ? $booking->Bookingdate : ''; ?></td>                            
                        </tr>
                        <tr style="text-align: center;">                            
                            <td >Hotel Description</td>
                            <td><?php echo isset($hotelinfo->Hoteldescription)  ? $hotelinfo->Hoteldescription : ''; ?></td>                            
                        </tr>
                        <tr style="text-align: center;">                            
                            <td >Hotel Address</td>
                            <td><?php echo isset($hotelinfo->HotelAddress)  ? $hotelinfo->HotelAddress : ''; ?></td>                            
                        </tr>
                        <tr style="text-align: center;">                            
                            <td >Hotel City</td>
                            <td><?php echo isset($hotelinfo->HotelCity)  ? $hotelinfo->HotelCity.",".$hotelinfo->HotelCountryCode : ''; ?></td>                            
                        </tr>
                        <tr style="text-align: center;">                            
                            <td >Booking Amount</td>
                            <td><?php echo isset($RateInfo->TotalRate)  ? $RateInfo->TotalRate." ".$RateInfo->CurrencyCode : ''; ?></td>                            
                        </tr>
                    </table>
                    <br>
                    <hr>
                    <table class="table-bordered positining ">
                        <tr style="text-align: center;">                            
                            <td >Room Type</td>
                            <td><?php echo isset($RoomInfo->RoomType)  ? $RoomInfo->RoomType : ''; ?></td>                            
                        </tr>
                        
                        <tr style="text-align: center;">
                            <td >No Of Adult</td>
                            <td><?php echo isset($RoomInfo->NoOfAdult)  ? $RoomInfo->NoOfAdult : ''; ?></td>                            
                        </tr>
                        <tr style="text-align: center;">
                            <td >No Of Child</td>
                            <td><?php echo isset($booking->NoOfChild)  ? $booking->NoOfChild : ''; ?></td>                            
                        </tr>
                        <?php foreach($guestinfo->GuestInfo as $guest){ ?>
                        <tr style="text-align: center;">
                            <td >Guest</td>
                            <td><?php echo isset($guest->Salutation)  ? $guest->Salutation." ".$guest->FirstName." ".$guest->LastName." (".$guest->PaxType.")" : ''; ?></td>                            
                        </tr>
                        <?php } ?>
                    </table>
                    <br>
                    <hr>
                    Cancellation Policy
                    <table class="table-bordered positining ">
                        <tr style="text-align: center;">                            
                            <td >INFO</td>
                            <td><?php echo isset($cancellationinfo->CancellationPolicyInfo)  ? $cancellationinfo->CancellationPolicyInfo : ''; ?></td>                            
                        </tr>
                        
                        <tr style="text-align: center;">
                            <td >Deadline date</td>
                            <td><?php echo isset($cancellationinfo->CancellationPolicyInfoExtra->Deadline_date)  ? date("d-M-Y h:i:s",strtotime($cancellationinfo->CancellationPolicyInfoExtra->Deadline_date)) : ''; ?></td>                            
                        </tr>
                        <tr style="text-align: center;">
                            <td >Price Charged</td>
                            <td><?php echo isset($cancellationinfo->CancellationPolicyInfoExtra->Price)  ? $cancellationinfo->CancellationPolicyInfoExtra->Price : ''; ?></td>                            
                        </tr>                                            
                    </table>
                </form>
            </div>
        </div>
    </div>
</section>

