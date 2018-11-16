<?php

class Pre_booking_model extends HT_Model 
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
    
    
    public function selectingdata($email, $from){
			$this->db->select(['id','email']);
			$this->db->from('hb_customer');
			$this->db->where('email', $email);
			$this->db->where('recever_from',$from);
			$q=$this->db->get();
			 if ( $q->num_rows() > 0 )
			    {
			        $row = $q->row_array();
			        return $row;
			    }
		}
		public function can_log_in($email, $password, $user_from){
			$this->db->where ('email',$email);
			$this->db->where ('status',1);
			$this->db->where ('password',md5 ($password));
			$this->db->where('recever_from',$user_from);
			$query=$this->db->get('hb_customer');

			if ($query->num_rows()==1){
				return true;
				
			}
			else
			{
				return false;
			}
		}
        
        public function add_user($data){
			$query=$this->db->insert('hb_customer',$data);
			if($query){
				return true;
			}
			else
			{
				return false;
			}
		}
    
}