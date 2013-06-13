<?php 
 
if($this->model_employee->is_chairman($id)){
	$chairman=1;
	}
 elseif($this->model_employee->is_manager($id)){
	
 $manager=1;
  $sector_type=$this->model_employee->sector_type_employee($id)->row(0)->type;
  if($sector_type=='legal'){
	  if($this->model_employee->show_unseen_reports($id)){
	  $reports_count=count($this->model_employee->show_unseen_reports($id)->result());
	  }else{
		  $reports_count=0;
		  }
	  }
 }elseif($this->model_employee->is_sub_manager($id)){
	 $sub_manager=1;
	 $sector_type=$this->model_employee->sector_type_sub_manger($id)->row(0)->type;
	 }else{
		 $sector_type=$this->model_employee->sector_type_employee($id)->row(0)->type;
		 }
	
		 
	
?>
<div class="leftmenu">
            		<ul>
                    	<li ><a href="<?php echo base_url();?>employee/dashboard/<?php echo $id;?>"  class="dashboard"><span>Dashboard</span></a></li>
                        
                        <?php if(isset($chairman) && $chairman==1){?>
                        <li><a href="<?php echo base_url();?>employee/give_task/" class="buttons" ><span>Give taskes to the managers</span></a></li> 
                         <li><a href="<?php echo base_url();?>employee/tasks_status/" class="buttons" ><span>Tasks</span></a></li> 
                     
                        
                        <?php }elseif(isset($manager) && $manager==1){?>
                        <li><a href="<?php echo base_url();?>employee/give_task/" class="buttons" ><span>Give taskes to submanager</span></a></li>
                        <li><a href="<?php echo base_url();?>employee/tasks_status/" class="buttons" ><span>Tasks</span></a></li> 
                       
                            
                        
                       <?php }elseif(isset($sub_manager) && $sub_manager==1){?>
						<li><a href="<?php echo base_url();?>employee/give_task/" class="buttons" ><span>Give taskes to employees</span></a></li>   
                        <li><a href="<?php echo base_url();?>employee/tasks_status/" class="buttons" ><span>Tasks</span></a></li> 
                        
					    <?php }?>
                         <li><a href="<?php echo base_url();?>employee/report/" class="elements" ><span>Reporting an employee</span></a></li> 
                           <li><a href="<?php echo base_url();?>employee/chat/"  class="chat"><span>Chat with my coworkers</span></a></li>
                       
                        <li><a href="<?php echo base_url();?>employee/mettings/" class="chat" ><span>Online conversation</span></a></li>
                        <?php if(isset($sector_type) && $sector_type=='legal'){?>
                         <li><a href="<?php echo base_url();?>employee/show_reports/" class="media" ><span>Reported employees (<?php if(isset($reports_count)){echo $reports_count;}?>)</span></a></li>
                        <?php }?>
                     <!--   <li><a href="<?php echo base_url();?>site/editor/" class="media" ><span>File Editor</span></a></li> -->
                       
                     
                       
                     <!--   <li><a href="<?php echo base_url();?>site/calendar/" class="calendar"><span>Calendar</span></a></li>-->
                       
                     
                        
                    
                    
                    </ul>
                        
                </div>