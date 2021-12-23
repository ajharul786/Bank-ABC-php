<!DOCTYPE html>
<html lang="en">
<head>
  <title>Manage Campaign</title>
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
<h2 class="text-center">Admin Page: Manage Campaign </h2>
<form action="admin.php" method="post">
<select name="search">
<option value="#">Select Status</option>
<option value="1">New</option>
<option value="2">In-process</option>
<option value="3">Complete</option>
<option value="4">On-hold</option>
<option value="5">Withdrawn</option>
</select>
<input type="submit" name="srch" value="Filter">

</form>


<?php
if(isset($_GET['id'])){
$lid=$_GET['id'];
$query = "delete from customer where application_id='$lid'";
$run=mysqli_query($connection,$query);
if($run) echo "<h3 class='text-center'> Customer Delete Successfully </h3>";
}


if(isset($_POST['srch'])){
$status=$_POST['search'];
$query="select * from customer where status='$status'";
}
else{
$query="select * from customer";
}

echo"<br><center><div class='table-responsive'><table class='table table-bordered'><thead> <tr><th>Application ID</th><th>First Name</th><th>Last Name</th><th>DOB</th><th>Postal Code</th><th>Contact No</th><th>Product</th><th>Status</th><th>Action</th></tr></thead>";
$view=mysqli_query($connection,$query);
$rowcount1=mysqli_num_rows($view);
if($rowcount1==0){
echo "<h3 align='center'>Result Not Found</h3>";
}
else {
echo"<tbody><tr>";
while($rows=mysqli_fetch_assoc($view)){
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
$product=$rows1['placement_amount']; 


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

echo"
<th>".$id."</th>
<th>".$first_name."</th>
<th>".$last_name."  </th>
<th>".$DOB." ".$MOB."</th>
<th>".$postcode."</th>
<th>".$contact." </th>
<th>".$product." </th>
<th>".$status." </th>
<th><a href='edit_details.php?id=$id' class='btn btn-primary'> Update </a>
<br><br>";
?>
<?php 
if($statuss==5){
echo "<a href='admin.php?id=$id' class='btn btn-danger'> Delete </a>";
}
?>
<?php
echo "
</th>
</tr></tbody>";
}}
echo "</table></div> </center>";

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
