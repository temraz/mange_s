<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Editor | Business Linkage</title>
<link rel="shortcut icon" href="<?php echo base_url();?>images/head.png" type="image/x-icon"/>
<link rel="stylesheet" href="<?php echo base_url();?>css/style.css"  type="text/css" />

<script type="text/javascript" src="<?php echo base_url();?>js/jquery-1.7.min.js" ></script>

<script type="text/javascript" src="<?php echo base_url();?>js/jquery-ui-1.8.16.custom.min.js"></script>
 
<script type="text/javascript" src="<?php echo base_url();?>js/general.js"></script>
 
<script type="text/javascript" src="<?php echo base_url();?>js/jquery.wysiwyg.js"></script>
 
<script type="text/javascript" src="<?php echo base_url();?>js/wysiwyg.image.js"></script>
 
<script type="text/javascript" src="<?php echo base_url();?>js/wysiwyg.link.js" ></script>

<script type="text/javascript" src="<?php echo base_url();?>js/wysiwyg.table.js"></script>
 
<script type="text/javascript">
jQuery(document).ready(function() {
								
	jQuery('#wysiwyg').wysiwyg({
		controls: {
			indent: { visible: false },
			outdent: { visible: false },
			subscript: { visible: false },
			superscript: { visible: false },
			redo: { visible: false },
			undo: { visible: false },
			insertOrderedList: { visible: false },
			insertUnorderedList: { visible: false },
			insertHorizontalRule: { visible: false },
			insertTable: { visible: false },
			code: { visible: false },
			removeFormat: { visible: false },
			strikethrough: { visible: false },
			strikeThrough: { visible: false },
		}
	});
	
	jQuery('#wysiwyg2').wysiwyg({
		controls: { 
			cut: {visible: true },
			copy: { visible: true },
			paste: { visible: true }
		}
	});
});
</script>

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
            	
                
                <div class="content">
                
                	
                    
                
                    
                    <div class="contenttitle radiusbottom0">
                    	<h2 class="form"><span>File Name!</span></h2>
                    </div><!--contenttitle-->
                     
                    <textarea id="wysiwyg2" cols="" rows="30"></textarea> 
                   <button class="stdbtn btn_black" style="margin-top:20px;">Save File</button>
                </div><!--content-->
                
            </div><!--maincontentinner-->
            
            <?php include('footer.php');?>
            
        </div><!--maincontent-->
                        
     	</div><!--mainwrapperinner-->
    </div><!--mainwrapper-->
	<!-- END OF MAIN CONTENT -->
    

</body>
</html>
