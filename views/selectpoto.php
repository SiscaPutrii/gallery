<?php

$title = "Gallery";
$side = "calbum";
include_once "template/header.php";
include_once "template/sidebar.php";

include_once "../controllers/c_foto.php";
include_once "../controllers/c_komentar.php";
include_once "../controllers/c_like.php";
$dashboard = new c_foto();
$komentar = new c_komentar();
$tampilike = new c_like();

date_default_timezone_set('Asia/Jakarta');
$waktu = date("Y-m-d H:i:s");


?>

<main id="main" class="main">
    <?php foreach ($dashboard->select($_GET['FotoID']) as $select) : ?>
        <div class="card">
            <div class="container">
                <div class="user-block">
                    <a class="nav-link nav-profile d-flex align-items-center pe-0" data-bs-toggle="dropdown">
                        <img src="../assets/img/<?= $select->img ?>" width="45" height="45" alt="Profile" class="rounded-circle">
                        <div class="row">
                            <span class="username" style="margin-left: 2%;"><?= $select->Username ?></span>
                            <span class="p" style="margin-left: 2%;">Publish - <?= $select->TanggalUnggah ?></span>
                        </div>
                    </a>
                </div>
            </div>
            <div class="card-body">
                <img src="../assets/img/<?= $select->LokasiFile ?>" width="50%" height="50%" alt="">
                <h5 class="card-title"><?= $select->JudulFoto ?></h5>
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <p class="p mb-0 text-gray-800 m-0 font-weight-bold text-secondary"><?= $select->DeskripsiFoto ?></p>
                    <h6 class="text-secondary"><?= $tampilike->jumlah($select->FotoID) ?> Like | <?= $komentar->jumlah($select->FotoID) ?> Comments</h6>
                </div>
                <?php if ($tampilike->user($select->FotoID, $id) == 0) { ?>
                    <a href="../routers/r_like.php?FotoID=<?= $select->FotoID ?>&UserID=<?= $id ?>&aksi=likeSelect"><i class="text-secondary bx bx-like"> Like</i></a>
                <?php } else { ?>
                    <a href="../routers/r_like.php?UserID=<?= $id ?>&FotoID=<?= $select->FotoID ?>&aksi=deleteSelect"><i class="text-secondary bx bxs-like"></i> Unlike</a>
                <?php }
                if (empty($komentar->read_komentar($select->FotoID))) {
                    echo "";
                } else { ?>
                    <?php foreach ($komentar->read_komentar($select->FotoID) as $komen) : ?>
                        <div class="alert alert-dark alert-dismissible fade show" col-lg-12 role="alert">
                            <a class="nav-link nav-profile align-items-center pe-0" data-bs-toggle="dropdown">
                                <img src="../assets/img/<?= $komen->img ?>" width="45" height="45" alt="Profile" class="rounded-circle">
                                <span class="username"><?= $komen->Username ?>
                                    <span style="margin-left: 70%;">
                                        <?= $komen->TanggalKomentar ?>
                                    </span>
                                    <br>
                                    <span style="margin-left: 5%;"><?= $komen->IsiKomentar ?></span>

                                    <?php if ($id == $komen->UserID) { ?>
                                        <a href="../routers/r_komentar.php?FotoID=<?= $select->FotoID ?>&KomentarID=<?= $komen->KomentarID ?>&aksi=hapusSelect" class="btn-close"></a>
                                    <?php } ?>
                            </a>
                        </div>
                    <?php endforeach; ?>
                <?php } ?>
                <form class="row g-3 mt-3" action="../routers/r_komentar.php?aksi=tambahSelect" method="post">
                    <input type="text" name="IsiKomentar" class="form-control" placeholder="Comments">
                    <input type="text" name="KomentarID" id="id" hidden>
                    <input type="text" name="UserID" id="" value="<?= $id ?>" hidden>
                    <input type="text" name="FotoID" id="" value="<?= $select->FotoID ?>" hidden>
                    <input type="text" name="Tanggal" id="" value="<?= $waktu ?>" hidden>
                    <button type="submit" hidden></button>
                </form>
            </div>
        </div>
    <?php endforeach; ?>
</main><!-- End #main -->


<?php

include_once "template/footer.php";

?>