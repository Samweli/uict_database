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

CurrentPage::$currentPage = "userhome";

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
	    echo '<link rel="stylesheet" type="text/css" href="../../public/css/'.$file.'" />';	    }
	    
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
		<div class="col-lg-6">
		  <div class="row ">
			 
			 <div class="col-lg-3">
				<img class="img img-thumbnail" src="../public/img/profile_photo.jpg" />
			 <a href="<?php echo URL; ?>home/userProfile" title="Checkout Profile" ><?php echo $_SESSION['first_name']." ".$_SESSION['last_name'];?></a>

			 </div>
			 <div class="col-lg-6 col-md-offset-3">
				<form action="../controller/search.php" method="get">
				       <div class="input-group">
				       <input type="text" class="form-control-min" size="40" placeholder="Search a colleague"  />
				       <span class="input-group-btn">
				       <input type="submit" class="btn btn-primary" value="Search" />
				       </span>
				       </div>
				</form>
				
			 </div>
			 <div class="container">
		       <div class="col-lg-3 pull-right recent">
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
		       </div>
		       
		  </div>
		  <div class="row u_row lower_row">
		       <div class="col-lg-6">
			 <ul class="nav navigation-menu" >
				<li  class="active-menu list-menu"><a><i class="diff glyphicon glyphicon-pushpin"></i> Enrolled Projects</a></li>
				<li  class="list-menu"><a><i class="diff glyphicon glyphicon-book"></i> OnGoing Projects</a></li>
				<li  class="list-menu"><a><i class="diff glyphicon glyphicon-map-marker"></i> Enrolled Projects</a></li>
				<li  class="list-menu"><a><i class="diff glyphicon glyphicon-bookmark"></i> Enrolled Projects</a></li>
			 </ul>
		       </div>
		   <div class="col-md-offset-6">
			 <div class="main_content user_form">
				<div class="a_content">
				   
				  <form role="form" action="#" method="post">
				    <label for="title"></label>
				    <input type="text" name="title" class="form-control" required id="title" placeholder="Project title" />
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
				 
				</div>
			 </div>
			 </div>
			      <!-- end u_main_content -->
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

</html>
