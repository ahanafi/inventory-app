<div class="modal fade" id="confirm-delete">
	<div class="modal-dialog">
		<div class="modal-content">
		    <div class="modal-header">
		        <h3>Peringatan!</h3>
		    </div>
		    <div class="modal-body">
		        <p align="justify">
		        	Data yang sudah dihapus tidak dapat dikembalikan lagi. 
        		</p>
		        <p align="justify">
		        	Apakah yakin data ingin dihapus?
		        </p>
		    </div>
		    <div class="modal-footer">
		        <button type="button" class="btn btn-default" data-dismiss="modal">
		        	<i class="glyphicon glyphicon-remove"> Batal</i>
	        	</button>
		        <a class="btn btn-danger btn-ok"><i class="glyphicon glyphicon-trash"> Hapus</i></a>
		    </div>
		</div>
	</div>
</div>
<div class="modal fade" id="failed-login">
	<div class="modal-dialog">
		<div class="modal-content">
		    <div class="modal-header">
		        <h3>Peringatan!</h3>
		    </div>
		    <div class="modal-body">
		        <p align="justify">
		        	Username atau Password salah
        		</p>
		    </div>
		    <div class="modal-footer">
		        <button type="button" class="btn btn-danger" data-dismiss="modal">
		        	<i class="glyphicon glyphicon-remove"> OK</i>
	        	</button>
		    </div>
		</div>
	</div>
</div>
<div class="modal fade" id="incorrect-password">
	<div class="modal-dialog">
		<div class="modal-content">
		    <div class="modal-header">
		        <h3>Peringatan!</h3>
		    </div>
		    <div class="modal-body">
		        <p align="justify">
		        	Password lama salah
        		</p>
		    </div>
		    <div class="modal-footer">
		        <button type="button" class="btn btn-danger" data-dismiss="modal">
		        	<i class="glyphicon glyphicon-remove"> OK</i>
	        	</button>
		    </div>
		</div>
	</div>
</div>
<div class="modal fade" id="maxsizeUpload">
	<div class="modal-dialog">
		<div class="modal-content">
		    <div class="modal-header">
		        <h3>Peringatan!</h3>
		    </div>
		    <div class="modal-body">
		        <p align="justify">
		        	Ukuran Foto Melebihi Batas Upload
        		</p>
		    </div>
		    <div class="modal-footer">
		        <button type="button" class="btn btn-warning" data-dismiss="modal">
		        	OK
	        	</button>
		    </div>
		</div>
	</div>
</div>
<div class="modal fade" id="maxStok">
	<div class="modal-dialog">
		<div class="modal-content">
		    <div class="modal-header">
		        <h3>Peringatan!</h3>
		    </div>
		    <div class="modal-body">
		        <p align="justify">
		        	Stok tidak mencukupi
        		</p>
		    </div>
		    <div class="modal-footer">
		        <button type="button" class="btn btn-warning" data-dismiss="modal">
		        	OK
	        	</button>
		    </div>
		</div>
	</div>
</div>

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
