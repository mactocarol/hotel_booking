
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title><?= $page_title; ?></title>

    <link href="<?= base_url('assets/css/font-awesome.min.css');?>" rel="stylesheet">
    <link href="<?= base_url('assets/css/bootstrap.min.css');?>" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('assets/css/jslider.css');?>" type="text/css">
    <link href="<?= base_url('assets/css/style.css');?>" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body class="login_panel">

    <div class="login_panel_overlay">

        <div class=" login_panel_wrapper">
            <div class=" login_panel_wrapper_inner">

                <div class="col-md-6">
                    <div class="row">
                        <div class="get-in-touch">

                            <h1 class="text-center"><img src="<?= base_url('assets/images/logo.png');?>"></h1>

                            <table class="table-responsive table table_text">
                                <tbody><tr>
                                    <td><i class="fa fa-home"></i></td>
                                    <td><?php echo $this->lang->line('ADDRESS'); ?></td>
                                    <td><?php echo $this->lang->line('add_line'); ?></td>
                                </tr>
                                <tr>
                                    <td><i class="fa fa-phone"></i></td>
                                    <td><?php echo $this->lang->line('PHONE'); ?></td>
                                    <td><?php echo $this->lang->line('no'); ?></td>
                                </tr>
                                <tr>
                                    <td><i class="fa fa-fax"></i></td>
                                    <td><?php echo $this->lang->line('FAX'); ?></td>
                                    <td><?php echo $this->lang->line('fax_no'); ?></td>
                                </tr>
                                <tr>
                                    <td><i class="fa fa-envelope-o"></i></td>
                                    <td><?php echo $this->lang->line('EMAIL'); ?></td>
                                    <td><?php echo $this->lang->line('EMAIL_id'); ?></td>
                                </tr>
                            </tbody></table>
                        </div>
                    </div></div>

                    <div class="col-md-6">
                        <div class="login_for_panel">
                            <h2><?php echo $this->lang->line('login'); ?></h2>
                            <?php if($this->session->flashdata('validate_credentials')) : ?>
                            <div class="alert alert-danger">
                                    <strong><?php echo $this->session->flashdata('validate_credentials'); ?></strong> 
                            </div>
                        <?php endif; ?>
                            <table class="table-responsive table table_text">

                                <tbody>
                                    <form action="<?= base_url ('user_login/set_validation');?>" method="post">
                                    <tr>
                                        <td><div class="input_wrap">
                                            <input type="text" class="login_input" placeholder="<?php echo $this->lang->line('enter_Email'); ?>" name="email" value="<?= $this->input->post('email'); ?>"><i class="fa fa-user"></i></div>
                                        <?php echo form_error('email'); ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><div class="input_wrap">
                                            <input type="password" class="login_input" placeholder="<?php echo $this->lang->line('enter_password'); ?>" name="password"> <i class="fa fa-lock"></i></div>
                                            <?= form_error('password'); ?>
                                            </td>
                                    </tr>
                                    <tr><td><div class="pull-left"><input type="checkbox" name="remember"><?php echo $this->lang->line('Remember_Me'); ?></div> <a href="<?= base_url('forgot');?>" class="pull-right"><?php echo $this->lang->line('Forgot_Password'); ?></a></td></tr>
                                    <tr>
                                        <td><input type="submit" class="login_btn" value="<?php echo $this->lang->line('login'); ?>">
                                         
                                    </td>
                                        </td>
                                    </tr>
                                    </form>
                                    <tr><td> <h3><?php echo $this->lang->line('or_login_with'); ?></h3></td></tr>

                                    <tr><td>
                                        <div class="social_icon_login">
                                            <a href="<?= $this->facebook->login_url(); ?>" class="facebook"><i class="fa fa-facebook"> </i> facebook</a>
                                            <a href="<?php echo $this->googleplus->loginURL(); ?>" class="google"><i class="fa fa-google-plus"> </i> google</a></div></td>
                                        </tr>
                                        <tr><td><p><?php echo $this->lang->line('Not_a_member_yet?'); ?> <a href="<?= base_url('registration'); ?>"><?php echo $this->lang->line('Sign-up_Now!'); ?></a></p></td></tr>

                                    </tbody></table>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
<!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="<?= base_url('assets/js/bootstrap.min.js');?>"></script>
    

</body>
</html>
