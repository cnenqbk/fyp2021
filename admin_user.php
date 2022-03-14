<?php
if(!isset($_SERVER['HTTP_REFERER'])){
    //print this messages
    echo '<br><br><br><br><br><br><h1 style="text-align:center;color:red">You Do Not Have Permisson to Access This Server [ 403 Forbidden Error ]</h1>';
    exit;
}
include_once 'header.php';
include 'action_user.php';
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
          <h1>All Staff</h1>
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
        <div class="col-md-4">
          <h3 class="text-center text-info">Add Staff</h3>
          <form action="action_user.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?= $id; ?>">
            <div class="form-group">
              <input type="text" name="username" value="<?= $name; ?>" class="form-control" placeholder="Enter Username" required>
            </div>
            <div class="form-group">
              <input type="password" id="myInput" name="password" value="<?= $password; ?>" title="Requirement of Password must atleast 8 Characters Long with Numbers & One Uppercase Character"class="form-control" placeholder="Enter Password" required>
            </div>
            <div class="form-group">
              <input type="text" name="full_name" value="<?= $fullName; ?>" class="form-control" placeholder="Enter Full Name" required>
            </div>
            <div class="form-group">
                <select name="gender" required>
                    <option value="" selected disabled>-Select Gender-</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                    <option value="Others">Others</option>
                    </select>
            </div>
            <div class="form-group">
              <input type="date"  name="birth" value="<?= $birth; ?>" class="form-control" placeholder="Enter Birth" required>
            </div>
            <div class="form-group">
              <input type="email" name="email" value="<?= $email; ?>" class="form-control" placeholder="Enter Email" required>
            </div>
            <div class="form-group">
              <label for="status">*1 for staff</label>
              <input type="number" name="status" min="1" max="1" onkeyup=enforceMinMax(this) value="<?= $status=1; ?>" class="form-control"  readonly>
            </div>
            <input type="checkbox" onclick="myFunction() ">&nbsp;Show Password
            <div class="form-group">
              <input type="submit" name="add" class="btn btn-primary btn-block" value="Add Record">
            </div>
          </form>
        </div>
        <div class="col-md-8">
          <?php
            $query = 'SELECT * FROM admin WHERE status="1"';
            $stmt = $db->prepare($query);
            $stmt->execute();
            $result = $stmt->get_result();
          ?>
          <table class="table table-striped table-dark">
            <thead>
              <tr>

                <th>Username</th>
                <th>Full Name</th>
                <th>Status ( *1 for staff )</th>
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
                  <a href="details_user?details=<?= $row['admin_id']; ?>" class="badge badge-primary p-2">Details</a> |
                  <a href="action_user?delete=<?= $row['admin_id']; ?>" class="badge badge-danger p-2" onclick="return confirm('Do You Want to Delete This Record ?');">Delete</a> |
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
