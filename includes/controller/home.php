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
    
    public function userProfile(){
        require('./public/view/userProfile.php');
    }
    public function profile(){
        require('./public/view/home.php');
    }
    public function register(){
        require('./includes/model/user.php');
        
        $user = new User();
        $user->first_name= $_POST['firstname'];
        
        $user->last_name = $_POST['lastname'];
        //$user-> = $_POST['degree_program'];
        $user->gender = $_POST['gender'];
        $user->status = $_POST['maritial_status'];
        //$user-> = $_POST['mailing_address'];
        $user->email_address = $_POST['email'];
        $user->phone_number = $_POST['phonenumber'];
        $skill = $_POST['skills'];
        $hobbies = $_POST['hobbies'];
       // $user->password = $_POST['password'];
        $user->set_password($_POST['password']);
       
        //$repeatPassword = $_POST['repeatedPassword'];
        
         echo 'Value after input'.$user->add_user();
         
         echo "error ".User::$user_error;
         if(true){
            require('./public/view/welcome.php');
        
     }
    }

}
?>