<?php
session_start();
include('connection.php');

if (isset($_POST['submit'])) {
	$name=$_POST['name'];
	$email=$_POST['email'];
	$phone=$_POST['phone'];
	$address=$_POST['address'];
	$qualification=$_POST['qualification'];

	$file_name=$_FILES['image']['name'];
	//print_r($file_name); exit();
	$file_type=$_FILES['image']['type'];
	$file_size=$_FILES['image']['size'];
	$file_temp_loc=$_FILES['image']['tmp_name'];
	$file_store="upload/".$file_name;
	move_uploaded_file($file_temp_loc, $file_store);
	//print_r($file_name);
	
	$query = "INSERT INTO student (name, email, phone, address, qualification, image) VALUES ('$name', '$email', '$phone', '$address', '$qualification', '$file_name')";
	$sql=mysqli_query($conn,$query);

	if ($sql) {
		//echo "<script> alert('insert data successfully');</script>";
		//sleep(5);
		$_SESSION['success']='insert data successfully';
		header('location:show.php');

	}
	else{
		$_SESSION['error']='insert record failed';
		header('location:show.php');
		//echo "<script> alert('failed');</script>";
	}
	

}



?>