
<html>
    <head>
        <title>Reset Password</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel='stylesheet' href="assets/css/animate.css">

        <link rel="apple-touch-icon" sizes="180x180" href="assets/images/pass/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="assets/images/pass/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="assets/images/pass/favicon-16x16.png">
<link rel="manifest" href="assets/images/pass/site.webmanifest">
<style>
    img[src="https://cdn.000webhost.com/000webhost/logo/footer-powered-by-000webhost-white2.png"] {
        display: none;
    }
</style>
    </head>
    <body>

        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-4">
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
                                <h2>Please Enter Your New Password</h2>   
                                <form method="post" action="" name="update">

                                    <input type="hidden" name="action" value="update" class="form-control"/>


                                    <div class="form-group">
                                        <label><strong>Enter New Password:</strong></label>
                                        <input type="password"  name="pass1"  class="form-control"required/>
                                    </div>

                                    <div class="form-group">
                                        <label><strong>Confirm New Password:</strong></label>
                                        <input type="password"  name="pass2"  class="form-control"required/>
                                    </div>

                                    <input type="checkbox" id="show-passwords">&nbsp;Show Password</br></br>
                                    
                                    <input type="hidden" name="email" value="<?php echo $email; ?>"/>
                                    <div class="form-group">
                                        <input type="submit" id="reset" value="Reset Password"  class="btn btn-primary"/>
                                    </div>

                                </form>
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

                            
                            mysqli_query($db, "UPDATE `admin` SET `password` = '" . $pass1 . "' WHERE `email` = '" . $email . "'");

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