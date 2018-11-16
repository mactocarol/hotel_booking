<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Register extends HT_Controller 
{
	//private $connection;
	function __construct(){
	parent::__construct();
	$this->load->model('register_model');		
	}
        public function index(){
            $data=new stdClass();
            $data->page_title = "Registration";
            $data->page_text = "Lorem epsum registration uoioppi gg";
            $data->page = "register";
            $this->template->write_view('content','register/register_view',$data);
            $this->template->render();		
        }
        
    public function register_email_exists()
        {
            $this->load->model('register_model');
            if (array_key_exists('email',$_POST)) 
            {
                if ( $this->register_model->email_exists($this->input->post('email')) == TRUE ) 
                {
                    echo FALSE;
                } 
                else 
                {
                    echo TRUE;
                }
            }
        }
}
?>