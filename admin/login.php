
<?php include 'inc/header.php';


	$filePath = realpath(dirname(__FILE__));
    include_once ($filePath.'/../library/Session.php');
    Session::checkAdminLogin();

	$filePath = realpath(dirname(__FILE__));
	include_once ($filePath.'/../classes/Admin.php');

	$admin = new Admin();

	if($_SERVER['REQUEST_METHOD'] == "POST"){
		$getAdminData = $admin->getAdminData($_POST);
	}
?>

	<div class="profileDiv">
		<h2>Admin Login</h2>
		<div class="welcomeAdmin">
			<form action="" method="post">
				<table class="tableDesign">
				<tr>
					<td>Admin Name</td>
					<td>:</td>
					<td><input type="text" name="adminName" placeholder="your user name" ></td>
				</tr>
				<tr>
					<td>User password</td>
					<td>:</td>
					<td><input type="password" name="password" placeholder="your user password" ></td>
				</tr>
				<tr>
					<td></td>
					<td></td>
					<td><input type="submit" name="login" value="Login"></td>
				</tr>
				<tr>
					<td colspan="3">
						<?php
							if(isset($getAdminData)){
								echo $getAdminData;
							}
						?>
					</td>
				</tr>
			</table>
			</form>
		</div>
	</div>
	
		

     </div>
<?php include 'inc/footer.php';?>
