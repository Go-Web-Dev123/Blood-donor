<?php
session_start();
function Fstmsms($sender_id,$message,$number){
			$fields = array(
				"sender_id" => $sender_id,
				"message" => $message,
				"language" => "english",
				"route" => "p",
				"numbers" => $number,
			);
			$curl = curl_init();
			curl_setopt_array($curl, array(
			  CURLOPT_URL => "https://www.fast2sms.com/dev/bulk",
			  CURLOPT_RETURNTRANSFER => true,
			  CURLOPT_ENCODING => "",
			  CURLOPT_MAXREDIRS => 10,
			  CURLOPT_TIMEOUT => 30,
			  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			  CURLOPT_CUSTOMREQUEST => "POST",
			  CURLOPT_POSTFIELDS => json_encode($fields),
			  CURLOPT_HTTPHEADER => array(
				"authorization: TJemdf843EQZkPuYV2pN0cRHa9XhvFlwLbSUgWs5xG1AyrnKjDjfseJRtVHLZd0bvl5yogcPh7BTUkFE",
				"accept: */*",
				"cache-control: no-cache",
				"content-type: application/json"
			  ),
			));

			$response = curl_exec($curl);
			$err = curl_error($curl);

			curl_close($curl);

			if ($err) {
			  $response="cURL Error #:" . $err;
			}
				
}
if($_POST['type']==1){
	$otp=rand(100000,999999);
	$sender_id="FSTSMS";
	$message="OTP for mobile verification is :". $otp;
	$number=$_POST['phone'];
	Fstmsms($sender_id,$message,$number);
	$_SESSION['OTP']=$otp;
	echo json_encode(array("statusCode"=>200));
}
if($_POST['type']==2){
	if($_SESSION['OTP']==$_POST['otp']){
		echo json_encode(array("statusCode"=>200));
	}
}
if($_POST['type']==3){
	$sender_id="FSTSMS";
	$number=$_POST['phone'];
	$message="OTP for mobile verification is :". $_SESSION['OTP'];
	Fstmsms($sender_id,$message,$number);
	echo json_encode(array("statusCode"=>200));
}
?> 