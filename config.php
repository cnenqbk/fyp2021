<?php
    //connection for cart
    $conn = new mysqli("localhost", "id15248527_cwtxyzc", "LvatunB0212!", "id15248527_cart_system");
    
    if($conn->connect_error)
    {
		die("Connection Failed !".$conn->connect_error);
	}
?>