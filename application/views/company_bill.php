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
               
                <div class="content">
               
                    <div class="contenttitle radiusbottom0">
                	<h2 class="table"><span>Bill Details</span></h2>
                </div><!--contenttitle-->
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
                            <th class="head1">#</th>
                            <th class="head0">Details</th>
                            <th class="head1">Value</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                    <?php 
				$counter = 1;
				$total=0;
				if(isset($bill) && count($bill) != 0){
				foreach ($bill as $row){
					$details=$row->details;
					$value=$row->value;	
					$total+=$value;		
					 ?>
                        <tr>
                            <td class="center"><?php echo $counter ; ?></td>
                            <td class="center"><?php echo $details ; ?></td>
                            <td class="center"><?php echo $value.' $' ; ?></td>
                          
                        </tr>
                        <?php $counter++;}?>
                        
                          </tbody>
                </table>
                
                <br />
             <h3 style="float:left;padding:5px;border:1px dashed #ccc;"> Total amount = <?php echo $total.' $' ; ?></h3>
             <br clear="all"/>
             <div style="margin-top:15px;">
         <form action="https://www.paypal.com/cgi-bin/webscr" method="post">
<input type="hidden" name="cmd" value="_xclick">
<input type="hidden" name="business" value="mohamedtemraz92@gmail.com">
<input type="hidden" name="item_name" value="<?php echo $name ;?> Staff Tree">

<input type="hidden" name="amount" value="<?php echo $total ;?>">
<input type="hidden" name="tax" value="0">
<input type="hidden" name="quantity" value="1">
<input type="hidden" name="no_note" value="1">
<input type="hidden" name="currency_code" value="USD">

<!-- Enable override of buyers's address stored with PayPal . -->
<input type="hidden" name="address_override" value="1">
<!-- Set variables that override the address stored with PayPal. -->
<input type="hidden" name="first_name" value="<?php echo $name ?>">
<input type="hidden" name="last_name" value="Company">





<input type="image" name="submit" border="0"
src="https://www.paypalobjects.com/en_US/i/btn/btn_buynow_LG.gif"
alt="PayPal - The safer, easier way to pay online">
</form>
</div>

                <br clear="all"/>
						<?php }else{?>
                        </tbody></table>
                        <br clear="all"/>
                    <center><h1 style="color:#c1c1c1">There Is Not Bill To Pay Yet</h1></center>
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
