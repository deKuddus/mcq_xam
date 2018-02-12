<?php include 'inc/header.php';
	Session::checkSession();

	$total = $exam->getTotalQuestion();
	$qustionNumber = $exam->getQuestionNumber();

?>


	<div class="testDiv">
		<h2>Some Info About This Exam</h2>
		
		<ul>
			<li><strong>Number Of Question :</strong> <?php echo $total;?></li>
			<li><strong>Type Of Question :</strong> Multiple Choice</li>
		</ul>
		<br/>
		<a href="test.php?q=<?php echo $qustionNumber['question_no'];?>">Let's Start</a>
	</div>
	

     </div>
<?php include 'inc/footer.php';?>
