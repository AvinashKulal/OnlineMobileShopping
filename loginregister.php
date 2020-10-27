<?php
include("dbconnection.php");




if(isset($_POST['register'])){
	$query = "SELECT * FROM user where username='$_POST[username]'";
	$sql = mysqli_query($conn,$query);
	if(mysqli_num_rows($sql)>=1){
		echo("<script>alert('user already exists..Please Login');</script>");
	}else{
		
		$query = "INSERT INTO user(username,password,address) values('$_POST[username]','$_POST[password]','$_POST[address]')";
		$sql = mysqli_query($conn,$query);
		if(mysqli_affected_rows($conn)==1){
			echo("<script>alert('User Registered Successfully....');</script>");
		}
	}
}
if(isset($_POST['login'])){
	$query = "SELECT * FROM user where username='$_POST[loginusername]' and password='$_POST[loginpassword]'";
	$sql = mysqli_query($conn,$query);
	if(mysqli_affected_rows($conn)==0){
	
			echo("<script>alert('User Not Registers...');</script>");
	}else{
		session_start();
		$_SESSION["user"] = $_POST['loginusername'];
		echo("<script>alert('Login successfully...');</script>");
		echo("<script> window.location='dashboard.php'</script>");
	}
	
}


?>


<html>
<head>
<meta http-equiv="refresh" content="9000">
<style>
@import url("design.css");



</style>
</head>
<body>
<header>

<h1>ONLINE MOBILE SHOPPING </h1>
<hr>
</header>


<aside>
<figure>
<img src="mobile.jpg" />
<p>Mobile phone usage is on the rise and smartphone lovers are on a constant hunt to ... Flipkart is the right platform for you to look for a mobile phone that fits your ... log on to your favourite shopping website, compare the new iPhone SE price</p>
</figure>

</aside>

<section class="login-section">
<h3>LOGIN</h3>
<form action="" method="post" name="loginform" onsubmit="return loginFormValidate()">
<input type="text" placeholder="User Name.." name="loginusername" id="loginusername" required></br>
<input type="password" placeholder="password" name="loginpassword" required></br>
<input class = "button" type="submit" value="LOGIN" name="login">

</form>


</section>
</br>


<section class="register-section">
<h3>REGISTER</h3>
<form action="" method="post" onsubmit="return formValidate()" name="registerfrm" id="registerfrm">
<input type="text" placeholder="User Name.." name="username" value="" required></br>
<input type="password" placeholder="password" name="password" id="password" value="" required></br>
<input type="password" placeholder="re type password" name="retypepassword" id="retypepassword" value="" required></br>
<textarea placeholder="address" name="address" id="address" value="" required></textarea></br>
<input class="button" type="submit" value="REGISTER" name="register" id="register">

</form>

</section>



<footer style="float:right;margin-right:50px;">

<code>&copy;AvinashKulal :<a style="color:black;font-size:10px;" href="adminlogin.php">admin</a></code>
</footer>


</body>
<script type="text/javascript">

if ( window.history.replaceState ) { 

        window.history.replaceState( null, null, window.location.href ); 
    } 



function formValidate(){
	
	
	var expnumericExpression = /^[0-9]+$/;
	var expalphaExp = /^[a-zA-Z]+$/;
	var flag = true;
	
	if(!(document.registerfrm.username.value.match(expalphaExp))){
		flag = false;
	}
	if(document.registerfrm.password.value.length<6 || !(document.registerfrm.password.value.match(expnumericExpression))){
		flag = false;
	}
	if(document.registerfrm.password.value!=document.registerfrm.retypepassword.value){
	flag = false;
	}
	
	
	return flag;
	
}

function loginFormValidate(){
	var expalphaExp = /^[a-zA-Z]+$/;
	flag = true;
	if(!(document.loginform.loginusername.value.match(expalphaExp))){
		flag = false;
	}
	return flag;
	
}
</script>


</html>
