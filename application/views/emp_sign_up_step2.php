<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="shortcut icon" href="<?php echo base_url();?>images/head.png" type="image/x-icon"/>
<title>Business Linkage</title>
<link rel="stylesheet" href="<?php echo base_url();?>css/style.css"  type="text/css" />
<!--[if IE 9]>
    <link rel="stylesheet" media="screen" href="ie9.css" tppabs="http://themepixels.com/themes/demo/webpage/starlight/css/ie9.css"/>
<![endif]-->

<!--[if IE 8]>
    <link rel="stylesheet" media="screen" href="ie8.css" tppabs="http://themepixels.com/themes/demo/webpage/starlight/css/ie8.css"/>
<![endif]-->

<!--[if IE 7]>
    <link rel="stylesheet" media="screen" href="ie7.css" tppabs="http://themepixels.com/themes/demo/webpage/starlight/css/ie7.css"/>
<![endif]-->
<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery-1.3.2.js"></script>

<script type="text/javascript">

            $(document).ready(function() {
				
                $('#loader').hide();
                $('#show_heading').hide();
             
                $('#search_category_id').change(function(){
                    $('#show_sub_categories').fadeOut();
                    $('#loader').show();
                    $('#show_heading').show();
                    
                    $.post("<?php echo site_url('js/get_chid_categories.php') ?>", {
                        parent_id: $('#search_category_id').val()
                    }, function(response){			
                        setTimeout("finishAjax('show_sub_categories', '"+escape(response)+"')", 400);
                    });
                    return false;
                });
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
            #search_category_id{ padding:3px; width:200px;}
            #sub_category_id{ padding:3px; width:200px;}
            .both{ float:left; margin:0 15px 0 0; padding:0px;}
        </style> 
        


 
<script type="text/javascript" src="<?php echo base_url();?>js/jquery.flot.min.js" ></script>

<script type="text/javascript" src="<?php echo base_url();?>js/jquery.flot.resize.min.js" ></script>

<script type="text/javascript" src="<?php echo base_url();?>js/jquery-ui-1.8.16.custom.min.js"></script>

<script type="text/javascript" src="<?php echo base_url();?>js/general.js" ></script>




<script type="text/javascript" src="<?php echo base_url();?>js/jquery-ui-1.8.16.custom.min.js" ></script>

<script type="text/javascript" src="<?php echo base_url();?>js/jquery.jgrowl.js" ></script>
<script type="text/javascript" src="<?php echo base_url();?>js/jquery.alerts.js" ></script>

<script type="text/javascript" src="<?php echo base_url();?>js/elements.js" ></script>

<link rel="stylesheet" href="<?php echo base_url();?>css/chosen.css" />

<!--[if lt IE 9]>
	<script src="css3-mediaqueries.js" tppabs="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
<![endif]-->


</head>

<body class="loggedin">

	<!-- START OF HEADER -->
	<div class="header radius3">
    	<div class="headerinner">
        	
            <a href="<?php echo base_url();?>site/"><img src="<?php echo base_url();?>images/logo.png" tppabs="http://themepixels.com/themes/demo/webpage/starlight/images/starlight_admin_template_logo_small.png" alt="" /></a>
           <div class="headright">
           <div class="headercolumn">&nbsp;</div>
        
           
            	<div id="searchPanel" class="headercolumn">
                	<div class="searchbox">
                        <form action="" method="post">
                            <input type="text" id="keyword" name="keyword" class="radius2" value="Search here" /> 
                        </form>
                    </div><!--searchbox-->
                </div><!--headercolumn-->
  
                        </div>
        
        </div><!--headerinner-->
	</div><!--header-->
    <!-- END OF HEADER -->
        
    <!-- START OF MAIN CONTENT -->
    <div class="mainwrapper">
     	<div class="mainwrapperinner">
         	   
        <div class="maincontent" style="margin-left:0 ;">
        	<div class="maincontentinner">
                 <div class="contenttitle">
                 
                    	<h2 class="form"><span>Emplyee Registeration</span></h2>
                    </div><!--contenttitle-->
                <div class="content"  style=" height:auto">
                    
                    
                    <div id="tabs" >
                       
                            <div id="tabs-1">
                             
                          <div style="color:#0C3"><?php if(isset($regist)){echo $regist ;}?></div>
                          <div style="color:#F00">   <?php echo validation_errors()  ;   ?></div>     
                          </div>
                  
                    
                    
                          <div id="form2" class="stdform stdform" style="margin-top:10px;border:none;">
                          
                          <?php echo form_open('site/employee_reg_validation_step2');?>
                          <input type="hidden" name="firstname" value="<?php if(isset($firstname)) echo $firstname ;?>" />
                          <input type="hidden" name="lastname" value="<?php if(isset($lastname)) echo $lastname ;?>" />
                          <input type="hidden" name="email" value="<?php if(isset($email)) echo $email ;?>" />
                          <input type="hidden" name="username" value="<?php if(isset($username)) echo $username ;?>" />
                          <input type="hidden" name="password" value="<?php if(isset($password)) echo $password;?>" />
                          <input type="hidden" name="company" value="<?php if(isset($company)) echo $company;?>" />
                          <input type="hidden" name="country" value="<?php if(isset($country)) echo $country;?>" />
                          <input type="hidden" name="gender" value="<?php if(isset($gender)) echo $gender;?>" />
                          <input type="hidden" name="mobile" value="<?php if(isset($mobile)) echo $mobile;?>" />
                          <input type="hidden" name="phone" value="<?php if(isset($phone)) echo $phone;?>" />
                          <input type="hidden" name="address" value="<?php if(isset($address)) echo $address;?>" />
                          <input type="hidden" name="about" value="<?php if(isset($about)) echo $about;?>" />
                     
                        
                    	                        
                   
                        
            <div class="both" >
            <h4>Select your department</h4>
            <select name="dept"  id="search_category_id">
                <option value="" selected="selected"></option>
               <?php if(isset($depts)){foreach($depts as $dept){?>
          <option value="<?php echo $dept->id?>"><?php echo $dept->name;?></option> 

          <?php }}?>
            </select>		
        </div>
                          
     
        <div class="both" style="padding-left:20px;">
            <h4 id="show_heading">Select your Sub department</h4>
            <div id="show_sub_categories" align="center">
                <img src="<?php echo base_url(); ?>images/loader9.gif"  id="loader" alt="" />
            </div>
        </div>
                     
                       
                       
                          <p class="stdformbutton" style="padding-top:19px;">
                              <?php echo form_submit('signup_submit','Sign up'); ?>
                            
                           
                        </p>
                         <?php echo form_close(); ?>
                    
                              </div>
                    
                            
                    </div>

                           

					</div><!--#tabs-->
                     
               </div><!--content-->
                
                
            </div><!--maincontentinner-->
            
           <?php include('footer.php');?>
            
        </div><!--maincontent-->
        
        <div class="mainright">
        	<div class="mainrightinner">
            	
             <div class="widgetbox" style="">
                        <div class="title"><h2 class="general"><span>Employees Log In</span></h2></div>
                        <div class="widgetcontent stdform stdformwidget">
                          <?php echo form_open('site/emp_validation');
                                 ?>
                                 <div style="color:#F30">
                                 <?php if(isset($login)){ echo validation_errors()  ;  } ?>
                                 </div> 
                        
                            <div class="par">
                            	<label>Email</label>
                                <div class="field">
                                <?php  echo form_input(array('name'=>'email','class'=>'longinput')); ?>
                                	
                                </div>
                            </div><!--par-->
                            <div class="par">
                            	<label>Password</label>
                                <div class="field">
                                
                                <?php echo form_password(array('name'=>'password','class'=>'longinput')); ?><br />
                                </div>
                                <br />
                                <div class="field">
                                	<input type="checkbox" name="keep" class="longinput" /> 

<small>Keep Me Logged in</small> <br />
                                </div>
                            </div><!--par-->
                            <div class="par">
                                <div class="field">
                                   <?php  echo form_submit('login_submit','Login');
                                   echo form_close();?> | or <a href="<?php echo base_url();?>site/emp_sign_up/">Sign up</a>
                                	
                                </div>
                            </div><!--par-->
                            </form>
                        <small>
                        Are you 
                        <a href="<?php echo base_url();?>site/index_user" >Normal User</a> |
                       <a href="<?php echo base_url();?>site/index_company" >Company </a> ?
                       </small>
                                                   
                     <br clear="all" />
                    </div><!--widgetcontent-->
                </div><!--widgetbox-->
                
                
            </div><!--mainrightinner-->
        </div><!--mainright-->
             
                
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
  </form>
</body>

</html>
