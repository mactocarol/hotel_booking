<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

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
		$this->load->helper(array('form','url'));
		$this->load->model('welcome_model');
		$this->load->library('session');
		$this->load->library('form_validation');
	}
	public function index()
	{
		$data = new stdClass();
		$data->results = $this->welcome_model->get_all_items();
		$this->load->view('welcome_message',$data);
	}
	
	public function add_item()
	{
		$data=new stdClass();
		
		if($_POST){
				$this->form_validation->set_rules('name', 'Name', 'trim|required');
				
				if ($this->form_validation->run() == FALSE)
				{
					$data->error=1;
					$data->success=0;
					$data->message=validation_errors();
				}
				else
				{
					
					$name = $this->security->xss_clean($this->input->post('name'));
					$qty = $this->security->xss_clean($this->input->post('qty'));
					
					
					$userdata['name'] = $name;			
					$userdata['qty'] = $qty;
					
					$result = $this->welcome_model->insert_item($userdata);
					//echo "<pre>";
					//print_r($result); die;
					if($result)
					{			
							$data->error=0;
							$data->success=1;
							$data->message='Record Added Successfully';														
					}
					else
					{
						$data->error=1;
						$data->success=0;
						$data->message='Network Error! Please try again.';			
					}
				}
				$this->session->set_flashdata('item',$data);
				//print_r($this->session->flashdata('item')); die;
				redirect('AddItem');
		}
		$this->load->view('add_item_view',$data);
	}
	
	public function list_item()
	{
		$data = new stdClass();
		$data->results = $this->welcome_model->get_all_items();
		$this->load->view('list_item_view',$data);
	}
	
	public function edit_item($id='')
	{
		$data=new stdClass();
		$data->results = $this->welcome_model->get_single_item($id);
		if($_POST){
				$this->form_validation->set_rules('name', 'Name', 'trim|required');
				$this->form_validation->set_rules('qty', 'Quantity', 'trim|required');
				
				if ($this->form_validation->run() == FALSE)
				{
					$data->error=1;
					$data->success=0;
					$data->message=validation_errors();
				}
				else
				{
					
					$name = $this->security->xss_clean($this->input->post('name'));
					$qty = $this->security->xss_clean($this->input->post('qty'));
					
					
					$userdata['name'] = $name;			
					$userdata['qty'] = $qty + $data->results->qty;
					
					$result = $this->welcome_model->update_item($userdata,$id);
					//echo "<pre>";
					//print_r($result); die;
					if($result)
					{			
							$data->error=0;
							$data->success=1;
							$data->message='Record Updated Successfully';														
					}
					else
					{
						$data->error=1;
						$data->success=0;
						$data->message='Network Error! Please try again.';			
					}
				}
				$this->session->set_flashdata('item',$data);
				//print_r($this->session->flashdata('item')); die;
				redirect('EditItem/'.$id);
		}
		
		$data->id = $id;
		
		//echo "<pre>"; print_r($data->results->qty); die;
		$this->load->view('edit_item_view',$data);
	}

	public function delete_item($id='')
	{
		$data=new stdClass();
		$data->results = $this->welcome_model->get_all_items();
		if($id){
					
					$result = $this->welcome_model->delete_item($id);
					//echo "<pre>";
					//print_r($result); die;
					if($result)
					{			
							$data->error=0;
							$data->success=1;
							$data->message='Record Deleted Successfully';														
					}
					else
					{
						$data->error=1;
						$data->success=0;
						$data->message='Network Error! Please try again.';			
					}
				$this->session->set_flashdata('item',$data);
				//print_r($this->session->flashdata('item')); die;
				redirect('ListItem');
		}
		
		$this->load->view('list_item_view',$data);
	}
	
	public function add_fatiha()
	{
		$data=new stdClass();
		
		if($_POST){
				$this->form_validation->set_rules('name', 'Fatiha Name', 'trim|required');
				$this->form_validation->set_rules('description', 'Fatiha Description', 'trim|required');
				if ($this->form_validation->run() == FALSE)
				{
					$data->error=1;
					$data->success=0;
					$data->message=validation_errors();
				}
				else
				{
					$results = $this->welcome_model->get_all_fatiha();			
					$name = $this->security->xss_clean($this->input->post('name'));
					$description = $this->security->xss_clean($this->input->post('description'));
					$order = count($results) + 1;
					
					$userdata['name'] = $name;			
					$userdata['description'] = $description;
					$userdata['order_no'] = $order;
					
					$result = $this->welcome_model->insert_fatiha($userdata);
					//echo "<pre>";
					//print_r($result); die;
					if($result)
					{			
							$data->error=0;
							$data->success=1;
							$data->message='Record Added Successfully';														
					}
					else
					{
						$data->error=1;
						$data->success=0;
						$data->message='Network Error! Please try again.';			
					}
				}
				$this->session->set_flashdata('item',$data);
				//print_r($this->session->flashdata('item')); die;
				redirect('AddFatiha');
		}
		$this->load->view('add_fatiha_view',$data);
	}
	
	public function list_fatiha()
	{
		$data = new stdClass();
		$data->results = $this->welcome_model->get_all_fatiha();
		$this->load->view('list_fatiha_view',$data);
	}
	
	public function edit_fatiha($id='')
	{
		$data=new stdClass();
		$data->results = $this->welcome_model->get_single_fatiha($id);
		if($_POST){
				$this->form_validation->set_rules('name', 'Fatiha Name', 'trim|required');
				$this->form_validation->set_rules('description', 'Fatiha Description', 'trim|required');
				$this->form_validation->set_rules('order', 'Fatiha Order', 'trim|required');
				
				if ($this->form_validation->run() == FALSE)
				{
					$data->error=1;
					$data->success=0;
					$data->message=validation_errors();
				}
				else
				{
					
					$name = $this->security->xss_clean($this->input->post('name'));
					$description = $this->security->xss_clean($this->input->post('description'));
					$order = $this->security->xss_clean($this->input->post('order'));					
					
					$userdata['name'] = $name;			
					$userdata['description'] = $description;
					$userdata['order_no'] = $order;
					
					$result = $this->welcome_model->update_fatiha($userdata,$id);
					//echo "<pre>";
					//print_r($result); die;
					if($result)
					{			
							$data->error=0;
							$data->success=1;
							$data->message='Record Updated Successfully';														
					}
					else
					{
						$data->error=1;
						$data->success=0;
						$data->message='Network Error! Please try again.';			
					}
				}
				$this->session->set_flashdata('item',$data);
				//print_r($this->session->flashdata('item')); die;
				redirect('EditFatiha/'.$id);
		}
		
		$data->id = $id;
		
		//echo "<pre>"; print_r($data->results->qty); die;
		$this->load->view('edit_fatiha_view',$data);
	}

	public function delete_fatiha($id='')
	{
		$data=new stdClass();
		$data->results = $this->welcome_model->get_all_fatiha();
		if($id){
					
					$result = $this->welcome_model->delete_fatiha($id);
					//echo "<pre>";
					//print_r($result); die;
					if($result)
					{			
							$data->error=0;
							$data->success=1;
							$data->message='Record Deleted Successfully';														
					}
					else
					{
						$data->error=1;
						$data->success=0;
						$data->message='Network Error! Please try again.';			
					}
				$this->session->set_flashdata('item',$data);
				//print_r($this->session->flashdata('item')); die;
				redirect('ListFatiha');
		}
		
		$this->load->view('list_fatiha_view',$data);
	}
	
	public function assign_fatiha($id='')
	{
		$data=new stdClass();
		$data->results = $this->welcome_model->get_single_fatiha($id);
		$data->itemss = $this->welcome_model->get_all_items();
		foreach($data->itemss as $key=>$value){
				$res = $this->welcome_model->get_single_assign($value->id,$id);
				//print_r($res); die;
				if($res){
					$data->itemss[$key]->assign_qty = $res->item_qty;
					$data->itemss[$key]->assign_id = $res->id;
				}else{
					$data->itemss[$key]->assign_qty = '';
					$data->itemss[$key]->assign_id = '';
				}
		}
		//echo "<pre>"; print_r($data->items); die;
		if($_POST){
			//echo "<pre>";
				//echo "<pre>"; print_r($_POST); die;
				if(!empty($this->input->post('assign_id'))){
					foreach($this->input->post('item_id') as $key=>$resp){
						$userdata = [];
						if($this->input->post('assign_qty')[$key] !=''){
							if($this->input->post('assign_id')[$key]){
								$userdata['item_qty'] = $this->input->post('assign_qty')[$key];								
								$result = $this->welcome_model->update_assignment($userdata,$this->input->post('assign_id')[$key]);
								if($result){
									$qty = $this->welcome_model->get_single_item($this->input->post('item_id')[$key]);
									$result = $this->welcome_model->update_item(array('qty'=>($qty->qty - ($this->input->post('assign_qty')[$key]))),$this->input->post('item_id')[$key]);	
								}
							}else{
								$userdata['item_qty'] = $this->input->post('assign_qty')[$key];
								$userdata['item_id'] = $this->input->post('item_id')[$key];
								$userdata['category_id'] = $id;								
								$result = $this->welcome_model->insert_assignment($userdata);
								//update item available quanity
								$qty = $this->welcome_model->get_single_item($this->input->post('item_id')[$key]);
								$result = $this->welcome_model->update_item(array('qty'=>($qty->qty - ($this->input->post('assign_qty')[$key]))),$this->input->post('item_id')[$key]);
							}							
						}
					}
					
					if($result)
					{			
							$data->error=0;
							$data->success=1;
							$data->message='Assigned Successfully';														
					}
					else
					{
						$data->error=1;
						$data->success=0;
						$data->message='Network Error! Please try again.';			
					}
				}
				$this->session->set_flashdata('item',$data);
				//print_r($this->session->flashdata('item')); die;
				redirect('AssignFatiha/'.$id);
		}
		
		$data->id = $id;
		
		//echo "<pre>"; print_r($data->results->qty); die;
		$this->load->view('assign_fatiha_view',$data);
	}
}
