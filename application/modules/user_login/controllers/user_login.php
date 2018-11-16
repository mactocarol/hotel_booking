<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_login extends HT_Controller {

	function __construct() {
		parent::__construct();
		//echo "hhhh"; die;	
		$this->load->library('facebook');
        $this->load->library('form_validation');
		$this->load->model('login_model');

		}
	public function index()
	{
        
		$data=new stdClass();
		$data->page='login';
		$data->page_title='login';
		$this->load->view('login_view', $data);
	}
	public function set_validation()
	{
		$this->form_validation->set_rules('email','Email','required|trim');
		$this->form_validation->set_rules('password','Password','required');
			
		if ($this->form_validation->run())
		{

			$email=$this->input->post('email');
			$password=$this->input->post('password'); 
			$user_from="web";
			if ($this->login_model->can_log_in($email,$password, $user_from))
			{
				$udata=$this->login_model->selectingdata($this->input->post('email'),$from='web');
				$udata['is_logged_in']= 1;
				$this->session->set_userdata($udata);
				redirect ('home');
			}
			else
			{
				$this->session->set_flashdata('validate_credentials','Incorrect username/password.');
				redirect ('user_login');
			}
			
		}
		else
		{
			$data=new stdClass();
			$data->page='login';
			$data->page_title='login';
			$this->load->view('login_view', $data);
		}
	}
	/*public function validate_credentials(){
		$email=$this->input->post('email');
		$password=$this->input->post('password');
		$user_from="web"; 
		if ($this->login_model->can_log_in($email,$password, $user_from)){
			return true;
		}
		else
		{
			$this->form_validation->set_message('validate_credentials','Incorrect username/password.');
			return false;
		}
	}*/
	public function fbuser_login(){
		$userData = array();

		// Check if user is logged in
		if($this->facebook->is_authenticated())
		{
			$user = $this->facebook->request('get', '/me?fields=id, first_name,last_name,email, locale, gender, picture');
			//print_r($user['picture']['data']['url']); die;
			if (!isset($user['error']))
			{
				$data= array(
					'firstname'=>$user['first_name'],
					'lastname'=>$user['first_name'],
					'email'=>$user['email'],
					'gender'=>$user['gender'],
					'password'=>'',
					'profile_pic'=>$user['picture']['data']['url'],
					'status'=>1,
					'recever_from'=>'facebook'
				);
				if ($this->login_model->can_log_in($data['email'],$data['password'], $data['recever_from']))
				{
					$udata=$this->login_model->selectingdata($data['email'],$from='facebook');
					$udata['is_logged_in']= 1;
				}
				else
				{
					$data['password']=md5('');
					$this->login_model->add_user($data);
					$udata=$this->login_model->selectingdata($data['email'],$from='facebook');
					$udata['is_logged_in']= 1;
				}

			}
			else
			{
				echo "Facebook Error";
			}	
		}
		// display view
		$this->session->set_userdata($udata);
         if($this->session->userdata('hotel_id')){
            redirect('pre_booking');
        }
		redirect('home');

	}
	public function google_login(){
		if (isset($_GET['code'])){
			$this->googleplus->getAuthenticate();
			$user=$this->googleplus->getUserInfo();
			//print_r($user); die;
			if (!isset($user['error']))
			{
				if (isset ($user['gender']) && $user['gender'] !='')
					{
						$gender=$user['gender'];
					}
					else
					{
						$gender='';
					}
				$data= array(
					'firstname'=>$user['given_name'],
					'lastname'=>$user['family_name'],
					'email'=>$user['email'],
					'gender'=>$gender,
					'password'=>'',
					'profile_pic'=>$user['picture'],
					'status'=>1,
					'recever_from'=>'googleplus'
					);
					if ($this->login_model->can_log_in($data['email'],$data['password'], $data['recever_from']))
					{
					$udata=$this->login_model->selectingdata($data['email'],$from='googleplus');
					$udata['is_logged_in']= 1;
					}
					else
					{
					$data['password']=md5('');
					$this->login_model->add_user($data);
					$udata=$this->login_model->selectingdata($data['email'],$from='googleplus');
					$udata['is_logged_in']= 1;
					}
				
			}
			else
			{
				echo "Google Plus Error";
			}	
		}

		$data['loginURL']=$this->googleplus->loginURL();
		// display view
		$this->session->set_userdata($udata);
        
        if($this->session->userdata('hotel_id')){
            redirect('pre_booking');
        }
		redirect('home');
	}
	public function logout(){
		//remove session
		$this->facebook->destroy_session();
		$this->session->sess_destroy();
		//redirecting page
		redirect ('home');
	}
	

}
		
