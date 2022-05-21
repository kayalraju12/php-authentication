<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Student Login</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
<nav class="navbar navbar-light bg-warning" style="margin-top: 15px;">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">WebSiteName</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="#">Home</a></li>
      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Page 1 <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="#">Page 1-1</a></li>
          <li><a href="#">Page 1-2</a></li>
          <li><a href="#">Page 1-3</a></li>
        </ul>
      </li>
      <li><a href="#">Page 2</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li>
        <?php
       // print_r($_)+
        if (isset($_SESSION['id'])) {
          $name=explode(' ', $_SESSION['name']);
          echo "Welcome".strtoupper($name[0])."<br>";
        }
        else{
        ?>

        <a href="signup.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a>
      <?php } ?>
      </li>

      <li>
        <?php
        if (isset($_SESSION['id'])) {?>
          
        
      
        <a href="logout.php"><span class="glyphicon glyphicon-log-in"></span>Logout</a>
        <?php } else{?>
      </li>

      <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a>
        <?php } ?>
      </li>
    </ul>
  </div>
</nav>
<div class="container">
  <h2>Student Login</h2>
 
  <form action="" method="post">
 
    <div class="form-group">
      <label for="usr">Email:</label>
      <input type="email" class="form-control" id="usr" name="email">
    </div>
      <div class="form-group">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control" id="pwd" name="password">
    </div>
 
     <input type="submit" name="login" value="Login" class="btn btn-primary">
  </form>
</div>

</body>
</html>
<?php
include('connection.php');
if (isset($_POST['login'])) {

		$email=$_POST['email'];		
		$password=$_POST['password'];

		$query="SELECT * FROM users where email='$email' and password='$password'";
		$sql=mysqli_query($conn,$query);
		$row=mysqli_fetch_array($sql);
		if (is_array($row)) {
			//echo "<script> alert('login successfull')</script>";
			//header('location:show.php');
			$_SESSION["id"]=$row['id'];
			$_SESSION["name"]=$row['name'];
			//print_r($_SESSION); exit();
			//echo $_SESSION["id"]; exit();
			
			header('location:show.php');
			
		}
		else{
			echo "<script> alert('login failed')</script>";
		}
	
	
}


?>