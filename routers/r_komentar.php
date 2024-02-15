<?php

include_once "../controllers/c_komentar.php";
$komen = new c_komentar();

if ($_GET['aksi'] == 'tambah') {
    $KomentarID = $_POST['KomentarID'];
    $FotoID = $_POST['FotoID'];
    $UserID = $_POST['UserID'];
    $IsiKomentar = $_POST['IsiKomentar'];
    $Tanggal = $_POST['Tanggal'];
    if ($IsiKomentar == "agus" or $IsiKomentar == "wati" or $IsiKomentar == "joy" or $IsiKomentar == "lili" or $IsiKomentar == "4gu5" or $IsiKomentar == "agu5" or $IsiKomentar == "4gus" or $IsiKomentar == "agus budiman") {
        $IsiKomentar = "Arip aripin anjing";
        $komen->insert_komentar($KomentarID, $FotoID, $UserID, $IsiKomentar, $Tanggal);
        header("Location: ../views/gallery.php");
    } else {
        $komen->insert_komentar($KomentarID, $FotoID, $UserID, $IsiKomentar, $Tanggal);
        header("Location: ../views/gallery.php");
    }
} elseif ($_GET['aksi'] == 'hapus') {
    $id = $_GET['KomentarID'];

    $komen->delete($id);
    header("Location: ../views/gallery.php");
} elseif ($_GET['aksi'] == 'tambahSelect') {
    $KomentarID = $_POST['KomentarID'];
    $FotoID = $_POST['FotoID'];
    $UserID = $_POST['UserID'];
    $IsiKomentar = $_POST['IsiKomentar'];
    $Tanggal = $_POST['Tanggal'];

    $komen->insert_komentar($KomentarID, $FotoID, $UserID, $IsiKomentar, $Tanggal);

    header("Location: ../views/selectpoto.php?FotoID=$FotoID");
} elseif ($_GET['aksi'] == 'hapusSelect') {
    $id = $_GET['KomentarID'];
    $FotoID = $_GET['FotoID'];

    $komen->delete($id);
    header("Location: ../views/selectpoto.php?FotoID=$FotoID");
}
