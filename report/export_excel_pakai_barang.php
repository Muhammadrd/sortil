<?php 
	require_once('../config/koneksi.php');
 	require_once('../models/database.php');
 	include "../models/m_barang.php";
 	$connection = new Database($host, $user, $pass, $database);
 	$brg = new Barang($connection);

 	$fileName = "excel_barang-(".date('d-m-Y').").xls";
 	header("Content-Disposition: attachment; filename=$fileName");
 	header("Content-Type: application/vnd.ms-excel");
?>

<table border="1px">
	<tr>
		<th>No</th>
		<th>Nama barang</th>
		<th>Jumlah barang</th>
		<th>Tanggal</th>
	</tr>
	<?php
		$no = 1;
		$tampil_pakai = $brg->tampil_pakai();
		while ($data = $tampil_pakai->fetch_object()) {
			echo "<tr>";
			echo "<td>".$no++."</td>";
			echo "<td>".$data->nama_brg."</td>";
			echo "<td>".$data->jumlah_brg."</td>";
			echo "<td>".$data->tanggal."</td>";
			echo "</tr>";
		}
	?>
</table>