<?php

include_once 'dbconfig.php';

class USER
{	

	private $conn;
	
	public function __construct()
	{
		$database = new Database();
		$db = $database->dbConnection();
		$this->conn = $db;
    }
	
	public function runQuery($sql)
	{
		$stmt = $this->conn->prepare($sql);
		return $stmt;
	}
	
	public function lasdID()
	{
		$stmt = $this->conn->lastInsertId();
		return $stmt;
	}
	
	public function register($uname,$email,$upass,$code,$class)
	{
		try
		{							
			$password = md5($upass);
			$stmt = $this->conn->prepare("INSERT INTO tbl_users(userName,userEmail,userPass,tokenCode,class) 
			                                             VALUES(:user_name, :user_mail, :user_pass, :active_code, :Class)");
			$stmt->bindparam(":user_name",$uname);
			$stmt->bindparam(":user_mail",$email);
			$stmt->bindparam(":user_pass",$password);
			$stmt->bindparam(":active_code",$code);
			$stmt->bindparam(":Class",$class);
			$stmt->execute();	
			return $stmt;
		}
		catch(PDOException $ex)
		{
			echo $ex->getMessage();
		}
	}
	
	public function login($uname,$upass)
	{
		try
		{
			$stmt = $this->conn->prepare("SELECT * FROM tbl_users WHERE userName=:userName_id");
			$stmt->execute(array(":userName_id"=>$uname));
			$userRow=$stmt->fetch(PDO::FETCH_ASSOC);
			
			if($stmt->rowCount() == 1)
			{
				if($userRow['userStatus']=="Y")
				{
					if($userRow['userPass']==md5($upass))
					{
						$_SESSION['userSession'] = $userRow['userID'];
						return true;
					}
					else
					{
						header("Location: index.php?error");
						exit;
					}
				}
				else
				{
					header("Location: index.php?inactive");
					exit;
				}	
			}
			else
			{
				header("Location: index.php?error");
				exit;
			}		
		}
		catch(PDOException $ex)
		{
			echo $ex->getMessage();
		}
	}
	
	
	public function is_logged_in()
	{
		if(isset($_SESSION['userSession']))
		{
			return true;
		}
	}
	
	public function redirect($url)
	{
		header("Location: $url");
	}
	
	public function logout()
	{
		session_destroy();
		$_SESSION['userSession'] = false;
	}
	
	function send_mail($email,$message,$subject)
	{						
		require_once('mailer/class.phpmailer.php');
		$mail = new PHPMailer();
		$mail->IsSMTP(); 
		$mail->SMTPDebug  = 0;                     
		$mail->SMTPAuth   = true;                  
		$mail->SMTPSecure = "ssl";                 
		$mail->Host       = "smtp.gmail.com";      
		$mail->Port       = 465;             
		$mail->AddAddress($email);
		$mail->Username="questphil.it@gmail.com";  
		$mail->Password="questphil2019";            
		$mail->SetFrom('questphil.it@gmail.com','Quest Phil Diagnostics');
		$mail->AddReplyTo("questphil.it@gmail.com","Quest Phil Diagnostics");
		$mail->Subject    = $subject;
		$mail->MsgHTML($message);
		$mail->Send();
	}
	public function getUser($id){
		$stmt = $this->conn->prepare("SELECT * FROM user_privilege WHERE userID=:userName_id");
		$stmt->execute(array(":userName_id"=>$id));
		return $stmt->fetch();
			
	}
	public function userData($id){
		$stmt = $this->conn->prepare("SELECT * FROM tbl_users WHERE userID=:userName_id");
		$stmt->execute(array(":userName_id"=>$id));
		return $stmt->fetch();
			
	}
	public function bypass($page){
		$array = explode("/", $_SERVER['REQUEST_URI']);
		$count = count($array);
		if ($count == 3) {
			$header = "Location: error.php?privilege";
			$header2 = "Location: index.php";
		}else{
			$header = "Location: ../error.php?privilege";
			$header2 = "Location: ../index.php";
			}
		if ($page == 'cashier' or $page == 'lab' or $page == 'imaging' or $page == 'qc' or $page == 'Medical' or $page = 'Admin') {			
			if($this->is_logged_in()){
				$id = $_SESSION['userSession'];
				$data = $this->getUser($id);
				//0 = no Rights, 1 = Have Rights, 2 = Special Rights
				
				if (is_array($data)) {
					
					if ($page == 'cashier') {
						if ($data['CashierCash'] != 0 or $data['CashierAccount'] != 0) {
							
						}else{
							header($header);
						}
					}
					else if($page == 'lab'){
						if ($data['Laboratory'] != 0) {
							
						}else{
							header($header);
						}
					}
					else if($page == 'imaging'){
						if ($data['Imaging'] != 0) {
							
						}else{
							header($header);
						}
					}
					else if($page == 'qc'){
						if ($data['QualityControl'] != 0) {
							
						}else{
							header($header);
						}
					}
					else if($page == 'Medical'){
						if ($data['Medical'] != 0) {
							
						}else{
							header($header);
						}
					}else if($page == "Admin"){
						if ($data['Admin'] != 0) {
							
						}else{
							header($header);
						}
					}
				}else{
					header($header);
				}
			}else{
				header($header2);
			}
		}else{
			die("Syntax Error");
		}
	}	
}