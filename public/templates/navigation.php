<div class="list-group">
    <a <?php echo 'href="'.URL.'home/userhome/'.$_SESSION['user_id'].'" '; ?>
                   <?php echo 'class="list-group-item '.(CurrentPage::$currentPage == "userhome"?'active':'').'"';
                   ?>>
                <span class="glyphicon glyphicon-home"></span> Home</a>
    
        <a href="<?php echo URL;?>user/all_projects"
                       <?php echo 'class="list-group-item '.(CurrentPage::$currentPage == "user_current_projects"?'active':'').'"';
                       ?>>
                       <span class="glyphicon glyphicon-folder-open"></span> On Going Projects</a>	
        <a href="<?php echo URL;?>user/all_events"
                       <?php echo 'class="list-group-item '.(CurrentPage::$currentPage == "user_current_events"?'active':'').'"';
                       ?>>
                    <span class="glyphicon glyphicon-calendar"></span> Up comming Events </a>
                    
        <a href="<?php echo URL;?>user/all_members"
                       <?php echo 'class="list-group-item '.(CurrentPage::$currentPage == "all_members"?'active':'').'"';
                       ?>>
                    <span class="glyphicon glyphicon-user"></span> Community Members</a>
                    
                    
       <?php if(isset($_SESSION["position"]) && $_SESSION["position"]=='project_manager'){
        echo '<a href="'.URL.'user/add_new_project" class="list-group-item"><span class="glyphicon glyphicon-tasks"></span> Publish Project</a>';
       }?>
       <?php if(isset($_SESSION["position"]) && $_SESSION["position"]=='event_manager'){
        echo '<a href="'.URL.'user/add_new_event" class="list-group-item"><span class="glyphicon glyphicon-globe"></span> Publish Event</a>';
       }
       ?>
       <?php if(isset($_SESSION["position"]) && $_SESSION["position"]=='finance_manager'){
        
        echo '<a href="'.URL.'user/add_income" class="list-group-item"><span class="glyphicon glyphicon-plus"></span> Income</a>';
        echo '<a href="'.URL.'user/add_expense" class="list-group-item"><span class="glyphicon glyphicon-minus"></span> Expenses</a>';	
        echo '<a href="'.URL.'finance/report" class="list-group-item"><span class="glyphicon glyphicon-usd"></span> Finacial Report</a>';
       }
       ?>		
    
    <!--<a href="forum" class="list-group-item"><span class="glyphicon glyphicon-comment"></span> Forum</a>
    -->
</div>