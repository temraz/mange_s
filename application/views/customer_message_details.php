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
<script type="text/javascript">
var base_url=" <?php echo base_url();?>";
</script>

  <script src="<?php echo base_url();?>js/insert.js" type="text/javascript" ></script>

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
                    
                  <h1 style="border-bottom:1px dashed #e1e1e1; padding-bottom:10px">Customer Messages</h1>
                <br />
                 <?php if(isset($no_messages)){?>
                   
                    <center><h1 style="color:#c1c1c1">there is new Messages come for you until now</h1></center>
                    <?php }?>
                <div class="widgetcontent userlistwidget">
                            <ul>
              
            
                        <?php if(isset($message)){?>
                            	<li>
                               <div class="avatar"><img src="<?php echo base_url(); ?>images/profile/thumb_profile/<?php echo $message->row(0)->pic ?>" width="50" height="45" /></div>
                                    <div class="info" style="margin-left:70px">
                                    	<?php echo $message->row(0)->name; ?> 
                                       <br/>
                                        <span style="font-weight:bold"></span>
                                        
                        <?php echo substr($message->row(0)->message,0,200).'...' ; ?><br />
                                        
                                        
                                        <br /> <a href="<?php echo base_url(); ?>employee/customer_message_details/<?php echo  $message->row(0)->mesg_id ?>/<?php echo  $message->row(0)->to_c ?>" style="float:right ; color:#c1c1c1"><?php echo $message->row(0)->date_m; ?></a>
                                        <br clear="all" />
                                    </div><!--info-->
                                </li>
                          <?php }?>      
                               
                                
                            </ul>
                            <br clear="all" />
                            <div id="success"></div>
                   
                    <div id="fail"></div>
                   
                    
                   <div id="report_validate">
                   
                   </div>
                             <?php echo form_open('#',array('id'=>'form2','class'=>'stdform stdform2',));  ?>
                    	<p>
                        	<label>The Message</label>
                            <span class="field">
                          
                           
                         <textarea name="replay" id="mesg" style="width:100%;height:70px;" ></textarea>
                          <input type="hidden" name="t" id="user_id" value="<?php echo $message->row(0)->from_u; ?>" />
                           <input type="hidden" name="t" id="mesg_id" value="<?php echo $message->row(0)->mesg_id; ?>" />
                           <input type="hidden" name="t" id="comp_id" value="<?php echo $this->session->userdata('company_id'); ?>" />
                            </span>
                         </p>
                       
                  
                        <p class="stdformbutton">
                        	<button type="button" id="replay_button" class="submit radius2">replay</button>
                        </p>
                    </form>
                    
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
