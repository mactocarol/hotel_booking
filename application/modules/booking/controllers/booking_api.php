<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Booking extends HT_Controller 
{
	//private $connection;
	function __construct(){
        parent::__construct();
        $this->load->model('booking_model');
        $this->load->library('paypal_lib');
        $this->load->library('cart');
	}
    
    public function index($hotelid=""){
        //print_r($this->session->userdata('search'));        
        $this->session->set_userdata('prebooking','0');
        $user_search = json_decode($_GET['user_searchsession']);
        $user_hotel = json_decode($_GET['user_hotel']);
        //$user_salutation = json_decode($_GET['user_salutation']);
        //echo "<pre>";print_r($_GET['user_searchsession']); die;
        
        $data=new stdClass();
        $data->user_search = $_GET['user_searchsession'];
        $data->user_hotel = $_GET['user_hotel'];
        $Adults = explode('|',$user_hotel->Adults);
        $Children = explode('|',$user_hotel->Children);
        //print_r($Children);die;
        $k=0;$guests = '';$count = 0;
        foreach($Adults as $a){
            $guests .= '<Guests>';
            
                for($j=0; $j< ($a + $Children[$k]); $j++){                    
                    $salutation = json_decode($this->session->userdata('user_salutation'));
                    $fname = json_decode($this->session->userdata('fname'));
                    //print_r($fname);
                    $lname = json_decode($this->session->userdata('lname'));
                    $t = '';
                    if(json_decode($this->session->userdata('is_child'))[$count] == 'Yes'){
                            $t .= "<IsChild>1</IsChild>
                                    <Age>".json_decode($this->session->userdata('child_age'))[$count]."</Age>";
                        }
                    $guests .=  '<Guest>
                                <Salutation>'.$salutation[$count].'</Salutation>
                                <FirstName>'.$fname[$count].'</FirstName>                        
                                <LastName>'.$lname[$count].'</LastName>
                                '.$t.'
                                </Guest>';
                    $count++;
                }
            $guests .= '</Guests>';
        $k++;
        }
        
        //die;
        //$guests = '';
        //for($j=0; $j< ($user_hotel->Children+$user_hotel->Adults); $j++){
        //    $salutation = json_decode($user_salutation->salutation);
        //    $fname = json_decode($user_salutation->fname);
        //    $lname = json_decode($user_salutation->lname);
        //    $t = '';
        //    if(json_decode($user_salutation->is_child)[$j] == 'Yes'){
        //            $t .= "<IsChild>1</IsChild>
        //                    <Age>".json_decode($user_salutation->child_age)[$j]."</Age>";
        //        }
        //    $guests .=  '<Guest>
        //                <Salutation>'.$salutation[$j].'</Salutation>
        //                <FirstName>'.$fname[$j].'</FirstName>                        
        //                <LastName>'.$lname[$j].'</LastName>
        //                '.$t.'
        //                </Guest>';
        //}
        //$s = '';
        //if($user_hotel->Children){            
        //    foreach(explode('|',$user_hotel->ChildrenAges) as $row){
        //        if($row){
        //            $age_arr[] = $row;
        //        }
        //    }            
        //    $s .= "<ChildrenAges>".implode('|',$age_arr)."</ChildrenAges>";                          
        //}else{
        //    $s .= "<ChildrenAges>0</ChildrenAges>";
        //}
        for($m=0;$m<$user_hotel->TotalRooms;$m++){
            $roomtype[] = $user_hotel->room_type;
        }
        $str = '<BookingRequest>
                        <Authentication>
                            <AgentCode>X3CAC38</AgentCode>
                            <UserName>yanjoon</UserName>
                            <Password>Dubaiyhh2020</Password>
                        </Authentication>
                        <Booking>
                            <SearchSessionId>'.$user_search->SearchSessionId.'</SearchSessionId>
                            <AgentRefNo>123456</AgentRefNo>
                            <ArrivalDate>'.$user_search->ArrivalDate.'</ArrivalDate>
                            <DepartureDate>'.$user_search->DepartureDate.'</DepartureDate>
                            <GuestNationality>'.$user_search->GuestNationality.'</GuestNationality>
                            <CountryCode>'.$user_search->CountryCode.'</CountryCode>
                            <City>'.$user_search->City.'</City>
                            <HotelId>'.$user_hotel->item_number.'</HotelId>
                            <Name>'.$user_hotel->hotel_name.'</Name>
                            <Currency>'.$user_search->Currency.'</Currency>
                        <RoomDetails>
                            <RoomDetail>
                                <Type>'.implode('|',$roomtype).'</Type>
                                <BookingKey>'.$this->session->userdata('booking_key').'</BookingKey>
                                <Adults>'.$user_hotel->Adults.'</Adults>
                                <Children>'.$user_hotel->Children.'</Children>
                                <ChildrenAges>'.$user_hotel->ChildrenAges.'</ChildrenAges>
                                <TotalRooms>'.$user_hotel->TotalRooms.'</TotalRooms>
                                <TotalRate>'.$user_hotel->total_amt.'</TotalRate>                                    
                                        '.$guests.'                                                                            
                            </RoomDetail>
                        </RoomDetails>
                        </Booking>
                        </BookingRequest>';
        header("Content-type: text/xml");                      
        //print_r($str); die;               
        $url = "http://test.xmlhub.com/testpanel.php/action/bookhotel";
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
        //header('content-type:text/xml');
        print_r($result); die;
        if ($result === false) {
        echo 'Curl error: ' . curl_error($ch);
        }
        //close connection
        curl_close($ch);
                    
        if($_POST){
            //print_r($_POST['hotel_id']); die;
            $val = new SimpleXMLElement($result);
            //$hotel_detail = $this->pre_booking_model->SelectSingleRecord('hotels',array('*'),array("status"=>1,"hotel_id"=>$_POST['hotel_id']),$orderby = NULL);                
            //$val->name = $hotel_detail->name;
            //echo "<pre>"; print_r($val); die; 
            
            $data->booking_detail = $val;
            $data->page_title = "Hotel Booking - ".$val->name;
            $data->page_text = "Lorem epsum About us uoioppi gg";
            $data->page = "hotel_detail";
            //get the transaction data
            $paypalInfo = $this->input->get();            
            $data['item_number'] = $paypalInfo['item_number']; 
            $data['txn_id'] = $paypalInfo["tx"];
            $data['payment_amt'] = $paypalInfo["amt"];
            $data['currency_code'] = $paypalInfo["cc"];
            $data['status'] = $paypalInfo["st"];
            
            $this->template->write_view('content','booking/booking_view',$data);
            $this->template->render();
            
        }else{
            $val = new SimpleXMLElement($result);
            //$hotel_detail = $this->pre_booking_model->SelectSingleRecord('hotels',array('*'),array("status"=>1,"hotel_id"=>$_POST['hotel_id']),$orderby = NULL);                
            //echo "<pre>"; print_r((string)$val->BookingDetails->BookingStatus); die;
            $data->booking_detail = $val;
            
            $data->page_title = "Hotel Booking - ".$val->name;
            $data->page_text = "Lorem epsum About us uoioppi gg";
            $data->page = "hotel_detail";
                    
            //print_r($paypalInfo); die;
            $data->item_number = $user_hotel->item_number; 
            $data->txn_id = $_GET['vpc_OrderInfo'];
            $data->payment_amt = $user_hotel->total_amt;
            $data->currency_code = $user_search->Currency;
            $data->Address = $user_search->Address;
            $data->status = (string)$val->BookingDetails->BookingStatus;
            if($data->status != 'Fail'){
                $data->booking_id = (string)$val->BookingDetails->BookingId;
                $data->booking_code = (string)$val->BookingDetails->BookingCode;
                $data->BookingStatus = (string)$val->BookingDetails->BookingStatus;
            }else{
                $data->booking_id = '';
                $data->booking_code = '';
                $data->BookingStatus = (string)$val->BookingDetails->BookingStatus;
            }
            
            
            $udata['hotel_id'] = $data->item_number;
            $udata['user_id'] = $this->session->userdata('id');
            $udata['txn_id'] = $data->txn_id;
            $udata['payment_amt'] = $data->payment_amt;
            $udata['currency_code'] = $data->currency_code;
            $udata['status'] = $data->status;
            $udata['booking_id'] = $data->booking_id;
            $udata['booking_code'] = $data->booking_code;
            
            $is_orderid = $this->booking_model->SelectSingleRecord('booking',array('*'),array("txn_id"=>$data->txn_id),$orderby = NULL);
            //print_r($is_orderid); die;
            if(!$is_orderid){
                $this->booking_model->InsertRecord('booking',$udata);    
            }            
            $this->cart->destroy();
            $this->template->write_view('content','booking/booking_view',$data);
            $this->template->render();
        }
                        
                               
        
    }
    
    public function print_invoice($hotelid=""){
        //print_r($this->session->userdata('search'));        
        
        $user_search = json_decode($_POST['user_search']);
        $user_hotel = json_decode($_POST['user_hotel']);
        //$user_salutation = json_decode($_GET['user_salutation']);
        //echo "<pre>"; print_r(json_decode($_POST['detail'])); die;
        
        $data=new stdClass();
        $Adults = explode('|',$user_hotel->Adults);
        $Children = explode('|',$user_hotel->Children);
        //print_r($Children);die;
        
            $val = json_decode($_POST['detail']);
            
            $data->booking_detail = $val;
            
                    
            //print_r($paypalInfo); die;
            $data->item_number = $user_hotel->item_number; 
            $data->txn_id = $_POST['vpc_OrderInfo'];
            $data->payment_amt = $user_hotel->total_amt;
            $data->currency_code = $user_search->Currency;
            $data->Address = $user_search->Address;
            $data->status = (string)$val->BookingDetails->BookingStatus;
            if($data->status != 'Fail'){
                $data->booking_id = (string)$val->BookingDetails->BookingId;
                $data->booking_code = (string)$val->BookingDetails->BookingCode;
                $data->BookingStatus = (string)$val->BookingDetails->BookingStatus;
            }else{
                $data->booking_id = '';
                $data->booking_code = '';
                $data->BookingStatus = (string)$val->BookingDetails->BookingStatus;
            }
            
            //echo "<pre>"; print_r($data); die;
            $this->load->view('booking/print_invoice',$data);
            //$this->template->write_view('content','booking/print_invoice',$data);
            //$this->template->render();        
    }
        
        
}
?>