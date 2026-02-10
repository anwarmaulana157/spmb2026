<aside id="sidebar" class="sidebar-transition fixed lg:relative w-64 h-full bg-gradient-to-b from-slate-900 via-slate-800 to-slate-900 text-white flex flex-col shadow-2xl z-50 -translate-x-full lg:translate-x-0"><!-- Logo Section -->
    <div class="p-6 border-b border-slate-700/50">
        <div class="flex items-center gap-3">
            <div class="w-12 h-12  from-blue-400 to-cyan-500 rounded-xl flex items-center justify-center ">
                <img src="../assets/img/logo.png" alt="">
            </div>
            <div>
                <h1 id="portal-title" class="font-bold text-lg text-white">Portal SPMB</h1>
                <p id="portal-subtitle" class="text-xs text-slate-400">Pendaftar</p>
            </div>
        </div>
    </div><!-- Navigation -->
    <nav class="flex-1 p-4 space-y-2"><!-- Lengkapi Data --> <a href="index.php?page=1" class="sidebar-item w-full flex items-center gap-3 px-4 py-3 rounded-xl text-left bg-blue-500/20 text-blue-400 border border-blue-500/30" id="nav-lengkapi">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewbox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a. 0z"></path>
            </svg><span class="font-medium">Lengkapi Data</span> </a>

    </nav><!-- User Profile Section -->
    <div class="p-4 border-t border-slate-700/50">
        <div class="flex items-center gap-3 p-3 bg-slate-700/50 rounded-xl mb-3">
            <div class="w-10 h-10 bg-gradient-to-br from-blue-400 to-cyan-500 rounded-lg flex items-center justify-center text-white font-bold text-sm"><span id="user-initial"><?= $inisial; ?></span>
            </div>
            <div>

                <p id="user-name" class="text-sm font-semibold text-white">
                    <?= htmlspecialchars($nama); ?>
                </p>

                <p class="text-xs text-slate-400">Pendaftar</p>
            </div>
        </div>
    </div><!-- Logout -->
    <div class="p-4 border-t border-slate-700/50"><button onclick="handleLogout()" class="sidebar-item w-full flex items-center gap-3 px-4 py-3 rounded-xl text-left text-red-400 hover:bg-red-500/10 hover:text-red-300 transition-colors">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewbox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
            </svg><span class="font-medium">Logout</span> </button>
    </div>
</aside>