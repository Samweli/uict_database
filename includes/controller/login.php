<?php


include('./includes/controller/home.php');
   
class LoginController extends Controller{
	public $error_message="";
        
	
	public function __construct(){
		
	}
	public function index(){
	    require ('./public/view/login.php');
	}
	
	
	public function auth(){
		$db = new Database();
		$user = new User();
		$session = new Session();

		if(!(empty($_POST['reg_number']) || empty($_POST['password']))){
			$reg_number = $db->db_escape_values($_POST['reg_number']);
			$password = $db->db_escape_values($_POST['password']);
	     
		    if($member = $user->authenticate($reg_number,$password)){
			 
			$session->login($member);
			
			//echo "Welcome :".$member['first_name'];
			header('Location:'.URL.'home/userhome/'.$member->id);
			
		    }else{
		       $this->error_message = "Invalid registration number or password. Please try again!";
			   $this->denied();
			   header('Location:'.URL.'login/denied');
		    }
		}else{
		      $this->index();
		      
		}
	}
	public function denied(){
		$loader = new Loader();
		
		try{
		$loader->view('login.php',$this->error_message);
		}catch(Exception $e){
			echo 'Message:'.$e->getMessage();
		}
		
	}
   
}
?>