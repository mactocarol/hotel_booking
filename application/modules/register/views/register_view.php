<div class="col-md-12 text-center bradcrum">
  <h1>registration form </h1>
  <p>lorem ipsum is symple dummy text</p>
</div>

</div>
</section>

<section class="title_tour">
  <div class="container">
    <h2>sign up now</h2>
    <p>fill in the form below to get access</p>
  </div>
</section>

<section class="registration_wrap">
  <div class="container">
    <div class="registration_wrap_inner">
      <form action="<?= base_url ('registration/sign_up' ); ?>" method="post" id="register_form">      
      <table>
        <tr>
          <td>
            <div class="form-group">
            <input placeholder="first name" class="form-control" type="text" name="first_name" id="firstname" value="<?= $this->input->post('first_name'); ?>">
            <span id="fname_error_massage"><?= form_error ('first_name'); ?></span>
            </div>
          </td>
          <td>
            <div class="form-group">
            <input placeholder="last name" class="form-control" type="text" name="last_name" id="lastname" value="<?= $this->input->post('last_name'); ?>">
            <span id="lname_error_massage"><?= form_error ('last_name'); ?></span>
            </div>
          </td>
        </tr>
        <tr>
          <td>
            <div class="form-group">
            <input placeholder="Mobile Number" class="form-control" type="text" name="mobile" id="mobile" value="<?= $this->input->post('mobile'); ?>">
            <span id="mobile_error_massage"><?= form_error ('mobile'); ?></span>
            </div>
          </td>
          <td>
            <div class="form-group">
            <input placeholder="email address" class="form-control" type="email" name="email" id="email" value="<?= $this->input->post('email'); ?>">
            <span id="email_error_massage"><?= form_error ('email'); ?></span>
            </div>
          </td>
        </tr>
        <tr>
          <td>
            <div class="form-group">
            <input placeholder="City" class="form-control" type="text" name="city" id="city" value="<?= $this->input->post('city'); ?>">
            <span id="city_error_massage"><?= form_error ('city'); ?></span>
            </div>
          </td>
          <td>
            <div class="form-group">
            <input type="radio" name="gender" class="gender" value="male" >Male
            <input type="radio" name="gender" class="gender" value="female" >Female
            <span id="gender_error_massage"><?= form_error ('gender'); ?></span>
            </div>
          </td>
        </tr>
        <tr>

          <td colspan="2">
            <div class="form-group">
            <input placeholder="Password" class="form-control" type="password" name="password" id="password">
            <span id="pass_error_massage"><?= form_error ('password'); ?></span>
            </div>
          </td>
        </tr>
        <tr>
          <td colspan="2">
            <div class="form-group">
            <input placeholder="Confirm Password" class="form-control" type="password" name="repassword" id="repassword">
            <span id="repass_error_massage"><?= form_error ('repassword'); ?></span>
            </div>
          </td>
        </tr>
        <tr>
          <td  colspan="2">
            <input value="sign me up!" class="form-control" type="submit" name="signup" id="signup">
            <span id="form_error_massage">
              <?php
                if ($error=$this->session->flashdata ('sucess')) echo $error;
              ?>
            </span>
          </td>
        </tr>
        <!--<tr><td align="center" colspan="2"> <h3>or login with</h3></td></tr>

        <tr><td align="center" colspan="2">
          <div class="social_icon_login"><a href="<?php // $this->facebook->login_url(); ?>" class="facebook"><i class="fa fa-facebook"> </i> facebook</a>
            <a href="#" class="google"><i class="fa fa-google-plus"> </i> google</a></div></td>
          </tr>-->
          
        </table>
      </form>
      </div>
    </div>
  </section>

