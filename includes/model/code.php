<?php

class Code{

     public $id;
     public $code_number;
     
     public static $code_error;
     
     public function __construct($id="",$code_number=""){
        
        $this->id = $id;
        $this->code_number = $code_number;
     }
     
     public function get_all(){
        $sql = "SELECT * FROM code ORDER BY code.id ASC";
        global $db;
          if($results = $db->db_query($sql)){
            $result_codes = $db->db_fetch_array($results);
            return $result_codes;
          }
     }
     public function generate_code($str=""){
        $str = sha1($str);
        $str = substr($str,0,5);
        
        $sql = "INSERT INTO code (code_number) VALUES ('".$str."') ";
        global $db;
       
        if($db->db_query($sql)){
            return $db->db_last_insert_id();
        }else{
	    $this::$code_error = $db->last_query;
	}
     }

}

?>