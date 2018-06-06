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
            Manajemen Pengguna
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url();?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="<?php echo site_url('pengguna');?>"> Pengguna</a></li>
            <li class="active"><?php echo $pengguna['nama'];?></li>
        </ol>
    </section>
    <section class="content">
        <div class="box">
        	<div class="box-header with-border">
				<h4><?php echo $pengguna['nama'];?></h4>
			</div>
            <div class="box-body">
                <div class="col-md-2">
					<?php
						if(!$pengguna['foto']){
							$pengguna['foto'] = '../profile.gif';
						}
					?>
					<img src="<?php echo base_url('/assets/img/upload/' .$pengguna['foto']);?>" width="100%">
				</div>
				<div class="col-md-10">
					<table class="table table-bordered">
						<tr>
							<td width="20%" valign="top" align="right"><b>ID : </b></td>
							<td><?php echo $pengguna['id'];?></td>
						</tr>
						<tr>
							<td width="20%" valign="top" align="right"><b>Username : </b></td>
							<td><?php echo $pengguna['username'];?></td>
						</tr>
						<tr>
							<td width="20%" valign="top" align="right"><b>Nama : </b></td>
							<td><?php echo $pengguna['nama'];?></td>
						</tr>
						<tr>
							<td width="20%" valign="top" align="right"><b>Jenis Kelamin : </b></td>
							<td><?php echo $pengguna['jenis_kelamin'];?></td>
						</tr>
						<tr>
							<td width="20%" valign="top" align="right"><b>Telepon : </b></td>
							<td><?php echo $pengguna['telepon'];?></td>
						</tr>
						<tr>
							<td width="20%" valign="top" align="right"><b>Email : </b></td>
							<td><?php echo $pengguna['email'];?></td>
						</tr>
						<tr>
							<td width="20%" valign="top" align="right"><b>Level : </b></td>
							<td>
								<?php
									if($pengguna['level'] == 1){
										echo "Admin";
									} else {
										echo "User";
									}
								?>
							</td>
						</tr>
					</table>
				</div>
            </div>
            <div class="box-footer">
            	<div class="col-md-6 col-md-offset-5">
					<a
				    	href="<?php echo site_url('pengguna'); ?>"
				    	class="btn btn-flat btn-default"
				    	data-toggle="tooltip"
						data-placement="top"
						title="Kembali"
					>
				        <i class="glyphicon glyphicon-chevron-left"></i> Kembali
				    </a>
				    <a
				    	href="<?php echo site_url('pengguna/edit/' . $pengguna['id']); ?>"
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
