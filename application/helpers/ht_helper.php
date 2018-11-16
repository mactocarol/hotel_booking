<?php	
if (!defined('BASEPATH')) exit('No direct script access allowed');

function showStatus($Status){
		
	if($Status==0){
		$Out = "Inactive";
	}elseif($Status==1){
		$Out = "Active";	
	}elseif($Status==2){
		$Out = "Deactive";	
	}elseif($Status==3){
		$Out = "Suspended";	
	}
	
	return $Out;
		
}
/* Function for Payment Status */
function payment_status($Status){
		
	if($Status==0){
		$Out = "Failed";
	}elseif($Status==1){
		$Out = "Success";	
	}else{
		$Out = "Not Defined";	
	}
	
	return $Out;
		
}

function customer_type($type){
		
	if($type==1){
		$Out = "Private Customer";
	}elseif($type==2){
		$Out = "Business Customer";	
	}else{
		$Out = "Not Defined";	
	}
	return $Out;		
}

function recieve_offers_on_email($type){
		
	if($type==1){
		$Out = "Yes send me email regarding offers";
	}elseif($type==2){
		$Out = "Nope";	
	}else{
		$Out = "Not Defined";	
	}
	return $Out;		
}
  
  function delivery_status($status){
	if($status==0){
	$Out = "Inprogress";
	}elseif($status==1){
	$Out = "Delivered";	
	}else{
	$Out = "Failed";	
	}
	return $Out;
}

function get_country_name($country_id){
		
 	    if($country_id != 0){
		$CI =& get_instance();
		$CI->db->select('name');
		$CI->db->where(array('id'=>$country_id));
		$query = $CI->db->get('sp_countries');
		return $name = $query->row()->name;
		}
    }

 function get_VAT($shipping_charge){
		
 	    if($shipping_charge != 0){
		$total_VAT = ($shipping_charge *19)/100;
		return $total_VAT;
		}
    }


function get_country_code($country_id){
		
 	    if($country_id != 0){
		$CI =& get_instance();
		$CI->db->select('sortname');
		$CI->db->where(array('id'=>$country_id));
		$query = $CI->db->get('er_countries');
		return $name = $query->row();
		}
    }


    
  function get_state_name($state_id){
		
 	    if($state_id != 0){
		$CI =& get_instance();
		$CI->db->select('name');
		$CI->db->where(array('id'=>$state_id));
		$query = $CI->db->get('er_states');
		return $name = $query->row();
		}
    }

    function get_state_name_for_reciever($country_id){
		
 	    if($country_id != 0){
		$CI =& get_instance();
		$CI->db->select('name');
		$CI->db->where(array('country_id'=>$country_id));
		$query = $CI->db->get('sp_states');
		return $name = $query->row()->name;
		}
    }

 
	 function get_service_name($service_id){
		
 	    if($service_id != 0){
		$CI =& get_instance();
		$CI->db->select('name');
		$CI->db->where(array('id'=>$service_id));
		$query = $CI->db->get('sp_shipping_service');
		return $name = $query->row()->name;
		}
    }
   function get_city_name_from_pin($pincode,$type){

   	$new_pin = explode('-', $pincode);
   if($type = 'pin'){
   	return $new_pin[0];
   }else{
   	return $new_pin[1];
   }
	}

	function Dhlcurl($request_xml,$url){
		if (!$ch = curl_init())
		{
			throw new \Exception('could not initialize curl');
		}

		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
		curl_setopt($ch, CURLOPT_PORT , 443);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $request_xml);
		$result = curl_exec($ch);

		if (curl_error($ch))
		{
			return false;
		}
		else
		{
			curl_close($ch);
		}

		$final_xml = simplexml_load_string($result);
		return $final_xml;
	}
	function showStatus1($Status){
        
    if($Status==0){
        $Out = "N/A";
    }else{}
    
    return $Out;     
}
?>