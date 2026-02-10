<?php
include "../../config/koneksi.php";
$pendaftaran_id=$_POST['pendaftaran_id'];
$pass = password_hash($_POST['password'], PASSWORD_DEFAULT);
$query=mysqli_query($conn,"UPDATE tb_pendaftaran SET password='$pass' WHERE pendaftaran_id='$pendaftaran_id'");

if ($query) {
    header("Location: ../index.php?page=2");
} else {
    header("Location: ../index.php?page=2");
}
exit;