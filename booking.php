<?php 



?>

<head>

<style>


@import url("design.css");


</style>
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
session_start();
$query = "SELECT * FROM booking join mobiles on booking.itemno = mobiles.itemno and username='$_SESSION[user]' ORDER BY date ASC ";
$sql = mysqli_query($conn,$query);
while($res = mysqli_fetch_array($sql))
{
?>
<div class="booking-container">
<img src="<?php echo $res['image'];?>" width="75%" height="100%" style="border:2px solid black;background-color:white">
<div >
<h1 class="verdana" style="color:red;text-decoration:underline"><?php echo $res['name'] ?></h1>
<h2 class="verdana" style="color:white;">&#x20B9; <?php echo $res['price'] ?></h2>
<h3 class="verdana" style="color:white">Delivery Charge : <span style="color:yellow;"><?php echo $res['delivery']*10 ?></span></h3>
<h3 class="verdana" style="color:white">Total : <span style="color:yellow">&#x20B9; <?php echo $res['price']+$res['delivery'] ?></span></h3>
</div>

<div>
<h3 class="verdana">Booking Reference Number :<span>BK<?php echo $res['bookid']?></span></h3>
<h3 class="verdana">To :<span > <?php echo $res['address'] ?> <span></h3>
<h3 class="verdana">Pincode : <span > <?php echo $res['pincode'] ?> </span></h3>
<h3 class="verdana">Booking Time: <span  > <?php echo $res['date'] ?> </span></h3>
<?php if($res['status']=="delivered"){
	
	?>
<h1 style="color:yellow;"class="verdana">Delivered</h1>
<?php
}
else{
	


 ?>
 <h1 style="color:red;" class="verdana">Not delivered</h1>
 <?php
}
?>

</div>

</div>

<?php
}
?>




<footer style="float:right;margin-right:50px;">

<code>&copy;AvinashKulal</code>
</footer>
</body>
