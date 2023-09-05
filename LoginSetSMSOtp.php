<?php 
include 'config.php';
require_once ('class.phpmailer.php');
include ("class.smtp.php");
date_default_timezone_set('Asia/Kolkata');
$date = date("d-m-Y H:i:s" );


if(isset($_POST['MobileNum']))
{
	
$get_MobileNum = mysqli_real_escape_string($conn, $_POST['MobileNum']);
$otp = substr(str_shuffle('0123456789') , 0 , 6); //For Live Update
if($get_MobileNum =="hrsain@sainmarks.com")
{ echo json_encode(2);
	return;
}
$CheckNumber = "SELECT * FROM indsys1000useradmin WHERE Contactno ='$get_MobileNum'  ";
$result_CheckNumber = $conn->query($CheckNumber);
if (mysqli_num_rows($result_CheckNumber) > 0)
{
	echo "1";

 $OtpQry = "UPDATE `indsys1000useradmin` SET `MobileOtp` = '$otp' WHERE `Contactno` = '$get_MobileNum'";
 $result_OtpQry = $conn->query($OtpQry); 


$fields = array(
"sender_id" => "TXTIND",
"variables_values" => "$otp",
"route" => "otp",
"numbers" => "$get_MobileNum",
);

$curl = curl_init();

curl_setopt_array($curl, array(
CURLOPT_URL => "https://www.fast2sms.com/dev/bulkV2",
CURLOPT_RETURNTRANSFER => true,
CURLOPT_ENCODING => "",
CURLOPT_MAXREDIRS => 10,
CURLOPT_TIMEOUT => 30,
CURLOPT_SSL_VERIFYHOST => 0,
CURLOPT_SSL_VERIFYPEER => 0,
CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
CURLOPT_CUSTOMREQUEST => "POST",
CURLOPT_POSTFIELDS => json_encode($fields),
CURLOPT_HTTPHEADER => array(
"authorization: hzXOE6K1FpnPDxjqVfLT30eroMb9yNZ7dRU8BAHYiQJCalStGk6OiSuYs8JXeIFlZc0UdkaN3AMH7wDV",
"accept: */*",
"cache-control: no-cache",
"content-type: application/json"
),
));

$response = curl_exec($curl);
//echo "$response<br/>";
$err = curl_error($curl);
//echo "ERROR-$err<br/>";
curl_close($curl);
return;


}




	


	if (preg_match('/\bsainmarks.com\b/', $get_MobileNum)) 
	
	{
		$CheckEmail = "SELECT * FROM indsys1000useradmin WHERE Emailid ='$get_MobileNum' LIMIT 1  ";
$result_CheckEmail = $conn->query($CheckEmail);
if (mysqli_num_rows($result_CheckEmail) > 0)
{
	

 $OtpQry = "UPDATE `indsys1000useradmin` SET `MobileOtp` = '$otp' WHERE `Emailid` = '$get_MobileNum'";
 $result_OtpQry = $conn->query($OtpQry); 

 $htmlMsg = "<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <title></title>
</head>
<body>
    Dear sir/madam,
    <p style='margin:13%'> Kindly use this Otp <b>'$otp'</b> For login.</p>

</body>
</html>";


$mail = new PHPMailer(false); 
$mail->IsSMTP();

$mail->Host = "smtp.gmail.com"; // SMTP server
$mail->SMTPDebug = 1; // enables SMTP debug information (for testing)
$mail->isSMTP();
$mail->SMTPAuth = true; // enable SMTP authentication
$mail->SMTPSecure = "tls"; // sets the prefix to the servier

$mail->Port = 587; // set the SMTP port for the GMAIL server
$mail->Username = "indsystesting@gmail.com"; // GMAIL username
$mail->Password = "mdpswobfoltlloza"; // GMAIL password

$mail->AddAddress($get_MobileNum);




// $mail->AddAddress('ranjith@indsys.holdings');
$mail->SetFrom('indsystesting@gmail.com', 'SAINMARKS');
$mail->Subject = 'SAINMARKS OTP '.$date ;
$mail->MsgHTML($htmlMsg);

if($mail->Send()){
	header('Content-Type: application/json');
    echo json_encode(1);
	
}else{
	header('Content-Type: application/json');
    echo json_encode(0);
}
return;

}
		
	
}
else
{
	echo "0";
}







}

	else{
		echo "0";
}



?>