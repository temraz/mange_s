<?php

class model_company extends CI_Model {
  
  public function get_department_number($id){
	 $this->db->where('id',$id);
			 $result = $this->db->get('company');
	  if($result){
				 $row = $result->row();
				 $depart_no= $row->department_number;
				 return $depart_no;
			}
	  }
	   public function get_sub_department_by_id($id){
	 $this->db->where('department_id',$id);
			 $query = $this->db->get('sub_department');
	  return $query->result();
	  }
	  
	  public function get_company_info($id){
	 $this->db->where('id',$id);
			 $query= $this->db->get('company');
				 return $query->result();
	  }
	  
	   public function get_department_info($company_id){
	 $this->db->where('company_id',$company_id);
			 $query= $this->db->get('department');
				 return $query->result();
	  }
	   public function get_sub_department_info($company_id){
	 $this->db->where('company_id',$company_id);
			 $query= $this->db->get('sub_department');
				 return $query->result();
	  }
	  
	   public function is_company_valid($id,$table){
			 $this->db->where('company_id',$id);
			 $query = $this->db->get($table);
			 
			 if($query->num_rows() != 0){
				 return true;
				 } else {
					 
					 return false ;
					 }
			 }
			 
			 public function get_events($company_id){
	 $this->db->where('company_id',$company_id);
			 $query= $this->db->get('events');
				 return $query->result();
	  } 
	  
	   public function get_products($company_id){
	 $this->db->where('company_id',$company_id);
			 $query= $this->db->get('products');
				 return $query->result();
	  }
	  
		
		 public function get_news($company_id){
	 $this->db->where('company_id',$company_id);
			 $query= $this->db->get('news');
				 return $query->result();
	  }	 
	  
	   public function get_media($company_id){
	 $this->db->where('company_id',$company_id);
			 $query= $this->db->get('media');
				 return $query->result();
	   }
	   
	    public function get_jobs($company_id){
	 $this->db->where('company_id',$company_id);
			 $query= $this->db->get('jops');
				 return $query->result();
	  }
	  
	  
	   public function get_job($id){
	 $this->db->where('id',$id);
			 $query= $this->db->get('jops');
				 return $query->result();
	  }
	  
	  	 public function get_event($id){
	 $this->db->where('id',$id);
			 $query= $this->db->get('events');
				 return $query->result();
	  } 
	  
	   public function get_product($id){
	 $this->db->where('id',$id);
			 $query= $this->db->get('products');
				 return $query->result();
	  }
	  
		
		 public function get_new($id){
	 $this->db->where('id',$id);
			 $query= $this->db->get('news');
				 return $query->result();
	  }	 
	 
	 public function get_company_city($id){
		 $this->db->where('id',$id);
			 $query= $this->db->get('company');
				if($query){
				 $row = $query->row();
				 $country= $row->country;
				 return $country;
			}
		 }
		 
		 public function is_id_valid($id,$table){
			 $this->db->where('id',$id);
			 $query = $this->db->get($table);
			 
			 if($query->num_rows() != 0){
				 return 1;
				 } else {
					 
					 return 0 ;
					 }
			 }
			 
			 //////////////////
			 public function get_feed_id($table){
     	$query="SELECT id FROM $table ORDER BY id DESC LIMIT 1 ";
	$result=$this->db->query($query);
	  return $result->result();
	  }	
	  
	  ///////////////
	  public function get_news_feed(){
			 $query="SELECT * FROM news_feed ORDER BY id DESC ";
	$result=$this->db->query($query);
	  return $result->result();
	  }
	  
	  ///////////////
	    public function feed_by_id($id){
			$query="SELECT * FROM news_feed WHERE company_id=$id ORDER BY id DESC ";
	$result=$this->db->query($query);
	  return $result->result();
	  
	  }
}

?>