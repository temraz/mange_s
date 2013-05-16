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
function settings(){
        if($this->session->userdata('employee_logged_in')){  
		
		$this->load->view('employee_settings');
		}else{
		$this->load->view('index_employee');	
		}
	}

//////////////////////////////////////// upload profile pic

    function upload_pic() {
        if ($this->session->userdata('employee_logged_in')) {
            $id = $this->session->userdata('emp_id');
            $upload = $this->model_employee->do_upload($id);
            $data['error'] = "svsdf";
			 $employee=$this->model_users->select_emp($id);
			 $data['pic']=$employee->row(0)->profile_pic;
            	$this->load->view('employee_settings',$data);
        } else {
            $this->load->view('index_employee');	
        }
    }
	
///////////////////////////////////////////////////	
function give_task(){
	 if ($this->session->userdata('employee_logged_in')) {
	$this->load->view('give_tasks');
	}else{
         $this->load->view('index_employee');	
        }
	}
//////////////////////////////////////////////////
function task_validation(){
	 if ($this->session->userdata('employee_logged_in')) {
		$this->load->library('form_validation');
        $this->form_validation->set_rules('depart_manager', 'department manager', 'required|trim|max_length[100]|xss_clean');
		$this->form_validation->set_rules('task', 'department manager', 'required|trim|max_length[500]|xss_clean');
       
		
        if ($this->form_validation->run() == false) {
			
			} else{
				
				}
		 
	}else{
         $this->load->view('index_employee');	
        }
	}	
	
		
}?>