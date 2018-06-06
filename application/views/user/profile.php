
<div class="content-wrapper">
    <section class="content-header">
        <h1>
            <?php echo $pengguna['nama'];?>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url();?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Profile</li>
        </ol>
    </section>
    <section class="content">
        <div class="box">
            <div class="box-body">
                <div class="col-md-2">
					<?php
						if(!$pengguna['foto']){
							$pengguna['foto'] = '../profile.gif';
						}
					?>
					<img src="<?php echo base_url('assets/img/upload/' . $pengguna['foto']);?>" width="100%">
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
									echo ucwords($pengguna['level']);
								?>
							</td>
						</tr>
					</table>
				</div>
            </div>
            <div class="box-footer">
            	<div class="col-md-6 col-md-offset-5">
					<a
				    	href="<?php echo site_url('user/edit'); ?>"
				    	class="btn btn-flat btn-success"
				    	data-toggle="tooltip"
						data-placement="top"
						title="Ubah Profile"
					>
				        <i class="glyphicon glyphicon-edit"></i> Ubah Profile
				    </a>
					<a
				    	href="<?php echo site_url('user/edit_password'); ?>"
				    	class="btn btn-flat btn-warning"
				    	data-toggle="tooltip"
						data-placement="top"
						title="Ubah Password"
					>
				        <i class="glyphicon glyphicon-lock"></i> Ubah Password
				    </a>
				</div>
            </div>
        </div>
    </section>
</div>
