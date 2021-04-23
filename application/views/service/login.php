        <!DOCTYPE html><html lang="en">  <head>    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">    <!-- Meta, title, CSS, favicons, etc. -->    <meta charset="utf-8">    <meta http-equiv="X-UA-Compatible" content="IE=edge">    <meta name="viewport" content="width=device-width, initial-scale=1">    <title><?php if(isset($system->website)) echo $system->website; ?></title>	<link rel="shortcut icon" href="<?php if(isset($system->logo) && $system->logo != '') echo base_url().$system->logo; ?>">    <!-- Bootstrap -->    <link href="<?php echo base_url(); ?>gentelella-master/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">    <!-- Font Awesome -->    <link href="<?php echo base_url(); ?>gentelella-master/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">    <!-- NProgress -->    <link href="<?php echo base_url(); ?>gentelella-master/vendors/nprogress/nprogress.css" rel="stylesheet">    <!-- Animate.css -->    <link href="https://colorlib.com/polygon/gentelella/css/animate.min.css" rel="stylesheet">    <!-- Custom Theme Style -->    <link href="<?php echo base_url(); ?>gentelella-master/build/css/custom.ltr.min.css" rel="stylesheet">    <!-- Custom Theme Style -->  </head>  <body class="login">    <div>      <a class="hiddenanchor" id="signup"></a>      <a class="hiddenanchor" id="signin"></a>      <div class="login_wrapper">	  		<div class="row" dir="<?php if($system->langs == 'ar') echo 'rtl'; ?>">
			<center><img class="img-responsive" src="<?php if(isset($system->logo) && $system->logo != '' && file_exists($system->logo)) echo base_url().$system->logo; ?>" /></center>
		</div>
		<div class="row" dir="<?php if($system->langs == 'ar') echo 'rtl'; ?>">
          <section class="login_content">
		  <?php
				echo '<div style="color:red; font-size:25px;">'.lang($message).'</div>';
				echo validation_errors();
				echo form_open('service/login');
			?>
              <h1><?php echo lang('login_form'); ?></h1>
              <div class="col-md-12 col-sm-12 col-xs-12">
                <?php										
					$data = array(
						'name' => 'username',
						'id' => 'username',
						'placeholder' => lang('username'),
						'class' => 'form-control',
						'max' => 50,
						'pattern' => '[A-Za-z]{5,}',
						'title' => lang('more_than_5_chars'),
						'required' => 'required',
						'value' => set_value('username')
					);
					echo form_input($data);
				?>
              </div>
              <div class="col-md-12 col-sm-12 col-xs-12">
                <?php																				
					$data = array(
						'name' => 'password',
						'id' => 'password',
						'placeholder' => lang('password'),
						'class' => 'form-control',
						'max' => 50,
						'title' => lang('required'),
						'required' => 'required',
						'value' => set_value('password')
					);
					echo form_password($data);
				?>
              </div>
              <div class="col-md-12 col-sm-12 col-xs-12">
				<!--<div class="col-md-6 col-sm-6 col-xs-6">
					<a class="reset_pass" href="#"><?php echo lang('lostpassword'); ?></a>
				</div>-->
				<div class="col-md-12 col-sm-12 col-xs-12">
                 <?php																				
					$data = array(
						'name' => 'login',
						'id' => 'login',
						'class' => 'btn btn-info',
						'value' => 'true',
						'type' => 'submit',
						'content' => lang('login')
					);
					echo form_button($data);
				?>
				</div>
              </div>
              <div class="clearfix"></div>
            <?php								
				echo form_close();
			?>
          </section>
        </div>				</div>    </div>  </body></html>