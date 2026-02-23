<?php
include "../../config/koneksi.php";
session_start();

// pastikan parameter id ada
if (!isset($_GET['id']) || empty($_GET['id'])) {
    header("Location: ../index.php?page=3");
    exit;
}
$id = $_GET['id'];

$cek = mysqli_query($conn,
  "SELECT COUNT(*) AS total 
   FROM tb_pendaftaran 
   WHERE sekolah_id='$id'");

$data = mysqli_fetch_assoc($cek);

if ($data['total'] > 0) {
 
    echo "<script>
    alert('Tidak bisa dihapus, masih ada pendaftaran!');
    window.location.href = '../index.php?page=3';
</script>";

} else {
    mysqli_query($conn,
      "DELETE FROM tb_sekolah_asal WHERE sekolah_id='$id'");
       header("Location: ../index.php?page=3");
}
exit;