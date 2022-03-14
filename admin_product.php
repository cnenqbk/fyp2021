<?php
if(!isset($_SERVER['HTTP_REFERER'])){
    //print this messages
    echo '<br><br><br><br><br><br><h1 style="text-align:center;color:red">You Do Not Have Permisson to Access This Server [ 403 Forbidden Error ]</h1>';
    exit;
}
include_once 'header.php';
include 'action_product.php';
?>
<DOCTYPE>
<html>
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.18/datatables.min.css" />
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.18/datatables.min.js"></script>
    

</head>

<body>
<div class="header">
  <div id="mainBtn">
  <button class="openbtn" onclick="openNav()"><img class="icon" src="img/menu.png"></button>
      </div>
        <h1>All Products</h1>
      </div>
      <div class="main">
      </div>
        <div class="container-fluid">
          <h3 class="text-center text-dark mt-2"></h3>
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
  </div>
    <div class="row">
      <div class="col-md-4">
        <h3 class="text-center text-info">Add Product</h3>
        <form action="action_product.php" method="post" enctype="multipart/form-data">
          <input type="hidden" name="id" value="<?= $id; ?>">
          <div class="form-group">
            <input type="text" name="product_name" value="<?= $productName; ?>" class="form-control" placeholder="Product Name" required>
          </div>
          <div class="form-group">
            <input type="number" name="product_qty" min="1" max="1" onkeyup=enforceMinMax(this) value="<?= $productQty; ?>" class="form-control" placeholder="Product Quantity" required>
          </div>
          <div class="form-group">
            <input type="number" step="any" min="0.00" max="10000.00"  name="product_price" value="<?= $productPrice; ?>" class="form-control" placeholder="Product Price" required>
          </div>
          <div class="form-group">
            <input type="text" name="product_type" value="<?= $productType; ?>" class="form-control" placeholder="Product Type" required>
          </div>
          <div class="form-group">
            <input type="number" name="product_code" value="<?= $productCode; ?>" min="1" max="1000" onkeyup=enforceMinMax(this) class="form-control" placeholder="Product Code" required>
          </div>
          <div class="form-group">
            <input type="hidden" name="oldimage" value="<?= $productImage; ?>">
            <input type="file" name="image" class="custom-file">
            <img src="<?= $productImage; ?>"  width="120"  class="img-thumbnail">
          </div>
          <div class="form-group">
            <?php if ($update == true) { ?>
            <input type="submit" name="update" class="btn btn-success btn-block" value="Update Product">
            <?php } else { ?>
            <input type="submit" name="add" class="btn btn-primary btn-block" value="Add Product">
            <?php } ?>
          </div>
        </form>
      </div>
      <div class="col-md-8">
        <?php
          $query = 'SELECT * FROM product';
          $stmt = $conn->prepare($query);
          $stmt->execute();
          $result = $stmt->get_result();
        ?>
        <table class="table table-striped table-dark">
          <thead>
            <tr>
              <th>Product Code</th>
              <th>Product Image</th>
              <th>Product Name</th>
              <th>Product Quantity</th>
              <th>Product Type</th>
              <th>Product Price</th>
              <th>Option</th>
            </tr>
          </thead>
          <tbody>
            <?php while ($row = $result->fetch_assoc()) { ?>
            <tr>
              <td><?= $row['product_code']; ?></td>
              <td><img class="pic" src="<?= $row['product_image']; ?>"></td>
              <td><?= $row['product_name']; ?></td>
              <td><?= $row['product_qty']; ?></td>
              <td><?= $row['product_type']; ?></td>
              <td>RM <?= $row['product_price']; ?></td>

              <td>
                <a href="action_product?delete=<?= $row['id']; ?>" class="badge badge-danger p-2" onclick="return confirm('Do You Want to Delete This Product ?');">Delete</a>
                <br><br><a href="admin_product?edit=<?= $row['id']; ?>" class="badge badge-success p-2">Edit</a>
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
