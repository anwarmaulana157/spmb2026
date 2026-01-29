<?php
session_start();
include "../../config/koneksi.php";

if (!isset($_SESSION['pendaftaran_id'])) {
    header("Location: login.php");
    exit;
}

$pendaftaran_id = $_SESSION['pendaftaran_id'];

// ================= CEK STATUS =================
$q = mysqli_query($conn, "SELECT status FROM tb_pendaftaran WHERE pendaftaran_id='$pendaftaran_id'");
$st = mysqli_fetch_assoc($q);

if ($st['status'] == 'submit') {
    die("Data sudah dikunci, tidak dapat diubah!");
}

// ================= DATA POST =================
$kompetensi_id = $_POST['kompetensi_id'] ?? '';
$jenis_kelamin = $_POST['jenis_kelamin'] ?? '';
$tempat_lahir  = $_POST['tempat_lahir'] ?? '';
$tanggal_lahir = $_POST['tanggal_lahir'] ?? '';
$agama         = $_POST['agama'] ?? '';
$telp          = $_POST['telp_hp'] ?? '';
$alamat        = $_POST['alamat'] ?? '';
$desa          = $_POST['desa'] ?? '';
$kecamatan     = $_POST['kecamatan'] ?? '';
$kabupaten     = $_POST['kabupaten'] ?? '';
$tahun_id      = $_POST['tahun_id'] ?? '';

$sekolah_id      = $_POST['asal_sekolah'] ?? '';
$sekolah_lainnya = trim($_POST['asal_sekolah_lainnya'] ?? '');

$nik_ayah       = $_POST['nik_ayah'] ?? '';
$nama_ayah      = $_POST['nama_ayah'] ?? '';
$pekerjaan_ayah = $_POST['pekerjaan_ayah'] ?? '';

$nik_ibu        = $_POST['nik_ibu'] ?? '';
$nama_ibu       = $_POST['nama_ibu'] ?? '';
$pekerjaan_ibu  = $_POST['pekerjaan_ibu'] ?? '';
$telp_orangtua  = $_POST['telp_orangtua'] ?? '';

$status = $_POST['status'] ?? 'draft';


// ================= ASAL SEKOLAH =================
if ($sekolah_id === 'lainnya') {

    if ($sekolah_lainnya == '') {
        die("Nama sekolah asal harus diisi!");
    }

    // Cek apakah sekolah sudah ada
    $cek = mysqli_query($conn, "
        SELECT sekolah_id 
        FROM tb_sekolah_asal 
        WHERE nama_sekolah = '$sekolah_lainnya'
        LIMIT 1
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

// ================= UPDATE PENDAFTARAN =================
mysqli_query($conn, "
UPDATE tb_pendaftaran SET
    kompetensi_id='$kompetensi_id',
    jenis_kelamin='$jenis_kelamin',
    tempat_lahir='$tempat_lahir',
    tanggal_lahir='$tanggal_lahir',
    agama='$agama',
    telp_hp='$telp',
    alamat='$alamat',
    desa='$desa',
    kecamatan='$kecamatan',
    kabupaten='$kabupaten',
    tahun_id='$tahun_id',
    sekolah_id='$sekolah_id',
    status='$status',
    tanggal_submit = IF('$status'='submit', NOW(), tanggal_submit)
WHERE pendaftaran_id='$pendaftaran_id'
");

// ================= ORANG TUA =================
$cek = mysqli_query($conn, "SELECT * FROM tb_orang_tua WHERE pendaftaran_id='$pendaftaran_id'");
if (mysqli_num_rows($cek) > 0) {
    mysqli_query($conn, "
    UPDATE tb_orang_tua SET
        nik_ayah='$nik_ayah',
        nama_ayah='$nama_ayah',
        pekerjaan_ayah='$pekerjaan_ayah',
        nik_ibu='$nik_ibu',
        nama_ibu='$nama_ibu',
        pekerjaan_ibu='$pekerjaan_ibu',
        telp_orangtua='$telp_orangtua'
    WHERE pendaftaran_id='$pendaftaran_id'
    ");
} else {
    mysqli_query($conn, "
    INSERT INTO tb_orang_tua
    (pendaftaran_id,nik_ayah,nama_ayah,pekerjaan_ayah,nik_ibu,nama_ibu,pekerjaan_ibu,telp_orangtua)
    VALUES
    ('$pendaftaran_id','$nik_ayah','$nama_ayah','$pekerjaan_ayah','$nik_ibu','$nama_ibu','$pekerjaan_ibu','$telp_orangtua')
    ");
}

// ================= FUNGSI UPLOAD =================
function uploadFile($name, $folder)
{
    if (!isset($_FILES[$name]) || $_FILES[$name]['error'] != 0) return null;

    $ext = strtolower(pathinfo($_FILES[$name]['name'], PATHINFO_EXTENSION));
    $allow = ['pdf', 'jpg', 'jpeg', 'png'];

    if (!in_array($ext, $allow)) die("Format $name tidak valid!");
    if ($_FILES[$name]['size'] > 2097152) die("Ukuran $name melebihi 2MB!");

    if (!is_dir($folder)) mkdir($folder, 0777, true);

    $new = uniqid() . "." . $ext;
    move_uploaded_file($_FILES[$name]['tmp_name'], $folder . $new);
    return $new;
}

// ================= UPLOAD =================
$ijazah     = uploadFile('ijazah', 'uploads/ijazah/');
$skl        = uploadFile('skl', 'uploads/skl/');
$raport     = uploadFile('raport', 'uploads/raport/');
$foto       = uploadFile('foto', 'uploads/foto/');
$nisn       = uploadFile('kartu_nisn', 'uploads/nisn/');
$akte       = uploadFile('akte', 'uploads/akte/');
$kk         = uploadFile('kk', 'uploads/kk/');
$sertifikat = uploadFile('sertifikat', 'uploads/sertifikat/');

// ================= SIMPAN BERKAS =================
$cek = mysqli_query($conn, "SELECT * FROM tb_berkas WHERE pendaftaran_id='$pendaftaran_id'");

if (mysqli_num_rows($cek) > 0) {

    $update = [];
    if ($ijazah)     $update[] = "ijazah='$ijazah'";
    if ($skl)        $update[] = "sk_lulus='$skl'";
    if ($raport)     $update[] = "raport='$raport'";
    if ($foto)       $update[] = "foto='$foto'";
    if ($nisn)       $update[] = "file_nisn='$nisn'";
    if ($akte)       $update[] = "akte='$akte'";
    if ($kk)         $update[] = "kartu_keluarga='$kk'";
    if ($sertifikat) $update[] = "sertifikat='$sertifikat'";

    if (!empty($update)) {
        mysqli_query($conn, "
            UPDATE tb_berkas SET " . implode(",", $update) . "
            WHERE pendaftaran_id='$pendaftaran_id'
        ");
    }
} else {

    mysqli_query($conn, "
    INSERT INTO tb_berkas
    (pendaftaran_id,ijazah,sk_lulus,raport,foto,file_nisn,akte,kartu_keluarga,sertifikat)
    VALUES
    ('$pendaftaran_id','$ijazah','$skl','$raport','$foto','$nisn','$akte','$kk','$sertifikat')
    ");
}

echo "<script>alert('Data berhasil disimpan');window.location='../';</script>";
