<?php 
 
if($this->model_employee->is_chairman($id)){
	$chairman=1;
	}
 elseif($this->model_employee->is_manager($id)){
	
 $manager=1;
  $sector_type=$this->model_employee->sector_type_employee($id)->row(0)->type;

 }elseif($this->model_employee->is_sub_manager($id)){
	 $sub_manager=1;
	 $sector_type=$this->model_employee->sector_type_sub_manger($id)->row(0)->type;
	 }else{
		  $sector_type=$this->model_employee->sector_type_employee($id)->row(0)->type;
		 if($this->model_employee->sub_sector_type($id)){
		$sub_sector_type=$this->model_employee->sub_sector_type($id)->row(0)->type;	 
			 }
		 }
		 
		 
///////////////////////////////////////////////////////		 
	  if(isset($sector_type) && $sector_type=='legal'){
		  if(isset($manager)){
	  if($this->model_employee->show_unseen_reports($id)){
	  $reports_count=count($this->model_employee->show_unseen_reports($id)->result());
	  }else{
		  $reports_count=0;
		  } 
		}else{
		if($this->model_employee->show_unseen_reports_not_manager($id)){
	  $reports_count=count($this->model_employee->show_unseen_reports_not_manager($id)->result());
	  
	  }else{
		  $reports_count=0;
		  }
			}
	 
	  }
////////////////////////////////////////////////////////////
	 if(isset($sector_type) && $sector_type=='financial'){
		  if(isset($manager)){
	  if($this->model_employee->show_result_report_mang($id)){
	  $reports_results_count=count($this->model_employee->show_result_report_mang($id)->result());
	  }else{
		  $reports_results_count=0;
		  } 
		}elseif(isset($sub_manager)){
		if($this->model_employee->show_result_report_sub($id)){
	  $reports_results_count=count($this->model_employee->show_result_report_sub($id)->result());
	  }else{
		  $reports_results_count=0;
		  }
			}else{
				if($this->model_employee->count_result_report_emp($id)){
	  $reports_results_count=count($this->model_employee->count_result_report_emp($id)->result());
	  $emp_financial=1;
	  }else{
		  $reports_results_count=0;
		  }
				
				}
	 
	  }	
	   
//////////////////////////////////////////////////////////////////////
 if(isset($sector_type,$sub_sector_type) && $sector_type=='personnel' && $sub_sector_type=='hr'){
	 $hr=1;
	 $company_id=$this->session->userdata('company_id');
	 
	 if($this->model_employee->job_applies($company_id)){
	$new_applies=count($this->model_employee->job_applies($company_id)->result());	 
		 }else{
		 $new_applies=0;
		 }
	 
	 
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
                       <?php if(isset($emp_financial)){?>
                          <li><a href="<?php echo base_url();?>employee/staff_salaries/" class="dashboard" ><span>Edit Staff salaries</span></a></li>
                        <?php }?>
                                                  <?php if(isset($sector_type) && $sector_type=='financial'){?>
                         <li><a href="<?php echo base_url();?>employee/show_result_reports/" class="media" ><span>Reportes results (<?php if(isset($reports_results_count)){echo $reports_results_count;}?>)</span></a></li>
                        <?php }?>
                                                <?php if(isset($sector_type) && $sector_type=='legal'){?>
                         <li><a href="<?php echo base_url();?>employee/show_reports/" class="media" ><span>New Reportes(<?php if(isset($reports_count)){echo $reports_count;}?>)</span></a></li>
                        <?php }?>

                        
                          <?php if(isset($hr)){?>
                         <li><a href="<?php echo base_url();?>employee/show_jobs/" class="media" ><span>Applicants for the jobs (<?php if(isset($new_applies)){echo $new_applies;}?>)</span></a></li>
                        <?php }?>
                        
                     <!--   <li><a href="<?php echo base_url();?>site/editor/" class="media" ><span>File Editor</span></a></li> -->
                       
                     
                       
                     <!--   <li><a href="<?php echo base_url();?>site/calendar/" class="calendar"><span>Calendar</span></a></li>-->
                       
                     
                        
                    
                    
                    </ul>
                        
                </div>