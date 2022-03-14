<?php
session_start();
  if(!isset($_SERVER['HTTP_REFERER'])){
    //print this messages
    echo '<br><br><br><br><br><br><h1 style="text-align:center;color:red">You Do Not Have Permisson to Access This Server [ 403 Forbidden Error ]</h1>';
    exit;
}
?>

<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="apple-touch-icon" sizes="180x180" href="assets/images/admin/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="assets/images/admin/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="assets/images/admin/favicon-16x16.png">
<link rel="manifest" href="assets/images/admin/site.webmanifest">
    <title>Admin</title>

    <style>
        * {
            font-family: sans-serif;

        }


        .sidebars {
            height: 100%;
            width: 200px;
            position: fixed;
            z-index: 1;
            top: 0;
            left: 0;
            background-image: linear-gradient(aqua,black);
            overflow-x: hidden;
            padding-top: 60px;
            transition: 0.5s;
        }


            .sidebars a {
                padding: 4px 4px 4px 12px;
                text-decoration: none;
                font-size: 24px;
                color: white;
                display: block;
                border: none;
                background: none;
                width: 100%;
                text-align: left;
                cursor: pointer;
                outline: none;
                transition: 0.3s;
            }

                /* On mouse-over */
                .sidebars a:hover {
                    color: black;
                    background-image: linear-gradient(to left,skyblue,purple);
                    border-radius: 12px;
                    text-decoration: none;
                }
                .openbtn {
                  font-size: 14px;
                  cursor: pointer;
                  background-image: linear-gradient(lightgrey,grey);
                  color: white;
                  padding: 8px 12px;
                  border: none;
                  border-radius: 4px;
                  display: block;
                }

                .openbtn:hover {
                  background-image: linear-gradient(white,lightgrey);
                  color:black;
                  border: none;
                }

        h2,p{

          text-align: center;
          font-size: 14px;
        }


        .header {
            padding: 10px;
            background: black;
            color: white;
            font-size: 12px;
            text-align: center;
            padding-top: 5px;
            width: 100%;
            top: 0;
            position: absolute;
            display: inline-inline-block;

        }
        .icon{
            width: 15px;
            height: 15px;


        }
        .pic{
          width: 50px;
          height: 50px;
        }

        /* Main content */
        .main {
          margin-top: 120px;
            padding-top: 20px;
            padding: 0px 10px;
            transition: margin-left .5s;
        }

        /* Some media queries for responsiveness */
        @media screen and (max-height: 450px) {
            .sidenav {
                padding-top: 15px;
            }

                .sidenav a {
                    font-size: 18px;
                }

        }
        
        img[src="https://cdn.000webhost.com/000webhost/logo/footer-powered-by-000webhost-white2.png"] {
        display: none;
    }

    </style>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <script type="text/javascript">


        function openNav() {
            document.getElementById("mySidebar").style.width = "200px";
            document.getElementById("main").style.marginLeft = "200px";
          }

          /* Set the width of the sidebar to 0 and the left margin of the page content to 0 */
        function closeNav() {
            document.getElementById("mySidebar").style.width = "0";
            document.getElementById("main").style.marginLeft = "0";
          }
    </script>


</head>

<body onload=" myfunction()">


      <div id="mySidebar" class="sidebars">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()"><img class="icon" src="img/close_icon.png" alt="close" title="click here for close sidebar"></a>
            <a href="admin"><img class="icon" src="img/dashboard_icon.png" alt="dashboard">Main</a>
            <a href="profileAdmin"><img class="icon" src="img/profile_icon.png" alt="profile">Profile</a>
            <a href="admin_product"><img class="icon" src="img/product_icon.png" alt="product">Product</a>
            <a href="admin_user"><img class="icon" src="img/user_icon.png" alt="user">Staff</a>
            <a href="admin_user2"><img class="icon" src="img/user_icon.png" alt="user">Member</a>
            <a href="admin_order"><img class="icon" src="img/order_icon.png" alt="order">Order</a>
            <a href='logoutAdmin.php'><img class="icon" src="img/logout_icon.png">Logout</a>
      </div>

</body>
</html>
