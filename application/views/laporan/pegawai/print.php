<body style="font-family: 'Times New Roman'; font-size:10pt;">
	<table width="100%" style="border: 1px solid black; border-collapse: collapse;">
		<thead>
			<tr>
				<td bgcolor="#CCD1D9" style="font-weight:bold; border: 1px solid black; border-collapse: collapse; padding: 5px" width="4%">NO</td>
				<td bgcolor="#CCD1D9" style="font-weight:bold; border: 1px solid black; border-collapse: collapse; padding: 5px" width="7%">ID</td>
				<td bgcolor="#CCD1D9" style="font-weight:bold; border: 1px solid black; border-collapse: collapse; padding: 5px" width="26%">Nama</td>
				<td bgcolor="#CCD1D9" style="font-weight:bold; border: 1px solid black; border-collapse: collapse; padding: 5px" width="15%">Bagian</td>
				<td bgcolor="#CCD1D9" style="font-weight:bold; border: 1px solid black; border-collapse: collapse; padding: 5px" width="24%">Email</td>
				<td bgcolor="#CCD1D9" style="font-weight:bold; border: 1px solid black; border-collapse: collapse; padding: 5px" width="12%">Telepon</td>
				<td bgcolor="#CCD1D9" style="font-weight:bold; border: 1px solid black; border-collapse: collapse; padding: 5px" width="12%">Jenis Kelamin</td>
			</tr>
		</thead>
		<tbody>
			<?php
				$number = 1;
				$td;
			?>
			<?php foreach($pegawai as $row):?>
			<?php
				if($number % 2 == 0){
					$td = '#f2f2f2';
				}else{
					$td = '';
				}
			?>
				<tr>
					<td bgcolor="<?php echo $td;?>" style="border: 1px solid black; border-collapse: collapse; padding: 5px" valign="top"><?php echo $number++;?></td>
					<td bgcolor="<?php echo $td;?>" style="border: 1px solid black; border-collapse: collapse; padding: 5px" valign="top"><?php echo $row['id'];?></td>
					<td bgcolor="<?php echo $td;?>" style="border: 1px solid black; border-collapse: collapse; padding: 5px" valign="top"><?php echo $row['nama'];?></td>
					<td bgcolor="<?php echo $td;?>" style="border: 1px solid black; border-collapse: collapse; padding: 5px" valign="top"><?php echo $row['bagian'];?></td>
					<td bgcolor="<?php echo $td;?>" style="border: 1px solid black; border-collapse: collapse; padding: 5px" valign="top"><?php echo $row['email'];?></td>
					<td bgcolor="<?php echo $td;?>" style="border: 1px solid black; border-collapse: collapse; padding: 5px" valign="top"><?php echo $row['telepon'];?></td>
					<td bgcolor="<?php echo $td;?>" style="border: 1px solid black; border-collapse: collapse; padding: 5px" valign="top"><?php echo $row['jenis_kelamin'];?></td>
				</tr>
			<?php endforeach;?>
		</tbody>
	</table>
</body>
