<script type="text/javascript" >
var base_url = "<?php echo base_url(); ?>";
</script>
<script>
jQuery(document).ready(function(){
	
	jQuery.post(base_url+"user/count_messages",{}, function(data){
			if(data.status == 'ok'){
				if(data.messages_count != 0);
					jQuery('.count_seen').html(data.messages_count);					
				}else{
					jQuery('.count_seen').html('N');
					}
			},"json");
	jQuery('#nog_btn').click(function(){		
jQuery.post(base_url+"user/seen_messages",{}, function(data){
			if(data.status == 'ok'){
					jQuery('.count_seen').html('N');					
				}
			},"json");
	});
});
</script>
<?php
if($this->session->userdata('employee_logged_in')){
$id=$this->session->userdata('emp_id');
$employee=$this->model_users->select_emp($id);
if(isset($employee)){
		foreach($employee as $row){
			$pic= $row->profile_pic;
			$first_name = $row->firstname;
			$last_name = $row->lastname;
			$name = $row->name;
			}
		}
		
}elseif($this->session->userdata('company_logged_in')){
	$id=$this->session->userdata('comp_id');
$company=$this->model_users->select_company($id);
if(isset($company)){
		foreach($company as $row){
			$pic= $row->logo;
			$name= $row->name;
			}
		}
	
	}elseif($this->session->userdata('user_logged_in')){
		$id=$this->session->userdata('user_id');
		$messages_count=$this->model_users->select_count_messages($id);
$user=$this->model_users->get_user_info($id);
if(isset($user)){
		foreach($user as $row){
			$pic= $row->pic;
			$name= $row->username;
			$gender = $row->gender;
			}
		
		}
	}
	

?>

<div class="header radius3">
    	<div class="headerinner">
        	
            <a href="<?php echo base_url();?>site/"><img src="<?php echo base_url();?>images/logo.png"  alt="" /></a>
            
              
            <div class="headright">
            	<div class="headercolumn">&nbsp;</div>
            	<div id="searchPanel" class="headercolumn">
                	<div class="searchbox">
                        <form action="" method="post">
                            <input type="text" id="keyword" name="keyword" class="radius2" value="Search here" /> 
                        </form>
                    </div><!--searchbox-->
                </div><!--headercolumn-->
            	<div id="notiPanel" class="headercolumn">
                    <div class="notiwrapper">
                        <a href="<?php echo base_url();?>user/select_user_messages/" class="notialert radius2" id="nog_btn"><span class="count_seen"></span></a>
                        <div class="notibox">
                            <ul class="tabmenu">
                                <li class="current"><a href="<?php echo base_url();?>user/select_user_messages/" class="msg">Messages
                                 (<span  class="count_seen"></span>)</a></li>
                               
                                <li><a href="<?php echo base_url();?>site/activities/"  class="act">Recent Activity (3)</a></li>
                            </ul>
                            <br clear="all" />
                            <div class="loader"><img src="<?php echo base_url();?>images/loader3.gif"  alt="Loading Icon" /> Loading...</div>
                            <div class="noticontent"></div><!--noticontent-->
                        </div><!--notibox-->
                    </div><!--notiwrapper-->
                </div><!--headercolumn-->
                <div id="userPanel" class="headercolumn">
                    <a href="" class="userinfo radius2">
                     <?php if($this->session->userdata('employee_logged_in')){ ?>
                        <img src="<?php echo base_url(); ?>images/profile/thumb_profile/<?php if (isset($pic)) { echo $pic;}?>" width="30" height="30" alt="" class="radius2" />
                        <?php }?>
                        <?php if($this->session->userdata('company_logged_in')){ ?>
                       <img src="<?php echo base_url(); ?>images/campanies_logo/<?php if (isset($pic)) { echo $pic;}?>" width="30" height="30" alt="" class="radius2" /> 
                        <?php }?>
                        
                        <?php if($this->session->userdata('user_logged_in')){ ?>
                       <img src="<?php echo base_url(); ?>images/profile/<?php if (isset($pic)) { echo $pic;}elseif($pic == NULL && $gender == 'female'){ echo "female.gif";}elseif($pic == NULL && $gender == 'male'){echo "male.gif";}?>" width="30" height="30" alt="" class="radius2" /> 
                        <?php }?>
                        
                        
                        <span><strong><?php 
						if( $this->session->userdata('employee_logged_in') && isset($first_name,$last_name)) {echo $first_name ." ". $last_name;}elseif($this->session->userdata('company_logged_in') && isset($name)){echo $name;}elseif($this->session->userdata('user_logged_in') && isset($name)){echo $name;}?>
                        
                        </strong></span>
                        
                    </a>
                    
                    <div class="userdrop">
                        <ul>
                            <li><a href="<?php if($this->session->userdata('employee_logged_in')){ echo base_url();?>employee/profile/<?php echo $id;}
							              elseif($this->session->userdata('company_logged_in')){ echo base_url().'company/profile/'.$id;}
										  elseif($this->session->userdata('user_logged_in')){ echo base_url().'user/profile/'.$id;}
						                 ?>
                                          
                                          ">Profile</a></li>
                              <?php if($this->session->userdata('employee_logged_in')){ ?>
                            <li><a href="<?php echo base_url();?>employee/settings">Account Settings</a></li><?php } ?>
                              <?php if($this->session->userdata('company_logged_in')){ ?>
                             <li><a href="<?php echo base_url();?>edit/">Account Settings</a></li>
							<?php } ?>
                             <?php if($this->session->userdata('user_logged_in')){ 
							 ?>
                             <li><a href="<?php echo base_url();?>user/edit/">Account Settings</a></li>
							<?php } ?>

                            
                            <li><a href="<?php echo base_url();?>site/logout" >Logout</a></li>
                        </ul>
                    </div><!--userdrop-->
                </div><!--headercolumn-->
            </div><!--headright-->
        
        </div><!--headerinner-->
	</div><!--header-->