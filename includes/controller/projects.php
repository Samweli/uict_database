<?php

   class ProjectsController extends Controller{
       protected $project;
       
       public function __construct(){
           $this->loader->model('project');
           $this->project = new Project();
       }

   	   public function index(){
   	   	  $projects = $this->project->get_all();
   	   	  $this->loader->view('projects',$projects);
   	   }
   }
?>

