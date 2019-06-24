<?php
session_start();
if (empty($_SESSION['user'])) {
    header('location:../login.php');
}
include '../config/koneksi.php';
include '../template/header.php';
include '../template/navbar.php';
$sql = mysqli_query($konek, "SELECT * FROM event INNER JOIN kategori ON event.jenis_event=kategori.id_kategori");
?>

<header class="header">
        <div class="container">
            <div class="description">
                <h1>
                    Hi there ! See U again
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum sed dolor sed ligula consectetur convallis. Quisque id
                        vehicula nisl. Nunc sit amet volutpat nibh. In semper ante dignissim finibus scelerisque. Nunc blandit
                        lacus vel porttitor vulputate. Donec lacinia orci vel ante mattis viverra. Donec pellentesque elementum
                        lacus at vulputate. Sed faucibus nec eros eget viverra. Maecenas maximus turpis a vehicula sollicitudin.
                        Curabitur iaculis leo molestie congue lobortis.
                    </p>
                </h1>

            </div>

        </div>
    </header>

<div class="blog" id="blog">
        <div class="container">
            <h1 class="text-center">Events</h1>
            <div class="row">
            <?php while ($row = mysqli_fetch_assoc($sql)) { ?>
                <div class="col-md-4 col-lg-4 col-sm-12 mb-4">
                    <div class="card">
                        <div class="card-img">
                            <img src="../assets/img/<?php echo $row['tumbnail'] ?>" class="img-fluid">
                        </div>
                        <div class="card-body">
                            <h4 class="card-title"><?php echo $row['nama_event'] ?></h4>
                            <p class="card-text" style="overflow: hidden; white-space: nowrap; text-overflow: ellipsis;"> <?php echo $row['deskripsi'] ?> </p>
                        </div>
                        <div class="card-footer">
                            <a href="" class="card-link detail" data-toggle="modal" data-target=".rincian" data-event="<?php echo $row['nama_event'] ?>"
                                                                                                                data-jenisevent="<?php echo $row['kategori'] ?>"
                                                                                                                data-deadline="<?php echo $row['deadline'] ?>"
                                                                                                                data-pelaksanaan="<?php echo $row['pelaksanaan'] ?>"
                                                                                                                data-deskripsi="<?php echo $row['deskripsi'] ?>"
                                                                                                                data-tumbnail="<?php echo $row['tumbnail'] ?>">Lebih banyak</a>
                        </div>
                    </div>
                </div>
                <?php 
            } ?>
            </div>
        </div>
    </div>

    <div class="modal fade rincian" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Detail</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body text-center">
                        <img src="" alt="" class="img-fluid tumbnail">
                        <label>Nama Event</label>
                        <input type="text" class="nama_event form-control"  disabled>
                        <label>Jenis Event</label>
                        <input type="text" class="jenis_event form-control"  disabled>
                        <label>Deadline</label>
                        <input type="date" class="deadline form-control"  disabled>
                        <label>Pelaksanaan</label>
                        <input type="date" class="pelaksanaan form-control"  disabled>
                        <label>Deskripsi</label>
                        <input type="textarea" rows="5" cols="20" class="deskripsi form-control"  disabled>
                        
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                    </div>
                </div>
            </div>
</div>

<?php
include '../template/footer.php';
?>
<script>
    $(document).ready(function(){
        $('.detail').click(function(){
            var namaEvent=$(this).data('event');
            $('.tumbnail').attr("src","../assets/img/"+$(this).data('tumbnail'));
            $('.nama_event').val(namaEvent);
            $('.jenis_event').val($(this).data('jenisevent'));
            $('.deadline').val($(this).data('deadline'));
            $('.pelaksanaan').val($(this).data('pelaksanaan'));
            $('.deskripsi').val($(this).data('deskripsi'));
        })
    })
</script>   