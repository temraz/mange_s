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
<link rel="stylesheet" href="<?php echo base_url();?>css/chosen.css" />
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
                
                 <?php echo form_open('edit/add_job' , array( 'id'=> "form1" , "class"=>"stdform")); ?>
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
                            <span class="field"><input type="text" name="job_name"  required/></span>
                        </p>
                        
                        <p>
                        	<label>Department</label>
                            <span class="field">   
                         <?php   if(isset($all_dept) && count($all_dept) != 0 ){ ?>
                            <select data-placeholder="Choose the department..." name="department"  class="chzn-select"  style="width:200px;" tabindex="4" required>
                          <option value=""></option> 
                          <?php foreach($all_dept as $dept){?>
                          <option value="<?php echo $dept->name?>"><?php echo $dept->name;?></option> 
                
                          <?php }}else{?>
                          <span>There are not Departments in the company. Please check your company <a href="<?php echo base_url();?>company/tree_step1">Tree</a> before announce a new job.
                          <?php }?>
                           </span>
          
      					  </select></span>
                        </p>
                        
                        <p>
                        	<label>Professional level </label>
                            <span class="field"><select name="level" required>
                            <option value="">Select</option>
                            <option value="beginner">Beginner</option>
                            <option value="semi-professional">Semi-Professional</option>
                            <option value="professional">Professional</option>
                            </select></span>
                        </p>

                        
                        
                        <p>
                        	<label>Description</label>
                            <span class="field"><textarea cols="100" rows="5" name="details" class="mediuminput" required></textarea></span> 
                        </p>
                        
                        <br />
                        
                        <p class="stdformbutton">
                        	<button class="submit radius2">Announce</button>
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js" type="text/javascript"></script>
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
