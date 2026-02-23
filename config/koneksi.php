<?php

if ($_SERVER['SERVER_NAME'] == 'localhost') {
    $host = "localhost";
    $user = "root";
    $pass = "";
    $db   = "db_spmb";
} else {
    $host = "localhost";
    $user = "u408268136_db_spmb";
    $pass = "kQ>OrW&4";
    $db   = "u408268136_db_spmb";
}

$conn = mysqli_connect($host, $user, $pass, $db);

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>