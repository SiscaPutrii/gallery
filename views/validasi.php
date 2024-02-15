<?php

error_reporting(E_ALL ^ E_NOTICE);
if (!empty($username)) {
    echo "";
} else {
    header("Location: ../index.php");
}
