<?php
class user
{
  private $mysqli;

  function __construct($conn)
  {
    $this->mysqli = $conn;
  }


  function register($username, $password, $nama)
  {
    $insert = mysqli_query($this->koneksi, "insert into tb_user values ('','$username','$password','$nama')");
    return $insert;
  }

  function login($username, $password, $remember)
  {
    $query = mysqli_query($this->koneksi, "select * from tb_user where username='$username'");
    $data_user = $query->fetch_array();
    if (password_verify($password, $data_user['password'])) {

      if ($remember) {
        setcookie('username', $username, time() + (60 * 60 * 24 * 5), '/');
        setcookie('nama', $data_user['nama'], time() + (60 * 60 * 24 * 5), '/');
      }
      $_SESSION['username'] = $username;
      $_SESSION['nama'] = $data_user['nama'];
      $_SESSION['is_login'] = TRUE;
      return TRUE;
    }
  }

  function relogin($username)
  {
    $query = mysqli_query($this->koneksi, "select * from tb_user where username='$username'");
    $data_user = $query->fetch_array();
    $_SESSION['username'] = $username;
    $_SESSION['nama'] = $data_user['nama'];
    $_SESSION['is_login'] = TRUE;
  }
}
