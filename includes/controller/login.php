<?php
require('./includes/services/Loader.php');
require('./includes/model/database.php')
 
   
  class LoginController extends Controller{

	
	public function __construct(){
		$loader = new Loader();
		
		try{
		$loader->service("functions.php");
		$loader->model("user.php");
		$loader->model("session.php");
		$loader->controller("home.php");
		}catch(Exception $e){
			echo 'Message:'. $e->getMessage();
		}
	}
	
	
	public function auth(){

		if(!(empty($_POST['reg_number']) || empty($_POST['password']))){
			$reg_number = $db->db_escape_values($_POST['reg_number']);
			$password = $db->db_escape_values($_POST['password']);
	     
		    if($member = $user->authenticate($reg_number,$password)){
			$session->login($user);
			//echo "Welcome :".$member['first_name'];
			$home = new HomeController();
			$home->userhome($user->id);
			
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