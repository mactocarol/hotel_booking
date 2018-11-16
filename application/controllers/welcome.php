<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
        echo "hello"; die;
		$this->load->view('welcome_message');
	}
    
    public function get_hotel_by_ids(){
                
        set_time_limit(0);
        
        $str = "<HotelFindRequest>
                <Authentication>
                <AgentCode>X3CAC38</AgentCode>
                <UserName>yanjoon</UserName>
                <Password>Dubaiyhh2020</Password>
                </Authentication>
                <Booking>
                    <ArrivalDate>25/05/2018</ArrivalDate>
                    <DepartureDate>28/05/2018</DepartureDate>
                    <CountryCode>AE</CountryCode>
                    <City>GAE9</City>
                    <HotelIds>                        
                        <Int>214357</Int>                  
                    </HotelIds>
                    <GuestNationality>AE</GuestNationality>
                    <Rooms>
                        <Room>
                        <Type>Room-1</Type>
                        <NoOfAdults>1</NoOfAdults>
                        <NoOfChilds>2</NoOfChilds>
                        <ChildrenAges>
                            <ChildAge>4</ChildAge>
                            <ChildAge>10</ChildAge>
                        </ChildrenAges>
                        </Room>
                    </Rooms>
                </Booking>
                </HotelFindRequest>";
                
        $url = "http://test.xmlhub.com/testpanel.php/action/findhotelbyid";
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
        print_r($result); die;
        if ($result === false) {
        echo 'Curl error: ' . curl_error($ch);
        }
        //close connection
        curl_close($ch);
        
        $xmlString = $result;
        $xml = new SimpleXMLElement($xmlString);
        echo "<pre>"; print_r($xml); die;    
    }
    
    
    public function get_hotel_detail($id=''){
                
        set_time_limit(0);

        $str = "<HotelDetailsRequest>
                    <Authentication>
                        <AgentCode>X3CAC38</AgentCode>
                        <UserName>yanjoon</UserName>
                        <Password>Dubaiyhh2020</Password>
                    </Authentication>
                    <Hotels>
                        <HotelId>214357</HotelId>
                    </Hotels>                
                </HotelDetailsRequest>";
                
        $url = "http://test.xmlhub.com/testpanel.php/action/gethoteldetails";
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
        echo "<pre>"; print_r($xml); die;    
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */