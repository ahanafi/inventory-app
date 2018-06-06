<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Manajemen Permintaan
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url();?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="<?php echo site_url('permintaan');?>"> Permintaan</a></li>
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
						<div class="col-md-6">
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
											'value' => $permintaan['tanggal'],
										));
										?>
										<span class="input-group-addon">
											<span class="glyphicon glyphicon-calendar"></span>
										</span>
									</div>
				                </div>
				            </div>
							<div class="form-group">
				                <label for="pegawai" class="col-sm-3 control-label">Pegawai</label>
				                <div class="col-sm-9">
						            <?php
						            $data = array();
									foreach ($pegawai as $row) {
									    $data[$row['id']] = $row['nama'];
									}
									echo form_dropdown(
									        'pegawai', $data, $this->session->flashdata('pegawai'), 'class="pegawai autocomplete form-control required"'
									);
									?>
				                </div>
				            </div>
						</div>
						<?php echo form_close(); ?>
						<?php echo form_open('permintaan/add_cart/' . $this->uri->segment(3), 'class="form-horizontal" data-parsley-validate'); ?>
						<div class="col-md-6">
							<input type="hidden" id="id_pegawai" name="id_pegawai">
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
								        'placeholder' => 'Jumlah'
								    ));
								    ?>
				                </div>
				            </div>
				            <?php
				            	
				            	if($this->session->flashdata('cek_stok') == 'kosong'):
				            ?>
				            <div class="form-group">
						        <div class="col-sm-6 col-sm-offset-3">
						        	<font color="red">
						        		Stok barang hanya tersedia <b><?php echo $this->session->flashdata('stok'); ?></b>,
						        		Barang yang diminta kurang
						        		<b><?php echo str_replace("-", "", $this->session->flashdata('kurang')); ?> </b>
						        		buah.
						        	</font>
						        </div>
				            </div>
				            <?php endif;?>
				            <div class="col-md-1 col-centered">
				                <button
									type="submit"
									class="btn btn-flat btn-success"
									data-toggle="tooltip"
									data-placement="top"
									title="Tambah"
								>
								    <i class="glyphicon glyphicon-plus"></i> Tambah 
								</button>
								<br/>
								<br/>
				            </div>
						</div>
						<?php echo form_close();?>
					</div>
					<div class="row">
						<table class="table table-bordered table-striped">
							<thead>
				                <tr class="bg-green">
				                    <th width="5%">No</th>
				                    <th width="10%">ID</th>
				                    <th width="35%">Barang</th>
				                    <th width="35%">Base Unit of Measure</th>
				                    <th width="10%">Jumlah</th>
				                    <th width="5%"></th>
				                </tr>
				            </thead>
				            <tbody>
						        <?php if($this->session->flashdata('error_aset')==TRUE):?>
									<tr>
										<td colspan="6" align="center"><font color="red">Data Kosong</font></td>
									</tr>
								<?php endif;?>
				            	<?php $number = 1; ?>
						        <?php foreach ($this->cart->contents() as $data) : ?>
						            <tr>
						                <td><?php echo $number++; ?></td>
						                <td><?php echo $data['id']; ?></td>
						                <td><?php echo $data['name']; ?></td>
						                <td><?php echo $data['options']['type']; ?></td>
						                <td><?php echo $data['qty']; ?></td>
						                <td align="center">
						                    <?php
						                    echo anchor(
						                            site_url('permintaan/delete_cart/' . $data['rowid'] . '/' . $this->uri->segment(3)), '<i class="glyphicon glyphicon-trash"></i>', 'class="btn btn-sm btn-danger" data-toggle="tooltip" data-placement="top" title="Hapus"'
						                    );
						                    ?>   
						                </td>
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
		            	href="<?php echo site_url('permintaan'); ?>"
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
		        </div>
		    </div>
        </div>
    </section>
</div>
