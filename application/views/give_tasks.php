<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="shortcut icon" href="<?php echo base_url();?>images/head.png" type="image/x-icon"/>
<title>Dashboard |Business Linkage</title>
<link rel="stylesheet" href="<?php echo base_url();?>css/style.css"  type="text/css" />


 
<script type="text/javascript" src="<?php echo base_url();?>js/jquery.flot.min.js" ></script>

<script type="text/javascript" src="<?php echo base_url();?>js/jquery.flot.resize.min.js" ></script>

<script type="text/javascript" src="<?php echo base_url();?>js/jquery-ui-1.8.16.custom.min.js"></script>

<script type="text/javascript" src="<?php echo base_url();?>js/general.js" ></script>

<script type="text/javascript" src="<?php echo base_url();?>js/dashboard.js" ></script>

<link rel="stylesheet" href="<?php echo base_url();?>css/chosen.css" />



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
        
        <div class="maincontent" >
        	<div class="maincontentinner">
            	
                <ul class="maintabmenu">
                	<li class="current"><a href="<?php echo base_url();?>employee/dashboard/<?php echo $id;?>" ><?php if(isset($employee->row(0)->firstname,$employee->row(0)->lastname)) echo $employee->row(0)->firstname ." ".$employee->row(0)->lastname?> Settings</a></li>
                </ul><!--maintabmenu-->
                
                <div class="content" style="min-height:400px">
                	
             
                    
                    <div class="contenttitle">
                    	<h2 class="form"><span >Settings</span></h2>
                    </div><!--contenttitle-->
                    
                    <br />
                  
                    <?php echo form_open('employee/task_validation',array('id'=>'form1','class'=>'stdform'));  ?>
                    	<p>
                        	<label>choose the manager :</label>
                            <span class="field">
                            <select data-placeholder="Choose the dempartment manager..." name="depart_manager"  class="chzn-select"  style="                             width:200px;" tabindex="4">
                            <option value=""></option> 
                            <?php if(isset($users)){foreach($users as $user){?>
                            <option value="<?php echo $user->id?>"><?php echo $user->username;?></option> 
                            
                            <?php }}?>
                            
                            </select>
                            </span>
                            
                            
                        </p>
                          <p>
                        	<label>The task :</label>
                            <span class="field">
                          <input type="date" name="dedline" required />
                            </span>
                            
                            
                        </p>
                        
                        <p>
                        	<label>The task :</label>
                            <span class="field">
                           <textarea name="taks"  required rows="4" cols="80"></textarea>
                            </span>
                            
                            
                        </p>
                        
                      
                        
                     
                        
                        <p class="stdformbutton">
                        	<button type="submit" class="submit radius2">Apply</button>
                        </p>
                    </form>
               
 
                   
                    
                    
                </div><!--content-->
                
            </div><!--maincontentinner-->
            
           <?php include('footer.php');?>
            
        </div><!--maincontent-->
    
     
     	</div><!--mainwrapperinner-->
    </div><!--mainwrapper-->
	<!-- END OF MAIN CONTENT -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
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
