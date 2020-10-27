<?php
include("dbconnection.php");
if(isset($_GET['id'])){
	if(strcmp($_GET['state'],"0")==0){
	$query = "UPDATE booking set status ='rejected' where bookid='$_GET[id]' ";
	$sql = mysqli_query($conn,$query);

	}else{
		$query = "UPDATE booking set status ='delivered' where bookid='$_GET[id]' ";
	$sql = mysqli_query($conn,$query);
	echo mysqli_error($conn);
	}
}
?>

<head>
<style>
@import url("design.css");
</style>

</head>
<body>
<header>

<h1 >ONLINE MOBILE SHOPPING </h1>
<hr>
</header>

<center><h1 class="verdana">ORDERED DETAILS</h1></center>
<hr>
<?php
$query =  "SELECT * FROM booking ";
$sql = mysqli_query($conn,$query);
while($res=mysqli_fetch_array($sql))
{

?>
<div class="show-container">
<div style="padding:5px">
<h2 class="verdana">Booking Id: <span><?php echo $res['bookid'];?><span></h2>
<h3 class="verdana">Date: <span><?php echo $res['date'];?><span></h3>
<h4 class="verdana">By: <span><?php echo $res['username'];?><span></h4>

</div>
<div style="padding:5px">
<h5 class="verdana">Address: <span style="color:red"><?php echo $res['address'];?><span></h5>
<h5 class="verdana">Pincode: <span style="color:red"><?php echo $res['pincode'];?><span></h5>
<h5 class="verdana">Item No: <span style="color:red"><?php echo $res['itemno'];?><span></h5>

<h5 class="verdana">Status: 
<?php
if($res['status'] == 'delivered'){
?>
<span style="color:green"><?php echo $res['status'];?>
<span>
<?php 
}
else if($res['status'] == 'not delivered'){
?>
<span style="color:black"><?php echo $res['status'];?><span>
<?php 
}
else{
?>
<span style="color:red"><?php echo $res['status'];?><span>


<?php 
}?>

| <a style="color:green;background-color;font-size:15px;border:2px solid black" class="verdana" href="updatebooking.php?id=<?php echo $res['bookid'] ?>&state=1" >Mark as Delivered</a>

| <a style="color:red;background-color;font-size:15px;border:2px solid black" class="verdana" href="updatebooking.php?id=<?php echo $res['bookid'] ?>&state=0" >Mark as Rejected</a>
<!--<input type="button" name="delivered" id="delivered"  value="Mark as Delivered" style="width:150px;height:50px;background-color:green;color:white"/>
<input type="button" name="rejected" id="rejected" value="Mark as Rejected" style="width:150px;height:50px;background-color:red;color:white;"/>
-->

</h5>


</div>

</div>

<?php

}
?>
</body>
