<?php $this->load->view('admin/includes/sidebar'); ?>
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Hotel's Room List
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo site_url('admin/dashboard');?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">List Room</li>
      </ol>
    </section>

        <!-- Main content -->
        <section class="content">
          
          <!-- Main row -->
          <div class="row">            
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
            <!-- Left col -->
            <section class="col-lg-12 connectedSortable">
                
               <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Hotel's Room List</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                      <th>Sr. No.</th>                        
                      <th>Hotel Name</th>
                      <th>Room No.</th>
                      <th>Description</th>
                      <th>Type</th>
                      <th>Action</th>                      
                    </tr>
                    </thead>
                    <tbody>
                    <?php if(isset($room_list)) {
                          $i = 1;
                          foreach($room_list as $row){ ?>
                            <tr>
                                <td><?=$i?></td>
                                <td><?php echo isset($row->name)  ? $row->name : ''; ?></td>
                                <td><?php echo isset($row->room_no)  ? $row->room_no : ''; ?></td>
                                <td><?php echo isset($row->description)  ? $row->description : ''; ?></td>
                                <td><?php echo isset($row->type)  ? $row->type : ''; ?></td>
                                <td><a href="<?php echo site_url(); ?>hotel/edit_room/<?php echo $row->id;?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>
                            </tr>                          
                    <?php $i++; } }?>                      
                                                       
                    </tfoot>
                  </table>
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
  