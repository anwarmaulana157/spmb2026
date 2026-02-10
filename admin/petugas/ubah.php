<?php
session_start();
include "../../config/koneksi.php";

// ================= VALIDASI FIELD WAJIB =================
if (
    empty($_POST['user_id']) ||
    empty($_POST['nama']) ||
    empty($_POST['username']) ||
    empty($_POST['role']) ||
    empty($_POST['status'])
) {
    header("Location: ../index.php?page=6");
    exit;
}

// ================= AMBIL DATA =================
$id       = (int) $_POST['user_id'];
$nama     = mysqli_real_escape_string($conn, $_POST['nama']);
$username = mysqli_real_escape_string($conn, $_POST['username']);
$role     = mysqli_real_escape_string($conn, $_POST['role']);
$status   = mysqli_real_escape_string($conn, $_POST['status']);
$password = $_POST['password']; // boleh kosong

$login_id = $_SESSION['user_id']; // user yang sedang login

// ================= PROTEKSI AKUN SENDIRI =================
// Tidak boleh menonaktifkan akun sendiri
if ($id == $login_id && strtolower($status) != 'aktif') {
    header("Location: ../index.php?page=6");
    exit;
}

// ================= UPDATE DATA =================
if (!empty($password)) {
    // jika password diisi → hash ulang
    $hash = password_hash($password, PASSWORD_DEFAULT);

    $query = mysqli_query($conn, "
        UPDATE tb_user SET
            nama='$nama',
            username='$username',
            password='$hash',
            role='$role',
            status='$status'
        WHERE user_id='$id'
    ");
} else {
    // jika password kosong → jangan diubah
    $query = mysqli_query($conn, "
        UPDATE tb_user SET
            nama='$nama',
            username='$username',
            role='$role',
            status='$status'
        WHERE user_id='$id'
    ");
}

// ================= REDIRECT =================
if ($query) {
    header("Location: ../index.php?page=6");
} else {
    header("Location: ../index.php?page=6");
}
exit;
