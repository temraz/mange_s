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
            	
                <ul class="maintabmenu">
                	    <li><h3>Step 1</h3></li>
                        &nbsp;&nbsp;<li><h3>Step 2</h3></li>
                       &nbsp;&nbsp;<li class="current"><a href="<?php echo base_url();?>company/step3"  class="dashboard"><h3>Step 3</h3></a></li>
                       &nbsp;&nbsp; <li><h3>Finally Tree</h3></a></li>
                        
                </ul><!--maintabmenu-->
                
                <div class="content">
                
                
                 <form id="form1" class="stdform" method="post" action="step3_validation">
                 <?php echo validation_errors(); ?>
                 
                 <?php 
				 $k=1;
				 foreach ($depart_info as $row){
					 $depart_name = $row->name;
					 $depart_manager = $row->depart_manager;
					 $sub_depart_number = $row->sub_depart_num;
					 $field = $row->type;
					 $manager_data =$this->model_employee->emp_by_id($depart_manager);
					 foreach ($manager_data as $r){
						 $manager_name = $r->username;
					 }
				 ?>
                    	<div  style="float:left ; width:100%"> <p>
                        	<h2 style="color:#036 ; "><?php echo  $depart_name ; ?></h2>
                         </p>
                            
                            <p>
                            <label style="width:100% ; text-align:left"> Dempartment Manager : &nbsp;&nbsp;&nbsp;<span style=" ;font-size:15px ; font-family:Tahoma, Geneva, sans-serif ; color:#777 ; border-radius:3px ; padding:5px ; background:#EEE "><?php echo $manager_name;?></span></label>
                        </p>
                        <br />
                        <p>
                            <label style="width:100% ; text-align:left"> Dempartment Field : &nbsp;&nbsp;&nbsp;<span style=" ;font-size:15px ; font-family:Tahoma, Geneva, sans-serif ; color:#777 ; border-radius:3px ; padding:5px ; background:#EEE "><?php echo $field;?></span></label>
                        </p>
                        <br clear="all" /> 
                        <p>
                        
                            <?php if ($sub_depart_number !=0 ){ 
							for ($i=1 ; $i<=$sub_depart_number ; $i++ ) { ?>
                            <div style="float:left ; width:45% ; padding-bottom:20px " >
                            <h3 style="margin-left:40px ; padding-bottom:20px ; color:#900">Sub Department <?php echo $i; ?></h3>
                            <label>Sub Department Name</label>
                            <span class="field"><input type="text" name="name_<?php echo $k.$i; ?>" required  style="width:150px"/></span>
                            </p>
                            
                            <p >
                            <label> Sub Department Manager</label>
                            <span class="field">
                            
                             <select data-placeholder="Choose the sub department manager ..." name="sub_depart_manager_<?php echo $k.$i; ?>"  class="chzn-select"  style="width:200px;" tabindex="4">
          <option value=""></option> 
          <?php if(isset($users)){foreach($users as $user){?>
          <option value="<?php echo $user->id?>"><?php echo $user->username;?></option> 

          <?php }}?>
          
        </select>
                  
                            </span>
                        </p>
                        </div>
                        <?php }
							}else {?>
                            <span style="color:#900 ; margin-left:30px">This Department doesn't include Sub Department</span>
								<?php
								}
							?>
                        </p>
						</div>
                        <hr />
                        <?php 
				 $k++;
				 }
				 ?>
                        
                        <br clear="all" />  
                        
                        <p class="stdformbutton">
                        	<button class="submit radius2">Continue</button>
                        </p>
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
                    </form>
                    
                
                                  
                                  <br clear="all" />     
                    
                    
                </div><!--content-->
                
            </div><!--maincontentinner-->
            
           <?php include('footer.php');?>
            
        </div><!--maincontent-->
        
      
     	</div><!--mainwrapperinner-->
    </div><!--mainwrapper-->
	<!-- END OF MAIN CONTENT -->

</body>
</html>
