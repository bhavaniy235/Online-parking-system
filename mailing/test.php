<?php
include('smtp/PHPMailerAutoload.php');
//to_mail your mail
session_start();
if (isset($_SESSION['user_email']) && isset($_SESSION['user_name'])) {
    $userEmail = $_SESSION['user_email'];
} else {
    // If the user is not logged in, handle it accordingly (e.g., redirect to the login page)
    echo "something went wrong";
    exit();
}
function sendEmail($to,$subject, $msg){
	$mail = new PHPMailer(); 
	$mail->IsSMTP(); 
	$mail->SMTPAuth = true; 
	$mail->SMTPSecure = 'tls'; 
	$mail->Host = "smtp.gmail.com";
	$mail->Port = 587; 
	$mail->IsHTML(true);
	$mail->CharSet = 'UTF-8';
	//$mail->SMTPDebug = 2; 
	$mail->Username = "spotsmartweb@gmail.com";
	$mail->Password = "dind fqfu wiwj erpa";
	$mail->SetFrom("spotsmartweb@gmail.com");
	$mail->Subject = $subject;
	$mail->Body =$msg;
	$mail->AddAddress($to);
	$mail->SMTPOptions=array('ssl'=>array(
		'verify_peer'=>false,
		'verify_peer_name'=>false,
		'allow_self_signed'=>false
	));
	if(!$mail->Send()){
		echo $mail->ErrorInfo;
	}else{
		return 'Sent';
	}
}
?>
