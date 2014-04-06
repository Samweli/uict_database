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
$loader->service('template');
$loader->service('CurrentPage');
$members = $data;
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
	    echo '<link rel="stylesheet" type="text/css" href="../public/css/'.$file.'" />';	    }
	    
	    ?>
             
<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Tangerine" />
<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Gafata" />

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
		    <ul class="nav navigation-menu" >
				<li  class="active-menu list-menu"><a><i class="diff glyphicon glyphicon-pushpin"></i> Enrolled Projects</a></li>
				<li  class="list-menu"><a><i class="diff glyphicon glyphicon-book"></i> On Going Projects</a></li>
				<li  class="list-menu"><a><i class="diff glyphicon glyphicon-map-marker"></i> Up comming Events</a></li>
				<li  class="list-menu"><a><i class="diff glyphicon glyphicon-map-marker"></i> Community Members</a></li>
				<li  class="list-menu"><a><i class="diff glyphicon glyphicon-bookmark"></i> My Account</a></li>
			 </ul>
		 </div><!-- end of row for info -->

         </div><!-- end of col-md-3 -->
         <div class="col-md-6">
             <div class="row">
	             <form action="<?php echo URL;?>user/search" method="post">
				       <div class="input-group">
				         <input type="text" class="form-control" placeholder="Search a colleague"  />
				         <span class="form-control-btn">
				           <input type="submit" class="btn btn-primary" value="Search" />
				         </span>
				       </div>
				 </form>
			 </div><!-- end of row for search bar -->

			 <div class="row user_form">
			    <form role="form" action="#" method="post">
				    <lable for="title"></lable>
				    <input type="text" name="title" class="form-control" required id="title" placeholder="Project title"/>
				    <label for="description"></label>
				    <textarea name="description" class="form-control" id="description" placeholder="Project description"></textarea>
				    <label for="begin_date"></label>
				    <input type="date" name="begin_date" class="form-control" required id="begin_date"/>
				    <label for="initiator"></label>
				    <select class="form-control" name="initiator_id" id="initiator">
				       <option value="0">--Project Initiator--</option>
				       <?php
				          foreach($members as $member){
				          	echo '<option value="'.$member[id];
				          	
				          	if(defined($_POST)){
                               if($member['id'] == $_POST['initiator_id']){
                                  echo 'selected="selected">'.$member['first_name'].' '.$member['last_name'].'</option>';
                               }
				          	}else{
				          	   echo '">'.$member['first_name'].' '.$member['last_name'].'</option>';
				            }
				          }
				       ?>
				    </select>
				    <input type="reset" value="Clear" class="btn btn-primary" required />
				    <input type="submit" value="Add Project" class="btn btn-primary" required />
				  </form>
			 </div><!-- end of row for user form -->

         </div><!-- end of col-md-6 -->
         <div class="col-md-3">
            <div class="recent_activity">
				 <h3>Recent Activities</h3> 
				</div>
				<ul class="nav">
				       <li class="activity_li">Today: <a>Shared OOP book</a></li>
				       <li class="activity_li">Yesterday: <a>Joined Project Logo</a></li>
				       <li class="activity_li">Yesterday: <a>Commented on Charity Event</a></li>
				       <li class="activity_li">Last Week: <a>Left Project Together</a></li>
				       
				</ul>
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