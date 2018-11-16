<?php $this->load->view('admin/includes/sidebar'); ?>
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Update Room
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo site_url('admin/dashboard');?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Update Room</li>
      </ol>
    </section>

        <!-- Main content -->
        <section class="content">
          
          <!-- Main row -->
          <div class="row">            
            <section class="col-lg-7 connectedSortable">
                <a href="<?php echo site_url('hotel/list_hotel_room/'.$room_data->hid);?>"><button class="btn btn-danger">Back</button></a>
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
                      <h3 class="box-title">Update Room</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                      <form role="form" name="hotel_form" method="post" action="<?php echo site_url('hotel/edit_room/'.$room_data->id);?>">
                        <!-- text input -->
                        <section class="col-lg-5 connectedSortable">
                             <div class="form-group">
                                <label>Hotel Name (English)</label>
                                <input type="text" class="form-control" name="name" placeholder="Hotel Name" value="<?php echo isset($room_data->name)?$room_data->name:'';?>">
                             </div>
                             <div class="form-group">
                                <label>Room No. (English)</label>
                                <input type="text" class="form-control" name="room_no" placeholder="Room No." value="<?php echo isset($room_data->room_no)?$room_data->room_no:'';?>">
                             </div>
                             <div class="form-group">
                                <label>Room Description (English)</label>
                                <textarea class="form-control" name="description" rows="3" placeholder="Room Description"><?php echo isset($room_data->description)?$room_data->description:'';?></textarea>
                             </div>
                             <div class="form-group">
                                <label>Floor No. (English)</label>
                                <input type="text" class="form-control" name="floor" placeholder="Floor No." value="<?php echo isset($room_data->floor)?$room_data->floor:'';?>">
                             </div>
                             <div class="form-group">
                                <label>Room Type (English)</label>
                                <input type="text" class="form-control" name="room_type" placeholder="Room Type" value="<?php echo isset($room_data->type)?$room_data->type:'';?>">
                             </div>
                             <div class="form-group">
                                <label>Room Price (English)</label>
                                <input type="text" class="form-control" name="price" placeholder="Price" value="<?php echo isset($room_data->price)?$room_data->price:'';?>">
                             </div>
                            <div class="form-group">
                                <label>Amenities</label>
                                <select class="form-control" name="amenities" multiple="multiple" style="width: 100%;">
                                  <?php foreach($room_data->amenities as $row) {?>  
                                  <option><?php echo $row;?></option>
                                  <?php } ?>                                  
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
                                <label>Hotel Name (English)</label>
                                <input type="text" class="form-control" name="name_ar" placeholder="Hotel Name" value="<?php echo isset($room_data->name)?$room_data->name:'';?>" readonly>
                             </div>
                             <div class="form-group">
                                <label>Room No. (English)</label>
                                <input type="text" class="form-control" name="room_no_ar" placeholder="Room No." value="<?php echo isset($room_data->room_no)?$room_data->room_no:'';?>">
                             </div>
                             <div class="form-group">
                                <label>Room Description (English)</label>
                                <textarea class="form-control" name="description_ar" rows="3" placeholder="Room Description"><?php echo isset($room_data->description_ar)?$room_data->description_ar:'';?></textarea>
                             </div>
                             <div class="form-group">
                                <label>Floor No. (English)</label>
                                <input type="text" class="form-control" name="floor_ar" placeholder="Floor No." value="<?php echo isset($room_data->floor)?$room_data->floor:'';?>">
                             </div>
                             <div class="form-group">
                                <label>Room Type (English)</label>
                                <input type="text" class="form-control" name="room_type_ar" placeholder="Room Type" value="<?php echo isset($room_data->type_ar)?$room_data->type_ar:'';?>">
                             </div>
                             <div class="form-group">
                                <label>Room Price (English)</label>
                                <input type="text" class="form-control" name="price_ar" placeholder="Price" value="<?php echo isset($room_data->price)?$room_data->price:'';?>">
                             </div>
                            <div class="form-group">
                                <label>Amenities</label>
                                <select class="form-control" name="amenities_ar" multiple="multiple" style="width: 100%;">
                                  <?php foreach($room_data->amenities_ar as $row) {?>  
                                  <option><?php echo $row;?></option>
                                  <?php } ?>                                  
                                </select>
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
height:600px;
margin-left:50%;
border-color: #f39c12;
}
</style>