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
					 $task_owner = $this->session->userdata('emp_id');
					if($this->model_employee->select_dashbord_tasks($task_owner)){
						$data['tasks']=$this->model_employee->select_dashbord_tasks($task_owner);
						
						}else{
						$data['notasks']=1;
							}
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
		 $emp_id = $this->session->userdata('emp_id');
		 $id=$this->model_users->select_emp($emp_id)->row(0)->company_id;
		 
		 
		 if($this->model_employee->is_chairman($emp_id)){
	 if($this->model_employee->select_departments($id)){
			 $data['departments']=$this->model_employee->select_departments($id);
			 $this->load->view('give_tasks',$data);
			 }else{
				 $data['no_employees']=0;
				 $this->load->view('give_tasks',$data);
				 }
	         }
            elseif($this->model_employee->is_manager($emp_id)){
				$company_id=$this->session->userdata('company_id');
				$department_id=$this->session->userdata('department_id');
             if($this->model_employee->select_sub_departments($company_id,$department_id)){
			 $data['departments']=$this->model_employee->select_sub_departments($company_id,$department_id);
			 $this->load->view('give_tasks',$data);
			 }else{
				 $data['no_employees']=0;
				 $this->load->view('give_tasks',$data);
				 }
			
			
 }elseif($this->model_employee->is_sub_manager($emp_id)){
	 $sub_manager=1;
	 }
	 else{
				 echo 'sdfsd000f';
				 }
		 
		 
		
			 
	
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
		$this->form_validation->set_rules('deadline', 'Deadline', 'required|trim|max_length[200]|xss_clean');
       
		
        if ($this->form_validation->run() == false) {
			 $emp_id = $this->session->userdata('emp_id');
		 $id=$this->model_users->select_emp($emp_id)->row(0)->company_id;
		 if($this->model_employee->select_departments($id)){
			 $data['departments']=$this->model_employee->select_departments($id);
			 $this->load->view('give_tasks',$data);
			 }
			} else{
			//insert the task 
			$employee_id=$this->input->post('depart_manager');
			$the_task=$this->input->post('task');
			$deadline=$this->input->post('deadline');
			$task_owner = $this->session->userdata('emp_id');
				if($this->model_employee->insert_tasks($employee_id,$the_task,$deadline,$task_owner)){
					$data['insert']=1;
					 $emp_id = $this->session->userdata('emp_id');
		 $id=$this->model_users->select_emp($emp_id)->row(0)->company_id;
		 if($this->model_employee->select_departments($id)){
			 $data['departments']=$this->model_employee->select_departments($id);
			 $this->load->view('give_tasks',$data);
			 }
					}else{
						$data['inser']=0;
						 $emp_id = $this->session->userdata('emp_id');
		 $id=$this->model_users->select_emp($emp_id)->row(0)->company_id;
		 if($this->model_employee->select_departments($id)){
			 $data['departments']=$this->model_employee->select_departments($id);
			 $this->load->view('give_tasks',$data);
			 }
						}
				}
		 
	}else{
         $this->load->view('index_employee');	
        }
	}	
	///////////////////////////////////////////
	function tasks_status(){
		$task_owner = $this->session->userdata('emp_id');
		if($this->model_employee->select_tasks($task_owner)){
			$data['tasks']=$this->model_employee->select_tasks($task_owner);
			$this->load->view('tasks_status',$data);
			}else{
				$this->load->view('tasks_status');
				}
		}
	/////////////////////////////////////////////
		///////////////////////////////////////////
	function task(){
		 if ($this->session->userdata('employee_logged_in')) {
		if($this->uri->segment(3) != '' && $this->uri->segment(4) != ''){
			$task_owner=$this->uri->segment(4);
			$emp_id = $this->session->userdata('emp_id');
			if($task_owner==$emp_id){
				
			
			$task_id=$this->uri->segment(3);
			
			
		if($this->model_employee->select_task($task_id)){
			
			$this->db->where('id',$task_id);
		    $result=$this->db->update('tasks',array('seen'=>1));
			
			$data['task']=$this->model_employee->select_task($task_id);
			$this->load->view('view_task',$data);
				
			}else{
				$data['notasks']=1;
				$this->load->view('view_task');
				}
				}else{
					redirect('site/error404');
					}
		}else{
			redirect('site/error404');
			}
				}else{
         redirect('site/index_employee');	
        }
		}
	/////////////////////////////////////////////
	function start_task(){
		 if ($this->session->userdata('employee_logged_in')) {
		if($this->uri->segment(3) != '' && $this->uri->segment(4) != ''){
			$task_id=$this->uri->segment(3);
			$task_owner=$this->uri->segment(4);
			$username = $this->session->userdata('username');
			$emp_id = $this->session->userdata('emp_id');
		if($this->model_employee->start_task($task_id,$task_owner,$username,$emp_id)){
			$data['start']=1;
			if($this->model_employee->select_task($task_id)){
			$data['task']=$this->model_employee->select_task($task_id);
			
			
			}else{
				$data['notasks']=1;
				
				}
			$this->load->view('view_task',$data);
			
			}else{
				redirect('employee/task/'.$task_id.'');
				}
		}else{
			redirect('site/error404');
			}
				}else{
         redirect('site/index_employee');	
        }
		}
	/////////////////////////////////////////////
    function finish_task(){
	if ($this->session->userdata('employee_logged_in')) {
		if($this->uri->segment(3) != ''){
			if($this->uri->segment(4) != ''){
				
			$task_owner = $this->session->userdata('emp_id');
			$task_id=$this->uri->segment(3);
			$emp_id=$this->uri->segment(4);
			$the_task=$this->uri->segment(5);
			if($this->model_employee->finish_task($task_id,$emp_id,$the_task)){
			$data['finish']=1;
			if($this->model_employee->select_tasks($task_owner)){
			$data['tasks']=$this->model_employee->select_tasks($task_owner);
			
			
			}else{
				$data['finish']=0;
				
				}
			$this->load->view('tasks_status',$data);
			
			}else{
				redirect('employee/tasks_status');
				}
		
			}else{
			redirect('site/error404');
			}
			}else{
			redirect('site/error404');
			}
		}else{
         redirect('site/index_employee');	
        }
	}		
	///////////////////////////////////////////	
}?>