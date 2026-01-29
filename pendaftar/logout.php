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
            <div class="flex items-center gap-3"><button onclick="closeLogoutModal()" class="flex-1 px-4 py-2.5 border border-slate-200 text-slate-600 rounded-xl font-medium hover:bg-slate-50 transition-colors">Batal</button> <a href="../scr_logout.php" class="flex-1 px-4 py-2.5 bg-red-500 hover:bg-red-600 text-white rounded-xl font-medium transition-colors">Ya, Logout</a>
            </div>
        </div>
    </div>
</div>