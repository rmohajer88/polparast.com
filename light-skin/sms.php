<?php

   
$ApiKey = "267495-094c46c765564f1196b96347f6ad232f";
$Sender = "50004075011509";
$BaseUrl = "https://api.sms-webservice.com/api/V3/";




function Send($recipients , $text){
      
     
        $params = array(
            'ApiKey' =>$GLOBALS["ApiKey"] ,
            'Text' => urlencode($text),
            'Sender' => $GLOBALS['Sender'],
            'Recipients' => $recipients,
        );


        $url = $GLOBALS["BaseUrl"].'Send?' . http_build_query($params);
        $curl = curl_init();
        curl_setopt_array($curl, array(
          CURLOPT_URL => $url,
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => '',
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => 'GET',
        ));
        $response = curl_exec($curl);
        curl_close($curl);
        return $response;
} 