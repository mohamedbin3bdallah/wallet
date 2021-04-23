        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left" style="width:100%;">
                <h3 style="text-align:center;"><?php echo lang($title); ?></h3>
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
                    <?php if(!empty($purchases)) { ?>
					<table id="datatable-buttons" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th><?php echo lang('number'); ?></th>
						  <th><?php echo lang('user'); ?></th>
						  <th><?php echo lang('price'); ?></th>
                          <th><?php echo lang('time'); ?></th>						  						  						  <!--<th></th>-->
                        </tr>
                      </thead>


                      <tbody>
					  <?php foreach($purchases as $purchase) { ?>
                        <tr>
                          <td align="center"><?php echo $purchase['prid']; ?></td>
						  <td align="center"><?php if($purchase['preid'] != '' && isset($employees[$purchase['preid']])) echo $employees[$purchase['preid']]; ?></td>
                          <td align="center"><?php echo $purchase['prprice']; ?></td>						  						  <td align="center"><?php if($purchase['prdate'] != '') { echo ArabicTools::arabicDate($system->calendar.' Y-m-d', $purchase['prdate']).' , '.date('h:i:s', $purchase['prdate']); if(date('H', $purchase['prdate']) < 12) echo ' '.lang('am'); else echo ' '.lang('pm'); } ?></td>						  						  						  <!--<td align="center">						  <?php //if(isset($purchase['details']) && !empty($purchase['details'])) { ?>						  <a class="" href="#" data-toggle="modal" data-target="#open-<?php //echo $purchase['prid']; ?>"><?php //echo lang('details'); ?></a>						   <div id="open-<?php //echo $purchase['prid']; ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">								<div class="modal-dialog modal-lg">									<div class="modal-content" style="background-color:#2AA3D6;">										<div class="modal-header">											<button type="button" class="close" data-dismiss="modal">&times;</button>											<br>											<h3 style="color:#fff;"><?php //echo lang('offers'); ?></h3>        								</div>										<div class="modal-body">											<table id="datatable-buttons" class="table table-striped table-bordered"  dir="<?php //echo $this->loginuser->dir; ?>">												<?php //if(!empty($purchase['details'])) { ?>												<thead>													<tr style="background-color:#143E66; color:#fff;">														<td><?php //echo lang('offer'); ?></td>														<td><?php //echo lang('price'); ?></td>													</tr>												</thead>												<?php //} ?>												<tbody>												<?php //foreach($purchase['details'] as $detail) { ?>													<tr>														<td align="center"><?php //echo $detail['oftitle']; ?></td>														<td align="center"><?php //echo $detail['pdprice']; ?></td>													</tr>												<?php //} ?>												</tbody>											</table>										</div>									</div>								</div>							</div>						  <?php //} ?>						  </td>-->
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