<?php
include "models/m_barang.php";
$brg = new Barang($connection);
if (@$_GET['action'] == '') {
?>
	<div class="row">
		<div class="col-lg-12">
			<h1>barang <small>data pemakaian</small></h1>
			<ol class="breadcrumb">
				<li><a href=""><i class="fa fa-dashboard"></i></a></li>
				<li class="active">Data pemakaian</li>
			</ol>
		</div>
	</div>

	<div class="row">
		<div class="col-lg-12">
			<button type="button" class="btn btn-success" data-toggle="modal" data-target="#tambahPakai"><i class="fa fa-plus"></i> Tambah data</button>

			<div class="table-responsive">
				<table class="table table-bordered table-hover table-striped" id="datatables">
					<thead>
						<tr>
							<th>No</th>
							<th>Nama barang</th>
							<th>Jumlah barang</th>
							<th>tanggal</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$no = 1;
						$tampil_pakai = $brg->tampil_pakai();
						while ($data = $tampil_pakai->fetch_object()) {
						?>
							<tr>
								<td align="center"><?= $no++; ?></td>
								<td align="center"><?= $data->nama_brg; ?></td>
								<td align="center"><?= $data->jumlah_brg; ?></td>
								<td align="center"><?= $data->tanggal; ?></td>
								<td align="center">

									<a href="?page=pemakaian&action=delete&id_pakai=<?= $data->id_pakai; ?>" onclick="return confirm('apakah anda yakin ?')">
										<button align="center" class="btn btn-danger btn-xs"> <i class="fa fa-trash-o"></i>Hapus</button>
									</a>
								</td>
							</tr>
						<?php
						} ?>
					</tbody>
				</table>
			</div>

			<?php
			include ".modal_pakai_add.php";
			include ".modal_cetak_pakai.php";



			?>

			<div class="modal-footer">
				<a href="./report/export_excel_pakai_barang.php" target="_blank">
					<button align="left" type="button" class="btn btn-default"><i class="fa fa-print"></i> ExportToExcel</button></a>


				<button align="left" type="button" class="btn btn-default" data-toggle="modal" data-target="#cetakpdfpakai"><i class="fa fa-print"></i> ExportToPDF</button>

			</div>

		</div>
	</div>
<?php
} else if (@$_GET['action'] == 'delete') {
	$brg->hapus_pakai($_GET['id_pakai']);
	header("location: ?page=pemakaian");
}
