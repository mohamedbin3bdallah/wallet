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
                <ul class="nav side-menu" style="text-align:right;">					<li><a href="<?php echo base_url(); ?>service/settings"><?php echo lang('settings'); ?> <i class="fa fa-cog"></i></a></li>									<?php if((in_array('PS',$this->sections))) { ?><li><a href="<?php echo base_url(); ?>service/partnership"><?php echo lang('partnership'); ?> <i class="fa fa-users"></i></a></li><?php } ?>				
					<li><a href="<?php echo base_url(); ?>service/qrcode"><?php echo lang('qrcode'); ?> <i class="fa fa-qrcode"></i></a></li>				  				  				  <?php if((in_array('OF',$this->sections)) && (strpos($this->loginuser->privileges, ',ofadd,') !== false || strpos($this->loginuser->privileges, ',ofsee,') !== false)) { ?>				   <li><a><span class="fa fa-chevron-down"></span> <?php echo lang('offers'); ?> <i class="fa fa-gift"></i></a>					<ul class="nav child_menu">						<?php if(strpos($this->loginuser->privileges, ',ofadd,') !== false) { ?><li><a href="<?php echo base_url(); ?>service/offers/add"><?php echo lang('add_offer'); ?></a></li><?php } ?>						<?php if(strpos($this->loginuser->privileges, ',ofsee,') !== false) { ?><li><a href="<?php echo base_url(); ?>service/offers"><?php echo lang('offers'); ?></a></li><?php } ?>					</ul>				   </li>				  <?php } ?>				  				  <?php if((in_array('CC',$this->sections)) && (strpos($this->loginuser->privileges, ',ccadd,') !== false || strpos($this->loginuser->privileges, ',ccsee,') !== false)) { ?>				   <li><a><span class="fa fa-chevron-down"></span> <?php echo lang('creditcards'); ?> <i class="fa fa-credit-card"></i></a>					<ul class="nav child_menu">						<?php if(strpos($this->loginuser->privileges, ',ccadd,') !== false) { ?><li><a href="<?php echo base_url(); ?>service/ccards/add"><?php echo lang('add_creditcard'); ?></a></li><?php } ?>						<?php if(strpos($this->loginuser->privileges, ',ccsee,') !== false) { ?><li><a href="<?php echo base_url(); ?>service/ccards"><?php echo lang('creditcards'); ?></a></li><?php } ?>					</ul>				   </li>				  <?php } ?>				  				  				  <?php if((in_array('PR',$this->sections)) && (strpos($this->loginuser->privileges, ',prsee,') !== false)) { ?>				   <li><a><span class="fa fa-chevron-down"></span> <?php echo lang('purchases'); ?> <i class="fa fa-shopping-cart"></i></a>					<ul class="nav child_menu">						<?php if(strpos($this->loginuser->privileges, ',prsee,') !== false) { ?><li><a href="<?php echo base_url(); ?>service/purchases"><?php echo lang('purchases'); ?></a></li><?php } ?>					</ul>				   </li>				  <?php } ?>				  				  				  <li><a href="<?php echo base_url(); ?>service/reports"><?php echo lang('reports'); ?> <i class="fa fa-bar-chart-o"></i></a></li>
                </ul>
              </div>
            </div>
			<?php } else { ?>
			 <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <!--<h3>General</h3>-->
                <ul class="nav side-menu" style="text-align:left;">					<li><a href="<?php echo base_url(); ?>service/settings"><i class="fa fa-cog"></i> <?php echo lang('settings'); ?></a></li>									<?php if((in_array('PS',$this->sections))) { ?><li><a href="<?php echo base_url(); ?>service/partnership"><i class="fa fa-users"></i> <?php echo lang('partnership'); ?></a></li><?php } ?>					
					<li><a href="<?php echo base_url(); ?>service/qrcode"><i class="fa fa-qrcode"></i> <?php echo lang('qrcode'); ?></a></li>
				  <?php if((in_array('OF',$this->sections)) && (strpos($this->loginuser->privileges, ',ofadd,') !== false || strpos($this->loginuser->privileges, ',ofsee,') !== false)) { ?>				   <li><a><i class="fa fa-gift"></i> <?php echo lang('offers'); ?> <span class="fa fa-chevron-down"></span></a>					<ul class="nav child_menu">						<?php if(strpos($this->loginuser->privileges, ',ofadd,') !== false) { ?><li><a href="<?php echo base_url(); ?>service/offers/add"><?php echo lang('add_offer'); ?></a></li><?php } ?>						<?php if(strpos($this->loginuser->privileges, ',ofsee,') !== false) { ?><li><a href="<?php echo base_url(); ?>service/offers"><?php echo lang('offers'); ?></a></li><?php } ?>					</ul>				   </li>				  <?php } ?>				  				  				   <?php if((in_array('CC',$this->sections)) && (strpos($this->loginuser->privileges, ',ccadd,') !== false || strpos($this->loginuser->privileges, ',ccsee,') !== false)) { ?>				   <li><a><i class="fa fa-credit-card"></i> <?php echo lang('creditcards'); ?> <span class="fa fa-chevron-down"></span></a>					<ul class="nav child_menu">						<?php if(strpos($this->loginuser->privileges, ',ccadd,') !== false) { ?><li><a href="<?php echo base_url(); ?>service/ccards/add"><?php echo lang('add_creditcard'); ?></a></li><?php } ?>						<?php if(strpos($this->loginuser->privileges, ',ccsee,') !== false) { ?><li><a href="<?php echo base_url(); ?>service/ccards"><?php echo lang('creditcards'); ?></a></li><?php } ?>					</ul>				   </li>				  <?php } ?>				  				  				  <?php if((in_array('PR',$this->sections)) && (strpos($this->loginuser->privileges, ',prsee,') !== false)) { ?>				   <li><a><i class="fa fa-shopping-cart"></i> <?php echo lang('purchases'); ?> <span class="fa fa-chevron-down"></span></a>					<ul class="nav child_menu">						<?php if(strpos($this->loginuser->privileges, ',prsee,') !== false) { ?><li><a href="<?php echo base_url(); ?>service/purchases"><?php echo lang('purchases'); ?></a></li><?php } ?>					</ul>				   </li>				  <?php } ?>				 				 				  <li><a href="<?php echo base_url(); ?>service/reports"><i class="fa fa-bar-chart-o"></i> <?php echo lang('reports'); ?></a></li>

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