<?php

class Hotel_model extends HT_Model 
{
	function __construct() {

		parent::__construct();		

	}
        
    
    public function get_hotel_room_list($hotel_id){
        $this -> db -> select('r.*,rt.type,rt.type_ar,h.name');
        $this -> db -> from('rooms as r');
        $this -> db -> join('room_type as rt','r.roomtype_id=rt.id','left');
        $this -> db -> join('hotels as h','r.hotel_id=h.id','left');
        $this -> db -> where('r.hotel_id',$hotel_id);
        $query = $this->db->get();
        $result = $query->result();
        
        foreach($result as $key=> $value){
			
			$this->db->where("room_id",$value->id);
			$res=$this->db->get("room_amenity")->result();
			$t=array();
			foreach($res as $rs)
			{
				$t[]=$rs->name;
			}
			$result[$key]->amenities=$t;
		}
        foreach($result as $key=> $value){
			
			$this->db->where("room_id",$value->id);
			$res=$this->db->get("room_amenity")->result();
			$t=array();
			foreach($res as $rs)
			{
				$t[]=$rs->name_ar;
			}
			$result[$key]->amenities_ar=$t;
		}
        foreach($result as $key=> $value){
			
			$this->db->where(array("room_id"=>$value->id,"hotel_id"=>$hotel_id));
			$res=$this->db->get("hotel_images")->result();
			$t=array();
			foreach($res as $rs)
			{
				$t[]=$rs->image;
			}
			$result[$key]->images=$t;
		}
        //echo "<pre>";print_r($result); die;
        return $result;
    }
    
    public function get_room_detail($room_id){
        $this -> db -> select('r.*,rt.type,rt.type_ar,h.name,h.id as hid');
        $this -> db -> from('rooms as r');
        $this -> db -> join('room_type as rt','r.roomtype_id=rt.id','left');
        $this -> db -> join('hotels as h','r.hotel_id=h.id','left');
        $this -> db -> where('r.id',$room_id);
        $query = $this->db->get();
        $result = $query->row();
        //print_r($result); die;
			$this->db->where("room_id",$result->id);
			$res=$this->db->get("room_amenity")->result();
			$t=array();
			foreach($res as $rs)
			{
				$t[]=$rs->name;
			}
			$result->amenities=$t;
        
			$this->db->where("room_id",$result->id);
			$res=$this->db->get("room_amenity")->result();
			$t=array();
			foreach($res as $rs)
			{
				$t[]=$rs->name_ar;
			}
			$result->amenities_ar=$t;
        	
			$this->db->where(array("room_id"=>$result->id));
			$res=$this->db->get("hotel_images")->result();
			$t=array();
			foreach($res as $rs)
			{
				$t[]=$rs->image;
			}
			$result->images=$t;
        return $result;
    }
    function getRows(){
    		$q= $this->db->get('hb_hotels');
			return $q->num_rows();
		}
    
}