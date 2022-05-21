<?php 
include('connection.php');
	session_start();
  // if (!isset($_SESSION['id'])) {
  //   header('location:login.php');
  
  //}


?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
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
          echo "<span class='glyphicon glyphicon-user'>Welcome:&nbsp".strtoupper($name[0]);
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
  <h2>Student Record Table</h2>
   <a href="insert.php" class="btn btn-info">Insert</a>

  <p>
  	<?php
  	if (isset($_SESSION['success'])) { ?> 	
  	<div class="alert alert-success">
  <strong>Info!</strong> <?php echo $_SESSION['success'];?>
</div>
<?php 
}
unset($_SESSION['success']);
  	?>
</p>

<p>
  	<?php
  	if (isset($_SESSION['error'])) { ?>
  	
  	
  	<div class="alert alert-danger">
  <strong>Info!</strong> <?php echo $_SESSION['error'];?>
</div>
<?php 
}
unset($_SESSION['error']);
  	?>
</p>             
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>id</th>
        <th>Name</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Address</th>
        <th>Qualification</th>
        <th>Image</th>
        <th colspan="3">Action</th>
      </tr>
    </thead>
    <tbody>
    	<?php
    	include('connection.php');
    	$sql="select * from student";
    	$query = mysqli_query($conn,$sql);
    	?>
    	<?php while($row=mysqli_fetch_assoc($query)){ ?>

	<tr>
        <td><?php echo $row['id'];?></td>
        <td><?php echo $row['name'];?></td>
        <td><?php echo $row['email'];?></td>
         <td><?php echo $row['phone'];?></td>
        <td><?php echo $row['address'];?></td>
        <td><?php echo $row['qualification'];?></td>
        <td><img src="upload/<?php echo $row['image'];?>" width="150px" height="100px"></td>
      
        <td><a href="update.php?id=<?= $row['id']?>" class="btn btn-primary a-btn-slide-text">
        <span class="glyphicon glyphicon-edit" ></span>
        <span><strong>Update</strong></span>            
    </a></td>
        
       <td> <a href="delete.php?id=<?= $row['id']?>" class="btn btn-primary a-btn-slide-text">
       <span class="glyphicon glyphicon-remove"></span>
        <span><strong>Delete</strong></span>            
    </a></td>
      </tr>

    	<?php
  }
      ?>
    </tbody>
  </table>
</div>

</body>
</html>