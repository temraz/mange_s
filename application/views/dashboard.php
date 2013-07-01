<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="shortcut icon" href="<?php echo base_url();?>images/head.png" type="image/x-icon"/>
<title>Dashboard | Business Linkage</title>
<link rel="stylesheet" href="<?php echo base_url();?>css/style.css"  type="text/css" />

<script type="text/javascript" src="<?php echo base_url();?>js/jquery-1.8.3.min.js"></script>
 
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
                	<li class="current"><a href="<?php echo base_url();?>employee/dashboard/<?php echo $id;?>" ><?php if(isset($employee->row(0)->firstname,$employee->row(0)->lastname)) echo $employee->row(0)->firstname ." ".$employee->row(0)->lastname?> Dashboard</a></li>
                </ul><!--maintabmenu-->
                
              <div class="content">
              
                	<ul class="widgetlist">
                    	<li><a href=""  class="events">Dashbordd</a></li>
                    	<li><a href="<?php echo base_url();?>employee/chat/"  class="message">New Message</a></li>
                        <li><a href="<?php echo base_url();?>employee/report//"  class="upload">Report</a></li>
                    	
                    	
                    </ul>
                   
                    
                    <br clear="all" />
                    
                    
                 
                  
                    <h1 style="border-bottom:1px dashed #e1e1e1; padding-bottom:10px">Your Tasks from your managers </h1>
                <br />
                <?php if(!isset($chairman)){?> 
                    
                   <?php if(isset($notasks)&& $notasks==1){?>
                 <center><h1 style="color:#c1c1c1">There Are No tasks assign for you Yet</h1></center>
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
                                      
                        <?php echo substr($task->the_task,0,200).'...' ; ?><a href="<?php echo base_url();?>employee/task/<?php echo $task->id; ?>/<?php echo $task->emp_id; ?>">Details</a><br />                      
                                        
                                        
                                        
                                        
                                    </div><!--info-->
                                </li>
                          <?php  $i++;}}}?>      
                               
                                
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
