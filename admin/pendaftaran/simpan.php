<?php
session_start();
include "../../config/koneksi.php";

// ================== VALIDASI LOGIN ==================
if (!isset($_SESSION['user_id'])) {
    header("Location: ../../login.php");
    exit;
}

$user_id = $_SESSION['user_id'];



// ================== AMBIL DATA FORM ==================
$no_pendaftaran = $_POST['no_pendaftaran'];
$jalur          = $_POST['jalur'];
$nisn           = $_POST['nisn'];
$nik            = $_POST['nik'];
$password       = "123456";
$pass           = password_hash($password, PASSWORD_DEFAULT);
$nama_lengkap   = $_POST['nama'];
$tempat_lahir  = $_POST['tempat_lahir'];
$tanggal_lahir = $_POST['tanggal_lahir'];
$jenis_kelamin = $_POST['jenis_kelamin'];
$agama         = $_POST['agama'];
$telp_hp       = $_POST['telp_hp'];
$alamat        = $_POST['alamat'];
$desa          = $_POST['desa'];
$kecamatan     = $_POST['kecamatan'];
$kabupaten     = $_POST['kabupaten'];
$sekolah_id      = $_POST['asal_sekolah'];
$sekolah_lainnya = trim($_POST['asal_sekolah_lainnya']);
$kompetensi_id  = $_POST['kompetensi_id'];

$tahun_id      = $_POST['tahun_id'];
$status        = $_POST['status'];


$nik_ayah       = $_POST['nik_ayah'];
$nama_ayah      = $_POST['nama_ayah'];
$pekerjaan_ayah = $_POST['pekerjaan_ayah'];

$nik_ibu        = $_POST['nik_ibu'];
$nama_ibu       = $_POST['nama_ibu'];
$pekerjaan_ibu  = $_POST['pekerjaan_ibu'];
$telp_orangtua  = $_POST['telp_orangtua'];
$tanggal_submit = "NOW()";
// ================== SEKOLAH LAINNYA ==================
if ($sekolah_id == 'lainnya') {

    $cek = mysqli_query($conn, "
        SELECT sekolah_id FROM tb_sekolah_asal 
        WHERE nama_sekolah='$sekolah_lainnya' LIMIT 1
    ");

    if (mysqli_num_rows($cek) > 0) {
        $row = mysqli_fetch_assoc($cek);
        $sekolah_id = $row['sekolah_id'];
    } else {
        mysqli_query($conn, "
            INSERT INTO tb_sekolah_asal (nama_sekolah)
            VALUES ('$sekolah_lainnya')
        ");
        $sekolah_id = mysqli_insert_id($conn);
    }
}

// ================== INSERT PENDAFTARAN ==================
$query = mysqli_query($conn, "
INSERT INTO tb_pendaftaran
(
    no_pendaftaran,
    jalur,
    nisn,
    nik,
    password,
    nama_lengkap,
    tempat_lahir,
    tanggal_lahir,
    jenis_kelamin,
    agama,
    telp_hp,
    alamat,
    desa,
    kecamatan,
    kabupaten,
    sekolah_id,
    kompetensi_id,
    tahun_id,
    status,
    tanggal_submit,
    user_id
)
VALUES
(
    '$no_pendaftaran',
    '$jalur',
    '$nisn',
    '$nik',
    '$pass',
    '$nama_lengkap',
    '$tempat_lahir',
    '$tanggal_lahir',
    '$jenis_kelamin',
    '$agama',
    '$telp_hp',
    '$alamat',
    '$desa',
    '$kecamatan',
    '$kabupaten',
    '$sekolah_id',
    '$kompetensi_id',
    '$tahun_id',
    '$status',
    '$tanggal_submit',
    '$user_id'
)
");

$pendaftaran_id = mysqli_insert_id($conn);

// ================== INSERT ORANG TUA ==================
mysqli_query($conn, "
INSERT INTO tb_orang_tua
(
    pendaftaran_id,nik_ayah,nama_ayah,pekerjaan_ayah,
    nik_ibu,nama_ibu,pekerjaan_ibu,telp_orangtua
)
VALUES
(
    '$pendaftaran_id','$nik_ayah','$nama_ayah','$pekerjaan_ayah',
    '$nik_ibu','$nama_ibu','$pekerjaan_ibu','$telp_orangtua'
)
");

// ================== FUNCTION UPLOAD + KOMPRES ==================
function uploadFile($name, $folder)
{
    if (!isset($_FILES[$name]) || $_FILES[$name]['error'] != 0) return null;

    $ext = strtolower(pathinfo($_FILES[$name]['name'], PATHINFO_EXTENSION));
    $allow = ['pdf', 'jpg', 'jpeg', 'png'];

    if (!in_array($ext, $allow)) die("Format $name tidak valid!");
    if ($_FILES[$name]['size'] > 5242880) die("Ukuran $name melebihi 5MB!");

    if (!is_dir($folder)) mkdir($folder, 0777, true);

    $new = uniqid() . "." . $ext;
    $dest = $folder . $new;
    $tmp = $_FILES[$name]['tmp_name'];

    if (in_array($ext, ['jpg', 'jpeg', 'png'])) {

        if ($ext == 'png') {
            $img = imagecreatefrompng($tmp);
            imagejpeg($img, $dest, 70);
        } else {
            $img = imagecreatefromjpeg($tmp);
            imagejpeg($img, $dest, 70);
        }
        imagedestroy($img);
    } else {
        move_uploaded_file($tmp, $dest);
    }

    return $new;
}

// ================== UPLOAD FILE ==================
$ijazah     = uploadFile('ijazah', '../../uploads/ijazah/');
$skl        = uploadFile('skl', '../../uploads/skl/');
$raport     = uploadFile('raport', '../../uploads/raport/');
$foto       = uploadFile('foto', '../../uploads/foto/');
$nisn       = uploadFile('kartu_nisn', '../../uploads/nisn/');
$akte       = uploadFile('akte', '../../uploads/akte/');
$kk         = uploadFile('kk', '../../uploads/kk/');
$sertifikat = uploadFile('sertifikat', '../../uploads/sertifikat/');

// ================== INSERT BERKAS ==================
mysqli_query($conn, "
INSERT INTO tb_berkas
(
    pendaftaran_id,ijazah,sk_lulus,raport,foto,
    file_nisn,akte,kartu_keluarga,sertifikat
)
VALUES
(
    '$pendaftaran_id','$ijazah','$skl','$raport','$foto',
    '$nisn','$akte','$kk','$sertifikat'
)
");

// ================== REDIRECT ALERT ==================
if ($query) {
    header("Location: ../index.php?page=2");
    exit;
} else {
    header("Location: ../index.php?page=2");
    exit;
}
