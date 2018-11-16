<?php
	// Valied User 
	class Register_model extends CI_model
	{
		
		function new_user ($data){
			return $q=$this->db->insert ('hb_customer', $data);
		}
		public function is_key_valid($key){
			$this->db->set('status', 1); 
			$this->db->where('key',$key); 
			$this->db->update('hb_customer'); 
			return true;
		}
		function email_exists($email)
		{
			$this->db->where('email', $email);
			$query = $this->db->get('hb_customer');
			if( $query->num_rows() > 0 ){ return True; } else { return False; }
		}
	}

?>