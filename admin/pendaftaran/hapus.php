<?php
include "../../config/koneksi.php";

// validasi parameter
if (!isset($_GET['id']) || $_GET['id'] == '') {
    header("Location: ../index.php?page=2");
    exit;
}

$pendaftaran = (int) $_GET['id'];

// cek data ada atau tidak
$cek = mysqli_query(
    $conn,
    "SELECT pendaftaran_id FROM tb_pendaftaran WHERE pendaftaran_id = '$pendaftaran'"
);

if (mysqli_num_rows($cek) == 0) {
    header("Location: ../index.php?page=2");
    exit;
}

// hapus data
$hapus = mysqli_query(
    $conn,
    "DELETE FROM tb_pendaftaran WHERE pendaftaran_id = '$pendaftaran'"
);

if ($hapus) {
    header("Location: ../index.php?page=2");
} else {
    header("Location: ../index.php?page=2");
}
exit;
