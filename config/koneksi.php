<?php
date_default_timezone_set('Asia/jakarta');
session_start();
$conn = mysqli_connect('localhost', 'root', '', 'gudang_new');
if (mysqli_connect_errno()) {
	echo mysqli_connect_error();
}

function base_url($url = null){
	$base_url = "http://localhost/Gudang";
	if ($url != null) {
		return $base_url."/".$url;
	}else {
		return $base_url;
	}
}
	$host = "localhost";
	$user = "root";
	$pass = "";
	$database = "gudang_new";
?>