<?php $this->load->view('header_view');?>
<?php $this->load->view('sidebar_view');?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Update Fatiha
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url();?>/welcome"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Fatiha</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <!---->
      <!-- /.row -->
      <!-- Main row -->
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
			<a href="<?php echo site_url('ListFatiha');?>"><button class="btn bnt-primary">List</button></a>
      <div class="row">
        <!-- Left col -->
				
        <section class="col-lg-12 connectedSortable">
			<div class="box">
            <div class="box-header">
              <h3 class="box-title">UPDATE</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
              <form role="form" method="post" action="<?php echo site_url('EditFatiha/'.$id);?>">
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Name</label>
                  <input type="text" class="form-control" name="name" id="exampleInputEmail1" placeholder="Enter name" value="<?php echo $results->name;?>">
                </div>
								<div class="form-group">
                  <label for="exampleInputPassword1">Description</label>
                  <textarea class="form-control" name="description" id="exampleInputPassword1"><?php echo $results->description;?></textarea>
                </div>
								<div class="form-group">
                  <label for="exampleInputPassword1">Order</label>
                  <input class="form-control" name="order" id="exampleInputPassword1" value="<?php echo $results->order_no;?>">
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
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
