<?php
include "../../config/koneksi.php";
session_start();

// pastikan parameter id ada
if (!isset($_GET['id']) || empty($_GET['id'])) {
    header("Location: ../index.php?page=6");
    exit;
}

$id = (int) $_GET['id'];
$login_id = $_SESSION['user_id']; // id user yang sedang login

// 1. Cek total user
$total = mysqli_fetch_assoc(
    mysqli_query($conn, "SELECT COUNT(*) AS total FROM tb_user")
)['total'];

// jika tinggal 1 user
if ($total <= 1) {
    header("Location: ../index.php?page=6&status=error&action=delete");
    exit;
}

// 2. Cek jika hapus diri sendiri
if ($id == $login_id) {
    header("Location: ../index.php?page=6&status=error&action=delete");
    exit;
}

// 3. Baru boleh hapus
$query = mysqli_query(
    $conn,
    "DELETE FROM tb_user WHERE user_id = '$id'"
);

if ($query) {
    header("Location: ../index.php?page=6&status=success&action=delete");
} else {
    header("Location: ../index.php?page=6&status=error&action=delete");
}
exit;
