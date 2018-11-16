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
                <form id="profile_form" action="<?= base_url('myaccounts/change_profile');?>" method="post">
                    <table>
                        <tr>
                            <td>
                                <div class="form-group">
                                    <input placeholder="first name" name="first_name" class="form-control" type="text" value="<?= $userinfo['firstname']; ?>">
                                </div>
                            </td>
                            <td>
                                <div class="form-group">
                                    <input placeholder="last name" name="last_name" class="form-control" type="text" value="<?= $userinfo['lastname']; ?>">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-group">
                                    <input placeholder="Telephone no" name="mobile" class="form-control" type="tel" value="<?= $userinfo['mobile']; ?>">
                                </div>
                            </td>
                            <td>
                                <div class="form-group">
                                    <input placeholder="email address" class="form-control" type="email" value="<?= $userinfo['email']; ?>" disabled>
                                </div>
                            </td>

                        </tr>
                        <tr>
                            <td colspan="2">
                                <div class="form-group">
                                    <input placeholder="Address" name="address" class="form-control" type="text" value="<?= $userinfo['address']; ?>">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-group">
                                    <input placeholder="city" name="city" class="form-control" type="text" value="<?= $userinfo['city']; ?>">
                                </div>
                            </td>
                            <td>
                                <div class="form-group">
                                    <input placeholder="country" name="country" value="<?= $userinfo['country']; ?>" class="form-control" type="text">
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td>

                                <div class="checkbox">
                                    <label class="check_panel">
                                        <input name="gender" type="radio" value="male" <?php if ($userinfo['gender']=='male'){ echo 'checked'; } ?> >Male<span class="checkmark"></span>
                                    </label>
                                </div>
                                <div class="checkbox">
                                    <label class="check_panel">
                                        <input name="gender" value="female" type="radio" <?php if ($userinfo['gender']=='female'){ echo 'checked'; } ?>>Female<span class="checkmark"></span>
                                    </label>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <input value="Save" class="form-control" type="submit">
                            </td>
                            <td>
                                <input value="Discard changes" class="form-control" type="reset" onclick="window.location.href='<?= base_url();?>myaccounts'">
                            </td>
                        </tr>
                        <tr>
                            <?php echo $this->session->flashdata('error'); ?>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
    </div>
</section>

