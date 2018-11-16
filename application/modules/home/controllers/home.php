<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Home extends HT_Controller 
{
	//private $connection;
	function __construct(){
	parent::__construct();
	$this->load->model('home_model');		
	}
        public function index(){            
            $data=new stdClass();
            if($this->session->userdata('search')){
                $data->prebboking = 1;
            }
            $data->page = 'home';
            $data->page_title = 'Hotel';
            $data->countries = $this->home_model->SelectRecord('countries',array('*'),array(),$orderby = NULL);                
            $this->load->view('home_view',$data);			
        }
        
        
        
        
	public function search_destination(){
        $data = [];
        $searchTerm = $_GET['term'];
        $res = $this->home_model->get_search_destination($searchTerm);
        //get matched data from skills table
        foreach($res as $row) {
            $data[] = array("key"=>$row->name.';'.$row->country_code,"value"=>$row->name.', '.$row->cname);
        }        
        //return json data
        echo json_encode($data);
    }
}
?>