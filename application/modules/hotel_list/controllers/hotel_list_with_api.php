<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Hotel_list extends HT_Controller 
{
	//private $connection;
	function __construct(){
        parent::__construct();
        $this->load->model('hotel_list_model');		
	}
    
    public function index1(){
        $data=new stdClass();
        
        if($_POST){
            //print_r($_POST); die;
            $hotel_list = $this->hotel_list_model->SelectRecord('hotels',array('*'),array("status"=>1),$orderby = NULL);    
            $data->hotel_list = $this->hotel_list_model->get_least_price_hotel($hotel_list,$_POST);
            
             echo $this->load->view('hotel_list/filter_hotel_list_view',$data); 
            
        }else{
            $hotel_list = $this->hotel_list_model->SelectRecord('hotels',array('*'),array("status"=>1),$orderby = NULL);
            $data->hotel_list = $this->hotel_list_model->get_least_price_hotel($hotel_list,array());
            //print_r($data->hotel_list); die;
            $data->page_title = "Hotel List";
            $data->page_text = "Lorem epsum About us uoioppi gg";
            $data->page = "hotel_list";
            $this->template->write_view('content','hotel_list/hotel_list_view',$data);
            $this->template->render();
        }
                        
                               
        
    }
    
    public function index(){
        $data=new stdClass();
                
        //--------------------------------
                        
        $hotel_list = array();
        $count = 1;$count1 = 1;
        $hotel_arr = array();
        if($_POST){
            //print_r($_POST); die;
            $search_array = $this->session->userdata('search');  
                set_time_limit(0);
                $str = "<HotelFindRequest>
                <Authentication>
                    <AgentCode>X3CAC38</AgentCode>
                    <UserName>yanjoon</UserName>
                    <Password>Dubaiyhh2020</Password>
                </Authentication>
                <Booking>
                    <ArrivalDate>".$search_array->ArrivalDate."</ArrivalDate>
                    <DepartureDate>".$search_array->DepartureDate."</DepartureDate>
                    <CountryCode>".$search_array->city[1]."</CountryCode>
                    <City>".$search_array->city[0]."</City>
                    <GuestNationality>".$search_array->GuestNationality."</GuestNationality>
                    <HotelRatings>
                        <HotelRating>1</HotelRating>
                        <HotelRating>2</HotelRating>
                        <HotelRating>3</HotelRating>
                        <HotelRating>4</HotelRating>
                        <HotelRating>5</HotelRating>
                    </HotelRatings>
                    <Rooms>
                        <Room>
                            <Type>single</Type>
                            <NoOfAdults>2</NoOfAdults>
                            <NoOfChilds>0</NoOfChilds>
                        </Room>
                    </Rooms>
                </Booking>
                </HotelFindRequest>";
                
            //---------------------if fetched by database---------------
            $hotel_list = [];
             $hotellist = $this->hotel_list_model->SelectINRecord('hotels',array('*'),array("hotel_id",$this->session->userdata('hotel_ids')),'hotel_id');
             $p = (isset($_POST['property_amenities']))?$_POST['property_amenities']:array();
             
             $q = (isset($_POST['hotel_amenities']))?$_POST['hotel_amenities']:array();
             $rate = explode(';',$_POST['price']);
             //echo "<pre>"; print_r($hotellist); die;
            foreach($hotellist as $row){
                if(isset($_POST['rating_check'])){
                    $hotel_detail = $this->hotel_list_model->SelectSingleRecord('hotels',array('*'),array("hotel_id"=>$row->hotel_id,"rating"=>$_POST['rating'],"price >="=>intval($rate[0]),"price <="=>intval($rate[1])),$orderby = NULL);    
                }else{
                    $hotel_detail = $this->hotel_list_model->SelectSingleRecord('hotels',array('*'),array("hotel_id"=>$row->hotel_id,"price >="=>intval($rate[0]),"price <="=>intval($rate[1])),$orderby = NULL);
                    //$hotel_detail = $this->hotel_list_model->get_hotel_by_price($row->hotel_id,'',$rate[0],$rate[1]);
                }
                //echo $this->db->last_query(); 
                //print_r($hotel_detail);
                $hotel_arr = [];
                if(!empty($hotel_detail)){
                    $hotel_detail->price = $row->price;                    
                    $property = $this->hotel_list_model->SelectSingleRecord('property_amenity',array('name as p_name,name_ar as p_name_ar'),array("hotel_id"=>$row->hotel_id),$orderby = NULL);
                    
                    $hotel_detail->property_amenity = $property;
                       if(isset($property->p_name)){
                            $property = explode(',',$property->p_name);
                            //print_r($property); die;
                            foreach($p as $r){                                
                                    foreach($property as $prop){
                                      similar_text($r, $prop, $perc);
                                      //echo $perc;
                                        if($perc >= 30){
                                            $count = 1;
                                            $hotel_arr[] = $row->hotel_id; break;
                                        }
                                    }
                                //if(in_array($r,$property)){
                                //    $count = 1;
                                //    $hotel_arr[] = $row->hotel_id; break;
                                //}
                            }
                       }
                    
                    $room_amenity = $this->hotel_list_model->SelectSingleRecord('room_amenities',array('name as am_name,name_ar as am_name_ar'),array("hotel_id"=>$row->hotel_id),$orderby = NULL);
                    $hotel_detail->room_amenity = $room_amenity;
                    //print_r($room_amenity); die;
                      if(isset($room_amenity->am_name)){
                            $room_amenity = explode(',',$room_amenity->am_name);
                            foreach($q as $r){
                                foreach($room_amenity as $rprop){
                                      similar_text($r, $rprop, $percnt);                                      
                                        if($percnt >= 30){
                                            $count = 1;
                                            $hotel_arr[] = $row->hotel_id; break;
                                        }
                                    }
                                //if(in_array($r,$room_amenity)){
                                //    $count1 = 1;
                                //    $hotel_arr[] = $row->hotel_id; break;
                                //}
                            }
                      }
                 
                    $hotel_image = $this->hotel_list_model->SelectRecord('hotel_images',array('image'),array("hotel_id"=>$row->hotel_id),$orderby = NULL);
                    $hotel_detail->hotel_images = $hotel_image;
                    
                    if(($p) || ($q)){
                        if(in_array($row->hotel_id,$hotel_arr)){
                            $hotel_list[] = $hotel_detail;                        
                           }    
                    }else{
                        $hotel_list[] = $hotel_detail;                                
                    }
                }
            }
            
            //--------------------------------------------------
            
            //echo "<pre>"; print_r($hotel_list); die;
             if($_POST['sort_type'] == 'desc'){ $sort = SORT_DESC;}if($_POST['sort_type'] == 'asc'){ $sort = SORT_ASC;}
            
            if($_POST['sorting'] == 'name'){
                $name = array();
                foreach ($hotel_list as $key => $row)
                {
                    $name[$key] = $row->name;
                }
                array_multisort($name, $sort, $hotel_list);
            }
            if($_POST['sorting'] == 'rating'){
                $rating = array();
                foreach ($hotel_list as $key => $row)
                {
                    $rating[$key] = $row->rating;
                }
                array_multisort($rating, $sort, $hotel_list);
            }
            if($_POST['sorting'] == 'price'){
                $price = array();
                foreach ($hotel_list as $key => $row)
                {
                    $price[$key] = $row->price;
                }
                array_multisort($price, $sort, $hotel_list);
            }
            
            
            $data->hotel_list = $hotel_list;
            
            
            //echo "<pre>"; print_r($hotel_list); die;
             echo $this->load->view('hotel_list/filter_hotel_list_view',$data); 
            
        }else{
            
            //print_r($_GET); die;
            if(!empty($_GET)){
                $city = explode(';',$_GET['city']);
                $cityy = $_GET['city'];
                $checkin = date('d/m/Y',strtotime($_GET['check_in']));
                $checkout = date('d/m/Y',strtotime($_GET['check_out']));
                $room = $_GET['room'];
                $adults = $_GET['adults'];
                $childs = $_GET['child'];
                $nationality = $_GET['nationality'];
            }else{
                $city = explode(';','DUBAI;AE');
                $cityy = 'DUBAI;AE';
                $checkin = date('d/m/Y', strtotime("+7 days"));;
                $checkout = date('d/m/Y', strtotime("+9 days"));;
                $room = 'Double';
                $adults = 2;
                $childs = 0;
                $nationality = "UK";
                $_GET['noofroom'] = 1;
                $_GET['children_age'] = 0;
            }
            $s = '';
            if($childs != 0){
                $s .= "<ChildrenAges>";
                for($i=0; $i<$childs;$i++){ 
                    $s .= "<ChildAge>".$_GET['children_age'][$i]."</ChildAge>";
                }
                $s .= "</ChildrenAges>";
            }
            
            $second = [];
            if($_GET['noofroom'] >= 2){
                for($m=1; $m<($_GET['noofroom']); $m++){
                    $r1 = '';
                      if($_GET['child'.$m] != 0){
                          $r1 .= "<ChildrenAges>";
                          for($i=0; $i<$_GET['child'.$m];$i++){ 
                              $r1 .= "<ChildAge>".$_GET['children_age'.$m][$i]."</ChildAge>";
                          }
                          $r1 .= "</ChildrenAges>";
                      }
                    $second[] = "<Room>
                              <Type>".$_GET['room'.$m]."</Type>
                              <NoOfAdults>".$_GET['adults'.$m]."</NoOfAdults>
                              <NoOfChilds>".$_GET['child'.$m]."</NoOfChilds>
                              ".$r1."
                            </Room>";
                }
            }
            
            $strrr = '';
            foreach($second as $rr){
                $strrr .= $rr;
            }
            
            //--------------------------------
            set_time_limit(0);
            $str = "<HotelFindRequest>
            <Authentication>
                <AgentCode>X3CAC38</AgentCode>
                <UserName>yanjoon</UserName>
                <Password>Dubaiyhh2020</Password>
            </Authentication>
            <Booking>
                <ArrivalDate>".$checkin."</ArrivalDate>
                <DepartureDate>".$checkout."</DepartureDate>
                <CountryCode>".$city[1]."</CountryCode>
                <City>".$city[0]."</City>
                <GuestNationality>".$nationality."</GuestNationality>
                <HotelRatings>
                    <HotelRating>1</HotelRating>
                    <HotelRating>2</HotelRating>
                    <HotelRating>3</HotelRating>
                    <HotelRating>4</HotelRating>
                    <HotelRating>5</HotelRating>
                </HotelRatings>
                <Rooms>
                    <Room>
                        <Type>".$room."</Type>
                        <NoOfAdults>".$adults."</NoOfAdults>
                        <NoOfChilds>".$childs."</NoOfChilds>
                        ".$s."
                    </Room>
                    ".$strrr."                    
                </Rooms>
            </Booking>
            </HotelFindRequest>";
            //header("Content-type:text/xml");
            //print_r($str); die;
            //file_put_contents("xml/resquest".time().".xml", $str);
            $url = "http://test.xmlhub.com/testpanel.php/action/findhotel";
            $ch = curl_init();
            //set the url, number of POST vars, POST data
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, "XML=" . urlencode($str));
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            //curl_setopt($ch, CURLOPT_HTTPHEADER, array('Accept-Encoding: gzip, deflate'));
            //execute post
            $result = curl_exec($ch);
            //print_r($result); die;
            if ($result === false) {
            echo 'Curl error: ' . curl_error($ch);
            }
            //close connection
            curl_close($ch);
            
            $xmlString = $result;
            
            $xml = new SimpleXMLElement($xmlString);
            
            $search_array = new stdClass();
            
            $search_array->SearchSessionId = (string)$xml->SearchSessionId;            
            $search_array->ArrivalDate = (string)$xml->ArrivalDate;
            $search_array->DepartureDate = (string)$xml->DepartureDate;
            $search_array->Currency = (string)$xml->Currency;
            $search_array->GuestNationality = (string)$xml->GuestNationality;
            $search_array->city = explode(';',$cityy);
            $search_array->room_type = $room;
            $search_array->adults = $adults;
            $search_array->childs = $childs;
            $search_array->childrenAges = $_GET['children_age'];
            $search_array->noofroom = $_GET['noofroom'];
            
            $x = 1;
            foreach($second as $rr){
                $search_array->room_arr[] = $_GET['room'.$x];
                $search_array->adults_arr[] = $_GET['adults'.$x];
                $search_array->child_arr[] = $_GET['child'.$x];
                $search_array->children_age_arr[] = $_GET['children_age'.$x];
                $x++;
            }
            if($_GET['noofroom'] == 2){
              $search_array->room1 = $_GET['room1'];
              $search_array->adults1 = $_GET['adults1'];
              $search_array->child1 = $_GET['child1'];
              $search_array->children_age1 = $_GET['children_age1'];
            }
            if($_GET['noofroom'] == 3){
              $search_array->room1 = $_GET['room1'];
              $search_array->adults1 = $_GET['adults1'];
              $search_array->child1 = $_GET['child1'];
              $search_array->children_age1 = $_GET['children_age1'];  
              $search_array->room2 = $_GET['room2'];
              $search_array->adults2 = $_GET['adults2'];
              $search_array->child2 = $_GET['child2'];
              $search_array->children_age2 = $_GET['children_age2'];
            }
            
            
            $this->session->set_userdata('search',$search_array);  
            //echo "<pre>"; print_r($xml); die;    
            $hotel_detail = new stdClass();
            $hotel_ids = [];
            if($xml->Hotels->Hotel){
            
            foreach($xml->Hotels->Hotel as $row){                
                $hotel_detail = $this->hotel_list_model->SelectSingleRecord('hotels',array('*'),array("hotel_id"=>(string)$row->Id),$orderby = NULL);
                //echo "<pre>"; print_r($hotel_detail); die;
                if(empty($hotel_detail)){
                    $hotel_detail = new stdClass();
                    $hotel_detail->name = (string)$row->Name;
                    $hotel_detail->rating = (string)$row->Rating;
                    $hotel_detail->description = (string)$row->Name;
                    $hotel_detail->address = '';
                    $hotel_detail->city = '';
                    $hotel_detail->country = '';
                    $hotel_detail->hotel_id = (string)$row->Id;
                }else{
                    $this->hotel_list_model->UpdateRecord('hotels',array('price'=>(string)$row->Price),array("hotel_id"=>(string)$row->Id));                    
                }
                $hotel_detail->price = (string)$row->Price;               
                $hotel_detail->SearchSessionId = $xml->SearchSessionId;
                $hotel_detail->ArrivalDate = $xml->ArrivalDate;
                $hotel_detail->DepartureDate = $xml->DepartureDate;
                $hotel_detail->Currency = $xml->Currency;
                $hotel_detail->GuestNationality = $xml->GuestNationality;
                $hotel_detail->RoomDetails = $row->RoomDetails;
                $property = $this->hotel_list_model->SelectSingleRecord('property_amenity',array('name as p_name,name_ar as p_name_ar'),array("hotel_id"=>(string)$row->Id),$orderby = NULL);
                $hotel_detail->property_amenity = $property;
                $room_amenity = $this->hotel_list_model->SelectSingleRecord('room_amenities',array('name as am_name,name_ar as am_name_ar'),array("hotel_id"=>(string)$row->Id),$orderby = NULL);
                $hotel_detail->room_amenity = $room_amenity;
                $hotel_image = $this->hotel_list_model->SelectRecord('hotel_images',array('image'),array("hotel_id"=>(string)$row->Id),$orderby = NULL);
                if(!empty($hotel_image)){
                    $hotel_detail->hotel_images = $hotel_image;    
                }else{
                    $hotel_detail->hotel_images = (string)$row->ThumbImages;
                }
                
                if(isset($hotel_detail->hotel_id)){
                    $hotel_ids[] = $hotel_detail->hotel_id;    
                }
                
                $hotel_list[] = $hotel_detail;
            }
            $data->hotel_list = $hotel_list;
            //$data->hotel_list->SearchSessionId = 'xxx';//$xml->SearchSessionId;
            //echo "<pre>"; print_r($hotel_list); die;
            $this->session->set_userdata('hotel_ids',$hotel_ids);
            }
            //echo "<pre>"; print_r($this->session->userdata('hotel_ids')); die;
            $data->page_title = "Hotel List";
            $data->page_text = "Lorem epsum About us uoioppi gg";
            $data->page = "hotel_list";
            $this->template->write_view('content','hotel_list/hotel_list_view',$data);
            $this->template->render();
        }
                        
                               
        
    }
    
     public function search_hotel(){
        $data = [];
        $searchTerm = $_GET['term'];
        $res = $this->hotel_list_model->get_search_hotel($searchTerm);
        //get matched data from skills table
        foreach($res as $row) {
            $data[] = array("key"=>$row->hotel_id,"value"=>$row->name.', '.$row->address);
        }        
        //return json data
        echo json_encode($data);
    }
     
    public function lists(){
        $data=new stdClass();
                
        //--------------------------------
                        
        $hotel_list = array();
        $count = 1;$count1 = 1;
        $hotel_arr = array();
        if($_POST){
            //print_r($_POST); die;
            $search_array = $this->session->userdata('search');  
                
            //---------------------if fetched by database---------------
            $hotel_list = [];
            //print_r($this->session->userdata('hotel_ids'));die;
             $hotellist = $this->hotel_list_model->SelectINRecord('hotels',array('*'),array("hotel_id",$this->session->userdata('hotel_ids')),'hotel_id');
             $p = (isset($_POST['property_amenities']))?$_POST['property_amenities']:array();
             
             $q = (isset($_POST['hotel_amenities']))?$_POST['hotel_amenities']:array();
             $rate = explode(';',$_POST['price']);
             //echo "<pre>"; print_r($hotellist); die;
            foreach($hotellist as $row){
                if(isset($_POST['rating_check'])){
                    $hotel_detail = $this->hotel_list_model->SelectSingleRecord('hotels',array('*'),array("hotel_id"=>$row->hotel_id,"rating"=>$_POST['rating'],"price >="=>intval($rate[0]),"price <="=>intval($rate[1])),$orderby = NULL);    
                }else{
                    $hotel_detail = $this->hotel_list_model->SelectSingleRecord('hotels',array('*'),array("hotel_id"=>$row->hotel_id,"price >="=>intval($rate[0]),"price <="=>intval($rate[1])),$orderby = NULL);
                    //$hotel_detail = $this->hotel_list_model->get_hotel_by_price($row->hotel_id,'',$rate[0],$rate[1]);
                }
                //echo $this->db->last_query(); 
                //print_r($hotel_detail);
                $hotel_arr = [];
                if(!empty($hotel_detail)){
                    $hotel_detail->price = $row->price;                    
                    $property = $this->hotel_list_model->SelectSingleRecord('property_amenity',array('name as p_name,name_ar as p_name_ar'),array("hotel_id"=>$row->hotel_id),$orderby = NULL);
                    
                    $hotel_detail->property_amenity = $property;
                       if(isset($property->p_name)){
                            $property = explode(',',$property->p_name);
                            //print_r($property); die;
                            foreach($p as $r){                                
                                    foreach($property as $prop){
                                      similar_text($r, $prop, $perc);
                                      //echo $perc;
                                        if($perc >= 30){
                                            $count = 1;
                                            $hotel_arr[] = $row->hotel_id; break;
                                        }
                                    }
                                //if(in_array($r,$property)){
                                //    $count = 1;
                                //    $hotel_arr[] = $row->hotel_id; break;
                                //}
                            }
                       }
                    
                    $room_amenity = $this->hotel_list_model->SelectSingleRecord('room_amenities',array('name as am_name,name_ar as am_name_ar'),array("hotel_id"=>$row->hotel_id),$orderby = NULL);
                    $hotel_detail->room_amenity = $room_amenity;
                    //print_r($room_amenity); die;
                      if(isset($room_amenity->am_name)){
                            $room_amenity = explode(',',$room_amenity->am_name);
                            foreach($q as $r){
                                foreach($room_amenity as $rprop){
                                      similar_text($r, $rprop, $percnt);                                      
                                        if($percnt >= 30){
                                            $count = 1;
                                            $hotel_arr[] = $row->hotel_id; break;
                                        }
                                    }
                                //if(in_array($r,$room_amenity)){
                                //    $count1 = 1;
                                //    $hotel_arr[] = $row->hotel_id; break;
                                //}
                            }
                      }
                 
                    $hotel_image = $this->hotel_list_model->SelectRecord('hotel_images',array('image'),array("hotel_id"=>$row->hotel_id),$orderby = NULL);
                    $hotel_detail->hotel_images = $hotel_image;
                    
                    if(($p) || ($q)){
                        if(in_array($row->hotel_id,$hotel_arr)){
                            $hotel_list[] = $hotel_detail;                        
                           }    
                    }else{
                        $hotel_list[] = $hotel_detail;                                
                    }
                }
            }
            
            //--------------------------------------------------
            
            echo "<pre>"; print_r($hotel_list); die;
             if($_POST['sort_type'] == 'desc'){ $sort = SORT_DESC;}if($_POST['sort_type'] == 'asc'){ $sort = SORT_ASC;}
            
            if($_POST['sorting'] == 'name'){
                $name = array();
                foreach ($hotel_list as $key => $row)
                {
                    $name[$key] = $row->name;
                }
                array_multisort($name, $sort, $hotel_list);
            }
            if($_POST['sorting'] == 'rating'){
                $rating = array();
                foreach ($hotel_list as $key => $row)
                {
                    $rating[$key] = $row->rating;
                }
                array_multisort($rating, $sort, $hotel_list);
            }
            if($_POST['sorting'] == 'price'){
                $price = array();
                foreach ($hotel_list as $key => $row)
                {
                    $price[$key] = $row->price;
                }
                array_multisort($price, $sort, $hotel_list);
            }
            
            
            $data->hotel_list = $hotel_list;
            
            
            //echo "<pre>"; print_r($hotel_list); die;
             echo $this->load->view('hotel_list/filter_hotel_list_view',$data); 
            
        }else{                        
            $search_array = new stdClass();            
            
            $this->session->set_userdata('search',$search_array);  
            //echo "<pre>"; print_r($xml); die;    
            $hotel_detail = new stdClass();
            $hotel_ids = [];
            
            $hotellist_db = $this->hotel_list_model->SelectRecordlimit('hotels',array('*'),array(),'rand()',100,0);
            
            if($hotellist_db){
            
            foreach($hotellist_db as $row){                
                $hotel_detail = $this->hotel_list_model->SelectSingleRecord('hotels',array('*'),array("hotel_id"=>$row['hotel_id']),$orderby = NULL);
                //echo "<pre>"; print_r($hotel_detail); die;
                
                    $hotel_detail = new stdClass();
                    $hotel_detail->name = $row['name'];
                    $hotel_detail->rating = $row['rating'];
                    $hotel_detail->description = $row['name'];
                    $hotel_detail->address = '';
                    $hotel_detail->city = '';
                    $hotel_detail->country = '';
                    $hotel_detail->hotel_id = $row['hotel_id'];
                
                $hotel_detail->price = $row['price'];               
                
                $property = $this->hotel_list_model->SelectSingleRecord('property_amenity',array('name as p_name,name_ar as p_name_ar'),array("hotel_id"=>$row['hotel_id']),$orderby = NULL);
                $hotel_detail->property_amenity = $property;
                $room_amenity = $this->hotel_list_model->SelectSingleRecord('room_amenities',array('name as am_name,name_ar as am_name_ar'),array("hotel_id"=>$row['hotel_id']),$orderby = NULL);
                $hotel_detail->room_amenity = $room_amenity;
                $hotel_image = $this->hotel_list_model->SelectRecord('hotel_images',array('image'),array("hotel_id"=>(string)$row['hotel_id']),$orderby = NULL);
                if(!empty($hotel_image)){
                    $hotel_detail->hotel_images = $hotel_image;    
                }else{
                    $hotel_detail->hotel_images = '';
                }
                
                if(isset($row['hotel_id'])){
                    $hotel_ids[] = $row['hotel_id'];    
                }
                
                $hotel_list[] = $hotel_detail;
            }
            $data->hotel_list = $hotel_list;
            //$data->hotel_list->SearchSessionId = 'xxx';//$xml->SearchSessionId;
            //echo "<pre>"; print_r($hotel_list); die;
            $this->session->set_userdata('hotel_ids',$hotel_ids);
            }
            //echo "<pre>"; print_r($this->session->userdata('hotel_ids')); die;
            $data->page_title = "Hotel List";
            $data->page_text = "Lorem epsum About us uoioppi gg";
            $data->page = "hotel_list";
            $this->template->write_view('content','hotel_list/hotel_list_view',$data);
            $this->template->render();
        }
                        
                               
        
    }    
        
        
}
?>