<?php


$id=$this->session->userdata('emp_id');
$employee=$this->model_users->select_emp($id);

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
                        <img src="<?php echo base_url();?>images/avatar.png" tppabs="http://themepixels.com/themes/demo/webpage/starlight/images/avatar.png" alt="" class="radius2" />
                        <span><strong><?php if(isset($employee->row(0)->firstname,$employee->row(0)->lastname)) echo $employee->row(0)->firstname ." ".$employee->row(0)->lastname?></strong></span>
                    </a>
                    <div class="userdrop">
                        <ul>
                            <li><a href="<?php echo base_url();?>employee/profile/<?php echo $id;?>">Profile</a></li>
                            <li><a href="">Account Settings</a></li>
                            <li><a href="<?php echo base_url();?>site/logout" >Logout</a></li>
                        </ul>
                    </div><!--userdrop-->
                </div><!--headercolumn-->
            </div><!--headright-->
        
        </div><!--headerinner-->
	</div><!--header-->