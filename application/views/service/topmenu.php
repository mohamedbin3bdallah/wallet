		<!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-<?php if($this->loginuser->dir == 'rtl') echo 'left'; else echo 'right'; ?>">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <img src="<?php if($this->loginuser->uimage != '' && file_exists($this->config->item('users_folder').$this->loginuser->uimage)) echo base_url().$this->config->item('users_folder').$this->loginuser->uimage; else echo base_url().$this->config->item('users_folder').'user.png'; ?>" alt="<?php echo $this->loginuser->username; ?>"><?php echo $this->loginuser->username; ?>
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right" style="text-align:<?php if($this->loginuser->dir == 'rtl') echo 'right'; else echo 'left'; ?>; float:left;">
                    <!--<li><a href="javascript:;"> Profile</a></li>
                    <li>
                      <a href="javascript:;">
                        <span class="badge bg-red pull-right">50%</span>
                        <span>Settings</span>
                      </a>
                    </li>
                    <li><a href="javascript:;">Help</a></li>-->
					<li><a href="<?php echo base_url(); ?>service/account"><i class="fa fa-cog pull-<?php if($this->loginuser->dir == 'rtl') echo 'left'; else echo 'right'; ?>"></i> <?php echo lang('account'); ?></a></li>
                    <li><a href="<?php echo base_url(); ?>service/logout"><i class="fa fa-sign-out pull-<?php if($this->loginuser->dir == 'rtl') echo 'left'; else echo 'right'; ?>"></i> <?php echo lang('logout'); ?></a></li>
                  </ul>
                </li>

              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->