<?php
   function redirect($controller="",$action=""){
      if($controller != NULL && $action!=NULL ){
	 
         header('Location:'.URL.$controller.$action);
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