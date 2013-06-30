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
                  job details
                  </h1>
                <br />
                <div class="widgetcontent userlistwidget">
                <div id="success"></div>
                   
                    <div id="fail"></div>
                   
                    
                   <div id="report_validate">
                   
                   </div>
                            <ul>
              
            
                        
                        
                        
                            	<li>
                 <span id="no_name" style="font-size:13px;color:#F33"></span>
                 <?php echo form_open('edit/add_job' , array( 'id'=>'form2','class'=>'stdform stdform2',)); ?>
                <?php if (validation_errors()){ ?>
                                <div class="notification msgerror">
                        <a class="close"></a>
                        <p><?php echo validation_errors(); ?></p>
                    </div>
                                <?php } if(isset($inserted) && $inserted == 1){?>
                                <div class="notification msgsuccess">
                        <a class="close"></a>
                        <p>The Job is announced successfully </p>
                    </div>
                            <?php } ?>
                    	<p>
                        	<label>Announced Job Name</label>
                           
                            <span class="field">
                            
                            <input type="text" name="job_name" id="job_name" style="width:100%" required/>
                            
                            </span>
                        </p>
                        
                        <p>
                        	<label>Department</label>
                            <span class="field">   
                         <?php   if(isset($all_dept) && count($all_dept) != 0 ){ ?>
                            <select data-placeholder="Choose the department..." name="department"  id="department" class="chzn-select" style="width:100%"  tabindex="4" required>
                          <option value=""></option> 
                          <?php foreach($all_dept as $dept){?>
                          <option value="<?php echo $dept->name?>"><?php echo $dept->name;?></option> 
                
                          <?php }}else{?>
                          <span>There are not Departments in your company untill yet.
                          <?php }?>
                           </span>
          
      					  </select></span>
                        </p>
                        
                        <p>
                        	<label>Professional level </label>
                            <span class="field"><select name="level" id="level"style="width:100%" required>
                            <option value="">Select</option>
                            <option value="beginner">Beginner</option>
                            <option value="semi-professional">Semi-Professional</option>
                            <option value="professional">Professional</option>
                            </select></span>
                        </p>

                        
                        
                        <p>
                        	<label>Description</label>
                            <span class="field"><textarea style="width:100%" rows="5" name="details" id="desc" class="mediuminput" required></textarea></span> 
                        </p>
                        
                        <br />
                        
                        <span class="stdformbutton">
                        	<button type="button" id="submit" class="submit radius2">Announce</button>
                        </span>
                    </form>
                    
                </li>
                </li>
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
