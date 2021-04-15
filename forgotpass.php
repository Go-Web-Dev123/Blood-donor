<?php
if(isset($_POST['verify'])){
	// Authorisation details.
	$username = "20mx207@psgtech.ac.in";
	$hash = "d5867ecc4649ca0fb2ed20be024bcf00cf47b61618d5feeee03063d570a667eb";

	// Config variables. Consult http://api.textlocal.in/docs for more info.
	$test = "0";
    $phone=$_POST['phone'];

	// Data for text message. This is the text message data.
	$sender = "hariharan"; // This is who the message appears to be from.
	$numbers = $phone; // A single number or a comma-seperated list of numbers
    $otp=mt_rand(100000,999999);
	$message = "Hey .$phone.  your otp is .$otp.";
	// 612 chars or less
	// A single number or a comma-seperated list of numbers
	$message = urlencode($message);
	$data = "username=".$username."&hash=".$hash."&message=".$message."&sender=".$sender."&numbers=".$numbers."&test=".$test;
	$ch = curl_init('http://api.textlocal.in/send/?');
	curl_setopt($ch, CURLOPT_POST, true);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$result = curl_exec($ch); // This is the result from the API
    echo 'otp sucessfull';
	curl_close($ch);
}
?>