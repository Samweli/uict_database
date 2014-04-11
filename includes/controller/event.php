<?php

   class EventController extends Controller{
       protected $event;
       public $loader;

       public function __construct(){
           $this->loader = new Loader();
           $this->loader->model('event.php');
           $this->event = new Event();
       }

   	   public function index(){
          $events = $this->event->get_all();
          try{
   	   	 $this->loader->view('events.php',$events);
          }catch(Exception $e){
             echo "Message: ".$e->getMessage();
          }
   	   }

       public function add_event(){
          global $db;
          $this->event->title = $db->db_escape_values($_POST['title']);
          $this->event->description = $db->db_escape_values($_POST['description']);
          $this->event->event_date = $db->db_escape_values($_POST['event_date']);
          $this->event->publisher_id = $db->db_escape_values($_POST['publisher_id']);
          $this->event->category_id = $db->db_escape_values($_POST['category_id']);
          if($this->event->add_project()){
              redirect(URL.'user/all_events');
          }
       }
       
       public function community_event(){
        
         $this->loader->view('community-event.php');
        
       }
   }
?>

