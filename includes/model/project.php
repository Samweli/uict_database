<?php
   /* ProjectDirector Object should:-
    * 1. Add project
    * 2. Edit project
    * 3. Delete project
    * 4. Add project plan
    * 5. Edit project plan
    * 6. Delete project plan
    */
 

   class Project{
       public $title;
       public $descriptiion;
       public $category_id;
       public $begin_date;
       public $initiator_id;
       
       public static $project_error;

       public function add_project(){
          if($this->is_project_defined()){
              $sql = "INSERT INTO projects (title,description,category_id,begin_date,initiator_id) VALUES('".$this->title."','";
              $sql .= $this->description."','".$this->category_id."','".$this->begin_date."','".$this->initiator_id."')";
              global $db;
              if($db->db_query($sql)){
                  return $db->db_last_insert_id();
              }
          }
       }

       public function get_all(){
          $sql = "SELECT * FROM projects";
          $sql.=  " JOIN users ON projects.initiator_id = users.id";
          //$sql = "SELECT projects.id,projects.title,projects.description,users.first_name,users.last_name,projects.begin_date FROM ";
          //$sql .= "projects JOIN users ON projects.initiator_id = users.id";
          //$sql .= " ORDER BY projects.id DESC";
          global $db;
          if($result = $db->db_query($sql)){
             $projects = $db->db_fetch_array($result);
            
             return $projects;
          }else{
              $this::$project_error = $db->last_query;
              echo $db->last_query;
	      return NULL;
            }
       }

       public function get_project($id=""){
          if(!empty($id)){
            $sql = "SELECT projects.id,projects.title,projects.description,projects.begin_date,projects.initiator_id,users.first_name,users.last_name";
            $sql .= " FROM projects JOIN users ON projects.initiator_id = users.id WHERE projects.id = ".$id;
            global $db;
            if($result = $db->db_query($sql)){
               $project = $db->db_first_row($result);
               return $project;
            }
          }
       }

       public function get_by_date($begin_date="",$end_date=""){
           if(!empty($begin_date) && !empty($end_date)){
               $sql = "SELECT projects.id,projects.title,projects.description,users.first_name,users.last_name,projects.begin_date FROM ";
               $sql .= "projects JOIN users ON projects.initiator_id = users.id";
               $sql .= " ORDER BY projects.id DESC";
           }else if(!empty($begin_date) && empty($end_date)){
               $sql = "";
           }else if(empty($begin_date) && !empty($end_date)){
               $sql = "";
           }else{
              return false;
           }

           if($result = $db->db_query($sql)){
              $projects = $db->fetch_array($result);
              return $projects;
           }
       }

       private function is_project_defined(){
          if(isset($this->title) && isset($this->description) && 
                isset($this->begin_date) && isset($this->begin_date) && isset($this->initiator_id)){
              return TRUE;
          }else{
              return FALSE;
          }
       }
       
       public function get_latest_projects($max_number=""){
       if(!empty($max_number)){
	      $sql = "SELECT * FROM projects LIMIT ".$max_number." ";
       }else{
	      $sql = "SELECT * FROM projects LIMIT 1";
       }
        global $db;
          if($results = $db->db_query($sql)){
              $result_projects = $db->db_fetch_array($results);
              return $result_projects;
          }else{
              $this::$project_error = $db->last_query;
	      return NULL;
            }
       
      }
       
       

   }

   //$project = new Project();

?>