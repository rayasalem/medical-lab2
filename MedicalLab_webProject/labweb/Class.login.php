<?php
require_once("Class.Tools.php");

class login
{
	static function checkIn($id,$password)
	{
		$id = Tools::cleanData($id);
		$password = Tools::cleanData($password);

		$pdo = Database::connect();
		$sql = "select * FROM patients  WHERE id = ? and password = ? and status='Active'";
		$q = $pdo->prepare($sql);
		$q->execute(array($id,$password));
		
		if($q->rowCount()>0)
		{
			
			$result=$q->fetch(PDO::FETCH_ASSOC);
			session_start();
			$_SESSION['login']=true;
			$_SESSION['id']=$result['id'];
			$_SESSION['name']=$result['name'];
			$_SESSION['eamil']=$result['email'];
			$_SESSION['phone']=$result['phone'];
			$_SESSION['date']=$result['date'];
			$_SESSION['img']=$result['img'];
            $_SESSION['role']=$result['role'];
			// Database::disconnect();
			switch($_SESSION['role'])
							 {
							  	case "admin":
							  		header("Location:admin/adminPageAllUsers.php");
									break;
								case "patient";	
							  		header("Location:patient/user.php");
									break;
																	
								default:
									header("Location: index.php?loginError=1");
								
							 }
			
		}
		else
		{
		    header("Location: index.php?loginError=1");
		}		
	}
}

?>