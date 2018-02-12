<?php

$filePath = realpath(dirname(__FILE__));
include_once ($filePath.'/../library/Database.php');
include_once ($filePath.'/../helper/Format.php');
class Exam
{
	private $db;
	private $fm;
	
	function __construct()
	{
		$this->db = new Database();
		$this->fm = new Format();
	}

    public function getQuestion()
    {
        $query = "SELECT * from tbl_question ORDER BY id ASC";
        $result = $this->db->select($query);
        return $result;
    }

    public function questionDeleteByNo($questionDelId)
    {
        $tables = array("tbl_question","tbl_ans");
        foreach ($tables as $table) {
           $query ="DELETE from $table WHERE question_no = '$questionDelId'";
           $result = $this->db->delete($query);
        }
        if($result != false){
            $message =  "<span class= 'success'>Question has been deleted.</span>";
            return  $message;
        }else{
            $message =  "<span class= 'error'>Question has not been deleted.</span>";
            return  $message;
        }
    }

    public function getTotalQuestion()
    {
        $query = "SELECT * from tbl_question";
        $result = $this->db->select($query);
        $total =  $result->num_rows;
        return $total;
    }

    public function addQuestion($data)
    {
        $questionNo = $this->fm->validation($data['question_no']);
        $question = $this->fm->validation($data['question']);
        $choiceOne = $this->fm->validation($data['ans1']);
        $choiceTwo = $this->fm->validation($data['ans2']);
        $choiceThree = $this->fm->validation($data['ans3']);
        $choiceFour = $this->fm->validation($data['ans4']);
        $correctAns = $this->fm->validation($data['correctAns']);

        $questionNo = mysqli_real_escape_string($this->db->link, $questionNo);
        $question = mysqli_real_escape_string($this->db->link, $question);
        $choiceOne = mysqli_real_escape_string($this->db->link, $choiceOne);
        $choiceTwo = mysqli_real_escape_string($this->db->link, $choiceTwo);
        $choiceThree = mysqli_real_escape_string($this->db->link, $choiceThree);
        $choiceFour = mysqli_real_escape_string($this->db->link, $choiceFour);
        $correctAns = mysqli_real_escape_string($this->db->link, $correctAns);

        $choiceAnsArray = array();
        $choiceAnsArray[1] = $choiceOne;
        $choiceAnsArray[2] = $choiceTwo;
        $choiceAnsArray[3] = $choiceThree;
        $choiceAnsArray[4] = $choiceFour;

        $query ="INSERT INTO tbl_question (question_no, question)VALUES('$questionNo','$question')";
        $inserteRows = $this->db->insert($query);
        if($inserteRows){
            foreach ($choiceAnsArray as $key => $choice) {
               if($choice != ""){
                if($correctAns == $key){
                    $rquery ="INSERT INTO tbl_ans (question_no,correctAns,answer)VALUES('$questionNo','1', '$choice')";
                }else{
                   $rquery ="INSERT INTO tbl_ans (question_no, correctAns,answer)VALUES('$questionNo','0', '$choice')"; 
                }
                $inserteRows = $this->db->insert($rquery);
                if($inserteRows){
                    continue;
                }else{
                    die('Error.....');
                }
               }
            }

            $message =  "<span class= 'success'>Question has been inserted.</span>";
            return  $message;
        }

    }
        public function getQuestionNumber()
        {
            $query = "SELECT * from tbl_question";
        $result = $this->db->select($query);
        $number =  $result->fetch_assoc();
        return $number;
        }

        public function getQuestionByNo($questionNo)
        {
            $query = "SELECT * from tbl_question WHERE question_no = '$questionNo' ";
            $result = $this->db->select($query);
            $number =  $result->fetch_assoc();
            return $number;
        }

        public function getAnswerByNo($questionNo)
        {
            $query = "SELECT * from tbl_ans WHERE question_no = '$questionNo' ";
            $result = $this->db->select($query);
            return $result;
        }
}

?>