<?php
if(!isset($_SERVER['HTTP_REFERER'])){
    //print this messages
    echo '<br><br><br><br><br><br><h1 style="text-align:center;color:red">You Do Not Have Permisson to Access This Server [ 403 Forbidden Error ]</h1>';
    exit;
}
include_once 'header.php';
include 'action_order.php';
?>

<DOCTYPE>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.18/datatables.min.js"></script>

</head>
<body>
  <div class="header">
    <div id="mainBtn">
    <button class="openbtn" onclick="openNav()"><img class="icon" src="img/menu.png"></button>
        </div>
          <h1>Customer Orders</h1>
        </div>
        <div class="main">
        </div>
          <div class="container-fluid">
        <div class="col-md-8"-->
          <?php
            $query = 'SELECT * FROM orders';
            $stmt = $conn->prepare($query);
            $stmt->execute();
            $result = $stmt->get_result();
          ?>
          <table class="table table-striped table-dark">
            <thead>
              <tr>

                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
  			        <th>Delivery Address</th>
                <th>Payment Method</th>
                <th>Products</th>
                <th>Amount</th>
              </tr>
            </thead>
            <tbody>
              <?php while ($row = $result->fetch_assoc()) { ?>
              <tr>

                <td><?= $row['name']; ?></td>
                <td><?= $row['email']; ?></td>
                <td><?= $row['phone']; ?></td>
                <td><?= $row['address']; ?></td>
  			        <td><?= $row['pmode']; ?></td>
                <td><?= $row['products']; ?></td>
                <td>RM <?= number_format($row['amount_paid'], 2); ?></td>
              </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </body>
  </html>
