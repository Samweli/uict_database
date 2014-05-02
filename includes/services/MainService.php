<?php

// this class involves function to register user 

  class MainService{
    
    public $registrationError;
    
    public function registration(){
      $loader = new Loader();
      
      $loader->model('code.php');
      $loader->model('program.php');
        
        $code = new Code();
        $program  = new Program();
        
        $user = new User();
        $imageService = new ImageService();
        
        if(isset($_POST['firstname'])){
          if(preg_match('/^[A-Za-z]+$/',$_POST['firstname'])){
            $user->first_name= $_POST['firstname'];
          }else{
            $this->registrationError = "Firstname is invalid";
            
            $GLOBALS['registrationError'] = $this->registrationError;
            
             return NULL;
         }
        }
        if(isset($_POST['lastname'])){
          if(preg_match('/^[A-Za-z]+$/',$_POST['lastname'])){
            $user->last_name= $_POST['lastname'];
          }else{
            $this->registrationError = "Lastname is invalid";
            
            $GLOBALS['registrationError'] = $this->registrationError;
            
             return NULL;
         }
         
        }
        if(isset($_POST['reg_number'])){
          if(preg_match('/^201[0-9]-04-0[0-9]{4}$/',$_POST['reg_number'])){
             $user->reg_number= $_POST['reg_number'];   
          }else{
            $this->registrationError = "Wrong registration number";
            $GLOBALS['registrationError'] = $this->registrationError;
             return NULL;
          }
        }
        if(isset($_POST['selected_course'])){
          $user->program_id = $_POST['selected_course'];          
        }
         if(isset($_POST['year_of_study'])){
          $user->year_of_study = $_POST['year_of_study'];          
        }
        
        if(isset($_POST['gender'])){
        $user->gender = $_POST['gender'];  
        }
        if(isset($_POST['maritial_status'])){
          $user->status = $_POST['maritial_status'];  
        }
        if(isset($_POST['mailing_address'])){
          if(preg_match('/^PO.BOX.[0-9]+[A-Za-z]+$/',$_POST['mailing_address'])){
            $user->mailing_address = $_POST['mailing_address'];
          }else{
            $this->registrationError = "Incorrect mailing address, please enter it like: eg- PO.BOX.238MBEYA";
            $GLOBALS['registrationError'] = $this->registrationError;
             return NULL;
          }
        }
        if(isset($_POST['email'])){
          if(preg_match('/^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/',$_POST['email'])){
             $user->email_address = $_POST['email']; 
          }else{
            $this->registrationError = "Wrong email, Please enter a correct email";
            $GLOBALS['registrationError'] = $this->registrationError;
             return NULL;
          }
        }
        if(isset($_POST['phonenumber'])){
          if(preg_match('/^0[7|6][0-9]{8}$/',$_POST['phonenumber'])){
            $user->phone_number = $_POST['phonenumber'];
          }else{
            $this->registrationError = "Invalid phonenumber";
            $GLOBALS['registrationError'] = $this->registrationError;
             return NULL;
          }
       
        }
        if(isset($_POST['activationCode'])){
          $code = new Code();
          $codes = $code->get_all();
          $bool = false;
          
          foreach($codes as $codeFromDb){
            if($codeFromDb[1] == $_POST['activationCode'] ){
              $bool = true;
              break;
            }
          }
          
          if($bool){
            $code = $code->get_code($_POST['activationCode']);
            
             if($code->usage == "notused"){
                $user->role = $code->role;
             }else{
              $this->registrationError = "Activation code has already been used".Code::$code_error;
            $GLOBALS['registrationError'] = $this->registrationError;
             return NULL;
             }
          }else{
            $this->registrationError = "Activation code is not valid ".$codes[0][1];
            $GLOBALS['registrationError'] = $this->registrationError;
             return NULL;
          }
        }
        
        if(isset($_POST['password']) && isset($_POST['repeatedPassword'])){
          if($_POST['password'] == $_POST['repeatedPassword']){
             $user->set_password($_POST['password']);  
          }else{
            $this->registrationError = "Passwords do not match";
            $GLOBALS['registrationError'] = $this->registrationError;
             return NULL;
          }
        }
        
        if(isset($_FILES['file']['name'])){
            
           $user->profile_picture = $_FILES['file']['name'];
           
           
           if(!$imageService->saveImage($_FILES['file']['tmp_name'])){
               $user->error = "problem saving picture"; 
            }
        }
        if($user->program_id == 1 || $user->program_id == 4 || $user->program_id == 5){
        $user->grad_year = date('Y') + (4 - $user->year_of_study);
        }else{
          $user->grad_year = date('Y') + (3 - $user->year_of_study);
        }
        return $user;
    }
    
    public function validate($user=""){

      if($queryUsers = $user->get_all()){
      
      foreach($queryUsers as $userFromDb){
        
        if(($user->first_name == $userFromDb['first_name']) && $user->last_name == $userFromDb['last_name']){
           $this->registrationError = "There is already a registered user with same firstname and lastname";
            $GLOBALS['registrationError'] = $this->registrationError;
             return false;
        }
        if($user->reg_number == $userFromDb['reg_number']){
          $this->registrationError = "There is already a registered user with same registration number";
            $GLOBALS['registrationError'] = $this->registrationError;
             return false;
        }
        if($user->mailing_address == $userFromDb['mailing_address'] ){
          $this->registrationError = "There is already a  registered user with same mailing address";
            $GLOBALS['registrationError'] = $this->registrationError;
             return false;
        }
        if($user->email_address == $userFromDb['email_address'] ){
          $this->registrationError = "There is already a registered user with same email";
            $GLOBALS['registrationError'] = $this->registrationError;
             return false;
        }
        if($user->phone_number == $userFromDb['phone_number'] ){
          $this->registrationError = "There is already a registered user with same phonenumber";
            $GLOBALS['registrationError'] = $this->registrationError;
             return false;
        }
      }
      
      return true;
      }
      return false;
    }
    
    public function add_user_in_session($user=""){
      
      
            $db = new Database();
            
            $reg_number = $db->db_escape_values($_POST['reg_number']);
	    $password = $db->db_escape_values($_POST['password']);
            
            // code to immediately put user on session after signing up
            
            $member = $user->authenticate($reg_number,$password);
            
            return $member;
         
    }
    
  }
?>