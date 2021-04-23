        <!-- page content -->		
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left" style="width:100%;">
                <h3 style="text-align:center;"><?php echo lang('partnerships'); ?></h3>
              </div>

              <div class="">
                <div class="col-md-3 col-sm-3 col-xs-5 <?php if($this->loginuser->dir == 'rtl') echo 'col-md-offset-9 col-sm-offset-9 col-xs-offset-7'; //else echo 'col-md-offset-2 col-sm-offset-2 col-xs-offset-1'; ?> form-group top_search" dir="<?php echo $this->loginuser->dir; ?>">
                  <div class="input-group">
					<?php if(strpos($this->loginuser->privileges, ',psadd,') !== false) { ?><button type="button" class="btn btn-primary" style="background-color:#143E66;" onclick="location.href = 'partnerships/add'"><?php echo lang('add_partnership'); ?></button><?php } ?>
                  </div>
                </div>
              </div>
            </div>

            <div class="clearfix"></div>

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
                    <!--<p class="text-muted font-13 m-b-30">
                      The Buttons extension for DataTables provides a common set of options, API methods and styling to display buttons on a page that will interact with a DataTable. The core library provides the based framework upon which plug-ins can built.
                    </p>-->
                    <?php if(!empty($partnerships)) { ?>
					<table id="datatable-buttons" class="table table-striped table-bordered">
                      <thead>
                        <tr>
						  <th><?php echo lang('title'); ?></th>
						  <th><?php echo lang('time'); ?></th>
						  <th><?php echo lang('price'); ?></th>						  
						  <th><?php echo lang('editemployee'); ?></th>
						  <th><?php echo lang('edittime'); ?></th>
						  <th><?php echo lang('active'); ?></th>
						  <?php if(strpos($this->loginuser->privileges, ',psedit,') !== false) { ?><th><?php echo lang('edit'); ?></th><?php } ?>
						  <?php if(strpos($this->loginuser->privileges, ',psdelete,') !== false) { ?><th><?php echo lang('delete'); ?></th><?php } ?>
                        </tr>
                      </thead>


                      <tbody>
					  <?php foreach($partnerships as $partnership) { ?>
                        <tr>
                          <td align="center"><?php echo $partnership->pstitle; ?></td>
						  <td align="center"><?php echo $partnership->psduration; ?></td>
						  <td align="center"><?php echo $partnership->psprice; ?></td>						  
						  <td align="center"><?php echo $employees[$partnership->psuid]; ?></td>
						  <td align="center"><?php if($partnership->pstime != '') { echo ArabicTools::arabicDate($system->calendar.' Y-m-d', $partnership->pstime).' , '.date('h:i:s', $partnership->pstime); if(date('H', $partnership->pstime) < 12) echo ' '.lang('am'); else echo ' '.lang('pm'); } ?></td>
						  <td align="center"><input type="checkbox" <?php if($partnership->psactive == 1) echo 'checked'; ?> disabled></td>
						  <?php if(strpos($this->loginuser->privileges, ',psedit,') !== false) { ?><td align="center"><a href="<?php echo base_url(); ?>partnerships/edit/<?php echo $partnership->psid; ?>" style="color: green;"><i style="color:#2AA3D6;" class="glyphicon glyphicon-edit"></i></a></td><?php } ?>
						  <?php if(strpos($this->loginuser->privileges, ',psdelete,') !== false) { ?><td align="center">
							<i id="<?php echo $partnership->psid; ?>" style="color:red;" class="del glyphicon glyphicon-remove-circle"></i>
							<div id="del-<?php echo $partnership->psid; ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
								<div class="modal-dialog modal-sm">
									<div class="modal-content">
										<div class="modal-header">
											<?php echo lang('deletemodal'); ?>
											<br>
        								</div>
										<div class="modal-body">
										<center>
											<button class="btn btn-danger" id="action_buttom" onclick="location.href = 'partnerships/del/<?php echo $partnership->psid; ?>'" data-dismiss="modal"><?php echo lang('yes'); ?></button>
											<button class="btn btn-success" data-dismiss="modal" aria-hidden="true"><?php echo lang('no'); ?></button>
										</center>
										</div>
									</div>
								</div>
							</div>
						</td><?php } ?>
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