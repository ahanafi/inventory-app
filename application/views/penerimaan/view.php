<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Manajemen Penerimaan
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url();?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Penerimaan</li>
        </ol>
    </section>
    <section class="content">
        <div class="box">
			<div class="box-header with-border">
				<h4>Penerimaan Barang</h4>
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
                            <th width="15%"></th>
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
								<?php if($row['status'] == 1): ?>
									<i class="glyphicon glyphicon-ok" style="font-size: 18px;"></i>
								<?php else: ?>
								<a
									href="<?php echo site_url('penerimaan/accept/' . $row['id']);?>"
									type="button"
									class="btn btn-flat btn-sm btn-success"
									data-toggle="tooltip"
									data-placement="top"
									title="Accept Barang"
								>
									<i class="glyphicon glyphicon-check"></i>
								</a>
								<?php endif; ?>
							</td>
							<?php endforeach;?>
						</tr>
					</tbody>
                </table>
            </div><!-- /.box-body -->
        </div><!-- /.box -->
    </section>
</div>
