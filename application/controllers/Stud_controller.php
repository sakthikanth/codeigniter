<?php 
   class Stud_controller extends CI_Controller {
	   

      function __construct() { 
         parent::__construct(); 
	            
      } 
  
        public function index(){
            
            $data['records']=$this->Stud_Model->get_this('test');
            $data['page_dir']='';
            $this->show_student();
        
       
        }


        public function add_student_view() { 
       
           $this->load->view('Stud_add'); 
        } 
	  
        public function show_student(){

                                       if(!empty($this->session->has_userdata('id'))){
                                            
                                               $data['records']=$this->Stud_Model->get_this('test');
                                               $data['page_dir']='';
                                               //echo $this->session->has_userdata('id');
                                               $this->load->view('Stud_view',$data);
                                              
                                        }else{
                                             // echo ($this->session->has_userdata('id'));
                                              redirect('http://localhost/codeigniter/stud/login', 'refresh');
                                        }

        }

      public function add_student() { 
     		
			
         $data = array( 
            'u_name' => $this->input->post('user_name'), 
            'u_pass' => $this->input->post('user_pass') 
         ); 		
         
         if(count($_POST)>0){
                         $this->form_validation->set_rules('user_name', 'Username', 'required');
                      $this->form_validation->set_rules('pass_word', 'Username',  'required|min_length[5]|max_length[12]|is_unique[test.u_name]');
             if ($this->form_validation->run() == FALSE)
                {
                             redirect('/','refresh');
                }else{
                     $this->Stud_Model->ins_q($data); 
   
         $data['records'] =$this->Stud_Model->get_this(); 
          $data['page_dir']='upt';
         $this->load->view('Stud_view',$data); 
                }
         }

        
      } 
  
      public function update_student_view() {

			$this->load->model('Stud_Model');
         $this->load->helper('form'); 
         $user_id = $this->uri->segment('3'); 
		
		 $arr=array('id'=>$user_id);
		 
         $data['records'] = $this->Stud_Model->get_where($arr);
         $data['page_dir']='upt';
        if($data['records']!=null){
		 $this->load->view('Stud_edit_view',$data); 
		}else{
			echo "no user found";
		}
        
      } 
  
      public function update_student(){

	  	
         $this->load->model('Stud_Model');
		 $this->load->helper('form');
			$username=$this->input->post('user_name');
			$password=$this->input->post('pass_word');
			if($username!=null && $password!=null){
				   $data = array( 
            'u_name' => $this->input->post('user_name'), 
            'u_pass' => $this->input->post('pass_word') 
         ); 
			
			$user_id=$this->uri->segment('3');
					
		
		 $whre=array('id'=>$user_id);
                         
         $this->Stud_Model->update_where($data,$whre); 
			}
      
			
         $data['records'] = $this->Stud_Model->get_this(); 
          $data['page_dir']="del";
         $this->load->view('Stud_view',$data); 
      } 
  
        public function delete_student() { 
           $this->load->model('Stud_Model'); 
           $user_id = $this->uri->segment('3'); 
                   $whre_clm="id=".$user_id;

           $this->Stud_Model->delete($whre_clm); 


           $data['records'] = $this->Stud_Model->get_this();
           $data['page_dir']="del";
           $this->load->view('Stud_view',$data); 
        } 
	  public function exec_query(){
		  
		  $limit_val ="limit ". $this->uri->segment('3'); 
		  if($this->uri->segment('3')==null) $limit_val="";
		  
		  $data['records']=$this->Stud_Model->exec_query($limit_val);
                  if($limit_val!="") {
                     $data['page_dir']="del"; 
                  }
			$this->load->view('Stud_view',$data);
			
		  
	  }
	  public function show_users($data){
              $data['page_dir']='upt';
		  $this->load->view('Stud_view',$data);
	  }
	  
	  public function login_user(){
	  
                if(count($_POST) > 0)
                {
                        $u_name=$this->input->post('user_name');
                        $u_pass=$this->input->post('pass_word');

                      $this->form_validation->set_rules('user_name', 'Username', 'required');
                      $this->form_validation->set_rules('pass_word', 'Username',  'required');
            
        
                if ($this->form_validation->run() == FALSE)
                {
                                $data['user_hint']="err_hint";
                                $data['page_hint']='Fill up in all Fields';
                                $this->load->view('index',$data);
                }
                else
                {
                                $user=$this->Stud_Model->login_check($u_name,$u_pass);
                                if($user==null){

                                $data['user_hint']="err_hint";
                                $data['page_hint']='No User found';
                                $this->load->view('index',$data);

                                 }else{

                                        $user_id= $user[0]->id;
                                        
                                        $ses_data=array('id'=>48);
                                       $this->session->set_userdata($ses_data);
                                       
                                        if(!empty($this->session->has_userdata('id'))){
                                            
                                              
                                                  redirect('http://localhost/codeigniter/stud/', 'refresh');
                                        }else{
                                                echo "no sess";
                                        }



                                 }
	  
	  
                }
                
                }else{
                       $data['user_hint']="err_hint";
                                $data['user_hint_word']='';
                                $this->load->view('index',$data);

                }
  
   }

   public function upload(){
                $config['upload_path']          = './application/uploads';
                $config['allowed_types']        = 'gif|jpg|png|exe';
                $config['max_size']             = 10000;
                $config['max_width']            = 10024;
                $config['max_height']           = 1768;

                $this->load->library('upload', $config);
              
                if ( ! $this->upload->do_upload('userfile'))
                {
                        $error = array('error' => $this->upload->display_errors());
                     
                         $data = array('upload_data' => array(),'my'=>$error);
   
                        $this->load->view('file_upload_view', $data);
                }
                else
                {
                        $data = array('upload_data' => $this->upload->data(),'my'=>array('sts'=>'Uploaded Successfully...'));
                        $this->load->view('file_upload_view', $data);
                }
   } 


   }
   
?>