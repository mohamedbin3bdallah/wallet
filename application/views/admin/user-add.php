		<div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left" style="width:100%;">
                <h3 style="text-align:center;"><?php echo lang('add_user'); ?></h3>
              </div>

              <!--<div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Go!</button>
                    </span>
                  </div>
                </div>
              </div>-->
            </div>
			
            <div class="clearfix"></div>
            
			<div class="row" dir="<?php echo $this->loginuser->dir; ?>">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <!--<h2>Form Design <small>different form elements</small></h2>-->
                    <ul class="nav navbar-<?php if($this->loginuser->dir == 'rtl') echo 'left'; else echo 'right'; ?> panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <!--<li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul>
                      </li>-->
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
					<?php
						//echo $admessage;
						echo validation_errors();
						$attributes = array('id' => 'submit_form', /*'data-parsley-validate' => '', */'class' => 'form-horizontal form-label-left');
						echo form_open_multipart('users/create', $attributes);
					?>
                    <!--<form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">-->
					<?php
						if($this->loginuser->dir == 'rtl') { $label_class = ' col-md-push-6 col-sm-push-6'; $input_class = ' col-md-pull-1 ol-sm-pull-2'; }
						else { $label_class = ''; $input_class = ''; }
					?>

                      <div class="form-group">
						<?php
							$data = array(																'id' => 'namelabel',
								'class' => 'control-label col-md-3 col-sm-3 col-xs-12'.$label_class,
							);
							echo form_label(lang('name').' <span class="required">*</span>','name',$data);
						?>
                        <div id="namediv" class="col-md-6 col-sm-6 col-xs-12 <?php echo $input_class; ?>">
						  <?php
							$data = array(
								'type' => 'text',
								'name' => 'name',
								'id' => 'name',
								'placeholder' => lang('name'),
								'class' => 'form-control col-md-7 col-xs-12',
								//'max' => 255,
								//'required' => 'required',
								'value' => set_value('name')
							);
							echo form_input($data);
						?>
							<div id="name_validation"></div>
							<input type="hidden" name="name_validation_h" id="name_validation_h" value="0">
                        </div>
                      </div>
					  <div class="form-group">
						<?php
							$data = array(
								'class' => 'control-label col-md-3 col-sm-3 col-xs-12'.$label_class,
							);
							echo form_label(lang('username').' <span class="required">*</span>','username',$data);
						?>
                        <div class="col-md-6 col-sm-6 col-xs-12 <?php echo $input_class; ?>">
						  <?php
							$data = array(
								'type' => 'text',
								'name' => 'username',
								'id' => 'username',
								'placeholder' => lang('username'),
								'class' => 'form-control col-md-7 col-xs-12',
								//'max' => 255,
								//'pattern' => '[a-z]{5,}',
								//'title' => '5 حروف  انجليزية فاكثر',
								//'required' => 'required',
								'value' => set_value('username')
							);
							echo form_input($data);
						?>
							<div id="username_validation"></div>
							<input type="hidden" name="username_validation_h" id="username_validation_h" value="0">
                        </div>
                      </div>
                      <div class="form-group">
						<?php
							$data = array(
								'class' => 'control-label col-md-3 col-sm-3 col-xs-12'.$label_class,
							);
							echo form_label(lang('email').' <span class="required">*</span>','email',$data);
						?>
                        <div class="col-md-6 col-sm-6 col-xs-12 <?php echo $input_class; ?>">
						  <?php
							$data = array(
								'type' => 'email',
								'name' => 'email',
								'id' => 'email',
								'placeholder' => lang('email'),
								'class' => 'form-control col-md-7 col-xs-12',
								//'max' => 255,
								//'required' => 'required',
								'value' => set_value('email')
							);
							echo form_input($data);
						?>
							<div id="email_validation"></div>
							<input type="hidden" name="email_validation_h" id="email_validation_h" value="0">
                        </div>
                      </div>
					  <?php if(in_array('UT',$this->sections)) { ?>
					  <div class="form-group">
						<?php
							$data = array(
								'class' => 'control-label col-md-3 col-sm-3 col-xs-12'.$label_class,
							);
							echo form_label(lang('usertype').' <span class="required">*</span>','usertype',$data);
						?>
                        <div class="col-md-6 col-sm-6 col-xs-12 <?php echo $input_class; ?>">
						<?php
							if(!empty($usertypes))
							{
								foreach($usertypes as $usertype)
								{
									$ourtypes[$usertype->utid] = $usertype->utname;
								}											
								echo form_dropdown('usertype', $ourtypes, array(), 'id="usertype" class="form-control" required="required"');
							}
							else echo lang('no_data');
						?>
                        </div>
                      </div>
					  <?php } else { ?><input type="hidden" name="usertype" value="1" /><?php } ?>					  					  <div id="item">					  </div>					  					  <div class="form-group">						<?php							$data = array(								'class' => 'control-label col-md-3 col-sm-3 col-xs-12'.$label_class,							);							echo form_label(lang('place').' <span class="required">*</span>','place',$data);						?>                        <div class="col-md-6 col-sm-6 col-xs-12 <?php echo $input_class; ?>">						<?php							if(!empty($places))							{								foreach($places as $place)								{									$ourtypes1[$place->pcid] = $place->pctitle;								}																			echo form_dropdown('place', $ourtypes1, array(), 'id="place" class="form-control" required="required"');							}							else echo lang('no_data');						?>                        </div>                      </div>
                      <div class="form-group">
						<?php
							$data = array(
								'class' => 'control-label col-md-3 col-sm-3 col-xs-12'.$label_class,
							);
							echo form_label(lang('password').' <span class="required">*</span>','password',$data);
						?>
                        <div class="col-md-6 col-sm-6 col-xs-12 <?php echo $input_class; ?>">
						<?php
							$data = array(
								'type' => 'password',
								'name' => 'password',
								'id' => 'password',
								'placeholder' => lang('password'),
								'class' => 'form-control col-md-7 col-xs-12',
								//'min' => 6,
								//'max' => 255,
								//'required' => 'required',
								'value' => set_value('password')
							);
							echo form_input($data);
						?>
							<div id="password_validation"></div>
							<input type="hidden" name="password_validation_h" id="password_validation_h" value="0">
                        </div>
                      </div>
					  <div class="form-group">
						<?php
							$data = array(
								'class' => 'control-label col-md-3 col-sm-3 col-xs-12'.$label_class,
							);
							echo form_label(lang('cnfpassword').' <span class="required">*</span>','cnfpassword',$data);
						?>
                        <div class="col-md-6 col-sm-6 col-xs-12 <?php echo $input_class; ?>">
						  <?php
							$data = array(
								'type' => 'password',
								'name' => 'cnfpassword',
								'id' => 'cnfpassword',
								'placeholder' => lang('cnfpassword'),
								'class' => 'form-control col-md-7 col-xs-12',
								//'min' => 6,
								//'max' => 255,
								//'required' => 'required',
								'value' => set_value('cnfpassword')
							);
							echo form_input($data);
						?>
							<div id="cnfpassword_validation"></div>
							<input type="hidden" name="cnfpassword_validation_h" id="cnfpassword_validation_h" value="0">
                        </div>
                      </div>
					  <div class="form-group">
						<?php
							$data = array(
								'class' => 'control-label col-md-3 col-sm-3 col-xs-12'.$label_class,
							);
							echo form_label(lang('mobile'),'mobile',$data);
						?>
                        <div class="col-md-6 col-sm-6 col-xs-12 <?php echo $input_class; ?>">
						  <?php
							$data = array(
								'type' => 'text',
								'name' => 'mobile',
								'id' => 'mobile',
								'placeholder' => lang('mobile'),
								'class' => 'form-control col-md-7 col-xs-12',
								//'max' => 255,
								//'pattern' => '[0-9]{8,}',
								//'title' => 'must be mobile',
								'value' => set_value('mobile')
							);
							echo form_input($data);
						?>
                        </div>
                      </div>
					  <div class="form-group">
						<?php
							$data = array(
								'class' => 'control-label col-md-3 col-sm-3 col-xs-12'.$label_class,
							);
							echo form_label(lang('address'),'address',$data);
						?>
                        <div class="col-md-6 col-sm-6 col-xs-12 <?php echo $input_class; ?>">
						  <?php
							$data = array(
								'type' => 'text',
								'name' => 'address',
								'id' => 'address',
								'placeholder' => lang('address'),
								'class' => 'form-control col-md-7 col-xs-12',
								//'max' => 255,
								'value' => set_value('address')
							);
							echo form_input($data);
						?>
                        </div>
                      </div>					  					  <?php if(in_array('LN',$this->sections)) { ?>					  					  <div class="form-group">						<?php							$data = array(								'class' => 'control-label col-md-3 col-sm-3 col-xs-12'.$label_class,							);							echo form_label(lang('lang').' <span class="required">*</span>','lang',$data);						?>                        <div class="col-md-6 col-sm-6 col-xs-12 <?php echo $input_class; ?>">						<?php							if(!empty($langs))							{								foreach($langs as $lang)								{									$ourtypes_lang[$lang->lncode] = $lang->lntitle;								}																			echo form_dropdown('lang', $ourtypes_lang, array(), 'id="lang" class="form-control" required="required"');							}							else echo lang('no_data');						?>                        </div>                      </div>					  <?php } else { ?><input type="hidden" name="lang" value="en" /><?php } ?>
                      <div class="form-group">
                        <?php
							$data = array(
								'class' => 'control-label col-md-3 col-sm-3 col-xs-12'.$label_class,
							);
							echo form_label(lang('active'),'active',$data);
						?>
                        <div class="col-md-6 col-sm-6 col-xs-12 <?php echo $input_class; ?>">
						  <?php
							$data = array(
								'name' => 'active',
								'id' => 'active',
								'checked' => 'TRUE',
								'class' => 'js-switch',
								'value' => 1
							);
							echo form_checkbox($data);
						?>
                        </div>
                      </div>
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-3 col-sm-6 col-xs-12 col-md-offset-3">
						  <?php																				
							$data = array(
								'name' => 'submit',
								'id' => 'submit',
								'class' => 'btn btn-success',																'style' => 'background-color:#2AA3D6;',
								'value' => 'true',
								'type' => 'submit',
								'disabled' => 'disabled',
								'content' => lang('save')
							);
							echo form_button($data);
						?>
                        </div>
                      </div>

                    <?php
						echo form_close();
					?>
                  </div>
                </div>
              </div>
            </div>
		  </div>
        </div>