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
               
             <h1 style="border-bottom:1px dashed #e1e1e1; padding-bottom:10px">Attends</h1>
                <br />
                <?php 
				$counter = 1;
				if(isset($events_attend) && count($events_attend) != 0){
						   foreach($events_attend as $row){ 
						   $event_id = $row->event_id;
						   $events = $this->model_company->get_event($event_id);
				foreach ($events as $row){
					$id=$row->id;
					$name=$row->name;
					$date=$row->date;
					$details=$row->details;
					$pic=$row->pic;
				}
					 ?>
                	<div class="one_half <?php if($counter%2 == 0){ echo "last" ; } ?>">
                    	<div class="widgetbox uncollapsible">
                            <div class="title"><h2 class="general"><span><?php echo $name;?></span></h2></div>
                            <div class="widgetcontent">
                            <img src="<?php echo base_url();?>images/events/<?php echo $pic;?>" width="100%" height="170" style="border:.1em solid #666" /><br />
                           <h3 style="padding-top:10px"><a href="<?php echo base_url(); ?>company/event/<?php echo $id; ?>"><?php echo $name ?></a></h3><span class="radius2" style="float:right ; margin-top:-22px ; font-weight:bold"><?php echo $date;?></span>
                                <p><?php echo substr($details,0,40).'...';?> <small><a href="<?php echo base_url(); ?>company/event/<?php echo $id; ?>">Show Details</a></small></p>
                            </div><!--widgetcontent-->
                        </div><!--widgetbox-->
                    </div><!--one_half-->
                    <?php $counter++;}}else{?>
                    <center><h1 style="color:#c1c1c1">There Are Not Attends Yet</h1></center>
                    <?php } ?>
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
