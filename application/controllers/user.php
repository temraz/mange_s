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
}

?>