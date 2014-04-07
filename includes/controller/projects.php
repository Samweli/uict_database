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

       public function add_project(){
            global $db;
            $this->project->title = $db->db_escape_values($_POST['title']);
            $this->project->description = $db->db_escape_values($_POST['description']);
            $this->project->begin_date = $db->db_escape_values($_POST['begin_date']);
            $this->project->initiator_id = $db->db_escape_values($_POST['initiator_id']);
            $this->project->category_id = 1;
            if($this->project->add_project()){
               redirect(URL.'user/all_projects');
            }
       }
   }
?>

