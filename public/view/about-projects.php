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
              $cssFiles = array("bootstrap.min.css","bootstrap-theme.css","style.css","main.css");
              foreach($cssFiles as $file){
                echo '<link rel="stylesheet" type="text/css" href="../public/css/'.$file.'" />';     
              }
      
            ?>
            <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Tangerine" />
            <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Gafata" />
            
        </head>
        <body>
            <div id="page">
                    <div id="header">
		    <?php
  		      try{
  			       $template->render('header.php');
  		      }catch(Exception $e){
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
                            <h2>Projects Based Learning</h2>
                            </div>
                            <p>
                              We raise ideas and bring technical challenges in various ICT issues to the community concern and 
                              encourage members to work on solutions. We explore different options to solve a particular challenge at
                               hand with either software or hardware based approach. This process require the members to brainstorm 
                               and search for more knowledge on the issue which enables the community to carry out step by step solution 
                               in all community projects. 
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
                        <!-- container -->
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
    

