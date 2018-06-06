<div class="content-wrapper">
    <section class="content-header">
        <h1>
            <?php echo $this->session->userdata('nama');?>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url();?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="<?php echo site_url('user/profile');?>"> Profile</a></li>
            <li class="active">Edit Password</li>
        </ol>
    </section>
    <section class="content">
        <div class="box">
            <?php echo form_open_multipart($action, 'class="form-horizontal" data-parsley-validate'); ?>
			<div class="box-header with-border">
				<h4><?php echo $title; ?></h4>
			</div>
            <div class="box-body">
				<div class="col-md-6">
					<div class="form-group">
						<input type="hidden" name="password_db" id="password_db" value="<?php echo $password;?>">
					</div>
					<div class="form-group">
                        <label for="password" class="col-sm-3 control-label">Password Lama</label>
                        <div class="col-sm-9">
		                    <?php
							echo form_password(array(
							    'name' => 'password_lama',
							    'id' => 'password_lama',
							    'class' => 'form-control input-sm required',
							    'placeholder' => 'Password',
							    'maxlength' => '30',
							));
							?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="password" class="col-sm-3 control-label">Password Baru</label>
                        <div class="col-sm-9">
		                    <?php
							echo form_password(array(
							    'name' => 'password',
							    'id' => 'password',
							    'class' => 'form-control input-sm required',
							    'placeholder' => 'Password Baru',
							    'maxlength' => '30',
							    'value' => $pengguna['password']
							));
							?>
                        </div>
                    </div>
					<div class="form-group">
                        <label for="password2" class="col-sm-3 control-label">Ulangi Password</label>
                        <div class="col-sm-9">
		                    <?php
							echo form_password(array(
							    'name' => 'ulangi_password',
							    'id' => 'ulangi_password',
							    'class' => 'form-control input-sm required',
							    'placeholder' => 'Ulangi Password',
							    'maxlength' => '30',
							    'data-parsley-equalto' => '#password',
							));
							?>
                        </div>
                    </div>
				</div>
		    </div>
            <div class="box-footer">
				<div class="col-md-offset-5">
		            <a
		            	href="<?php echo site_url('user/profile'); ?>"
		            	class="btn btn-default"
		            	data-toggle="tooltip"
						data-placement="top"
						title="Kembali"
	            	>
		                <i class="glyphicon glyphicon-chevron-left"></i> Kembali
		            </a> 
		            <button
		            	type="submit"
		            	class="btn btn-primary"
		            	data-toggle="tooltip"
						data-placement="top"
						title="Simpan Data"
						onclick="return checkPassword()"
	            	>
		                <i class="glyphicon glyphicon-floppy-save"></i> Simpan 
		            </button>                  
		        </div>
		    </div>
			<?php echo form_close(); ?>
        </div>
    </section>
</div>
<div class="row">
	<ol class="breadcrumb">
		<li><a href="<?php echo base_url();?>">Home</a></li>
		<li><a href="<?php echo site_url('pengguna');?>">Pengguna</a></li>
		<li class="active"><?php echo $title;?></li>
	</ol>
</div>
<script>
function checkPassword() {
	var $password1 = document.getElementById("password_db");
	var $password2 = document.getElementById("password_lama");
    if($password1.value === md5($password2.value)) {
	    return true;
    }else{
    	$('#incorrect-password').modal('show');
		return false;
    }
}
</script>
