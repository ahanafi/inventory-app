<?php
function getTanggal($tanggal){
	$bulan;
	switch (date('m', strtotime($tanggal))){
		case 01: $bulan = "Januari"; break;
		case 02: $bulan = "Februari"; break;
		case 03: $bulan = "Maret"; break;
		case 04: $bulan = "April"; break;
		case 05: $bulan = "Mei"; break;
		case 06: $bulan = "Juni"; break;
		case 07: $bulan = "Juli"; break;
		case 08: $bulan = "Agustus"; break;
		case 09: $bulan = "September"; break;
		case 10: $bulan = "Oktober"; break;
		case 11: $bulan = "November"; break;
		case 12: $bulan = "Desember"; break;
	}
	
	return date('d', strtotime($tanggal)) . " " . $bulan . " " . date('Y', strtotime($tanggal));
}
?>
<body style="font-family: 'Times New Roman'; font-size:10pt;">
	<table width="100%" style="border: 1px solid black; border-collapse: collapse">
		<thead>
			<tr>
				<td bgcolor="#CCD1D9" style="font-weight:bold; border: 1px solid black; border-collapse: collapse; padding: 5px" width="4%">NO</td>
				<td bgcolor="#CCD1D9" style="font-weight:bold; border: 1px solid black; border-collapse: collapse; padding: 5px" width="11%">Kategori</td>
				<td bgcolor="#CCD1D9" style="font-weight:bold; border: 1px solid black; border-collapse: collapse; padding: 5px" width="15%">Tanggal Beli</td>
				<td bgcolor="#CCD1D9" style="font-weight:bold; border: 1px solid black; border-collapse: collapse; padding: 5px" width="25%">Merk</td>
				<td bgcolor="#CCD1D9" style="font-weight:bold; border: 1px solid black; border-collapse: collapse; padding: 5px" width="30%">Type</td>
				<td bgcolor="#CCD1D9" style="font-weight:bold; border: 1px solid black; border-collapse: collapse; padding: 5px" width="10%">Kondisi</td>
				<td bgcolor="#CCD1D9" style="font-weight:bold; border: 1px solid black; border-collapse: collapse; padding: 5px" width="5%">Stok</td>
			</tr
		</thead>
		<tbody>
			<?php
				$number = 1;
				$tr;
			?>
			<?php foreach($aset as $row):?>
			<?php
				if($number % 2 == 0){
					$tr = 'active';
				}else{
					$tr = '';
				}
			?>
				<tr class="<?php echo $tr;?>">
					<td style="border: 1px solid black; border-collapse: collapse; padding: 5px" valign="top"><?php echo $number++;?></td>
					<td style="border: 1px solid black; border-collapse: collapse; padding: 5px" valign="top"><?php echo $row['kategori'];?></td>
					<td style="border: 1px solid black; border-collapse: collapse; padding: 5px" valign="top"><?php echo getTanggal($row['tanggal_beli']);?></td>
					<td style="border: 1px solid black; border-collapse: collapse; padding: 5px" valign="top"><?php echo $row['merk'];?></td>
					<td style="border: 1px solid black; border-collapse: collapse; padding: 5px" valign="top"><?php echo $row['type'];?></td>
					<td style="border: 1px solid black; border-collapse: collapse; padding: 5px" valign="top"><?php echo $row['kondisi'];?></td>
					<td style="border: 1px solid black; border-collapse: collapse; padding: 5px" valign="top"><?php echo $row['stok'];?></td>
				</tr>
			<?php endforeach;?>
		</tbody>
	</table>
</body>
