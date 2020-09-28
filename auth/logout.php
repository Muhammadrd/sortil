<?php
ob_start();
require_once('../config/koneksi.php');
require_once('../models/database.php');
$connection = new Database($host, $user, $pass, $database);

unset($_SESSION['user']);
echo "<script>window.location='".base_url('auth/login.php')."';</script>";
?>