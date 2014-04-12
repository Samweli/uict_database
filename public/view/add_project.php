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
             <img class="img img-thumbnail" src="<?php  echo './../public/img/'.$_SESSION['first_name'].' '.$_SESSION['last_name'].'.jpg' ?>" />
			 <a href="profile.php" title="Checkout Profile" ><?php echo $_SESSION['first_name'].' '.$_SESSION['last_name']; ?></a>
		 </div><!-- end of row for profile pictire -->
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
			    <form role="form" <?php echo 'action="'.URL.'project/add_project"'; ?> method="post">
				    <lable for="title"></lable>
				    <input type="text" name="title" class="form-control" required id="title" placeholder="Project title"/>
				    <label for="description"></label>
				    <textarea name="description" class="form-control" id="description" placeholder="Project description"></textarea>
				    <label for="begin_date">Begin Date</label>
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