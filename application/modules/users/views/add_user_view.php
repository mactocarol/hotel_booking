<?php $this->load->view('admin/includes/sidebar'); ?>
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Add User
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo site_url('admin/dashboard');?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Add User</li>
      </ol>
    </section>

        <!-- Main content -->
        <section class="content">
          
          <!-- Main row -->
          <div class="row">            
            <section class="col-lg-7 connectedSortable">         
                <?php if($this->session->flashdata('error')): ?>
                        <div class="alert alert-dismissible alert-success">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                                <strong>Success!</strong> <?php echo $this->session->flashdata('error') ?>
                        </div>                  
                <?php endif; ?>
                 
            
            </section>
            <!-- Left col -->
            <section class="col-lg-12 connectedSortable">
                
               <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Add User</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                  <form role="form" id="add_user_form" name="hotel_form" method="post" action="<?php echo base_url().'users/add_user'; ?>">
                        <!-- text input -->
                        <section class="col-lg-12 connectedSortable">
                             <div class="form-group">
                                <label>First Name (English)</label>
                                <input type="text" class="form-control" name="firstname" placeholder="First Name" value="">
                             </div>
                             <div class="form-group">
                                <label>Last Name (English)</label>
                                <input type="text" class="form-control" name="lastname" placeholder="Last Name" value="">
                             </div>
                             <div class="form-group">
                                <label>Email (English)</label>
                                <input type="text" class="form-control" name="email" placeholder="Email" value="">
                             </div>
                             <div class="form-group">
                                <label>Mobile (English)</label>
                                <input type="text" class="form-control" name="mobile" placeholder="Mobile Number" value="">
                             </div>
                             <div class="form-group">
                                <label>Address (English)</label>
                                <textarea class="form-control" name="address" rows="2" placeholder="Address"></textarea>
                             </div>
                             <div class="form-group">
                                <label>City (English)</label>
                                <input type="text" class="form-control" name="city" placeholder="City" value="">
                             </div>
                             <div class="form-group">
                                <label>Country (English)</label>
                                <input type="text" class="form-control" name="country" placeholder="Country" value="">
                             </div>
                             <div class="box-footer">
                                <input type="submit" class="btn btn-primary" name="Add" value="Add">
                                
                             </div>
                           </section>
                        </section>
                  </form>


                        <section class="col-lg-1 connectedSortable">
                            <div class="vl warning"></div>
                        </section>
                        <!--<section class="col-lg-5 connectedSortable">
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
                        </section>-->
                        
                       
                       
                        
                       
                        
                        
                      
                  
                  

                 
                </div>
                <!-- /.box-body -->
              </div>
    
            </section>
            <!-- /.Left col -->
          </div>
          <!-- /.row (main row) -->
        
        </section>

    <!-- /.content -->
  </div>
  