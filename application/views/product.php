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

<script type="text/javascript" src="<?php echo base_url();?>js/dashboard.js" ></script>
<script type="text/javascript" src="<?php echo base_url();?>js/jquery.alerts.js" ></script>
<script type="text/javascript" >
var base_url = "<?php echo base_url(); ?>";
jQuery(document).ready(function(){
	var added = document.getElementById('added');
	var add_card = document.getElementById('add_card');

jQuery('#add_card').click(function(){
jConfirm('Do You Want to add This product to Your Card?', 'My Card', function(r) {
                    if( r ){
						var user_id = jQuery('#user_id').val();
						var product_id = jQuery('#product_id').val();
						jQuery.post(base_url+"user/add_card" ,{ product_id : product_id }, function(data){
							add_card.style.visibility = 'hidden'; 
							added.style.visibility = 'visible';
		},"json");
						}
					});
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
            <?php  if($this->session->userdata('company_logged_in')){ include('left_menu_company.php'); } elseif($this->session->userdata('user_logged_in')){include('left_menu_user.php');}?>
            	<div id="togglemenuleft"><a></a></div>
            </div><!--mainleftinner-->
        </div><!--mainleft-->
        
        <div class="maincontent">
        	<div class="maincontentinner">
            	
                
                <div class="content">
                           <?php 
						if(isset($product)){
				foreach ($product as $row){
					$id=$row->id;
					$name=$row->name;
					$date=$row->date_release;
					$details=$row->product_desc;
					$pic=$row->logo;
					$price=$row->price;
					$user_id = $this->session->userdata('user_id');
				}}
						   ?>
                           <h1><?php echo $name ?></h1>
                           
                            <h3 style="float:right ; color:#c1c1c1"><?php echo $date ?></h3>
                           <br class="all"/>
                     <div class="one_half" style="width:100%">
                    	<p><img src="<?php echo base_url();?>images/products/<?php echo $pic; ?>" height="200" width="270" style="float:left; border:1px solid #c1c1c1 ; margin:10px ; padding:3px "/><p><?php echo $details; ?></p></p>
                    <br clear="all" />
                    <span><b>Price: </b><?php echo $price; ?></span>
                    <input type="hidden" value="<?php echo $id ?>" id="product_id" />
                  
                    <h3 style="float:right;margin-right:60px;visibility:<?php 	
				if($this->model_users->in_my_card($user_id,$id)){echo "hidden";}else{ echo "visible";} ?>"><button class="stdbtn btn" id="add_card">Add to Card</button>
                    </h3>
                    <h3 id="added" style="float:right; word-spacing:1px ; margin-right:-130px ; color:#F63 ; visibility:<?php 	
				if($this->model_users->in_my_card($user_id,$id)){echo "visible";}else{echo "hidden";} ?> ">The Product in Your Card</h3>
                    </div>
                    <br clear="all" />
                      
                </div><!--content-->
                
            </div><!--maincontentinner-->
            
           <?php include('footer.php');?>
            
        </div><!--maincontent-->
        
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
     	</div><!--mainwrapperinner-->
    </div><!--mainwrapper-->
	<!-- END OF MAIN CONTENT -->

</body>
</html>
