<html><ul class="msglist">
<?php if(isset($activities)){ foreach($activities as $activity){?>
	
    <li class="calendar new">
        <div class="msg">
            <a href="<?php echo $activity->link ?>/<?php echo $activity->id ;?>"><?php echo $activity->activity?></a>.
        </div>
    </li>
    <?php }}?>
</ul>
<div class="msgmore"><a href="">View All Activities</a></div>