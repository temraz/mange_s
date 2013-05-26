<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="shortcut icon" href="<?php echo base_url();?>images/head.png" type="image/x-icon"/>
<title>Dashboard |Business Linkage</title>
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
                    	<li><a href="<?php echo base_url();?>site/calendar/"  class="events">Latest Events</a></li>
                    	<li><a href="<?php echo base_url();?>site/chat/"  class="message">New Message</a></li>
                        <li><a href="<?php echo base_url();?>site/editor/"  class="upload">File Editor</a></li>
                    	<li><a href="calendar.html" class="events">Statistics</a></li>
                    	
                    </ul>
                    
                    <br clear="all" /><br />
                    <?php if(!isset($chairman)){?> 
                    
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
                    
                     <?php $i=1; if(isset($tasks)){foreach($tasks as $task){?>
                    <div class="widgetbox">
                        <div class="title"><h2 class="tabbed"><span>task <?php echo $i?></span>
                      
                        </h2></div>
                        <div class="widgetcontent announcement">
                    
                          <p>
                        <a href="<?php echo base_url();?>employee/task/<?php echo $task->id; ?>/<?php echo $task->emp_id; ?>"  > <span class="radius3" style="float:right; ">Details</span> </a>  </p>
                             
                            
                            
                            
                            
                             <br /><p style="padding:0px;margin-top:-40px;width:80%;margin-right:5px;">
							 
						<a href="<?php echo base_url();?>employee/task/<?php echo $task->id; ?>/<?php echo $task->emp_id; ?>"  >
                         <?php echo substr( $task->the_task,0,200)?></span></p></a>
                            <p>
                            
                        </div><!--widgetcontent-->
                    </div><!--widgetbox-->
                    <?php $i++;}}?>  
                        
                    <?php } ?>
                    
                   
                  
                    
                    
                    
                   
                 
                   
                    
                    
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
