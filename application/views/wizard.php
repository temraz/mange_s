<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Bisness Linkage</title>
<link rel="shortcut icon" href="<?php echo base_url();?>images/head.png" type="image/x-icon"/>
<link rel="stylesheet" href="<?php echo base_url();?>css/style.css" type="text/css" />
<!--[if IE 9]>
    <link rel="stylesheet" media="screen" href="ie9.css" tppabs="http://themepixels.com/themes/demo/webpage/starlight/css/ie9.css"/>
<![endif]-->

<!--[if IE 8]>
    <link rel="stylesheet" media="screen" href="ie8.css" tppabs="http://themepixels.com/themes/demo/webpage/starlight/css/ie8.css"/>
<![endif]-->

<!--[if IE 7]>
    <link rel="stylesheet" media="screen" href="ie7.css" tppabs="http://themepixels.com/themes/demo/webpage/starlight/css/ie7.css"/>
<![endif]-->
<script type="text/javascript" src="<?php echo base_url();?>js/jquery-1.7.min.js" ></script>
<script type="text/javascript" src="<?php echo base_url();?>js/jquery-ui-1.8.16.custom.min.js" ></script>
<script type="text/javascript" src="<?php echo base_url();?>js/jquery.smartWizard-2.0.min.js" ></script>
<script type="text/javascript" src="<?php echo base_url();?>js/jquery.colorbox-min.js" ></script>
<script type="text/javascript" src="<?php echo base_url();?>js/general.js" ></script>
<script type="text/javascript">
	jQuery(document).ready(function(){
		// Smart Wizard 	
  		jQuery('#wizard').smartWizard({onFinish: onFinishCallback});
      	jQuery('#wizard2').smartWizard({onFinish: onFinishCallback});
		jQuery('#wizard3').smartWizard({onFinish: onFinishCallback});
		jQuery('#wizard4').smartWizard({onFinish: onFinishCallback});
		
		function onFinishCallback(){
			alert('Finish Clicked');
		} 
		
		jQuery(".inline").colorbox({inline:true, width: '60%', height: '500px'});
	});
</script>
<!--[if lt IE 9]>
	<script src="css3-mediaqueries.js" tppabs="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
<![endif]-->
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
        
        <div class="maincontent">
        	<div class="maincontentinner">
            	
                <ul class="maintabmenu multipletabmenu">
                	<li><a href="form.html" tppabs="http://themepixels.com/themes/demo/webpage/starlight/form.html">Form Styling</a></li>
                    <li><a href="editor.html" tppabs="http://themepixels.com/themes/demo/webpage/starlight/editor.html">WYSIWYG Editor</a></li>
                    <li class="current"><a href="wizard.html" tppabs="http://themepixels.com/themes/demo/webpage/starlight/wizard.html">Wizard</a></li>
                </ul><!--maintabmenu-->
                
                <div class="content">
                
                    <div class="contenttitle">
                    	<h2 id="default" class="form"><span>Default Wizard</span></h2>
                    </div><!--contenttitle-->
                    
                    <br /><br />
                    
                    <!-- START OF DEFAULT WIZARD -->
                    <form class="stdform stdform2" method="post" action="">
                    <div id="wizard" class="wizard">
                    	
                        <ul class="hormenu">
                            <li>
                            	<a href="#wiz1step1">
                                	<span class="h2">STEP 1</span>
                                    <span class="dot"><span></span></span>
                                    <span class="label">Basic Information</span>
                                </a>
                            </li>
                            <li>
                            	<a href="#wiz1step2">
                                	<span class="h2">STEP 2</span>
                                    <span class="dot"><span></span></span>
                                    <span class="label">Account Information</span>
                                </a>
                            </li>
                            <li>
                            	<a href="#wiz1step3">
                                	<span class="h2">STEP 3</span>
                                    <span class="dot"><span></span></span>
                                    <span class="label">Terms of Agreement</span>
                                </a>
                            </li>
                        </ul>
                        
                        <br clear="all" /><br /><br />
                        	
                        <div id="wiz1step1" class="formwiz">
                        	<h2>Step 1: Basic Information</h2> <br />
                        	
                                <p>
                                    <label>First Name</label>
                                    <span class="field"><input type="text" name="firstname" id="firstname" class="longinput" /></span>
                                </p>
                                
                                <p>
                                    <label>Last Name</label>
                                    <span class="field"><input type="text" name="lastname" id="lastname" class="longinput" /></span>
                                </p>
                                                                
                                <p>
                                    <label>Gender</label>
                                    <span class="field"><select name="selection" id="selection">
                                        <option value="">Choose One</option>
                                        <option value="1">Female</option>
                                        <option value="2">Male</option>
                                    </select></span>
                                </p>
                                
                        	
                            
                        </div><!--#wiz1step1-->
                        
                        <div id="wiz1step2" class="formwiz">
                        	<h2>Step 2: Account Information</h2> <br />
                            
                                <p>
                                    <label>Account No</label>
                                    <span class="field"><input type="text" name="lastname" class="longinput" /></span>
                                </p>
                                <p>
                                    <label>Address</label>
                                    <span class="field"><textarea cols="80" rows="5" name="location"></textarea></span>
                                </p>
                                                                                               
                        </div><!--#wiz1step2-->
                        
                        <div id="wiz1step3">
                        	<h2>Step 3: Terms of Agreement</h2>
                            <div class="par terms">
                                <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.</p>
                                <p>Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?</p>
                                <p><input type="checkbox"  /> I agree with the terms and agreement...</p>
                            </div>
                        </div><!--#wiz1step3-->
                        
                    </div><!--#wizard-->
                    </form>
                    <!-- END OF DEFAULT WIZARD -->
                    
                    
                    <br clear="all" /><br /><br />
                    
                    
                    <div class="contenttitle">
                    	<h2 id="tabbed" class="form"><span>Tabbed Wizard</span></h2>
                    </div><!--contenttitle-->
                    
                    <br />
                    
                    <!-- START OF TABBED WIZARD -->
                    <form class="stdform stdform2" method="post" action="">
                    <div id="wizard2" class="wizard">
                    	
                        <ul class="tabbedmenu">
                            <li>
                            	<a href="#wiz1step2_1">
                                	<span class="h2">STEP 1</span>
                                    <span class="label">Basic Information</span>
                                </a>
                            </li>
                            <li>
                            	<a href="#wiz1step2_2">
                                	<span class="h2">STEP 2</span>
                                    <span class="label">Account Information</span>
                                </a>
                            </li>
                            <li>
                            	<a href="#wiz1step2_3">
                                	<span class="h2">STEP 3</span>
                                    <span class="label">Terms of Agreement</span>
                                </a>
                            </li>
                        </ul>
                        
                        <br clear="all" /><br /><br />
                        	
                        <div id="wiz1step2_1" class="formwiz">
                        	<h2>Step 1: Basic Information</h2> <br />
                        	
                                <p>
                                    <label>First Name</label>
                                    <span class="field"><input type="text" name="firstname" class="longinput" /></span>
                                </p>
                                
                                <p>
                                    <label>Last Name</label>
                                    <span class="field"><input type="text" name="lastname" class="longinput" /></span>
                                </p>
                                                                
                                <p>
                                    <label>Gender</label>
                                    <span class="field"><select name="selection">
                                        <option value="">Choose One</option>
                                        <option value="1">Female</option>
                                        <option value="2">Male</option>
                                    </select></span>
                                </p>
                                
                        	
                            
                        </div><!--#wiz1step2_1-->
                        
                        <div id="wiz1step2_2" class="formwiz">
                        	<h2>Step 2: Account Information</h2> <br />
                            
                                <p>
                                    <label>Account No</label>
                                    <span class="field"><input type="text" name="lastname" class="longinput" /></span>
                                </p>
                                <p>
                                    <label>Address</label>
                                    <span class="field"><textarea cols="80" rows="5" name="location"></textarea></span>
                                </p>
                                                                                               
                        </div><!--#wiz1step2_2-->
                        
                        <div id="wiz1step2_3">
                        	<h2>Step 3: Terms of Agreement</h2>
                            <div class="par terms">
                                <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.</p>
                                <p>Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?</p>
                                <p><input type="checkbox"  /> I agree with the terms and agreement...</p>
                            </div>
                        </div><!--#wiz1step2_3-->
                        
                    </div><!--#wizard-->
                    </form>
                                        
                    <!-- END OF TABBED WIZARD -->
                    
                    <br clear="all" /><br /><br />
                    
                    
                    <div class="contenttitle">
                    	<h2 id="vertical" class="form"><span>Vertical Wizard</span></h2>
                    </div><!--contenttitle-->
                    
                    <br />
                    
                    <!-- START OF VERTICAL WIZARD -->
                    <form class="stdform stdform2" method="post" action="">
                    <div id="wizard3" class="wizard verwizard">
                    	
                        <ul class="verticalmenu">
                            <li>
                            	<a href="#wiz1step3_1">
                                    <span class="label">Step 1: Basic Information</span>
                                </a>
                            </li>
                            <li>
                            	<a href="#wiz1step3_2">
                                    <span class="label">Step 2: Account Information</span>
                                </a>
                            </li>
                            <li>
                            	<a href="#wiz1step3_3">
                                    <span class="label">Step 3: Terms of Agreement</span>
                                </a>
                            </li>
                        </ul>
                                                	
                        <div id="wiz1step3_1" class="formwiz">
                        	<h2>Step 1: Basic Information</h2> <br />
                        	
                                <p>
                                    <label>First Name</label>
                                    <span class="field"><input type="text" name="firstname" class="longinput" /></span>
                                </p>
                                
                                <p>
                                    <label>Last Name</label>
                                    <span class="field"><input type="text" name="lastname" class="longinput" /></span>
                                </p>
                                                                
                                <p>
                                    <label>Gender</label>
                                    <span class="field"><select name="selection">
                                        <option value="">Choose One</option>
                                        <option value="1">Female</option>
                                        <option value="2">Male</option>
                                    </select></span>
                                </p>
                                
                        	
                            
                        </div><!--#wiz1step3_1-->
                        
                        <div id="wiz1step3_2" class="formwiz">
                        	<h2>Step 2: Account Information</h2> <br />
                            
                                <p>
                                    <label>Account No</label>
                                    <span class="field"><input type="text" name="lastname" class="longinput" /></span>
                                </p>
                                <p>
                                    <label>Address</label>
                                    <span class="field"><textarea cols="80" rows="5" name="location" class="longinput"></textarea></span>
                                </p>
                                                                                               
                        </div><!--#wiz1step3_2-->
                        
                        <div id="wiz1step3_3">
                        	<h2>Step 3: Terms of Agreement</h2>
                            <div class="par terms">
                                <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.</p>
                                <p>Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?</p>
                                <p><input type="checkbox"  /> I agree with the terms and agreement...</p>
                            </div>
                        </div><!--#wiz1step3_3-->
                        
                    </div><!--#wizard-->
                    </form>
                    
                    <br clear="all" /><br />
                    
                    <!-- END OF VERTICAL WIZARD -->
                    
                    
                    <!-- START OF POPUP WIZARD -->
                    <div style="display: none;">
                    <div id="popwizard">
                    	
                        <form class="stdform stdform2" method="post" action="">
                        <div id="wizard4" class="wizard">
                            
                            <ul class="hormenu">
                                <li>
                                    <a href="#wiz1step4_1">
                                        <span class="h2">STEP 1</span>
                                        <span class="dot"><span></span></span>
                                        <span class="label">Basic Information</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#wiz1step4_2">
                                        <span class="h2">STEP 2</span>
                                        <span class="dot"><span></span></span>
                                        <span class="label">Account Information</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#wiz1step4_3">
                                        <span class="h2">STEP 3</span>
                                        <span class="dot"><span></span></span>
                                        <span class="label">Terms of Agreement</span>
                                    </a>
                                </li>
                            </ul>
                            
                            <br clear="all" /><br /><br />
                                
                            <div id="wiz1step4_1" class="formwiz">
                                <h2>Step 1: Basic Information</h2> <br />
                                
                                    <p>
                                        <label>First Name</label>
                                        <span class="field"><input type="text" name="firstname" class="longinput" /></span>
                                    </p>
                                    
                                    <p>
                                        <label>Last Name</label>
                                        <span class="field"><input type="text" name="lastname" class="longinput" /></span>
                                    </p>
                                                                    
                                    <p>
                                        <label>Gender</label>
                                        <span class="field"><select name="selection">
                                            <option value="">Choose One</option>
                                            <option value="1">Female</option>
                                            <option value="2">Male</option>
                                        </select></span>
                                    </p>
                                    
                                
                                
                            </div><!--#wiz1step4_1-->
                            
                            <div id="wiz1step4_2" class="formwiz">
                                <h2>Step 2: Account Information</h2> <br />
                                
                                    <p>
                                        <label>Account No</label>
                                        <span class="field"><input type="text" name="lastname" class="longinput" /></span>
                                    </p>
                                    <p>
                                        <label>Address</label>
                                        <span class="field"><textarea cols="80" rows="5" name="location"></textarea></span>
                                    </p>
                                                                                                   
                            </div><!--#wiz1step4_2-->
                            
                            <div id="wiz1step4_3">
                                <h2>Step 3: Terms of Agreement</h2>
                                <div class="par terms">
                                    <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.</p>
                                    <p>Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?</p>
                                    <p><input type="checkbox"  /> I agree with the terms and agreement...</p>
                                </div>
                            </div><!--#wiz1step4_3-->
                            
                        </div><!--#wizard-->
                        </form>
                        
                        <br clear="all" />
                    
                    </div><!--#popwizard-->
                    </div>
                    <!-- END OF POP WIZARD -->
                    
                </div><!--content-->
                
            </div><!--maincontentinner-->
            
           <?php include('footer.php');?>
            
        </div><!--maincontent-->
        
        <div class="mainright floatright">
        	<div class="mainrightinner">
            	
                <div class="widgetbox uncollapsible">
                	<div class="title"><h2 class="general"><span>Examples</span></h2></div>
                    <div class="widgetcontent">
                    	<ul class="linklist">
                        	<li><a href="#default">Default Wizard</a></li>
                            <li><a href="#tabbed">Tabbed Wizard</a></li>
                            <li><a href="#vertical">Vertical Wizard</a></li>
                            <li><a href="#popwizard" class="inline">Popup Wizard</a></li>
                        </ul>
                    </div><!--widgetcontent-->
                </div><!--widgetbox-->
                
            </div><!--mainrightinner-->
        </div><!--mainright-->
                        
     	</div><!--mainwrapperinner-->
    </div><!--mainwrapper-->
	<!-- END OF MAIN CONTENT -->
    

</body>
</html>
