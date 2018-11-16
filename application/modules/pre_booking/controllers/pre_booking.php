<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Pre_booking extends HT_Controller 
{
	//private $connection;
	function __construct(){
        parent::__construct();
        $this->load->model('pre_booking_model');
        $this->load->library('paypal_lib');
        $this->load->library('cart');
	}
    
    public function index($hotelid=""){
        $data=new stdClass();                
        $search_sess = $this->session->userdata('search');
        if(empty($search_sess)){
            redirect('home');
        }
        //echo "<pre>"; print_r($_POST); die;
        //echo "<pre>"; print_r($search_sess); die;
        //echo "<pre>"; print_r($this->cart->contents()); die;
        
        $text = '';
        foreach($this->cart->contents() as $key => $item){
            $val = $item['options'];
            //echo "<pre>"; print_r($val);die;
            $SearchSessionId = (string)$val['SearchSessionId'];
            $countrycode = $item['options']['countrycode'];
            $city = $item['options']['city'];
            $hotelid = $val['hotel_id'];
            
            $s = '';
            //echo (string)$val['ChildrenAges']; die;
            if((string)$val['ChildrenAges']){
                $child_age = explode('*',(string)$val['ChildrenAges']);
                foreach($child_age as $r){
                    $s .= "<ChildrenAges>".$r."</ChildrenAges>";
                }    
            }else{
                $s .= "<ChildrenAges>0</ChildrenAges>";
            }
            
            $childages = explode('|',(string)$val['ChildrenAges']);
            foreach($childages as $child){
                if($child != 0){
                    $agearr[] = $child;
                }
            }
            
            
            $text .= "<RoomDetail>
                            <Type>".(string)$val['room_type']."</Type>
                            <BookingKey>".(string)$val['BookingKey']."</BookingKey>
                            <Adults>".(string)$val['Adults']."</Adults>
                            <Children>".(string)$val['Children']."</Children>
                            <ChildrenAges>".(string)$val['ChildrenAges']."</ChildrenAges>                                                    
                            <TotalRooms>".(string)$val['TotalRooms']."</TotalRooms>
                            <TotalRate>".(string)$val['TotalRate']."</TotalRate>
                            </RoomDetail>";                                    
        }
        //header('content-type:text/xml');
        //echo $text; die;
        $str = "<PreBookingRequest>
                <Authentication>
                    <AgentCode>X3CAC38</AgentCode>
                    <UserName>yanjoon</UserName>
                    <Password>Dubaiyhh2020</Password>
                </Authentication>
                    <PreBooking>
                    <SearchSessionId>".$SearchSessionId."</SearchSessionId>
                    <ArrivalDate>".$search_sess->ArrivalDate."</ArrivalDate>
                    <DepartureDate>".$search_sess->DepartureDate."</DepartureDate>
                    <GuestNationality>".$search_sess->GuestNationality."</GuestNationality>
                    <CountryCode>".$search_sess->city[1]."</CountryCode>
                    <City>".$search_sess->city[0]."</City>
                    <HotelId>".$hotelid."</HotelId>
                    <Currency>AED</Currency>
                    <RoomDetails>                       
                            ".$text."                       
                    </RoomDetails>
                    </PreBooking>
                </PreBookingRequest>";
        //header('content-type:text/xml');
        //print_r($str); die;
        //file_put_contents("xml/resquest".time().".xml", $str);
        $url = "http://test.xmlhub.com/testpanel.php/action/prebook";
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
        //print_r($result); die;
            //print_r($_POST['hotel_id']); die;
            //$val = new stdClass();
            //echo "<pre>"; print_r($val->PreBookingDetails->Status); die;
            
            $this->session->set_userdata('prebooking','1');
            $data->error = 0;
            $hotel_detail = $this->pre_booking_model->SelectSingleRecord('hotels',array('*'),array("hotel_id"=>$hotelid),$orderby = NULL);
            $hotel_image = $this->pre_booking_model->SelectSingleRecord('hotel_images',array('*'),array("hotel_id"=>$hotelid),$orderby = NULL);                
            $val['name'] = isset($hotel_detail->name) ? $hotel_detail->name : '';
            $val['address'] = isset($hotel_detail->address) ? $hotel_detail->address : '';
            $val['image'] = isset($hotel_image->image) ? $hotel_image->image : '';
                        
            
            $data->booking_detail = $val;
            $data->page_title = "Hotel Booking - ".$val['name'];
            
            $data->page_text = "Lorem epsum About us uoioppi gg";
            $data->page = "hotel_detail";
            $this->template->write_view('content','pre_booking/pre_booking_view',$data);
            $this->template->render();
            
        
    }
    
    public function buy(){
		
        $this->session->set_userdata('booking_key',$_POST['booking_key']);
            $arr['SearchSessionId'] = $_POST['SearchSessionId'];
            $arr['ArrivalDate'] = $_POST['ArrivalDate'];
            $arr['DepartureDate'] = $_POST['DepartureDate'];
            $arr['GuestNationality'] = $_POST['GuestNationality'];
            $arr['CountryCode'] = $_POST['CountryCode'];
            $arr['City'] = $_POST['City'];
            $arr['Currency'] = $_POST['Currency'];
            $arr['Address'] = $_POST['Address'];
            
            
            $arr2['Adults'] = $_POST['Adults'];
            $arr2['Children'] = $_POST['Children'];
            $arr2['ChildrenAges'] = $_POST['ChildrenAges'];
            $arr2['hotel_name'] = $_POST['hotel_name'];
            $arr2['room_type'] = substr(explode('|',$_POST['room_type'])[0],0,20);
            $arr2['total_amt'] = $_POST['total_amt'];
            $arr2['TotalRooms'] = $_POST['TotalRooms'];
            $arr2['item_number'] = $_POST['item_number'];
            //print_r($arr2); die;
            $arr1['salutation'] = json_encode($_POST['salutation']);
            $arr1['fname'] = json_encode($_POST['fname']);
            $arr1['lname'] = json_encode($_POST['laname']);
            $arr1['is_child'] = json_encode($_POST['is_child']);
            $arr1['child_age'] = json_encode($_POST['child_age']);
            
        $this->session->set_userdata('user_salutation',$arr1['salutation']);
        $this->session->set_userdata('fname',$arr1['fname']);
        $this->session->set_userdata('lname',$arr1['lname']);
        $this->session->set_userdata('is_child',$arr1['is_child']);
        $this->session->set_userdata('child_age',$arr1['child_age']);
        
        $secretHash = "3A7EE82BB2260CDA76D67C415F2672C8";
        $accessCode = 'E4154C42';
        $merchantId = '700080';
        $data = array(
        "vpc_AccessCode" => $accessCode,
        "vpc_Amount" => round($_POST['final_amt'],2)*100,
        "vpc_Command" => 'pay',
        "vpc_Locale" => 'en',
        "vpc_MerchTxnRef" =>  "REF_".time(),
        "vpc_Merchant" => $merchantId,
        "vpc_OrderInfo" => "Order_N_".time(),
        "vpc_ReturnURL" => "http://democarol.com/hmvc_hotel_booking/booking",
        "vpc_Version" => '1',
        'vpc_SecureHashType' => 'SHA256',
        //"user_bokingKey1" => $_POST['booking_key'],        
        "user_searchsession" => json_encode($arr),
        "user_hotel" => json_encode($arr2)
        //"user_salutation" => json_encode($arr1)
        );
        //print_r(json_last_error_msg());die;
        ksort($data);
        //echo "<pre>"; print_r($data); die;
        $hash = null;
        foreach ($data as $k => $v) {
            if (in_array($k, array('vpc_SecureHash', 'vpc_SecureHashType'))) {
                continue;
            }
            if ((strlen($v) > 0) && ((substr($k, 0, 4)=="vpc_") || (substr($k, 0, 5) =="user_"))) {
                $hash .= $k . "=" . $v . "&";
            }
        }
        $hash = rtrim($hash, "&");
    
        $secureHash = strtoupper(hash_hmac('SHA256', $hash, pack('H*', $secretHash)));
        $paraFinale = array_merge($data, array('vpc_SecureHash' => $secureHash));
        $actionurl = 'https://migs.mastercard.com.au/vpcpay?'.http_build_query($paraFinale);
    
        //print_r($actionurl); die;
        header("Location:".$actionurl);
	}
    
    public function cancel(){
            $data=new stdClass();
            $data->page_title = "Hotels Booking";
            $data->page_text = "Lorem epsum About us uoioppi gg";
            $data->page = "hotel_detail";
            $this->template->write_view('content','pre_booking/cancel',$data);
            $this->template->render();
    }
    
    
    public function set_validation()
	{
		$this->form_validation->set_rules('email','Email','required|trim');
		$this->form_validation->set_rules('password','Password','required');
			
		if ($this->form_validation->run())
		{

			$email=$this->input->post('email');
			$password=$this->input->post('password'); 
			$user_from="web";
			if ($this->pre_booking_model->can_log_in($email,$password, $user_from))
			{
				$udata=$this->pre_booking_model->selectingdata($this->input->post('email'),$from='web');
				$udata['is_logged_in']= 1;
				$this->session->set_userdata($udata);				
			}
			else
			{
				$this->session->set_flashdata('validate_credentials','Incorrect username/password.');				
			}
			
		}
		else
		{
            $this->session->set_flashdata('validate_credentials','Incorrect username/password.');
		}
        redirect ('pre_booking');
	}
    
	
}
?>