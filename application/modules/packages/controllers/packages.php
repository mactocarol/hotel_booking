<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Packages extends HT_Controller 
{
	//private $connection;
	function __construct(){
        parent::__construct();
        $this->load->model('packages_model');		
	}
    
    public function index(){
        $data=new stdClass();

            //print_r($data->hotel_list); die;
            $data->page_title = "Packages";
            $data->page_text = "Lorem epsum About us uoioppi gg";
            $data->page = "packages";
            $this->template->write_view('content','packages/packages_view',$data);
            $this->template->render();
        
                                                        
    }
        
        
}
?>