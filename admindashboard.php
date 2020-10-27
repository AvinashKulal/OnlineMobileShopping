<?php
if(isset($_POST['addmobiles']))
	echo "<script>window.location='addmobiles.php'</script>";

else if(isset($_POST['deletemobiles']))
	echo "<script>window.location='deletemobiles.php'</script>";
else if(isset($_POST['updatebooking']))
	echo "<script>window.location = 'updatebooking.php'</script>";

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

<center><h1 class="verdana">ADMIN DASHBOARD</h1></center>
<hr>
<form name="frm" method="post">
<center>
<section class="login-section" style="margin-top:50px;background-color:white">
<form action="" method="post" name="frm">

<input style="background-color:steelblue;color:white" type="submit" value="Add Mobiles" name="addmobiles" >
<input style="background-color:steelblue;color:white" type="submit" value="Update Booking" name="updatebooking">

</form>
</center>

</section>

</form>

</body>
