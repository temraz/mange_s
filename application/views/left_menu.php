<?php 
 if($this->model_employee->is_manager($id)){
 $manager=1;
 }elseif($this->model_employee->is_sub_manager($id)){
	 $sub_manage=1;
	 }else{
		 $manager=0;
		 $sub_manager=0;
		 }
	
?>
<div class="leftmenu">
            		<ul>
                    	<li ><a href="<?php echo base_url();?>employee/dashboard/<?php echo $id;?>"  class="dashboard"><span>Dashboard</span></a></li>
                        <?php if(isset($manager) && $manager==1){?>
                        <li><a href="<?php echo base_url();?>employee/give_task/" class="buttons" ><span>Give taskes to employees</span></a></li>
                       <?php }elseif(isset($sub_manager) && $sub_manager==1){?>
						   <li><a href="<?php echo base_url();?>employee/give_task/" class="buttons" ><span>Give taskes to submanager</span></a></li>
                            <li><a href="<?php echo base_url();?>employee/give_task/" class="users" ><span>conect to other department</span></a></li>
						  <?php }?>
                        
                       
                        <li><a href="<?php echo base_url();?>site/meetings/" class="buttons" ><span>Meetings</span></a></li>
                        <li><a href="<?php echo base_url();?>site/editor/" class="media" ><span>File Editor</span></a></li>
                       
                     
                       
                        <li><a href="<?php echo base_url();?>site/calendar/" class="calendar"><span>Calendar</span></a></li>
                       
                        <li><a href="<?php echo base_url();?>site/chat/"  class="chat"><span>Messages</span></a></li>
                        
                        <li><a href="<?php echo base_url();?>site/media/" class="media"><span>Media</span></a></li>
                        <li><a href="<?php echo base_url();?>site/load_404/"  class="error"><span>Error Pages</span></a></li>
                    </ul>
                        
                </div>