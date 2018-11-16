<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<div class="loader"></div>
<?php //echo "<pre>"; print_r($hotel_list); die; ?>
<ul class="room_list_inner" id="room_list_inner">
                    <?php if(isset($hotel_list) && !empty($hotel_list)){ $i=1;
                          foreach($hotel_list as $key => $row) {?>    
                            <li>
                                <div class="col-md-6">
                                                                         
                                    <a href="<?php echo site_url('hotel_detail/index/'.$row->hotel_id);?>" target="_blank">
                                    <div class="room_img_wrap"><img src="<?php echo isset($row->hotel_images[0]['image']) ? $row->hotel_images[0]['image']: '';?>" id="img1">
                                        <div class="room_img_wrap _overlay"></div>
                                        <div class="room_dicount_tag">30%</div>
                                        <div class="room_img_detail">
                                                <h3><?php if($this->session->userdata('site_lang') == 'arabic'){ echo !empty($row->name_ar)?$row->name_ar:$row->name; }else{ echo $row->name; }?>.</h3>
                                                <!--<h4><i class="fa fa-map-marker"></i> Lorem ipsum dolor sit amet, consectetur </h4>-->
                                                 <input type="text"  class="rating rating-loading" value="<?=$row->rating?>" data-size="xs" title="">
                                        </div>
                                    </div>
                                    </a>
                                    
                                </div>
                                    
                                <div class="col-md-6">
                                    <div class="room_rate"><span>AED <?php echo (round($row->price,2)) ? round($row->price,2) : ''; ?></span> per night</div>
                                    <p> 
                                        <?php if($this->session->userdata('site_lang') == 'arabic'){ echo isset($row->description_ar)?substr($row->description_ar,0,150):substr($row->description,0,150); }else{ echo substr($row->description,0,150); }?>.......
                                    </p>
                                    <ul class="amenity_list">
                                        <?php if($this->session->userdata('site_lang') == 'arabic'){
                                                    if($row->property_amenity->p_name_ar)
                                                    {
                                                        sort(explode(',',$row->property_amenity->p_name_ar));
                                                            $i=0;foreach(explode(',',$row->property_amenity->p_name_ar) as $am){ ?>
                                                            <li ><?php if($i <= 8) { echo '<li>'.substr($am,0,15).'</li>'; } ?></li>
                                                            <?php $i++; }
                                                    }else{
                                                        sort(explode(',',$row->property_amenity->p_name));
                                                            $i=0;foreach(explode(',',$row->property_amenity->p_name) as $am){ 
                                                            if($i <= 8) { echo '<li>'.substr($am,0,15).'</li>'; } 
                                                            $i++; }
                                                    }
                                        }else{
                                            sort(explode(',',$row->property_amenity->p_name));
                                             $i=0;foreach(explode(',',$row->property_amenity->p_name) as $am){ 
                                             if($i <= 8) { echo '<li>'.substr($am,0,15).'</li>'; } 
                                             $i++; }
                                        }
                                        ?>                                        
                                    </ul>
                                    <ul class="amenity_list">
                                        <?php if($this->session->userdata('site_lang') == 'arabic'){
                                                    if(isset($row->room_amenity->am_name_ar) && $row->room_amenity->am_name_ar != '')
                                                    {
                                                        if(isset($row->room_amenity->am_name_ar)){
                                                            sort(explode(',',$row->room_amenity->am_name_ar));
                                                            $i=0;foreach(explode(',',$row->room_amenity->am_name_ar) as $am){ ?>
                                                            <li ><?php if($i <= 8) { echo '<li>'.substr($am,0,15).'</li>'; } ?></li>
                                                            <?php $i++; }
                                                        }
                                                    }else{
                                                        if(isset($row->room_amenity->am_name)){
                                                            sort(explode(',',$row->room_amenity->am_name));
                                                            $i=0;foreach(explode(',',$row->room_amenity->am_name) as $am){ 
                                                            if($i <= 8) { echo '<li>'.substr($am,0,15).'</li>'; } 
                                                            $i++; }
                                                        }
                                                    }
                                        }else{
                                            if(isset($row->room_amenity->am_name)){
                                                sort(explode(',',$row->room_amenity->am_name));
                                                $i=0;foreach(explode(',',$row->room_amenity->am_name) as $am){ 
                                                if($i <= 8) { echo '<li>'.substr($am,0,15).'</li>'; } 
                                                $i++; }   
                                            }                                            
                                        }
                                        ?>                                        
                                    </ul>
                                </div>                        
                            </li>
                    <?php $i++; } }else{ ?>
                         <li>
                            <div class="col-md-12">
                                <div class="room_rate">
                                No Records Found. Try Another Search.
                                </div>
                            </div>
                         </li>   
                    <?php } ?>                                
                </ul>