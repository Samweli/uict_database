<?php

class Story {
    
     public $id;
     public $name;
     public $content;
     public $date;
     
     public function __construct($id="",$name="",$content=""){
        $this->id = $id;
        $this->name = $name;
        $this->content = $content;
        $this->date = new DateTime();
     }
     
     public function get_all(){
       	  $sql = "SELECT * FROM story";
       	  global $db;
       	  if($result = $db->db_query($sql)){
             $stories = $db->db_fetch_array($result);
             return $stories;
       	  }
       }
}


?>