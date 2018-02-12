<?php

$filePath = realpath(dirname(__FILE__));
include_once ($filePath.'/../library/Session.php');
include_once ($filePath.'/../library/Database.php');
include_once ($filePath.'/../helper/Format.php');
class Process
{
	private $db;
	private $fm;
	
	function __construct()
	{
		$this->db = new Database();
		$this->fm = new Format();
	}

	public function processNextquestion($data)
	{
		$selectedAns = $this->fm->validation($data['ans']);
		$number = $this->fm->validation($data['number']);

		 $selectedAns = mysqli_real_escape_string($this->db->link, $selectedAns);
		 $number = mysqli_real_escape_string($this->db->link, $number);

		 $next = $number+1;
		 if(!isset($_SESSION["score"])){
		 	$_SESSION["score"] = '0';
		 }

		 $total = $this->getTotalques();
		 $rightAns = $this->rightAnswerByNo($number);

		 if($rightAns == $selectedAns){
		 	$_SESSION["score"]++;
		 }
		 if($number == $total){
		 	header("Location:final.php");
		 }else{
		 	header("Location:test.php?q=".$next);
		 }

	}

	private function getTotalques()
	{
		$query = "SELECT * from tbl_question";
        $result = $this->db->select($query);
        $total =  $result->num_rows;
        return $total;
	}

	private function rightAnswerByNo($number)
	{
		$query = "SELECT * from  tbl_ans WHERE question_no = '$number' AND correctAns = '1'";
        $result = $this->db->select($query)->fetch_assoc();
        $id = $result['id'];
        return $id;
	}
}

?>