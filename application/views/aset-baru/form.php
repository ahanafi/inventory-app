<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Manajemen Aset
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url();?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="<?php echo site_url('aset-baru');?>"> Aset</a></li>
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
							if(!$aset_baru['picture']){
								$aset_baru['picture'] = '../box.png';
							}
						?>
						<img id="blah" src="<?php echo base_url('/assets/img/upload/' .$aset_baru['picture']);?>" style="width: 100%;"/>
						<div class="input-group">
							<?php
							echo form_input(array(
								'name' => 'picture',
								'id' => 'picture',
								'class' => 'form-control input-sm',
								'placeholder' => 'Picture',
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
                        <label for="kategori" class="col-sm-3 control-label">Plant</label>
                        <div class="col-sm-9">
                        	<?php
                        	echo form_input(array(
                        		'name'		=> 'plant',
                        		'id'		=> 'plant',
                        		'class'		=> 'form-control',
                        		'placeholder'=>'Plant',
                        		'required'	=> 'required',
                        		'value'		=> $aset_baru['plant']
                        	));

                        	?>
                        </div>
                    </div>
					<div class="form-group">
                        <label for="storage_location" class="col-sm-3 control-label">Storage Location</label>
                        <div class="col-sm-9">
							<?php
							echo form_input(array(
								'name' => 'storage_location',
								'id' => 'storage_location',
								'class' => 'form-control required',
								'placeholder' => 'Storage Location',
								'value' => $aset_baru['storage_location']
							));
							?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="telepon" class="col-sm-3 control-label">
                        	Desc. of Storage Loc.
                        </label>
                        <div class="col-sm-9">
							<?php
							echo form_input(array(
							    'name' => 'desc_storage',
							    'id' => 'desc_storage',
							    'class' => 'form-control',
							    'placeholder' => 'Description of Storage Location',
							    'maxlength' => '50',
							    'value' => $aset_baru['desc_storage']
							));
							?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="telepon" class="col-sm-3 control-label">Material</label>
                        <div class="col-sm-9">
							<?php
							echo form_input(array(
							    'name' => 'material',
							    'id' => 'material',
							    'class' => 'form-control',
							    'placeholder' => 'Material',
							    'value' => $aset_baru['material']
							));
							?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="telepon" class="col-sm-3 control-label">Material Description</label>
                        <div class="col-sm-9">
							<?php
						    echo form_textarea(array(
						        'name' => 'material_desc',
						        'id' => 'material_desc',
						        'class' => 'form-control',
						        'style' => 'resize: none',
						        'placeholder' => 'Material Description',
						        'rows' => '3',
						        'cols' => '10',
						        'value' => $aset_baru['material_desc']
						    ));
						    ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="telepon" class="col-sm-3 control-label">Base Unit</label>
                        <div class="col-sm-9">
							<?php
						    echo form_input(array(
						        'name' => 'base_unit',
						        'id' => 'base_unit',
						        'class' => 'form-control',
						        'placeholder' => 'Base Unit',
						        'value' => $aset_baru['base_unit']
						    ));
						    ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="rack" class="col-sm-3 control-label">Rack</label>
                        <div class="col-sm-9">
							<?php
							echo form_input(array(
							    'name' => 'rack',
							    'id' => 'rack',
							    'class' => 'form-control required',
							    'placeholder' => 'Rack',
							    'value' => $aset_baru['rack']
							));
							?>
                        </div>
                    </div>
                    <div class="form-group">
                    	<label for="base" class="col-sm-3 control-label">Base</label>
                    	<div class="col-sm-9">
                    		<?php 
                    		echo form_input(array(
                    			'name'	=> 'base',
                    			'id'	=> 'base',
                    			'class'	=> 'form-control',
                    			'placeholder' => 'Base',
                    			'value'	=> $aset_baru['base']
                    		));
                    		?>
                    	</div>
                    </div>
                    <div class="form-group">
                    	<label for="correct" class="col-sm-3 control-label">Correct</label>
                    	<div class="col-sm-9">
                    			<?php
                    				$data = array(
                    					''=> '-- Select Correct Option --',
                    					1 => 'BENAR',
                    					2 => 'SALAH',
                    				);
                    				echo form_dropdown('correct', $data, $aset_baru['correct'], "class='autocomplete form-control'");
                    			 ?>
                    	</div>
                    </div>
                    <div class="form-group">
                    	<label class="control-label col-sm-3" for="stock">Stock</label>
                    	<div class="col-sm-9">
                    		<?php
							echo form_input(array(
							    'name' => 'stock',
							    'id' => 'stock',
							    'class' => 'form-control required',
							    'placeholder' => 'Stock',
							    'maxlength' => '4',
							    'value' => $aset_baru['stock']
							));
                    		?>
                    	</div>
                    </div>
				</div>
		    </div>
            <div class="box-footer">
				<div class="col-md-offset-5">
		            <a
		            	href="<?php echo site_url('aset-baru'); ?>"
		            	class="btn btn-flat btn-default"
		            	data-toggle="tooltip"
						data-placement="top"
						title="Kembali"
	            	>
		                <i class="glyphicon glyphicon-chevron-left"></i> Kembali
		            </a> 
		            <button
		            	material="submit"
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
