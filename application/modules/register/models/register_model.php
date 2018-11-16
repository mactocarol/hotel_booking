<?php
class Register_model extends HT_Model 
{
	function __construct() {
		parent::__construct();		
	}
    
    function email_exists($email)
	{
		$this->db->where('email', $email);
		$query = $this->db->get('hb_customer');
		if( $query->num_rows() > 0 ){ return False; } else { return True; }
	}
        
}