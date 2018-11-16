<?php $this->load->view('admin/includes/sidebar'); ?>
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Add Room Amenities
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo site_url('admin/dashboard');?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Add Room Amenities</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- Left col -->
        <section class="col-lg-7 connectedSortable">
         
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
            
            
        </section>
        
        <section class="col-lg-7 connectedSortable">
         
			<form method="post" id="add_hotel_form" enctype="multipart/form-data" action="<?php echo site_url('csv_upload/add_room_amenity'); ?>">
                <!-- text input -->
                 <div class="form-group">
                  <label>Click to add/update Room Amenities</label>
                  <input type="file" name="file" />
                  <input type="hidden" name="add">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Add/Update Room Amenities</button>
                </div>
              </form>
        </section>
        <!-- /.Left col -->
      </div>
      <!-- /.row (main row) -->

    </section>
    <!-- /.content -->
  </div>
  