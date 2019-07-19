<?php

########################################################
# Login information for the SMS Gateway
########################################################

$ozeki_user = "admin";
$ozeki_password = "gunani";
$ozeki_url = "http://127.0.0.1:9501/api?";

function ozekiSend($phone, $msg, $debug=false){
      global $ozeki_user,$ozeki_password,$ozeki_url;

      $url = 'username='.$ozeki_user;
      $url.= '&password='.$ozeki_password;
      $url.= '&action=sendmessage';
      $url.= '&messagetype=SMS:TEXT';
      $url.= '&recipient='.urlencode($phone);
      $url.= '&messagedata='.urlencode($msg);

      $urltouse =  $ozeki_url.$url;
      if ($debug) { echo "Request: <br>$urltouse<br><br>"; }
	  
      //Open the URL to send the message
      $response = file_get_contents($urltouse);
	  
      if ($debug) {
           echo "Response: <br><pre>".
           str_replace(array("<",">"),array("&lt;","&gt;"),$response).
           "</pre><br>"; }

      return($response);
}

########################################################
# GET data from sendsms.html
########################################################

$phonenum = $_POST['recipient'];
$message = $_POST['message'];
$debug = true;

ozekiSend($phonenum,$message,$debug);

?>
