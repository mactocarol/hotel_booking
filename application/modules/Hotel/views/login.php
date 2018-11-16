<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <title>Shipping admin | Login</title>
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
    </head> <body class="hold-transition login-page">
     <div class="login-box">
      <div class="login-logo">
        <b><?php echo $title;?></a>
      </div><!-- /.login-logo -->
      <div class="login-box-body">
        <p class="login-box-msg">Sign in to start your session</p>
        <?php if($this->uri->segment(3) == 777) {?>
          <p class="login-box-msg" id="verifyMessage" style="color:green">Login detail sent to your email, please check and login with that</p>
        <?php } ?>  
         <?php if(!empty($error)) {?>
          <p class="login-box-msg error" id="errorMessage"><?php echo $error; ?></p>
        <?php } ?> 
          <?php if(!empty($Error)) {?>
          <p class="login-box-msg error" id="errorMessage"><?php echo $Error; ?></p>
        <?php } ?>  
          <?php if(!empty($Success)) {?>
          <p class="login-box-msg success" id="verifyMessage"><?php echo $Success; ?></p>
        <?php } ?>  
        <form action="" method="post">
          <div class="form-group has-feedback">
            <input type="email" name="email" value="<?php if(isset($_COOKIE['email'])) echo $_COOKIE['email']; ?>" class="form-control" placeholder="Email" required>
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            <?php echo form_error('email','<div class="error">', '</div>'); ?>
          </div>
    
          <div class="form-group has-feedback">
            <input type="password" value="<?php if(isset($_COOKIE['password'])) echo $_COOKIE['password']; ?>" name="password" class="form-control" placeholder="Password" required>
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            <?php echo form_error('password','<div class="error">', '</div>'); ?>
          </div>
          <div class="row">
            <div class="col-xs-8">
              <div class="checkbox icheck">
                <label>
                  <input name="remember_me" value="1" <?php if(isset($_COOKIE['remember_me'])) echo "checked"; ?>  type="checkbox"> Remember Me
                </label>
              </div>
            </div><!-- /.col -->
            <div class="col-xs-4">
              <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
            </div><!-- /.col -->
          </div>
        </form>
    
        <a href="<?php echo base_url().'admin/forgotPassword';?>">I forgot my password</a><br>
        </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->
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
