<?php
$this->load->model('model_company');
$feed_session=$this->model_company->feed_by_id($this->session->userdata('comp_id'));
 if(count($feed_session) != 0){
								foreach($feed_session as $row){ 
								$title = $row->title;
								$date = $row->date;
								$link = $row->link;
								?>
                            	<li class="media"><a href="<?php echo $link ; ?>"><strong><?php echo substr($title,0,20);if(count($title) > 20){echo '..';}?></strong> - <?php if(isset($row->event_id)){echo 'Event' ;}elseif(isset($row->news_id)){echo 'News' ;}elseif(isset($row->product_id)){echo 'Product';}elseif(isset($row->job_id)){echo "Job" ;}else{echo 'Media';} ?> <span><?php echo $date ?></span></a></li>
                                <?php }} ?>