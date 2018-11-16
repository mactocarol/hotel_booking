<div class="col-md-3">
    <div class="img_profile_panel_outer">
        <div class="img_profile_panel">
                <img src="<?php 
                if($userinfo['profile_pic']) 
                { 
                    echo $userinfo['profile_pic']; 
                } 
                else 
                { 
                    echo  base_url('assets/images/user-1.jpg');   
                } 
                ?>">
        </div>
        <div class="travel_spcial_box_overlay">
            <h3><a href="#" onclick="return false;" id="upload">Change profile picture</a></h3>   
        </div>
        <form action="myaccounts/upload_pic" method="post" enctype="multipart/form-data">
            <input type="file" name="profilepic" id="pic" >
            <input type="submit" name="pic" value="upload" id="btn1" hidden>
        </form>
    </div>

    <ul class="action_for_change">
        <?php if ($userinfo['recever_from'] != 'facebook' && $userinfo['recever_from'] != 'googleplus') { ?>
        <li>
            <a href="<?= base_url('myaccounts/change_password');?>">
            <i class="fa fa-key" aria-hidden="true"></i>
            change password</a>
        </li>
        <?php } ?>
        
        <li>
            <a href="<?= base_url('myaccounts');?>">
            <i class="fa fa-key" aria-hidden="true"></i>
            My Profile</a>
        </li>
        
        
        <li>
            <a href="<?= base_url('myaccounts/booking_history');?>">
            <i class="fa fa-key" aria-hidden="true"></i>
            Booking History</a>
        </li>
        
    </ul>
</div>

