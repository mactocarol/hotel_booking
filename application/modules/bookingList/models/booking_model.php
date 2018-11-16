<?php
class Booking_model extends CI_model{
	function __construct() {

		parent::__construct();
		$this->load->library('session');		

	}
	function getRows(){
        
		$q= $this->db->get('hb_booking');
		return $q->num_rows();
	}
	function hotelbookingpagination($place1,$place2,$place3,$place4,$WhereData,$Selectdata,$TableName1,$TableName2,$TableName3,$orderby,$limit,$start){
		$this->db->limit($limit,$start);
		$this->db->select($Selectdata);
		$this->db->from($TableName1);
		$this->db->join($TableName2, $place1 .'='. $place2);
		$this->db->join($TableName3, $place3 .'='. $place4);
		$this->db->order_by($orderby);
		$this->db->where($WhereData);
		$query = $this->db->get();
		return $query->result_array();
	}
    
    function getcancelRows(){
        $this->db->where('is_cancelled','1');
		$q= $this->db->get('hb_booking');
		return $q->num_rows();
	}
    
    function UpdateRecords($TableName,$Data,$WhereData=NULL){
		if($WhereData!=NULL){$this->db->where($WhereData);}
		$Result = $this->db->update($TableName,$Data);  
		return $Result;
	}
}


?>