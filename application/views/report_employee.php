<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="shortcut icon" href="<?php echo base_url();?>images/head.png" type="image/x-icon"/>
<title>Dashboard |Business Linkage</title>
<link rel="stylesheet" href="<?php echo base_url();?>css/style.css"  type="text/css" />


<script type="text/javascript" src="<?php echo base_url();?>js/jquery-1.7.min.js" ></script>

<script type="text/javascript" src="<?php echo base_url();?>js/jquery-ui-1.8.16.custom.min.js"></script>
 
 <script type="text/javascript" src="<?php echo base_url();?>js/jquery.flot.min.js" ></script>

<script type="text/javascript" src="<?php echo base_url();?>js/jquery.flot.resize.min.js" ></script>

<script type="text/javascript" src="<?php echo base_url();?>js/jquery-ui-1.8.16.custom.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>js/dashboard.js" ></script>

<script type="text/javascript" src="<?php echo base_url();?>js/general.js"></script>
 

 
<script type="text/javascript" src="<?php echo base_url();?>js/insert.js" ></script>
 


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
        
        <div class="maincontent" >
        	<div class="maincontentinner">
            	
               
                <div class="content" style="min-height:400px;" >
                	
            
                	<div id="success"></div>
                   
                    <div id="fail"></div>
                   
                    
                   <div id="report_validate">
                   
                   </div>
                   
                   
                 
                    <div class="contenttitle">
                    	<h2 class="form"><span >Report employee</span></h2>
                    </div><!--contenttitle-->
                    
                    <br />
                  <?php if(!isset($no_employees)){?>
                    <?php echo form_open('employee/task_validation',array('id'=>'form2','class'=>'stdform stdform2',));  ?>
                    	<p>
                        	<label>The employee</label>
                            <span class="field">
                            
                             <?php if(isset($chairman)){?>
                            <select data-placeholder="Choose the dempartment manager..." name="depart_manager" id="emp_id"  class="chzn-select"  style="                             width:200px;" tabindex="4">
                            <option value="">select the employee</option> 
                            <?php foreach($departments as $department){?>
                             <option value="<?php echo $department->depart_manager?>"><?php echo $department->firstname.' '.$department->lastname;?></option> 
                            <?php }?>
							</select>
						<?php	}?>
                          
                             
                            <?php if(isset($manager)){?>
                            <select data-placeholder="Choose the subdempartment manager..." name="depart_manager" id="emp_id"  class="chzn-select"  style="                             width:200px;" tabindex="4">
                            <option value="">select the employee</option> 
                            <?php foreach($departments as $department){?>
                             <option value="<?php echo $department->sub_depart_manager?>"><?php echo $department->firstname.' '.$department->lastname;?></option> 
                            <?php }?>
							</select>
						<?php	}?>
                             <?php if(isset($sub_manager)){?>
                               <input type="text" name="depart_manager" style="width:98%" id="emp_id" class="longinput" />
                            
                            <?php }?>
                            
                            
                            
                           
                            </span>
                        </p>
                       
                        
                        <p>
                        	<label>The reason</label>
                            <span class="field">
                           
                    <textarea id="wysiwyg2"  style="width:98%" rows="20"></textarea>  
                            </span>
                        </p>
                        	
                            
                        
                        
                      
                        
                     
                        
                        <p class="stdformbutton">
                        	<button type="button" id="report" class="submit radius2">Send</button>
                        </p>
                    </form>
               <?php }else{?>
                <div class="notification msgalert">
                        
                        <p style="margin-left:70px;">Sorry... there is no employees under your order until now.</p>
                        <a class="close"></a>
                    </div>
               <?php }?>
 
                   
                    
                    
                </div><!--content-->
                
            </div><!--maincontentinner-->
            
           <?php include('footer.php');?>
            
        </div><!--maincontent-->
    <?php include('right_div.php')?>   
     
     	</div><!--mainwrapperinner-->
    </div><!--mainwrapper-->
	<!-- END OF MAIN CONTENT -->
  
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
