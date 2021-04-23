        <div class="col-md-3 left_col menu_fixed">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="<?php echo base_url(); ?>service" class="site_title"><span><?php echo $this->item->ititle; ?></span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile">
              <div class="profile_pic ">
                <img src="<?php if($this->loginuser->uimage != '' && file_exists($this->config->item('users_folder').$this->loginuser->uimage)) echo base_url().$this->config->item('users_folder').$this->loginuser->uimage; else echo base_url().$this->config->item('users_folder').'user.png'; ?>" alt="<?php echo $this->loginuser->username; ?>" class="img-circle profile_img" style="max-height:55px;">
              </div>
              <div class="profile_info">
                <span><?php echo lang('welcome'); ?>,</span>
                <h2><?php echo $this->loginuser->username; ?></h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

			<br>
			<br>
			<br>
			<br>

            <!-- sidebar menu -->
			<?php if($this->loginuser->dir == 'rtl') { ?>
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <!--<h3>General</h3>-->
                <ul class="nav side-menu" style="text-align:right;">
					<li><a href="<?php echo base_url(); ?>service/qrcode"><?php echo lang('qrcode'); ?> <i class="fa fa-qrcode"></i></a></li>
                </ul>
              </div>
            </div>
			<?php } else { ?>
			 <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <!--<h3>General</h3>-->
                <ul class="nav side-menu" style="text-align:left;">
					<li><a href="<?php echo base_url(); ?>service/qrcode"><i class="fa fa-qrcode"></i> <?php echo lang('qrcode'); ?></a></li>


                </ul>
              </div>
            </div>
			<?php } ?>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <!--<div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Logout">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>-->
            <!-- /menu footer buttons -->
          </div>
        </div>