<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Registration extends MX_Controller {
	function __construct() { 
         parent::__construct(); 
         $this->load->library('session'); 
         $this->load->helper('form');
         
      } 

	public function index()
	{
		$data= new stdClass();
		$data->page_title = "Registration";
        $data->page_text = "New User Registration!";
        $data->page = "signup";
        $this->template->write_view('content','registration/Register_view',$data);
        $this->template->render();	
	}
	function sign_up()
	{
		if(!empty($_POST)){
		$this->form_validation->set_rules ('first_name', 'First Name', 'trim|required');
		$this->form_validation->set_rules ('last_name', 'Last Name', 'trim|required');
		$this->form_validation->set_rules ('mobile', 'Mobile', 'trim|required|numeric|max_length[10]');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[hb_customer.email]');
		$this->form_validation->set_rules ('city', 'City', 'trim|required');
		$this->form_validation->set_rules ('gender', 'Gender', 'required');
		$this->form_validation->set_rules ('password', 'Password','trim|required|min_length[6]');
		$this->form_validation->set_rules ('repassword', 'RePassword','trim|required|min_length[6]|matches[password]');
		$this->form_validation->set_message('is_unique','That email addresss is already exists.');
		$this->form_validation->set_error_delimiters ('<p>','</p>');
			if ($this->form_validation->run())
			{
				$key=md5 (uniqid());
				//sending conformation mail to signup user
				$this->load->library('email');
				$this->email->set_mailtype("html");
				$this->email->from ('infoash.atc@gmail.com','Admin');
				$this->email->to ($this->input->post('email'));
				$this->email->subject('Confirm your account');

				$message="<p>Thank you for Signing up!</p>";
				$message .="<p><a href='".base_url()."registration/register_user/$key'>Click here</a> to confirm your account.</p>";

				$this->email->message($message);
				$this->email->send();
				
				$first_name=$this->input->post('first_name');
				$last_name=$this->input->post ('last_name');
				$mobile= $this->input->post('mobile');
				$email= $this->input->post('email');
				$city= $this->input->post('city');
				$gender= $this->input->post('gender');
				$password=md5($this->input->post('password'));
				 
				date_default_timezone_set('Asia/Kolkata');
				$created_dt=date('Y-m-d H:i:s'); 
					$data = array(
									'firstname' =>$first_name ,
									'lastname'=>$last_name,
									'mobile'=>$mobile,
									'email'=>$email,
									'city'=>$city,
									'gender'=>$gender,
									'password'=>$password,
									'status'=>'0',
									'recever_from'=>'web',
									'created_dt'=>$created_dt,
									'key'=>$key
								);
					$this->load->model('register_model');
					$this->register_model->new_user($data);
					$this->session->set_flashdata('sucess','conformation link have been send to your mail!');
					redirect ('registration');	
			}
			else
			{
				$this->session->set_flashdata('validation_errors',validation_errors());
				redirect ('registration');
			}
		}
		else
		{
			redirect ('registration');
		}
			
	}
	public function register_user($key){
		if(!empty($key)){
			$this->load->model('register_model');
			if ($this->register_model->is_key_valid($key))
			{
				$data= new stdClass();
				$data->page_title = "Registration";
	        	$data->page_text = "New User Registration!";
	        	$data->page = "signup";
	        	$this->template->write_view('content','registration/sucess_reg',$data);
	        	$this->template->render();	
			}
		}
		else
		{
			redirect ('registration');
		}
	}
	function register_email_exists()
	{
		$this->load->model('register_model');

		if (array_key_exists('email',$_POST)) 
		{
			if ( $this->register_model->email_exists($this->input->post('email')) == TRUE ) 
			{
				$isAvailable=false;
			} 
			else 
			{
				$isAvailable= true;
			}
			 echo json_encode(array('valid' => $isAvailable, ));
		}
	}
	
	

}
