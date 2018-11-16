<?php $this->load->view('admin/includes/sidebar'); ?>
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Add Room
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo site_url('admin/dashboard');?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Add Room</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      
      <!-- Main row -->
      <div class="row">
        <section class="col-lg-1 connectedSortable">
        </section>
        <!-- Left col -->
        <section class="col-lg-10 connectedSortable">
            
             <!-- general form elements disabled -->
			 <?php
				if(isset($message)) {					
					if($success){
					?>
					  <div class="alert alert-dismissible alert-success">
						<button type="button" class="close" data-dismiss="alert">&times;</button>
						<strong>Success!</strong> <?php print_r($message); ?>
					  </div>						
					<?php
					}else{
					?>
						<div class="alert alert-dismissible alert-danger">
							<button type="button" class="close" data-dismiss="alert">&times;</button>
							<strong>Error!</strong> <?php print_r($message); ?>
						</div>						
					<?php
					}
				}
				?>
          <div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title">Add Room</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <form method="post" id="add_room_form" enctype="multipart/form-data" action="<?php echo site_url('admin/rooms/add_room'); ?>">
                <!-- text input -->
				<div class="form-group">
                    <label>Hotel</label>
                    <select class="form-control select2" style="width: 100%;" id="hotel" name="hotel">                      
					  <?php foreach($hotel_list as $row) { ?>
						  <option value="<?php echo $row->id; ?>"><?php echo $row->name; ?></option>
					  <?php } ?>
                    </select>
                </div>                                 
                <div class="form-group">
                  <label>Room No.</label>
                  <input type="text" class="form-control" id="room_no" name="room_no" placeholder="Room Number">
                </div>				                            
                <div class="form-group">
                  <label>Description</label>
                  <textarea class="form-control" id="description" name="description" rows="10" cols="10"></textarea>
                </div>               
				<div class="form-group">
                  <label>Price</label>
                  <input type="text" class="form-control" id="price" name="price" placeholder="Price">
                </div>
				<div class="form-group">
                    <label>Room Type</label>
                    <select class="form-control select2" style="width: 100%;">                      
					  <?php foreach($room_type as $row) { ?>
						<option value="<?php echo $row->id; ?>"><?php echo $row->type; ?></option>
					  <?php } ?>
                    </select>
                </div>
				<div class="form-group">
                  <label>Max No. of person</label>
                  <input type="text" class="form-control" id="no_of_person" name="no_of_person" placeholder="Number of person">
                </div>
				<div class="form-group">
                  <label>Floor</label>
                  <input type="text" class="form-control" id="Floor" name="floor" placeholder="Floor No.">
                </div>
				<div class="form-group">
                  <label>Check IN Time</label>
                  <input type="text" class="form-control" id="checkin" name="checkin" placeholder="Check In Time">
                </div>
				<div class="form-group">
                  <label>Check OUT Time</label>
                  <input type="text" class="form-control" id="chckout" name="checkout" placeholder="Check Out Time" type="text">
                </div>
				<div class="form-group">
					<label>Amenities (that included free)</label>
					<select class="form-control select2" multiple="multiple" data-placeholder="Select amenities"
							style="width: 100%;" id="amenities" name="amenities[]">
							<?php foreach($amenities as $row) { ?>
								<option value="<?php echo $row->id; ?>"><?php echo $row->amenity_name; ?></option>
						   <?php } ?>
					</select>
				  </div>
				<div class="form-group">
                  <label>Hotel Images</label>
                  <input type="file" class="form-control" id="image" name="image[]" multiple>
				  <span><small>You can Upload multiple images</small></span>
                </div>             
                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

        </section>
        <!-- /.Left col -->
      </div>
      <!-- /.row (main row) -->

    </section>
    <!-- /.content -->
  </div>
	
	
 