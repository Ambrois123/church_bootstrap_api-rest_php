<?php 

// $username = $_POST['username'];
// $email = $_POST['email'];
// $message = $_POST['message'];

// require "vendor/autoload.php";

// use PHPMailer\PHPMailer\PHPMailer;
// use PHPMailer\PHPMailer\Exception;

// // require 'path/to/PHPMailer/src/Exception.php';
// // require 'path/to/PHPMailer/src/PHPMailer.php';
// // require 'path/to/PHPMailer/src/SMTP.php';

// $mail = new PHPMailer(true);

// $mail->SMTPDebug = SMTP::DEBUG_SERVER;

// $mail->isSMTP(); 
// $mail->SMTPAuth = true;

// $mail->host= "smtp.gmail.com";
// $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
// $mail->Port = 587;
// $mail->Username = "aegtoulouse@gmail.com";
// $mail->Password = "Adanledj1";
// $mail->setFrom($email, $username);
// $mail->addAddress("aegtoulouse@gmail.com");
// $mail->Body = $message;
// $mail->send();



    require_once './config/Database.php';
    
      if(!empty($_POST['username']) && !empty($_POST['email']) && !empty($_POST['message'])){
        $to = "admin@aegtoulouse.fr";
        $subject = "Message de ".$_POST['username'];
        $headers = "From: ".$_POST['email']. "\r\n" . 
        'X-mailer: PHP' . phpversion();
        mail($to, $subject, $_POST['message'], $headers);

        echo  '
        <div class="alert alert-success" role="alert">
          Votre message a été bien envoyé. Que Dieu vous bénisse!
        </div>';

        header("Location: ".URL."emailSent");

      }else{
        if(isset($_POST['username']) || isset($_POST['email']) || isset($_POST['message'])){
          echo  '
          <div class="alert alert-danger" role="alert">
            Votre message n\'a pas été envoyé. Vérifiez les informations saisies.
          </div>';

          header("Location: ".URL."emailNotSent");

        }
      }
    ?>