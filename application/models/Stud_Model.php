<?php 
   class Stud_Model extends CI_Model {
	
       public $tableName_test="test";
       
      function __construct() { 
         parent::__construct(); 
         
      
      } 
   
   
      public function delete($whre_clm) { 
         if ($this->db->delete($this->tableName_test, $whre_clm)) { 
            return true; 
         } 
      } 
   
      public function update($data,$old_roll_no) { 
         $this->db->set($data); 
         $this->db->where("id", $old_roll_no); 
         $this->db->update("test", $data); 
      } 
        public function ins_q($data){

           
              if($this->db->insert($this->tableName_test,$data)){
                      return true;

              }


        }
	  
	  public function update_where($data,$whr_arr){
	  
		$this->db->set($data); 
         $this->db->where($whr_arr); 
         $this->db->update($this->tableName_test, $data); 
		 
	  
	  }
	  
	  public function get_this(){
	  
			$q=$this->db->get($this->tableName_test);
			return $q->result();
	  }
	  public function get_where($arr){
		  $query = $this->db->get_where($this->tableName_test,$arr);
		  if($query->num_rows()>0){
		   return $query->result();
		  }else{
		  return null;
		  }
        
		  
	  }
	  public function exec_query($limit_val){
	  	 $query="select * from test $limit_val";

	  if($q = $this->db->query($query)){
			if($q->num_rows()>0){
			 return $q->result();
			}else{
			return array();
			}
	 
	  }
		
	  }
          
          public function login_check($u_name,$u_pass){
                   $query="select * from test where u_name='".$u_name."' and u_pass='".$u_pass."'";
                   if($q = $this->db->query($query)){
			if($q->num_rows()>0){
			 return $q->result();
			}else{
			return null;
			}
	 
                    }
          }
   } 
?> 