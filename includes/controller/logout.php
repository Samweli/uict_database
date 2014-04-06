<?php
 require_once('./includes/model/session.php');

 require_once('./includes/controller/home.php');
 
 

class LogoutController extends Controller{
 
  public function auth(){
       if (session_status() == PHP_SESSION_NONE) {
        
           session_start();
       }
      $session = new Session();
      $home = new HomeController();
      $session->logout(true);
      
      $home->login();
      
      //
      //header('Location:'.URL.'home/login');
      //
  }
}
?>