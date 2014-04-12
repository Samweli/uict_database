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
<title><?php //echo user name ?></title>

<meta name="viewport" content="width=device-width, initial-scale=1.0">
                <?php
		  try{
		      $template->render('resources.php');
		  }catch(Exception $e){
		      echo 'Message'.$e->getMessage();
		  }
		?>
             
</head> <!-- end of header -->
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

	</div>
	<!-- end of header-->
		

	<div class="container">
	 <div class="row u_row">
		<div class="col-lg-6">
		  <div class="row ">
			 
			 <div class="col-lg-3">
				<img class="img img-thumbnail" src="../public/img/profile_photo.jpg" />
			 <a href="<?php echo URL; ?>home/userProfile/" title="Checkout Profile" ><?php 

			 echo  $_SESSION['first_name']." ".$_SESSION['last_name'];?></a>
			 </div>
			 <div class="col-lg-6 col-md-offset-3">
				<form action="<?php echo URL; ?>home/search" method="get">
				       <div class="input-group">
				       <input type="text" required= "" name="search_request" class="form-control-min" size="40" placeholder="Search a colleague"  />
				       <span class="input-group-btn">
				       <input type="submit" class="btn btn-primary" value="Search" />

				       </span>
				       
				       </div>
				       
				</form>
				<div class="results">
					<?php if(isset($users)&& $users!=NULL){
						echo '<h4>Results</h4>';
						foreach ($users as $user ) {
							
							echo '<a href="'.URL.'home/userhome/'.$user->id.'" >'.$user->first_name.' '.$user->last_name.'</a><br />';
						}
					}else{
						echo '<h4>No member found</h4>';
					}
					?>
				</div>
				
			 </div>
			 <!-- end of the search bar -->

			
			 <div class="container">
		       <div class="col-lg-3 pull-right recent">
				<div class="recent_activity">
				<h3>Events attended</h3> 
               <ul class="nav">
				       <li class="activity_li">3rd July 2014: <a>Orhanage visit</a></li>
				       <li class="activity_li">1st May 2014: <a>Friendly match</a></li>
				       <li class="activity_li">22nd April 2013: <a>Muhimbili Hospital Visit</a></li>
				       <li class="activity_li">More than year ago: <a>Football match</a></li>
				       
				</ul>
				<div class="edit_button">
				
				</div>
			 </div>
		       </div> 
		       
		  </div> 
		  <!-- begin of personal infomations -->
		  
		  	<div class = "container_info">
               

		  	</div>
		  

		  
		  <div class="row u_row lower_row">
		    
		       <div class="col-md-offset-6">
			 <div class="main_content">
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
			 </div>
			 </div> 
			      <!-- end u_main_content -->
			    </div>
		       </div>
		</div>
	       </div>

	       	
		  
	</div>
	




	<!-- start of a footer-->
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

</body>
</html>
