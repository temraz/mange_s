
<?php require("all_countries.php");?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="shortcut icon" href="<?php echo base_url();?>images/head.png" type="image/x-icon"/>
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
        	
            <a href="<?php echo base_url();?>site/"><img src="<?php echo base_url();?>images/logo.png" /></a>
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
                               
                           
                          </div>
                  
                    
                    
                          <div id="form2" class="stdform stdform2">
                          <?php echo form_open('site/employee_reg_validation');
						  
						    ?>
                          
                      <p>
                        	<label>First Name</label>
                     <span class="field"><?php echo form_input(array('name'=>'firstname','class'=>'longinput','value'=>$this->input->post('firstname'),'required'=>'required')); ?></span>
                        </p>
                        
                        <p>
                        	<label>Last Name</label>
                            <span class="field"><?php echo form_input(array('name'=>'lastname','class'=>'longinput','value'=>$this->input->post('lastname'),'required'=>'required')); ?></span>
                        </p>
                        <p>
                        	<label>username</label>
                            <span class="field"><?php echo form_input(array('name'=>'username','class'=>'longinput','value'=>$this->input->post('username'),'required'=>'required')); ?></span>
                        </p>
                         <p>
                            <label>company</label>
                            <span class="field"> <select data-placeholder="Choose Your company..." name="company" class="chzn-select"  style="width:350px;" tabindex="4" required>
          <option value=""></option> 
          <?php if(isset($companies)){foreach($companies as $company){?>
          <option value="<?php echo $company->id?>"><?php echo $company->name;?></option> 

          <?php }}?>
          
        </select></span>
                        </p>
                        
                        <p>
                        	<label>Email</label>
                            <span class="field"><?php echo form_input(array('name'=>'email','class'=>'longinput','value'=>$this->input->post('email'),'required'=>'required')); ?></span>
                        </p>
                        
                     
                        
                        <p>
                        	<label>Password</label>
                            <span class="field"><?php echo form_password(array('name'=>'password','class'=>'longinput','required'=>'required')); ?></span>
                        </p>
                        
                        <p>
                        	<label>Confirm Password</label>
                            <span class="field"><?php echo form_password(array('name'=>'cpassword','class'=>'longinput','required'=>'required')); ?></span>
                        </p>
                        
                         <p>
                        	<label>Gender</label>
                            <span class="field">
                               <?php echo form_radio('gender', 'male'). " Male"; ?>&nbsp;&nbsp;&nbsp;
                               <?php echo form_radio('gender', 'female'). " Female"; ?>
                           </span>
                        </p>
                        
                        
                    	                        
                   
                       
                       
                          <p class="stdformbutton">
                              <?php echo form_submit('signup_submit','Sign up'); ?>
                            <input type="reset" class="reset radius2" value="Reset" /> 
                            <?php echo form_close(); ?>
                        </p>
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
