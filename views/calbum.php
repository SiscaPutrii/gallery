<?php

$title = "My Album";
$side = "calbum";
include_once "template/header.php";
include_once "template/sidebar.php";
include_once "../controllers/c_album.php";
include_once "../controllers/c_foto.php";
$tampil = new c_album();
$poto = new c_foto();

date_default_timezone_set('Asia/Jakarta');
$waktu = date("Y-m-d H:i:s");

?>

<main id="main" class="main">
    <?php if (empty($tampil->read_album($id))) {
        echo '<h3 class="text-secondary"> You is not have a album </h3>';
    } else { ?>
        <section class="section dashboard">
            <div class="row">

                <!-- Left side columns -->
                <div class="col-lg-8">
                    <div class="row">

                        <?php foreach ($tampil->read_album($id) as $baca) : ?>

                            <!-- Sales Card -->
                            <div class="col-xxl-4 col-md-6">
                                <div class="card info-card sales-card">

                                    <div class="filter">
                                        <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                                        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">

                                            <li><a class="dropdown-item" href="ualbum.php?AlbumID=<?= $baca->AlbumID ?>" name="change">Change Name</a></li>
                                            <li><a class="dropdown-item" onclick="return confirm('Yakin Ingin menghapus album ini?')" href="../routers/r_album.php?AlbumID=<?= $baca->AlbumID ?>&aksi=delete">Delete</a></li>
                                        </ul>
                                    </div>

                                    <a href="dalbum.php?dalbum=<?= $baca->AlbumID ?>">
                                        <div class="card-body">
                                            <h5 class="card-title"><?= $baca->NamaAlbum ?></h5>

                                            <?php $jumlahdata ?>
                                            <div class="d-flex align-items-center">
                                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                                    <?php if ($tampil->jumlah_data($baca->AlbumID) > 0) { ?>
                                                        <img src="../assets/img/<?= $tampil->foto($baca->AlbumID) ?>" class="rounded-circle" width="80" height="68" alt="">
                                                    <?php } else { ?>
                                                        <img src="../assets/img/icon.jpg" class="rounded-circle" width="80" height="68" alt="">
                                                    <?php } ?>
                                                </div>
                                                <div class="ps-3">
                                                    <p class="text-dark"><?= $baca->Deskripsi ?></p>
                                                    <span class="text-muted small pt-2 ps-1"><?= $baca->TanggalDibuat ?></span>
                                                </div>
                                            </div>
                                        </div>
                                    </a>

                                </div>
                            </div>
                        <?php endforeach ?>
                    </div>
                </div>
            </div>
        </section>
    <?php } ?>
    <center>
        <hr>
        <h1>Create Album</h1>
        <div class="card col-md-8 mt-5">
            <div class="card-body">
                <form class="row g-3 mt-3" action="../routers/r_album.php?aksi=tambah" method="post" enctype="multipart/form-data">
                    <input type="text" name="id" id="id" hidden>
                    <input type="text" name="userid" id="userid" value="<?= $id ?>" hidden>
                    <input type="text" name="date" id="date" value="<?= $waktu ?>" hidden>
                    <div class="col-md-12">
                        <input type="text" name="nama" class="form-control" placeholder="Album Title" maxlength="15" required>
                    </div>
                    <div class="col-md-12">
                        <input type="text" name="desc" class="form-control" placeholder="Deskripsi | Max 20 | Optional" maxlength="20">
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </center>
</main><!-- End #main -->

<?php

include_once "template/footer.php";

?>