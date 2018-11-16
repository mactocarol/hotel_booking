<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome_model extends CI_Model {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function __construct(){
		parent::__construct();
		$this->load->database();
	}
	public function get_all_items()
	{
		$this->db->select('*');
		$this->db->from('items');
		$query = $this->db->get();
		return $query->result();
	}
	
	public function get_single_item($id)
	{
		$this->db->select('*');
		$this->db->from('items');
		$this->db->where('id',$id);
		$query = $this->db->get();
		return $query->row();
	}
	
	public function insert_item($userdata)
	{
		$this->db->insert('items',$userdata);
		return $this->db->insert_id();	
	}
	
	public function update_item($userdata,$id)
	{
		$this->db->where('id',$id);
		$this->db->update('items',$userdata);
		return 1;	
	}
	
	public function delete_item($id)
	{
		$this->db->where('id',$id);
		$this->db->delete('items');
		return 1;	
	}
	
	public function insert_fatiha($userdata)
	{
		$this->db->insert('category',$userdata);
		return $this->db->insert_id();	
	}
	
	public function get_all_fatiha()
	{
		$this->db->select('*');
		$this->db->from('category');
		$this->db->order_by('order_no','asc');
		$query = $this->db->get();
		return $query->result();
	}
	
	public function get_single_fatiha($id)
	{
		$this->db->select('*');
		$this->db->from('category');
		$this->db->where('id',$id);
		$query = $this->db->get();
		return $query->row();
	}
	public function update_fatiha($userdata,$id)
	{
		$this->db->where('id',$id);
		$this->db->update('category',$userdata);
		return 1;	
	}
	
	public function delete_fatiha($id)
	{
		$this->db->where('id',$id);
		$this->db->delete('category');
		return 1;	
	}
	
	public function get_single_assign($itemid, $catid)
	{
		$this->db->select('*');
		$this->db->from('assignment');
		$this->db->where('category_id',$catid);
		$this->db->where('item_id',$itemid);
		$query = $this->db->get();
		return $query->row();
	}
		
	public function insert_assignment($userdata)
	{
		$this->db->insert('assignment',$userdata);
		return $this->db->insert_id();	
	}
	
	public function update_assignment($userdata,$id)
	{
		$this->db->where('id',$id);
		$this->db->update('assignment',$userdata);
		return $this->db->affected_rows();	
	}
}
