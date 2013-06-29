<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="shortcut icon" href="<?php echo base_url();?>images/head.png" type="image/x-icon"/>
<title>Dashboard |Business Linkage</title>
<link rel="stylesheet" href="<?php echo base_url();?>css/style.css"  type="text/css" />

<script type="text/javascript" src="<?php echo base_url();?>js/jquery-1.7.min.js"></script>
 
<script type="text/javascript" src="<?php echo base_url();?>js/jquery.flot.min.js" ></script>

<script type="text/javascript" src="<?php echo base_url();?>js/jquery.flot.resize.min.js" ></script>

<script type="text/javascript" src="<?php echo base_url();?>js/jquery-ui-1.8.16.custom.min.js"></script>

<script type="text/javascript" src="<?php echo base_url();?>js/general.js" ></script>

<script type="text/javascript" src="<?php echo base_url();?>js/dashboard.js" ></script>

</head>

<body class="loggedin">

	<!-- START OF HEADER -->
	<?php include('header2.php');?>
    <!-- END OF HEADER -->
        
    <!-- START OF MAIN CONTENT -->
    <div class="mainwrapper">
     	<div class="mainwrapperinner">
         	
        <div class="mainleft">
          	<div class="mainleftinner">
            
              	<?php include('left_menu.php');?>
            	<div id="togglemenuleft"><a></a></div>
            </div><!--mainleftinner-->
        </div><!--mainleft-->
        
        <div class="maincontent">
        	<div class="maincontentinner">
            	
                  <ul class="maintabmenu">
                	<li ><a href="<?php echo base_url();?>employee/give_task/" ><?php if(isset($employee->row(0)->firstname,$employee->row(0)->lastname)) echo $employee->row(0)->firstname ." ".$employee->row(0)->lastname?> Settings</a></li>
                    <li class="current"><a href="<?php echo base_url();?>employee/tasks_status/" >Tasks status</a></li>
                </ul><!--maintabmenu-->
                
                <div class="content">
              
                 
                  
                      <h1 style="border-bottom:1px dashed #e1e1e1; padding-bottom:10px">Your Tasks for your employees </h1>
                <br />
                   <?php if(isset($finish)&& $finish==1){?>
                       <div class="notification msgsuccess">
                        
                        <p >The task has been saved that the employee finish it.</p>
                        <a class="close"></a>
                    </div>
                    <?php }?>
                    
                     <?php if(isset($notasks)&& $notasks==1){?>
                    <div class="notification msgerror">
                        <a class="close"></a>
                        <p>There are no tasks have been assigned for you until now.</p>
                    </div>
                    <?php }?>
                <div class="widgetcontent userlistwidget">
                            <ul>
              
            
                      <?php $i=1; if(isset($tasks)){foreach($tasks as $task){?>
                            	<li>
                                
                                 <div class="avatar"><img src="<?php echo base_url(); ?>images/profile/<?php echo $task->profile_pic ?>" width="50" height="45" /></div>
                            
                            
                                         <span style="font-weight:bold">
                                         
                                        <?php echo $task->firstname.' '.$task->lastname ; ?>   
                                         </span>
                                          <br />
                                    <div class="info" style="margin-left:70px">
                                    
                                    	Task number #<?php echo $i;?>
                                       
                                       <br/>
                                      
                        <?php echo substr($task->the_task,0,200).'...' ; ?><a href="<?php echo base_url();?>employee/task_manger/<?php echo $task->id; ?>/<?php echo $task->task_owner; ?>">Details</a><br />                      
                                        
                                       <?php if($task->done == 1){ ?>
                                        <ul class="buttonlist">
                          <li style="border:none;float:right"><a href="#task" id="forward" class="btn btn_link"><span>Task has been finished</span></a></li>
                          </ul>
                          <br clear="all" />
                            <?php }?> 
                                        
                                        
                                    </div><!--info-->
                                </li>
                          <?php  $i++;}}?>      
                               
                                
                            </ul>
                            <br clear="all" />
                     
                     </div><!--widgetcontent-->
                    
                    
                   
                   
                  
                    
                    
                    
                   
                 
                   
                    
                    
                </div><!--content-->
                
            </div><!--maincontentinner-->
            
           <?php include('footer.php');?>
            
        </div><!--maincontent-->
        
      <?php include('right_div.php')?>   
     
     	</div><!--mainwrapperinner-->
    </div><!--mainwrapper-->
	<!-- END OF MAIN CONTENT -->
    

</body>
</html>
