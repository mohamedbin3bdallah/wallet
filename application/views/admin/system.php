		<div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left" style="width:100%;">
                <h3 style="text-align:center;"><?php echo lang('system'); ?></h3>
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
                    <ul class="nav navbar-right panel_toolbox">
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
						echo form_open_multipart('systemy/edit', $attributes);
					?>
                    <!--<form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">-->
					<?php
						if($this->loginuser->dir == 'rtl') { $label_class = ' col-md-push-6 col-sm-push-6'; $input_class = ' col-md-pull-1 ol-sm-pull-2'; }
						else { $label_class = ''; $input_class = ''; }
					?>
					
						<?php
							/*$data = array(
								'type' => 'hidden',
								'name' => 'currency',
								'id' => 'currency',
								'placeholder' => lang('currency'),
								'class' => 'form-control col-md-7 col-xs-12',
								//'max' => 9,
								//'required' => 'required',
								'value' => $system->currency
							);
							echo form_input($data);*/
						?>
						<?php
							$data = array(
								'type' => 'hidden',
								'name' => 'payemail',
								'id' => 'payemail',
								'placeholder' => lang('payemail'),
								'class' => 'form-control col-md-7 col-xs-12',
								//'max' => 255,
								//'required' => 'required',
								'value' => $system->payemail
							);
							echo form_input($data);
						?>
						<?php
							/*$data = array(
								'type' => 'hidden',
								'name' => 'langs[]',
								'id' => 'langs',
								'placeholder' => lang('langs'),
								'class' => 'form-control col-md-7 col-xs-12',
								//'max' => 9,
								//'required' => 'required',
								'value' => $this->loginuser->ulang
							);
							echo form_input($data);*/
						?>
						
                      <div class="form-group">
						<?php
							$data = array(
								'class' => 'control-label col-md-3 col-sm-3 col-xs-12'.$label_class,
							);
							echo form_label(lang('website').' <span class="required">*</span>','website',$data);
						?>
                        <div class="col-md-6 col-sm-6 col-xs-12 <?php echo $input_class; ?>">
						  <?php
							$data = array(
								'type' => 'text',
								'name' => 'website',
								'id' => 'website',
								'placeholder' => lang('website'),
								'class' => 'form-control col-md-7 col-xs-12',
								//'max' => 255,
								//'required' => 'required',
								'value' => $system->website
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
							echo form_label(lang('payemail'),'payemail',$data);
						?>
                        <div class="col-md-6 col-sm-6 col-xs-12 <?php echo $input_class; ?>">
						  <?php
							$data = array(
								'type' => 'email',
								'name' => 'payemail',
								'id' => 'payemail',
								'placeholder' => lang('payemail'),
								'class' => 'form-control col-md-7 col-xs-12',
								//'max' => 255,
								//'required' => 'required',
								'value' => $system->payemail
							);
							echo form_input($data);
						?>
                        </div>
                      </div>
					  <!--<div class="form-group">
						<?php
							/*$data = array(
								'class' => 'control-label col-md-3 col-sm-3 col-xs-12'.$label_class,
							);
							echo form_label(lang('currency').' <span class="required">*</span>','currency',$data);*/
						?>
                        <div class="col-md-6 col-sm-6 col-xs-12 <?php //echo $input_class; ?>">
						  <?php
							/*$data = array(
								'type' => 'text',
								'name' => 'currency',
								'id' => 'currency',
								'placeholder' => lang('currency'),
								'class' => 'form-control col-md-7 col-xs-12',
								//'max' => 9,
								//'required' => 'required',																'readonly' => 'TRUE',
								'value' => $system->currency
							);
							echo form_input($data);*/
						?>
                        </div>
                      </div>-->
					  <div class="form-group">
						<?php
							$data = array(
								'class' => 'control-label col-md-3 col-sm-3 col-xs-12'.$label_class,
							);
							echo form_label(lang('calendar').' <span class="required">*</span>','calendar',$data);
						?>
                        <div class="col-md-6 col-sm-6 col-xs-12 <?php echo $input_class; ?>">
						<?php										
							echo form_dropdown('calendar', array('ar'=>lang('gregorian'),'hj'=>lang('hejry')), array('calendar'=>$system->calendar), 'id="calendar" class="form-control"');
						?>
                        </div>
                      </div>
					  <!--<div class="form-group">
						<?php
							/*$data = array(
								'class' => 'control-label col-md-3 col-sm-3 col-xs-12'.$label_class,
							);
							echo form_label(lang('langs').' <span class="required">*</span>','langs',$data);*/
						?>
                        <div class="col-md-6 col-sm-6 col-xs-12 <?php //echo $input_class; ?>">
						<?php
								/*$ourtypes = array();
								$ourtypes['ar'] = lang('ar');
								$ourtypes['en'] = lang('en');
								echo form_dropdown('langs', $ourtypes, set_value('langs', explode(',',$system->langs)), 'class="form-control"');*/
						?>
                        </div>
                      </div>-->
					  <div class="form-group">
						<?php
							$data = array(
								'class' => 'control-label col-md-3 col-sm-3 col-xs-12'.$label_class,
							);
							echo form_label(' ','',$data);
						?>
                        <div class="col-md-6 col-sm-6 col-xs-12 <?php echo $input_class; ?>">
						  <?php
							if(isset($system->logo) && $system->logo != '')
							{ 
								?><img src="<?php echo base_url().$system->logo; ?>" class="img-responsive" style="max-width:150px;max-height:150px;"/><?php
								$data = array(
									'oldlogo'  => $system->logo
								);
								echo form_hidden($data);
							}
						?>
                        </div>
                      </div>
					  <div class="form-group">
						<?php
							$data = array(
								'class' => 'control-label col-md-3 col-sm-3 col-xs-12'.$label_class,
							);
							echo form_label(lang('logo'),'file',$data);
						?>
                        <div class="col-md-6 col-sm-6 col-xs-12 <?php echo $input_class; ?>">
						  <?php
							$data = array(
								'type' => 'file',
								'name' => 'file',
								'id' => 'file',
								'class' => 'form-control col-md-7 col-xs-12',
							);
							echo form_upload($data);
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
								'class' => 'btn btn-success',
								'value' => 'true',
								'type' => 'submit',
								'content' => lang('edit')
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