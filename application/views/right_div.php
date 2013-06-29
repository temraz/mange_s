<?php 
$emp_id=$this->session->userdata('emp_id');
			if($this->model_employee->select_avtivity($emp_id)){
				$activities=$this->model_employee->select_avtivity($emp_id);
				
				}else{
					$datano_activity=1;
				
					}

?>

  <div class="mainright">
        	<div class="mainrightinner">
            	  <div class="widgetbox">
                	<div class="title"><h2 class="calendar"><span>Calendar</span></h2></div>
                    <div class="widgetcontent padding0">
                    	<div id="datepicker"></div>
                    </div><!--widgetcontent-->
                </div><!--widgetbox-->
                <div class="widgetbox" >
                        <div class="title"><h2 class="tabbed"><span>Recent Activity</span></h2></div>
                        <div class="widgetcontent padding0">
                            <ul class="activitylist">
                            
                            <?php if(isset($activities)){ foreach($activities as $activity){?>
	
    
    <li class="user"><a href="<?php echo $activity->link ?>/<?php echo $activity->id ;?>"><strong style="font-size:12px;"><?php echo substr($activity->activity,0,35)?></strong></a></li>
    <?php }}elseif(isset($no_activity)){?>
   <p style="text-align:center"> There are no new activities </p>
    <?php }?>
    
                            	
                            </ul>
                        </div><!--widgetcontent-->
                    </div><!--widgetbox-->
                 
                
           
                
               
                
                
              
               
               </div><!--mainrightinner-->
        </div><!--mainright-->  