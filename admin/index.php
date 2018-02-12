<?php 
		include 'inc/header.php';
	  	include 'inc/navigation.php';



		if(isset($_GET['action']) && $_GET['action'] == "logout"){
			Session::sessionDestroy();
			header("Location:login.php");
		}



?>
	<div class="profileDiv">
		<h2>Admin Control Panel</h2>
		<div class="welcomeAdmin">
			<h2>Welcome To Admin Panel</h2>
			<p>Hi!! Admin,You can control your exam system from here.</p>
		</div>
	</div>
	
		

     </div>
<?php include 'inc/footer.php';?>
