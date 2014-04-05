<?php
include('./includes/services/functions.php');
include('./includes/model/user.php');
include('./includes/model/session.php');
include('./includes/controller/home.php');
   
class LoginController extends Controller{

	
	public function __construct(){
		
	}
	
	
	public function auth(){
		$db = new Database();
		$user = new User();
		$session = new Session();

		if(!(empty($_POST['reg_number']) || empty($_POST['password']))){
			$reg_number = $db->db_escape_values($_POST['reg_number']);
			$password = $db->db_escape_values($_POST['password']);
	     
		    if($member = $user->authenticate($reg_number,$password)){
			 echo '';
			$session->login($member);
			
			//echo "Welcome :".$member['first_name'];
			$home = new HomeController();
			$home->userhome($member->id);
			header('Location:'.URL.'home/userhome');
			
			
		    }else{
		       $message = "Invalid registration number or password. Please try again!";
			   redirect('../../public/view/login.php?message='.urlencode($message));
		    }
		}else{
		       $message = "Empty registration number or password. Please try again!";
		       redirect('../../public/view/login.php?message='.urlencode($message));
		}
	}
   
}
?>