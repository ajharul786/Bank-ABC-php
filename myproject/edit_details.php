
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Update </title>
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
if(!isset($_SESSION["email"])){
echo "<script>
window.location.href = 'index.php';
		</script>";
}else {
}
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
		$name=$_POST['name'];
		$lastname=$_POST['lastname'];
		$dob=$_POST['dob'];
		$mob=$_POST['mob'];
		$postcode=$_POST['postcode'];
		$contact=$_POST['contact'];
		$product=$_POST['product'];
		$status=$_POST['status'];
		$query="select * from product where id='$product'";
$view=mysqli_query($connection,$query);
$rows=mysqli_fetch_assoc($view);
$placement_amount=$rows['placement_amount'];
$month=$rows['month']; 
		$lucky_draw_entery=$rows['lucky_draw_entery']; 
		
		if($name==null || $lastname==null || $contact==null || $postcode==null){ echo "<h3 class='text-center'>Please Fill Full Form</h3>";}
		else{
	
	
		$qury="update customer set first_name='$name',last_name='$lastname',DOB='$dob',MOB='$mob',postcode='$postcode',contact='$contact',product_id='$product',status='$status' where application_id='$id'";
		$reg=mysqli_query($connection, $qury);
		if($reg){ 
		
	 ?>

<script>
		window.alert('Update Successfully!');
window.location.href = "admin.php";
		</script>

<?php
}
}
		
		
		}
	
		?>




<?php
if(isset($_GET['id'])){
$id=$_GET['id'];
			$query="select * from customer where application_id='$id'";
$run=mysqli_query($connection,$query);
$rows=mysqli_fetch_array($run);
$id=$rows['application_id'];
$first_name=$rows['first_name'];
$last_name=$rows['last_name'];
$DOB=$rows['DOB'];
$MOB=$rows['MOB'];
$postcode=$rows['postcode'];
$contact=$rows['contact'];
$pid=$rows['product_id'];
$statuss=$rows['status'];
$contact=$rows['contact'];
$query1="select * from product where id='$pid'";
$view1=mysqli_query($connection,$query1);
$rows1=mysqli_fetch_assoc($view1);
$ppid=$rows1['id']; 
$placement_amount1=$rows1['placement_amount']; 
$month1=$rows1['month'];

if($statuss==1){
$status="New";
}
if($statuss==2){
$status="In-process";
}
if($statuss==3){
$status="Complete";
}
if($statuss==4){
$status="On-hold";
}
if($statuss==5){
$status="Withdrawn";
}

}


?>
  <form class="form-horizontal" action="edit_details.php" method="post">
    <input type="hidden" value="<?php echo $id; ?>" name="id" required>
    <div class="form-group">
      <label class="control-label col-sm-3" for="email">First Name:</label>
      <div class="col-sm-9">
        <input type="text" class="form-control" name="name" value="<?php echo $first_name; ?>" required>
      </div>
    </div>
	<div class="form-group">
      <label class="control-label col-sm-3" for="email">Last Name:</label>
      <div class="col-sm-9">
        <input type="text" class="form-control" name="lastname" value="<?php echo $last_name; ?>" required>
      </div>
    </div>
	<div class="form-group">
      <label class="control-label col-sm-3" for="email">Date of birth:</label>
      <div class="col-sm-9">
        <select name="dob" class="form-control">
		<option value="<?php echo $DOB; ?>"><?php echo $DOB; ?> </option>
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
		<option value="<?php echo $MOB; ?>"><?php echo $MOB; ?> </option>
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
        <input type="text" class="form-control" name="postcode" value="<?php echo $postcode; ?>" required>
      </div>
    </div>
	<div class="form-group">
      <label class="control-label col-sm-3" for="pwd">Contact number:</label>
      <div class="col-sm-9">          
        <input type="text" class="form-control" name="contact" value="<?php echo $contact; ?>" required>
      </div>
    </div>
	
	<div class="form-group">
      <label class="control-label col-sm-3" for="email">Product:</label>
      <div class="col-sm-9">
        <select name="product" class="form-control">
		<option value="<?php echo $ppid; ?>">£<?php echo $placement_amount1; echo " "; echo $month1; echo " Month"; ?> </option>
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
      <label class="control-label col-sm-3" for="email">Status:</label>
      <div class="col-sm-9">
        <select name="status" class="form-control">
		<option value="<?php echo $statuss; ?>"><?php echo $status; ?></option>
<option value="1">New</option>
<option value="2">In-process</option>
<option value="3">Complete</option>
<option value="4">On-hold</option>
<option value="5">Withdrawn</option>
		
		
		</select>
      </div>
    </div>
	
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-primary" name="update">Update</button>
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
