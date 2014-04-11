<?php

class Security{
    
    public $publicUrls;
    public $privateUrls;
    public $finincialUrls;
    public $projectManagerUrls;
    
    public $error;
    
    public function __construct(){
        session_start();
        $this->publicUrls = array('uict_database/project','uict_database/project/index','uict_database/project/community_project',
                                  'uict_database/event','uict_database/event/index','uict_database/home/index','uict_database/home/about',
                                  'uict_database/home/login','uict_database/home/registration','uict_database/home/projects',
                                  'uict_database/home/charity','uict_database/home/sports','uict_database/login/index','uict_database/login/auth',
                                  'uict_database/login/denied','uict_database/logout/auth','uict_database/user/add_new_project','uict_database/user/add_new_event',
                                  'uict_database/user/add_income','uict_database/user/add_expense','uict_database/home/register','uict_database/event/community_event');
        
        $this->privateUrls = array('uict_database/home/userhome','uict_database/home/userProfile','uict_database/home/editInfo',
                                   'uict_database/home/editUser','uict_database/user/all_events','uict_database/forum',
                                   'uict_database/user/all_projects','uict_database/user/all_members','uict_database/user','uict_database/user/profile');
        
        $this->projectManagerUrls = array('uict_database/project/add_project');
        
        $this->finincialUrls = array('');
    }
    
    public function authorizeUrl($url){
       
        if(in_array($url,$this->publicUrls)){
            return true;
        }
        if(in_array($url,$this->privateUrls)){
            if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']==true){
              
                return true;
            }
            else{
                  $this->error = "You are not authorized to view the requested page";
                return false;
            }
        }
        if(in_array($url,$this->projectManagerUrls)){
            if(isset($_SESSION['position']) && $_SESSION['position']=="project_manager"){
                return true;
            }
            else{
                $this->error = "You need to be project manager to access that page";
                return false;
            }
        }
        if(in_array($url,$this->finincialUrls)){
            if(isset($_SESSION['position']) && $_SESSION['position']=="finincial"){
                return true;
            }
            else{
                $this->error = "You need to be finincial manager to access that page";
                return false;
            }
        }
        $this->error = 'The page you are looking for is not available'.$url;
        return false;
        
    }
    
    
}


?>