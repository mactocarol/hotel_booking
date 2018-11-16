
<?php $detail = $booking_detail->BookingRequest->Booking;
$booking_code = $booking_detail->BookingDetails->BookingCode;
$booking_status = $booking_detail->BookingDetails->BookingStatus;
$booking_price = $booking_detail->BookingDetails->BookingPrice;
//echo "<pre>";  print_r($detail->RoomDetails->RoomDetail->Guests);die;
//$BookingAfterPrice = $booking_detail->BookingDetails->BookingAfterPrice;
//$Difference = $booking_detail->BookingDetails->Difference;
//$name = $booking_detail->name;?>                                                    
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">    

    <title>Invoice | Hotel Booking</title>

    <link href="<?php echo site_url('assets');?>/css/bootstrap.min.css" rel="stylesheet">
    	

    <link href="<?php echo site_url('assets');?>/css/style.css" rel="stylesheet">
    <style>
		header {
    background: #F71430;
    padding: 15px;
    border-radius: 5px 5px 0 0;
}
.invoice_inner_panel {

    background: #f9f9f9;
    margin: 30px 0;
    border: 1px solid #eee; float:left; width:100%;
}
.invoice_content_outer {
    float: left;
    width: 100%;
}
.icon_left i,.invoice_left i {

    font-size: 25px;
    color: #919191;

}
.icon-right h3,.invoice_right h3 {

    margin: 0;
    font-size: 16px;
    font-weight: 500;
    text-transform: capitalize;

}
.icon-right h4,.invoice_right h4 {

    margin: 5px 0;
    font-size: 17px;
    text-transform: capitalize;

}
.content_invoice {

    padding: 20px;

}
.invoice_address .col-md-6 {

    padding: 20px;
    border-left: 1px solid #ebebeb;

}
.invoice_address .col-md-6.first{ border:none;}
.invoice_address {

    float: left;
    width: 100%;
    border-top: 1px solid #ececec;
    border-bottom: 1px solid #ececec;

}
.invoice_address .col-md-12 {

    padding: 15px 0;

}
.icon_left,.invoice_left {

    float: left;
    width: 10%;

}
.invoice_right {

    float: right;
    width: 89%;

}
.invoice_detail .col-md-4 {
    padding: 30px 20px;
    border-left: 1px solid #eee;
}
.invoice_detail .col-md-4.first{ border:none;}
.icon-right{ float:right; width:85%;}
header h2{ color:#fff; font-size:18px;}
.bill_table_outer td, .bill_table_outer th {

    border: 1px solid #e6e6e6;
    padding: 15px;

}
.bill_table_outer {

    float: left;
    width: 100%;

}
.bill_table_outer p {

    padding: 20px 0;

}

@media print {
    .col-md-6{ width: 50%; float:left;}
    .col-md-4{ width: 33.33%; float: left;}
    .btn-danger {
    color: #fff;
    background-color: #F71430 !important; 
    border-color: #F71430; color:#fff !important;
    display: none;
}
header {
    background-color: #F71430 !important;
    padding: 15px;
    border-radius: 5px 5px 0 0;
}
.invoice_inner_panel {
    background: #f9f9f9 !important;
    margin: 30px 0;
    border: 1px solid #eee;
    float: left;
    width: 100%;
}

.invoice_content_outer {
    float: left;
    width: 100%;
}
.icon_left i,.invoice_left i {

    font-size: 25px;
    color: #919191;

}
.icon-right h3,.invoice_right h3 {

    margin: 0;
    font-size: 16px;
    font-weight: 500;
    text-transform: capitalize;

}
.icon-right h4,.invoice_right h4 {

    margin: 5px 0;
    font-size: 17px;
    text-transform: capitalize;

}
.content_invoice {

    padding: 20px;

}
.invoice_address .col-md-6 {

    padding: 20px;
    border-left: 1px solid #ebebeb;

}
.invoice_address .col-md-6.first{ border:none;}
.invoice_address {

    float: left;
    width: 100%;
    border-top: 1px solid #ececec;
    border-bottom: 1px solid #ececec;

}
.invoice_address .col-md-12 {

    padding: 15px 0;

}
.icon_left,.invoice_left {

    float: left;
    width: 10%;

}
.invoice_right {

    float: right;
    width: 89%;

}
.invoice_detail .col-md-4 {
    padding: 30px 20px;
    border-left: 1px solid #eee;
}
.invoice_detail .col-md-4.first{ border:none;}
.icon-right{ float:right; width:85%;}
header h2{ color:#fff; font-size:18px;}
.bill_table_outer td, .bill_table_outer th {

    border: 1px solid #e6e6e6;
    padding: 15px;

}
.bill_table_outer {

    float: left;
    width: 100%;

}
.bill_table_outer p {

    padding: 20px 0;

}
header h2 {
    color: #fff !important;    
}
}
	</style>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>
<div class="invoice_outer_panel">
    <?php if($booking_code && $booking_id) { ?>
        	<div class="container">
            	<div class="invoice_inner_panel">
                	<header><div class="col-md-6"><img src="<?php echo site_url('assets');?>/images/logo.png"></div>
                    <div class="col-md-6"><h2 class="pull-right">INVOICE</h2></div>
                    </header>
                    <?php $room = $detail->RoomDetails->RoomDetail;?>
                    <div class="invoice_content_outer">
                    <section class="content_invoice">
                    	<p>		Dear <strong><?=ucwords($room->Guests[0]->Guest[0]->FirstName)?> <?=ucwords($room->Guests[0]->Guest[0]->LastName)?></strong>,
                        Your payment for your order has been placed and approved (order reference number: <?php echo $txn_id; ?>). </p>
                    </section>
                    <section class="invoice_address">
                    	<div class="col-md-6 first">
                        	<div class="invoice_left"><i class="fa fa-file-text"></i></div>
                            <div class="invoice_right">
                                 <dt>Hotel name - </dt><dd><?=$detail->Name?></dd>
                                <dt>Address - </dt><dd><?=$Address?></dd>                                
                                <dt>ArrivalDate - </dt><dd><?=$detail->ArrivalDate?></dd>
                                <dt>DepartureDate - </dt><dd><?=$detail->DepartureDate?></dd>
                                <dt>GuestNationality - </dt><dd><?=$detail->GuestNationality?></dd>
                                
                            </div>                            
                        </div>
                        <div class="col-md-6">
                        	<div class="invoice_left"><i class="fa fa-home"></i></div>
                            <div class="invoice_right">
                                <dt>Booking Code - </dt><dd><?=$booking_code?></dd>
                            </div>
                            <div class="invoice_right">
                                <dt>Total Room - </dt><dd><?=$room->TotalRooms?></dd>
                                <dt>Booking Status - </dt><dd><?=$booking_status?></dd>
                            </div>
                        </div>
                    </section>
                    
                    <section class="invoice_detail">
                    	<div class="col-md-4 first">
                        	<div class="icon_left"><i class="fa fa-barcode"></i></div>
                            <div class="icon-right"><h3> Order No</h3>
                            	<h4><?php echo $txn_id; ?></h4></div>
                        </div>
                        <div class="col-md-4">
                        	<div class="icon_left"><i class="fa fa-barcode"></i></div>
                            <div class="icon-right"><h3> Order Date</h3>
                            	<h4>Jun 18, 2073</h4></div>
                        </div>
                        <div class="col-md-4">
                        	<div class="icon_left"><i class="fa fa-barcode"></i></div>
                            <div class="icon-right"><h3>Total Amount</h3>
                            	<h4><?=round($booking_price,2)?> AED</h4></div>
                        </div>
                    </section>
                    <section class="bill_table_outer">
                        <h5>Room Detail</h5>
                        
                    	<table border="1" width="100%">
                        	<tr><th>S. No.</th><th>Type</th><th>Adults</th><th>Children</th><th>Guests</th></tr>
                            <?php for($p=0;$p<$room->TotalRooms;$p++){?>
                            <tr>
                            	<td>Room - <?=$p+1?></td>
                                <td><?=explode('|',$room->Type)[$p]?></td>
                                <td><?=explode('|',$room->Adults)[$p]?></td>
                                <td><?=explode('|',$room->Children)[$p]?></td>
                                <?php $guests = $room->Guests[$p]->Guest;?>
                                <td>
                                <?php foreach($guests as $g) { ?>
                                    <?php if(isset($g->IsChild)){ ?>
                                    <?=$g->Salutation.' '.$g->FirstName.' '.$g->LastName?> (<?=$g->Age?>) yr.<br>
                                    <?php } else { ?>
                                    <?=$g->Salutation.' '.$g->FirstName.' '.$g->LastName?><br>
                                    <?php } ?>
                                <?php } ?>
                                </td>
                            
                            </tr>
                            <?php } ?>                                                          
                        </table>
                        
                        
                        <div class="col-md-12">
                            <br>
                            <button class="btn btn-danger"><a href="<?php echo site_url();?>" style="color:#fff;">Back to Site</a></button>
                            <button class="btn btn-danger" onclick="myFunction()">Print</button>
                        	<p><strong>Important: </strong>Please read all terms and polices on for any issues. </p>
                        </div>
                    </section>
                </div></div>
            </div>
            <?php }else { echo "<h3>Order Failed</h3>";} ?>
        </div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="<?php echo site_url('assets');?>/js/bootstrap.min.js"></script>
<script>
function myFunction() {
    window.print();
}

</script>
  </body>
</html>