<!doctype html>
<html lang="id" class="h-full">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>SPMB 2026/2027 - SMK Informatika Sumedang</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="/_sdk/element_sdk.js"></script>
  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&amp;display=swap" rel="stylesheet">
  <style>
    body {
      box-sizing: border-box;
    }

    * {
      font-family: 'Plus Jakarta Sans', sans-serif;
    }

    html {
      scroll-behavior: smooth;
    }

    .gradient-hero {
      background: linear-gradient(135deg, #0f172a 0%, #1e3a5f 50%, #0c4a6e 100%);
    }

    .gradient-text {
      background: linear-gradient(135deg, #38bdf8 0%, #22d3ee 100%);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      background-clip: text;
    }

    .card-hover {
      transition: all 0.3s ease;
    }

    .card-hover:hover {
      transform: translateY(-8px);
      box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
    }

    .animate-float {
      animation: float 3s ease-in-out infinite;
    }

    @keyframes float {

      0%,
      100% {
        transform: translateY(0);
      }

      50% {
        transform: translateY(-10px);
      }
    }

    .animate-pulse-slow {
      animation: pulse 2s cubic-bezier(0.4, 0, 0.6, 1) infinite;
    }

    .timeline-line {
      background: linear-gradient(to bottom, #0ea5e9, #22d3ee);
    }

    .nav-link {
      position: relative;
    }

    .nav-link::after {
      content: '';
      position: absolute;
      bottom: -4px;
      left: 0;
      width: 0;
      height: 2px;
      background: #38bdf8;
      transition: width 0.3s ease;
    }

    .nav-link:hover::after {
      width: 100%;
    }

    .stat-card {
      background: linear-gradient(135deg, rgba(14, 165, 233, 0.1) 0%, rgba(34, 211, 238, 0.1) 100%);
      border: 1px solid rgba(56, 189, 248, 0.2);
    }

    .jurusan-rpl {
      background: linear-gradient(135deg, #1e40af 0%, #3b82f6 100%);
    }

    .jurusan-dkv {
      background: linear-gradient(135deg, #7c3aed 0%, #a855f7 100%);
    }
  </style>
  <style>
    @view-transition {
      navigation: auto;
    }
  </style>
  <script src="/_sdk/data_sdk.js" type="text/javascript"></script>
</head>

<body class="h-full bg-slate-50 overflow-auto">
  <div class="w-full min-h-full"><!-- Header -->
    <header id="header" class="fixed top-0 left-0 right-0 z-50 bg-slate-900/95 backdrop-blur-md border-b border-slate-700/50">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-16 md:h-20">
          <div class="flex items-center gap-3"><!-- Logo SVG -->
            <div class="w-10 h-10 md:w-12 md:h-12 rounded-xl flex items-center justify-center shadow-sky-500/30">
              <img src="assets/img/logo.png">
            </div>
            <div class="block">
              <h1 id="school-name-header" class="text-lg md:text-xl font-bold text-white">SMK Informatika Sumedang</h1>
              <p class="text-xs text-sky-400">Profesional dan Religius</p>
            </div>
          </div><!-- Desktop Navigation -->
          <nav class="hidden lg:flex items-center gap-8"><a href="#beranda" class="nav-link text-sm font-medium text-slate-300 hover:text-white transition-colors">Beranda</a> <a href="#profil" class="nav-link text-sm font-medium text-slate-300 hover:text-white transition-colors">Profil</a> <a href="#jurusan" class="nav-link text-sm font-medium text-slate-300 hover:text-white transition-colors">Jurusan</a> <a href="#alur" class="nav-link text-sm font-medium text-slate-300 hover:text-white transition-colors">Alur Daftar</a> <a href="#jadwal" class="nav-link text-sm font-medium text-slate-300 hover:text-white transition-colors">Jadwal</a> <a href="#faq" class="nav-link text-sm font-medium text-slate-300 hover:text-white transition-colors">FAQ</a> <a href="#daftar" class="px-5 py-2.5 bg-gradient-to-r from-sky-500 to-cyan-500 text-white text-sm font-semibold rounded-full hover:from-sky-600 hover:to-cyan-600 transition-all shadow-lg shadow-sky-500/30"> Daftar Sekarang </a>
          </nav><!-- Mobile Menu Button --> <button id="mobile-menu-btn" class="lg:hidden p-2 text-slate-300 hover:text-white">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewbox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
            </svg></button>
        </div><!-- Mobile Navigation -->
        <div id="mobile-menu" class="hidden lg:hidden pb-4">
          <nav class="flex flex-col gap-2"><a href="#beranda" class="px-4 py-2 text-slate-300 hover:text-white hover:bg-slate-800 rounded-lg transition-colors">Beranda</a> <a href="#profil" class="px-4 py-2 text-slate-300 hover:text-white hover:bg-slate-800 rounded-lg transition-colors">Profil</a> <a href="#jurusan" class="px-4 py-2 text-slate-300 hover:text-white hover:bg-slate-800 rounded-lg transition-colors">Jurusan</a> <a href="#alur" class="px-4 py-2 text-slate-300 hover:text-white hover:bg-slate-800 rounded-lg transition-colors">Alur Daftar</a> <a href="#jadwal" class="px-4 py-2 text-slate-300 hover:text-white hover:bg-slate-800 rounded-lg transition-colors">Jadwal</a> <a href="#faq" class="px-4 py-2 text-slate-300 hover:text-white hover:bg-slate-800 rounded-lg transition-colors">FAQ</a> <a href="#daftar" class="mx-4 mt-2 px-5 py-2.5 bg-gradient-to-r from-sky-500 to-cyan-500 text-white text-sm font-semibold rounded-full text-center"> Daftar Sekarang </a>
          </nav>
        </div>
      </div>
    </header><!-- Hero Section -->
    <section id="beranda" class="relative min-h-screen pt-20 md:pt-24 overflow-hidden"><!-- Background Image with Overlay -->
      <div class="absolute inset-0"><img src="assets/img/bg-lab.jpg" class="w-full h-full object-cover">
        <div class="absolute inset-0 bg-gradient-to-r from-slate-900/95 via-slate-900/90 to-slate-900/80"></div>
      </div>
      <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 md:py-24 min-h-screen flex items-center">
        <div class="w-full">
          <div class="max-w-3xl">
            <div class="inline-flex items-center gap-2 px-4 py-2 bg-sky-500/20 rounded-full border border-sky-500/30 mb-6 backdrop-blur-sm"><span class="w-2 h-2 bg-green-400 rounded-full animate-pulse"></span> <span class="text-sky-300 text-sm font-medium">Pendaftaran Dibuka!</span>
            </div>
            <h1 class="text-4xl md:text-5xl lg:text-6xl font-extrabold text-white leading-tight mb-4"><span id="hero-title">Penerimaan Murid Baru</span> <br><span class="gradient-text">Tahun Pelajaran 2026/2027</span></h1>
            <p id="school-vision" class="text-lg md:text-xl text-slate-300 mb-8">Menjadi sekolah pusat pendidikan dan pengembangan teknologi informasi yang unggul untuk menghasilkan lulusan yang profesional dan berakhlak mulia.</p>
            <div class="flex flex-col sm:flex-row gap-4"><a href="#daftar" class="group px-8 py-4 bg-gradient-to-r from-sky-500 to-cyan-500 text-white font-bold rounded-full hover:from-sky-600 hover:to-cyan-600 transition-all shadow-xl shadow-sky-500/30 flex items-center justify-center gap-2"> <span>Daftar Sekarang!</span>
                <svg class="w-5 h-5 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewbox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                </svg></a> <a href="#profil" class="px-8 py-4 bg-white/10 backdrop-blur text-white font-semibold rounded-full border border-white/20 hover:bg-white/20 transition-all flex items-center justify-center gap-2">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewbox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg><span>Pelajari Lebih Lanjut</span> </a>
            </div>
          </div>

        </div>
        <div class="hidden lg:flex justify-center">
          <div class="relative animate-float">
            <img src="assets/img/img-1.png">
          </div>
        </div>
      </div><!-- Scroll Indicator -->
      <div class="absolute bottom-8 left-1/2 -translate-x-1/2 animate-bounce">
        <svg class="w-6 h-6 text-slate-400" fill="none" stroke="currentColor" viewbox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3" />
        </svg>
      </div>
    </section><!-- Statistik Section -->
    <section class="py-16 bg-slate-900 border-y border-slate-700">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <!-- Judul -->
        <div class="text-center mb-12">
          <span class="inline-block px-4 py-1.5 bg-sky-900/40 text-sky-400 rounded-full text-sm font-semibold mb-4">
            Informasi Penerimaan
          </span>
          <h2 class="text-3xl md:text-4xl font-extrabold text-white mb-3">
            Kuota Penerimaan Murid Baru
          </h2>
          <p class="text-slate-400 max-w-2xl mx-auto text-sm md:text-base">
            Jumlah kuota penerimaan murid baru SMK Informatika Sumedang
          </p>
        </div>

        <!-- Statistik -->
        <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
          <div class="stat-card rounded-2xl p-6 text-center">
            <div class="text-3xl md:text-4xl font-extrabold text-sky-400 mb-2">360</div>
            <div class="text-slate-400 text-sm font-medium">
              Rekayasa Perangkat Lunak
            </div>
          </div>

          <div class="stat-card rounded-2xl p-6 text-center">
            <div class="text-3xl md:text-4xl font-extrabold text-cyan-400 mb-2">108</div>
            <div class="text-slate-400 text-sm font-medium">
              Desain Komunikasi Visual
            </div>
          </div>

          <div class="stat-card rounded-2xl p-6 text-center">
            <div class="text-3xl md:text-4xl font-extrabold text-amber-400 mb-2">36</div>
            <div class="text-slate-400 text-sm font-medium">
              Axioo Class Program
            </div>
          </div>

          <div class="stat-card rounded-2xl p-6 text-center">
            <div class="text-3xl md:text-4xl font-extrabold text-amber-400 mb-2">36</div>
            <div class="text-slate-400 text-sm font-medium">
              Kelas Telkom
            </div>
          </div>
        </div>

      </div>
    </section>
    <!-- Profil Section -->
    <section id="profil" class="py-20 bg-white">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16"><span class="inline-block px-4 py-1.5 bg-sky-100 text-sky-600 rounded-full text-sm font-semibold mb-4">Tentang Kami</span>
          <h2 class="text-3xl md:text-4xl font-extrabold text-slate-900 mb-4">Profil Sekolah</h2>
          <p class="text-slate-600 max-w-2xl mx-auto">Mengenal lebih dekat SMK Informatika Sumedang sebagai institusi pendidikan kejuruan terdepan</p>
        </div>
        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6"><!-- Sejarah -->
          <div class="card-hover bg-gradient-to-br from-slate-50 to-slate-100 rounded-2xl p-6 border border-slate-200">
            <div class="w-14 h-14 bg-gradient-to-br from-sky-500 to-sky-600 rounded-xl flex items-center justify-center mb-4 shadow-lg shadow-sky-500/30">
              <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewbox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
              </svg>
            </div>
            <h3 class="text-lg font-bold text-slate-900 mb-2">Sejarah Singkat</h3>
            <p class="text-slate-600 text-sm leading-relaxed">Berdiri sejak tahun 2005, SMK Informatika Sumedang telah meluluskan lebih dari 5.000 alumni yang tersebar di berbagai perusahaan terkemuka nasional dan internasional.</p>
          </div><!-- Akreditasi -->
          <div class="card-hover bg-gradient-to-br from-slate-50 to-slate-100 rounded-2xl p-6 border border-slate-200">
            <div class="w-14 h-14 bg-gradient-to-br from-emerald-500 to-emerald-600 rounded-xl flex items-center justify-center mb-4 shadow-lg shadow-emerald-500/30">
              <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewbox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z" />
              </svg>
            </div>
            <h3 class="text-lg font-bold text-slate-900 mb-2">Akreditasi A</h3>
            <p class="text-slate-600 text-sm leading-relaxed">Terakreditasi A dari BAN-SM dengan nilai unggul di semua standar penilaian. Diakui sebagai SMK Rujukan dan SMK Pusat Keunggulan.</p>
          </div><!-- Fasilitas -->
          <div class="card-hover bg-gradient-to-br from-slate-50 to-slate-100 rounded-2xl p-6 border border-slate-200">
            <div class="w-14 h-14 bg-gradient-to-br from-violet-500 to-violet-600 rounded-xl flex items-center justify-center mb-4 shadow-lg shadow-violet-500/30">
              <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewbox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
              </svg>
            </div>
            <h3 class="text-lg font-bold text-slate-900 mb-2">Fasilitas Lengkap</h3>
            <p class="text-slate-600 text-sm leading-relaxed">Lab komputer yang memadai, studio foto dan desain, perpustakaan, ruang praktik industri/Teaching Factory, WiFi sekolah, mushola, kantin dan lapangan olahraga.</p>
          </div><!-- Prestasi -->
          <div class="card-hover bg-gradient-to-br from-slate-50 to-slate-100 rounded-2xl p-6 border border-slate-200">
            <div class="w-14 h-14 bg-gradient-to-br from-amber-500 to-amber-600 rounded-xl flex items-center justify-center mb-4 shadow-lg shadow-amber-500/30">
              <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewbox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z" />
              </svg>
            </div>
            <h3 class="text-lg font-bold text-slate-900 mb-2">Prestasi Gemilang</h3>
            <p class="text-slate-600 text-sm leading-relaxed">Juara Lomba Cipta Web, Juara PC Assembly, Juara Animasi, Juara Desain Grafis, Juara Fotografi, Juara Film Pendek.</p>
          </div>
        </div>
      </div>
    </section><!-- Kompetensi Keahlian Section -->
    <section id="jurusan" class="py-20 bg-slate-50">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16"><span class="inline-block px-4 py-1.5 bg-sky-100 text-sky-600 rounded-full text-sm font-semibold mb-4">Program Unggulan</span>
          <h2 class="text-3xl md:text-4xl font-extrabold text-slate-900 mb-4">Kompetensi Keahlian</h2>
          <p class="text-slate-600 max-w-2xl mx-auto">Pilih jurusan yang sesuai dengan minat dan bakatmu untuk masa depan yang cemerlang</p>
        </div>
        <div class="grid md:grid-cols-2 gap-8 max-w-5xl mx-auto"><!-- RPL -->
          <div class="card-hover bg-white rounded-3xl overflow-hidden shadow-xl border border-slate-200">
            <div class="jurusan-rpl p-8 text-white">
              <div class="flex items-center gap-4 mb-4">
                <div class="w-16 h-16 flex items-center justify-center">
                  <img src="assets/img/rpl.png">
                </div>
                <div>
                  <h3 class="text-2xl font-bold">Rekayasa Perangkat Lunak</h3>
                  <p class="text-blue-200 text-sm">Software Engineering</p>
                </div>
              </div>
            </div>
            <div class="p-8">
              <p class="text-slate-600 mb-6 leading-relaxed">Mempelajari pengembangan aplikasi, pemrograman web &amp; mobile, database, dan teknologi terkini untuk menciptakan solusi digital inovatif.</p>
              <div class="mb-6">
                <h4 class="font-semibold text-slate-900 mb-3 flex items-center gap-2">
                  <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewbox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z" />
                  </svg> Yang Dipelajari:
                </h4>
                <div class="flex flex-wrap gap-2"><span class="px-3 py-1 bg-blue-50 text-blue-700 rounded-full text-xs font-medium">HTML/CSS/JS</span> <span class="px-3 py-1 bg-blue-50 text-blue-700 rounded-full text-xs font-medium">PHP &amp; MySQL</span> <span class="px-3 py-1 bg-blue-50 text-blue-700 rounded-full text-xs font-medium">Java/Kotlin</span> <span class="px-3 py-1 bg-blue-50 text-blue-700 rounded-full text-xs font-medium">React/Vue</span> <span class="px-3 py-1 bg-blue-50 text-blue-700 rounded-full text-xs font-medium">IoT Development</span>
                </div>
              </div>
              <div>
                <h4 class="font-semibold text-slate-900 mb-3 flex items-center gap-2">
                  <svg class="w-5 h-5 text-emerald-600" fill="none" stroke="currentColor" viewbox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                  </svg> Peluang Kerja:
                </h4>
                <div class="flex flex-wrap gap-2"><span class="px-3 py-1 bg-emerald-50 text-emerald-700 rounded-full text-xs font-medium">Software Developer</span> <span class="px-3 py-1 bg-emerald-50 text-emerald-700 rounded-full text-xs font-medium">Web Developer</span> <span class="px-3 py-1 bg-emerald-50 text-emerald-700 rounded-full text-xs font-medium">Mobile App Dev</span> <span class="px-3 py-1 bg-emerald-50 text-emerald-700 rounded-full text-xs font-medium">IoT Engineer</span>
                </div>
              </div>
            </div>
          </div><!-- DKV -->
          <div class="card-hover bg-white rounded-3xl overflow-hidden shadow-xl border border-slate-200">
            <div class="jurusan-dkv p-8 text-white">
              <div class="flex items-center gap-4 mb-4">

                <div class="w-16 h-16 flex items-center justify-center">
                  <img src="assets/img/dkv.png">
                </div>
                <div>
                  <h3 class="text-2xl font-bold">Desain Komunikasi Visual</h3>
                  <p class="text-purple-200 text-sm">Visual Communication Design</p>
                </div>
              </div>
            </div>
            <div class="p-8">
              <p class="text-slate-600 mb-6 leading-relaxed">Mempelajari seni visual, desain grafis, fotografi, videografi, dan multimedia untuk menghasilkan karya kreatif yang memikat.</p>
              <div class="mb-6">
                <h4 class="font-semibold text-slate-900 mb-3 flex items-center gap-2">
                  <svg class="w-5 h-5 text-purple-600" fill="none" stroke="currentColor" viewbox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z" />
                  </svg> Yang Dipelajari:
                </h4>
                <div class="flex flex-wrap gap-2"><span class="px-3 py-1 bg-purple-50 text-purple-700 rounded-full text-xs font-medium">Adobe Photoshop</span> <span class="px-3 py-1 bg-purple-50 text-purple-700 rounded-full text-xs font-medium">Illustrator</span> <span class="px-3 py-1 bg-purple-50 text-purple-700 rounded-full text-xs font-medium">Premiere Pro</span> <span class="px-3 py-1 bg-purple-50 text-purple-700 rounded-full text-xs font-medium">After Effects</span> <span class="px-3 py-1 bg-purple-50 text-purple-700 rounded-full text-xs font-medium">UI/UX Design</span>
                </div>
              </div>
              <div>
                <h4 class="font-semibold text-slate-900 mb-3 flex items-center gap-2">
                  <svg class="w-5 h-5 text-emerald-600" fill="none" stroke="currentColor" viewbox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                  </svg> Peluang Kerja:
                </h4>
                <div class="flex flex-wrap gap-2"><span class="px-3 py-1 bg-emerald-50 text-emerald-700 rounded-full text-xs font-medium">Graphic Designer</span> <span class="px-3 py-1 bg-emerald-50 text-emerald-700 rounded-full text-xs font-medium">UI/UX Designer</span> <span class="px-3 py-1 bg-emerald-50 text-emerald-700 rounded-full text-xs font-medium">Video Editor</span> <span class="px-3 py-1 bg-emerald-50 text-emerald-700 rounded-full text-xs font-medium">Content Creator</span> <span class="px-3 py-1 bg-emerald-50 text-emerald-700 rounded-full text-xs font-medium">Fotografi</span>
                </div>
              </div>
            </div>
          </div>
        </div><!-- Kelas Industri Section -->
        <div class="mt-16">
          <div class="text-center mb-12"><span class="inline-block px-4 py-1.5 bg-amber-100 text-amber-600 rounded-full text-sm font-semibold mb-4">Kemitraan Industri</span>
            <h3 class="text-2xl md:text-3xl font-extrabold text-slate-900 mb-3">Program Kelas Industri</h3>
            <p class="text-slate-600 max-w-2xl mx-auto">Kolaborasi dengan perusahaan terkemuka untuk meningkatkan kompetensi siswa sesuai kebutuhan industri</p>
          </div>
          <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- AXIOO RPL -->
            <div class="card-hover bg-gradient-to-br from-slate-50 to-slate-100 rounded-2xl p-6 border-2 border-slate-200">
              <div class="flex items-center gap-3 mb-4">
                <div class="w-12 h-12  from-slate-600 to-slate-700 rounded-xl flex items-center justify-center">
                  <img src="assets/img/axioo.png" alt="">
                </div>
                <div>
                  <h4 class="font-bold text-slate-900">AXIOO CLASS PROGRAM</h4>
                  <p class="text-xs text-slate-500">RPL Program</p>
                </div>
              </div>
              <p class="text-slate-600 text-sm leading-relaxed mb-3">
                Pembelajaran perangkat keras dan teknologi komputer terkini untuk jurusan Rekayasa Perangkat Lunak.
              </p>
              <div class="flex items-center gap-2 text-xs text-blue-600 font-medium">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2" />
                </svg>
                <span>Rekayasa Perangkat Lunak</span>
              </div>
            </div>

            <!-- KiDi IoT RPL -->
            <div class="card-hover bg-gradient-to-br from-blue-50 to-cyan-50 rounded-2xl p-6 border-2 border-blue-200">
              <div class="flex items-center gap-3 mb-4">
                <div class="w-12 h-12  from-blue-600 to-cyan-600 rounded-xl flex items-center justify-center">
                  <img src="assets/img/telkom.png" alt="">
                </div>
                <div>
                  <h4 class="font-bold text-slate-900">KiDi IoT</h4>
                  <p class="text-xs text-slate-500">RPL Program</p>
                </div>
              </div>
              <p class="text-slate-600 text-sm leading-relaxed mb-3">
                Pengembangan teknologi Internet of Things dan smart devices untuk jurusan Rekayasa Perangkat Lunak.
              </p>
              <div class="flex items-center gap-2 text-xs text-blue-600 font-medium">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2" />
                </svg>
                <span>Rekayasa Perangkat Lunak</span>
              </div>
            </div>
          </div>

        </div>
      </div>
    </section><!-- Alur Pendaftaran Section -->
    <section id="alur" class="py-20 bg-white">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <!-- Header -->
        <div class="text-center mb-16">
          <span class="inline-block px-4 py-1.5 bg-sky-100 text-sky-600 rounded-full text-sm font-semibold mb-4">
            Langkah Mudah
          </span>
          <h2 class="text-3xl md:text-4xl font-extrabold text-slate-900 mb-4">
            Alur Pendaftaran
          </h2>
          <p class="text-slate-600 max-w-2xl mx-auto">
            Proses pendaftaran yang simpel dan terstruktur untuk kemudahan calon siswa
          </p>
        </div>

        <!-- Timeline -->
        <div class="relative max-w-4xl mx-auto">

          <!-- Garis timeline -->
          <div class="absolute left-6 md:left-1/2 top-0 bottom-0 w-1 bg-slate-200 md:-translate-x-1/2 rounded-full"></div>

          <div class="space-y-10">

            <!-- STEP -->
            <div class="relative flex items-start md:items-center md:flex-row gap-6">

              <!-- Konten -->
              <div class="bg-gradient-to-br from-sky-50 to-cyan-50  p-6 border border-sky-100 
                      md:w-1/2 md:ml-auto">
                <h3 class="text-lg font-bold text-slate-900 mb-2">1. Daftar Online</h3>
                <p class="text-slate-600 text-sm">
                  Isi formulir pendaftaran online melalui website resmi SPMB SMK Informatika Sumedang.
                </p>
              </div>
            </div>

            <div class="relative flex items-start md:items-center md:flex-row-reverse gap-6">
              <div class="bg-gradient-to-br from-sky-50 to-cyan-50  p-6 border border-sky-100 
                      md:w-1/2 md:ml-auto">
                <h3 class="text-lg font-bold text-slate-900 mb-2">2. Upload Berkas</h3>
                <p class="text-slate-600 text-sm">
                  Unggah dokumen persyaratan sesuai format yang ditentukan.
                </p>
              </div>
            </div>

            <div class="relative flex items-start md:items-center gap-6">
              <div class="bg-gradient-to-br from-sky-50 to-cyan-50  p-6 border border-sky-100 
                      md:w-1/2 md:ml-auto">
                <h3 class="text-lg font-bold text-slate-900 mb-2">3. Verifikasi</h3>
                <p class="text-slate-600 text-sm">
                  Panitia memverifikasi kelengkapan dan keabsahan berkas.
                </p>
              </div>
            </div>

            <div class="relative flex items-start md:items-center md:flex-row-reverse gap-6">
              <div class="bg-gradient-to-br from-sky-50 to-cyan-50  p-6 border border-sky-100 
                      md:w-1/2 md:ml-auto">
                <h3 class="text-lg font-bold text-slate-900 mb-2">4. Seleksi</h3>
                <p class="text-slate-600 text-sm">
                  Calon peserta mengikuti proses seleksi sesuai ketentuan.
                </p>
              </div>
            </div>

            <div class="relative flex items-start md:items-center gap-6">
              <div class="bg-gradient-to-br from-sky-50 to-cyan-50  p-6 border border-sky-100 
                      md:w-1/2 md:ml-auto">
                <h3 class="text-lg font-bold text-slate-900 mb-2">5. Pengumuman</h3>
                <p class="text-slate-600 text-sm">
                  Hasil seleksi akan diumumkan melalui website resmi SPMB SMK Informatika Sumedang.
                </p>
              </div>
            </div>

          </div>
        </div>
      </div>
    </section>
    <!-- Jadwal Section -->
    <section id="jadwal" class="py-20 bg-gradient-to-br from-slate-900 via-slate-800 to-slate-900">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <div class="text-center mb-16">
          <span class="inline-block px-4 py-1.5 bg-sky-500/20 text-sky-400 rounded-full text-sm font-semibold mb-4 border border-sky-500/30">
            Timeline
          </span>
          <h2 class="text-3xl md:text-4xl font-extrabold text-white mb-4">Jadwal Penting</h2>
          <p class="text-slate-400 max-w-2xl mx-auto">
            Catat tanggal-tanggal penting dalam proses penerimaan murid baru
          </p>
        </div>

        <!-- GRID 2 KOLOM -->
        <div class="grid sm:grid-cols-1 lg:grid-cols-2 gap-6">

          <!-- Jalur Prestasi -->
          <div class="card-hover bg-gradient-to-br from-slate-800 to-slate-700 rounded-2xl p-6 border border-slate-600/50">

            <!-- Icon -->
            <div class="w-12 h-12 bg-amber-500/20 rounded-xl flex items-center justify-center mb-4">
              <!-- ICON PRESTASI -->
              <svg class="w-6 h-6 text-amber-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M8 21h8M12 17v4M7 4h10v3a5 5 0 01-10 0V4zM5 4v3a3 3 0 003 3M19 4v3a3 3 0 01-3 3" />
              </svg>
            </div>

            <!-- Judul -->
            <h3 class="text-lg font-bold text-white mb-1">Pendaftaran Jalur Prestasi</h3>
            <p class="text-amber-400 font-semibold text-base mb-4">
              19 Januari – 1 Mei 2026
            </p>

            <!-- Timeline Tahapan -->
            <div class="space-y-3">

              <!-- Seleksi -->
              <div class="flex items-center justify-between bg-slate-800/60 rounded-xl px-4 py-3 border border-slate-600/40">
                <span class="inline-block px-3 py-1 bg-emerald-500/20 text-emerald-400 rounded-full text-xs font-semibold border border-emerald-500/30">
                  Seleksi
                </span>
                <span class="text-slate-300 text-sm font-medium">
                  2 Mei 2026
                </span>
              </div>

              <!-- Pengumuman -->
              <div class="flex items-center justify-between bg-slate-800/60 rounded-xl px-4 py-3 border border-slate-600/40">
                <span class="inline-block px-3 py-1 bg-sky-500/20 text-sky-400 rounded-full text-xs font-semibold border border-sky-500/30">
                  Pengumuman
                </span>
                <span class="text-slate-300 text-sm font-medium">
                  3 Mei 2026
                </span>
              </div>

            </div>
          </div>


          <!-- Jalur Umum -->
          <div class="card-hover bg-gradient-to-br from-slate-800 to-slate-700 rounded-2xl p-6 border border-slate-600/50">

            <!-- Icon -->
            <div class="w-12 h-12 bg-sky-500/20 rounded-xl flex items-center justify-center mb-4">
              <!-- ICON UMUM -->
              <svg class="w-6 h-6 text-sky-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M17 20h5v-2a4 4 0 00-4-4h-1M9 20H4v-2a4 4 0 014-4h1
           M12 12a4 4 0 100-8 4 4 0 000 8z" />
              </svg>
            </div>

            <!-- Judul -->
            <h3 class="text-lg font-bold text-white mb-1">Pendaftaran Jalur Umum</h3>
            <p class="text-sky-400 font-semibold text-base mb-4">
              19 Januari – 9 Juli 2026
            </p>

            <!-- Timeline Tahapan -->
            <div class="space-y-3">

              <!-- Seleksi -->
              <div class="flex items-center justify-between bg-slate-800/60 rounded-xl px-4 py-3 border border-slate-600/40">
                <span class="inline-block px-3 py-1 bg-emerald-500/20 text-emerald-400 rounded-full text-xs font-semibold border border-emerald-500/30">
                  Seleksi
                </span>
                <span class="text-slate-300 text-sm font-medium">
                  11 Juli 2026
                </span>
              </div>

              <!-- Pengumuman -->
              <div class="flex items-center justify-between bg-slate-800/60 rounded-xl px-4 py-3 border border-slate-600/40">
                <span class="inline-block px-3 py-1 bg-sky-500/20 text-sky-400 rounded-full text-xs font-semibold border border-sky-500/30">
                  Pengumuman
                </span>
                <span class="text-slate-300 text-sm font-medium">
                  12 Juli 2026
                </span>
              </div>

            </div>
          </div>


        </div>
      </div>
    </section>

    <!-- Persyaratan Section -->
    <section id="persyaratan" class="py-20 bg-white">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16"><span class="inline-block px-4 py-1.5 bg-sky-100 text-sky-600 rounded-full text-sm font-semibold mb-4">Dokumen</span>
          <h2 class="text-3xl md:text-4xl font-extrabold text-slate-900 mb-4">Persyaratan Pendaftaran</h2>
          <p class="text-slate-600 max-w-2xl mx-auto">Siapkan dokumen-dokumen berikut untuk kelancaran proses pendaftaran</p>
        </div>
        <div class="grid sm:grid-cols-2 lg:grid-cols-5 gap-6 max-w-5xl mx-auto"><!-- Ijazah -->
          <div class="card-hover bg-gradient-to-br from-slate-50 to-slate-100 rounded-2xl p-6 text-center border border-slate-200">
            <div class="w-16 h-16 bg-gradient-to-br from-sky-500 to-sky-600 rounded-2xl flex items-center justify-center mx-auto mb-4 shadow-lg shadow-sky-500/30">
              <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewbox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
              </svg>
            </div>
            <h3 class="font-bold text-slate-900 mb-1">Ijazah / SKL</h3>
            <p class="text-slate-500 text-sm">Scan asli berwarna</p>
          </div><!-- Akte -->
          <div class="card-hover bg-gradient-to-br from-slate-50 to-slate-100 rounded-2xl p-6 text-center border border-slate-200">
            <div class="w-16 h-16 bg-gradient-to-br from-emerald-500 to-emerald-600 rounded-2xl flex items-center justify-center mx-auto mb-4 shadow-lg shadow-emerald-500/30">
              <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewbox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V8a2 2 0 00-2-2h-5m-4 0V5a2 2 0 114 0v1m-4 0a2 2 0 104 0m-5 8a2 2 0 100-4 2 2 0 000 4zm0 0c1.306 0 2.417.835 2.83 2M9 14a3.001 3.001 0 00-2.83 2M15 11h3m-3 4h2" />
              </svg>
            </div>
            <h3 class="font-bold text-slate-900 mb-1">Akte Kelahiran</h3>
            <p class="text-slate-500 text-sm">Scan asli berwarna</p>
          </div><!-- Raport -->
          <div class="card-hover bg-gradient-to-br from-slate-50 to-slate-100 rounded-2xl p-6 text-center border border-slate-200">
            <div class="w-16 h-16 bg-gradient-to-br from-violet-500 to-violet-600 rounded-2xl flex items-center justify-center mx-auto mb-4 shadow-lg shadow-violet-500/30">
              <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewbox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
              </svg>
            </div>
            <h3 class="font-bold text-slate-900 mb-1">Raport</h3>
            <p class="text-slate-500 text-sm">Semester 3-5</p>
          </div><!-- KK -->
          <div class="card-hover bg-gradient-to-br from-slate-50 to-slate-100 rounded-2xl p-6 text-center border border-slate-200">
            <div class="w-16 h-16 bg-gradient-to-br from-amber-500 to-amber-600 rounded-2xl flex items-center justify-center mx-auto mb-4 shadow-lg shadow-amber-500/30">
              <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewbox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
              </svg>
            </div>
            <h3 class="font-bold text-slate-900 mb-1">Kartu Keluarga</h3>
            <p class="text-slate-500 text-sm">Scan asli berwarna</p>
          </div><!-- Pas Foto -->
          <div class="card-hover bg-gradient-to-br from-slate-50 to-slate-100 rounded-2xl p-6 text-center border border-slate-200">
            <div class="w-16 h-16 bg-gradient-to-br from-rose-500 to-rose-600 rounded-2xl flex items-center justify-center mx-auto mb-4 shadow-lg shadow-rose-500/30">
              <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewbox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z" />
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z" />
              </svg>
            </div>
            <h3 class="font-bold text-slate-900 mb-1">Pas Foto</h3>
            <p class="text-slate-500 text-sm">3x4 background merah</p>
          </div>
        </div>
        <div class="mt-10 p-6 bg-amber-50 rounded-2xl border border-amber-200 max-w-3xl mx-auto">
          <div class="flex items-start gap-4">
            <div class="w-10 h-10 bg-amber-500 rounded-xl flex items-center justify-center flex-shrink-0">
              <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewbox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
              </svg>
            </div>
            <div>
              <h4 class="font-bold text-amber-800 mb-1">Catatan Penting</h4>
              <p class="text-amber-700 text-sm">Semua dokumen harus dalam format PDF atau JPG dengan ukuran maksimal 2MB per file. Pastikan hasil scan jelas dan terbaca dengan baik.</p>
            </div>
          </div>
        </div>
      </div>
    </section><!-- FAQ Section -->
    <section id="faq" class="py-20 bg-slate-50">
      <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16"><span class="inline-block px-4 py-1.5 bg-sky-100 text-sky-600 rounded-full text-sm font-semibold mb-4">Bantuan</span>
          <h2 class="text-3xl md:text-4xl font-extrabold text-slate-900 mb-4">Pertanyaan Umum</h2>
          <p class="text-slate-600 max-w-2xl mx-auto">Temukan jawaban dari pertanyaan yang sering ditanyakan seputar SPMB</p>
        </div>
        <div class="space-y-4" id="faq-container"><!-- FAQ 1 -->
          <div class="faq-item bg-white rounded-2xl border border-slate-200 overflow-hidden"><button class="faq-btn w-full px-6 py-5 text-left flex items-center justify-between hover:bg-slate-50 transition-colors"> <span class="font-semibold text-slate-900">Bagaimana cara mendaftar online?</span>
              <svg class="faq-icon w-5 h-5 text-slate-400 transition-transform" fill="none" stroke="currentColor" viewbox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
              </svg></button>
            <div class="faq-content hidden px-6 pb-5">
              <p class="text-slate-600">Klik tombol "Daftar Sekarang" di website ini, kemudian isi formulir pendaftaran dengan data yang valid serta upload berkas yang diperlukan.</p>
            </div>
          </div><!-- FAQ 2 -->
          <div class="faq-item bg-white rounded-2xl border border-slate-200 overflow-hidden"><button class="faq-btn w-full px-6 py-5 text-left flex items-center justify-between hover:bg-slate-50 transition-colors"> <span class="font-semibold text-slate-900">Apakah ada biaya pendaftaran?</span>
              <svg class="faq-icon w-5 h-5 text-slate-400 transition-transform" fill="none" stroke="currentColor" viewbox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
              </svg></button>
            <div class="faq-content hidden px-6 pb-5">
              <p class="text-slate-600">Pendaftaran dilakukan secara gratis tanpa biaya pendaftaran.
                Calon murid baru hanya dikenakan biaya seleksi sebesar Rp100.000.</p>
            </div>
          </div><!-- FAQ 3 -->
          <div class="faq-item bg-white rounded-2xl border border-slate-200 overflow-hidden"><button class="faq-btn w-full px-6 py-5 text-left flex items-center justify-between hover:bg-slate-50 transition-colors"> <span class="font-semibold text-slate-900">Berapa kuota yang tersedia untuk setiap jurusan?</span>
              <svg class="faq-icon w-5 h-5 text-slate-400 transition-transform" fill="none" stroke="currentColor" viewbox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
              </svg></button>
            <div class="faq-content hidden px-6 pb-5">
              <p class="text-slate-600">Kuota penerimaan murid baru SMK Informatika Sumedang terdiri dari 360 siswa untuk jurusan Rekayasa Perangkat Lunak (RPL), 108 siswa untuk Desain Komunikasi Visual (DKV), 36 siswa untuk Axioo Class Program, dan 36 siswa untuk Kelas Telkom.</p>
            </div>
          </div><!-- FAQ 4 -->
          <div class="faq-item bg-white rounded-2xl border border-slate-200 overflow-hidden"><button class="faq-btn w-full px-6 py-5 text-left flex items-center justify-between hover:bg-slate-50 transition-colors"> <span class="font-semibold text-slate-900">Apakah ada program beasiswa?</span>
              <svg class="faq-icon w-5 h-5 text-slate-400 transition-transform" fill="none" stroke="currentColor" viewbox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
              </svg></button>
            <div class="faq-content hidden px-6 pb-5">
              <p class="text-slate-600">Program beasiswa SMK Informatika Sumedang diberikan kepada murid yang diterima melalui jalur prestasi serta menunjukkan prestasi akademik dan/atau nonakademik yang membanggakan selama menempuh pendidikan di SMK Informatika Sumedang.</p>
            </div>
          </div><!-- FAQ 5 -->
          <div class="faq-item bg-white rounded-2xl border border-slate-200 overflow-hidden"><button class="faq-btn w-full px-6 py-5 text-left flex items-center justify-between hover:bg-slate-50 transition-colors"> <span class="font-semibold text-slate-900">Apakah biaya pendidikan di SMK Informatika Sumedang terjangkau?</span>
              <svg class="faq-icon w-5 h-5 text-slate-400 transition-transform" fill="none" stroke="currentColor" viewbox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
              </svg></button>
            <div class="faq-content hidden px-6 pb-5">
              <p class="text-slate-600">Biaya pendidikan di SMK Informatika Sumedang dirancang agar terjangkau bagi berbagai lapisan masyarakat. Selain itu, tersedia program beasiswa prestasi bagi siswa yang memenuhi kriteria, sehingga dapat membantu meringankan beban biaya pendidikan.</p>
            </div>
          </div>
        </div>
      </div>
    </section><!-- CTA Section -->
    <section id="daftar" class="py-20 gradient-hero relative overflow-hidden">
      <div class="absolute inset-0 opacity-30">
        <div class="absolute top-10 right-20 w-64 h-64 bg-sky-500 rounded-full filter blur-3xl"></div>
        <div class="absolute bottom-10 left-20 w-80 h-80 bg-cyan-500 rounded-full filter blur-3xl"></div>
      </div>
      <div class="relative max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-3xl md:text-5xl font-extrabold text-white mb-6">Siap Bergabung Bersama Kami?</h2>
        <p class="text-xl text-slate-300 mb-10 max-w-2xl mx-auto">Wujudkan impianmu menjadi ahli teknologi dan desain bersama SMK Informatika Sumedang</p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center"><a href="login" class="group px-10 py-5 bg-white text-slate-900 font-bold text-lg rounded-full hover:bg-slate-100 transition-all shadow-xl flex items-center justify-center gap-3"> <span>Daftar Sekarang</span>
            <svg class="w-6 h-6 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewbox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" />
            </svg></a> <a href="https://wa.me/6281321093109" target="_blank" rel="noopener noreferrer" class="px-10 py-5 bg-emerald-500 text-white font-bold text-lg rounded-full hover:bg-emerald-600 transition-all shadow-xl flex items-center justify-center gap-3">
            <svg class="w-6 h-6" fill="currentColor" viewbox="0 0 24 24">
              <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z" />
            </svg><span>Hubungi Kami</span> </a>
        </div>
      </div>
    </section><!-- Footer -->
    <footer class="bg-slate-900 pt-16 pb-8 border-t border-slate-800">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-10 mb-12"><!-- About -->
          <div>
            <div class="flex items-center gap-3 mb-4">
              <div class="w-10 h-10  from-sky-400 to-cyan-400 flex items-center justify-center">
                <img src="assets/img/logo.png" alt="" srcset="">
              </div>
              <h3 id="school-name-footer" class="text-lg font-bold text-white">SMK Informatika Sumedang</h3>
            </div>
            <p class="text-slate-400 text-sm leading-relaxed">Menjadi sekolah pusat pendidikan dan pengembangan teknologi informasi yang unggul untuk menghasilkan lulusan yang profesional dan berakhlak mulia.</p>
          </div><!-- Contact -->
          <div>
            <h4 class="text-white font-bold mb-4">Kontak</h4>
            <ul class="space-y-3">
              <li class="flex items-start gap-3 text-slate-400 text-sm">
                <svg class="w-5 h-5 text-sky-400 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewbox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                </svg><span id="school-address">Jl. Angkrek Situ No.19, Kel. Situ, Sumedang</span>
              </li>
              <li class="flex items-center gap-3 text-slate-400 text-sm">
                <svg class="w-5 h-5 text-sky-400 flex-shrink-0" fill="none" stroke="currentColor" viewbox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                </svg><span id="school-phone">(0261) 202 767 </span>
              </li>
              <li class="flex items-center gap-3 text-slate-400 text-sm">
                <svg class="w-5 h-5 text-sky-400 flex-shrink-0" fill="none" stroke="currentColor" viewbox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                </svg><span id="school-email">info@smkifsu.sch.id</span>
              </li>
            </ul>
          </div><!-- Quick Links -->
          <div>
            <h4 class="text-white font-bold mb-4">Link Cepat</h4>
            <ul class="space-y-2">
              <li><a href="#beranda" class="text-slate-400 text-sm hover:text-sky-400 transition-colors">Beranda</a></li>
              <li><a href="#profil" class="text-slate-400 text-sm hover:text-sky-400 transition-colors">Profil Sekolah</a></li>
              <li><a href="#jurusan" class="text-slate-400 text-sm hover:text-sky-400 transition-colors">Kompetensi Keahlian</a></li>
              <li><a href="#alur" class="text-slate-400 text-sm hover:text-sky-400 transition-colors">Alur Pendaftaran</a></li>
              <li><a href="#jadwal" class="text-slate-400 text-sm hover:text-sky-400 transition-colors">Jadwal Penting</a></li>
            </ul>
          </div><!-- Social Media -->
          <div>
            <h4 class="text-white font-bold mb-4">Media Sosial</h4>
            <div class="flex gap-3"><a href="#" class="w-10 h-10 bg-slate-800 rounded-xl flex items-center justify-center text-slate-400 hover:bg-sky-500 hover:text-white transition-all">
                <svg class="w-5 h-5" fill="currentColor" viewbox="0 0 24 24">
                  <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z" />
                </svg></a> <a href="https://www.instagram.com/smkinformatikasumedang" class="w-10 h-10 bg-slate-800 rounded-xl flex items-center justify-center text-slate-400 hover:bg-pink-500 hover:text-white transition-all">
                <svg class="w-5 h-5" fill="currentColor" viewbox="0 0 24 24">
                  <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z" />
                </svg></a> <a href="https://www.youtube.com/@SMKInformatikaSumedang" class="w-10 h-10 bg-slate-800 rounded-xl flex items-center justify-center text-slate-400 hover:bg-red-500 hover:text-white transition-all">
                <svg class="w-5 h-5" fill="currentColor" viewbox="0 0 24 24">
                  <path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z" />
                </svg></a> <a href="https://www.tiktok.com/@dkvifsu" class="w-10 h-10 bg-slate-800 rounded-xl flex items-center justify-center text-slate-400 hover:bg-sky-400 hover:text-white transition-all">
                <svg class="w-5 h-5" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                  <path d="M19.589 6.686a4.793 4.793 0 0 1-3.77-4.25V2h-3.4v13.673a2.861 2.861 0 1 1-2.861-2.861c.27 0 .535.04.79.116V9.5a6.262 6.262 0 0 0-.79-.05A6.262 6.262 0 1 0 15.82 15.7V8.822a8.175 8.175 0 0 0 4.77 1.524V7.01a4.76 4.76 0 0 1-.999-.324z" />
                </svg>
              </a>
            </div><!-- Google Maps -->
            <div class="mt-6">
              <h5 class="text-white font-semibold text-sm mb-3">Lokasi Kami</h5>
              <div class="rounded-xl overflow-hidden border border-slate-700"><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3961.456410435347!2d107.9213994740342!3d-6.8357537668665875!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68d6cca33a73eb%3A0xafda24d08020430d!2sSMK%20Informatika%20Sumedang!5e0!3m2!1sen!2sid!4v1768997621662!5m2!1sen!2sid" width="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
              </div>
            </div>
          </div>
        </div><!-- Copyright -->
        <div class="pt-8 border-t border-slate-800 text-center">
          <p class="text-slate-500 text-sm">© 2026 SMK Informatika Sumedang. All rights reserved</p>
        </div>
      </div>
    </footer>
  </div>
  <script>
    // Default configuration
    const defaultConfig = {
      school_name: 'SMK Negeri 1 Nusantara',
      hero_title: 'Penerimaan Murid Baru',
      school_vision: '"Mencetak Generasi Unggul, Berkarakter, dan Siap Bersaing di Era Digital"',
      school_address: 'Jl. Pendidikan No. 1, Kota Nusantara, Indonesia 12345',
      school_phone: '(021) 123-4567',
      school_email: 'info@smkn1nusantara.sch.id',
      primary_color: '#0ea5e9',
      secondary_color: '#0f172a',
      accent_color: '#22d3ee',
      text_color: '#334155',
      background_color: '#f8fafc'
    };

    let config = {
      ...defaultConfig
    };

    // Initialize Element SDK
    if (window.elementSdk) {
      window.elementSdk.init({
        defaultConfig,
        onConfigChange: async (newConfig) => {
          config = {
            ...defaultConfig,
            ...newConfig
          };

          // Update school name
          const schoolNameHeader = document.getElementById('school-name-header');
          const schoolNameFooter = document.getElementById('school-name-footer');
          if (schoolNameHeader) schoolNameHeader.textContent = config.school_name || defaultConfig.school_name;
          if (schoolNameFooter) schoolNameFooter.textContent = config.school_name || defaultConfig.school_name;

          // Update hero section
          const heroTitle = document.getElementById('hero-title');
          const schoolVision = document.getElementById('school-vision');
          if (heroTitle) heroTitle.textContent = config.hero_title || defaultConfig.hero_title;
          if (schoolVision) schoolVision.textContent = config.school_vision || defaultConfig.school_vision;

          // Update contact info
          const schoolAddress = document.getElementById('school-address');
          const schoolPhone = document.getElementById('school-phone');
          const schoolEmail = document.getElementById('school-email');
          if (schoolAddress) schoolAddress.textContent = config.school_address || defaultConfig.school_address;
          if (schoolPhone) schoolPhone.textContent = config.school_phone || defaultConfig.school_phone;
          if (schoolEmail) schoolEmail.textContent = config.school_email || defaultConfig.school_email;
        },
        mapToCapabilities: (config) => ({
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
              get: () => config.secondary_color || defaultConfig.secondary_color,
              set: (value) => {
                config.secondary_color = value;
                window.elementSdk.setConfig({
                  secondary_color: value
                });
              }
            },
            {
              get: () => config.accent_color || defaultConfig.accent_color,
              set: (value) => {
                config.accent_color = value;
                window.elementSdk.setConfig({
                  accent_color: value
                });
              }
            }
          ],
          borderables: [],
          fontEditable: undefined,
          fontSizeable: undefined
        }),
        mapToEditPanelValues: (config) => new Map([
          ['school_name', config.school_name || defaultConfig.school_name],
          ['hero_title', config.hero_title || defaultConfig.hero_title],
          ['school_vision', config.school_vision || defaultConfig.school_vision],
          ['school_address', config.school_address || defaultConfig.school_address],
          ['school_phone', config.school_phone || defaultConfig.school_phone],
          ['school_email', config.school_email || defaultConfig.school_email]
        ])
      });
    }

    // Mobile menu toggle
    const mobileMenuBtn = document.getElementById('mobile-menu-btn');
    const mobileMenu = document.getElementById('mobile-menu');

    if (mobileMenuBtn && mobileMenu) {
      mobileMenuBtn.addEventListener('click', () => {
        mobileMenu.classList.toggle('hidden');
      });

      // Close mobile menu when clicking on a link
      mobileMenu.querySelectorAll('a').forEach(link => {
        link.addEventListener('click', () => {
          mobileMenu.classList.add('hidden');
        });
      });
    }

    // FAQ accordion
    const faqItems = document.querySelectorAll('.faq-item');
    faqItems.forEach(item => {
      const btn = item.querySelector('.faq-btn');
      const content = item.querySelector('.faq-content');
      const icon = item.querySelector('.faq-icon');

      btn.addEventListener('click', () => {
        const isOpen = !content.classList.contains('hidden');

        // Close all other FAQs
        faqItems.forEach(otherItem => {
          otherItem.querySelector('.faq-content').classList.add('hidden');
          otherItem.querySelector('.faq-icon').style.transform = 'rotate(0deg)';
        });

        // Toggle current FAQ
        if (!isOpen) {
          content.classList.remove('hidden');
          icon.style.transform = 'rotate(180deg)';
        }
      });
    });

    // Header scroll effect
    const header = document.getElementById('header');
    window.addEventListener('scroll', () => {
      if (window.scrollY > 50) {
        header.classList.add('shadow-xl');
      } else {
        header.classList.remove('shadow-xl');
      }
    });

    // Smooth scroll for anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
      anchor.addEventListener('click', function(e) {
        e.preventDefault();
        const target = document.querySelector(this.getAttribute('href'));
        if (target) {
          const headerOffset = 80;
          const elementPosition = target.getBoundingClientRect().top;
          const offsetPosition = elementPosition + window.pageYOffset - headerOffset;

          window.scrollTo({
            top: offsetPosition,
            behavior: 'smooth'
          });
        }
      });
    });
  </script>
  <script>
    (function() {
      function c() {
        var b = a.contentDocument || a.contentWindow.document;
        if (b) {
          var d = b.createElement('script');
          d.innerHTML = "window.__CF$cv$params={r:'9c146000b0a2d439',t:'MTc2ODk3Mjk1OS4wMDAwMDA='};var a=document.createElement('script');a.nonce='';a.src='/cdn-cgi/challenge-platform/scripts/jsd/main.js';document.getElementsByTagName('head')[0].appendChild(a);";
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