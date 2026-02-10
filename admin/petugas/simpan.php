<?php
include "../../config/koneksi.php";

// validasi apakah data dikirim
if (isset($_POST['nama'], $_POST['username'], $_POST['password'], $_POST['role'], $_POST['status'])) {

    $nama   = mysqli_real_escape_string($conn, $_POST['nama']);
    $user   = mysqli_real_escape_string($conn, $_POST['username']);
    $pass   = $_POST['password']; // jangan di-escape dulu
    $role   = mysqli_real_escape_string($conn, $_POST['role']);
    $status = mysqli_real_escape_string($conn, $_POST['status']);

    // HASH PASSWORD (bcrypt default)
    $hash = password_hash($pass, PASSWORD_DEFAULT);

    $query = mysqli_query(
        $conn,
        "INSERT INTO tb_user (nama,username,password,role,status)
         VALUES ('$nama','$user','$hash','$role','$status')"
    );

    if ($query) {
        header("Location: ../index.php?page=6");
        exit;
    } else {
        die("Gagal simpan user: " . mysqli_error($conn));
    }
} else {
    header("Location: ../index.php?page=6");
    exit;
}
