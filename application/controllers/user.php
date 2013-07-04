
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {
    function index(){
        
        $this->profile();
        
    }
    ///////////////////
    function profile(){
        if($this->session->userdata('user_logged_in')){            ///////////////////////////else if he is a normal user
		if($this->model_users->is_edit_cv($this->session->userdata('user_id'))){
				if( $this->uri->segment(3) != ''){
				$id=$this->uri->segment(3);   
                 $this->load->model('model_company');
				
				 $this->load->model('model_users');
				 if($this->model_users->select_user($id)){
					 $id=$this->model_users->select_user($id)->row(0)->id;
				     $data['id']=$id;
					 $data['user_data']=$this->model_users->get_user_info($id);
					 $data['cv']=$this->model_users->get_cv($id);
					$data['cv_edu']=$this->model_users->get_cv_edu($id);
					$data['cv_exper']=$this->model_users->get_cv_exper($id);
					$data['cv_skills']=$this->model_users->get_cv_skills($id);
					$data['following']=$this->model_users->get_following($id);
					$data['user_activity']=$this->model_users->get_user_activity($id);
                    $this->load->view('u_profile',$data);
					 }else{
				      redirect('site/error404');	 
						 }
				}else{
					redirect('site/error404');
					}
		}else{
			redirect("user/cv_edit");
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
				$comapny_name= $this->model_company->get_company_name($company_id);
				$user_name = $this->model_users->get_user_name($user_id);
				$data_activity = array(
				'user_id'=>$user_id,
				'title'=>"".$user_name." is following ".$comapny_name."",
				'link' =>"company/profile/".$company_id.""
				);
				$this->db->insert('user_activity',$data_activity);
				redirect('company/profile/'.$company_id);
				}
			}else{
				redirect('site/error404');
				}
		}
		//////////////
		public function ajax_follow(){
			$user_id = $this->session->userdata('user_id');
	$company_id = $this->input->post('company_id');
			echo $this->_ajax_follow($user_id,$company_id);
			}
		////////////
		public function _ajax_follow($user_id,$company_id){
					$data = array(
				'user_id'=>$user_id,
				'company_id'=>$company_id
				);
				
			if($this->db->insert('follow',$data)){
				
				$comapny_name= $this->model_company->get_company_name($company_id);
				$user_name = $this->model_users->get_user_name($user_id);
						$data_activity = array(
				'user_id'=>$user_id,
				'title'=>"".$user_name." is following ".$comapny_name."",
				'link' =>"company/profile/".$company_id.""
				);
				$this->db->insert('user_activity',$data_activity);
				
			$result=array('status'=>'ok');
		}else{
			$result=array('status'=>'no');
			}
			return json_encode($result);
			
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
				$comapny_name= $this->model_company->get_company_name($company_id);
				$user_name = $this->model_users->get_user_name($user_id);
				$data_activity = array(
				'user_id'=>$user_id,
				'title'=>"".$user_name." is following ".$comapny_name."",
				);
				$this->db->delete('user_activity',$data_activity);
				
				redirect('company/profile/'.$company_id);
				}
			}else{
				redirect('site/error404');
				}
		}
		////////////////////
		public function edit(){
			if($this->session->userdata('user_logged_in')){
				if($this->model_users->is_edit_cv($this->session->userdata('user_id'))){
				$this->load->view('user_edit');
				}else{
					redirect('user/cv_edit');
					}
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
						$user_name = $this->model_users->get_user_name($user_id);
						$data_activity = array(
				'user_id'=>$user_id,
				'title'=>"".$user_name." update his/her profile",
				'link' =>"user/profile/".$user_id.""
				);
				$this->db->insert('user_activity',$data_activity);
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
			if($this->model_users->is_edit_cv($this->session->userdata('user_id'))){
		$user_id=$this->session->userdata('user_id');
		 $this->load->model('model_users');
		 $this->load->model('model_company');
				 $data['following']=$this->model_users->get_following($user_id);
				 $data['user_activity']=$this->model_users->get_user_activity($user_id);
		 $this->load->view('user_following' , $data);
			}else{
				redirect('user/cv_edit');
				}
		}else{
					redirect('site');
					}
	}
	////////////////////
	public function news_feed(){
		if($this->session->userdata('user_logged_in')){
			if($this->model_users->is_edit_cv($this->session->userdata('user_id'))){
			$user_id=$this->session->userdata('user_id');
		 $this->load->model('model_users');
		 $this->load->model('model_company');
				 $data['following']=$this->model_users->get_following($user_id);
				 $data['user_activity']=$this->model_users->get_user_activity($user_id);
		 $this->load->view('user_news_feed' , $data);
			}else{
				redirect('user/cv_edit');
				}
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
				$user_name = $this->model_users->get_user_name($user_id);
						$data_activity = array(
				'user_id'=>$user_id,
				'title'=>"".$user_name." wrote his/her CV",
				'link' =>"user/profile/".$user_id.""
				);
				$this->db->insert('user_activity',$data_activity);
			$flag['inserted']=1;
			redirect('user/profile/'.$user_id);
			}
					
					}else{
						$this->load->view('cv_edit');
						}
			}else{
					redirect('site');
					}	
}
////////////////////////////////////
		public function cv(){
			if($this->session->userdata('user_logged_in')){
				if($this->uri->segment(3)=='' ){
					$user_id = $this->session->userdata('user_id');
					$this->load->model('model_users');
					$data['cv']=$this->model_users->get_cv($user_id);
					$data['cv_edu']=$this->model_users->get_cv_edu($user_id);
					$data['cv_exper']=$this->model_users->get_cv_exper($user_id);
					$data['cv_skills']=$this->model_users->get_cv_skills($user_id);
						$this->load->view('cv',$data);
					}elseif($this->uri->segment(3)==$this->session->userdata('user_id')){
						$user_id = $this->uri->segment(3);
					$this->load->model('model_users');
					$data['cv']=$this->model_users->get_cv($user_id);
					$data['cv_edu']=$this->model_users->get_cv_edu($user_id);
					$data['cv_exper']=$this->model_users->get_cv_exper($user_id);
					$data['cv_skills']=$this->model_users->get_cv_skills($user_id);
						$this->load->view('cv',$data);
						}else{
							redirect('user/cv'.$this->session->userdata('user_id'));
							}
				}else{
					redirect('site');
					}
			}
///////////////////////////
public function add_card(){
	$user_id = $this->session->userdata('user_id');
	$product_id = $this->input->post('product_id');
	
	$data= array(
		"user_id"=>$user_id , 
		"product_id" => $product_id
		);
		echo $this->_add_card($data);
}

public function _add_card($data){
		
	if($this->db->insert('card' , $data)){
		
			$user_name = $this->model_users->get_user_name($data['user_id']);
						$data_activity = array(
				'user_id'=>$data['user_id'],
				'title'=>"".$user_name." add a new product to his/her card",
				'link' =>"company/product/".$data['product_id'].""
				);
				$this->db->insert('user_activity',$data_activity);
				 $result=array('status'=>'ok');
		}else{
			$result=array('status'=>'no');
			}
			return json_encode($result);
		
		
	}	
///////////////////////////		
public function mycard(){
	if($this->session->userdata('user_logged_in')){
		$this->load->model('model_company');
		$this->load->model('model_users');
	$user_id = $this->session->userdata('user_id');
			 $data['products_list']= $this->model_users->mycard_items($user_id);
			 $data['user_activity']=$this->model_users->get_user_activity($user_id);
			$this->load->view('mycard',$data);
	}else{
					redirect('site');
					}
	}
////////////////////////
function update_about(){
	$user_id = $this->session->userdata('user_id');
	$about_user = $this->input->post('about_user');
    echo $this->_update_about($user_id,$about_user);
	}
///////////////////////////
public function _update_about($user_id,$about_user){
	
	
	
	$data= array(
		"about" => $about_user
		);
	
	if($this->db->update('users' , $data , "id = ".$user_id."")){
		$result=array('status'=>'ok');
		}else{
			$result=array('status'=>'no');
			}
			return json_encode($result);

	}
//////////////////////	

public function update_summary(){
		
	$user_id = $this->session->userdata('user_id');
	$summary = $this->input->post('summary');
	
	echo $this->_update_summary($user_id,$summary);
	}
	
//////////////	
public function _update_summary($user_id,$summary){
	
	$data= array(
		"summary" => $summary
		);
	
	if($this->db->update('cv' , $data , "user_id = ".$user_id."")){
		$result=array('status'=>'ok');
		}else{
			$result=array('status'=>'no');
			}
			return json_encode($result);
	
	}
//////////////////////

public function update_accomplishments(){
		
	$user_id = $this->session->userdata('user_id');
	$accomplishments = $this->input->post('accomplishments');
	
	echo $this->_update_accomplishments($user_id,$accomplishments);
	}

////////////////////////
	public function _update_accomplishments($user_id,$accomplishments){
	
	$data= array(
		"accomplishments" => $accomplishments
		);
	
	if($this->db->update('cv' , $data , "user_id = ".$user_id."")){
		$result=array('status'=>'ok');
		}else{
			$result=array('status'=>'no');
			}
			return json_encode($result);
	
	}
//////////////////////

public function update_expr(){
		
	$user_id = $this->session->userdata('user_id');
	$id = $this->input->post('id');
	$postion = $this->input->post('postion');
	$company = $this->input->post('company');
	$date_from = $this->input->post('date_from');
	$date_to = $this->input->post('date_to');
	$details = $this->input->post('details');
	
	$data= array(
	"postion" => $postion,
	"company" => $company,
	"date_from" => $date_from,
	"date_to" => $date_to,
	"details" => $details
		);

	
	echo $this->_update_expr($data,$id);
	}

//////////////////////
public function _update_expr($data,$id){
	
	if($this->db->update('cv_exper' , $data , "id = ".$id."")){
		$result=array('status'=>'ok');
		}else{
			$result=array('status'=>'no');
			}
			return json_encode($result);
	
	}
//////////////////////
public function new_expr(){
	
	$this->load->model('model_users');
	$user_id = $this->session->userdata('user_id');
	$postion = $this->input->post('postion');
	$company = $this->input->post('company');
	$date_from = $this->input->post('date_from');
	$date_to = $this->input->post('date_to');
	$details = $this->input->post('details');
	
	$data= array(
	"user_id" => $user_id,
	"postion" => $postion,
	"company" => $company,
	"date_from" => $date_from,
	"date_to" => $date_to,
	"details" => $details
		);
		
	if($this->db->insert('cv_exper' , $data)){
		$back_data=$this->model_users->get_last_expr();
		foreach($back_data as $row){
				$data_back = array(
				"id" => $row->id,
				"postion" => $row->postion,
				"company" => $row->company,
				"date_from" => $row->date_from,
				"date_to" => $row->date_to,
				"details" => $row->details
				);
		}
		
		echo json_encode($data_back);
		}
	
	}
////////////////
public function delete_expr(){
	
	$expr_id= $this->input->post('id');
	echo $this->_delete_expr($expr_id);
	
	}
////////////////////////
public function _delete_expr($expr_id){
	$this->db->where('id',$expr_id);
			 if($this->db->delete('cv_exper')){
				 
				 $result=array('status'=>'ok');
		}else{
			$result=array('status'=>'no');
			}
			return json_encode($result);
}
////////////////////
function get_expr_ajax(){
	$user_id = $this->session->userdata('user_id');
			 echo $this->get_exprs($user_id);
			 }
		 
		 
		 function get_exprs($user_id){
			 		
					$exprs=$this->model_users->get_exprs($user_id);
					$counter=1;
					
                             $expr_html='<div class="edit_area_expr" style="padding:10px" id="'.count($exprs).'">';
						if(isset($exprs)){
						foreach($exprs as $row){
							
							$id= $row->id;
							$postion = $row->postion;
							$date_from = $row->date_from;
							$date_to = $row->date_to;
							$company = $row->company;
							$datails = $row->details;	
						    
							
							$expr_html.=' <br />
                       <p>
                       <input type="hidden" class="pointer'.$counter.'" value="'.$id.'" />
                           <h3>Job '.$counter.'</h3>
                           <label>Postion</label>
                           <span class="field"><input type="text" class="postion'.$counter.'" value="'.$postion.'" required>&nbsp;&nbsp;
                           <label>Company</label>
                           <input type="text" class="company'.$counter.'"  value="'.$company.'" required></span>  
                           </p>
                           <br />
                           <p>
                           <label>Date From</label>
                           <span class="field"><input type="date" class="date_from'.$counter.'" value="'.$date_from.'" required> &nbsp;&nbsp;
                           <label>Date To</label>
                           <input type="date" class="date_to'.$counter.'"  value="'.$date_to.'" required></span>
                           </p>
                           </br>
                           <p>
                           <span class="field"><textarea cols="100" rows="5" class="job_details'.$counter.'" id="job_details"  required style="resize:none">'.$datails.'</textarea></span>
                           </p><br>';
                           $counter++; }
							
							
						$expr_html.='</div>';
						
						
						$result=array('status'=>'ok' ,'content'=>$expr_html , 'expr_count'=>count($exprs));
						return json_encode($result);
						exit();
						}else{
						$result=array('status'=>'no' ,'content'=>'No Update Yet');
						return json_encode($result);
							exit();
							}
					
			 }

///////////////
////////////////////
function get_skill_ajax(){
	$user_id = $this->session->userdata('user_id');
			 echo $this->get_skills_db($user_id);
			 }
		 
		 
		 function get_skills_db($user_id){
			 		
					$skills=$this->model_users->get_skills($user_id);
					$counter=1;
					
                             $skill_html='<div class="edit_area_skill" style="padding:10px" id="'.count($skills).'">';
						if(isset($skills)){
						foreach($skills as $row){
							
							$id= $row->id;
							$skill = $row->skill;
							$level = $row->level;
							
							$skill_html.=' <br />
							<p>
							<input type="hidden" class="pointer_skill'.$counter.'" value="'.$id.'" />
        <label>Skill : </label>
        <span class="field">
        <input type="text" class="skill'.$counter.'" value="'.$skill.'"  required>&nbsp;&nbsp;&nbsp;
        <label>Level : </label>
        <select class="level'.$counter.'"  required>
        <option value="Excellent"';
		if($level == 'Excellent'){ $skill_html.='selected="selected"' ;}
		$skill_html.='>Excellent</option>
        <option value="Very Good"';
		if($level == 'Very Good'){ $skill_html.='selected="selected"' ;}
		$skill_html.='>Very Good</option>
         <option value="Good"';
		 if($level == 'Good'){ $skill_html.='selected="selected"' ;}
		 $skill_html.='>Good</option>
          <option value="Medium"';
		  if($level == 'Medium'){ $skill_html.='selected="selected"' ;}
		  $skill_html.='>Medium</option>
          <option value="Acceptable"';
		  if($level == 'Acceptable'){ $skill_html.='selected="selected"' ;}
		  $skill_html.='>Acceptable</option>
          <option value="Weak"';
		  if($level == 'Weak'){ $skill_html.='selected="selected"' ;}
		  $skill_html.='>Weak</option>
        </select>
    </span></p>';
                           $counter++; }
							
							
						$skill_html.='</div>';
						
						
						$result=array('status'=>'ok' ,'content'=>$skill_html , 'skill_count'=>count($skills));
						return json_encode($result);
						exit();
						}else{
						$result=array('status'=>'no' ,'content'=>'No Update Yet');
						return json_encode($result);
							exit();
							}
					
			 }

///////////////
public function update_skill(){
	
	$user_id = $this->session->userdata('user_id');
	$id = $this->input->post('id');
	$skill = $this->input->post('skill');
	$level = $this->input->post('level');
	
	$data= array(
	"skill" => $skill,
	"level" => $level,
		);
		
	echo $this->_update_skill($data,$id);
	}

///////////////
public function _update_skill($data,$id){
	
	if($this->db->update('cv_skills' , $data , "id = ".$id."")){
	
				 $result=array('status'=>'ok');
		}else{
			$result=array('status'=>'no');
			}
			return json_encode($result);
	}
//////////////////////
public function new_skill(){
	$this->load->model('model_users');
	$user_id = $this->session->userdata('user_id');
	$skill = $this->input->post('skill');
	$level = $this->input->post('level');
	
	$data= array(
	"user_id" => $user_id,
	"skill" => $skill,
	"level" => $level
		);
	
	if($this->db->insert('cv_skills' , $data)){
		$back_data=$this->model_users->get_last_skill();
		foreach($back_data as $row){
				$data_back = array(
				"id" => $row->id,
				"skill" => $row->skill,
				"level" => $row->level
				);
		}
		echo json_encode($data_back);
		}
	
	
	}
//////////////////////
public function delete_skill(){
	$skill_id= $this->input->post('id');
	
	echo $this->_delete_skill($skill_id);
	}
////////////////
public function _delete_skill($skill_id){
	$this->db->where('id',$skill_id);
			 if($this->db->delete('cv_skills')){
				 $result=array('status'=>'ok');
		}else{
			$result=array('status'=>'no');
			}
			return json_encode($result);
}
////////////////////
////////////////////
function get_edu_ajax(){
	$user_id = $this->session->userdata('user_id');
			 echo $this->get_edu_db($user_id);
			 }
		 
		 
		 function get_edu_db($user_id){
			 		
					$edu=$this->model_users->get_edu($user_id);
					$counter=1;
					require("all_countries.php");
					$countries = '' ;
					 for($i=0;$i< count($country_list);$i++) {
  $countries .= " <option value=\"$country_list[$i]\"";
    $countries .= ">$country_list[$i]</option>";
   } ;
                             $edu_html='<div class="edit_area_edu" style="padding:10px" id="'.count($edu).'">';
						if(isset($edu)){
						foreach($edu as $row){
							
							$id= $row->id;
							$school = $row->school;
							$grad_year = $row->grad_year;
							$country = $row->country;
							$field_study = $row->field_study;
							$degree = $row->degree;
							$details = $row->details;	
						    
							$edu_html.=' <br />
							<p>
							<input type="hidden" class="pointer_edu'.$counter.'" value="'.$id.'" />
							<h3>Study '.$counter.'</h3>
						   <br>
                           <label>School</label>
                           <span class="field"><input type="text" class="school'.$counter.'" value="'.$school.'" required>&nbsp;&nbsp;&nbsp;
                           <label>Grad Year</label>
                        	<input type="number" min="1980" max="2013" class="grad_year'.$counter.'" value="'.$grad_year.'"  required>&nbsp;&nbsp;&nbsp;
                           <label>Country</label>
                           <select class="country'.$counter.'" size="1">'.$countries.'</select></span></p><p><br />
   							<label>Field of Study</label>
                             <span class="field"><input type="text" class="field_study'.$counter.'" value="'.$field_study.'" required>&nbsp;&nbsp;&nbsp;
                             <label>Degree</label>
                             <input type="text" class="degree'.$counter.'" value="'.$degree.'" required></span> 
                              </p><p><br />
                           <span class="field"><textarea cols="100" rows="5" class="edu_details'.$counter.'" required style="resize:none">'.$details.'</textarea></span>
                           </p>
                      <br>';
                           $counter++; }
							
							
						$edu_html.='</div>';
						
						
						$result=array('status'=>'ok' ,'content'=>$edu_html , 'edu_count'=>count($edu));
						return json_encode($result);
						exit();
						}else{
						$result=array('status'=>'no' ,'content'=>'No Update Yet');
						return json_encode($result);
							exit();
							}
					
			 }

///////////////

public function update_edu(){

$user_id = $this->session->userdata('user_id');
	$id = $this->input->post('id');
	$school = $this->input->post('school');
	$grad_year = $this->input->post('grad_year');
	$country = $this->input->post('country');
	$field_study = $this->input->post('field_study');
	$degree = $this->input->post('degree');
	$details = $this->input->post('edu_details');
	
	$data= array(
	"school" => $school,
	"grad_year" => $grad_year,
	"country" => $country,
	"field_study" => $field_study,
	"degree" => $degree,
	"details" => $details,
		);
	echo $this->_update_edu($data,$id);

}
///////////////

public function _update_edu($data,$id){
	
	if($this->db->update('cv_edu' , $data , "id = ".$id."")){
				
				 $result=array('status'=>'ok');
		}else{
			$result=array('status'=>'no');
			}
			return json_encode($result);
	
	}
//////////////////////
public function new_edu(){
	$this->load->model('model_users');
	$user_id = $this->session->userdata('user_id');
	
	$school = $this->input->post('school');
	$grad_year = $this->input->post('grad_year');
	$country = $this->input->post('country');
	$field_study = $this->input->post('field_study');
	$degree = $this->input->post('degree');
	$details = $this->input->post('details');
	
	$data= array(
	"user_id" => $user_id,
	"school" => $school,
	"grad_year" => $grad_year,
	"country" => $country,
	"field_study" => $field_study,
	"degree" => $degree,
	"details" => $details,
		);
	
	if($this->db->insert('cv_edu' , $data)){
		$back_data=$this->model_users->get_last_edu();
		foreach($back_data as $row){
				$data_back = array(
					"id" => $row->id,
					"school" => $row->school,
					"grad_year" => $row->grad_year,
					"country" => $row->country,
					"field_study" => $row->field_study,
					"degree" => $row->degree,
					"details" => $row->details
				);
		}
		echo json_encode($data_back);
		}
	
	
	}
//////////////////////
public function delete_edu(){
	$edu_id= $this->input->post('id');
	echo $this->_delete_edu($edu_id);
	}
///////////////////////
public function _delete_edu($edu_id){

	$this->db->where('id',$edu_id);
			 if($this->db->delete('cv_edu')){
				 $result=array('status'=>'ok');
		}else{
			$result=array('status'=>'no');
			}
			return json_encode($result);
	
				 
}
////////////////////
public function messages(){
	if($this->session->userdata('user_logged_in')){
		if($this->model_users->is_edit_cv($this->session->userdata('user_id'))){
		$user_id=$this->session->userdata('user_id');
		$data['messages']= $this->model_users->get_user_messages($user_id);
		$data['user_activity']=$this->model_users->get_user_activity($user_id);
		$this->load->view('user_messages' , $data);
		}else{
			redirect('user/cv_edit');
			}
		}else{
			redirect('site/error404');
			}
	}
	///////////////////
	function select_user_messages(){
	
			$id=$this->session->userdata('user_id');
			if($this->model_users->get_user_messages($id)){
				$data['messages']=$this->model_users->get_user_messages($id);
				$this->load->view('messages_user',$data);
			
				}else{
					$data['no_messages']=1;
					$this->load->view('messages_user',$data);
					}
			
		}
	//////////////////	
	public function seen_messages(){
		$user_id = $this->session->userdata('user_id');
		$data = array (
	   'seen' => 1,
	   );	
	   echo $this->_seen_messages($user_id,$data);
		}		
	///////////////////////
	public function _seen_messages($user_id,$data){
		
					if($this->db->update('user_messages' , $data , "to_m = ".$user_id."")){
						 $result=array('status'=>'ok');
		}else{
			$result=array('status'=>'no');
			}
			return json_encode($result);
		
		}	
	/////////////////////
	public function count_messages(){
		$user_id = $this->session->userdata('user_id');
		echo $this->_count_messages($user_id);
		}
	/////////////////////////
	public function _count_messages($user_id){
		$messages_count=$this->model_users->select_count_messages($user_id);
		if($messages_count){
		$result=array('status'=>'ok','messages_count'=>$messages_count);
		}else{
			$result=array('status'=>'ok','messages_count'=>0);
			}
			return json_encode($result);
		}
		////////////////
		
		public function apply_job(){
			$user_id = $this->session->userdata('user_id');
			$job_id = $this->input->post('job_id');
			$data = array(
			'user_id'=>$user_id,
			'job_id'=>$job_id,
			'wait'=>1
			);
			echo $this->_apply_job($data);
			}
		////////////////
		public function _apply_job($data){
			
			if($this->db->insert('apply_job',$data)){
				
				$user_name = $this->model_users->get_user_name($data['user_id']);
						$data_activity = array(
				'user_id'=>$data['user_id'],
				'title'=>"".$user_name." apply to a new job",
				'link' =>"company/job/".$data['job_id'].""
				);
				$this->db->insert('user_activity',$data_activity);
				
			$result=array('status'=>'ok');
		}else{
			$result=array('status'=>'no');
			}
			return json_encode($result);	
			}
		////////////////
	public function applied_jobs(){
	if($this->session->userdata('user_logged_in')){
		if($this->model_users->is_edit_cv($this->session->userdata('user_id'))){
		$user_id=$this->session->userdata('user_id');
		$data['applied_jobs']= $this->model_users->get_job_applied($user_id);
		$data['user_activity']=$this->model_users->get_user_activity($user_id);
		$this->load->view('applied_jobs' , $data);
		}else{
			redirect('user/cv_edit');
			}
	}else{
			redirect('site/error404');
			}
	}
	/////////////////////
		/////////////////////
	public function event_attend(){
	if($this->session->userdata('user_logged_in')){
		if($this->model_users->is_edit_cv($this->session->userdata('user_id'))){
		$user_id=$this->session->userdata('user_id');
		$data['events_attend']= $this->model_users->get_event_attend($user_id);
		$data['user_activity']=$this->model_users->get_user_activity($user_id);
		$this->load->view('event_attend' , $data);
		}else{
			redirect('user/cv_edit');
			}
	}else{
			redirect('site/error404');
			}
	}
	/////////////////////
	////////////////
		
		public function attend(){
			$user_id = $this->session->userdata('user_id');
			$event_id = $this->input->post('event_id');
			$data = array(
			'user_id'=>$user_id,
			'event_id'=>$event_id,
			'wait'=>1
			);
			echo $this->_attend($data);
			}
	/////////////////////
public function _attend($data){
			
			if($this->db->insert('attend',$data)){
				
				$user_name = $this->model_users->get_user_name($data['user_id']);
						$data_activity = array(
				'user_id'=>$data['user_id'],
				'title'=>"".$user_name." attend to a new event",
				'link' =>"company/event/".$data['event_id'].""
				);
				$this->db->insert('user_activity',$data_activity);
				
			$result=array('status'=>'ok');
		}else{
			$result=array('status'=>'no');
			}
			return json_encode($result);	
			}
		////////////////
		function get_company_ajax(){
			 echo $this->get_company_db();
			 }
		 
		 
		 function get_company_db(){
			 		$user_id = $this->session->userdata('user_id');
					$company=$this->model_users->get_suggest();
					$company_html = '';
						if(isset($company)){
						foreach($company as $row){
							
							$id= $row->id;
							$name = $row->name;
							$field = $row->field;
							$logo = $row->logo;
							
									
									if($logo != ''){ $pic = $logo ;}else{ $pic = 'defult.jpg';}
							
							$company_html .='<li style="padding:10px" class="suggest" id="_'.$id.'"><img src="'.base_url().'images/campanies_logo/'.$pic.'" width="70" height="60" style="float:left ; margin-right:10px ; border:double 1px #999">
							<span style="float:left"><strong>'.$name.'</strong></span><br>
                        <span style="float:left"><small>'.$field.'</small></span><br><div style="color:#039;cursor:pointer" class="follow" id="'.$id.'">follow</div></li>';
								
 }
							
						
						
						$result=array('status'=>'ok' ,'content'=>$company_html);
						return json_encode($result);
						exit();
						}else{
						$result=array('status'=>'no' ,'content'=>'Wait a New Companies');
						return json_encode($result);
							exit();
							}
					
			 }

///////////////





///////////////
function insert_comment(){
	$event_id = $this->input->post('event_id');
	$comment = str_replace("\n","<br>",$this->input->post('comment'));
	$user_id = $this->session->userdata('user_id');
	$data = array(
	'user_id'=>$user_id,
	'event_id'=>$event_id,
	'comment'=>$comment
	);
	if($this->db->insert('event_comments',$data)){
			 echo $this->get_comment_db($user_id,$event_id);
	}
			 }
		 
		 
		 function get_comment_db($user_id,$event_id){
			 		
					$comment_db=$this->model_users->get_last_comment($user_id);
					$comment_count = count($this->model_users->get_commemts($event_id));
					$comment_html = '';
						if(isset($comment_db)){
						foreach($comment_db as $row){
							
							$id= $row->id;
							$comment = $row->comment;
							$c_date = $row->c_date;
							$user_id = $row->user_id;
							
							$user_info = $this->model_users->get_user_info($user_id);
							foreach($user_info as $r)
							{
								$logo = $r->pic;
								$username = $r->username;
								$gender = $r->gender;
								}
								
									
									if($logo == '' && $gender == 'male'){ $pic = 'male.gif' ;}
									elseif($logo == '' && $gender == 'female'){ $pic = 'female.gif' ;}
									else{$pic = $logo ;}
							
							$comment_html .='<li style="padding:20px;border-top:1px solid #c1c1c1">
                      <div id="user_img_db"><img src="'.base_url().'images/profile/'.$pic.'" width="60" height="60" style="border:1px solid #919191; float:left"/></div>
                      <div id="comment_user"><strong style="margin-left:10px">'.$username.'</strong></div>
					  <div id="comment_db" style="margin-left:80px"><span>'.$comment.'</span></div>
                      <div id="comment_date" style="float:right"><small style="color:#c1c1c1">'.$c_date.'</small></div>
					  <br />
                      </li>';
								
 }
							
						
						
						$result=array('status'=>'ok' ,'content'=>$comment_html , 'comment_count'=>$comment_count);
						return json_encode($result);
						exit();
						}else{
						$result=array('status'=>'no' ,'content'=>'There is No Comment');
						return json_encode($result);
							exit();
							}
					
			 }

//////////////////////////////////////////////
function select_user_activity(){
	if($this->session->userdata('user_logged_in')){
		$user_id = $this->session->userdata('user_id');
		
		if($this->model_employee->select_user_activity($user_id)){
			$data['activities']=$this->model_employee->select_user_activity($user_id);
			$this->load->view('user_activities',$data);
			}
	
		
		}else{
			redirect('site/');
			}
	
	}
//////////////////////////////////////////////
function count_user_activity(){
	if($this->session->userdata('user_logged_in')){
		$user_id = $this->session->userdata('user_id');
		
		if($this->model_employee->select_user_activity($user_id)){
			$activities=count($this->model_employee->select_user_activity($user_id));
			}else{
				$activities=0;
				}
	     
		echo $activities;
		}else{
			redirect('site/');
			}
	
	}	
//////////////////////////////////////////////
}
?>
