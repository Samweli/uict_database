<?php



class HomeController extends Controller{
    
    public function index(){
        try{
        $this->loader->view('index.php');
        }catch(Exception $e){
            echo 'Message '.$e->getMessage();
        }
    }

    public function about(){
        try{
        $this->loader->view('about.php');
        }catch(Exception $e){
            echo 'Message '.$e->getMessage();
        }
    }

    public function login(){
        try{
        $this->loader->view('login.php');
        }catch(Exception $e){
            echo 'Message '.$e->getMessage();
        }
    }

    public function registration(){
        try{
        $this->loader->view('registration.php');
        }catch(Exception $e){
            echo 'Message '.$e->getMessage();
        }
        
    }

    public function projects(){
        try{
        $this->loader->view('about-projects.php');
        }catch(Exception $e){
            echo 'Message '.$e->getMessage();
        }
    }

    public function charity(){
        try{
        $this->loader->view('about-charity');
        }catch(Exception $e){
            echo 'Message '.$e->getMessage();
        }
    }

    public function sports(){
        try{
        $this->loader->view('about-sports');
        }catch(Exception $e){
            echo 'Message '.$e->getMessage();
        }
    }

    public function userhome($user_id=""){
         $loader = new Loader();
         $user = (new User())->get_user($user_id);
        
       
        try{
        $loader->view('home.php',$user);
        }catch(Exception $e){
            echo 'Message:'.$e->getMessage();
        }
      
    }
    
    public function userProfile($user_id){
        $user = (new User)->get_user($user_id);

        $loader = new Loader();
        try{
            $loader->view('userProfile.php',$user);
        }catch(Exception $e){
            echo 'Message'.$e->getMessage();
        }
        
    }

    public function editInfo($user_id){

        $user = (new User)->get_user($user_id);

        $loader = new Loader();

        try{
            $loader->view('editInfo.php',$user);
        }catch(Exception $e){
            echo 'Message'.$e->getMessage();
        }
       
    }
    
    public function register(){
        $loader = new Loader();
        
        $user = new User();
        
        if(isset($_POST['firstname'])){
        $user->first_name= $_POST['firstname'];
        }
        if(isset($_POST['lastname'])){
        $user->last_name = $_POST['lastname'];  
        }
        if(isset($_POST['reg_number'])){
        $user->reg_number= $_POST['reg_number'];   
        }
        if(isset($_POST['gender'])){
        $user->gender = $_POST['gender'];  
        }
        if(isset($_POST['maritial_status'])){
          $user->status = $_POST['maritial_status'];  
        }
        if(isset($_POST['email'])){
           $user->email_address = $_POST['email']; 
        }
        if(isset($_POST['phonenumber'])){
            $user->phone_number = $_POST['phonenumber'];
       
        }
        if(isset($_POST['password'])){
          $user->set_password($_POST['password']);  
        }
        
       
         if($user->add_user()){
            
            $session = new Session();
            $db = new Database();
            
            $reg_number = $db->db_escape_values($_POST['reg_number']);
	    $password = $db->db_escape_values($_POST['password']);
            
            // code to immediately put user on session after signing up
            
            $member = $user->authenticate($reg_number,$password);
         
            if(isset($member)){
		$session->login($member);
                try{
                  
                $loader->view('welcome.php',$member);
                }catch(Exception $e){
                    echo 'Message'.$e->getMessage();
                }
            }
         }

    }

    public function editUser($id){

        $user = new User();
        $user = $user->get_user($id);
       
        if(isset($_POST['firstname'])){
        $user->first_name= $_POST['firstname'];
        }
        if(isset($_POST['lastname'])){
        $user->last_name = $_POST['lastname'];  
        }
        if(isset($_POST['reg_number'])){
        $user->reg_number= $_POST['reg_number'];   
        }
        if(isset($_POST['gender'])){
        $user->gender = $_POST['gender'];  
        }
        if(isset($_POST['maritial_status'])){
          $user->status = $_POST['maritial_status'];  
        }
        if(isset($_POST['email'])){
           $user->email_address = $_POST['email']; 
        }
        if(isset($_POST['phonenumber'])){
            $user->phone_number = $_POST['phonenumber'];
       
        }
        if(isset($_POST['skills'])){
         $skill = $_POST['skills'];
        }
        if(isset($_POST['hobbies'])){
            $hobbies = $_POST['hobbies'];
        }
        if(isset($_POST['password'])){
          $user->set_password($_POST['password']);  
        }
        
     
        
        //$user-> = $_POST['degree_program'];
        
        
        //$user-> = $_POST['mailing_address'];
        
       // $user->password = $_POST['password'];
        //$user->set_password($_POST['password']);
       
        //$repeatPassword = $_POST['repeatedPassword'];

         $session = new Session();
       
         $loader = new Loader();
         if($user->edit_user($id)){
            
             $session->login($user);
            header('Location:'.URL.'home/userProfile/'.$id);
           
        
     } 
    }

    
    public function denied($error){
           $loader = new Loader();
           try{
            $loader->view('denied.php',$error);
           }catch(Exception $e){
            echo 'Message'.$e->getMessage();
           }
    }   

    public function search(){
      
     $user = new User();

        $array_results= $user->get_user_by_firstname($_GET['search_request']);
    
       

        if(isset($array_results)){
            try{
        $this->loader->view('userProfile.php',$array_results);
        }catch(Exception $e){
            echo 'Message '.$e->getMessage();
        }
        
        }
    }

}
?>