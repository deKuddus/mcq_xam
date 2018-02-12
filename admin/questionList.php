<?php 
		include 'inc/header.php';
	  	include 'inc/navigation.php';

	  	if(isset($_GET['delQuesId'])){
	  		$questionDelId = $_GET['delQuesId'];
	  		$questionDeleteByNo = $exam->questionDeleteByNo($questionDelId);
	  	}
	  		

?>
	<div class="profileDiv">
		<h2>Question List</h2>
		<?php
			if(isset($questionDeleteByNo)){
				echo $questionDeleteByNo;
			}
		?>
		<table class="tableDesign">
			<tr>
				<th width="10%">NO</th>
				<th width="70%">Question</th>
				<th width="20%">Action</th>
			</tr>
			<?php
				$getQuestion = $exam->getQuestion();
				if($getQuestion){
					$i = 0;
				while($data = $getQuestion->fetch_assoc()){
					$i++;
			?>
			<tr>
				
				<td><?php echo $i; ?></td>
				<td><?php echo $data['question'];?></td>
				<td>
					<a onclick="return confirm('Are you sure to delete?');" href="?delQuesId=<?php echo $data['question_no'];?>">Remove</a>
				</td>
			</tr>
			<?php } }?>
		</table>
	</div>
	
		

     </div>
<?php include 'inc/footer.php';?>
