<?php
           if(isset($_GET['url'])){
            if(substr_count($_GET['url'],'/') == 2){
                        if(CurrentPage::$currentPage == "projects" || CurrentPage::$currentPage == "events"){
                         $cssFiles = array("bootstrap.min.css","bootstrap-theme.css","style.css","main.css","font.css","events.css");
                         $jsFiles = array("bootstrap.js","bootstrap.min.js","jquery_min.js");
                         
                         foreach($cssFiles as $file){
                           echo '<link rel="stylesheet" type="text/css" href="../public/css/'.$file.'" />';	    
                         }
                         foreach($jsFiles as $file){
                           echo '<script  type="text/javascript" src="../public/js/'.$file.'"></script>';	            
                         }
                        }else{
                           $cssFiles = array("bootstrap.min.css","bootstrap-theme.css","style.css","main.css","font.css");
                           $jsFiles = array("bootstrap.js","bootstrap.min.js","jquery_min.js");
                           
                           foreach($cssFiles as $file){
                             echo '<link rel="stylesheet" type="text/css" href="../public/css/'.$file.'" />';	    
                           }
                           foreach($jsFiles as $file){
                           echo '<script type="text/javascript" src="../public/js/'.$file.'" ></script>';	            
                           }
                        }
            }
            elseif(substr_count($_GET['url'],'/') == 3){
                        
               $cssFiles = array("bootstrap.min.css","bootstrap-theme.css","style.css","main.css","font.css");
               $jsFiles = array("bootstrap.js","bootstrap.min.js","jquery_min.js");
                             
                  foreach($cssFiles as $file){
                     echo '<link rel="stylesheet" type="text/css" href="../../public/css/'.$file.'" />';	    
                  }
                  foreach($jsFiles as $file){
                           echo '<script type="text/javascript" src="../../public/js/'.$file.'" ></script>';	            
                  }
            }
           }else{
                $cssFiles = array("bootstrap.min.css","bootstrap-theme.css","style.css","main.css","font.css");
                 $jsFiles = array("bootstrap.js","bootstrap.min.js","jquery_min.js");
                 
                 foreach($cssFiles as $file){
                  echo '<link rel="stylesheet" type="text/css" href="./public/css/'.$file.'" />';	    
                 }
                 foreach($jsFiles as $file){
                           echo '<script type="text/javascript" src="./public/js/'.$file.'"></script>';	            
                 }
           }
?>