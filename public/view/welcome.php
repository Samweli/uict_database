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

	</div>
	<!-- end of header-->
	<div class="welcome">
		<div >
			<!-- content-->	
			<div id="left_panel">
			<div id = "message">
			 <span id="line1">Welcome</span> <br /><span id="line2">to</span> <br /><span id="line3">UICT Community</span>
			 </div>

			</div>			

			<div id = "right_panel">
            <img  src="../public/img/graduated.png" class="profIcon" alt="profile Icon"  width="200" height="200"/>
            
                                <a href="<?php echo URL.'home/userhome/'.$data->id ?>" class="u_button u_button_welcome" >view profile</a>
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