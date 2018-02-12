<?php 
		include 'inc/header.php';
	  	include 'inc/navigation.php';

	  	if(isset($_GET['delId'])){
	  		$userId = $_GET['delId'];
	  		$deleteUserById = $user->deleteUserById($userId);
	  	}
	  	if(isset($_GET['disableId'])){
	  		$userDisableId = $_GET['disableId'];
	  		$disableUserById = $user->disableUserById($userDisableId);
	  	}
	  	if(isset($_GET['enableId'])){
	  		$userEnableId = $_GET['enableId'];
	  		$enableUserById = $user->enableUserById($userEnableId);
	  	}
	  	
	  		

?>
	<div class="profileDiv">
		<h2>User Data</h2>
		<?php
			if(isset($deleteUserById)){
				echo $deleteUserById;
				}
			if(isset($disableUserById)){
				echo $disableUserById;
				}
			if(isset($enableUserById)){
				echo $enableUserById;
				}
		?>
		<table class="tableDesign">
			<tr>
				<th>NO</th>
				<th>Name</th>
				<th>User Name</th>
				<th>Email</th>
				<th>Action</th>
			</tr>
			<?php
				$getUserData = $user->getUserData();
				if($getUserData){
					$i = 0;
				while($data = $getUserData->fetch_assoc()){
					$i++;
			?>
			<tr>
				<td>
					<?php 
						if($data['status'] == '1'){
							echo "<span class = 'error'>".$i."</span>";
						}else{
							echo $i;
						}
					?>
						
					</td>
				<td><?php echo $data['name'];?></td>
				<td><?php echo $data['userName'];?></td>
				<td><?php echo $data['email'];?></td>
				<td>
					<?php
						if($data['status'] == '0'){?>
						<a onclick="return confirm('Are you sure to Disable?');" href="?disableId=<?php echo $data['id'];?>">Disable</a>
						<?php }else{?>
						<a onclick="return confirm('Are you sure to Enable?');" href="?enableId=<?php echo $data['id'];?>">Enable</a>
						<?php } ?>
						|| <a onclick="return confirm('Are you sure to delete?');" href="?delId=<?php echo $data['id'];?>">Remove</a>

				</td>
			</tr>
			<?php } }?>
		</table>
	</div>
	
		

     </div>
<?php include 'inc/footer.php';?>
<!-- <?php if($data['status'] == '0'){ ?>
						<a onclick="return confirm('Are you sure to Disable?');" href="?disableId=<?php echo $data['id'];?>">Disable</a>
					<?php } else{?>
					<a onclick="return confirm('Are you sure to Enable?');" href="?enableId=<?php echo $data['id'];?>">Enable</a>
					<?php } ?>
					|| <a onclick="return confirm('Are you sure to delete?');" href="?delId=<?php echo $data['id'];?>">Remove</a> -->