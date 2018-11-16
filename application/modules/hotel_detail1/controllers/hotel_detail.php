<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Hotel_detail extends HT_Controller 
{
	//private $connection;
	function __construct(){
        parent::__construct();
        $this->load->model('hotel_detail_model');		
	}
    
    public function index($hotelid=""){
        $data=new stdClass();
        $xmlString = '
                    <HotelDetailsResponse>
                    <Hotels>
                    <HotelId>XHBE9179</HotelId>
                    <HotelName>Minotel Prince de Liege</HotelName>
                    <Rating>3</Rating>
                    <City>Brussels</City>
                    <Country>Belgium</Country>
                    <Location/>
                    <Phone/>
                    <Telephone/>
                    <Fax/>
                    <Email/>
                    <Website/>
                    <Description>The ideally located and recently renovated hotel includes facilities as 24-hour reception desk, shuttle
                    service, tourist information office, business center, private garage, restaurant, airconditioned conferences/banquets
                    facilities, free WiFi internet co</Description>
                    <HotelAddress>CHAUSSEE DE NINOVE 664 Brussels</HotelAddress>
                    <Latitude>50.8468</Latitude>
                    <Longitude>4.29978</Longitude>
                    <HotelPostalCode>1070</HotelPostalCode>
                    <HotelAmenities>Bathroom,Shower,Hairdryer,Direct dial telephone,Satellite / cable TV,Internet access,Double
                    bed,Individual
                    heating,Reception
                    area,24h
                    check-in,24h.
                    Reception,Lift-s,Bar-s,Conference
                    room,Breakfast
                    room,Restaurant -s,Restaurant - non-smoking area,Mobile ph</HotelAmenities>
                    <RoomAmenities/>
                    <Images>
                    <Image>http://
                    test.xmlhub.com/...../images?img=aHR0cDovL2ltYWdlLm1ldGdsb2JhbC5jb20vaG90ZWxpbWFnZXMvQkVTOFJFLzEzMDUzN
                    TlfMHgwLmpwZ2h0dHA6Ly9pbWFnZS5tZXRnbG9iYWwuY29tL2hvdGVsaW1hZ2VzL0JFUzhSRS8xMzA1MzU0XzM5MHgwLm
                    pwZw==</Image>
                    <Image>http://test.xmlhub.com/...../images?img=aHR0cDovL2ltYWdlLm1ldGdsb2JhbC5jb20vaG90ZWxpbWFnZXMvQkVTO
                    FJFLzEzMDUzNTZfMzkweDAuanBn</Image>
                    </Images>
                    </Hotels></HotelDetailsResponse>
                    ';
        if($_POST){
            //print_r($_POST); die;
            $val = $this->input->post('str');
            $val = json_decode(urldecode($val));
            $this->session->set_userdata('str',$val);
            //print_r($this->session->userdata('str'));die;
                       

            $data->hotel_detail = $val;
            $data->page_title = "Hotel - ".$val->name;
            $data->page_text = "Lorem epsum About us uoioppi gg";
            $data->page = "hotel_detail";
            $this->template->write_view('content','hotel_detail/hotel_detail_view',$data);
            $this->template->render();
            
        }else{
            //$xml = new SimpleXMLElement($xmlString);
            //echo "<pre>"; print_r($xml->Hotels); die; 
            //print_r($this->session->userdata('str'));die;
            $val = $this->session->userdata('str');
            $val = json_decode(($val));            

            $data->hotel_detail = array();
            $data->page_title = "Hotel - ";
            $data->page_text = "Lorem epsum About us uoioppi gg";
            $data->page = "hotel_detail";
            $this->template->write_view('content','hotel_detail/hotel_detail_view',$data);
            $this->template->render();
        }
                        
                               
        
    }
        
        
}
?>