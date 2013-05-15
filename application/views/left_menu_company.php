<div class="leftmenu">
<?php 
$company_id=$this->session->userdata('comp_id');
		
			if($this->model_users->select_unconfirm_emp($company_id)){
				$unconfirm_count=count($this->model_users->select_unconfirm_emp($company_id)->result());
				if($this->model_users->select_confirm_emp($company_id)){
				$data['confirm_count']=count($this->model_users->select_confirm_emp($company_id)->result());
				}else{
					$data['confirm_count']='0';
					}}
?>
<?php
$segment=$this->uri->segment(3); 
$page=$this->uri->segment(2);
$control=$this->uri->segment(1); ?>

            		<ul>
                    <li class="<?php if($segment != ''){echo "current";}?>"><a href="<?php echo base_url();?>company/profile/<?php echo $this->session->userdata('comp_id') ;?>"  class="dashboard"><span>Company Profile</span></a></li>
                    <li class="<?php if($page == '' && $control == 'edit'){echo "current";}?>"><a href="<?php echo base_url();?>edit/"  class="dashboard"><span>Update profile</span></a></li>
                    	<li class="<?php if($page == 'tree_step1' || $page == 'step2' || $page == 'step3' || $page == 'tree' && $control == 'edit' ){echo "current";}?>"><a href="<?php echo base_url();?>company/tree_step1/"  class="dashboard"><span>Company tree</span></a></li>
                        <li>
                       <a href="<?php echo base_url();?>company/unconfirm_employees/"  class="users"><span>Unconfirm employees
                     (<?php if(isset($unconfirm_count)) echo $unconfirm_count?>)</span></a></li> 
                        
                        <li  class="<?php if($page == 'all_news' || $page == 'news' && $control == 'edit'){echo "current";}?>"><a href="<?php echo base_url();?>edit/all_news/"  class="chat"><span>News</span></a></li>
                       
                        
                       
                        <li  class="<?php if($page == 'all_events' && $control == 'edit' || $page == 'event' && $control == 'edit'){echo "current";}?>"><a href="<?php echo base_url();?>edit/all_events/" class="buttons" ><span>Events</span></a></li>
                        <li  class="<?php if($page == 'all_products' && $control == 'edit' || $page == 'product' && $control == 'edit'){echo "current";}?>"><a href="<?php echo base_url();?>edit/all_products/" class="media" ><span>Products</span></a></li>
                       
                     
                       
                        <li  class="<?php if($page == 'all_jobs' && $control == 'edit' || $page == 'job' && $control == 'edit'){echo "current";}?>"><a href="<?php echo base_url();?>edit/all_jobs/" class="calendar"><span>Jobs</span></a></li>
                       
                        
                        
                        <li class="<?php if($page == 'all_photos' || $page == 'media'){echo "current";}?>"><a href="<?php echo base_url();?>edit/all_photos/"  class="media"><span>Photos</span></a></li>
                    </ul>
                        
                </div>