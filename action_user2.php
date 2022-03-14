<?php
	if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
	include 'connection.php';

	$update=false;
	$id="";
	$name="";
	$password="";
	$fullName="";
	$gender="";
	$birth="";
	$email="";
	$status="";
    
	
	if(isset($_GET['delete'])){
	    $name=$_POST['username'];
		$password=$_POST['password'];
		$fullName=$_POST['full_name'];
		$gender=$_POST['gender'];
		$birth=$_POST['birth'];
		$email=$_POST['email'];
		$status=$_POST['status'];
		$id=$_GET['delete'];

		$query="DELETE FROM member WHERE member_id=?";
		$stmt=$db->prepare($query);
		$stmt->bind_param("i",$id);
		$stmt->execute();

		header('location:admin_user2');
		$_SESSION['response']="Successfully Deleted!";
		$_SESSION['res_type']="danger";
	}
	
	if(isset($_GET['details'])){
		$id=$_GET['details'];
		$query="SELECT * FROM member WHERE member_id=?";
		$stmt=$db->prepare($query);
		$stmt->bind_param("i",$id);
		$stmt->execute();
		$result=$stmt->get_result();
		$row=$result->fetch_assoc();

		$vid=$row['member_id'];
		$vname=$row['username'];
		$vpassword=$row['password'];
		$vfullName=$row['full_name'];
		$vgender=$row['gender'];
		$vbirth=$row['birth'];
		$vemail=$row['email'];
		$vstatus=$row['status'];
	}
?>
