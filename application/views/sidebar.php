  <style type="text/css">
  .main-container{
  background: url(../img/account-bg.jpg) no-repeat;
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;
}
.ms-main-container{
  background-color: rgba(27, 27, 27, 0.34);
}
/* Sidebar Styles */
  .my-account {
    padding: 0px 0px;
    margin: 50px 0px;
    border: 0px solid #4FD5D6;
  }
  .my-account .panel-default {
  	border-color:#464646;
    /*  border-radius: 0px;*/
   /* border-top:0px;
    border-bottom: 0px;
    border-right: 0px;*/
    padding-bottom: 0px;
    background-color: transparent;
}
.my-account .panel{
  margin-bottom: 0px;
}
.my-account .submin{
  border-radius: 2px;
  color: #fff;
  padding: 5px 40px;
  background-color: #003976;
  border-color:#003976;
}
.my-account .form-group .form-control{
  border-radius: 2px;
  background-color: rgba(255, 255, 255, 0.69);
  border: 1px solid #9C9C9C;
}
.my-account .panel-default>.panel-heading {
  color: #fff;
  background-color:#003976;
  border-color: #464646;
  border-radius: 0px;
  color: #fff;
  font-size: 22px;
  text-transform: uppercase;
  border-bottom: 1px solid #464646;
}
.my-account .sidebar-wrapper {
    /*background-color: #4fd5d6;
    border: 1px solid #0B9D9E;*/
    /*background-color: rgba(218, 218, 218, 0.41);*/
    border: 1px solid #797979;
}
.my-account .sidebar-nav {
  top: 0;
  margin: 0;
  padding: 0;
  list-style: none;
}
.my-account .sidebar-nav li {
  text-indent: 20px;
  line-height: 40px;
}
.my-account .sidebar-nav li a {
 display: block;
text-decoration: none;
color: #464646;
border-bottom: 1px solid #ccc;
font-size: 15px;
padding: 0px 0px;
}
/*.my-account .sidebar-nav li a:hover {
  text-decoration: none;
  color: #fff;
  background: rgba(255,255,255,0.2);
}*/
.my-account .sidebar-nav li a:active{
  background-color: rgba(68, 68, 68, 0.58);
}
.my-account .sidebar-nav li a:active,
.my-account .sidebar-nav li a:focus {
  text-decoration: none;
  background-color: rgba(68, 68, 68, 0.58);
  color: #fff;
}
.my-account .sidebar-nav > .sidebar-brand {
  height: 50px;
  color: #fff;
  font-size: 22px;
  text-transform: uppercase;
  border-bottom: 1px solid #464646;
  line-height: 50px;
  background-color:#003976;
}
.my-account .sidebar-nav > .sidebar-brand a {
  color: #fff;
}
.my-account .sidebar-nav > .sidebar-brand a:hover {
  color: #fff;
  background: none;
}
.my-account .free-roll {
  height: 445px;
}
.ms-change-pass{
  max-width: 350px;
  margin: 0 auto;
}
.my-account .free-roll {
   overflow-x: scroll;
}
/* my-account // */</style>
<div class="main-container">
<div class="container">
<div class="my-account">
<div class="row">
<div class="col-sm-3 col-xm-12">
<!-- Sidebar -->
   <div class="sidebar-wrapper">
      <ul class="sidebar-nav">
        <li class="sidebar-brand">
          Account
        </li>
        <li>
          <a href="<?php echo base_url();?>account/profile">Business Profile</a>
        </li>
        <li>
          <a href="<?php echo base_url();?>account/all_orders">Orders</a>
        </li>
        <li>
          <a href="<?php echo base_url();?>account/changePassword">Change Password</a>
        </li>
        <li>
          <a href="<?php echo base_url();?>account/logout">Log Out</a>
       </li>
      </ul>
    </div>
<!-- /#sidebar-wrapper -->
</div>

