<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Hotel extends HT_Controller 
{
	//private $connection;
        public function __construct(){
            echo "xxx"; die;
            parent::__construct();
            $this->load->model('admin_model');            
        }
        public function index(){
            if($this->session->userdata('logged_in')){
                redirect('admin/dashboard');
            }
            
            $data=new stdClass();
            if($this->session->flashdata('item')) {
                $items = $this->session->flashdata('item');
                if($items->success){
                    $data->error=0;
                    $data->success=1;
                    $data->message=$items->message;
                }else{
                    $data->error=1;
                    $data->success=0;
                    $data->message=$items->message;
                }
                
            }
            
            $this->load->view('login_view',$data);			
        }
        
        public function login_check()
        {
            $data=new stdClass();
            $this->form_validation->set_rules('email', 'Email', 'trim|required');
            $this->form_validation->set_rules('password', 'Password', 'trim|required');       
            if ($this->form_validation->run() == FALSE)
            {
                $data->error=1;
                $data->success=0;
                $data->message=validation_errors();
            }
            else
            {
                $email = $this->security->xss_clean($this->input->post('email'));
                $password = $this->security->xss_clean($this->input->post('password'));
                $udata = array("email"=>$email,"password"=>$password);
                $result = $this->admin_model->countrecords('users',$udata);                
                //echo "<pre>";
                //print_r($result); die;
                if($result)
                {
                        $sess_array = array(
                        'user_id' => $result->id,
                        'email' => $result->email,					
                        'user_group_id' => $result->user_type,					
                        'logged_in' => TRUE
                        );
                        $this->session->set_userdata($sess_array);
                        $data->error=0;
                        $data->success=1;
                        $data->message='Login Successful';
                        
                        redirect('admin/dashboard');	
                    
                }
                else
                {
                    $data->error=1;
                    $data->success=0;
                    $data->message='Invalid Username or Password.';
                    
                }
            }
            $this->session->set_flashdata('item',$data);            
            redirect('admin');
        }
        
        public function dashboard()
        {
            if(!$this->session->userdata('logged_in')){
                redirect('admin');
            }
            $data=new stdClass();
            if($this->session->flashdata('item')) {
                
                $items = $this->session->flashdata('item');
                if($items->success){
                    $data->error=0;
                    $data->success=1;
                    $data->msg=$items->message;
                }else{
                    $data->error=1;
                    $data->success=0;
                    $data->message=$items->message;
                }
                
            }
            $data->title = 'Dashboard';
            $data->field = 'Dashboard';
            $this->load->view('admin/includes/header',$data);		
            $this->load->view('dashboard_view',$data);
            $this->load->view('admin/includes/footer',$data);
        }
        
        public function logout()
        {
            $data=new stdClass();
            if($this->session->userdata('logged_in')){
                $this->session->sess_destroy();    
            }
            
            $data->error=0;
            $data->success=1;
            $data->message='Logged Out Successfully';
            $this->session->set_flashdata('item',$data);            
            redirect('admin');
        }
		public function updatePassword(){
		  $forgot_code = $this->uri->segment(3);
		  $user_id = $this->uri->segment(4);
		  if(!empty($user_id) && !empty($forgot_code)){
		  		$this->form_validation->set_rules('password', 'Password', 'required|trim|xss_clean');
				$this->form_validation->set_rules('cpassword', 'Confirm Password', 'required|trim|xss_clean|matches[password]');
				if($this->form_validation->run() == true){
		  		$where = array('admin_id' =>$user_id,'forgot_code'=>$forgot_code);
		  		$orderby ='';
		  		$userarr = $this->admin_model->SelectSingleRecord('sp_admin','username,email,forgot_status',$where,$orderby);
		  		if(!empty($userarr)){
		  			if($userarr->forgot_status == 0){
			  			$UserData = array('forgot_status' => 1,'password'=>md5($this->input->post('password')));
			  			$Result = $this->admin_model->UpdateRecord('sp_admin',$UserData,array('admin_id'=>$user_id));
			  			if(!empty($Result)){
			  				$this->SetSession(array('Success'=>"Password changed successfully,Your can login with new deatil"),"flash");
			  				redirect('admin/forgot_confirm');
			  			}else{
			  				$this->SetSession(array('Error'=>"Data not updated. Please try again!!"),"flash");
			  				redirect('admin/forgot_confirm');
			  			}
		  			}else{
		  				$this->SetSession(array('Error'=>"Not applied for password change"),"flash");
			  				redirect('admin/forgot_confirm');
		  			}	 
				}else{
					$this->SetSession(array('Error'=>"No match data found"),"flash");
			  		redirect('admin/forgot_confirm');
				}
		  	}
		}else{
		  		$this->SetSession(array('Error'=>"Direct access of this page is not allowed"),"flash");
			  	redirect('admin/forgot_confirm');
		  	}	
		  $data['Error'] = $this->GetSession('Error',"flash");
		  $data['Success'] = $this->GetSession('Success',"flash");
		  $this->load->view('admin/updatePassword',$data);			
	}
	public function forgot_confirm(){
		  $data['Error'] = $this->GetSession('Error',"flash");
		  $data['Success'] = $this->GetSession('Success',"flash");
	      $data['title'] = "Admin | Login";
		  $this->load->view('admin/forgot_confirm',$data);			
			  
	}
	public function forgotPassword(){
		if(!empty($this->userID)){
			redirect('dashboard');
		}
		$data['title'] = 'Forgot password';
	    $data['Error'] = $this->GetSession('Error',"flash");
	    $data['Success'] = $this->GetSession('Success',"flash");
		$this->load->view('admin/forgot',$data);			
	}
	
	function CheckEmail(){
		
		$this->form_validation->set_rules('email', 'Email ID', 'required|valid_email');
		if ($this->form_validation->run() == TRUE){
			$WhereData = array('email'=>$this->input->post('email'));
			$Results = $this->admin_model->SelectSingleRecord('sp_admin',"admin_id,firstname,email",$WhereData,'admin_id ASC');
			
			if(count($Results)>0){
				
				$UpdateData['forgot_code'] = md5(date('Y-m-d H:i:s'));
				$UpdateData['forgot_status'] = 0;
				$this->admin_model->UpdateRecord('sp_admin',$UpdateData,$WhereData);
				$this->ForgotMailBody($Results->firstname,$this->input->post('email'),$UpdateData['forgot_code'],$Results->admin_id);
				$this->SetSession(array('Success'=>"Please check your mail to change your password"),"flash");
				// send mail to user with user name and Password.
				echo 1;
			}else{	
				echo 0;
			}
		}else{
			echo 3;
		}
	}
	function ForgotMailBody($firstname,$Email,$forgot_code,$user_id){
		$data['firstname'] = $firstname;
		$data['forgot_code'] = $forgot_code;
		$data['admin_id'] = $user_id;
		$data['email'] = $Email;
		$Msg = $this->load->view('forgot_email_view',$data, TRUE); 
		$MailArray = array('FromEmail'=>'shailendra.rathore@yashco.com<Yashco systems>','FromName'=>'Docket mate','To'=>$Email,'Subject'=>'Forgot Password Mail','Message'=>$Msg);
		$this->MailFunction($MailArray,'');
	}
	
}
?>