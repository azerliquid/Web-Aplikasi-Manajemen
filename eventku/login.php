<?php
include 'config/koneksi.php';
session_start();
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $sql = mysqli_query($konek, "SELECT * FROM user WHERE username='$username' AND password='$password'");
    $cek = mysqli_num_rows($sql);
    if ($cek > 0) {
        $data = mysqli_fetch_assoc($sql);
        $jenisuser = $data['jenis_user'];
        if ($jenisuser == 'Admin' or $jenisuser == 'admin') {
            $_SESSION['admin'] = array(
                'username' => $username,
                'status' => 'login'
            );
            header("location:admin/page/index.php");
        } else if ($jenisuser == 'user' or $jenisuser = 'User') {
            $_SESSION['user'] = array(
                'username' => $username,
                'status' => 'login'
            );
            header('location:page/index.php');
        }
    } else {
        header("location:login.php?pesan=gagal");
    }
}

if (isset($_POST['logout']) == 'logout') {
    $cek = $_POST['cek'];
    if ($cek == 'admin') {
        unset($_SESSION['admin']);
    } else {
        unset($_SESSION['user']);
    }
    header('location:login.php');
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="assets/css/bootstrap.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="assets/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="assets/css/bootstrap.bundle.min.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="assets/css/styleLogin.css" />
    <script src="main.js"></script>
</head>
<body>
  <div class="container">
    <div class="row">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto justify-content-center">
        <div class="card card-signin my-5">
          <div class="card-body">
            <h5 class="card-title text-center">Eventku.com</h5>
            <form method="POST" action="" class="form-signin">
              <div class="form-label-group">
                <input type="text" name="username" placehorder="Masukan username" class="form-control" required autofocus>
                <label for="inputEmail">Username</label>
              </div>

              <div class="form-label-group">
                <input type="password" name="password" placehorder="Masukan password" class="form-control" required>
                <label for="inputPassword">Password</label>
              </div>
              <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit" name="login">Log in</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
