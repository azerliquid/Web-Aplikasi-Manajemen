<?php
session_start();
if (empty($_SESSION['admin'])) {
    header('location:../../login.php');
}
include '../template/header.php';
include '../template/navbar.php';
include '../template/sidebar.php';
?>

<div class="container">
        <h1 class="text-center">Data Kategori</h1>
        <hr>
        <div class="streaming-table">
           <a href="#" data-toggle="modal" data-target=".tambah" class="btn btn-success"> Tambah Kategori</a>
        </div>
            <hr>
        <table class="table table-hovered">
            <thead>
                <th>Id Kategori</th>
                <th>Kategori</th>
                <th>Aksi</th>
            </thead>
            <tbody>
                <?php 
                include '../../config/koneksi.php';
                include '../../config/proses.php';
                $sql = "SELECT * FROM kategori";
                $result = mysqli_query($konek, $sql);
                while ($row = mysqli_fetch_assoc($result)) {

                    ?>
                    <tr>
                        <td><?php echo $row['id_kategori'] ?></td>
                        <td><?php echo $row['kategori'] ?></td>
                        <td>
                        <a href="" data-toggle="modal" data-target=".hapus" data-id="<?php echo $row['id_kategori'] ?>"
                                                                            data-kategori="<?php echo $row['kategori'] ?>"
                                                                            class="btn btn-danger btn-hapus">Hapus</a>
                        <a href="" data-toggle="modal" data-target=".edit"  data-id="<?php echo $row['id_kategori'] ?>"
                                                                            data-kategori="<?php echo $row['kategori'] ?>"
                                                                            class="btn btn-info btn-edit">Edit</a>
                            
                        </td>
                    </tr>
                <?php 
            } ?>
            </tbody>
        </table>

            <div class="modal fade tambah" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-lg">
                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Tambah Data Kategori</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body">
                            <form action="../../config/proses.php" method="post" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-md-10 col-md-offset-1">
                                        <div class="form-group">
                                            <label for="nama">Nama Kategori</label>
                                            <input type="text" placeholder="Masukkan Nama Kategori" id="kategori" name="kategori" class="form-control" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <div class="col-md-4 col-md-offset-4">
                                            <button type="submit" class="c-btn large blue-bg" name="tambahKat">Simpan</button>
                                            <button type="button" class="c-btn large red-bg" data-dismiss="modal">Batal</button>
                                    </div>
                                </div>         
                            </form>
                        </div> 
                    </div>
                </div>
            </div>

            <!-- modal hapus -->
        <div class="modal fade hapus" tabindex="-3" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Hapus Data User</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form action="../../config/proses.php" method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                        <div class="form-group">
                            <label for="id">Id Kategori</label>
                            <input type="text" id="id" name="id" class="form-control hapus_id" readonly>
                        </div>
                        <div class="form-group">
                            <label for="nama">Nama Kategori</label>
                            <input type="text" placeholder="Masukkan Kategori" id="kategori" name="kategori" class="form-control hapus_kategori" readonly>
                        </div>
                        <p>Apakah Anda yakin akan menghapus buku dengan data di atas?</p>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <div class="col-md-4 col-md-offset-4">
                        <button type="submit" class="c-btn large blue-bg" name="hapus_kat">Hapus</button>
                        <button type="button" class="c-btn large red-bg" data-dismiss="modal">Batal</button>
                </div>
            </div>
            </form>            
            </div>
        </div> 
    </div>

    <div class="modal fade edit" tabindex="-2" role="dialog">
        <div class="modal-dialog modal-lg">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Data Kategori</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <form action="../../config/proses.php" method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-10 col-md-offset-1">
                                <div class="form-group">
                                    <label for="id">Id Kategori</label>
                                    <input type="text" id="id" name="id" class="form-control edit_id" hidden>
                                </div>
                                <div class="form-group">
                                    <label for="judul">Event</label>
                                    <input type="text" placeholder="Masukkan Judul Kategori" id="kategori" name="kategori" class="form-control edit_kategori" required>
                                </div>
                            </div>
                        </div>
                    
                        <div class="modal-footer">
                            <div class="col-md-4 col-md-offset-4">
                                    <button type="submit" class="c-btn large blue-bg" name="editkat">Simpan</button>
                                    <button type="button" class="c-btn large red-bg" data-dismiss="modal">Batal</button>
                            </div>
                        </div>         
                    </form>
                </div> 
            </div>
        </div>
    </div>

</div>
<?php
include '../template/footer.php';
?>
<script>
$(document).on( "click", '.btn-hapus',function(e) {
                var id = $(this).data('id');
                var kategori = $(this).data('kategori');

                $(".hapus_id").val(id);
                $(".hapus_kategori").val(kategori);
        });
$(document).on( "click", '.btn-edit',function(e) {
                var id = $(this).data('id');
                var kategori = $(this).data('kategori');

                $(".edit_id").val(id);
                $(".edit_kategori").val(kategori);
        });
</script>
