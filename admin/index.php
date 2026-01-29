<!doctype html>
<html lang="id" class="h-full">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel SPMB</title>
    <script src="https://cdn.tailwindcss.com"></script>
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

        @view-transition {
            navigation: auto;
        }
    </style>

</head>

<body class="h-full bg-slate-100">
    <div class="flex h-full">
        <!-- Sidebar -->
        <?php include "templates/sidebar.php" ?>
        <!-- Main Content -->
        <div class="flex-1 flex flex-col overflow-hidden">
            <?php include "load.php" ?>
        </div>
    </div>

    <script>
        // Toggle submenu
        function toggleSubmenu(menu) {
            const submenu = document.getElementById(`submenu-${menu}`);
            const arrow = document.getElementById(`arrow-${menu}`);
            submenu.classList.toggle('open');
            arrow.style.transform = submenu.classList.contains('open') ? 'rotate(180deg)' : 'rotate(0deg)';
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
    </script>
    <!-- DATATABLE INIT -->
    <script>
        $(document).ready(function() {
            $('#datatable').DataTable({
                pageLength: 10,
                lengthMenu: [10, 25, 50, 100],
                language: {
                    search: "Cari:",
                    lengthMenu: "Tampilkan _MENU_ data",
                    info: "Menampilkan _START_ - _END_ dari _TOTAL_ data",
                    paginate: {
                        first: "Awal",
                        last: "Akhir",
                        next: "›",
                        previous: "‹"
                    },
                    zeroRecords: "Data tidak ditemukan"
                }
            });
        });
    </script>

</body>

</html>