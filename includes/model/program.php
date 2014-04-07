<?php 
class Program{
    public $id;
    public $program;

    public function __construct($id,$program){
         $this->id = $id;
         $this->program = $program;
    }	

    public static function get_program($program_id){
    	if(!empty($program_id)){
             $sql = "SELECT * FROM programs WHERE id = ".$program_id." LIMIT 1";
             global $db;
             if($user = $db->db_query($sql)){
                 $array =  $db->db_first_row($user);
		 
		 $returnedProgram = new Program($array['id'],$array['program']); 
	          
		 
		  
		  return $returnedProgram;
             }
          }
    }

}
?>