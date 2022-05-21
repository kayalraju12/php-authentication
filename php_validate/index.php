<?php

if(isset($_POST['signup']))
{
 $uname = trim($_POST['uname']);
 $email = trim($_POST['email']);
 $upass = trim($_POST['pass']);
 $mno = trim($_POST['mno']);
 
 if(empty($uname))
 {
  $error = "enter your name !";
  $code = 1;
 }
 else if(!ctype_alpha($uname))
 {
  $error = "letters only !";
  $code = 1;
 }
 else if(empty($email))
 {
  $error = "enter your email !";
  $code = 2;
 }
 else if(!preg_match("/^[_\.0-9a-zA-Z-]+@([0-9a-zA-Z][0-9a-zA-Z-]+\.)+[a-zA-Z]{2,6}$/i", $email))
 {
  $error = "not valid email !";
  $code = 2;
 }
 else if(empty($mno))
 {
  $error = "Enter Mobile NO !";
  $code = 3;
 }
 else if(!is_numeric($mno))
 {
  $error = "Numbers only !";
  $code = 3;
 }
 else if(strlen($mno)!=10)
 {
  $error = "10 characters only !";
  $code = 3;
 }
 else if(empty($upass))
 {
  $error = "enter password !";
  $code = 4;
 }
 else if(strlen($upass) < 8 )
 {
  $error = "Minimum 8 characters !";
  $code = 4;
 }
 else
 {
  ?>
        <script>
        alert('success');
  document.location.href='index.php';
        </script>
        <?php
 }
}
?>
<meta name="viewport" content="width=device-width, initial-scale=1">
<h2 align="center">Server Side form Validation in PHP</h2>
<form method="post">
<table align="center" width="50%" border="0">
<?php
if(isset($error))
{
 ?>
    <tr>
    <td id="error" style="color:red; "><?php echo $error; ?></td>
    </tr>
    <?php
}
?>
<tr>
<td><input type="text" name="uname" placeholder="User Name" value="<?php if(isset($uname)){echo $uname;} ?>"  <?php if(isset($code) && $code == 1){ echo "autofocus"; }  ?> /></td>
</tr>
<tr>
<td><input type="text" name="email" placeholder="Your Email"  value="<?php if(isset($email)){echo $email;} ?>" <?php if(isset($code) && $code == 2){ echo "autofocus"; }  ?> /></td>
</tr>
<tr>
<td><input type="text" name="mno" placeholder="Mobile No" value="<?php if(isset($mno)){echo $mno;} ?>" <?php if(isset($code) && $code == 3){ echo "autofocus"; }  ?> /></td>
</tr>
<tr>
<td><input type="password" name="pass" placeholder="Your Password" <?php if(isset($code) && $code == 4){ echo "autofocus"; }  ?> /></td>
</tr>
<tr>
<td><button type="submit" name="signup">Submit</button></td>
</tr>
</table>
