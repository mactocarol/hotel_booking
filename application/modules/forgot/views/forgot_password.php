</section>

<section class="title_tour">
  <div class="container">

    <div class="forgot-panel">

      <h2><?php echo $this->lang->line('Forgot Password'); ?></h2>
      <?php if($this->session->flashdata('validation_errors')) : ?>
        <div class="alert alert-danger position">
          <strong><?php echo $this->session->flashdata('validation_errors'); ?></strong> 
        </div>
      <?php endif; ?>
      <?php if($this->session->flashdata('sucess')) : ?>
        <div class="alert alert-success">
          <strong><?= $this->session->flashdata('sucess'); ?></strong> 
        </div>
      <?php endif; ?>
      
      <form action="<?= base_url('forgot/reset_link') ?>" method="post">

        <div class="input_wrap">
          <input type="text" class="login_input" placeholder="<?php echo $this->lang->line('enter Registered Email'); ?>" name="email" ><i class="fa fa-user"></i></div><br>
          <input type="submit" name="send_link" value="<?php echo $this->lang->line('Send Link'); ?>" class="login_btn">

        </form>


      </div>
    </div>
  </section>

  
