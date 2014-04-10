<?php
     
     class Finance{
     	  public $income_amount;
     	  public $income_description;
     	  public $income_member_id;
     	  public $income_donor_name;
     	  public $income_category_id;

     	  public $expense_amount;
     	  public $expense_description;
     	  public $expense_recorder_id;

     	  public function add_income(){
              if($this->is_income_defined()){
                 $sql = "INSERT INTO income (amount,description,member_id,donor_name,category_id) VALUES (";
                 $sql .= "'".$this->income_amount."','".$this->income_description."','".$this->income_member_id."','";
                 $sql .= $this->income_donor_name."','".$this->income_category_id."')";
                 global $db;
                 if($db->db_query($sql)){
                    return $db->db_last_insert_id();
                 }
              }
     	  }

     	  public function add_expense(){
              if($this->is_expense_defined()){
              	 $sql = "INSERT INTO expenses (amount,description,user_id) VALUES('".$this->expense_amount;
              	 $sql .= "','".$this->expense_description."','".$this->expense_recorder_id."')";
                 global $db;
                 if($db->db_query($sql)){
                    return $db->db_last_insert_id();
                 }
              }
     	  }

     	  public function total_income(){
     	  	  $sql = "SELECT SUM(amount) FROM income";
     	  	  global $db;
     	  	  if($total = $db->db_query($sql)){
                 return $total;
     	  	  }
     	  }

     	  public function total_expenses(){
     	  	  $sql = "SELECT SUM(amount) FROM expenses";
     	  	  global $db;
     	  	  if($total = $db->db_query($sql)){
                 return $total;
     	  	  }
     	  }

     	  public function get_income(){
              $sql = "SELECT income.id,income.amount,income.description,income.category_id,income.member_id,";
              $sql .= "income.donor_name,income_categories.category,users.first_name,users.last_name ";
              $sql .= "FROM income JOIN income_categories ON income.category_id = income_categories.id ";
              $sql .= "JOIN users ON income.member_id = users.id ORDER BY income.id DESC";
              global $db;
              if($result = $db->db_query($sql)){
                 $income = $db->db_fetch_array($result);
                 return $income;
              }
     	  }

     	  public function get_expenses(){
              $sql = "SELECT * FROM expenses ORDER BY id DESC";
              global $db;
              if($result = $db->db_query($sql)){
                 $expenses = $db->db_fetch_array($result);
                 return $expenses;
              }
     	  }

     	  private function is_income_defined(){
     	  	 if(isset($this->income_amount) && isset($this->income_description) && isset($this->income_category_id)){
     	  	 	return TRUE;
     	  	 }else{
     	  	 	return FALSE;
     	  	 }
     	  }

     	  private function is_expense_defined(){
     	  	 if(isset($this->expense_amount) && isset($this->expense_description) && isset($this->expense_recorder_id)){
     	  	 	return TRUE;
     	  	 }else{
     	  	 	return FALSE;
     	  	 }
     	  }

     	  public function get_income_categories(){
     	  	 $sql = "SELECT * FROM income_categories";
     	  	 global $db;
     	  	 if($result = $db->db_query($sql)){
                 $income_categories = $db->db_fetch_array($result);
                 return $income_categories;
     	  	 }
     	  }
     }
?>