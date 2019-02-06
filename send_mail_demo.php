<?php
    if(isset($_POST['send']))
	{
	
// Details from the user.	
	
	$mailto = $_POST['rmail']; // Receivers mail id 
	$mailName = $_POST['name'];
    $mailId = $_POST['email'];
    $mailNum = $_POST['phone'];
	$mailMsg = $_POST['message'];
	
    
   require 'PHPMailer-master/PHPMailerAutoload.php'; //php mailer class
   $mail = new PHPMailer();
   $mail ->IsSmtp();
   $mail ->SMTPDebug = 0;
   $mail ->SMTPAuth = true;
   $mail ->SMTPSecure = 'ssl'; // secure layer.
   $mail ->Host = "smtp.gmail.com";
   $mail ->Port = 465; // or 587
   $mail ->IsHTML(true);
   $mail ->Username = "xyz@gmail.com"; // account from which mail is to be send.
   $mail ->Password = "pass";
   $mail ->SetFrom("xyz@gmail.com");
   $mail->addAddress('xyz@gmail.com', 'XYZ'); // for bcc
   $mail->addReplyTo($mailId, 'Information'); // mail id in which user will reply if he has any query.
   
   $mail ->Subject = "Inquiry on Website";
   $mail ->Body = "Inquiry request from : ".$mailId."<br/>"."Name : ".$mailName."<br/>"."User Message : ".$mailMsg."<br/>"."<br/>"."Contact Number : ".$mailNum."<br/>"."Reply to : ".$mailId;
   
   
   $mail ->AddAddress($mailto);

   if(!$mail->Send())
   {
       echo "Mail Not Sent";
   }
   else
   {
       echo "Mail Sent";
   }
   
	}



?>

   

