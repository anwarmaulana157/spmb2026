
 <?php

    if (isset($_GET["page"])) {
        $page = $_GET["page"];
    } else {
        $page = 1;
    }

    switch ($page) {

        case "1":
            require("dashboard/index.php");
            break;
        case "2":
            require("pendaftar/index.php");
            break;
        case "3":
            require("sekolah/index.php");
            break;
        case "4":
            require("jurusan/index.php");
            break;
        case "5":
            require("tahun/index.php");
            break;
        case "6":
            require("verifikasi/index.php");
            break;
        case "7":
            require("rekap/index.php");
            break;
        case "8":
            require("cetak/index.php");
            break;
        case "9":
            require("petugas/index.php");
            break;
    }
    ?>