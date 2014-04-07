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
$members = $data['users'];
$income_category = $data['income_categories'];
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
			 <a href="profile.php" title="Checkout Profile" ><?php echo $_SESSION['first_name'].' '.$_SESSION['last_name']; ?></a>
		 </div><!-- end of row for profile pictire -->
		 <div class="row user_nav">
            <div class="list-group">
                 <a href="<?php echo URL;?>user" class="list-group-item"><span class="glyphicon glyphicon-home"></span> Home</a>
				 <a href="" class="list-group-item"><span class="glyphicon glyphicon-briefcase"></span> My Account</a>
				 <a href="<?php echo URL;?>user/all_projects" class="list-group-item"><span class="glyphicon glyphicon-folder-open"></span> On Going Projects</a>	
				 <a href="<?php echo URL;?>user/all_events" class="list-group-item"><span class="glyphicon glyphicon-calendar"></span> Up comming Events</a>	
				 <a href="<?php echo URL;?>user/all_members" class="list-group-item"><span class="glyphicon glyphicon-user"></span> Community Members</a>
				 <a href="<?php echo URL;?>user/add_new_project" class="list-group-item"><span class="glyphicon glyphicon-tasks"></span> Publish Project</a>
				 <a href="<?php echo URL;?>user/add_new_event" class="list-group-item"><span class="glyphicon glyphicon-globe"></span> Publish Event</a>
				 <a href="<?php echo URL;?>user/add_income" class="list-group-item active"><span class="glyphicon glyphicon-plus"></span> Income</a>	
				 <a href="<?php echo URL;?>user/add_expense" class="list-group-item"><span class="glyphicon glyphicon-minus"></span> Expenses</a>	
				 <a href="<?php echo URL;?>finance/report" class="list-group-item"><span class="glyphicon glyphicon-usd"></span> Finacial Report</a>		
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
			    <!-- All Events list-->
                <form role="form" action="<?php echo URL;?>finance/add_income" method="post">
                   <label for="amount"></label>
                   <div class="input-group">
                     <span class="input-group-btn">
                       <button class="btn btn-default">TSH</button>
                     </span>
                     <input type="number" min="0" step="500" name="amount" class="form-control" placeholder="Income amount" required/>
                     <span class="input-group-btn">
                       <button class="btn btn-default">/=</button>
                     </span>
                   </div><!-- end input group -->
                   <label for="income_category"></label>
                   <select class="form-control" name="category_id" id="income_category">
				       <option value="0">--Income Category--</option>
				       <?php
				          foreach($income_category as $category){
				          	echo '<option value="'.$category[id];
				          	
				          	if(defined($_POST)){
                               if($category['id'] == $_POST['initiator_id']){
                                  echo 'selected="selected">'.$category['category'].'</option>';
                               }
				          	}else{
				          	   echo '">'.$category['category'].'</option>';
				            }
				          }
				       ?>
				    </select>
                   <label for="description"></label>
                   <textarea name="description" id="description" class="form-control" placeholder="Income description"></textarea>
                   <div class="radio-controls">
	                   <label class="radio-inline" for="member_income">
	                        <input type="radio" name="income_source" value="member_income" id="member_income" checked="checked"/>
                              Income from community member
	                   </label>
	                   <label class="radio-inline" for="member_donor">
	                        <input type="radio" name="income_source" value="donor_income" id="donor_income" />
	                          Income from external donor
	                   </label>
	               </div><!-- end of radio-controls -->
                   <label for="contributor"></label>
                   <select class="form-control" name="member_id" id="contributor">
				       <option value="0">--Contributing Member--</option>
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
				    <label for="donor"></label>
				    <input type="text" name="donor_name"id="donor" class="form-control" placeholder="Donor name" />
				    <input type="submit" value="Add Income" class="btn btn-primary" required />
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