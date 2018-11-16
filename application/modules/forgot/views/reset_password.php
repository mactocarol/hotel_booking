</section>

<section class="title_tour">
  <div class="container">
    <div class="forgot-panel">
      <h2><?php echo $this->lang->line('Reset Password'); ?></h2>
      <form action="<?= base_url('forgot/reset_password') ?>" method="post">
        <div class="input_wrap">
          <input type="password" class="login_input" placeholder="<?php echo $this->lang->line('Enter Password'); ?>" name="password" ><i class="fa fa-user"></i>
        </div><br>
        <div class="input_wrap">
          <input type="password" class="login_input" placeholder="<?php echo $this->lang->line('Conform Password'); ?>" name="cpassword" ><i class="fa fa-user"></i>
        </div><br>
        <input type="hidden" name="key" value="<?php echo $key; ?>">
        <input type="submit" name="reset" value="<?php echo $this->lang->line('Reset'); ?>" class="login_btn">
      </form>

      <?php
      echo $error=$this->session->flashdata ('reset_password');
      echo $error=$this->session->flashdata ('sucess')
      ?>
    </div></div>
  </section>

  <section class="registration_wrap">
    <div class="container">
      <div class="registration_wrap_inner">

      </div>
    </div>
  </section>

