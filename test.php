<?php include 'inc/header.php';
	Session::checkSession();

	if(isset($_GET['q'])){
		$questionNo = $_GET['q'];
	}else{
		header("Location:exam.php");
	}
	$getQuestionByNo = $exam->getQuestionByNo($questionNo);
	$total = $exam->getTotalQuestion();

	if($_SERVER['REQUEST_METHOD'] == "POST"){
		$processNextquestion  = $process->processNextquestion($_POST);
	}
?>


	<div class="testDiv">
		<h2>Question no <?php echo $getQuestionByNo['question_no']." of ".$total;?></h2>
		<form action="" method="post">
			<table class="tableDesign">
				<tr>
					<td colspan="2">
						<h3 style="color: #000;">Ques <?php echo $getQuestionByNo['question_no'];?> : <?php echo $getQuestionByNo['question'];?></h3>
					</td>
				</tr>
				<?php 
					$getAnswerByNo = $exam->getAnswerByNo($questionNo);
					if($getAnswerByNo){
						while($ans = $getAnswerByNo->fetch_assoc()){
				?>
				<tr>
					<td>
						<input type="radio" name="ans" value="<?php echo $ans['id'];?>"/><?php echo $ans['answer'];?>
					</td>
				</tr>
				<?php }}?>
				<tr>
					<td >
						<input type="submit" name="submit" value="NextQuestion">
						<input type="hidden" name="number" value="<?php echo $questionNo;?>">
					</td>
				</tr>
			</table>
		</form>
	</div>
	

     </div>
<?php include 'inc/footer.php';?>
