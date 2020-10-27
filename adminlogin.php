<?php 

if(isset($_POST['login'])){
	if( strcmp($_POST['adminname'],"admin")==0 and strcmp($_POST['loginpassword'],"admin")==0){
		echo("<script>alert('Login Successfully....');</script>");
	echo("<script>window.location='admindashboard.php'</script>");}
	else
		echo("<script>alert('Admin not exists....');</script>");
	
	
	
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

<form name="frm" method="post">
<center>
<section class="login-section" style="margin-top:50px">
<h3>ADMIN LOGIN</h3>
<form action="" method="post" name="loginform" onsubmit="return loginFormValidate()">
<input type="text" placeholder="Admin Name.." name="adminname" id="adminname" required></br>
<input type="password" placeholder="password" name="loginpassword" required></br>
<input style="background-color:red;color:white" type="submit" value="LOGIN" name="login">

</form>
</center>

</section>
</form>

</body>
