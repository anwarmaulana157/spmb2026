<?php
include "../../config/koneksi.php";
session_start();

$no_pendaftaran = $_GET['no'] ?? '';

if (!$no_pendaftaran) {
  die("No Pendaftaran tidak ditemukan");
}

$query = mysqli_query($conn, "
  SELECT 
    p.no_pendaftaran,
    p.nisn,
    p.jalur,
    p.nama_lengkap,
    s.nama_sekolah,
    b.foto
  FROM tb_pendaftaran p
  LEFT JOIN tb_sekolah_asal s 
    ON p.sekolah_id = s.sekolah_id LEFT JOIN tb_berkas b ON b.pendaftaran_id=p.pendaftaran_id
  WHERE p.no_pendaftaran = '$no_pendaftaran'
");

$data = mysqli_fetch_assoc($query);

if (!$data) {
  die("Data tidak ditemukan");
}
?>
<!doctype html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Cetak Kartu Pendaftaran</title>
  <style>
  body {
    font-family: Arial, sans-serif;
    margin: 0;
  }

  /* Kartu */
  .card {
    width: 21cm;
    border: 1px solid #000;
    padding: 15px;
    margin: auto;
    font-size: 12px;
    position: relative; /* wajib untuk watermark */
  }

  /* Watermark */
  .card::before {
    content: "SMK INFORMATIKA SUMEDANG";
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%) rotate(-30deg);
    font-size: 42px;
    font-weight: bold;
    color: rgba(0, 0, 0, 0.08);
    white-space: nowrap;
    pointer-events: none;
    z-index: 0;
  }

  /* Pastikan konten di atas watermark */
  .header-wrap,
  table,
  .catatan-wrap {
    position: relative;
    z-index: 1;
  }

  /* Header + Logo */
  .header-wrap {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 10px;
  }

  .header {
    text-align: center;
    font-weight: bold;
    line-height: 1.4;
    flex: 1;
  }

  .logo {
    width: 60px;
    height: auto;
  }

  /* Tabel Data */
  table {
    width: 100%;
    font-size: 12px;
    border-collapse: collapse;
  }

  td {
    padding: 4px 6px;
    vertical-align: top;
  }

  .data td:first-child {
    width: 140px;
  }

  /* Foto */
  .foto {
    width: 110px;
    height: 140px;
    border: 1px solid #000;
    object-fit: cover;
  }

  /* Tanda Tangan */
  .ttd {
   width: 20%;
  display: flex;
  justify-content: flex-end; /* bikin TTD nempel bawah */
  align-items: flex-end;
  text-align: center;
  font-size: 12px;
  }

  .ttd-box {
    margin-top: 50px;
  }

  /* Catatan & QR */
  .catatan-wrap {
    display: flex;
  gap: 15px;
  margin-top: 20px;
  align-items: stretch; 
  }

  .catatan {
    width: 70%;
  border: 1px dashed #000;
  padding: 10px;
  font-size: 11px;
  }

  .catatan p {
    margin: 0 0 6px 0;
    text-align: justify;
  }
  .catatan-inner {
  display: flex;
  gap: 10px;
  align-items: center;
  }
  .catatan-text p {
  margin: 0 0 6px 0;
  text-align: justify;
}

  .qr {
    text-align: center;
    margin-top: 8px;
  }

  .qr img {
    width: 90px;
    height: 90px;
  }

  /* Mode Cetak */
  @media print {
    body {
      margin: 0;
    }

    .card {
      border: 1px solid #000;
    }
  }
</style>

</head>
<body onload="window.print()">

<div class="card">

  <!-- Header + Logo -->
  <div class="header-wrap">
    <img src="../../assets/img/logo.png" class="logo kiri">
    
    <div class="header">
      KARTU PENDAFTARAN<br>
      SISTEM PENERIMAAN MURID BARU<br>
      TAHUN 2026/2027
    </div>

    <img src="../../assets/img/yps.png" class="logo kanan">
  </div>

  <hr>

  <table width="100%">
    <tr>
      <td width="65%" valign="top">
        <table class="data">
          <tr>
            <td>No Pendaftaran</td>
            <td>: <?= $data['no_pendaftaran']; ?></td>
          </tr>
          <tr>
            <td>NISN</td>
            <td>: <?= $data['nisn']; ?></td>
          </tr>
          <tr>
            <td>Jalur</td>
            <td>: <?= $data['jalur']; ?></td>
          </tr>
          <tr>
            <td>Nama Lengkap</td>
            <td>: <?= $data['nama_lengkap']; ?></td>
          </tr>
          <tr>
            <td>Asal Sekolah</td>
            <td>: <?= $data['nama_sekolah']; ?></td>
          </tr>
        </table>
      </td>

      <td width="35%" align="center">
        <?php if (!empty($data['foto']) && file_exists("../../uploads/foto/".$data['foto'])): ?>
          <img src="../../uploads/foto/<?= $data['foto']; ?>" class="foto">
        <?php else: ?>
          <div class="foto" style="display:flex;align-items:center;justify-content:center;">
            <span style="font-size:11px;color:#666;">FOTO</span>
          </div>
        <?php endif; ?>
      </td>

    </tr>
  </table>

  <div class="catatan-wrap">

  <!-- Catatan -->
  <div class="catatan">
    <div class="catatan-inner">

      <!-- QR KIRI -->
      <div class="qr">
        <?php if (strtolower($data['jalur']) === 'prestasi'): ?>
          <img src="../assets/img/qr1.png" alt="QR Code Jalur Prestasi">
        <?php else: ?>
          <img src="../assets/img/qr2.png" alt="QR Code Jalur Umum">
        <?php endif; ?>
      </div>

      <!-- TEKS KANAN -->
      <div class="catatan-text">
        <p><strong>Catatan:</strong></p>
        <p>
          Kartu ini sebagai bukti bahwa Anda telah melakukan pendaftaran.
          Mohon kartu ini dibawa saat mengikuti proses seleksi.
        </p>
        <p>
          Jika Anda belum bergabung ke grup WhatsApp,
          silakan scan QR Code di samping.
        </p>
      </div>

    </div>
  </div>

  <!-- Tanda Tangan -->
  <div class="ttd">
    <div>
      Panitia
      <div class="ttd-box">
        ( <?= $_SESSION['nama']; ?> )
      </div>
    </div>
  </div>

</div>


</div>

</body>
</html>
