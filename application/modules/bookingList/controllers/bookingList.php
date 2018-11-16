<?php
class BookingList extends HT_Controller{
	public function __construct(){            
        parent::__construct();
        $this->load->model('booking_model');          
        if($this->session->userdata('logged_in') == '')
        {
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
                $data->success=0;
                $data->message=$items->message;
            }  
                $data->error=1;
        }
        redirect ('bookingList/booking_list');
    }
    function booking_list(){
    	$data=new stdClass();

        $pdata= array (
            'url'       =>  base_url()."bookingList/booking_list",
            'total_row' =>  $this->booking_model->getRows(),
            'per_page'  =>  5,
            'segment'   =>  3
        );
        $pagination= $this->custompagination($pdata);
        $place1='hb_booking.user_id';
        $place2='hb_customer.id';
        $place3='hb_booking.hotel_id';
        $place4='hb_hotels.hotel_id';
        $WhereData=array();
        $Selectdata='hb_customer.id,hb_customer.firstname,hb_customer.lastname,hb_customer.mobile,hb_customer.email, hb_booking.txn_id,hb_booking.currency_code, hb_booking.payment_amt, hb_booking.status, hb_booking.hotel_id,hb_hotels.hotel_id, hb_hotels.name';
        $TableName1='hb_booking';
        $TableName2='hb_customer';
        $TableName3='hb_hotels';
        $orderby='hb_booking.id';
        $limit=$pdata['per_page'];
        $start=$pagination;

        $data->results= $this->booking_model->hotelbookingpagination ($place1,$place2,$place3,$place4,$WhereData,$Selectdata,$TableName1,$TableName2,$TableName3,$orderby,$limit,$start);
        $str_links = $this->pagination->create_links();
        $data->pagination = explode('&nbsp;',$str_links );

        $data->title = 'Booking List';
        $data->field = 'Datatable';
        $data->page = 'list_Booking';
        $this->load->view('admin/includes/header',$data);       
        $this->load->view('booking_view',$data);
        $this->load->view('admin/includes/footer',$data);
    }
    
    function cancel_booking_list(){
    	$data=new stdClass();

        $pdata= array (
            'url'       =>  base_url()."bookingList/booking_list",
            'total_row' =>  $this->booking_model->getcancelRows(),
            'per_page'  =>  5,
            'segment'   =>  3
        );
        $pagination= $this->custompagination($pdata);
        $place1='hb_booking.user_id';
        $place2='hb_customer.id';
        $place3='hb_booking.hotel_id';
        $place4='hb_hotels.hotel_id';
        $WhereData=array("is_cancelled"=>'1');
        $Selectdata='hb_customer.id,hb_customer.firstname,hb_customer.lastname,hb_customer.mobile,hb_customer.email, hb_booking.txn_id,hb_booking.id as booking_id,hb_booking.is_refunded,hb_booking.currency_code, hb_booking.payment_amt, hb_booking.status, hb_booking.hotel_id,hb_hotels.hotel_id, hb_hotels.name';
        $TableName1='hb_booking';
        $TableName2='hb_customer';
        $TableName3='hb_hotels';
        $orderby='hb_booking.id';
        $limit=$pdata['per_page'];
        $start=$pagination;

        $data->results= $this->booking_model->hotelbookingpagination ($place1,$place2,$place3,$place4,$WhereData,$Selectdata,$TableName1,$TableName2,$TableName3,$orderby,$limit,$start);
        $str_links = $this->pagination->create_links();
        $data->pagination = explode('&nbsp;',$str_links );

        $data->title = 'Cancelled Booking List';
        $data->field = 'Datatable';
        $data->page = 'cancel_Booking';
        $this->load->view('admin/includes/header',$data);       
        $this->load->view('cancel_booking_view',$data);
        $this->load->view('admin/includes/footer',$data);
    }
    
    function refund($id){
        $data=new stdClass();
        $udata['is_refunded'] = '1';
        $this->booking_model->UpdateRecords('booking',$udata,array("id"=>$id));
        redirect('bookingList/cancel_booking_list');
    }
}


?>