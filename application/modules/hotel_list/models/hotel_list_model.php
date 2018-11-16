<?php

class Hotel_list_model extends HT_Model 
{
	function __construct() {

		parent::__construct();		

	}
    
    public function get_hotel_by_price($hotel_id,$rating='',$min,$max){
        
        
       $query = $this->db->query("SELECT * from hb_hotels WHERE `hotel_id` = '$hotel_id' AND `price` BETWEEN $min AND $max");
       //print_r($query->result()); die;
       return (object)$query->row();
    }
    
    public function get_least_price_hotel($hotel_list,$POST){
        print_r($POST); die;
        $hotellist = [];
        $property = isset($_POST['property_amenities'])?$_POST['property_amenities']:array();
        
            foreach($hotel_list as $key=> $value){
                $this->db->select('*');
                $this->db->from('property_amenity');
                $this->db->where("hotel_id",$value['hotel_id']);                
                $query = $this->db->get();
                $res2 = $query->result();
                $property_amenities = [];foreach($res2 as $r){$property_amenities[] = $r->name;}
                //echo "<pre>"; print_r($property_amenities);
                if(!empty($property)){
                        $k = 0;
                        foreach($property as $p){
                            //echo $p;
                            if(in_array($p,$property_amenities)){                            
                                $k++;
                            }
                        }
                        //echo $k; die;
                        if($k){
                            $value['property_amenity'] = $property_amenities;
                            $hotellist[] = $value;
                        }
                }else{
                    $value['property_amenity'] = $property_amenities;
                    $hotellist[] = $value;
                }
            }
       
        //echo "<pre>"; print_r($hotellist); die;
        $rslt =array();        
            foreach($hotellist as $key=> $value){
			            
            $this->db->select('r.*');
            $this->db->from('rooms as r');
			$this->db->where("r.hotel_id",$value['id']);
            if(!empty($POST['price'])){
                $price = explode(';',$POST['price']);
                $price0 = intval($price[0]);
                $price1 = intval($price[1]);
                $this->db->where("r.price >=",$price0);
                $this->db->where("r.price <=",$price1);
            }
            
           
            if($POST['sorting'] == 'name'){ echo "";
                $this->db->order_by("r.name",'DESC');
            }
            //$this->db->order_by("r.price",'ASC');
			$query = $this->db->get();
            $res = $query->row();
			//print_r($res); die;
            if(isset($res->price)){
                $value['price']=$res->price;                
                    $this->db->select('name');
                    $this->db->from('room_amenity');
                    $this->db->where("room_id",$res->id);                    
                    $query = $this->db->get();
                    $res1 = $query->result();
                    $amenities = [];foreach($res1 as $r){$amenities[] = $r->name;}
                    
                    $room_amenity = isset($_POST['hotel_amenities'])?$_POST['hotel_amenities']:array();
                    
                    if(!empty($room_amenity)){
                        $count = 0;
                        foreach($room_amenity as $am){
                            if(in_array($am,$amenities)){
                                $count++;
                            }
                        }
                
                        if($count){
                            $value['amenity']=$res1;
                            $rslt[] = $value;
                        }
                    }else{
                        $value['amenity']=$res1;
                        $rslt[] = $value;                        
                    }
                
            }
			
		}
        
        //echo "<pre>"; print_r($rslt); die;
        return $rslt; die;
    }
    
     public function get_search_hotel($search_item){
     $this->db->select('h.*');
     $this->db->from('hotels as h');     
     $this->db->like('h.name',$search_item,'after');
        $query = $this->db->get();
        //print_r($query->result()); die;
        return $query->result();
    }
	
	
	public function get_hotel_list($search_item){		
     $this->db->select('pa.name as p_name,pa.name_ar as p_name_ar,ra.name as am_name,ra.name_ar as am_name_ar,hi.image,h.name,h.rating,h.hotel_id');
     $this->db->from('hotels as h');
	 $this->db->join('hotel_images as hi','h.hotel_id = hi.hotel_id','left');
	 $this->db->join('property_amenity as pa','h.hotel_id = pa.hotel_id','left');
	 $this->db->join('room_amenities as ra','h.hotel_id = ra.hotel_id','left'); 
     $this->db->where('h.city',explode(';',$search_item['city'])[0]);
	 $this->db->order_by('h.id','rand');
	 $this->db->limit(50);
        $query = $this->db->get();
        //echo "<pre>"; print_r($query->result()); die;
        return $query->result();
    }
    

}