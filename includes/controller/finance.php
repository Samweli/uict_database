<?php
   class FinanceController extends Controller{
   	    private $finance;
        public $loader;

   	    public function __construct(){
            $this->loader = new Loader();
            $this->loader->model('finance.php');
            $this->finance = new Finance();
   	    }

   	    public function add_income(){
   	    	global $db;
   	    	$income_source = $db->db_escape_values($_POST['income_source']);
            $this->finance->income_amount = $db->db_escape_values($_POST['amount']);
            $this->finance->income_description = $db->db_escape_values($_POST['description']);
            if($income_source == "member_income"){
               $this->finance->income_member_id = $db->db_escape_values($_POST['member_id']);
               $this->finance->income_donor_name = NULL;
            }else{
               $this->finance->income_donor_name = $db->db_escape_values($_POST['donor_name']);
               $this->finance->income_member_id = 0;
            }
            $this->finance->income_category_id = $db->db_escape_values($_POST['category_id']);
    
            if($this->finance->add_income()){
                redirect('finance/report');
            }
   	    }

   	    public function add_expense(){
   	    	global $db;
   	    	$this->finance->expense_amount = $db->db_escape_values($_POST['amount']);
   	    	$this->finance->expense_description = $db->db_escape_values($_POST['description']);
   	    	$this->finance->expense_recorder_id = $db->db_escape_values($_POST['publisher_id']);
   	    	if($this->finance->add_expense()){
   	    		redirect('finance/report');
   	    	}
   	    }

   	    public function report(){
   	    	$income = $this->finance->get_income();
   	    	$expenses = $this->finance->get_expenses();
   	    	$total_income = $this->finance->total_income();
   	    	$total_expenses = $this->finance->total_expenses();
   	    	//echo "Income:>> ".$total_income;
   	    	//echo "Expenses:>> ".$total_expenses;
   	    	$data = array(
                      'income'=>$income,
                      'expenses'=>$expenses,
                      'total_income'=>$total_income,
                      'total_expenses'=>$total_expenses
   	    		    );
   	    	$this->loader->view('finance-report.php',$data);
   	    }
   }
?>