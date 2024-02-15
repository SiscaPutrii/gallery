<?php

$title = "Album";
$side = "calbum";
include_once "template/header.php";
include_once "template/sidebar.php";
include_once "../controllers/c_foto.php";
$baru = new c_foto();

$dalbum = $_GET['dalbum'];

?>

<main id="main" class="main">
    <div class="row">
        <?php if (empty($baru->read($dalbum))) { ?>
            <h1 class="text-secondary">This album is empty</h1>
        <?php } else { ?>
            <?php foreach ($baru->read($dalbum) as $tapoto) : ?>
                <div class="col-sm-3">
                    <a href="selectpoto.php?FotoID=<?= $tapoto->FotoID ?>">
                        <div class="card">
                            <img src="../assets/img/<?= $tapoto->LokasiFile ?>" height="200" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title"><?= $tapoto->JudulFoto ?></h5>
                                <p class="card-text text-secondary"><?= $tapoto->DeskripsiFoto ?></p>
                                <center>
                                    <a href="edit_poto.php?fotoid=<?= $tapoto->FotoID ?>&dalbum=<?= $dalbum ?>"><i class="bx text-light btn-circle btn-sm bxs-edit-alt btn btn-warning"></i></a>
                                    <a href="../routers/r_foto_hapus.php?FotoID=<?= $tapoto->FotoID ?>&dalbum=<?= $dalbum ?>" onclick="return confirm('Yakin ingin mengahapus?')"><i class="bx text-light btn-circle btn-sm bxs-trash btn btn-danger"></i></a>
                                </center>
                            </div>
                        </div>
                    </a>
                </div>
            <?php endforeach; ?>
        <?php } ?>
    </div>
</main><!-- End #main -->


<?php

include_once "template/footer.php";

?>