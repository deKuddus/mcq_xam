<?php
	$filePath = realpath(dirname(__FILE__));
	include_once ($filePath.'/../library/Database.php');
	include_once ($filePath.'/../helper/Format.php');
	include_once ($filePath.'/../library/Session.php');
	class User 
	{
		private $db;
		private $fm;
		function __construct()
		{
			$this->db = new Database();
			$this->fm = new Format();
		}

		public function getUserData()
		{
			$query = "SELECT * from tbl_user ORDER BY id DESC";
			$result = $this->db->select($query);
			return $result;
		}

		public  function deleteUserById($userId)
		{
			$query = "DELETE from tbl_user WHERE id = '$userId'";
			$result = $this->db->delete($query);
			if($result != false){
				 $message =  "<span style='color:green; font-size: 20px;'>User Has been Deleted Successfully</span>";
            return  $message;
			}else{
				 $message =  "<span style='color:red; font-size: 20px;'>User Not Deleted </span>";
            return  $message;
			}
		}

		public function disableUserById($userDisableId)
		{
			$query = "UPDATE tbl_user SET status = '1' WHERE id = '$userDisableId'";
			$result = $this->db->update($query);
			if($result != false){
				$message =  "<span style='color:green; font-size: 20px;'>User is Disable</span>";
            return  $message;
			}else{
				$message =  "<span style='color:green; font-size: 20px;'>User is not Disable</span>";
            return  $message;
			}
		}

		public function enableUserById($userEnableId)
		{

			$query = "UPDATE tbl_user SET status = '0' WHERE id = '$userEnableId'";
			$result = $this->db->update($query);
			if($result != false){
				$message =  "<span style='color:green; font-size: 20px;'>User is Enable</span>";
            return  $message;
			}else{
				$message =  "<span style='color:green; font-size: 20px;'>User is not Enable</span>";
            return  $message;
			}
		}


		public function userRegisteration($name,$userName,$email,$password)
		{
			$name = $this->fm->validation($name);
			$userName = $this->fm->validation($userName);
			$email = $this->fm->validation($email);
			$password = $this->fm->validation($password);

			$name = mysqli_real_escape_string($this->db->link, $name);
			$userName = mysqli_real_escape_string($this->db->link, $userName);
			$email = mysqli_real_escape_string($this->db->link, $email);
			$password = mysqli_real_escape_string($this->db->link, md5($password));

			if($name == "" || $userName == "" || $email == "" || $password == ""){
				echo "<span class='error'>Input field must not be empty.</span>";
				exit();
			}elseif(filter_var($email, FILTER_VALIDATE_EMAIL) === false){
				echo "<span class='error'>Invalid Email Address.</span>";
				exit();
			}else{
				$checkUser = "SELECT * from  tbl_user WHERE email = '$email'";
				$selected_rows = $this->db->select($checkUser);
				if($selected_rows != false){
					echo "<span class='error'> Email Already Exist.</span>";
					exit();
				}else{
					$insertQuery = "INSERT INTO tbl_user (name,userName,email,password)VALUES('$name','$userName','$email','$password')";
					$insertedRow = $this->db->insert($insertQuery);
					if($insertedRow != false){
						echo "<span class='success'> Registration Successfull.</span>";
						exit();
					}else{
						echo "<span class='error'> Registration Not Successfull.</span>";
						exit();
					}
				}
			}


		}

			public function userLogin($email,$password)
			{
				$email = $this->fm->validation($email);
				$password = $this->fm->validation($password);

				$email = mysqli_real_escape_string($this->db->link, $email);
				$password = mysqli_real_escape_string($this->db->link, md5($password));

				if($email == "" || $password == ""){
					echo "empty";
					exit();
				}else if(filter_var($email, FILTER_VALIDATE_EMAIL) === false){
					echo "invalid";
					exit();
				}else{
					$query = "SELECT * from tbl_user WHERE email = '$email' AND password = '$password'";
					$result = $this->db->select($query);
					if($result != false){
						$data = $result->fetch_assoc();
						if($data['status'] == '1'){
							echo "disable";
							exit();
						}else{
							Session::sessioninit();
        					Session::set("login",true);
        					Session::set("id",$data['id']);
							Session::set("name",$data['name']);
							Session::set("userName",$data['userName']);
							exit();
						}
					}else{
						echo "error";
						exit();
					}
				}
			}

			public function getUserDataById($userId)
			{
				$query = "SELECT * from tbl_user WHERE id = '$userId'";
				$result = $this->db->select($query);
				return $result;
			}

			public function userProfileUpdate($data)
			{

			$name = $this->fm->validation($data['name']);
			$userName = $this->fm->validation($data['userName']);
			$email = $this->fm->validation($data['email']);
			$userid = $this->fm->validation($data['id']);

			$name = mysqli_real_escape_string($this->db->link, $name);
			$userName = mysqli_real_escape_string($this->db->link, $userName);
			$email = mysqli_real_escape_string($this->db->link, $email);
			$userid = mysqli_real_escape_string($this->db->link, $userid);

			if($name == "" || $userName == "" || $email == "") {
					echo "emptymsg";
					exit();
				}else if(filter_var($email, FILTER_VALIDATE_EMAIL) === false){
					echo "invalidemail";
					exit();
				}else{
					
						$query = "UPDATE tbl_user SET 
						name = '$name',
						userName = '$userName',
						email = '$email'
						WHERE id = '$userid'";
						$result = $this->db->update($query);
						if($result != true){
							echo "failed";
							exit();
						}
				}
			}
		
	}
?>