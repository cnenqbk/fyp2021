<!DOCTYPE html>
<html lang="en-US">
  <head>
  <title>Member Sign Up</title>
  <meta name="msapplication-TileColor" content="#ffffff">
  <meta name="msapplication-TileImage" content="assets/images/reg/ms-icon-144x144.png">
  <meta name="theme-color" content="#ffffff">
  <link rel='stylesheet' href="assets/css/animate.css">
  <link rel="apple-touch-icon" sizes="57x57" href="assets/images/reg/apple-icon-57x57.png">
  <link rel="apple-touch-icon" sizes="60x60" href="assets/images/reg/apple-icon-60x60.png">
  <link rel="apple-touch-icon" sizes="72x72" href="assets/images/reg/apple-icon-72x72.png">
  <link rel="apple-touch-icon" sizes="76x76" href="assets/images/reg/apple-icon-76x76.png">
  <link rel="apple-touch-icon" sizes="114x114" href="assets/images/reg/apple-icon-114x114.png">
  <link rel="apple-touch-icon" sizes="120x120" href="assets/images/reg/apple-icon-120x120.png">
  <link rel="apple-touch-icon" sizes="144x144" href="assets/images/reg/apple-icon-144x144.png">
  <link rel="apple-touch-icon" sizes="152x152" href="assets/images/reg/apple-icon-152x152.png">
  <link rel="apple-touch-icon" sizes="180x180" href="assets/images/reg/apple-icon-180x180.png">
  <link rel="icon" type="image/png" sizes="192x192"  href="assets/images/reg/android-icon-192x192.png">
  <link rel="icon" type="image/png" sizes="32x32" href="assets/images/reg/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="96x96" href="assets/images/reg/favicon-96x96.png">
  <link rel="icon" type="image/png" sizes="16x16" href="assets/images/reg/favicon-16x16.png">
  <link rel="manifest" href="assets/images/reg/manifest.json">

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
				<form class="login100-form validate-form" method="POST">


					<span class="login100-form-title p-b-34 p-t-27">
						Member Register
                    </span>

                    <div class="wrap-input100 validate-input" data-validate = "Enter Full Name">
                        <label>Full Name : </label>
						<input class="input100" type="text" name="fname">
						<span class="focus-input100" ></span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate = "Enter Email">
                        <label>Email Address : </label>
						<input class="input100" type="email" name="email">
						<span class="focus-input100" ></span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate = "Enter Birth">
                        <label>Birth : </label>
						<input class="input100" type="date" name="birth">
						<span class="focus-input100" ></span>
                    </div>
                    
                    <label>Gender : </label></br>
                    <select name="gender" required>
                    <option value="" selected disabled>-Select Your Gender-</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                    <option value="Others">Others</option>
                    </select>
                    </br></br>
                    
					<div class="wrap-input100 validate-input" data-validate = "Enter Username">
					    <label>Username : </label>
						<input class="input100" type="text" name="user">
						<span class="focus-input100" ></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter Password">
					    <label>Password : </label>
						<input class="input100" type="password"  title="Requirement of Password must atleast 8 Characters Long with Numbers & One Uppercase Character"name="pass" onChange="onChange()" placeholder="Password">
						<span class="focus-input100" ></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<input class="input100" type="password"  name="conf" onChange="onChange()" placeholder="Confirm Password">
						<span class="focus-input100" ></span>
					</div>

					<input type="checkbox" id="show-passwords">&nbsp;Show Password

					<div class="container-login100-form-btn">
                    <button type="submit" name="submit" class="login100-form-btn">Create</button>

					</div>

					<div class="text-center p-t-30">
						<a class="txt1" href="login">
							Already Have An Account ?
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

	<script>
		var checkbox = document.querySelector('input#show-passwords');

// Convert NodeList to an Array -- forEach has no IE support on NodeLists
var passwordFields = Array.prototype.slice.call(document.querySelectorAll('[type=password]'));

checkbox.addEventListener('click', function(event) {
	passwordFields.forEach( function( passwordField ) {
			passwordField.type = checkbox.checked ? 'text': 'password';
	});
}, false);


function onChange() {
  const password = document.querySelector('input[name=pass]');
  const confirm = document.querySelector('input[name=conf]');
  if (confirm.value === password.value) {
    confirm.setCustomValidity('');
  } else {
    confirm.setCustomValidity('Passwords Do Not Match');
  }
}
</script>
</body>
      </html>
      <?php
	  include 'connection.php';


if(isset($_POST['submit']))
{
	$fname = $_POST['fname'];
	$gender = $_POST['gender'];
	$birth = $_POST['birth'];
	$email = $_POST['email'];
	$user = $_POST['user'];
	$pass = $_POST['pass'];


$pwd = $_POST['pass'];

if (!preg_match("#.*^(?=.{8,20})(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9]).*$#", $pwd)){
	die('<script type="text/javascript">
	alert("Please Include Your Password atleast 8 Characters Long with Numbers & One Uppercase Character");
	</script>
	');;
} else {



  $query = "INSERT INTO member
                (username, password, full_name, gender, birth, email)
                VALUES ('".$user."','".$pass."','".$fname."','".$gender."','".$birth."','".$email."')";
                mysqli_query($db,$query)or die('<script type="text/javascript">
				alert("Username or Email Already Exists, Please Try Another");
				</script>
				');;
                ?>
                <script type="text/javascript">
            alert("Successfully Register Please Login");
            window.location = "login";
        </script>
                <?php
}
}

      ?>
