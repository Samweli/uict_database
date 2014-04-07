<?php

class UserController extends Controller{
	private $user;
	public $db;
	public $loader;

	public function __construct(){
		$this->loader = new Loader();
		$this->db = new Database();
		$this->user = new User();
	}
    
    public function index(){
        require('./public/view/home.php');
        
    }

    public function add_project(){
        $this->loader->model('project.php');
        $project = new Project();

        $project->title = $this->db->db_escape_values('Robotics Design');
        $project->description = $this->db->db_escape_values('Electronics task for designing objects lifting robot');
        //$project->category = $this->db->db_escape_values('electronics');
        $project->begin_date = $this->db->db_escape_values('04/13/2014');
        $project->initiator_id = $this->db->db_escape_values(1);

        if($project->add_project()){
        	echo "Project added successfully";
          // redirect(URL.'projects');
        }else{
        	echo "Error occured";
        }
    }

    public function add_new_project(){
    	$users = $this->user->get_all();
    	$this->loader->view('add_project.php',$users);
    }

    public function add_new_event(){
    	$this->loader->model('event.php');
    	$event = new Event();
    	$event_categories = $event->get_categories();
    	$this->loader->view('add_event.php',$event_categories);
    }

    public function all_events(){
    	$this->loader->model('event.php');
    	$event = new Event();
    	$events = $event->get_all();
    	$this->loader->view('all_events.php',$events);
    }

    public function all_projects(){
    	$this->loader->model('project.php');
    	$project = new Project();
    	$projects = $project->get_all();
    	$this->loader->view('all_projects.php',$projects);
    }

    public function all_members(){
    	$users = $this->user->get_all();
    	$this->loader->view('all_members.php',$users);
    }
   
}


?>