<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Company extends CI_Controller {
	
	public function index()
	{ 
             if($this->session->userdata('company_logged_in')){
                $id=$this->session->userdata('comp_id');
				 $this->load->model('model_users');
				 if($this->model_users->select_company($id)){
				 
                    redirect('company/profile/'.$id);	 
					 }else{
				       $data['hide']=1;
                       $this->load->view('index',$data);		 
						 }
            } else {
                $this->load->view('index_company');
            }
	}
	/////////////////////////////////////////////////
	function tree_step1(){
		$this->load->model('model_users');
		$company_id = $this->session->userdata('comp_id');
			$data['users']=$this->model_users->all_emp($company_id);
		$this->load->view("company_tree",$data);		
	
		}
	function profile(){
			if( $this->uri->segment(3) != ''){
				$id=$this->uri->segment(3);
				
			$this->load->model('model_company');
			$data['pro_data']=$this->model_company->get_company_info($id);
			$data['feed_segment']=$this->model_company->feed_by_id($this->uri->segment(3));
				$this->load->model('model_users');	
			if($this->model_users->select_company($id)){
			
				
			$data['pro_data']=$this->model_company->get_company_info($id);
				$data['id']=$this->uri->segment(3);
				$data['bill'] = $this->model_company->get_bill_company($this->session->userdata('comp_id'));
				$this->load->view('company',$data);
				
			}else{
				redirect('site/error404');
				}
			}else{
				redirect('site/error404');
				}
			 
		}
	//////////////////////////////////////////////////
	///////////////////////////////
	function companyjobs(){
		if( $this->uri->segment(3) != ''){
			$id=$this->uri->segment(3);
			$this->load->model('model_company');
			$data['jobs']=$this->model_company->get_jobs($id);
		$this->load->view('company_jobs',$data);
		}
		else{
			redirect('site/error404');
			}
		
		}
		///////////////////////////////
	function news(){
		
			if( $this->uri->segment(3) != ''){
			$id=$this->uri->segment(3);
			$this->load->model('model_company');
			$data['news']=$this->model_company->get_news($id);
		$this->load->view('news',$data);
		}
		else{
			redirect('site/error404');
			}
		 
		}
		///////////////////////////////
		function gallery(){
			
				if( $this->uri->segment(3) != ''){
				$id=$this->uri->segment(3);
			$this->load->model('model_company');
			$data['picx']=$this->model_company->get_media($id);
		$this->load->view('gallery',$data);
		}
		else{
			redirect('site/error404');
			}
		 
		}
	///////////////////////////////
		function events(){
				if( $this->uri->segment(3) != ''){
				$id=$this->uri->segment(3);
			$this->load->model('model_company');
			$data['events']=$this->model_company->get_events($id);
		$this->load->view('events',$data);
		}
		else{
			redirect('site/error404');
			}
		 
		}
		///////////////////////////////
		function products(){
				if( $this->uri->segment(3) != ''){
				$id=$this->uri->segment(3);
			$this->load->model('model_company');
			$data['products']=$this->model_company->get_products($id);
		$this->load->view('products',$data);
		}
		else{
			redirect('site/error404');
			}
		 } 
             
		
	
	//////////////////////////////////////////////////
	public function step1_validation()
	{
        $this->load->library('form_validation');
        $this->form_validation->set_rules('chairman', 'chairman', 'required|trim|max_length[100]|xss_clean');
		$this->form_validation->set_rules('department_number', 'department number', 'required|trim|max_length[10]|numeric|xss_clean');
		
        $chairman = $this->input->post('chairman');
	    $depart_num = $this->input->post('department_number');
		$id = $this->session->userdata('comp_id');
        if ($this->form_validation->run() == false) {
			
		if($this->model_users->all_emp($id)){
			$data['users']=$this->model_users->all_emp($id);
		$this->load->view("company_tree",$data);		
			}else{
				
				}
			
		}else {
			
				
			$data = array(
			'is_logged_in' => 1,
			'company_id' => $id,
			'depart_number' => $depart_num
			);
			$this->session->set_userdata($data);
			$data= array(
		"chairman"=>$chairman , 
		"department_number" => $depart_num
		);
		
		$date_bill = array(
		'company_id' => $id,
		'details' => 'Creating '.$depart_num.' Departments in your own Tree company buliding',
		'value' => $depart_num * 50 ,
		'reason' => 'department'
		);

	if($this->db->update('company' , $data , "id = ".$id."")){
		$reason = "department";
		$date_bill_update = array(
		'details' => 'Creating '.$depart_num.' Departments in your own Tree company buliding',
		'value' => $depart_num * 50 
		);
		if($this->model_company->is_added_bill($id,$reason)){
		$this->db->update('bill' , $date_bill_update, array('company_id'=>$id,'reason'=>"department"));
		}else{
		$this->db->insert('bill' , $date_bill);	
			}
			redirect('company/step2');
	}
			}
	}
	
	public function step2(){
		 $id = $this->session->userdata('comp_id');
		$this->load->model('model_company');
		$data['depart_no'] = $this->model_company->get_department_number($id);
		$data['bill'] = $this->model_company->get_bill_company($id);
		$this->load->model('model_users');
			$data['users']=$this->model_users->all_emp($id);
		$this->load->view("step2",$data);		
			
		}
	

public function step2_validation()
	{
		$this->load->model('model_company');
	$data['depart_no']= $this->session->userdata('depart_number');
		$depart_name;
		$depart_manager;
		$sub_depart_number;
		$all_sub_num = 0;
		$field;
		$id=$this->session->userdata('comp_id');
		$depart_number = $this->session->userdata('depart_number');
		$id=$this->session->userdata('comp_id');
		$this->load->library('form_validation');
		for ($i=1 ; $i<=$depart_number ; $i++ ) {
		 $this->form_validation->set_rules('name_'.$i, ' Department Name '.$i, 'required|trim|max_length[100]|xss_clean');	
		 $this->form_validation->set_rules('depart_manager_'.$i, ' Department Manager '.$i, 'required|trim|max_length[100]|xss_clean');
		 	$depart_name[$i]=$this->input->post('name_'.$i);
			$depart_manager [$i]= $this->input->post('depart_manager_'.$i);
			$sub_depart_number [$i]= $this->input->post('sub_depart_number_'.$i);
			$field[$i] = $this->input->post('field_'.$i);
		}
			 if ($this->form_validation->run() == false) {
			$this->load->model('model_users');
		if($this->model_users->all_emp($id)){
			$data['users']=$this->model_users->all_emp($id);
		$this->load->view("step2",$data);		
			}else{
				
				}
		}else {
			if($this->model_company->is_company_valid($this->session->userdata('comp_id'),'department')){
			
		 $this->db->where('company_id',$this->session->userdata('comp_id'));
	$this->db->delete('department');
			}
			for ($i=1 ; $i<=$depart_number ; $i++ ) {
				if($sub_depart_number[$i] == ''){ $sub_depart_num = 0 ;}else{ $sub_depart_num = $sub_depart_number[$i]; }
			$data= array(
		"company_id"=>$this->session->userdata('comp_id') , 
		"name" => $depart_name[$i],
		"depart_manager" => $depart_manager[$i],
		"sub_depart_num" => $sub_depart_num,
		"type" => $field[$i]
		);
		$all_sub_num += $sub_depart_num;
	$this->db->insert('department' , $data);
			}
				$date_bill = array(
		'company_id' => $this->session->userdata('comp_id'),
		'details' => 'Creating '.$all_sub_num.' Sub-Departments in your own Tree company buliding',
		'value' => $all_sub_num * 20 ,
		'reason' => 'sub_department'
		);
		$reason = "sub_department";
		$date_bill_update = array(
		'details' => 'Creating '.$all_sub_num.' Sub-Departments in your own Tree company buliding',
		'value' => $all_sub_num * 20 
		);
		if($this->model_company->is_added_bill($id,$reason)){
		$this->db->update('bill' , $date_bill_update, array('company_id'=>$id,'reason'=>$reason));
		}else{
		$this->db->insert('bill' , $date_bill);	
			}
			redirect('company/step3');
	}
	}
	
	public function step3(){
		$id = $this->session->userdata('comp_id');
		$this->load->model('model_company');
		$this->load->model('model_employee');
		$data['depart_no'] = $this->model_company->get_department_number($id);
		$data['bill'] = $this->model_company->get_bill_company($id);
		$data['depart_info'] = $this->model_company->get_department_info($this->session->userdata('comp_id'));
		$this->load->model('model_users');
			$data['users']=$this->model_users->all_emp($id);
		$this->load->view("step3",$data);		
		}
	///////////////////
	
	
	public function step3_validation()
	{
		$this->load->model('model_company');
		$this->load->model('model_employee');
		$id = $this->session->userdata('comp_id');
	$data['depart_no']= $this->session->userdata('depart_number');
		$sub_depart_name;
		$sub_depart_manager;
		$depart_ids;
		$depart_id_array;
		$depart_number = $this->session->userdata('depart_number');
		$this->load->library('form_validation');
		$depart_id = $this->model_company->get_department_info($this->session->userdata('comp_id'));
		$x=1;
		foreach($depart_id as $row){
			$depart_id_array[$x]=$row->id;
			$x++;	
			}
		for ($k=1 ; $k<=$depart_number ; $k++ ) {
			for ($i=1 ; $i<=4 ; $i++ ) {
				if(!$this->input->post('name_'.$k.$i)){
					continue;
				}else{
		 $this->form_validation->set_rules('name_'.$k.$i, ' Sub Department Name '.$i, 'required|trim|max_length[100]|xss_clean|');	
		 $this->form_validation->set_rules('sub_depart_manager_'.$k.$i, ' Sub Department Manager '.$i, 'required|trim|max_length[100]|xss_clean|');
		 	$depart_ids[$k][$i]=$depart_id_array[$k];	
		 	$sub_depart_name[$k][$i]=$this->input->post('name_'.$k.$i);
			$sub_depart_manager[$k][$i]= $this->input->post('sub_depart_manager_'.$k.$i);
			$sub_depart_type[$k][$i]= $this->input->post('sub_depart_type_'.$k.$i);
				}
		}
		}
			 if ($this->form_validation->run() == false) {
				 $data['depart_no'] = $this->model_company->get_department_number($this->session->userdata('comp_id'));
		$data['depart_info'] = $this->model_company->get_department_info($this->session->userdata('comp_id'));
			$this->load->model('model_users');
		if($this->model_users->all_emp($id)){
			$data['users']=$this->model_users->all_emp($id);
		$this->load->view("step3",$data);		
			}else{
				
				}
		}else {
			if($this->model_company->is_company_valid($this->session->userdata('comp_id'),'sub_department')){
				 $this->db->where('company_id',$this->session->userdata('comp_id'));
				$this->db->delete('sub_department');
				}
				
		for ($k=1 ; $k<=$depart_number ; $k++ ) {
			for ($i=1 ; $i<=4 ; $i++ ) {
				if(!$sub_depart_name[$k][$i]){
					continue;
				}else{
					if($sub_depart_type[$k][$i] == ''){ $type = '' ;}else{ $type = $sub_depart_type[$k][$i]; }
			$data= array(
		"company_id"=>$this->session->userdata('comp_id') , 
		"department_id"=> $depart_ids[$k][$i] , 
		"name" => $sub_depart_name[$k][$i],
		"sub_depart_manager" => $sub_depart_manager[$k][$i],
		"type" => $type,
		);
	
		
	$this->db->insert('sub_department' , $data);
			}
			}
		}
			redirect('company/tree');
	}
	}
	
	////////////////////////////
	public function tree(){
		if($this->session->userdata('company_logged_in')){
		$id = $this->session->userdata('comp_id');
		$this->load->model('model_employee');
		$this->load->model('model_company');
		$data['bill'] = $this->model_company->get_bill_company($id);
		$data['depart_no'] = $this->model_company->get_department_number($id);
		$data['depart_info'] = $this->model_company->get_department_info($id);
		$this->load->view("tree",$data);	
		} else {
                $this->load->view('index_company');
            }
		}
		
		//////////////////////
		
		function job(){
			if($this->uri->segment(4) != ''){
				$id=$this->uri->segment(4);
			$this->db->where('id',$id);
		    $result=$this->db->update('user_activity',array('seen'=>1));
				}
		$this->load->model('model_company');
		$user_id = $this->session->userdata('user_id');
		$job_id = $this->uri->segment(3);
			$vaild = $this->model_company->is_id_valid($this->uri->segment(3),'jops');
		if( $this->uri->segment(3) != '' && $vaild == 1 ){
			 if($this->session->userdata('user_logged_in')){
			$data['applied_job'] = $this->model_users->is_apply_job($user_id,$job_id);
			}
			$id=$this->uri->segment(3);
			$data['job']=$this->model_company->get_job($id);
		$this->load->view('job',$data);
		}
		else{
			redirect('site/error404');
			}
		
		}
		///////////////////////////////
	function news_show(){
		$this->load->model('model_company');
			$vaild = $this->model_company->is_id_valid($this->uri->segment(3),'news');
		if( $this->uri->segment(3) != '' && $vaild == 1 ){
			$id=$this->uri->segment(3);
			$data['news_show']=$this->model_company->get_new($id);
		$this->load->view('news_show',$data);
		}
		else{
			redirect('site/error404');
			}
		
		}
	function event(){

if($this->uri->segment(4) != ''){
$id=$this->uri->segment(4);
$this->db->where('id',$id);
$result=$this->db->update('user_activity',array('seen'=>1));
}
$user_id = $this->session->userdata('user_id');
$this->load->model('model_company');
$vaild = $this->model_company->is_id_valid($this->uri->segment(3),'events');
if( $this->uri->segment(3) != '' && $vaild == 1 ){
$id=$this->uri->segment(3);
if($this->session->userdata('user_logged_in')){
$data['events_attend'] = $this->model_users->is_event_attend($user_id,$id);
}
$data['event_comment'] = $this->model_users->get_commemts($id);
$data['event']=$this->model_company->get_event($id);
$this->load->view('event',$data);
}
else{
redirect('site/error404');
}

}
				///////////////////////////////
		function product(){
			$this->load->model('model_company');
			$this->load->model('model_users');
			$vaild = $this->model_company->is_id_valid($this->uri->segment(3),'products');
		if( $this->uri->segment(3) != '' && $vaild == 1 ){
			$id=$this->uri->segment(3);
			$data['product']=$this->model_company->get_product($id);
		$this->load->view('product',$data);
		}
		else{
			redirect('site/error404');
			}
		
		}
	/////////////////////////////////////
	
	
	
	
	
	
	
	///////////////////////////////////////////
	
	/////////////////////////////////////////////////////// confirm employees
	function unconfirm_employees(){
		$this->load->model('model_users');
		$company_id=$this->session->userdata('comp_id');
		if($this->session->userdata('company_logged_in')){
			if($this->model_users->select_unconfirm_emp($company_id)){
				$data['unconfirm_count']=count($this->model_users->select_unconfirm_emp($company_id)->result());
				if($this->model_users->select_confirm_emp($company_id)){
				$data['confirm_count']=count($this->model_users->select_confirm_emp($company_id)->result());
				}else{
					$data['confirm_count']='0';
					}
				$data['unconfirms']=$this->model_users->select_unconfirm_emp($company_id)->result();
				$company_id=$this->session->userdata('comp_id');
				 if($this->model_users->select_emp_dept($company_id)){
			  $data['depts']=$this->model_users->select_emp_dept($company_id)->result();
				 }
				
			$this->load->view('unconfirm_employees',$data);	
				}else{
					$data['unconfirm_count']=0;
					if($this->model_users->select_confirm_emp($company_id)){
				$data['confirm_count']=count($this->model_users->select_confirm_emp($company_id)->result());
				}else{
					$data['confirm_count']='0';
					}
					$company_id=$this->session->userdata('comp_id');
				 if($this->model_users->select_emp_dept($company_id)){
			  $data['depts']=$this->model_users->select_emp_dept($company_id)->result();
				 }
				 	$this->load->view('unconfirm_employees',$data);
					
					
					 }
			
			
			
		} else {
                $this->load->view('index_company');
            }	
		}
	//////////////////////////////////////////////////////////
	function confirm_employees(){
		$this->load->model('model_users');
		$company_id=$this->session->userdata('comp_id');
		if($this->session->userdata('company_logged_in')){
			
			    if($this->model_users->select_unconfirm_emp($company_id)){
					
				$data['unconfirm_count']=count($this->model_users->select_unconfirm_emp($company_id)->result());
				if($this->model_users->select_confirm_emp($company_id)){
				$data['confirm_count']=count($this->model_users->select_confirm_emp($company_id)->result());
				}else{
					$data['confirm_count']='0';
					}
				$data['confirms']=$this->model_users->select_confirm_emp($company_id)->result();
				
			$this->load->view('confirm_employees',$data);	
				}else{
				
					$data['unconfirm_count']='0';
					if($this->model_users->select_confirm_emp($company_id)){
				$data['confirm_count']=count($this->model_users->select_confirm_emp($company_id)->result());
				$data['confirms']=$this->model_users->select_confirm_emp($company_id)->result();
				$this->load->view('confirm_employees',$data);
				
				}else{
					$data['confirm_count']='0';
					
					}
					
					}
			
			
			
		} else {
                $this->load->view('index_company');
            }	
		}	
	///////////////////////////////////////////////////////

		function get_chid_categories(){
			$company_id=$this->session->userdata('comp_id');
			if($this->model_users->select_unconfirm_emp($company_id)){
				
				
				$data['unconfirms']=$this->model_users->select_unconfirm_emp($company_id)->result();
			$this->load->view('get_chid_categories');
			}
			}
		/////////////////////////////////////////////////
		function accept_employee(){
			if($this->session->userdata('company_logged_in')){
			 $this->load->library('form_validation');
			 $company_id=$this->session->userdata('comp_id');
                $this->form_validation->set_rules('dept','department','required|trim');
		        
              
                
                if($this->form_validation->run()){
			         
				if($this->model_users->update_employee()){
					redirect('company/confirm_employees');
				}
					}else{
						if($this->model_users->select_unconfirm_emp($company_id)){
				$data['unconfirm_count']=count($this->model_users->select_unconfirm_emp($company_id)->result());
				if($this->model_users->select_confirm_emp($company_id)){
				$data['confirm_count']=count($this->model_users->select_confirm_emp($company_id)->result());
				}else{
					$data['confirm_count']='0';
					}
				$data['unconfirms']=$this->model_users->select_unconfirm_emp($company_id)->result();
				$company_id=$this->session->userdata('comp_id');
				 if($this->model_users->select_emp_dept($company_id)){
			  $data['depts']=$this->model_users->select_emp_dept($company_id)->result();
				 }
				
			$this->load->view('unconfirm_employees',$data);	
				}
						 }
			
				} else {
                $this->load->view('index_company');
            }	
			}	
		function update_sub_dept(){
			if($this->session->userdata('company_logged_in')){
			 $this->load->library('form_validation');
			 $company_id=$this->session->userdata('comp_id');
                $this->form_validation->set_rules('sub_dept','department','required|trim');
		        
              
                
                if($this->form_validation->run()){
			         
				if($this->model_users->update_sub_dept()){
				if($this->model_users->select_unconfirm_emp($company_id)){
				$data['unconfirm_count']=count($this->model_users->select_unconfirm_emp($company_id)->result());
				if($this->model_users->select_confirm_emp($company_id)){
				$data['confirm_count']=count($this->model_users->select_confirm_emp($company_id)->result());
				}else{
					$data['confirm_count']='0';
					}
				$data['confirms']=$this->model_users->select_confirm_emp($company_id)->result();
				$data['updated']='1';
			    $this->load->view('confirm_employees',$data);
				}else{
					
					}
					
				}else{
					echo'cant';
					}
				
					}else{
						if($this->model_users->select_unconfirm_emp($company_id)){
				$data['unconfirm_count']=count($this->model_users->select_unconfirm_emp($company_id)->result());
				if($this->model_users->select_confirm_emp($company_id)){
				$data['confirm_count']=count($this->model_users->select_confirm_emp($company_id)->result());
				}else{
					$data['confirm_count']='0';
					}
				$data['unconfirms']=$this->model_users->select_unconfirm_emp($company_id)->result();
				$company_id=$this->session->userdata('comp_id');
				 if($this->model_users->select_emp_dept($company_id)){
			  $data['depts']=$this->model_users->select_emp_dept($company_id)->result();
				 }
				
			$this->load->view('confirm_employees',$data);	
				}
				}
					
					
			
				} else {
                $this->load->view('index_company');
            }	
			}
	///////////////////////////////////////////////////////
		function home(){
			$this->load->model('model_company');
			$data['news_feed']=$this->model_company->get_news_feed();
			$data['bill'] = $this->model_company->get_bill_company($this->session->userdata('comp_id'));
			$this->load->view('home', $data);
			}
	//////////////////////////
	function loading(){

$query="SELECT * FROM news_feed ORDER BY id DESC LIMIT 4 ";
$result=$this->db->query($query);

foreach($result as $row) {
	$data['company_id'] = $row->company_id;
				  $data['title'] = $row->title;
				  $data['date'] = $row->date;
				  $data['details'] = $row->details;
				  $data['logo'] = $row->logo;
				  $data['link'] = $row->link;
	$company_info = $this->model_company->get_company_info($row->company_id);
				 foreach($company_info as $r){
					 $data['company_name'] = $r->name;
					 $data['company_logo'] = $r->logo;
					 }
	echo json_encode ($data);	
}
		}

///////////////////////
public function delete_item(){
				$item_id = $this->input->post('ids');
			$table = $this->input->post('table');
			echo $this->_delete_item($item_id,$table);
}
///////////////////
public function _delete_item($item_id,$table){
	
			$this->db->where('id',$item_id);
			 if($this->db->delete($table)){
				 
				 $result=array('status'=>'ok');
		}else{
			$result=array('status'=>'no');
			}
			return json_encode($result); 

	}
	public function no_employees(){
		if($this->session->userdata('company_logged_in')){
			$this->load->view('no_employees');
			}
		}
	/////////////////////////
	public function mybill(){
		if($this->session->userdata('company_logged_in')){
		$data['bill'] = $this->model_company->get_bill($this->session->userdata('comp_id'));
		$this->load->view('company_bill',$data);
		}else {
                $this->load->view('index_company');
            }
		}		
}

?>
