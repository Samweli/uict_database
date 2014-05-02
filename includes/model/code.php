<?php

class Code{

     public $id;
     public $code_number;
     public $role;
     public $usage;
     
     public static $code_error;
     
     public function __construct($id="",$code_number="",$role="",$usage=""){
        
        $this->id = $id;
        $this->code_number = $code_number;
	$this->role = $role;
	$this->usage = $usage;
     }
     
     public function get_all(){
        $sql = "SELECT * FROM code ORDER BY code.id ASC";
        global $db;
          if($results = $db->db_query($sql)){
            $result_codes = $db->db_fetch_array($results);
            return $result_codes;
          }
     }
     public function get_code($code_number=""){
	  if(!empty($code_number)){
             $sql = "SELECT * FROM code WHERE code_number = '".$code_number."' LIMIT 1";
             global $db;
             if($code = $db->db_query($sql)){
                 $array =  $db->db_first_row($code);
		 
		 $returnedCode = new Code($array['id'],$array['code_number'],$array['role'],$array['usage']); 
	         
		  return $returnedCode;
             }else{
	        $this::$code_error = $db->last_query;
	     }
          }
	  
     }
     public function generate_code($str="",$role="",$usage=""){
        $str = sha1($str);
        $str = substr($str,0,5);
        
        $sql = "INSERT INTO code (code_number,role,usage) VALUES ('".$str."','".$role."','".$usage."') ";
        global $db;
       
        if($db->db_query($sql)){
            return $db->db_last_insert_id();
        }else{
	    $this::$code_error = $db->last_query;
	}
     }
     

}

?>