
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Update Details </title>
  <link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico" />
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
 <link rel="stylesheet" type="text/css" href="style/style.css" />
 </head>
<body>

<?php
include("menu.php");
include("connection.php");
?>
<div class="container">
<br>
<div class="col-sm-3">
</div>
<div class="col-sm-5">
<h2 class="text-center">Update Details </h2>
<br>

<?php 
		if(isset($_POST['update'])){
		include("connection.php");
		$id=$_POST['id'];
		$product=$_POST['product'];
		$status=$_POST['status'];
	
		$qury="update customer set product_id='$product',status='$status' where application_id='$id'";
		$reg=mysqli_query($connection, $qury);
		if($reg){ 
		
	 ?>

<script>
		window.alert('Update Successfully!');
window.location.href = "index.php";
		</script>

<?php
}
		
		
		}
	
		?>


<?php
if(isset($_POST['srch'])){

$id=$_POST['id'];
		$lastname=$_POST['lastname'];
		$postcode=$_POST['postcode'];
			$query="select * from customer where application_id='$id' AND last_name='$lastname' AND postcode='$postcode'";
$run=mysqli_query($connection,$query);
$rowcount1=mysqli_num_rows($run);
if($rowcount1==0){
echo "<h3 align='center'>Result Not Found</h3>";
}
else {
$rows=mysqli_fetch_array($run);
$id=$rows['application_id'];
$first_name=$rows['first_name'];
$last_name=$rows['last_name'];

$pid=$rows['product_id'];
$statuss=$rows['status'];
$query1="select * from product where id='$pid'";
$view1=mysqli_query($connection,$query1);
$rows1=mysqli_fetch_assoc($view1);
$ppid=$rows1['id']; 
$placement_amount1=$rows1['placement_amount']; 
$month1=$rows1['month'];
?>
<form class="form-horizontal" action="update_details.php" method="post">
    <input type="hidden" value="<?php echo $id; ?>" name="id" required>
		<div class="form-group">
      <label class="control-label col-sm-3" for="email">Product:</label>
      <div class="col-sm-9">
        <select name="product" class="form-control">
		<option value="<?php echo $pid; ?>">£<?php echo $placement_amount1; echo " "; echo $month1; echo " Month"; ?> </option>
		<?php 
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
      <label class="control-label col-sm-3" for="email">Want To Withdrawn:</label>
      <div class="col-sm-9">
	  <label class="radio-inline">
      <input type="radio" name="status" value="5">Yes
    </label>
    <label class="radio-inline">
      <input type="radio" name="status" value="1" checked>No
    </label>
	  </div> 
	  </div>
	
	   <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-primary" name="update">Update</button>
      </div>
    </div>
  </form>

<?php 


}
}
?>

<?php if(isset($_POST['srch'])){  } else { ?>

  <form class="form-horizontal" action="update_details.php" method="post">
    <div class="form-group">
      <label class="control-label col-sm-3" for="email">Application ID:</label>
      <div class="col-sm-9">
        <input type="text" class="form-control" name="id" required>
      </div>
    </div>
	<div class="form-group">
      <label class="control-label col-sm-3" for="email">Last Name:</label>
      <div class="col-sm-9">
        <input type="text" class="form-control" name="lastname" required>
      </div>
    </div>


	
    <div class="form-group">
      <label class="control-label col-sm-3" for="pwd">Postcode:</label>
      <div class="col-sm-9">          
        <input type="text" class="form-control" name="postcode" required>
      </div>
    </div>

	
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-primary" name="srch">Search Request</button>
      </div>
    </div>
  </form>
  
  <?php } ?>
  
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
