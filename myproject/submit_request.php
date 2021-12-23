

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
<h2 class="text-center">Summary Page </h2>

 <?php 
		if(isset($_POST['add'])){
		include("connection.php");
		$name=$_POST['name'];
		$lastname=$_POST['lastname'];
		$dob=$_POST['dob'];
		$mob=$_POST['mob'];
		$postcode=$_POST['postcode'];
		$contact=$_POST['contact'];
		$product=$_POST['product'];
		$dbname='';
		$dblast='';
		$query="select * from product where id='$product'";
$view=mysqli_query($connection,$query);
$rows=mysqli_fetch_assoc($view);
$placement_amount=$rows['placement_amount'];
$month=$rows['month']; 
		$lucky_draw_entery=$rows['lucky_draw_entery']; 
		$status=1;
		$day=date("d");
		$subdate=date("d-M-Y");
		$rand=rand(100008,995545);
		$firstTwo = substr($name, 0, 2);
		$lastTwo = substr($lastname, 0, 2);
		$lastpost=substr($postcode, strlen($postcode)-2);
		$applicationid=$lastTwo."".$firstTwo."".$lastpost."".$day."".$rand."";
		$qury1="select * from customer where first_name='$name' AND last_name='$lastname'";
		$check=mysqli_query($connection, $qury1);
		$rowcount1=mysqli_num_rows($check);
if($rowcount1==0){

}
else {
		$rows=mysqli_fetch_array($check);
		$dbname=$rows['first_name'];
		$dblast=$rows['last_name'];
}
		if($name==null || $lastname==null || $contact==null || $postcode==null) echo "<h3 class='text-center'>Please Fill Full Form</h3>";
		else{
		if($dbname==$name && $dblast==$lastname){echo"<h3 class='text-center'>The User is Already Registerd</h3>";}
		else {
	
		$qury="insert into customer (application_id,first_name,last_name,DOB,MOB,postcode,contact,sub_date,product_id,status) values ('$applicationid','$name','$lastname','$dob','$mob','$postcode','$contact','$subdate','$product','$status')";
		$reg=mysqli_query($connection, $qury);
		if($reg){ 
		echo "<h3>Successfully Registered</h3>
		<b>Name:</b> ".$name." ".$lastname."<br>";
		echo "<b>Product:</b> ".$placement_amount."<br>";
		echo "<b>Application ID:</b> ".$applicationid."<br><br>";
		
		echo "Thank you for your interest to open a Time Deposit Account with us under this campaign. Your application ID is <b>".$applicationid."</b>. Only one application is allowed per customer. You will have <b>".$lucky_draw_entery."</b> entries for the lucky draw (stand a chance to win <b>£".$placement_amount."</b>) upon successful deposit placement until the end of account tenure.
Your record has been successfully submitted. You may update your record as long as your application status is “new” by providing the application ID from this link”<br><br>";
		echo "<img src='images/gift.jpg' class='img-responsive'>";
		
		
		
}
}
		
		}
		
		
		}
		
		else {
		
		echo "<script>
window.location.href = 'customer.php';
		</script>";
		}
		?>
</div>
  
  
  
<br>
<?php
include("footer.php");
?>

</body>
</html>










<?php 

?>
