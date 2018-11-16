<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Hotel_detail extends HT_Controller 
{
	//private $connection;
	function __construct(){
        parent::__construct();
        $this->load->model('hotel_detail_model');
        $this->load->library('cart');
	}
    
    public function index($hotelid=""){
        $data=new stdClass();
            $search_array = $this->session->userdata('search');
            if(empty($search_array)){
                redirect('home');
            }
            set_time_limit(0);
            $s = '';
            if($search_array->childs != 0){
                $s .= "<ChildrenAges>";
                for($i=0; $i<$search_array->childs;$i++){ 
                    $s .= "<ChildAge>".$search_array->childrenAges[$i]."</ChildAge>";
                }
                $s .= "</ChildrenAges>";
            }else{
                //$s .= "<ChildrenAges>0</ChildrenAges>";
            }
            
            
            
            
            //echo "<pre>"; print_r($search_array); die;
            $second = [];
            if($search_array->noofroom >= 2){
                for($m=0; $m<($search_array->noofroom - 1); $m++){
                    $r1 = '';
                      if($search_array->child_arr[$m] != 0){
                          $r1 .= "<ChildrenAges>";
                          for($i=0; $i<$search_array->child_arr[$m];$i++){ 
                              $r1 .= "<ChildAge>".$search_array->children_age_arr[$m][$i]."</ChildAge>";
                          }
                          $r1 .= "</ChildrenAges>";
                      }  
                      
                    $second[] = "<Room>
                              <Type>".$search_array->room_arr[$m]."</Type>
                              <NoOfAdults>".$search_array->adults_arr[$m]."</NoOfAdults>
                              <NoOfChilds>".$search_array->child_arr[$m]."</NoOfChilds>
                              ".$r1."
                            </Room>";
                }
            }
            $strrr = '';
            foreach($second as $rr){
                $strrr .= $rr;
            }
            
            
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
                    <HotelIDs>
                    <Int>".$hotelid."</Int>        
                    </HotelIDs>
                    <GuestNationality>".$search_array->GuestNationality."</GuestNationality>
                    <Rooms>
                        <Room>
                            <Type>".$search_array->room_type."</Type>
                            <NoOfAdults>".$search_array->adults."</NoOfAdults>
                            <NoOfChilds>".$search_array->childs."</NoOfChilds>
                            ".$s."
                        </Room>
                        ".$strrr."                        
                    </Rooms>
                    </Booking>
                    </HotelFindRequest>";
            
            //header("Content-type:text/xml");
            //print_r($str); die;
            //$url = "http://test.xmlhub.com/testpanel.php/action/findhotelbyid";
            //$ch = curl_init();
            ////set the url, number of POST vars, POST data
            //curl_setopt($ch, CURLOPT_URL, $url);
            //curl_setopt($ch, CURLOPT_POST, 1);
            //curl_setopt($ch, CURLOPT_POSTFIELDS, "XML=" . urlencode($str));
            //curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            //curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            ////curl_setopt($ch, CURLOPT_HTTPHEADER, array('Accept-Encoding: gzip, deflate'));
            ////execute post
            //$result = curl_exec($ch);
            ////print_r($result); die;
            ////close connection
            //curl_close($ch);
            //$xml = new SimpleXMLElement($result);
            //echo "<pre>"; print_r($xml); die;
            //$room_detail = $xml->Hotels->Hotel;
            
                $hotel_detail = $this->hotel_detail_model->SelectSingleRecord('hotels',array('*'),array("hotel_id"=>$hotelid),$orderby = NULL);
                //echo "<pre>"; print_r($xml->Hotels->Hotel); die;
                if(empty($hotel_detail)){
                    $hotel_detail = new stdClass();
                    $hotel_detail->name = (string)$xml->Hotels->Hotel->Name;
                    $hotel_detail->rating = (string)$xml->Hotels->Hotel->Rating;
                    $hotel_detail->description = (string)$xml->Hotels->Hotel->Name;
                    $hotel_detail->address = '';
                    $hotel_detail->city = '';
                    $hotel_detail->country = '';
                    $hotel_detail->hotel_id = (string)$xml->Hotels->Hotel->Id;
                }
                $hotel_detail->price = (string)$xml->Hotels->Hotel->Price;
                $property = $this->hotel_detail_model->SelectSingleRecord('property_amenity',array('name as p_name,name_ar as p_name_ar'),array("hotel_id"=>$hotelid),$orderby = NULL);
                $hotel_detail->property_amenity = $property;
                $room_amenity = $this->hotel_detail_model->SelectSingleRecord('room_amenities',array('name as am_name,name_ar as am_name_ar'),array("hotel_id"=>$hotelid),$orderby = NULL);
                $hotel_detail->room_amenity = $room_amenity;
                $hotel_image = $this->hotel_detail_model->SelectRecord('hotel_images',array('image'),array("hotel_id"=>$hotelid),$orderby = NULL);
                if(!empty($hotel_image)){
                    $hotel_detail->hotel_images = $hotel_image;    
                }else{
                    $hotel_detail->hotel_images = (string)$xml->Hotels->Hotel->ThumbImages;
                }                    
            $hotel_detail->SearchSessionId = $xml->SearchSessionId;
            $data->hotel_detail = $hotel_detail;
            $data->room_detail = $room_detail;
            $data->page_title = "Hotel - ".$hotel_detail->name;
            $data->page_text = "Lorem epsum About us uoioppi gg";
            $data->page = "hotel_detail";
            $this->template->write_view('content','hotel_detail/hotel_detail_view',$data);
            $this->template->render();
                    
    }
    
    
    public function add_room1(){
        //echo "<pre>"; print_r($_POST); die;
        $search_array = $this->session->userdata('search');
        $this->cart->destroy();
        $data=new stdClass();
        $cdata = array(
                'id'      => $_POST['key'],
                'qty'     => $search_array->noofroom,
                'price'   => explode('|',$_POST['room_rate'])[0],
                'name'    => implode('_',explode(',',implode(' ',explode('/',implode(' ',explode('|',implode(' ',explode('-',$_POST['room_type'])))))))),
                'options' => $_POST
        );
        //echo "<pre>"; print_r($cdata);  die;
        $this->cart->insert($cdata);
        //$data->postitems = $_POST;        
        //echo "<pre>"; print_r($data); die;
        $this->load->view('cart_view',$data);
        
    }
     public function add_room(){
        //echo "<pre>"; print_r($_POST); die;
        $search_array = $this->session->userdata('search');
        $this->cart->destroy();
        $data=new stdClass();
        $cdata = array(
                'id'      => $_POST['key'],
                'qty'     => 1,
                'price'   => $_POST['TotalRate'],
                'name'    => $_POST['room_type'],
                'options' => $_POST
        );
        //echo "<pre>"; print_r($cdata);  die;
        $this->cart->insert($cdata);
        //$data->postitems = $_POST;        
        //echo "<pre>"; print_r($data); die;
        $this->load->view('cart_view',$data);
        
    }
    public function remove_room(){
        //print_r(($_POST['session_id'])); die;
        $data=new stdClass();
        $cdata = array(
            'rowid'   => $_POST['rowid'],
            'price'   => 0,
            'qty'     => 0,
            'name'   => ''
            );
            
        $this->cart->update($cdata);
        $data->postitems = $_POST; 
       $this->load->view('cart_view',$data); 
    }    
}
?>