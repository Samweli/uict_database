<?php
   /* User object should:-
    * 1. Add user (Full registration)
    * 2. Edit user 
    * 3. Delete user
    * 4. Activate user
    * 5. Deactivate user
    * 6. Retrieve all users
    * 7. Retrieve single user
    */


   class User{
   	  public $id;
   	  public $first_name;
   	  public $last_name;
   	  public $reg_number;
   	  public $grad_year;
   	  public $program_id;
   	  public $year_of_study;
   	  public $active_status;
   	  public $gender;
          public $mailing_address;
          public $email_address;
   	  public $phone_number;
   	  public $role;
   	  public $status;
   	  private $password;
	  
	  public static $user_error;
	  
	  public function __construct($id="",$first_name="",$last_name="",$reg_number="",$grad_year="",$program_id="",
				      $year_of_study="",$active_status="",$gender="",$email_address="",$phone_number="",$role="",$status=""){
					  
	      $this->id = $id;
	      $this->first_name = $first_name;
	      $this->last_name = $last_name;
	      $this->reg_number = $reg_number;
	      $this->grad_year = $grad_year;
	      $this->program_id = $program_id;
	      $this->year_of_study = $year_of_study;
	      $this->active_status = $active_status;
	      $this->gender = $gender;
	      $this->email_address = $email_address;
	      $this->phone_number = $phone_number;
	      $this->role = $role;
	      $this->status = $status;
	      
	  }

   	  public function set_password($pass = ""){
         if(!empty($pass)){
            $this->password = $pass;
         }
   	  }

      public function authenticate($reg_number="",$pass=""){
          if(!(empty($reg_number) && empty($pass))){
              $sql = "SELECT * FROM users WHERE reg_number = '".$reg_number."' AND password = '".sha1($pass)."' LIMIT 1"; 
              global $db;
              if($user = $db->db_query($sql)){
                   $user = $db->db_first_row($user);
		   
		   return $this->get_user($user[0]);
	      
              }else{
		     $this::$user_error = $db->last_query;
		     
		 }
          }
      }

   	  public function add_user(){
   	  	 $sql = "INSERT INTO users (first_name,last_name,reg_number,grad_year,program_id,year_of_study,";
   	  	 $sql .= "gender,mailing_address,email_address,phone_number,role,status,password) VALUES('".$this->first_name."',";
   	  	 $sql .= "'".$this->last_name."','".$this->reg_number."','".$this->grad_year."','".$this->program_id."',";
   	  	 $sql .= "'".$this->year_of_study."','".$this->gender."','".$this->mailing_address."','".$this->email_address."','".$this->phone_number."',";
   	  	 $sql .= "'".$this->role."','".$this->status."','".sha1($this->password)."')";
                 global $db;


                if($db->db_query($sql)){

                  return $db->db_last_insert_id();
                  }else{
		     $this::$user_error = $db->last_query;
		     
		 }
       }

   	  public function edit_user($user_id = ""){
   	  	 if(!empty($user_id)){
	   	  	 $sql = "UPDATE users SET first_name = '".$this->first_name."',last_name = '".$this->last_name."',";
	   	  	 $sql .=" reg_number = '".$this->reg_number."',grad_year = '".$this->grad_year."',program_id = '".$this->program_id."',";
	   	  	 $sql .= "year_of_study = '".$this->year_of_study."',gender = '".$this->gender."',mailing_address='".$this->mailing_address."',email_address = '".$this->email_address."',";
	   	  	 $sql .= "phone_number = '".$this->phone_number."',role = '".$this->role."',status = '".$this->status."' WHERE id ='".$user_id."'";
	  	 	 global $db;
	  	 	 if($db->db_query($sql)){
	  	 		return $db->db_affected_rows();
	  	 	 }else{
         $this::$user_error = $db->last_query;
         
     }
  	 	}
   	  }	

   	  public function delete_user($user_id = ""){
         if(!empty($user_id)){
            $sql = "DELETE FROM users WHERE id = ".$user_id;
            global $db;
            if($db->db_query($sql)){
               return $db->db_affected_rows();
            }
         }
   	  }	

   	  public function get_all(){
   	  	  $sql = "SELECT users.id,users.first_name,users.last_name,users.email_address,users.phone_number,users.reg_number,";
          $sql .= "users.active_status,users.grad_year,users.gender,users.role,users.status,users.profile_picture,";
          $sql .= "users.year_of_study,users.program_id,programs.program FROM users JOIN programs ON ";
          $sql .= "users.program_id = programs.id ORDER BY users.id ASC";
   	  	  global $db;
          if($results = $db->db_query($sql)){
              $result_users = $db->db_fetch_array($results);
              return $result_users;
          }
   	  }

   	  public function get_user($user_id = ""){
          if(!empty($user_id)){
             $sql = "SELECT * FROM users WHERE id = ".$user_id." LIMIT 1";
             global $db;
             if($user = $db->db_query($sql)){
                 $array =  $db->db_first_row($user);
		 
		 $returnedUser = new User($array['id'],$array['first_name'],$array['last_name'],$array['reg_number'],
			      $array['grad_year'],$array['program_id'],$array['year_of_study'],$array['active_status'],
			      $array['gender'],$array['email_address'],$array['phone_number'],$array['role'],$array['status']); 
	          
		 
		  
		  return $returnedUser;
             }
          }
   	  }
      public function get_user_by_reg_number($reg_number=""){
        if(!empty($reg_number)){
             $sql = "SELECT * FROM users WHERE reg_number = '".$reg_number."' LIMIT 1";
             global $db;
             if($user = $db->db_query($sql)){
                 $array =  $db->db_first_row($user);

                 $this::$user_error="executed in get by user reg ".$user[0];

                 $returnedUser = new User($array['id'],$array['first_name'],$array['last_name'],$array['reg_number'],
            $array['grad_year'],$array['program_id'],$array['year_of_study'],$array['active_status'],
            $array['gender'],$array['email_address'],$array['phone_number'],$array['role'],$array['status']); 

            return $returnedUser;
	          }else{
              $this::$user_error = $db->last_query;
         
            }
 }
}
}


   $user = new User();

?>