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
        if(isset($_POST['password']) && isset($_POST['repeatedPassword'])){
          if($_POST['password'] == $_POST['repeatedPassword']){
             $user->set_password($_POST['password']);  
          }else{
            $this->registrationError = "Passwords do not match";
            $GLOBALS['registrationError'] = $this->registrationError;
             return NULL;
          }
        }
        
        if(isset($user->profile_picture)){
            
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
    
  }
?>