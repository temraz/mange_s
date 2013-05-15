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
                	<h2 class="table"><span>Photos</span></h2>
                </div><!--contenttitle-->
                <div class="tableoptions">
                <?php if(count($picx) != 0){ ?>
                	<button class="delete_item radius3" title="table1">Delete Selected</button> &nbsp;
                    <?php }?>
                    <button class="new_photo" title="table1" onclick="window.location = '<?php echo base_url();?>edit/media'">New Photo</button> &nbsp;
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
                            <th class="head0">Thumbnail</th>
                            <th class="head1">Caption</th>
                            <th class="head1">View</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php 
				$counter = 1;
				if(isset($picx) && count($picx) != 0){
				foreach ($picx as $row){
					$id=$row->id;
					$pic=$row->pic;
					$caption=$row->caption;
					 ?>
                        <tr>
                        	<td class="center"><input type="checkbox" /></td>
                            <td class="center"><?php echo $counter ; ?></td>
                            <td class="center"><img src="<?php echo base_url(); ?>images/company_gallery/<?php echo $pic ; ?>"  width="60" height="50" style="border:1px solid #1c1c1c"/></td>
                            <td class="center"><?php echo $caption ; ?></td>
                            <td class="center"> <div class="gallery-item"><a href="<?php echo base_url();?>images/company_gallery/<?php echo $pic ; ?>" tppabs="<?php echo base_url();?>images/company_gallery/<?php echo $pic ; ?>" class="view">View</a></div></td>
                        </tr>
                        <?php $counter++;}?>
                          </tbody>
                </table>
						<?php }else{?>
                        </tbody></table>
                        <br class="all"/>
                    <center><h1 style="color:#c1c1c1">There Are Not Photos Yet</h1></center>
                    <?php } ?>
                    
                </div><!--content-->
                
            </div><!--maincontentinner-->
            
           <?php include('footer.php');?>
            
        </div><!--maincontent-->
        
      
     	</div><!--mainwrapperinner-->
    </div><!--mainwrapper-->
	<!-- END OF MAIN CONTENT -->
    <script type="text/javascript" src="<?php echo base_url();?>js/media.js" ></script>
    <script>var flash = [[0, 2], [1, 6], [2,3], [3, 8], [4, 5], [5, 13], [6, 8]];
		
		function showTooltip(x, y, contents) {
			jQuery('<div id="tooltip" class="tooltipflot">' + contents + '</div>').css( {
				position: 'absolute',
				display: 'none',
				top: y + 5,
				left: x + 5
			}).appendTo("body").fadeIn(200);
		}

		
		var plot = jQuery.plot(jQuery("#chartplace2"),
			   [ { data: flash, label: "Follows", color: "#069"} ], {
				   series: {
					   lines: { show: true, lineWidth: 1, fill: true, fillColor: { colors: [ { opacity: 0.1 }, { opacity: 0.5 } ] } },
					   points: { show: true, radius: 2 }, shadowSize: 0
				
				   },
				   legend: { position: 'nw'},
				   grid: { hoverable: true, clickable: true, labelMargin: 5, borderWidth: 1, borderColor: '#bbb' },
				   yaxis: { show: false, min: 0, max: 14 },
				 });
		
		var previousPoint = null;
		jQuery("#chartplace2").bind("plothover", function (event, pos, item) {
			jQuery("#x").text(pos.x.toFixed(2));
			jQuery("#y").text(pos.y.toFixed(2));
			
			if(item) {
                if (previousPoint != item.dataIndex) {
                    previousPoint = item.dataIndex;
                    
                    jQuery("#tooltip").remove();
                    var x = item.datapoint[0].toFixed(2),
                        y = item.datapoint[1].toFixed(2);
                    
                    showTooltip(item.pageX, item.pageY,
                                item.series.label + " of " + x + " = " + y);
                }
            }
            else {
                jQuery("#tooltip").remove();
                previousPoint = null;            
            }
	
		});
	
		jQuery("#chartplace2").bind("plotclick", function (event, pos, item) {
			if (item) {
				jQuery("#clickdata").text("You clicked point " + item.dataIndex + " in " + item.series.label + ".");
				plot.highlight(item.series, item.datapoint);
			}
		});
		
		</script>

</body>
</html>
