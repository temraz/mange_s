<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Dashboard |Business Linkage</title>
<link rel="shortcut icon" href="<?php echo base_url();?>images/head.png" type="image/x-icon"/>
<link rel="stylesheet" href="<?php echo base_url();?>css/style.css"  type="text/css" />

<script type="text/javascript" src="<?php echo base_url();?>js/jquery-1.7.min.js"></script>
 
<script type="text/javascript" src="<?php echo base_url();?>js/jquery.flot.min.js" ></script>

<script type="text/javascript" src="<?php echo base_url();?>js/jquery.flot.resize.min.js" ></script>

<script type="text/javascript" src="<?php echo base_url();?>js/jquery-ui-1.8.16.custom.min.js"></script>
<script type="text/javascript" >
var base_url = "<?php echo base_url(); ?>";
</script>
<script type="text/javascript" src="<?php echo base_url();?>js/general.js" ></script>

<script type="text/javascript" src="<?php echo base_url();?>js/dashboard.js" ></script>
<script type="text/javascript" src="<?php echo base_url();?>js/edit_profile.js" ></script>
<script src='<?php echo base_url();?>js/jquery.autosize.js'></script>
<script type="text/javascript" src="<?php echo base_url();?>js/jquery.alerts.js" ></script>
<?php require("all_countries.php");?>
<style>
<?php if($this->session->userdata('user_id') == $this->uri->segment(3)){ ?>
.edit{float:right ; cursor:pointer ; margin-right:15px ; display:none }
.delete{float:right ; cursor:pointer ; margin-right:10px ; display:none }
.delete_skill{float:right ; cursor:pointer ; margin-right:10px ; display:none }
.delete_edu{float:right ; cursor:pointer ; display:none }
.expr_one{border-radius:5px ;padding:10px 10px 20px 10px}
.expr_one:hover{ border:1px dashed #CCC ; background:#FDFFFA}
.expr_one:hover .delete{display:block}
.one_half:hover .edit{display:block}
.one_half{border-radius:3px}
.one_half:hover{}
.title{margin-left:15px}
.text{padding:10px}

.skill_one{border-radius:5px ;padding:10px 10px 20px 10px}
.skill_one:hover{ border:1px dashed #CCC ; background:#FDFFFA}
.skill_one:hover .delete_skill{display:block}

.edu_one{border-radius:5px ;padding: 10px 20px 10px}
.edu_one:hover{ border:1px dashed #CCC ; background:#FDFFFA}
.edu_one:hover .delete_edu{display:block}
<?php } ?>

</style>

 <script>
jQuery(document).ready(function() {
  jQuery(".following_items").hide();
  //toggle the componenet with class msg_body
  jQuery(".show_content").click(function()
  {
    jQuery(".following_items").slideToggle(700);
	jQuery('html, body').stop().animate({scrollTop: jQuery(".following_items").offset().top}, 2000);
  });
});

    </script>
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
               
               
                        <div id="reject_div">
                         <ul class="maintabmenu">
                	<li class="current" style="border:none"><a href="#">date of the interview and other details</a></li>
                </ul><!--maintabmenu-->
                
                <div class="content chatcontent" style="height:600px;">
                   
                   <div id="chatmessage" class="chatmessage" style="height:530px;">
                   		<div id="chatmessageinner">
                        <?php if(isset($messages)){foreach($messages as $message){
							
							?>
                       
                       
                       
                        <li style="padding:5px;border-bottom: 1px dashed #ddd;;list-style:none">
                               <div class="avatar" style="padding: 2px; border: 1px solid #eee;width:50px">
                               <img src="<?php echo base_url() ;?>images/profile/thumb_profile/<?php echo  $message->profile_pic ;?>" width="50" height="45" /></div>
                                <div class="info" style="margin-left:60px;margin-top:-54px;">
                                    	<?php echo $message->firstname ;?> <?php echo $message->lastname ;?> 
                                       <br/>
                                       
                                         <?php echo $message->message ?>
                                         <span style="float:right;color:#369;margin-top:10px"><?php echo $message->message_date ;?></span>
                                        <br clear="all" />
                                    </div><!--info-->
                                </li>
                        <?php }}else{ ?>
				
						<h2 style="text-align:center;color:#369;margin-top:230px">Sorry there is no messages about this job<br />Until now</h2>
						<?php }?>
                        </div><!--chatmessageinner-->
                   </div><!--chatmessage-->
                   	
                 
                    
                        </div><!--widgetcontent-->
                        </div>
                    
                    
               
                    <br clear="all" />
                   
                </div><!--content-->
                
            </div><!--maincontentinner-->
            
           <?php include('footer.php');?>
            
        </div><!--maincontent-->
        
      <?php include('user_right.php');?>
     	</div><!--mainwrapperinner-->
    </div><!--mainwrapper-->
	<!-- END OF MAIN CONTENT -->
   
</body>
</html>
