<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Business Linkage</title>
<link rel="stylesheet" href="<?php echo base_url();?>css/style.css"  type="text/css" />
<!--[if IE 9]>
    <link rel="stylesheet" media="screen" href="ie9.css" tppabs="http://themepixels.com/themes/demo/webpage/starlight/css/ie9.css"/>
<![endif]-->

<!--[if IE 8]>
    <link rel="stylesheet" media="screen" href="ie8.css" tppabs="http://themepixels.com/themes/demo/webpage/starlight/css/ie8.css"/>
<![endif]-->

<!--[if IE 7]>
    <link rel="stylesheet" media="screen" href="ie7.css" tppabs="http://themepixels.com/themes/demo/webpage/starlight/css/ie7.css"/>
<![endif]-->
<script type="text/javascript" src="<?php echo base_url();?>js/jquery-1.7.min.js"></script>
 
<script type="text/javascript" src="<?php echo base_url();?>js/jquery.flot.min.js" ></script>

<script type="text/javascript" src="<?php echo base_url();?>js/jquery.flot.resize.min.js" ></script>

<script type="text/javascript" src="<?php echo base_url();?>js/jquery-ui-1.8.16.custom.min.js"></script>

<script type="text/javascript" src="<?php echo base_url();?>js/general.js" ></script>

<script type="text/javascript" src="<?php echo base_url();?>js/dashboard.js" ></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>index_videolb/overlay-minimal.css"/>
			<script src="<?php echo base_url();?>index_videolb/jquery.js" type="text/javascript"></script>
			<script src="<?php echo base_url();?>index_videolb/swfobject.js" type="text/javascript"></script>
            <script src="<?php echo base_url();?>js/swfobject2.js" type="text/javascript"></script>
            <link rel="stylesheet" href="<?php echo base_url();?>index_videolb/videolightbox.cs" type="text/css" />
<!--[if lt IE 9]>
	<script src="css3-mediaqueries.js" tppabs="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
<![endif]-->
</head>

<body class="loggedin">

	<!-- START OF HEADER -->
	<div class="header radius3">
    	<div class="headerinner">
        	
            <a href=""><img src="<?php echo base_url();?>images/logo.png" tppabs="http://themepixels.com/themes/demo/webpage/starlight/images/starlight_admin_template_logo_small.png" alt="" /></a>
           <div class="headright">
           <div class="headercolumn">&nbsp;</div>
        
           
            	<div id="searchPanel" class="headercolumn">
                	<div class="searchbox">
                        <form action="" method="post">
                            <input type="text" id="keyword" name="keyword" class="radius2" value="Search here" /> 
                        </form>
                    </div><!--searchbox-->
                </div><!--headercolumn-->
  
                        </div>
        
        </div><!--headerinner-->
	</div><!--header-->
    <!-- END OF HEADER -->
        
    <!-- START OF MAIN CONTENT -->
    <div class="mainwrapper">
     	<div class="mainwrapperinner">
         	 
        <div class="maincontent" style="margin-left:0 ">
        	<div class="maincontentinner">
                
                <div class="content"  style=" height:auto">
                    
                    
                    
                    <div class="contenttitle">
                    	<h2 class="form"><span>User Registeration</span></h2>
                    </div><!--contenttitle-->
                     
                      <form id="form2" class="stdform stdform2" method="post" action="">
                      <p>
                        	<label>Username</label>
                            <span class="field"><input type="text" name="firstname" id="firstname" class="longinput" /></span>
                        </p>
                        
                        <p>
                        	<label>Email</label>
                            <span class="field"><input type="text" name="firstname" id="email" class="longinput" /></span>
                        </p>
                        
                        <p>
                        	<label>Password</label>
                            <span class="field"><input type="password" name="password" id="password" class="longinput" /></span>
                        </p>
                        
                        <p>
                        	<label>Confirm Password</label>
                            <span class="field"><input type="password" name="confirm_password" id="password" class="longinput" /></span>
                        </p>
                        
                         <p>
                        	<label>Gender</label>
                            <span class="field">
                            	<input type="radio" name="gender" /> Male &nbsp;&nbsp;&nbsp;
                            	<input type="radio" name="gender" /> Famale 
                           </span>
                        </p>
                        
                        
                    	<p>
                        	<label>First Name</label>
                            <span class="field"><input type="text" name="firstname" id="firstname" class="longinput" /></span>
                        </p>
                        
                        <p>
                        	<label>Last Name</label>
                            <span class="field"><input type="text" name="lastname" id="lastname" class="longinput" /></span>
                        </p>
                        
                        <p>
                        	<label>Country</label>
                            <span class="field">
                            <select name="country" id="selection">
                     <option value="af"   >Afghanistan</option>
                    <option value="ax"   >Aland Islands</option>
                    <option value="al"   >Albania</option>
                    <option value="dz"   >Algeria</option>
                    <option value="as"   >American Samoa</option>
                    <option value="ad"   >Andorra</option>
                    <option value="ao"   >Angola</option>
                    <option value="ai"   >Anguilla</option>
                    <option value="aq"   >Antarctica</option>
                    <option value="ag"   >Antigua and Barbuda</option>
                    <option value="ar"   >Argentina</option>
                    <option value="am"   >Armenia</option>
                    <option value="aw"   >Aruba</option>
                    <option value="au"   >Australia</option>
                    <option value="at"   >Austria</option>
                    <option value="az"   >Azerbaijan</option>
                    <option value="bs"   >Bahamas</option>
                    <option value="bh"   >Bahrain</option>
                    <option value="bd"   >Bangladesh</option>
                    <option value="bb"   >Barbados</option>
                    <option value="by"   >Belarus</option>
                    <option value="be"   >Belgium</option>
                    <option value="bz"   >Belize</option>
                    <option value="bj"   >Benin</option>
                    <option value="bm"   >Bermuda</option>
                    <option value="bt"   >Bhutan</option>
                    <option value="bo"   >Bolivia</option>
                    <option value="ba"   >Bosnia and Herzegovina</option>
                    <option value="bw"   >Botswana</option>
                    <option value="bv"   >Bouvet Island</option>
                    <option value="br"   >Brazil</option>
                    <option value="io"   >British Indian Ocean Territory</option>
                    <option value="vg"   >British Virgin Islands</option>
                    <option value="bn"   >Brunei</option>
                    <option value="bg"   >Bulgaria</option>
                    <option value="bf"   >Burkina Faso</option>
                    <option value="bi"   >Burundi</option>
                    <option value="kh"   >Cambodia</option>
                    <option value="cm"   >Cameroon</option>
                    <option value="ca"   >Canada</option>
                    <option value="cv"   >Cape Verde</option>
                    <option value="ky"   >Cayman Islands</option>
                    <option value="cf"   >Central African Republic</option>
                    <option value="td"   >Chad</option>
                    <option value="cl"   >Chile</option>
                    <option value="cn"   >China</option>
                    <option value="cx"   >Christmas Island</option>
                    <option value="cc"   >Cocos (Keeling) Islands</option>
                    <option value="co"   >Colombia</option>
                    <option value="km"   >Union of the Comoros</option>
                    <option value="cg"   >Congo</option>
                    <option value="ck"   >Cook Islands</option>
                    <option value="cr"   >Costa Rica</option>
                    <option value="hr"   >Croatia</option>
                    <option value="cu"   >Cuba</option>
                    <option value="cy"   >Cyprus</option>
                    <option value="cz"   >Czech Republic</option>
                    <option value="cd"   >Democratic Republic of Congo</option>
                    <option value="dk"   >Denmark</option>
                    <option value="xx"   >Disputed Territory</option>
                    <option value="dj"   >Djibouti</option>
                    <option value="dm"   >Dominica</option>
                    <option value="do"   >Dominican Republic</option>
                    <option value="tl"   >East Timor</option>
                    <option value="ec"   >Ecuador</option>
                    <option value="eg"   SELECTED  >Egypt</option>
                    <option value="sv"   >El Salvador</option>
                    <option value="gq"   >Equatorial Guinea</option>
                    <option value="er"   >Eritrea</option>
                    <option value="ee"   >Estonia</option>
                    <option value="et"   >Ethiopia</option>
                    <option value="fk"   >Falkland Islands</option>
                    <option value="fo"   >Faroe Islands</option>
                    <option value="fm"   >Federated States of Micronesia</option>
                    <option value="fj"   >Fiji</option>
                    <option value="fi"   >Finland</option>
                    <option value="fr"   >France</option>
                    <option value="gf"   >French Guyana</option>
                    <option value="pf"   >French Polynesia</option>
                    <option value="tf"   >French Southern Territories</option>
                    <option value="ga"   >Gabon</option>
                    <option value="gm"   >Gambia</option>
                    <option value="ge"   >Georgia</option>
                    <option value="de"   >Germany</option>
                    <option value="gh"   >Ghana</option>
                    <option value="gi"   >Gibraltar</option>
                    <option value="gr"   >Greece</option>
                    <option value="gl"   >Greenland</option>
                    <option value="gd"   >Grenada</option>
                    <option value="gp"   >Guadeloupe</option>
                    <option value="gu"   >Guam</option>
                    <option value="gt"   >Guatemala</option>
                    <option value="gn"   >Guinea</option>
                    <option value="gw"   >Guinea-Bissau</option>
                    <option value="gy"   >Guyana</option>
                    <option value="ht"   >Haiti</option>
                    <option value="hm"   >Heard Island and McDonald Islands</option>
                    <option value="hn"   >Honduras</option>
                    <option value="hk"   >Hong Kong</option>
                    <option value="hu"   >Hungary</option>
                    <option value="is"   >Iceland</option>
                    <option value="in"   >India</option>
                    <option value="id"   >Indonesia</option>
                    <option value="ir"   >Iran</option>
                    <option value="iq"   >Iraq</option>
                    <option value="xe"   >Iraq-Saudi Arabia Neutral Zone</option>
                    <option value="ie"   >Ireland</option>
                    <option value="il"   >Israel</option>
                    <option value="it"   >Italy</option>
                    <option value="ci"   >Ivory Coast</option>
                    <option value="jm"   >Jamaica</option>
                    <option value="jp"   >Japan</option>
                    <option value="jo"   >Jordan</option>
                    <option value="kz"   >Kazakhstan</option>
                    <option value="ke"   >Kenya</option>
                    <option value="ki"   >Kiribati</option>
                    <option value="kw"   >Kuwait</option>
                    <option value="kg"   >Kyrgyz Republic</option>
                    <option value="la"   >Laos</option>
                    <option value="lv"   >Latvia</option>
                    <option value="lb"   >Lebanon</option>
                    <option value="ls"   >Lesotho</option>
                    <option value="lr"   >Liberia</option>
                    <option value="ly"   >Libya</option>
                    <option value="li"   >Liechtenstein</option>
                    <option value="lt"   >Lithuania</option>
                    <option value="lu"   >Luxembourg</option>
                    <option value="mo"   >Macau</option>
                    <option value="mk"   >Macedonia</option>
                    <option value="mg"   >Madagascar</option>
                    <option value="mw"   >Malawi</option>
                    <option value="my"   >Malaysia</option>
                    <option value="mv"   >Maldives</option>
                    <option value="ml"   >Mali</option>
                    <option value="mt"   >Malta</option>
                    <option value="mh"   >Marshall Islands</option>
                    <option value="mq"   >Martinique</option>
                    <option value="mr"   >Mauritania</option>
                    <option value="mu"   >Mauritius</option>
                    <option value="yt"   >Mayotte</option>
                    <option value="mx"   >Mexico</option>
                    <option value="md"   >Moldova</option>
                    <option value="mc"   >Monaco</option>
                    <option value="mn"   >Mongolia</option>
                    <option value="ms"   >Montserrat</option>
                    <option value="ma"   >Morocco</option>
                    <option value="mz"   >Mozambique</option>
                    <option value="mm"   >Myanmar</option>
                    <option value="na"   >Namibia</option>
                    <option value="nr"   >Nauru</option>
                    <option value="np"   >Nepal</option>
                    <option value="nl"   >Netherlands</option>
                    <option value="an"   >Netherlands Antilles</option>
                    <option value="nc"   >New Caledonia</option>
                    <option value="nz"   >New Zealand</option>
                    <option value="ni"   >Nicaragua</option>
                    <option value="ne"   >Niger</option>
                    <option value="ng"   >Nigeria</option>
                    <option value="nu"   >Niue</option>
                    <option value="nf"   >Norfolk Island</option>
                    <option value="kp"   >North Korea</option>
                    <option value="mp"   >Northern Mariana Islands</option>
                    <option value="no"   >Norway</option>
                    <option value="om"   >Oman</option>
                    <option value="pk"   >Pakistan</option>
                    <option value="pw"   >Palau</option>
                    <option value="ps"   >Palestinian Territories</option>
                    <option value="pa"   >Panama</option>
                    <option value="pg"   >Papua New Guinea</option>
                    <option value="py"   >Paraguay</option>
                    <option value="pe"   >Peru</option>
                    <option value="ph"   >Philippines</option>
                    <option value="pn"   >Pitcairn Islands</option>
                    <option value="pl"   >Poland</option>
                    <option value="pt"   >Portugal</option>
                    <option value="pr"   >Puerto Rico</option>
                    <option value="qa"   >Qatar</option>
                    <option value="re"   >Reunion</option>
                    <option value="ro"   >Romania</option>
                    <option value="ru"   >Russia</option>
                    <option value="rw"   >Rwanda</option>
                    <option value="sh"   >Saint Helena and Dependencies</option>
                    <option value="kn"   >Saint Kitts & Nevis</option>
                    <option value="lc"   >Saint Lucia</option>
                    <option value="pm"   >Saint Pierre and Miquelon</option>
                    <option value="vc"   >Saint Vincent and the Grenadines</option>
                    <option value="ws"   >Samoa</option>
                    <option value="sm"   >San Marino</option>
                    <option value="st"   >Sao Tome and Principe</option>
                    <option value="sa"   >Saudi Arabia</option>
                    <option value="sn"   >Senegal</option>
                    <option value="sc"   >Seychelles</option>
                    <option value="sl"   >Sierra Leone</option>
                    <option value="sg"   >Singapore</option>
                    <option value="sk"   >Slovakia</option>
                    <option value="si"   >Slovenia</option>
                    <option value="sb"   >Solomon Islands</option>
                    <option value="so"   >Somalia</option>
                    <option value="za"   >South Africa</option>
                    <option value="gs"   >South Georgia and the South Sandwich Islands</option>
                    <option value="kr"   >South Korea</option>
                    <option value="es"   >Spain</option>
                    <option value="pi"   >Spratly Islands</option>
                    <option value="lk"   >Sri Lanka</option>
                    <option value="sd"   >Sudan</option>
                    <option value="sr"   >Suriname</option>
                    <option value="sj"   >Svalbard and Jan Mayen Islands</option>
                    <option value="sz"   >Swaziland</option>
                    <option value="se"   >Sweden</option>
                    <option value="ch"   >Switzerland</option>
                    <option value="sy"   >Syria</option>
                    <option value="tw"   >Taiwan</option>
                    <option value="tj"   >Tajikistan</option>
                    <option value="tz"   >Tanzania</option>
                    <option value="th"   >Thailand</option>
                    <option value="tg"   >Togo</option>
                    <option value="tk"   >Tokelau</option>
                    <option value="to"   >Tonga</option>
                    <option value="tt"   >Trinidad and Tobago</option>
                    <option value="tn"   >Tunisia</option>
                    <option value="tr"   >Turkey</option>
                    <option value="tm"   >Turkmenistan</option>
                    <option value="tc"   >Turks and Caicos Islands</option>
                    <option value="tv"   >Tuvalu</option>
                    <option value="ug"   >Uganda</option>
                    <option value="ua"   >Ukraine</option>
                    <option value="ae"   >United Arab Emirates</option>
                    <option value="uk"   >United Kingdom</option>
                    <option value="us"   >United States</option>
                    <option value="um"   >United States Minor Outlying Islands</option>
                    <option value="uy"   >Uruguay</option>
                    <option value="vi"   >US Virgin Islands</option>
                    <option value="uz"   >Uzbekistan</option>
                    <option value="vu"   >Vanuatu</option>
                    <option value="va"   >Vatican City</option>
                    <option value="ve"   >Venezuela</option>
                    <option value="vn"   >Vietnam</option>
                    <option value="wf"   >Wallis and Futuna Islands</option>
                    <option value="eh"   >Western Sahara</option>
                    <option value="ye"   >Yemen</option>
                    <option value="zm"   >Zambia</option>
                    <option value="zw"   >Zimbabwe</option>
                    <option value="rs"   >Serbia</option>
                    <option value="me"   >Montenegro</option>
               </select>
                            </span>
                        </p>
                        
                        <p>
                        	<label>Phone</label>
                            <span class="field"><select name="mobileCountryCode" id="mobileCountryCode"><option value="376">Andorra (+376)</option><option value="1268">Antigua, Barbuda (+1268)</option><option value="54">Argentina (+54)</option><option value="297">Aruba (+297)</option><option value="61">Australia (+61)</option><option value="43">Austria (+43)</option><option value="32">Belgium (+32)</option><option value="1441">Bermuda (+1441)</option><option value="591">Bolivia (+591)</option><option value="55">Brazil (+55)</option><option value="359">Bulgaria (+359)</option><option value="1">Canada (+1)</option><option value="1345">Cayman Islands (+1345)</option><option value="56">Chile (+56)</option><option value="86">China (+86)</option><option value="385">Croatia (+385)</option><option value="357">Cyprus (+357)</option><option value="420">Czech Republic (+420)</option><option value="45">Denmark (+45)</option><option value="1767">Dominica (+1767)</option><option value="1806">Dominican Republic (+1806)</option><option value="593">Ecuador (+593)</option><option value="20" selected >Egypt (+20)</option><option value="503">El Salvador (+503)</option><option value="372">Estonia (+372)</option><option value="679">Fiji Islands (+679)</option><option value="358">Finland (+358)</option><option value="33">France (+33)</option><option value="594">French Guiana (+594)</option><option value="49">Germany (+49)</option><option value="30">Greece (+30)</option><option value="1473">Grenada (+1473)</option><option value="590">Guadeloupe (+590)</option><option value="852">Hong Kong (+852)</option><option value="36">Hungary (+36)</option><option value="354">Iceland (+354)</option><option value="91">India (+91)</option><option value="62">Indonesia (+62)</option><option value="353">Ireland (+353)</option><option value="972">Israel (+972)</option><option value="39">Italy (+39)</option><option value="1876">Jamaica (+1876)</option><option value="371">Latvia (+371)</option><option value="423">Liechtenstein (+423)</option><option value="370">Lithuania (+370)</option><option value="352">Luxembourg (+352)</option><option value="60">Malaysia (+60)</option><option value="356">Malta (+356)</option><option value="596">Martinique (+596)</option><option value="52">Mexico (+52)</option><option value="377">Monaco (+377)</option><option value="1664">Montserrat (+1664)</option><option value="31">Netherlands (+31)</option><option value="599">Netherlands Antilles (+599)</option><option value="64">New Zealand (+64)</option><option value="47">Norway (+47)</option><option value="507">Panama (+507)</option><option value="595">Paraguay (+595)</option><option value="51">Peru (+51)</option><option value="63">Philippines (+63)</option><option value="48">Poland (+48)</option><option value="351">Portugal (+351)</option><option value="40">Romania (+40)</option><option value="7">Russia (+7)</option><option value="1758">Saint Lucia (+1758)</option><option value="65">Singapore (+65)</option><option value="421">Slovakia (+421)</option><option value="386">Slovenia (+386)</option><option value="27">South Africa (+27)</option><option value="82">South Korea (+82)</option><option value="34">Spain (+34)</option><option value="597">Suriname (+597)</option><option value="46">Sweden (+46)</option><option value="41">Switzerland (+41)</option><option value="886">Taiwan (+886)</option><option value="66">Thailand (+66)</option><option value="1868">Trinidad, Tobago (+1868)</option><option value="90">Turkey (+90)</option><option value="1649">Turks and Caicos (+1649)</option><option value="44">United Kingdom (+44)</option><option value="1">United States (+1)</option><option value="58">Venezuela (+58)</option><option value="84">Vietnam (+84)</option></select> <input type="text" name="phone" id="email" class="longinput" style="width:150px" /></span>
                        </p>
                        
                        <p>
                        	<label>Website</label>
                            <span class="field"><input type="text" name="site" id="email" class="longinput" /></span>
                        </p>
                        
                        <p>
                        	<label>Address</label>
                            <span class="field"><input type="text" name="address" id="email" class="longinput" /></span>
                        </p>
                        
                        <p>
                        	<label>Current Country</label>
                            <span class="field"><input type="text" name="current_country" id="email" class="longinput" /></span>
                        </p>
                        
                        <p>
                        	<label>Birthday</label>
                            <span class="field"><input type="text" name="birthday" id="birthday" class="longinput" /></span>
                        </p>
                        
                        
                        <p>
                        	<label>About You</label>
                            <span class="field"><textarea cols="80" rows="5" name="location" class="mediuminput" id="location"></textarea></span> 
                        </p>
                        
                       
                          <p class="stdformbutton">
                        	<button class="submit radius2">Create My Account</button>
                            <input type="reset" class="reset radius2" value="Reset" />
                        </p>
                    </form>
                            
                    <br /><br />
                   
                    
                </div><!--content-->
                
            </div><!--maincontentinner-->
            
           <?php include('footer.php');?>
            
        </div><!--maincontent-->
        
        <div class="mainright">
        	<div class="mainrightinner">
            	
                <div class="widgetbox" style="width: 300px">
                        <div class="title"><h2 class="general"><span>Log In</span></h2></div>
                        <div class="widgetcontent stdform stdformwidget">
                        <form action="#" method="post" >
                            <div class="par">
                            	<label>Username</label>
                                <div class="field">
                                	<input type="text" name="id" class="longinput" />
                                </div>
                            </div><!--par-->
                            <div class="par">
                            	<label>Password</label>
                                <div class="field">
                                	<input type="password" name="password" class="longinput" /> <br />
                                </div>
                                <br />
                                <div class="field">
                                	<input type="checkbox" name="keep" class="longinput" /> 

<small>Keep Me Logged in</small> <br />
                                </div>
                            </div><!--par-->
                            <div class="par">
                                <div class="field">
                                	<button class="radius2">Log In</button>
                                </div>
                            </div><!--par-->
                            </form>
                         <small><a href="#" >Forget My Password</a></small>
                                                   
                     <br clear="all" />
                    </div><!--widgetcontent-->
                </div><!--widgetbox-->
                
                
            </div><!--mainrightinner-->
        </div><!--mainright-->
                
     	</div><!--mainwrapperinner-->
    </div><!--mainwrapper-->
	<!-- END OF MAIN CONTENT -->
    

</body>
</html>
