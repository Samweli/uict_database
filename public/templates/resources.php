<?php
           if(isset($_GET['url'])){
            if(substr_count($_GET['url'],'/') == 2){
                        if(CurrentPage::$currentPage == "projects" || CurrentPage::$currentPage == "events"){
                         $cssFiles = array("bootstrap.min.css","bootstrap-theme.css","style.css","main.css","font.css","events.css");
                         foreach($cssFiles as $file){
                           echo '<link rel="stylesheet" type="text/css" href="../public/css/'.$file.'" />';	    
                         }
                        }else{
                           $cssFiles = array("bootstrap.min.css","bootstrap-theme.css","style.css","main.css","font.css");
                           foreach($cssFiles as $file){
                             echo '<link rel="stylesheet" type="text/css" href="../public/css/'.$file.'" />';	    
                        }         
                        }
            }
            elseif(substr_count($_GET['url'],'/') == 3){
               $cssFiles = array("bootstrap.min.css","bootstrap-theme.css","style.css","main.css","font.css");
                  foreach($cssFiles as $file){
                     echo '<link rel="stylesheet" type="text/css" href="../../public/css/'.$file.'" />';	    
                  } 
            }
           }else{
                $cssFiles = array("bootstrap.min.css","bootstrap-theme.css","style.css","main.css","font.css");
                 foreach($cssFiles as $file){
                  echo '<link rel="stylesheet" type="text/css" href="./public/css/'.$file.'" />';	    
                 }
           }
?>