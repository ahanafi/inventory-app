<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Laporan Pengguna
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url();?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Laporan</a></li>
            <li class="active">Pengguna</li>
        </ol>
    </section>
    <section class="content">
        <div class="box">
			<div class="box-header with-border">
				<a
					href="<?php echo site_url('laporan/cetak_pengguna/');?>"
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
            <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr class="bg-green">
                            <th width="5%">No</th>
                            <th width="20%">Username</th>
                            <th width="60%">Nama</th>
                            <th width="15%">Level</th>
                        </tr>
                    </thead>
                    <tbody>
						<?php
							$number = 1;
							$level;
						?>
						<?php foreach($pengguna as $row):?>
						<?php
						
							if($row['level'] == '1'){
								$level = 'Admin';
							}else{
								$level = 'User';
							}
						?>
							<tr>
								<td><?php echo $number++;?></td>
								<td><?php echo $row['username'];?></td>
								<td><?php echo $row['nama'];?></td>
								<td><?php echo $level;?></td>
							</tr>
						<?php endforeach;?>
					</tbody>
                </table>
            </div><!-- /.box-body -->
        </div><!-- /.box -->
    </section>
</div>
