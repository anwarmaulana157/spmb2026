
 <?php

    if (isset($_GET["page"])) {
        $page = $_GET["page"];
    } else {
        $page = 1;
    }

    switch ($page) {

        case "1":
            require("dashboard.php");
            break;
        case "2":
            require("pendaftaran.php");
            break;
        case "3":
            require("sekolah.php");
            break;
        case "4":
            require("jurusan.php");
            break;
        case "5":
            require("tahun.php");
            break;
        case "6":
            require("petugas.php");
            break;
        case "7":
            require("verifikasi.php");
            break;
        case "8":
            require("cetak.php");
            break;
        case "9":
            require("pendaftaran/input_data.php");
            break;
        case "10":
            require("pendaftaran/edit_data.php");
            break;
    }
    ?>