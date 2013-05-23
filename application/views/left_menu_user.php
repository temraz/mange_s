<div class="leftmenu">
<?php 
$page=$this->uri->segment(2);
$control=$this->uri->segment(1); ?>
            		<ul>
                    	<li class="<?php if($control == 'user' && $page=='news_feed'){echo "current";}?>"><a href="<?php echo base_url();?>user/news_feed/" class="buttons" ><span>News Feed</span></a></li>
                    	<li class="<?php if($control == 'user' && $page=='profile'){echo "current";}?>"><a href="<?php echo base_url();?>user/profile/<?php echo $this->session->userdata('user_id'); ?>"  class="dashboard"><span>Profile</span></a></li>
                        <li class="<?php if($control == 'user' && $page=='edit'){echo "current";}?>"><a href="<?php echo base_url();?>user/edit/"  class="dashboard"><span>Update Profile</span></a></li>
                        <li><a href="<?php echo base_url();?>site/media/" class="media"><span>Messages</span></a></li>
                        <li class="<?php if($control == 'user' && $page=='following'){echo "current";}?>"><a href="<?php echo base_url();?>user/following/" class="dashboard" ><span>Following</span></a></li>
                        <li><a href="<?php echo base_url();?>user/cv_edit/" class="media" ><span>CV</span></a></li>
                       
                     
                       
                        <li><a href="<?php echo base_url();?>site/calendar/" class="calendar"><span>Applied Jobs</span></a></li>
                       
                        <li><a href="<?php echo base_url();?>site/chat/"  class="chat"><span>Buied Products</span></a></li>
                        
                        
                       
                    </ul>
                        
                </div>