<?php

$id=$this->session->userdata('emp_id');
$employee=$this->model_users->select_emp($id);

	if(isset($employee->row(0)->profile_pic)){
		$pic=$employee->row(0)->profile_pic;
		}
		$activity_count=count($this->model_employee->select_avtivity($id));
?>
<script type="text/javascript">
var base_url=" <?php echo base_url();?>";
</script>

<script src="<?php echo base_url();?>js/activity.js" type="text/javascript" ></script>

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
                        <a href="<?php echo base_url();?>employee/select_unseen_messages/"  class="notialert radius2"> <div class="sum"></div></a>
                        <div class="notibox">
                            <ul class="tabmenu">
                                <li class="current"><a href="<?php echo base_url();?>employee/select_unseen_messages/" class="msg">Messages
                                 (<span class="mess"> </span>)</a></li>
                                <li><a href="<?php echo base_url();?>employee/select_avtivity/"  class="act">Recent Activity (<span class="activity"> </span>)</a></li>
                            </ul>
                            <br clear="all" />
                            <div class="loader"><img src="<?php echo base_url();?>images/loader3.gif"  alt="Loading Icon" /> Loading...</div>
                            <div class="noticontent"></div><!--noticontent-->
                        </div><!--notibox-->
                    </div><!--notiwrapper-->
                </div><!--headercolumn-->
                <div id="userPanel" class="headercolumn">
                    <a href="" class="userinfo radius2">
                    
                        <img src="<?php echo base_url(); ?>images/profile/thumb_profile/<?php if (isset($pic)) { echo $pic;}?>" width="40" height="30" alt="" class="radius2" />
                        
                        
                        
                        
                        <span><strong><?php 
						if(  isset($employee->row(0)->firstname,$employee->row(0)->lastname)) {echo $employee->row(0)->firstname ." ".$employee->row(0)->lastname ;}?>
                        
                        </strong></span>
                    </a>
                    
                    <div class="userdrop">
                        <ul>
                            <li><a href="<?php if($this->session->userdata('employee_logged_in')){ echo base_url();?>employee/profile/<?php echo $id;}
							              elseif($this->session->userdata('company_logged_in')){ echo base_url().'company/profile/'.$id;}
						                 ?>
                                          
                                          ">Profile</a></li>
                              <?php if($this->session->userdata('employee_logged_in')){ ?>
                            <li><a href="<?php echo base_url();?>employee/settings">Account Settings</a></li><?php } ?>
                              <?php if($this->session->userdata('company_logged_in')){ ?>
                             <li><a href="<?php echo base_url();?>edit/">Account Settings</a></li>
							<?php } ?>

                            
                            <li><a href="<?php echo base_url();?>site/logout" >Logout</a></li>
                        </ul>
                    </div><!--userdrop-->
                </div><!--headercolumn-->
            </div><!--headright-->
        
        </div><!--headerinner-->
	</div><!--header-->