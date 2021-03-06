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

<script type="text/javascript" src="<?php echo base_url();?>js/elements.js" ></script>
<style>
.follow  {float:right;margin-right:50px;margin-top:-20px; border-radius:3px; font-family:Verdana, Geneva, sans-serif }
.follow button {width:80px}
#buy{border-bottom:1px dashed #c1c1c1;border-top:1px dashed #c1c1c1 ; padding:5px 0 5px 0 ; margin-top:5px}

#buy a {text-decoration:none}
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
            <?php  if($this->session->userdata('company_logged_in')){ include('left_menu_company.php'); } elseif($this->session->userdata('user_logged_in')){include('left_menu_user.php');}?>
            	<div id="togglemenuleft"><a></a></div>
            </div><!--mainleftinner-->
        </div><!--mainleft-->
        
        <div class="maincontent">
        	<div class="maincontentinner">
                
                <div class="content">
                <h1 style="border-bottom:1px dashed #e1e1e1; padding-bottom:10px">My Card List</h1>
                <br />
                                            <form action="https://www.paypal.com/cgi-bin/webscr" method="post">
<input type="hidden" name="cmd" value="_xclick">
<input type="hidden" name="business" value="mohamedtemraz92@gmail.com">

                <?php 
				if(isset($products_list) && count($products_list) != 0){
				foreach($products_list as $r){
					$product_id=$r->product_id;
					$all_products = $this->model_company->get_product($product_id);
					$counter=1;
				foreach($all_products as $row){
					$id=$row->id;
					$name=$row->name;
					$logo=$row->logo;
					$details=$row->	product_desc ;
					$date=$row->date_release;
					$price = $row->price;
					 ?>
                
                	<div class="one_third <?php if($counter%3 == 0){ echo "last" ; } ?>">
                    	<div class="widgetbox">
                            <div class="title"><h2 class="general"><span><?php echo $name; ?></span></h2></div>
                            <div class="widgetcontent">
                                <img src="<?php echo base_url();?>images/products/<?php echo $logo; ?>" width="100%" height="140" style="border:.1em solid #666" /><br />
                           <h3 style="padding-top:10px"><a href="<?php echo base_url();?>company/product/<?php echo $id; ?>"><?php echo $name; ?></a></h3><span class="radius2" style=" margin-top:-22px ; font-weight:bold ; float:right"><?php echo $date; ?></span>
                               <span><b>Price: </b><?php echo $price; ?></span>
                                <p><?php echo substr($details,0,50).'...'; ?> <small><a href="<?php echo base_url();?>company/product/<?php echo $id; ?>">Details</a></small></p>
                               <div id="buy"><center><h3 style=""><input type="image" name="submit" border="0"
src="https://www.paypalobjects.com/en_US/i/btn/btn_buynow_LG.gif"
alt="PayPal - The safer, easier way to pay online"></h3></center></div>
                        </div><!--widgetcontent-->
                        </div><!--widgetbox-->
                    </div><!--one_third-->
                    <input type="hidden" name="item_name" value="<?php echo $name ;?>">
                    <input type="hidden" name="tax" value="0">
                    <input type="hidden" name="amount" value="<?php echo $price ;?>">
                    <input type="hidden" name="quantity" value="1">
                   <?php $counter++;}}}else{?>
                     <center><h1 style="color:#c1c1c1">There Are Not Products Yet</h1></center>
                    <?php } ?>





<input type="hidden" name="no_note" value="1">
<input type="hidden" name="currency_code" value="USD">

<!-- Enable override of buyers's address stored with PayPal . -->
<input type="hidden" name="address_override" value="1">
<!-- Set variables that override the address stored with PayPal. -->


</form>
                                  
                                  <br clear="all" />     
                                  
                                 
                    <br clear="all" /><br />
                    
                    
                </div><!--content-->
                
            </div><!--maincontentinner-->
            
           <?php include('footer.php');?>
            
        </div><!--maincontent-->
        
        <?php include('user_right.php');?>
        
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
