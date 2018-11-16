<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Hotel Booking | Rooms </title>

	<style type="text/css">

	::selection { background-color: #E13300; color: white; }
	::-moz-selection { background-color: #E13300; color: white; }

	body {
		background-color: #fff;
		margin: 40px;
		font: 13px/20px normal Helvetica, Arial, sans-serif;
		color: #4F5155;
	}

	a {
		color: #003399;
		background-color: transparent;
		font-weight: normal;
	}

	h1 {
		color: #444;
		background-color: transparent;
		border-bottom: 1px solid #D0D0D0;
		font-size: 19px;
		font-weight: normal;
		margin: 0 0 14px 0;
		padding: 14px 15px 10px 15px;
	}

	code {
		font-family: Consolas, Monaco, Courier New, Courier, monospace;
		font-size: 12px;
		background-color: #f9f9f9;
		border: 1px solid #D0D0D0;
		color: #002166;
		display: block;
		margin: 14px 0 14px 0;
		padding: 12px 10px 12px 10px;
	}

	#body {
		margin: 0 15px 0 15px;
	}

	p.footer {
		text-align: right;
		font-size: 11px;
		border-top: 1px solid #D0D0D0;
		line-height: 32px;
		padding: 0 10px 0 10px;
		margin: 20px 0 0 0;
	}

	#container {
		margin: 10px;
		border: 1px solid #D0D0D0;
		box-shadow: 0 0 8px #D0D0D0;
	}
	</style>
	
	 <!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="<?php echo base_url();?>/assets/css/bootstrap.min.css">
	
	<!-- jQuery library -->
	<script src="<?php echo base_url();?>/assets/js/jquery.min.js"></script>
	<script src="http://demos.codexworld.com/upload-multiple-images-using-jquery-ajax-php/jquery.form.js"></script>
	<script src="<?php echo base_url();?>/assets/js/bootstrapValidator.min.js"> </script>
	<!-- Latest compiled JavaScript -->
	<script src="<?php echo base_url();?>/assets/js/bootstrap.min.js"></script> 
</head>
<body>

<div id="container">
	<?php
	if($this->session->flashdata('item')) {
		$items = $this->session->flashdata('item');
		if($items->success){
		?>
			<div class="alert alert-success">
					<strong>Success!</strong> <?php print_r($items->message); ?>
			</div>
		<?php
		}else{
		?>
			<div class="alert alert-danger">
					<strong>Error!</strong> <?php print_r($items->message); ?>
			</div>
		<?php
		}
	}
	?>
	<div id="body">
		<form method="post" id="add_hotel_form" enctype="multipart/form-data" action="<?php echo site_url('admin/rooms/add_room'); ?>">
			<fieldset>
			  <legend>Add Room</legend>			  
			 <div class="form-group">
				<label>Hotel</label>				
				<select class="form-control" id="hotel" name="hotel">
					<option value="">Select hotel</option>
					<?php foreach($hotel_list as $row) { ?>
					<option value="<?php echo $row->id; ?>"><?php echo $row->name; ?></option>
					<?php } ?>
				</select>				
			  </div>
			 <div class="form-group">
				<label>Room No.</label>				
				<input class="form-control" id="room_no" name="room_no" placeholder="Room Number" type="text" value="<?php echo set_value('room_no');?>" >				
			  </div>			 
			 <div class="form-group">
				<label>Description</label>
				<textarea class="form-control" id="description" name="description" rows="10" cols="10"></textarea>
			  </div>
			 <div class="form-group">
				<label>Price</label>				
				<input class="form-control" id="price" name="price" placeholder="Room Price" type="text" value="" >				
			  </div>
			 <div class="form-group">
				<label>Room Type</label>
				<select class="form-control" id="room_type" name="room_type">
					<option value="">Select Room Type</option>
					<?php foreach($room_type as $row) { ?>
					<option value="<?php echo $row->id; ?>"><?php echo $row->type; ?></option>
					<?php } ?>
				</select>
			  </div>
			  <div class="form-group">
				<label>Max No. of person</label>				
				<input class="form-control" id="no_of_person" name="no_of_person" placeholder="Number of person" type="text"  >				
			  </div>	
			  <div class="form-group">
				<label>Floor</label>
				<input class="form-control" id="floor" name="floor" placeholder="Floor" type="text">
			  </div>
			   <div class="form-group">
				<label>Check IN Time</label>
				<input class="form-control" id="checkin" name="checkin" placeholder="Check In Time" type="text">
			  </div>
			    <div class="form-group">
				<label>Check Out Time</label>
				<input class="form-control" id="chckout" name="checkout" placeholder="Check Out Time" type="text">
			  </div>
			  <div class="form-group">
				<label>Amenities</label>
				<select class="form-control" id="amenities" name="amenities[]" multiple>
					<?php foreach($amenities as $row) { ?>
					<option value="<?php echo $row->id; ?>"><?php echo $row->amenity_name; ?></option>
					<?php } ?>					
				</select>
			  </div>
			  <div class="form-group">
				<label>Image</label>
				<input id="image" name="image[]" type="file" multiple>
				<span><small>You can Upload multiple images</small></span>
			  </div>
			  <button type="submit" class="btn btn-primary">Submit</button>
			</fieldset>
		  </form>
	</div>
	
	<script>
		$(document).ready(function() {
			$('#add_hotel_form').bootstrapValidator({
				//container: '#messages',
				feedbackIcons: {
					valid: 'glyphicon glyphicon-ok',
					invalid: 'glyphicon glyphicon-remove',
					validating: 'glyphicon glyphicon-refresh'
				},
				fields: {
					hotel: {
						validators: {
							notEmpty: {
								message: 'Please select Hotel name'
							}
						}
					}, 					
					description: {
						validators: {
							notEmpty: {
								message: 'The Description is required and cannot be empty'
							}
						}
					},
					room_type: {
						validators: {
							notEmpty: {
								message: 'Please select room type'
							}
						}
					},
					price: {
						validators: {
							notEmpty: {
								message: 'The Price is required and cannot be empty'
							}
						}
					},
					
					image: {
						validators: {
							notEmpty: {
								message: 'please select atleast one image.'
							}
						}
					}
				}
			});
		});
		</script>
	<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?></p>
</div>

</body>
</html>