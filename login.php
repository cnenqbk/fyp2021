<!-- Users system UI Credit to -> https://colorlib.com/wp/-->
<?php
      session_start();
      include 'connection.php';
if(isset($_POST['submit'])){
  $user = $_POST['user'];
  $pass = $_POST['pass'];
  $query=mysqli_query($db,"SELECT * FROM member WHERE username = '$user' AND password = '$pass'");
  $num_rows=mysqli_num_rows($query);
  $row=mysqli_fetch_array($query);
  $_SESSION["id"]=$row['member_id'];
if ($num_rows>0)
{
	$status = $row['status'];

	if($status==0)
	{
    	?>
    	<script>
      alert('Successfully Log In');
      document.location='prod(login)'
    	</script>
    	<?php
	}
	
}
else
?>
<script>
  alert('Invalid Username or Password, Please Try Again');
  document.location='login'
</script>
<?php
}
      ?>
<!DOCTYPE html>
<html lang="en-US">
  <head>
  <title>Member Sign In</title>
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
				<form class="login100-form validate-form" method="POST">
					

					<span class="login100-form-title p-b-34 p-t-27">
						Member Login
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Enter Username">
						<input class="input100" type="text" name="user" placeholder="Username">
						<span class="focus-input100" data-placeholder="&#xf207;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter Password">
						<input class="input100" type="password" id="myInput" name="pass" placeholder="Password">
						<span class="focus-input100" data-placeholder="&#xf191;"></span>
					</div>

					<input type="checkbox" onclick="myFunction() ">&nbsp;Show Password

					

					<div class="container-login100-form-btn">
					<button type="submit" name="submit" class="login100-form-btn">Log In&nbsp;<i style="font-size:24px"class="fa fa-sign-in"></i></button>
						
					</div>

					<div class="text-center p-t-30">
						<a class="txt1" href="forgot">
							Forgot Password ?
						</a>
					</div>

					<div class="text-center p-t-10">
						<a class="txt1" href="register">
							Haven't Create An Account ?
						</a>
					</div>
					
					<div class="text-center p-t-10">
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
	<script>
		function myFunction() {
  var x = document.getElementById("myInput");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
</script>
</body>
      </html>

      