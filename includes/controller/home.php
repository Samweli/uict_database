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
    public function register(){
        require('./includes/model/user.php');

        $user->first_name = $_POST['firstname'];
        
        $user->last_name = $_POST['lastname'];
        $user->reg_number = $_POST['registrationID'];
        //$user->program_id= $_POST['pro_ID'];
        $user->year_of_study= $_POST['year_study'];
        $user->gender = $_POST['gender'];
        //$user->status = $_POST['maritial_status'];
        //$user-> = $_POST['mailing_address'];
        $user->mailing_address= $_POST['mailing_address'];
        
        $user->email_address= $_POST['email'];

        $user->phone_number= $_POST['phonenumber'];
        $skill = $_POST['skills'];
        $hobbies = $_POST['hobbies'];
        //$user->password = $_POST['password'];
        $user->set_password($_POST['password']);
        $repeatPassword = $_POST['repeatedPassword'];

        if(true){
            require('./public/view/login.php');
        }
        $user->add_user();
        


    }
}


?>