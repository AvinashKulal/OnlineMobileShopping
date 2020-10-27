<html>
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<style>

@import url("design.css");

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
<hr>
<div class = "outer-container">
<div class="main-container">

<?php 
include("dbconnection.php");

$query = "SELECT * FROM mobiles";
$sql = mysqli_query($conn,$query);
$count = 0;
while($result = mysqli_fetch_array($sql))
{
	if($count == 6)break;
	$count++;
	
	?>
	
	
	
	<div class="grid-item" >
<img width="75%" src="<?php echo $result['image']; ?>"/>
<p style="color:red;font-size:20px;text-decoration:underline;font-family:Verdana;"><?php echo $result['brand']; ?> | <?php echo $result['name']; ?></p>
<p style="color:green;font-family:Stencil;">&#x20B9; <?php echo $result['price'];?>

|
<?php 
$i = 0;
while($i<$result['rating']){
	
?>	
<span class="fa fa-star checked" ></span>


<?php
	$i++;
}
while($i<5){
	
	
	
$i++;
?>
<span class="fa fa-star" ></span>
<?php
}
?>



</p>
</div>

<?php	
}

?>

</div>
<div class="sidepanel">
<img src="kajaladd.jpg"/>


</div>





</div>

<hr>
<header style="height:50px;">
<h1>MORE MOBILES</h1>
</header>

<div class="more-products">
<table border="1px">
<tr>
<th> NAME</th>
<th>COST</th>
<th>IMAGE</th>
<th colspan="2">DETAILS</th>

</tr>
<?php

$query = "SELECT * FROM mobiles";
$sql = mysqli_query($conn,$query);

while($result = mysqli_fetch_array($sql))
{
?>


<tr>
<td><?php  echo $result['name'];?></td>
<td>&#x20B9;<?php  echo $result['price'];?></td>
<td><img src="<?php  echo $result['image'];?>" width="100px" height="50px"/></td>
<td style="color:red"><?php  echo substr($result['details'],0,100)?>......</td>
<td style="background-color:blue;"><a style="color:white;text-decoration:none" href="show.php?id='<?php echo $result['itemno'];?>'">show more</a></td>
</tr>

<?php
}
?>

</table>


</div>

<footer style="float:right;margin-right:50px;">

<code>&copy;AvinashKulal</code>
</footer>



</body>
</html>
