<?php

$filePath = realpath(dirname(__FILE__));
include_once ($filePath.'/../library/Database.php');
include_once ($filePath.'/../library/Session.php');
include_once ($filePath.'/../helper/Format.php');
class Admin
{
	private $db;
	private $fm;
	
	function __construct()
	{
		$this->db = new Database();
		$this->fm = new Format();
	}

	public function getAdminData($data)
	{
		$adminName = $this->fm->validation($data['adminName']);
		$password = $this->fm->validation($data['password']);

        $adminName = mysqli_real_escape_string($this->db->link, $adminName);
        $password = mysqli_real_escape_string($this->db->link, md5($password));

        if($adminName == "" OR $password == ""){
        	 $message =  "<span style='color:red; font-size: 20px;'>User Name or Password must not empty</span>";
            return  $message;
        }else{

        $query = "SELECT * FROM  tbl_admin WHERE adminName  = '$adminName' AND password = '$password'";
        $result = $this->db->select($query);
        if($result != false){
        	$value = $result->fetch_assoc();
        	Session::sessioninit();
        	Session::set("adminLogin" , true);
        	Session::set("adminName" , $value['adminName']);
        	Session::set("userID" , $value['id']);
        	header("location:index.php");
        }else{
		 $message =  "<span style='color:red; font-size: 20px;'>User Name or Password not match</span>";
            return  $message;
        }
	}
	}
}

?>