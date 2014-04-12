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
		  try{
		      $template->render('resources.php');
		  }catch(Exception $e){
		      echo 'Message'.$e->getMessage();
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
                            <h2>Sports and Socialization</h2>
                            </div>
                            <p>
                              As a community we involve ourselves in different sports and games activities for 
                              improving physical and mental health as well as for enhancing interaction among 
                              community members. We hold sports events such as sports bonanza, friendly football matches, 
                              athletes, volleyball, swimming galas and so much more.
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
    

