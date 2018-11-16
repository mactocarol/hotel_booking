<?php

class User_Model extends HT_Model{
	function __construct() {

		parent::__construct();
		$this->load->library('session');		

	}
	function getRows(){
		$q= $this->db->get('hb_customer');
		return $q->num_rows();
	}
	function add_user($data)
	{
		$q=$this->db->insert('hb_customer',$data);

		if ($q){
			return true;
		}
		else
		{
			return false;
		}
	}
	function selectuserdata($data){
		$this->db->select($data['fields']);
		$this->db->where($data['where']);
		$q=$this->db->get($data['table']);
		return $q->row();
	}
	function update($data){
		$this->db->where('id',$data['id']);
		$q=$this->db->update('hb_customer', $data);
		if ($q)
		{
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}
	function delete($data)
	{
		$this->db->where('id',$data['id']);
		$q=$this->db->delete('hb_customer');
		if ($q)
		{
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}

	
}


?>