<?php
class Model_employee extends CI_Model {
   //////////////////////////////////////////////
    
      public function check_can_log_in($email, $password){
       
	      $query = "select id ,company_id,department_id,sub_dept_id,email,firstname,lastname,username from employees where email=? and password=? and confirm=1";
      $result=$this->db->query($query,array($email,$password));
       if ( $result->num_rows() == 1) {
          $result=array('id'=>$result->row(0)->id,'email'=>$result->row(0)->email,'company_id'=>$result->row(0)->company_id,
		                'department_id'=>$result->row(0)->department_id,'sub_dept_id'=>$result->row(0)->sub_dept_id,'username'=>$result->row(0)->username);
						
					
						
	   return  $result; 
        } else {
            return false;
        }
        
    }
    ////////////////////////////////////////
      function update_online($id){
		  //////////////////////////emlopyee online//////////////////////			
			 $data = array(
               'online' => 1,
            );

			$this->db->where('id', $id);
			$this->db->update('employees', $data); 

		 if($this->db->affected_rows()==1){
			 return true;
			 }else{
				 return false;
				 }

		  }
		  //////////////////////////emlopyee offline //////////////////////			
		     function update_offline($id){
		  
			 $data = array(
               'online' => 0,
            );

			$this->db->where('id', $id);
			$this->db->update('employees', $data); 

		 if($this->db->affected_rows()==1){
			 return true;
			 }else{
				 return false;
				 }
			//////////////////////////////////////////////////////////////	
		  }
	 //////////////////////////////////////////////
    
    public function can_log_in(){
        $email=  $this->input->post('email');
        $password= md5($this->input->post('password'));
        
      // $emaiil= $this->db->where('email', $this->input->post('email'));
      // $password= $this->db->where('password', md5($this->input->post('password')));
        
        $query = "select id ,company_id,email,firstname,lastname from employees where email=? and password=? and confirm=1 ";
        $result=$this->db->query($query,array($email,$password));
        
        if($result->num_rows() == 1){
            return true;
        } else {
            return false;
        }
        
    }
		 //////////////////////////////////////////////    company login///////////////////////////////////////////////////////
    
      public function check_comp_can_log_in($email, $password){
       
	      $query = "select id ,email from company where email=? and password=?";
      $result=$this->db->query($query,array($email,$password));
       if ( $result->num_rows() == 1) {
          $result=array('id'=>$result->row(0)->id, 'email'=>$result->row(0)->email);
	   return  $result; 
        } else {
            return false;
        }
        
    }
  
	////////////////////////////////////////////
	  public function can_log_in_comp(){
        $email=  $this->input->post('email');
        $password= md5($this->input->post('password'));

        
        $query = "select id ,email from company where email=? and password=?";
        $result=$this->db->query($query,array($email,$password));
        
        if($result->num_rows() == 1){
            return true;
        } else {
            return false;
        }
        
    }
	/////////////////////////////////////////\ end company login   ////////////////////////////////////////
    public function get_company($company_id){
        $query = "SELECT name FROM company WHERE id=?";
        $result = $this->db->query($query,$company_id);
        if($result){
         $result = array('name'=>$result->row(0)->name);
         $company_name = $result['name'] ;  
         return $company_name;
        } else {
            return false;
        }
    }

        public function check_company($email){
        $query = "SELECT company_id FROM employees WHERE email=? ";
        $result = $this->db->query($query,array($email));
        
        $id = array('company_id' => $result->row(0)->company_id);
        
        if($id['company_id'] == NULL){
            
        }  else {
            return false;  
        }
        
    }
	
	///////////////////////////////
	function is_manager($id){
		$sql='select * from department where depart_manager=?';
		$result = $this->db->query($sql,array($id));
		if($result->num_rows() == 1){
            return $result;
        } else {
            return false;
        }
		}
	/////////////////////////////////
	function is_sub_manager($id){
		$sql='select * from sub_department where sub_depart_manager=?';
		$result = $this->db->query($sql,array($id));
		if($result->num_rows() == 1){
            return $result;
        } else {
            return false;
        }
		}
	///////////////////////////////////
	function select_dept($id){
		$sql='select * from department where id=?';
		$result = $this->db->query($sql,array($id));
		if($result->num_rows() == 1){
            return $result;
        } else {
            return false;
        }
		}
	///////////////////////////////////
	function select_sub_dept($id){
		$sql='select * from sub_department where id=?';
		$result = $this->db->query($sql,array($id));
		if($result->num_rows() == 1){
            return $result;
        } else {
            return false;
        }
		}	
	///////////////////////////////////////
		function emp_by_id($id){
	$this->db->where('id',$id);
	$result = $this->db->get('employees');
	  return $result->result();
			}
	/////////////////////////////////////
	function is_chairman($id){
		$this->db->where('chairman',$id);
		$result = $this->db->get('company');
	    
		if($result->num_rows() == 1){
           return $result->result();
        } else {
            return false;
        }
		}	

		///////////////////////////////////////////////////
		function update_department($id,$dept_id){
			
			 $data = array(
               'confirm' => 1,
               'department_id' => $dept_id
               
            );

			$this->db->where('id', $id);
			$result=$this->db->update('employees', $data); 

		 if($this->db->affected_rows()==1){
			 return true;
			 }else{
				 return false;
				 }
			}
	////////////////////////////////////////////////
	function update_sub_dept($id,$sub_dept_id){
		
			 $data = array(
			        'confirm' => 1,
                   'sub_dept_id' => $sub_dept_id
                    );

			$this->db->where('id', $id);
			$result=$this->db->update('employees', $data); 

		 if($this->db->affected_rows()==1){
			 return true;
			 }else{
				 return false;
				 }
		}		
	///////////////////////////////////////////////	
	function confirm_chairman($id){
		 $data = array(
               'confirm' => 1,
              
               
            );

			$this->db->where('id', $id);
			$result=$this->db->update('employees', $data); 

		 if($this->db->affected_rows()==1){
			 return true;
			 }else{
				 return false;
				 }
		}
	///////////////////////////////////////////////////
	 function do_upload($id) {

        $gallery_path = realpath(APPPATH . '../images/profile/');
        $gallery_path_thumb = realpath(APPPATH . '../images/profile/thumb_profile/');
        $gallery_path_url = base_url() . 'images/';
        $config = array(
            'allowed_types' => 'jpg|JPEG|png|gif',
            'upload_path' => $gallery_path,
            'max_size' => 3000
        );
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload()) {
            return $error = array("error" => $this->upload->display_errors());
        }



        $image_data = $this->upload->data();
        //////////////////////////////////////////////
        //////////////////////////////////////////////
        $config2 = array(
            'source_image' => $image_data['full_path'],
            'new_image' => $gallery_path_thumb,
            'maintain_ratio' => TRUE,
            'width' => 300,
            'height' => 200
        );

        $this->load->library('image_lib', $config2);


        if (!$this->image_lib->resize()) {
            return $error = array("error" => $this->upload->display_errors());
        }

        $sql_select = "select profile_pic from employees where id= '{$id}' ";
        $result = $this->db->query($sql_select);
        if ($result->num_rows() == 1) {
            $pic_name = $result->row(0)->profile_pic;
            if ($pic_name != 'default_pic.png') {

                $path1 = APPPATH . '../images/profile/' . $pic_name;
                $path2 = APPPATH . '../images/profile/thumb_profile/' . $pic_name;
                unlink($path1);
                unlink($path2);
            }
        } else {
            return false;
        }

        $query_str = "update employees set profile_pic = ? where id = '{$id}' ";
        $this->db->query($query_str, $image_data['file_name']);
    }
///////////////////////////////////////////////////
function select_departments($id){
	$sql='select e.id,e.firstname,e.lastname,e.profile_pic,e.company_id,e.department_id,e.sub_dept_id,e.online,d.depart_manager,d.id,d.name
              from employees e 
			  join department d on e.id=d.depart_manager and d.company_id=?';
		$result = $this->db->query($sql,array($id));
		if($result->num_rows() >= 1){
            return $result->result();
        } else {
            return false;
        }
	}
///////////////////////////////////////////////////
function select_sub_departments($comp_id , $dept_id){
	$sql='select e.id,e.firstname,e.lastname,e.profile_pic,e.company_id,e.department_id,e.sub_dept_id,e.online,d.sub_depart_manager
              from employees e 
			  join sub_department d on e.id=d.sub_depart_manager and d.company_id=? and d.department_id=?';
		$result = $this->db->query($sql,array($comp_id,$dept_id));
		if($result->num_rows() >= 1){
            return $result->result();
        } else {
            return false;
        }
	}
/////////////////////////////////////////////////////
     function select_emp_giv_task($company_id,$department_id,$sub_dept_id){
		 $sql='select id,username,firstname,lastname from employees where company_id=? and department_id=? and sub_dept_id=?';
		$result = $this->db->query($sql,array($company_id,$department_id,$sub_dept_id));
		if($result->num_rows() >= 1){
            return $result->result();
        } else {
            return false;
        }
		 
		 }		
    ///////////////////////////////////////////
	function insert_tasks($employee_id,$the_task,$deadline,$task_owner){
		$data = array(
            'emp_id' => $employee_id,
            'deadline' => $deadline,
            'the_task' => $the_task,
			'task_owner'=>$task_owner
            );
        $query = $this->db->insert('tasks', $data);
        if($this->db->affected_rows()==1){
			$sql='select id from tasks where emp_id=? order by id desc limit 1 ';
			$result=$this->db->query($sql,$employee_id);
			if($result->num_rows() == 1){
				$task_id =$result->row(0)->id;
				$link=base_url().'employee/task/'.$task_id.'/'.$employee_id;
			$data = array(
            'emp_id' => $employee_id,
            'activity' => 'Your manager assign a new task"'.substr($the_task,0,10).'..." for you.',
			'task_id'=>$task_id,
			'link'=>$link
            );
			$query = $this->db->insert('activity', $data);
			if($this->db->affected_rows()==1){
				return true;
				}else{
					return false;
					}
				}
            
			
        } else {
            return false;
        }
		
		}
	////////////////////////////////////////////////
	function select_tasks($id){
		$sql='select e.id as e_id,e.firstname,e.lastname,e.profile_pic,e.company_id,e.department_id,e.sub_dept_id,e.online,t.id,t.emp_id,t.the_task,t.under_construction,t.done,t.task_owner,t.seen
              from employees e 
			  join tasks t on e.id=t.task_owner and t.task_owner=?';
			  	   
		$result=$this->db->query($sql,$id);
		if($result->num_rows() >= 1){
            return $result->result();
        } else {
            return false;
        }
		}

	////////////////////////////////////////////////
	function select_dashbord_tasks($id){
		
		
		$sql='select e.id as e_id,e.firstname,e.lastname,e.profile_pic,e.company_id,e.department_id,e.sub_dept_id,e.online,t.id,t.emp_id,t.the_task,t.under_construction,t.done,t.task_owner,t.seen
              from employees e 
			  join tasks t on e.id=t.task_owner and t.emp_id=? order by id DESC';
			  	   
		$result=$this->db->query($sql,$id);
		if($result->num_rows() >= 1){
            return $result->result();
        } else {
            return false;
        }
		}
	///////////////////////////////////////////////					
	function select_task($id){
		
		$sql='select e.id as e_id,e.firstname,e.lastname,e.profile_pic,e.company_id,e.department_id,e.sub_dept_id,e.online,t.id,t.emp_id,t.the_task,t.under_construction,t.done,t.task_owner,t.seen,t.deadline
              from employees e 
			  join tasks t on e.id=t.task_owner and t.id=?';
			  	   
		$result=$this->db->query($sql,$id);
		if($result->num_rows() == 1){
            return $result;
        } else {
            return false;
        }
		}
	//////////////////////////////////////////////
	function start_task($id,$task_owner,$username,$emp_id){
		$this->db->where('id',$id);
		$result=$this->db->update('tasks',array('under_construction'=>1));
		if($this->db->affected_rows()==1){
          $sql='select the_task,task_owner from tasks where id=? ';
			$result=$this->db->query($sql,$id);
			if($result->num_rows() == 1){
				$the_task=$result->row(0)->the_task;
				$$task_owner=$result->row(0)->task_owner;
				$link=base_url().'employee/task_manger/'.$id.'/'.$task_owner;
			$data = array(
            'emp_id' => $task_owner,
            'activity' => $username.' start working in this"'.substr($the_task,0,10).'..." task.',
			'task_id'=>$id,
		    'link'=>$link
            );
			$query = $this->db->insert('activity', $data);
			if($this->db->affected_rows()==1){
				return true;
				}else{
					return false;
					}
            	
				}
				
        } else {
            return false;
        }
		}
	//////////////////////////////////////////////
	function finish_task($id,$emp_id){
		$this->db->where('id',$id);
		$result=$this->db->update('tasks',array('done'=>1));
		if($this->db->affected_rows()==1){
			$sql='select the_task from tasks where id=? ';
			$result=$this->db->query($sql,$id);
			if($result->num_rows() == 1){
				$the_task=$result->row(0)->the_task;
				$link=base_url().'employee/task/'.$id.'/'.$emp_id;
			$data = array(
            'emp_id' => $emp_id,
            'activity' => 'Your manager confirm that you finish "'.substr($the_task,0,10).'..." task.',
			'task_id'=>$id,
		    'link'=>$link
            );
			$query = $this->db->insert('activity', $data);
			if($this->db->affected_rows()==1){
				return true;
				}else{
					return false;
					}
            	
				}
			
        } else {
            return false;
        }
		}
	//////////////////////////////////////////////
	function select_avtivity($id){
	$data=array('emp_id'=>$id);
	$this->db->order_by("id", "desc"); 
		$this->db->where($data);
	$result = $this->db->get('activity',10);
	  return $result->result();
		}
	//////////////////////////////////////////////
	function count_avtivity($id){
	$data=array('emp_id'=>$id,'seen'=>0);
	$this->db->order_by("id", "desc"); 
		$this->db->where($data);
	$result = $this->db->get('activity',10);
	  return $result->result();
		}	
	///////////////////////////////////////////////////////////// employee chat ////////////////////////////////////////////////	
	function select_dept_contacts($comp_id){
		$sql='select e.id,e.firstname,e.lastname,e.profile_pic,e.company_id,e.department_id,e.sub_dept_id,e.online
              from employees e 
			  join department d on e.id=d.depart_manager and d.company_id=?';
			  	   
		$result=$this->db->query($sql,$comp_id);
		if($result->num_rows() >= 1){
            return $result;
        } else {
            return false;
        }	   
		}
	////////////////////////////////////////////////////
	 function select_contacts_sub_departments($company_id,$department_id){
		$sql='select e.id,e.firstname,e.lastname,e.profile_pic,e.company_id,e.department_id,e.sub_dept_id,e.online
              from employees e 
			  join sub_department d on e.id=d.sub_depart_manager and d.company_id=? and d.department_id=? ';
			  	   
		$result=$this->db->query($sql,array($company_id,$department_id));
		if($result->num_rows() >= 1){
            return $result;
        } else {
            return false;
        }	   
		}
	/////////////////////////////////////////////////////
	
	 function select_my_manager($company_id,$department_id){
		$sql='select e.id,e.firstname,e.lastname,e.profile_pic,e.company_id,e.department_id,e.sub_dept_id,e.online
              from employees e 
			  join department d on e.id=d.depart_manager and d.company_id=? and d.id=? ';
			  	   
		$result=$this->db->query($sql,array($company_id,$department_id));
		if($result->num_rows() == 1){
            return $result;
        } else {
            return false;
        }	   
		}
		/////////////////////////////////////////////////////
	
	 function select_my_sub_manager($company_id,$department_id,$sub_dept_id){
		$sql='select e.id,e.firstname,e.lastname,e.profile_pic,e.company_id,e.department_id,e.sub_dept_id,e.online
              from employees e 
			  join sub_department s on e.id=s.sub_depart_manager and s.company_id=? and s.department_id=? and s.id=?';
			  	   
		$result=$this->db->query($sql,array($company_id,$department_id,$sub_dept_id));
		if($result->num_rows() == 1){
            return $result;
        } else {
            return false;
        }	   
		}	
	/////////////////////////////////////////////////////
	
	 function select_my_chairman($company_id){
		$sql='select e.id,e.firstname,e.lastname,e.profile_pic,e.company_id,e.department_id,e.sub_dept_id,e.online
              from employees e 
			  join company c on e.id=c.chairman and c.id=?';
			  	   
		$result=$this->db->query($sql,array($company_id));
		if($result->num_rows() == 1){
            return $result;
        } else {
            return false;
        }	   
		}
		
	////////////////////////////////////////////////////
	function select_emp_contacts($company_id,$department_id,$sub_dept_id){
		$sql='select id,firstname,lastname,profile_pic,company_id,department_id,sub_dept_id,online
              from employees  where company_id=? and department_id=? and sub_dept_id=?';
			  	   
		$result=$this->db->query($sql,array($company_id,$department_id,$sub_dept_id));
		if($result->num_rows() >= 1){
            return $result;
        } else {
            return false;
        }
		
		}
	//////////////////////////////////////////////////////	
	function add_chat_message($from_id , $to_id, $chat_message_content){
		$data = array(
            'from' => $from_id,
            'to' => $to_id,
            'message' => $chat_message_content,
			
            );
        $query = $this->db->insert('employee_chat', $data);
        if($this->db->affected_rows()==1){
			 
			return true;
			}else{
				return false;
				}		
		        }
	////////////////////////////////////////////////			
	function get_chat_messages($from_id ,$to_id){
	$sql='select * from employee_chat where `from`=? and `to`=? or `from`=? and `to`=? order by message_date ASC';
	$result=$this->db->query($sql,array($from_id,$to_id,$to_id,$from_id));
	if($result->num_rows() >= 1){
	
            return $result;
        } else {
            return false;
        }	
		}
		
	////////////////////////////////////////////////			
	function get_chat_messages_user_emp($from_id ,$to_id){
	$sql='select * from employee_user_chat where `from`=? and `to`=? or `from`=? and `to`=? order by message_date ASC';
	$result=$this->db->query($sql,array($from_id,$to_id,$to_id,$from_id));
	if($result->num_rows() >= 1){
	
            return $result;
        } else {
            return false;
        }	
		}
			
		
	
/////////////////////////////////////////////////////////
function get_chat_messages_last_one($from_id ,$to_id){
	$sql='select * from employee_chat where `from`=? and `to`=? or `from`=? and `to`=?  order by id desc limit 1 ';
	$result=$this->db->query($sql,array($from_id,$to_id,$to_id,$from_id));
	if($result->num_rows() == 1){
	
            return $result;
        } else {
            return false;
        }
	
	}	
	////////////////////////////////////////////////
	function update_message_seen($from_id ,$to_id){
		$sql='update employee_chat set to_seen=1 where `from`=? and `to`=? or `from`=? and `to`=?';
		$result=$this->db->query($sql,array($from_id,$to_id,$to_id,$from_id));
           if($this->db->affected_rows()==1){
			 
			return true;
			}else{
				return false;
				}
		}
	/////////////////////////////////////////////////////////
	function select_unseen_messages($id){
		$sql='select * from employee_chat where `to`=? limit 9';
		$result=$this->db->query($sql,$id);
		if($result->num_rows() >= 1){
	
            return $result;
			
        } else {
            return false;
        }
		}
	///////////////////////////////////////////////////////////
	
	function count_unseen_messages($id){
		$sql='select * from employee_chat where to_seen=? and `to`=?';
		$result=$this->db->query($sql,array(0,$id));
		if($result->num_rows() >= 1){
	
            return $result;
			
        } else {
            return false;
        }
		}	
	///////////////////////////////////////////////////////////
	function insert_report($emp_id,$reason,$sender_id,$company_id){
		$type='legal';
		    $sql='select * from department where company_id=? and type=?';
			$result2=$this->db->query($sql,array($company_id,$type));
			$to_id=$result2->row(0)->depart_manager;
		if($result2->num_rows() == 1){
	
            $data = array(
            'emp_id' => $emp_id ,
            'the_reason'=>$reason,
			'sender_id'=>$sender_id,
			'company_id'=>$company_id,
			'to_id'=>$result2->row(0)->depart_manager
            );
        $query = $this->db->insert('report_employee', $data);
        if($this->db->affected_rows()==1){
			
			$sql='select id from report_employee where to_id=? order by id desc limit 1 ';
			$result=$this->db->query($sql,$to_id);
			if($result->num_rows() == 1){
				$report_id =$result->row(0)->id;
				$link=base_url().'employee/report_details/'.$report_id.'/'.$to_id;
			$data = array(
            'emp_id' => $to_id,
            'activity' => 'there is a new report check it"'.substr($reason,0,10).'..." ',
			
			'link'=>$link
            );
			$query = $this->db->insert('activity', $data);
			if($this->db->affected_rows()==1){
				return true;
				}else{
					return false;
					}
				}
			
			return true;
			}else{
				return false;
				}
			
        } else {
            return false;
        }
			
		}	
					
	////////////////////////////////////////////////////////////////      for the sub department manager
	function sector_type_sub_manger($id){
		$sql='select d.company_id,d.name as dept_name,d.depart_manager,d.sub_depart_num,d.type,s.name as sub_dept_name
              from department d 
			  join sub_department s on d.id=s.department_id and s.sub_depart_manager=?';
			  $result=$this->db->query($sql,$id);
		if($result->num_rows() == 1){
	
            return $result;
			
        } else {
            return false;
        }
		}
	
	///////////////////////////////////////////////////////////////////   take employee_id for the sector manager and tthe employee
	
	function sector_type_employee($id){
		$sql='select e.id,d.depart_manager,d.type
              from employees e 
			  join department d on e.department_id=d.id and e.id=?';
			  $result=$this->db->query($sql,$id);
		if($result->num_rows() == 1){
	
            return $result;
			
        } else {
            return false;
        }
		}	
	///////////////////////////////////
	
	function sub_sector_type($id){
		$sql='select e.id,s.sub_depart_manager,s.type
              from employees e 
			  join sub_department s on e.sub_dept_id=s.id and e.id=?';
			  $result=$this->db->query($sql,$id);
		if($result->num_rows() == 1){
	
            return $result;
			
        } else {
            return false;
        }
		}			
	///////////////////////////////////////////////////////////////////
	function show_reports($to_id){
		$sql='select e.id,e.firstname,e.lastname,e.profile_pic,e.company_id,e.department_id,e.sub_dept_id,e.online,r.sender_id,r.the_reason,r.report_date,r.id as report_id,r.to_id
              from employees e 
			  join report_employee r on e.id=r.sender_id and r.to_id=? order by r.report_date DESC';
			  
	    $result=$this->db->query($sql,$to_id);
		if($result->num_rows() >= 1){
	
            return $result;
			
        } else {
            return false;
        } 
		}
	///////////////////////////////////////////////
		
	function show_reports_emp($to_id){
		$sql='select e.id,e.firstname,e.lastname,e.profile_pic,e.company_id,e.department_id,e.sub_dept_id,e.online,

       r.sender_id,r.the_reason,r.report_date,r.id as report_id,r.to_id,f.emp_id as lawer_id ,f.seen

              from employees AS e

       LEFT JOIN  report_employee AS r ON  e.id=r.sender_id

       JOIN forward_reports as f ON f.report_id = r.id where  f.emp_id=? and archive=? order by r.report_date DESC
			  
			  ';
			  
	    $result=$this->db->query($sql,array($to_id,0));
		if($result->num_rows() >= 1){
	
            return $result;
			
        } else {
            return false;
        } 
		}
	///////////////////////////////////////////////////
		
	function show_unseen_reports($to_id){
		$sql='select e.id,e.firstname,e.lastname,e.profile_pic,e.company_id,e.department_id,e.sub_dept_id,e.online,r.sender_id,r.the_reason,r.report_date,r.id as report_id
              from employees e 
			  join report_employee r on e.id=r.sender_id and r.to_id=? and seen=?';
			  
	    $result=$this->db->query($sql,array($to_id,0));
		if($result->num_rows() > 0){
	
            return $result;
			
        } else {
            return false;
        } 
		}
			///////////////////////////////////////////////////
		
	function show_unseen_reports_not_manager($to_id){
		$sql='select id from forward_reports where emp_id=? and seen=?';
			  
	    $result=$this->db->query($sql,array($to_id,0));
		if($result->num_rows() > 0){
	
            return $result;
			
        } else {
            return false;
        } 
		}
	
	///////////////////////////////////////////////////////////////////
	function select_deaprtment($id){
		$sql="select * from department where id=?";
		 $result=$this->db->query($sql,$id);
		if($result->num_rows() == 1){
	
            return $result;
			
        } else {
            return false;
        } 
		}
	/////////////////////////////////////////////////////
	function select_report_details($id){
		$sql='select e.id,e.firstname,e.lastname,e.profile_pic,e.company_id,e.department_id,e.sub_dept_id,e.online,r.sender_id,r.the_reason,r.report_date,r.id as report_id,r.emp_id as the_gelty
              from employees e 
			  join report_employee r on e.id=r.sender_id and r.id=?';
			$result=$this->db->query($sql,$id);
		if($result->num_rows() == 1){
	       $data = array(
               'seen' => 1,
            );

			$this->db->where('id', $id);
			$this->db->update('report_employee', $data); 
            return $result;
			
        } else {
            return false;
        }   
		
		}		
	////////////////////////////////////////////////////////
	function legel_sector_emp($comany_id){
		$sql='select e.id,e.firstname,e.lastname,e.profile_pic,e.company_id,e.department_id,e.sub_dept_id,e.online
              from employees e 
			  join department d on e.department_id=d.id and e.company_id=? and d.type=? ';
		$result=$this->db->query($sql,array($comany_id,'legal'));
		if($result->num_rows() >= 1){
	
            return $result;
			
        } else {
            return false;
        } 
		}	
	////////////////////////////////////////
	function legel_sector_emp2($keywords,$comany_id){
	
	$returned_result=array();
	$where="";
	
	$keywords=preg_split('/[\s]+/',$keywords);
   
	$total_keywords=count($keywords);
	
	foreach($keywords as $key=>$keyword){
		$where .="`username` like '%$keyword%'";
		if($key !=($total_keywords -1)){
			$where .="AND";
			}
		}
		$type='legal';
		$result="select e.id,e.firstname,e.lastname,e.profile_pic,e.company_id,e.department_id,e.sub_dept_id,e.online
              from employees e 
			  join department d on e.department_id=d.id and e.company_id={$comany_id} and d.type=? and $where limit 6";
		 if ($result2 = $this->db->query($result,$type)) {
            return $result2;
        } else {
            return false;
        }
}		
//////////////////////////////////////////////
  function forward_report($for_id,$report_id,$reason){
	   $data = array(
            'emp_id' => $for_id ,
            'report_id'=>$report_id,
			
            );
        $query = $this->db->insert('forward_reports', $data);
        if($this->db->affected_rows()==1){
	        $link=base_url().'employee/report_details/'.$report_id.'/'.$for_id;
			$data = array(
            'emp_id' => $for_id,
            'activity' => 'there is a new report check it"'.substr($reason,0,10).'..." ',
			
			'link'=>$link
            );
			
			$query = $this->db->insert('activity', $data);
			if($this->db->affected_rows()==1){
				return true;
				}else{
					return false;
					}
				
			return true;
			}else{
			return false;
			}
	  }
	  ///////////////////////////////////////
	  function update_archive($id){
		   $data = array(
               'archive' => 1,
            );

			$this->db->where('id', $id);
			$this->db->update('report_employee', $data); 

		 if($this->db->affected_rows()==1){
			 return true;
			 }else{
				 return false;
				 }
		  
		  }
	/////////////////////////////////////////////	  
	function add_result_report($report_id,$result,$company_id,$lawer_id){
		$sql1='select * from department where company_id=? and type=?';
		$result_sql1=$this->db->query($sql1,array($company_id,'financial'));
		
		if($result_sql1->num_rows() == 1){
	    $manager_id=$result_sql1->row(0)->depart_manager;
           $data = array(
            'report_id' => $report_id,
            'to_id' => $manager_id,
			'result'=>$result,
			'lawer_id'=>$lawer_id
            );
			
			$query = $this->db->insert('report_results', $data);
			if($this->db->affected_rows()==1){
				return true;
				}else{
					return false;
					}
			
        } else {
            return false;
        } 
		
		
		}
	///////////////////////////////////////////////////////////////
	function show_result_report_mang($id){
		$sql='select e.id,e.firstname,e.lastname,e.profile_pic,e.company_id,
		             e.department_id,e.sub_dept_id,e.online,r.report_id,r.result,r.to_id,r.date_result,r.id as result_id
              from employees e 
			  join report_results r on e.id=r.lawer_id and r.to_id=? and r.archive =? order by r.date_result DESC';
			  $result = $this->db->query($sql,array($id,0));
		if($result->num_rows() >= 1){
            return $result;
        } else {
            return false;
        }
		}
	/////////////////////////////////////////////////////////////
	function show_result_report_sub($id){
		$sql='select                 			      e.id,e.firstname,e.lastname,e.profile_pic,e.company_id,e.department_id,e.sub_dept_id,e.online,r.report_id,r.result,r.to_id,r.forward_sub_id,r.date_result,r.id as result_id
              from employees e 
			  join report_results r on e.id=r.lawer_id and r.forward_sub_id=? and r.archive =? order by r.date_result DESC';
			  $result = $this->db->query($sql,array($id,0));
		if($result->num_rows() >= 1){
            return $result;
        } else {
            return false;
        }
		}
	/////////////////////////////////////////////////////////////
	function show_result_report_emp($id){
		$sql='select  e.id,e.firstname,e.lastname,e.profile_pic,e.company_id,e.department_id,
		             e.sub_dept_id,e.online,r.report_id,r.result,r.to_id,r.forward_emp_id,r.date_result,r.id as result_id
					 
              from employees e 
			  join report_results r on e.id=r.lawer_id and forward_emp_id=? and r.archive =? order by r.date_result DESC';
			  $result = $this->db->query($sql,array($id,0));
		if($result->num_rows() >= 1){
            return $result;
        } else {
            return false;
        }
		}
	/////////////////////////////////////////////////////////////
	function count_result_report_emp($id){
		$sql='select  e.id,e.firstname,e.lastname,e.profile_pic,e.company_id,e.department_id,
		             e.sub_dept_id,e.online,r.report_id,r.result,r.to_id,r.forward_emp_id,r.date_result,r.id as result_id
					 
              from employees e 
			  join report_results r on e.id=r.lawer_id and forward_emp_id=? and r.archive =? and r.seen=? order by r.date_result DESC ';
			  $result = $this->db->query($sql,array($id,0,0));
		if($result->num_rows() >= 1){
            return $result;
        } else {
            return false;
        }
		}				
	/////////////////////////////////////////////////////////////	
		function result_report_details($id){
			 $data = array(
               'seen' => 1,
            );

			$this->db->where('id', $id);
			$this->db->update('report_results', $data); 
			
		$sql='select  e.id,e.firstname,e.lastname,e.profile_pic,e.company_id,e.department_id,
		             e.sub_dept_id,e.online,r.report_id,r.result,r.to_id,r.forward_emp_id,r.date_result,r.id as result_id
					 
              from employees e 
			  join report_results r on e.id=r.lawer_id and r.id=? and r.archive =?';
			  $result = $this->db->query($sql,array($id,0));
		if($result->num_rows() >= 1){
            return $result;
        } else {
            return false;
        }
		}
	////////////////////////////////////////////////////////////////////
	function forward_result_report_mang($result_id,$for_id){
		 $data = array(
               'forward_sub_id' => $for_id,
            );

			$this->db->where('id', $result_id);
			$this->db->update('report_results', $data); 

		 if($this->db->affected_rows()==1){
			 return true;
			 }else{
				 return false;
				 }
		}
		////////////////////////////////////////////////////////////////////
	function forward_result_report_sub($result_id,$for_id){
		 $data = array(
               'forward_emp_id' => $for_id,
            );

			$this->db->where('id', $result_id);
			$this->db->update('report_results', $data); 

		 if($this->db->affected_rows()==1){
			 return true;
			 }else{
				 return false;
				 }
		}
		////////////////////////////////////////////////////////////////////
	function ajax_insert_archive_result($result_id){
		 $data = array(
               'archive' => 1,
            );

			$this->db->where('id', $result_id);
			$this->db->update('report_results', $data); 

		 if($this->db->affected_rows()==1){
			 return true;
			 }else{
				 return false;
				 }
		}
		/////////////////////////////////////////////////////
		function discount_salary($report_id,$days){
			$sql='select e.id,e.firstname,e.lastname,e.profile_pic,e.company_id,e.department_id,e.sub_dept_id,e.online,r.sender_id,r.the_reason,r.report_date,r.id as report_id,r.to_id,e.salary
              from employees e 
			  join report_employee r on e.id=r.emp_id and r.id=?';
			  
	    $result=$this->db->query($sql,$report_id);
		if($result->num_rows() == 1){
	       $emp_id=$salary=$result->row(0)->id;
           $salary=$result->row(0)->salary;
		   
		   
		   $dolor_per_day=$salary/30;
		   $discount_amount=$dolor_per_day*$days;
		  
		   $data = array(
               'discounts' => $discount_amount,
            );

			$this->db->where('id', $emp_id);
			$this->db->update('employees', $data); 

		 if($this->db->affected_rows()==1){
			 return true;
			 }else{
				 return false;
				 }
		   
			
        } else {
            return false;
        } 
			}
	//////////////////////////////////////////////////
	function employees_sallary($company_id){
		$sql='select id,firstname,lastname,profile_pic,company_id,department_id,sub_dept_id
              from employees where company_id=?';
			    $result = $this->db->query($sql,array($company_id));
		if($result->num_rows() >= 1){
            return $result;
        } else {
            return false;
        }
		
		}
	////////////////////////////////////////////////////
	function ajax_get_salary($emp_id){
		$sql='select salary,discounts
              from employees where id=?';
			    $result = $this->db->query($sql,array($emp_id));
		if($result->num_rows() == 1){
            return $result;
        } else {
            return false;
        }
		}	
	////////////////////////////////////////////////////////
	function ajax_insert_salary($emp_id,$salary){
		 $data = array(
               'salary' => $salary,
            );

			$this->db->where('id', $emp_id);
			$this->db->update('employees', $data); 

		 if($this->db->affected_rows()==1){
			 return true;
			 }else{
				 return false;
				 }
		}	
	/////////////////////////////////////////////////////////
	function job_applies($comp_id){
		$sql='select j.id,j.name,j.company_id,j.description,j.department,j.level,a.user_id,a.job_id,a.id as apply_id
              from jops j
			  join apply_job a on j.id=a.job_id and j.company_id=? and reject=?';
		$result = $this->db->query($sql,array($comp_id,0));
		if($result->num_rows() >= 1){
            return $result;
        } else {
            return false;
        }	  
		}
	/////////////////////////////////////////////////////
	function count_job_applies($comp_id){
		$sql='select j.id,j.name,j.company_id,j.description,j.department,j.level,a.user_id,a.job_id,a.id as apply_id
              from jops j
			  join apply_job a on j.id=a.job_id and j.company_id=? and reject=? and a.emp_seen=0';
		$result = $this->db->query($sql,array($comp_id,0));
		if($result->num_rows() >= 1){
            return $result;
        } else {
            return false;
        }	  
		}
	/////////////////////////////////////////////////////////
	function job_applies_one($job_id){
		$sql='select j.id,j.name,j.company_id,j.description,j.department,j.level,a.user_id,a.job_id,j.`date`,a.id as apply_id,a.accept,a.reject
              from jops j
			  join apply_job a on j.id=a.job_id and j.id=? and reject=?';
		$result = $this->db->query($sql,array($job_id,0));
		if($result->num_rows() == 1){
            return $result;
        } else {
            return false;
        }	  
		}		
	////////////////////////////////////////////////////////
	function ajax_reject_user($apply_id,$job_id,$job_name,$user_id){
		$data = array(
               'reject' => 1,
			   'accept' => 0,
            );
		$this->db->where('id', $apply_id);
		$this->db->update('apply_job',$data); 
		

		 if($this->db->affected_rows()==1){
			 $link='company/job/'.$job_id;
			$data = array(
            'user_id' => $user_id,
            'title' => 'You has been rejected in this job " '.$job_name.' "',
			'link'=>$link
            );
			$query = $this->db->insert('user_activity', $data);
			 return true;
			 }else{
				 return false;
				 }
		}	
	////////////////////////////////////////////////////////
	function select_event_attends($comp_id){
				$sql='SELECT
                            e.id as user_id ,e.name,e.pic,v.name as event_name,v.id as event_id,v.details,v.pic as event_pic,v.`date` as event_date,
							v.company_id ,t.id as attend_id,e.address

							  FROM
							users e
							LEFT JOIN
							
							attend t
							ON t.user_id = e.id
							LEFT JOIN

							events v
							ON t.event_id = v.id


							where v.company_id=? and t.reject=0 and t.accept=0
							';
							
							$result = $this->db->query($sql,array($comp_id));
							if($result->num_rows() >= 1){
							return $result;
							} else {
							return false;
							}

							}	
/////////////////////////////////////////////////////////////					
			
	function select_event_details($comp_id,$event_id,$user_id){
				$sql='SELECT
                            e.id as user_id ,e.name,e.pic,v.name as event_name,e.about,v.id as event_id,v.details,v.pic as event_pic,v.`date` as event_date,
							v.company_id ,t.id as attend_id,e.address

							  FROM
							users e
							LEFT JOIN
							
							attend t
							ON t.user_id = e.id
							LEFT JOIN

							events v
							ON t.event_id = v.id


							where v.company_id=?  and t.event_id=? and t.user_id=?
							';
							
							$result = $this->db->query($sql,array($comp_id,$event_id,$user_id));
							if($result->num_rows() >= 1){
							return $result;
							} else {
							return false;
							}
							}
							
////////////////////////////////////////////////////////////
function select_user_activity($user_id){
	$this->db->where(array('user_id'=>$user_id,'seen'=>'0'));
	$this->db->order_by("id", "desc"); 
			 $result = $this->db->get('user_activity',9);
			 
			 if($result->num_rows() > 0){
	              return $result->result();
				 } else {
					 
					 return false ;
					 }
	}							
/////////////////////////////////////////////////////////////////////////

function add_chat_message_with_user($from_id , $to_id, $chat_message_content,$job_id){
	$data = array(
            'from' => $from_id,
            'to' => $to_id,
            'message' => $chat_message_content,
			'job_id' => $job_id,
			
            );
        $query = $this->db->insert('employee_user_chat', $data);
        if($this->db->affected_rows()==1){
			 $link='employee/job_interview/'.$job_id.'/'.$to_id;
			$data = array(
            'user_id' => $to_id,
            'title' => 'You have a message about applied for a job"'.substr_replace($chat_message_content,0,30).' "',
			'link'=>$link
            );
			$query = $this->db->insert('user_activity', $data);
			return true;
			}else{
				return false;
				}	
	}

////////////////////////////////////////////////////////////////////////
function get_chat_messages_user($user_id,$job_id){
	$sql='
			  SELECT
					e.id ,e.firstname,e.lastname,e.profile_pic, a.user_id,a.job_id,m.id,m.`from`,m.`to`,m.message,m.message_date,m.to_seen
					
		             FROM
					employees e
					LEFT JOIN
					
					employee_user_chat m 
					ON m.`from` = e.id
					LEFT JOIN

					apply_job a
					ON  m.`to`=a.user_id 


					where a.job_id=? and a.user_id=? and m.job_id=?
			  ';
		$result = $this->db->query($sql,array($job_id,$user_id,$job_id));
		if($result->num_rows() >= 1){
            return $result;
        } else {
            return false;
        }	
						
	}

///////////////////////////////////////////////////////////////////////////	

function add_chat_message_with_user_emp($user_id , $company_id, $chat_message_content){
		$data = array(
            'from_u' => $user_id,
            'to_c' => $company_id,
            'message' => $chat_message_content,
			
            );
        $query = $this->db->insert('user_messages', $data);
        if($this->db->affected_rows()==1){
			 
			return true;
			}else{
				return false;
				}
	
	}
///////////////////////////////////////////////////////////////////////

	  function select_message_comp($comp_id){
		  	$this->db->where('to_c',$comp_id);
			 $result = $this->db->get('user_messages');
			 	if($result->num_rows() >= 1){
                return $result;
			} else {
				return false;
			}	
			
		  }
////////////////////////////////////////////////////////////////////////

      function select_message_customer($comp_id){
		  	$sql='SELECT u.id as user_id ,u.name,u.pic,u.username,m.id as mesg_id ,m.from_u,m.message,m.date_m,m.to_c
			from users u
			join user_messages m on u.id=m.from_u where to_c=? order by m.date_m DESC
			';
			$result = $this->db->query($sql,array($comp_id));
				if($result->num_rows() >= 1){
                return $result;
			} else {
				return false;
			}	
		  }
////////////////////////////////////////////////////////////////////////

      function select_message_customer_details($comp_id){
		  	$sql='SELECT u.id as user_id ,u.name,u.pic,u.username,m.id as mesg_id ,m.from_u,m.message,m.date_m,m.to_c
			from users u
			join user_messages m on u.id=m.from_u where m.id=?
			';
			$result = $this->db->query($sql,array($comp_id));
				if($result->num_rows() == 1){
                return $result;
			} else {
				return false;
			}	
		  }		  
//////////////////////////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////////////////////////	

function comp_message_to_user($user_id , $company_id, $chat_message_content){
		$data = array(
            'from_c' => $company_id,
            'to_u' => $user_id,
            'message' => $chat_message_content,
			
            );
        $query = $this->db->insert('user_messages', $data);
        if($this->db->affected_rows()==1){
			return true;
			
			
			// $link='employee/comp_messages/'.$message_id;
			//$data = array(
            //'user_id' => $user_id,
            //'title' => 'There is a new message for you  " '.substr($chat_message_content,0,20).'',
			//'link'=>$link
            //);
			//$query = $this->db->insert('user_activity', $data);
			
			
			}else{
				return false;
				}
	
	}	
	/////////////////////////////////////////////////////////////
	
	function comp_mesg($user_id){
			$sql='SELECT c.id,c.name,c.logo,
			       m.id as mesg_id ,m.from_u,m.message,m.date_m,m.to_c
			from company c
			join user_messages m on m.from_c=c.id where m.to_u=? order by m.date_m DESC
			';
			$result = $this->db->query($sql,array($user_id));
				if($result->num_rows() >= 1){
                return $result;
			} else {
				return false;
			}	
		}
	///////////////////////////////////////////////////////////////////
			  		  
     	
	function comp_mesg_details($mesg_id){
			$sql='SELECT c.id,c.name,c.logo,
			       m.id as mesg_id ,m.from_u,m.message,m.date_m,m.to_c
			from company c
			join user_messages m on m.from_c=c.id where m.id=? order by m.date_m DESC
			';
			$result = $this->db->query($sql,array($mesg_id));
				if($result->num_rows() >= 1){
                return $result;
			} else {
				return false;
			}	
		}
		
}?>