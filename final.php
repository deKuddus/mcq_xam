<?php include 'inc/header.php';
	Session::checkSession();

?>


	<div class="testDiv">
		<h2>Congrats! You have done.</h2>

		<p><b>Your Final Score:</b> 
			<strong><?php
				if(isset($_SESSION["score"])){
					echo $_SESSION["score"];
					unset($_SESSION["score"]);
				}
			?></strong>
			
		</p>
		
		<br/>
		<a href="viewAns.php">View Answer</a>
		<a href="test.php">Start Again</a>
	</div>
		

     </div>
<?php include 'inc/footer.php';?>
