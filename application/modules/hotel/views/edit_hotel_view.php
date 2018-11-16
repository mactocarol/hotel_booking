<?php $this->load->view('admin/includes/sidebar'); ?>
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Update Hotel
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo site_url('admin/dashboard');?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Update Hotel</li>
      </ol>
    </section>

        <!-- Main content -->
        <section class="content">
          
          <!-- Main row -->
          <div class="row">            
            <section class="col-lg-7 connectedSortable">
                <a href="<?php echo site_url('hotel/list_hotel_room/'.$hotel_data->id);?>"><button class="btn btn-danger">See Rooms</button></a>
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
            <!-- Left col -->
            <section class="col-lg-12 connectedSortable">
                
                <div class="box box-warning">
                    <div class="box-header with-border">
                      <h3 class="box-title">Update Hotel</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                      <form role="form" name="hotel_form" method="post" action="<?php echo site_url('hotel/edit/'.$hotel_data->id);?>">
                        <!-- text input -->
                        <section class="col-lg-5 connectedSortable">
                             <div class="form-group">
                                <label>Hotel Name (English)</label>
                                <input type="text" class="form-control" name="name" placeholder="Hotel Name" value="<?php echo isset($hotel_data->name)?$hotel_data->name:'';?>">
                             </div>
                             <div class="form-group">
                                <label>Description (English)</label>
                                <textarea class="form-control" name="description" rows="3" placeholder="Hotel Description"><?php echo isset($hotel_data->description)?$hotel_data->description:'';?></textarea>
                             </div>
                             <div class="form-group">
                                <label>Address (English)</label>
                                <textarea class="form-control" name="address" rows="2" placeholder="Address"><?php echo isset($hotel_data->address)?$hotel_data->address:'';?></textarea>
                             </div>
                             <div class="form-group">
                                <label>City (English)</label>
                                <input type="text" class="form-control" name="city" placeholder="City" value="<?php echo isset($hotel_data->city)?$hotel_data->city:'';?>">
                             </div>
                             <div class="form-group">
                                <label>Country (English)</label>
                                <input type="text" class="form-control" name="country" placeholder="Country" value="<?php echo isset($hotel_data->country)?$hotel_data->country:'';?>">
                             </div>
                             <div class="form-group">
                                <label>Status</label>
                                <select class="form-control select2" style="width: 100%;">
                                  <option value="1" <?php if($hotel_data->status == 1){ echo "selected"; } ?>>Activate</option>
                                  <option value="0" <?php if($hotel_data->status == 0){ echo "selected"; } ?>>Deactivate</option>                                  
                                </select>
                             </div>
                             <div class="box-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                             </div>
                        </section>



                        <section class="col-lg-1 connectedSortable">
                            <div class="vl warning"></div>
                        </section>
                        <section class="col-lg-5 connectedSortable">
                            <div class="form-group">
                                <label>Hotel Name (Arabic)</label>
                                <input type="text" class="form-control" name="name_ar" placeholder="Hotel Name" value="<?php echo isset($hotel_data->name_ar)?$hotel_data->name_ar:'';?>">
                             </div>
                            <div class="form-group">
                                <label>Description (Arabic)</label>
                                <textarea class="form-control" name="description_ar" rows="3" placeholder="Hotel Description"><?php echo isset($hotel_data->description_ar)?$hotel_data->description_ar:'';?></textarea>
                            </div>
                            <div class="form-group">
                                <label>Address (Arabic)</label>
                                <textarea class="form-control" name="address_ar" rows="2" placeholder="Address"><?php echo isset($hotel_data->address_ar)?$hotel_data->address_ar:'';?></textarea>
                             </div>
                             <div class="form-group">
                                <label>City (Arabic)</label>
                                <input type="text" class="form-control" name="city_ar" placeholder="City" value="<?php echo isset($hotel_data->city_ar)?$hotel_data->city_ar:'';?>">
                             </div>
                             <div class="form-group">
                                <label>Country (Arabic)</label>
                                <input type="text" class="form-control" name="country_ar" placeholder="Country" value="<?php echo isset($hotel_data->country_ar)?$hotel_data->country_ar:'';?>">
                             </div>
                        </section>
                        
                       
                       
                        
                       
                        
                        
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
  <style>
.vl {
border-left: 1px solid ;
min-height: 200px;
height:423px;
margin-left:50%;
border-color: #f39c12;
}
</style>