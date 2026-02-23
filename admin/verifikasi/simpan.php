<?php
session_start();
include "../../config/koneksi.php";

// cek login
if (!isset($_SESSION['user_id'])) {
  header("Location: ../../login.php");
  exit;
}

$pendaftaran_id = $_POST['pendaftaran_id'] ?? null;
$verifikator_id = $_SESSION['user_id'];

if (!$pendaftaran_id) {
  header("Location: ../index.php?page=7");
  exit;
}

// update data
$query = mysqli_query($conn, "
  UPDATE tb_pendaftaran
  SET 
    status = 'verifikasi',
    tanggal_submit = NOW(),
    user_id = '$verifikator_id'
  WHERE pendaftaran_id = '$pendaftaran_id'
");

if ($query) {
  //  trigger modal cetak
  $_SESSION['show_cetak_modal'] = true;
  $_SESSION['cetak_pendaftaran_id'] = $pendaftaran_id;

  header("Location: ../index.php?page=7");
  exit;
} else {
  header("Location: ../index.php?page=7");
  exit;
}
