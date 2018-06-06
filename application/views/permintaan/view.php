<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Manajemen Permintaan
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url();?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Permintaan</li>
        </ol>
    </section>
    <section class="content">
        <div class="box">
			<div class="box-header with-border">
				<a
					<?php if($this->session->userdata('level') == "gudang"): ?>
						href="<?php echo site_url('permintaan/add-accept/');?>"
					<?php else: ?>
						href="<?php echo site_url('permintaan/add/');?>"
					<?php endif; ?>
					type="button"
					class="btn btn-flat btn-sm btn-success"
					data-toggle="tooltip"
					data-placement="top"
					title="Tambah Data"
				>
					<i class="glyphicon glyphicon-plus"> <b>Tambah</b></i>
				</a>
			</div>
            <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr class="bg-green">
                            <th width="5%">No</th>
                            <th width="20%">Tanggal</th>
                            <th width="40%">Nama Pegawai</th>
                            <th width="20%">Status</th>
                            <th width="15%"></th>
                        </tr>
                    </thead>
                    <tbody>
						<?php
							$number = 1;
						?>
						<?php foreach($permintaan as $row):?>
						<?php
							$status;
							$hak_akses = $this->session->userdata('level');
							if($hak_akses == "produksi") {
								if($row['status'] == 1) {
									$status = "Berhasil di Acc";
								} else {
									$status = "Menunggu Acc gudang";
								}
							} else {
								if($row['status'] == 1) {
									$status = "Telah di Acc";
								} else {
									$status = "Menunggu Acc";
								}
							}
						?>
						<tr>
							<td><?php echo $number++;?></td>
							<td><?php echo getTanggal($row['tanggal']);?></td>
							<td><?php echo $row['pegawai'];?></td>
							<td><?php echo $status;?></td>
							<td align="center">
								<a
									href="<?php echo site_url('permintaan/detail/' . $row['id']);?>"
									type="button"
									class="btn btn-flat btn-sm btn-info"
									data-toggle="tooltip"
									data-placement="top"
									title="Detail Data"
								>
									<i class="glyphicon glyphicon-eye-open"></i>
								</a>
								<?php if($this->session->userdata('level') == "produksi"): ?>
								<a
									href="<?php echo site_url('permintaan/edit/' . $row['id']);?>"
									type="button"
									class="btn btn-flat btn-sm btn-success"
									data-toggle="tooltip"
									data-placement="top"
									title="Ubah Data"
								>
									<i class="glyphicon glyphicon-edit"></i>
								</a>
								<?php else: ?>
								<a
									href="<?php echo site_url('permintaan/accept/'. $row['id']) ?>"
									type="button"
									class="btn btn-flat btn-sm btn-success"
									data-toggle="tooltip"
									data-placement="top"
									title="Accept"
								>
									<i class="glyphicon glyphicon-check"></i>
								</a>
								<?php endif; ?>
								<span
									data-toggle="modal"
									data-target="#confirm-delete"
									data-href="<?php echo site_url('permintaan/delete/' . $row['id']);?>"
								>
									<a
										type="button"
										class="btn btn-flat btn-sm btn-danger"
										data-toggle="tooltip"
										data-placement="top"
										title="Hapus Data"
									>
										<i class="glyphicon glyphicon-trash"></i>
									</a>
								</span>
							</td>
							<?php endforeach;?>
						</tr>
					</tbody>
                </table>
            </div><!-- /.box-body -->
        </div><!-- /.box -->
    </section>
</div>
