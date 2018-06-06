<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Manajemen Purchasing
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url();?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="<?php echo site_url('purchasing');?>"> Purchasing</a></li>
            <li class="active"><?php echo $title; ?></li>
        </ol>
    </section>
    <section class="content">
        <div class="box">
			<div class="box-header with-border">
				<h4><?php echo $title; ?></h4>
			</div>
            <div class="box-body">
				<div class="col-md-12">
					<div class="row">
						<?php echo form_open($action, 'class="form-horizontal" id="form1" data-parsley-validate'); ?>
						<div class="col-md-6 col-md-offset-2">
							<div class="form-group">
				                <label for="tanggal" class="col-sm-3 control-label">Tanggal</label>
				                <div class="col-sm-9">
									<div class="input-group date" id="datepicker">
										<?php
										echo form_input(array(
											'name' => 'tanggal',
											'id' => 'tanggal',
											'class' => 'form-control required',
											'placeholder' => 'Tanggal',
								            'onkeypress' => 'return (event.charCode == 13 && event.charCode != 8)',
											'value' => $purchasing['tanggal'],
										));
										?>
										<span class="input-group-addon">
											<span class="glyphicon glyphicon-calendar"></span>
										</span>
									</div>
				                </div>
				            </div>
							<div class="form-group">
				                <label for="aset" class="col-sm-3 control-label">Barang</label>
				                <div class="col-sm-9">
						            <?php
						            $data = array();
									foreach ($aset_baru as $row) {
									    $data[$row['id']] = $row['material_desc'];
									}
									echo form_dropdown(
									        'aset', $data, FALSE, 'class="autocomplete form-control required"'
									);
									?>
				                </div>
				            </div>
				            <div class="form-group">
				                <label for="jumlah" class="col-sm-3 control-label">Jumlah</label>
				                <div class="col-sm-9">
						            <?php
								    echo form_input(array(
								        'name' => 'jumlah',
								        'id' => 'jumlah',
								        'class' => 'form-control required',
								        'onkeypress' => 'return (event.charCode >= 48 && event.charCode <= 57 || event.charCode == 13)',
								        'maxlength' => '4',
								        'placeholder' => 'Jumlah',
								        'value'	=> $purchasing['jumlah']
								    ));
								    ?>
				                </div>
				                <input type="hidden" name="status" value="0">
				            </div>
				            <div class="form-group">
				            	<label for="submit" class="col-sm-3 control-label"></label>
					            <div class="col-sm-9">
						            <a
						            	href="<?php echo site_url('purchasing'); ?>"
						            	class="btn btn-flat btn-default"
						            	data-toggle="tooltip"
										data-placement="top"
										title="Kembali"
					            	>
						                <i class="glyphicon glyphicon-chevron-left"></i> Kembali
						            </a> 
						            <button
						            	type="submit"
						            	class="btn btn-flat btn-success"
						            	data-toggle="tooltip"
										data-placement="top"
										title="Simpan Data"
										form="form1"
					            	>
						                <i class="glyphicon glyphicon-floppy-save"></i> Simpan 
						            </button>
									<br/>
									<br/>
					            </div>
				            </div>
						</div>
						<?php echo form_close();?>
					</div>
				</div>
		    </div>
        </div>
    </section>
</div>
