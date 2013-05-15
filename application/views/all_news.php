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
                	<h2 class="table"><span>News</span></h2>
                </div><!--contenttitle-->
                <div class="tableoptions">
                <?php if(count($news) != 0){ ?>
                	<button class="delete_item radius3" title="table1">Delete Selected</button> &nbsp;
                    <?php } ?>
                    <button class="new_new" title="table1" onclick="window.location = '<?php echo base_url();?>edit/news'">New News</button> &nbsp;
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
                            <th class="head0">Logo</th>
                            <th class="head1">Title</th>     
                            <th class="head0">Date</th>
                            <th class="head1">Details</th>
                            <th class="head0">Quick View</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php 
				$counter = 1;
				if(isset($news) && count($news) != 0){
				foreach ($news as $row){
					$id=$row->id;
					$title=$row->title;
					$date=$row->date;
					$details=$row->details;
					$logo = $row->logo;
					 ?>
                        <tr>
                        	<td class="center"><input type="checkbox" /></td>
                            <td class="center"><?php echo $counter ; ?></td>
                             <td class="center"><img src="<?php echo base_url(); ?>images/news/<?php echo $logo ; ?>"  width="60" height="50" style="border:1px solid #1c1c1c"/></td>
                            <td class="center"><?php echo $title ; ?></td>
                            <td class="center"><?php echo $date ; ?></td>
                            <td class="center"><?php echo substr($details,0,30) ; ?></td>
                            <td class="center"><a href="<?php echo base_url(); ?>company/news_show/<?php echo $id; ?>" >Quick View</a></td>
                        </tr>
                       <?php $counter++;}?>
                          </tbody>
                </table>
						<?php }else{?>
                        </tbody></table>
                        <br class="all"/>
                    <center><h1 style="color:#c1c1c1">There Are Not News Yet</h1></center>
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