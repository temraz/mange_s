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

<script type="text/javascript" src="<?php echo base_url();?>js/general.js" ></script>

<script type="text/javascript" src="<?php echo base_url();?>js/dashboard.js" ></script>





<script type="text/javascript">
var base_url=" <?php echo base_url();?>";
</script>

 <script src="<?php echo base_url();?>js/search.js" type="text/javascript" ></script>
  <script src="<?php echo base_url();?>js/insert.js" type="text/javascript" ></script>
<link rel="stylesheet" href="<?php echo base_url();?>css/chosen.css" />



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
                <h1 style="border-bottom:1px dashed #e1e1e1; padding-bottom:10px">
                  Organize Events
                  </h1>
                <br />
                
                <div class="widgetcontent userlistwidget">
                <div id="success"></div>
                   
                    <div id="fail"></div>
                   
                    
                   <div id="report_validate">
                   
                   </div>
                    
                            <ul>
                         
                
                
                 <?php 
				$counter = 1;
				if(isset($event)){
				
					$id=$event->row(0)->user_id;
					$username=$event->row(0)->name;
					$address=$event->row(0)->address;
					$user_pic=$event->row(0)->pic;
					$event_name=$event->row(0)->event_name;
					$event_id=$event->row(0)->event_id;
					$date=$event->row(0)->event_date;
					$details=$event->row(0)->details;
					$event_pic=$event->row(0)->event_pic;
					$about=$event->row(0)->event_pic;
					$attend_id=$event->row(0)->attend_id;
					
					 ?>
                     <li>
                      
                	
                    
                    
                    
                                 <h3 style="float:right;padding-right:10px;"><?php echo $event_name;?></h3></br>
                    
                               <div class="avatar" style="float:right;"><img src="<?php echo base_url(); ?>images/events/thumbs/<?php echo $event_pic ?>" width="150" height="125" />
                               
                               </div>  
                              
                               <div class="avatar"><img src="<?php echo base_url(); ?>images/profile/thumb_profile/<?php echo $user_pic ?>" width="50" height="45" /></div>
                                    <div class="info" style="margin-left:70px;font-size:13px;margin-top:-5px;">
                                    	<a href="#user" style="cursor:default;"><?php echo $username; ?></a> 
                                       <br/>
                                       <span >
                                       <?php if(isset($address)){echo 'Address: '.$address;}else{ echo 'Address: none'; } ?>
                                       </span>
                                       <br/>
                                       <span >
                                       Want to attend : <span><?php echo $event_name;?></span>
                                       </span>
                                       <br/>
                                       <br/>
                                       <?php if(isset($about)){?>
                                       <span>
                                       about <?php echo $username?> : <?php echo $about?>
                                       </span>
                                       <?php }?>
                                         <br/>
                                       <br/>
                                          <p><?php echo $details.'...';?></p>
                                          
                                          
                                          <br/><br/>
                                          <span class="radius2" style="float:right ; margin-top:-22px ; font-weight:bold"><?php echo $date;?></span>
                                        
                                     
                                        
                              <ul class="buttonlist">
                                         <input type="hidden" id="attend_id" value="<?php echo $attend_id ?>" />
                                          <input type="hidden" id="event_name" value="<?php echo $event_name ?>" />
                                          <input type="hidden" id="event_id" value="<?php echo $event_id ?>" />
                                          <input type="hidden" id="user_id" value="<?php echo $id ?>" />
                   		                <li style="border:none;"><a href="#accept" id="accept_event" class="btn  btn_link"><span>Accept</span></a></li>
                                        <li style="border:none;"><a href="#reject" id="reject_event" class="btn  btn_trash"><span>Reject</span></a></li>
                                        
                                        
                                        
                                        </ul>
                    
                    </li>
                    <?php }else{?>
                    <center><h1 style="color:#c1c1c1">There Are Not Event Yet</h1></center>
                    <?php } ?>
                   
                    
                
                
                </ul>
                </div>
                                  
                                  <br clear="all" />     
         
                    
                    
                </div><!--content-->
                    <?php include('footer.php');?>
            </div><!--maincontentinner-->
            
       
            
        </div><!--maincontent-->
         <?php include('right_div.php')?>   
                
               
                
                
              
               
               </div><!--mainrightinner-->
        </div><!--mainright-->  
     	</div><!--mainwrapperinner-->
    </div><!--mainwrapper-->
	<!-- END OF MAIN CONTENT -->
   
<script type="text/javascript" src="<?php echo base_url();?>js/jquery-1.7.min.js"></script>
 <script type="text/javascript">
jQuery(document).ready(function() {
			  // Button which will activate our modal
			   	jQuery('#forward_form').hide();
				//jQuery('#forward').click(function(){
				//	jQuery('#forward_form').fadeIn('slow', function() {
// Animation complete
//});


				jQuery('#forward').toggle(
function () {
jQuery('#forward_form').fadeIn('slow', function() {
// Animation complete

});
},
function () {
jQuery('#forward_form').fadeOut('slow', function() {
// Animation complete
});
}
);

////////////////////////////////////////////////

		   	jQuery('#result_form').hide();
				//jQuery('#forward').click(function(){
				//	jQuery('#forward_form').fadeIn('slow', function() {
// Animation complete
//});


				jQuery('#report_result2').toggle(
function () {
jQuery('#result_form').fadeIn('slow', function() {
// Animation complete

});
},
function () {
jQuery('#result_form').fadeOut('slow', function() {
// Animation complete
});
}
);
////////////////////////////////////////////////
		
			});
		
</script>
<script type="text/javascript">
var base_url=" <?php echo base_url();?>";
</script>
<script type="text/javascript" src="<?php echo base_url();?>js/jquery-ui-1.8.16.custom.min.js"></script>
 
 

<script src="<?php echo base_url();?>js/insert.js" type="text/javascript" ></script>
<script src="<?php echo base_url();?>js/activity.js" type="text/javascript" ></script>


  <script src="<?php echo base_url();?>js/chosen.jquery.js" type="text/javascript"></script>
  <script type="text/javascript"> 
    var config = {
      '.chzn-select'           : {},
      '.chzn-select-deselect'  : {allow_single_deselect:true},
      '.chzn-select-no-single' : {disable_search_threshold:10},
      '.chzn-select-no-results': {no_results_text:'Oops, nothing found!'},
      '.chzn-select-width'     : {width:"95%"}
    }
    for (var selector in config) {
      $(selector).chosen(config[selector]);
    }
  </script>


</body>
</html>
