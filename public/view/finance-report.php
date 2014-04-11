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
$income = $data['income'];
$expenses = $data['expenses'];
$total_income = $data['total_income'];
$total_expenses = $data['total_expenses'];
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
                <div class="col-md-6 income">

                   <div class="panel panel-default">
                      <div class="panel-heading">Income</div>
                      <div class="panel-body">
                          <ul>
                      	  <?php
                            foreach($income as $cash){
                             echo '<li>Tsh ';
                              echo $cash['amount'].' /=';
                              echo '<span class="tag">From ';
                              if($cash['donor_name'] != NULL){
                                 echo '<span>'.$cash['donor_name'].'</span>';
                              }else{
                                 echo '<span>'.$cash['first_name'].' '.$cash['last_name'].' </span>';
                              }
                              echo '</span>';
                              echo '<span class="tag">For <span class="cash_category">'.$cash['category'].'</span></span>';
                              echo '</li>';
                            }
                          ?>
                          </ul>
                      </div><!-- end of panel-body -->
                      <div class="panel-footer">Total Income: 90000</div>
                   </div><!-- end of panel -->
  
                </div><!-- end income report -->
                <div class="col-md-6 expenses">
                   <div class="panel panel-default">
	                   <div class="panel-heading">Expenses</div>
	                      <div class="panel-body">
	                         <ul>
	                      	 <?php
	                             foreach($expenses as $cash){
	                               echo '<li>Tsh ';
	                               echo $cash['amount'].' /=';
	                               echo '<span class="tag">For ';
	                               echo '<span>'.$cash['description'].'</span>';
	                               echo '</span></li>';
	                             }
	                         ?>
                             </ul>
	                      </div><!-- end of panel-body -->
	                      <div class="panel-footer">Total Expenses: <?php echo $total_expenses[0];?></div>
                   </div><!-- end of panel -->
                   
                </div><!-- end expenses report -->

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