<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Laporan Aset
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url();?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Laporan</a></li>
            <li class="active">Aset</li>
        </ol>
    </section>
    <section class="content">
        <div class="box">
			<div class="box-header with-border">
				<a
					href="<?php echo site_url('laporan/cetak_aset/');?>"
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
                            <th width="10%">Plant</th>
                            <th width="25%">Desc. of Storage</th>
                            <th width="15%">Material</th>
                            <th width="30%">Material Desc.</th>
                            <th width="10%">Stock</th>
                        </tr>
                    </thead>
                    <tbody>
						<?php
							$number = 1;
						?>
						<?php foreach($aset as $row):?>
							<tr>
								<td><?php echo $number++;?></td>
								<td><?php echo $row['plant'];?></td>
								<td><?php echo $row['desc_storage'];?></td>
								<td><?php echo $row['material'];?></td>
                                <td><?php echo $row['material_desc'];?></td>
								<td><?php echo $row['stock'];?></td>
							</tr>
						<?php endforeach;?>
					</tbody>
                </table>
            </div><!-- /.box-body -->
        </div><!-- /.box -->
    </section>
</div>
