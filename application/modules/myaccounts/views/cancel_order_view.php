<section class="profile_wrap">
    <div class="container">
        <?php include_once('side_bar.php'); ?>
        <div class="col-md-9">
            <div class="registration_wrap_inner">
                <?php if($this->session->flashdata('password_sucess') || $this->session->flashdata('sucess')) : ?>
                    <div class="alert alert-success">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong><?php echo $this->session->flashdata('password_sucess'); ?><?php echo $this->session->flashdata('sucess'); ?><?php echo $this->session->flashdata('image') ?></strong> 
                    </div>
                <?php endif; ?>
                <?php if($this->session->flashdata('image')) : ?>
                    <div class="alert alert-danger" role="alert">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong><?php echo $this->session->flashdata('image') ?></strong> 
                    </div>
                <?php endif; ?>
                <?php
                if($status == 'true'){
                    echo "<h3>Your Order has been cancelled successfullty</h3>";
                    echo "<br>";
                    echo $CancellationCharges." ".$Currency." will be deducted, other will be refund";
                }else{
                    echo "<h3>".$Error."</h3>";
                }
                ?>
            </div>
        </div>
    </div>
</section>

