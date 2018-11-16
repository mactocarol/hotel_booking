<?php

class Hotel_detail_model extends HT_Model 
{
	function __construct() {

		parent::__construct();		

	}
    
    public function get_least_price_hotel($hotelid){			    
            $this->db->select('r.*');
            $this->db->from('rooms as r');
			$this->db->where("r.hotel_id",$hotelid);            
            $this->db->order_by("r.price",'ASC');
			$query = $this->db->get();
            $res = $query->row();
			return $res->price;
    }
    
}