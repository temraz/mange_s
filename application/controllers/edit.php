<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Edit extends CI_Controller {
	
	public function index()
	{
		if($this->session->userdata('company_logged_in')){
		$this->load->view('company_edit');
		}else{
					redirect('site');
					}
	}
	///////////////////
	public function news()
	{
		if($this->session->userdata('company_logged_in')){
		$this->load->view('news_insert');
		}else{
					redirect('site');
					}
	}
	///////////////////
	public function event()
	{
		if($this->session->userdata('company_logged_in')){
		$this->load->view('event_insert');
		}else{
					redirect('site');
					}
		
	}
	///////////////////
	public function product()
	{
		if($this->session->userdata('company_logged_in')){
		$this->load->view('product_insert');
		}else{
					redirect('site');
					}
		
	}
	///////////////////
	public function job()
	{
		if($this->session->userdata('company_logged_in')){
			$this->load->model('model_company');
			 $company_id=$this->session->userdata('comp_id');
			$data['all_dept']=$this->model_company->get_department_info($company_id);
		$this->load->view('job_insert',$data);
		}else{
					redirect('site');
					}
		
	}
	///////////////////
	public function media()
	{
		if($this->session->userdata('company_logged_in')){
		$this->load->view('media_insert');
		}else{
					redirect('site');
					}
	}
	/////////////////
	
	public function updata_profile()
	{
		if($this->session->userdata('company_logged_in')){
			$flag['inserted']=0;
			$this->load->library('form_validation');
		 $this->form_validation->set_rules('about_company', ' About Company ', 'required|trim|xss_clean');	
		 $this->form_validation->set_rules('about_product', ' Company Product ', 'required|trim|xss_clean');
			
			if ($this->form_validation->run() == false) {
				$this->load->view("company_edit");
				}else{
					$gallery_path = realpath(APPPATH . '../images/campanies_logo/');
        $config['upload_path'] = $gallery_path;
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp';
        $config['max_size'] = '20000';
        $this->load->library('upload', $config);
        if($this->upload->do_upload('logo')){
            $phot_data = $this->upload->data();
            $photo_name = $phot_data['file_name'];
		   } else {
            $error = array('error' => $this->upload->display_errors());
            $this->load->view('company_edit', $error);
	   }
	   $company_id=$this->session->userdata('comp_id');
					$about_company = $this->input->post('about_company');
			$about_product = $this->input->post('about_product');
			$links = str_replace("\n","<br>",$this->input->post('links'));
			$data = array (
	   'about' => $about_company,
	   'about_product' => $about_product,
	   'website' => $links,
	   'logo'=>$photo_name
	   );		
					if($this->db->update('company' , $data , "id = ".$company_id."")){
						 $flag['inserted']=1;
		  $this->load->view('company_edit' , $flag);
						 }
						
				}
		}else{
					redirect('site');
					}
	}

	
	///////////////////
	public function add_event()
	{
		
		if($this->session->userdata('company_logged_in')){
			$flag['inserted']=0;
			$this->load->library('form_validation');
		 $this->form_validation->set_rules('event_title', ' Event Name ', 'required|trim|xss_clean');	
		 $this->form_validation->set_rules('event_details', ' Event Description ', 'required|trim|xss_clean');
			
			if ($this->form_validation->run() == false) {
				$this->load->view("event_insert");
				}else{
					$gallery_path = realpath(APPPATH . '../images/events/');
        $config['upload_path'] = $gallery_path;
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp';
        $config['max_size'] = '20000';
        $this->load->library('upload', $config);
        if($this->upload->do_upload('event_logo')){
            $phot_data = $this->upload->data();
            $photo_name = $phot_data['file_name'];
		   } else {
            $error = array('error' => $this->upload->display_errors());
            $this->load->view('event_insert', $error);
	   }
	   $company_id=$this->session->userdata('comp_id');
					$event_title = $this->input->post('event_title');
			$event_date = $this->input->post('event_date');
			$event_details = str_replace("\n","<br>",$this->input->post('event_details'));
			$data = array (
	   'company_id' => $company_id,
	   'name' => $event_title ,
	   'date' => $event_date,
	   'details' => $event_details,
	   'pic'=>$photo_name
	   );		
	   
	   
					 if($this->db->insert('events',$data)){
						 $flag['inserted']=1;
						 $this->load->model('model_company');
						 $event_id = $this->model_company->get_feed_id('events');
		 foreach($event_id as $row){
			 $event_id2 = $row->id;
			 } 
	   
	   $news_feed = array (
	   'company_id' => $company_id,
	   'title' => $event_title ,
	   'details' => $event_details,
	   'logo'=>'events/'.$photo_name,
	   'link'=>base_url().'company/event/'.$event_id2,
	   'event_id'=>$event_id2
	   );		
	   $this->db->insert('news_feed',$news_feed);
	   
		  $this->load->view('event_insert' , $flag);
						 }
						
				}
		}else{
					redirect('site');
					}
	}

/////////////////////	
	public function add_product()
	{
		if($this->session->userdata('company_logged_in')){
			$flag['inserted']=0;
			$this->load->library('form_validation');
		 $this->form_validation->set_rules('product_name', ' Product Name ', 'required|trim|xss_clean');	
		 $this->form_validation->set_rules('product_details', ' Product Description ', 'required|trim|xss_clean');
			
			if ($this->form_validation->run() == false) {
				$this->load->view("product_insert");
				}else{
					$gallery_path = realpath(APPPATH . '../images/products/');
        $config['upload_path'] = $gallery_path;
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp';
        $config['max_size'] = '20000';
        $this->load->library('upload', $config);
        if($this->upload->do_upload('product_logo')){
            $phot_data = $this->upload->data();
            $photo_name = $phot_data['file_name'];
		   } else {
            $error = array('error' => $this->upload->display_errors());
            $this->load->view('product_insert', $error);
	   }
	   $company_id=$this->session->userdata('comp_id');
					$product_title = $this->input->post('product_name');
			$product_date = $this->input->post('date_release');
			$product_details = str_replace("\n","<br>",$this->input->post('product_details'));
			$price = $this->input->post('price');
			$currencies = $this->input->post('currencies');
			$data = array (
	   'company_id' => $company_id,
	   'name' => $product_title,
	   'date_release' => $product_date,
	   'product_desc' => $product_details,
	   'logo'=>$photo_name,
	   'price'=>$price." ".$currencies
	   );		
					 if($this->db->insert('products',$data)){
						 
						 $this->load->model('model_company');
						 $product_id = $this->model_company->get_feed_id('products');
		 foreach($product_id as $row){
			 $product_id2 = $row->id;
			 } 
	   
	   $news_feed = array (
	   'company_id' => $company_id,
	   'title' => $product_title ,
	   'details' => $product_details,
	   'logo'=>'products/'.$photo_name,
	   'link'=>base_url().'company/product/'.$product_id2,
	   'product_id'=>$product_id2
	   );		
	   $this->db->insert('news_feed',$news_feed);
						 
						 $flag['inserted']=1;
		  $this->load->view('product_insert' , $flag);
						 }
						
				}
		}else{
					redirect('site');
					}
	}

///////////////////////
public function add_news()
	{
		if($this->session->userdata('company_logged_in')){
			$flag['inserted']=0;
			$this->load->model('model_company');
			$this->load->library('form_validation');
		 $this->form_validation->set_rules('news_title', ' News Title ', 'required|trim|xss_clean');	
		 $this->form_validation->set_rules('news_details', ' News Description ', 'required|trim|xss_clean');
			
			if ($this->form_validation->run() == false) {
				$this->load->view("news_insert");
				}else{
					$company_id=$this->session->userdata('comp_id');
				$gallery_path = realpath(APPPATH . '../images/news/');
        $config['upload_path'] = $gallery_path;
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp';
        $config['max_size'] = '20000';
        $this->load->library('upload', $config);
        if($this->upload->do_upload('news_logo')){
            $phot_data = $this->upload->data();
            $photo_name = $phot_data['file_name'];
		   } else {
            $error = array('error' => $this->upload->display_errors());
            $this->load->view('news_insert', $error);
	   }
					$title = $this->input->post('news_title');
			$date = $this->input->post('news_date');
			$details = str_replace("\n","<br>",$this->input->post('news_details'));
			$data = array (
	   'company_id' => $company_id,
	   'title' => $title,
	   'date' => $date,
	   'details' => $details,
	   'logo'=>$photo_name
	   );		
					 if($this->db->insert('news',$data)){
						 $flag['inserted']=1;
						 
						  $this->load->model('model_company');
						 $news_id = $this->model_company->get_feed_id('news');
		 foreach($news_id as $row){
			 $news_id2 = $row->id;
			 } 
	   
	   $news_feed = array (
	   'company_id' => $company_id,
	   'title' => $title ,
	   'details' => $details,
	   'logo'=>'news/'.$photo_name,
	   'link'=>base_url().'company/news_show/'.$news_id2,
	   'news_id'=>$news_id2
	   );		
	   $this->db->insert('news_feed',$news_feed);
						 
		  $this->load->view('news_insert' , $flag);
						 }
						
				}
		}else{
					redirect('site');
					}
	}


//////////////////////
public function add_job()
	{
		if($this->session->userdata('company_logged_in')){
			$this->load->model('model_company');
			 $company_id=$this->session->userdata('comp_id');
			$data['all_dept']=$this->model_company->get_department_info($company_id);
			
			$data['inserted']=0;
			$this->load->model('model_company');
			$this->load->library('form_validation');
		 $this->form_validation->set_rules('job_name', ' Job Name ', 'required|trim|xss_clean');	
		 $this->form_validation->set_rules('department', ' Department ', 'required|trim|xss_clean');
			
			if ($this->form_validation->run() == false) {
				$this->load->view("job_insert");
				}else{
					$company_id=$this->session->userdata('comp_id');
					$name = $this->input->post('job_name');
			$department = $this->input->post('department');
			$level = $this->input->post('level');
			$description = str_replace("\n","<br>",$this->input->post('details'));
			$data = array (
	   'company_id' => $company_id,
	   'name' => $name,
	   'department' => $department,
	   'level' => $level,
	   'description'=>$description
	   );		
					 if($this->db->insert('jops',$data)){
						 $data['inserted']=1;
						 
						 $this->load->model('model_company');
						 $job_id = $this->model_company->get_feed_id('jops');
		 foreach($job_id as $row){
			 $job_id2 = $row->id;
			 } 
	   
	   $news_feed = array (
	   'company_id' => $company_id,
	   'title' => $name ,
	   'details' => $description,
	   'link'=>base_url().'company/job/'.$job_id2,
	   'job_id'=>$job_id2
	   );		
	   $this->db->insert('news_feed',$news_feed);
	   
		  $this->load->view('job_insert' ,$data);
		  ;
						 }
						
				}
		}else{
					redirect('site');
					}
	}

//////////////////////
public function add_media()
	{
		if($this->session->userdata('company_logged_in')){
			$flag['inserted']=0;
			$this->load->library('form_validation');	
		 $this->form_validation->set_rules('caption', ' Caption ', 'required|trim|xss_clean');
			
			if ($this->form_validation->run() == false) {
				$this->load->view("media_insert");
				}else{
					$gallery_path = realpath(APPPATH . '../images/company_gallery/');
        $config['upload_path'] = $gallery_path;
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp';
        $config['max_size'] = '20000';
        $this->load->library('upload', $config);
        if($this->upload->do_upload('new_media')){
            $phot_data = $this->upload->data();
            $photo_name = $phot_data['file_name'];
		   } else {
            $error = array('error' => $this->upload->display_errors());
            $this->load->view('media_insert', $error);
	   }
	   $company_id=$this->session->userdata('comp_id');
			$caption = $this->input->post('caption');
			$data = array (
	   'company_id' => $company_id,
	   'pic' => $photo_name,
	   'caption' => $caption,
	   );		
					 if($this->db->insert('media',$data)){
						 $flag['inserted']=1;
						 
						  $this->load->model('model_company');
						 $pic_id = $this->model_company->get_feed_id('media');
		 foreach($pic_id as $row){
			 $pic_id2 = $row->id;
			 } 
	   
	   $news_feed = array (
	   'company_id' => $company_id,
	   'title' => "New Photo Added " ,
	   'details' => $caption,
	   'logo'=>'company_gallery/'.$photo_name,
	   'link'=>base_url().'company/gallery/'.$company_id,
	   'pic_id'=>$pic_id2
	   );		
	   $this->db->insert('news_feed',$news_feed);
						 
		  $this->load->view('media_insert' , $flag);
						 }
						
				}
		}else{
					redirect('site');
					}
	}

////////////////////

///////////////////////////////
	function all_jobs(){
		if($this->session->userdata('company_logged_in')){
			$id=$this->session->userdata('comp_id');
			$this->load->model('model_company');
			$data['jobs']=$this->model_company->get_jobs($id);
		$this->load->view('all_jobs',$data);
		}
		else{
			redirect('site');
			}
		
		}
		///////////////////////////////
	function all_news(){
		if($this->session->userdata('company_logged_in')){
			$id=$this->session->userdata('comp_id');
			$this->load->model('model_company');
			$data['news']=$this->model_company->get_news($id);
		$this->load->view('all_news',$data);
		}
		else{
			redirect('site');
			}
		
		}
		///////////////////////////////
		function all_photos(){
		if($this->session->userdata('company_logged_in')){
			$id=$this->session->userdata('comp_id');
			$this->load->model('model_company');
			$data['picx']=$this->model_company->get_media($id);
		$this->load->view('all_photos',$data);
		}
		else{
			redirect('site');
			}
		
		}
	///////////////////////////////
		function all_events(){
		if($this->session->userdata('company_logged_in')){
			$id=$this->session->userdata('comp_id');
			$this->load->model('model_company');
			$data['events']=$this->model_company->get_events($id);
		$this->load->view('all_events',$data);
		}
		else{
			redirect('site');
			}
		
		}
		///////////////////////////////
		function all_products(){
		if($this->session->userdata('company_logged_in')){
			$id=$this->session->userdata('comp_id');
			$this->load->model('model_company');
			$data['products']=$this->model_company->get_products($id);
		$this->load->view('all_products',$data);
		}
		else{
			redirect('site');
			}
		
		}
		///////////////////
		
		public function delete_event(){
		if($this->input->post('task') && $this->input->post('task') == 'event_delete'){
			$ids = $this->input->post('ids');
			for($i=0 ; $i<count($ids) ; $i++){
			$this->db->delete('events' , "id = ".$ids[$i]."");
			}
		}	
	
}
             
}
 