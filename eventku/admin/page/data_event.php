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
        <h1 class="text-center">Data Event</h1>
        <hr>
        <div class="streaming-table">
           <a href="#" data-toggle="modal" data-target=".tambah" class="btn btn-success"> Tambah Event</a>
        </div>
        <hr>
        <table class="table table-hovered">
            <thead>
                <th>ID</th>
                <th>Event</th>
                <th>Jenis Event</th>
                <th>Deadline</th>
                <th>Pelaksanaan</th>
                <th>Deskripsi</th>
                <th>Aksi</th>
            </thead>
            <tbody>
                <?php 
                include '../../config/koneksi.php';
                include '../../config/proses.php';
                $sql = "SELECT * FROM event";
                $kategori = mysqli_query($konek, "SELECT * FROM kategori");
                $kategori2 = mysqli_query($konek, "SELECT * FROM kategori");
                $result = mysqli_query($konek, "SELECT * FROM event INNER JOIN kategori ON event.jenis_event=kategori.id_kategori");
                while ($row = mysqli_fetch_assoc($result)) {

                    ?>
                    <tr>
                        <td><?php echo $row['id_event'] ?></td>
                        <td><?php echo $row['nama_event'] ?></td>
                        <td><?php echo $row['kategori'] ?></td>
                        <td><?php echo date('W F Y', strtotime($row['deadline'])) ?></td>
                        <td><?php echo date('W F Y', strtotime($row['pelaksanaan'])) ?></td>
                        <td style="width: 10%; overflow: hidden; text-overflow: ellipsis;"><?php echo $row['deskripsi'] ?></td>
                        <td>
                            <a href="" data-toggle="modal" data-target=".hapus" data-id="<?php echo $row['id_event'] ?>"
                                                                                data-kategori="<?php echo $row['kategori'] ?>" 
                                                                                data-pelaksanaan="<?php echo $row['pelaksanaan'] ?>" 
                                                                                data-namaevent="<?php echo $row['nama_event'] ?>"
                                                                                data-deadline="<?php echo $row['deadline'] ?>"
                                                                                data-deskripsi="<?php echo $row['deskripsi'] ?>"
                                                                                class="btn btn-danger btn-hapus">Hapus</a>
                            <a href="" data-toggle="modal" data-target=".edit"  data-id="<?php echo $row['id_event'] ?>"
                                                                                data-kategori="<?php echo $row['kategori'] ?>" 
                                                                                data-pelaksanaan="<?php echo $row['pelaksanaan'] ?>" 
                                                                                data-namaevent="<?php echo $row['nama_event'] ?>"
                                                                                data-deadline="<?php echo $row['deadline'] ?>"
                                                                                data-deskripsi="<?php echo $row['deskripsi'] ?>"
                                                                                class="btn btn-info btn-edit">Edit</a>
                            
                        </td>
                    </tr>
                <?php 
            } ?>
            </tbody>
        </table>
        <!-- modal  -->
        <div class="modal fade tambah" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg">
            <!-- Modal content-->
            <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Data Event</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form action="../../config/proses.php" method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                        <div class="form-group">
                            <label for="judul">Event</label>
                            <input type="text" placeholder="Masukkan Judul Event" id="event" name="event" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="kategori">Kategori Event</label>
                            <select name="kategori" id="kategori" class="form-control">
                                <?php while ($row = mysqli_fetch_assoc($kategori)) { ?>
                                    <option value="<?php echo $row['id_kategori']; ?>"><?php echo $row['kategori']; ?></option>
                                <?php 
                            } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="deadline">Deadline</label>
                            <input type="date" placeholder="Masukkan Tanggal Deadline" id="deadline" name="deadline" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="pelaksanaan">Pelaksanaan</label>
                            <input type="date" placeholder="Masukkan Tanggal Pelaksanaan" id="pelaksanaan" name="pelaksanaan" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="deskripsi">Deskripsi</label>
                            <textarea name="deskripsi" id="deskripsi" rows="5" cols="20" class="form-control"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="tumbnail">Cover</label>
                            <input type="file" id="tumbnail" name="tumbnail" class="form-control" required>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <div class="col-md-4 col-md-offset-4">
                        <button type="submit" class="c-btn large blue-bg" name="tambah">Tambah</button>
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
                    <h4 class="modal-title">Edit Data Event</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <form action="../../config/proses.php" method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-10 col-md-offset-1">
                                <div class="form-group">
                                    <label for="id"></label>
                                    <input type="text" id="id" name="id" class="form-control edit_id" hidden>
                                </div>
                                <div class="form-group">
                                    <label for="judul">Event</label>
                                    <input type="text" placeholder="Masukkan Judul Event" id="event" name="event" class="form-control edit_event" required>
                                </div>
                                <div class="form-group">
                                    <label for="kategori">Kategori Event</label>
                                    <select name="kategori" id="kategori" class="form-control edit_kategori">
                                        <?php while ($row = mysqli_fetch_assoc($kategori2)) { ?>
                                            <option value="<?php echo $row['id_kategori']; ?>"><?php echo $row['kategori']; ?></option>
                                        <?php 
                                    } ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="deadline">Deadline</label>
                                    <input type="date" placeholder="Masukkan Tanggal Deadline" id="deadline" name="deadline" class="form-control edit_deadline" required>
                                </div>
                                <div class="form-group">
                                    <label for="pelaksanaan">Pelaksanaan</label>
                                    <input type="date" placeholder="Masukkan Tanggal Pelaksanaan" id="pelaksanaan" name="pelaksanaan" class="form-control edit_pelaksanaan" required>
                                </div>
                                <div class="form-group">
                                    <label for="deskripsi">Deskripsi</label>
                                    <textarea name="deskripsi" id="deskripsi" rows="5" cols="20" class="form-control edit_deskripsi"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="tumbnail">Cover</label>
                                    <input type="file" id="tumbnail" name="tumbnail" class="form-control" required>
                                </div>
                            </div>
                        </div>
                    
                        <div class="modal-footer">
                            <div class="col-md-4 col-md-offset-4">
                                    <button type="submit" class="c-btn large blue-bg" name="edit">Simpan</button>
                                    <button type="button" class="c-btn large red-bg" data-dismiss="modal">Batal</button>
                            </div>
                        </div>         
                    </form>
                </div> 
            </div>
        </div>
    </div>

    <div class="modal fade hapus" tabindex="-3" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Hapus Data Buku</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form action="../../config/proses.php" method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                        <div class="form-group">
                            <label for="id">Id Event</label>
                            <input type="text" id="id" name="id" class="form-control hapus_id" readonly>
                        </div>
                        <div class="form-group">
                            <label for="judul">Event</label>
                            <input type="text" placeholder="Masukkan Event" id="event" name="event" class="form-control hapus_event" readonly>
                        </div>
                        <div class="form-group">
                            <label for="kategori">Kategori</label>
                            <input type="text" placeholder="Masukkan Kategori" id="kategori" name="kategori" class="form-control hapus_kategori" readonly>
                        </div>
                        <div class="form-group">
                            <label for="deadline">Deadline</label>
                            <input type="date" placeholder="Masukkan Tanggal Deadline" id="deadline" name="deadline" class="form-control hapus_deadline" readonly>
                        </div>
                        <p>Apakah Anda yakin akan menghapus buku dengan data di atas?</p>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <div class="col-md-4 col-md-offset-4">
                        <button type="submit" class="c-btn large blue-bg" name="hapus">Hapus</button>
                        <button type="button" class="c-btn large red-bg" data-dismiss="modal">Batal</button>
                </div>
            </div>
            </form>            
            </div>
        </div> 
    </div>     
     
<?php
include '../template/footer.php';
?>
<script>
        $(document).on( "click", '.btn-hapus',function(e) {
                var id_event = $(this).data('id');
                var namaEvent = $(this).data('namaevent');
                var kategori = $(this).data('kategori');
                var pelaksanaan = $(this).data('pelaksanaan');
                var deadline = $(this).data('deadline');
                var deskripsi = $(this).data('deskripsi');

                $(".hapus_id").val(id_event);
                $(".hapus_event").val(namaEvent);
                $(".hapus_kategori").val(kategori);
                $(".hapus_deadline").val(deadline);
        });

        // });
        $(document).on( "click", '.btn-edit',function(e) {
                var id_event = $(this).data('id');
                var namaEvent = $(this).data('namaevent');
                var kategori = $(this).data('kategori');
                var pelaksanaan = $(this).data('pelaksanaan');
                var deadline = $(this).data('deadline');
                var deskripsi = $(this).data('deskripsi');

                $(".edit_id").val(id_event);
                $(".edit_event").val(namaEvent);
                // $(".edit_kategori").val(kategori);
                $(".edit_pelaksanaan").val(pelaksanaan);
                $(".edit_deadline").val(deadline);
                $(".edit_deskripsi").val(deskripsi);
        });
    </script>