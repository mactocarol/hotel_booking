 <?php //echo "<pre>"; print_r($this->cart->contents()); die;?>
 <div class="total_hotel">
                        <h3>Selected Rooms</h3>
                        <?php $total = 0 ; if(!empty($this->cart->contents())){
                        foreach ($this->cart->contents() as $items) { ?>
                            <article class="latest_post">
                                <figure>
                             
                                </figure>
                                <div class="details">
                                <h6><a href="blog-post.html"><?=explode('|',$items['options']['room_type'])[0]?></a> - </h6>                                
                                <span><h6><?=round($items['price'],2)?> &nbsp; ( <?=$items['qty']?> room )</h6></span>
                                <span onclick="remove_room('<?php echo $items['rowid']; ?>');" ><a href="#" id="remove_cart" onclick="return false;"><u>remove</u></a></span>
                                </div>
                            </article>
                        <?php $total += $items['subtotal'];} }else{ echo "Empty cart"; } ?>        
        
                                <div class="total_price">
                                    <div class="col-md-8"><h2>Total cost</h2></div>
                                    <div class="col-md-4"><h2>AED <?=round($total,2)?></h2></div>
                                </div>
                                <form id="bookingform" action="<?php echo site_url('pre_booking');?>"  method="post" >                                                        
                                    <!--<input name="hotel_id" type="hidden" value="<?php  //echo $hotel_detail->hotel_id; ?>">-->
                                    <input name="room_rate" type="hidden" value="<?php  echo $total; ?>">
                                    
                                <div class="total_price">
                                    <button class="btn btn-danger" <?php if($total == 0) echo 'disabled';?>>Book now</button>
                                </div>
                                </form>
                        </div>