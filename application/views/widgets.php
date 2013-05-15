<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Busiess Linkage</title>
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
<script type="text/javascript" src="<?php echo base_url();?>js/jquery.flot.min.js" ></script>
<script type="text/javascript" src="<?php echo base_url();?>js/general.js" ></script>
<script type="text/javascript" src="<?php echo base_url();?>js/widgets.js" ></script>
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
            	
                <ul class="maintabmenu">
                	<li class="current"><a href="dashboard.html" tppabs="http://themepixels.com/themes/demo/webpage/starlight/dashboard.html">Widgets</a></li>
                </ul><!--maintabmenu-->
                
                <div class="content widgetgrid">
                	
					<div class="widgetbox" style="width: 300px">
                        <div class="title"><h2 class="tabbed"><span>Latest Announcement</span></h2></div>
                        <div class="widgetcontent announcement">
                            <p>
                            <span class="radius2">Jan 19, 2012</span> <br />Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium.</p>
                            <p>
                            <span class="radius2">Jan 18, 2012</span> <br />Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo.</p>
                        </div><!--widgetcontent-->
                    </div><!--widgetbox-->
                    
                    <div class="widgetbox" style="width: 300px">
                        <div class="title"><h2 class="tabbed"><span>Statements</span></h2></div>
                        <div class="widgetcontent padding0 statement">
                           <table cellpadding="0" cellspacing="0" border="0" class="stdtable">
                                <colgroup>
                                    <col class="con0" />
                                    <col class="con1" />
                                    <col class="con0" />
                                </colgroup>
                                <thead>
                                    <tr>
                                        <th class="head0">Date</th>
                                        <th class="head1">Sales</th>
                                        <th class="head0">Earnings</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>01/12/12</td>
                                        <td>10</td>
                                        <td>$250.12</td>
                                    </tr>
                                    <tr>
                                        <td>01/11/12</td>
                                        <td>5</td>
                                        <td>$100.43</td>
                                    </tr>
                                    <tr>
                                        <td>01/10/12</td>
                                        <td>22</td>
                                        <td>$1010.00</td>
                                    </tr>
                                    <tr>
                                        <td>01/09/12</td>
                                        <td>21</td>
                                        <td>$1000.23</td>
                                    </tr>
                                    <tr>
                                        <td>01/08/12</td>
                                        <td>14</td>
                                        <td>$500.22</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div><!--widgetcontent-->
                    </div><!--widgetbox-->
                    
                    <div class="widgetbox" style="width: 300px">
                        <div class="title"><h2 class="tabbed"><span>Recent Activity</span></h2></div>
                        <div class="widgetcontent padding0">
                            <ul class="activitylist">
                            	<li class="message"><a href=""><strong>John Doe</strong> sent a message <span>Just now</span></a></li>
                                <li class="user"><a href=""><strong>Paran Meller</strong> added <strong>23 users</strong> <span>Yesterday</span></a></li>
                                <li class="user"><a href=""><strong>Owen Lee</strong> added <strong>2 users</strong> <span>2 days ago</span></a></li>
                                <li class="message"><a href=""><strong>Jane Call</strong> sent a message <span>5 days ago</span></a></li>
                                <li class="media"><a href=""><strong>George Turk</strong> uploaded <strong>2 photos</strong> <span>5 days ago</span></a></li>
                            </ul>
                        </div><!--widgetcontent-->
                    </div><!--widgetbox-->
                    
                    <div class="widgetbox" style="width: 300px">
                        <div class="title"><h2 class="calendar"><span>Event Calendar</span></h2></div>
                        <div class="widgetcontent padding0">
                            <div id="datepicker"></div>
                        </div><!--widgetcontent-->
                    </div><!--widgetbox-->
                    
                    <div class="widgetbox" style="width: 300px">
                        <div class="title"><h2 class="general"><span>Recent Users</span></h2></div>
                        <div class="widgetcontent userlistwidget">
                            <ul>
                            	<li>
                                	<div class="avatar"><img src="avatar2.png" tppabs="http://themepixels.com/themes/demo/webpage/starlight/images/avatar2.png" alt="" /></div>
                                    <div class="info">
                                    	<a href="">Billie Norris</a> <br />
                                        Software Engineer <br /> 18 minutes ago
                                    </div><!--info-->
                                </li>
                                <li>
                                	<div class="avatar"><img src="avatar2.png" tppabs="http://themepixels.com/themes/demo/webpage/starlight/images/avatar2.png" alt="" /></div>
                                    <div class="info">
                                    	<a href="">Billie Norris</a> <br />
                                        Software Engineer <br /> 18 minutes ago
                                    </div><!--info-->
                                </li>
                            </ul>
                            <br clear="all" />
                            <a href="" class="more">View More Users</a>
                        </div><!--widgetcontent-->
                    </div><!--widgetbox-->
                    
                    <div class="widgetbox" style="width: 300px">
                        <div class="title"><h2 class="general"><span>Form Widget</span></h2></div>
                        <div class="widgetcontent stdform stdformwidget">
                            <div class="par">
                            	<label>Account ID</label>
                                <div class="field">
                                	<input type="text" name="id" class="longinput" />
                                </div>
                            </div><!--par-->
                            <div class="par">
                            	<label>Amount</label>
                                <div class="field">
                                	<input type="text" name="id" class="longinput" /> <br />
                                    <small>Some description here</small>
                                </div>
                            </div><!--par-->
                            <div class="par">
                                <div class="field">
                                	<button class="radius2">Send</button>
                                </div>
                            </div><!--par-->
                        </div><!--widgetcontent-->
                    </div><!--widgetbox-->
                    
                    <div class="widgetbox" style="width: 300px">
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
                                        <li><img src="thumb1.png" tppabs="http://themepixels.com/themes/demo/webpage/starlight/images/thumb/small/thumb1.png" alt="" /> <a href="">Proin elit arcu, rutrum commodo</a></li>
                                        <li><img src="thumb2.png" tppabs="http://themepixels.com/themes/demo/webpage/starlight/images/thumb/small/thumb2.png" alt="" /> <a href="">Aenean tempor ullamcorper leo</a></li>
                                        <li><img src="thumb3.png" tppabs="http://themepixels.com/themes/demo/webpage/starlight/images/thumb/small/thumb3.png" alt="" /> <a href="">Vehicula tempus, commodo a, risus</a></li>
                                        <li><img src="thumb4.png" tppabs="http://themepixels.com/themes/demo/webpage/starlight/images/thumb/small/thumb4.png" alt="" /> <a href="">Donec sollicitudin mi sit amet mauris</a></li>
                                        <li><img src="thumb5.png" tppabs="http://themepixels.com/themes/demo/webpage/starlight/images/thumb/small/thumb5.png" alt="" /> <a href="">Curabitur nec arcu</a></li>
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
                                        <li><a href="#"><img src="thumb1-1.png" tppabs="http://themepixels.com/themes/demo/webpage/starlight/images/thumb/xsmall/thumb1.png" alt="" /></a></li>
                                        <li><a href="#"><img src="thumb2-1.png" tppabs="http://themepixels.com/themes/demo/webpage/starlight/images/thumb/xsmall/thumb2.png" alt="" /></a></li>
                                        <li><a href="#"><img src="thumb3-1.png" tppabs="http://themepixels.com/themes/demo/webpage/starlight/images/thumb/xsmall/thumb3.png" alt="" /></a></li>
                                        <li><a href="#"><img src="thumb4-1.png" tppabs="http://themepixels.com/themes/demo/webpage/starlight/images/thumb/xsmall/thumb4.png" alt="" /></a></li>
                                        <li><a href="#"><img src="thumb5-1.png" tppabs="http://themepixels.com/themes/demo/webpage/starlight/images/thumb/xsmall/thumb5.png" alt="" /></a></li>
                                        <li><a href="#"><img src="thumb6.png" tppabs="http://themepixels.com/themes/demo/webpage/starlight/images/thumb/xsmall/thumb6.png" alt="" /></a></li>
                                        <li><a href="#"><img src="thumb7.png" tppabs="http://themepixels.com/themes/demo/webpage/starlight/images/thumb/xsmall/thumb7.png" alt="" /></a></li>
                                        <li><a href="#"><img src="thumb8.png" tppabs="http://themepixels.com/themes/demo/webpage/starlight/images/thumb/xsmall/thumb8.png" alt="" /></a></li>
                                    </ul>     
                                </div>
                            </div><!--#tabs-->
                        </div><!--widgetcontent-->
                    </div><!--widgetbox-->
                    
                    
                    <div class="widgetbox" style="width: 300px">
                        <div class="title"><h2 class="chart"><span>Visitors Overview</span></h2></div>
                        <div class="widgetcontent chartbox">
                            <div id="chartplace" style="height: 118px"></div>
                            
                            <div class="one_half">
                                <div class="analytics analytics2">
                                    <small>Visitors For Today</small>
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
                                        <small class="block">visitors</small>
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
                    </div><!--widgetbox-->

                    <br clear="all" /><br />
                    
                </div><!--content-->
                
            </div><!--maincontentinner-->
            
            <?php include('footer.php');?>
            
        </div><!--maincontent-->
        
                
     	</div><!--mainwrapperinner-->
    </div><!--mainwrapper-->
	<!-- END OF MAIN CONTENT -->
    

</body>
</html>
