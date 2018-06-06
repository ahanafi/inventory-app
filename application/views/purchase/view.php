<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Manajemen Purchasing
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url();?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Purchasing</li>
        </ol>
    </section>
    <section class="content">
        <div class="box">
			<div class="box-header with-border">
				<a
					<?php if($this->session->userdata('level') == "gudang"): ?>
						href="<?php echo site_url('purchasing/add-accept/');?>"
					<?php else: ?>
						href="<?php echo site_url('purchasing/add/');?>"
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
                            <th width="10%">ID</th>
                            <th width="20%">Tanggal</th>
                            <th width="25%">Nama Barang</th>
                            <th width="10%">Jumlah PO</th>
                            <th width="15%">Status</th>
                            <th width="10%"></th>
                        </tr>
                    </thead>
                    <tbody>
						<?php
							$number = 1;
						?>
						<?php foreach($purchasing as $row):?>
						<?php
							$status = ($row['status'] == 1) ? "Berhasil diterima" : "Menunggu acc gudang"
							//$hak_akses = $this->session->userdata('level');
							
						?>
						<tr>
							<td><?php echo $number++;?></td>
							<td><?php echo $row['id']; ?></td>
							<td><?php echo getTanggal($row['tanggal']);?></td>
							<td><?php echo $row['aset'];?></td>
							<td><?php echo $row['jumlah']; ?></td>
							<td><?php echo $status;?></td>
							<td align="center">
								<a
									href="<?php echo site_url('purchasing/edit/' . $row['id']);?>"
									type="button"
									class="btn btn-flat btn-sm btn-success"
									data-toggle="tooltip"
									data-placement="top"
									title="Ubah Data"
								>
									<i class="glyphicon glyphicon-edit"></i>
								</a>
								<span
									data-toggle="modal"
									data-target="#confirm-delete"
									data-href="<?php echo site_url('purchasing/delete/' . $row['id']);?>"
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
