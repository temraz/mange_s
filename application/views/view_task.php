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
                	<li class="current"><a href="<?php echo base_url();?>employee/dashboard/<?php echo $id;?>" ><?php if(isset($employee->row(0)->firstname,$employee->row(0)->lastname)) echo $employee->row(0)->firstname ." ".$employee->row(0)->lastname?> Dashboard</a></li>
                </ul><!--maintabmenu-->
                
                <div class="content">
                	
                    
                    <br clear="all" />
                    <?php if(isset($manager)||isset($sub_manager)){?> 
                    <?php if(isset($start)&& $start==1){?>
                       <div class="notification msgsuccess">
                        
                        <p >Your manager has been informed that you started working in this task.</p>
                        <a class="close"></a>
                    </div>
                    <?php }?>
                     <?php if(isset($notasks)&& $notasks==1){?>
                     <div class="widgetbox">
                        <div class="title"><h2 class="tabbed"><span>tasks</span></h2></div>
                        <div class="widgetcontent announcement">
                        
                    <div class="notification msgalert">
                        
                        <p style="margin-left:70px;padding-top:15px">There is no tasks have been assigned for you until now.</p>
                        <a class="close"></a>
                    </div>
                    </div><!--widgetcontent-->
                    </div><!--widgetbox-->
                    <?php }?>
                    
                     <?php  if(isset($task)){ ?>
                    <div class="widgetbox">
                        <div class="title"><h2 class="tabbed"><span>task details</span>
                      
                        </h2></div>
                        <div class="widgetcontent announcement">
                          <p>
                             
                             
                             <span class="radius2" style="float:right">Deadline: <?php echo $task->row(0)->deadline;?></span>
                            <?php if($task->row(0)->under_construction == 1 && $task->row(0)->done == 0){ ?>
                            
                            <span class="radius3" style="background-color:#960;float:right;margin-right:5px">under construction</span> 
                            
                            <?php }?>
                            <?php if($task->row(0)->done == 1){ ?>
                            <span class="radius3" style="background-color:#0C0;float:right;margin-right:5px">✓ Done</span> 
                            <?php }?>
                            
                             <br /><p style="padding:0px;margin-top:-40px;width:80%;margin-right:5px;"><?php echo $task->row(0)->the_task?></span>
                             <br />
                             <br />
                              <?php if($task->row(0)->under_construction == 0 && $task->row(0)->done == 0){ ?>
                           <a href="<?php echo base_url();?>employee/start_task/<?php echo $task->row(0)->id ;?>/<?php echo $task->row(0)->task_owner;?>">  <span class="radius3" style="background-color:#0C0;">Start it</span> </a>
                           <?php }?>
                           
                             </p>
                             
                             
                            <p>
                            
                        </div><!--widgetcontent-->
                    </div><!--widgetbox-->
                    <?php }}?>  
                        
                   
                    
                   
                  
                    
                    
                    
                   
                 
                   
                    
                    
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
