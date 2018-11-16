<?php $this->load->view('admin/includes/sidebar'); ?>
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        List Users
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo site_url('admin/dashboard');?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">List User</li>
      </ol>
    </section>

        <!-- Main content -->
        <section class="content">
          
          <!-- Main row -->
          <div class="row">            
            <section class="col-lg-7 connectedSortable">         
                <?php if($this->session->flashdata('sucess')): ?>
                        <div class="alert alert-dismissible alert-success">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                                <strong>Success!</strong> <?php echo $this->session->flashdata('sucess') ?>
                        </div>                  
                <?php endif; ?>
            </section>
            <!-- Left col -->
            <section class="col-lg-12 connectedSortable">
                
               <div class="box">
                <div class="box-header">
                  <h3 class="box-title">List Users</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                  <table  class="table table-bordered table-striped">
                    <thead>
                    <tr>
                      <th>Sr. No.</th>                        
                      <th>User Name</th>
                      <th>Mobile</th>
                      <th>Email</th>
                      <th>Address</th>
                      <th>City</th>
                      <th>Country</th>
                      <th>Action</th>                      
                    </tr>
                    </thead>
                    <tbody>
                          <?php if(isset($results)) {
                                $count=$this->uri->segment(3,0);
                                foreach($results as $row){ ?>
                            <tr>
                                <td><?= ++$count; ?></td>
                                <td>
                                  <?php 
                                    if (isset($row['firstname']) && isset($row['firstname']))
                                    {
                                      echo $row['firstname'].' '.$row['lastname'];
                                    }
                                    else
                                    {
                                      echo '';
                                    }
                                  ?>
                                    
                                  </td>
                                <td>
                                  <?php echo isset($row['mobile'])  ? $row['mobile'] : ''; ?></td>
                                  <td>
                                  <?php echo isset($row['email'])  ? $row['email'] : ''; ?></td>
                                <td>
                                  <?php echo isset($row['address'])  ? $row['address'] : ''; ?></td>
                                <td><?php echo isset($row['city'])  ? $row['city'] : ''; ?></td>
                                <td><?php echo isset($row['country'])  ? $row['country'] : ''; ?></td>
                                <td><a href="<?php echo base_url(); ?>users/user_action/<?php echo $row['id'];?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>
                            </tr>                          
                    <?php  } }?>                      
                                                       
                    </tfoot>
                  </table>
                  <div id="pagination">
          <ul class="tsc_pagination">

          <!-- Show pagination links -->
          <?php foreach ($pagination as $link) {
              echo "$link";
          } ?>
          </ul>
        </div>
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
  