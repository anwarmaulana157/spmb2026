<?php
include "../../config/koneksi.php";

// validasi apakah data dikirim
if (isset($_POST['nama_sekolah'])) {

    $nama   = mysqli_real_escape_string($conn, $_POST['nama_sekolah']);
    $npsn   = mysqli_real_escape_string($conn, $_POST['npsn']);
    $alamat   = mysqli_real_escape_string($conn, $_POST['alamat']);
    $query = mysqli_query(
        $conn,
        "INSERT INTO tb_sekolah_asal (npsn,nama_sekolah,alamat)
         VALUES ('$npsn','$nama','$alamat')"
    );

    if ($query) {
        header("Location: ../index.php?page=3");
        exit;
    } else {
        die("Gagal simpan data: " . mysqli_error($conn));
    }
} else {
    header("Location: ../index.php?page=3");
    exit;
}
