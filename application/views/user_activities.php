<html><ul class="msglist">
<?php if(isset($activities)){ foreach($activities as $activity){?>
	
    <li class="calendar <?php if($activity->seen==1) echo 'new' ;?>">
        <div class="msg">
            <a href="<?php echo base_url().$activity->link ?>/<?php echo $activity->id ;?>"><?php echo $activity->title?></a>.
        </div>
    </li>
    <?php }}else{?>
   <p style="text-align:center"> There are no new activities </p>
    <?php }?>
</ul>
<!--<div class="msgmore"><a href="">View All Activities</a></div>-->