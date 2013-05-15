<ul class="maintabmenu">
						<?php $id=$this->uri->segment(3);
						$page=$this->uri->segment(2);
						?>
                        
                	<li class="<?php if($page == 'profile'){echo "current";}?>"><a href="<?php echo base_url();?>company/profile/<?php echo $id;?>" >Profile</a></li>
                    <li class="<?php if($page == 'news'){echo "current";}?>"><a href="<?php echo base_url();?>company/news/<?php echo $id ;?>">News</a></li>
                    <li class="<?php if($page == 'events'){echo "current";}?>"><a href="<?php echo base_url();?>company/events/<?php echo $id ;?>" >Events</a></li>
                    <li class="<?php if($page == 'products'){echo "current";}?>"><a href="<?php echo base_url();?>company/products/<?php echo $id ;?>" >Products</a></li>
                    <li class="<?php if($page == 'companyjobs'){echo "current";}?>"><a href="<?php echo base_url();?>company/companyjobs/<?php echo $id ;?>" >Jobs</a></li>
                    <li class="<?php if($page == 'gallery'){echo "current";}?>"><a href="<?php echo base_url();?>company/gallery/<?php echo $id ;?>" >Gallery</a></li>
                </ul><!--maintabmenu-->
                