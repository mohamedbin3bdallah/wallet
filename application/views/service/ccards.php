        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left" style="width:100%;">
                <h3 style="text-align:center;"><?php echo lang($title); ?></h3>
              </div>

              <div class="<?php if($this->loginuser->ulang != 'ar') echo 'title_right'; ?>">
                <div class="col-md-3 col-sm-3 col-xs-5 <?php if($this->loginuser->dir == 'rtl') echo 'col-md-offset-9 col-sm-offset-9 col-xs-offset-7'; else echo 'col-md-offset-2 col-sm-offset-2 col-xs-offset-1'; ?> form-group top_search">
                  <div class="input-group">
					<?php if(strpos($this->loginuser->privileges, ',ccadd,') !== false) { ?><button type="button" class="btn btn-primary" onclick="location.href = 'ccards/add'"><?php echo lang('add_creditcard'); ?></button><?php } ?>
                  </div>
                </div>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row"  dir="<?php echo $this->loginuser->dir; ?>">

              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <!--<h2>Button Example <small>Users</small></h2>-->
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
                    <!--<p class="text-muted font-13 m-b-30">
                      The Buttons extension for DataTables provides a common set of options, API methods and styling to display buttons on a page that will interact with a DataTable. The core library provides the based framework upon which plug-ins can built.
                    </p>-->
                    <?php if(!empty($ccards)) { ?>
					<table id="datatable-buttons" class="table table-striped table-bordered">
                      <thead>
                        <tr>						  						  <th><?php echo lang('number'); ?></th>						  						  <th><?php echo lang('expire'); ?></th>
						  <th><?php echo lang('cvv'); ?></th>						 						 						  <th><?php echo lang('sim'); ?></th>
						  <th><?php echo lang('wallet'); ?></th>
						  <th><?php echo lang('editemployee'); ?></th>
						  <th><?php echo lang('edittime'); ?></th>
						  <th><?php echo lang('active'); ?></th>
						  <?php if(strpos($this->loginuser->privileges, ',ccedit,') !== false) { ?><th><?php echo lang('edit'); ?></th><?php } ?>
						  <?php if(strpos($this->loginuser->privileges, ',ccdelete,') !== false) { ?><th><?php echo lang('delete'); ?></th><?php } ?>
                        </tr>
                      </thead>


                      <tbody>
					  <?php foreach($ccards as $ccard) { ?>
                        <tr>
                          <td><?php echo $ccard->ccnumber; ?></td>						  						  <td><?php echo $ccard->ccexpire; ?></td>						  						  						  <td><?php echo $ccard->cccvv; ?></td>
						  <td><?php echo $ccard->ccsim; ?></td>						  						  						  <td><?php echo $ccard->ccwallet; ?></td>
						  <td><?php echo $employees[$ccard->ccuid]; ?></td>
						  <td><?php if($ccard->cctime != '') { echo ArabicTools::arabicDate($system->calendar.' Y-m-d', $ccard->cctime).' , '.date('h:i:s', $ccard->cctime); if(date('H', $ccard->cctime) < 12) echo ' '.lang('am'); else echo ' '.lang('pm'); } ?></td>
						  <td><input type="checkbox" <?php if($ccard->ccactive == 1) echo 'checked'; ?> disabled></td>
						  <?php if(strpos($this->loginuser->privileges, ',ccedit,') !== false) { ?><td><?php if($ccard->ccnumber != '') { ?><a href="<?php echo base_url(); ?>service/ccards/edit/<?php echo $ccard->ccid; ?>" style="color: green;"><i style="color:green;" class="glyphicon glyphicon-edit"></i></a><?php } ?></td><?php } ?>
						  <?php if(strpos($this->loginuser->privileges, ',ccdelete,') !== false) { ?><td>
							<i id="<?php echo $ccard->ccid; ?>" style="color:red;" class="del glyphicon glyphicon-remove-circle"></i>
							<div id="del-<?php echo $ccard->ccid; ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
								<div class="modal-dialog modal-sm">
									<div class="modal-content">
										<div class="modal-header">
											<?php echo lang('deletemodal'); ?>
											<br>
        								</div>
										<div class="modal-body">
										<center>
											<button class="btn btn-danger" id="action_buttom" onclick="location.href = 'service/ccards/del/<?php echo $ccard->ccid; ?>'" data-dismiss="modal"><?php echo lang('yes'); ?></button>
											<button class="btn btn-success" data-dismiss="modal" aria-hidden="true"><?php echo lang('no'); ?></button>
										</center>
										</div>
									</div>
								</div>
							</div>
							<?php } ?>
						</td>
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