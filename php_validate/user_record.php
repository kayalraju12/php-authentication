<?php
//include('../connection.php');
if (isset($_POST['submit'])) {
	$name=trim($_POST['name']);
	$email=trim($_POST['email']);
	$phone=trim($_POST['phone']);
	$address=trim($_POST['address']);
	$qualification=trim($_POST['qualification']);
	if (empty($name)) {
		$name_error_message="Error: please enter your name";
	}
	//check if the number field is numeric
	elseif (empty($phone)) {
		$phone_error_message="Error: please enter your phone number";
		
	}
	elseif (is_numeric(trim($phone))== false) {
		$phone_error_message="Error:please Enter numeric value";
		
			}
	elseif (strlen($phone)<10) {
				$phone_error_message="Error:Number should be ten digits ";
				
			}
	elseif (empty($email)) {
		$email_error_message="Error:please enter your email id";
	}
	elseif(!preg_match("/^[_.0-9a-zA-Z-]+@([0-9a-zA-Z][0-9a-zA-Z-]+.)+[a-zA-Z]{2,6}$/i", $email)){
  		$email_error_message = "not valid email !";
 
	 }
	 elseif (empty($address)) {
	 	$address_error_message="Error: please enter your address";
	 }
	 elseif (empty($qualification)) {
	 	$qual_error_message="Error:please enter your qualification";
	 }


}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>php validate</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <style type="text/css" >
  .error{border:1px solid red; }
  .message{color: red; font-weight:bold; }
 </style>
</head>
<body>
	
<div class="container">
  <h2>Student Registration Form</h2>
 
  <form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
      <label for="usr">Name:</label>
      <input type="text" class="form-control" id="usr" name="name" value="">
      <span style="color: red;"><?php if(isset($name_error_message)){ echo $name_error_message;}?></span>
    </div>
    <div class="form-group">
      <label for="pwd">Email:</label>
      <input type="email" class="form-control" id="pwd" name="email">
      <span style="color: red;"><?php if(isset($email_error_message)){ echo $email_error_message;}?></span>
    </div>
    <div class="form-group">
      <label for="pwd">Phone:</label>
      <input type="text" class="form-control" id="pwd" name="phone">
      <span style="color: red;"><?php if(isset($phone_error_message)){ echo $phone_error_message;}?></span>
    </div>
    <div class="form-group">
      <label for="pwd">Address:</label>
      <input type="text" class="form-control" id="pwd" name="address">
       <span style="color: red;"><?php if(isset($address_error_message)){ echo $address_error_message;}?></span>
    </div>
     <div class="form-group">
      <label for="pwd">Qualification:</label>
      <input type="text" class="form-control" id="pwd" name="qualification">
      <span style="color: red;"><?php if(isset($qual_error_message)){ echo $qual_error_message;}?></span>
    </div>
    <input type="submit" name="submit" value="submit" class="btn btn-primary">
  </form>
</div>

</body>
</html>
<?php
include('../connection.php');
if (isset($_POST['submit'])) {
	$name=$_POST['name'];
	$email=$_POST['email'];
	$phone=$_POST['phone'];
	$address=$_POST['address'];
	$qualification=$_POST['qualification'];
	$query="insert into valid_user (name, email, phone, address, qualification) values ('$name', '$email', '$phone', '$address', '$qualification')";
	$sql=mysqli_query($conn,$query);
	if ($sql) {
		echo "success";
	}
	else{
		echo "faild";
	}
}

?>

