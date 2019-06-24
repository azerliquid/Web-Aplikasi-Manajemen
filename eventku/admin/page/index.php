<?php 
session_start();
if (empty($_SESSION['admin'])) {
    header('location:../../login.php');
}
include '../template/header.php';
include '../template/footer.php';
?>
    <?php 
    include('../template/navbar.php');
    include('../template/sidebar.php');
    ?>

    <!-- Page Content -->
    <div id="content" class="container-fluid">
    <?php 
    include '../../config/koneksi.php';
    $event = mysqli_query($konek, "SELECT * FROM event");
    $kategori = mysqli_query($konek, "SELECT * FROM kategori");
    $user = mysqli_query($konek, "SELECT * FROM user");
    ?>
        
            <div class="container-fluid">

            <div class="blog" id="blog">
                <div class="container">
                    <h1 class="text-center">Dashboard</h1>
            <hr>
            <div class="row justify-content-center">
                <div class="col-md-4 col-lg-4 col-sm-12">
                    <div class="card text-center">
                        <div class="card-body">
                            <h4 class="card-title">Total Event</h4>
                            <h1 class="card-text"> <?php echo mysqli_num_rows($event) ?> </h1>
                        </div>
                        
                    </div>
                </div>
                <div class="col-md-4 col-lg-4 col-sm-12">
                    <div class="card text-center">
                        <div class="card-body">
                            <h4 class="card-title">Total Kategori</h4>
                            <h1 class="card-text"> <?php echo mysqli_num_rows($kategori) ?> </h1>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 col-lg-4 col-sm-12">
                    <div class="card text-center">
                        <div class="card-body">
                            <h4 class="card-title">Total User</h4>
                            <h1 class="card-text"> <?php echo mysqli_num_rows($user) ?> </h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    </div>
    