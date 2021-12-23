<?php
session_start();
?>
<html>
<head>
</head>
<body>
<div class="container">
    <div class="col-sm-12"> <center>
      <img src="images/logo.png" class="img-responsive" style="width:40%;" alt="Image"> </center>
    </div> </div>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
 
    </div>
	
    <div class="collapse navbar-collapse" id="myNavbar">
	<center>
	<?php if(!isset($_SESSION["email"])){ ?>
      <ul class="nav navbar-nav">
        <li><a href="index.php">Home</a></li>
        <li><a href="customer.php">Join Campaign</a></li>
		<li><a href="update_details.php">Update Details</a></li>
        <li><a href="admin_login.php">Admin Page</a></li>
      </ul>
	  <?php } else {?>
	  <ul class="nav navbar-nav">
        <li><a href="admin.php">Manage Campaign Page</a></li>
		<li><a href="logout.php">Logout</a></li>
      </ul>
	  <?php } ?>
    </div>
  </div>
</nav>


</body>
</html>


<?php 

?>
