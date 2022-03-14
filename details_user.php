<?php

if(!isset($_SERVER['HTTP_REFERER'])){
    //print this messages
    echo '<br><br><br><br><br><br><h1 style="text-align:center;color:red">You Do Not Have Permisson to Access This Server [ 403 Forbidden Error ]</h1>';
    exit;
}
  include 'action_user.php';
  include_once 'header.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel='stylesheet' href="assets/css/animate.css">

<body>
<div class="header">
  <div id="mainBtn">
  <button class="openbtn" onclick="openNav()"><img class="icon" src="img/menu.png"></button>
      </div>
        <h1>Admin Profile Details</h1>
      </div>
      <div class="main">
      </div>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-6 mt-3 bg-info p-4 rounded">
        
        <div class="text-center">
        </div>
        <h4 class="text-light">Full Name : <?= $vfullName; ?></h4>
        <h4 class="text-light">Username : <?= $vname; ?></h4>
        <h4 class="text-light">Email : <?= $vemail; ?></h4>
        <h4 class="text-light">Gender : <?= $vgender; ?></h4>
        <h4 class="text-light">Birth : <?= $vbirth; ?></h4>
        <h4 class="text-light">Password : <?= $vpassword; ?></h4>
        <h4 class="text-light">Status : <?= $vstatus; ?></h4>
      </div>
    </div>
  </div>
</body>

</html>
