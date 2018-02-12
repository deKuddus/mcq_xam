
<?php include 'inc/header.php';
Session::checkLogin();
$chk = Session::get("name");
echo $chk;
?>

<div class="sameDiv">
		<img src="image/login.png" alt="">
	</div>
<div class="sameDiv">
	<h2>Login with your user email and password</h2>
	<form action="" method="POST">
		<table class="tableDesign">
			<tr>
				<td>Email:</td>
				<td><input type="email" name="email" id="email" placeholder="your user Email"> </td>
			</tr>
			<tr>
				<td>User Password:</td>
				<td><input type="password" name="password" id="password" placeholder="your user Password"></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" id="loginSubmit" value="Login"></td>
			</tr>
		</table>
	</form>
	<p>Not Registerd? <a href="register.php">Register</a> Here!</p>
	<span class="empty hide">Input field must not empty</span>
	<span class="invalid hide">Invalid Email</span>
	<span class="disabe hide">Account Disabled</span>
	<span class="error hide">Account Not Found</span>
</div> 
		

     </div>
<?php include 'inc/footer.php';?>











<!-- <?php include 'inc/header.php';?>

    <div class="maincontent">
	<div class="sameDiv">
		<img src="image/login.png" alt="">
	</div>
<div class="sameDiv">
	<h2>Login with your user name and password</h2>
	<form action="" method="POST">
		<table class="tableDesign">
			<tr>
				<td>Email:</td>
				<td><input type="email" name="loginEmail" id="loginEmail" placeholder="your user Email"> </td>
			</tr>
			<tr>
				<td>User Password:</td>
				<td><input type="Password" name="logPassword" id="logPassword" placeholder="your user Password"></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" id="loginSubmit" value="Login"></td>
			</tr>
		</table>
	</form>
	<p>Not Registerd? <a href="register.php">Register</a> Here!</p>
	<span class="empty hide">Input field must not empty</span>
	<span class="invalid hide">Invalid Email</span>
	<span class="disabe hide">Account Disabled</span>
	<span class="error hide">Account Not Found</span>
</div> 

     </div>
<?php include 'inc/footer.php';?>
 -->