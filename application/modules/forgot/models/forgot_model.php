<?php
	
	class Forgot_model extends HT_Model
	{

		function __construct() {


		parent::__construct();		


		}
		
		public function check_email($email){
			$this->db->where ('email',$email);
			$this->db->where ('status',1);
			$this->db->where('recever_from','web');
			$query=$this->db->get('hb_customer');

			if ($query->num_rows()==1){
				return true;
			}
			else
			{
				return false;
			}
		}
		public function add_key($key){
			$this->db->set('key', $key); 
			$this->db->where('email',$this->input->post('email'));
			$this->db->where('recever_from','web'); 
			$this->db->update('hb_customer'); 
			return true;
		}
		public function is_key_valid($key){
			$this->db->where('key',$key);
			$this->db->where('status',1);
			$query=$this->db->get('hb_customer');
			if($query->num_rows()==1){
				return true;
			}
			else
			{
				return false;
			}
		}
		public function reset_password(){
			$this->db->set('password',md5($this->input->post('password')));
			$this->db->where('key',$this->input->post('key'));
			$this->db->update('hb_customer');
			return true;
			
		}
	}

?>