<!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo base_url(); ?>assets/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Admin</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li <?php if($page == 'dashboard') { echo 'class="active"'; }?>>
          <a href="<?php echo site_url('admin/dashboard');?>">
            <i class="fa fa-edit"></i> <span>Dashbboard</span>            
          </a>          
        </li>
        <li class="treeview <?php if($page == 'add_user' || $page == 'list_user') { echo 'menu-open'; }?> ">
        <a href="#">
          <i class="fa fa-edit"></i> <span>Users</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu" style="<?php if($page == 'add_user' || $page == 'list_users') { echo 'display:block'; }?>">
          
          <li <?php if($page == 'list_users') { echo 'class="active"'; }?>><a href="<?php echo site_url('users/list_users');?>"><i class="fa fa-circle-o"></i> List User</a></li>
        </ul>
      </li>
       <li class="treeview <?php if($page == 'booking_list' || $page == 'booking_list') { echo 'menu-open'; }?> ">
        <a href="#">
          <i class="fa fa-edit"></i> <span>Booking</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu" style="<?php if($page == 'cancel_Booking' || $page == 'list_Booking') { echo 'display:block'; }?>">
          <li <?php if($page == 'list_Booking') { echo 'class="active"'; }?> ><a href="<?php echo site_url('bookingList');?>"><i class="fa fa-circle-o"></i> Booking History</a></li>
          <li <?php if($page == 'cancel_Booking') { echo 'class="active"'; }?> ><a href="<?php echo site_url('bookingList/cancel_booking_list');?>"><i class="fa fa-circle-o"></i> Cancelled Booking</a></li>
        </ul>
      </li>
        <li class="treeview <?php if($page == 'add_hotel' || $page == 'list_hotel') { echo 'menu-open'; }?> ">
          <a href="#">
            <i class="fa fa-edit"></i> <span>Hotels</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu" style="<?php if($page == 'add_hotel' || $page == 'list_hotel') { echo 'display:block'; }?>">
            <!--<li <?php //if($page == 'add_hotel') { echo 'class="active"'; }?> ><a href="<?php echo site_url('hotel/add');?>"><i class="fa fa-circle-o"></i> Add Hotel</a></li>-->
            <li <?php if($page == 'list_hotel') { echo 'class="active"'; }?>><a href="<?php echo site_url('hotel');?>"><i class="fa fa-circle-o"></i> List Hotel</a></li>
          </ul>
        </li>
		<!--<li class="treeview">
          <a href="#">
            <i class="fa fa-edit"></i> <span>Rooms</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="#"><i class="fa fa-circle-o"></i> Add Room</a></li>            
          </ul>
        </li>-->
        <li class="treeview <?php if($page == 'add_countries' || $page == 'add_cities' || $page == 'add_hotels' || $page == 'add_hotels_images' || $page == 'add_property' || $page == 'add_room_amenity') { echo 'menu-open'; }?>">
          <a href="#">
            <i class="fa fa-edit"></i> <span>Upload Data</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu" style="<?php if($page == 'add_countries' || $page == 'add_cities' || $page == 'add_hotels' || $page == 'add_hotels_images' || $page == 'add_property' || $page == 'add_room_amenity') { echo 'display:block'; }?>">
            <li <?php if($page == 'add_countries') { echo 'class="active"'; }?>><a href="<?php echo site_url('csv_upload/add_countries');?>"><i class="fa fa-circle-o"></i> Upload Countries</a></li>
            <li <?php if($page == 'add_cities') { echo 'class="active"'; }?>><a href="<?php echo site_url('csv_upload/add_cities');?>"><i class="fa fa-circle-o"></i> Upload Cities</a></li>
            <li <?php if($page == 'add_hotels') { echo 'class="active"'; }?>><a href="<?php echo site_url('csv_upload/add_hotels');?>"><i class="fa fa-circle-o"></i> Upload Hotels</a></li>
            <li <?php if($page == 'add_hotels_images') { echo 'class="active"'; }?>><a href="<?php echo site_url('csv_upload/add_hotels_images');?>"><i class="fa fa-circle-o"></i> Upload Hotel's Images</a></li>
            <li <?php if($page == 'add_property') { echo 'class="active"'; }?>><a href="<?php echo site_url('csv_upload/add_property');?>"><i class="fa fa-circle-o"></i> Upload Property Amenity</a></li>
            <li <?php if($page == 'add_room_amenity') { echo 'class="active"'; }?>><a href="<?php echo site_url('csv_upload/add_room_amenity');?>"><i class="fa fa-circle-o"></i> Upload Room Amenity</a></li>
          </ul>
        </li>
       <!-- <li class="treeview">
          <a href="#">
            <i class="fa fa-table"></i> <span>Tables</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="pages/tables/simple.html"><i class="fa fa-circle-o"></i> Simple tables</a></li>
            <li><a href="pages/tables/data.html"><i class="fa fa-circle-o"></i> Data tables</a></li>
          </ul>
        </li>
        
        <li class="treeview">
          <a href="#">
            <i class="fa fa-folder"></i> <span>Examples</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="pages/examples/invoice.html"><i class="fa fa-circle-o"></i> Invoice</a></li>
            <li><a href="pages/examples/profile.html"><i class="fa fa-circle-o"></i> Profile</a></li>
            <li><a href="pages/examples/login.html"><i class="fa fa-circle-o"></i> Login</a></li>
            <li><a href="pages/examples/register.html"><i class="fa fa-circle-o"></i> Register</a></li>
            <li><a href="pages/examples/lockscreen.html"><i class="fa fa-circle-o"></i> Lockscreen</a></li>
            <li><a href="pages/examples/404.html"><i class="fa fa-circle-o"></i> 404 Error</a></li>
            <li><a href="pages/examples/500.html"><i class="fa fa-circle-o"></i> 500 Error</a></li>
            <li><a href="pages/examples/blank.html"><i class="fa fa-circle-o"></i> Blank Page</a></li>
            <li><a href="pages/examples/pace.html"><i class="fa fa-circle-o"></i> Pace Page</a></li>
          </ul>
        </li>-->
        
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>