<?php
session_start();

// 1. CEK LOGIN
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;

}
$nama=$_SESSION['nama'];

include "../config/koneksi.php";

// 3. AMBIL NO PENDAFTARAN TERAKHIR
$q = mysqli_query($conn, "
    SELECT no_pendaftaran 
    FROM tb_pendaftaran 
    ORDER BY pendaftaran_id DESC 
    LIMIT 1
");

$lastNumber = 0;

if (mysqli_num_rows($q) > 0) {
    $row = mysqli_fetch_assoc($q);
    $lastNumber = (int) substr($row['no_pendaftaran'], 2);
    // P-0045 → 45
}
?>
<!doctype html>
<html lang="id" class="h-full">
  <!-- Header & Title -->
   
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Panel SPMB</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&amp;display=swap" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/style.css">
  <style>@view-transition { navigation: auto; }</style>
</head>

<body class="h-full bg-slate-100">
  <div id="app" class="h-full flex overflow-hidden">

    <!-- Mobile Overlay -->
    <div id="mobileOverlay" class="fixed inset-0 bg-black/50 z-40 hidden lg:hidden" onclick="toggleSidebar()"></div>

    <!-- Sidebar -->
    <?php include "templates/sidebar.php";?>
    <!-- Main Content -->
    <?php include "load.php";?>
    <!-- Modal -->
    <?php include "petugas/modal.php";?>
    <?php include "pendaftaran/modal.php";?>
  <script src="assets/js/app.js" defer></script>
  <script>
  
        let lastNumber = <?= (int)$lastNumber ?>; // dari PHP

        function generateNo() {
            let jalur = document.getElementById("jalur").value;
            let input = document.getElementById("no_pendaftaran");

            if (jalur === "") {
                input.value = "";
                return;
            }

            let prefix = jalur === "Prestasi" ? "P" : "U";
            let next = lastNumber + 1;
            let padded = String(next).padStart(4, '0');

            input.value = prefix + "-" + padded;
        }
    </script>
  </body>
</html>