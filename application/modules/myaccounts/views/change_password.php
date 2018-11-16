<section class="profile_wrap">
    <div class="container">
        <?php include_once('side_bar.php'); ?>
        <div class="col-md-9">
            <div class="registration_wrap_inner">
                <form action="<?= base_url('myaccounts/change_password_validation') ?>"  method="post" id="change_password">
                    <table>
                        <tr>
                            <td>
                                <?php if ($this->session->flashdata ('password_error') || $this->session->flashdata ('same_password'))
                                            { ?>
                                    <div class="alert alert-warning alert-dismissable">
                                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                        <strong>
                                            <?php 
                                                echo $this->session->flashdata ('password_error');
                                                echo $this->session->flashdata ('same_password')
                                                ?>       
                                            </strong> 
                                    </div>
                                <?php } ?>

                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="input_wrap form-group ">
                                    <input type="password" class="login_input" placeholder="Enter Old Password" name="oldpassword"  id="oldpassword">
                                    <i class="fa fa-user"></i>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="input_wrap form-group ">
                                    <input type="password" class="login_input" placeholder="Enter New Password" name="newpassword" id="newpassword">
                                    <i class="fa fa-user"></i>
                                </div>
                            </td>

                        </tr>
                        <tr>
                            <td>
                                <div class="input_wrap form-group ">
                                    <input type="password" class="login_input" placeholder="Confirm New Password" name="newcpassword" id="newcpassword">
                                    <i class="fa fa-user"></i>
                                </div>
                            </td>
                        </tr>


                        <tr>
                            <td>
                                <input type="submit" name="reset" value="Reset Password" class="login_btn">
                            </td>
                        </tr>
                    </table>
                </form>
                
            </div>
        </div>
    </div>
</section>

