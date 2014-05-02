   <?php
   /* now it is only require_once in first index.php
   require_once('./includes/services/Loader.php');
   */
   $loader = new Loader();
   
   
   try{
   $loader->service('Template.php');
   $loader->service('CurrentPage.php');
   }
   catch(Exception $e){
   echo 'Message: '. $e->getMessage();
   }
   
   $template = new Template();
   
   
   // variable to detect the index page
   
   ?>
   
   <!DOCTYPE html>
   <html lang='en'>
   <head>
   <meta charset="utf-8" />
   <title>Registration</title>
                 <?php
		  try{
		      $template->render('resources.php');
		  }catch(Exception $e){
		      echo 'Message'.$e->getMessage();
		  }
		   ?>
   </head>
   <body>
   <div id="page">
   <div id="header">
   <?php
   try{
   $template->render('header.php');
   }
   catch(Exception $e){
   echo 'Message: '. $e->getMessage();
   }
   
   ?>
   </div>
   <div class="container">
   <div class="row ">
   <!-- u_header -->
   <div id="bannerForRegistration">
   <div class="">
   <h2>Registration Form </h2>
   </div>
   </div>
   </div>
   <!-- banner -->
   <!-- header -->
   <div class="row">
    <?php
       if(isset($GLOBALS['registrationError'])){
	
         echo '<div class="registrationError">';
	  echo $GLOBALS['registrationError'];
	  echo '</div>';
	  unset($GLOBALS['registrationError']);
       }
      
       ?>
    
   
   <form action="<?php echo URL?>home/register" method="POST" class="form-horizontal u_row_form" enctype="multipart/form-data" role="form">
   
   <div class="col-lg-6 u_row">
   <legend>Personal information:</legend>
   <div class="form-group">
   <label class="col-sm-2 control-label" >FirstName:</label>
   <div class="col-sm-6">
   <input name="firstname" type="text" class="form-control" required=""
	  <?php
	    if(isset($_POST['firstname'])){
	     echo 'value="'.$_POST['firstname'].'"';
	    }
	    ?>
	  />
   </div>
   </div>
   <div class="form-group">
   <label class="col-sm-2 control-label" >LastName:</label>
   <div class="col-sm-6">
   <input name="lastname" type="text" class="form-control" required=""
	  
	  <?php
	    if(isset($_POST['lastname'])){
	     echo 'value="'.$_POST['lastname'].'"';
	    }
	    ?>
	    />
   </div>
   </div>
   
   
   <div class="form-group">
   <label class="col-sm-2 control-label" >Registration NO:</label>
   <div class="col-sm-6">
   <input name="reg_number" type="text" class="form-control" required=""
	  <?php
	    if(isset($_POST['reg_number'])){
	     echo 'value="'.$_POST['reg_number'].'"';
	    }
	    ?>
	  />
   </div>
   </div>
   
   <div class="form-group">
   <label class="col-sm-2 control-label" >Degree Program</label>
   <div class="col-sm-6">
   <select name ="selected_course" required="">
   <option selected="selected" value="">Select Course</option>
   <option value = "1">Bsc. Computer eng.</option>
   <option value = "2">Bsc. in Computer Science</option>
   <option value = "3">Bsc. with Computer Science</option>
   <option value = "4">Bsc. in Electronics and Communication</option>
   <option value="5">Bsc. in Telecommunication Engineering</option>
   </select>
   
   <!--<input name="program" type="text" class="form-control" />-->
   </div>
   </div>
   
   <div class="form-group">
   <label class="col-sm-2 control-label" >Year of study</label>
   <div class="col-sm-6">
   <select name ="year_of_study" required="">
   <option selected="selected" value="">Select year</option>
   <option value = "1">First year</option>
   <option value = "2">Second year</option>
   <option value = "3">Third year</option>
   <option value = "4">Fourth year</option>
   </select>
   </div>
   </div>
   
   <div class="form-group">
   <label class="col-sm-2 control-label" >Sex:</label>
   <div class="radio col-sm-3">
   <label>
   <input name="gender" type="radio" class="form-control" value="M" checked/> Male
   </label>
   </div>
   <div class="radio col-sm-3">
   <label>
   <input name="gender" type="radio" class="form-control" value="F"  /> Female
   </label>
   </div>
   </div>
   <div class="form-group">
   <label class="col-sm-2 control-label" >Marital status:</label>
   <div class="radio col-sm-3">
   <label>
   <input name="maritial_status" type="radio" class="form-control" value="inRelationShip" /> In a Relationship
   </label>
   </div>
   <div class="radio col-sm-3">
   <label>
   <input name="maritial_status" type="radio" class="form-control" value="single" checked/> Single
   </label>
   </div>
   <div class="radio col-sm-3">
   <label>
   <input name="maritial_status" type="radio" class="form-control" value="married" /> Married
   </label>
   </div>
   
   </div>
   <div class="u_row">
   <legend>Contacts:</legend>
   <div class="form-group">
   <label class="col-sm-2 control-label" >Mailing Address:</label>
   <div class="col-sm-6">
   <input class="form-control" name="mailing_address" type="text" 
	  <?php
	    if(isset($_POST['mailing_address'])){
	     echo 'value="'.$_POST['mailing_address'].'"';
	    }
	    ?>
	 
	  
	  />
   </div>
   </div>
   <div class="form-group">
   <label class="col-sm-2 control-label" >E-mail:</label>
   <div class="col-sm-6">
   <input name="email" type="text" class="form-control" required=""
        <?php
	    if(isset($_POST['email'])){
	     echo 'value="'.$_POST['email'].'"';
	    }
	    ?>
   />
   </div>
   </div>
   <div class="form-group">
   <label class="col-sm-2 control-label" >Cell phone:</label>
   <div class="col-sm-6">
   <input name="phonenumber" type="text" class="form-control" required=""
            <?php
	    if(isset($_POST['phonenumber'])){
	     echo 'value="'.$_POST['phonenumber'].'"';
	    }
	    ?>
   />
   </div>
   </div>
   </div>
   </div>
   <div class="row u_row" >
   <div class="col-lg-6 u_row">
   <legend>Personal Profile:</legend>
   <div class="form-group">
   <label class="col-sm-2 control-label" >Skills:</label>
   <div class="col-sm-6">
            <textarea name="skills" rows="3" cols="60" class="form-control"
	     
	    <?php
	    if(isset($_POST['skills'])){
	     echo 'value="'.$_POST['skills'].'"';
	     
	    }
	    ?>
	    ></textarea>
   </div>
   </div>
   <div class="form-group">
   <label class="col-sm-2 control-label" >Hobbies & Interests:</label>
   <div class="col-sm-6">
   <textarea name="hobbies" rows="3" cols="60" class="form-control"
	     <?php
	          if(isset($_POST['hobbies'])){
	             echo 'value="'.$_POST['hobbies'].'"';
	     
	         }
	    ?> 
	     ></textarea>
   </div>
   </div>
   <div class="form-group">
   <label class="col-sm-2 control-label" >Enter Activation Code</label>
   <div class="col-sm-6">
   <input type="text" class=""  name="activationCode" required="" />
   </div>
   </div>
   <div class="form-group">
   <label class="col-sm-2 control-label" >Upload Picture:</label>
   <div class="col-sm-6">
   <input type="file" class="" id="file" name="file" />
   </div>
   </div>
   
   </div>
   <div class="col-lg-6 u_row">
   <div class="">
   <legend>Sensitive Details:</legend>
   <div class="form-group">
   <label class="col-sm-2 control-label" >Password:</label>
   <div class="col-sm-6">
   <input class="form-control" name="password" type="password" required=""/>
   </div>
   </div>
   <div class="form-group">
   <label class="col-sm-2 control-label" >Repeat Password:</label>
   <div class="col-sm-6">
   <input class="form-control" name="repeatedPassword" type="password" required=""/>
   </div>
   </div>
   <div class="form-group">
   <div class="col-sm-3">
   <input type="submit" value="Submit" class="u_button form-control u_row" />
   </div>
   </div>
   </div>
   
   </div>
   </div>
   </form>
   </div>
   </div>
   <!--container -->
   <div class="content">
   <?php
   try{
   $template->render('footer.php');
   }
   catch(Exception $e){
   echo 'Message: '. $e->getMessage();
   }
   
   ?>
   </div>
   </div>
   </body>
   </html>