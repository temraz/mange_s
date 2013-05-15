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
<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery-1.3.2.js"></script>

<script type="text/javascript">

            $(document).ready(function() {
			 <?php if(isset($unconfirms)){ $i=1; foreach($unconfirms as $unconfirm){?>
                $('#loader<?php echo $i;?>').hide();
                $('#show_heading<?php echo $i;?>').hide();
             <?php $i++;}}?>
			 
			 
			 <?php if(isset($unconfirms)){ $i=1; foreach($unconfirms as $unconfirm){?>
			 
                $('#search_category_id<?php echo $i;?>').change(function(){
				
                    $('#show_sub_categories<?php echo $i;?>').fadeOut();
                    $('#loader<?php echo $i;?>').show();
                    $('#show_heading<?php echo $i;?>').show();
                    
                    $.post("<?php echo site_url('company/get_chid_categories') ?>", {
                        parent_id: $('#search_category_id<?php echo $i;?>').val()
                    }, function(response){			
                        setTimeout("finishAjax('show_sub_categories<?php echo $i;?>', '"+escape(response)+"')", 400);
                    });
                    return false;
                });
				   <?php $i++;}}?>
				 
            });
			

            function finishAjax(id, response){
				
                $('#loader').hide();
                $('#show_heading').show();
                $('#'+id).html(unescape(response));
                $('#'+id).fadeIn();
				
            } 

            function alert_id()
            {
				 
                if($('#sub_category_id').val() == '')
                    alert('Please select a sub category.');
                else
                    alert($('#sub_category_id').val());
                return false;
            }
           
        </script>
        <style>
            .both h4{ font-family:Arial, Helvetica, sans-serif; margin:0px; font-size:14px;}
            #search_category_id{ padding:3px; width:200px;margin-right:0px;}
            #sub_category_id{ padding:3px; width:200px;}
            .both{ float:left; margin:0 0px 0 0; padding:0px;}
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
                
                	   
                        
                        <li class="current"><a href="<?php echo base_url();?>company/unconfirm_employees/" class="dashboard" ><span>Unconfirmed employees
                        (<?php if(isset($unconfirm_count)) echo $unconfirm_count?>)</span></a></li>
                       <li><a href="<?php echo base_url();?>company/confirm_employees" class="dashboard"  ><span>Confirmed employees
                       (<?php if(isset($confirm_count)) echo $confirm_count?>)</span></a></li>
                   
                </ul><!--maintabmenu-->
                
                <div class="content">
               <div style="color:#F00;text-align:center">   <?php echo validation_errors()  ;   ?></div>
                 <div class="contenttitle radiusbottom0">
                	<h2 class="table"><span>unconfirmed employees</span></h2>
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
                            <th class="head0">Select Department</th>
                           
                             <th class="head0">Confirm</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                        	
                            <th class="head1">name</th>
                            <th class="head0">username</th>
                            <th class="head1">confirmation code</th>
                            <th class="head0">Department</th>
                          
                            <th class="head0">Confirm</th>
                        </tr>
                    </tfoot>
                    <tbody>
                    
                    <?php $i=1;  if(isset($unconfirms)){  foreach($unconfirms as $unconfirm){?>
                    
                    <?php echo form_open('company/accept_employee');?>
                    
                    <input type="hidden" name="emp_id" value="<?php echo $unconfirm->id ; ?>" />
                        <tr>
                        	
                            <td class="center"><?php echo $unconfirm->firstname?> <?php echo $unconfirm->lastname?></td>
                            <td class="center"><?php echo $unconfirm->username?></td>
                            <td class="center"><?php echo $unconfirm->code?></td>
                            
                            <td  style="margin:0px;padding:0px;"  width="10%" >  <div class="both" >
                                                
                                                    <select name="dept" style="width:200px;margin:5px" id="search_category_id<?php echo $i;?>" required>
                                                    <option value="" selected="selected"></option>
                                                    <?php if(isset($depts)){foreach($depts as $dept){?>
                                                    <option value="<?php echo $dept->id?>"><?php echo $dept->name;?></option> 
                                                    
                                                    <?php }}?>
                                                    </select>		
                                                    </div>
                                                    
                                                </td>
                                                
                           
                                              
                            <td class="center">
                            <p class="stdformbutton">
                            <input type="submit" value="Confirm" class="radius3" />
                            
                            </p>
                           
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
