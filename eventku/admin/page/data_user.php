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
        <h1 class="text-center">Data User</h1>
        <hr>
        <div class="streaming-table">
           <a href="#" data-toggle="modal" data-target=".tambah" class="btn btn-success"> Tambah User</a>
        </div>
        <hr>
        <table class="table table-hovered">
            <thead>
                <th>Id User</th>
                <th>Nama Lengkap</th>
                <th>Username</th>
                <th>Password</th>
                <th>Email</th>
                <th>Tanggal Lahir</th>
                <th>Jenis</th>
                <th>Aksi</th>
            </thead>
            <tbody>
                <?php 
                include '../../config/koneksi.php';
                include '../../config/proses.php';
                $sql = "SELECT * FROM user";
                $result = mysqli_query($konek, $sql);
                while ($row = mysqli_fetch_assoc($result)) {

                    ?>
                    <tr>
                        <td><?php echo $row['id_user'] ?></td>
                        <td><?php echo $row['nama'] ?></td>
                        <td><?php echo $row['username'] ?></td>
                        <td><?php echo $row['password'] ?></td>
                        <td><?php echo $row['email'] ?></td>
                        <td><?php echo date('W F Y', strtotime($row['tgl_lahir'])) ?></td>
                        <td><?php echo $row['jenis_user'] ?></td>
                        <td>
                        <a href="" data-toggle="modal" data-target=".hapus" data-id="<?php echo $row['id_user'] ?>"
                                                                            data-nama="<?php echo $row['nama'] ?>" 
                                                                            data-username="<?php echo $row['username'] ?>" 
                                                                            data-password="<?php echo $row['password'] ?>"
                                                                            data-email="<?php echo $row['email'] ?>"
                                                                            data-tglLahir="<?php echo $row['tgl_lahir'] ?>"
                                                                            data-jenisUser="<?php echo $row['jenis_user']; ?>"
                                                                            class="btn btn-danger btn-hapus">Hapus</a>
                        <a href="" data-toggle="modal" data-target=".edit"  data-id="<?php echo $row['id_user'] ?>"
                                                                            data-nama="<?php echo $row['nama'] ?>" 
                                                                            data-username="<?php echo $row['username'] ?>" 
                                                                            data-password="<?php echo $row['password'] ?>"
                                                                            data-email="<?php echo $row['email'] ?>"
                                                                            data-tgllahir="<?php echo $row['tgl_lahir'] ?>"
                                                                            data-jenisuser="<?php echo $row['jenis_user']; ?>"
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
                    <h4 class="modal-title">Tambah Data User</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <form action="../../config/proses.php" method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-10 col-md-offset-1">
                                <div class="form-group">
                                    <label for="nama">Nama</label>
                                    <input type="text" placeholder="Masukkan Nama" id="nama" name="nama" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="username">Username</label>
                                    <input type="text" placeholder="Masukkan Username" id="username" name="username" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" placeholder="Masukkan Password" id="password" name="password" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" placeholder="Masukkan Email" id="email" name="email" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="tglLahir">Tangal Lahir</label>
                                    <input type="date" placeholder="Masukkan Tanggal Lahir" id="tglLahir" name="tglLahir" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="jenisUser">Jenis Akun</label>
                                    <input type="text" placeholder="Masukkan Tipe Akun" id="jenisUser" name="jenisUser" class="form-control" required>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <div class="col-md-4 col-md-offset-4">
                                    <button type="submit" class="c-btn large blue-bg" name="tambahUser">Simpan</button>
                                    <button type="button" class="c-btn large red-bg" data-dismiss="modal">Batal</button>
                            </div>
                        </div>         
                    </form>
                </div> 
            </div>
        </div>
    </div>

        <div class="modal fade edit" tabindex="-2" role="dialog">
        <div class="modal-dialog modal-lg">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Data User</h4>
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
                                    <label for="nama">Nama</label>
                                    <input type="text" placeholder="Masukkan Nama" id="nama" name="nama" class="form-control edit_nama" required>
                                </div>
                                <div class="form-group">
                                    <label for="username">Username</label>
                                    <input type="text" placeholder="Masukkan Username" id="username" name="username" class="form-control edit_username" required>
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" placeholder="Masukkan Password" id="password" name="password" class="form-control edit_password" required>
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" placeholder="Masukkan Email" id="email" name="email" class="form-control edit_email" required>
                                </div>
                                <div class="form-group">
                                    <label for="tglLahir">Tangal Lahir</label>
                                    <input type="date" placeholder="Masukkan Tanggal Lahir" id="tglLahir" name="tglLahir" class="form-control edit_tglLahir" required>
                                </div>
                                <div class="form-group">
                                    <label for="jenisUser">Jenis Akun</label>
                                    <input type="text" placeholder="Masukkan Tipe Akun" id="jenisUser" name="jenisUser" class="form-control edit_jenisUser" required>
                                </div>
                            </div>
                        </div>
                    <div class="modal-footer">
                        <div class="col-md-4 col-md-offset-4">
                                <button type="submit" class="c-btn large blue-bg" name="edit_user">Simpan</button>
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
                            <label for="id">Id User</label>
                            <input type="text" id="id" name="id" class="form-control hapus_id" readonly>
                        </div>
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" placeholder="Masukkan Nama" id="nama" name="nama" class="form-control hapus_nama" readonly>
                        </div>
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" placeholder="Masukkan Username" id="username" name="username" class="form-control hapus_username" readonly>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="text" placeholder="Masukkan Password" id="password" name="password" class="form-control hapus_password" readonly>
                        </div>
                        <p>Apakah Anda yakin akan menghapus buku dengan data di atas?</p>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <div class="col-md-4 col-md-offset-4">
                        <button type="submit" class="c-btn large blue-bg" name="hapus_user">Hapus</button>
                        <button type="button" class="c-btn large red-bg" data-dismiss="modal">Batal</button>
                </div>
            </div>
            </form>            
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
                var nama = $(this).data('nama');
                var username = $(this).data('username');
                var password = $(this).data('password');
                // var deadline = $(this).data('deadline');
                // var deskripsi = $(this).data('deskripsi');

                $(".hapus_id").val(id);
                $(".hapus_nama").val(nama);
                $(".hapus_username").val(username);
                $(".hapus_password").val(password);
        });
    
    $(document).on( "click", '.btn-edit',function(e) {
                var id = $(this).data('id');
                var nama = $(this).data('nama');
                var username = $(this).data('username');
                var password = $(this).data('password');
                var email = $(this).data('email');
                var tglLahir = $(this).data('tgllahir');
                var jenisUser = $(this).data('jenisuser');

                $(".edit_id").val(id);
                $(".edit_nama").val(nama);
                $(".edit_username").val(username);
                $(".edit_password").val(password);
                $(".edit_email").val(email);
                $(".edit_tglLahir").val(tglLahir);
                $(".edit_jenisUser").val(jenisUser);
        });
</script>