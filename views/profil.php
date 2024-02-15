<?php

$title = "profil";
include_once "template/header.php";
include_once "template/sidebar.php";

?>

<main id="main" class="main">

    <div class="pagetitle">
        <h1>Profile</h1>
    </div><!-- End Page Title -->

    <section class="section profile">
        <div class="row">
            <div class="col-xl-4">

                <div class="card">
                    <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

                        <img src="../assets/img/<?= $img ?>" alt="" class="rounded-circle">
                        <h2><?= $username ?></h2>
                        <h3><?= $nama ?></h3>
                    </div>
                </div>

            </div>

            <div class="col-xl-8">

                <div class="card">
                    <div class="card-body pt-3">
                        <!-- Bordered Tabs -->
                        <ul class="nav nav-tabs nav-tabs-bordered">

                            <li class="nav-item">
                                <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Overview</button>
                            </li>

                            <li class="nav-item">
                                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit Profile</button>
                            </li>

                            <li class="nav-item">
                                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">Change Password</button>
                            </li>

                        </ul>
                        <div class="tab-content pt-2">

                            <div class="tab-pane fade show active profile-overview" id="profile-overview">

                                <h5 class="card-title">Profile Details</h5>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label ">Username</div>
                                    <div class="col-lg-9 col-md-8"><?= $username ?></div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Full Name</div>
                                    <div class="col-lg-9 col-md-8"><?= $nama ?></div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Email</div>
                                    <div class="col-lg-9 col-md-8"><?= $email ?></div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Address</div>
                                    <div class="col-lg-9 col-md-8"><?= $alamat ?></div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Gender</div>
                                    <div class="col-lg-9 col-md-8"><?= $jk ?></div>
                                </div>

                            </div>

                            <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

                                <!-- Profile Edit Form -->
                                <form action="../routers/r_login.php?aksi=update" method="post" enctype="multipart/form-data">
                                    <div class="row mb-3">
                                        <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Profile Image</label>
                                        <div class="col-md-8 col-lg-9">
                                            <img src="../assets/img/<?= $img ?>" alt="Profile">
                                            <div class="pt-2">
                                                <div class="btn btn-primary btn-sm">
                                                    <label for="img" class="bi text-light bi-upload"></label>
                                                    <input type="file" name="img" id="img" class="bi bi-upload" hidden>
                                                </div>
                                                <a onclick="return confirm('Yakin ingin menghapus foto profil anda? (jika anda konfirmasi akan otomatis logout)')" href="../routers/r_login.php?UserID=<?= $id ?>&aksi=dimage" class="btn btn-danger btn-sm" title="Remove my profile image"><i class="bi bi-trash"></i></a>
                                            </div>
                                        </div>
                                    </div>

                                    <input type="text" name="id" id="id" value="<?= $id ?>" hidden>

                                    <div class="row mb-3">
                                        <label for="username" class="col-md-4 col-lg-3 col-form-label">Username</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="username" type="text" class="form-control" id="username" value="<?= $username ?>" disabled>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="nama" class="col-md-4 col-lg-3 col-form-label">Full Name</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="nama" type="text" class="form-control" id="nama" value="<?= $nama ?>">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="email" type="email" class="form-control" id="email" value="<?= $email ?>" disabled>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="alamat" class="col-md-4 col-lg-3 col-form-label">Address</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="alamat" type="text" class="form-control" id="alamat" value="<?= $alamat ?>">
                                        </div>
                                    </div>

                                    <?php if ($jk == 'perempuan') : ?>
                                        <div class="row mb-3">
                                            <label class="col-md-4 col-lg-3 col-form-label">Gender</label>
                                            <div class="col-md-8 col-lg-9">
                                                <select name="kelamin" class="form-select" aria-label="Default select example">
                                                    <option value="perempuan">Female</option>
                                                    <option value="laki-laki">Male</option>
                                                </select>
                                            </div>
                                        </div>
                                    <?php endif; ?>

                                    <?php if ($jk == 'laki-laki') : ?>
                                        <div class="row mb-3">
                                            <label class="col-md-4 col-lg-3 col-form-label">Gender</label>
                                            <div class="col-md-8 col-lg-9">
                                                <select name="kelamin" class="form-select" aria-label="Default select example">
                                                    <option value="laki-laki">Male</option>
                                                    <option value="perempuan">Female</option>
                                                </select>
                                            </div>
                                        </div>
                                    <?php endif; ?>

                                    <div class="text-center">
                                        <button type="submit" name="edit" class="btn btn-primary">Save Changes</button>
                                    </div>
                                </form><!-- End Profile Edit Form -->

                            </div>

                            <div class="tab-pane fade pt-3" id="profile-settings">

                            </div>

                            <div class="tab-pane fade pt-3" id="profile-change-password">
                                <!-- Change Password Form -->
                                <form action="../routers/r_login.php?aksi=cpassword" method="post">

                                    <input type="text" name="id" id="id" value="<?= $id ?>" hidden>
                                    <input type="text" name="email" id="email" value="<?= $email ?>" hidden>

                                    <div class="row mb-3">
                                        <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">Current Password</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="passwordold" type="password" class="form-control" id="currentPassword" required>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">New Password</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="password" type="password" class="form-control" id="newPassword" required>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">Re-enter New Password</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="confirm" type="password" class="form-control" id="renewPassword" required>
                                        </div>
                                    </div>

                                    <div class="text-center" onclick="return confirm('Are you sure want to change password? (If you change your password you will logged out automaticly!)')">
                                        <button type="submit" name="cpassword" class="btn btn-primary">Change Password</button>
                                    </div>
                                </form><!-- End Change Password Form -->

                            </div>

                        </div><!-- End Bordered Tabs -->

                    </div>
                </div>

            </div>
        </div>
    </section>

</main><!-- End #main -->

<?php

include_once "template/footer.php";

?>