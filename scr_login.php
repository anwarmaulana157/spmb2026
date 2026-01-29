<?php
session_start();
include "config/koneksi.php";

// ================= AMBIL DATA =================
$nisn = $_POST['nisn'];
$pass = $_POST['password'];

if ($nisn == "" || $pass == "") {
    echo "<script>
            alert('NISN dan Password wajib diisi!');
            window.history.back();
          </script>";
    exit;
}

// ================= CEK USER =================
$cek = mysqli_query($conn, "
    SELECT pendaftaran_id,nisn, nama_lengkap, password 
    FROM tb_pendaftaran 
    WHERE nisn='$nisn'
    LIMIT 1
");

if (mysqli_num_rows($cek) == 0) {
    echo "<script>
            alert('NISN tidak terdaftar!');
            window.history.back();
          </script>";
    exit;
}

$data = mysqli_fetch_assoc($cek);

// ================= VERIFIKASI PASSWORD =================
if (!password_verify($pass, $data['password'])) {
    echo "<script>
            alert('Password salah!');
            window.history.back();
          </script>";
    exit;
}

// ================= SET SESSION =================
$_SESSION['login'] = true;
$_SESSION['nisn']  = $data['nisn'];
$_SESSION['pendaftaran_id'] = $data['pendaftaran_id'];
$_SESSION['nama'] = $data['nama_lengkap'];

// ================= REDIRECT =================
echo "<script>
        window.location='pendaftar/index.php';
      </script>";
