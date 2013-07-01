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

<script type="text/javascript" src="<?php echo base_url();?>js/general.js" ></script>

<script type="text/javascript" src="<?php echo base_url();?>js/dashboard.js" ></script>

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
                    
                    <div class="one_half " style="width:100%">
                    	<h1 style="border-bottom:1px dashed #e1e1e1; padding-bottom:10px">Following</h1>
                                       <br />
                        <div class="widgetcontent announcement">
                        <?php if(isset($following) && count($following) != 0){
						foreach ($following as $row){
							$company_id=$row->company_id;
							$this->load->model('model_company');
							$company_info = $this->model_company->get_company_info($company_id);
							foreach ($company_info as $r){
							$id = $r ->id;	
							$name = $r->name;
							$field = $r->field;
							$logo = $r->logo;
							$about = $r->about;
							}
							?>
                            <p>
                  <img src="<?php echo base_url();?>images/campanies_logo/<?php echo $logo;?>" width="70" height="50" style="float:left ; border:1px solid #c1c1c1 ; padding:2px ; margin:0 10px 0 10px " /> <a href="<?php echo base_url();?>company/profile/<?php echo $id; ?>" ><?php echo $name;?></a> <span class="radius2" style="float:right"><?php echo $field;?></span> <br /><?php echo substr($about,0,90);?></p>
                  <br />
                            <?php }}else{?>
                    <center><h1 style="color:#c1c1c1">There Are Not Following Companies Yet</h1></center><br />
                    <?php } ?>
                            </div>
                            </div>
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
