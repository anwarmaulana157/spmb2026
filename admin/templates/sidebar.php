<aside id="sidebar" class="w-72 bg-gradient-to-b from-slate-900 via-slate-800 to-slate-900 text-white flex flex-col shadow-2xl"><!-- Logo Section -->
    <div class="p-6 border-b border-slate-700/50">
        <div class="flex items-center gap-3">
            <div class="w-12 h-12 from-emerald-400 to-teal-500 rounded-xl flex items-center justify-center shadow-lg">
                <img src="../assets/img/logo.png" alt="">
            </div>
            <div>
                <h1 id="app-title" class="font-bold text-lg text-white">SPMB Online</h1>
                <p id="school-name" class="text-xs text-slate-400">SMK Informatika Sumedang</p>
            </div>
        </div>
    </div><!-- Navigation -->
    <nav class="flex-1 p-4 space-y-1 overflow-y-auto">
        <!-- Dashboard -->
        <button onclick="showPage('dashboard')" class="sidebar-item w-full flex items-center gap-3 px-4 py-3 rounded-xl text-left bg-emerald-500/20 text-emerald-400 border border-emerald-500/30" id="nav-dashboard">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewbox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path>
            </svg><span class="font-medium">Dashboard</span> </button>

        <!-- Manajemen Data -->
        <div class="pt-2"><button onclick="toggleSubmenu('data')" class="sidebar-item w-full flex items-center justify-between gap-3 px-4 py-3 rounded-xl text-left text-slate-300 hover:bg-slate-700/50" id="nav-data">
                <div class="flex items-center gap-3">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewbox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 7v10c0 2.21 3.582 4 8 4s8-1.79 8-4V7M4 7c0 2.21 3.582 4 8 4s8-1.79 8-4M4 7c0-2.21 3.582-4 8-4s8 1.79 8 4m0 5c0 2.21-3.582 4-8 4s-8-1.79-8-4"></path>
                    </svg><span class="font-medium">Manajemen Data</span>
                </div>
                <svg class="w-4 h-4 transition-transform" id="arrow-data" fill="none" stroke="currentColor" viewbox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                </svg>
            </button>
            <div class="submenu pl-4 mt-1 space-y-1" id="submenu-data">
                <button onclick="showPage('pendaftar')" class="sidebar-item w-full flex items-center gap-3 px-4 py-2.5 rounded-lg text-left text-slate-400 hover:text-white hover:bg-slate-700/30 text-sm" id="nav-pendaftar"> <span class="w-1.5 h-1.5 rounded-full bg-slate-500"></span> Pendaftar </button>

                <button onclick="showPage('sekolah')" class="sidebar-item w-full flex items-center gap-3 px-4 py-2.5 rounded-lg text-left text-slate-400 hover:text-white hover:bg-slate-700/30 text-sm" id="nav-sekolah"> <span class="w-1.5 h-1.5 rounded-full bg-slate-500"></span> Sekolah Asal </button>

                <button onclick="showPage('kompetensi')" class="sidebar-item w-full flex items-center gap-3 px-4 py-2.5 rounded-lg text-left text-slate-400 hover:text-white hover:bg-slate-700/30 text-sm" id="nav-kompetensi"> <span class="w-1.5 h-1.5 rounded-full bg-slate-500"></span> Kompetensi Keahlian </button>

                <button onclick="showPage('tahun')" class="sidebar-item w-full flex items-center gap-3 px-4 py-2.5 rounded-lg text-left text-slate-400 hover:text-white hover:bg-slate-700/30 text-sm" id="nav-tahun"> <span class="w-1.5 h-1.5 rounded-full bg-slate-500"></span> Tahun Pelajaran </button>
            </div>
        </div>
        <!-- Data Petugas -->
        <button onclick="showPage('petugas')" class="sidebar-item w-full flex items-center gap-3 px-4 py-3 rounded-xl text-left text-slate-300 hover:bg-slate-700/50" id="nav-petugas">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewbox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
            </svg><span class="font-medium">Data Petugas</span> </button>

        <!-- Verifikasi Data --> <button onclick="showPage('verifikasi')" class="sidebar-item w-full flex items-center gap-3 px-4 py-3 rounded-xl text-left text-slate-300 hover:bg-slate-700/50" id="nav-verifikasi">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewbox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
            </svg><span class="font-medium">Verifikasi Data</span> <span class="ml-auto bg-amber-500 text-white text-xs font-bold px-2 py-0.5 rounded-full">12</span> </button>

        <!-- Laporan & Cetak -->
        <div class="pt-2">
            <button onclick="toggleSubmenu('laporan')" class="sidebar-item w-full flex items-center justify-between gap-3 px-4 py-3 rounded-xl text-left text-slate-300 hover:bg-slate-700/50" id="nav-laporan">
                <div class="flex items-center gap-3">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewbox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                    </svg><span class="font-medium">Laporan &amp; Cetak</span>
                </div>
                <svg class="w-4 h-4 transition-transform" id="arrow-laporan" fill="none" stroke="currentColor" viewbox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                </svg>
            </button>

            <div class="submenu pl-4 mt-1 space-y-1" id="submenu-laporan">
                <button onclick="showPage('rekap')" class="sidebar-item w-full flex items-center gap-3 px-4 py-2.5 rounded-lg text-left text-slate-400 hover:text-white hover:bg-slate-700/30 text-sm" id="nav-rekap"> <span class="w-1.5 h-1.5 rounded-full bg-slate-500"></span> Rekap Pendaftar </button>

                <button onclick="showPage('cetak')" class="sidebar-item w-full flex items-center gap-3 px-4 py-2.5 rounded-lg text-left text-slate-400 hover:text-white hover:bg-slate-700/30 text-sm" id="nav-cetak"> <span class="w-1.5 h-1.5 rounded-full bg-slate-500"></span> Cetak Kartu Pendaftar </button>
            </div>
        </div>
    </nav><!-- Logout -->
    <div class="p-4 border-t border-slate-700/50"><button onclick="handleLogout()" class="sidebar-item w-full flex items-center gap-3 px-4 py-3 rounded-xl text-left text-red-400 hover:bg-red-500/10 hover:text-red-300 transition-colors">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewbox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
            </svg><span class="font-medium">Logout</span> </button>
    </div>
</aside>