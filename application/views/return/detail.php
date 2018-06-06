<style>
.table th, .table td {
    border: 0px !important;
}
.fixed-table-container {
    border:0px !important;
}
</style>
<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Manajemen Permintaan
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url();?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="<?php echo site_url('permintaan');?>"> Permintaan</a></li>
            <li class="active"><?php echo $permintaan['id'];?></li>
        </ol>
    </section>
    <section class="content">
        <div class="box">
        	<div class="box-header with-border">
				<h4><?php echo $permintaan['id'];?></h4>
			</div>
            <div class="box-body">
				<div class="col-md-10 col-centered">
					<table class="table table-bordered">
						<tr>
							<td width="20%" valign="top" align="right"><b>ID : </b></td>
							<td><?php echo $permintaan['id'];?></td>
						</tr>
						<tr>
							<td width="20%" valign="top" align="right"><b>Tanggal : </b></td>
							<td><?php echo getTanggal($permintaan['tanggal']);?></td>
						</tr>
						<tr>
							<td width="20%" valign="top" align="right"><b>Pegawai : </b></td>
							<td><?php echo $permintaan['pegawai'];?></td>
						</tr>
					</table>
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
            <div class="box-footer">
            	<div class="col-md-6 col-md-offset-5">
					<a
				    	href="<?php echo site_url('permintaan'); ?>"
				    	class="btn btn-flat btn-default"
				    	data-toggle="tooltip"
						data-placement="top"
						title="Kembali"
					>
				        <i class="glyphicon glyphicon-chevron-left"></i> Kembali
				    </a>
				    <a
				    	href="<?php echo site_url('permintaan/edit/' . $permintaan['id']); ?>"
				    	class="btn btn-flat btn-success"
				    	data-toggle="tooltip"
						data-placement="top"
						title="Ubah Data"
					>
				        <i class="glyphicon glyphicon-edit"></i> Ubah
				    </a>
				</div>
            </div>
        </div>
    </section>
</div>
