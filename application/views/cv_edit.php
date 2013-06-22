<?php require("all_countries.php");?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Dashboard |Business Linkage</title>
<link rel="stylesheet" href="<?php echo base_url();?>css/style.css"  type="text/css" />

<script type="text/javascript" src="<?php echo base_url();?>js/jquery-1.3.2.js"></script>
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
#personnal:hover{background:url(<?php echo base_url();?>images/overlayer.png) repeat}
#skills:hover{background:url(<?php echo base_url();?>images/overlayer.png) repeat}
#accomplishment:hover{background:url(<?php echo base_url();?>images/overlayer.png) repeat}
#exper:hover{background:url(<?php echo base_url();?>images/overlayer.png) repeat}
#education:hover{background:url(<?php echo base_url();?>images/overlayer.png) repeat}
</style>
<script type="text/javascript">
 
$(document).ready(function(){
 
    var counter = 2;
 
    $("#addButton").click(function () {
 
	if(counter>10){
            jAlert("Only 10 Skills allow");
            return false;
	}   
 
	var newTextBoxDiv = $(document.createElement('div'))
	     .attr("id", 'TextBoxDiv' + counter);
 
	newTextBoxDiv.after().html('<p><label>Skill #'+ counter + ' : </label><span class="field">' +
	      '<input type="text" name="skill' + counter + 
	      '" id="textbox' + counter + '">&nbsp;<select name="level' + counter + '" required><option value="">Select Level</option><option value="Excellent">Excellent</option><option value="Very Good">Very Good</option><option value="Good">Good</option><option value="Medium">Medium</option><option value="Acceptable">Acceptable</option><option value="Weak">Weak</option></select></span></p>');
 
	$(newTextBoxDiv).appendTo("#TextBoxesGroup").hide().fadeIn(1000);
 
 
	counter++;
     });
 
     $("#removeButton").click(function () {
	if(counter==2){
          jAlert(" Must enter at least one Skill ");
          return false;
       }   
 
	counter--;
  $("#TextBoxDiv" + counter).hide(1500, function(){  $("#TextBoxDiv" + counter).remove(); });
       
     });
 
  });
  
  $(document).ready(function(){
 
    var counter = 2;
 
    $("#addjob").click(function () {
 
	if(counter>5){
            jAlert("Only 5 Jobs allow");
            return false;
	}   
 
	var newTextBoxDiv = $(document.createElement('div'))
	     .attr("id", 'ExDiv' + counter);
 
	newTextBoxDiv.after().html('<p><h3 style="margin-left:100px">Job '+ counter +'</h3><label>Postion</label><span class="field"><input type="text" name="postion' + counter + '" class="mediuminput" required></span> </p><p><label>Date From</label><span class="field"><input type="date" name="date_from' + counter + '" class="smallinput" required></span> </p><p><label>Date To</label><span class="field"><input type="date" name="date_to' + counter + '" class="smallinput" required></span></p><p><label>Company</label><span class="field"><input type="text" name="company' + counter + '" class="mediuminput" required></span>  </p><p><label>Details</label><span class="field"><textarea cols="100" rows="5" name="job_details' + counter + '" class="mediuminput" required style="resize:none"></textarea></span></p><br>');
 
	newTextBoxDiv.appendTo("#ExGroup").hide().fadeIn(1500);
 
	counter++;
     });
 
     $("#removejob").click(function () {
	if(counter==2){
          jAlert(" Must enter at least one Job ");
          return false;
       }   
 
	counter--;
 $("#ExDiv" + counter).hide(1500, function(){  $("#ExDiv" + counter).remove(); });
 
     });
 
  });
  
   $(document).ready(function(){
 
    var counter = 2;
 
    $("#addedu").click(function () {
 
	if(counter>5){
            jAlert("Only 5 Studies allow");
            return false;
	}   
 
	var newTextBoxDiv = $(document.createElement('div'))
	     .attr("id", 'EduDiv' + counter);
	newTextBoxDiv.after().html('<p><h3 style="margin-left:100px">Study '+ counter +'</h3><label>School</label><span class="field"><input type="text" name="school'+ counter +'" class="mediuminput" required></span> </p><p><label>Grad Year</label><span class="field"><input type="number" min="1980" max="2013" name="grad_year'+ counter +'" class="smallinput" required></span> </p><p><label>Country</label><span class="field"> <select name="country'+ counter +'" size="1"><option value="Afghanistan">Afghanistan</option><option value="Albania">Albania</option><option value="Algeria">Algeria</option><option value="Andorra">Andorra</option><option value="Angola">Angola</option><option value="Antigua and Barbuda">Antigua and Barbuda</option><option value="Argentina">Argentina</option><option value="Armenia">Armenia</option><option value="Australia">Australia</option><option value="Austria">Austria</option><option value="Azerbaijan">Azerbaijan</option><option value="Bahamas">Bahamas</option><option value="Bahrain">Bahrain</option><option value="Bangladesh">Bangladesh</option><option value="Barbados">Barbados</option><option value="Belarus">Belarus</option><option value="Belgium">Belgium</option><option value="Belize">Belize</option><option value="Benin">Benin</option><option value="Bhutan">Bhutan</option><option value="Bolivia">Bolivia</option><option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option><option value="Botswana">Botswana</option><option value="Brazil">Brazil</option><option value="Brunei">Brunei</option><option value="Bulgaria">Bulgaria</option><option value="Burkina Faso">Burkina Faso</option><option value="Burundi">Burundi</option><option value="Cambodia">Cambodia</option><option value="Cameroon">Cameroon</option><option value="Canada">Canada</option><option value="Cape Verde">Cape Verde</option><option value="Central African Republic">Central African Republic</option><option value="Chad">Chad</option><option value="Chile">Chile</option><option value="China">China</option><option value="Colombi">Colombi</option><option value="Comoros">Comoros</option><option value="Congo (Brazzaville)">Congo (Brazzaville)</option><option value="Congo">Congo</option><option value="Costa Rica">Costa Rica</option><option value="Cote d Ivoire">Cote d Ivoire</option><option value="Croatia">Croatia</option><option value="Cuba">Cuba</option><option value="Cyprus">Cyprus</option><option value="Czech Republic">Czech Republic</option><option value="Denmark">Denmark</option><option value="Djibouti">Djibouti</option><option value="Dominica">Dominica</option><option value="Dominican Republic">Dominican Republic</option><option value="East Timor (Timor Timur)">East Timor (Timor Timur)</option><option value="Ecuador">Ecuador</option><option value="Egypt">Egypt</option><option value="El Salvador">El Salvador</option><option value="Equatorial Guinea">Equatorial Guinea</option><option value="Eritrea">Eritrea</option><option value="Estonia">Estonia</option><option value="Ethiopia">Ethiopia</option><option value="Fiji">Fiji</option><option value="Finland">Finland</option><option value="France">France</option><option value="Gabon">Gabon</option><option value="Gambia, The">Gambia, The</option><option value="Georgia">Georgia</option><option value="Germany">Germany</option><option value="Ghana">Ghana</option><option value="Greece">Greece</option><option value="Grenada">Grenada</option><option value="Guatemala">Guatemala</option><option value="Guinea">Guinea</option><option value="Guinea-Bissau">Guinea-Bissau</option><option value="Guyana">Guyana</option><option value="Haiti">Haiti</option><option value="Honduras">Honduras</option><option value="Hungary">Hungary</option><option value="Iceland">Iceland</option><option value="India">India</option><option value="Indonesia">Indonesia</option><option value="Iran">Iran</option><option value="Iraq">Iraq</option><option value="Ireland">Ireland</option><option value="Israel">Israel</option><option value="Italy">Italy</option><option value="Jamaica">Jamaica</option><option value="Japan">Japan</option><option value="Jordan">Jordan</option><option value="Kazakhstan">Kazakhstan</option><option value="Kenya">Kenya</option><option value="Kiribati">Kiribati</option><option value="Korea, North">Korea, North</option><option value="Korea, South">Korea, South</option><option value="Kuwait">Kuwait</option><option value="Kyrgyzstan">Kyrgyzstan</option><option value="Laos">Laos</option><option value="Latvia">Latvia</option><option value="Lebanon">Lebanon</option><option value="Lesotho">Lesotho</option><option value="Liberia">Liberia</option><option value="Libya">Libya</option><option value="Liechtenstein">Liechtenstein</option><option value="Lithuania">Lithuania</option><option value="Luxembourg">Luxembourg</option><option value="Macedonia">Macedonia</option><option value="Madagascar">Madagascar</option><option value="Malawi">Malawi</option><option value="Malaysia">Malaysia</option><option value="Maldives">Maldives</option><option value="Mali">Mali</option><option value="Malta">Malta</option><option value="Marshall Islands">Marshall Islands</option><option value="Mauritania">Mauritania</option><option value="Mauritius">Mauritius</option><option value="Mexico">Mexico</option><option value="Micronesia">Micronesia</option><option value="Moldova">Moldova</option><option value="Monaco">Monaco</option><option value="Mongolia">Mongolia</option><option value="Morocco">Morocco</option><option value="Mozambique">Mozambique</option><option value="Myanmar">Myanmar</option><option value="Namibia">Namibia</option><option value="Nauru">Nauru</option><option value="Nepa">Nepa</option><option value="Netherlands">Netherlands</option><option value="New Zealand">New Zealand</option><option value="Nicaragua">Nicaragua</option><option value="Niger">Niger</option><option value="Nigeria">Nigeria</option><option value="Norway">Norway</option><option value="Oman">Oman</option><option value="Pakistan">Pakistan</option><option value="Palau">Palau</option><option value="Panama">Panama</option><option value="Papua New Guinea">Papua New Guinea</option><option value="Paraguay">Paraguay</option><option value="Peru">Peru</option><option value="Philippines">Philippines</option><option value="Poland">Poland</option><option value="Portugal">Portugal</option><option value="Qatar">Qatar</option><option value="Romania">Romania</option><option value="Russia">Russia</option><option value="Rwanda">Rwanda</option><option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option><option value="Saint Lucia">Saint Lucia</option><option value="Saint Vincent">Saint Vincent</option><option value="Samoa">Samoa</option><option value="San Marino">San Marino</option><option value="Sao Tome and Principe">Sao Tome and Principe</option><option value="Saudi Arabia">Saudi Arabia</option><option value="Senegal">Senegal</option><option value="Serbia and Montenegro">Serbia and Montenegro</option><option value="Seychelles">Seychelles</option><option value="Sierra Leone">Sierra Leone</option><option value="Singapore">Singapore</option><option value="Slovakia">Slovakia</option><option value="Slovenia">Slovenia</option><option value="Solomon Islands">Solomon Islands</option><option value="Somalia">Somalia</option><option value="South Africa">South Africa</option><option value="Spain">Spain</option><option value="Sri Lanka">Sri Lanka</option><option value="Sudan">Sudan</option><option value="Suriname">Suriname</option><option value="Swaziland">Swaziland</option><option value="Sweden">Sweden</option><option value="Switzerland">Switzerland</option><option value="Syria">Syria</option><option value="Taiwan">Taiwan</option><option value="Tajikistan">Tajikistan</option><option value="Tanzania">Tanzania</option><option value="Thailand">Thailand</option><option value="Togo">Togo</option><option value="Tonga">Tonga</option><option value="Trinidad and Tobago">Trinidad and Tobago</option><option value="Tunisia">Tunisia</option><option value="Turkey">Turkey</option><option value="Turkmenistan">Turkmenistan</option><option value="Tuvalu">Tuvalu</option><option value="Uganda">Uganda</option><option value="Ukraine">Ukraine</option><option value="United Arab Emirates">United Arab Emirates</option><option value="United Kingdom">United Kingdom</option><option value="United States">United States</option><option value="Uruguay">Uruguay</option><option value="Uzbekistan">Uzbekistan</option><option value="Vanuatu">Vanuatu</option><option value="Vatican City">Vatican City</option><option value="Venezuela">Venezuela</option><option value="Vietnam">Vietnam</option><option value="Yemen">Yemen</option><option value="Zambia">Zambia</option><option value="Zimbabwe">Zimbabwe</option></select></span></p><p><label>Field of Study</label><span class="field"><input type="text" name="field_study'+ counter +'" class="mediuminput" required></span></p><p> <label>Degree</label><span class="field"><input type="text" name="degree'+ counter +'" class="mediuminput" required></span> </p><p><label>Details</label><span class="field"><textarea cols="100" rows="5" name="edu_details'+ counter +'" class="mediuminput" required style="resize:none"></textarea></span></p><br>');
 
	newTextBoxDiv.appendTo("#EduGroup").hide().fadeIn(1500);
 
	counter++;
     });
 
     $("#removeedu").click(function () {
	if(counter==2){
          jAlert(" Must enter at least one Study ");
          return false;
       }   
 
	counter--;
 $("#EduDiv" + counter).hide(1500, function(){  $("#EduDiv" + counter).remove(); });
 
     });
 
  });
</script>
</head>

<body class="loggedin">

	<!-- START OF HEADER -->
    
	<?php
	if($this->model_users->is_edit_cv($this->session->userdata('user_id'))){
	 include('header.php');
	}else{
		if($this->session->userdata('user_logged_in')){
		$id=$this->session->userdata('user_id');
$user=$this->model_users->get_user_info($id);
if(isset($user)){
		foreach($user as $row){
			$pic= $row->pic;
			$name= $row->username;
			$gender = $row->gender;
			}
		
		}
	}
		?>
    
    <div class="header radius3">
    	<div class="headerinner">
        	
            <img src="<?php echo base_url();?>images/logo.png"  alt="" />
             
            <div class="headright">
                <div id="userPanel" class="headercolumn">
                    <a href="" class="userinfo radius2">
                       <?php if($this->session->userdata('user_logged_in')){ ?>
                       <img src="<?php echo base_url(); ?>images/profile/<?php if (isset($pic)) { echo $pic;}elseif($pic == NULL && $gender == 'female'){ echo "female.gif";}elseif($pic == NULL && $gender == 'male'){echo "male.gif";}?>" width="30" height="30" alt="" class="radius2" /> 
                        <?php }?>
                        
                        
                        <span><strong><?php 
						if($this->session->userdata('user_logged_in') && isset($name)){echo $name;}?>
                        
                        </strong></span>
                        
                    </a>
                    
                    <div class="userdrop">
                        <ul>
                            
                            
                            <li><a href="<?php echo base_url();?>site/logout" >Logout</a></li>
                        </ul>
                    </div><!--userdrop-->
                </div><!--headercolumn-->
            </div><!--headright-->
        
        </div><!--headerinner-->
	</div><!--header-->
    <?php } ?>
    <!-- END OF HEADER -->
        
    <!-- START OF MAIN CONTENT -->
    <div class="mainwrapper">
     	<div class="mainwrapperinner">
         	
        <div class="mainleft">
          	<div class="mainleftinner">
            
              	<?php  if($this->session->userdata('user_logged_in')){ 
				if($this->model_users->is_edit_cv($this->session->userdata('user_id'))){
				include('left_menu_user.php'); }}?>
            	<div id="togglemenuleft"><a></a></div>
            </div><!--mainleftinner-->
        </div><!--mainleft-->
        
        <div class="maincontent" style="margin-right:0 ">
        	<div class="maincontentinner" >
                <div class="content">
                			<?php if(!$this->model_users->is_edit_cv($this->session->userdata('user_id'))){?>
                                <h3 style="color:#F00;float:right">Must create your own CV before create profile</h3><br />
                                <span style="float:right">Please fill the following fields with your CV</span>
                                <?php } ?>
                <h1 style="border-bottom:1px dashed #c1c1c1 ; padding:10px">Your Curriculum vitae (CV)</h1>
                 <?php echo form_open_multipart('user/insert_cv' , array( 'id'=> "form1" , "class"=>"stdform")); ?>
                <?php if (validation_errors()){ ?>
                                <div class="notification msgerror">
                        <a class="close"></a>
                        <p><?php echo validation_errors(); ?></p>
                    </div>
                                <?php } if(isset($inserted) && $inserted == 1){?>
                                <div class="notification msgsuccess">
                        <a class="close"></a>
                        <p>The CV is created successfully </p>
                    </div>
                            <?php } ?>
                           
                            <div id="personnal" style="border-bottom: 1px dashed #c1c1c1 ; padding:10px ; padding-top:20px ">
                        <h3>Personnal Information</h3>
                        <p>
                        	<label> Email </label>
                            <span class="field"><input type="email" name="email" class="mediuminput" required></span> 
                        </p>
                        
                        <p>
                        	<label> Phone(Home) </label>
                            <span class="field"><input  type="tele"  name="phone" class="smallinput" required></span> 
                        </p>
                        
                        <p>
                        	<label> Phone(Mobile) </label>
                            <span class="field"><input  type="tele"  name="mobile" class="smallinput" required></span> 
                        </p>
                        
                        <p>
                        	<label>Summary</label><br />
                            <span >Enter a brief description of your professional backgroung.</span>
                            <span class="field"><textarea cols="100" rows="5" name="summary" class="mediuminput" required style="resize:none"></textarea></span> 
                        </p>
                        <br />
                        </div>
                        
                        <div id="skills" style="border-bottom: 1px dashed #c1c1c1; padding:10px">
                        <p>
                        <h3>Skills</h3>
                        <span style="margin-left:20px">Enter Your Skills.</span>
                        </p>
                        
                        <div id='TextBoxesGroup'>
	<div id="TextBoxDiv1">
    <p>
        <label>Skill #1 : </label>
        <span class="field">
        <input type="text" name="skill1"  required>
        
        <select name="level1"  required>
        <option value="" >Select Level</option>
        <option value="Excellent">Excellent</option>
        <option value="Very Good">Very Good</option>
         <option value="Good">Good</option>
          <option value="Medium">Medium</option>
          <option value="Acceptable">Acceptable</option>
          <option value="Weak">Weak</option>
        </select>
    </span></p>
        
	</div>
</div>
<p style="margin-left:100px">
<input type='button' value='Add Skill' class="stdbtn " id='addButton' style="width:100px">&nbsp;&nbsp;&nbsp;
<input type='button' value='Remove Skill' class="stdbtn" id='removeButton' style="width:100px">

                        </p>
                        <br />
                        </div>
                        
                        <div id="accomplishment" style="border-bottom: 1px dashed #c1c1c1 ; padding:10px">
                        <p>
                        <h3>Accomplishments</h3>
                        	<span>Enter outstanding achievements that show you can go above and beyond basic job expextions.</span>
                            </p>
                            <p>
                           <span class="field"><textarea cols="100" rows="5" name="accomplishments" class="mediuminput" required style="resize:none"></textarea></span>  
                          </p>
                          </div>
                           
                           <div id="exper" style="border-bottom: 1px dashed #c1c1c1 ; padding:10px">
                           <p>
                           <h3>Experience</h3>
                           <span>Enter details about what you did in your previous jobs.</span>
                           </p>
                            
                              <div id='ExGroup'>
	<div id="ExDiv1">
                           <p>
                           <h3 style="margin-left:100px">Job 1</h3>
                           <label>Postion</label>
                           <span class="field"><input type="text" name="postion1" class="mediuminput" required></span> 
                           </p><p>
                           <label>Date From</label>
                           <span class="field"><input type="date" name="date_from1" class="smallinput" required></span> 
                           </p><p>
                           <label>Date To</label>
                           <span class="field"><input type="date" name="date_to1" class="smallinput" required></span>
                           </p><p>
                           <label>Company</label>
                           <span class="field"><input type="text" name="company1" class="mediuminput" required></span>  
                           </p><p>
                           <label>Details</label>
                           <span class="field"><textarea cols="100" rows="5" name="job_details1" class="mediuminput" required style="resize:none"></textarea></span>
                           </p>
                           </div></div>
                           <p style="margin-left:100px">
<input type='button' value='Add Job' class="stdbtn " id='addjob' style="width:100px">&nbsp;&nbsp;&nbsp;
<input type='button' value='Remove Job' class="stdbtn" id='removejob' style="width:100px">

                        </p>
                           <br />
                           </div>
                           
                           <div id="education" style="border-bottom: 1px dashed #c1c1c1 ; padding:10px">
                           <p>
                           <h3>Education</h3>
                           <span>Enter any colleges,universites or training programs that you have attended.</span>
                           </p>
                           <div id='EduGroup'>
	<div id="EduDiv1">
                           <p>
                           <h3 style="margin-left:100px">Study 1</h3>
                           <label>School</label>
                           <span class="field"><input type="text" name="school1" class="mediuminput" required></span> 
                           </p><p>
                           <label>Grad Year</label>
                           <span class="field"><input type="number" min="1980" max="2013" name="grad_year1" class="smallinput" required></span> 
                           </p><p>
                           <label>Country</label>
                           <span class="field"> <select name="country1" size="1">
   <?php for($i=0;$i< count($country_list);$i++) {
  echo " <option value=\"$country_list[$i]\"";
    echo ">$country_list[$i]</option>";
   } ?>
   </select></span></p><p>
   							<label>Field of Study</label>
                             <span class="field"><input type="text" name="field_study1" class="mediuminput" required></span>
                             </p><p> 
                             <label>Degree</label>
                              <span class="field"><input type="text" name="degree1" class="mediuminput" required></span> 
                              </p><p>
                              <label>Details</label>
                           <span class="field"><textarea cols="100" rows="5" name="edu_details1" class="mediuminput" required style="resize:none"></textarea></span>
                           </p>
                           </div>
                           </div>
                           <p style="margin-left:100px">
<input type='button' value='Add Study' class="stdbtn " id='addedu' style="width:100px">&nbsp;&nbsp;&nbsp;
<input type='button' value='Remove Study' class="stdbtn" id='removeedu' style="width:100px">
                        </p>
                           <br /></div>
                           
                       
                        
                        <p class="stdformbutton" >
                        	<button class="submit radius3" style="width:100px; float:right;margin-right:100px ;">Save</button>
                        </p>
                        <br />
                    </form>
                    
                
                                  
                                  <br clear="all" />     
                    
                    
                </div><!--content-->
                
            </div><!--maincontentinner-->
            
           <?php include('footer.php');?>
            
        </div><!--maincontent-->
        
      
     	</div><!--mainwrapperinner-->
    </div><!--mainwrapper-->
	<!-- END OF MAIN CONTENT -->

</body>
</html>
