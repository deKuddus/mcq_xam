<?php include 'inc/header.php';
	Session::checkSession();

	$total = $exam->getTotalQuestion();

?>


	<div class="testDiv">
		<h2>All Question Answer : <?php echo $total;?></h2>
		<form action="" method="post">
			<table class="tableDesign">
		
					<?php 
						$getAllQues = $exam->getQuestion();
						if($getAllQues){
							while ($data = $getAllQues->fetch_assoc()) {
					?>
					<tr>
					<td colspan="2">
						<h3 style="color: #000;">Ques <?php echo $data['question_no'];?> : <?php echo $data['question'];?></h3>
					</td>
				</tr>
				<?php 
					$questionNo = $data['question_no'];
					$getAnswerByNo = $exam->getAnswerByNo($questionNo);
					if($getAnswerByNo){
						while($ans = $getAnswerByNo->fetch_assoc()){
				?>
				<tr>
					<td>
						<input type="radio"  />
						<?php 
						if($ans['correctAns'] == '1'){
						  echo "<span style = 'color:blue;'>".$ans['answer']."</span>";
						}else{
							echo $ans['answer'];
						}
						?>
					</td>
				</tr>
				<?php } } ?>
				<?php } } ?>
				
			</table>
	</div>
	

     </div>
<?php include 'inc/footer.php';?>
