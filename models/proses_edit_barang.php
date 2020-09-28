<?php
ob_start();
 require_once('../config/koneksi.php');
 require_once('../models/database.php');
 include "../models/m_barang.php";  
 $connection = new Database($host, $user, $pass, $database);
 $brg = new Barang($connection);

 $id_brg = $_POST['id_brg'];
 $nm_brg = $connection->conn->real_escape_string($_POST['nm1_brg']);
 $hrg_brg = $connection->conn->real_escape_string($_POST['hrg1_brg']);
 $stk_brg = $connection->conn->real_escape_string($_POST['stk1_brg']);

 $brg->edit("UPDATE tb_barang SET nama_brg = '$nm_brg', harga_brg = '$hrg_brg', stok_brg = '$stk_brg' WHERE id_brg = '$id_brg'");
 	echo "<script>window.location='?page=barang';</script>";
?> 