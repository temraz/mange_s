<?php

class Model_employee extends CI_Model {
   //////////////////////////////////////////////
    
      public function check_can_log_in($email, $password){
       
	      $query = "select id ,company_id,email,firstname,lastname from employees where email=? and password=? and confirm=1";
      $result=$this->db->query($query,array($email,$password));
       if ( $result) {
          $result=array('id'=>$result->row(0)->id, 'email'=>$result->row(0)->email);
	   return  $result; 
        } else {
            return false;
        }
        
    }
    ////////////////////////////////////////

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
       if ( $result) {
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
            if ($pic_name != 'default_pic.jpg') {

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

    ///////////////////////////////////////////
				
}
?>