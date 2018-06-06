<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Manajemen Return Barang
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url();?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="<?php echo site_url('return');?>"> Return Barang</a></li>
            <li class="active"><?php echo $title; ?></li>
        </ol>
    </section>
    <section class="content">
    	<?php echo form_open($action, 'class="form-horizontal" data-parsley-validate'); ?>
        <div class="box">
			<div class="box-header with-border">
				<h4><?php echo $title; ?></h4>
			</div>
            <div class="box-body">
				<div class="col-md-12">
					<div class="row">
						<div class="col-md-6 col-centered">
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
											'value' => $return['tanggal'],
										));
										?>
										<span class="input-group-addon">
											<span class="glyphicon glyphicon-calendar"></span>
										</span>
									</div>
				                </div>
				            </div>
							<div class="form-group">
				                <label for="pegawai" class="col-sm-3 control-label">Pilih Aset</label>
				                <div class="col-sm-9">
						            <?php
						            if($this->uri->segment(4)){
								        $data = array(site_url('return/edit/' . $return['id']) => 'PILIH');
								        $data = array(site_url('return/edit/' . $return['id'] . '/' . $return['aset']) =>  $return['id']);
										foreach ($aset_baru as $row) {
											$data[site_url('return/edit/' . $return['id'] . '/' . $row['id'])] = $row['material_desc'];
										}

										echo form_dropdown(
											    'aset', $data, site_url('return/edit/' . $return['id'] . '/' . $this->uri->segment(4)), 'onChange="window.location.replace(this.options[this.selectedIndex].value)" class="autocomplete form-control required"'
										);
									} else {
										$data = array(site_url('return/add') => 'PILIH');
										foreach ($aset_baru as $row) {
											$data[site_url('return/add/' . $row['id'])] = $row['material_desc'];
										}
										echo form_dropdown(
											    'aset', $data, site_url('return/add/' . $this->uri->segment(3)), 'onChange="window.location.replace(this.options[this.selectedIndex].value)" class="autocomplete form-control required"'
										);
									}
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
								        'placeholder' => 'Jumlah barang yang direturn',
								        'value'	=> $return['jumlah']
								    ));
								    ?>
				                </div>
				            </div>
				            <div class="form-group">
				            	<label for="keterangan" class="col-sm-3 control-label">Keterangan</label>
				            	<div class="col-sm-9">
				            		<textarea name="keterangan" id="keterangan" cols="3" rows="3" class="form-control" placeholder="Keterangan" style="resize: none;"><?php echo $return['keterangan']; ?></textarea>
				            	</div>
				            </div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-10 col-md-offset-1">
							<table class="table table-bordered table-striped">
								<thead>
					                <tr class="bg-green">
					                    <th width="5%">No</th>
					                    <th width="10%">ID Aset</th>
					                    <th width="35%">Nama Barang</th>
					                    <th width="15%">Jumlah Stock</th>
					                </tr>
					            </thead>
					            <tbody>
					            	<?php $number = 1; ?>
							        <?php foreach ($aset as $data) : ?>
							            <tr>
							                <td><?php echo $number++; ?></td>
							                <td><?php echo $data['id']; ?></td>
							                <td><?php echo $data['material_desc']; ?></td>
							                <td class="text-center"><?php echo $data['stock']; ?></td>
							            </tr>     
							        <?php endforeach; ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
		    </div>
            <div class="box-footer">
				<div class="col-md-offset-5">
		            <a
		            	href="<?php echo site_url('return'); ?>"
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
	            	>
		                <i class="glyphicon glyphicon-floppy-save"></i> Simpan 
		            </button>
		        </div>
		    </div>
        </div>
        <?php echo form_close(); ?>
    </section>
</div>
