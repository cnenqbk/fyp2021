<!DOCTYPE html>
<html lang="en-US">
<head>
  <meta charset="UTF-8">
  <meta name="author" content="CWTXYZ">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="msapplication-TileColor" content="#ffffff">
  <meta name="msapplication-TileImage" content="images/prod/ms-icon-144x144.png">
  <meta name="theme-color" content="#ffffff">
  <title>Products</title>
  <link rel="apple-touch-icon" sizes="57x57" href="assets/images/prod/apple-icon-57x57.png">
  <link rel="apple-touch-icon" sizes="60x60" href="assets/images/prod/apple-icon-60x60.png">
  <link rel="apple-touch-icon" sizes="72x72" href="assets/images/prod/apple-icon-72x72.png">
  <link rel="apple-touch-icon" sizes="76x76" href="assets/images/prod/apple-icon-76x76.png">
  <link rel="apple-touch-icon" sizes="114x114" href="assets/images/prod/apple-icon-114x114.png">
  <link rel="apple-touch-icon" sizes="120x120" href="assets/images/prod/apple-icon-120x120.png">
  <link rel="apple-touch-icon" sizes="144x144" href="assets/images/prod/apple-icon-144x144.png">
  <link rel="apple-touch-icon" sizes="152x152" href="assets/images/prod/apple-icon-152x152.png">
  <link rel="apple-touch-icon" sizes="180x180" href="assets/images/prod/apple-icon-180x180.png">
  <link rel="icon" type="image/png" sizes="192x192"  href="assets/images/prod/android-icon-192x192.png">
  <link rel="icon" type="image/png" sizes="32x32" href="assets/images/prod/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="96x96" href="assets/images/prod/favicon-96x96.png">
  <link rel="icon" type="image/png" sizes="16x16" href="assets/images/prod/favicon-16x16.png">
  <link rel="manifest" href="assets/images/prod/manifest.json">
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css' />
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css' />
  <link rel='stylesheet' href="assets/css/animate.css">
  <style>
    img[src="https://cdn.000webhost.com/000webhost/logo/footer-powered-by-000webhost-white2.png"] {
        display: none;
    }
</style>
</head>
<body>
  <nav class="navbar navbar-expand-md bg-dark navbar-dark">
    <a class="navbar-brand">Power Bank</a>
</div>
    <div class="collapse navbar-collapse" id="collapsibleNavbar">
      <ul class="navbar-nav ml-auto">

      <li class="nav-item">
      <div class="dropdown">
  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
   Browse By Category
  </button>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
  <a class="dropdown-item" href="prod">All Types</a>
    <a class="dropdown-item" href="prodUSB">USB</a>
    <a class="dropdown-item" href="prodChar">Charges</a>
    <a class="dropdown-item" href="prodEar">Earphones</a>
  </div>
</div>
        </li>
      
        <li class="nav-item">
        <a href="index" class="btn btn-dark" role="button">Home Page</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" onclick="msgBOX()" href="login"><i class="fas fa-shopping-cart"></i> <span id="cart-item" class="badge badge-danger"></span></a>
        </li>
      </ul>
    </div>
  </nav>

  <div class="container">
    <div id="message"></div>
    <div class="row mt-2 pb-3">
      <?php
      
        include 'config.php';
        
  			$stmt = $conn->prepare('SELECT * FROM product WHERE product_type="Power Bank"');
  			$stmt->execute();
  			$result = $stmt->get_result();
  			while ($row = $result->fetch_assoc()):
  		?>
      <div class="col-sm-6 col-md-4 col-lg-3 mb-2">
        <div class="card-deck">
          <div class="card p-2 border-secondary mb-2">
            <img src="<?= $row['product_image'] ?>" class="card-img-top" height="250">
            <div class="card-body p-1">
              <h5 class="card-title text-center text-dark"><?= $row['product_name'] ?></h5>
              <h5 class="card-text text-center text-danger">RM <?= number_format($row['product_price'], 2) ?></h5>

            </div>
            <div class="card-footer p-1">
              <form action="" class="form-submit">
                <div class="row p-2">
                  <div class="col-md-6 py-1 pl-4">
                    <b>Quantity : </b>
                  </div>
                  <div class="col-md-6">
                    <input type="number" min="1" max="1000" onkeyup=enforceMinMax(this) class="form-control pqty" value="<?= $row['product_qty'] ?>">
                  </div>
                </div>
                <input type="hidden" class="pid" value="<?= $row['id'] ?>">
                <input type="hidden" class="pname" value="<?= $row['product_name'] ?>">
                <input type="hidden" class="pprice" value="<?= $row['product_price'] ?>">
                <input type="hidden" class="pimage" value="<?= $row['product_image'] ?>">
                <input type="hidden" class="pcode" value="<?= $row['product_code'] ?>">
                <button class="btn btn-dark btn-block addItemBtn"><i class="fas fa-cart-plus"></i>&nbsp;&nbsp;Add to
                  cart</button>
              </form>
            </div>
          </div>
        </div>
      </div>
      <?php endwhile; ?>
    </div>
  </div>

  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js'></script>
  <script type="text/javascript">
  $(document).ready(function() 
  {
      $(".addItemBtn").click
      ( function(e) 
      {
        e.preventDefault();
        var $form = $(this).closest(".form-submit");
        var pid = $form.find(".pid").val();
        var pname = $form.find(".pname").val();
        var pprice = $form.find(".pprice").val();
        var pimage = $form.find(".pimage").val();
        var pcode = $form.find(".pcode").val();
        var pqty = $form.find(".pqty").val();

      $.ajax
      (
        {
            url: 'action.php',
            method: 'post',
            data: 
        {
            pid: pid,
            pname: pname,
            pprice: pprice,
            pqty: pqty,
            pimage: pimage,
            pcode: pcode
        },
            success: function(response) 
        {
            $("#message").html(response);
            window.scrollTo(0, 0);
             load_cart_item_number();
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

function msgBOX()
{
    alert("You Need to Login First to See Your Shopping Cart");
}
  </script>
</body>
</html>