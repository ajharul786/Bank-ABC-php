
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Register for Product Interest </title>
  <link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico" />
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
 <link rel="stylesheet" type="text/css" href="style/style.css" />
 </head>
<body>

<?php
include("menu.php");
?>
<div class="container">
<br>
<div class="col-sm-3">
</div>
<div class="col-sm-5">
<h2 class="text-center">Register for Product Interest </h2>
<br>
  <form class="form-horizontal" action="submit_request.php" method="post">
    <div class="form-group">
      <label class="control-label col-sm-3" for="email">First Name:</label>
      <div class="col-sm-9">
        <input type="text" class="form-control" name="name" required>
      </div>
    </div>
	<div class="form-group">
      <label class="control-label col-sm-3" for="email">Last Name:</label>
      <div class="col-sm-9">
        <input type="text" class="form-control" name="lastname" required>
      </div>
    </div>
	<div class="form-group">
      <label class="control-label col-sm-3" for="email">Date of birth:</label>
      <div class="col-sm-9">
        <select name="dob" class="form-control">
		<option value="#">Select Date </option>
		<?php for($i=1; $i<32; $i++){ ?>
		<option value="<?php echo $i; ?>"><?php echo $i; ?> </option>
		
		<?php }
		?>
		</select>
      </div>
    </div>
	
	<div class="form-group">
      <label class="control-label col-sm-3" for="email">Month of Birth:</label>
      <div class="col-sm-9">
        <select name="mob" class="form-control">
		<option value="#">Select Month </option>
		<option value="January">January</option>
		<option value="February">February </option>
		<option value="March">March </option>
		<option value="April">April </option>
		<option value="May">May </option>
		<option value="June">June </option>
		<option value="July">July </option>
		<option value="August">August </option>
		<option value="September">September </option>
		<option value="October">October </option>
		<option value="November">November </option>
		<option value="December">December </option>
		
		
		</select>
      </div>
    </div>
	
    <div class="form-group">
      <label class="control-label col-sm-3" for="pwd">Postcode:</label>
      <div class="col-sm-9">          
        <input type="text" class="form-control" name="postcode" required>
      </div>
    </div>
	<div class="form-group">
      <label class="control-label col-sm-3" for="pwd">Contact number:</label>
      <div class="col-sm-9">          
        <input type="text" class="form-control" name="contact" required>
      </div>
    </div>
	
	<div class="form-group">
      <label class="control-label col-sm-3" for="email">Product:</label>
      <div class="col-sm-9">
        <select name="product" class="form-control">
		<option value="#">Select Product </option>
		<?php include("connection.php");
$query="select * from product";
$view=mysqli_query($connection,$query);
while($rows=mysqli_fetch_assoc($view)){
$id=$rows['id'];
$placement_amount=$rows['placement_amount'];
$month=$rows['month']; 

?>
		<option value="<?php echo $id; ?>">£<?php echo $placement_amount; echo " "; echo $month; echo " Month"; ?> </option>
		
		<?php }
		?>
		</select>
      </div>
    </div>
    <div class="form-group">        
      <div class="col-sm-offset-3 col-sm-9">
        <button type="submit" class="btn btn-primary" name="add">Submit</button>
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
