<?php

class Home_model extends HT_Model 
{
	function __construct() {

		parent::__construct();		

	}
       
    public function get_search_destination($search_item){
     $this->db->select('ct.*,cr.name as cname');
     $this->db->from('cities as ct');
     $this->db->join('countries as cr','ct.country_code = cr.code');
     $this->db->like('ct.name',$search_item,'after');
        $query = $this->db->get();
        //print_r($query->result()); die;
        return $query->result();
    }

}

?>