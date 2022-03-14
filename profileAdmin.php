<!DOCTYPE html>
<html lang="en-US">
  <head>
  <title>Admin Profile</title>
  <meta name="msapplication-TileColor" content="#ffffff">
  <meta name="msapplication-TileImage" content="assets/images/prof/ms-icon-144x144.png">
  <meta name="theme-color" content="#ffffff">
  <link rel='stylesheet' href="assets/css/animate.css">
  <link rel="apple-touch-icon" sizes="57x57" href="assets/images/prof/apple-icon-57x57.png">
  <link rel="apple-touch-icon" sizes="60x60" href="assets/images/prof/apple-icon-60x60.png">
  <link rel="apple-touch-icon" sizes="72x72" href="assets/images/prof/apple-icon-72x72.png">
  <link rel="apple-touch-icon" sizes="76x76" href="assets/images/prof/apple-icon-76x76.png">
  <link rel="apple-touch-icon" sizes="114x114" href="assets/images/prof/apple-icon-114x114.png">
  <link rel="apple-touch-icon" sizes="120x120" href="assets/images/prof/apple-icon-120x120.png">
  <link rel="apple-touch-icon" sizes="144x144" href="assets/images/prof/apple-icon-144x144.png">
  <link rel="apple-touch-icon" sizes="152x152" href="assets/images/prof/apple-icon-152x152.png">
  <link rel="apple-touch-icon" sizes="180x180" href="assets/images/prof/apple-icon-180x180.png">
  <link rel="icon" type="image/png" sizes="192x192"  href="assets/images/prof/android-icon-192x192.png">
  <link rel="icon" type="image/png" sizes="32x32" href="assets/images/prof/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="96x96" href="assets/images/prof/favicon-96x96.png">
  <link rel="icon" type="image/png" sizes="16x16" href="assets/images/prof/favicon-16x16.png">
  <link rel="manifest" href="assets/images/prof/manifest.json">

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

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <style>
    img[src="https://cdn.000webhost.com/000webhost/logo/footer-powered-by-000webhost-white2.png"] {
        display: none;
    }
</style>
  </head>
  <?php
  if(!isset($_SERVER['HTTP_REFERER'])){
    //print this messages
    echo '<br><br><br><br><br><br><h1 style="text-align:center;color:red">You Do Not Have Permisson to Acess This Server [ 403 Forbidden Error ]</h1>';
    exit;
}
  include 'connection.php';
  session_start();
$id=$_SESSION['id'];
$query=mysqli_query($db,"SELECT * FROM admin where admin_id='$id'")or die(mysqli_error());
$row=mysqli_fetch_array($query);
  ?>

  <body>
    <div class="limiter">
		<div class="container-login100" style="background-image: url('assets/images/bg.jpg');">
			<div class="wrap-login100">
				<form class="login100-form validate-form" method="POST">


					<span class="login100-form-title p-b-34 p-t-27">
						Account Details
                    </span>
                    
                    <div class="wrap-input100 validate-input">
                        <label>Username : </label>
						<input class="input100" type="text" name="user" value="<?php echo $row['username']; ?>" readonly>
						<span class="focus-input100" ></span>
					</div>



                    <div class="wrap-input100 validate-input" data-validate="Enter Full Name">
                        <label>Full Name : </label>
						<input class="input100" type="text" name="fname" value="<?php echo $row['full_name']; ?>" >
						<span class="focus-input100" ></span>
                    </div>

                    <div class="wrap-input100 validate-input">
                        <label>Email Address : </label>
						<input class="input100" type="email" name="email" value="<?php echo $row['email']; ?>" readonly>
						<span class="focus-input100" ></span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate="Enter Birth">
                        <label>Birth : </label>
						<input class="input100" type="date" name="birth" value="<?php echo $row['birth']; ?>" >
						<span class="focus-input100" ></span>
                    </div>

                    <select name="gender">
                    <option selected="selected" disabled>Your Gender is <?php echo $row['gender']; ?></option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                    <option value="Others">Others</option>
                    </select>
                    </br></br>

          <div class="wrap-input100 validate-input">
                        <label>Password : </label>
						<input class="input100" type="password" id="myInput" name="pass" title="Requirement of Password must atleast 8 Characters Long with Numbers & One Uppercase Character" value="<?php echo $row['password']; ?>" readonly>
						<span class="focus-input100" ></span>
					</div>

          <input type="checkbox" onclick="myFunction() ">&nbsp;Show Password

					<div class="container-login100-form-btn">
						<button type="submit" name="submit" class="login100-form-btn">Update&nbsp;<i style="font-size:24px"class="fa fa-edit"></i></button>

					</div>

					<div class="text-center p-t-30">
						<a class="txt1" href="admin">
							Go Back
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

  function myFunction1()
  {
    alert("You Are Successfully Log Out")
  }
</script>

</body>
      </html>
      <?php
      if(isset($_POST['submit'])){
        $fullname = $_POST['fname'];
        $gender = $_POST['gender'];
        $birth = $_POST['birth'];
        $email = $_POST['email'];
        $username = $_POST['user'];
        $password = $_POST['pass'];

        $pwd = $_POST['pass'];

if (!preg_match("#.*^(?=.{8,20})(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9]).*$#", $pwd)){
	die('<script type="text/javascript">
	alert("Please Include Your Password atleast 8 Characters Long with Numbers & One Uppercase Character");
	</script>
	');;
} else {

      $query = "UPDATE admin SET username = '$username', password = '$password', full_name = '$fullname',
                      gender = '$gender', birth = '$birth', email = '$email'
                      WHERE admin_id = '$id'";
                    $result = mysqli_query($db, $query)
                    ?>
                     <script type="text/javascript">
            alert("Update Successfully Please Re-login");
            window.location = "loginAdmin";
        </script>
        <?php
             }
            }

?>
