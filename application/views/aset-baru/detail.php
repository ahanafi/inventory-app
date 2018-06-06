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
            Manajemen Aset
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url();?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="<?php echo site_url('aset-baru');?>"> Aset</a></li>
            <li class="active"><?php echo $aset_baru['id'];?></li>
        </ol>
    </section>
    <section class="content">
        <div class="box">
        	<div class="box-header with-border">
				<h4><?php echo $aset_baru['id'];?></h4>
			</div>
            <div class="box-body">
                <div class="col-md-2">
					<?php
						if(!$aset_baru['picture']){
							$aset_baru['picture'] = '../box.png';
						}
					?>
					<img src="<?php echo base_url('/assets/img/upload/' .$aset_baru['picture']);?>" width="100%">
				</div>
				<div class="col-md-10">
					<table class="table table-bordered">
						<tr>
							<td width="20%" valign="top" align="right"><b>ID : </b></td>
							<td><?php echo $aset_baru['id'];?></td>
						</tr>
						<tr>
							<td width="20%" valign="top" align="right"><b>Plant : </b></td>
							<td><?php echo $aset_baru['plant'];?></td>
						</tr>
						<tr>
							<td width="20%" valign="top" align="right"><b>Storage Location : </b></td>
							<td><?php echo $aset_baru['storage_location'];?></td>
						</tr>
						<tr>
							<td width="20%" valign="top" align="right"><b>Desc. of Storage Loc. : </b></td>
							<td><?php echo $aset_baru['desc_storage'];?></td>
						</tr>
						<tr>
							<td width="20%" valign="top" align="right"><b>Material : </b></td>
							<td><?php echo $aset_baru['material'];?></td>
						</tr>
						<tr>
							<td width="20%" valign="top" align="right"><b>Material Description : </b></td>
							<td><?php echo $aset_baru['material_desc'];?></td>
						</tr>
						<tr>
							<td width="20%" valign="top" align="right"><b>Base Unit of Measure : </b></td>
							<td><?php echo $aset_baru['base_unit'];?></td>
						</tr>
						<tr>
							<td width="20%" valign="top" align="right"><b>Rack : </b></td>
							<td><?php echo $aset_baru['rack'];?></td>
						</tr>
						<tr>
							<td width="20%" valign="top" align="right"><b>Base : </b></td>
							<td><?php echo $aset_baru['base'];?></td>
						</tr>
						<tr>
							<td width="20%" valign="top" align="right"><b>Coccect : </b></td>
							<td>
								<?php echo ($aset_baru['correct'] == 1) ? "BENAR" : "SALAH"; ?>
							</td>
						</tr>
						<tr>
							<td width="20%" valign="top" align="right"><b>Stock : </b></td>
							<td>
								<?php echo $aset_baru['stock']; ?>
							</td>
						</tr>
					</table>
				</div>
            </div>
            <div class="box-footer">
            	<div class="col-md-6 col-md-offset-5">
					<a
				    	href="<?php echo site_url('aset-baru'); ?>"
				    	class="btn btn-flat btn-default"
				    	data-toggle="tooltip"
						data-placement="top"
						title="Kembali"
					>
				        <i class="glyphicon glyphicon-chevron-left"></i> Kembali
				    </a>
				    <a
				    	href="<?php echo site_url('aset-baru/edit/' . $aset_baru['id']); ?>"
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
