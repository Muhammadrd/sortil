<?php
ob_start();
require_once('config/koneksi.php');
require_once('models/database.php');
$connection = new Database($host, $user, $pass, $database);
if (isset($_SESSION['user'])) {
  ?>
  <!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>Gudang</title>

  <!-- Bootstrap core CSS -->
  <link href="assets/css/bootstrap.css" rel="stylesheet">
  <link href="assets/dataTables/datatables.min.css" rel="stylesheet">

  <!-- Add custom CSS here -->
  <link href="assets/css/sb-admin.css" rel="stylesheet">
  <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">

</head>

<body>

  <div id="wrapper">


    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">

      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="">Gudang</a>
      </div>

      <div class="collapse navbar-collapse navbar-ex1-collapse">
        <ul class="nav navbar-nav side-nav">
          <li><a href="?page=dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>

          <li><a href="?page=barang"> <i class="fa fa-shopping-cart"></i> Data Barang</a></b></li>
          <li><a href="?page=pemakaian"><i class="fa fa-shopping-cart"></i> Data Pemakaian</a></li>

        </ul>

        <ul class="nav navbar-nav navbar-right navbar-user">

          <li class="dropdown user-dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> Admin<b class="caret"></b></a>
            <ul class="dropdown-menu">
              <li><a href="auth/logout.php"><i class="fa fa-power-off"></i>Logout</a></li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
    <script src="assets/js/jquery-1.10.2.js"></script>
    <script src="assets/dataTables/datatables.min.js"></script>
    <script type="text/javascript">
      $(document).ready(function() {
        $('#datatables').DataTable();
      });
    </script>
    <div id="page-wrapper" >
      <?php
      if (@$_GET['page'] == 'dashboard' || @$_GET['page'] == '') {
        include "views/dashboard.php";
      } else if (@$_GET['page'] == 'barang') {
        include "views/barang.php";
      } else if (@$_GET['page'] == 'pemakaian') {
        include "views/pemakaian.php";
      }
      ?>
    </div>
  </div>
  <script src="assets/js/bootstrap.js"></script>

</body>

</html>
  <?php 
} else {
  echo "<script>window.location='".base_url('auth/login.php')."';</script>";
}
?>
