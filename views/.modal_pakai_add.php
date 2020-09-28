<div id="tambahPakai" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Tambah data pemakaian</h4>
			</div>
			<form method="post">
				<div class="modal-body">
					<div class="form-group">
						<label for="barang" class="control-label">Nama barang</label>
						<select name="barang" class="form-control" id="barang">
							<option value="">--PILIH BARANG--</option>
							<?php
							include "../models/m_barang.php";
							$brg = new Barang($connection);
							$no = 1;
							$tampil = $brg->tampil();
							while ($data = $tampil->fetch_object()) {
							?>
								<option value="<?= $data->id_brg; ?>">
									<?= $data->nama_brg; ?>
								</option>
							<?php
							}
							?>
						</select>
					</div>
					<div class="form-group">
						<label for="jumlah" class="control-label">Jumlah barang</label>
						<input type="number" name="jumlah" class="form-control" id="jumlah" required>
					</div>

				</div>
				<div class="modal-footer">
					<button type="reset" class="btn btn-danger">reset</button>
					<input type="submit" class="btn btn-success" name="tambah_pakai" value="simpan">
				</div>
			</form>

			<?php
			if (@$_POST['tambah_pakai']) {

    // Check If form submitted, insert form data into users table.
        $barang = $connection->conn->real_escape_string($_POST['barang']);
				$jumlah = $connection->conn->real_escape_string($_POST['jumlah']);

        // include database connection file
        include_once("config/koneksi.php");

        // Insert user data into table
        $result = mysqli_query($conn, "INSERT INTO tb_pemakaian VALUES('','$barang','$jumlah',now())");
        $kurangi = mysqli_query($conn, "UPDATE tb_barang SET stok_brg = stok_brg-$jumlah where id_brg=$barang");

        // Show message when user added
        // echo "User added successfully. <a href='index.php'>View Users</a>";

				// $barang = $connection->conn->real_escape_string($_POST['barang']);
				// $jumlah = $connection->conn->real_escape_string($_POST['jumlah']);
				// var_dump($barang);

				

				// if (@$_POST['tambah_pakai']) {
				// 	$brg->tambah_pakai($barang,$jumlah);
					header("location: ?page=pemakaian");
				// } else {
				// 	echo "<script>alert('data gagal di tambahkan')</script>";
				// }
					// $brg->update_pakai("UPDATE tb_barang SET stok_brg = stok_brg-$jumlah WHERE id_brg='$barang' ");
				 
			}
			?>

		</div>
	</div>
</div> <br>