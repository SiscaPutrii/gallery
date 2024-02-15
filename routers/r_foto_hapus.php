<?php

include_once "../controllers/c_foto.php";
$buang = new c_foto();

$id = $_GET['FotoID'];
$dalbum = $_GET['dalbum'];

$buang->delete_foto($id);

echo "<script> alert('Foto telah dihapus');</script>";
header("Location: ../views/dalbum.php?dalbum=$dalbum");
