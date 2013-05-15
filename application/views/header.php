<?php
if($this->session->userdata('employee_logged_in')){
$id=$this->session->userdata('emp_id');
$employee=$this->model_users->select_emp($id);
}elseif($this->session->userdata('company_logged_in')){
	$id=$this->session->userdata('comp_id');
$company=$this->model_users->select_company($id);
	
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
                        <a href="<?php echo base_url();?>site/messages/" class="notialert radius2">9</a>
                        <div class="notibox">
                            <ul class="tabmenu">
                                <li class="current"><a href="<?php echo base_url();?>site/messages/" class="msg">Messages (2)</a></li>
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
                        <img src="<?php echo base_url();?>images/avatar.png"  alt="" class="radius2" />
                        <span><strong><?php 
						if( $this->session->userdata('employee_logged_in') && isset($employee->row(0)->firstname,$employee->row(0)->lastname)) {echo $employee->row(0)->firstname ." ".$employee->row(0)->lastname ;}elseif($this->session->userdata('company_logged_in') && isset($company->row(0)->name)){echo $company->row(0)->name;}?>
                        
                        </strong></span>
                    </a>
                    
                    <div class="userdrop">
                        <ul>
                            <li><a href="<?php if($this->session->userdata('employee_logged_in')){ echo base_url();?>employee/profile/<?php echo $id;}
							              elseif($this->session->userdata('company_logged_in')){ echo base_url().'company/profile/'.$id;}
						                 ?>
                                          
                                          ">Profile</a></li>
                              <?php if($this->session->userdata('employee_logged_in')){ ?>
                            <li><a href="">Account Settings</a></li><?php } ?>
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