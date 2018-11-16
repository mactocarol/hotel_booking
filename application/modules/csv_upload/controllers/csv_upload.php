<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Csv_upload extends HT_Controller 
{
	//private $connection;
        public function __construct(){            
            parent::__construct();
            $this->load->model('csv_upload_model');          
            if($this->session->userdata('logged_in') == ''){
                redirect('admin/index');
            }
        }
        public function index(){                    
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
            
            $data->hotel_list = $this->hotel_model->SelectRecord('hotels',array('id','name','description','logo','city'),array(),$orderby = NULL);
            
            $data->title = 'Hotel List';
            $data->field = 'Datatable';
            $data->page = 'list_hotel';
            $this->load->view('admin/includes/header',$data);		
            $this->load->view('list_hotel_view',$data);
            $this->load->view('admin/includes/footer',$data);
        }
        
        public function add_countries(){                    
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
            
            if($_POST){
                
                $csvMimes = array('application/vnd.ms-excel','text/plain','text/csv','text/tsv');
                if(!empty($_FILES['file']['name']) && in_array($_FILES['file']['type'],$csvMimes)){
                    if(is_uploaded_file($_FILES['file']['tmp_name'])){
                        
                        //open uploaded csv file with read only mode
                        $csvFile = fopen($_FILES['file']['tmp_name'], 'r');
                        
                        // skip first line
                        // if your csv file have no heading, just comment the next line
                        fgetcsv($csvFile);
                        //print_r(fgetcsv($csvFile)); die;
                        //parse data from csv file line by line
                        while(($line = fgetcsv($csvFile,'','|')) !== FALSE){
                            //$line = explode('|',$line[0]);
                            //check whether member already exists in database with same email
                            $result = $this->db->get_where("countries", array("code"=>$line[2]))->result();
                            //print_r($result); die;
                            if(count($result) > 0){
                                //update member data
                                $this->db->update("countries",  array("name"=>$line[1]), array("code"=>$line[2]));
                            }else{
                                //insert member data into database
                                $this->db->insert("countries", array("name"=>$line[1], "code"=>$line[2]));
                            }
                        }
                        
                        //close opened csv file
                        fclose($csvFile);
                        $data->error=0;
                        $data->success=1;
                        $data->message= "Data fetched successfully";                        
                    }else{
                        $data->error=1;
                        $data->success=0;
                        $data->message= "Data fetched failed";                        
                    }
                }else{
                    $data->error=1;
                    $data->success=0;
                    $data->message= "Invalid File";            
                }
                
               
            }
            
            $data->title = 'Add Countries';
            $data->field = 'Countries';
            $data->page = 'add_countries';
            $this->load->view('admin/includes/header',$data);		
            $this->load->view('add_countries_view',$data);
            $this->load->view('admin/includes/footer',$data);
        }
        
        public function add_cities(){                    
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
            
            if($_POST){
                
                $csvMimes = array('application/vnd.ms-excel','text/plain','text/csv','text/tsv');
                if(!empty($_FILES['file']['name']) && in_array($_FILES['file']['type'],$csvMimes)){
                    if(is_uploaded_file($_FILES['file']['tmp_name'])){
                        
                        //open uploaded csv file with read only mode
                        $csvFile = fopen($_FILES['file']['tmp_name'], 'r');
                        
                        // skip first line
                        // if your csv file have no heading, just comment the next line
                        fgetcsv($csvFile);
                        //print_r(fgetcsv($csvFile)); die;
                        //parse data from csv file line by line
                        while(($line = fgetcsv($csvFile,'','|')) !== FALSE){
                            //$line = explode('|',$line[0]);
                            //check whether member already exists in database with same email
                            $result = $this->db->get_where("cities", array("city_code"=>$line[2]))->result();
                            //print_r($result); die;
                            if(count($result) > 0){
                                //update member data
                                $this->db->update("cities",  array("name"=>$line[1],"country_code"=>$line[3]), array("city_code"=>$line[2]));
                            }else{
                                //insert member data into database
                                $this->db->insert("cities", array("name"=>$line[1], "city_code"=>$line[2], "country_code"=>$line[3]));
                            }
                        }
                        
                        //close opened csv file
                        fclose($csvFile);
                        $data->error=0;
                        $data->success=1;
                        $data->message= "Data fetched successfully";                        
                    }else{
                        $data->error=1;
                        $data->success=0;
                        $data->message= "Data fetched failed";                        
                    }
                }else{
                    $data->error=1;
                    $data->success=0;
                    $data->message= "Invalid File";            
                }
                
               
            }
            
            $data->title = 'Add Cities';
            $data->field = 'Cities';
            $data->page = 'add_cities';
            $this->load->view('admin/includes/header',$data);		
            $this->load->view('add_cities_view',$data);
            $this->load->view('admin/includes/footer',$data);
        }
        
        public function add_hotels(){                    
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
            
            if($_POST){
                
                $csvMimes = array('application/vnd.ms-excel','text/plain','text/csv','text/tsv');
                if(!empty($_FILES['file']['name']) && in_array($_FILES['file']['type'],$csvMimes)){
                    if(is_uploaded_file($_FILES['file']['tmp_name'])){
                        
                        //open uploaded csv file with read only mode
                        $csvFile = fopen($_FILES['file']['tmp_name'], 'r');
                        
                        // skip first line
                        // if your csv file have no heading, just comment the next line
                        fgetcsv($csvFile);
                        //print_r(fgetcsv($csvFile)); die;
                        //parse data from csv file line by line
                        $i = 1;
                        while(($line = fgetcsv($csvFile,'','|')) !== FALSE){
                            //$line = explode('|',$line[0]);
                            //echo "<pre>"; print_r($line);die;
                            //check whether member already exists in database with same email
                            $result = $this->db->get_where("hotels", array("hotel_id"=>$line[0]))->result();
                            //print_r($result); die;
                            if($i <= 10){
                                if(count($result) > 0){
                                    //update member data
                                    //$this->db->update("hotels",  array("name"=>$line[1], "city"=>$line[2], "country"=>$line[3],
                                    //                                  "rating"=>$line[4], "address"=>$line[5], "postal_code"=>$line[6], "latitude"=>$line[7],
                                    //                                  "longitude"=>$line[8], "description"=>$line[9]), array("hotel_id"=>$line[0]));
                                    $this->db->update("hotels",  array("name"=>$line[1], "city"=>$line[2], "country"=>$line[5],
                                                                      "rating"=>$line[6], "address"=>$line[7], "postal_code"=>$line[8], "latitude"=>$line[9],
                                                                      "longitude"=>$line[10], "description"=>$line[11]), array("hotel_id"=>$line[0]));
                                }else{
                                    //insert member data into database
                                    //$this->db->insert("hotels", array("hotel_id"=>$line[0],"name"=>$line[1], "city"=>$line[2], "country"=>$line[3],
                                    //                                  "rating"=>$line[4], "address"=>$line[5], "postal_code"=>$line[6], "latitude"=>$line[7],
                                    //                                  "longitude"=>$line[8], "description"=>$line[9]));
                                    $this->db->insert("hotels", array("hotel_id"=>$line[0],"name"=>$line[1], "city"=>$line[2], "country"=>$line[5],
                                                                      "rating"=>$line[6], "address"=>$line[7], "postal_code"=>$line[8], "latitude"=>$line[9],
                                                                      "longitude"=>$line[10], "description"=>$line[11]));
                                }
                            }
                            //$i++;
                        }
                        
                        //close opened csv file
                        fclose($csvFile);
                        $data->error=0;
                        $data->success=1;
                        $data->message= "Data fetched successfully";                        
                    }else{
                        $data->error=1;
                        $data->success=0;
                        $data->message= "Data fetched failed";                        
                    }
                }else{
                    $data->error=1;
                    $data->success=0;
                    $data->message= "Invalid File";            
                }
                
               
            }
            
            $data->title = 'Add Hotels';
            $data->field = 'Hotels';
            $data->page = 'add_hotels';
            $this->load->view('admin/includes/header',$data);		
            $this->load->view('add_hotels_view',$data);
            $this->load->view('admin/includes/footer',$data);
        }
        
        public function add_hotels_images(){                    
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
            
            if($_POST){
                
                $csvMimes = array('application/vnd.ms-excel','text/plain','text/csv','text/tsv');
                if(!empty($_FILES['file']['name']) && in_array($_FILES['file']['type'],$csvMimes)){
                    if(is_uploaded_file($_FILES['file']['tmp_name'])){
                        
                        //open uploaded csv file with read only mode
                        $csvFile = fopen($_FILES['file']['tmp_name'], 'r');
                        
                        // skip first line
                        // if your csv file have no heading, just comment the next line
                        fgetcsv($csvFile);
                        //print_r(fgetcsv($csvFile)); die;
                        //parse data from csv file line by line
                        while(($line = fgetcsv($csvFile,'','|')) !== FALSE){
                            //$line = explode('|',$line[0]);
                            //check whether member already exists in database with same email
                            $result = $this->db->get_where("hotel_images", array("hotel_id"=>$line[0]))->result();
                            //print_r($result); die;
                            if(count($result) > 0){
                                //update member data
                                $this->db->update("hotel_images",  array("image"=>$line[1]), array("hotel_id"=>$line[0]));
                            }else{
                                //insert member data into database
                                $this->db->insert("hotel_images", array("hotel_id"=>$line[0],"image"=>$line[1]));
                            }
                        }
                        
                        //close opened csv file
                        fclose($csvFile);
                        $data->error=0;
                        $data->success=1;
                        $data->message= "Data fetched successfully";                        
                    }else{
                        $data->error=1;
                        $data->success=0;
                        $data->message= "Data fetched failed";                        
                    }
                }else{
                    $data->error=1;
                    $data->success=0;
                    $data->message= "Invalid File";            
                }
                
               
            }
            
            $data->title = "Add Hotel's images";
            $data->field = 'Hotels images';
            $data->page = 'add_hotels_images';
            $this->load->view('admin/includes/header',$data);		
            $this->load->view('add_hotels_images_view',$data);
            $this->load->view('admin/includes/footer',$data);
        }
        
        public function add_property(){                    
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
            
            if($_POST){
                
                $csvMimes = array('application/vnd.ms-excel','text/plain','text/csv','text/tsv');
                if(!empty($_FILES['file']['name']) && in_array($_FILES['file']['type'],$csvMimes)){
                    if(is_uploaded_file($_FILES['file']['tmp_name'])){
                        
                        //open uploaded csv file with read only mode
                        $csvFile = fopen($_FILES['file']['tmp_name'], 'r');
                        
                        // skip first line
                        // if your csv file have no heading, just comment the next line
                        fgetcsv($csvFile);
                        //print_r(fgetcsv($csvFile)); die;
                        //parse data from csv file line by line
                        while(($line = fgetcsv($csvFile,'','|')) !== FALSE){
                            //$line = explode('|',$line[0]);
                            //check whether member already exists in database with same email
                            $result = $this->db->get_where("property_amenity", array("hotel_id"=>$line[0]))->result();
                            //print_r($result); die;
                            if(count($result) > 0){
                                //update member data
                                $this->db->update("property_amenity",  array("name"=>$line[1]), array("hotel_id"=>$line[0]));
                            }else{
                                //insert member data into database
                                $this->db->insert("property_amenity", array("hotel_id"=>$line[0],"name"=>$line[1]));
                            }
                        }
                        
                        //close opened csv file
                        fclose($csvFile);
                        $data->error=0;
                        $data->success=1;
                        $data->message= "Data fetched successfully";                        
                    }else{
                        $data->error=1;
                        $data->success=0;
                        $data->message= "Data fetched failed";                        
                    }
                }else{
                    $data->error=1;
                    $data->success=0;
                    $data->message= "Invalid File";            
                }
                
               
            }
            
            $data->title = 'Add Property Amenities';
            $data->field = 'Property Amenities';
            $data->page = 'add_property';
            $this->load->view('admin/includes/header',$data);		
            $this->load->view('add_property_view',$data);
            $this->load->view('admin/includes/footer',$data);
        }
        
        public function add_room_amenity(){                    
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
            
            if($_POST){
                
                $csvMimes = array('application/vnd.ms-excel','text/plain','text/csv','text/tsv');
                if(!empty($_FILES['file']['name']) && in_array($_FILES['file']['type'],$csvMimes)){
                    if(is_uploaded_file($_FILES['file']['tmp_name'])){
                        
                        //open uploaded csv file with read only mode
                        $csvFile = fopen($_FILES['file']['tmp_name'], 'r');
                        
                        // skip first line
                        // if your csv file have no heading, just comment the next line
                        fgetcsv($csvFile);
                        //print_r(fgetcsv($csvFile)); die;
                        //parse data from csv file line by line
                        while(($line = fgetcsv($csvFile,'','|')) !== FALSE){
                            //$line = explode('|',$line[0]);
                            //check whether member already exists in database with same email
                            $result = $this->db->get_where("room_amenities", array("hotel_id"=>$line[0]))->result();
                            //print_r($result); die;
                            if(count($result) > 0){
                                //update member data
                                $this->db->update("room_amenities",  array("name"=>$line[1]), array("hotel_id"=>$line[0]));
                            }else{
                                //insert member data into database
                                $this->db->insert("room_amenities", array("hotel_id"=>$line[0],"name"=>$line[1]));
                            }
                        }
                        
                        //close opened csv file
                        fclose($csvFile);
                        $data->error=0;
                        $data->success=1;
                        $data->message= "Data fetched successfully";                        
                    }else{
                        $data->error=1;
                        $data->success=0;
                        $data->message= "Data fetched failed";                        
                    }
                }else{
                    $data->error=1;
                    $data->success=0;
                    $data->message= "Invalid File";            
                }
                
               
            }
            
            $data->title = 'Add Room Amenities';
            $data->field = 'Room Amenities';
            $data->page = 'add_room_amenity';
            $this->load->view('admin/includes/header',$data);		
            $this->load->view('add_room_amenity_view',$data);
            $this->load->view('admin/includes/footer',$data);
        }
                	
}
?>