<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Manajemen Pengguna
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url();?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="<?php echo site_url('pengguna');?>"> Pengguna</a></li>
            <li class="active"><?php echo $title; ?></li>
        </ol>
    </section>
    <section class="content">
        <div class="box">
			<?php echo form_open_multipart($action, 'class="form-horizontal" data-parsley-validate'); ?>
			<div class="box-header with-border">
				<h4><?php echo $title; ?></h4>
			</div>
            <div class="box-body">
				<div class="col-md-2 col-md-offset-1">
					<div class="form-group" style="margin:20px 10px 0 0">
						<?php
							if(!$pengguna['foto']){
								$pengguna['foto'] = '../profile.gif';
							}
						?>
						<img id="blah" src="<?php echo base_url('/assets/img/upload/' .$pengguna['foto']);?>" style="width: 100%;"/>
						<div class="input-group">
							<?php
							echo form_input(array(
								'name' => 'foto_label',
								'id' => 'foto_label',
								'class' => 'form-control input-sm',
								'placeholder' => 'Foto',
			                    'readOnly' => TRUE,
							));
							?>
							<span class="input-group-btn">
							    <span class="btn btn-flat btn-primary btn-file btn-sm">
							        <?php
									echo form_upload(array(
										'name' => 'foto',
										'id' => 'foto',
										'accept' => '.jpg,.png,.gif,',
									));
									?>Browse
							    </span>
							</span>
						</div>Filesize Max 2MB
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
                        <label for="usernam" class="col-sm-3 control-label">Username</label>
                        <div class="col-sm-9">
		                    <?php
							echo form_input(array(
							    'name' => 'username',
							    'id' => 'username',
							    'class' => 'form-control required',
							    'placeholder' => 'Username',
							    'maxlength' => '30',
							    'value' => $pengguna['username']
							));
							?>
                        </div>
                    </div>
					<?php if(!$this->uri->segment(3)):?>
					<div class="form-group">
                        <label for="password" class="col-sm-3 control-label">Password</label>
                        <div class="col-sm-9">
		                    <?php
							echo form_password(array(
							    'name' => 'password',
							    'id' => 'password',
							    'class' => 'form-control required',
							    'placeholder' => 'Password',
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
							    'class' => 'form-control required',
							    'placeholder' => 'Ulangi Password',
							    'maxlength' => '30',
							    'data-parsley-equalto' => '#password',
							));
							?>
                        </div>
                    </div>
				    <?php endif;?>
					<div class="form-group">
                        <label for="nama" class="col-sm-3 control-label">Nama</label>
                        <div class="col-sm-9">
							<?php
							echo form_input(array(
							    'name' => 'nama',
							    'id' => 'nama',
							    'class' => 'form-control required',
							    'placeholder' => 'Nama',
							    'maxlength' => '50',
							    'value' => $pengguna['nama']
							));
							?>
                        </div>
                    </div>
					<div class="form-group">
                        <label for="jenis_kelamin" class="col-sm-3 control-label">Jenis Kelamin</label>
                        <div class="col-sm-9">
                        	<?php
						    $options = array(
						        'Pria' => 'Pria',
						        'Wanita' => 'Wanita',
						    );
						    echo form_dropdown('jenis_kelamin', $options, $pengguna['jenis_kelamin'], 'class="autocomplete form-control required"');
						    ?>
                        </div>
                    </div>
					<div class="form-group">
                        <label for="telepon" class="col-sm-3 control-label">No Telepon</label>
                        <div class="col-sm-9">
							<?php
							echo form_input(array(
							    'name' => 'telepon',
							    'id' => 'telepon',
							    'class' => 'form-control required',
							    'placeholder' => 'No Telepon',
							    'maxlength' => '15',
								'onkeypress' => 'return (event.charCode >= 48 && event.charCode <= 57 || event.charCode == 45 || event.charCode == 13)',
							    'value' => $pengguna['telepon']
							));
							?>
                        </div>
                    </div>
					<div class="form-group">
                        <label for="email" class="col-sm-3 control-label">Email</label>
                        <div class="col-sm-9">
                            <?php
							echo form_input(array(
							    'name' => 'email',
							    'id' => 'email',
							    'class' => 'form-control required',
							    'placeholder' => 'Email',
							    'maxlength' => '50',
							    'type'=>'email',
							    'value' => $pengguna['email']
							));
							?>
                        </div>
                    </div>
					<div class="form-group">
                        <label for="level" class="col-sm-3 control-label">Level</label>
                        <div class="col-sm-9">
                            <?php
						    $options = array(
						    	''	=> '-- Pilih Hak Akses Pengguna --',
						        'admin' => 'Admin',
						        'gudang'=> 'Gudang',
						        'produksi'=> 'Produksi',
						        'manager'=> 'General Manager',
						        'purchasing' => 'Purchasing'
						    );
						    echo form_dropdown('level', $options, $pengguna['level'], 'class="autocomplete form-control required"');
						    ?>
                        </div>
                    </div>
				</div>
		    </div>
            <div class="box-footer">
				<div class="col-md-offset-5">
		            <a
		            	href="<?php echo site_url('pengguna'); ?>"
		            	class="btn btn-flat btn-default"
		            	data-toggle="tooltip"
						data-placement="top"
						title="Kembali"
	            	>
		                <i class="glyphicon glyphicon-chevron-left"></i> Kembali
		            </a> 
		            <button
		            	type="submit"
		            	class="btn btn-flat btn-primary"
		            	data-toggle="tooltip"
						data-placement="top"
						title="Simpan Data"
						onclick="return checkSize(2097152)"
	            	>
		                <i class="glyphicon glyphicon-floppy-save"></i> Simpan 
		            </button>                  
		        </div>
		    </div>
			<?php echo form_close(); ?>
        </div>
    </section>
</div>
