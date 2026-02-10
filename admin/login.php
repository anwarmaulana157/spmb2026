<!doctype html>
<html lang="id" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin SPMB 2026/2027 - SMK Informatika Sumedang</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="/_sdk/element_sdk.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&amp;display=swap" rel="stylesheet">
    <style>
        body {
            box-sizing: border-box;
        }

        * {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }

        .gradient-bg {
            background: linear-gradient(135deg, #1e3a8a 0%, #3b82f6 50%, #60a5fa 100%);
        }


        .glass-card {
            background: rgba(255, 255, 255, 0.98);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.3);
        }

        .input-field {
            transition: all 0.3s ease;
            border: 2px solid #e5e7eb;
        }

        .input-field:focus {
            border-color: #3b82f6;
            box-shadow: 0 0 0 4px rgba(59, 130, 246, 0.1);
            outline: none;
        }

        .btn-primary-custom {
            background: linear-gradient(135deg, #3b82f6 0%, #1d4ed8 100%);
            transition: all 0.3s ease;
        }

        .btn-primary-custom:hover {
            background: linear-gradient(135deg, #2563eb 0%, #1e40af 100%);
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(59, 130, 246, 0.4);
        }

        .btn-outline-custom {
            border: 2px solid #10b981;
            color: #10b981;
            transition: all 0.3s ease;
        }

        .btn-outline-custom:hover {
            background: #10b981;
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(16, 185, 129, 0.3);
        }

        .floating-shapes {
            position: absolute;
            width: 100%;
            height: 100%;
            overflow: hidden;
            z-index: 0;
        }

        .shape {
            position: absolute;
            border-radius: 50%;
            opacity: 0.1;
            animation: float 20s infinite ease-in-out;
        }

        .shape-1 {
            width: 300px;
            height: 300px;
            background: #3b82f6;
            top: -100px;
            right: -100px;
            animation-delay: 0s;
        }

        .shape-2 {
            width: 200px;
            height: 200px;
            background: #10b981;
            bottom: -50px;
            left: -50px;
            animation-delay: -5s;
        }

        .shape-3 {
            width: 150px;
            height: 150px;
            background: #f59e0b;
            top: 50%;
            right: 10%;
            animation-delay: -10s;
        }

        @keyframes float {

            0%,
            100% {
                transform: translate(0, 0) rotate(0deg);
            }

            25% {
                transform: translate(20px, -20px) rotate(5deg);
            }

            50% {
                transform: translate(-10px, 20px) rotate(-5deg);
            }

            75% {
                transform: translate(-20px, -10px) rotate(3deg);
            }
        }

        .logo-container {
            animation: pulse-glow 3s infinite ease-in-out;
        }

        @keyframes pulse-glow {

            0%,
            100% {
                box-shadow: 0 0 20px rgba(59, 130, 246, 0.3);
            }

            50% {
                box-shadow: 0 0 40px rgba(59, 130, 246, 0.5);
            }
        }

        .fade-in {
            animation: fadeIn 0.6s ease-out forwards;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .preloader {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, #1e3a5f 0%, #0d1b2a 100%);
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 9999;
            transition: opacity 0.5s ease, visibility 0.5s ease;
        }

        .preloader.hidden {
            opacity: 0;
            visibility: hidden;
        }

        .loader {
            width: 60px;
            height: 60px;
            border: 4px solid rgba(255, 255, 255, 0.1);
            border-top-color: #3b82f6;
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            to {
                transform: rotate(360deg);
            }
        }

        .password-toggle {
            cursor: pointer;
            transition: color 0.2s ease;
        }

        .password-toggle:hover {
            color: #3b82f6;
        }
    </style>
    <style>
        @view-transition {
            navigation: auto;
        }
    </style>
    <script src="/_sdk/data_sdk.js" type="text/javascript"></script>
</head>

<body class="h-full screen w-full"><!-- Preloader -->
    <div class="preloader" id="preloader">
        <div class="loader"></div>
    </div><!-- Main Container -->
    <div class="gradient-bg min-h-screen w-full flex items-center justify-center p-4 relative overflow-hidden">
        <!-- Floating Shapes Background -->
        <div class="floating-shapes">
            <div class="shape shape-1"></div>
            <div class="shape shape-2"></div>
            <div class="shape shape-3"></div>
        </div><!-- Login Card -->
        <div class="glass-card rounded-3xl shadow-2xl p-8 w-full max-w-md relative z-10 fade-in" style="animation-delay: 0.2s;"><!-- Logo Section -->
            <div class="flex flex-col items-center mb-8">
                <div class="w-20 h-20  flex items-center justify-center mb-4 ">
                    <img src="../assets/img/logo.png">
                </div>
                <div class="text-center"><span id="badge-year" class="inline-block px-3 py-1 bg-blue-100 text-blue-700 text-xs font-semibold rounded-full mb-2">SPMB 2026/2027</span>
                    <h1 id="page-title" class="text-2xl font-bold text-gray-800 mb-1">Login Admin/Petugas SPMB</h1>
                    <p id="school-name" class="text-sm font-medium text-blue-600">SMK Informatika Sumedang</p>
                </div>
            </div>
            <p id="page-subtitle" class="text-center text-gray-500 text-sm mb-6">Masuk menggunakan Usename dan Password</p><!-- Login Form -->
            <form id="login-form" class="space-y-5" method="POST" action="scr_login.php"><!-- NISN Field -->
                <div class="space-y-2"><label for="nisn" class="block text-sm font-semibold text-gray-700"> <span class="flex items-center gap-2">
                            <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewbox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V8a2 2 0 00-2-2h-5m-4 0V5a2 2 0 114 0v1m-4 0a2 2 0 104 0m-5 8a2 2 0 100-4 2 2 0 000 4zm0 0c1.306 0 2.417.835 2.83 2M9 14a3.001 3.001 0 00-2.83 2M15 11h3m-3 4h2" />
                            </svg> Username </span> </label> <input type="text" id="nisn" name="username" class="input-field w-full px-4 py-3 rounded-xl text-gray-700 placeholder-gray-400" placeholder="Masukkan NISN Anda" required>
                </div><!-- Password Field -->
                <div class="space-y-2"><label for="password" class="block text-sm font-semibold text-gray-700"> <span class="flex items-center gap-2">
                            <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewbox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                            </svg> Password </span> </label>
                    <div class="relative"><input type="password" id="password" name="password" class="input-field w-full px-4 py-3 rounded-xl text-gray-700 placeholder-gray-400 pr-12" placeholder="Masukkan Password" required minlength="6"> <button type="button" id="toggle-password" class="absolute right-4 top-1/2 -translate-y-1/2 password-toggle text-gray-400">
                            <svg id="eye-icon" class="w-5 h-5" fill="none" stroke="currentColor" viewbox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                            </svg>
                            <svg id="eye-off-icon" class="w-5 h-5 hidden" fill="none" stroke="currentColor" viewbox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" />
                            </svg></button>
                    </div>
                </div>
                <!-- Remember Me -->

                <!-- Login Button --> <button type="submit" id="login-button" class="btn-primary-custom w-full py-3.5 text-white font-semibold rounded-xl shadow-lg flex items-center justify-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewbox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1" />
                    </svg><span id="login-button-text">Login</span> </button> <!-- Divider -->
                <div class="relative my-6">


                </div>
            </form><!-- Footer -->
            <p class="text-center text-gray-400 text-xs mt-6">© 2026 SMK Informatika Sumedang. All rights reserved.</p>
        </div>
    </div><!-- Toast Notification -->
    <div id="toast" class="fixed bottom-4 right-4 transform translate-y-20 opacity-0 transition-all duration-300 z-50">
        <div class="bg-white rounded-xl shadow-2xl p-4 flex items-center gap-3 border-l-4 border-blue-500">
            <div id="toast-icon" class="w-10 h-10 rounded-full bg-blue-100 flex items-center justify-center">
                <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewbox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
            </div>
            <div>
                <p id="toast-title" class="font-semibold text-gray-800">Info</p>
                <p id="toast-message" class="text-sm text-gray-600">Pesan notifikasi</p>
            </div>
        </div>
    </div>
    <script>
        // Default configuration
        const defaultConfig = {
            page_title: 'Login Admin/Petugas SPMB',
            page_subtitle: 'Masuk menggunakan Username dan Password',
            school_name: 'SMK Informatika Sumedang',
            year_text: '2026/2027',
            login_button_text: 'Login',
            register_button_text: 'Daftar Sekarang',
            primary_color: '#3b82f6',
            secondary_color: '#10b981',
            background_color: '#1e3a5f',
            text_color: '#1f2937',
            card_color: '#ffffff'
        };

        // DOM Elements
        const elements = {
            pageTitle: document.getElementById('page-title'),
            pageSubtitle: document.getElementById('page-subtitle'),
            schoolName: document.getElementById('school-name'),
            badgeYear: document.getElementById('badge-year'),
            loginButtonText: document.getElementById('login-button-text'),
            registerButtonText: document.getElementById('register-button-text'),
            loginForm: document.getElementById('login-form'),
            togglePassword: document.getElementById('toggle-password'),
            passwordInput: document.getElementById('password'),
            eyeIcon: document.getElementById('eye-icon'),
            eyeOffIcon: document.getElementById('eye-off-icon'),
            preloader: document.getElementById('preloader'),
            toast: document.getElementById('toast'),
            toastTitle: document.getElementById('toast-title'),
            toastMessage: document.getElementById('toast-message')
        };



        // Toggle password visibility
        elements.togglePassword.addEventListener('click', function() {
            const isPassword = elements.passwordInput.type === 'password';
            elements.passwordInput.type = isPassword ? 'text' : 'password';
            elements.eyeIcon.classList.toggle('hidden');
            elements.eyeOffIcon.classList.toggle('hidden');
        });



        // Hide preloader after page loads
        window.addEventListener('load', function() {
            setTimeout(() => {
                elements.preloader.classList.add('hidden');
            }, 500);
        });

        // Render function to update UI based on config
        async function onConfigChange(config) {
            const cfg = {
                ...defaultConfig,
                ...config
            };

            elements.pageTitle.textContent = cfg.page_title;
            elements.pageSubtitle.textContent = cfg.page_subtitle;
            elements.schoolName.textContent = cfg.school_name;
            elements.badgeYear.textContent = 'SPMB ' + cfg.year_text;
            elements.loginButtonText.textContent = cfg.login_button_text;
            elements.registerButtonText.textContent = cfg.register_button_text;
        }

        // Initialize Element SDK
        if (window.elementSdk) {
            window.elementSdk.init({
                defaultConfig,
                onConfigChange,
                mapToCapabilities: (config) => ({
                    recolorables: [{
                            get: () => config.background_color || defaultConfig.background_color,
                            set: (value) => {
                                config.background_color = value;
                                window.elementSdk.setConfig({
                                    background_color: value
                                });
                            }
                        },
                        {
                            get: () => config.card_color || defaultConfig.card_color,
                            set: (value) => {
                                config.card_color = value;
                                window.elementSdk.setConfig({
                                    card_color: value
                                });
                            }
                        },
                        {
                            get: () => config.text_color || defaultConfig.text_color,
                            set: (value) => {
                                config.text_color = value;
                                window.elementSdk.setConfig({
                                    text_color: value
                                });
                            }
                        },
                        {
                            get: () => config.primary_color || defaultConfig.primary_color,
                            set: (value) => {
                                config.primary_color = value;
                                window.elementSdk.setConfig({
                                    primary_color: value
                                });
                            }
                        },
                        {
                            get: () => config.secondary_color || defaultConfig.secondary_color,
                            set: (value) => {
                                config.secondary_color = value;
                                window.elementSdk.setConfig({
                                    secondary_color: value
                                });
                            }
                        }
                    ],
                    borderables: [],
                    fontEditable: {
                        get: () => config.font_family || 'Plus Jakarta Sans',
                        set: (value) => {
                            config.font_family = value;
                            window.elementSdk.setConfig({
                                font_family: value
                            });
                        }
                    },
                    fontSizeable: {
                        get: () => config.font_size || 16,
                        set: (value) => {
                            config.font_size = value;
                            window.elementSdk.setConfig({
                                font_size: value
                            });
                        }
                    }
                }),
                mapToEditPanelValues: (config) => new Map([
                    ['page_title', config.page_title || defaultConfig.page_title],
                    ['page_subtitle', config.page_subtitle || defaultConfig.page_subtitle],
                    ['school_name', config.school_name || defaultConfig.school_name],
                    ['year_text', config.year_text || defaultConfig.year_text],
                    ['login_button_text', config.login_button_text || defaultConfig.login_button_text],
                    ['register_button_text', config.register_button_text || defaultConfig.register_button_text]
                ])
            });
        }

        // Initial render
        onConfigChange(defaultConfig);
    </script>
    <script>
        (function() {
            function c() {
                var b = a.contentDocument || a.contentWindow.document;
                if (b) {
                    var d = b.createElement('script');
                    d.innerHTML = "window.__CF$cv$params={r:'9c1b68bba584e77c',t:'MTc2OTA0NjcxNy4wMDAwMDA='};var a=document.createElement('script');a.nonce='';a.src='/cdn-cgi/challenge-platform/scripts/jsd/main.js';document.getElementsByTagName('head')[0].appendChild(a);";
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