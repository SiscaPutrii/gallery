<?php

$title = "insert";
$side = 'calbum';
include_once "template/header.php";
include_once "template/sidebar.php";
$dalbum = $_GET['dalbum'];

date_default_timezone_set('Asia/Jakarta');
$waktu = date("Y-m-d H:i:s");


?>


<main id="main" class="main">
    <center>
        <div class="card col-md-8 mt-5">
            <div class="card-body">
                <form class="row g-3 mt-3" action="../routers/r_foto.php?aksi=tambah" method="post" enctype="multipart/form-data">
                    <input type="text" name="id" id="id" hidden>
                    <input type="text" name="iduser" id="iduser" value="<?= $id ?>" hidden>
                    <input type="text" name="dalbum" id="dalbum" value="<?= $dalbum ?>" hidden>
                    <input type="text" name="date" id="date" value="<?= $waktu ?>" hidden>
                    <div class="col-md-12">
                        <input type="text" name="judul" class="form-control" placeholder="Judul Foto">
                    </div>
                    <div class="col-md-12">
                        <textarea name="desc" class="form-control" style="height: 70px" placeholder="Description"></textarea>
                    </div>
                    <div class="col-md-12">
                        <input class="form-control" type="file" name="poto" id="formFile" placeholder="foto">
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