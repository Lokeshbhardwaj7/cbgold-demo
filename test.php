<?php

extract($_POST);
  $msg='';
  $msg.='Contact  Person Name :'.$name. '<br>';
  $msg.='Person Email :'.$email.'<br>';
  $msg.='Message :'.$message.'<br>';


/*if(!empty($_POST)){*/
 
        use PHPMailer\PHPMailer\PHPMailer;
        use PHPMailer\PHPMailer\Exception;

        require './PHPMailer/src/Exception.php';
        require './PHPMailer/src/PHPMailer.php';
        require './PHPMailer/src/SMTP.php'; 	

        // Instantiation and passing `true` enables exceptions
        $mail = new PHPMailer(true);

        try {
            //Server settings
            $mail->SMTPDebug = 0;                      // Enable verbose debug output
            $mail->isSMTP();  
            $mail->Host       = 'smtp.cbgoldmanufacture.in';                    // Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
        	$mail->Username   = 'sales@cbgoldmanufacture.in';                     // SMTP username
            $mail->Password   = 'YWMmqjZ7';                               // SMTP password
            $mail->SMTPSecure = 'TLS';
            $mail->Port       = 587;           
            // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
            $mail->SMTPOptions = array(
        	    'ssl' => array(
        	    'verify_peer' => false,
        	    'verify_peer_name' => false,
        	    'allow_self_signed' => true
        	    )
        	);

            //Recipients
            $mail->setFrom('sales@cbgoldmanufacture.in', 'Sender');
            $mail->addAddress('sales@cbgoldmanufacture.in', 'Receiver');     // Add a recipient
            //$mail->addAddress('ellen@example.com');               // Name is optional
           // $mail->addReplyTo('info@example.com', 'Information');
            //$mail->addCC('cc@example.com');
            //$mail->addBCC('bcc@example.com');

            // Attachments
            //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
            //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

            // Content
            $mail->Subject = 'Contact form from website';
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Body    = $msg;
            //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            if($mail->send()){
           	    // echo '<script type="text/javascript">alert("Message has been sent!!")</script>';
                  header('location:page-contact.html');

            }else{
            	echo 'false';
            }
        } catch (Exception $e) {
            echo "Message could not be sent. ";
        }

/*}*/

?>
