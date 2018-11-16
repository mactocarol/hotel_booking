<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Forgot extends HT_Controller {

	function __construct() {
		parent::__construct();

			$this->load->library('form_validation');
			$this->load->model('forgot_model');
		}
	public function index()
	{
		$data= new stdClass();
		$data->page_title = "Forgot";
        $data->page_text = "Lorem epsum About us uoioppi gg";
        $data->page = "forgot_password";
        $this->template->write_view('content','forgot/forgot_password',$data);
        $this->template->render();
	}
	public function reset_link(){
		$this->form_validation->set_rules('email','Email','required|trim|callback_validate_credentials');
		if($this->form_validation->run())
		{
			$key=md5 (uniqid());
			//sending conformation mail to signup user
			$this->load->library('email');
			$this->email->set_mailtype("html");
			$this->email->from ('infoash.atc@gmail.com','Admin');
			$this->email->to ($this->input->post('email'));
			$this->email->subject('Reset Password...!');

			$message="<p>Reset Password!</p>";
			$message .="<p><a href='".base_url()."forgot/reset_user/$key'>Click here</a> to reset your account.</p>";

			$this->email->message($message);
			$this->email->send();
			$this->session->set_userdata($key);
			if ($this->forgot_model->add_key($key)){
				$this->session->set_flashdata('sucess','Reset Password link have been send to your mail!');
			}
			redirect ('forgot');	
		}
		else
		{
			$this->session->set_flashdata('validation_errors',validation_errors());
			redirect ('forgot');
		}
	}
	public function validate_credentials(){
		
		$email=$this->input->post('email');
		if ($this->forgot_model->check_email($email)){
			return true;
		}
		else
		{
			$this->form_validation->set_message('validate_credentials','Email does not exist in database .');
			return false;
		}
	}
	public function reset_user($key){

		if ($this->forgot_model->is_key_valid($key))
		{
			$data= new stdClass();
			$data->page_title = "Reset Password";
        	$data->page_text = "Lorem epsum About us uoioppi gg";
        	$data->page = "reset_password";
        	$data->key = $key;
        	$this->template->write_view('content','forgot/reset_password',$data);
        	$this->template->render();
		}
		else
		{
			redirect ('forgot');
		}

	}
	public function reset_password(){
		$this->form_validation->set_rules('password','Password','trim|required|min_length[6]');
		$this->form_validation->set_rules('cpassword','Conform Password', 'trim|required|min_length[6]|matches[password]');
		if ($this->form_validation->run()){
			if ($this->forgot_model->reset_password()){
				$data= new stdClass();
				$data->page_title = "Reset Password";
        		$data->page_text = "Password Change Sucessfully!";
        		$data->page = "reset_password";
        		$this->template->write_view('content','forgot/sucess_pass',$data);
        		$this->template->render();
			}

		}
		else
		{
			$this->session->set_flashdata('reset_password',validation_errors());
			redirect ('forgot/reset_user/'.$_POST['key']);
		}
		
	}
	
	

}
		
