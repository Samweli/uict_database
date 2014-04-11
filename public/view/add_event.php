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
$event_category = $data;
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
	    echo '<link rel="stylesheet" type="text/css" href="../public/css/'.$file.'" />';	    }
	    
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
			 <a href="profile.php" title="Checkout Profile" ><?php echo $_SESSION['first_name'].' '.$_SESSION['last_name']; ?></a>
		 </div><!-- end of row for profile pictire -->
		 <div class="row user_nav">
            <div class="list-group">
                 <a href="<?php echo URL;?>user" class="list-group-item"><span class="glyphicon glyphicon-home"></span> Home</a>
				 <a href="<?php echo URL;?>user" class="list-group-item"><span class="glyphicon glyphicon-briefcase"></span> My Account</a>
				 <a href="<?php echo URL;?>user/all_projects" class="list-group-item"><span class="glyphicon glyphicon-folder-open"></span> On Going Projects</a>	
				 <a href="<?php echo URL;?>user/all_events" class="list-group-item"><span class="glyphicon glyphicon-calendar"></span> Up comming Events</a>	
				 <a href="<?php echo URL;?>user/all_members" class="list-group-item"><span class="glyphicon glyphicon-user"></span> Community Members</a>
				 <a href="<?php echo URL;?>user/add_new_project" class="list-group-item"><span class="glyphicon glyphicon-tasks"></span> Publish Project</a>
				 <a href="<?php echo URL;?>user/add_new_event" class="list-group-item"><span class="glyphicon glyphicon-globe"></span> Publish Event</a>
				 <a href="<?php echo URL;?>user/add_income" class="list-group-item"><span class="glyphicon glyphicon-plus"></span> Income</a>	
				 <a href="<?php echo URL;?>user/add_expense" class="list-group-item"><span class="glyphicon glyphicon-minus"></span> Expenses</a>	
				 <a href="<?php echo URL;?>finance/report" class="list-group-item active"><span class="glyphicon glyphicon-usd"></span> Finacial Report</a>	
			     <a href="<?php echo URL;?>forum" class="list-group-item"><span class="glyphicon glyphicon-comment"></span> Forum</a>
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
			    <form role="form" action="<?php echo URL;?>event/add_event" method="post">
				    <lable for="title"></lable>
				    <input type="text" name="title" class="form-control" required id="title" placeholder="Event title"/>
				    <label for="description"></label>
				    <textarea name="description" class="form-control" id="description" placeholder="Event description"></textarea>
				    <label for="event_date">Event Date</label>
				    <input type="date" name="event_date" class="form-control" required id="event_date"/>
				    <input type="hidden" name="publisher_id" class="form-control" value="<?php echo $_SESSION['user_id'];?>" required id="event_date"/>
				    <label for="category"></label>
				    <select class="form-control" name="category_id" id="category">
				       <option value="0">--Event Category--</option>
				       <?php
				          foreach($event_category as $category){
				          	echo '<option value="'.$category[id];
				          	
				          	if(defined($_POST)){
                               if($category['id'] == $_POST['category_id']){
                                  echo 'selected="selected">'.$category['category'].'</option>';
                               }
				          	}else{
				          	   echo '">'.$category['category'].'</option>';
				            }
				          }
				       ?>
				    </select>
				    <input type="submit" value="Publish Project" class="btn btn-primary" required />
				    <input type="reset" value="Clear" class="btn btn-default" required />
				  </form>
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