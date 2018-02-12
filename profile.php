<?php include 'inc/header.php';
	Session::checkSession();

	 /* if(!isset($_GET['ggg'])){
    	echo "<meta http-equiv='refresh' content='0;URL=?ggg=1'/>";
   }*/

?>


	<div class="profileDiv">
		<h2>Your Profile Page</h2>

		<span class="emptymsg hide">Input field must not empty</span>
		<span class="invalidemail hide">Invalid Email</span>
		<span class="failed hide">Profile Not Updated</span>
		<span class="pupdate">Profile  Updated</span>

		<form action="" method="post">
			<?php 
				$userId = Session::get("id");
				$getUserData = $user->getUserDataById($userId);
				if($getUserData){
					while ($data = $getUserData->fetch_assoc()) {?>
		<table class="tableDesign">
			<tr>
				<td>Name:</td>
				<td><input type="text" name="name" id="name"  value="<?php echo $data['name']; ?>"> </td>
			</tr>
			<tr>
				<td>User Name:</td>
				<td><input type="text" name="userName" id="userName" value="<?php echo $data['userName']; ?>"> </td>
			</tr>
			<tr>
				<td>Email:</td>
				<td><input type="email" name="email" id="email" value="<?php echo $data['email']; ?>"> </td>
			</tr>
			<tr>
				<td></td>
				<td><input type="hidden" name="id" id="id" value="<?php echo $data['id']; ?>"> </td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" id="profileupdate" value="Update"> </td>
			</tr>
		</table>
		<?php } } ?>
		 </form>
	</div>
	
		

     </div>
<?php include 'inc/footer.php';?>
