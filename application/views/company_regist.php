<?php require("all_countries.php");?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
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
                    
                    
                    <div id="tabs">
                        	
                            <div id="tabs-1">
                               <div style="color:#F30">
                                 <?php echo validation_errors()  ;   ?>
                          </div>
                          <div style="color:#3C3;font-size:16px;font-weight:bold">
                          <?php if(isset($regist)){ echo $regist;}?>
                          </div>
                   <div class="contenttitle">
                    	<h2 class="form"><span>Company Registeration</span></h2>
                    </div><!--contenttitle-->
                    
                    
                          <div id="form2" class="stdform stdform2">
                          <?php echo form_open('site/company_validation');  ?>
                          
                      <p>
                        	<label>Company Name</label>
                            <span class="field"><?php echo form_input(array('name'=>'name','class'=>'longinput')); ?></span>
                        </p>
                        
                        <p>
                        	<label>Field</label>
                            <span class="field"><?php echo form_input(array('name'=>'field','class'=>'longinput')); ?></span>
                        </p>
                        
                        <p>
                        	<label>Email</label>
                            <span class="field"><?php echo form_input(array('name'=>'email','class'=>'longinput')); ?></span>
                        </p>
                        
                         <p>
                        	<label>Password</label>
                            <span class="field"><?php echo form_password(array('name'=>'password','class'=>'longinput')); ?></span>
                        </p>
                        
                        <p>
                        	<label>Confirm Password</label>
                            <span class="field"><?php echo form_password(array('name'=>'cpassword','class'=>'longinput')); ?></span>
                        </p>
                                            
                        <p>
                        	<label>Country</label>
                            <span class="field">
                                
                   <select name="country" size="1">
   <?php for($i=0;$i< count($country_list);$i++) {
  echo " <option value=\"$country_list[$i]\"";
    echo ">$country_list[$i]</option>";
   } ?>
   
   </select>
                         
                            </span>
                        </p>
                        
                        <p>
                        <label>Phone</label>
                        <span class="field">
                        	
                            
                             <select name="mobile"><option value="376">Andorra (+376)</option><option value="1268">Antigua, Barbuda (+1268)</option><option value="54">Argentina (+54)</option><option value="297">Aruba (+297)</option><option value="61">Australia (+61)</option><option value="43">Austria (+43)</option><option value="32">Belgium (+32)</option><option value="1441">Bermuda (+1441)</option><option value="591">Bolivia (+591)</option><option value="55">Brazil (+55)</option><option value="359">Bulgaria (+359)</option><option value="1">Canada (+1)</option><option value="1345">Cayman Islands (+1345)</option><option value="56">Chile (+56)</option><option value="86">China (+86)</option><option value="385">Croatia (+385)</option><option value="357">Cyprus (+357)</option><option value="420">Czech Republic (+420)</option><option value="45">Denmark (+45)</option><option value="1767">Dominica (+1767)</option><option value="1806">Dominican Republic (+1806)</option><option value="593">Ecuador (+593)</option><option value="20" selected >Egypt (+20)</option><option value="503">El Salvador (+503)</option><option value="372">Estonia (+372)</option><option value="679">Fiji Islands (+679)</option><option value="358">Finland (+358)</option><option value="33">France (+33)</option><option value="594">French Guiana (+594)</option><option value="49">Germany (+49)</option><option value="30">Greece (+30)</option><option value="1473">Grenada (+1473)</option><option value="590">Guadeloupe (+590)</option><option value="852">Hong Kong (+852)</option><option value="36">Hungary (+36)</option><option value="354">Iceland (+354)</option><option value="91">India (+91)</option><option value="62">Indonesia (+62)</option><option value="353">Ireland (+353)</option><option value="972">Israel (+972)</option><option value="39">Italy (+39)</option><option value="1876">Jamaica (+1876)</option><option value="371">Latvia (+371)</option><option value="423">Liechtenstein (+423)</option><option value="370">Lithuania (+370)</option><option value="352">Luxembourg (+352)</option><option value="60">Malaysia (+60)</option><option value="356">Malta (+356)</option><option value="596">Martinique (+596)</option><option value="52">Mexico (+52)</option><option value="377">Monaco (+377)</option><option value="1664">Montserrat (+1664)</option><option value="31">Netherlands (+31)</option><option value="599">Netherlands Antilles (+599)</option><option value="64">New Zealand (+64)</option><option value="47">Norway (+47)</option><option value="507">Panama (+507)</option><option value="595">Paraguay (+595)</option><option value="51">Peru (+51)</option><option value="63">Philippines (+63)</option><option value="48">Poland (+48)</option><option value="351">Portugal (+351)</option><option value="40">Romania (+40)</option><option value="7">Russia (+7)</option><option value="1758">Saint Lucia (+1758)</option><option value="65">Singapore (+65)</option><option value="421">Slovakia (+421)</option><option value="386">Slovenia (+386)</option><option value="27">South Africa (+27)</option><option value="82">South Korea (+82)</option><option value="34">Spain (+34)</option><option value="597">Suriname (+597)</option><option value="46">Sweden (+46)</option><option value="41">Switzerland (+41)</option><option value="886">Taiwan (+886)</option><option value="66">Thailand (+66)</option><option value="1868">Trinidad, Tobago (+1868)</option><option value="90">Turkey (+90)</option><option value="1649">Turks and Caicos (+1649)</option><option value="44">United Kingdom (+44)</option><option value="1">United States (+1)</option><option value="58">Venezuela (+58)</option><option value="84">Vietnam (+84)</option></select>
                            
                            <?php echo form_input(array('name'=>'phone','class'=>'longinput','style'=>'width:150px;margin-left:5px;')); 
                             ?>
                            </span>
                             </p>
                        
                        
                        <p>
                        	<label>Address</label>
                            <span class="field"><?php echo form_input(array('name'=>'address','class'=>'longinput')); ?></span>
                        </p>
                        
                        <p>
                        	<label>Current Location</label>
                            <span class="field"><?php echo form_input(array('name'=>'location','class'=>'longinput')); ?></span>
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
                         <?php echo form_open('site/login_company_validation');
                                 ?>
                                 <div style="color:#F30">
                                 <?php if(isset($login)){ echo validation_errors()  ;  } ?>
                                 </div> 
                        
                            <div class="par">
                            	<label style="margin-top:-10px;">Company Email</label>
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
                                   echo form_close();?> | <a href="<?php echo base_url();?>site/company_sign_up/" >Sign up</a>
                                	
                                </div>
                            </div><!--par-->
                            </form>
                         <small>
                         Are you 
                        <a href="<?php echo base_url();?>site/index_user" >Normal User</a> |
                        <a href="<?php echo base_url();?>site/index_employee" >Employee</a> ?
                       </small>
                                                   
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
