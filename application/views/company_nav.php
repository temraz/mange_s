<ul class="maintabmenu">
                <?php $page=$this->uri->segment(2); ?>
                	    <li class="<?php if($page == ''){echo "current";}?>"><a href="<?php echo base_url();?>edit/"  class="dashboard"><span>Home</span></a></li>
                        <li class="<?php if($page == 'all_news' || $page == 'news'){echo "current";}?>"><a href="<?php echo base_url();?>edit/all_news/" class="dashboard"  ><span>News</span></a></li>
                        <li c class="<?php if($page == 'all_events' || $page == 'event'){echo "current";}?>"lass="current"><a href="<?php echo base_url();?>edit/all_events/" class="dashboard" ><span>Events</span></a></li>
                        <li class="<?php if($page == 'all_products' || $page == 'product'){echo "current";}?>"><a href="<?php echo base_url();?>edit/all_products/" class="dashboard"><span>Products</span></a></li>
                        <li class="<?php if($page == 'all_jobs' || $page == 'job'){echo "current";}?>"><a href="<?php echo base_url();?>edit/all_jobs/"  class="dashboard"><span>Jobs</span></a></li>                       
                        <li class="<?php if($page == 'all_photos' || $page == 'media'){echo "current";}?>"><a href="<?php echo base_url();?>edit/all_photos/" class="dashboard"><span>Media</span></a></li>
                   
                </ul>