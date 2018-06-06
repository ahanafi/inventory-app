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
	<table width="100%" style="border: 1px solid black; border-collapse: collapse;">
		<thead>
			<tr>
				<td bgcolor="#CCD1D9" style="font-weight:bold; border: 1px solid black; border-collapse: collapse; padding: 5px" width="5%">NO</td>
				<td bgcolor="#CCD1D9" style="font-weight:bold; border: 1px solid black; border-collapse: collapse; padding: 5px" width="15%">ID</td>
				<td bgcolor="#CCD1D9" style="font-weight:bold; border: 1px solid black; border-collapse: collapse; padding: 5px" width="50%">Pegawai</td>
				<td bgcolor="#CCD1D9" style="font-weight:bold; border: 1px solid black; border-collapse: collapse; padding: 5px" width="30%">Tanggal</td>
			</tr>
		</thead>
		<tbody>
			<?php
				$number = 1;
				$tr;
				$level;
			?>
			<?php foreach($peminjaman as $row):?>
			<?php
				if($number % 2 == 0){
					$tr = 'active';
				}else{
					$tr = '';
				}
			?>
				<tr class="<?php echo $tr;?>">
					<td style="border: 1px solid black; border-collapse: collapse; padding: 5px" valign="top"><?php echo $number++;?></td>
					<td style="border: 1px solid black; border-collapse: collapse; padding: 5px" valign="top"><?php echo $row['id'];?></td>
					<td style="border: 1px solid black; border-collapse: collapse; padding: 5px" valign="top"><?php echo $row['pegawai'];?></td>
					<td style="border: 1px solid black; border-collapse: collapse; padding: 5px" valign="top"><?php echo getTanggal($row['tanggal']);?></td>
				</tr>
			<?php endforeach;?>
		</tbody>
	</table>
</body>
