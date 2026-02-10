<?php
session_start();
include "../config/koneksi.php";

// ================= AMBIL DATA =================
$username = $_POST['username'];
$pass     = $_POST['password'];

if ($username == "" || $pass == "") {
    echo "<script>
            alert('Username dan Password wajib diisi!');
            window.history.back();
          </script>";
    exit;
}

// ================= CEK USER =================
$cek = mysqli_query($conn, "
    SELECT user_id, username, nama, password, role, status
    FROM tb_user
    WHERE username='$username'
    LIMIT 1
");

if (mysqli_num_rows($cek) == 0) {
    echo "<script>
            alert('Username tidak terdaftar!');
            window.history.back();
          </script>";
    exit;
}

$data = mysqli_fetch_assoc($cek);

// ================= CEK STATUS =================
if (strtolower($data['status']) != 'aktif') {
    echo "<script>
            alert('Akun anda tidak aktif!');
            window.history.back();
          </script>";
    exit;
}

// ================= VERIFIKASI PASSWORD =================
if (!password_verify($pass, $data['password'])) {
    echo "<script>
            alert('Password salah!');
            window.history.back();
          </script>";
    exit;
}

// ================= SET SESSION =================
$_SESSION['login']   = true;
$_SESSION['user_id'] = $data['user_id'];
$_SESSION['username'] = $data['username'];
$_SESSION['nama']    = $data['nama'];
$_SESSION['role']    = $data['role'];

// ================= REDIRECT =================
echo "<script>
        window.location='index.php';
      </script>";
