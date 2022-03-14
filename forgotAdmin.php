<?php
use PHPMailer\PHPMailer\PHPMailer;
?>
<html>
    <head>
        <title>Recovery Email</title>
        <link rel='stylesheet' href="assets/css/animate.css">

        <link rel="apple-touch-icon" sizes="180x180" href="assets/images/mail/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="assets/images/mail/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="assets/images/mail/favicon-16x16.png">
<link rel="manifest" href="assets/images/mail/site.webmanifest">

        <link rel="stylesheet" type="text/css" href="assets/vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="assets/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="assets/fonts/iconic/css/material-design-iconic-font.min.css">
	<link rel="stylesheet" type="text/css" href="assets/vendor/animate/animate.css">
	<link rel="stylesheet" type="text/css" href="assets/vendor/css-hamburgers/hamburgers.min.css">
	<link rel="stylesheet" type="text/css" href="assets/vendor/animsition/css/animsition.min.css">
	<link rel="stylesheet" type="text/css" href="assets/vendor/select2/select2.min.css">	
	<link rel="stylesheet" type="text/css" href="assets/vendor/daterangepicker/daterangepicker.css">
	<link rel="stylesheet" type="text/css" href="assets/css/util.css">
	<link rel="stylesheet" type="text/css" href="assets/css/main.css">
	<style>
    img[src="https://cdn.000webhost.com/000webhost/logo/footer-powered-by-000webhost-white2.png"] {
        display: none;
    }
</style>
    </head>
    <body>

                    <?php
                    include('connection.php');
                    if (isset($_POST["email"]) && (!empty($_POST["email"]))) {
                        $email = $_POST["email"];
                        $error = !empty($_POST['value']) ? $_POST['value'] : '';
                        $email = filter_var($email, FILTER_SANITIZE_EMAIL);
                        $v = filter_var($email, FILTER_VALIDATE_EMAIL);
                        if (!$email) {
                            $error .=('<script type="text/javascript">
                            alert("Invalid Email Address, Please Try Again");
                            </script>');;
                        } else {
                            $sel_query = "SELECT * FROM `admin` WHERE email='" . $email . "'";
                            $results = mysqli_query($db, $sel_query);
                            $row = mysqli_num_rows($results);
                            if ($row == "") {
                                $error = ('<script type="text/javascript">
                                alert("User Not Found, Please Try Again");
                                </script>');;
                            }
                        }
                        if ($error!="") {
                            echo $error;
                        } else {

                            $output = '';

                            $expFormat = mktime(date("H"), date("i"), date("s"), date("m"), date("d") + 1, date("Y"));
                            $expDate = date("Y-m-d H:i:s", $expFormat);
                            $key = md5(time());
                            $addKey = substr(md5(uniqid(rand(), 1)), 3, 10);
                            $key = $key . $addKey;
                            // Insert Temp Table
                            mysqli_query($db, "INSERT INTO `password_reset_temp` (`email`, `key`, `expDate`) VALUES ('" . $email . "', '" . $key . "', '" . $expDate . "');");


                            $output.='<p>Please click on the following link within 16 hours to reset your password.</p>';
                            
                            $output.='<p><a href="https://cwtxyz.tk/reset-passwordAdmin?key=' . $key . '&email=' . $email . '&action=reset" target="_blank">https://cwtxyz.tk/reset-passwordAdmin?key=' . $key . '&email=' . $email . '&action=reset</a></p>';
                            $body = $output;
                            $subject = "Password Recovery";

                            $email_to = $email;


                            //autoload the PHPMailer
                            require("assets/vendor/autoload.php");
                            $mail = new PHPMailer();
                            $mail->IsSMTP();
                            $mail->Host = "smtp.gmail.com"; 
                            $mail->SMTPAuth = true;
                            $mail->Username = "cwtxyz@gmail.com";
                            $mail->Password = "Qwerty666!"; 
                            $mail->Port = 587;
                            $mail->IsHTML(true);
                            $mail->From = "cwtxyz@gmail.com";
                            $mail->FromName = "Recovery Password Link";

                            $mail->Subject = $subject;
                            $mail->Body = $body;
                            $mail->AddAddress($email_to);
                            if (!$mail->Send()) {
                                echo "Mailer Error: " . $mail->ErrorInfo;
                            } else {
                                echo ('<script type="text/javascript">
                                alert("Email Has Been Send, Please Check Your Mail Box");
                                </script>');;
                            }
                        }
                    }
                    ?>
                    <div class="limiter">
		<div class="container-login100" style="background-image: url('assets/images/bg.jpg');">
			<div class="wrap-login100">
				<form class="login100-form validate-form" method="POST" name="reset">
					

					<span class="login100-form-title p-b-34 p-t-27">
						Forgot Password
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Enter Email">
						<input class="input100" type="email" name="email" placeholder="Email">
						<span class="focus-input100" ></span>
					</div>

					

					<div class="container-login100-form-btn">
					<button type="submit" name="submit" id="reset" class="login100-form-btn">Submit</button>
						
					</div>
					
					
<div class="text-center p-t-30">
						<a class="txt1" href="index">
							Go Back to Home Page
						</a>
					</div>
					
				</form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>

    <script src="assets/vendor/jquery/jquery-3.2.1.min.js"></script>
	<script src="assets/vendor/animsition/js/animsition.min.js"></script>
	<script src="assets/vendor/bootstrap/js/popper.js"></script>
	<script src="assets/vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="assets/vendor/select2/select2.min.js"></script>
	<script src="assets/vendor/daterangepicker/moment.min.js"></script>
	<script src="assets/vendor/daterangepicker/daterangepicker.js"></script>
	<script src="assets/vendor/countdowntime/countdowntime.js"></script>
	<script src="assets/js/user.js"></script>
    </body>
</html>