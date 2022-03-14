<?php
if(!isset($_SERVER['HTTP_REFERER'])){
    //print this messages
    echo '<br><br><br><br><br><br><h1 style="text-align:center;color:red">You Do Not Have Permisson to Access This Server [ 403 Forbidden Error ]</h1>';
    exit;
}
    include_once 'header.php';
?>
<DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  
</head>

<body style="background-color:#99c2ff">

<div class="header">
  <div id="mainBtn">
  <button class="openbtn" onclick="openNav()"><img class="icon" src="img/menu.png"></button>
  </div>
        <h1>Admin Dashboard</h1>

</div>

<section>
  <div class="main">

      <?php
      
          include 'connection.php';

          $id=$_SESSION['id'];

          $query=mysqli_query($db,"SELECT * FROM admin where admin_id='$id'")or die(mysqli_error());
          $row=mysqli_fetch_array($query);

          try{
            $pdoConnect=new PDO("mysql:host=localhost;dbname=id15248527_cart_system","id15248527_cwtxyzc","LvatunB0212!");
          }catch(PDOException $ex){
            echo $ex->getMessage();
            exit();
          }

          try{
            $pdoConnectU=new PDO("mysql:host=localhost;dbname=id15248527_user_system","id15248527_cwtxyzu","LvatunB0212!");
          }catch(PDOException $exU){
            echo $exU->getMessage();
            exit();
          }

          $pdoQuery="SELECT * FROM product";
          $pdoResult=$pdoConnect->query($pdoQuery);
          $pdoRowCount=$pdoResult->rowCount();

          $pdoQuery2="SELECT * FROM orders";
          $pdoResult2=$pdoConnect->query($pdoQuery2);
          $pdoRowCount2=$pdoResult2->rowCount();

          $pdoQueryU="SELECT * FROM member";
          $pdoResultU=$pdoConnectU->query($pdoQueryU);
          $pdoRowCountU=$pdoResultU->rowCount();
          
          $pdoQueryU="SELECT * FROM admin";
          $pdoResultU2=$pdoConnectU->query($pdoQueryU);
          $pdoRowCountU2=$pdoResultU2->rowCount();



      ?>

          <br>
        <h5 style="text-align:center">Hello There, You are Login as <span style="color:#0400ff;"><?php echo $row['username']; ?><span></h5>
        <br><br><br>
        <h1 style="text-align:center;text-decoration:underline">Notification</h1>
        <br><br>
        <h4 style="text-align:center">Welcome Back, Today is <span id='ct5' ></span></h4>
        <br><br>
        <h3 style="text-align:center">There are <span style="color:#0400ff;"><?php echo $pdoRowCount ?></span> Products, <span style="color:#0400ff;"><?php echo $pdoRowCount2 ?></span> Orders, <span style="color:#0400ff;"><?php echo $pdoRowCountU2 ?></span> Admin and <span style="color:#0400ff;"><?php echo $pdoRowCountU ?></span> Member in CWTXYZ</h3>


  </div>

</section>


</body>
<script>

function display_ct5() {
var x = new Date()
var ampm = x.getHours( ) >= 12 ? ' PM' : ' AM';

var x1= x.getMonth() +1+ "-" + x.getDate()+ "-" + x.getFullYear();
x1 = x1 + " and now The Time is " +  x.getHours( )+ ":" +  x.getMinutes() + ":" +  x.getSeconds() + ":" + ampm;
document.getElementById('ct5').innerHTML = x1;
display_c5();
 }
 function display_c5(){
var refresh=1000; // Refresh rate in milli seconds
mytime=setTimeout('display_ct5()',refresh)
}
display_c5()
</script>
</html>

<?php
    include_once 'footer.php';
?>
