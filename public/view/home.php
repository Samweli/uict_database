<?php 
  /*
   require_once('../includes/model/session.php');
   require_once('../includes/helper/functions.php');

   if($session->is_logged_in == false){
       redirect('login.php');
   }
   */
?>
<?php
$loader = new Loader();

try{

   $loader->service('Template.php');
   $loader->service('CurrentPage.php');
$members = $data;

}
catch(Exception $e){
 echo 'Message: '. $e->getMessage();
}


$template = new Template();

CurrentPage::$currentPage = "userhome";

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Home | UICT Community</title>

<meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php
	   try{
	       $template->render('resources.php');
	   }catch(Exception $e){
	       echo 'Message'.$e->getMessage();
	   }
 ?>
             
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
	 <div class="row u_row">

         <div class="col-md-3">
	  
             <div class="row user_photo">
             <img class="img img-thumbnail" src="<?php  echo '../../public/img/userImages/'.$data['user']->profile_picture; ?>" />
			 
			 <a href="<?php echo URL.'home/userProfile/'.$data['user']->id ?>" title="Checkout Profile" ><?php echo $_SESSION['first_name'].' '.$_SESSION['last_name']; ?></a>
		 </div><!-- end of row for profile picture -->
		 <div class="row user_nav">
                   <?php
		    try{
		     $template->render('navigation.php');
		    }catch(Exception $e){
		     echo 'Message:'.$e->getMessage();
		    }
		  ?>
		 </div><!-- end of row for info -->

         </div><!-- end of col-md-3 -->
         <div class="col-md-6">
             <div class="row">
	             <div class="col-lg-12">
				    <div class="input-group">
				      <input type="text" class="form-control" placeholder="Search for member">
				      <span class="input-group-btn">
				        <button class="btn btn-primary" type="button">Search <span class="glyphicon glyphicon-search"></span></button>
				      </span>
				    </div><!-- /input-group -->
				  </div><!-- /.col-lg-6 -->
			 </div><!-- end of row for search bar -->

			 <div class="row user_form">
			    <!-- All Events list-->
                 



			 </div><!-- end of row for user form -->

         </div><!-- end of col-md-6 -->
         <div class="col-md-3">
            <?php
		try{
		  $template->render('left_side_menu.php');
		}
		catch(Exception $e){
		  echo 'Message: '. $e->getMessage();
		}
	      
	      ?>
         </div><!-- end of col-md-3 -->

			 </div><!-- end u_main_content -->

			    </div>
		       </div>
		</div>
	       </div>
	</div>
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
