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
        $this->loader->view('home.php');  
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

    public function add_income(){
    	$users = $this->user->get_all();
    	$this->loader->model('finance.php');
    	$finance = new Finance();
    	$income_categories = $finance->get_income_categories();
    	$data = array(
                   'users'=>$users,
                   'income_categories'=>$income_categories
    		    );
    	$this->loader->view('add_income.php',$data);
    }

     public function add_expense(){
    	$this->loader->view('add_expense.php');
    }
   
}


?>