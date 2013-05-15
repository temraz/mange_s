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
<script type="text/javascript" src="<?php echo base_url();?>js/tables.js"></script>
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
                
                	   
                        
                        <li ><a href="<?php echo base_url();?>company/unconfirm_employees/" class="dashboard" ><span>Unconfirmed employees
                        (<?php if(isset($unconfirm_count)) echo $unconfirm_count?>)</span></a></li>
                       <li class="current"><a href="<?php echo base_url();?>company/confirm_employees" class="dashboard"  ><span>Confirmed employees
                       (<?php if(isset($confirm_count)) echo $confirm_count?>)</span></a></li>
                   
                </ul><!--maintabmenu-->
                
                <div class="content">
                <?php if(isset($updated)){?>
                	<div class="notification msgsuccess">
                        <a class="close"></a>
                        <p>employee sub department has been saved successfully .</p>
                    </div>
                    <?php }?>
                    
                 <div class="contenttitle radiusbottom0">
                	<h2 class="table"><span>confirmed employees</span></h2>
                </div><!--contenttitle-->
                
               <table cellpadding="0" cellspacing="0" border="0" id="table2" class="stdtable stdtablecb">
                    <colgroup>
                        <col class="con0" />
                        <col class="con1" />
                        <col class="con0" />
                        <col class="con1" />
                        <col class="con0" />
                        <col class="con1" />
                        <col class="con0" />
                    </colgroup>
                    <thead>
                        <tr>
                        	
                            <th class="head1">name</th>
                            <th class="head0">username</th>
                            <th class="head1">confirmation code</th>
                            <th class="head0">Sub Department</th>
                           
                             <th class="head0">Confirm</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                        	
                            <th class="head1">name</th>
                            <th class="head0">username</th>
                            <th class="head1">confirmation code</th>
                            <th class="head0">Sub Department</th>
                          
                            <th class="head0">Confirm</th>
                        </tr>
                    </tfoot>
                    <tbody>
                    
                    <?php $i=1;  if(isset($confirms)){  foreach($confirms as $unconfirm){?>
                    
                    <?php echo form_open('company/update_sub_dept');?>
                    
                    <input type="hidden" name="emp_id" value="<?php echo $unconfirm->id ; ?>" />
                        <tr>
                        	
                            <td class="center"><?php echo $unconfirm->firstname?> <?php echo $unconfirm->lastname?></td>
                            <td class="center"><?php echo $unconfirm->username?></td>
                            <td class="center"><?php echo $unconfirm->department_id?></td>
                            
                            <td class="center" style="margin:0px;padding:0px;"  width="10%" >  <div class="both" >
                            
                                                 <?php
												 if(!isset($unconfirm->sub_dept_id)){
												  if($this->model_users->select_sub_dept($unconfirm->company_id,$unconfirm->department_id)){
												$sub_dept=$this->model_users->select_sub_dept($unconfirm->company_id,$unconfirm->department_id)->result();
												?>
                                                
												<select name="sub_dept" style="width:200px;margin:5px" id="search_category_id" required>
                                                <option value="" selected="selected">select sub department</option>
												<?php	 if(isset($sub_dept)){foreach($sub_dept as $dept){?>
                                                    
                                                    
                                                   
                                                    <option value="<?php echo $dept->id?>"><?php echo $dept->name;?></option> 
                                                    
                                                    <?php }}
													echo '</select>';
													}}else{
														echo 'selected before';
														}?>
                                                    
                                                    		
                                                    </div>
                                                    
                                                </td>
                                                
                           
                                              
                            <td class="center">
                            <?php
												 if(!isset($unconfirm->sub_dept_id)){?>
                            <p class="stdformbutton">
                            <input type="submit" value="Confirm" class="radius3" />
                            
                            </p>
                            <?php }else{
								echo 'confirmed';
								}?>
                           
                        </tr>
                         <?php echo form_close();?>
                       <?php $i++;}}?>
                    </tbody>
                   
                </table>
                
                <br /><br />
               
                
                                  
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
