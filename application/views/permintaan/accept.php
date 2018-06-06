<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Manajemen Permintaan
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url();?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="<?php echo site_url('pengembalian');?>"> Permintaan</a></li>
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
											'value' => $pengembalian['tanggal'],
										));
										?>
										<span class="input-group-addon">
											<span class="glyphicon glyphicon-calendar"></span>
										</span>
									</div>
				                </div>
				            </div>
							<div class="form-group">
				                <label for="pegawai" class="col-sm-3 control-label">ID Permintaan</label>
				                <div class="col-sm-9">
						            <?php
						            if($this->uri->segment(4)){
								        $data = array(
								        	site_url('permintaan/edit/' . $pengembalian['id']) => 'PILIH'
								        );
								        $data = array(
								        	site_url('permintaan/edit/' . $pengembalian['id'] . '/' . $pengembalian['peminjaman']) =>  $pengembalian['peminjaman']);
										foreach ($peminjaman as $row) {
											$data[site_url('permintaan/edit/' . $pengembalian['id'] . '/' . $row['id'])] = $row['id'];
										}
										echo form_dropdown(
											    'peminjaman', $data, site_url('permintaan/edit/' . $pengembalian['id'] . '/' . $this->uri->segment(4)), 'onChange="window.location.replace(this.options[this.selectedIndex].value)" class="autocomplete form-control required"'
										);
									} else {
										$data = array(site_url('permintaan/add') => 'PILIH');
										foreach ($peminjaman as $row) {
											$data[site_url('permintaan/add/' . $row['id'])] = $row['id'];
										}
										echo form_dropdown(
											    'peminjaman', $data, site_url('permintaan/add/' . $this->uri->segment(3)), 'onChange="window.location.replace(this.options[this.selectedIndex].value)" class="autocomplete form-control required"'
										);
									}
									?>
				                </div>
				            </div>
						</div>
					</div>
					<div class="row">
						<table class="table table-bordered table-striped">
							<thead>
				                <tr class="bg-green">
				                    <th width="5%">No</th>
				                    <th width="40%">Barang</th>
				                    <th width="40%">Base Unit of Measure</th>
				                    <th width="15%">Jumlah</th>
				                </tr>
				            </thead>
				            <tbody>
				            	<?php $number = 1; ?>
						        <?php foreach ($aset as $data) : ?>
						            <tr>
						                <td><?php echo $number++; ?></td>
						                <td><?php echo $data['aset_merk']; ?></td>
						                <td><?php echo $data['aset_type']; ?></td>
						                <td><?php echo $data['jumlah']; ?></td>
						            </tr>     
						        <?php endforeach; ?>
							</tbody>
						</table>
					</div>
				</div>
		    </div>
            <div class="box-footer">
				<div class="col-md-offset-5">
		            <a
		            	href="<?php echo site_url('pengembalian'); ?>"
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
