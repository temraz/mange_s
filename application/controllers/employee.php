<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Employee extends CI_Controller {
	
	public function index(){ 
     	$this->dashboard();
						 
	}

///////////////////////////////////////////
function dashboard(){
		if($this->session->userdata('employee_logged_in')){        ///////////////////////////else if he is employee
		if( $this->uri->segment(3) != ''){
				$id=$this->uri->segment(3);
				 
				 $this->load->model('model_users');
				 if($this->model_users->select_emp($id)){
					 $id=$this->model_users->select_emp($id)->row(0)->id;
					 $data['id']=$this->uri->segment(3);
					 $data['employee']=$this->model_users->select_emp($id);
					
					 
				     $this->load->view('dashboard',$data);
                    
					 }else{
				       	redirect('site/error404');		 
						 }
						 }else{
						redirect('site/error404');
						}
						 }else{
							  $this->load->view('index_employee',$data);	
							 }
	}
//////////////////////////////////////////	
}?>