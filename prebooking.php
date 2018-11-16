<?php
set_time_limit(0);

$str = "<PreBookingRequest>
                <Authentication>
                    <AgentCode>X3CAC38</AgentCode>
                    <UserName>yanjoon</UserName>
                    <Password>Dubaiyhh2020</Password>
                </Authentication>
                    <PreBooking>
                    <SearchSessionId>l4irngpifqpn77b9nb62kf9mp2</SearchSessionId>
                    <ArrivalDate>11/05/2018</ArrivalDate>
                    <DepartureDate>12/05/2018</DepartureDate>
                    <GuestNationality>IN</GuestNationality>
                    <CountryCode>AE</CountryCode>
                    <City>DUBAI</City>
                    <HotelId>104421</HotelId>
                    <Currency>AED</Currency>
                    <RoomDetails>
                        <RoomDetail>
                           
                            <Type>2 Bedroom Apartment Large-TWIN</Type>
                            <BookingKey>yzHJLMpLL8hMKyzIMzdPssxLMjPKTrPMLTDSjfCwNNU10TUyMLTQNTDRNTTWNTQwMTEy1M0GAA</BookingKey>
                            <Adults>2</Adults>
                            <Children>0</Children>
                            <ChildrenAges>0</ChildrenAges>
                            <TotalRooms>1</TotalRooms>
                            <TotalRate>11.235</TotalRate>
                           
                        </RoomDetail>
                    </RoomDetails>
                    </PreBooking>
                </PreBookingRequest>";

$str = "
<PreBookingRequest>
<Authentication>
<AgentCode>X3CAC38</AgentCode>
<UserName>yanjoon</UserName>
<Password>Dubaiyhh2020</Password>
</Authentication>
<PreBooking>
<SearchSessionId>l4irngpifqpn77b9nb62kf9mp2</SearchSessionId>
<ArrivalDate>27/04/2018</ArrivalDate>
<DepartureDate>28/04/2018</DepartureDate>
<GuestNationality>UK</GuestNationality>
<CountryCode>AE</CountryCode>
<City>Dubai</City>
<HotelId>461554</HotelId>
<Currency>AED</Currency>
<RoomDetails>
<RoomDetail>
<Type>Double room - De Luxe</Type>
<BookingKey>
yzHJLMpLL8hMKyzIMzdPssxLMjPKTrPMLTDSjfCwNNU10TUyMLTQNTDRNTTWNTQwMTEy1M0GAA
</BookingKey>
<Adults>2</Adults>
<Children>0</Children>
<ChildrenAges>0</ChildrenAges>
<TotalRooms>1</TotalRooms>
<TotalRate>135.723834436</TotalRate>
</RoomDetail>
</RoomDetails>
</PreBooking>
</PreBookingRequest>";
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
header("Content-type: text/xml");
print_r($result); die;
print_R(gzdecode($result));
//exit;
?>