<?php

include_once "../controllers/c_login.php";
$login = new c_login();

if ($_GET['aksi'] == 'register') {
    $id = $_POST['id'];
    $username = $_POST['username'];
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $jk = $_POST['jk'];
    $password = $_POST['password'];
    $c_pass = $_POST['c_pass'];
    $img = "icon.jpg";

    if ($password == $c_pass) {
        $password = password_hash($password, PASSWORD_DEFAULT);
        $login->register($id, $username, $fullname, $email, $address, $password, $jk, $img);
        echo "<script> alert('Akun telah berhasil di registrasi!');
        document.location.href = '../index.php';
        </script>";
    } else {
        echo "<script> alert('Password anda tidak sama!');
        document.location.href = '../register.php';
        </script>";
    }
} elseif ($_GET['aksi'] == 'login') {
    $usermail = $_POST['usermail'];
    $password = $_POST['password'];

    $login->login($usermail, $password);
} elseif ($_GET['aksi'] == 'logout') {
    $login->logout();
} elseif ($_GET['aksi'] == 'cpassword') {
    $id = $_POST['id'];
    $email = $_POST['email'];
    $passwordold = $_POST['passwordold'];
    $password = $_POST['password'];
    $confirm = $_POST['confirm'];

    if ($password == $confirm) {
        $password = password_hash($password, PASSWORD_DEFAULT);
        $login->ganti($id, $email, $passwordold, $password);
    } else {
        echo "<script> alert('Password doesnt match');
        document.location.href = '../views/profil.php'</script>";
    }
} elseif ($_GET['aksi'] == 'update') {
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $kelamin = $_POST['kelamin'];

    $img = $_FILES['img']['name'];

    if (!empty($img)) {
        $can = array('jpg', 'png', 'jpeg');
        $x = explode('.', $img);
        $ekstensi = strtolower(end($x));
        $tmp = $_FILES['img']['tmp_name'];

        if (in_array($ekstensi, $can) == true) {
            move_uploaded_file($tmp, '../assets/img/' . $img);

            $login->update($id, $nama, $alamat, $kelamin, $img);

            echo "<script>alert ('Profil telah diubah! (Otomatis logout)');
            document.location.href = '../routers/r_login.php?aksi=logout';
            </script>";
        }
    } else {
        foreach ($login->img($id) as $read) {
            $img = $read->img;
        }
        $login->update($id, $nama, $alamat, $kelamin, $img);
        echo "<script>alert ('Profil telah diubah! (Otomatis logout)');
        document.location.href = '../routers/r_login.php?aksi=logout';
        </script>";
    }
} elseif ($_GET['aksi'] == 'dimage') {
    $id = $_GET['UserID'];

    $login->delete($id);

    echo "<script>alert ('Profil telah diubah! (Otomatis logout)');
    document.location.href = '../routers/r_login.php?aksi=logout';
    </script>";
}
