<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Manajemen Bagian
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url();?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="<?php echo site_url('bagian');?>"> Bagian</a></li>
            <li class="active"><?php echo $title; ?></li>
        </ol>
    </section>
    <section class="content">
        <div class="box">
			<?php echo form_open($action, 'class="form-horizontal" data-parsley-validate'); ?>
			<div class="box-header with-border">
				<h4><?php echo $title; ?></h4>
			</div>
            <div class="box-body">
				<div class="col-md-6 col-centered">
					<div class="form-group">
                        <label for="bagian" class="col-sm-3 control-label">Bagian</label>
                        <div class="col-sm-9">
		                    <?php
							echo form_input(array(
							    'name' => 'bagian',
							    'id' => 'bagian',
							    'class' => 'form-control required',
							    'placeholder' => 'Bagian',
							    'maxlength' => '30',
							    'value' => $bagian['bagian']
							));
							?>
                        </div>
                    </div>
				</div>
		    </div>
            <div class="box-footer">
				<div class="col-md-offset-5">
		            <a
		            	href="<?php echo site_url('bagian'); ?>"
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
