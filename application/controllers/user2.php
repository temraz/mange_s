<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {
    function index(){
if($this->session->userdata('user_id')){        
$id=$this->session->userdata('user_id');
echo $id;
    //$this->select_user_activity($id);
}
        
    }
	
	function select_user_activity($id){
		echo $id;
		}
	
}?>