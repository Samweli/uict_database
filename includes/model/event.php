<?php
   /* Event Object should:-
    * 1. Add event
    * 2. Edit event
    * 3. Delete event
    */

   require_once('database.php');

   class Event{
       public $title;
       public $description;
       public $category_id;
       public $event_date;
       public $publisher_id;
       
       public function get_all(){
       	  $sql = "SELECT events.id,events.title,events.description,events.event_date,events.publisher_id,users.first_name,users.last_name";
          $sql .= " FROM events JOIN users ON events.publisher_id = users.id ORDER BY events.id DESC";
       	  global $db;
       	  if($result = $db->db_query($sql)){
             $events = $db->db_fetch_array($result);
             return $events;
       	  }
       }

       public function get_event($id=""){
          if(!empty($id)){
            $sql = "SELECT events.id,events.title,events.description,events.event_date,events.publisher_id,";
            $sql .= "users.first_name,users.last_name,users.profile_picture,events.cover_image";
            $sql .= " FROM events JOIN users ON events.publisher_id = users.id WHERE events.id = ".$id;
            global $db;
            if($result = $db->db_query($sql)){
               $event = $db->db_first_row($result);
               return $event;
            }else{
               return $db->last_query;
            }
          }
       }

       public function get_categories(){
           $sql = "SELECT * FROM events_categories";
           global $db;
           if($result = $db->db_query($sql)){
              $categories = $db->db_fetch_array($result);
              return $categories;
           }
       }

       public function add_event(){
           if($this->is_event_defined()){
              $sql = "INSERT INTO events (title,description,category_id,event_date,publisher_id) VALUES('".$this->title."','";
              $sql .= $this->description."','".$this->category_id."','".$this->event_date."','".$this->publisher_id."')";
              global $db;
              if($db->db_query($sql)){
                  return $db->db_last_insert_id();
              }
           }
       }

       private function is_event_defined(){
          if(isset($this->title) && isset($this->description) && isset($this->category_id) 
               && isset($this->event_date) && isset($this->publisher_id)){
            return TRUE;
          }else{
             return FALSE;
          }
       }
   }

   $event = new Event();
   
?>