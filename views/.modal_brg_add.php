<div id="tambah" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Tambah data barang</h4>
			</div>
			<form method="post">
				<div class="modal-body">
					<div class="form-group">
						<label for="nm_brg" class="control-label">Nama barang</label>
						<input type="text" name="nm_brg" class="form-control" id="nm_brg" required>
					</div>
					<div class="form-group">
						<label for="hrg_brg" class="control-label">Harga barang</label>
						<input type="number" name="hrg_brg" class="form-control" id="hrg_brg" required>
					</div>
					<div class="form-group">
						<label for="stk_brg" class="control-label">Stok barang</label>
						<input type="number" name="stk_brg" class="form-control" id="stk_brg" required>
					</div>
				</div>
				<div class="modal-footer">
					<button type="reset" class="btn btn-danger">reset</button>
					<input type="submit" class="btn btn-success" name="tambah" value="simpan">
				</div>
			</form>
			<?php
			if (@$_POST['tambah']) {
				$nm_brg = $connection->conn->real_escape_string($_POST['nm_brg']);
				$hrg_brg = $connection->conn->real_escape_string($_POST['hrg_brg']);
				$stk_brg = $connection->conn->real_escape_string($_POST['stk_brg']);

				if (@$_POST['tambah']) {
					$brg->tambah($nm_brg, $hrg_brg, $stk_brg);
					header("location: ?page=barang");
				} else {
					echo "<script>alert('data gagal di tambahkan')</script>";
				}
			}
			?>
		</div>
	</div>
</div> <br>