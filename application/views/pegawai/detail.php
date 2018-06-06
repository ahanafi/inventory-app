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
            Manajemen Pegawai
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url();?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="<?php echo site_url('pegawai');?>"> Pegawai</a></li>
            <li class="active"><?php echo $pegawai['nama'];?></li>
        </ol>
    </section>
    <section class="content">
        <div class="box">
        	<div class="box-header with-border">
				<h4><?php echo $pegawai['nama'];?></h4>
			</div>
            <div class="box-body">
                <div class="col-md-2">
					<?php
						if(!$pegawai['foto']){
							$pegawai['foto'] = '../profile.gif';
						}
					?>
					<img src="<?php echo base_url('/assets/img/upload/' .$pegawai['foto']);?>" width="100%">
				</div>
				<div class="col-md-10">
					<table class="table table-bordered">
						<tr>
							<td width="20%" valign="top" align="right"><b>ID : </b></td>
							<td><?php echo $pegawai['id'];?></td>
						</tr>
						<tr>
							<td width="20%" valign="top" align="right"><b>Nama : </b></td>
							<td><?php echo $pegawai['nama'];?></td>
						</tr>
						<tr>
							<td width="20%" valign="top" align="right"><b>Bagian : </b></td>
							<td><?php echo $pegawai['bagian'];?></td>
						</tr>
						<tr>
							<td width="20%" valign="top" align="right"><b>Email : </b></td>
							<td><?php echo $pegawai['email'];?></td>
						</tr>
						<tr>
							<td width="20%" valign="top" align="right"><b>Telepon : </b></td>
							<td><?php echo $pegawai['telepon'];?></td>
						</tr>
						<tr>
							<td width="20%" valign="top" align="right"><b>Alamat : </b></td>
							<td><?php echo $pegawai['alamat'];?></td>
						</tr>
						<tr>
							<td width="20%" valign="top" align="right"><b>Jenis Kelamin : </b></td>
							<td><?php echo $pegawai['jenis_kelamin'];?></td>
						</tr>
					</table>
				</div>
            </div>
            <div class="box-footer">
            	<div class="col-md-6 col-md-offset-5">
					<a
				    	href="<?php echo site_url('pegawai'); ?>"
				    	class="btn btn-flat btn-default"
				    	data-toggle="tooltip"
						data-placement="top"
						title="Kembali"
					>
				        <i class="glyphicon glyphicon-chevron-left"></i> Kembali
				    </a>
				    <a
				    	href="<?php echo site_url('pegawai/edit/' . $pegawai['id']); ?>"
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
