<?php

include_once "../controllers/c_like.php";
$like = new c_like();

date_default_timezone_set('Asia/Jakarta');
$date = date("Y-m-d H:i:s");

if ($_GET['aksi'] == 'like') {
    $user = $_GET['UserID'];
    $foto = $_GET['FotoID'];

    $like->like($id, $foto, $user, $date);

    header("Location: ../views/gallery.php");
} elseif ($_GET['aksi'] == 'delete') {
    $id = $_GET['UserID'];

    $like->delete_like($id);
    header("Location: ../views/gallery.php");
} elseif ($_GET['aksi'] == 'likeSelect') {
    $user = $_GET['UserID'];
    $foto = $_GET['FotoID'];

    $like->like($id, $foto, $user, $date);

    header("Location: ../views/selectpoto.php?FotoID=$foto");
} elseif ($_GET['aksi'] == 'deleteSelect') {
    $id = $_GET['UserID'];
    $foto = $_GET['FotoID'];

    $like->delete_like($id);
    header("Location: ../views/selectpoto.php?FotoID=$foto");
}
