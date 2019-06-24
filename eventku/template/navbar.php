<?php
include '../config/koneksi.php';
$query = "SELECT * FROM kategori";
$sql = mysqli_query($konek, $query);
?>
<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top" >
  <a class="navbar-brand" href="../page/index.php">Eventku.com</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="../page/index.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Kategori
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <?php while ($row = mysqli_fetch_assoc($sql)) { ?> <a class="dropdown-item" href="<?php echo 'kategori.php?id=' . $row['id_kategori'] . "&halaman=" . $row['kategori'] ?>"> <?php echo $row['kategori'] ?> </a>
            <?php 
          } ?>
        </div>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0" method="POST" action="../login.php">
    <input type="text" name="cek" value="user" hidden>
      <button class="btn btn-outline-danger my-2 my-sm-0" name="logout" type="submit">Log out</button>
    </form>
  </div>
</nav>