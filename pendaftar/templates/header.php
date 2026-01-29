<header class="bg-white shadow-sm border-b border-slate-200 px-6 py-4">
    <div class="flex items-center justify-between">

        <!-- Overlay Mobile -->
        <div id="sidebar-overlay"
            class="fixed inset-0 bg-black/50 z-40 hidden overlay-transition lg:hidden"
            onclick="toggleSidebar()"></div>

        <!-- Left: Toggle + Title -->
        <div class="flex items-center gap-4">

            <!-- Toggle Sidebar Button (Mobile) -->
            <button id="toggle-btn"
                onclick="toggleSidebar()"
                class="toggle-btn w-10 h-10
                           
                           rounded-lg flex items-center justify-center
                           text-black lg:hidden">

                <!-- Menu Icon -->
                <svg id="menu-icon"
                    class="w-6 h-6"
                    fill="none"
                    stroke="currentColor"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M4 6h16M4 12h16M4 18h16"></path>
                </svg>

                <!-- Close Icon -->
                <svg id="close-icon"
                    class="w-6 h-6 hidden"
                    fill="none"
                    stroke="currentColor"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>

            <!-- Title -->
            <div>
                <h2 id="page-title" class="text-xl font-bold text-slate-800">
                    Lengkapi Data Pendaftaran
                </h2>
                <p class="text-sm text-slate-500">
                    Selesaikan formulir pendaftaran Anda
                </p>
            </div>

        </div>

        <!-- Right: Action Buttons -->
        <div class="flex items-center gap-4">

            <!-- Help -->
            <button class="p-2 text-slate-500 hover:text-slate-700 hover:bg-slate-100 rounded-xl transition-colors">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M13 16h-1v-4h-1m1-4h.01
                             M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
            </button>

            <!-- Notification -->
            <button class="relative p-2 text-slate-500 hover:text-slate-700 hover:bg-slate-100 rounded-xl transition-colors">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M15 17h5l-1.405-1.405
                             A2.032 2.032 0 0118 14.158V11
                             a6.002 6.002 0 00-4-5.659V5
                             a2 2 0 10-4 0v.341
                             C7.67 6.165 6 8.388 6 11v3.159
                             c0 .538-.214 1.055-.595 1.436L4 17h5
                             m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path>
                </svg>
            </button>

        </div>
    </div>
</header>