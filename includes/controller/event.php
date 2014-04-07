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
   }
?>

