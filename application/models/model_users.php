<?php

class Model_users extends CI_Model {
   //////////////////////////////////////////////
    
    public function can_log_in(){
        $emaiil=  $this->input->post('email');
        $password= md5($this->input->post('password'));
        
      // $emaiil= $this->db->where('email', $this->input->post('email'));
      // $password= $this->db->where('password', md5($this->input->post('password')));
        
        $query = "select id from users where email=? and password=?";
        $result=$this->db->query($query,array($emaiil,$password));
        
        if($result->num_rows() == 1){
            return true;
        } else {
            return false;
        }
        
    }

    ///////////////////////////
    public function check_can_log_in($email, $password){
       
        $query = "select id ,email from users where email=? and password=?";
      $result=$this->db->query($query,array($email,$password));
       if ( $result) {
          $result=array('id'=>$result->row(0)->id, 'email'=>$result->row(0)->email);
	   return  $result; 
        } else {
            return false;
        }
       
        
    }
   
    /////////////////////////////////////////////
    
    public function add_temp_user(){

        $data = array(
            'username' => $this->input->post('username'),
            'gender' => $this->input->post('gender'),
            'country' => $this->input->post('country'),
            'email' => $this->input->post('email'),
            'password' => md5($this->input->post('password'))
        );
        $query = $this->db->insert('users', $data);
        if($query){
            return true;
        } else {
            return false;
        }
    }
    
     ////////////////////////////////////////////////
    
    public function add_temp_emplyee(){
         $phonenum = $this->input->post('mobile') . $this->input->post('phone') ;
        $data = array(
            'firstname' => $this->input->post('firstname'),
            'lastname' => $this->input->post('lastname'),
			'username' => $this->input->post('username'),
            'gender' => $this->input->post('gender'),
            'email' => $this->input->post('email'),
            'password' => md5($this->input->post('password')),
           
            'phone' => $phonenum,
            'company_id' => $this->input->post('company'),
			
            'address' => $this->input->post('address'),
            'location' => $this->input->post('location'),
            'country' => $this->input->post('country'),
            'birthday' => $this->input->post('birthday'),
            'about' => $this->input->post('about'),
            
        );
        $query = $this->db->insert('employees', $data);
        if($query){
            return true;
        } else {
            return false;
        }
    }
    
    ///////////////////////////////////////////////
    
    public function add_temp_company(){
        $phonenum = $this->input->post('mobile') . $this->input->post('phone') ;
        $data = array(
            'name' => $this->input->post('name'),
            'field' => $this->input->post('field'),
            'email' => $this->input->post('email'),
            'phone' => $phonenum,
           
			'password' => md5($this->input->post('password')),
            'address' => $this->input->post('address'),
            'location' => $this->input->post('location'),
            'country' => $this->input->post('country'),
            
        );
        $query = $this->db->insert('company', $data);
        if($query){
            return true;
        } else {
            return false;
        }
    }
	////////////////////////////////////////////////
	function select_user($id){
		$sql='select id,email from users where id=?';
		 $result=$this->db->query($sql,$id);
		 if($result->num_rows() == 1){
			 return $result;
			 }else{
				 return false;
				 }
		}
     ////////////////////////////////////////////////
	
	////////////////////////////////////////////////
	function select_emp($id){
		$sql='select id,email,firstname,lastname,company_id,department_id,sub_dept_id,phone,address,location,country,about,profile_pic from employees where id=?';
		 $result=$this->db->query($sql,$id);
		 if($result->num_rows() == 1){
			 return $result;
			 }else{
				 return false;
				 }
		}	
		////////////////////////////////////////////////
		
	function select_all_emp($company_id){
		$sql='select id,username from employees where company_id='.$company_id.'';
		 $result=$this->db->query($sql);
		 if($result->num_rows() >= 1){
			 return $result;
			 }else{
				 return false;
				 }
		}	
			////////////////////////////////////////////////
		
	function all_emp($company_id){
		$sql='select id,username from employees where company_id='.$company_id.'';
		 $result=$this->db->query($sql);
		 if($result->num_rows() >= 1){
			 return $result->result();
			 }else{
				 return false;
				 }
		}	
		////////////////////////////////////////////////
		
	function select_unconfirm_emp($id){
		$sql='select id,username,firstname,lastname,code from employees where confirm=0 and company_id=? order by id DESC';
		 $result=$this->db->query($sql,$id);
		 if($result->num_rows() >= 0){
			 return $result;
			 }else{
				 return false;
				 }
		}	
		////////////////////////////////////////////////
		
	function select_confirm_emp($id){
		$sql='select id,username,firstname,lastname,code,department_id,company_id,sub_dept_id from employees where confirm=1 and company_id=? order by id DESC';
		 $result=$this->db->query($sql,$id);
		 if($result->num_rows() >= 0){
			 return $result;
			 }else{
				 return false;
				 }
		}
		////////////////////////////////////////////////
		
	function select_company($id){
		$sql='select * from company where id=?';
		 $result=$this->db->query($sql,$id);
		 if($result->num_rows() == 1){
			 return $result->result();
			 }else{
				 return false;
				 }
		}	
		///////////////////////////////////////////////////
		function select_emp_dept($id){
	$this->db->where('company_id',$id);
	$result = $this->db->get('department');
	  if($result){
		  
				 return $result;
			}else{
				return false;
				}
			
			}
		////////////////////////////////////////////////

		function select_sub_dept($comp_id,$dept){
			$sql='select * from sub_department where company_id=? and department_id=?';
		 $result=$this->db->query($sql,array($comp_id,$dept));
				if($result->num_rows() > 0){
				return $result;
				}else{
				return false;
				}
				
			}	
		///////////////////////////////////////////////////
		function update_employee(){
			$dept=$this->input->post('dept');
			$id=$this->input->post('emp_id');
			
			 $data = array(
               'confirm' => 1,
               'department_id' => $dept
               
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
	function update_sub_dept(){
		$sub_dept=$this->input->post('sub_dept');
			$id=$this->input->post('emp_id');
			
			 $data = array(
                   'sub_dept_id' => $sub_dept
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
	public function is_follow($company_id , $user_id){
		$sql='select * from follow where company_id='.$company_id.' and user_id='.$user_id.'';
		 $result=$this->db->query($sql);
		 if($result->num_rows() == 1){
			 return true;
			 }else{
				 return false;
				 }
		}
	/////////////////////////////////////////
	public function get_user_info($id){
	 $this->db->where('id',$id);
			 $query= $this->db->get('users');
				 return $query->result();
	  }	
	  
	  //////////////////////////
	  public function get_following($id){
	 $this->db->where('user_id',$id);
			 $query= $this->db->get('follow');
				 return $query->result();
	  }	
	  /////////////////////////////////////////
	public function get_cv($id){
	 $this->db->where('user_id',$id);
			 $query= $this->db->get('cv');
				 return $query->result();
	  }	
	  /////////////////////////////////////////
	public function get_cv_edu($id){
	 $this->db->where('user_id',$id);
			 $query= $this->db->get('cv_edu');
				 return $query->result();
	  }	
	  /////////////////////////////////////////
	public function get_cv_exper($id){
	 $this->db->where('user_id',$id);
			 $query= $this->db->get('cv_exper');
				 return $query->result();
	  }	
	  /////////////////////////////////////////
	public function get_cv_skills($id){
	 $this->db->where('user_id',$id);
			 $query= $this->db->get('cv_skills');
				 return $query->result();
	  }	
	  
	 ///////////////////////////////////////////////	
	public function in_my_card($user_id , $product_id){
		$sql='select * from card where user_id='.$user_id.' and product_id='.$product_id.'';
		 $result=$this->db->query($sql);
		 if($result->num_rows() == 1){
			 return true;
			 }else{
				 return false;
				 }
		} 
	  /////////////////////////////////////////
	public function mycard_items($id){
	 $this->db->where('user_id',$id);
			 $query= $this->db->get('card');
				 return $query->result();
	  }	
	 /////////////////////////////////
	 public function get_last_expr(){
	$query = "select * from cv_exper ORDER BY id  ";
					$result=$this->db->query($query);
				return $result->result();
	
	}
	////////////////////////////////
	public function get_exprs($id){
	 $this->db->where('user_id',$id);
			 $query= $this->db->get('cv_exper');
				 return $query->result();
	  }	
	   	
		////////////////////////////////
	public function get_skills($id){
	 $this->db->where('user_id',$id);
			 $query= $this->db->get('cv_skills');
				 return $query->result();
	  }	
	   /////////////////////////////////
	 public function get_last_skill(){
	$query = "select * from cv_skills ORDER BY id  ";
					$result=$this->db->query($query);
				return $result->result();
	
	}
	////////////////////////////////
	public function get_edu($id){
	 $this->db->where('user_id',$id);
			 $query= $this->db->get('cv_edu');
				 return $query->result();
	  }	
	   /////////////////////////////////
	    public function get_last_edu(){
	$query = "select * from cv_edu ORDER BY id  ";
					$result=$this->db->query($query);
				return $result->result();
	
	}
	////////////////////////////////
	public function is_edit_cv($user_id){
		$sql='select * from cv where user_id='.$user_id.'';
		 $result=$this->db->query($sql);
		 if($result->num_rows() == 1){
			 return true;
			 }else{
				 return false;
				 }
		} 
	  /////////////////////////////////////////
	   public function get_user_messages($user_id){
	$query = "select * from user_messages where to_m = ".$user_id." ORDER BY id desc ";
					$result=$this->db->query($query);
				return $result->result();
	
	}
	///////////////////////////////////////////////////
	function select_count_messages($user_id){
		$query = "select * from user_messages where to_m = ".$user_id." and seen=0 ORDER BY id desc ";
					$result=$this->db->query($query);
				return count($result->result());
	
		}		
		
	
	/////////////////////////////////////////////////////////////////////////////////////////////////////
	public function is_apply_job($user_id,$job_id){
		$sql='select * from apply_job where user_id='.$user_id.' and job_id='.$job_id.'';
		 $result=$this->db->query($sql);
		 if($result->num_rows() == 1){
			 return $result->result();
			 }else{
				 return false;
				 }
		} 
	
	///////////////////////////////////////////
	///////////////////////////////////////////////	
	public function is_applied($user_id,$job_id){
		$sql='select * from apply_job where user_id='.$user_id.' and job_id='.$job_id.'';
		 $result=$this->db->query($sql);
		 if($result->num_rows() == 1){
			 return true;
			 }else{
				 return false;
				 }
		}
	/////////////////////////////////////////
	public function get_job_applied($user_id){
		$sql='select * from apply_job where user_id='.$user_id.' ';
		 $result=$this->db->query($sql);
		 return $result->result();
		}
	///////////////////
	///////////////////////////////////////////////////
		function update_prof($id){
			
			 $data = array(
               'prof' => 1,
            );

			$this->db->where('id', $id);
			$result=$this->db->update('employees', $data); 

		 if($this->db->affected_rows()==1){
			 return true;
			 }else{
				 return false;
				 }
			}
	
}
?>