<?php
   function redirect($location = NULL){
      if($location != NULL){
         header('Location:'.URL.$location);
         exit;
      }
   }

   function output_message($message=""){
       if(!empty($message)){
          return '<p>'.$message.'</p>';
       }else{
       	  return "";
       }
   }
?>