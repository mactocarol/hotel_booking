  <div class="register-box">
      <div class="register-logo">
        <a href="#"><b><?php echo $title;?></a>
      </div>
      <div class="register-box-body">
        <p class="login-box-msg">Register a new account</p>
        <?php echo validation_errors('<div class="error" id="errorMessage" style="text-align:left">', '</div>'); ?>
        <form action="" method="post">
          <div class="form-group has-feedback">
            <input type="text" name="firstname" value="<?php echo set_value('firstname');?>" class="form-control" placeholder="First name">
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="text" name="lastname" value="<?php echo set_value('lastname');?>" class="form-control" placeholder="Last name">
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="email" name="email" value="<?php echo set_value('email');?>"  class="form-control" placeholder="Email">
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="password" name="password" class="form-control" placeholder="Password">
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="password" name="cpassword" class="form-control" placeholder="Retype password">
            <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
          </div>
          <div class="row">
            <div class="col-xs-8">
              <div class="checkbox icheck">
                <label>
                  <input type="checkbox" name="terms" value="1"> I agree to the <a target="_blank" href="<?php echo base_url().'login/terms';?>">terms</a>
                </label>
              </div>
            </div><!-- /.col -->
            <div class="col-xs-4">
              <button type="submit" class="btn btn-primary btn-block btn-flat">Register</button>
            </div><!-- /.col -->
          </div>
        </form>
        <div class="social-auth-links text-center">
          <p>- OR -</p>
          </div>
        <a href="<?php echo base_url().'login/login';?>" class="text-center">Already have the login detail</a>
      </div><!-- /.form-box -->
    </div><!-- /.register-box -->
