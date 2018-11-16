  <!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <title>Docket mates | Update Password</title>
     <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
 
    <!-- Tell the browser to be responsive to screen width -->
      <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
     <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/AdminLTE.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/iCheck/square/blue.css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    </head> <body class="hold-transition login-page">  <div class="login-box"> <style>
   .inputgrp{
    width: 50%;
    margin-left:30%;
    }
  .login-box{
    width:700px;
  }
   </style> <div class="register-page-main ms-forgot-password"> 
   <div class="login-box">
       <div class="login-box-body">
           <div class="panel panel-default">
           <?php if(!empty($error)) {?>
                   <p class="error"><strong><?php echo $error; ?></strong></p>
                   <?php } ?> 
                   <?php if(!empty($Error)) {?>
                   <p class="error"><strong><?php echo $Error; ?></strong></p>
                   <?php } ?>  
                   <?php if(!empty($Success)) {?>
                   <p class="success"><strong><?php echo $Success; ?></strong></p>
                   <?php } ?>
            <div class="panel-body">
            <div class="text-center dm-lock">
                <h3><i class="fa fa-lock fa-4x"></i></h3>
                <h2 class="text-center">Change Your Password?</h2>
              <?php echo form_error('cpassword','<div class="error">', '</div>'); ?>
                <div class="panel-body">
                <form method="post" action="" name="forgotform" class="form-login" id="forgotform">
                   
                   <fieldset>
                    <div class="form-group">
                      <div class="input-group inputgrp">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-envelope color-blue"></i></span>
                        <input type="password" name="password" id="password"  class="form-control" placeholder="Enter New password" required>
                        <?php echo form_error('password','<div class="error">', '</div>'); ?>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="input-group inputgrp">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-envelope color-blue"></i></span>
                        <input type="password" name="cpassword" id="cpassword"  class="form-control" placeholder="Confirm your password" required>
                        
                      </div>
                    </div>
                    <div class="form-group">
                    <div class="input-group inputgrp">
                      <button type="submit" class="btn btn-primary btn-block submin fright">Update Password</button>
                   </div></div>
                   </fieldset>
                  </form>
                </div>
              </div>
            </div>
          </div>
            </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->
     
</div>
</div>
</div>
<?php
echo script_tag('assets/plugins/jQuery/jQuery-2.1.4.min.js');
echo script_tag('assets/bootstrap/js/bootstrap.min.js');
echo script_tag('assets/plugins/iCheck/icheck.min.js');
echo script_tag('assets/dist/js/table-search.js');
?>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/iCheck/square/blue.css">
    <script>
      $(function () {
        $('input').iCheck({
          checkboxClass: 'icheckbox_square-blue',
          radioClass: 'iradio_square-blue',
          increaseArea: '20%' // optional
        });
      });
     
    </script>
