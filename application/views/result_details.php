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
                
                
                
                     <?php if(isset($no_reports)){?>
                    <div class="notification msgerror">
                        <a class="close"></a>
                        <p>there is new report until now</p>
                    </div>
                    <?php }?>
                  <h1 style="border-bottom:1px dashed #e1e1e1; padding-bottom:10px">
                   <?php if(isset($report)){?>
                  	<a href="" >report number #<?php echo $report->row(0)->report_id?></a>
				  <?php }?>
                   	</a>
                  </h1>
                <br />
                <div class="widgetcontent userlistwidget">
                            <ul>
              
            
                        <?php if(isset($report)){?>
                            	<li>
                               <div class="avatar"><img src="<?php echo base_url(); ?>images/profile/thumb_profile/<?php echo $report->row(0)->profile_pic ?>" width="50" height="45" /></div>
                                    <div class="info" style="margin-left:70px">
                                    <a href="<?php echo base_url(); ?>employee/chat/<?php echo  $report->row(0)->id ?>" title="chat with the reporter" ><?php echo $report->row(0)->firstname.				 	 								' '.$report->row(0)->lastname ; ?></a> 
                                        
                                       <br/>
                                        
                                        
                                        <?php if(isset($report->row(0)->department_i)){?>
                                        <span style="font-weight:bold">Department: <?php
										 echo $this->model_employee->select_deaprtment($report->row(0)->department_id)->row(0)->type; ?></span> <br />
                                        <?php }else{?>
                                         <span style="font-weight:bold">From chairman</span> <br />
                                        <?php }?>
                                        
                        <?php echo $report->row(0)->result ; ?><br />                        
                                        
                                        
                                        
                                        <br /> <span style="text-align:right;float:right"><?php echo $report->row(0)->date_result; ?></span>
                                         <ul class="buttonlist">
                                         <?php if(isset($manager)){?>
                   		                <li style="border:none;"><a href="#" id="forward" class="btn  btn_link"><span>Forward it to the sub sector</span></a></li>
                                        
                                        <?php }elseif(isset($sub_manager)){ ?>
                                         <li style="border:none;"><a href="#" id="forward" class="btn  btn_link"><span>Forward it to an employee</span></a></li>
                                        
                                        <br/>
										<?php	}else{?>
											  <li style="border:none;"><a href="#" id="forward" class="btn  btn_link"><span>ِApply the discount</span></a></li>
                                                <input type="hidden" id="result_id" value="<?php echo  $report->row(0)->result_id ?>" />
                                        <li style="border:none;"><a href="#" id="archive_result" class="btn btn_archive"><span>Archive the Report</span></a></li>
											<?php }?>
                                        
                                        </ul>
                                        
                                        
                	<div id="success"></div>
                   
                    <div id="fail"></div>
                   
                    
                   <div id="report_validate">
                   
                   </div>
                   
                                        <br clear="all" />
                                       
                                    </div><!--info-->
                                </li>
                          <?php }?>      
                               
                                
                            </ul>
                            <br clear="all" />
                            
                             <?php if(isset($manager)){?>
                                        <div id="forward_form">
                                     <?php echo form_open('#',array('id'=>'form2','class'=>'stdform stdform2',));  ?>
                    	<p>
                        	<label>The sub manager</label>
                            <span class="field">
                          
                          <select data-placeholder="Choose the  sub manager..." name="depart_manager" id="for_emp"  class="chzn-select"  style="                             width:100%;" tabindex="4">
                            <option value="">Choose the  sub manager...</option> 
                            <?php if(isset($employees)){foreach($employees as $employee){?>
                            <option value="<?php echo $employee->id?>"><?php echo $employee->firstname.' '.$employee->lastname; ?></option> 
                             
                            
                            <?php }}?>
                           
                            </select>  
                          <input type="hidden" id="result_id" value="<?php echo  $report->row(0)->result_id ?>" />
                           
                            </span>
                         </p>
                       
                  
                        <p class="stdformbutton">
                        	<button type="button" id="forword_button_result" class="submit radius2">Forward</button>
                        </p>
                    </form>
                    </div>
                     <?php }elseif(isset($sub_manager)){?>
                                   <div id="forward_form">
                                     <?php echo form_open('#',array('id'=>'form2','class'=>'stdform stdform2',));  ?>
                    	<p>
                        	<label>The employee</label>
                            <span class="field">
                          
                          <select data-placeholder="Choose the  employee..." name="depart_manager" id="for_emp"  class="chzn-select"  style="                             width:100%;" tabindex="4">
                            <option value="">Choose the  employee...</option> 
                            <?php if(isset($employees)){foreach($employees as $employee){?>
                            <option value="<?php echo $employee->id?>"><?php echo $employee->firstname.' '.$employee->lastname; ?></option> 
                             
                            
                            <?php }}?>
                           
                            </select>  
                           <input type="hidden" id="result_id" value="<?php echo  $report->row(0)->result_id ?>" />
                           
                            </span>
                         </p>
                       
                  
                        <p class="stdformbutton">
                        	<button type="button" id="forword_button_result" class="submit radius2">Forward</button>
                        </p>
                    </form>
                    </div>
                     <?php }else{?>
                                <div id="forward_form">
                                     <?php echo form_open('#',array('id'=>'form2','class'=>'stdform stdform2',));  ?>
                    	<p >
                        	<label style="text-align:center">Number of discounted
                             days from salary</label>
                            <span class="field">
                          
                          <input type="numirec"  name="amount" id="days" required/>
                        
                             <input type="hidden" id="report_id" value="<?php echo  $report->row(0)->report_id ?>" />
                            </span>
                         </p>
                       
                  
                        <p class="stdformbutton">
                        	<button type="button" id="discount" class="submit radius2">Discount</button>
                        </p>
                    </form>
                    </div>
                     <?php }?>
                            
                        </div><!--widgetcontent-->
                    
                    
                    
                </div><!--content-->
                
            </div><!--maincontentinner-->
            
           <?php include('footer.php');?>
            
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
