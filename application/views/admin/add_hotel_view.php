<?php $this->load->view('admin/includes/sidebar'); ?>
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Add Hotel
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo site_url('admin/dashboard');?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Add Hotel</li>
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
              <h3 class="box-title">Add Hotel</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <form method="post" id="add_hotel_form" enctype="multipart/form-data" action="<?php echo site_url('admin/hotel/add_hotel'); ?>">
                <!-- text input -->
                <div class="form-group">
                  <label>Hotel Name</label>
                  <input type="text" class="form-control" id="name" name="name" placeholder="Hotel Name">
                </div>
				<div class="form-group">
                  <label>Hotel Logo</label>
                  <input type="file" class="form-control" id="logo" name="logo">
                </div>                               
                <div class="form-group">
                  <label>Description</label>
                  <textarea class="form-control" id="description" name="description" rows="10" cols="10"></textarea>
                </div>
                <div class="form-group">
                  <label>Address</label>
                  <textarea class="form-control" id="address" name="address" rows="5" cols="5"></textarea>
                </div>
				<div class="form-group">
                  <label>City</label>
                  <input type="text" class="form-control" id="city" name="city" placeholder="City">
                </div>
				<div class="form-group">
                  <label>Country</label>
                  <input type="text" class="form-control" id="country" name="country" placeholder="Country">
                </div>
				<div class="form-group">
                  <label>Phone</label>
                  <input type="text" class="form-control" id="phone" name="phone" placeholder="Phone No.">
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
	
	
 