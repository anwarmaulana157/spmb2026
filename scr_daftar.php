<?php
include "config/koneksi.php";

// ================= AMBIL DATA =================
$nisn  = trim($_POST['nisn']);
$nik   = trim($_POST['nik']);
$nama  = trim($_POST['nama']);
$jalur = $_POST['jalur']; // prestasi / umum
$telp  = trim($_POST['telp']);
$pass  = $_POST['password'];

if ($nisn == "" || $nik == "" || $nama == "" || $jalur == "" || $telp == "" || $pass == "") {
    echo "<script>
            alert('Semua field wajib diisi!');
            window.history.back();
          </script>";
    exit;
}

// Validasi minimal password
if (strlen($pass) < 6) {
    echo "<script>
            alert('Password minimal 6 karakter!');
            window.history.back();
          </script>";
    exit;
}

// HASH PASSWORD (AMAN)
$password = password_hash($pass, PASSWORD_DEFAULT);

// ================= ASAL SEKOLAH =================
$sekolah_id = $_POST['asal_sekolah']; // ID sekolah atau 'lainnya'

if ($sekolah_id == "") {
    echo "<script>
            alert('Asal sekolah wajib dipilih!');
            window.history.back();
          </script>";
    exit;
}

if ($sekolah_id === "lainnya") {

    $nama_sekolah_baru = trim($_POST['asal_sekolah_lainnya']);

    if ($nama_sekolah_baru === "") {
        echo "<script>
                alert('Nama sekolah asal harus diisi');
                window.history.back();
              </script>";
        exit;
    }

    // Cek apakah sekolah sudah ada
    $cek = mysqli_query($conn, "
        SELECT sekolah_id 
        FROM tb_sekolah_asal 
        WHERE nama_sekolah='$nama_sekolah_baru'
        LIMIT 1
    ");

    if (mysqli_num_rows($cek) > 0) {
        $row = mysqli_fetch_assoc($cek);
        $sekolah_id = $row['sekolah_id'];
    } else {
        mysqli_query($conn, "
            INSERT INTO tb_sekolah_asal (nama_sekolah)
            VALUES ('$nama_sekolah_baru')
        ");
        $sekolah_id = mysqli_insert_id($conn);
    }
} else {
    // Validasi FK sekolah
    $cek = mysqli_query($conn, "
        SELECT sekolah_id 
        FROM tb_sekolah_asal 
        WHERE sekolah_id='$sekolah_id'
        LIMIT 1
    ");

    if (mysqli_num_rows($cek) == 0) {
        echo "<script>
                alert('Sekolah asal tidak valid!');
                window.history.back();
              </script>";
        exit;
    }
}

// ================= JALUR & PREFIX =================
if ($jalur === "prestasi") {
    $prefix = "P-";
} elseif ($jalur === "umum") {
    $prefix = "U-";
} else {
    echo "<script>
            alert('Jalur pendaftaran tidak valid!');
            window.history.back();
          </script>";
    exit;
}

// ================= CEK NISN SUDAH ADA =================
$cekN = mysqli_query($conn, "SELECT nisn FROM tb_pendaftaran WHERE nisn='$nisn'");
if (mysqli_num_rows($cekN) > 0) {
    echo "<script>
            alert('NISN sudah terdaftar!');
            window.location='login';
          </script>";
    exit;
}

// ================= NO PENDAFTARAN =================
$data = mysqli_query($conn, "
    SELECT RIGHT(no_pendaftaran,4) AS nomor 
    FROM tb_pendaftaran
    ORDER BY nomor DESC
    LIMIT 1
");

if (mysqli_num_rows($data) > 0) {
    $row = mysqli_fetch_assoc($data);
    $urutan = (int)$row['nomor'] + 1;
} else {
    $urutan = 1;
}

$no_pendaftaran = $prefix . str_pad($urutan, 4, "0", STR_PAD_LEFT);

// ================= INSERT PENDAFTARAN =================
$query = mysqli_query($conn, "
    INSERT INTO tb_pendaftaran
    (no_pendaftaran, nisn, nik, nama_lengkap, sekolah_id, jalur, telp_hp, password)
    VALUES
    ('$no_pendaftaran', '$nisn', '$nik', '$nama', '$sekolah_id', '$jalur', '$telp', '$password')
");

if ($query) {
    echo "<script>
            alert('Pendaftaran berhasil! Nomor Anda: $no_pendaftaran');
            window.location='login';
          </script>";
} else {
    echo "<script>
            alert('Pendaftaran gagal!');
            window.history.back();
          </script>";
}
?>