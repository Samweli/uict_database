<?php



class HomeController extends Controller{
   
    public function __construct(){
        
    }
    
    public function index(){
        require ('./public/view/index.php');
    }
    public function about(){
        require('./public/view/about.php');
    }
    public function login(){
        require ('./public/view/login.php');
    }
    public function registration(){
        require('./public/view/registration.php');
    }
    public function userhome($user_id=""){
        
        $user = (new User())->get_user($user_id);
        
        
        $loader = new Loader();
        
        
        try{
        $loader->view('home.php',$user);
        }catch(Exception $e){
            echo 'Message:'.$e->getMessage();
        }
        
       
    }
    
    public function register(){
        require ('./public/view/login.php'); 
    }
}


?>