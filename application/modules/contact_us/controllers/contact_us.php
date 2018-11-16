<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Contact_us extends HT_Controller 
{
	//private $connection;
	function __construct(){
        parent::__construct();
        $this->load->model('contact_us_model');		
	}
    
    public function index(){
        $data=new stdClass();
        $data->page_title = "Contact us";
        $data->page_text = "Lorem epsum Contact us uoioppi gg";
        $data->page = "contact_us";
        $this->template->write_view('content','contact_us/contact_us_view',$data);
        $this->template->render();
    }
        
        
}
?>