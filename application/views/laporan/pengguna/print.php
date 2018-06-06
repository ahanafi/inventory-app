<body style="font-family: 'Times New Roman'; font-size:10pt;">
	<table width="100%" style="border: 1px solid black; border-collapse: collapse;">
		<thead>
			<tr>
				<td bgcolor="#CCD1D9" style="font-weight:bold; border: 1px solid black; border-collapse: collapse; padding: 5px" width="4%">NO</td>
				<td bgcolor="#CCD1D9" style="font-weight:bold; border: 1px solid black; border-collapse: collapse; padding: 5px" width="7%">ID</td>
				<td bgcolor="#CCD1D9" style="font-weight:bold; border: 1px solid black; border-collapse: collapse; padding: 5px" width="10%">Username</td>
				<td bgcolor="#CCD1D9" style="font-weight:bold; border: 1px solid black; border-collapse: collapse; padding: 5px" width="24%">Nama</td>
				<td bgcolor="#CCD1D9" style="font-weight:bold; border: 1px solid black; border-collapse: collapse; padding: 5px" width="12%">Jenis Kelamin</td>
				<td bgcolor="#CCD1D9" style="font-weight:bold; border: 1px solid black; border-collapse: collapse; padding: 5px" width="12%">Telepon</td>
				<td bgcolor="#CCD1D9" style="font-weight:bold; border: 1px solid black; border-collapse: collapse; padding: 5px" width="24%">Email</td>
				<td bgcolor="#CCD1D9" style="font-weight:bold; border: 1px solid black; border-collapse: collapse; padding: 5px" width="7%">Level</td>
			</tr>
		</thead>
		<tbody>
			<?php
				$number = 1;
				$tr;
				$level;
			?>
			<?php foreach($pengguna as $row):?>
			<?php
				if($number % 2 == 0){
					$tr = 'active';
				}else{
					$tr = '';
				}
			
				if($row['level'] == '1'){
					$level = 'Admin';
				}else{
					$level = 'User';
				}
			?>
				<tr class="<?php echo $tr;?>">
					<td style="border: 1px solid black; border-collapse: collapse; padding: 5px" valign="top"><?php echo $number++;?></td>
					<td style="border: 1px solid black; border-collapse: collapse; padding: 5px" valign="top"><?php echo $row['id'];?></td>
					<td style="border: 1px solid black; border-collapse: collapse; padding: 5px" valign="top"><?php echo $row['username'];?></td>
					<td style="border: 1px solid black; border-collapse: collapse; padding: 5px" valign="top"><?php echo $row['nama'];?></td>
					<td style="border: 1px solid black; border-collapse: collapse; padding: 5px" valign="top"><?php echo $row['jenis_kelamin'];?></td>
					<td style="border: 1px solid black; border-collapse: collapse; padding: 5px" valign="top"><?php echo $row['telepon'];?></td>
					<td style="border: 1px solid black; border-collapse: collapse; padding: 5px" valign="top"><?php echo $row['email'];?></td>
					<td style="border: 1px solid black; border-collapse: collapse; padding: 5px" valign="top"><?php echo $level;?></td>
				</tr>
			<?php endforeach;?>
		</tbody>
	</table>
</body>
