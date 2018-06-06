<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Manajemen Aset
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url();?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Aset</li>
        </ol>
    </section>
    <section class="content">
        <div class="box">
			<div class="box-header with-border">
				<a
					href="<?php echo site_url('aset-baru/add/');?>"
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
                            <th width="5%">Plant</th>
                            <th width="20%">Desc. of Storage Loc.</th>
                            <th width="7%">Material</th>
                            <th width="20%">Material Desc.</th>
                            <th width="3%">Stock</th>
                            <th width="15%"></th>
                            <th width="15%"></th>
                        </tr>
                    </thead>
                    <tbody>
						<?php
							$number = 1;
						?>
						<?php foreach($aset_baru as $row):?>
						<tr>
							<?php
								if(!$row['picture']){
									$row['picture'] = '../box.png';
								}
							?>
							<td><?php echo $number++;?></td>
							<td><?php echo $row['plant'];?></td>
							<td><?php echo $row['desc_storage'];?></td>
							<td><?php echo $row['material'];?></td>
							<td><?php echo $row['material_desc'];?></td>
							<td><?php echo $row['stock']; ?></td>
							<td><img src="<?php echo base_url('/assets/img/upload/' .$row['picture']);?>" width="100%" height="150px"></td>
							<td align="center">
								<a
									href="<?php echo site_url('aset-baru/detail/' . $row['id']);?>"
									type="button"
									class="btn btn-flat btn-sm btn-info"
									data-toggle="tooltip"
									data-placement="top"
									title="Detail Data"
								>
									<i class="glyphicon glyphicon-eye-open"></i>
								</a>
								
								<a
									href="<?php echo site_url('aset-baru/edit/' . $row['id']);?>"
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
									data-href="<?php echo site_url('aset-baru/delete/' . $row['id']);?>"
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
						</tr>
						<?php endforeach;?>
					</tbody>
                </table>
            </div><!-- /.box-body -->
        </div><!-- /.box -->
    </section>
</div>
