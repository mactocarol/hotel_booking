<?php $this->load->view('header_view');?>
<?php $this->load->view('sidebar_view');?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Assign Fatiha
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
              <h3 class="box-title"><?php echo $results->name;?></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
              <form role="form" method="post" action="<?php echo site_url('AssignFatiha/'.$id);?>">
              <div class="box-body">
                <div class="form-group">
									<?php foreach($itemss as $row){?>
									<div class="col-md-6">
										<input type="text" class="form-control" name="" value="<?php echo isset($row->name)?$row->name.' ('.$row->qty.')':'';?>" disabled>
										<input type="hidden" class="form-control" name="item_id[]" value="<?php echo isset($row->id)?$row->id:'';?>">	
									</div>
									<div class="col-md-6">
										<input type="text" class="form-control" name="assign_qty[]" placeholder="Enter quantity" value="<?php echo isset($row->assign_qty)?$row->assign_qty:'';?>" <?php echo ($row->assign_qty)?'readonly':'';?>>
										<input type="hidden" class="form-control" name="assign_id[]" value="<?php echo isset($row->assign_id)?$row->assign_id:'';?>">	
									</div> <br><br>                 
									<?php } ?>
                </div>								
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Assign</button>
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
