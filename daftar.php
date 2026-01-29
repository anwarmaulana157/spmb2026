<!doctype html>
<html lang="id" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulir Pendaftaran SPMB 2026/2027</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="/_sdk/element_sdk.js"></script>
    <script src="/_sdk/data_sdk.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&amp;display=swap" rel="stylesheet">
    <style>
        body {
            box-sizing: border-box;
        }

        * {
            font-family: 'Poppins', sans-serif;
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

        .input-field.error {
            border-color: #ef4444;
        }

        .error-message {
            color: #ef4444;
            font-size: 0.75rem;
            margin-top: 0.25rem;
            display: none;
        }

        .error-message.show {
            display: block;
        }

        .btn-primary-custom {
            background: linear-gradient(135deg, #2563eb 0%, #1e40af 100%);
            transition: all 0.3s ease;
        }

        .btn-primary-custom:hover:not(:disabled) {
            background: linear-gradient(135deg, #1d4ed8 0%, #1e3a8a 100%);
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(37, 99, 235, 0.4);
        }

        .btn-primary-custom:disabled {
            opacity: 0.6;
            cursor: not-allowed;
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
            opacity: 0.15;
            animation: float 25s infinite ease-in-out;
        }

        .shape-1 {
            width: 400px;
            height: 400px;
            background: linear-gradient(135deg, #1e40af, #3b82f6);
            top: -150px;
            right: -150px;
        }

        .shape-2 {
            width: 300px;
            height: 300px;
            background: linear-gradient(135deg, #60a5fa, #93c5fd);
            bottom: -100px;
            left: -100px;
            animation-delay: -8s;
        }

        .shape-3 {
            width: 200px;
            height: 200px;
            background: linear-gradient(135deg, #2563eb, #60a5fa);
            top: 40%;
            right: 5%;
            animation-delay: -15s;
        }

        @keyframes float {

            0%,
            100% {
                transform: translate(0, 0) rotate(0deg);
            }

            25% {
                transform: translate(30px, -30px) rotate(7deg);
            }

            50% {
                transform: translate(-20px, 30px) rotate(-7deg);
            }

            75% {
                transform: translate(-30px, -15px) rotate(5deg);
            }
        }

        .logo-container {
            animation: pulse-glow 3s infinite ease-in-out;
        }

        @keyframes pulse-glow {

            0%,
            100% {
                box-shadow: 0 0 25px rgba(59, 130, 246, 0.4);
            }

            50% {
                box-shadow: 0 0 50px rgba(59, 130, 246, 0.6);
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
            background: linear-gradient(135deg, #1e3a8a 0%, #3b82f6 100%);
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
            border: 4px solid rgba(255, 255, 255, 0.2);
            border-top-color: #ffffff;
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

        .captcha-container {
            background: #f3f4f6;
            border: 2px solid #e5e7eb;
            border-radius: 0.75rem;
            padding: 1rem;
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .captcha-code {
            font-size: 1.5rem;
            font-weight: bold;
            letter-spacing: 0.5rem;
            background: linear-gradient(135deg, #2563eb, #1e40af);
            background-clip: text;
            -webkit-text-fill-color: transparent;
            user-select: none;
            font-family: 'Courier New', monospace;
            text-decoration: line-through;
            text-decoration-color: rgba(37, 99, 235, 0.3);
        }

        .refresh-captcha {
            cursor: pointer;
            transition: transform 0.3s ease;
        }

        .refresh-captcha:hover {
            transform: rotate(180deg);
        }

        .strength-meter {
            height: 4px;
            background: #e5e7eb;
            border-radius: 2px;
            overflow: hidden;
            margin-top: 0.5rem;
        }

        .strength-bar {
            height: 100%;
            transition: all 0.3s ease;
            width: 0%;
        }

        .strength-weak {
            width: 33%;
            background: #ef4444;
        }

        .strength-medium {
            width: 66%;
            background: #f59e0b;
        }

        .strength-strong {
            width: 100%;
            background: #10b981;
        }

        .step-indicator {
            display: flex;
            gap: 0.5rem;
            margin-bottom: 2rem;
        }

        .step {
            flex: 1;
            height: 4px;
            background: #e5e7eb;
            border-radius: 2px;
            transition: background 0.3s ease;
        }

        .step.active {
            background: linear-gradient(90deg, #2563eb, #1e40af);
        }

        .radio-custom {
            appearance: none;
            width: 20px;
            height: 20px;
            border: 2px solid #d1d5db;
            border-radius: 50%;
            outline: none;
            cursor: pointer;
            position: relative;
            transition: all 0.2s ease;
        }

        .radio-custom:checked {
            border-color: #3b82f6;
            background: #3b82f6;
        }

        .radio-custom:checked::after {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 8px;
            height: 8px;
            background: white;
            border-radius: 50%;
        }

        .radio-label {
            cursor: pointer;
            transition: color 0.2s ease;
        }

        .radio-custom:checked+.radio-label {
            color: #3b82f6;
            font-weight: 600;
        }
    </style>
    <style>
        @view-transition {
            navigation: auto;
        }
    </style>
</head>

<body class="h-full w-full"><!-- Preloader -->
    <div class="preloader" id="preloader">
        <div class="loader"></div>
    </div><!-- Main Container -->
    <div class="gradient-bg min-h-full w-full flex items-center justify-center p-4 relative overflow-auto"><!-- Floating Shapes Background -->
        <div class="floating-shapes">
            <div class="shape shape-1"></div>
            <div class="shape shape-2"></div>
            <div class="shape shape-3"></div>
        </div><!-- Registration Card -->
        <div class="glass-card rounded-3xl shadow-2xl p-8 w-full max-w-2xl relative z-10 fade-in my-8" style="animation-delay: 0.2s;"><!-- Logo Section -->
            <div class="flex flex-col items-center mb-6">
                <div class="w-20 h-20 flex items-center justify-center mb-4">
                    <img src="assets/img/logo.png" alt="">
                </div>
                <div class="text-center"><span id="badge-year" class="inline-block px-3 py-1 bg-blue-100 text-blue-700 text-xs font-semibold rounded-full mb-2">SPMB 2026/2027</span>
                    <h1 id="page-title" class="text-2xl font-bold text-gray-800 mb-1">Formulir Pendaftaran SPMB</h1>
                    <p id="school-name" class="text-sm font-medium text-blue-600">SMK Informatika Sumedang</p>
                </div>
            </div>
            <!-- Registration Form -->
            <form action="scr_daftar.php" method="POST" class="space-y-5"><!-- NISN -->
                <div class="space-y-2"><label for="nisn" class="block text-sm font-semibold text-gray-700"> <span class="flex items-center gap-2">
                            <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewbox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V8a2 2 0 00-2-2h-5m-4 0V5a2 2 0 114 0v1m-4 0a2 2 0 104 0m-5 8a2 2 0 100-4 2 2 0 000 4zm0 0c1.306 0 2.417.835 2.83 2M9 14a3.001 3.001 0 00-2.83 2M15 11h3m-3 4h2" />
                            </svg> NISN <span class="text-red-500">*</span> </span> </label> <input type="text" id="nisn" name="nisn" class="input-field w-full px-4 py-3 rounded-xl text-gray-700 placeholder-gray-400" placeholder="Masukkan 10 digit NISN" required maxlength="10" autocomplete="off">
                    <p class="error-message" id="nisn-error">NISN harus 10 digit angka</p>
                </div><!-- NIK -->
                <div class="space-y-2"><label for="nik" class="block text-sm font-semibold text-gray-700"> <span class="flex items-center gap-2">
                            <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewbox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
                            </svg> NIK <span class="text-red-500">*</span> </span> </label> <input type="text" id="nik" name="nik" class="input-field w-full px-4 py-3 rounded-xl text-gray-700 placeholder-gray-400" placeholder="Masukkan 16 digit NIK" required maxlength="16" autocomplete="off">
                    <p class="error-message" id="nik-error">NIK harus 16 digit angka</p>
                </div><!-- Nama Lengkap -->
                <div class="space-y-2"><label for="nama" class="block text-sm font-semibold text-gray-700"> <span class="flex items-center gap-2">
                            <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewbox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg> Nama Lengkap <span class="text-red-500">*</span> </span> </label> <input type="text" id="nama" name="nama" class="input-field w-full px-4 py-3 rounded-xl text-gray-700 placeholder-gray-400" placeholder="Masukkan nama lengkap sesuai ijazah" required autocomplete="off">
                    <p class="error-message" id="nama-error">Nama lengkap harus diisi minimal 3 karakter</p>
                </div><!-- Asal Sekolah -->
                <div class="space-y-2">
                    <label class="block text-sm font-semibold text-gray-700">
                        <span class="flex items-center gap-2">
                            <!-- icon -->
                            Asal Sekolah <span class="text-red-500">*</span>
                        </span>
                    </label>

                    <select name="asal_sekolah" id="asal_sekolah"
                        class="input-field w-full px-4 py-3 rounded-xl text-gray-700"
                        required
                        onchange="toggleSekolahLainnya()">

                        <option value="">-- Pilih Asal Sekolah --</option>

                        <?php
                        include "config/koneksi.php";
                        $sekolah = mysqli_query($conn, "SELECT * FROM tb_sekolah_asal ORDER BY nama_sekolah ASC");
                        while ($row = mysqli_fetch_assoc($sekolah)) {
                            echo "<option value='" . $row['sekolah_id'] . "'>" . $row['nama_sekolah'] . "</option>";
                        }
                        ?>

                        <option value="lainnya">Lainnya</option>
                    </select>

                    <!-- Input sekolah baru (hidden) -->
                    <input type="text" name="asal_sekolah_lainnya" id="asal_sekolah_lainnya"
                        class="input-field w-full px-4 py-3 rounded-xl text-gray-700 mt-3 hidden"
                        placeholder="Masukkan nama sekolah asal">

                    <p class="error-message">Asal sekolah harus diisi</p>
                </div>
                <!-- Jalur Pendaftaran -->
                <div class="space-y-3"><label class="block text-sm md:text-base font-semibold text-gray-700"> <span class="flex items-center gap-2">
                            <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewbox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg> Jalur Pendaftaran <span class="text-red-500">*</span> </span> </label>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 sm:gap-4"><!-- Prestasi Option --> <label class="flex items-start sm:items-center gap-2 sm:gap-3 p-3 sm:p-4 border-2 border-gray-200 rounded-lg sm:rounded-xl cursor-pointer hover:border-blue-400 hover:bg-blue-50 transition-all duration-200 group"> <input type="radio" name="jalur" value="prestasi" class="radio-custom mt-1 sm:mt-0 flex-shrink-0" required> <span class="radio-label text-sm sm:text-base text-gray-700 flex-1"> <span class="block font-semibold text-gray-800">Prestasi</span> <span class="text-xs sm:text-sm text-gray-500 leading-relaxed">Jalur prestasi akademik/non-akademik</span> </span> </label> <!-- Umum Option --> <label class="flex items-start sm:items-center gap-2 sm:gap-3 p-3 sm:p-4 border-2 border-gray-200 rounded-lg sm:rounded-xl cursor-pointer hover:border-blue-400 hover:bg-blue-50 transition-all duration-200 group"> <input type="radio" name="jalur" value="umum" class="radio-custom mt-1 sm:mt-0 flex-shrink-0" required> <span class="radio-label text-sm sm:text-base text-gray-700 flex-1"> <span class="block font-semibold text-gray-800">Umum</span> <span class="text-xs sm:text-sm text-gray-500 leading-relaxed">Jalur pendaftaran reguler</span> </span> </label>
                    </div>
                    <p class="error-message text-xs sm:text-sm text-red-500 mt-2 hidden" id="jalur-error">Pilih salah satu jalur pendaftaran</p>
                </div><!-- No Telp/HP -->
                <div class="space-y-2"><label for="no-telp" class="block text-sm font-semibold text-gray-700"> <span class="flex items-center gap-2">
                            <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewbox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                            </svg> No Telp/HP <span class="text-red-500">*</span> </span> </label> <input type="tel" id="no-telp" name="telp" class="input-field w-full px-4 py-3 rounded-xl text-gray-700 placeholder-gray-400" placeholder="Contoh: 081234567890" required autocomplete="off">
                    <p class="error-message" id="no-telp-error">Nomor telepon harus 10-13 digit angka</p>
                </div><!-- Password -->
                <div class="space-y-2"><label for="password" class="block text-sm font-semibold text-gray-700"> <span class="flex items-center gap-2">
                            <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewbox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                            </svg> Password <span class="text-red-500">*</span> </span> </label>
                    <div class="relative"><input type="password" id="password" name="password" class="input-field w-full px-4 py-3 rounded-xl text-gray-700 placeholder-gray-400 pr-12" placeholder="Minimal 6 karakter" required minlength="6"> <button type="button" id="toggle-password" class="absolute right-4 top-1/2 -translate-y-1/2 password-toggle text-gray-400">
                            <svg id="eye-icon" class="w-5 h-5" fill="none" stroke="currentColor" viewbox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                            </svg>
                            <svg id="eye-off-icon" class="w-5 h-5 hidden" fill="none" stroke="currentColor" viewbox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" />
                            </svg></button>
                    </div>
                    <p class="error-message" id="password-error">Password minimal 6 karakter</p>
                </div><!-- Konfirmasi Password -->
                <div class="space-y-2"><label for="confirm-password" class="block text-sm font-semibold text-gray-700"> <span class="flex items-center gap-2">
                            <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewbox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                            </svg> Konfirmasi Password <span class="text-red-500">*</span> </span> </label>
                    <div class="relative"><input type="password" id="confirm-password" name="confirm-password" class="input-field w-full px-4 py-3 rounded-xl text-gray-700 placeholder-gray-400 pr-12" placeholder="Ulangi password" required> <button type="button" id="toggle-confirm-password" class="absolute right-4 top-1/2 -translate-y-1/2 password-toggle text-gray-400">
                            <svg id="eye-icon-confirm" class="w-5 h-5" fill="none" stroke="currentColor" viewbox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                            </svg>
                            <svg id="eye-off-icon-confirm" class="w-5 h-5 hidden" fill="none" stroke="currentColor" viewbox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" />
                            </svg></button>
                    </div>
                    <p class="error-message" id="confirm-password-error">Password tidak sama</p>
                </div>
                <!-- SubmitButton --> <button type="submit" id="submit-button" class="btn-primary-custom w-full py-3.5 text-white font-semibold rounded-xl shadow-lg flex items-center justify-center gap-2 mt-6">
                    <svg id="submit-icon" class="w-5 h-5" fill="none" stroke="currentColor" viewbox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg><span id="submit-button-text">Daftar Sekarang</span> </button> <!-- Login Link -->
                <div class="text-center mt-4"><a href="login" id="login-link" class="text-sm text-blue-600 hover:text-blue-800 font-medium transition-colors"> Sudah punya akun? Login di sini </a>
                </div>
            </form><!-- Footer -->
            <p class="text-center text-gray-400 text-xs mt-6">© 2026 SMK Informatika Sumedang. All rights reserved.</p>
        </div>
    </div><!-- Toast Notification -->
    <div id="toast" class="fixed bottom-4 right-4 transform translate-y-20 opacity-0 transition-all duration-300 z-50">
        <div id="toast-container" class="bg-white rounded-xl shadow-2xl p-4 flex items-center gap-3 border-l-4">
            <div id="toast-icon" class="w-10 h-10 rounded-full flex items-center justify-center">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewbox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
            </div>
            <div>
                <p id="toast-title" class="font-semibold text-gray-800">Info</p>
                <p id="toast-message" class="text-sm text-gray-600">Pesan notifikasi</p>
            </div>
        </div>
    </div><!-- Success Modal -->
    <div id="success-modal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 hidden">
        <div class="bg-white rounded-2xl p-8 max-w-md w-full mx-4 transform scale-95 transition-transform">
            <div class="text-center">
                <div class="w-20 h-20 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-10 h-10 text-green-600" fill="none" stroke="currentColor" viewbox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                </div>
                <h3 class="text-2xl font-bold text-gray-800 mb-2">Pendaftaran Berhasil!</h3>
                <p class="text-gray-600">Data Anda telah tersimpan.</p>
                <p class="text-lg font-bold text-blue-600 mt-2">
                    No Pendaftaran: <span id="no-pendaftaran-text"></span>
                </p>
                <p class="text-sm text-gray-500 mb-6">Simpan nomor ini untuk login.</p>
                <button id="close-modal" class="btn-primary-custom px-6 py-3 rounded-xl font-semibold text-white"> OK, Mengerti </button>
            </div>
        </div>
    </div>
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
            page_title: 'Formulir Pendaftaran SPMB',
            page_subtitle: 'Lengkapi data diri Anda dengan benar',
            school_name: 'SMK Informatika Sumedang',
            year_text: '2026/2027',
            submit_button_text: 'Daftar Sekarang',
            login_link_text: 'Sudah punya akun? Login di sini',
            background_color: '#1e3a8a',
            card_color: '#ffffff',
            text_color: '#1f2937',
            primary_color: '#3b82f6',
            accent_color: '#60a5fa'
        };

        /* =========================
        DOM ELEMENTS
        ========================= */
        const $ = id => document.getElementById(id);

        const elements = {
            pageTitle: $('page-title'),
            pageSubtitle: $('page-subtitle'),
            schoolName: $('school-name'),
            badgeYear: $('badge-year'),
            submitButtonText: $('submit-button-text'),
            loginLink: $('login-link'),
            registrationForm: $('registration-form'),
            togglePassword: $('toggle-password'),
            toggleConfirmPassword: $('toggle-confirm-password'),
            passwordInput: $('password'),
            confirmPasswordInput: $('confirm-password'),
            eyeIcon: $('eye-icon'),
            eyeOffIcon: $('eye-off-icon'),
            eyeIconConfirm: $('eye-icon-confirm'),
            eyeOffIconConfirm: $('eye-off-icon-confirm'),
            preloader: $('preloader'),
            toast: $('toast'),
            toastContainer: $('toast-container'),
            toastIcon: $('toast-icon'),
            toastTitle: $('toast-title'),
            toastMessage: $('toast-message'),
            captchaCode: $('captcha-code'),
            captchaInput: $('captcha'),
            refreshCaptcha: $('refresh-captcha'),
            strengthBar: $('strength-bar'),
            strengthText: $('strength-text'),
            submitButton: $('submit-button'),
            successModal: $('success-modal'),
            closeModal: $('close-modal')
        };

        /* =========================
        STATE
        ========================= */
        let currentCaptcha = '';
        let isSubmitting = false;

        /* =========================
        CAPTCHA
        ========================= */
        function generateCaptcha() {
            if (!elements.captchaCode) return;
            const chars = 'ABCDEFGHJKLMNPQRSTUVWXYZ23456789';
            currentCaptcha = '';
            for (let i = 0; i < 6; i++) {
                currentCaptcha += chars[Math.floor(Math.random() * chars.length)];
            }
            elements.captchaCode.textContent = currentCaptcha;
        }

        if (elements.refreshCaptcha) {
            elements.refreshCaptcha.addEventListener('click', generateCaptcha);
        }

        /*=========================TOAST=========================*/
        function showToast(title, message, type = 'info') {
            if (!elements.toast) return;

            elements.toastTitle.textContent = title;
            elements.toastMessage.textContent = message;

            const colorMap = {
                success: 'green',
                error: 'red',
                warning: 'yellow',
                info: 'blue'
            };
            const color = colorMap[type] || 'blue';

            elements.toastContainer.className = `bg-white rounded-xl shadow-2xl p-4 flex items-center gap-3 border-l-4 border-${color}-500`;
            elements.toastIcon.className = `w-10 h-10 rounded-full flex items-center justify-center bg-${color}-100`;

            elements.toast.classList.remove('translate-y-20', 'opacity-0');
            elements.toast.classList.add('translate-y-0', 'opacity-100');

            setTimeout(() => {
                elements.toast.classList.add('translate-y-20', 'opacity-0');
            }, 3000);
        }

        /* =========================
        ERROR HANDLING
        ========================= */
        function showError(id, message) {
            const error = $(`${id}-error`);
            const field = $(id);
            if (field) field.classList.add('error');
            if (error) {
                error.textContent = message;
                error.classList.add('show');
            }
        }

        function hideError(id) {
            const error = $(`${id}-error`);
            const field = $(id);
            if (field) field.classList.remove('error');
            if (error) error.classList.remove('show');
        }

        /* =========================
        VALIDATION
        ========================= */
        const validateNISN = v => /^\d{10}$/.test(v);
        const validateNIK = v => /^\d{16}$/.test(v);
        const validatePhone = v => /^\d{10,13}$/.test(v);



        /* =========================
        PASSWORD TOGGLE
        ========================= */
        if (elements.togglePassword) {
            elements.togglePassword.onclick = () => {
                elements.passwordInput.type =
                    elements.passwordInput.type === 'password' ? 'text' : 'password';
                elements.eyeIcon.classList.toggle('hidden');
                elements.eyeOffIcon.classList.toggle('hidden');
            };
        }

        if (elements.toggleConfirmPassword) {
            elements.toggleConfirmPassword.onclick = () => {
                elements.confirmPasswordInput.type =
                    elements.confirmPasswordInput.type === 'password' ? 'text' : 'password';
                elements.eyeIconConfirm.classList.toggle('hidden');
                elements.eyeOffIconConfirm.classList.toggle('hidden');
            };
        }



        /* =========================
        INIT
        ========================= */
        window.addEventListener('load', () => {
            generateCaptcha();
            setTimeout(() => elements.preloader?.classList.add('hidden'), 500);
        });
    </script>



</body>

</html>