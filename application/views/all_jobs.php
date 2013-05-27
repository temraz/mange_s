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
<script type="text/javascript" >
var base_url = "<?php echo base_url(); ?>";
</script>
<script type="text/javascript" src="<?php echo base_url();?>js/tables.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>js/jquery.dataTables.min.js" ></script>
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
            	
                <!--maintabmenu-->
                <?php include('company_nav.php');?>
              
                <div class="content">
               
                    <div class="contenttitle radiusbottom0">
                	<h2 class="table"><span>Jobs</span></h2>
                </div><!--contenttitle-->
                <div class="tableoptions">
                <?php if(count($jobs) != 0){ ?>
                	<button class="radius3 delete_item" id="jops" title="table1">Delete Selected</button> &nbsp;
                    <?php } ?>
                    <button class="new_Job" title="table1" onclick="window.location = '<?php echo base_url();?>edit/job'">New Job</button> &nbsp;
                </div><!--tableoptions-->	
                <table cellpadding="0" cellspacing="0" border="0" id="table1" class="stdtable stdtablecb">
                    <colgroup>
                        <col class="con0" />
                        <col class="con1" />
                        <col class="con0" />
                        <col class="con1" />
                        <col class="con0" />
                        <col class="con1" />
                    </colgroup>
                    <thead>
                        <tr>
                        	<th class="head0"><input type="checkbox" class="checkall" /></th>
                            <th class="head1">#</th>
                            <th class="head0">Name</th>
                            <th class="head1">Department</th>
                            <th class="head0">Date</th>
                            <th class="head1">Level</th>
                            <th class="head0">Details</th>
                            <th class="head1">Quick View</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php 
				$counter = 1;
				if(isset($jobs) && count($jobs) != 0){
				foreach ($jobs as $row){
					$id=$row->id;
					$name=$row->name;
					$department=$row->department;
					$date=$row->date;
					$level=$row->level;
					$details=$row->description;
					
					 ?>
                       <tr id="<?php echo $id; ?>">
                        	<td class="center"><input type="checkbox" /></td>
                            <td class="center"><?php echo $counter ; ?></td>
                            <td class="center"><?php echo $name ; ?></td>
                            <td class="center"><?php echo $department ; ?></td>
                            <td class="center"><?php echo $date ; ?></td>
                            <td class="center"><?php echo $level ; ?></td>
                            <td class="center"><?php echo substr($details,0,30) ; ?></td>
                            <td class="center"><a href="<?php echo base_url(); ?>company/job/<?php echo $id; ?>" >Quick View</a></td>
                        </tr>
                       <?php $counter++;}?>
                          </tbody>
                </table>
						<?php }else{?>
                        </tbody></table>
                        <br class="all"/>
                    <center><h1 style="color:#c1c1c1">There Are Not Jobs Yet</h1></center>
                    <?php } ?>
                        
                    </tbody>
                </table>
                    
                </div><!--content-->
                
            </div><!--maincontentinner-->
            
           <?php include('footer.php');?>
            
        </div><!--maincontent-->
        
      
     	</div><!--mainwrapperinner-->
    </div><!--mainwrapper-->
	<!-- END OF MAIN CONTENT -->

</body>
</html>
