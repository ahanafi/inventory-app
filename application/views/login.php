<!DOCTYPE html>
<html >
	<head>
		<meta charset="UTF-8">
		<title>Inventory System Application</title>
		<link rel="shortcut icon" href="<?php echo base_url('assets/img/logo.jpg')?>" />
        <link rel="stylesheet" href="<?php echo base_url('assets/plugins/parsley/parsley.css');?>">
        <link rel="stylesheet" href="<?php echo base_url('assets/login/css/style.css')?>">
	</head>
	<body background="<?php echo base_url('assets/login/img/bg.jpg')?>">
		<div id="wrap">
			<div id="regbar">
				<img src="<?php echo base_url('assets/img/logo.jpg')?>" width="40px" style="margin-right: 10px;">
				<span class="brand">PT. PZ Cussons Indonesia</span>
				<h3>
					<a href="#" id="loginform">
						<img src="<?php echo base_url('assets/login/img/login-white.png'); ?>" alt="Login" width="25">
					</a>
				</h3>
				<div class="login">
					<div class="arrow-up"></div>
					<div class="formholder">
						<div class="randompad">
							<fieldset>
								<form action="<?php echo $action;?>" method="POST" data-parsley-validate>
									<label><b>Username</b></label>
									<input type="text" name="username" required/>
									<label><b>Password</b></label>
									<input type="password" name="password" required/>
									<input type="submit" value="Login" />
								</form>
							</fieldset>
						</div>
					</div>
				</div>
			</div>
		</div>
		<img src="<?php echo base_url('assets/login/img/bg2.png')?>" id="bottom"/>
        <script src="<?php echo base_url('assets/plugins/jQuery/jQuery-2.1.4.min.js');?>"></script>
        <script src="<?php echo base_url('assets/plugins/parsley/parsley.min.js');?>"></script>
        <script src="<?php echo base_url('assets/login/js/index.js')?>"></script>
        <script>
        	$(document).ready(function(){
        		$("input").attr({
        			'required':'required',
        			'autocomplete':'off'
        		});
        	});
        </script>
	</body>
</html>
