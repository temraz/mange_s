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
<script type="text/javascript" >
var base_url = "<?php echo base_url(); ?>";
</script>
<script type="text/javascript" src="<?php echo base_url();?>js/tables.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>js/jquery.dataTables.min.js" ></script>
<script type="text/javascript" src="<?php echo base_url();?>js/elements.js" ></script>
<script type="text/javascript" src="<?php echo base_url();?>js/jquery.alerts.js" ></script>
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
                    
                    <h1 style="border-bottom:1px dashed #e1e1e1; padding-bottom:10px">Messages</h1>
                    <br />
                 <div class="contenttitle radiusbottom0">
                	<h2 class="table"><span>Messages</span></h2>
                </div><!--contenttitle-->
                <div class="tableoptions">
                <?php if(isset($messages)){ ?>
                	<button class="radius3 delete_item" id="user_messages" title="table1">Delete Selected</button> &nbsp;
                    <?php } ?>
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
                            <th class="head0">From</th>
                            <th class="head1">Subject</th>
                            <th class="head0">Date</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php 
				$counter = 1;
				if(isset($messages) && count($messages) != 0){
				foreach ($messages as $row){
					$id=$row->id;
					$from_u=$row->from_u;
					$from_c=$row->from_c;
					$subject=$row->subject;
					$date_m=$row->date_m;
					$message=$row->message;
					$read=$row->read_m;
					if(isset($from_c)){
						$from_company=$this->model_company->get_company_info($from_c);
						foreach($from_company as $r){
							$company_id = $r->id;
							$company_name = $r->name;
							}
						}
					if(isset($from_u)){
						$from_user=$this->model_users->get_user_info($from_u);
						foreach($from_user as $r){
							$user_id = $r->id;
							$user_name = $r->username;
							}
						}	
					
					 ?>
                       <tr id="<?php echo $id; ?>" <?php if($read == 0){?>style="background:#fffccc"<?php }?> >
                        	<td class="center"><input type="checkbox" /></td>
                            <td class="center"><?php echo $counter ; ?></td>
                            <td class="center"><a href="<?php if(isset($from_c)){ echo base_url()."company/profile/".$company_id; }elseif(isset($from_u)){ echo base_url()."user/profile/".$user_id;} ?>"><?php if(isset($from_c)){ echo $company_name; }elseif(isset($from_u)){ echo $user_name;} ?></a><?php if(isset($from_c)){ echo " (Company)"; }elseif(isset($from_u)){ echo " (User)";} ?></td>
                            <td class="center"><?php echo $subject ; ?></td>
                            <td class="center"><?php echo $date_m ; ?></td>
                        </tr>
                       <?php $counter++;}?>
                          </tbody>
                </table>
						<?php }else{?>
                        </tbody></table>
                        <br class="all"/>
                    <center><h1 style="color:#c1c1c1">There Are Not Messages Yet</h1></center>
                    <?php } ?>
                        
                    </tbody>
                </table>

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
