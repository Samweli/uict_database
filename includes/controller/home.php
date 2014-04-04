<?php

class HomeController extends Controller{
    
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
        $user = User::get_user($user_id);
        
        
        $loader->view("home.php",$user_id);
    }
}


?>