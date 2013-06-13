<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="shortcut icon" href="<?php echo base_url();?>images/head.png" type="image/x-icon"/>
<title>Dashboard |Business Linkage</title>
<link rel="stylesheet" href="<?php echo base_url();?>css/style.css"  type="text/css" />


<script type="text/javascript" src="<?php echo base_url();?>js/jquery-1.7.min.js" ></script>

<script type="text/javascript" src="<?php echo base_url();?>js/jquery-ui-1.8.16.custom.min.js"></script>
 
 <script type="text/javascript" src="<?php echo base_url();?>js/jquery.flot.min.js" ></script>

<script type="text/javascript" src="<?php echo base_url();?>js/jquery.flot.resize.min.js" ></script>

<script type="text/javascript" src="<?php echo base_url();?>js/jquery-ui-1.8.16.custom.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>js/dashboard.js" ></script>

<script type="text/javascript" src="<?php echo base_url();?>js/general.js"></script>
 
<script type="text/javascript" src="<?php echo base_url();?>js/jquery.wysiwyg.js"></script>
 
<script type="text/javascript" src="<?php echo base_url();?>js/wysiwyg.image.js"></script>
 
<script type="text/javascript" src="<?php echo base_url();?>js/wysiwyg.link.js" ></script>

<script type="text/javascript" src="<?php echo base_url();?>js/wysiwyg.table.js"></script>
 
<script type="text/javascript">
jQuery(document).ready(function() {
								
	jQuery('#wysiwyg').wysiwyg({
		controls: {
			indent: { visible: true },
			outdent: { visible: true },
			subscript: { visible: true },
			superscript: { visible: true },
			redo: { visible: true },
			undo: { visible: true },
			insertOrderedList: { visible: true },
			insertUnorderedList: { visible: true },
			insertHorizontalRule: { visible: true },
			insertTable: { visible: true },
			code: { visible: true },
			removeFormat: { visible: true },
			strikethrough: { visible: true },
			strikeThrough: { visible: true },
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
<link rel="stylesheet" href="<?php echo base_url();?>css/chosen.css" />



</head>

<body class="loggedin">

	<!-- START OF HEADER -->
	<?php include('header2.php');?>
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
        
        <div class="maincontent" >
        	<div class="maincontentinner">
            	
                <ul class="maintabmenu">
                	<li class="current"><a href="<?php echo base_url();?>employee/give_task/" >assign a new task</a></li>
                    <li ><a href="<?php echo base_url();?>employee/tasks_status/" >Tasks status</a></li>
                </ul><!--maintabmenu-->
                
                <div class="content" style="min-height:400px;" >
                	
             <?php if(isset($insert)&& $insert==1){?>
                	<div class="notification msgsuccess">
                        <a class="close"></a>
                        <p>the task delivered to the department manager successfully .</p>
                    </div>
                    <?php }elseif(isset($insert)&& $insert==0){?>
                    <div class="notification msgsuccess">
                        <a class="close"></a>
                        <p>We Are Sorry...the task didn't delivered please try again .</p>
                    </div>
                    <?php }?>
                    
                    <?php if(validation_errors()){?>
                    <div class="notification msgerror">
                        <a class="close"></a>
                        <p><?php echo validation_errors()  ;   ?></p>
                    </div>
                    <?php }?>
                    <div class="contenttitle">
                    	<h2 class="form"><span >Settings</span></h2>
                    </div><!--contenttitle-->
                    
                    <br />
                  <?php if(!isset($no_employees)){?>
                    <?php echo form_open('employee/task_validation',array('id'=>'form2','class'=>'stdform stdform2'));  ?>
                    	<p>
                        	<label>The employee :</label>
                            <span class="field">
                            <select data-placeholder="Choose the dempartment manager..." name="depart_manager"  class="chzn-select"  style="                             width:200px;" tabindex="4">
                            <option value="">select the employee</option> 
                            
                            <?php if(isset($departments)){foreach($departments as $department){?>
                            <?php if(isset($chairman)){?>
                            <option value="<?php echo $department->depart_manager?>"><?php echo $department->firstname.' '.$department->lastname;?></option> 
                            <?php }?>
                            
                            <?php if(isset($manager)){?>
                            <option value="<?php echo $department->sub_depart_manager?>"><?php echo $department->firstname.' '.$department->lastname;?></option> 
                            <?php }?>
                            
                             <?php if(isset($sub_manager)){?>
                            <option value="<?php echo $department->id?>"><?php echo $department->username;?></option> 
                            <?php }?>
                            
                            <?php }}?>
                            
                            </select>
                            </span>
                            
                            
                        </p>
                          <p>
                        	<label>The Deadline :</label>
                            <span class="field">
                          <input type="date" name="deadline" required value="<?php echo $this->input->post('deadline');?>" />
                            </span>
                            
                            
                        </p>
                        
                        <p>
                        	<label>The task :</label>
                            <span class="field">
                              <textarea id="wysiwyg2" name="task" cols="" rows="17"><?php echo $this->input->post('task');?></textarea>  
                           
                            </span>
                            
                            
                        </p>
                        
                      
                        
                     
                        
                        <p class="stdformbutton">
                        	<button type="submit" class="submit radius2">Apply</button>
                        </p>
                    </form>
               <?php }else{?>
                <div class="notification msgalert">
                        
                        <p style="margin-left:70px;">Sorry... there is no employees under your order until now.</p>
                        <a class="close"></a>
                    </div>
               <?php }?>
 
                   
                    
                    
                </div><!--content-->
                
            </div><!--maincontentinner-->
            
           <?php include('footer.php');?>
            
        </div><!--maincontent-->
    <?php include('right_div.php')?>   
     
     	</div><!--mainwrapperinner-->
    </div><!--mainwrapper-->
	<!-- END OF MAIN CONTENT -->
 
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

</body>
</html>
