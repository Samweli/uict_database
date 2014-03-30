<?php //require_once('../includes/helper/initialize.php'); 
        require_once('../../includes/services/functions.php');
        require_once('../../includes/services/Template.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Login | UICT Community</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="../css/bootstrap.min.css" type="text/css" rel="stylesheet">
<link href="../css/custom.css" type="text/css" rel="stylesheet">
<link href="../css/main.css" type="text/css" rel="stylesheet">
</head>
<body>

    <header class="navbar navbar-static-top bs-docs-nav u_header" id="top" role="banner">
         <?php
                 try{
                     $template->render('header.php');
                 }catch(Exception $e){
                     echo "Message: ". $e->getMessage();
                 }
          ?>
    </header>


   <section id="login_section">
     <div class="login_header">   <!--the small uict logo was here before, it is replaced with login message now!-->
	 
	      <h3>Sign in to UICT Community</h3>
	 </div>    
     <div class="message">
        <?php
           if($_GET){
              echo output_message(urldecode($_GET['message']));
           }
        ?>
     </div>
	 <div class="ui_form">
     <form name="login" action="../../includes/controller/process_login.php" method="post">
       <label for="reg_number"></label>
       <input type="text" name="reg_number" id="reg_number" required placeholder="Registration number" class="form-control">
       <label for="password"></label>
       <input type="password" name="password" id="password" required placeholder="Password" class="form-control">
       <label for="login"></label>
       <input type="submit" value="Login" id="login" class="btn btn-info">
       <span><a href="reset-password.php">Forgot password?</a></span>
     </form>
	 </div>
   </section>
   <script src="../js/jquery_min.js"></script>
   <script src="../js/bootstrap.min.js"></script>
   
      <div class="content">
              <?php
                  try{
                     $template->render('footer.php');
                  }catch(Exception $e){
                     echo "Message: ".$e->getMessage();
                  }
              ?>
                
      </div><!-- end of content -->
  </div>
  
</body>
</html>
