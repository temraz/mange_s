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
				redirect('site/error404');
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
			  $emp_id = $this->session->userdata('emp_id');
			if($this->model_employee->is_chairman($emp_id) || $this->model_employee->is_manager($emp_id) || $this->model_employee->is_sub_manager($emp_id)){  
		$task_owner = $this->session->userdata('emp_id');
		if($this->model_employee->select_tasks($task_owner)){
			$data['tasks']=$this->model_employee->select_tasks($task_owner);
			$this->load->view('tasks_status',$data);
			}else{
				$this->load->view('tasks_status');
				}
				 }
	             else{
				redirect('site/error404');
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
			$activity_count=count($this->model_employee->count_avtivity($emp_id));
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
		 
		 if($this->uri->segment(3) != ''){
					$my_id=$this->uri->segment(3);
					$data['first']=$this->model_users->select_emp($my_id)->row(0)->firstname;
					$data['last']=$this->model_users->select_emp($my_id)->row(0)->lastname;
					}
		if($this->uri->segment(4) != '' && $this->uri->segment(4)=='investigation' ){
					$data['video']=1;
					}			
					
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
			$sector_type=$this->model_employee->sector_type_employee($my_id)->row(0)->type;
	 if($sector_type !='legal'){
			  $data['my_sub_manager']=$this->model_employee->select_my_sub_manager($company_id,$department_id,$sub_dept_id); 
		 }elseif($sector_type== 'legal'){
			  $data['my_manager']=$this->model_employee->select_my_manager($company_id,$department_id);
			 }
		
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
							$department=$this->model_users->select_emp($chat_message->from)->row(0)->department_id;
							
							$chat_message_html.='
							<li style="padding:5px;border-bottom: 1px dashed #ddd;;list-style:none">
                               <div class="avatar" style="padding: 2px; border: 1px solid #eee;width:50px"><img src="'.base_url().'images/profile/thumb_profile/'.$seder_pic.'" width="50" height="45" /></div>
                                <div class="info" style="margin-left:60px;margin-top:-54px;">
                                    	<a href="'.base_url().'employee/chat/" title="chat with the reporter">'.$seder_firtname.' '.$seder_lastname.' </a> 
                                       <br/>
                                       
                                         '.$chat_message->message.'
                                         <span style="float:right;color:#369;margin-top:10px">'.$chat_message->message_date.'</span>
                                        <br clear="all" />
                                    </div><!--info-->
                                </li>
							   
							';
							
							}
							
							
						$chat_message_html.='</span>';
						
						
						$result=array('status'=>'ok' ,'content'=>$chat_message_html);
						return json_encode($result);
						exit();
						}else{
							//no chat return
						$result=array('status'=>'no' ,'content'=>'لا يوجد راسائل بينكم حتي الان');
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
			if($this->model_employee->count_unseen_messages($id)){
				echo count($this->model_employee->count_unseen_messages($id)->result());
				
			
				}else{
					echo '0';
					}
		}		
		
	
	/////////////////////////////////////////////////////////////////////////////////////////////////////
	function mettings(){
	if ($this->session->userdata('employee_logged_in')) {
	     	 
		
		 
		$my_id=$this->session->userdata('emp_id');
		 $comp_id=$this->model_users->select_emp($my_id)->row(0)->company_id;
		 
		 
	 if($this->model_employee->is_chairman($my_id)){
	 if($this->model_employee->select_dept_contacts($comp_id)){
     $data['contacts']=$this->model_employee->select_dept_contacts($comp_id)->result();
	 $this->load->view('meetings',$data);
	 }else{
		 $data['no_contacts']=1;
		 $this->load->view('meetings',$data);
		 }
	}
 elseif($this->model_employee->is_manager($my_id)){
               $company_id=$this->session->userdata('company_id');
				$department_id=$this->session->userdata('department_id');
				
             if($this->model_employee->select_contacts_sub_departments($company_id,$department_id)){
			 $data['contacts']=$this->model_employee->select_contacts_sub_departments($company_id,$department_id)->result();
			  $data['my_chairman']=$this->model_employee->select_my_chairman($company_id);
			 $this->load->view('meetings',$data);
			 }else{
				 $data['no_contacts']=1;
		         $this->load->view('meetings',$data);
				 }
			
  
  
  
 }elseif($this->model_employee->is_sub_manager($my_id)){
	            $company_id=$this->session->userdata('company_id');
				
				$sub_dept_id=$this->session->userdata('sub_dept_id');
				$department_id=$this->model_employee->is_sub_manager($my_id)->row(0)->department_id;
				
             if($this->model_employee->select_emp_contacts($company_id,$department_id,$sub_dept_id)){
			 $data['contacts']=$this->model_employee->select_emp_contacts($company_id,$department_id,$sub_dept_id)->result();
			 $data['my_manager']=$this->model_employee->select_my_manager($company_id,$department_id);
			 $this->load->view('meetings',$data);
			 }else{
				$data['no_contacts']=1;
		         $this->load->view('meetings',$data);
				 }
	 }else{
		 
		
		  $company_id=$this->session->userdata('company_id');
		  $department_id=$this->session->userdata('department_id');
		  $sub_dept_id=$this->session->userdata('sub_dept_id');
		   if($this->model_employee->select_emp_contacts($company_id,$department_id,$sub_dept_id)){
			    
			 $data['contacts']=$this->model_employee->select_emp_contacts($company_id,$department_id,$sub_dept_id)->result();
				$sector_type=$this->model_employee->sector_type_employee($my_id)->row(0)->type;
	 if($sector_type !='legal'){
			  $data['my_sub_manager']=$this->model_employee->select_my_sub_manager($company_id,$department_id,$sub_dept_id); 
		 }elseif($sector_type== 'legal'){
			  $data['my_manager']=$this->model_employee->select_my_manager($company_id,$department_id);
			 }
			 $this->load->view('meetings',$data);
			   }else{
				 $data['no_contacts']=1;
		         $this->load->view('meetings',$data);
				   }
		 }
		
		
	
		}else{
         redirect('site/index_employee');	
        }
	}
	///////////////////////////////////////////////////////////////////////
	function report_metting(){
	if ($this->session->userdata('employee_logged_in') &&  $this->uri->segment(3) != '') {
	     	 
		
		$to_id= $this->uri->segment(3);
		
		$my_id=$this->session->userdata('emp_id');
	
					$first=$this->model_users->select_emp($my_id)->row(0)->firstname;
					$last=$this->model_users->select_emp($my_id)->row(0)->lastname;
		$link=base_url().'employee/report_metting/'.$my_id;
			$data = array(
            'emp_id' => $to_id,
            'activity' => ''.$first.' '.$last.' Invites you to sart a video call ',
			
		    'link'=>$link
            );
			$query = $this->db->insert('activity', $data);
			
					if($this->uri->segment(4) != ''){
				$activity_id=$this->uri->segment(4);
			$this->db->where('id',$activity_id);
		    $result=$this->db->update('activity',array('seen'=>1));
				}
					
		 $comp_id=$this->model_users->select_emp($my_id)->row(0)->company_id;
		  if($this->uri->segment(3) != ''){
					$my_id=$this->uri->segment(3);
					$data['first']=$this->model_users->select_emp($my_id)->row(0)->firstname;
					$data['last']=$this->model_users->select_emp($my_id)->row(0)->lastname;
					}
		 
	 if($this->model_employee->is_chairman($my_id)){
	 if($this->model_employee->select_dept_contacts($comp_id)){
     $data['contacts']=$this->model_employee->select_dept_contacts($comp_id)->result();
	 $this->load->view('meetings',$data);
	 }else{
		 $data['no_contacts']=1;
		 $this->load->view('meetings',$data);
		 }
	}
 elseif($this->model_employee->is_manager($my_id)){
               $company_id=$this->session->userdata('company_id');
				$department_id=$this->session->userdata('department_id');
				
             if($this->model_employee->select_contacts_sub_departments($company_id,$department_id)){
			 $data['contacts']=$this->model_employee->select_contacts_sub_departments($company_id,$department_id)->result();
			  $data['my_chairman']=$this->model_employee->select_my_chairman($company_id);
			 $this->load->view('meetings',$data);
			 }else{
				 $data['no_contacts']=1;
		         $this->load->view('meetings',$data);
				 }
			
  
  
  
 }elseif($this->model_employee->is_sub_manager($my_id)){
	            $company_id=$this->session->userdata('company_id');
				
				$sub_dept_id=$this->session->userdata('sub_dept_id');
				$department_id=$this->model_employee->is_sub_manager($my_id)->row(0)->department_id;
				
             if($this->model_employee->select_emp_contacts($company_id,$department_id,$sub_dept_id)){
			 $data['contacts']=$this->model_employee->select_emp_contacts($company_id,$department_id,$sub_dept_id)->result();
			 $data['my_manager']=$this->model_employee->select_my_manager($company_id,$department_id);
			 $this->load->view('meetings',$data);
			 }else{
				$data['no_contacts']=1;
		         $this->load->view('meetings',$data);
				 }
	 }else{
		 
		
		  $company_id=$this->session->userdata('company_id');
		  $department_id=$this->session->userdata('department_id');
		  $sub_dept_id=$this->session->userdata('sub_dept_id');
		   if($this->model_employee->select_emp_contacts($company_id,$department_id,$sub_dept_id)){
			    
			 $data['contacts']=$this->model_employee->select_emp_contacts($company_id,$department_id,$sub_dept_id)->result();
				$sector_type=$this->model_employee->sector_type_employee($my_id)->row(0)->type;
	 if($sector_type !='legal'){
			  $data['my_sub_manager']=$this->model_employee->select_my_sub_manager($company_id,$department_id,$sub_dept_id); 
		 }elseif($sector_type== 'legal'){
			  $data['my_manager']=$this->model_employee->select_my_manager($company_id,$department_id);
			 }
			 $this->load->view('meetings',$data);
			   }else{
				 $data['no_contacts']=1;
		         $this->load->view('meetings',$data);
				   }
		 }
		
		
	
		}else{
         redirect('site/index_employee');	
        }
	}
	///////////////////////////////////////////////////////////////////////
	function report(){
		 if ($this->session->userdata('employee_logged_in')) {
			 $emp_id = $this->session->userdata('emp_id');
		 $my_id = $this->session->userdata('emp_id');
		
		         $company_id=$this->session->userdata('company_id');
		  $department_id=$this->session->userdata('department_id');
		  $sub_dept_id=$this->session->userdata('sub_dept_id');
		 $id=$this->model_users->select_emp($emp_id)->row(0)->company_id;
		 
		 
		 if($this->model_employee->is_chairman($emp_id)){
	 if($this->model_employee->select_departments($id)){
			 $data['departments']=$this->model_employee->select_departments($id);
			 $this->load->view('report_employee',$data);
			 }else{
				 $data['no_employees']=0;
				 $this->load->view('report_employee',$data);
				 }
	         }
          elseif($this->model_employee->is_manager($my_id)){
               $company_id=$this->session->userdata('company_id');
				$department_id=$this->session->userdata('department_id');
				
             if($this->model_employee->select_contacts_sub_departments($company_id,$department_id)){
			 $data['departments']=$this->model_employee->select_contacts_sub_departments($company_id,$department_id)->result();
			  $data['my_chairman']=$this->model_employee->select_my_chairman($company_id);
			 $this->load->view('report_employee',$data);
			 }else{
				 $data['no_employees']=1;
		         $this->load->view('report_employee',$data);
				 }
			
  
  
  
 }elseif($this->model_employee->is_sub_manager($my_id)){
	            $company_id=$this->session->userdata('company_id');
				
				$sub_dept_id=$this->session->userdata('sub_dept_id');
				$department_id=$this->model_employee->is_sub_manager($my_id)->row(0)->department_id;
				
             if($this->model_employee->select_emp_contacts($company_id,$department_id,$sub_dept_id)){
			 $data['departments']=$this->model_employee->select_emp_contacts($company_id,$department_id,$sub_dept_id)->result();
			 $data['my_manager']=$this->model_employee->select_my_manager($company_id,$department_id);
			 $this->load->view('report_employee',$data);
			 }else{
				$data['no_employees']=1;
		         $this->load->view('report_employee',$data);
				 }
	 }else{
		 
		
		  $company_id=$this->session->userdata('company_id');
		  $department_id=$this->session->userdata('department_id');
		  $sub_dept_id=$this->session->userdata('sub_dept_id');
		   if($this->model_employee->select_emp_contacts($company_id,$department_id,$sub_dept_id)){
			    
			 $data['departments']=$this->model_employee->select_emp_contacts($company_id,$department_id,$sub_dept_id)->result();
			 
			 $sector_type=$this->model_employee->sector_type_employee($my_id)->row(0)->type;
	 if($sector_type !='legal'){
			  $data['my_sub_manager']=$this->model_employee->select_my_sub_manager($company_id,$department_id,$sub_dept_id); 
		 }elseif($sector_type== 'legal'){
			  $data['my_manager']=$this->model_employee->select_my_manager($company_id,$department_id);
			 }
		
	
			 $this->load->view('report_employee',$data);
			   }else{
				 $data['no_employees']=1;
		         $this->load->view('report_employee',$data);
				   }
		 }
		

		  	}else{
           redirect('site/index_employee');	
        }
		
		}
	/////////////////////////////////////////////
	function ajax_insert_report(){
		 if ($this->session->userdata('employee_logged_in')) {
			 $emp_id = $this->session->userdata('emp_id');
			 
			
		    $this->load->library('form_validation');
        $this->form_validation->set_rules('emp_id', 'The employee', 'required|trim|max_length[100]|numeric|xss_clean');
		$this->form_validation->set_rules('reason', 'the manager', 'required|trim|xss_clean');
	
       
		
        if ($this->form_validation->run() == false) {
			    echo 'no';
		}else{
			 $emp_id=$this->input->post('emp_id');
		     $reason=$this->input->post('reason');
			 $sender_id = $this->session->userdata('emp_id');
			  $company_id = $this->session->userdata('company_id');
			if($this->model_employee->insert_report($emp_id,$reason,$sender_id,$company_id)){
				
              echo 'ok';
				}else{
					 
                echo 'no';
					}
			
			
			}
			 
			    
				}else{
           redirect('site/index_employee');	
        }  
			
		}
	////////////////////////////////////////////////////////////////
	function show_reports(){
		 if ($this->session->userdata('employee_logged_in')) {		
		 $id = $this->session->userdata('emp_id');
if($this->model_employee->is_manager($id)){
  $sector_type=$this->model_employee->sector_type_employee($id)->row(0)->type;
 }elseif($this->model_employee->is_sub_manager($id)){
	 $sector_type=$this->model_employee->sector_type_sub_manger($id)->row(0)->type;
	 }else{
		  $sector_type=$this->model_employee->sector_type_employee($id)->row(0)->type;
		 }
	 if(isset($sector_type) && $sector_type=='legal'){   /// start 
		 if($this->model_employee->is_manager($id)){
			 if($this->model_employee->show_reports($id)){
				 $data['reports']=$this->model_employee->show_reports($id)->result();
				 $this->load->view('show_reports',$data);
				 }else{
					 $data['no_reports']=1;
				 $this->load->view('show_reports',$data);					
					 }
			 }else{
			       if($this->model_employee->show_reports_emp($id)){
				 $data['reports']=$this->model_employee->show_reports_emp($id)->result();
				 $this->load->view('show_reports',$data);
				 }else{
					 $data['no_reports']=1;
				 $this->load->view('show_reports',$data);					
				 }
			 }
		 
		 }else{
			 redirect('site/error404');
			 }
	 	}else{
           redirect('site/index_employee');	
        }  
		}	
	//////////////////////////////////////////////////////////////
	function report_details(){
		 if ($this->session->userdata('employee_logged_in') || $this->uri->segment(3) != ''|| $this->uri->segment(4) != '') {
			$id = $this->session->userdata('emp_id');
			$comany_id=$this->session->userdata('company_id');
			if($id ==$this->uri->segment(4)){
				
				if($this->uri->segment(5) != ''){
				$activity_id=$this->uri->segment(5);
			$this->db->where('id',$activity_id);
		    $result=$this->db->update('activity',array('seen'=>1));
				}
				
if($this->model_employee->is_manager($id)){ 
			 $sector_type=$this->model_employee->sector_type_employee($id)->row(0)->type;
 }elseif($this->model_employee->is_sub_manager($id)){
	  $sector_type=$this->model_employee->sector_type_sub_manger($id)->row(0)->type;
	 }
 
 else{
	  $sector_type=$this->model_employee->sector_type_employee($id)->row(0)->type;
	 }
	 
	 if(isset($sector_type) && $sector_type=='legal'){   /// start 
		 if($this->model_employee->is_manager($id)){
			
				$report_id=$this->uri->segment(3);
				if($this->model_employee->select_report_details($report_id)){
					$data['report']=$this->model_employee->select_report_details($report_id);
						 if($this->model_employee->legel_sector_emp($comany_id)){
               		$data['lawyers']=$this->model_employee->legel_sector_emp($comany_id)->result();
						 }

					$this->load->view('report_details',$data);
					}else{
						 $data['no_reports']=1;
					$this->load->view('report_details',$data);	
						}
			 }else{
			 $report_id=$this->uri->segment(3);
				if($this->model_employee->select_report_details($report_id)){
					//update lawyer seen
			$data2=array(
			'report_id'=>$report_id,
			'emp_id'=>$id
			);
			$this->db->where($data2);
		    $result=$this->db->update('forward_reports',array('seen'=>1));
			//////////////////////////
					$data['report']=$this->model_employee->select_report_details($report_id);
					$data['lawyer']=1;	 
					$this->load->view('report_details',$data);
					}else{
						 $data['no_reports']=1;
					$this->load->view('report_details',$data);	
						}
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
	///////////////////////////////////////////////
	function select_lawyer(){
		 if ($this->session->userdata('employee_logged_in') || $this->uri->segment(3) != ''|| $this->uri->segment(4) != '') {
			 $id = $this->session->userdata('emp_id');
			 if($this->model_employee->is_manager($id)){ 
			 $sector_type=$this->model_employee->sector_type_employee($id)->row(0)->type;
 }elseif($this->model_employee->is_submanager($id)){
	 $sector_type=$this->model_employee->sector_type_sub_manger($id)->row(0)->type;
	 }else{
		  $sector_type=$this->model_employee->sector_type_employee($id)->row(0)->type;
		 }
	 if(isset($sector_type) && $sector_type=='legal'){ 
	 $comany_id=$this->session->userdata('company_id');
	$search_key=$this->input->post('search_term', true); 
				
	 if($this->model_employee->legel_sector_emp($search_key,$comany_id)){
		$data['lawyers']=$this->model_employee->legel_sector_emp($search_key,$comany_id)->result();

		
		 }else{
			 echo 'There is no lawyer in this sector until now';
			 }
		}else{
			 redirect('site/error404');
			 } 

		}else{
           redirect('site/index_employee');	
        }  
		}	
/////////////////////////////////////////////////////////////
function ajax_forward_report(){
	 if ($this->session->userdata('employee_logged_in') || $this->uri->segment(3) != ''|| $this->uri->segment(4) != '') {

		    $this->load->library('form_validation');
        $this->form_validation->set_rules('for_id', 'The employee', 'required|trim|max_length[100]|numeric|xss_clean');
		$this->form_validation->set_rules('report_id', 'the manager', 'required|trim|xss_clean|numeric');
		$this->form_validation->set_rules('reason', 'the manager', 'required|trim|xss_clean');
	
       
		
        if ($this->form_validation->run() == false) {
			    echo 'no';
		}else{
			 $for_id=$this->input->post('for_id');
		     $report_id=$this->input->post('report_id');
		     $reason=$this->input->post('reason');			
			  
			if($this->model_employee->forward_report($for_id,$report_id,$reason)){
				
              echo 'ok';
				}else{
					 
                echo 'no';
					}
			
			
			}
		 
		}else{
           redirect('site/index_employee');	
        }  
	}	
	///////////////////////////////////////////////////////////////////////
	
	
	function ajax_insert_archive(){
	 if ($this->session->userdata('employee_logged_in') || $this->uri->segment(3) != ''|| $this->uri->segment(4) != '') {

		    $this->load->library('form_validation');
       $this->form_validation->set_rules('report_id', 'the manager', 'required|trim|xss_clean|numeric');
		
	
       
		
        if ($this->form_validation->run() == false) {
			    echo 'no1';
		}else{
			 
		     $report=$this->input->post('report_id');
		     
			  
			if($this->model_employee->update_archive($report)){
				
              echo 'ok';
				}else{
					 
                echo 'no2';
					}
			
			
			}
		 
		}else{
           redirect('site/index_employee');	
        }  
	}
	//////////////////////////////////////////////
	function ajax_result_report(){
		 if ($this->session->userdata('employee_logged_in') || $this->uri->segment(3) != ''|| $this->uri->segment(4) != '') {
		 $this->load->library('form_validation');
       $this->form_validation->set_rules('report_id', 'the manager', 'required|trim|xss_clean|numeric');
	   $this->form_validation->set_rules('reason', 'the manager', 'required|trim|xss_clean');
		
	
       
		
        if ($this->form_validation->run() == false) {
			    echo 'no1';
		}else{
			 
		     $report_id=$this->input->post('report_id');
			 $result=$this->input->post('reason');
		     $my_id=$this->session->userdata('emp_id');
		     $comp_id=$this->model_users->select_emp($my_id)->row(0)->company_id;
			  
			if($this->model_employee->add_result_report($report_id,$result,$comp_id,$my_id)){
				
              echo 'ok';
				}else{
					 
                echo 'no2';
					}
			
			
			}
		 
		}else{
           redirect('site/index_employee');	
        } 
		}
	////////////////////////////////////////////
	function show_result_reports(){
		if ($this->session->userdata('employee_logged_in')){
			 $id=$this->session->userdata('emp_id');
	if($this->model_employee->is_manager($id)){ 
			 $sector_type=$this->model_employee->sector_type_employee($id)->row(0)->type;
 }elseif($this->model_employee->is_sub_manager($id)){
	  $sector_type=$this->model_employee->sector_type_sub_manger($id)->row(0)->type;
	 }
 
 else{
	  $sector_type=$this->model_employee->sector_type_employee($id)->row(0)->type;
	 }
	 
	 if(isset($sector_type) && $sector_type=='financial'){   /// start 
		 if($this->model_employee->is_manager($id)){
          // is manager
		  if($this->model_employee->show_result_report_mang($id)){
		  $data['reports']=$this->model_employee->show_result_report_mang($id)->result();
		  $this->load->view('reports_results',$data);	
		  }else{
			   $data['no_reports']=1;
			   $this->load->view('reports_results',$data);	
			  }
		 }elseif($this->model_employee->is_sub_manager($id)){
	     // is sub manager
		  if($this->model_employee->show_result_report_sub($id)){
		  $data['reports']=$this->model_employee->show_result_report_sub($id)->result();
		  $this->load->view('reports_results',$data);	
		  }else{
			   $data['no_reports']=1;
			   $this->load->view('reports_results',$data);	
			  }
			}else{
		//is an employee
				 if($this->model_employee->show_result_report_emp($id)){
		  $data['reports']=$this->model_employee->show_result_report_emp($id)->result();
		  $this->load->view('reports_results',$data);	
		  }else{
			   $data['no_reports']=1;
			   $this->load->view('reports_results',$data);	
			  }
				}
			//////////////////// not finanical	
			}else{
			 redirect('site/error404');
			}
			}else{
				 redirect('site/index_employee');	
				}
		
		}
	//////////////////////////////////////////////
	function report_result_details(){
		if ($this->session->userdata('employee_logged_in') || $this->uri->segment(3) != ''|| $this->uri->segment(4) != ''){
			 $id=$this->session->userdata('emp_id');
			 if($id ==  $this->uri->segment(4)){
				 if($this->model_employee->is_manager($id)){ 
			 $sector_type=$this->model_employee->sector_type_employee($id)->row(0)->type;
 }elseif($this->model_employee->is_sub_manager($id)){
	  $sector_type=$this->model_employee->sector_type_sub_manger($id)->row(0)->type;
	 }
 
 else{
	  $sector_type=$this->model_employee->sector_type_employee($id)->row(0)->type;
	 }
	
	 if(isset($sector_type) && $sector_type=='financial'){   /// start
	 
	      if($this->model_employee->is_manager($id)){
			  //manager
			  $result_id= $this->uri->segment(3);
			  if($this->model_employee->result_report_details($result_id)){
				 $data['report']=$this->model_employee->result_report_details($result_id);  
				/////////////////////////////////////////////////
				$company_id=$this->session->userdata('company_id');
				$department_id=$this->session->userdata('department_id');
				if($this->model_employee->select_sub_departments($company_id,$department_id)){
	          $data['employees']=$this->model_employee->select_sub_departments($company_id,$department_id);
				  $this->load->view('result_details',$data);	
			 }else{
				 // no emplloyees
				 $data['no_employees']=1;
				  $this->load->view('result_details',$data);	
				 }
				
			  }else{
				  //no report
				  $data['no_reports']=1;
			   $this->load->view('reports_results',$data);	
				  }
			  }elseif($this->model_employee->is_sub_manager($id)){
				 //sub manager
				$result_id= $this->uri->segment(3);
			  if($this->model_employee->result_report_details($result_id)){
				 $data['report']=$this->model_employee->result_report_details($result_id);  
				/////////////////////////////////////////////////
               $company_id=$this->session->userdata('company_id');
				
				$sub_dept_id=$this->session->userdata('sub_dept_id');
				$department_id=$this->model_employee->is_sub_manager($id)->row(0)->department_id;
           
			 $data['employees']=$this->model_employee->select_emp_giv_task($company_id,$department_id,$sub_dept_id);
			 $this->load->view('result_details',$data);	
			
		  //////////////////////////////////////////////////

		  }else{
			   $data['no_reports']=1;
			   $this->load->view('reports_results',$data);	
			  }

				 
				  }else{
					  ///employee
			  $result_id= $this->uri->segment(3);
			  if($this->model_employee->result_report_details($result_id)){
				 $data['report']=$this->model_employee->result_report_details($result_id);  
				/////////////////////////////////////////////////
				 $this->load->view('result_details',$data);	
			  }else{
			   $data['no_reports']=1;
			   $this->load->view('reports_results',$data);	
			  }
			  
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
	////////////////////////////////////////////////////////////
	function ajax_forward_report_result(){
			if ($this->session->userdata('employee_logged_in') || $this->uri->segment(3) != ''|| $this->uri->segment(4) != ''){
				 $this->load->library('form_validation');
       $this->form_validation->set_rules('result_id', 'the manager', 'required|trim|xss_clean|numeric');
	   $this->form_validation->set_rules('for_id', 'the manager', 'required|trim|xss_clean|numeric');
		
	
       
		
        if ($this->form_validation->run() == false) {
			    echo 'no1';
		}else{
			 $emp_id=$this->session->userdata('emp_id');
		     $result_id=$this->input->post('result_id');
			 $for_id=$this->input->post('for_id');
		    if($this->model_employee->is_manager($emp_id)){
				if($this->model_employee->forward_result_report_mang($result_id,$for_id)){
				
              echo 'ok';
				}else{
              echo 'no2';
					}
			}elseif($this->model_employee->is_sub_manager($emp_id)){
				if($this->model_employee->forward_result_report_sub($result_id,$for_id)){
				
              echo 'ok';
				}else{
              echo 'no2';
					}
				}
			
			
			
			}
				
				}else{
					 redirect('site/index_employee');	
					}
		}	
	////////////////////////////////////////////////////////////////
	function ajax_insert_archive_result(){
				if ($this->session->userdata('employee_logged_in') || $this->uri->segment(3) != ''|| $this->uri->segment(4) != ''){
					 $result_id=$this->input->post('result_id');
			
				if($this->model_employee->ajax_insert_archive_result($result_id)){
				
              echo 'ok';
				}else{
              echo 'no2';
					}
					}else{
				    redirect('site/index_employee');	
					}
		
		}	
	//////////////////////////////////////////////////////////
	function ajax_discount_employee(){
		if ($this->session->userdata('employee_logged_in') || $this->uri->segment(3) != ''|| $this->uri->segment(4) != ''){
					 $report_id=$this->input->post('report_id');
			          $days=$this->input->post('days');
				if($this->model_employee->discount_salary($report_id,$days)){
				
              echo 'ok';
				}else{
              echo 'no2';
					}
					}else{
				    redirect('site/index_employee');	
					}
		}	
	//////////////////////////////////////////////////
	function staff_salaries(){
		if($this->session->userdata('employee_logged_in')){
			 $id=$this->session->userdata('emp_id');
			 if($this->model_employee->is_manager($id)){ 
			 $sector_type=$this->model_employee->sector_type_employee($id)->row(0)->type;
 }elseif($this->model_employee->is_sub_manager($id)){
	  $sector_type=$this->model_employee->sector_type_sub_manger($id)->row(0)->type;
	 }
 
 else{
	  $sector_type=$this->model_employee->sector_type_employee($id)->row(0)->type;
	 }
	
	 if(isset($sector_type) && $sector_type=='financial'){   /// start
	   $company_id=$this->session->userdata('company_id');
	 if($this->model_employee->employees_sallary($company_id)){
		 $data['employees']=$this->model_employee->employees_sallary($company_id)->result();
	 $this->load->view('staff_salary',$data);	 
		 }else{
			 $data['no_employees']=1;
			  $this->load->view('staff_salary',$data);
			 }
	
	 }else{
		   redirect('site/error404');
		   }
			
			}else{
				redirect('site/index_employee');	
				}
		
		}
		
		//////////////////////////////////////////////////
		function ajax_get_salary(){
			$emp_id=$this->input->post('emp_id');
			echo $this->_ajax_get_salary($emp_id);
			}
		function _ajax_get_salary($emp_id){
				if($this->session->userdata('employee_logged_in')){
			 $id=$this->session->userdata('emp_id');
			 if($this->model_employee->is_manager($id)){ 
			 $sector_type=$this->model_employee->sector_type_employee($id)->row(0)->type;
 }elseif($this->model_employee->is_sub_manager($id)){
	  $sector_type=$this->model_employee->sector_type_sub_manger($id)->row(0)->type;
	 }
 
 else{
	  $sector_type=$this->model_employee->sector_type_employee($id)->row(0)->type;
	 }
	
	 if(isset($sector_type) && $sector_type=='financial'){   /// start
	  
	  if($this->model_employee->ajax_get_salary($emp_id)){
		  $salary=$this->model_employee->ajax_get_salary($emp_id)->row(0)->salary;
		  $result=array('status'=>'ok','salary'=>$salary);
			return json_encode($result);	
		  }else{
			  
			  
$result=array('status'=>'no');

	return json_encode($result);
						}
	 
	 
	 
	 }else{
		   redirect('site/error404');
		   }
			
			}else{
				redirect('site/index_employee');	
				}
			}
		//////////////////////////////////////////////////	
		function ajax_insert_salary(){
				if($this->session->userdata('employee_logged_in')){
			 $id=$this->session->userdata('emp_id');
			 if($this->model_employee->is_manager($id)){ 
			 $sector_type=$this->model_employee->sector_type_employee($id)->row(0)->type;
 }elseif($this->model_employee->is_sub_manager($id)){
	  $sector_type=$this->model_employee->sector_type_sub_manger($id)->row(0)->type;
	 }
 
 else{
	  $sector_type=$this->model_employee->sector_type_employee($id)->row(0)->type;
	 }
	
	 if(isset($sector_type) && $sector_type=='financial'){   /// start
	 
	  $this->load->library('form_validation');
       $this->form_validation->set_rules('emp_id', 'the manager', 'required|trim|xss_clean|numeric');
	   $this->form_validation->set_rules('salary', 'the manager', 'required|trim|xss_clean|numeric');
		
	
       
		
        if ($this->form_validation->run() == false) {
			    echo 'no1';
		}else{
			 $emp_id=$this->input->post('emp_id');
		     $salary=$this->input->post('salary');
	 if($this->model_employee->ajax_insert_salary($emp_id,$salary)){
		 echo 'ok';
		 }else{
			 echo 'no';
			 }
		}
	 
	 }else{
		   redirect('site/error404');
		   }
			
			}else{
				redirect('site/index_employee');	
				}
			
			}
	/////////////////////////////////////////////////////////
	function show_jobs(){
			if($this->session->userdata('employee_logged_in')){
				 $id=$this->session->userdata('emp_id');
				 $company_id=$this->session->userdata('company_id');
	 
			 if($this->model_employee->is_manager($id)){ 
			 $sector_type=$this->model_employee->sector_type_employee($id)->row(0)->type;
 }elseif($this->model_employee->is_sub_manager($id)){
	  $sector_type=$this->model_employee->sector_type_sub_manger($id)->row(0)->type;
	 }
 
 else{
	  $sector_type=$this->model_employee->sector_type_employee($id)->row(0)->type;
	
	 }
	  
		$sub_sector_type=$this->model_employee->sub_sector_type($id)->row(0)->type;	 
	
	
	 if(isset($sector_type,$sub_sector_type) && $sector_type=='personnel' && $sub_sector_type=='hr'){   /// start
	  if($this->model_employee->job_applies($company_id)){
	$data['jobs']=$this->model_employee->job_applies($company_id)->result();	 
	  $this->load->view('show_jobs',$data);
		 }else{
		   $data['no_reports']=1;
			   $this->load->view('show_jobs',$data);
		 }
	 
	 }else{
		  redirect('site/error404');
		 }
	}else{
		 redirect('site/index_employee');	
		 }	 
		 
		 
		}
	///////////////////////////////////////////////////////////////////////
	function job(){
		if($this->session->userdata('employee_logged_in')){
			if( $this->uri->segment(3) != '' || $this->uri->segment(4) != '' || $this->uri->segment(5) != '' || $this->uri->segment(6) != ''){
				
					$apply_id=$this->uri->segment(6);
			$this->db->where('id',$apply_id);
		    $result=$this->db->update('apply_job',array('emp_seen'=>1));
				
				 $id=$this->session->userdata('emp_id');
				 $company_id=$this->session->userdata('company_id');
				 if($company_id ==$this->uri->segment(4)){
					 $job_id=$this->uri->segment(3);
					  if($this->model_employee->job_applies_one($job_id)){
	$data['job']=$this->model_employee->job_applies_one($job_id);	
	
	$id=$this->uri->segment(5);   
               
				 if($this->model_users->select_user($id)){
					 $id=$this->model_users->select_user($id)->row(0)->id;
				     $data['id']=$id;
					 $data['user_data']=$this->model_users->get_user_info($id);
					 $data['cv']=$this->model_users->get_cv($id);
					$data['cv_edu']=$this->model_users->get_cv_edu($id);
					$data['cv_exper']=$this->model_users->get_cv_exper($id);
					$data['cv_skills']=$this->model_users->get_cv_skills($id);
					$data['following']=$this->model_users->get_following($id);
				 }
	 
	  $this->load->view('job_details',$data);
		 }else{
		   $data['no_reports']=1;
			   $this->load->view('job_details',$data);
		 }
					 
					 }
					else{
					redirect('site/error404');
					}
				}else{
					 redirect('site/error404');
					}
			}else{
		 redirect('site/index_employee');	
		 }	 
		 
		}	
	/////////////////////////////////////////////////////////////////////////
	function ajax_reject_user(){
		if($this->session->userdata('employee_logged_in')){
			
				$apply_id=$this->input->post('job_id');
			if($this->model_employee->ajax_reject_user($apply_id)){
				echo 'ok';
				}else{
					echo 'no';
					}
			
			       	
			}else{
		 redirect('site/index_employee');	
		 }
		}			
}?>