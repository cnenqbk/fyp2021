<?php

	require 'config.php';

	$grand_total = 0;
	$allItems = '';
	$items = [];

	$sql = "SELECT CONCAT(product_name, '(',qty,')') AS ItemQty, total_price FROM cart";
	$stmt = $conn->prepare($sql);
	$stmt->execute();
	$result = $stmt->get_result();
	while ($row = $result->fetch_assoc()) {
	  $grand_total += $row['total_price'];
	  $items[] = $row['ItemQty'];
	}
	$allItems = implode(', ', $items);
?>

<!DOCTYPE html>
<html lang="en-US">
<head>
  <meta charset="UTF-8">
  <meta name="author" content="CWTXYZ">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="msapplication-TileColor" content="#ffffff">
  <meta name="msapplication-TileImage" content="assets/images/check/ms-icon-144x144.png">
  <meta name="theme-color" content="#ffffff">
  <title>Checkout</title>
  <link rel="apple-touch-icon" sizes="57x57" href="assets/images/check/apple-icon-57x57.png">
  <link rel="apple-touch-icon" sizes="60x60" href="assets/images/check/apple-icon-60x60.png">
  <link rel="apple-touch-icon" sizes="72x72" href="assets/images/check/apple-icon-72x72.png">
  <link rel="apple-touch-icon" sizes="76x76" href="assets/images/check/apple-icon-76x76.png">
  <link rel="apple-touch-icon" sizes="114x114" href="assets/images/check/apple-icon-114x114.png">
  <link rel="apple-touch-icon" sizes="120x120" href="assets/images/check/apple-icon-120x120.png">
  <link rel="apple-touch-icon" sizes="144x144" href="assets/images/check/apple-icon-144x144.png">
  <link rel="apple-touch-icon" sizes="152x152" href="assets/images/check/apple-icon-152x152.png">
  <link rel="apple-touch-icon" sizes="180x180" href="assets/images/check/apple-icon-180x180.png">
  <link rel="icon" type="image/png" sizes="192x192"  href="assets/images/check/android-icon-192x192.png">
  <link rel="icon" type="image/png" sizes="32x32" href="assets/images/check/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="96x96" href="assets/images/check/favicon-96x96.png">
  <link rel="icon" type="image/png" sizes="16x16" href="assets/images/check/favicon-16x16.png">
  <link rel="manifest" href="assets/images/check/manifest.json">
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css' />
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css' />
  <link rel='stylesheet' href="assets/css/animate.css">

  <style>
  #xyz{margin-left:150px;}
  img[src="https://cdn.000webhost.com/000webhost/logo/footer-powered-by-000webhost-white2.png"] {
        display: none;
    }
  </style>
</head>
<body>
<nav class="navbar navbar-expand-md bg-dark navbar-dark">
    <div class="collapse navbar-collapse" id="collapsibleNavbar">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" href="cart"><i class="fas fa-shopping-cart"></i> <span id="cart-item" class="badge badge-danger"></span></a>
        </li>
      </ul>
    </div>
  </nav>

  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-6 px-4 pb-4" id="order">
        <h4 class="text-center text-secondary p-2">Please Complete Your Order</h4>
        <div class="jumbotron p-3 mb-2 text-center">
          <h6 class="lead"><b>Product(s) : </b><?= $allItems; ?></h6>
          <h6 class="lead"><b>Delivery Charge : </b>Free</h6>
          <h5><b>Total Amount Payable : RM </b><?= number_format($grand_total, 2) ?></h5>
        </div>
        <form action="" method="post" id="placeOrder">
          <input type="hidden" name="products" value="<?= $allItems; ?>">
          <input type="hidden" name="grand_total" value="<?= $grand_total; ?>">
          <div class="form-group">
            <input type="text" name="name" class="form-control" placeholder="Please Enter Your Name Here" required>
          </div>
          <div class="form-group">
            <input type="email" name="email" class="form-control" placeholder="Please Enter Your Email Here" required>
          </div>
          <div class="form-group">
            <input type="tel" name="phone" class="form-control" placeholder="Please Enter Your Phone Number Here" required>
          </div>
          <div class="form-group">
            <textarea name="address" class="form-control" rows="3" cols="10" placeholder="Please Enter Your Delivery Address Here"></textarea>
          </div>
          <h6 class="text-center lead">Please Select Your Payment Method</h6>
          <div class="form-group">
            <select name="pmode" class="form-control">
              <option value="" selected disabled>-Select Payment Method-</option>
              <option value="Online Banking">Online Banking</option>
              <option value="Credit Card">Credit Card</option>
            </select>
          </div>
          <div class="form-group">
            <input type="submit" name="submit" value="Place Order" class="btn btn-success btn-block">
          </div>
        </form>
        <a href="prod(login)" class="btn btn-secondary" id="xyz"><i class="fas fa-cart-plus"></i>&nbsp;&nbsp;Continue Shopping</a>
      </div>
    </div>
  </div>

  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js'></script>
  <script type="text/javascript">
  $(document).ready(function() 
  {
        $("#placeOrder").submit
        (   function(e) 
        {
            e.preventDefault();
            $.ajax
        (
            {
                url: 'action.php',
                method: 'post',
                data: $('form').serialize() + "&action=order",
                success: function(response) 
                {
                    $("#order").html(response);
                }
      
            }
        );
        }
        );

    load_cart_item_number();

    function load_cart_item_number() 
    {
        $.ajax
        (
            {
                url: 'action.php',
                method: 'get',
                data: 
                {
                    cartItem: "cart_item"
                },
            success: function(response) 
            {
                $("#cart-item").html(response);
            }
            }
        );
    }
    }
    );
  </script>
</body>
</html>