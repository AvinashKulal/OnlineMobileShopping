<?php
include("dbconnection.php");
if(isset($_POST['addmobiles']))
{
	$query = "INSERT INTO mobiles(itemno,brand,name,price,image,details,rating) 
	VALUES('$_POST[itemno]',
	'$_POST[brand]',
	'$_POST[name]',
	'$_POST[price]',
	'$_POST[image]',
	'$_POST[details]',
	'$_POST[rating]')";
	$sql = mysqli_query($conn,$query);
	echo ("<script>alert('Mobile added successfull');</script>");
	
}
?>

<head>
<style>
@import url("design.css");
</style>

</head>
<body>
<header>

<h1>ONLINE MOBILE SHOPPING </h1>
<hr>
</header>
<center>

<section class="login-section" style="margin-top:50px;">
<h3>ADD MOBILES</h3>
<form action="" method="post" name="frm">
<input type="text" placeholder="Item Number" name="itemno" value="" required></br>
<input type="text" placeholder="Brand" name="brand" value="" required></br>
<input type="text" placeholder="Name" name="name" value="" required></br>
<input type="text" placeholder="Price" name="price" value="" required></br>
<input type="file"  name="image" value="" required></br>

<textarea placeholder="Details" name="details" id="details" value="" required></textarea></br>
<select name="rating">
<option value= "0">Rating</option>
<option value="1">1</option>
<option value="2">2</option>
<option value="3">3</option>
<option value="4">4</option>
<option value="5">5</option>

</select>

<input style="background-color:red;color:white" type="submit" value="ADD" name="addmobiles">

</form>
</center>

</section>

</form>

</body>
