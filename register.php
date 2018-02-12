<?php include 'inc/header.php';?>


	<div class="sameDiv">
		<img src="image/register.png" alt="">
	</div>
	<div class="sameDiv">
		<h2>Register First.</h2>
		<p id="showRegMsg"></p>
		<form action="">
			<table class="tableDesign">
				<tr>
					<td>Name:</td>
					<td><input type="text" name="name" id="name" placeholder="your  Name"></td>
				</tr>
				<tr>
					<td>User Name:</td>
					<td><input type="text" id="userName" name="userName" placeholder="your user Name"></td>
				</tr>
				<tr>
					<td>User Email:</td>
					<td><input type="email" id="email" name="email" placeholder="your user email"></td>
				</tr>
				<tr>
					<td>User Password:</td>
					<td><input type="password" id="password" name="password" placeholder="your user Password"></td>
				</tr>
				<tr>
					<td></td>
					<td><input type="submit" id="register" value="Register"></td>
				</tr>
			</table>
		</form>
		<p>Already Registerd?? <a href="login.php">Login</a> Here</p>
	</div>
		

     </div>
<?php include 'inc/footer.php';?>
