<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Site extends CI_Controller {
	
	public function index()
	{  
               if($this->session->userdata('user_logged_in')){            ///////////////////////////else if he is a normal user
				   
                 
				 $id=$this->session->userdata('user_id');
				 $this->load->model('model_users');
				 if($this->model_users->select_user($id)){
					
				 
                redirect('user/profile/'.$id);	 
					 }else{
				       $data['hide']=1;
                       $this->load->view('index',$data);		 
						 }
				
            }elseif($this->session->userdata('employee_logged_in')){        ///////////////////////////else if he is employee
				 $id=$this->session->userdata('emp_id');
				 $this->load->model('model_users');
				 if($this->model_users->select_emp($id)){
					
				 
                redirect('employee/dashboard/'.$id);	 
					 }else{
				       $data['hide']=1;
                       $this->load->view('index',$data);		 
						 }
					
			}elseif($this->session->userdata('company_logged_in')){          ///////////////////////////else if it is a company
				 $id=$this->session->userdata('comp_id');
				 $this->load->model('model_users');
				 if($this->model_users->select_company($id)){
			    
				 
                redirect('company/profile/'.$id);	 
					 }else{
				       $data['hide']=1;
                       $this->load->view('index',$data);		 
						 }
				
				} else {
				
                $this->load->view('index');

            }
				
				
				
	  
	}
       /////////////////////////////
	   function index_user(){
		   
		   if($this->session->userdata('user_logged_in')){
				   
                 
				 $id=$this->session->userdata('user_id');
				 $this->load->model('model_users');
				 if($this->model_users->select_user($id)){
					 $id=$this->model_users->select_user($id)->row(0)->id;
				 
                redirect('user/profile/'.$id);	 
					 }else{
				       
                       $this->load->view('index');		 
						 }
				
            } else {
				
                $this->load->view('index');

            }
			
		   }
	  //////////////////////////////
	   function index_employee(){
		    if($this->session->userdata('user_logged_in')){
                 $id=$this->session->userdata('emp_id');
				 $this->load->model('model_users');
				 if($this->model_users->select_emp($id)){
					 $id=$this->model_users->select_emp($id)->row(0)->id;
				 
                redirect('employee/dashboard/'.$id);	 
					 }else{
				       $data['hide']=1;
                       $this->load->view('index',$data);		 
						 }
            } else {
                $this->load->view('index_employee');
            }
		   }
       /////////////////////////////// 

	   function index_company(){
		    if($this->session->userdata('company_logged_in')){
                $id=$this->session->userdata('comp_id');
				 $this->load->model('model_users');
				 if($this->model_users->select_company($id)){
					 $id=$this->model_users->select_company($id)->row(0)->id;
				 
                redirect('company/profile/'.$id);	 
					 }else{
				       $data['hide']=1;
                       $this->load->view('index',$data);		 
						 }
            } else {
                $this->load->view('index_company');
            }
		   }

        
        //////////////////////////////
        
     public function emp_sign_up()
	{
		 $query = $this->db->get('company');
			 
			 if($query->num_rows() > 0){
				 $data['companies']=$query->result();
				$this->load->view('emp_sign_up',$data);
				 } else {
					 
					 return false ;
					 }
		
	}
        
        //////////////////////////////
        public function company_check()
	{
        $email = $this->session->userdata('user_email');
        $this->load->model('model_employee');
        $user = $this->model_employee->check_company($email);
        echo $user['company_id'];
	}
	        ///////////////////////////////   company login /////////////////////////////////////////////////////////
        
        public function login_company_validation(){
            $this->load->library('form_validation');
          
            $this->form_validation->set_rules('email','Email','required|trim|xss_clean|callback_validate_credentials_comp');
	    $this->form_validation->set_rules('password','Password','required|md5|xss_clean|trim');
            
            if($this->form_validation->run() == FALSE){
                 		$data['login']="hi";
                $this->load->view('index_company',$data);
                
            }else{
		
                 $this->load->model('model_employee');
                  $email= $this->input->post('email');
                      $password= $this->input->post('password');
                 if($this->model_employee->check_comp_can_log_in($email,$password)){
                      $email= $this->input->post('email');
                      $password= $this->input->post('password');
                      $comp=$this->model_employee->check_comp_can_log_in($email,$password);
                    
                $login_data = array("company_logged_in" => true, "comp_id" => $comp['id'], "comp_email"=> $comp['email']);
                $this->session->set_userdata($login_data);
				$id=$comp['id'];
                redirect('company/profile/'.$id);
               
                }  else{
                    
                    redirect('site/load_404');
                }
            }
            
        }
        
        /////////////////////////////////
        
        public function validate_credentials_comp(){
            $this->load->model('model_employee');
	
	if($this->model_employee->can_log_in_comp()){
		return true;
	} else {
		$this->form_validation->set_message('validate_credentials_comp', 'Incrorrect
						                     username/password.');
		return false;
	}

        }
        
	        ///////////////////////////////  end company login /////////////////////////////////////////////////////////
        ///////////////////////////////
        
        public function emp_validation(){
            $this->load->library('form_validation');
          
            $this->form_validation->set_rules('email','Email','required|trim|xss_clean|callback_validate_credentials_emp');
	    $this->form_validation->set_rules('password','Password','required|md5|xss_clean|trim');
            
            if($this->form_validation->run() == FALSE){
                 		$data['login']="hi";
                $this->load->view('index_employee',$data);
                
            }else{
		
                 $this->load->model('model_employee');
                  $email= $this->input->post('email');
                      $password= $this->input->post('password');
                 if($this->model_employee->check_can_log_in($email,$password)){
                      $email= $this->input->post('email');
                      $password= $this->input->post('password');
                      $emp=$this->model_employee->check_can_log_in($email,$password);
                $login_data = array("employee_logged_in" => true, "emp_id" => $emp['id'], "emp_email"=> $emp['email'],
				                     "company_id"=> $emp['company_id'],"department_id"=> $emp['department_id'],"username"=> $emp['username'],"sub_dept_id"=> $emp['sub_dept_id']);
                $this->session->set_userdata($login_data);
				$id=$emp['id'];
                redirect('employee/dashboard/'.$id);
               
                }  else{
                    
                    redirect('site/load_404');
                }
            }
            
        }
        
        /////////////////////////////////
        
        public function validate_credentials_emp(){
            $this->load->model('model_employee');
	
	if($this->model_employee->can_log_in()){
		return true;
	} else {
		$this->form_validation->set_message('validate_credentials_emp', 'Incrorrect
						    username/password.');
		return false;
	}

        }
        
        ////////////////////////////////////////////////////////////////
        
        public function login_validation(){
            $this->load->library('form_validation');
          
            $this->form_validation->set_rules('email','Email','required|trim|xss_clean|callback_validate_credentials');
	    $this->form_validation->set_rules('password','Password','required|md5|xss_clean|trim');
            
            if($this->form_validation->run() == FALSE){
                 		$data['login']=1;
                $this->load->view('index',$data);
                
            }else{
		
                 $this->load->model('model_users');
				 
                  $email= $this->input->post('email');
                  $password= $this->input->post('password');
				  
                 if($this->model_users->check_can_log_in($email,$password)){
                      $email= $this->input->post('email');
                      $password= $this->input->post('password');
                      $user=$this->model_users->check_can_log_in($email,$password);
                $login_data = array("user_logged_in" => true, "user_id" => $user['id'], "user_email"=> $user['email'], "company_id"=> $user['company_id']);
                $this->session->set_userdata($login_data);
				$id=$user['id'];
				if($this->model_users->is_edit_cv($this->session->userdata('user_id'))){
                redirect('user/profile/'.$id);
				}else{
					redirect('user/cv_edit/');
					}
               ////////////////////////////////////////////////////////////////////////////////////////
                }elseif($this->model_employee->check_can_log_in($email,$password)){ // if employee
                     $email= $this->input->post('email');
                      $password= $this->input->post('password');
                      $emp=$this->model_employee->check_can_log_in($email,$password);
                $login_data = array("employee_logged_in" => true, "emp_id" => $emp['id'], "emp_email"=> $emp['email'],
				                     "company_id"=> $emp['company_id'],"department_id"=> $emp['department_id'],"username"=> $emp['username'],"sub_dept_id"=> $emp['sub_dept_id']);
                $this->session->set_userdata($login_data);
				$id=$emp['id'];
                redirect('employee/dashboard/'.$id);
               
               ////////////////////////////////////////////////////////////////////////////////////////
			                       
                }elseif($this->model_employee->check_comp_can_log_in($email,$password)){ // if company
					$email= $this->input->post('email');
                      $password= $this->input->post('password');
                      $comp=$this->model_employee->check_comp_can_log_in($email,$password);
                    
                $login_data = array("company_logged_in" => true, "comp_id" => $comp['id'], "comp_email"=> $comp['email']);
                $this->session->set_userdata($login_data);
				$id=$comp['id'];
                redirect('company/profile/'.$id);
               
					
               ////////////////////////////////////////////////////////////////////////////////////////					
					}else{
					redirect('site/load_404');	
						}
            }
            
        }
        
        ///////////////////////////////////////////////////////
        
        public function validate_credentials(){
            $this->load->model('model_users');
	
	if($this->model_users->can_log_in() || $this->model_employee->can_log_in_comp() || $this->model_employee->can_log_in() ){
		return true;
	} else {
		$this->form_validation->set_message('validate_credentials', 'Incrorrect
						                     username/password.');
		return false;
	}

        }
        
        ///////////////////////////////////
        
        public function signup_validation(){
                $this->load->library('form_validation');
                $this->form_validation->set_rules('username','Username','required|trim');
		        $this->form_validation->set_rules('email','Email','required|trim|valid_email|is_unique[users.email]');
                $this->form_validation->set_rules('password','Password','required|trim');
		        $this->form_validation->set_rules('cpassword','Confirm password','required|trim|matches[password]');
		        $this->form_validation->set_rules('country','Country','required|trim');
                $this->form_validation->set_rules('gender','Gender','required|trim');
                
		        $this->form_validation->set_message('is_unique', "ُُُEmail address already exists.");
                
                if($this->form_validation->run()){
                    $this->load->model('model_users');		
	if($this->model_users->add_temp_user()){
		$data['regist']='Please check your mail';
	        $this->load->view('index',$data);
	} else {
		echo "Problem add to database";
		return false;
	}
			
			
		} else {
			$data['not_regist']="please put your correct data";
			$this->load->view('index',$data);
		}
                }
                
        ///////////////////////////////////
		 public function employee_reg_validation_step2(){
                $this->load->library('form_validation');
                $this->form_validation->set_rules('dept','department','required|trim');
		        $this->form_validation->set_rules('sub_dept','Sub department','required|trim');
              
                
                if($this->form_validation->run()){
                  
				    $this->load->model('model_users'); 		
	            if($this->model_users->add_temp_emplyee()){
		$data['regist']='Your sign up finished successfully thank you and you have to wait until your company confirm you as an employee in it !';
		
		
		$this->load->view('emp_sign_up_step2',$data);
		
	       
            	} else {
		       echo "Sorry there are an error right now";
	        	return false;
	           }
	
		} else {
			  $this->load->model('model_users'); 
			$data['not_regist']="please put your correct data";
			$company_id=$this->input->post('company');
			
		 if($this->model_users->select_emp_dept($company_id)){
			 $data['regist']='Step 1 finished successfully !';
		
		      $data['company_id']=$this->input->post('company');
		
			  $data['depts']=$this->model_users->select_emp_dept($company_id)->result();
			  
			  $data['firstname']=$this->input->post('firstname');
			  $data['lastname']=$this->input->post('lastname');
			  $data['email']=$this->input->post('email');
			  $data['username']=$this->input->post('username');
			  $data['company']=$this->input->post('company');
			  $data['password']=$this->input->post('password');
			  $data['gender']=$this->input->post('gender');
			  $data['country']=$this->input->post('country');
			  $data['mobile']=$this->input->post('mobile');
			  $data['phone']=$this->input->post('phone');
			  $data['address']=$this->input->post('address');
			  $data['about']=$this->input->post('about');
			  
			  
			  $this->load->view('emp_sign_up_step2',$data);
			 }else{
				 $data['regist']='You must complete the first step first ';
				$this->load->view('emp_sign_up_step2',$data);
				 }
			
			
		}
		
                }
		////////////////////////////////////
                
        public function employee_reg_validation(){
                $this->load->library('form_validation');
                $this->form_validation->set_rules('firstname','Firstname','required|trim|max_length[25]|xss_clean');
                $this->form_validation->set_rules('lastname','Lastname','required|trim|max_length[25]|xss_clean');
		        $this->form_validation->set_rules('email','Email','required|trim|valid_email|max_length[100]|xss_clean|is_unique[company.email]|is_unique[users.email]|is_unique[employees.email]');
                $this->form_validation->set_rules('username','Username','required|trim|max_length[25]|xss_clean|is_unique[employees.username]');
                $this->form_validation->set_rules('password','Password','required|trim|max_length[200]|xss_clean');
		        $this->form_validation->set_rules('cpassword','Confirm password','required|trim|matches[password]|max_length[200]|xss_clean');
                $this->form_validation->set_rules('gender','Gender','required|trim');
               
               
				  $this->form_validation->set_rules('company','Company','required|trim');
               
               
               
               
                
               
                
		        $this->form_validation->set_message('is_unique', "That email address already exists.");
                
                if($this->form_validation->run()){
				
				    $this->load->model('model_users'); 		
	            if($this->model_users->add_temp_emplyee()){
		$data['regist']='Your sign up finished successfully thank you and you have to wait until your company confirm you as an employee in it !';
		
		
		$this->load->view('emp_sign_up',$data);	
				
			 }else{
				 $data['regist']='You must complete the first step first ';
				$this->load->view('emp_sign_up',$data); 
				 }
			
		} else {
			 $query = $this->db->get('company');
			 
			 if($query->num_rows() > 0){
				 $data['companies']=$query->result();
				$this->load->view('emp_sign_up',$data);
				 } else {
					 
					 return false ;
					 }
			
		}
                }
                
        ///////////////////////////////////
        
        public function company_validation(){
                $this->load->library('form_validation');
                $this->form_validation->set_rules('name','Name','required|trim|is_unique[company.name]');
               
		        $this->form_validation->set_rules('email','Email','required|trim|valid_email|is_unique[company.email]|is_unique[users.email]|is_unique[employees.email|xss_clean');
				
				$this->form_validation->set_rules('password','Password','required|trim|max_length[200]|xss_clean');
		        $this->form_validation->set_rules('cpassword','Confirm password','required|trim|matches[password]|max_length[200]|xss_clean');
                
                $this->form_validation->set_rules('country','Country','required|trim');
                
                
                $this->form_validation->set_rules('address','Address','required|trim');
                $this->form_validation->set_rules('location','Current_location','required|trim');

                
                
		       $this->form_validation->set_message('is_unique', "That email address already exists.");
                
                if($this->form_validation->run()){
                    $this->load->model('model_users');		
	if($this->model_users->add_temp_company()){
		$data['regist']='successfully registration thank you.';
	        $this->load->view('company_regist',$data);
	} else {
		echo "Problem add to database";
		return false;
	}
			
			
		} else {
			$data['not_regist']="please put your correct data";
			$this->load->view('company_regist',$data);
		}
                }
                
        ////////////////////////////////
        public function company_sign_up()
	    {
		$this->load->view('company_regist');
	     }
        ////////////////////////////////
        function logout() {
        if ($this->session->userdata('employee_logged_in')) {
			$emp_id=$this->session->userdata('emp_id');
			$this->model_employee->update_offline($emp_id);
			$this->session->sess_destroy();
            $this->index();
			}
        $this->session->sess_destroy();
       $this->index();
    }
    
        ///////////////////////
    ///////////////////////////////////////////////////////////////////////////////////// validate agent
			public function sign_user_validation(){
			$this->load->library('form_validation');
			$this->form_validation->set_rules('username', 'Username', 'required|max_length[40]|trim|xss_clean');
			$this->form_validation->set_rules('address', 'Address', 'required|max_length[50]|trim|xss_clean');
			$this->form_validation->set_rules('email', 'Email', 'required|trim|xss_clean|valid_email|max_length[100]|is_unique[user_temp.email]|is_unique[company.email]|is_unique[users.email]|is_unique[employees.email]');
			$this->form_validation->set_rules('password' , 'Password' ,'required|md5|max_length[50]|trim');
			$this->form_validation->set_message('is_unique',"That email address is already exists ");
			$this->form_validation->set_rules('c_password' , 'Confirm Password' ,'required|matches[password]|md5|max_length[50]|trim');
			$this->form_validation->set_rules('who' , 'I am' ,'required');

			
			
			
			if($this->form_validation->run()){
				//generate a rundom key
			$key=md5(uniqid());
			//$this->load->library('email', array('mailtype'=>'html'));
			//$this->email->from('me@website.com',"temraz");
			//$this->email->to($this->input->post('email'));
			//$this->email->subject("confirm your account.");
			//$message="<p> Thank you for your registration </p>";
			//$message.="<p><a href='".base_url()."main/register_user/$key' >Click here</a>to confirm your account</p>";
			//$this->email->message($message);
			//if($this->email->send()){
			//	echo " The email has been sent!";
			//	}else{
			//		echo "Could not send the email.";
			//		}
			
			//send email to the user			
			//add them ti the temp_users db
			$this->load->model('site_model');
			if($this->site_model->add_temp_agent($key)){
				$data['type']='agent';
				$data['key']=$key;
				$this->load->view("activation",$data);
			
				}
				
				
				}else{
					$this->load->view('view_sign_agent');
					}
			
						}		
	public function buttons()
	{
		$this->load->view('buttons');
	}
	////////////////////////////////
	public function error404()
	{
		$this->load->view('404');
	}
	////////////////////////////////
	public function activities()
	{
		$this->load->view('activities');
	}
	////////////////////////////////
	public function calendar()
	{
		$this->load->view('calendar');
	}
	////////////////////////////////
	public function charts()
	{
		$this->load->view('charts');
	}
	////////////////////////////////
	public function chat()
	{
		$this->load->view('chat');
	}
	////////////////////////////////
	public function dashboard()
	{
		$this->load->view('dashboard');
	}
	////////////////////////////////
	public function edit_photo()
	{
		$this->load->view('edit_photo');
	}
	////////////////////////////////
	public function editor()
	{
		$this->load->view('editor');
	}
	////////////////////////////////
	public function elements()
	{
		$this->load->view('elements');
	}
	////////////////////////////////
	public function form()
	{
		$this->load->view('form');
	}
	////////////////////////////////
	public function grid()
	{
		$this->load->view('grid');
	}
	////////////////////////////////
	public function media()
	{
		$this->load->view('media');
	}
	////////////////////////////////
	public function messages()
	{
		$this->load->view('messages');
	}
	////////////////////////////////
	public function tabledata()
	{
		$this->load->view('tabledata');
	}
	////////////////////////////////
	public function tables()
	{
		$this->load->view('tables');
	}
	////////////////////////////////
	public function widgets()
	{
		$this->load->view('widgets');
	}
	////////////////////////////////
	public function wizard()
	{
		$this->load->view('wizard');
	}
	
	////////////////////////////////
	public function user()
	{
		$this->load->view('user_regist');
	}
	////////////////////////////////
	public function employee()
	{
		$this->load->view('emp_regist');
	}
	////////////////////////////////
	public function job()
	{
		$this->load->view('jobs');
	}
	///////////////////////////////
	function meetings(){
		$this->load->view('meetings');
		}
		///////////////////////////////
	function company_tree(){
		$this->load->view('company');
		}
	
	
	
	
	
	
	
	
	
}
