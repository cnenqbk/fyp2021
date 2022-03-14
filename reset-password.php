<!DOCTYPE html>
<html lang="en-US">
  <head>
  <title>Reset Password</title>
  	<meta name="msapplication-TileColor" content="#ffffff">
	<meta name="msapplication-TileImage" content="assets/images/log/ms-icon-144x144.png">
	<meta name="theme-color" content="#ffffff">
	<link rel='stylesheet' href="assets/css/animate.css">
	<link rel="apple-touch-icon" sizes="57x57" href="assets/images/log/apple-icon-57x57.png">
	<link rel="apple-touch-icon" sizes="60x60" href="assets/images/log/apple-icon-60x60.png">
	<link rel="apple-touch-icon" sizes="72x72" href="assets/images/log/apple-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="76x76" href="assets/images/log/apple-icon-76x76.png">
	<link rel="apple-touch-icon" sizes="114x114" href="assets/images/log/apple-icon-114x114.png">
	<link rel="apple-touch-icon" sizes="120x120" href="assets/images/log/apple-icon-120x120.png">
	<link rel="apple-touch-icon" sizes="144x144" href="assets/images/log/apple-icon-144x144.png">
	<link rel="apple-touch-icon" sizes="152x152" href="assets/images/log/apple-icon-152x152.png">
	<link rel="apple-touch-icon" sizes="180x180" href="assets/images/log/apple-icon-180x180.png">
	<link rel="icon" type="image/png" sizes="192x192"  href="assets/images/log/android-icon-192x192.png">
	<link rel="icon" type="image/png" sizes="32x32" href="assets/images/log/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="96x96" href="assets/images/log/favicon-96x96.png">
	<link rel="icon" type="image/png" sizes="16x16" href="assets/images/log/favicon-16x16.png">
  	<link rel="manifest" href="assets/images/log/manifest.json">

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
  <div class="limiter">
		<div class="container-login100" style="background-image: url('assets/images/bg.jpg');">
			<div class="wrap-login100">
			    
			    <?php
                    
                    include('connection.php');
                    if (isset($_GET["key"]) && isset($_GET["email"]) && isset($_GET["action"]) && ($_GET["action"] == "reset") && !isset($_POST["action"])) {
                        $key = $_GET["key"];
                        $email = $_GET["email"];
                        $error = !empty($_POST['value']) ? $_POST['value'] : '';
                        $curDate = date("Y-m-d H:i:s");
                        $query = mysqli_query($db, "SELECT * FROM `password_reset_temp` WHERE `key`='" . $key . "' and `email`='" . $email . "';");
                        $row = mysqli_num_rows($query);
                        if ($row == "") {
                            $error .= '<h1>Invalid Link</h1>';
                        } else {
                            $row = mysqli_fetch_assoc($query);
                            $expDate = $row['expDate'];
                            if ($expDate >= $curDate) {
                                ?> 
				<form class="login100-form validate-form" method="POST" name="update">
					
                    <input type="hidden" name="action" value="update"/>
                    
					<span class="login100-form-title p-b-34 p-t-27">
						Reset Password Form
					</span>

					<div class="wrap-input100 validate-input" data-validate="Enter New Password">
						<input class="input100" type="password"  name="pass1" placeholder="New Password">
						<span class="focus-input100" data-placeholder="&#xf191;"></span>
					</div>
					
					<div class="wrap-input100 validate-input" data-validate="Enter Again New Password">
						<input class="input100" type="password"  name="pass2" placeholder="Confirm New Password">
						<span class="focus-input100" data-placeholder="&#xf191;"></span>
					</div>

					<input type="checkbox" id="show-passwords">&nbsp;Show Password</br></br>

                    <input type="hidden" name="email" value="<?php echo $email; ?>"/>
                    
					<div class="container-login100-form-btn">
					<button type="submit" name="submit" id="reset" class="login100-form-btn">Submit</button>
						
					</div>

					
				</form>
			</div>
		</div>
	</div>
	

	
                                <?php
                            } else {
                                $error .= "<h1>Link Expired</h1>";
                            }
                        }
                        if ($error != "") {
                            echo "" . $error . "</div>";
                        }
                    }


                    if (isset($_POST["email"]) && isset($_POST["action"]) && ($_POST["action"] == "update")) {
                        $error = "";
                        $pass1 = mysqli_real_escape_string($db, $_POST["pass1"]);
                        $pass2 = mysqli_real_escape_string($db, $_POST["pass2"]);
                        $email = $_POST["email"];
                     
                        if ($pass1 != $pass2) {
                            $error .= ('<script type="text/javascript">
                            alert("Password Do Not Match, Please Try Again");
                            </script>
                            ');;
                        }
                        if (!preg_match("#.*^(?=.{8,20})(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9]).*$#", $pass1)){
                            $error .=('<script type="text/javascript">
                            alert("Please Include Your Password atleast 8 Characters Long with Numbers, One Special Character & One Uppercase Character");
                            </script>
                            ');;
                        }
                        if ($error != "") {
                            echo $error;
                        } else {

                            
                            mysqli_query($db, "UPDATE `member` SET `password` = '" . $pass1 . "' WHERE `email` = '" . $email . "'");

                            mysqli_query($db, "DELETE FROM `password_reset_temp` WHERE `email` = '$email'");

                            echo ('<script type="text/javascript">
                            alert("Congratulations, Your Password Has Been Successfully Updated");
                            </script>
                            ');;
                        }
                    }
                    ?>

                </div>
                <div class="col-md-4"></div>
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
        <script>
		var checkbox = document.querySelector('input#show-passwords');

// Convert NodeList to an Array -- forEach has no IE support on NodeLists
var passwordFields = Array.prototype.slice.call(document.querySelectorAll('[type=password]'));

checkbox.addEventListener('click', function(event) {
	passwordFields.forEach( function( passwordField ) {
			passwordField.type = checkbox.checked ? 'text': 'password';
	});
}, false);
</script>


    </body>
</html>