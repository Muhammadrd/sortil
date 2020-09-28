<?php
	include "models/m_barang.php";
	$brg = new Barang($connection);
	
?>
<div class="row">
          <div class="col-lg-12">
            <h1>Dashboard <small>Admin</small></h1>
            <ol class="breadcrumb">
              <li class="active"> <i class="fa fa-dashboard"></i>Dashboard</li>
            </ol>
          </div>
 </div>

<div class="row">
          <div class="col-lg-12">
          	<button type="button" class="btn btn-success" ><?php
            	// mengambil data barang
$tampil = $brg->tampil();
 
// menghitung data barang
$jumlah_barang = mysqli_num_rows($tampil);
?>
 
<p>Jumlah data barang : <b><?php echo $jumlah_barang; ?></b></p> <br></button>
<button type="button" class="btn btn-success" <?php
            	// mengambil data barang
$tampil_pakai = $brg->tampil_pakai();
 
// menghitung data barang
$jumlah_pakai = mysqli_num_rows($tampil_pakai);
?>
<p>Jumlah data pemakaian : <b><?php echo $jumlah_pakai; ?></b></p></button>
          </div>
 </div>