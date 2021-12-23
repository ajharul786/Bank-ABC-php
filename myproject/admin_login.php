
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Admin Login </title>
  <link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico" />
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
 <link rel="stylesheet" type="text/css" href="style/style.css" />
 </head>
<body>

<?php
include("menu.php");
if(isset($_SESSION["email"])){
echo "<script>
window.location.href = 'admin.php';
		</script>";
}else {
}
?>
<div class="container">
<br>
<div class="col-sm-3">
</div>
<div class="col-sm-5">
<h2 class="text-center">Admin Login </h2>
 <?php 
		if(isset($_POST['login'])){
		include("connection.php");
		$email=$_POST['email'];
		$password=$_POST['password'];
		if($email==null || $password==null) echo "<h3 class='text-center'>Please Enter Password And Username</h3>";
		else{
		$qury="select * from admin where email='$email'";
		$reg=mysqli_query($connection, $qury);
		$row=mysqli_fetch_array($reg);
		$uname=$row['name'];
		$dbemail=$row['email'];
		$dbpassword=$row['password'];
		$fullpass=md5($password);
		if($fullpass==$dbpassword && $email==$dbemail){
		echo "<h1> You Are Login </h1>";
		$_SESSION["email"]=$email;
		$_SESSION["name"]=$uname;
		$_SESSION["rank"]="admin";
		echo "<script>
window.location.href = 'admin.php';
		</script>";
		
		
		}else echo "<h3 class='text-center'>Enter valid Email And Password</h3>";
		
		
		}
		}
		?>

  <form class="form-horizontal" action="admin_login.php" method="post">
    <div class="form-group">
      <label class="control-label col-sm-2" for="email">Email:</label>
      <div class="col-sm-10">
        <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="pwd">Password:</label>
      <div class="col-sm-10">          
        <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="password">
      </div>
    </div>
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-primary" name="login" value="Login">Login</button>
      </div>
    </div>
  </form>
</div>
</div>  
  
  
  
<br>
<?php
include("footer.php");
?>

</body>
</html>










<?php 

?>
