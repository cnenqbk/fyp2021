<?php
	include 'config.php';

	$id="";
	$name="";
	$email="";
	$phone="";
	$address="";
	$pmode="";
	$products="";
	$amount_paid="";

	if(isset($_POST['add'])){
		$name=$_POST['name'];
		$email=$_POST['email'];
		$phone=$_POST['phone'];
		$address=$_POST['address'];
		$pmode=$_POST['pmode'];
		$products=$_POST['products'];
		$amount_paid=$_POST['amount_paid'];


		$query="INSERT INTO orders(name,email,phone,address,pmode,products,amount_paid)VALUES(?,?,?,?,?,?,?)";
		$stmt=$conn->prepare($query);
		$stmt->bind_param("sssssss",$name,$email,$phone,$address,$pmode,$products,$amount_paid);
		$stmt->execute();
	}
?>
