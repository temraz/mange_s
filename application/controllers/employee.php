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
					 $this->model_employee->update_online($id);
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
		redirect('site/index_employee');	
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
            redirect('site/index_employee');	
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
      $company_id=$this->session->userdata('company_id');
				
				$sub_dept_id=$this->session->userdata('sub_dept_id');
				$department_id=$this->model_employee->is_sub_manager($emp_id)->row(0)->department_id;
             if($this->model_employee->select_emp_giv_task($company_id,$department_id,$sub_dept_id)){
			 $data['departments']=$this->model_employee->select_emp_giv_task($company_id,$department_id,$sub_dept_id);
			 $this->load->view('give_tasks',$data);
			 }else{
				 $data['no_employees']=0;
				 $this->load->view('give_tasks',$data);
				 }
	 }
	 else{
				 echo 'sdfsd000f';
				 }
		 
		 
		
			 
	
	}else{
         redirect('site/index_employee');	
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
         redirect('site/index_employee');	
        }
	}	
	///////////////////////////////////////////
	function tasks_status(){
		 if ($this->session->userdata('employee_logged_in')) {
		$task_owner = $this->session->userdata('emp_id');
		if($this->model_employee->select_tasks($task_owner)){
			$data['tasks']=$this->model_employee->select_tasks($task_owner);
			$this->load->view('tasks_status',$data);
			}else{
				$this->load->view('tasks_status');
				}
				}else{
         redirect('site/index_employee');	
        }
		}
	/////////////////////////////////////////////
	///////////////////////////////////////////
	function task_manger(){
				 if ($this->session->userdata('employee_logged_in')) {
		if($this->uri->segment(3) != '' && $this->uri->segment(4) != ''){
			if($this->uri->segment(5) != ''){
				$id=$this->uri->segment(5);
			$this->db->where('id',$id);
		    $result=$this->db->update('activity',array('seen'=>1));
				}
			$task_owner=$this->uri->segment(4);
			$emp_id = $this->session->userdata('emp_id');	
				if($task_owner==$emp_id){
					
			$task_id=$this->uri->segment(3);
			
       		if($this->model_employee->select_task($task_id)){
			$data['task']=$this->model_employee->select_task($task_id);
			$this->load->view('manger_task',$data);
				
			}else{
				$data['notasks']=1;
				$this->load->view('manger_task');
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
		///////////////////////////////////////////
	function task(){
		 if ($this->session->userdata('employee_logged_in')) {
		if($this->uri->segment(3) != '' && $this->uri->segment(4) != ''){
			if($this->uri->segment(5) != ''){
				$id=$this->uri->segment(5);
			$this->db->where('id',$id);
		    $result=$this->db->update('activity',array('seen'=>1));
				}
			$task_owner=$this->uri->segment(4);
			$emp_id = $this->session->userdata('emp_id');
			if($task_owner==$emp_id){
				
			
			$task_id=$this->uri->segment(3);
			
			
		if($this->model_employee->select_task($task_id)){
			
			$this->db->where('id',$task_id);
		    $result=$this->db->update('tasks',array('seen'=>1));
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
	function select_avtivity(){
		if ($this->session->userdata('employee_logged_in')) {
			$emp_id=$this->session->userdata('emp_id');
			if($this->model_employee->select_avtivity($emp_id)){
				$data['activities']=$this->model_employee->select_avtivity($emp_id);
				$this->load->view('activities',$data);
				}else{
					$data['no_activity']=1;
					$this->load->view('activities',$data);
					}
			
			}else{
         redirect('site/index_employee');	
        }
		}
	/////////////////////////////////////////////
	function count_activity(){
		if ($this->session->userdata('employee_logged_in')) {
			$emp_id=$this->session->userdata('emp_id');
			if($this->model_employee->select_avtivity($emp_id)){
			$activity_count=count($this->model_employee->select_avtivity($emp_id));
			}else{
				$activity_count=0;
				}
				echo $activity_count;
		}else{
         redirect('site/index_employee');	
        }
		}
	////////////////////////////////////////////////////// employees chat/////////////////////////////////////
	
	public function chat(){
	if ($this->session->userdata('employee_logged_in')) {
	     	 
		
		 
		$my_id=$this->session->userdata('emp_id');
		 $comp_id=$this->model_users->select_emp($my_id)->row(0)->company_id;
		 
		 
	 if($this->model_employee->is_chairman($my_id)){
	 if($this->model_employee->select_dept_contacts($comp_id)){
     $data['contacts']=$this->model_employee->select_dept_contacts($comp_id)->result();
	 $this->load->view('chat',$data);
	 }else{
		 $data['no_contacts']=1;
		 $this->load->view('chat',$data);
		 }
	}
 elseif($this->model_employee->is_manager($my_id)){
               $company_id=$this->session->userdata('company_id');
				$department_id=$this->session->userdata('department_id');
				
             if($this->model_employee->select_contacts_sub_departments($company_id,$department_id)){
			 $data['contacts']=$this->model_employee->select_contacts_sub_departments($company_id,$department_id)->result();
			  $data['my_chairman']=$this->model_employee->select_my_chairman($company_id);
			 $this->load->view('chat',$data);
			 }else{
				 $data['no_contacts']=1;
		         $this->load->view('chat',$data);
				 }
			
  
  
  
 }elseif($this->model_employee->is_sub_manager($my_id)){
	            $company_id=$this->session->userdata('company_id');
				
				$sub_dept_id=$this->session->userdata('sub_dept_id');
				$department_id=$this->model_employee->is_sub_manager($my_id)->row(0)->department_id;
				
             if($this->model_employee->select_emp_contacts($company_id,$department_id,$sub_dept_id)){
			 $data['contacts']=$this->model_employee->select_emp_contacts($company_id,$department_id,$sub_dept_id)->result();
			 $data['my_manager']=$this->model_employee->select_my_manager($company_id,$department_id);
			 $this->load->view('chat',$data);
			 }else{
				$data['no_contacts']=1;
		         $this->load->view('chat',$data);
				 }
	 }else{
		 
		
		  $company_id=$this->session->userdata('company_id');
		  $department_id=$this->session->userdata('department_id');
		  $sub_dept_id=$this->session->userdata('sub_dept_id');
		   if($this->model_employee->select_emp_contacts($company_id,$department_id,$sub_dept_id)){
			    
			 $data['contacts']=$this->model_employee->select_emp_contacts($company_id,$department_id,$sub_dept_id)->result();
			  $data['my_sub_manager']=$this->model_employee->select_my_sub_manager($company_id,$department_id,$sub_dept_id);
			 $this->load->view('chat',$data);
			   }else{
				 $data['no_contacts']=1;
		         $this->load->view('chat',$data);
				   }
		 }
		
		
	
		}else{
         redirect('site/index_employee');	
        }
	}
	///////////////////////////////////////////////////////////////////////
	public function ajax_add_chat(){
		if ($this->session->userdata('employee_logged_in')) {
	  
        
		$from_id=$this->input->post('from_id');
		$to_id=$this->input->post('to_id');
        $chat_message_content=$this->input->post("msg", true);
		
		
		if($this->model_employee->add_chat_message($from_id , $to_id, $chat_message_content)){
			            $result=array('status'=>'ok');
						
						return $result;
					
						}else{
							 $result=array('status'=>'no');
						
						return $result;
					
						
							}
		
		
		}else{
         redirect('site/index_employee');	
        }
		}
	//////////////////////////////////////////////////////////////
		 function ajax_get_chat_messages(){
			 $from_id=$this->input->post('from_id');
		     $to_id=$this->input->post('to_id');
			 echo $this->_get_chat_messages($from_id ,$to_id);
			 }
		 
		 
		 function _get_chat_messages($from_id ,$to_id){
			 		
					$chat_messages=$this->model_employee->get_chat_messages($from_id ,$to_id)->result();
					if(isset($chat_messages)){
						//we have some messages
                             $chat_message_html='<span>';
						
						foreach($chat_messages as $chat_message){
							
								
						    $seder_firtname=$this->model_users->select_emp($chat_message->from)->row(0)->firstname;
							$seder_lastname=$this->model_users->select_emp($chat_message->from)->row(0)->lastname;
							$seder_pic=$this->model_users->select_emp($chat_message->from)->row(0)->profile_pic;
							
							
							$chat_message_html.='<p>
							<span id="date">'.$chat_message->message_date.'</span> 
							<img src='.base_url().'images/profile/thumb_profile/'.$seder_pic.' width="35" height="30" />
							<span id="message" ><strong>'.$seder_firtname.' '.$seder_lastname.' :</strong>
							                   '.$chat_message->message.'</span></p>';
							
							}
						$chat_message_html.='</span>';
						
						
						$result=array('status'=>'ok' ,'content'=>$chat_message_html);
						return json_encode($result);
						exit();
						}else{
							//no chat return
						$result=array('status'=>'no' ,'content'=>'there is know');
						return json_encode($result);
							exit();
							}
					
			 }
		///////////////////////////////////////////////////////////////
		function ajax_select_last_message(){
			 $from_id=$this->input->post('from_id');
		     $to_id=$this->input->post('to_id');
			 echo $this->_ajax_select_last_message($from_id ,$to_id);
			 }
			 
		 function _ajax_select_last_message($from_id ,$to_id){
			 		 $my_id=$this->session->userdata('emp_id');
					$chat_messages=$this->model_employee->get_chat_messages_last_one($from_id ,$to_id);
					if(isset($chat_messages)){
	
						$result=$chat_messages->row(0)->to;
						if($my_id==$result){
							$this->model_employee->update_message_seen($from_id,$to_id);
							}
						
						}else{
							//no chat return
						$result=array('status'=>'no' ,'content'=>'there is know');
						return json_encode($result);
							exit();
							}
					
			 }
	////////////////////////////////////////////////////////////////////////////////////////////////////
	function select_unseen_messages(){
	
			$id=$this->session->userdata('emp_id');
			if($this->model_employee->select_unseen_messages($id)){
				$data['messages']=$this->model_employee->select_unseen_messages($id)->result();
				$this->load->view('messages',$data);
			
				}else{
					$data['no_messages']=1;
					$this->load->view('messages',$data);
					}
			
		
		
		
		}
	///////////////////////////////////////////////////
	function select_count_messages(){
		$id=$this->session->userdata('emp_id');
			if($this->model_employee->select_unseen_messages($id)){
				echo count($this->model_employee->select_unseen_messages($id)->result());
				
			
				}else{
					echo '0';
					}
		}		
		
	
	/////////////////////////////////////////////////////////////////////////////////////////////////////
}?>