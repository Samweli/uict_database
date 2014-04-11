<?php
$loader = new Loader();
if(isset($data)){
$user = $data;
}else{
	$users = null;
	$result_not_found = "results not found";
}
try{
$loader->service('Template.php');
$loader->service('CurrentPage.php');
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
	  
	    $cssFiles = array("bootstrap.min.css","bootstrap-theme.css","style.css","main.css","font.css");
	    
	    foreach($cssFiles as $file){
	    echo '<link rel="stylesheet" type="text/css" href="../../public/css/'.$file.'" />';	    }
	    
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
             <img class="img img-thumbnail" src="<?php  echo '../../public/img/'.$_SESSION['first_name'].' '.$_SESSION['last_name'].'.jpg' ?>" />
			 <a href="<?php echo URL.'home/userProfile/'.$_SESSION['user_id'] ?>" title="Checkout Profile" ><?php echo $_SESSION['first_name'].' '.$_SESSION['last_name']; ?></a>
		 </div><!-- end of row for profile pictire -->
		<!-- end of row for info -->

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
				  
				  <div class="results">
					<?php if(isset($users)&& $users!=NULL){
						echo '<h4>Results</h4>';
						foreach ($users as $user ) {
							
							echo '<a href="'.URL.'home/userhome/'.$user->id.'" >'.$user->first_name.' '.$user->last_name.'</a><br />';
						}
					}
					?>
				</div>
			 </div><!-- end of row for search bar -->

			 <div class="row user_form">
			    <!-- All Events list-->
                           	<h3>Personal info</h3> 
               <ul class="nav">
				       <li class="activity_li">Registration Number: <a><?php echo  $_SESSION['reg_number'];?></a></li>
				       <li class="activity_li">Degree program: <a>Computer Science</a></li>
				       <li class="activity_li">Email: <a><?php echo $_SESSION['email_address'];?></a></li>
				       <li class="activity_li">Phone Number: <a><?php echo $_SESSION['phone_number']; ?></a></li>
				       
				</ul>
				<div class="edit_button">
				<?php echo '<a href="'.URL.'home/editInfo/'.$user->id.'" class="u_button">edit</a>' ?>
				</div>



			 </div><!-- end of row for user form -->

         </div><!-- end of col-md-6 -->
         <div class="col-lg-3">
	  <div class="list-group">
				<h3>Events attended</h3> 
               <ul class="nav">
				       <li class="activity_li">3rd July 2014: <a>Orhanage visit</a></li>
				       <li class="activity_li">1st May 2014: <a>Friendly match</a></li>
				       <li class="activity_li">22nd April 2013: <a>Muhimbili Hospital Visit</a></li>
				       <li class="activity_li">More than year ago: <a>Football match</a></li>
				       
				</ul>
				<div class="edit_button">
			 </div>
		       </div> <!-- end of col-md-3 -->

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
