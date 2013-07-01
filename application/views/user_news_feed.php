<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Dashboard |Business Linkage</title>
<link rel="shortcut icon" href="<?php echo base_url();?>images/head.png" type="image/x-icon"/>
<link rel="stylesheet" href="<?php echo base_url();?>css/style.css"  type="text/css" />

<script type="text/javascript" src="<?php echo base_url();?>js/jquery-1.7.min.js"></script>
 
<script type="text/javascript" src="<?php echo base_url();?>js/jquery.flot.min.js" ></script>

<script type="text/javascript" src="<?php echo base_url();?>js/jquery.flot.resize.min.js" ></script>

<script type="text/javascript" src="<?php echo base_url();?>js/jquery-ui-1.8.16.custom.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>js/jquery.colorbox-min.js" ></script>
<script type="text/javascript" src="<?php echo base_url();?>js/general.js" ></script>
<script type="text/javascript" src="<?php echo base_url();?>js/colorpicker.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>js/dashboard.js" ></script>
<script type="text/javascript" src="<?php echo base_url();?>js/jquery.jgrowl.js" ></script>
<script type="text/javascript" src="<?php echo base_url();?>js/media.js" ></script>

<script type="text/javascript" src="<?php echo base_url();?>js/elements.js" ></script>
<style>
.gallery-item  { width:300px ; padding:3px }
.gallery-item a {border: .1em solid #CCC ;  padding:193px 5px 1px 5px}
.gallery-item a:hover {border: .1em solid #999 }
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
            
              	<?php include('left_menu_user.php');?>
            	<div id="togglemenuleft"><a></a></div>
            </div><!--mainleftinner-->
        </div><!--mainleft-->
        
        <div class="maincontent">
        	<div class="maincontentinner">
            	
                
                <div class="content">
                    
                  <h1 style="border-bottom:1px dashed #e1e1e1; padding-bottom:10px">News Feed</h1>
                <br />
                <div class="widgetcontent userlistwidget">
                            <ul>
              
              <?php
				  foreach($following as $rr){
					  $company_id = $rr->company_id;
				 $company_info = $this->model_company->get_company_info($company_id);
				 foreach($company_info as $r){
					 $company_id = $r->id;
					 $company_name = $r->name;
					 $company_logo = $r->logo;
					 
					 $news_feed = $this->model_company->feed_by_id($company_id);
					 if(isset($news_feed)){
					foreach($news_feed as $row){ 
				  $company_id = $row->company_id;
				  $title = $row->title;
				  $date = $row->date;
				  $details = $row->details;
				  $logo = $row->logo;
				  $link = $row->link;
				  
				   ?>
                        
                            	<li>
                                	<div class="avatar"><img src="<?php echo base_url(); ?>images/campanies_logo/<?php echo $company_logo ?>" width="50" height="45" /></div>
                                    <div class="info" style="margin-left:70px">
                                    	<a href="<?php echo base_url(); ?>company/profile/<?php echo $company_id; ?>"><?php echo $company_name ; ?></a> <h3 style="float:right ; margin-right:10px ; color:#c1c1c1"><?php if(isset($row->event_id)){echo 'Event' ;}elseif(isset($row->news_id)){echo 'News' ;}elseif(isset($row->product_id)){echo 'Product';}elseif(isset($row->job_id)){echo "Job" ;}else{echo 'Photo';} ?></h3><br />
                                        <span style="font-weight:bold"><?php echo $title; ?></span> <br />
                                        <?php echo substr($details,0,200).'...' ; ?><?php if(!isset($row->pic_id)){ ?><a href="<?php echo $link ?>">Details</a><?php } ?><br /><br />
                                        <?php if(!isset($row->job_id)){ ?><div class="gallery-item"><a href="<?php echo base_url();?>images/<?php echo $logo ; ?>" tppabs="<?php echo base_url();?>images/company_gallery/<?php echo $logo ; ?>" class="view"><img src="<?php echo base_url();?>images/<?php echo $logo ; ?>" width="300" height="200" /></a></div><?php } ?>
                                        <br /> <a href="<?php echo $link ?>" style="float:right ; color:#c1c1c1"><?php echo $date; ?></a>
                                        <br clear="all" />
                                    </div><!--info-->
                                </li>
                                <?php }} }}?>
                            </ul>
                            <br clear="all" />
                            <a href="" class="more">View More</a>
                        </div><!--widgetcontent-->
                    
                    <br clear="all" />
                </div><!--content-->
                
            </div><!--maincontentinner-->
            
           <?php include('footer.php');?>
            
        </div><!--maincontent-->
        
        <?php include('user_right.php');?>
        
     	</div><!--mainwrapperinner-->
    </div><!--mainwrapper-->
	<!-- END OF MAIN CONTENT -->
    

</body>
</html>
