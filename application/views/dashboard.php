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
	<?php include('header.php');?>
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
                    
                    <div class="widgetbox">
                        <div class="title"><h2 class="tabbed"><span>Assignments</span></h2></div>
                        <div class="widgetcontent announcement">
                            <p>
                            <span class="radius2">Jan 19, 2013</span> <br />Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium.</p>
                            <p>
                            <span class="radius2">Jan 18, 2013</span> <br />Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo.</p>
                              <p>
                            <span class="radius2">Jan 19, 2013</span> <br />Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium.</p>
                            <p>
                            <span class="radius2">Jan 18, 2013</span> <br />Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo.</p>
                              <p>
                            <span class="radius2">Jan 19, 2013</span> <br />Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium.</p>
                            <p>
                            <span class="radius2">Jan 18, 2013</span> <br />Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo.</p>
                              <p>
                            <span class="radius2">Jan 19, 2013</span> <br />Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium.</p>
                            <p>
                            <span class="radius2">Jan 18, 2013</span> <br />Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo.</p>
                              <p>
                            <span class="radius2">Jan 19, 2013</span> <br />Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium.</p>
                            <p>
                            <span class="radius2">Jan 18, 2013</span> <br />Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo.</p>
                              <p>
                            <span class="radius2">Jan 19, 2013</span> <br />Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium.</p>
                            <p>
                            <span class="radius2">Jan 18, 2013</span> <br />Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo.</p>
                        </div><!--widgetcontent-->
                    </div><!--widgetbox-->
                        
                    
                    
                   
                  
                    
                    
                    
                   
                 
                   
                    
                    
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
