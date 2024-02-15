<?php

$title = "My Album";
$side = "calbum";
include_once "template/header.php";
include_once "template/sidebar.php";
include_once "../controllers/c_album.php";
$tampil = new c_album();


?>

<main id="main" class="main">
    <center>
        <hr>
        <h1>Create Album</h1>
        <div class="card col-md-8 mt-5">
            <div class="card-body">
                <form class="row g-3 mt-3" action="../routers/r_album.php?aksi=update" method="post" enctype="multipart/form-data">
                    <?php foreach($tampil->edit($_GET['AlbumID']) as $baca) : ?>
                        <input type="text" name="albumid" id="albumid" value="<?= $baca->AlbumID ?>" hidden>
                    <div class="col-md-12">
                        <input type="text" name="nama" class="form-control" placeholder="Album Title" maxlength="15" value="<?= $baca->NamaAlbum ?>" required>
                    </div>
                    <div class="col-md-12">
                        <input type="text" name="desc" class="form-control" placeholder="Deskripsi | Max 20 | Optional" value="<?= $baca->Deskripsi ?>" maxlength="20">
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