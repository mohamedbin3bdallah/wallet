<!--<style>
.modal-backdrop.in
{
	background-color: #fff;
	opacity: 0.2;
}
</style>--><link href="<?php echo base_url(); ?>css/custom.<?php echo $this->loginuser->dir; ?>.css" rel="stylesheet"><?php if(isset($docs_title) && !empty($docs_title)) { ?>
<script type="text/javascript">	<?php for($cc=0;$cc<count($docs_title);$cc++) { ?>	$(document).ready(function(){			$('<?php echo $docs_title[$cc]['selector']; ?>').attr('data-toggle', 'tooltip');			$('<?php echo $docs_title[$cc]['selector']; ?>').attr('data-placement', 'top');			$('<?php echo $docs_title[$cc]['selector']; ?>').attr('title', '<?php echo lang($docs_title[$cc]['title']); ?>');	});	<?php } ?>		$(function () {		$('[data-toggle="tooltip"]').tooltip()	})</script><?php } ?>
<script type="text/javascript">
	$(document).ready(function(){
		$('#submit_form').submit(function() {
			$('#loader').modal({show: true, backdrop: 'static', keyboard: false});
			//e.preventDefault();
		});
	});
</script>

<script type="text/javascript">
	$(document).ready(function(){
		$('#action_buttom').click(function() {
			$('#loader').modal({show: true, backdrop: 'static', keyboard: false});
		});
	});
</script>

<script>
<?php 
//$pageWasRefreshed = isset($_SERVER['HTTP_CACHE_CONTROL']) && $_SERVER['HTTP_CACHE_CONTROL'] === 'max-age=0';
if(isset($_SESSION['message'],$_SESSION['time'],$_SERVER['REQUEST_TIME']) && ($_SERVER['REQUEST_TIME'] < ($_SESSION['time']+3))) {
?>
$(document).ready(function(){
	$("#<?php echo $_SESSION['message']; ?>").modal('show');
	setTimeout(function() { $("#<?php echo $_SESSION['message']; ?>").modal('hide'); }, 3000);
});
<?php  /*unset($_SESSION['message']);*/ } ?>
</script>

<div id="loader" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="padding-top: 55px;">
	<img src="<?php echo base_url(); ?>imgs/loader.gif" id="gif" style="display: block; margin: 0 auto; width: 100px;">
</div>

<div id="success" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-sm">
		<div class="modal-content"  style="background-color: green;">
			<div class="modal-body">
				<center style="color: #fff; font-size:25px;">
					<?php echo lang('success_saved'); ?>
				</center>
			</div>
		</div>
	</div>
</div>
<div id="itempayment" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">	<div class="modal-dialog modal-sm">		<div class="modal-content"  style="background-color: red;">			<div class="modal-body">				<center style="color: #fff; font-size:25px;">					<?php echo lang('please_renew_your_partnership_less_10_days'); ?>				</center>			</div>		</div>	</div></div>
<div id="cantdelete" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-sm">
		<div class="modal-content"  style="background-color: red;">
			<div class="modal-body">
				<center style="color: #fff; font-size:25px;">
					<?php echo lang('cant_delete'); ?>
				</center>
			</div>
		</div>
	</div>
</div>

<div id="somthingwrong" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-sm">
		<div class="modal-content"  style="background-color: red;">
			<div class="modal-body">
				<center style="color: #fff; font-size:25px;">
					<?php echo lang('somthing_wrong'); ?>
				</center>
			</div>
		</div>
	</div>
</div>

<div id="inputnotcorrect" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-sm">
		<div class="modal-content"  style="background-color: orange;">
			<div class="modal-body">
				<center style="color: #fff; font-size:25px;">
					<?php echo lang('input_not_correct'); ?>
				</center>
			</div>
		</div>
	</div>
</div>

<div id="invalidinput" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-sm">
		<div class="modal-content"  style="background-color: orange;">
			<div class="modal-body">
				<center style="color: #fff; font-size:25px;">
					<?php echo lang('invalid_input'); ?>
				</center>
			</div>
		</div>
	</div>
</div><div id="numberexist" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">	<div class="modal-dialog modal-sm">		<div class="modal-content"  style="background-color: orange;">			<div class="modal-body">				<center style="color: #fff; font-size:25px;">					<?php echo lang('number_exist'); ?>				</center>			</div>		</div>	</div></div>

<div id="usernameexist" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-sm">
		<div class="modal-content"  style="background-color: orange;">
			<div class="modal-body">
				<center style="color: #fff; font-size:25px;">
					<?php echo lang('username_exist'); ?>
				</center>
			</div>
		</div>
	</div>
</div>

<div id="nameexist" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-sm">
		<div class="modal-content"  style="background-color: orange;">
			<div class="modal-body">
				<center style="color: #fff; font-size:25px;">
					<?php echo lang('name_exist'); ?>
				</center>
			</div>
		</div>
	</div>
</div>

<div id="emailexist" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-sm">
		<div class="modal-content"  style="background-color: orange;">
			<div class="modal-body">
				<center style="color: #fff; font-size:25px;">
					<?php echo lang('email_exist'); ?>
				</center>
			</div>
		</div>
	</div>
</div>

<div id="emailnotexist" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-sm">
		<div class="modal-content"  style="background-color: orange;">
			<div class="modal-body">
				<center style="color: #fff; font-size:25px;">
					<?php echo lang('email_not_exist'); ?>
				</center>
			</div>
		</div>
	</div>
</div>

<div id="codeexist" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-sm">
		<div class="modal-content"  style="background-color: orange;">
			<div class="modal-body">
				<center style="color: #fff; font-size:25px;">
					<?php echo lang('code_exist'); ?>
				</center>
			</div>
		</div>
	</div>
</div>