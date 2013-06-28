<html><ul class="msglist">
    
	<?php if(isset($messages)){foreach($messages as $message){
		$seder_firtname=$this->model_users->select_emp($message->from)->row(0)->firstname;
        $seder_lastname=$this->model_users->select_emp($message->from)->row(0)->lastname;
    ?>
   
    <li class="message <?php if($message->to_seen==1) echo 'new' ;?>">
     
        <div class="msg">
            From:<?php echo $seder_firtname.' '.$seder_lastname ?></a> <span><?php echo $message->message_date;?></span>
            <p><a href="<?php echo base_url();?>employee/chat/<?php echo $message->from ?>"><?php echo substr($message->message,0,30)?>...</a></p>
        </div>
       
    </li>
     
   <?php }}elseif(isset($no_messages)){?>
   <p style="text-align:center">There are no new messages </p>
   <?php }?>
    
</ul>
<div class="msgmore"><a href="<?php echo base_url();?>employee/chat/">See All Messages</a></div>