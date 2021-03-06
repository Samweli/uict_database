<?php
    $loader = new Loader();
    try{
	
	$loader->service('Template.php');
	$loader->service('CurrentPage.php');
	$loader->model('comment.php');
    }catch(Exception $e){
	echo 'Message:'.$e->getMessage();
    }
    
    if(isset($_GET['id'])){
    if(urldecode($_GET['id'])){
    	$event_id = urldecode($_GET['id']);
        $com_event = $event->get_event($event_id);
        try{
		    $comment->source_id = $com_event['id'];
		    $comment->category = "event";
		    $comments = $comment->get_comments();
		}catch(Exception $e){
		    echo "Messsage: ".$e->getMessage();
		}
	}
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
	       $template = new Template();
                   try{
                       $template->render('header.php');
                   }catch(Exception $e){
                       echo "Message: ". $e->getMessage();
                   }
               ?>
              </div><!-- end header -->
              <div class="u_events">  
                 <div class="container">
                    <div class="row">
                       <div class="container">
                         <div class="col-md-12 header_events">
                           <h3><a href="events.php">Events</a> >>
			    <?php
			    if(isset($com_event)){
			    echo $com_event['title'];
			    }
			    else{
				echo 'Event information have not yet been added';
			    }
				?></h3>
                         </div><!-- end col-md-12 -->
                       </div><!-- end container -->
                    </div><!-- end row page header -->
                    <div class="row u_row search">
                      <div class="col-md-4" >
                      
                         <div class="row other">
                              <!-- content not yet defined -->
                         </div><!-- end row other -->
                      </div><!-- end col-md-4 -->
                      <div class="col-md-8">
                        
                        <div class="row">
                          <?php
                             if(isset($com_event) && is_array($com_event)){

                                   echo '<div class="event">';
                                      echo '<div class="event-wrapper">';
                                      echo '<span class="event_tag"></span><span class="event_title">'.$com_event['title'].'</span>';
                                      //echo '<span class="event_title">'.$event['category'].'</span>';
                                      echo '<span class="event_tag">Description </span><span class="event_description">'.$com_event['description'].'</span>';
                                      echo '<span class="event_tag">Date & Time </span><span class="event_time">'.$com_event['date'].'</span>';
                                      echo '<span class="event_tag">Posted By </span><span class="event_publisher">';
                                      echo $com_event['first_name'].' '.$com_event['last_name'].'</span>';
                                      echo '</div>';
                                   echo '</div>';
                                
                             }

                          ?>      
                        </div><!-- end row for events list -->
                         <?php
                            if(isset($comments) && is_array($comments)){ 
                                 foreach($comments as $comment){
                                     echo '<div class="row comment">';
                                        echo '<div class="comment_wrapper">';
	                                        echo '<div class="col-md-1">';
	                                           if($comment['profile_picture'] == null){
	                                           	   echo '<img src="../img/avatars/graduated.png" class="img-circle" width="60" height="60">';
	                                           }else{
	                                               echo '<img src="../img/members/'.$comment['profile_picture'].'" class="img-circle" width="60" height="60">';
	                                           }
	                                        echo '</div>';
	                                        echo '<div class="col-md-10">';
	                                           echo '<h3>'.$comment['first_name'].' '.$comment['last_name'].'</h3>';
	                                           echo '<p>'.$comment['comment'].'</p>';
	                                        echo '</div>';
                                        echo '</div>';
                                     echo '</div>';
                                 }
                             }
                         ?>
                      </div><!-- end col-md-8 -->
                   </div><!-- end row -->
                 </div><!-- end container -->
              </div><!-- end u_events -->

                      <!-- content -->
                      <div class="content">
                      <?php
                          try{
                             $template->render('footer.php');
                          }catch(Exception $e){
                             echo "Message: ".$e->getMessage();
                          }
                      ?>
                    </div>
                
            </div>
        </body>
    </html>