<?php
$loader = new Loader();

$error = $data;
try{
   $loader->service('Template.php');
   $loader->service('CurrentPage.php');
}
catch(Exception $e){
 echo 'Message: '. $e->getMessage();
}


 CurrentPage::$currentPage = "homeDenied";
 

$template = new Template();

// variable to detect the index page

?>
<!DOCTYPE html>
    <html lang='en'>
        <head>
            <meta charset="utf-8" />
            <title>UICT COMMUNITY</title>
	          <?php
	              $cssFiles = array("bootstrap.min.css","bootstrap-theme.css","style.css","main.css");
          	    foreach($cssFiles as $file){
          	       echo '<link rel="stylesheet" type="text/css" href="../../public/css/'.$file.'" />';	    
                }  
          	?>
            <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Tangerine" />
            <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Gafata" />
           
            
        </head>
        <body>
            <div id="page">
                <div id="header">
		    <?php
		      try{ $template->render('header.php');
		      }
		      catch(Exception $e){
			echo 'Message: '. $e->getMessage();
		      }
		    
		    ?>
		    </div>
                <div class="col-lg-9 col-md-offset-3" >
                  <div class="denied_message">
		     <div >
			
			<div>
			<h3><?php echo $error ?></h3>
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
            </div>
            
            
        </body>
    </html>