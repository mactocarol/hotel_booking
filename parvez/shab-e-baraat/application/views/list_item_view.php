<?php $this->load->view('header_view');?>
<?php $this->load->view('sidebar_view');?>
    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        List Item
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url();?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">List</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <!---->
      <!-- /.row -->
      <!-- Main row -->
			<a href="<?php echo site_url('AddItem');?>"><button class="btn bnt-primary">Add</button></a>
      <div class="row">
        <!-- Left col -->
        <section class="col-lg-12 connectedSortable">
			<div class="box">
            <div class="box-header">
              <h3 class="box-title">List</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No.</th>
                  <th>Name</th>
                  <th>Qty</th>
									<th>Action</th>
                </tr>
                </thead>
                <tbody>
				<?php $i=1; foreach($results as $row){?>	
                <tr>
                  <td><?=$i?></td>
                  <td><?=$row->name?></td>
                  <td><?=$row->qty?></td>
									<td>
										<a href="<?php echo site_url('EditItem/'.$row->id);?>"><button class="btn btn-success"><i class="fa fa-edit"></i></button></a>
										<a href="<?php echo site_url('DeleteItem/'.$row->id);?>" onclick="var c = confirm('Are you sure?'); if(!c) return false;"><button class="btn btn-danger"><i class="fa fa-trash"></i></button></a>
									</td>                  
                </tr>
				<?php $i++; } ?>
                </tbody>                
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </section>  
      </div>
	</section>

</div>
<!-- ./wrapper -->
<?php $this->load->view('footer_view');?>