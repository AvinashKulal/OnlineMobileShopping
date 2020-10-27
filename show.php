<html>
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<style>

@import url("design.css");
.mobile-img img{
	
	line-height:100%;
	width:100%;
}
</style>
</head>
<body>
<header>


<h1>ONLINE MOBILE SHOPPING </h1>
<nav>&nbsp;
<a  href="dashboard.php">HOME</a>&nbsp;&nbsp;
<a  href="booking.php">BOOKED</a>&nbsp;&nbsp;
<a  href="loginregister.php">LOGOUT</a>&nbsp;&nbsp;
<a  href="javascript:window.history.back()">&laquo;GO-BACK</a>&nbsp;&nbsp;

</nav>
</header>
<?php 
include("dbconnection.php");
$required = $_GET['id'];

if(isset($_POST['submit'])){
	session_start();
	$itemno  = $_GET['id'];
	$query = "INSERT INTO booking(itemno,username,address,pincode,delivery,status)VALUES($itemno,'$_SESSION[user]','$_POST[address]','$_POST[pincode]','$_POST[delivery]','not delivered') ";
	$sql = mysqli_query($conn,$query);
	if(mysqli_affected_rows($conn)==1){
		echo ("<script>alert('Booking successfully');</script>");
		echo ("<script>window.location='booking.php'</script>");
	}else{
	echo ("<script>alert('unsuccessfully');</script>");
		
	}
	echo mysqli_error($conn);
}


$query = "SELECT * FROM mobiles where itemno=$required ";
$sql = mysqli_query($conn,$query);
$result = mysqli_fetch_array($sql);

?>
<div class="show-container">
<div class="mobile-img">

<img src="<?php echo $result['image'] ?>"/>
</div>
<div class="mobile-desc" style="padding:5px;background-color:rgba(255,0,255,0.2);">




<h1 style="text-transform:uppercase;color:blue"><?php echo $result['name']; ?></h1>
<h3 style="color:red"><?php echo $result['brand']; ?></h3>
<?php 
$rate = $result['rating'];
for($i = 0;$i<5;$i++){
	
if($i<$rate){
?>
<span class="fa fa-star checked"></span>
<?php 
}
else 
{
	?>
<span class="fa fa-star"></span>
<?php
}
}
?>
<h5 style="color:green">&#x20B9 <?php echo $result['price']; ?></h5>
<p style="font-size:20px"><?php echo $result['details'];?>.</p>
</div>


</div>

<hr>
<header style="height:50px;">
<h1>BOOK ORDER</h1>
</header>
<hr>
<div style="background-color:#eee;">
<form action="" name="frm" method="POST">
<input type="text" value="<?php echo $result['name'];?>" readonly></br>

<input type="text" value="&#x20B9;<?php echo $result['price'];?>" readonly></br>

<textarea placeholder="address" name="address" id="address" required></textarea></br>
<input type="text" placeholder="pincode" name="pincode" id="pincode" required></br>
<select name="delivery" id="delivery" required>
<option value="none">Delivery In</option>
<option value="50">2 days</option>
<option value="30">3 days</option>
<option value="0">4+ days</option>
</select></br>
<input style="background-color:green;color:white" type="submit" value="PURCHASE" name="submit" >
</form>
</div>
<footer style="float:right;margin-right:50px;">

<code>&copy;AvinashKulal</code>
</footer>
</body>
</html>
