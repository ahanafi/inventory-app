<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Manajemen Pegawai
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url();?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="<?php echo site_url('pegawai');?>"> Pegawai</a></li>
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
							if(!$pegawai['foto']){
								$pegawai['foto'] = '../profile.gif';
							}
						?>
						<img id="blah" src="<?php echo base_url('/assets/img/upload/' .$pegawai['foto']);?>" style="width: 100%;"/>
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
                        <label for="telepon" class="col-sm-3 control-label">Nama</label>
                        <div class="col-sm-9">
							<?php
							echo form_input(array(
							    'name' => 'nama',
							    'id' => 'nama',
							    'class' => 'form-control',
							    'placeholder' => 'Nama',
							    'maxlength' => '50',
							    'value' => $pegawai['nama']
							));
							?>
                        </div>
                    </div>
					<div class="form-group">
                        <label for="bagian" class="col-sm-3 control-label">Bagian</label>
                        <div class="col-sm-9">
		                    <?php
		                    $data = array();
					        foreach ($bagian as $row) {
					            $data[$row['id']] = $row['bagian'];
					        }
					        echo form_dropdown(
					                'bagian', $data, $pegawai['bagian'], 'class="autocomplete form-control required"'
					        );
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
							    'value' => $pegawai['email']
							));
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
							    'value' => $pegawai['telepon']
							));
							?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="telepon" class="col-sm-3 control-label">Alamat</label>
                        <div class="col-sm-9">
							<?php
						    echo form_textarea(array(
						        'name' => 'alamat',
						        'id' => 'alamat',
						        'class' => 'form-control',
						        'style' => 'resize: none',
						        'placeholder' => 'Alamat',
						        'rows' => '5',
						        'cols' => '10',
						        'value' => $pegawai['alamat']
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
						    echo form_dropdown('jenis_kelamin', $options, $pegawai['jenis_kelamin'], 'class="autocomplete form-control required"');
						    ?>
                        </div>
                    </div>
				</div>
		    </div>
            <div class="box-footer">
				<div class="col-md-offset-5">
		            <a
		            	href="<?php echo site_url('pegawai'); ?>"
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
