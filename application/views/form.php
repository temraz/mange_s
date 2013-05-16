<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Business Linkage</title>
<link rel="shortcut icon" href="<?php echo base_url();?>images/head.png" type="image/x-icon"/>
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
<script type="text/javascript" src="<?php echo base_url();?>js/jquery-1.7.min.js" ></script>
<script type="text/javascript" src="<?php echo base_url();?>js/jquery-ui-1.8.16.custom.min.js" ></script>
<script type="text/javascript" src="<?php echo base_url();?>js/jquery.validate.min.js" ></script>
<script type="text/javascript" src="<?php echo base_url();?>js/general.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>/js/form.js" ></script>
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
        
        <div class="maincontent noright">
        	<div class="maincontentinner">
            	
                <ul class="maintabmenu multipletabmenu">
                	<li class="current"><a href="form.html" tppabs="http://themepixels.com/themes/demo/webpage/starlight/form.html">Form Styling</a></li>
                    <li><a href="editor.html" tppabs="http://themepixels.com/themes/demo/webpage/starlight/editor.html">WYSIWYG Editor</a></li>
                    <li><a href="wizard.html" tppabs="http://themepixels.com/themes/demo/webpage/starlight/wizard.html">Wizard</a></li>
                </ul><!--maintabmenu-->
                
                <div class="content">
                
                    <div class="contenttitle">
                    	<h2 class="form"><span>Basic Form</span></h2>
                    </div><!--contenttitle-->
                    
                    <br />
                    
                    <form class="stdform" action="" method="post">
                    	
                        <p>
                        	<label>Small Input</label>
                            <span class="field"><input type="text" name="input1" class="smallinput" /></span>
                            <small class="desc">Small description of this field.</small>
                        </p>
                        
                        <p>
                        	<label>Medium Input</label>
                            <span class="field"><input type="text" name="input2" class="mediuminput" /></span>
                        </p>
                        
                        <p>
                        	<label>Long Input</label>
                            <span class="field"><input type="text" name="input3" class="longinput" /></span>
                        </p>
                        
                        <p>
                        	<label>Textarea</label>
                            <span class="field"><textarea cols="80" rows="5" class="longinput"></textarea></span> 
                        </p>
                        
                        <p>
                        	<label>Select</label>
                            <span class="field">
                            <select name="select">
                            	<option value="">Choose One</option>
                                <option value="">Selection One</option>
                                <option value="">Selection Two</option>
                                <option value="">Selection Three</option>
                                <option value="">Selection Four</option>
                            </select>
                            </span>
                        </p>
                        
                        <p>
                        	<label>Multiple Select</label>
                            <span class="field">
                            <select name="select2" multiple="multiple" size="5">
                                <option value="">Selection One</option>
                                <option value="">Selection Two</option>
                                <option value="">Selection Three</option>
                                <option value="">Selection Four</option>
                                <option value="">Selection Five</option>
                                <option value="">Selection Six</option>
                                <option value="">Selection Seven</option>
                                <option value="">Selection Eight</option>
                            </select>
                            </span>
                        </p>
                        
                        <p>
                        	<label>Dual Select</label>
                            <span id="dualselect" class="dualselect">
                            	<select name="select3" multiple="multiple" size="10">
                                    <option value="">Selection One</option>
                                    <option value="">Selection Two</option>
                                    <option value="">Selection Three</option>
                                    <option value="">Selection Four</option>
                                    <option value="">Selection Five</option>
                                    <option value="">Selection Six</option>
                                    <option value="">Selection Seven</option>
                                    <option value="">Selection Eight</option>
                                </select>
                                <span class="ds_arrow">
                                	<span class="arrow ds_prev">&laquo;</span>
                                    <span class="arrow ds_next">&raquo;</span>
                                </span>
                                <select name="select4" multiple="multiple" size="10">
                                	<option value=""></option>
                                </select>
                            </span>
                        </p>
                        
                        <p>
                        	<label>Radio (Horizontal)</label>
                            <span class="formwrapper">
                            	<input type="radio" name="radiofield" /> Radio 1 &nbsp;&nbsp;
                            	<input type="radio" name="radiofield" /> Radio 2 &nbsp;&nbsp;
                                <input type="radio" name="radiofield" /> Radio 3 
                            </span>
                        </p>
                        
                        <p>
                        	<label>Radio (Vertical)</label>
                            <span class="formwrapper">
                            	<input type="radio" name="radiofield2" /> Radio 1 <br />
                            	<input type="radio" name="radiofield2" /> Radio 2 <br />
                                <input type="radio" name="radiofield2" /> Radio 3 
                            </span>
                        </p>
                        
                        <p>
                        	<label>Checkboxes (Horizontal)</label>
                            <span class="formwrapper">
                            	<input type="checkbox" name="check" /> Checkbox 1 &nbsp;&nbsp;
                            	<input type="checkbox" name="check" /> Checkbox 2 &nbsp;&nbsp;
                                <input type="checkbox" name="check" /> Checkbox 3 
                            </span>
                        </p>
                        
                        <p>
                        	<label>Checkboxes (Vertical)</label>
                            <span class="formwrapper">
                            	<input type="checkbox" name="check2" /> Checkbox 1 <br />
                            	<input type="checkbox" name="check2" /> Checkbox 2 <br />
                                <input type="checkbox" name="check2" /> Checkbox 3 
                            </span>
                        </p>
                        
                        <p>
                        	<label>Even More Checkboxes</label>
                            <span class="formwrapper">
                            	<span class="one_fourth">
                                    <input type="checkbox" name="check3" /> Checkbox 1 <br />
                                    <input type="checkbox" name="check3" /> Checkbox 2 <br />
                                    <input type="checkbox" name="check3" /> Checkbox 3 <br />
                                    <input type="checkbox" name="check3" /> Checkbox 4 <br />
                                    <input type="checkbox" name="check3" /> Checkbox 5 <br />
                                    <input type="checkbox" name="check3" /> Checkbox 6 
                                </span>
                                <span class="one_fourth">
                                    <input type="checkbox" name="check3" /> Checkbox 7 <br />
                                    <input type="checkbox" name="check3" /> Checkbox 8 <br />
                                    <input type="checkbox" name="check3" /> Checkbox 9 <br />
                                    <input type="checkbox" name="check3" /> Checkbox 10 <br />
                                    <input type="checkbox" name="check3" /> Checkbox 11 <br />
                                    <input type="checkbox" name="check3" /> Checkbox 12 
                                </span>
                                <span class="one_fourth">
                                    <input type="checkbox" name="check3" /> Checkbox 13 <br />
                                    <input type="checkbox" name="check3" /> Checkbox 14 <br />
                                    <input type="checkbox" name="check3" /> Checkbox 15 <br />
                                    <input type="checkbox" name="check3" /> Checkbox 16 <br />
                                    <input type="checkbox" name="check3" /> Checkbox 17 <br />
                                    <input type="checkbox" name="check3" /> Checkbox 18 
                                </span>
                            </span>
                        </p>
                        
                        <br clear="all" /><br />
                        
                        <p class="stdformbutton">
                        	<button class="submit radius2">Submit Button</button>
                            <input type="reset" class="reset radius2" value="Reset Button" />
                        </p>
                        
                        
                    </form>
                    
                    
                    <br clear="all" /><br />
                    
                    <div class="contenttitle">
                    	<h2 class="form"><span>Simple Form with Validation</span></h2>
                    </div><!--contenttitle-->
                    
                    <br />
                    
                    <form id="form1" class="stdform" method="post" action="">
                    	<p>
                        	<label>First Name</label>
                            <span class="field"><input type="text" name="firstname" id="firstname" class="longinput" /></span>
                        </p>
                        
                        <p>
                        	<label>Last Name</label>
                            <span class="field"><input type="text" name="lastname" id="lastname" class="longinput" /></span>
                        </p>
                        
                        <p>
                        	<label>Email</label>
                            <span class="field"><input type="text" name="email" id="email" class="longinput" /></span>
                        </p>
                        
                        <p>
                        	<label>Location</label>
                            <span class="field"><textarea cols="80" rows="5" name="location" class="mediuminput" id="location"></textarea></span> 
                        </p>
                        
                        <p>
                        	<label>Select</label>
                            <span class="field">
                            <select name="selection" id="selection">
                            	<option value="">Choose One</option>
                                <option value="1">Selection One</option>
                                <option value="2">Selection Two</option>
                                <option value="3">Selection Three</option>
                                <option value="4">Selection Four</option>
                            </select>
                            </span>
                        </p>
                        
                        <br />
                        
                        <p class="stdformbutton">
                        	<button class="submit radius2">Submit Button</button>
                        </p>
                    </form>
                    
                    
                    <br clear="all" /><br />
                    
                    <div class="contenttitle">
                    	<h2 class="form"><span>Just another form style</span></h2>
                    </div><!--contenttitle-->
                    
                    <br />
                    
                    <form id="form2" class="stdform stdform2" method="post" action="">
                    	<p>
                        	<label>First Name</label>
                            <span class="field"><input type="text" name="firstname" id="firstname2" class="longinput" /></span>
                        </p>
                        
                        <p>
                        	<label>Last Name</label>
                            <span class="field"><input type="text" name="lastname" id="lastname2" class="longinput" /></span>
                        </p>
                        
                        <p>
                        	<label>Email</label>
                            <span class="field"><input type="text" name="email" id="email2" class="longinput" /></span>
                        </p>
                        
                        <p>
                        	<label>Location <small>You can put your own description for this field here.</small></label>
                            <span class="field"><textarea cols="80" rows="5" name="location" id="location2" class="longinput"></textarea></span>
                        </p>
                        
                        <p>
                        	<label>Select</label>
                            <span class="field"><select name="selection" id="selection2">
                            	<option value="">Choose One</option>
                                <option value="1">Selection One</option>
                                <option value="2">Selection Two</option>
                                <option value="3">Selection Three</option>
                                <option value="4">Selection Four</option>
                            </select></span>
                        </p>
                        
                        
                        <p class="stdformbutton">
                        	<button class="submit radius2">Submit Button</button>
                            <input type="reset" class="reset radius2" value="Reset Button" />
                        </p>
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
