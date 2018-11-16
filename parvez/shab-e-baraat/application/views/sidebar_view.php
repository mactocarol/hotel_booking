  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo base_url();?>/assets/Shab-E-Barat-Picture.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Khan Family</p>
          <a href="<?php echo base_url();?>/assets/#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>      
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">        
        <li class="">
          <a href="<?php echo base_url();?>">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
          
        </li>
        
        <li class="treeview">
          <a href="<?php echo base_url();?>/assets/#">
            <i class="fa fa-edit"></i> <span>Items</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url();?>/AddItem"><i class="fa fa-circle-o"></i> Add</a></li>
            <li><a href="<?php echo base_url();?>/ListItem"><i class="fa fa-circle-o"></i>List</a></li>            
          </ul>
        </li>
        <li class="treeview">
          <a href="<?php echo base_url();?>/assets/#">
            <i class="fa fa-table"></i> <span>Fatiha</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url();?>/AddFatiha"><i class="fa fa-circle-o"></i>Add</a></li>
            <li><a href="<?php echo base_url();?>/ListFatiha"><i class="fa fa-circle-o"></i>List</a></li>
          </ul>
        </li>                
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  