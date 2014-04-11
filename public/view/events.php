<?php

/* now it is only require_once in first index.php
require_once('./includes/services/Loader.php');
*/

    $loader = new Loader();
    try{
       
       $loader->service('Template.php');
       $loader->service('CurrentPage.php');
       $events = $data;
       
       $template = new Template();
       
       CurrentPage::$currentPage = "events";
       
    }catch(Exception $e){
       echo "Message: ".$e->getMessage();
    }
    
?>
<!DOCTYPE html>
    <html lang='en'>
        <head>
            <meta charset="utf-8" />
            <title>UICT COMMUNITY</title>
            <?php
      
      $cssFiles = array("bootstrap.min.css","bootstrap-theme.css","style.css","main.css","events.css","font.css");
      
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
                           <h3>Events</h3>
                         </div><!-- end col-md-12 -->
                       </div><!-- end container -->
                    </div><!-- end row page header -->
                    <div class="row u_row search">
                      <div class="col-md-4" >
                         <div class="row search_events">
                             <form role="form" name="search_events">
                               <label for="search_by_title">Search by title</label>
                               <input type="text" class="form-control" id="search_by_title" placeholder="Event title"/> 
                               <input type="submit" value="Search" class="btn btn-default submit"/>
                             </form><!-- end search_event -->
                         </div><!-- end row search_events -->
                         <div class="row other">
                              <!-- content not yet defined -->
                         </div><!-- end row other -->
                      </div><!-- end col-md-4 -->
                      <div class="col-md-8">
                        <div class="row search_events">
                           <form role="form" name="search_events">
                             <div class="col-md-6">
                               <label for="search_by_begin_date">Search by begin date</label>
                               <input type="date" id="search_by_begin_date" placeholder="Begin date" class="form-control"/>
                             </div><!-- end of col -->
                             <div  class="col-md-6">
                               <label for="search_by_end_date">Search by end date</label>
                               <input type="date" id="search_by_end_date" placeholder="End date" class="form-control"/>
                               <input type="submit" value="Search" class="btn btn-default submit"/>
                             </div>
                           </form><!-- end search_event -->
                        </div><!-- end row for search boxes-->
                        <div class="row">
                          <?php
                             if(isset($events) && is_array($events)){
                               foreach($events as $event){
                                   echo '<div class="event">';
                                      echo '<div class="event-wrapper">';
                                      echo '<span class="event_tag"></span><span class="event_title"><a href="';
                                      echo 'community-event.php?id='.urlencode($event['id']).'">'.$event['title'].'</a></span>';
                                      echo '<span class="event_tag">Description </span><span class="event_description">'.$event['description'].'</span>';
                                      echo '<span class="event_more"><a href="community_event/id=';
                                      echo urlencode($event['id']).'">Read more</a></span>';
                                      echo '<span class="event_tag">Date & Time </span><span class="event_time">'.$event['event_date'].'</span>';
                                      echo '<span class="event_tag">Posted By </span><span class="event_publisher">'.$event['first_name'];
                                      echo ' '.$event['last_name'].'</span>';
                                      echo '</div>';
                                   echo '</div>';
                                }
                             }
                          ?>      
                        </div><!-- end row for events list -->
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
