<?php
$hak_akses = $this->session->userdata('level');
$dashboard = "";

$first_uri = $this->uri->segment(1);
$second_uri = $this->uri->segment(2);

if(($first_uri == "site") || ($first_uri == "")){
	$dashboard = "active";
}

$master = "";
$sub_aset = "";
$sub_aset_baru = "";
$sub_kategori = "";
if(($first_uri == "aset") || ($first_uri == "aset-baru")){
	$master = "active";
}
if($first_uri == "aset"){
	$sub_aset = "active";
}else if($first_uri == "aset-baru"){
	$sub_aset_baru = "active";
}

$pegawai = "";
$sub_pegawai = "";
$sub_bagian = "";
if(($first_uri == "pegawai") || ($first_uri == "bagian")){
	$pegawai = "active";
}
if($first_uri == "pegawai"){
	$sub_pegawai = "active";
}else if($first_uri == "bagian"){
	$sub_bagian = "active";
}

$transaksi = "";
$sub_peminjaman = "";
$sub_permintaan = "";
$sub_pengembalian = "";
$sub_penerimaan = "";
$sub_pengeluaran= "";
$sub_purchasing = "";
$sub_return ="";
if(($first_uri == "peminjaman") || ($first_uri == "permintaan" ) || ($first_uri == "penerimaan") || ($first_uri == "purchasing") || $first_uri == "return" || $first_uri == "pengeluaran"){
	$transaksi = "active";
}
if($first_uri == "peminjaman"){
	$sub_peminjaman = "active";
}else if($first_uri == "pengembalian"){
	$sub_pengembalian = "active";
}else if($first_uri == "penerimaan"){
    $sub_penerimaan = "active";
}else if($first_uri == "permintaan"){
    $sub_permintaan = "active";
}elseif ($first_uri == "return") {
    $sub_return = "active";
}elseif ($first_uri == "pengeluaran") {
    $sub_pengeluaran = "active";
}

$pengguna = "";
if($first_uri == "pengguna"){
	$pengguna = "active";
}

$laporan = "";
$sub_lap_aset = "";
$sub_lap_pegawai = "";
$sub_lap_peminjaman = "";
$sub_lap_pengeluaran = "";
$sub_lap_pengguna = "";

$sub_lap_penerimaan = "";
$sub_lap_return = "";
$sub_lap_stock = "";




if($first_uri == "laporan"){
	$laporan = "active";
}
if(($first_uri == "laporan") && ($second_uri == "aset")){
	$sub_lap_aset = "active";
}else if(($first_uri == "laporan") && ($second_uri == "pegawai")){
	$sub_lap_pegawai = "active";
}else if(($first_uri == "laporan") && ($second_uri == "peminjaman")){
	$sub_lap_peminjaman = "active";
}else if(($first_uri == "laporan") && ($second_uri == "pengembalian")){
	$sub_lap_pengembalian = "active";
}else if(($first_uri == "laporan") && ($second_uri == "pengguna")){
	$sub_lap_pengguna = "active";
}else if(($first_uri == "laporan") && ($second_uri == "penerimaan")){
    $sub_lap_penerimaan = "active";
}else if(($first_uri == "laporan") && ($second_uri == "pengeluaran")){
    $sub_lap_pengeluaran = "active";
} elseif ($first_uri == "laporan" && $second_uri == "return") {
    $sub_lap_return = "active";
} elseif ($first_uri == "laporan" && $second_uri == "stock") {
    $sub_lap_stock = "active";
}




?>
<ul class="sidebar-menu">
    <li class="header">MAIN NAVIGATION</li>
    <li class="<?php echo $dashboard;?>"><a href="<?php echo base_url();?>"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
    <?php if($hak_akses == "admin"): ?>
        <li class="treeview <?php echo $master;?>">
            <a href="#">
                <i class="fa fa-database"></i>
                <span>Master</span>
                <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
                <li class="<?php echo $sub_aset_baru;?>">
                    <a href="<?php echo site_url('aset-baru');?>"><i class="fa fa-circle-o"></i> Aset</a>
                </li>
            </ul>
        </li>
        <li class="treeview <?php echo $pegawai;?>">
            <a href="#">
                <i class="fa fa-building"></i>
                <span>Pegawai</span>
                <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
                <li class="<?php echo $sub_pegawai;?>"><a href="<?php echo site_url('pegawai');?>"><i class="fa fa-circle-o"></i> Pegawai</a></li>
                <li class="<?php echo $sub_bagian;?>"><a href="<?php echo site_url('bagian');?>"><i class="fa fa-circle-o"></i> Bagian</a></li>
            </ul>
        </li>
        <li class="treeview <?php echo $transaksi;?>">
            <a href="#">
                <i class="fa fa-exchange"></i>
                <span>Transaksi</span>
                <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
                <li class="<?php echo $sub_permintaan;?>"><a href="<?php echo site_url('permintaan');?>"><i class="fa fa-circle-o"></i> Permintaan</a></li>
                <li class="<?php echo $sub_pengeluaran;?>"><a href="<?php echo site_url('pengeluaran');?>"><i class="fa fa-circle-o"></i> Pengeluaran Barang</a></li>
                <li class="<?php echo $sub_penerimaan;?>"><a href="<?php echo site_url('penerimaan');?>"><i class="fa fa-circle-o"></i> Peneriamaa Barang</a></li>
                <li class="<?php echo $sub_return;?>"><a href="<?php echo site_url('return');?>"><i class="fa fa-circle-o"></i> Return Barang</a></li>
            </ul>
        </li>
        <li class="treeview <?php echo $pengguna;?>">
            <a href="#">
                <i class="fa fa-users"></i>
                <span>Pengguna</span>
                <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
                <li class="<?php echo $pengguna;?>"><a href="<?php echo site_url('pengguna');?>"><i class="fa fa-circle-o"></i> Pengguna</a></li>
            </ul>
        </li>
        <li class="treeview <?php echo $laporan;?>">
            <a href="#">
                <i class="fa fa-calendar"></i>
                <span>Laporan</span>
                <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
                <li class="<?php echo $sub_lap_aset;?>">
                    <a href="<?php echo site_url('laporan/aset');?>"><i class="fa fa-circle-o"></i> Aset</a>
                </li>
                <li class="<?php echo $sub_lap_return;?>">
                    <a href="<?php echo site_url('laporan/return');?>"><i class="fa fa-circle-o"></i> Return Barang</a>
                </li>
                <li class="<?php echo $sub_lap_penerimaan;?>"
                    ><a href="<?php echo site_url('laporan/penerimaan');?>"><i class="fa fa-circle-o"></i> Penerimaan Barang</a>
                </li>
                <li class="<?php echo $sub_lap_pengeluaran;?>"
                    ><a href="<?php echo site_url('laporan/pengeluaran');?>"><i class="fa fa-circle-o"></i> Pengeluaran Barang</a>
                </li>
                <li class="<?php echo $sub_lap_stock;?>">
                    <a href="<?php echo site_url('laporan/stock');?>"><i class="fa fa-circle-o"></i> Stock Barang</a>
                </li>
            </ul>
        </li>
    <?php elseif ($hak_akses == "manager"): ?>
        <li class="treeview <?php echo $laporan;?>">
            <a href="#">
                <i class="fa fa-calendar"></i>
                <span>Laporan</span>
                <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
                <li class="<?php echo $sub_lap_aset;?>">
                    <a href="<?php echo site_url('laporan/aset');?>"><i class="fa fa-circle-o"></i> Aset</a>
                </li>
                <li class="<?php echo $sub_lap_return;?>">
                    <a href="<?php echo site_url('laporan/return');?>"><i class="fa fa-circle-o"></i> Return Barang</a>
                </li>
                <li class="<?php echo $sub_lap_penerimaan;?>"
                    ><a href="<?php echo site_url('laporan/penerimaan');?>"><i class="fa fa-circle-o"></i> Penerimaan Barang</a>
                </li>
                <li class="<?php echo $sub_lap_pengeluaran;?>"
                    ><a href="<?php echo site_url('laporan/pengeluaran');?>"><i class="fa fa-circle-o"></i> Pengeluaran Barang</a>
                </li>
                <li class="<?php echo $sub_lap_stock;?>">
                    <a href="<?php echo site_url('laporan/stock');?>"><i class="fa fa-circle-o"></i> Stock Barang</a>
                </li>
            </ul>
        </li>
    <?php elseif ($hak_akses == "produksi"): ?>
        <li class="treeview <?php echo $transaksi;?>">
            <a href="#">
                <i class="fa fa-exchange"></i>
                <span>Transaksi</span>
                <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
                <li class="<?php echo $sub_permintaan;?>"><a href="<?php echo site_url('permintaan');?>"><i class="fa fa-circle-o"></i> Permintaan</a></li>
            </ul>
        </li>
    <?php elseif ($hak_akses == "gudang"): ?>
        <li class="treeview <?php echo $master;?>">
            <a href="#">
                <i class="fa fa-database"></i>
                <span>Master</span>
                <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
                <li class="<?php echo $sub_aset_baru;?>">
                    <a href="<?php echo site_url('aset-baru');?>"><i class="fa fa-circle-o"></i> Aset</a>
                </li>
            </ul>
        </li>
        <li class="treeview <?php echo $transaksi;?>">
            <a href="#">
                <i class="fa fa-exchange"></i>
                <span>Transaksi</span>
                <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
                <!-- <li class="<?php echo $sub_permintaan;?>"><a href="<?php echo site_url('permintaan');?>"><i class="fa fa-circle-o"></i> Permintaan</a></li> -->
                <li class="<?php echo $sub_pengeluaran;?>"><a href="<?php echo site_url('pengeluaran');?>"><i class="fa fa-circle-o"></i> Pengeluaran</a></li>
                <li class="<?php echo $sub_penerimaan;?>"><a href="<?php echo site_url('penerimaan');?>"><i class="fa fa-circle-o"></i> Penerimaan</a></li>
                <li class="<?php echo $sub_return;?>"><a href="<?php echo site_url('return');?>"><i class="fa fa-circle-o"></i> Return Barang</a></li>
            </ul>
        </li>
    <?php elseif ($hak_akses == "purchasing"): ?>
        <li class="treeview <?php echo $transaksi;?>">
            <a href="#">
                <i class="fa fa-exchange"></i>
                <span>Transaksi</span>
                <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
                <li class="<?php echo $sub_purchasing;?>"><a href="<?php echo site_url('purchasing');?>"><i class="fa fa-circle-o"></i> Purchase Order</a></li>
            </ul>
        </li>
    <?php endif; ?>
</ul>