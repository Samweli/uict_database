<?php

   class EventsController extends Controller{
       protected $event;
       public $loader;

       public function __construct(){
           $this->loader = new Loader();
           $this->loader->model('event');
           $this->event = new Event();
       }

   	   public function index(){
          $events = $this->event->get_all();
          try{
   	   	     $this->loader->view('events',$events);
          }catch(Exception $e){
             echo "Message: ".$e->getMessage();
          }
   	   }
   }
?>

