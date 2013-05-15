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
		$sql='select id,email,firstname,lastname,department_id,sub_dept_id,phone,address,location,country,about,profile_pic from employees where id=?';
		 $result=$this->db->query($sql,$id);
		 if($result->num_rows() == 1){
			 return $result;
			 }else{
				 return false;
				 }
		}	
		////////////////////////////////////////////////
		
	function select_all_emp(){
		$sql='select id,username from employees';
		 $result=$this->db->query($sql);
		 if($result->num_rows() >= 1){
			 return $result;
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
		$sql='select id,email,name from company where id=?';
		 $result=$this->db->query($sql,$id);
		 if($result->num_rows() == 1){
			 return $result;
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
}
?>