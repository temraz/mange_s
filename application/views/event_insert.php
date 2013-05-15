<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Dashboard |Business Linkage</title>
<link rel="stylesheet" href="<?php echo base_url();?>css/style.css"  type="text/css" />


<script type="text/javascript" src="<?php echo base_url();?>js/jquery-1.7.min.js"></script>
 
<script type="text/javascript" src="<?php echo base_url();?>js/jquery.flot.min.js" ></script>

<script type="text/javascript" src="<?php echo base_url();?>js/jquery.flot.resize.min.js" ></script>

<script type="text/javascript" src="<?php echo base_url();?>js/jquery-ui-1.8.16.custom.min.js"></script>

<script type="text/javascript" src="<?php echo base_url();?>js/general.js" ></script>
<script type="text/javascript" src="<?php echo base_url();?>js/colorpicker.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>js/dashboard.js" ></script>
<script type="text/javascript" src="<?php echo base_url();?>js/jquery.jgrowl.js" ></script>
<script type="text/javascript" src="<?php echo base_url();?>js/jquery.alerts.js" ></script>

<script type="text/javascript" src="<?php echo base_url();?>js/elements.js" ></script>
<style>
.follow  {float:right;margin-right:50px;margin-top:-20px; border-radius:3px; font-family:Verdana, Geneva, sans-serif }
.follow button {width:80px}
</style>
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
            
              	  	<?php  if($this->session->userdata('company_logged_in')){ include('left_menu_company.php'); }?>
            	<div id="togglemenuleft"><a></a></div>
            </div><!--mainleftinner-->
        </div><!--mainleft-->
        
        <div class="maincontent" style="margin-right:0 ">
        	<div class="maincontentinner" >
            	
                <?php include('company_nav.php');?><!--maintabmenu-->
                
                <div class="content">
                <?php echo form_open_multipart('edit/add_event' , array( 'id'=> "form1" , "class"=>"stdform")); ?>
                <?php if (validation_errors()){ ?>
                                <div class="notification msgerror">
                        <a class="close"></a>
                        <p><?php echo validation_errors(); ?></p>
                    </div>
                                <?php } if(isset($inserted) && $inserted == 1){?>
                                <div class="notification msgsuccess">
                        <a class="close"></a>
                        <p>The Event is published successfully </p>
                    </div>
                            <?php } ?>
                    	<p>
                        	<label>New Event Title</label>
                            <span class="field"><input type="text" name="event_title" required  /></span>
                        </p>
                        
                         <p>
                        	<label>Event Logo</label>
                            <span class="field"><input type="file" name="event_logo"  required /></span>
                        </p>
                        
                        <p>
                        	<label>Event's Date</label>
                            <span class="field"><input type="date" name="event_date" required /></span>
                        </p>

                        
                        
                        <p>
                        	<label>Description</label>
                            <span class="field"><textarea cols="100" rows="5" name="event_details" class="mediuminput" required ></textarea></span> 
                        </p>
                        
                        <br />
                        
                        <p class="stdformbutton">
                        	<button class="submit radius2">Create</button>
                        </p>
                    </form>
                    
                
                                  
                                  <br clear="all" />     
                    
                    
                </div><!--content-->
                
            </div><!--maincontentinner-->
            
           <?php include('footer.php');?>
            
        </div><!--maincontent-->
        
      
     	</div><!--mainwrapperinner-->
    </div><!--mainwrapper-->
	<!-- END OF MAIN CONTENT -->

</body>
</html>
