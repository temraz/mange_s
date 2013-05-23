<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {
    function index(){
        
        $this->profile();
        
    }
    ///////////////////
    function profile(){
        if($this->session->userdata('user_logged_in')){            ///////////////////////////else if he is a normal user
				if( $this->uri->segment(3) != ''){
				$id=$this->uri->segment(3);   
                 
				
				 $this->load->model('model_users');
				 if($this->model_users->select_user($id)){
					 $id=$this->model_users->select_user($id)->row(0)->id;
				     $data['id']=$id;
					 $data['user_data']=$this->model_users->get_user_info($id);
                    $this->load->view('user_profile',$data);
					 }else{
				      redirect('site/error404');	 
						 }
				}else{
					redirect('site/error404');
					}
		}else{
			 $data['hide']=1;
                       $this->load->view('index',$data);
			}
        
    }
	
	
	/////////////////////
	
	public function follow(){
		if($this->session->userdata('user_logged_in') && $this->uri->segment(3) && $this->uri->segment(4)){
			$user_id = $this->uri->segment(3);
			$company_id = $this->uri->segment(4);
			$data = array(
			'company_id' => $company_id,
			'user_id' => $user_id
			);
			if($this->db->insert('follow',$data)){
				redirect('company/profile/'.$company_id);
				}
			}else{
				redirect('site/error404');
				}
		}
		
		//////////////
		public function unfollow(){
		if($this->session->userdata('user_logged_in') && $this->uri->segment(3) && $this->uri->segment(4)){
			$user_id = $this->uri->segment(3);
			$company_id = $this->uri->segment(4);
			$data = array(
			'company_id' => $company_id,
			'user_id' => $user_id
			);
			if($this->db->delete('follow',$data)){
				redirect('company/profile/'.$company_id);
				}
			}else{
				redirect('site/error404');
				}
		}
		////////////////////
		public function edit(){
			if($this->session->userdata('user_logged_in')){
				
				$this->load->view('user_edit');
				
				}else{
				redirect('site/error404');
				}
			
			}
			////////////////////////
			public function updata_profile()
	{
		if($this->session->userdata('user_logged_in')){
			$flag['inserted']=0;
			$this->load->library('form_validation');
		 $this->form_validation->set_rules('about_user', ' About You ', 'required|trim|xss_clean');	
		 $this->form_validation->set_rules('address', ' Address ', 'required|trim|xss_clean');
		$this->form_validation->set_rules('full_name', ' Full Name ', 'required|trim|xss_clean');
			
			if ($this->form_validation->run() == false) {
				$this->load->view("user_edit");
				}else{
					$gallery_path = realpath(APPPATH . '../images/profile/');
        $config['upload_path'] = $gallery_path;
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp';
        $config['max_size'] = '20000';
        $this->load->library('upload', $config);
        if($this->upload->do_upload('logo')){
            $phot_data = $this->upload->data();
            $photo_name = $phot_data['file_name'];
		   } else {
            $error = array('error' => $this->upload->display_errors());
            $this->load->view('user_edit', $error);
	   }
	   $user_id=$this->session->userdata('user_id');
					$full_name= $this->input->post('full_name');
					$age= $this->input->post('age');
			$address = $this->input->post('address');
			$about_user = str_replace("\n","<br>",$this->input->post('about_user'));
			$data = array (
	   'about' => $about_user,
	   'address' => $address,
	   'age' => $age,
	   'pic'=>$photo_name,
	   'name'=>$full_name
	   );		
					if($this->db->update('users' , $data , "id = ".$user_id."")){
						 $flag['inserted']=1;
		  $this->load->view('user_edit' , $flag);
						 }
						
				}
		}else{
					redirect('site');
					}
	}

	
	///////////////////
	public function following(){
		if($this->session->userdata('user_logged_in')){
		$user_id=$this->session->userdata('user_id');
		 $this->load->model('model_users');
		 $this->load->model('model_company');
				 $data['following']=$this->model_users->get_following($user_id);
		 $this->load->view('user_following' , $data);
		}else{
					redirect('site');
					}
	}
	////////////////////
	public function news_feed(){
		if($this->session->userdata('user_logged_in')){
			$user_id=$this->session->userdata('user_id');
		 $this->load->model('model_users');
		 $this->load->model('model_company');
				 $data['following']=$this->model_users->get_following($user_id);
		 $this->load->view('user_news_feed' , $data);
		
		}else{
					redirect('site');
					}
		}	
	////////////////////////////
		public function cv_edit(){
			if($this->session->userdata('user_logged_in')){
			
			 $this->load->view('cv_edit');
			
			}else{
					redirect('site');
					}
			}
	///////////////////////////
		public function insert_cv(){
			$flag['inserted']=0;
			if($this->session->userdata('user_logged_in')){
				$this->load->library('form_validation');
                $this->form_validation->set_rules('email',' Email ','required|trim|xss_clean');
				$this->form_validation->set_rules('summary',' Summary ','required|trim|xss_clean');
				$this->form_validation->set_rules('accomplishments',' Accomplishments ','required|trim|xss_clean');
				
				$email=$this->input->post('email');
				$summary=$this->input->post('summary');
				$accomplishments=$this->input->post('accomplishments');
				$phone = $this->input->post('phone');
				$mobile = $this->input->post('mobile');
				
				for ($i=1 ; $i<=5 ; $i++ ) {
					if($this->input->post('school'.$i) !=''){
				$this->form_validation->set_rules('school'.$i,' School'.$i,'required|trim|xss_clean');
				$this->form_validation->set_rules('field_study'.$i,' Field'.$i,'required|trim|xss_clean');
				$this->form_validation->set_rules('degree'.$i,' Degree'.$i,'required|trim|xss_clean');
				$this->form_validation->set_rules('edu_details'.$i,' Study Details'.$i,'required|trim|xss_clean');
				
				$school[$i]=$this->input->post('school'.$i);
				$field_study[$i]=$this->input->post('field_study'.$i);
				$degree[$i]=$this->input->post('degree'.$i);
				$edu_details[$i]=$this->input->post('edu_details'.$i);
				$grad_year[$i]=$this->input->post('grad_year'.$i);
				$country[$i]=$this->input->post('country'.$i);
				}}
				
				for ($i=1 ; $i<=5 ; $i++ ) {
					if($this->input->post('postion'.$i) !=''){
								$this->form_validation->set_rules('postion'.$i ,' Postion'.$i,'required|trim|xss_clean');
				$this->form_validation->set_rules('company'.$i ,' Company'.$i,'required|trim|xss_clean');
				$this->form_validation->set_rules('job_details'.$i ,' Job Details'.$i,'required|trim|xss_clean');
				
				$postion[$i]=$this->input->post('postion'.$i);
				$company[$i]=$this->input->post('company'.$i);
				$job_details[$i]=$this->input->post('job_details'.$i);
				$date_from[$i]=$this->input->post('date_from'.$i);
				$date_to[$i]=$this->input->post('date_to'.$i);
				}
				}
				
				for ($i=1 ; $i<=10 ; $i++ ) {
					if($this->input->post('skill'.$i) !=''){
				$this->form_validation->set_rules('skill'.$i ,' Skill'.$i,'required|trim|xss_clean');
				
				$skill[$i]=$this->input->post('skill'.$i);
				$level[$i]=$this->input->post('level'.$i);
				}
				}
				if ($this->form_validation->run() == true) {
					$user_id = $this->session->userdata('user_id');
					
					for ($i=1 ; $i<=10 ; $i++ ) {
						if($this->input->post('skill'.$i) !=''){
			$data= array(
		"user_id"=>$user_id , 
		"skill" => $skill[$i],
		"level" => $level[$i],
		);
		
	if($this->db->insert('cv_skills' , $data)){
		$skills=1;
		}
			}
			}
		
			
			for ($i=1 ; $i<=5 ; $i++ ) {
				if($this->input->post('postion'.$i) !=''){
			$data= array(
		"user_id"=>$user_id , 
		"postion" => $postion[$i],
		"date_from" => $date_from[$i],
		"date_to" => $date_to[$i],
		"company" => $company[$i],
		"details" => $job_details[$i]
		);
		
	if($this->db->insert('cv_exper' , $data)){
		$exper=1;
		}
			}}
			
			for ($i=1 ; $i<=5 ; $i++ ) {
				if($this->input->post('school'.$i) !=''){
			$data= array(
		"user_id"=>$user_id , 
		"school" => $school[$i],
		"country" => $country[$i],
		"field_study" => $field_study[$i],
		"degree" => $degree[$i],
		"details" => $edu_details[$i],
		"grad_year"=>$grad_year[$i]
		);
		
	if($this->db->insert('cv_edu' , $data)){
		$edu=1;
		}
			}}
			
			$data= array(
		"user_id"=>$user_id , 
		"email" => $email,
		"home_phone" => $phone,
		"mobile_phone" => $mobile,
		"summary" => $summary,
		"accomplishments" => $accomplishments
		);
		
	if($this->db->insert('cv' , $data)){
		$cv=1;
		}
		if($skills==1 && $exper==1 && $edu==1 && $cv==1){
			$flag['inserted']=1;
			$this->load->view('cv_edit',$flag);
			}
					
					}else{
						$this->load->view('cv_edit');
						}
			}else{
					redirect('site');
					}	
}
}
?>