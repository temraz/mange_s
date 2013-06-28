<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Dashboard |Business Linkage</title>
<link rel="shortcut icon" href="<?php echo base_url();?>images/head.png" type="image/x-icon"/>
<link rel="stylesheet" href="<?php echo base_url();?>css/style.css"  type="text/css" />

<script type="text/javascript" src="<?php echo base_url();?>js/jquery-1.7.min.js"></script>
 
<script type="text/javascript" src="<?php echo base_url();?>js/jquery.flot.min.js" ></script>

<script type="text/javascript" src="<?php echo base_url();?>js/jquery.flot.resize.min.js" ></script>

<script type="text/javascript" src="<?php echo base_url();?>js/jquery-ui-1.8.16.custom.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>js/jquery.colorbox-min.js" ></script>
<script type="text/javascript" src="<?php echo base_url();?>js/general.js" ></script>
<script type="text/javascript" src="<?php echo base_url();?>js/colorpicker.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>js/dashboard.js" ></script>
<script type="text/javascript" src="<?php echo base_url();?>js/jquery.jgrowl.js" ></script>
<script type="text/javascript" src="<?php echo base_url();?>js/media.js" ></script>

<script type="text/javascript" src="<?php echo base_url();?>js/elements.js" ></script>

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
            	
                
                <div class="content">
                    
                  <h1 style="border-bottom:1px dashed #e1e1e1; padding-bottom:10px">Applicants for the jobs</h1>
                <br />
                 <?php if(isset($no_reports)){?>
                    <div class="notification msgerror">
                        <a class="close"></a>
                        <p>there is no interview for you until now</p>
                    </div>
                    <?php }?>
                <div class="widgetcontent userlistwidget">
                            <ul>
              
            
                        <?php if(isset($jobs)){foreach($jobs as $job){?>
                            	<li>
                                <?php $pic=$this->model_users->select_user($job->user_id)->row(0)->pic;?>
                                  <?php $name=$this->model_users->select_user($job->user_id)->row(0)->name;?>
                                 <div class="avatar"><img src="<?php echo base_url(); ?>images/profile/<?php echo $pic ?>" width="50" height="45" /></div>
                            
                            
                                         <span style="font-weight:bold">
                                         <?php
										 echo $name ?>
                                          
                                         </span>
                                          <br />
                                    <div class="info" style="margin-left:70px">
                                    
                                    	<?php echo $job->name ; ?> 
                                       
                                       <br/>
                                      
                        <?php echo substr($job->description,0,200).'...' ; ?><a href="<?php echo base_url(); ?>employee/job/<?php echo  $job->id ; ?>/<?php echo  $job->company_id ;?>/<?php echo $job->user_id?>">Details</a><br />                      
                                        
                                        
                                        
                                        
                                    </div><!--info-->
                                </li>
                          <?php }}?>      
                               
                                
                            </ul>
                            <br clear="all" />
                     
                        </div><!--widgetcontent-->
                    
                    
                    
                </div><!--content-->
                
            </div><!--maincontentinner-->
            
           <?php include('footer.php');?>
            
        </div><!--maincontent-->
        
       <?php include('right_div.php') ?>
                </div><!--widgetbox-->
                
           
                
               
                
                
              
               
               </div><!--mainrightinner-->
        </div><!--mainright-->  
     	</div><!--mainwrapperinner-->
    </div><!--mainwrapper-->
	<!-- END OF MAIN CONTENT -->
    

</body>
</html>
