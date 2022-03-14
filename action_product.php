<?php
	if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
	include 'config.php';

	$update=false;
	$id="";
	$productName="";
	$productQty="";
	$productPrice="";
	$productType="";
	$productImage="";
	$productCode="";

	if(isset($_POST['add'])){
		$productName=$_POST['product_name'];
		$productQty=$_POST['product_qty'];
		$productPrice=$_POST['product_price'];
		$productType=$_POST['product_type'];
		$productCode=$_POST['product_code'];

		$productImage=$_FILES['image']['name'];
		$upload="assets/images/".$productImage;

		$query="INSERT INTO product(product_name,product_qty,product_price,product_type,product_image,product_code)VALUES(?,?,?,?,?,?)";
		$stmt=$conn->prepare($query);
		$stmt->bind_param("sssssi",$productName,$productQty,$productPrice,$productType,$upload,$productCode);
		$stmt->execute();
		move_uploaded_file($_FILES['image']['tmp_name'], $upload);

		header('location:admin_product');
		$_SESSION['response']="Successfully Inserted to the database!";
		$_SESSION['res_type']="success";
	}

	if(isset($_GET['delete'])){
		$id=$_GET['delete'];

		$sql="SELECT product_image FROM product WHERE id=?";
		$stmt2=$conn->prepare($sql);
		$stmt2->bind_param("i",$id);
		$stmt2->execute();
		$result2=$stmt2->get_result();
		$row=$result2->fetch_assoc();

		$imagepath=$row['product_image'];

		$query="DELETE FROM product WHERE id=?";
		$stmt=$conn->prepare($query);
		$stmt->bind_param("i",$id);
		$stmt->execute();

		header('location:admin_product');
		$_SESSION['response']="Successfully Deleted!";
		$_SESSION['res_type']="danger";
	}
	if(isset($_GET['edit'])){
		$id=$_GET['edit'];

		$query="SELECT * FROM product WHERE id=?";
		$stmt=$conn->prepare($query);
		$stmt->bind_param("i",$id);
		$stmt->execute();
		$result=$stmt->get_result();
		$row=$result->fetch_assoc();

		$id=$row['id'];
		$productName=$row['product_name'];
		$productQty=$row['product_qty'];
		$productPrice=$row['product_price'];
		$productType=$row['product_type'];
		$productImage=$row['product_image'];
		$productCode=$row['product_code'];

		$update=true;
	}
	if(isset($_POST['update'])){
		$id=$_POST['id'];
		$productName=$_POST['product_name'];
		$productQty=$_POST['product_qty'];
		$productPrice=$_POST['product_price'];
		$productType=$_POST['product_type'];
    $oldimage=$_POST['oldimage'];
		$productCode=$_POST['product_code'];

		if(isset($_FILES['image']['name'])&&($_FILES['image']['name']!="")){
			$newimage="assets/images/".$_FILES['image']['name'];
			move_uploaded_file($_FILES['image']['tmp_name'], $newimage);
		}
		else{
			$newimage=$oldimage;
		}
		$query="UPDATE product SET product_name=?,product_qty=?,product_price=?,product_type=?,product_image=?,product_code=? WHERE id=?";
		$stmt=$conn->prepare($query);
		$stmt->bind_param("sssssii",$productName,$productQty,$productPrice,$productType,$newimage,$productCode,$id);
		$stmt->execute();

		$_SESSION['response']="Updated Successfully!";
		$_SESSION['res_type']="primary";
		header('location:admin_product');
	}

?>
