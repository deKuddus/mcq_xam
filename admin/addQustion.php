<?php 
		include 'inc/header.php';
	  	include 'inc/navigation.php';
		if(isset($_GET['action']) && $_GET['action'] == "logout"){
			Session::sessionDestroy();
			 header("Location:login.php");
		}

		if($_SERVER['REQUEST_METHOD'] == "POST"){
			$addQuestion = $exam->addQuestion($_POST);
		}

		//get previous total number of question
		$total = $exam->getTotalQuestion();
		$next = $total+1;
?>
	<div class="profileDiv">
		<h2>Admin Control Panel- Add Question</h2>
		<?php
			if(isset($addQuestion)){
				echo $addQuestion;
			}
		?>
		<div class="welcomeAdmin">
			<form action="" method="post">
				<table class="tableDesign">
					<tr>
						<td>Question NO</td>
						<td>:</td>
						<td><input type="number" value="<?php
									if(isset($next)){
										echo $next;
									}
								?>" name="question_no"></td>
					</tr>
					<tr>
						<td>Question</td>
						<td>:</td>
						<td><input type="text" name="question" required="required" placeholder="Your Question Write here.."></td>
					</tr>
					<tr>
						<td>Choice One</td>
						<td>:</td>
						<td><input type="text" name="ans1" required="required" placeholder="choice answer one"></td>
					</tr><tr>
						<td>Choice Two</td>
						<td>:</td>
						<td><input type="text" name="ans2" required="required"  placeholder="choice answer two"></td>
					</tr>
					<tr>
						<td>Choice Three</td>
						<td>:</td>
						<td><input type="text" name="ans3" required="required" placeholder="choice answer three"></td>
					</tr>
					<tr>
						<td>Choice Four</td>
						<td>:</td>
						<td><input type="text" name="ans4" required="required" placeholder="choice answer four"></td>
					</tr>
					<tr>
						<td>Correct Ans Number</td>
						<td>:</td>
						<td><input type="number" name="correctAns" required="required"></td>
					</tr>
					<tr><td></td>
						<td></td>
						<td ><input type="submit" value="Add Question"></td>
					</tr>
				</table>
			</form>
		</div>
	</div>
	
		

     </div>
<?php include 'inc/footer.php';?>
