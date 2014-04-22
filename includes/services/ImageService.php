<?php

class ImageService{
    
    public $file_path = './public/img/userImages/';
    
    public function __construct(){
        
    }
    
    public function saveImage($tmpName=""){
        
        if(!file_exists($this->file_path.$_FILES["file"]["name"])){
            move_uploaded_file($_FILES["file"]["tmp_name"],
                               "./public/img/userImages/" . $_FILES["file"]["name"]);
            return true;
        }
        else{
            return false;
        }
        
    }
}

?>