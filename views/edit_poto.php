<?php

$title = "My Album";
$side = "calbum";
include_once "template/header.php";
include_once "template/sidebar.php";
include_once "../controllers/c_foto.php";
$tampil = new c_foto();

$dalbum = $_GET['dalbum'];

?>

<main id="main" class="main">
    <center>
        <h1>Edit foto</h1>
        <div class="card col-md-8 mt-5">
            <div class="card-body">
                <form class="row g-3 mt-3" action="../routers/r_foto.php?aksi=update" method="post" enctype="multipart/form-data">
                    <?php foreach($tampil->edit($_GET['fotoid']) as $edit) : ?>
                        <input type="text" name="FotoID" id="FotoID" value="<?= $edit->FotoID ?>" hidden>
                        <input type="text" name="dalbum" id="dalbum" value="<?= $dalbum ?>" hidden >
                        <div class="col-md-12">
                            <input type="text" name="JudulFoto" class="form-control" placeholder="Album Title" maxlength="15" value="<?= $edit->JudulFoto ?>" required>
                        </div>
                        <div class="col-md-12">
                            <input type="text" name="DeskripsiFoto" class="form-control" placeholder="Deskripsi | Optional" value="<?= $edit->DeskripsiFoto ?>">
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    <?php endforeach ?>
                </form>
            </div>
        </div>
    </center>
</main><!-- End #main -->

<?php

include_once "template/footer.php";

?>