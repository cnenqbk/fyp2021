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

	if(isset($_POST['add'])){
		$name=$_POST['username'];
		$password=$_POST['password'];
		$fullName=$_POST['full_name'];
		$gender=$_POST['gender'];
		$birth=$_POST['birth'];
		$email=$_POST['email'];
		$status=$_POST['status'];

		$pwd = $_POST['password'];

		if (!preg_match("#.*^(?=.{8,20})(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9]).*$#", $pwd)){
			die('<script type="text/javascript">
			alert("Please Include Your Password atleast 8 Characters Long with Numbers & One Uppercase Character");
			</script>
			');;
		}else

		$query="INSERT INTO admin(username,password,full_name,gender,birth,email,status)VALUES(?,?,?,?,?,?,?)";
		$stmt=$db->prepare($query);
		$stmt->bind_param("sssssss",$name,$password,$fullName,$gender,$birth,$email,$status);
		$stmt->execute();

		header('location:admin_user');
		$_SESSION['response']="Successfully Inserted to the database!";
		$_SESSION['res_type']="success";
	}
	
	if(isset($_GET['delete'])){
		$id=$_GET['delete'];

		$query="DELETE FROM admin WHERE admin_id=?";
		$stmt=$db->prepare($query);
		$stmt->bind_param("i",$id);
		$stmt->execute();

		header('location:admin_user');
		$_SESSION['response']="Successfully Deleted!";
		$_SESSION['res_type']="danger";
	}
	
	if(isset($_GET['details'])){
		$id=$_GET['details'];
		$query="SELECT * FROM admin WHERE admin_id=?";
		$stmt=$db->prepare($query);
		$stmt->bind_param("i",$id);
		$stmt->execute();
		$result=$stmt->get_result();
		$row=$result->fetch_assoc();

		$vid=$row['admin_id'];
		$vname=$row['username'];
		$vpassword=$row['password'];
		$vfullName=$row['full_name'];
		$vgender=$row['gender'];
		$vbirth=$row['birth'];
		$vemail=$row['email'];
		$vstatus=$row['status'];
	}
?>
