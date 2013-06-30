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



<script type="text/javascript" src="<?php echo base_url();?>js/elements.js" ></script>

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
                    <?php if(isset($no_events)){?>
                    <div class="notification msgerror">
                        <a class="close"></a>
                        <p>there is new reports come for you until now</p>
                    </div>
                    <?php }?>
                            <ul>
                         
                
                
                 <?php 
				$counter = 1;
				if(isset($events) && count($events) != 0){
				foreach ($events as $row){
					$id=$row->user_id;
					$username=$row->name;
					$address=$row->address;
					$user_pic=$row->pic;
					$event_name=$row->event_name;
					$event_id=$row->event_id;
					$date=$row->event_date;
					$details=$row->details;
					$event_pic=$row->event_pic;
					
					 ?>
                     <li>
                      <br clear="all" /> 
                	<div class="one_half <?php if($counter%2 == 0){ echo "last" ; } ?>" style="width:100%">
                    	<div class="widgetbox uncollapsible" >
                            <div class="title"><h2 class="general"><span><a style="color:#eeeeee" href="<?php echo base_url(); ?>company/event/<?php echo $event_id; ?>"><?php echo $event_name;?></span></a></h2></div>
                            <div class="widgetcontent">
                          <a href="<?php echo base_url(); ?>company/event/<?php echo $event_id; ?>"><img src="<?php echo base_url();?>images/events/<?php echo $event_pic;?>" width="100%" height="170" style="border:.1em solid #666" /></a><br />
                           <h3 style="padding-top:10px"><a href="<?php echo base_url(); ?>company/event/<?php echo $event_id; ?>"><?php echo $event_name ?></a></h3><span class="radius2" style="float:right ; margin-top:-22px ; font-weight:bold"><?php echo $date;?></span>
                                <p><?php echo substr($details,0,40).'...';?></p><br/>
                                 
                               <div class="avatar"><img src="<?php echo base_url(); ?>images/profile/<?php echo $user_pic ?>" width="50" height="45" /></div>
                                    <div class="info" style="margin-left:50px;font-size:13px;margin-top:-5px;">
                                    	<a href="#user" style="cursor:default;"><?php echo $username; ?></a> 
                                       <br/>
                                       <span >
                                       <?php if(isset($address)){echo 'Address: '.$address;}else{ echo 'Address: none'; } ?>
                                       </span>
                                       <br/>
                                       <span >
                                       Want to attend
                                       </span>
                                        
                                       <div style="float:right;margin-top:-15px;">
                   		                <a  href="#" id="event_accept" class="btn  btn_link"><span>Accept</span></a>
                                        <a href="#" id="event_reject" class="btn  btn_trash"><span>Reject</span></a>
                                       </div>
                                        
                                        <br clear="all" />  
                            </div><!--widgetcontent-->
                        </div><!--widgetbox-->
                    </div><!--one_half-->
                    </li>
                    <?php $counter++;}}else{?>
                    <center><h1 style="color:#c1c1c1">There Are Not Events Yet</h1></center>
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
