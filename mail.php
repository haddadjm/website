<?php>

$result="";
if(isset($_POST['submit'])) {
    require 'phpmailer/PHPMailerAutoload.php';
    $mail = new PHPMailer;

    $mail->Host='smpt.gmail.com';
    $mail->Port=587;
    $mail->SMTPAuth=true;
    $mail->SMTPSecure='tls';
    $mail->Username='jordan.m.haddad@gmail.com';
    $mail->Password='Zooper2@';

    $mail->setFrom($_POST['email']);
    $mail->addAddress('jordan.m.haddad@gmail.com');
    $mail->addReplyTo($_POST['email'],$_POST['name']);

    $mail->isHTML(true);
    $mail->Subject='Form Submission: '.$_POST['subject'];
    $mail->Body='Name: '.$_POST['name'].'<br>Email: '.$_POST['email'].'<br>Message: '.$_POST['message'].;

    if(!$mail->send()) {
        $result="Something went wrong. Please try again";
    }
    else {
        $result="Thanks ".$_POST['name']." for contacting me! I'll get back to you soon.";
    }

    }

?>

