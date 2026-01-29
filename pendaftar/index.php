<?php
session_start();
include "../config/koneksi.php";
if (!isset($_SESSION['login'])) {
    header("Location: ../login.php");
    exit;
}

$nama = $_SESSION['nama'];
$inisial = strtoupper(substr($nama, 0, 1));
$pendaftaran_id = $_SESSION['pendaftaran_id']; // tambahkan ini
$q = mysqli_query($conn, "
SELECT 
    p.*,

    -- ORANG TUA
    o.nik_ayah, o.nama_ayah, o.pekerjaan_ayah,
    o.nik_ibu,  o.nama_ibu,  o.pekerjaan_ibu,
    o.telp_orangtua,

    -- BERKAS
    b.ijazah, 
    b.foto,

    -- ASAL SEKOLAH
    s.nama_sekolah,
    s.npsn,

    -- KOMPETENSI
    k.nama_kompetensi

FROM tb_pendaftaran p

LEFT JOIN tb_orang_tua o 
    ON p.pendaftaran_id = o.pendaftaran_id

LEFT JOIN tb_berkas b 
    ON p.pendaftaran_id = b.pendaftaran_id

LEFT JOIN tb_sekolah_asal s 
    ON p.sekolah_id = s.sekolah_id

LEFT JOIN tb_kompetensi k 
    ON p.kompetensi_id = k.kompetensi_id

WHERE p.pendaftaran_id = '$pendaftaran_id'
LIMIT 1;

");

$data = mysqli_fetch_assoc($q);
$isLocked = ($data['status'] === 'submit');
$status = $data['status'];

?>


<!doctype html>
<html lang="id" class="h-full">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Panel PPDB</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="/_sdk/element_sdk.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&amp;display=swap" rel="stylesheet">
    <style>
        body {
            box-sizing: border-box;
        }

        * {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }

        .sidebar-item {
            transition: all 0.2s ease;
        }

        .sidebar-item:hover {
            transform: translateX(4px);
        }

        .card-form {
            transition: all 0.3s ease;
        }

        .card-form:hover {
            box-shadow: 0 12px 24px -8px rgba(0, 0, 0, 0.1);
        }

        .fade-in {
            animation: fadeIn 0.4s ease;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .form-section {
            animation: slideIn 0.5s ease backwards;
        }

        .form-section:nth-child(1) {
            animation-delay: 0.1s;
        }

        .form-section:nth-child(2) {
            animation-delay: 0.2s;
        }

        .form-section:nth-child(3) {
            animation-delay: 0.3s;
        }

        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateX(-20px);
            }

            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        .progress-bar {
            transition: width 0.3s ease;
        }

        input:focus,
        textarea:focus,
        select:focus {
            outline: none;
            ring: 2px;
        }

        .sidebar-transition {
            transition: transform 0.3s cubic-bezier(0.4, 0, 0.2, 1), opacity 0.3s ease;
        }

        .overlay-transition {
            transition: opacity 0.3s ease;
        }

        .toggle-btn {
            transition: all 0.3s ease;
        }

        .toggle-btn:hover {
            transform: scale(1.05);
        }

        .sidebar-item {
            transition: all 0.2s ease;
        }

        .sidebar-item:hover {
            transform: translateX(4px);
        }

        @keyframes slideIn {
            from {
                transform: translateX(-100%);
                opacity: 0;
            }

            to {
                transform: translateX(0);
                opacity: 1;
            }
        }

        @keyframes slideOut {
            from {
                transform: translateX(0);
                opacity: 1;
            }

            to {
                transform: translateX(-100%);
                opacity: 0;
            }
        }

        .slide-in {
            animation: slideIn 0.3s forwards;
        }

        .slide-out {
            animation: slideOut 0.3s forwards;
        }
    </style>
    <style>
        @view-transition {
            navigation: auto;
        }
    </style>
    <script src="/_sdk/data_sdk.js" type="text/javascript"></script>
</head>

<body class="h-full bg-gradient-to-br from-slate-50 to-slate-100">

    <div class="flex h-full"><!-- Sidebar -->
        <?php include "templates/sidebar.php" ?>
        <!-- Main Content -->
        <div class="flex-1 flex flex-col overflow-hidden">
            <?php include "load.php" ?>
        </div>
    </div><!-- Logout Modal -->
    <div id="logout-modal" class="hidden fixed inset-0 bg-black/50 flex items-center justify-center z-50">
        <div class="bg-white rounded-2xl p-6 w-full max-w-sm mx-4 shadow-2xl">
            <div class="text-center">
                <div class="w-16 h-16 bg-red-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-red-600" fill="none" stroke="currentColor" viewbox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                    </svg>
                </div>
                <h3 class="text-lg font-bold text-slate-800 mb-2">Konfirmasi Logout</h3>
                <p class="text-sm text-slate-500 mb-6">Apakah Anda yakin ingin keluar dari portal?</p>
                <div class="flex items-center gap-3"><button onclick="closeLogoutModal()" class="flex-1 px-4 py-2.5 border border-slate-200 text-slate-600 rounded-xl font-medium hover:bg-slate-50 transition-colors">Batal</button> <a href="../scr_logout" class="flex-1 px-4 py-2.5 bg-red-500 hover:bg-red-600 text-white rounded-xl font-medium transition-colors">Ya, Logout</a>
                </div>
            </div>
        </div>
    </div>
    <script>
        let sidebarOpen = false;

        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            const overlay = document.getElementById('sidebar-overlay');
            const menuIcon = document.getElementById('menu-icon');
            const closeIcon = document.getElementById('close-icon');

            sidebarOpen = !sidebarOpen;

            if (sidebarOpen) {
                sidebar.classList.remove('-translate-x-full');
                sidebar.classList.add('translate-x-0');
                overlay.classList.remove('hidden');
                menuIcon.classList.add('hidden');
                closeIcon.classList.remove('hidden');
            } else {
                sidebar.classList.add('-translate-x-full');
                sidebar.classList.remove('translate-x-0');
                overlay.classList.add('hidden');
                menuIcon.classList.remove('hidden');
                closeIcon.classList.add('hidden');
            }
        }

        function handleLogout() {
            const logoutBtn = document.querySelector('button[onclick="handleLogout()"]');
            logoutBtn.innerHTML = `
                <svg class="w-5 h-5 animate-spin" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path>
                </svg>
                <span class="font-medium">Logging out...</span>
            `;

            setTimeout(() => {
                logoutBtn.innerHTML = `
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                    </svg>
                    <span class="font-medium">Logout</span>
                `;
            }, 2000);
        }

        // Close sidebar when clicking on navigation links (mobile)
        document.querySelectorAll('.sidebar-item').forEach(item => {
            item.addEventListener('click', () => {
                if (window.innerWidth < 1024 && sidebarOpen) {
                    toggleSidebar();
                }
            });
        });

        // Handle window resize
        window.addEventListener('resize', () => {
            if (window.innerWidth >= 1024) {
                const sidebar = document.getElementById('sidebar');
                const overlay = document.getElementById('sidebar-overlay');
                sidebar.classList.remove('-translate-x-full');
                sidebar.classList.add('translate-x-0');
                overlay.classList.add('hidden');
                sidebarOpen = false;
                document.getElementById('menu-icon').classList.remove('hidden');
                document.getElementById('close-icon').classList.add('hidden');
            } else if (!sidebarOpen) {
                const sidebar = document.getElementById('sidebar');
                sidebar.classList.add('-translate-x-full');
                sidebar.classList.remove('translate-x-0');
            }
        });

        async function onConfigChange(config) {
            document.getElementById('portal-title').textContent = config.portal_title || defaultConfig.portal_title;
            document.getElementById('portal-subtitle').textContent = config.user_role || defaultConfig.user_role;
            document.getElementById('user-role').textContent = config.user_role || defaultConfig.user_role;
        }

        function mapToCapabilities(config) {
            return {
                recolorables: [{
                        get: () => config.primary_color || defaultConfig.primary_color,
                        set: (value) => {
                            config.primary_color = value;
                            window.elementSdk.setConfig({
                                primary_color: value
                            });
                        }
                    },
                    {
                        get: () => config.bg_color || defaultConfig.bg_color,
                        set: (value) => {
                            config.bg_color = value;
                            window.elementSdk.setConfig({
                                bg_color: value
                            });
                        }
                    }
                ],
                borderables: [],
                fontEditable: undefined,
                fontSizeable: undefined
            };
        }

        function mapToEditPanelValues(config) {
            return new Map([
                ['portal_title', config.portal_title || defaultConfig.portal_title],
                ['user_role', config.user_role || defaultConfig.user_role]
            ]);
        }

        if (window.elementSdk) {
            window.elementSdk.init({
                defaultConfig,
                onConfigChange,
                mapToCapabilities,
                mapToEditPanelValues
            });
        }
    </script>
    <script>
        function toggleSekolahLainnya() {
            const select = document.getElementById('asal_sekolah');
            const inputLainnya = document.getElementById('asal_sekolah_lainnya');

            if (select.value === 'lainnya') {
                inputLainnya.classList.remove('hidden');
                inputLainnya.required = true;
            } else {
                inputLainnya.classList.add('hidden');
                inputLainnya.required = false;
                inputLainnya.value = '';
            }
        }
        const defaultConfig = {
            app_title: 'Portal SPMB',
            school_name: 'SMK Informatika Sumedang',
            admin_name: 'Administrator',
            user_name: 'Anwar Maulana'
        };

        let config = {
            ...defaultConfig
        };



        // Update form based on jalur selection
        function updateFormJalur() {
            const jalur = document.getElementById('jalur').value.toLowerCase();
            const raportDoc = document.getElementById('raport-doc');
            const sertifikatDoc = document.getElementById('sertifikat-doc');

            if (jalur === 'prestasi') {
                raportDoc.classList.remove('hidden');
                sertifikatDoc.classList.remove('hidden');
            } else {
                raportDoc.classList.add('hidden');
                sertifikatDoc.classList.add('hidden');
            }
        }

        // jalankan saat halaman pertama kali dibuka
        document.addEventListener("DOMContentLoaded", updateFormJalur);



        // Logout functions
        function handleLogout() {
            document.getElementById('logout-modal').classList.remove('hidden');
        }

        function closeLogoutModal() {
            document.getElementById('logout-modal').classList.add('hidden');
        }

        function confirmLogout() {
            closeLogoutModal();
            const main = document.querySelector('main');
            main.innerHTML = `
        <div class="flex items-center justify-center h-full">
          <div class="text-center">
            <div class="w-20 h-20 bg-emerald-100 rounded-full flex items-center justify-center mx-auto mb-4">
              <svg class="w-10 h-10 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
              </svg>
            </div>
            <h3 class="text-xl font-bold text-slate-800 mb-2">Logout Berhasil</h3>
            <p class="text-slate-500">Anda telah berhasil keluar dari portal.</p>
          </div>
        </div>
      `;
        }

        // Element SDK initialization
        async function onConfigChange(cfg) {
            config = {
                ...defaultConfig,
                ...cfg
            };

            document.getElementById('user-name').textContent = config.user_name || defaultConfig.user_name;
            const initial = (config.user_name || defaultConfig.user_name).charAt(0).toUpperCase();
            document.getElementById('user-initial').textContent = initial;
        }

        function mapToCapabilities(cfg) {
            return {
                recolorables: [],
                borderables: [],
                fontEditable: undefined,
                fontSizeable: undefined
            };
        }

        function mapToEditPanelValues(cfg) {
            return new Map([
                ['user_name', cfg.user_name || defaultConfig.user_name]
            ]);
        }

        if (window.elementSdk) {
            window.elementSdk.init({
                defaultConfig,
                onConfigChange,
                mapToCapabilities,
                mapToEditPanelValues
            });
        }
    </script>
    <script>
        (function() {
            function c() {
                var b = a.contentDocument || a.contentWindow.document;
                if (b) {
                    var d = b.createElement('script');
                    d.innerHTML = "window.__CF$cv$params={r:'9c389b131247fd2c',t:'MTc2OTM1Mjg2Ni4wMDAwMDA='};var a=document.createElement('script');a.nonce='';a.src='/cdn-cgi/challenge-platform/scripts/jsd/main.js';document.getElementsByTagName('head')[0].appendChild(a);";
                    b.getElementsByTagName('head')[0].appendChild(d)
                }
            }
            if (document.body) {
                var a = document.createElement('iframe');
                a.height = 1;
                a.width = 1;
                a.style.position = 'absolute';
                a.style.top = 0;
                a.style.left = 0;
                a.style.border = 'none';
                a.style.visibility = 'hidden';
                document.body.appendChild(a);
                if ('loading' !== document.readyState) c();
                else if (window.addEventListener) document.addEventListener('DOMContentLoaded', c);
                else {
                    var e = document.onreadystatechange || function() {};
                    document.onreadystatechange = function(b) {
                        e(b);
                        'loading' !== document.readyState && (document.onreadystatechange = e, c())
                    }
                }
            }
        })();
    </script>
    <script>
        function hitungProgress() {
            const fields = document.querySelectorAll('[data-required="1"]');
            let total = 0;
            let filled = 0;

            fields.forEach(field => {

                // Abaikan jika parent hidden
                if (field.closest('.hidden')) return;

                total++;

                // FILE
                if (field.type === "file") {
                    // Cek: ada file di server?
                    if (field.nextElementSibling && field.nextElementSibling.classList.contains("text-green-600")) {
                        filled++;
                    }
                    // Atau user baru upload
                    else if (field.files.length > 0) {
                        filled++;
                    }
                }

                // SELECT
                else if (field.tagName === "SELECT") {
                    if (field.value !== "") filled++;
                }

                // INPUT BIASA
                else {
                    if (field.value.trim() !== "") filled++;
                }
            });

            let persen = total === 0 ? 0 : Math.round((filled / total) * 100);

            document.getElementById("progress-percent").innerText = persen + "%";
            document.getElementById("progress-bar").style.width = persen + "%";
        }

        document.addEventListener("DOMContentLoaded", hitungProgress);
        document.addEventListener("input", hitungProgress);
        document.addEventListener("change", hitungProgress);
    </script>


</body>

</html>