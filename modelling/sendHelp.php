<?php
session_start();
require 'vendor/autoload.php';
// PHPMailer classes into the global namespace
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
// Base files 
require 'vendor/phpmailer/phpmailer/src/Exception.php';
require 'vendor/phpmailer/phpmailer/src/PHPMailer.php';
require 'vendor/phpmailer/phpmailer/src/SMTP.php';

if (isset($_POST['submit'])) {

    $sender = $_POST['email'];
    $subject = $_POST['subject'];
    $msg = $_POST['message'];

    // create object of PHPMailer class with boolean parameter which sets/unsets exception.
    $mail = new PHPMailer(true);
    try {
        $mail->isSMTP(); // using SMTP protocol                                     
        $mail->Host = 'smtp.mailtrap.io'; // SMTP host as gmail 
        $mail->SMTPAuth = true;  // enable smtp authentication                             
        $mail->Username = '14996c38fec437';  // sender gmail host              
        $mail->Password = '397be102afd2b1'; // sender gmail host password                          
        $mail->SMTPSecure = 'tls';  // for encrypted connection                           
        $mail->Port = 2525;   // port for SMTP     

        $mail->setFrom($sender, "Sender"); // sender's email and name
        $mail->addAddress('ivyjoyweda@gmail.com', "Receiver");  // receiver's email and name

        $mail->Subject = $subject;
        $mail->Body    =  $msg;

        $mail->send();
    } catch (Exception $e) { // handle error.
        echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Help</title>
    <link rel="stylesheet" href="mystyle.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.3/css/fontawesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <?php include 'nav.php'; ?>

    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card mt-2 shadow">
                <div class="card-header shadow">
                    Write to Us.
                </div>
                <div class="card-body">
                    <form action="sendHelp.php" method="POST">
                        <div class="form-group">
                            <p for="email">Email</p>
                            <input type="email" name="email" class="form-control" id="email">
                        </div>
                        <div class="form-group">
                            <p for="email">Subject</p>
                            <input type="text" name="subject" class="form-control" id="subject">
                        </div>
                        <div class="mb-3">
                            <label for="message">Message:</label>
                            <textarea class="form-control" id="message" name="message"></textarea>
                        </div>
                        <button type="submit" class="btn btn-outline-success btn-sm shadow" name="submit">Send</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>