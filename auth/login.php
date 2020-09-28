<?php
ob_start();
require_once('../config/koneksi.php');
require_once('../models/database.php');
$connection = new Database($host, $user, $pass, $database);
if (isset($_SESSION['user'])) {
  echo "<script>window.location='".base_url()."';</script>";
} else {
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login - Gudang</title>
  <!-- Bootstrap core CSS -->
  <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <div id="wrapper">
    <div class="container">
      <div align="center" style="margin-top: 210px; ">
        <form action="" method="post" class="navbar-form"                                                >
          <div class="input-group">
            <span class="input-group-addon"><i class="glyphicon-user"></i></span>
            <input type="text" name="user" class="form-control" placeholder="Username" required>
          </div> <br>
          <div class="input-group">
            <span class="input-group-addon"><i class="glyphicon-lock"></i></span>
            <input type="password" name="pass" class="form-control" placeholder="Password" required>
          </div> <br>
          <div class="input-group" style="margin-right: 340px">
            <input type="submit" name="login" class="btn btn-primary" value="login">
          </div>
        </form>
        <?php
          if (isset($_POST['login'])) {
              $user = trim(mysqli_real_escape_string($conn, $_POST['user']));
              $pass = sha1(mysqli_real_escape_string($conn, $_POST['pass']));
              $sql_login = mysqli_query($conn, "SELECT * FROM tb_user WHERE username = '$user' AND password = '$pass'") or die (mysqli_error($conn));
              if(mysqli_num_rows($sql_login) > 0 ){
                $_SESSION['user'] = $user;
                echo "<script>window.location='".base_url()."';</script>";
              }else { ?>
                  <div class="col-lg-6 col-lg-offset-3">
                    <div class="alert alert-danger alert-dismissable" role="alert">
                      <a href="#" class="close" data-dismiss="alert" aria-label="close" >&times;</a>
                      <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                      <strong>Login gagal!</strong> username / password salah
                    </div>
                  </div>
                <?php
              }
            }
         ?>
      </div align="center">
    </div>
  </div>
  <script src="<?=base_url("assets/js/jquery-1.10.2.js")?>"></script>
  <script src="<?=base_url("assets/js/bootstrap.min.js")?>"></script>
</body>
</html>
<?php
}
?>