<?php
require_once('./includes/model/project.php');

class ProjectController extends Controller {
    public $loader;
    
    public function __construct(){
        $this->loader = new Loader();
    }
    
    public function index(){
        
        
    }
    public function allProjects(){
        
        
        $projects = new Project();
        $commmunity_project = $projects->get_all();
        
        try{
          $this->loader->view('projects',$community_project);
        }catch(Exception $e){
          echo 'Message: '. $e->getMessage();
        }
    }
   
}


?>