<?php
session_start();
include('connection.php');
$delete=$_GET['id'];
$query="delete from student where id='$delete'";
$sql=mysqli_query($conn,$query);
if($sql){
	$_SESSION['success']='delete success';
	header('location:show.php');
}
else{
	$_SESSION['error']='delete failed';
	header('location:show.php');

}
?>