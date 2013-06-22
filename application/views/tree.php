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
                       &nbsp;&nbsp;<li><h3>Step 3</h3></a></li>
                        &nbsp;&nbsp; <li class="current"><a href="<?php echo base_url();?>company/tree"  class="dashboard"><h3>Finally Tree</h3></a></li>
                </ul><!--maintabmenu-->
                
                <div class="content">
                
                 <?php if(count($depart_info) != 0){?>
                
                 <center><h3 style="color:#aaa ;;padding:5px ; border-radius:5px ; word-spacing:1px">This is Your Company Tree .. <a href="<?php echo base_url();?>company" style="text-decoration:underline">Back</a> To your Profile.
                 You also Can <a href="<?php echo base_url();?>company/tree_step1" style="text-decoration:underline">Edit</a> Your Company Tree.</h3></center>
                 <br /><br />
                 
                 <?php } ?>
                 
                 <?php if(isset($depart_info) && count($depart_info) != 0){
				  foreach ($depart_info as $row){
					 $depart_id = $row->id;
					 $depart_name = $row->name;
					 $depart_manager = $row->depart_manager;
					 $sub_depart_number = $row->sub_depart_num;
					 $field = $row->type;
					 $manager_data =$this->model_employee->emp_by_id($depart_manager);
					 foreach ($manager_data as $r){
						 $manager_name = $r->username;
					 }
					 
	        /*?>	 foreach ($sub_depart_info as $row){
					 $depart_id_sub = $row->company_id;
					 $sub_depart_name = $row->name;
					 $sub_depart_manager = $row->sub_depart_manager;
					 $sub_depart_number = $row->sub_depart_num;<?php */?>

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
							$sub_depart_info = $this->model_company->get_sub_department_by_id($depart_id);
							foreach ($sub_depart_info as $row){
						 $depart_id_sub = $row->company_id;
						 $sub_depart_name = $row->name;
						 $sub_depart_manager = $row->sub_depart_manager;
							
							 ?>
                            <div style="float:left ; width:45% ; padding-bottom:20px " >
                            <h3 style="margin-left:230px ;  color:#C00"><?php echo $sub_depart_name; ?></h3>
                            </p>
                            <p >
                            <label style="width:100%"> Sub Department Manager : &nbsp;&nbsp;&nbsp;<span style=";font-size:15px ; font-family:Tahoma, Geneva, sans-serif ; color:#777 ; border-radius:3px ; padding:5px ; background:#EEE "><?php echo $sub_depart_manager;?></span></label>
                            <span class="field"></span>
                        </p>
                        </div>
                        <?php 
							}
							}
							else {?>
                            <span style="color:#900 ; margin-left:30px">This Department doesn't include Sub Department</span>
								<?php
								}
							?>
                        </p>
						</div>
                        <br clear="all" />
                        <hr />
                        <?php 
				 }
				 }else{ ?>
							<center style="margin-top:30px"><h1>Tree is not <a href="<?php echo base_url();?>company/tree_step1">Build</a> Yet.</h1></center>
							<?php }
				 ?>
                        
                        <br clear="all" />  
                        
                        
                    
                
                                  
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
