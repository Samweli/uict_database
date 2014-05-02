<?php
$loader = new Loader();
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

?>

<header class="navbar navbar-static-top bs-docs-nav u_header" id="top" role="banner">
              <div class="container">
               
		<button type="button" class="btn btn-primary btn-navbar hidden-bar pull-right" data-toggle="coll" data-target=".navbar-collapse">
                    <span class="glyphicon glyphicon-align-justify"></span>
                </button>
			    
                 <?php
		
		  if(CurrentPage::$currentPage == "home"){
                     echo '<a href="/index.php" class=""><img class="logo img col-sm-4" src="./public/img/uict.jpg" alt="uict logo"/></a>';
		  }
		  elseif(CurrentPage::$currentPage == "userhome"){

			    echo '<a href="/index.php" class=""><img class="logo img col-sm-4" src="../../public/img/uict.jpg" alt="uict logo"/></a>';  	
	          }elseif(isset($_GET['url']) && substr_count($_GET['url'],"/") ==3){
			 echo '<a href="/index.php" class=""><img class="logo img col-sm-4" src="../../public/img/uict.jpg" alt="uict logo"/></a>';  	   
		  }elseif(isset($_GET['url']) && substr_count($_GET['url'],"/") ==3){
			 echo '<a href="/index.php" class=""><img class="logo img col-sm-4" src="./public/img/uict.jpg" alt="uict logo"/></a>';    
		  }
		  else{
	             echo '<a href="/index.php" class=""><img class="logo img col-sm-4" src="../public/img/uict.jpg" alt="uict logo"/></a>';  	
		  }
		 ?>
                 
                
		 
                <nav class="coll navbar-collapse" role="navigation">
               
                     <ul class="nav navbar-nav navbar-right">
                            <li class= "<?php echo CurrentPage::$currentPage == "home"?'active':'list'; ?>" >
			    <?php
			         if(!(isset($_SESSION['logged_in']) && $_SESSION['logged_in']== true)){
			            echo '<a href="'.URL.'index.php">Home</a>';
				 }elseif(isset($_SESSION['user_id'])){
			            echo '<a href="'.URL.'home/userhome/'.$_SESSION['user_id'].'">Home</a>';	  
				 }
	                    ?>
			    </li>
                            <li class= "<?php echo CurrentPage::$currentPage == "projects"?'active':'list'; ?>"><a href="<?php echo URL; ?>project/index" >Projects</a></li>
                            <li class= "<?php echo CurrentPage::$currentPage == "events"?'active':'list'; ?>"><a href="<?php echo URL; ?>event/index">Events</a></li>
                            <li class= "<?php echo CurrentPage::$currentPage == "about"?'active':'list'; ?>"><a href="<?php echo URL; ?>home/about">About</a></li>

			   
			    <?php
			    
			       if(!(isset($_SESSION['logged_in']) && $_SESSION['logged_in']== true)){
				  echo  '<li class="'.(CurrentPage::$currentPage == 'signin'?'active':'list').'"> <a href="'.URL.'login/index">Sign In</a></li>';
			       }else{
			           echo '<li class="'.(CurrentPage::$currentPage == "signin"?'active':'list').'"><a href="'.URL.'logout/auth">Sign Out</a></li>';
			       }
			    ?>
			    
                            <li ><a><i  title="click to search" data-toggle="dropdown"
				class="dropdown-toggle glyphicon glyphicon-search"></i>
                                </a>
                            </li>
                     </ul>
                </nav>
               </div>
         <div class="for_search">
                       <div class="container">
                         <div class="btn-group pull-right" >
                        <div id="search">
                            <form action="search.php" method="get">
                                <ul class="nav dropdown-menu" role="menu">
                                <li><input class="text_"type="text" name="searchQuery" alt="forSearch" id="searchQuery"  
				     placeholder="search"/></li>
                                <li><input class="btn " type="submit" name="submit" id="submit" value="submit" /></li>
				</ul>
                            </form>
                        </div>
                        </div>
			</div>
                    </div>
            </header>