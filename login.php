   <div class="container ro-paper-form">

    <div class="row">
      <div class="col-md-12 col-sm-12">
        <div class="eftpos-paper">
          <div class="panel panel-default">
            <div class="panel-heading text-center">Sign in</div>
            <div class="panel-body">
            <form action="" method="post">
               <?php if(!empty($error)) {?>
                  <p class="error"><?php echo $error; ?></p>
                <?php } ?> 
                  <?php if(!empty($Error)) {?>
                  <p class="error"><strong><?php echo $Error; ?></strong></p>
                <?php } ?>  
                  <?php if(!empty($Success)) {?>
                  <p class="success"><strong><?php echo $Success; ?></strong></p>
                <?php } ?>  
 
                <div class="row">
                  <div class="form-group col-sm-12">
                    <label>Email *</label>
                       <input type="email" class="form-control" name="email" value="<?php if(isset($_COOKIE['user_email'])) echo $_COOKIE['user_email']; ?>" class="form-control" placeholder="Email" required>
                    <?php echo form_error('email','<div class="error">', '</div>'); ?>
  
                 </div>
                  <div class="form-group col-sm-12">
                    <label>Password *</label>
                      <input type="password" class="form-control" value="<?php if(isset($_COOKIE['user_password'])) echo $_COOKIE['user_password']; ?>" name="password" class="form-control" placeholder="Password" required>
                    <?php echo form_error('password','<div class="error">', '</div>'); ?>
                    </div>
                <div class="form-group col-sm-12" >
              <input name="remember_me" value="1" <?php if(isset($_COOKIE['user_remember_me'])) echo "checked"; ?>  type="checkbox"> Remember Me
              </div>
              <div class="form-group col-sm-12" >
              <button type="submit" class="btn btn-large btn-block btn-primary submin">Submit</button><br>
              <a href="<?php echo base_url().'welcome/forgotPassword';?>">I forgot my password</a>   
            </div>
          </div>

              </form>

            </div>
          </div>
          
        </div>
      </div>
    </div>

  </div>
    
  
