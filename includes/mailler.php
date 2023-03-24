<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require '../vendor/autoload.php';


function mailling($recipient, $subject, $body){
  $emfoot = '<div style="margin-left: 50px;><p>Thank you. <br/><span style="background-color: #245639;color: white;font-size:20px">ICEⒸ</span><span style="color:#245639;font-size:20px"> Medical Card</span></p></div>';
  $mail = new PHPMailer(true);                             
      try {
          //Server settings
          $mail->isSMTP();                                     
          $mail->Host = 'smtp.zoho.com';                      
          $mail->SMTPAuth = true;                               
          $mail->Username = 'admin@chatbycity.com';     
          $mail->Password = '36987412Mm.';                    
          $mail->SMTPOptions = array(
              'ssl' => array(
              'verify_peer' => false,
              'verify_peer_name' => false,
              'allow_self_signed' => true
              )
          );                         
          $mail->SMTPSecure = 'ssl';                           
          $mail->Port = 465;                                   

          $mail->setFrom('admin@chatbycity.com', 'ICE Medical Card');
          
          //Recipients
          $mail->addAddress($recipient);              
          $mail->addReplyTo('admin@chatbycity.com', 'ICE Medical Card');
          
          //Content
          $mail->isHTML(true);                                  
          $mail->Subject = $subject;
          $mail->Body    = $body.$emfoot;

          $mail->send();

      } 
      catch (Exception $e) {
        //$_SESSION['error'] = "An error occured!";
      }		
}
?>