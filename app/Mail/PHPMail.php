<?php

namespace App\Mail;
use PHPMailer\PHPMailer\PHPMailer;
//use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class PHPMail
{
     private $token;
     private $email = null;


    /**
     * @return null
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param null $email
     */
    public function setEmail($email): void
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getToken()
    {
        return $this->token;
    }

    /**
     * @param mixed $token
     */
    public function setToken($token): void
    {
        $this->token = $token;
    }


    public  function verification(){
                 // Instantiation and passing `true` enables exceptions
                 $mail = new PHPMailer(true);

                 try {
                     //Server settings
                     $mail->SMTPDebug = 0;                      // Enable verbose debug output
                     $mail->isSMTP();                                            // Send using SMTP
                     $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
                     $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
                     $mail->Username   = 'armygamesict2@gmail.com';                     // SMTP username
                     $mail->Password   = '';                               // SMTP password
                     $mail->SMTPSecure = 'tls';         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
                    $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
                     //Recipients
                     $mail->setFrom('armygamesict2@gmail.com', 'Register Verification');
                     $mail->addAddress('armygamesict@gmail.com');               // Name is optional

                     // Content
                     $mail->isHTML(true);                                  // Set email format to HTML
                     $mail->Subject = 'Verify your account';
                    // $href = url('/')."/verification?token=".$this->token;
                     $href = url('/')."/activate/".$this->token;
                   //  $mail->Body  = 'To verify your account please fallow <a href="'.$href.'">this</a> link';
                     $mail->Body  = 'To activate your account please fallow <a href="' . $href . '">this</a> link';
                     $mail->send();
                     echo 'Message has been sent';
                 } catch (Exception $e) {
                     echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                 }
             }

}
