<?php

class model_compay extends CI_Model {
  
  public function get_department_number($id){
	 $this->db->where('id',$id);
			 $result = $this->db->get('company');
	  if($result){
				 $row = $result->row();
				 $depart_no= $row->department_number;
				 return $depart_no;
			}
	  }
}

?>