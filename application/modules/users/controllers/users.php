<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Users extends HT_Controller{
	function __construct() { 
         parent::__construct();
         $this->load->library('session'); 
         $this->load->model('user_model');
         $this->load->library('pagination');  
         if($this->session->userdata('logged_in') == ''){
                redirect('admin/index');
            }
         
      } 
      function index(){
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
        redirect ('users/list_users');
      }
      function add(){
        $data=new stdClass();
        $data->title = 'Add User';
        $data->field = 'Datatable';
        $data->page = 'add_user';
        $this->load->view('admin/includes/header',$data);       
        $this->load->view('add_user_view',$data);
        $this->load->view('admin/includes/footer',$data);
      }
      function list_users(){
        $data=new stdClass();
        $pdata= array (
            'url'       =>  base_url()."users/list_users",
            'total_row' =>  $this->user_model->getRows(),
            'per_page'  =>  5,
            'segment'   =>  3
        );

      	$pagination= $this->custompagination($pdata);
        $TableName    = 'hb_customer'; 
        $Selectdata   =  'id, firstname, lastname, mobile, email, address,city,country';
        $WhereData    =  array();
        $orderby      =  'id ASC';
        $limit        =  $pdata['per_page'];
        $start        =  $pagination;
        
        $data->results= $this->user_model->SelectRecordpaginatoin($TableName,$Selectdata,$WhereData,$orderby,$limit,$start);
        $str_links = $this->pagination->create_links();
        $data->pagination = explode('&nbsp;',$str_links );
        $data->title = 'User List';
        $data->field = 'Datatable';
        $data->page = 'list_users';
        $this->load->view('admin/includes/header',$data);       
        $this->load->view('list_user_view',$data);
        $this->load->view('admin/includes/footer',$data);

      }

      function add_user(){
        
        if(!empty($_POST))
        {
        $this->form_validation->set_rules ('firstname', 'First Name', 'trim|required');
        $this->form_validation->set_rules ('lastname', 'Last Name', 'trim|required');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[hb_customer.email]');
        $this->form_validation->set_rules ('mobile', 'Mobile', 'trim|required|numeric|max_length[10]');
        $this->form_validation->set_rules ('address', 'Address', 'required');
        $this->form_validation->set_rules ('city', 'City', 'trim|required');
        $this->form_validation->set_rules ('country', 'country', 'trim|required');
          if ($this->form_validation->run()){
            $data=$_POST;
            $string="adfgFDGseFHDFobsHDFdls;133253DFGS4643DGFDGSDS2343665trty,'/::';kk/k;fgserge";
            echo $password=str_shuffle(substr($string,1,6));
            $data['recever_from']='web';
            $data['status']=1;
            $data['password']=md5($password);

            unset($data['Add']);

              if ($this->user_model->add_user($data))
              {
                //sending defalt password to user by mail
                  $MailData['FromEmail']='infoash.atc@gmail.com';
                  $MailData['FromName']='Admin';
                  $MailData['To']= $this->input->post('email');
                  $MailData['Subject']= 'Confirm your account';
                  $message="<p>Admin adding you on Hotel Booking!</p>";
                  $message .="<p> Your account user name: ".$this->input->post('email')."<br> password: ".$password." </p>";
                  $MailData['Message']=$message;


                if ($this->MailFunction($MailData))
                {
                  $this->sesssion->set_flashdata('sucess','User Add sucessfully!');
                  redirect('users/list_users');
                }
                else{
                  $this->sesssion->set_flashdata('error','User Add sucessfully!');
                  redirect('users/add');
                }
              }
              else
              {
                $this->session->set_flashdata('error_add','Error for adding user!');
                redirect('users/add');
              }

          }
          else
          {
            redirect('users/add');
          }
        }
        else
        {
          redirect('users/add');
        } 
        
      }
      function user_action(){
        $id=$this->uri->segment(3);
        $Selectuser=array(
              'fields'    =>    'id,firstname,lastname,email,mobile,address,city,country',
              'where'     =>    array('id'=>$id),
              'table'     =>    'hb_customer'

        );
        $results=$this->user_model->Selectuserdata($Selectuser);
        
        $data=new stdClass();
        $data->title = 'Inser/Update';
        $data->field = 'Datatable';
        $data->page = 'User Action';
        $data->results=$results;

       
        $this->load->view('admin/includes/header',$data);       
        $this->load->view('edit_user_view',$data);
        $this->load->view('admin/includes/footer',$data); 
       
      }
      function action(){
        if (isset($_POST['update']))
        {
          unset($_POST['update']);
          if ($this->user_model->update($_POST))
          {
            $this->session->set_flashdata('sucess','User update sucessfully!');
            redirect('users/list_users');
          }
        }
        else if (isset($_POST['delete']))
        {
          unset($_POST['delete']);
          if ($this->user_model->delete($_POST))
          {
            $this->session->set_flashdata('sucess','User delete sucessfully!');
            redirect('users/list_users');
          }
        }
        else
        {
          redirect('users');
        }
      }
      
}


?>
