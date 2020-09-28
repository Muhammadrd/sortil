<?php
	include "models/m_barang.php";
	$brg = new Barang($connection);
	if(@$_GET['act'] == '') {
?>
<div class="row">
          <div class="col-lg-12">
            <h1>barang <small>data barang</small></h1>
            <ol class="breadcrumb">
              <li><a href=""><i class="fa fa-dashboard"></i></a></li>
              <li class="active">Data barang</li>
            </ol>
          </div>
 </div>

<div class="row"> 
          <div class="col-lg-12">
          	<button type="button" class="btn btn-success" data-toggle="modal" data-target="#tambah"><i class="fa fa-plus"></i> Tambah data</button>
          	
            <div class="table-responsive">
            	<table class="table table-bordered table-hover table-striped" id="datatables">
                <thead>
                		<tr>
                			<th >No</th>
                			<th >Nama barang</th>
                			<th >Harga barang</th>
                			<th >Stok barang</th>
                			<th>Tanggal</th>
                			<th >Aksi</th>
                		</tr>
                </thead>
                <tbody>
                		<?php
                			$no = 1;
                			$tampil = $brg->tampil();
                			while ($data = $tampil->fetch_object()) {
                				?>
                			<tr>
                					<td align="center"><?= $no++ ; ?></td>
                					<td align="center"><?= $data->nama_brg; ?></td>
                					<td align="center"><?= $data->harga_brg; ?></td>
                					<td align="center"><?= $data->stok_brg; ?></td>
                					<td align="center"><?=date('d F Y',strtotime($data->tanggal)) ; ?></td>
                					<td align="center">
                					<a id="edit_brg" data-toggle="modal" data-target="#edit"
                					 data-id="<?= $data->id_brg; ?>"
                					 data-nama="<?= $data->nama_brg; ?>"
                					 data-harga="<?= $data->harga_brg; ?>"
                					 data-stok="<?= $data->stok_brg; ?>"
                					 >
                					<button align="center" class="btn btn-info btn-xs"> <i class="fa fa-edit"></i>Edit</button></a>

                					<a href="?page=barang&act=del&id=<?=$data->id_brg; ?>" onclick="return confirm('apakah anda yakin ?')">
                					<button align="center" class="btn btn-danger btn-xs"> <i class="fa fa-trash-o"></i>Hapus</button>
                					</a>
                				</td>
                			</tr>
                			<?php
                			}?>
                  </tbody>
            	</table>
            </div>

            <?php
            	include ".modal_brg_add.php"; 
            	include ".modal_brg_edit.php";
            	include ".modal_brg_cetak.php";
            ?>

            <div class="modal-footer">
            	<a href="./report/export_excel_barang.php" target="_blank">
          		<button align="left" type="button" class="btn btn-default"><i class="fa fa-print"></i> ExportToExcel</button></a>
          		
          		
          		<button align="left" type="button" class="btn btn-default" data-toggle="modal" data-target="#cetakpdf"><i class="fa fa-print"></i> ExportToPDF</button>
          			
          	</div>

          </div>  
 </div>
<?php
}else if (@$_GET['act'] == 'del') {
	$brg->hapus($_GET['id']);
	header("location: ?page=barang");
} 











