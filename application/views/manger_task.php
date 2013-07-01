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
         <li class="current"><a href="<?php echo base_url();?>employee/dashboard/<?php echo $id;?>" >
		 <?php if(isset($employee->row(0)->firstname,$employee->row(0)->lastname)) echo $employee->row(0)->firstname ." ".$employee->row(0)->lastname?> task borad</a></li>
                </ul><!--maintabmenu-->
                
                <div class="content">
                	
                    
                      <?php if(isset($notasks)&& $notasks==1){?>
                     <center><h1 style="color:#c1c1c1">There is no tasks have been assigned for you until now.</h1></center>
                    <?php }?>
                    
                  
                <br />
                <div class="widgetcontent userlistwidget">
                            <ul>
                             
                              <?php if(isset($start)&& $start==1){?>
                       <div class="notification msgsuccess">
                        
                        <p >Your manager has been informed that you started working in this task.</p>
                        <a class="close"></a>
                    </div>
                    <?php }?>
            
                         <?php  if(isset($task)){ ?>
                            	<li>
                               <div class="avatar"><img src="<?php echo base_url(); ?>images/profile/thumb_profile/<?php echo $task->row(0)->profile_pic ?>" width="50" height="45" /></div>
                                    <div class="info" style="margin-left:70px">
                                    <a href="<?php echo base_url(); ?>employee/chat/<?php echo  $task->row(0)->e_id ?>" title="chat with the sender" ><?php echo $task->row(0)->firstname.				 	 								' '.$task->row(0)->lastname ; ?></a> 
                                        
                                       <br/>
                                        <span >Deadline : <?php echo $task->row(0)->deadline; ?></span>
                                         <br/>
                                         
                                       
                                        
                        <?php echo $task->row(0)->the_task ; ?><br />                        
                                        
                                        
                                        
                                       <br /> 
                                         <ul class="buttonlist">
                                       
										
                                        <?php if($task->row(0)->under_construction == 1 && $task->row(0)->done == 0){ ?>
                           <li style="border:none;"><a  href="<?php echo base_url();?>employee/finish_task/<?php echo $task->row(0)->id ?>/<?php echo $task->row(0)->emp_id ?>/" class="btn btn_link" ><span >He/she finish it</span> </a></li>
                            <?php }?>
                            
                                         <?php if($task->row(0)->under_construction == 1 && $task->row(0)->done == 0){ ?>
                            
                            
                             <li style="border:none;"><a href="#task" style="cursor:default"  id="forward" class="btn btn_link"><span>Task is under construction</span></a></li>
                            <?php }?>
                            <?php if($task->row(0)->done == 1){ ?>
                            
                             <li style="border:none;"><a href="#task" style="cursor:default"  id="forward" class="btn btn_link"><span>Task has been finished</span></a></li>
                            <?php }?>
                            
                              
											
                                       
                                        </ul>
                                         <span style="text-align:right;float:right">Deadline : <?php echo $task->row(0)->deadline; ?></span>
                                        
                	<div id="success"></div>
                   
                    <div id="fail"></div>
                   
                    
                   <div id="report_validate">
                   
                   </div>
                   
                                        <br clear="all" />
                                       
                                    </div><!--info-->
                                </li>
                          <?php }?>      
                               
                                
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
