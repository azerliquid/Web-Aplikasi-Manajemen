<?php
// hapus event
if (isset($_POST['hapus'])) {
    $hapus = $_POST['id'];
    delete($hapus);
}

// hapus user
if (isset($_POST['hapus_user'])) {
    $hapus = $_POST['id'];
    delete2($hapus);
}

// hapus kategori
if (isset($_POST['hapus_kat'])) {
    $hapus = $_POST['id'];
    delete3($hapus);
}


// tambah event
if (isset($_POST['tambah'])) {
    $file = $_FILES['tumbnail'];
    $cover = $_FILES["tumbnail"]["name"];
    $tmp_cover = $_FILES["tumbnail"]["tmp_name"];
    $target = "../assets/img/";
    $upload = upload_img($tmp_cover, $cover, $target);
    $data = array(
        'nama_event' => $_POST['event'],
        'jenis_event' => $_POST['kategori'],
        'deadline' => $_POST['deadline'],
        'pelaksanaan' => $_POST['pelaksanaan'],
        'deskripsi' => $_POST['deskripsi'],
        'tumbnail' => $_FILES["tumbnail"]["name"]
    );
    tambah($data);
}

// tambah user
if (isset($_POST['tambahUser'])) {
    $data = array(
        'nama' => $_POST['nama'],
        'username' => $_POST['username'],
        'password' => $_POST['password'],
        'email' => $_POST['email'],
        'tgl_lahir' => $_POST['tglLahir'],
        'jenis_user' => $_POST['jenisUser']
    );
    tambah2($data);
}

// tambah kategori
if (isset($_POST['tambahKat'])) {
    $data = array(
        'kategori' => $_POST['kategori']
    );
    tambah3($data);
}

// update event
if (isset($_POST['edit'])) {
    $file = $_FILES['tumbnail'];
    $cover = $_FILES["tumbnail"]["name"];
    $tmp_cover = $_FILES["tumbnail"]["tmp_name"];
    $target = "../assets/img/";
    $upload = upload_img($tmp_cover, $cover, $target);
    $id = $_POST['id'];
    $data = array(
        'nama_event' => $_POST['event'],
        'jenis_event' => $_POST['kategori'],
        'deadline' => $_POST['deadline'],
        'pelaksanaan' => $_POST['pelaksanaan'],
        'deskripsi' => $_POST['deskripsi'],
        'tumbnail' => $_FILES["tumbnail"]["name"]
    );
    edit($data, $id);
}

// update user
if (isset($_POST['edit_user'])) {
    $id = $_POST['id'];
    $data = array(
        'nama' => $_POST['nama'],
        'username' => $_POST['username'],
        'password' => $_POST['password'],
        'email' => $_POST['email'],
        'tgl_lahir' => $_POST['tglLahir'],
        'jenis_user' => $_POST['jenisUser']
    );
    edituser($data, $id);
}

// update kategori
if (isset($_POST['editkat'])) {
    $id = $_POST['id'];
    $data = array(
        'kategori' => $_POST['kategori']
    );
    editkat($data, $id);
}

// upload gambar
function upload_img($file_tmp, $file_nama, $target)
{
    $target_dir = $target;
    $target_file = $target_dir . basename($file_nama);
    $uploadOk = 1;
    $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
    $check = getimagesize($file_tmp);
    if ($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
        return false;
    } else {
        if (move_uploaded_file($file_tmp, $target_file)) {
            echo "The file " . basename($file_nama) . " has been uploaded.";
            return true;
        } else {
            echo "Sorry, there was an error uploading your file.";
            return false;
        }
    }
}

// fungsi delete event
function delete($id)
{
    include 'koneksi.php';
    $sql = "DELETE  FROM event WHERE id_event=" . $id;
    $result = mysqli_query($konek, $sql);
    if ($result) {
        header('Location: ../admin/page/data_event.php');
    } else {
        echo $id;
    }
}
// fungsi delete user
function delete2($id)
{
    include 'koneksi.php';
    $sql = "DELETE  FROM user WHERE id_user =" . $id;
    $result = mysqli_query($konek, $sql);
    if ($result) {
        header('Location: ../admin/page/data_user.php');
    } else {
        echo $id;
    }
}

// fungsi delete kategori
function delete3($id)
{
    include 'koneksi.php';
    $sql = "DELETE  FROM kategori WHERE id_kategori =" . $id;
    $result = mysqli_query($konek, $sql);
    if ($result) {
        header('Location: ../admin/page/data_kategori.php');
    } else {
        echo $id;
    }
}

// fungsi tambah event
function tambah($data)
{
    include "koneksi.php";
    $sql = "INSERT INTO event(nama_event, jenis_event, deadline, pelaksanaan, deskripsi, tumbnail) VALUES('" . implode("','", $data) . "')";
    if (mysqli_query($konek, $sql)) {
        header('Location:../admin/page/data_event.php');
    } else {
        echo mysql_error($konek);
    }
}

// fungsi tambah user
function tambah2($data)
{
    include "koneksi.php";
    $sql = "INSERT INTO user(nama, username, password, email, tgl_lahir, jenis_user) VALUES('" . implode("','", $data) . "')";
    if (mysqli_query($konek, $sql)) {
        header('Location:../admin/page/data_user.php');
    } else {
        echo mysql_error($konek);
    }
}

// fungsi tambah kategori
function tambah3($data)
{
    include "koneksi.php";
    $sql = "INSERT INTO kategori(kategori) VALUES('" . implode("','", $data) . "')";
    if (mysqli_query($konek, $sql)) {
        header('Location:../admin/page/data_kategori.php');
    } else {
        echo mysql_error($konek);
    }
}

// update event
function edit($data, $id)
{
    include "koneksi.php";
    $set = array();
    foreach ($data as $colom => $value) {
        $set[] = "`" . $colom . "` = '" . $value . "'";
    }
    $sql = "UPDATE event SET " . implode(', ', $set) . " WHERE id_event='$id'";
    if (mysqli_query($konek, $sql)) {
        header('Location:../admin/page/data_event.php');
    } else {
        echo "error" . mysql_errno($konek, $sql);
    }
}

// update user
function edituser($data, $id)
{
    include "koneksi.php";
    $set = array();
    foreach ($data as $colom => $value) {
        $set[] = "`" . $colom . "` = '" . $value . "'";
    }
    $sql = "UPDATE user SET " . implode(', ', $set) . " WHERE id_user='$id'";
    if (mysqli_query($konek, $sql)) {
        header('Location:../admin/page/data_user.php');
    } else {
        echo "error" . mysql_errno($konek, $sql);
    }
}

// update kategori
function editkat($data, $id)
{
    include "koneksi.php";
    $set = array();
    foreach ($data as $colom => $value) {
        $set[] = "`" . $colom . "` = '" . $value . "'";
    }
    $sql = "UPDATE kategori SET " . implode(', ', $set) . " WHERE id_kategori='$id'";
    if (mysqli_query($konek, $sql)) {
        header('Location:../admin/page/data_kategori.php');
    } else {
        echo "error" . mysql_errno($konek, $sql);
    }
}

?>
