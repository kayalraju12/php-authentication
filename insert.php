<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>crude</title>
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
          echo "Welcome:".strtoupper($name[0]);
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
  <h2>Student Registration Form</h2>
 
  <form action="insert_query.php" method="post" enctype="multipart/form-data">
    <div class="form-group">
      <label for="usr">Name:</label>
      <input type="text" class="form-control" id="usr" name="name">
    </div>
    <div class="form-group">
      <label for="pwd">Email:</label>
      <input type="email" class="form-control" id="pwd" name="email">
    </div>
    <div class="form-group">
      <label for="pwd">Phone:</label>
      <input type="text" class="form-control" id="pwd" name="phone">
    </div>
    <div class="form-group">
      <label for="pwd">Address:</label>
      <input type="text" class="form-control" id="pwd" name="address">
    </div>
     <div class="form-group">
      <label for="pwd">Qualification:</label>
      <input type="text" class="form-control" id="pwd" name="qualification">
    </div>
    <div class="form-group">
      <label for="pwd">Image:</label>
      <input type="file" class="form-control" id="pwd" name="image">
    </div>
    <input type="submit" name="submit" value="submit" class="btn btn-primary">
  </form>
</div>

</body>
</html>
