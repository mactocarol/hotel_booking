<?php

	class Myaccounts_model extends HT_Model
	{
		
		function __construct()
		{
			parent::__construct();
		}
		function selecdata($id){
			$this->db->select('*');
			$this->db->from('hb_customer');
			$this->db->where('id', $id);
			$q=$this->db->get();
			 if ( $q->num_rows() > 0 )
			    {
			        $row = $q->row_array();
			        return $row;
			    }

		}
		function change_profile($data){
			$this->db->set($data);
			$this->db->where('id',$this->session->userdata('id'));
			$q=$this->db->update('hb_customer');
			if ($q){
				return true;
			}
			else
			{
				return false;
			}

		}
		function check_password(){
			$this->db->where('id',$this->session->userdata('id'));
			$this->db->where('password',md5($this->input->post('oldpassword')));
			$query=$this->db->get('hb_customer');

			if ($query->num_rows()==1){
				return true;
				
			}
			else
			{
				return false;
			}

		}
		function change_password(){
			$this->db->set('password',md5($this->input->post('newpassword')));
			$this->db->where('id',$this->session->userdata('id'));
			$query=$this->db->update('hb_customer');
			if ($query){
				return true;	
			}
			else
			{
				return false;
			}
		}
		function profile_pic($image_path){
			$this->db->set('profile_pic',$image_path);
			$this->db->where('id', $this->session->userdata('id'));
			$query=$this->db->update('hb_customer');
			if ($query){
				return true;	
			}
			else
			{
				return false;
			}
		}
		function getRows($id){
		$this->db->where('user_id',$id);
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
		
	}


?>