<html><ul class="msglist">
    
	<?php if(isset($messages)){foreach($messages as $row){
					$id=$row->id;
					$from_u=$row->from_u;
					$from_c=$row->from_c;
					$subject=$row->subject;
					$date_m=$row->date_m;
					$message=$row->message;
					$read=$row->read_m;
					$seen=$row->seen;
		if(isset($from_u)){
		$from_user=$this->model_users->get_user_info($from_u);
						foreach($from_user as $r){
							$user_id = $r->id;
							$user_name = $r->username;
							}
		}elseif(isset($from_c)){
		$from_company=$this->model_company->get_company_info($from_c);
						foreach($from_company as $r){
							$company_id = $r->id;
							$company_name = $r->name;
							}
						
			}
    ?>
   
    <li class="message" >
     
        <div class="msg" <?php if($read == 0){?>style="background:#fffccc"<?php }?>>
            <b>From: </b><?php if(isset($from_c)){ echo $company_name." (Company)"; }elseif(isset($from_u)){ echo $user_name." (User) - ";} ?><span style="color:#c1c1c1"><?php echo $date_m;?></span>
            <p><a href="<?php echo base_url();?>user/profile/<?php echo $from_u?>"><?php echo substr($subject,0,30)?>...</a></p>
        </div>
       
    </li>
     
   <?php }}elseif(isset($no_messages)){?>
   <p style="text-align:center">There are no new messages </p>
   <?php }?>
    
</ul>
<div class="msgmore"><a href="<?php echo base_url();?>user/messages/">See All Messages</a></div>