<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class About_us extends HT_Controller 
{
	//private $connection;
	function __construct(){
        parent::__construct();
        $this->load->model('about_us_model');		
	}
    
    public function index(){
        $data=new stdClass();
        $data->page_title = "About us";
        $data->page_text = "Lorem epsum About us uoioppi gg";
        $data->page = "about_us";
        $this->template->write_view('content','about_us/about_us_view',$data);
        $this->template->render();
    }
        
        
}
?>