<?php

   class ProjectsController extends Controller{
       protected $project;
       public $loader;

       public function __construct(){
           $this->loader = new Loader();
           $this->loader->model('project');
           $this->project = new Project();
       }

   	   public function index(){
          $community_project = $this->project->get_all();
          try{
   	   	     $this->loader->view('projects',$community_project);
          }catch(Exception $e){
             echo "Message: ".$e->getMessage();
          }
   	   }

       public function community_project($id=""){
          if(!empty($id)){
              try{
                 $community_project = $this->project->get_project($id);
                 $this->loader->model('comment');
                 $comment = new Comment();
                 $comment->source_id = $id;
                 $comment->category = "project";
                 $comments = $comment->get_comments();
                 $data = array(
                            'community_project'=>$community_project,
                            'comments'=>$comments
                       );
                 $this->loader->view('community-project',$data);
              }catch(Exception $e){
                 echo "Message: ".$e->getMessage();
              }
          }
       }
   }
?>

