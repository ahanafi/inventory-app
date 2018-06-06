<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Laporan Peminjaman
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url();?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Laporan</a></li>
            <li class="active">Peminjaman</li>
        </ol>
    </section>
    <section class="content">
        <div class="box">
			<div class="box-header with-border">
				<div class="col-md-3">
				<?php echo form_open(site_url('laporan/peminjaman'), 'class="form-horizontal"'); ?>
					<div class="form-group">
						<div class="input-group">
							<?php
							echo form_input(array(
								'name' => 'tanggal',
								'id' => 'daterangepicker',
								'class' => 'form-control input-sm',
								'placeholder' => 'Tanggal',
			                    'onkeypress' => 'return (event.charCode == 13 && event.charCode != 8)',
							));
							?>
							<span class="input-group-btn">
							    <button
									type="submit"
									class="btn btn-flat btn-success btn-sm"
									data-toggle="tooltip"
									data-placement="top"
								>
								    <i class="glyphicon glyphicon-chevron-right"></i>
								</button>
							</span>
                        </div>
                    </div>
				<?php echo form_close();?>
				</div>
			</div>
            <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr class="bg-green">
                            <th width="5%">No</th>
                            <th width="10%">ID</th>
                            <th width="60%">Pegawai</th>
                            <th width="25%">Tanggal</th>
                        </tr>
                    </thead>
                    <tbody>
						<?php
							$number = 1;
						?>
						<?php foreach($peminjaman as $row):?>
							<tr>
								<td><?php echo $number++;?></td>
								<td><?php echo $row['id'];?></td>
								<td><?php echo $row['pegawai'];?></td>
								<td><?php echo getTanggal($row['tanggal']);?></td>
							</tr>
						<?php endforeach;?>
					</tbody>
                </table>
            </div><!-- /.box-body -->
            <div class="box-footer">
            	<a
					href="<?php echo site_url('laporan/cetak_peminjaman/');?>"
					type="button"
					class="btn btn-flat btn-sm btn-success"
					data-toggle="tooltip"
					data-placement="top"
					title="Cetak Data"
					target="_blank"
				>
					<i class="glyphicon glyphicon-print"> <b>Cetak</b></i>
				</a>
            </div>
        </div><!-- /.box -->
    </section>
</div>
