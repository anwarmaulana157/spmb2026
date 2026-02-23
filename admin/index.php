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
    <?php include "sekolah/modal.php";?>
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
    
<script>
const searchInput = document.getElementById("searchInput");
const filterJalur = document.getElementById("filterJalur");
const filterStatus = document.getElementById("filterStatus");
const pagination = document.getElementById("pagination");

const rows = Array.from(document.querySelectorAll("#navTable tbody tr"));


let currentPage = 1;
const rowsPerPage = 2;

// trigger
searchInput.addEventListener("input", filterTable);
filterJalur.addEventListener("change", filterTable);
filterStatus.addEventListener("change", filterTable);

function filterTable() {
  const keyword = searchInput.value.toLowerCase().trim();
  const jalur = filterJalur.value.toLowerCase();
  const status = filterStatus.value.toLowerCase();

  rows.forEach(row => {
    const nisn = row.querySelector(".td-nisn").innerText.toLowerCase();
    const nama = row.querySelector(".td-nama").innerText.toLowerCase();
    const sekolah = row.querySelector(".td-sekolah").innerText.toLowerCase();
    const rowJalur = row.querySelector(".td-jalur").innerText.toLowerCase();
    const rowStatus = row.querySelector(".td-status").innerText.toLowerCase();

    const matchSearch =
      !keyword ||
      nisn === keyword ||
      nama.includes(keyword) ||
      sekolah.includes(keyword);

    const matchJalur = !jalur || rowJalur === jalur;
    const matchStatus = !status || rowStatus === status;

    // LANGSUNG dari data asli
    row.classList.toggle("filtered", matchSearch && matchJalur && matchStatus);
  });

  currentPage = 1;
  paginate();
}


function paginate() {
  const filteredRows = rows.filter(row => row.classList.contains("filtered"));

  rows.forEach(row => row.style.display = "none");

  const start = (currentPage - 1) * rowsPerPage;
  const end = start + rowsPerPage;

  filteredRows.slice(start, end).forEach(row => {
    row.style.display = "";
  });

  renderPagination(filteredRows.length);
}

function renderPagination(totalRows) {
  pagination.innerHTML = "";
  const totalPages = Math.ceil(totalRows / rowsPerPage);

  for (let i = 1; i <= totalPages; i++) {
    const btn = document.createElement("button");
    btn.innerText = i;
    btn.className = `px-3 py-1 rounded border ${
      i === currentPage ? "bg-sky-500 text-white" : "bg-white"
    }`;

    btn.onclick = () => {
      currentPage = i;
      paginate();
    };

    pagination.appendChild(btn);
  }
}

// init
rows.forEach(r => r.classList.add("filtered"));
paginate();
</script>

  </body>
</html>