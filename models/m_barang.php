<?php
class Barang
{
	private $mysqli;

	function __construct($conn)
	{
		$this->mysqli = $conn;
	}

	public function tampil($id = null)
	{
		$db = $this->mysqli->conn;
		$sql = "SELECT * FROM tb_barang";
		if ($id != null) {
			$sql .= " WHERE id_brg = $id ";
		}
		$query = $db->query($sql) or die($db->error);
		return $query;
	}


	public function tampil_pakai($id_brg = null)
	{
		$db = $this->mysqli->conn;
		//$sql = "SELECT a.*,b.* FROM tb_barang a INNER JOIN tb_pemakaian b ON a.id_brg=b.id_brg";
		$sql = "SELECT * FROM tb_pemakaian JOIN tb_barang ON tb_pemakaian.id_brg=tb_barang.id_brg";
		$query = $db->query($sql) or die($db->error);
		return $query;
	}


	public function tampil_tgl($tgl1, $tgl2)
	{
		$db = $this->mysqli->conn;
		$sql = "SELECT * FROM tb_barang WHERE tanggal BETWEEN '$tgl1' AND '$tgl2' ";
		$query = $db->query($sql) or die($db->error);
		return $query;
	}
	public function tambah($nm_brg, $hrg_brg, $stk_brg)
	{
		$db = $this->mysqli->conn;
		$db->query("INSERT INTO tb_barang VALUES('', '$nm_brg', '$hrg_brg', '$stk_brg', now())") or die($db->error);
	}
	public function tambah_pakai($barang,$jumlah)
	{
		$db = $this->mysqli->conn;
		$db->query("INSERT INTO tb_pemakaian VALUES('','$barang','$jumlah',now())");
	}
	public function edit($sql)
	{
		$db = $this->mysqli->conn;
		$db->query($sql) or die($db->error);
	}
	public function update_pakai($sql)
	{
		$db = $this->mysqli->conn;
		$db->query($sql) or die($db->error);
	}
	public function hapus($id)
	{
		$db = $this->mysqli->conn;
		$db->query("DELETE FROM tb_barang WHERE id_brg = '$id'") or die($db->error);
	}
	public function hapus_pakai($id)
	{
		$db = $this->mysqli->conn;
		$db->query("DELETE FROM tb_pemakaian WHERE id_pakai = '$id'") or die($db->error);
	}
}
