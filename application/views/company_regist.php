<?php require("all_countries.php");?>
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
<script type="text/javascript" src="<?php echo base_url();?>js/jquery-1.7.min.js"></script>
 
<script type="text/javascript" src="<?php echo base_url();?>js/jquery.flot.min.js" ></script>

<script type="text/javascript" src="<?php echo base_url();?>js/jquery.flot.resize.min.js" ></script>

<script type="text/javascript" src="<?php echo base_url();?>js/jquery-ui-1.8.16.custom.min.js"></script>

<script type="text/javascript" src="<?php echo base_url();?>js/general.js" ></script>

<script type="text/javascript" src="<?php echo base_url();?>js/dashboard.js" ></script>

<script type="text/javascript" src="<?php echo base_url();?>js/jquery-1.7.min.js" ></script>
<script type="text/javascript" src="<?php echo base_url();?>js/jquery-ui-1.8.16.custom.min.js" ></script>
<script type="text/javascript" src="<?php echo base_url();?>js/colorpicker.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>js/jquery.jgrowl.js" ></script>
<script type="text/javascript" src="<?php echo base_url();?>js/jquery.alerts.js" ></script>
<script type="text/javascript" src="<?php echo base_url();?>js/general.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>js/elements.js" ></script>
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
         	 
        <div class="maincontent" style="margin-left:0; ">
        	<div class="maincontentinner">
                
                <div class="content"  style=" height:auto">
                    <div style="color:#F30">
                    <?php if(validation_errors()){?>
                     <div class="notification msgerror">
                        <a class="close"></a>
                        <p>       <?php echo validation_errors()  ;   ?></p>
                    </div>
                          <?php }?>
                          </div>
                    <?php if(isset($regist)){?>
						   <div class="notification msgsuccess">
                        <a class="close"></a>
                        <p><?php echo $regist; ?></p>
                    
						  <?php }?>
                    <div id="tabs">
                        	
                            <div id="tabs-1">
                               
                          <div style="color:#3C3;font-size:16px;font-weight:bold">
                          
                          </div>
                   <div class="contenttitle">
                    	<h2 class="form"><span>Company Registeration</span></h2>
                    </div><!--contenttitle-->
                    
                    
                          <div id="form2" class="stdform stdform2">
                          <?php echo form_open('site/company_validation');  ?>
                          
                      <p>
                        	<label>Company Name</label>
                            <span class="field"><?php echo form_input(array('name'=>'name','class'=>'longinput',
							'required'=>'required','value'=>$this->input->post('name') )); ?></span>
                        </p>
                        
                        
                        
                        <p>
                        	<label>Email</label>
                            <span class="field"><?php echo form_input(array('name'=>'email','class'=>'longinput',
							'required'=>'required','value'=>$this->input->post('email'))); ?></span>
                        </p>
                        
                        
                         <p>
                        	<label>Password </label>
                            <span class="field"><?php echo form_password(array('name'=>'password','class'=>'longinput',
							'required'=>'required')); ?></span>
                        </p>
                        
                        <p>
                        	<label>Confirm Password</label>
                            <span class="field"><?php echo form_password(array('name'=>'cpassword','class'=>'longinput','required'=>'required')); ?></span>
                        </p>
                                            
                        <p>
                        	<label>Country</label>
                            <span class="field">
                                
                   <select name="country" size="1" required>
                   <?php if($this->input->post('country')){?>
				   <option selected="selected" value="<?php echo $this->input->post('country') ;?>"><?php echo $this->input->post('country') ?></option>
                    <?php for($i=0;$i< count($country_list);$i++) {
  echo " <option value=\"$country_list[$i]\"";
    echo ">$country_list[$i]</option>";
   } ?>
				   <?php }else{ ?>
					   <option value="">select your country</option>
					   <?php }?>
                   
   <?php for($i=0;$i< count($country_list);$i++) {
  echo " <option value=\"$country_list[$i]\"";
    echo ">$country_list[$i]</option>";
   } ?>
   
   </select>
                         
                            </span>
                        </p>
                        
                       
                       
                        
                        <p>
                        	<label>Address</label>
                            <span class="field"><?php echo form_input(array('name'=>'address','class'=>'longinput',
							'required'=>'required','value'=>$this->input->post('address'))); ?></span>
                        </p>
                        
                        <p>
                        	<label>Current Location</label>
                            <span class="field"><?php echo form_input(array('name'=>'location','class'=>'longinput',
							'required'=>'required','value'=>$this->input->post('location'))); ?></span>
                        </p>
                        
                    
                              
                        
                       
                          <p class="stdformbutton">
                              <?php echo form_submit('signup_submit','Sign up'); ?>
                            <input type="reset" class="reset radius2" value="Reset" /> 
                            <?php echo form_close(); ?>
                        </p>
                              </div>
                    
                            
                    </div>
                            
					</div><!--#tabs-->
                     
                      <div class="mainright">
        	<div class="mainrightinner">
            	
                                <div class="widgetbox" style="">
                        <div class="title"><h2 class="general"><span>Companies Log In</span></h2></div>
                        <div class="widgetcontent stdform stdformwidget">
                         <?php echo form_open('site/login_validation');
                                 ?>
                                 <div style="color:#F30;text-align:center">
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
                                   echo form_close();?>

                                	
                                </div>
                            </div><!--par-->
                            </form>
                        <small style="text-align:center"><a href="<?php echo base_url();?>site/company_sign_up/" > Companies sign up</a> Or <a href="<?php echo base_url();?>site/emp_sign_up/">employees sign up</a></small>
                                                   
                     <br clear="all" />
                    </div><!--widgetcontent-->
                </div><!--widgetbox-->
                
                </div>
                </div>
               </div><!--content-->
                
            </div><!--maincontentinner-->
            
           <?php include('footer.php');?>
            
        </div><!--maincontent-->
        
        
                
     	</div><!--mainwrapperinner-->
    </div><!--mainwrapper-->
	<!-- END OF MAIN CONTENT -->
    

</body>
</html>
