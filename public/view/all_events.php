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
$projects = $data;
}
catch(Exception $e){
 echo 'Message: '. $e->getMessage();
}


$template = new Template();

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Home | UICT Community</title>

<meta name="viewport" content="width=device-width, initial-scale=1.0">
           <?php
	  
	    $cssFiles = array("bootstrap.min.css","bootstrap-theme.css","style.css","main.css");
	    
	    foreach($cssFiles as $file){
	    echo '<link rel="stylesheet" type="text/css" href="../public/css/'.$file.'" />';
	    }
	    
	    ?>
             
<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Tangerine" />
<link rel="stylesheet" type=`"text/css" href="http://fonts.googleapis.com/css?family=Gafata" />

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
             <img class="img img-thumbnail" src="../public/img/profile_photo.jpg" />
			 <a href="profile.php" title="Checkout Profile" >Samweli Twesa</a>
		 </div><!-- end of row for profile pictire -->
		 <div class="row user_nav">
                    <div class="list-group">
				 <a href="" class="list-group-item"><span class="glyphicon glyphicon-briefcase"></span> My Account</a>
				 <a href="<?php echo URL;?>user/all_projects" class="list-group-item"><span class="glyphicon glyphicon-folder-open"></span> On Going Projects</a>	
				 <a href="<?php echo URL;?>user/all_events" class="list-group-item active"><span class="glyphicon glyphicon-calendar"></span> Up comming Events</a>	
				 <a href="#" class="list-group-item"><span class="glyphicon glyphicon-user"></span> Community Members</a>
				 <a href="<?php echo URL;?>user/add_new_project" class="list-group-item"><span class="glyphicon glyphicon-tasks"></span> Publish Project</a>
				 <a href="<?php echo URL;?>user/add_new_event" class="list-group-item"><span class="glyphicon glyphicon-globe"></span> Publish Event</a>	
			</div>
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
            <div class="list-group">
				 <a href="#" class="list-group-item"><h3>Recent Activities</h3></a>
				 <a href="#" class="list-group-item">Yesterday:</a>	
				 <a href="#" class="list-group-item">Last Week:</a>	
				 <a href="#" class="list-group-item">Last Week:</a>	
			</div>
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