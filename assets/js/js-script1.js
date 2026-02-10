
        // Default Configuration
        const defaultConfig = {
            app_title: 'Panel Admin SPMB',
            school_name: 'SMK Informatika Sumedang',
            primary_color: '#3b82f6',
            secondary_color: '#1e293b',
            accent_color: '#10b981',
            text_color: '#1e293b',
            background_color: '#f1f5f9'
        };

        let config = {
            ...defaultConfig
        };

        // Element SDK Integration
        if (window.elementSdk) {
            window.elementSdk.init({
                defaultConfig,
                onConfigChange: async (newConfig) => {
                    config = {
                        ...defaultConfig,
                        ...newConfig
                    };
                    applyConfig();
                },
                mapToCapabilities: (cfg) => ({
                    recolorables: [{
                            get: () => cfg.primary_color || defaultConfig.primary_color,
                            set: (v) => {
                                cfg.primary_color = v;
                                window.elementSdk.setConfig({
                                    primary_color: v
                                });
                            }
                        },
                        {
                            get: () => cfg.secondary_color || defaultConfig.secondary_color,
                            set: (v) => {
                                cfg.secondary_color = v;
                                window.elementSdk.setConfig({
                                    secondary_color: v
                                });
                            }
                        },
                        {
                            get: () => cfg.accent_color || defaultConfig.accent_color,
                            set: (v) => {
                                cfg.accent_color = v;
                                window.elementSdk.setConfig({
                                    accent_color: v
                                });
                            }
                        },
                        {
                            get: () => cfg.text_color || defaultConfig.text_color,
                            set: (v) => {
                                cfg.text_color = v;
                                window.elementSdk.setConfig({
                                    text_color: v
                                });
                            }
                        },
                        {
                            get: () => cfg.background_color || defaultConfig.background_color,
                            set: (v) => {
                                cfg.background_color = v;
                                window.elementSdk.setConfig({
                                    background_color: v
                                });
                            }
                        }
                    ],
                    borderables: [],
                    fontEditable: undefined,
                    fontSizeable: undefined
                }),
                mapToEditPanelValues: (cfg) => new Map([
                    ['app_title', cfg.app_title || defaultConfig.app_title],
                    ['school_name', cfg.school_name || defaultConfig.school_name]
                ])
            });
        }

        function applyConfig() {
            document.getElementById('appTitle').textContent = config.app_title || defaultConfig.app_title;
            document.getElementById('schoolName').textContent = config.school_name || defaultConfig.school_name;

            // Apply colors via CSS custom properties
            document.documentElement.style.setProperty('--primary-color', config.primary_color || defaultConfig.primary_color);
            document.body.style.backgroundColor = config.background_color || defaultConfig.background_color;
        }

        // Sidebar Toggle
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            const overlay = document.getElementById('mobileOverlay');
            sidebar.classList.toggle('-translate-x-full');
            overlay.classList.toggle('hidden');
        }

        // Submenu Toggle
        function toggleSubmenu(submenuId, button) {
            const submenu = document.getElementById(submenuId);
            const arrow = button.querySelector('.submenu-arrow');
            submenu.classList.toggle('open');
            arrow.style.transform = submenu.classList.contains('open') ? 'rotate(180deg)' : 'rotate(0)';
        }

        // Navigation
        function navigateTo(page, element, event) {
            event.preventDefault();

            // Remove active class from all links
            document.querySelectorAll('.sidebar-link').forEach(link => {
                link.classList.remove('active');
                link.classList.add('text-slate-300');
            });

            // Add active class to clicked link
            if (element.classList.contains('sidebar-link')) {
                element.classList.add('active');
                element.classList.remove('text-slate-300');
            }

            // Update page title
            const titles = {
                dashboard: 'Dashboard',
                pendaftar: 'Data Pendaftar',
                sekolah: 'Sekolah Asal',
                kompetensi: 'Kompetensi Keahlian',
                tahunpelajaran: 'Tahun Pelajaran',
                petugas: 'Data Petugas',
                verifikasi: 'Verifikasi Data',
                rekap: 'Rekap Pendaftar',
                cetakkartu: 'Cetak Kartu Pendaftar'
            };

            document.getElementById('pageTitle').textContent = titles[page] || 'Dashboard';

            // Close sidebar on mobile
            if (window.innerWidth < 1024) {
                toggleSidebar();
            }
        }

        // Modal Functions
        function openModal() {
            document.getElementById('addModal').classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        }

        function closeModal() {
            document.getElementById('addModal').classList.add('hidden');
            document.body.style.overflow = '';
            document.getElementById('addForm').reset();
        }

        function openDetailModal() {
            document.getElementById('detailModal').classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        }

        function closeDetailModal() {
            document.getElementById('detailModal').classList.add('hidden');
            document.body.style.overflow = '';
        }

        function showLogoutConfirm() {
            document.getElementById('logoutModal').classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        }

        function closeLogoutModal() {
            document.getElementById('logoutModal').classList.add('hidden');
            document.body.style.overflow = '';
        }

        function performLogout() {
            closeLogoutModal();
            showToast('Anda telah logout dari sistem');
        }

        // Delete Confirmation
        let deleteTarget = null;

        function showDeleteConfirm(button) {
            deleteTarget = button.closest('tr');
            document.getElementById('deleteConfirm').classList.remove('hidden');
        }

        function confirmDelete() {
            if (deleteTarget) {
                deleteTarget.remove();
                showToast('Data berhasil dihapus');
            }
            cancelDelete();
        }

        function cancelDelete() {
            deleteTarget = null;
            document.getElementById('deleteConfirm').classList.add('hidden');
        }

        // Form Submit
        function handleSubmit(event) {
            event.preventDefault();
            closeModal();
            showToast('Data pendaftar berhasil disimpan!');
        }

        // Toast Notification
        function showToast(message) {
            const toast = document.getElementById('toast');
            document.getElementById('toastMessage').textContent = message;
            toast.classList.remove('hidden');
            setTimeout(() => {
                toast.classList.add('hidden');
            }, 3000);
        }

        // Initial config apply
        applyConfig();
