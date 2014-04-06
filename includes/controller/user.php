<?php

class UserController extends Controller{
	private $user;
	public $db;
	public $loader;

	public function __construct(){
		$this->loader = new Loader();
		$this->db = new Database();
		$this->loader->service('functions');
		$this->loader->model('user');
		$this->user = new User();
	}
    
    public function index(){
        require('./public/view/home.php');
        
    }

    public function add_project(){
        $this->loader->model('project');
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
    	$this->loader->view('add_project',$users);
    }
   
}


?>