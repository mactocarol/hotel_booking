<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<div class="loader1"></div>

<section class="room_list_outer">
	<div class="container">
    	<div class="col-md-3">
        	<!--<div class="map_panel"><img src="<?php echo base_url();?>assets/images/map.png"><a href="#">map view</a></div>-->
            <!--<div class="find_hotel">
             <div class="find_hotel_search">
            	
	<div class="col-md-12"><input type="text" class="input-text-book" placeholder="Destination: Country, City,Airport,..."></td></div>
        <div class="col-md-6"><input type="date" class="input-text-book" placeholder="check in"></div>
        <div class="col-md-6"><input type="date" class="input-text-book" placeholder="check out"></div>
          <div class="col-md-6"><input type="number" class="input-text-book" placeholder="Adults"></div>
          <div class="col-md-6"><input type="number" class="input-text-book" placeholder="Children"></div>
         <div class="col-md-12"><input type="number" class="input-text-book" placeholder="Age of Children"></div>
            <div class="col-md-12"><input type="submit" class="input-btn-book btn-primary read_more_btn" value="book now"></div>

            </div></div>-->
            <form name="filter_form" method="POST" id="filter_form">
            <div class="filter_box">
            	<h2>hotel name</h2>                    
                	<input type="text" id="hotel_search" name="hotel_name" placeholder="search hotel name ..." class="input-text-book">
                    <input type="hidden" id="hotel_search_hidden" class="input-text-book">
                    <input type="" class="input-btn-book btn-primary read_more_btn">
                
            </div>
            
               <div class="filter_box">
                    <h2>price</h2>
              
                    <span><input class="Slider1" type="text" id="price_range" name="price"   value="100;2000"  /></span> 
                </div>
            
            <div class="filter_box">
            	<h2>hotel rating</h2><input type="checkbox" name="rating_check">
             <!--<input type="text" name="rating" class="rating rating-loading" onchange="$( '#filter_form' ).trigger( 'click' );" value="4" data-size="xs" title="">-->
             <input type="number" name="rating" id="rating1" class="rating" onchange="$( '#filter_form' ).trigger( 'click' );" value="4">
            
            </div>
            
              <div class="filter_box property">
            	<h2>Room amenities</h2>
                <?php $room_amenity_arr = ["Air conditioning","Wake-up call","Swimming pool","Coffee/tea","Daily housekeeping",
                                           "Hair dryer","newspaper","Rollaway/extra beds","Cribs/infant beds","bottled water",
                                           "Electronic/magnetic keys","Slippers","Television","Free Wi-Fi","Bathtub or shower",
                                           "Direct-dial phone","Private bathroom","Internet","Blackout drapes/curtains","Extra towels/bedding","Pay movies",
                                           "Iron/ironing board","Complimentary toiletries","Breakfast","Lunch","Dinner"];
                sort($room_amenity_arr);                
                ?>
             	<ul>
                    <?php foreach($room_amenity_arr as $prop){?>
                    <li><input type="checkbox" name="hotel_amenities[]" value="<?=$prop?>"><?=ucwords($prop)?> </li>
                    <?php } ?>
                	<!--<li><input type="checkbox" name="hotel_amenities[]" value="tv"> television</li>
                    <li><input type="checkbox" name="hotel_amenities[]" value="Air conditioning"> Air-conditioner </li>
                    <li><input type="checkbox" name="hotel_amenities[]" value="Wireless Internet access (surcharge)"> Free Wifi </li>
                    <li><input type="checkbox" name="hotel_amenities[]" value="Wake-up calls"> Wake-up calls</li>
                    <li><input type="checkbox" name="hotel_amenities[]" value="Lunch"> Lunch </li>
                    <li><input type="checkbox" name="hotel_amenities[]" value="Coffee/tea maker">  Coffee/tea maker </li>
                    <li><input type="checkbox" name="hotel_amenities[]" value="Complimentary newspaper">  Complimentary newspaper </li>-->
                    
                </ul>
             	                         
            </div>
            
            <div class="filter_box property">
                <?php $prop_amenity_arr = ["Bar/lounge","Elevator/lift","Swimming pool","Health club","Dry cleaning/laundry service",
                                           "Parking","newspapers","Massage - spa treatment","Banquet facilities","Express check-out",
                                           "Currency exchange","Medical assistance","Water park","ATM/banking","Children's club",
                                           "Restaurant","Luggage storage","Internet","station pickup","Terrace","Babysitter",
                                           "Room Service","Garage","Doctor On Call","Travel agency facilities","Public Television"];
                sort($prop_amenity_arr);                
                ?>
                                           
            	<h2>Hotel amenities</h2>             
             	<ul>
                    <?php foreach($prop_amenity_arr as $prop){?>
                    <li><input type="checkbox" name="property_amenities[]" value="<?=$prop?>"><?=ucwords($prop)?> </li>
                    <?php } ?>
                    <!--<li><input type="checkbox" name="property_amenities[]" value="ATM/banking">  ATM/Banking </li>
                    <li><input type="checkbox" name="property_amenities[]" value="Free newspapers">Free Newspaper</li>
                	<li><input type="checkbox" name="property_amenities[]" value="Swimming pool - outdoor"> Swimming Pool</li>
                    <li><input type="checkbox" name="property_amenities[]" value="gym"> Gym </li>
                    <li><input type="checkbox" name="property_amenities[]" value="Health club"> Club </li>
                    <li><input type="checkbox" name="property_amenities[]" value="Free parking"> Free Parking</li>
                    <li><input type="checkbox" name="property_amenities[]" value="epsum"> epsum </li>-->
                    
                </ul>             	                    
            </div>
            
            
           
            
        </div>
        <div class="col-md-9">
        	<div class="filter_panel">
            	<ul class="filter_bar">
                	<li>sort by : </li>
                     <li id="infoToggler"><a href="#" ><input id="sort_type" name="sort_type" type="hidden" value="desc"><img src="<?php echo base_url();?>assets/images/sort_icon.png"><img src="<?php echo base_url();?>assets/images/sort_icon1.png" style="display:none"></a></li>
                    
                    
                    <li class="sorting active" for="sorting"><a href="#"><input type="radio" name="sorting" id="sorting" value="name" checked>name</a></li>                    
                    <!-- <li class="sorting" for="sorting"><a href="#"><input type="radio" name="sorting" id="sorting" value="distance">distance</a></li>-->
                     <li class="sorting" for="sorting"><a href="#"><input type="radio" name="sorting" id="sorting" value="rating">rating</a></li>                    
                     <li class="sorting" for="sorting"><a href="#"><input type="radio" name="sorting" id="sorting" value="price">price</a></li>
                     <!--<li class="sorting" for="sorting"><a href="#"><input type="radio" name="sorting" id="sorting" value="popular">popular</a></li>                    -->
                     
                </ul></form> 
                
                <style>
                    #sorting {
                        display: none;
                    }
                </style>
                <div id="filter_room">
                <div class="loader"></div>
                <ul class="room_list_inner" id="room_list_inner">
                    <?php if(isset($hotel_list)){ $i=1;
                          foreach($hotel_list as $key => $row) { ?>    
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
                                    <div class="room_rate"><span>AED <?php  echo (round($row->price,2)) ? round($row->price,2) : ''; ?></span> per night</div>
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
                </div>
                
            </div>
            
            
            
            
        </div>
     
    </div>
</section>
