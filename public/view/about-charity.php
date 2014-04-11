<?php
try{
   $loader = new Loader();
   $loader->service('Template.php');
   $loader->service('CurrentPage.php');
   $template = new Template();
 }catch(Exception $e){
   echo "Message: ".$e.getMessage();
 }

?>

<!DOCTYPE html>
    <html lang='en'>
        <head>
            <meta charset="utf-8" />
            <title>UICT COMMUNITY</title>
            <?php
              $cssFiles = array("bootstrap.min.css","bootstrap-theme.css","style.css","main.css","font.css");
              foreach($cssFiles as $file){
                echo '<link rel="stylesheet" type="text/css" href="../public/css/'.$file.'" />';     
              }
            ?>
           
        </head>
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
                
                      
                      <!-- header -->
                      </div>
                <!-- container -->
                      <div class="container">
                      <div class="content">
                        <div class="description" >
                            <div class="u_heading">
                            <h2>Charity</h2>
                            </div>
                            <p>
                              We recognize social and economic challenges in the society around us as we stretch out to 
                              help the poor and the needy. As a community we visit orphanages and other vulnerable areas such
                               as juvenile places as well as different hospitals doing our best possible to reach various 
                               angles of our society to help out the situation. 
                            </p>
                            
                           
                         </div>
                        </div>
                        <!-- description -->
                        <?php
                            try{
                                $template->render('about-community.php');
                            }catch(Exception $e){
                                echo 'Message: '. $e->getMessage();
                            }
                          ?>
                      </div>
                      <!-- content -->
                      <div class="content">
                      <?php
                  		      try{
                  			       $template->render('footer.php');
                  		      }catch(Exception $e){
                  			       echo 'Message: '. $e->getMessage();
                  		      }
                  		    
                  		?>
                    </div>
                
            </div>
        </body>
    </html>
    

