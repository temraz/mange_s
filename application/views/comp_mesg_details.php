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
	<?php include('header.php');?>
    <!-- END OF HEADER -->
        
    <!-- START OF MAIN CONTENT -->
    <div class="mainwrapper">
     	<div class="mainwrapperinner">
         	
        <div class="mainleft">
          	<div class="mainleftinner">
            
              	<?php include('left_menu_user.php');?>
            	<div id="togglemenuleft"><a></a></div>
            </div><!--mainleftinner-->
        </div><!--mainleft-->
        
        <div class="maincontent">
        	<div class="maincontentinner">
            	
                
                <div class="content">
                    
                  <h1 style="border-bottom:1px dashed #e1e1e1; padding-bottom:10px"><?php if(isset($message)){?> <?php echo $message->row(0)->name; ?> Company Message <?php }?></h1>
                <br />
                 <?php if(isset($no_messages)){?>
                   
                    <center><h1 style="color:#c1c1c1">there is new Messages come for you until now</h1></center>
                    <?php }?>
                <div class="widgetcontent userlistwidget">
                            <ul>
              
            
                        <?php if(isset($message)){?>
                            	<li>
                               <div class="avatar"><img src="<?php echo base_url(); ?>images/campanies_logo/<?php echo $message->row(0)->logo ?>" width="50" height="45" /></div>
                                    <div class="info" style="margin-left:70px">
                                    	<?php echo $message->row(0)->name; ?> 
                                       <br/>
                                        <span style="font-weight:bold"></span>
                                        
                        <?php echo $message->row(0)->message ; ?><br />
                                        
                                        
                                        <br /> <a href="<?php echo base_url(); ?>employee/comp_mesg_details/<?php echo  $message->row(0)->mesg_id ?>/<?php echo  $message->row(0)->id ?>" style="float:right ; color:#c1c1c1"><?php echo $message->row(0)->date_m; ?></a>
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
        
      <?php include('user_right.php');?>
                </div><!--widgetbox-->
                
           
                
               
                
                
              
               
               </div><!--mainrightinner-->
        </div><!--mainright-->  
     	</div><!--mainwrapperinner-->
    </div><!--mainwrapper-->
	<!-- END OF MAIN CONTENT -->
    

</body>
</html>
