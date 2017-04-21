<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Test extends CI_Controller {
	
	public function index()
	{
		
		$this->load->view('test');
		$this->load->database();
		$data = array( 
   'u_name' => 'sakthi', 
   'u_pass' => 'kanth' 
); 

$this->db->insert("test", $data);

$data = array( 
   'u_name' => 'kanth', 
   'u_pass' => 'sakthi' 
); 

$this->db->set($data); 
$this->db->where("id", 1); 
$this->db->update("test", $data);

	}
	public function hello(){
		$this->load->view('my_view');
	}
}
