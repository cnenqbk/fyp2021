<?php
if(!isset($_SERVER['HTTP_REFERER'])){
    //print this messages
    echo '<br><br><br><br><br><br><h1 style="text-align:center;color:red">You Do Not Have Permisson to Access This Server [ 403 Forbidden Error ]</h1>';
    exit;
}
include_once 'header.php';
include 'action_user2.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <!-- jQuery library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <!-- Popper JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <!-- Latest compiled JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.18/datatables.min.css" />
  <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.18/datatables.min.js"></script>

</head>

<body>
  <div class="header">
    <div id="mainBtn">
    <button class="openbtn" onclick="openNav()"><img class="icon" src="img/menu.png"></button>
        </div>
          <h1>All Member</h1>
        </div>
        <div class="main">
        </div>

    <div class="container-fluid">
      <div class="row justify-content-center">
        <div class="col-md-10">
          <?php if (isset($_SESSION['response'])) { ?>
          <div class="alert alert-<?= $_SESSION['res_type']; ?> alert-dismissible text-center">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <b><?= $_SESSION['response']; ?></b>
          </div>
          <?php } unset($_SESSION['response']); ?>
        </div>
      </div>
      <div class="row">
        
        <div class="col-md-8">
          <?php
            $query = 'SELECT * FROM member WHERE status="0"';
            $stmt = $db->prepare($query);
            $stmt->execute();
            $result = $stmt->get_result();
          ?>
          <table class="table table-striped table-dark">
            <thead>
              <tr>

                <th>Username</th>
                <th>Full Name</th>
                <th>Status ( *0 for member )</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php while ($row = $result->fetch_assoc()) { ?>
              <tr>
                <td><?= $row['username']; ?></td>
                <td><?= $row['full_name']; ?></td>
                <td><?= $row['status']; ?></td>
                <td>
                  <a href="details_user2?details=<?= $row['member_id']; ?>" class="badge badge-primary p-2">Details</a> |
                  <a href="action_user2?delete=<?= $row['member_id']; ?>" class="badge badge-danger p-2" onclick="return confirm('Do You Want to Delete This Record ?');">Delete</a> |
                </td>
              </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <script type="text/javascript">
    
    function enforceMinMax(el){
  if(el.value != ""){
    if(parseInt(el.value) < parseInt(el.min)){
      el.value = el.min;
    }
    if(parseInt(el.value) > parseInt(el.max)){
      el.value = el.max;
    }
  }
}
    </script>
  </body>

  </html>
