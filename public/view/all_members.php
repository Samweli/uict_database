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

CurrentPage::$currentPage = "all_members";
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
              <img class="img img-thumbnail" src="<?php  echo './../public/img/'.$_SESSION['first_name'].' '.$_SESSION['last_name'].'.jpg'; ?>" />
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
			    <!-- All Events list-->
                 <?php
                    foreach($members as $member){
                      echo '<div class="content_list">';
                        echo '<h3 class="title"><span><img src="../public/img/'.$member['first_name'].' '.$member['last_name'].'.jpg" class="img col-sm-2" title="Project Title"/></span>';
                        echo $member['first_name'].' '.$member['last_name'].'</h3>';
                        echo '<span class="tag">'.$member['program'];

                        if($member['year_of_study'] == 1){
                             echo ' - First Year</span>';
                        }else if($member['year_of_study'] == 2){
                             echo ' - Second Year</span>';
                        }else if($member['year_of_study'] == 3){
                        	echo ' - Third Year</span>';
                        }else{
                        	echo ' - Fourth Year</span>';
                        }
                        
                        //echo '<p class="_description"></p>';
                        //echo '<p class="initiator"><span class="tag">Published By </span>';
                        //echo $event['first_name'].' '.$event['last_name'].'<span class="tag"> Up Coming On </span>'.$event['event_date'].'</p>'; 
                        echo '<ul class="nav nav-pills content_nav">';
                          echo   '<li><a href="#"><span class="glyphicon glyphicon-envelope"></span> Message</a></li>';
                          echo   '<li><a href="#"><span class="glyphicon glyphicon-comment"></span> Profile</a></li>'; 
                          echo   '<li><a href="#"><span class="glyphicon glyphicon-ok"></span> Subscribe</a></li>';
                        echo '</ul>';
                      echo '</div>';
                    }
                 ?> 



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