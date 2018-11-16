<?php
set_time_limit(0);
            $str = "<HotelFindRequest>
                    <Authentication>
                    <AgentCode>X3CAC38</AgentCode>
                    <UserName>yanjoon</UserName>
                    <Password>Dubaiyhh2020</Password>
                    </Authentication>
                    <Booking>
                    <ArrivalDate>11/10/2018</ArrivalDate>
                    <DepartureDate>12/10/2018</DepartureDate>
                    <CountryCode>AE</CountryCode>
                    <City>Dubai</City>
                    <HotelIDs>
                    <Int>104421</Int>                    
                    </HotelIDs>
                    <GuestNationality>IN</GuestNationality>
                    <Rooms>
                    <Room>                   
                    <Type>Room-1</Type>
                    <NoOfAdults>2</NoOfAdults>
                    <NoOfChilds>0</NoOfChilds>
                    </Room>
                    </Rooms>
                    </Booking>                
                    </HotelFindRequest>";
                    
            $str = "
                    <HotelFindRequest>
                    <Authentication>
                    <AgentCode>X3CAC38</AgentCode>
                    <UserName>yanjoon</UserName>
                    <Password>Dubaiyhh2020</Password>
                    </Authentication>
                    <Booking>
                    <ArrivalDate>19/09/2018</ArrivalDate>
                    <DepartureDate>20/09/2018</DepartureDate>
                    <CountryCode>AE</CountryCode>
                    <City>Dubai</City>
                    <GuestNationality>DK</GuestNationality>
                    <HotelRatings>
                    <HotelRating>1</HotelRating>
                    <HotelRating>2</HotelRating>
                    <HotelRating>3</HotelRating>
                    <HotelRating>4</HotelRating>
                    <HotelRating>5</HotelRating>
                    </HotelRatings>
                    <Rooms>
                    <Room>
                    <Type>Single Rooms</Type>
                    <NoOfAdults>1</NoOfAdults>
                    <NoOfChilds>0</NoOfChilds>
                    </Room>
                    </Rooms>
                    </Booking>
                    </HotelFindRequest>
                    ";
            
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
header("Content-type: text/xml");
print_r($result);
//print_R(gzdecode($result));
//exit;
?>