<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	class MyAccounts extends HT_Controller
	{
		
		function __construct()
		{
			parent::__construct();
			$this->load->model('myaccounts_model');
		}
		public function index(){
			if ($this->session->userdata('is_logged_in')){
				
				$data= new stdClass();
				$data->page_title = "MyProfile";
        		$data->page_text = "User Profile!";
        		$data->page = "profile";
				$data->userinfo=$this->myaccounts_model->selecdata($this->session->userdata('id'));
        		$this->template->write_view('content','myaccounts/profile_view',$data);
        		$this->template->render();	
			}
			else
			{
				redirect('home');
			}
			
		}
		public function change_profile(){
			$this->form_validation->set_rules ('first_name', 'First Name', 'trim');
			$this->form_validation->set_rules ('last_name', 'Last Name', 'trim');
			$this->form_validation->set_rules ('mobile', 'Mobile', 'trim|numeric|max_length[10]');
			$this->form_validation->set_rules ('address', 'Address', 'trim');
			$this->form_validation->set_rules ('city', 'City', 'trim');
			$this->form_validation->set_rules ('country', 'Country', 'trim');
			$this->form_validation->set_rules ('gender', 'Gender');
			$this->form_validation->set_message('address','Address is not empty.');
			if($this->form_validation->run()){
				$data=array(
					'firstname'=>$this->input->post('first_name'),
					'lastname'=>$this->input->post('last_name'),
					'mobile'=>$this->input->post('mobile'),
					'address'=>$this->input->post('address'),
					'city'=>$this->input->post('city'),
					'country'=>$this->input->post('country'),
					'gender'=>$this->input->post('gender'),
				);
				if ($this->myaccounts_model->change_profile($data))
				{
					$this->session->set_flashdata('sucess', 'Profile Update Sucessfully.');
					redirect('myaccounts');
				}
				
			}
			else
			{
				$this->session->set_flashdata('error', validation_errors());
				redirect ('myaccounts');
			}
		}
		public function change_password(){
			if ($this->session->userdata('is_logged_in')){
				$data= new stdClass();
				$data->page_title = "change password";
	    		$data->page_text = "Change Password!";
	    		$data->page = "change_password";
				$data->userinfo=$this->myaccounts_model->selecdata($this->session->userdata('id'));
	    		$this->template->write_view('content','myaccounts/change_password',$data);
	    		$this->template->render();
			}
			else
			{
				redirect('home');
			}
				
		}
		public function change_password_validation(){
			$this->form_validation->set_rules ('oldpassword', 'Old_Password','trim|required|min_length[6]');
			$this->form_validation->set_rules ('newpassword', 'New_Password','trim|required|min_length[6]');
			$this->form_validation->set_rules ('newcpassword', 'New_Con_Password','trim|required|min_length[6]|matches[newpassword]');
			if ($this->form_validation->run()){
				if ($this->input->post('oldpassword')==$this->input->post('newpassword'))
				{
					$this->session->set_flashdata('same_password','Your old and new passowrd are same plesae enter different password!');
					redirect('myaccounts/change_password');
				}
				else
				{
					if ($this->myaccounts_model->check_password()==true)
					{
						if ($this->myaccounts_model->change_password())
						{
							$this->session->set_flashdata('password_sucess','Your password Change Sucessfully!');
							redirect('myaccounts');
						}
					}
					else
					{
						$this->session->set_flashdata('password_error','Your old password is wrong!');
						redirect('myaccounts/change_password');
					}
				}	
			}
			else
			{
				//$this->session->set_flashdata('validation_errors',validation_errors());
				redirect('myaccounts/change_password');
			}
		}
		public function upload_pic(){
			$config=[	'upload_path'	=>'./upload',
					'allowed_types'	=>'jpg|gif|png|jpeg'
				];
			$this->load->library ('upload',$config);
			
			if ($this->upload->do_upload('profilepic'))
			{
				$userpic=$this->myaccounts_model->selecdata($this->session->userdata('id'));
				$filename=explode("/", $userpic['profile_pic']);
				//print_r($filename); die;
				$path='./'.$filename[4].'/'.$filename[5];
				unlink($path);
				$data=$this->upload->data();
				//print_r($data); die;
				$image_path=base_url ('upload/'.$data['raw_name'].$data['file_ext']);
				//echo $image_path; die;
				$this->myaccounts_model->profile_pic($image_path);
				redirect('myaccounts');
				
			}
			else
			{
                //print_r($this->upload->display_errors());die;
				$this->session->set_flashdata('image', 'Only jpeg/png/gif/jpg allowed.');
				redirect('myaccounts');	
			}

		}
		public function booking_history(){
			if ($this->session->userdata('is_logged_in')){
				$data= new stdClass();
                $WhereData=array('user_id'=>$this->session->userdata('id'),"is_cancelled"=>0);
				$pdata= array (
				'url'       =>  base_url()."myaccounts/booking_history",
				'total_row' =>  $this->myaccounts_model->countrecords('booking',$WhereData),
				'per_page'  =>  5,
				'segment'   =>  3
				);
				$pagination= $this->custompagination($pdata);
				$place1='hb_booking.user_id';
				$place2='hb_customer.id';
				$place3='hb_booking.hotel_id';
				$place4='hb_hotels.hotel_id';
				$WhereData=array('hb_customer.id'=>$this->session->userdata('id'),"is_cancelled"=>0);
				$Selectdata='hb_customer.id,hb_customer.firstname,hb_customer.lastname,hb_customer.mobile,hb_customer.email, hb_booking.txn_id,hb_booking.id as booking_id,hb_booking.currency_code, hb_booking.payment_amt, hb_booking.status, hb_booking.created_at, hb_booking.hotel_id,hb_hotels.hotel_id, hb_hotels.name';
				$TableName1='hb_booking';
				$TableName2='hb_customer';
				$TableName3='hb_hotels';
				$orderby='hb_booking.id';
				$limit=$pdata['per_page'];
				$start=$pagination;

				$data->results= $this->myaccounts_model->hotelbookingpagination ($place1,$place2,$place3,$place4,$WhereData,$Selectdata,$TableName1,$TableName2,$TableName3,$orderby,$limit,$start);
                //echo $this->db->last_query(); die;
                //echo "<pre>"; print_r($data->results); die;
				$str_links = $this->pagination->create_links();
				$data->pagination = explode('&nbsp;',$str_links );

				$data->page_title = "Booking";
	    		$data->page_text = "Booking!";
	    		$data->page = "Booking_History";
				$data->userinfo=$this->myaccounts_model->selecdata($this->session->userdata('id'));


	    		$this->template->write_view('content','myaccounts/booking_history_view',$data);
	    		$this->template->render();
			}
			else
			{
				redirect('home');
			}
		}
        
        public function booking_detail($id){
            $data = new stdClass();
            set_time_limit(0);
            $booking_detail = $this->myaccounts_model->SelectSingleRecord('booking',array('*'),array("id"=>$id),$orderby = NULL);
            
            $str = "<GetBookingRequest>
            <Authentication>
                <AgentCode>X3CAC38</AgentCode>
                <UserName>yanjoon</UserName>
                <Password>Dubaiyhh2020</Password>
            </Authentication>
            <BookingId>".$booking_detail->booking_id."</BookingId>
            <BookingCode>".$booking_detail->booking_code."</BookingCode>
            </GetBookingRequest>";
            
            //print_r($str); die;
            //file_put_contents("xml/resquest".time().".xml", $str);
            $url = "http://test.xmlhub.com/testpanel.php/action/getbookingdetails";
            $ch = curl_init();
            //set the url, number of POST vars, POST data
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, "XML=" . urlencode($str));
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            //curl_setopt($ch, CURLOPT_HTTPHEADER, array('Accept-Encoding: gzip, deflate'));
            //execute post
            //header("Content-type: text/xml");
            $result = curl_exec($ch);
            //print_r($result); die;
            if ($result === false) {
            echo 'Curl error: ' . curl_error($ch);
            }
            //close connection
            curl_close($ch);
            
            $xmlString = $result;
            
            $xml = new SimpleXMLElement($xmlString);
            $data->booking_id = $id;
            $data->booking = $xml->Booking;
            $data->hotelinfo = $data->booking->HotelInfo;
            $data->RateInfo = $data->booking->RateInfo;
            $data->RoomInfo = $data->booking->RoomInfo;
            $data->guestinfo = $data->RoomInfo->GuestInfos;
            $data->cancellationinfo = $data->hotelinfo->CancellationPolicy;
            //echo "<pre>"; print_r($xml->Booking);   die;         
            $data->page_title = "Booking Detail";
            $data->page_text = "Booking!";
            $data->page = "Booking Detail";
            $data->userinfo=$this->myaccounts_model->selecdata($this->session->userdata('id'));


	    		$this->template->write_view('content','myaccounts/booking_detail_view',$data);
	    		$this->template->render();
            
        }
        
        public function cancel_order($id){
            $data = new stdClass();
            set_time_limit(0);
            $booking_detail = $this->myaccounts_model->SelectSingleRecord('booking',array('*'),array("id"=>$id),$orderby = NULL);
            
            $str = "<CancellationRequest>
            <Authentication>
                <AgentCode>X3CAC38</AgentCode>
                <UserName>yanjoon</UserName>
                <Password>Dubaiyhh2020</Password>
            </Authentication>
            <Cancellation>
                <BookingId>".$booking_detail->booking_id."</BookingId>
                <BookingCode>".$booking_detail->booking_code."</BookingCode>
            </Cancellation>
            </CancellationRequest>";
            
            //print_r($str); die;
            //file_put_contents("xml/resquest".time().".xml", $str);
            $url = "http://test.xmlhub.com/testpanel.php/action/cancelhotel";
            $ch = curl_init();
            //set the url, number of POST vars, POST data
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, "XML=" . urlencode($str));
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            //curl_setopt($ch, CURLOPT_HTTPHEADER, array('Accept-Encoding: gzip, deflate'));
            //execute post
            //header("Content-type: text/xml");
            $result = curl_exec($ch);
            //print_r($result); die;
            if ($result === false) {
            echo 'Curl error: ' . curl_error($ch);
            }
            //close connection
            curl_close($ch);
            
            $xmlString = $result;
            
            $xml = new SimpleXMLElement($xmlString);
            $data->booking_id = $id;            
            //echo "<pre>"; print_r($xml);   die;
            if($xml->status == 'true'){
                $booking_detail = $this->myaccounts_model->UpdateRecord('booking',array("is_cancelled" => 1),array("id"=>$id));
                $data->status = $xml->status;
                $data->CancellationCharges = $xml->CancellationCharges;
                $data->Currency = $xml->Currency;
            }else{
                $data->status = $xml->status;
                $data->Error = $xml->Error;
            }
            $data->booking_id = $id;            
            $data->page_title = "Booking Detail";
            $data->page_text = "Booking!";
            $data->page = "Booking Detail";
            $data->userinfo=$this->myaccounts_model->selecdata($this->session->userdata('id'));

            redirect('myaccounts/booking_history');
	    		//$this->template->write_view('content','myaccounts/cancel_order_view',$data);
	    		//$this->template->render();
            
        }
	}

?>