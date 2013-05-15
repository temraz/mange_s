<div class="leftmenu">
            		<ul>
                    	<li class="current"><a href="<?php echo base_url();?>user/profile/"  class="dashboard"><span>Profile</span></a></li>
                        
                        
                       
                        
                       
                        <li><a href="<?php echo base_url();?>site/meetings/" class="buttons" ><span>Meetings</span></a></li>
                        <li><a href="<?php echo base_url();?>site/editor/" class="media" ><span>File Editor</span></a></li>
                       
                     
                       
                        <li><a href="<?php echo base_url();?>site/calendar/" class="calendar"><span>Calendar</span></a></li>
                       
                        <li><a href="<?php echo base_url();?>site/chat/"  class="chat"><span>Messages</span></a></li>
                        
                        <li><a href="<?php echo base_url();?>site/media/" class="media"><span>companies followers</span></a></li>
                        
                        <li>
                            <?php
                            if($this->session->userdata('company_id') == NULL){
                               echo '<a href="http://localhost/mange/site/company" class="media"><span>Create Company</span></a>';
                                }  else {
                               echo '<a href="http://localhost/mange/company" class="media"><span>'.$this->session->userdata('company_name') .'</span></a>';    
                            }
                            ?>
                            
                        </li>
                       
                    </ul>
                        
                </div>