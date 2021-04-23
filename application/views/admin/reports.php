        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left" style="width:100%;">
                <h3 style="text-align:center;"><?php echo lang('reports'); ?></h3>
              </div>

              <div class="">
                <div class="col-md-3 col-sm-3 col-xs-5 <?php if($this->loginuser->dir == 'rtl') echo 'col-md-offset-9 col-sm-offset-9 col-xs-offset-7'; //else echo 'col-md-offset-2 col-sm-offset-2 col-xs-offset-1'; ?> form-group top_search" dir="<?php echo $this->loginuser->dir; ?>">
                  <div class="input-group">
					<!--<?php //if(strpos($this->loginuser->privileges, ',pradd,') !== false) { ?><button type="button" class="btn btn-primary" style="background-color:#143E66;" onclick="location.href = 'service/purchases/add'"><?php //echo lang('add_user'); ?></button><?php //} ?>-->
                  </div>
                </div>
              </div>
            </div>

            <div class="clearfix"></div>
			<div class="row" dir="<?php echo $this->loginuser->dir; ?>">				<div class="col-md-4 col-sm-4 col-xs-4 <?php if($this->loginuser->dir == 'ltr') echo 'col-md-push-8 col-sm-push-8 col-xs-push-8'; ?>">					<div class="text-muted font-13 m-b-30" style="margin-top:25px; text-align:center; padding:25px; background-color:#143E66; width:100%; height:auto; color:#fff; border-radius:15px;">						<?php if(isset($reports_sum)) { ?><div><?php echo lang('total_payed'); ?></div><br><div style="padding:5px; background-color:#2AA3D6; border-radius:15px;"><?php echo $reports_sum; ?></div><?php } ?>						<br>						<?php if(isset($reports_count)) { ?><div><?php echo lang('purchases_count'); ?></div><br><div style="padding:5px; background-color:#2AA3D6; border-radius:15px;"><?php echo $reports_count; ?></div><?php } ?>                    </div>				</div>								<div class="col-md-8 col-sm-8 col-xs-8 <?php if($this->loginuser->dir == 'ltr') echo 'col-md-pull-4 col-sm-pull-4 col-xs-pull-4'; ?>">                <div class="x_panel">                  <div class="x_title">                    <!--<h2>Button Example <small>Users</small></h2>-->                    <ul class="nav navbar-<?php if($this->loginuser->dir == 'rtl') echo 'left'; else echo 'right'; ?> panel_toolbox">                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>                      </li>                      <!--<li class="dropdown">                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>                        <ul class="dropdown-menu" role="menu">                          <li><a href="#">Settings 1</a>                          </li>                          <li><a href="#">Settings 2</a>                          </li>                        </ul>                      </li>-->                      <li><a class="close-link"><i class="fa fa-close"></i></a>                      </li>                    </ul>                    <div class="clearfix"></div>                  </div>                  <div class="x_content">					<?php						//echo $admessage;						//echo form_error('name');						echo validation_errors();						$attributes = array('id' => 'submit_form', /*'data-parsley-validate' => '', */'class' => 'form-horizontal form-label-left');						echo form_open('reports', $attributes);					?>                    <!--<form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">-->					<?php						if($this->loginuser->dir == 'rtl') { $label_class = ' col-md-push-6 col-sm-push-6'; $input_class = ' col-md-pull-1 ol-sm-pull-2'; }						else { $label_class = ''; $input_class = ''; }					?>                      <div class="form-group">						<?php							$data = array(								'class' => 'control-label col-md-3 col-sm-3 col-xs-12'.$label_class,							);							echo form_label(lang('from'),'from',$data);						?>                        <div class="col-md-6 col-sm-6 col-xs-12 <?php echo $input_class; ?>">						  <?php							$data = array(								'type' => 'date',								'name' => 'from',								'id' => 'from',								'placeholder' => lang('from'),								'class' => 'form-control col-md-7 col-xs-12',								//'max' => 255,								//'required' => 'required',								'value' => set_value('from')							);							echo form_input($data);						?>                        </div>                      </div>					  					  					  <div class="form-group">						<?php							$data = array(								'class' => 'control-label col-md-3 col-sm-3 col-xs-12'.$label_class,							);							echo form_label(lang('to'),'to',$data);						?>                        <div class="col-md-6 col-sm-6 col-xs-12 <?php echo $input_class; ?>">						  <?php							$data = array(								'type' => 'date',								'name' => 'to',								'id' => 'to',								'placeholder' => lang('to'),								'class' => 'form-control col-md-7 col-xs-12',								//'max' => 255,								//'required' => 'required',								'value' => set_value('to')							);							echo form_input($data);						?>                        </div>                      </div>					  <div class="form-group">						<?php							$data = array(								'class' => 'control-label col-md-3 col-sm-3 col-xs-12'.$label_class,							);							echo form_label(lang('user'),'user',$data);						?>                        <div class="col-md-6 col-sm-6 col-xs-12 <?php echo $input_class; ?>">						<?php								foreach($users as $user)								{									$ourtypes[$user->uid] = $user->uname;								}								echo form_dropdown('user', $ourtypes, array(), 'id="user" class="form-control"');						?>                        </div>                      </div>                      <div class="ln_solid"></div>                      <div class="form-group">                        <div class="col-md-3 col-sm-6 col-xs-12 col-md-offset-3">						  <?php																											$data = array(								'name' => 'submit',								'id' => 'submit',								'class' => 'btn btn-success',																'style' => 'background-color:#2AA3D6;',								'value' => 'true',								'type' => 'submit',								'content' => lang('search')							);							echo form_button($data);						?>                  </div>                </div>              </div>			</div>			</div>            </div>
            <div class="row" dir="<?php echo $this->loginuser->dir; ?>">

              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <!--<h2>Button Example <small>Users</small></h2>-->
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
                    <!--<p class="text-muted font-13 m-b-30">                    </p>-->
                    <?php if(!empty($reports)) { ?>
					<table id="datatable-buttons" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th><?php echo lang('number'); ?></th>
						  <th><?php echo lang('user'); ?></th>
						  <th><?php echo lang('price'); ?></th>
                          <th><?php echo lang('time'); ?></th>						  						  
                        </tr>
                      </thead>


                      <tbody>
					  <?php foreach($reports as $report) { ?>
                        <tr>
                          <td align="center"><?php echo $report['prid']; ?></td>
						  <td align="center"><?php if($report['preid'] != '' && isset($employees[$report['preid']])) echo $employees[$report['preid']]; ?></td>
                          <td align="center"><?php echo $report['prprice']; ?></td>						  						  <td align="center"><?php if($report['prdate'] != '') { echo ArabicTools::arabicDate($system->calendar.' Y-m-d', $report['prdate']).' , '.date('h:i:s', $report['prdate']); if(date('H', $report['prdate']) < 12) echo ' '.lang('am'); else echo ' '.lang('pm'); } ?></td>
                        </tr>
					  <?php } ?>
                      </tbody>
                    </table>
					<?php } else echo lang('no_data');?>
                  </div>
                </div>
              </div>

            </div>
          </div>
        </div>
        <!-- /page content -->