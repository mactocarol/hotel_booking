<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Hotel extends HT_Controller 
{
	//private $connection;
        public function __construct(){            
            parent::__construct();
            $this->load->model('hotel_model');          
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
            
            //$data->hotel_list = $this->hotel_model->SelectRecord('hotels',array('id','name','description','logo','city'),array(),$orderby = NULL);
            
            redirect ('hotel/list_hotel');
        }
        public function list_hotel(){
            $data=new stdClass();
            //pagination
            $pdata= array (
            'url'       =>  base_url()."hotel/list_hotel",
            'total_row' =>  $this->hotel_model->getRows(),
            'per_page'  =>  25,
            'segment'   =>  3
            );

            $pagination= $this->custompagination($pdata);
           
            $TableName      =   'hb_hotels';
            $Selectdata     =   'id,name,description,logo,city,rating,country';
            $WhereData      =   array();
            $orderby        =   'id ASC';
            $limit          =   $pdata['per_page'];
            $start          =   $pagination;
            $data->results= $this->hotel_model->SelectRecordpaginatoin ($TableName,$Selectdata,$WhereData,$orderby,$limit,$start);
            $str_links = $this->pagination->create_links();
            $data->pagination = explode('&nbsp;',$str_links );

            $data->title = 'Hotel List';
            $data->field = 'Datatable';
            $data->page = 'list_hotel';
            $this->load->view('admin/includes/header',$data);       
            $this->load->view('list_hotel_view',$data);
            $this->load->view('admin/includes/footer',$data);
        }
        
        
        public function add(){                    
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
                $arr = array(0=>array('hotel_id'=>101,'name'=>'Radisson','description'=>'Its 7+ star hotel','logo'=>'radison.png','address'=>'Indore','city'=>'Indore','country'=>'India',
                                                 'image'=>['h1.png'],
                                                 'rooms'=>[0=>array('room_no'=>'301','description'=>'semi-deluxe ac room','room_type'=>'single','floor'=>3,'person'=>2,'checkin'=>'9:00','checkout'=>'10:00','price'=>'2909',
                                                                    'amenities'=>['ac','tv'],'images'=>['1.png','2.jpg','3.png']),
                                                           1=>array('room_no'=>'302','description'=>'double ac room','room_type'=>'double','floor'=>3,'person'=>3,'checkin'=>'9:00','checkout'=>'10:00','price'=>'4299',
                                                                    'amenities'=>['ac','tv'],'images'=>['1.png','2.jpg','3.png'])]),
                                        1=>array('hotel_id'=>102,'name'=>'Sayaji','description'=>'Its 5 star hotel','logo'=>'sayaji.png','address'=>'Indore','city'=>'Indore','country'=>'India',
                                                 'image'=>['h2.png'],
                                                 'rooms'=>[0=>array('room_no'=>'201','description'=>'double ac room','room_type'=>'double','floor'=>2,'person'=>3,'checkin'=>'9:00','checkout'=>'10:00','price'=>'3999',
                                                                    'amenities'=>['ac','tv','freeze'],'images'=>['11.png','21.png','31.png']),
                                                           1=>array('room_no'=>'301','description'=>'single non - ac room','room_type'=>'single','floor'=>3,'person'=>2,'checkin'=>'9:00','checkout'=>'10:00','price'=>'2199',
                                                                    'amenities'=>['ac','tv','freeze'],'images'=>['11.png','21.png','31.png'])]),
                                        2=>array('hotel_id'=>103,'name'=>'Star','description'=>'Its 3 star hotel','logo'=>'star.png','address'=>'Indore','city'=>'Indore','country'=>'India',
                                                 'image'=>['h3.png'],
                                                 'rooms'=>[0=>array('room_no'=>'306','description'=>'executive ac room','room_type'=>'executive','floor'=>3,'person'=>5,'checkin'=>'9:00','checkout'=>'10:00','price'=>'4999',
                                                                    'amenities'=>['ac','tv','freeze','maid-service'],'images'=>['13.png','23.png','33.png'])])                                        
                                        );
                //echo "<pre>";
                //print_r($arr);
          
                //***start*********** updating hotel status*******************************
                foreach($arr as $array){$hotell[] = $array['hotel_id'];}
                $hotelss = $this->hotel_model->SelectRecord('hotels',array('id','hotel_id'),$WhereData = array(),$orderby=NULL);                
                $i = 0;
                foreach($hotelss as $hotel){
                     
                    if(!in_array($hotel['hotel_id'],$hotell)){
                        $this->hotel_model->UpdateRecord('hotels',array('status'=>0),array("hotel_id"=>$hotel['hotel_id']));
                    }else{
                        $this->hotel_model->UpdateRecord('hotels',array('status'=>1),array("hotel_id"=>$hotel['hotel_id']));
                        
                        
                        $roomm = array();
                        foreach($arr[$i]['rooms'] as $array){$roomm[] = $array['room_no'];}                    
                        $roomsss = $this->hotel_model->SelectRecord('rooms',array('id','room_no'),array("hotel_id"=>$hotel['id']),$orderby=NULL);                        
                            foreach($roomsss as $room){
                                if(!in_array($room['room_no'],$roomm)){                                    
                                    $this->hotel_model->delete_record('rooms',array('id'=>$room['id']));
                                    $this->hotel_model->delete_record('hotel_images',array('hotel_id'=>$hotel['id'],'room_id'=>$room['id']));
                                    $this->hotel_model->delete_record('room_amenity',array('room_id'=>$room['id']));
                                }else{                                
                                   //$this->hotel_model->UpdateRecord('hotels',array('status'=>1),array("hotel_id"=>$hotel['hotel_id']));
                                }
                            }
                    $i++;
                    }                                        
                }
                //***end*********** updating hotel status*******************************
        
                foreach($arr as $row){
                    $hoteldata = array();                    
                    // check hotel exist or not
                    $udata = array("hotel_id"=>$row['hotel_id']);
                    $result = $this->hotel_model->countrecords('hotels',$udata);                    
                    if($result){
                        // update hotels data
                        $hoteldata['user_id'] = $this->session->userdata('user_id'); 
                        $hoteldata['name'] = $row['name'];                        
                        $hoteldata['description'] = $row['description'];
                        $hoteldata['logo'] = $row['logo'];
                        $hoteldata['address'] = $row['address'];
                        $hoteldata['city'] = $row['city'];
                        $hoteldata['country'] = $row['country'];    
                            $wheredata['hotel_id'] = $row['hotel_id'];                        
                        if($this->hotel_model->UpdateRecord('hotels',$hoteldata,$wheredata)){
                            $h_result = $this->hotel_model->SelectSingleRecord('hotels',array('id'),array('hotel_id'=>$row['hotel_id']),$orderby=array());
                            //******start***************** update hotel images **********************************************
                            $hotelimages = $this->hotel_model->SelectRecord('hotel_images',array('id','image'),array("hotel_id"=>$h_result->id,"room_id"=>0),$orderby);
                            
                                if(count($hotelimages) == count($row['image']))  // if no. of images coming are equal to db images
                                {                                                    
                                    for($i=0; $i< count($hotelimages); $i++){                                                        
                                        $this->hotel_model->UpdateRecord('hotel_images',array("image"=>$row['image'][$i]),$hotelimages[$i]);        
                                    }
                                }elseif(count($hotelimages) < count($row['image'])){ // if no. of images coming are greater than db images                                                        
                                    for($i=0; $i< count($hotelimages); $i++){                                                        
                                        $this->hotel_model->UpdateRecord('hotel_images',array("image"=>$row['image'][$i]),$hotelimages[$i]);        
                                    }                                                            
                                    for($j=$i+1; $j <= count($row['image']); $j++){                                                        
                                        $this->hotel_model->InsertRecord('hotel_images',array("hotel_id"=>$h_result->id,"room_id"=>0,"image"=>$row['image'][$j-1]));        
                                    }
                                }elseif(count($hotelimages) > count($row['image'])){ // if no. of images coming are less than db images                                                           
                                    for($i=0; $i< count($row['image']); $i++){                                                        
                                        $this->hotel_model->UpdateRecord('hotel_images',array("image"=>$row['image'][$i]),$hotelimages[$i]);        
                                    }                                                            
                                    for($j=$i+1; $j <= count($hotelimages); $j++){                                                        
                                        $this->hotel_model->delete_record('hotel_images',array("id"=>$hotelimages[$j-1]['id']));        
                                    }
                                }                                                                                                                                                            
                            //******end***************** update hotel images **********************************************
                                    
                                    foreach($row['rooms'] as $rowss){
                                        $roomdata = array();
                                        $roomimages = array();
                                        $roomamenity = array();
                                        $room_type_id = $this->hotel_model->SelectSingleRecord('room_type',array('id'),array('type'=>$rowss['room_type']),$orderby=array());                                        
                                        
                                        // check room exist or not
                                        $rdata = array("hotel_id"=>$h_result->id,"room_no"=>$rowss['room_no']);
                                        $r_result = $this->hotel_model->countrecords('rooms',$rdata);                                        
                                            if($r_result){  // if room exists then, update
                                                
                                                $room_id = $this->hotel_model->SelectSingleRecord('rooms',array('id'),$rdata,$orderby=array());
                                                //******start***************** update room data **********************************************
                                                $roomdata['description'] = $rowss['description'];
                                                $roomdata['floor'] = $rowss['floor'];
                                                $roomdata['roomtype_id'] = $room_type_id->id;
                                                $roomdata['floor'] = $rowss['floor'];
                                                $roomdata['price'] = $rowss['price'];
                                                $roomdata['check_in'] = $rowss['checkin'];
                                                $roomdata['check_out'] = $rowss['checkout'];
                                                                                            
                                                $this->hotel_model->UpdateRecord('rooms',$roomdata,$rdata);
                                                //******end***************** update room data **********************************************
                                                        //******start***************** update room amenities **********************************************
                                                        $roomamenity = $this->hotel_model->SelectRecord('room_amenity',array('id','name'),array("room_id"=>$room_id->id),$orderby);                                                                    
                                                        if(count($roomamenity) == count($rowss['amenities'])) // if no. of amenities coming are equal to db amenities
                                                        {                                                    
                                                            for($i=0; $i< count($roomamenity); $i++){                                                        
                                                                $this->hotel_model->UpdateRecord('room_amenity',array("name"=>$rowss['amenities'][$i]),$roomamenity[$i]);        
                                                            }
                                                        }elseif(count($roomamenity) < count($rowss['amenities'])){ // if no. of amenities coming are greater than db amenities                                                            
                                                            for($i=0; $i< count($roomamenity); $i++){                                                        
                                                                $this->hotel_model->UpdateRecord('room_amenity',array("name"=>$rowss['amenities'][$i]),$roomamenity[$i]);        
                                                            }                                                            
                                                            for($j=$i+1; $j <= count($rowss['images']); $j++){                                                        
                                                                $this->hotel_model->InsertRecord('room_amenity',array("room_id"=>$room_id->id,"name"=>$rowss['amenities'][$j-1]));        
                                                            }
                                                        }elseif(count($roomamenity) > count($rowss['amenities'])){  // if no. of amenities coming are less than db amenities                                                          
                                                            for($i=0; $i< count($rowss['amenities']); $i++){                                                        
                                                                $this->hotel_model->UpdateRecord('room_amenity',array("name"=>$rowss['amenities'][$i]),$roomamenity[$i]);        
                                                            }                                                            
                                                            for($j=$i+1; $j <= count($roomamenity); $j++){                                                        
                                                                $this->hotel_model->delete_record('room_amenity',array("id"=>$roomamenity[$j-1]['id']));        
                                                            }
                                                        }
                                                        //******end***************** update room amenities **********************************************
                                                        
                                                        //******start***************** update room images **********************************************
                                                        $roomimages = $this->hotel_model->SelectRecord('hotel_images',array('id','image'),array("hotel_id"=>$h_result->id,"room_id"=>$room_id->id),$orderby);                                                
                                                        if(count($roomimages) == count($rowss['images'])) // if no. of images coming are equal to db images
                                                        {                                                    
                                                            for($i=0; $i< count($roomimages); $i++){                                                        
                                                                $this->hotel_model->UpdateRecord('hotel_images',array("image"=>$rowss['images'][$i]),$roomimages[$i]);        
                                                            }
                                                        }elseif(count($roomimages) < count($rowss['images'])){ // if no. of images coming are greater than db images                                                                        
                                                            for($i=0; $i< count($roomimages); $i++){                                                        
                                                                $this->hotel_model->UpdateRecord('hotel_images',array("image"=>$rowss['images'][$i]),$roomimages[$i]);        
                                                            }                                                            
                                                            for($j=$i+1; $j <= count($rowss['images']); $j++){                                                        
                                                                $this->hotel_model->InsertRecord('hotel_images',array("hotel_id"=>$h_result->id,"room_id"=>$room_id->id,"image"=>$rowss['images'][$j-1]));        
                                                            }
                                                        }elseif(count($roomimages) > count($rowss['images'])){ // if no. of images coming are less than db images                                                            
                                                            for($i=0; $i< count($rowss['images']); $i++){                                                        
                                                                $this->hotel_model->UpdateRecord('hotel_images',array("image"=>$rowss['images'][$i]),$roomimages[$i]);        
                                                            }                                                            
                                                            for($j=$i+1; $j <= count($roomimages); $j++){                                                        
                                                                $this->hotel_model->delete_record('hotel_images',array("id"=>$roomimages[$j-1]['id']));        
                                                            }
                                                        }
                                                        //******end***************** update room images **********************************************
                                            }else{  // if room does not exist then insert
                                                //******start**************** insert new rooms **********************************************
                                                $roomdata['room_no'] = $rowss['room_no'];
                                                $roomdata['hotel_id'] = $h_result->id;
                                                $roomdata['description'] = $rowss['description'];
                                                $roomdata['roomtype_id'] = $room_type_id->id;
                                                $roomdata['floor'] = $rowss['floor'];
                                                $roomdata['price'] = $rowss['price'];
                                                $roomdata['check_in'] = $rowss['checkin'];
                                                $roomdata['check_out'] = $rowss['checkout']; 
                                                
                                                $roomid = $this->hotel_model->InsertRecord('rooms',$roomdata);
                                                        //******start**************** insert rooms amenities **********************************************
                                                        foreach($rowss['amenities'] as $rowsss){
                                                            $roomamenity['room_id'] = $roomid;
                                                            $roomamenity['name'] = $rowsss;
                                                                                                                
                                                            $this->hotel_model->InsertRecord('room_amenity',$roomamenity);   
                                                        }
                                                        //******end**************** insert rooms amenities **********************************************
                                                        //******start**************** insert rooms images  **********************************************
                                                        foreach($rowss['images'] as $rowssss){
                                                            $roomimages['room_id'] = $roomid;
                                                            $roomimages['hotel_id'] = $h_result->id;
                                                            $roomimages['image'] = $rowssss;
                                                                                                                
                                                            $this->hotel_model->InsertRecord('hotel_images',$roomimages);   
                                                        }
                                                        //******end**************** insert rooms images **********************************************
                                            }
                                            
                                    }  
                        }
                    }else{
                        //******start********************* insert new hotels ****************************
                        $hoteldata['user_id'] = $this->session->userdata('user_id'); 
                        $hoteldata['name'] = $row['name'];
                        $hoteldata['hotel_id'] = $row['hotel_id'];
                        $hoteldata['description'] = $row['description'];
                        $hoteldata['logo'] = $row['logo'];
                        $hoteldata['address'] = $row['address'];
                        $hoteldata['city'] = $row['city'];
                        $hoteldata['country'] = $row['country'];
                        
                                                
                        if($h_results = $this->hotel_model->InsertRecord('hotels',$hoteldata)){
                                // *****start************* insert hotel images *********************************
                                //print_r($h_result); die;
                                foreach($row['image'] as $rows){
                                    $hotelimage['hotel_id'] = $h_results;
                                    $hotelimage['image'] = $rows;                                    
                                    $this->hotel_model->InsertRecord('hotel_images',$hotelimage);   
                                }
                                // *****end************* insert hotel images *********************************
                                
                                    foreach($row['rooms'] as $rowss){
                                        $roomdata = array();
                                        $room_type_id = $this->hotel_model->SelectSingleRecord('room_type',array('id'),array('type'=>$rowss['room_type']),$orderby=array());
                                        
                                        // check room exist or not
                                        $rdatas = array("hotel_id"=>$h_results,"room_no"=>$rowss['room_no']);
                                        $r_results = $this->hotel_model->countrecords('rooms',$rdatas);
                                            if($r_results){
                                                
                                            }else{
                                                // *****start************* insert room data *********************************
                                                $roomdata['room_no'] = $rowss['room_no'];
                                                $roomdata['hotel_id'] = $h_results;
                                                $roomdata['description'] = $rowss['description'];
                                                $roomdata['roomtype_id'] = $room_type_id->id;
                                                $roomdata['floor'] = $rowss['floor'];
                                                $roomdata['price'] = $rowss['price'];
                                                $roomdata['check_in'] = $rowss['checkin'];
                                                $roomdata['check_out'] = $rowss['checkout']; 
                                                
                                                $roomid = $this->hotel_model->InsertRecord('rooms',$roomdata);
                                                // *****end************* insert room data *********************************
                                                        // *****start************* insert room amenities *********************************
                                                        foreach($rowss['amenities'] as $rowsss){
                                                            $roomamenitys['room_id'] = $roomid;
                                                            $roomamenitys['name'] = $rowsss;
                                                                                                                
                                                            $this->hotel_model->InsertRecord('room_amenity',$roomamenitys);   
                                                        }
                                                        // *****end************* insert room amenities *********************************
                                                        // *****start************* insert room images *********************************
                                                        foreach($rowss['images'] as $rowssss){
                                                            $roomimage['room_id'] = $roomid;
                                                            $roomimage['hotel_id'] = $h_results;
                                                            $roomimage['image'] = $rowssss;
                                                                                                                
                                                            $this->hotel_model->InsertRecord('hotel_images',$roomimage);   
                                                        }
                                                      // *****end************* insert room images *********************************
                                            }
                                            
                                    }                           
                        }
                                                                        
                    }
                    
                }
            $data->error=0;
            $data->success=1;
            $data->message= "Data fetched successfully";   
            }
            
            $data->title = 'Add Hotel';
            $data->field = 'Hotel';
            $data->page = 'add_hotel';
            $this->load->view('admin/includes/header',$data);		
            $this->load->view('add_hotel_view',$data);
            $this->load->view('admin/includes/footer',$data);
        }
        
        
        public function edit($id='')
        {
            
            $data=new stdClass();
            
            if($_POST){
                $hoteldata['name_ar'] = $this->input->post('name_ar');
                $hoteldata['description_ar'] = $this->input->post('description_ar');
                $hoteldata['address_ar'] = $this->input->post('address_ar');
                $hoteldata['city_ar'] = $this->input->post('city_ar');
                $hoteldata['country_ar'] = $this->input->post('country_ar');
                
                if($this->hotel_model->UpdateRecord('hotels',$hoteldata,array("id"=>$id))){
                    $data->error=0;
                    $data->success=1;
                    $data->message= "Record Updated successfully";                    
                }else{
                    $data->error=0;
                    $data->success=1;
                    $data->message= "Network Error! Try Again."; 
                }
                $this->session->set_flashdata('item',$data);
            }
            
            $data->hotel_data = $this->hotel_model->SelectSingleRecord('hotels',array('*'),array('id'=>$id),$orderby=array());
            //print_r($data->hotel_data); die;
            $data->title = 'Edit Hotel';
            $data->field = 'Datepicker';
            $data->page = 'list_hotel';
            $this->load->view('admin/includes/header',$data);		
            $this->load->view('edit_hotel_view',$data);
            $this->load->view('admin/includes/footer',$data);
            
        }
        
        public function list_hotel_room($id = '')
        {
            $data=new stdClass();
            
            if($_POST){
                $hoteldata['name_ar'] = $this->input->post('name_ar');
                $hoteldata['description_ar'] = $this->input->post('description_ar');
                $hoteldata['address_ar'] = $this->input->post('address_ar');
                $hoteldata['city_ar'] = $this->input->post('city_ar');
                $hoteldata['country_ar'] = $this->input->post('country_ar');
                
                if($this->hotel_model->UpdateRecord('hotels',$hoteldata,array("id"=>$id))){
                    $data->error=0;
                    $data->success=1;
                    $data->message= "Record Updated successfully";                    
                }else{
                    $data->error=0;
                    $data->success=1;
                    $data->message= "Network Error! Try Again."; 
                }
                $this->session->set_flashdata('item',$data);
            }
            
            $data->room_list = $this->hotel_model->get_hotel_room_list($id);
            //echo "<pre>"; print_r($data->room_list); die;
            $data->title = "Hotel's Room List";
            $data->field = 'Datatable';
            $data->page = 'list_hotel';
            $this->load->view('admin/includes/header',$data);		
            $this->load->view('list_room_view',$data);
            $this->load->view('admin/includes/footer',$data);
            
        }
        
        public function edit_room($id = '')
        {
            $data=new stdClass();
            
            if($_POST){
                //$roomdata['room_no_ar'] = $this->input->post('room_no_ar');
                $roomdata['description_ar'] = $this->input->post('description_ar');                
                
                if($this->hotel_model->UpdateRecord('rooms',$roomdata,array("id"=>$id))){
                    $data->error=0;
                    $data->success=1;
                    $data->message= "Record Updated successfully";                    
                }else{
                    $data->error=0;
                    $data->success=1;
                    $data->message= "Network Error! Try Again."; 
                }
                $this->session->set_flashdata('item',$data);
            }
            
            $data->room_data = $this->hotel_model->get_room_detail($id);
            //print_r($data->room_data); die;
            $data->title = 'Edit Room';
            $data->field = 'Datepicker';
            $data->page = 'list_hotel';
            $this->load->view('admin/includes/header',$data);		
            $this->load->view('edit_room_view',$data);
            $this->load->view('admin/includes/footer',$data);
            
        }
                	
}
?>