<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="shortcut icon" href="<?php echo base_url();?>images/head.png" type="image/x-icon"/>
<title>Dashboard |Business Linkage</title>
<link rel="stylesheet" href="<?php echo base_url();?>css/style.css"  type="text/css" />


<script type="text/javascript" src="<?php echo base_url();?>js/jquery-1.7.min.js"></script>
 
<script type="text/javascript" src="<?php echo base_url();?>js/jquery.flot.min.js" ></script>

<script type="text/javascript" src="<?php echo base_url();?>js/jquery.flot.resize.min.js" ></script>

<script type="text/javascript" src="<?php echo base_url();?>js/jquery-ui-1.8.16.custom.min.js"></script>
<script type="text/javascript" >
var base_url = "<?php echo base_url(); ?>";
</script>
<script type="text/javascript" src="<?php echo base_url();?>js/general.js" ></script>
<script type="text/javascript" src="<?php echo base_url();?>js/colorpicker.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>js/dashboard.js" ></script>
<script type="text/javascript" src="<?php echo base_url();?>js/jquery.jgrowl.js" ></script>
<script type="text/javascript" src="<?php echo base_url();?>js/jquery.alerts.js" ></script>

<script type="text/javascript" src="<?php echo base_url();?>js/elements.js" ></script>
<style>
.follow  {float:right;margin-right:50px;margin-top:-20px; border-radius:3px; font-family:Verdana, Geneva, sans-serif }
.follow button {width:80px}
</style>
</head>

<body class="loggedin">

	<!-- START OF HEADER -->
    
	<?php
	if($this->session->userdata('company_logged_in') || $this->session->userdata('user_logged_in')){
			 include('header.php');
		}elseif($this->session->userdata('employee_logged_in')){
			include('header2.php');
			}

	 
	 ?>
    <!-- END OF HEADER -->
        
    <!-- START OF MAIN CONTENT -->
    <div class="mainwrapper">
     	<div class="mainwrapperinner">
         	
        <div class="mainleft">
          	<div class="mainleftinner">
            
              	<?php  if($this->session->userdata('company_logged_in')){ include('left_menu_company.php'); } elseif($this->session->userdata('user_logged_in')){include('left_menu_user.php');}elseif($this->session->userdata('employee_logged_in')){include('left_menu.php');}?>
            	<div id="togglemenuleft"><a></a></div>
            </div><!--mainleftinner-->
        </div><!--mainleft-->
        
        <div class="maincontent">
        	<div class="maincontentinner">

                <?php include('company_taps.php');?>
                <div class="content">
                <?php 
				if(isset($pro_data)){
				foreach($pro_data as $row){
					$name = $row->name;
					$about = $row->about;
					$about_product = $row->about_product;
					$logo = $row->logo;
					$website = $row->website;
					 ?>
                
                	<div class="one_half" style="width:100%">
                    	<h1> What About <?php echo $name; ?> ?</h1>
                        <?php if($this->session->userdata('user_logged_in')){ 
						$this->load->model('model_users');
						$user_id = $this->session->userdata('user_id');
						$company_id = $this->uri->segment(3);
						 ?>
                        <div class="follow"><a href="<?php echo base_url();?>user/<?php if(!$this->model_users->is_follow($company_id,$user_id)){ echo 'follow';}else{ echo 'unfollow';}?>/<?php echo $user_id;?>/<?php echo $company_id; ?>" class="stdbtn <?php if(!$this->model_users->is_follow($company_id,$user_id)){ echo 'btn_blue';}else{ echo 'btn_red';}?>"><?php if(!$this->model_users->is_follow($company_id,$user_id)){ echo 'Follow';}else{ echo 'Unfollow';}?></a>&nbsp;&nbsp;&nbsp;<button class="stdbtn btn_yellow">Contact</button></div>
                        <?php  } ?>
                        <br />
                    	<p><img src="<?php echo base_url();?>images/campanies_logo/<?php echo $logo; ?>" height="200" width="270" style="float:left ; border:1px solid #c1c1c1 ; margin:10px ; padding:3px "/><p style="margin-right:5px"><?php if(isset($about)){echo $about; }else { ?>
                            <center style="margin:10px"><span> There is not <a href="<?php echo base_url(); ?>edit">Update</a> Yet.</span></center>
								<?php } ?></p>
                    </div>
                    
                    <br clear="all" /><br />
                    
                    <div class="one_half">
                    	<h1><?php echo $name; ?>'s Products </h1>
                        <br />
                    	<p><?php if(isset($about_product)){echo $about_product; }else { ?>
                            <span> There is not <a href="<?php echo base_url(); ?>edit">Update</a> Yet.</span>
								<?php } ?> </p>
                    </div>
                    
                     <div class="one_half last">
                    	<h1>Latest Announcement</h1>
                                       <br />
                        <div class="widgetcontent announcement">
                        <?php if(count($feed_segment) != 0){
							foreach($feed_segment as $row){
							$title = $row->title;
							$date = $row->date;
							$link = $row->link;
							 ?>
                            <p>
                            <span class="radius2"><?php echo $date; ?></span> <br /><a href="<?php echo $link; ?>"><?php echo $title; ?></a></p>
                            <?php  }}else { ?>
                            <span> There are not Announcements Yet.</span>
								<?php } ?>
                           
                        </div>
                    </div>
                                   <br clear="all" /><br />
                    
                    <div class="one_half">
                    	<h1>Follows Overview</h1>
                        <br />
                    <div class="chartbox widgetcontent">
                    	<div id="chartplace2" class="chartplace"></div>
                        
                        <div class="one_half">
                        	<div class="analytics analytics2">
                                <small>Follows For Today</small>
                                <h1>23 321</h1>
                                <small>18,222 unique</small>
                            </div><!--visitoday-->
                        </div><!--one_half-->
                        
                        <div class="one_half last">
                        	
                            <div class="one_half">
                            	<div class="analytics">
                                    <small>bounce</small>
                                    <h3>23.2%</h3>
                                </div><!--analytics-->
                            </div><!--one_half-->
                            
                            <div class="one_half last">
                            	<div class="analytics textright">
                                    <small class="block">Follows</small>
                                    <h3>56.8%</h3>
                                </div><!--analytics-->
                            </div><!--one_half last-->
                            <br clear="all" />
                            
                            <div class="analytics average margintop10">
                                Average <h3>87.44%</h3>
                            </div><!--analytics-->
                            
                        </div><!--one_half-->
                        
                        
                        <br clear="all" />
                    </div><!--widgetcontent-->
                     </div><!--one_half last-->
                                                       
                    <div class="one_half last">
                    	<h1>Related Links </h1>
                        <br />
                    	 <p>
                           <?php if(isset($website)){echo $website; }else { ?>
                            <span> There is not <a href="<?php echo base_url(); ?>edit">Update</a> Yet.</span>
								<?php } ?></p>
                    </div>
                                  
                                  <br clear="all" />     
                    <?php }} ?>
                    
                </div><!--content-->
                
            </div><!--maincontentinner-->
            
           <?php include('footer.php');?>
            
        </div><!--maincontent-->
        <?php if($this->session->userdata('company_logged_in')){ ?>
        <div class="mainright">
        	<div class="mainrightinner">
            	  <div class="widgetbox">
                	<div class="title"><h2 class="calendar"><span>Calendar</span></h2></div>
                    <div class="widgetcontent padding0">
                    	<div id="datepicker"></div>
                    </div><!--widgetcontent-->
                </div><!--widgetbox-->
                <div class="widgetbox" >
                        <div class="title"><h2 class="tabbed"><span>Recent Activity</span></h2></div>
                        <div class="widgetcontent padding0">
                            <ul class="activitylist">
                            <?php include('recent_activity.php');?>
                            </ul>
                        </div><!--widgetcontent-->
                    </div><!--widgetbox-->
                    <br />
                    <?php if($this->session->userdata('comp_id') ==  $this->uri->segment(3)){ ?>
                <div class="widgetbox" style="border:1px solid #c1c1c1;border-top:hidden">
                        <div class="title"><h2 class="tabbed"><span>The Bill</span></h2></div>
                            <center><h1 style="font-size:100px ; color:#c1c1c1 ; margin-top:10px ;word-wrap:break-word"><?php echo $bill; ?> $</h1></center>
                            <br clear="all" />
                        <div class="pay" style="padding:10px;border-top:1px solid #c1c1c1;cursor:pointer;">
                        <center><h1>PAY NOW</h1></center>
                        </div>
                        </div>
                        <br />
                        <?php } ?>
                 <div class="widgetbox">
                	<div class="title"><h2 class="tabbed"><span>Tabbed Widget</span></h2></div>
                    <div class="widgetcontent padding0">
                    	<div id="tabs">
                        	<ul>
                                <li><a href="#tabs-1">Products</a></li>
                                <li><a href="#tabs-2">Posts</a></li>
                                <li><a href="#tabs-3">Media</a></li>
                            </ul>
                            <div id="tabs-1">
                                <ul class="listthumb">
                                	<li><img src="<?php echo base_url();?>images/thumb1.png" alt="" /> <a href="">Proin elit arcu, rutrum commodo</a></li>
                                    <li><img src="<?php echo base_url();?>images/thumb2.png"  alt="" /> <a href="">Aenean tempor ullamcorper leo</a></li>
                                    <li><img src="<?php echo base_url();?>images/thumb3.png"  alt="" /> <a href="">Vehicula tempus, commodo a, risus</a></li>
                                    <li><img src="<?php echo base_url();?>images/thumb4.png"  alt="" /> <a href="">Donec sollicitudin mi sit amet mauris</a></li>
                                    <li><img src="<?php echo base_url();?>images/thumb5.png"  alt="" /> <a href="">Curabitur nec arcu</a></li>
                                </ul>
                            </div>
                            <div id="tabs-2">
                                <ul>
                                	<li><a href="">Proin elit arcu, rutrum commodo</a></li>
                                    <li><a href="">Aenean tempor ullamcorper leo</a></li>
                                    <li><a href="">Vehicula tempus, commodo a, risus</a></li>
                                    <li><a href="">Donec sollicitudin mi sit amet mauris</a></li>
                                    <li><a href="">Curabitur nec arcu</a></li>
                                </ul>
                            </div>
                            <div id="tabs-3">
                                <ul class="thumb">
                                	<li><a href="#"><img src="<?php echo base_url();?>images/thumb1-1.png"  alt="" /></a></li>
                                    <li><a href="#"><img src="<?php echo base_url();?>images/thumb2-1.png"  alt="" /></a></li>
                                    <li><a href="#"><img src="<?php echo base_url();?>images/thumb3-1.png"  alt="" /></a></li>
                                    <li><a href="#"><img src="<?php echo base_url();?>images/thumb4-1.png"  alt="" /></a></li>
                                    <li><a href="#"><img src="<?php echo base_url();?>images/thumb5-1.png"  alt="" /></a></li>
                                    <li><a href="#"><img src="<?php echo base_url();?>images/thumb6.png"  alt="" /></a></li>
                                    <li><a href="#"><img src="<?php echo base_url();?>images/thumb7.png"  alt="" /></a></li>
                                    <li><a href="#"><img src="<?php echo base_url();?>images/thumb8.png"  alt="" /></a></li>
                                </ul>     
                        	</div>
                        </div><!--#tabs-->
                    </div><!--widgetcontent-->
                </div><!--widgetbox-->
                
           
                
               
                
                
              
               
               </div><!--mainrightinner-->
        </div><!--mainright-->  
        <?php }elseif($this->session->userdata('employee_logged_in')){
         include('right_div.php');
       }?>
     	</div><!--mainwrapperinner-->
    </div><!--mainwrapper-->
	<!-- END OF MAIN CONTENT -->
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
