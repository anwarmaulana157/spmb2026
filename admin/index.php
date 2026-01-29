<!doctype html>
<html lang="id" class="h-full">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel SPDB</title>
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

        .submenu {
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.3s ease;
        }

        .submenu.open {
            max-height: 500px;
        }

        .card-stat {
            transition: all 0.3s ease;
        }

        .card-stat:hover {
            transform: translateY(-4px);
            box-shadow: 0 12px 24px -8px rgba(0, 0, 0, 0.15);
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

        .pulse-dot {
            animation: pulse 2s infinite;
        }

        @keyframes pulse {

            0%,
            100% {
                opacity: 1;
            }

            50% {
                opacity: 0.5;
            }
        }
    </style>
    <style>
        @view-transition {
            navigation: auto;
        }
    </style>
    <script src="/_sdk/data_sdk.js" type="text/javascript"></script>
</head>

<body class="h-full bg-slate-100">
    <div class="flex h-full">
        <!-- Sidebar -->
        <?php include "templates/sidebar.php" ?>
        <!-- Main Content -->
        <div class="flex-1 flex flex-col overflow-hidden">
            <!-- Top Header -->
            <?php include "templates/header.php" ?>
            <!-- Page Content -->
            <main class="flex-1 p-6 overflow-y-auto">
                <?php include "load.php" ?>
            </main>
        </div>
    </div>
    <script>
        const defaultConfig = {
            app_title: 'PPDB Online',
            school_name: 'SMK Negeri 1',
            admin_name: 'Administrator',
            primary_color: '#10b981',
            secondary_color: '#0f172a',
            text_color: '#334155',
            accent_color: '#f59e0b',
            surface_color: '#ffffff'
        };

        let config = {
            ...defaultConfig
        };

        // Toggle submenu
        function toggleSubmenu(menu) {
            const submenu = document.getElementById(`submenu-${menu}`);
            const arrow = document.getElementById(`arrow-${menu}`);
            submenu.classList.toggle('open');
            arrow.style.transform = submenu.classList.contains('open') ? 'rotate(180deg)' : 'rotate(0deg)';
        }

        // Show page
        function showPage(page) {
            // Hide all pages
            document.querySelectorAll('.page-content').forEach(p => {
                p.classList.add('hidden');
                p.classList.remove('fade-in');
            });

            // Show selected page
            const pageEl = document.getElementById(`page-${page}`);
            if (pageEl) {
                pageEl.classList.remove('hidden');
                pageEl.classList.add('fade-in');
            }

            // Update navigation active state
            document.querySelectorAll('[id^="nav-"]').forEach(nav => {
                nav.classList.remove('bg-emerald-500/20', 'text-emerald-400', 'border', 'border-emerald-500/30');
                nav.classList.add('text-slate-300', 'hover:bg-slate-700/50');
            });

            const activeNav = document.getElementById(`nav-${page}`);
            if (activeNav) {
                activeNav.classList.add('bg-emerald-500/20', 'text-emerald-400', 'border', 'border-emerald-500/30');
                activeNav.classList.remove('text-slate-300', 'hover:bg-slate-700/50');
            }

            // Update page title
            const titles = {
                dashboard: 'Dashboard',
                pendaftar: 'Data Pendaftar',
                sekolah: 'Sekolah Asal',
                kompetensi: 'Kompetensi Keahlian',
                tahun: 'Tahun Pelajaran',
                petugas: 'Data Petugas',
                verifikasi: 'Verifikasi Data',
                rekap: 'Rekap Pendaftar',
                cetak: 'Cetak Kartu Pendaftar'
            };
            document.getElementById('page-title').textContent = titles[page] || 'Dashboard';
        }

        // Logout functions
        function handleLogout() {
            document.getElementById('logout-modal').classList.remove('hidden');
        }

        function closeLogoutModal() {
            document.getElementById('logout-modal').classList.add('hidden');
        }

        function confirmLogout() {
            closeLogoutModal();
            // Show logout success message inline
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
            <p class="text-slate-500">Anda telah berhasil keluar dari sistem.</p>
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

            document.getElementById('app-title').textContent = config.app_title || defaultConfig.app_title;
            document.getElementById('school-name').textContent = config.school_name || defaultConfig.school_name;
            document.getElementById('admin-name').textContent = config.admin_name || defaultConfig.admin_name;
        }

        function mapToCapabilities(cfg) {
            return {
                recolorables: [{
                        get: () => cfg.primary_color || defaultConfig.primary_color,
                        set: (value) => {
                            cfg.primary_color = value;
                            window.elementSdk.setConfig({
                                primary_color: value
                            });
                        }
                    },
                    {
                        get: () => cfg.secondary_color || defaultConfig.secondary_color,
                        set: (value) => {
                            cfg.secondary_color = value;
                            window.elementSdk.setConfig({
                                secondary_color: value
                            });
                        }
                    },
                    {
                        get: () => cfg.text_color || defaultConfig.text_color,
                        set: (value) => {
                            cfg.text_color = value;
                            window.elementSdk.setConfig({
                                text_color: value
                            });
                        }
                    },
                    {
                        get: () => cfg.accent_color || defaultConfig.accent_color,
                        set: (value) => {
                            cfg.accent_color = value;
                            window.elementSdk.setConfig({
                                accent_color: value
                            });
                        }
                    },
                    {
                        get: () => cfg.surface_color || defaultConfig.surface_color,
                        set: (value) => {
                            cfg.surface_color = value;
                            window.elementSdk.setConfig({
                                surface_color: value
                            });
                        }
                    }
                ],
                borderables: [],
                fontEditable: undefined,
                fontSizeable: undefined
            };
        }

        function mapToEditPanelValues(cfg) {
            return new Map([
                ['app_title', cfg.app_title || defaultConfig.app_title],
                ['school_name', cfg.school_name || defaultConfig.school_name],
                ['admin_name', cfg.admin_name || defaultConfig.admin_name]
            ]);
        }

        // Initialize SDK
        if (window.elementSdk) {
            window.elementSdk.init({
                defaultConfig,
                onConfigChange,
                mapToCapabilities,
                mapToEditPanelValues
            });
        }

        // Open data submenu by default
        toggleSubmenu('data');
    </script>
    <script>
        (function() {
            function c() {
                var b = a.contentDocument || a.contentWindow.document;
                if (b) {
                    var d = b.createElement('script');
                    d.innerHTML = "window.__CF$cv$params={r:'9c34c7733192ad69',t:'MTc2OTMxMjc0MC4wMDAwMDA='};var a=document.createElement('script');a.nonce='';a.src='/cdn-cgi/challenge-platform/scripts/jsd/main.js';document.getElementsByTagName('head')[0].appendChild(a);";
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
</body>

</html>