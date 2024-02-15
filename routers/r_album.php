<?php

include_once "../controllers/c_album.php";
$album = new c_album();

if ($_GET['aksi'] == 'tambah') {
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $desc = $_POST['desc'];
    $date = $_POST['date'];
    $userid = $_POST['userid'];

    $album->tambah_album($id, $nama, $desc, $date, $userid);

    echo "<script> alert('Album telah dibuat');
    document.location.href = '../views/calbum.php';
    </script>";
}elseif ($_GET['aksi'] == 'delete') {
    $id = $_GET['AlbumID'];
    $album->delete_album($id);

    $dalbum = $_POST['dalbum'];
    header("Location: ../views/dalbum.php?id=");
}elseif ($_GET['aksi'] == 'update') {
    $id = $_POST['albumid'];
    $nama = $_POST['nama']; 
    $desc = $_POST['desc'];

    $album->update_album($id, $nama, $desc);

    echo "<script> alert('Album telah diubah');
    document.location.href = '../views/calbum.php';
    </script>";
}