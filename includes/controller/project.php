<?php
require_once('./includes/model/project.php');

class ProjectController extends Controller {
    protected $loader;
    
    public function __construct(){
        $this->loader = new Loader();
    }
    
    public function index(){
        
        
    }
    public function allProjects(){
        
        
        $projects = new Project();
        $projects = $projects -> get_all();
        
        try{
          $this->loader->view('projects',$projects);
        }catch(Exception $e){
          echo 'Message: '. $e->getMessage();
        }
    }
   
}


?>