<?php

/**
 * This is the "base controller class". All other "real" controllers extend this class.
 */


 require_once('./includes/model/database.php');

 
class Controller{
    /**
     * @var null Database Connection
     */
    public $db = null;
    public $loader;

    /**
     * Whenever a controller is created, open a database connection too. The idea behind is to have ONE connection
     * 
     */
    public function __construct()
    {
        $this->openDatabaseConnection();
        $this->loader = new Loader();
    }

    /**
     * Open the database connection with the credentials from application/config/config.php
     */
    private function openDatabaseConnection()
    {
   
        $options = array(PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ, PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING);

       
            $database = new Database();
            $this->db = $database;
        
    }

    
    public function loadModel($model_name)
    {
        require './includes/model/' . strtolower($model_name) . '.php';
        // return new model (and pass the database connection to the model)
        return new $model_name($this->db);
    }
    
    public function redirect($controller="",$method=""){
        if(headers_sent() == false){
        header('Location: '.URL.$controller.'/'.$method);
        exit();
        }
        
    }
    
    
    
}
