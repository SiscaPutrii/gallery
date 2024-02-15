<?php

if (!empty($_SESSION['Username'])) {
    header("Location: views/gallery.php");
} else {
    echo "";
}
