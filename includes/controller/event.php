<?php
/* now it is only require_once in first index.php
require_once('./includes/services/Loader.php');
*/
include('./includes/model/event.php');

class EventController extends Controller{
    protected $loader;
    
    public function __construct(){
        $this->loader = new Loader();
        $event = new Event();
    }
    public function allEvents(){
       
       $events = $event->get_all();
        try{
          $this->loader->view('events',$events);
        }catch(Exception $e){
          echo 'Message: '. $e->getMessage();
        }
        
    }
    
}


?>