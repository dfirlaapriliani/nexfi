<!DOCTYPE html>
<html lang="id" class="overflow-x-hidden">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>NexFi — Your Next Future in Finance</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet" />
  <link rel="icon" type="image/png" href="{{ asset('assets_public/nex.png') }}">
  <link rel="shortcut icon" type="image/png" href="{{ asset('assets_public/nex.png') }}">
  <script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            bg:      '#07080f',
            bg2:     '#0c0d1d',
            bg3:     '#10132a',
            accent:  '#6c63ff',
            accent2: '#9b59f5',
          },
          fontFamily: {
            inter: ['Inter', 'sans-serif'],
          },
        }
      }
    }
  </script>
  <style>
    *, *::before, *::after { box-sizing: border-box; }
    html, body { margin:0; padding:0; overflow-x:hidden !important; max-width:100%; font-family:'Inter',sans-serif; }
    body { background:#07080f !important; color:rgba(255,255,255,0.9) !important; }

    :root {
      --bg:      #07080f;
      --bg2:     #0c0d1d;
      --bg3:     #10132a;
      --accent:  #6c63ff;
      --accent2: #9b59f5;
      --border:  rgba(108,99,255,0.2);
      --glow:    rgba(108,99,255,0.3);
      --muted:   rgba(255,255,255,0.38);
      --muted2:  rgba(255,255,255,0.55);
    }

    /* ===== SWEETALERT2 ===== */
    .swal2-container { z-index: 99999 !important; }
    .swal2-popup.nexfi-alert {
      background: linear-gradient(145deg, #0e0f20, #12132a) !important;
      border: 1px solid rgba(108,99,255,0.35) !important;
      border-radius: 24px !important;
      box-shadow: 0 0 0 1px rgba(108,99,255,0.1), 0 24px 80px rgba(0,0,0,0.6), 0 0 60px rgba(108,99,255,0.12) !important;
      font-family: 'Inter', sans-serif !important;
      padding: 36px 32px 28px !important;
    }
    .swal2-popup.nexfi-alert .swal2-title { color:#fff !important; font-family:'Inter',sans-serif !important; font-weight:800 !important; font-size:1.25rem !important; letter-spacing:-0.02em !important; margin-bottom:4px !important; }
    .swal2-popup.nexfi-alert .swal2-html-container { color:rgba(255,255,255,0.55) !important; font-family:'Inter',sans-serif !important; font-size:0.875rem !important; line-height:1.7 !important; margin-top:8px !important; }
    .swal2-popup.nexfi-alert .swal2-icon.swal2-success { border-color:rgba(108,99,255,0.4) !important; color:#6c63ff !important; }
    .swal2-popup.nexfi-alert .swal2-icon.swal2-success .swal2-success-ring { border-color:rgba(108,99,255,0.2) !important; }
    .swal2-popup.nexfi-alert .swal2-icon.swal2-success [class^='swal2-success-line'] { background-color:#6c63ff !important; }
    .swal2-popup.nexfi-alert .swal2-icon.swal2-warning { border-color:rgba(245,158,11,0.5) !important; color:#f59e0b !important; }
    .swal2-popup.nexfi-alert .swal2-icon.swal2-error { border-color:rgba(239,68,68,0.4) !important; }
    .swal2-popup.nexfi-alert .swal2-icon.swal2-error [class^='swal2-x-mark-line'] { background-color:#ef4444 !important; }
    .swal2-popup.nexfi-alert .swal2-actions { margin-top:24px !important; gap:10px !important; }
    .swal2-popup.nexfi-alert .swal2-confirm { background:linear-gradient(135deg,#6c63ff,#9b59f5) !important; border:none !important; border-radius:9999px !important; font-family:'Inter',sans-serif !important; font-weight:700 !important; font-size:0.875rem !important; padding:11px 28px !important; box-shadow:0 8px 24px rgba(108,99,255,0.4) !important; transition:opacity 0.2s,transform 0.2s !important; }
    .swal2-popup.nexfi-alert .swal2-confirm:hover { opacity:0.88 !important; transform:translateY(-1px) !important; }
    .swal2-popup.nexfi-alert .swal2-cancel { background:rgba(255,255,255,0.06) !important; border:1px solid rgba(255,255,255,0.1) !important; border-radius:9999px !important; color:rgba(255,255,255,0.5) !important; font-family:'Inter',sans-serif !important; font-weight:600 !important; font-size:0.875rem !important; padding:11px 28px !important; }
    .swal2-popup.nexfi-alert .swal2-timer-progress-bar { background:linear-gradient(90deg,#6c63ff,#9b59f5) !important; border-radius:0 0 24px 24px !important; }
    .swal2-backdrop-show { background:rgba(0,0,0,0.75) !important; backdrop-filter:blur(6px) !important; }

    /* ===== CUSTOM UTILITIES ===== */
    .gradient-text { background:linear-gradient(135deg,#6c63ff,#9b59f5); -webkit-background-clip:text; -webkit-text-fill-color:transparent; background-clip:text; }
    .btn-login-nav { -webkit-text-fill-color:#fff !important; }
    .bg-grid-overlay { position:fixed; top:0; left:0; width:100vw; height:100vh; pointer-events:none; z-index:0; background-image:linear-gradient(rgba(108,99,255,0.12) 1px,transparent 1px),linear-gradient(90deg,rgba(108,99,255,0.12) 1px,transparent 1px); background-size:40px 40px; }
    .card-dark { background:#0c0d1d; border:1px solid rgba(108,99,255,0.2); border-radius:18px; }
    .card-dark:hover { box-shadow:0 8px 32px rgba(108,99,255,0.15); }
    .inp-dark { width:100%; background:rgba(255,255,255,0.05); border:1.5px solid rgba(255,255,255,0.09); border-radius:12px; padding:12px 16px; font-size:14px; font-family:'Inter',sans-serif; font-weight:500; color:#fff; outline:none; transition:all 0.2s; }
    .inp-dark::placeholder { color:rgba(255,255,255,0.2); }
    .inp-dark:focus { background:rgba(108,99,255,0.08); border-color:#6c63ff; box-shadow:0 0 0 4px rgba(108,99,255,0.12); }
    .inp-dark[readonly] { opacity:0.65; cursor:not-allowed; }
    .inp-dark[readonly]:focus { background:rgba(255,255,255,0.05); border-color:rgba(255,255,255,0.09); box-shadow:none; }
    .section-divider { height:1px; background:linear-gradient(90deg,transparent,rgba(108,99,255,0.3),transparent); }

    /* ===== PDF CARD ===== */
    .pdf-thumb { position:relative; cursor:pointer; display:block; width:100%; overflow:hidden; aspect-ratio:16/9; }
    .pdf-thumb img { width:100%; height:100%; object-fit:cover; display:block; transition:transform 0.4s ease; }
    .pdf-thumb:hover img { transform:scale(1.03); }
    .pdf-play { position:absolute; inset:0; display:flex; align-items:center; justify-content:center; background:rgba(10,5,30,0.45); transition:background 0.3s ease; }
    .pdf-thumb:hover .pdf-play { background:rgba(10,5,30,0.3); }
    .pdf-play div { width:64px; height:64px; border-radius:50%; background:rgba(108,99,255,0.9); border:2px solid rgba(167,139,250,0.5); display:flex; align-items:center; justify-content:center; color:#fff; font-size:1.4rem; box-shadow:0 8px 30px rgba(108,99,255,0.4); transition:transform 0.2s,background 0.2s; }
    .pdf-thumb:hover .pdf-play div { transform:scale(1.1); background:rgba(124,58,237,1); }

    /* ===== PDF MODAL - REDESIGNED ===== */
    .pdf-modal {
      display: none;
      position: fixed;
      inset: 0;
      z-index: 9999;
      background: rgba(0, 0, 0, 0.92);
      backdrop-filter: blur(12px);
      -webkit-backdrop-filter: blur(12px);
      align-items: center;
      justify-content: center;
      padding: 16px;
      animation: fadeIn 0.3s ease;
    }
    .pdf-modal.open { display: flex; }
    
    @keyframes fadeIn {
      from { opacity: 0; }
      to { opacity: 1; }
    }
    
    @keyframes slideUp {
      from { opacity: 0; transform: translateY(30px) scale(0.95); }
      to { opacity: 1; transform: translateY(0) scale(1); }
    }
    
    .pdf-modal-inner {
      position: relative;
      width: 100%;
      height: 100%;
      max-width: 1100px;
      max-height: 95vh;
      background: #0e0f20;
      border-radius: 20px;
      border: 1px solid rgba(108, 99, 255, 0.25);
      box-shadow: 
        0 0 0 1px rgba(108, 99, 255, 0.1),
        0 30px 80px rgba(0, 0, 0, 0.8),
        0 0 100px rgba(108, 99, 255, 0.08);
      display: flex;
      flex-direction: column;
      overflow: hidden;
      animation: slideUp 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    }
    
    /* Modal Header */
    .pdf-modal-header {
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 16px 20px;
      border-bottom: 1px solid rgba(108, 99, 255, 0.15);
      flex-shrink: 0;
      background: rgba(108, 99, 255, 0.03);
    }
    
    .pdf-modal-title {
      display: flex;
      align-items: center;
      gap: 10px;
      font-size: 0.9rem;
      font-weight: 700;
      color: #fff;
    }
    
    .pdf-modal-title i {
      color: #6c63ff;
      font-size: 1.1rem;
    }
    
    .pdf-modal-actions {
      display: flex;
      align-items: center;
      gap: 8px;
    }
    
    .pdf-modal-btn {
      width: 36px;
      height: 36px;
      border-radius: 10px;
      border: 1px solid rgba(255, 255, 255, 0.1);
      background: rgba(255, 255, 255, 0.04);
      color: rgba(255, 255, 255, 0.6);
      cursor: pointer;
      display: flex;
      align-items: center;
      justify-content: center;
      transition: all 0.2s;
      font-size: 0.85rem;
    }
    
    .pdf-modal-btn:hover {
      background: rgba(108, 99, 255, 0.15);
      border-color: rgba(108, 99, 255, 0.3);
      color: #fff;
    }
    
    .pdf-modal-close {
      width: 36px;
      height: 36px;
      border-radius: 10px;
      border: 1px solid rgba(239, 68, 68, 0.2);
      background: rgba(239, 68, 68, 0.08);
      color: rgba(239, 68, 68, 0.6);
      cursor: pointer;
      display: flex;
      align-items: center;
      justify-content: center;
      transition: all 0.2s;
      font-size: 1rem;
    }
    
    .pdf-modal-close:hover {
      background: rgba(239, 68, 68, 0.2);
      border-color: rgba(239, 68, 68, 0.4);
      color: #f87171;
    }
    
    /* PDF Container */
    .pdf-modal-body {
      flex: 1;
      position: relative;
      overflow: hidden;
      background: #0a0b18;
    }
    
    .pdf-modal-body iframe {
      width: 100%;
      height: 100%;
      border: none;
      display: block;
    }
    
    /* Loading State */
    .pdf-loading {
      position: absolute;
      inset: 0;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      gap: 16px;
      background: #0a0b18;
    }
    
    .pdf-loading-spinner {
      width: 48px;
      height: 48px;
      border-radius: 50%;
      border: 3px solid rgba(108, 99, 255, 0.15);
      border-top-color: #6c63ff;
      animation: spin 0.8s linear infinite;
    }
    
    @keyframes spin {
      to { transform: rotate(360deg); }
    }
    
    .pdf-loading-text {
      font-size: 0.85rem;
      color: rgba(255, 255, 255, 0.4);
      font-weight: 500;
    }
    
    /* Footer */
    .pdf-modal-footer {
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 6px;
      padding: 10px 20px;
      border-top: 1px solid rgba(108, 99, 255, 0.1);
      flex-shrink: 0;
      font-size: 0.72rem;
      color: rgba(255, 255, 255, 0.25);
      background: rgba(108, 99, 255, 0.02);
    }
    
    .pdf-modal-footer i {
      color: rgba(108, 99, 255, 0.4);
      font-size: 0.65rem;
    }
    
    /* ===== MOBILE PDF MODAL ===== */
    @media (max-width: 767px) {
      .pdf-modal {
        padding: 0;
        align-items: stretch;
      }
      
      .pdf-modal-inner {
        border-radius: 0;
        max-height: 100vh;
        height: 100%;
        border: none;
        animation: none;
      }
      
      .pdf-modal-header {
        padding: 12px 16px;
        border-radius: 0;
      }
      
      .pdf-modal-title {
        font-size: 0.82rem;
      }
      
      .pdf-modal-body {
        /* Portrait orientation for mobile */
        aspect-ratio: auto;
      }
      
      .pdf-modal-body iframe {
        /* Allow natural PDF scrolling on mobile */
        -webkit-overflow-scrolling: touch;
      }
    }
    
    /* Tablet */
    @media (min-width: 768px) and (max-width: 1023px) {
      .pdf-modal-inner {
        max-width: 95vw;
        max-height: 90vh;
      }
    }

    /* ===== TESTI SLIDER ===== */
    .testi-track { display:flex; gap:24px; transition:transform 0.42s cubic-bezier(0.4,0,0.2,1); align-items:stretch; }
    .testi-slide { flex:0 0 calc((100% - 48px) / 3); min-width:0; }
    .testi-dots { display:flex; justify-content:center; gap:8px; margin-top:28px; }
    .testi-dot { width:8px; height:8px; border-radius:50%; background:rgba(255,255,255,0.15); cursor:pointer; border:none; padding:0; transition:all 0.25s; }
    .testi-dot.active { width:24px; border-radius:4px; background:linear-gradient(90deg,#6c63ff,#9b59f5); }

    /* ===== FORM ===== */
    .form-grid { display:grid; grid-template-columns:1fr 1fr; gap:20px; }
    .btn-kirim { grid-column:1/-1; display:flex; align-items:center; justify-content:center; gap:8px; color:#fff; font-weight:700; padding:14px; border-radius:16px; border:none; cursor:pointer; font-size:0.875rem; font-family:'Inter',sans-serif; background:linear-gradient(135deg,#6c63ff,#9b59f5); box-shadow:0 10px 30px rgba(108,99,255,0.3); transition:opacity 0.2s,transform 0.2s; width:100%; }
    .btn-kirim:hover { opacity:0.9; transform:translateY(-1px); }
    .btn-kirim:active { transform:translateY(0); }
    .btn-kirim:disabled { opacity:0.6; cursor:not-allowed; transform:none; }
    .form-label { font-size:0.72rem; font-weight:700; text-transform:uppercase; letter-spacing:0.07em; color:rgba(255,255,255,0.35); display:block; margin-bottom:6px; }

    /* ===== AUTH GATE ===== */
    .auth-gate { text-align:center; padding:52px 24px; display:flex; flex-direction:column; align-items:center; gap:14px; }
    .auth-gate-icon { width:72px; height:72px; border-radius:50%; background:rgba(108,99,255,0.12); border:1px solid rgba(108,99,255,0.3); display:flex; align-items:center; justify-content:center; margin-bottom:4px; }

    /* ===== MOBILE ===== */
    @media (max-width:767px) {
      #aboutBottom { grid-template-columns:1fr !important; gap:24px !important; }
      #ytCardWrap  { justify-content:center; }
      #youtubeCard { max-width:460px; }
      .pdf-play div { width:52px; height:52px; font-size:1.2rem; }
      .testi-track { gap:16px; }
      .testi-slide { flex:0 0 100%; }
      .form-grid     { grid-template-columns:1fr !important; }
      .form-grid > * { grid-column:1 !important; }
      .btn-kirim     { grid-column:1 !important; }
      .hero-btns     { flex-direction:column; align-items:stretch; }
      .hero-btns a   { justify-content:center !important; }
    }
  </style>
</head>
<body class="font-inter">

{{-- BG OVERLAYS --}}
<div class="bg-grid-overlay"></div>
<div class="fixed w-[600px] h-[600px] rounded-full pointer-events-none z-0" style="background:radial-gradient(circle,rgba(108,99,255,0.22) 0%,transparent 70%);top:-180px;left:-140px;"></div>
<div class="fixed w-[500px] h-[500px] rounded-full pointer-events-none z-0" style="background:radial-gradient(circle,rgba(155,89,245,0.16) 0%,transparent 70%);bottom:-120px;right:-100px;"></div>

<!-- ===== NAVBAR ===== -->
<nav id="navbar" class="fixed top-0 left-0 right-0 z-50 h-[66px] px-[5%] flex items-center justify-between border-b" style="background:rgba(7,8,15,0.95);backdrop-filter:blur(20px);border-color:rgba(108,99,255,0.15);">
  <a href="#home" class="flex items-center gap-2 no-underline">
    <img src="{{ asset('assets_public/logo.png') }}" alt="NexFi" class="h-[52px] w-auto object-contain">
  </a>

  <ul id="navLinks" class="hidden md:flex gap-8 list-none m-0 p-0 items-center">
    <li><a href="#home"         class="flex items-center gap-1.5 font-semibold text-sm no-underline transition-colors" style="color:var(--muted2);" onmouseover="this.style.color='#6c63ff'" onmouseout="this.style.color='rgba(255,255,255,0.55)'"><i class="fa-solid fa-house"></i> Beranda</a></li>
    <li><a href="#aboutSection" class="flex items-center gap-1.5 font-semibold text-sm no-underline transition-colors" style="color:var(--muted2);" onmouseover="this.style.color='#6c63ff'" onmouseout="this.style.color='rgba(255,255,255,0.55)'"><i class="fa-solid fa-circle-info"></i> Tentang</a></li>
    <li><a href="#testi"        class="flex items-center gap-1.5 font-semibold text-sm no-underline transition-colors" style="color:var(--muted2);" onmouseover="this.style.color='#6c63ff'" onmouseout="this.style.color='rgba(255,255,255,0.55)'"><i class="fa-solid fa-star"></i> Testimoni</a></li>
    <li><a href="#kontak"       class="flex items-center gap-1.5 font-semibold text-sm no-underline transition-colors" style="color:var(--muted2);" onmouseover="this.style.color='#6c63ff'" onmouseout="this.style.color='rgba(255,255,255,0.55)'"><i class="fa-solid fa-envelope"></i> Nara Hubung</a></li>
  </ul>

  <div id="navAuthDesktop" class="hidden md:block">
    @auth
    <a href="{{ route('pengguna.dashboard') }}" class="btn-login-nav flex items-center gap-1.5 text-white font-bold text-sm px-5 py-2 rounded-full no-underline" style="background:linear-gradient(135deg,#6c63ff,#9b59f5);box-shadow:0 4px 16px rgba(108,99,255,0.3);">
      <i class="fa-solid fa-gauge"></i> Dashboard
    </a>
    @else
    <a href="{{ route('login') }}" class="btn-login-nav flex items-center gap-1.5 text-white font-bold text-sm px-5 py-2 rounded-full no-underline" style="background:linear-gradient(135deg,#6c63ff,#9b59f5);box-shadow:0 4px 16px rgba(108,99,255,0.3);">
      <i class="fa-solid fa-right-to-bracket"></i> Login
    </a>
    @endauth
  </div>

  <button id="hamburger" onclick="toggleMenu()" class="flex md:hidden flex-col gap-[5px] cursor-pointer bg-transparent border-none p-1 z-[51]">
    <span class="block w-6 h-[2.5px] rounded-sm" style="background:#6c63ff;"></span>
    <span class="block w-6 h-[2.5px] rounded-sm" style="background:#6c63ff;"></span>
    <span class="block w-6 h-[2.5px] rounded-sm" style="background:#6c63ff;"></span>
  </button>
</nav>

<!-- ===== MOBILE MENU ===== -->
<div id="mobileMenu" class="hidden fixed top-[66px] left-0 right-0 px-[6%] pt-6 pb-8 z-40 flex-col gap-5 border-t" style="background:rgba(7,8,15,0.97);backdrop-filter:blur(20px);border-color:rgba(108,99,255,0.15);box-shadow:0 20px 60px rgba(0,0,0,0.6);">
  <a href="#home"         class="flex items-center gap-2 font-semibold pb-3.5 border-b no-underline" style="color:rgba(255,255,255,0.8);border-color:rgba(255,255,255,0.07);"><i class="fa-solid fa-house"></i> Beranda</a>
  <a href="#aboutSection" class="flex items-center gap-2 font-semibold pb-3.5 border-b no-underline" style="color:rgba(255,255,255,0.8);border-color:rgba(255,255,255,0.07);"><i class="fa-solid fa-circle-info"></i> Tentang</a>
  <a href="#testi"        class="flex items-center gap-2 font-semibold pb-3.5 border-b no-underline" style="color:rgba(255,255,255,0.8);border-color:rgba(255,255,255,0.07);"><i class="fa-solid fa-star"></i> Testimoni</a>
  <a href="#kontak"       class="flex items-center gap-2 font-semibold pb-3.5 border-b no-underline" style="color:rgba(255,255,255,0.8);border-color:rgba(255,255,255,0.07);"><i class="fa-solid fa-envelope"></i> Nara Hubung</a>
  @auth
  <a href="{{ route('pengguna.dashboard') }}" class="btn-login-nav flex justify-center items-center gap-2 text-white font-bold px-5 py-2.5 rounded-full no-underline mt-1" style="background:linear-gradient(135deg,#6c63ff,#9b59f5);">
    <i class="fa-solid fa-gauge"></i> Dashboard
  </a>
  @else
  <a href="{{ route('login') }}" class="btn-login-nav flex justify-center items-center gap-2 text-white font-bold px-5 py-2.5 rounded-full no-underline mt-1" style="background:linear-gradient(135deg,#6c63ff,#9b59f5);">
    <i class="fa-solid fa-right-to-bracket"></i> Login
  </a>
  @endauth
</div>

<!-- ===== HERO ===== -->
<section id="home" class="min-h-svh flex items-center justify-center relative overflow-hidden z-[1] text-center px-[5%] pt-[100px] pb-16">

  <div class="absolute top-[-180px] right-[-180px] w-[700px] h-[700px] rounded-full pointer-events-none" style="background:radial-gradient(circle,rgba(108,99,255,0.1) 0%,transparent 70%);"></div>
  <div class="absolute bottom-[-100px] left-[-100px] w-[500px] h-[500px] rounded-full pointer-events-none" style="background:radial-gradient(circle,rgba(155,89,245,0.08) 0%,transparent 70%);"></div>

  <div class="max-w-[700px] w-full relative z-[2]">

    <div class="inline-flex items-center gap-1.5 rounded-full px-4 py-1.5 text-[0.8rem] font-bold mb-6" style="background:rgba(108,99,255,0.12);border:1px solid rgba(108,99,255,0.25);color:#6c63ff;">
      <i class="fa-solid fa-bolt"></i> Platform Keuangan Digital
    </div>

    <h1 class="font-extrabold leading-[1.15] tracking-tight text-white mb-4" style="font-size:clamp(2rem,7vw,3.6rem);">
      Atur Keuanganmu, <span class="gradient-text">Kuasai Masa Depanmu</span>
    </h1>

    <p class="leading-[1.7] mb-8 mx-auto max-w-[520px]" style="font-size:1rem;color:var(--muted2);">
      Solusi cerdas untuk mengelola keuangan secara mudah dan aman.
    </p>

    <div class="hero-btns flex flex-wrap gap-3 justify-center">
      <a href="{{ route('login') }}"
        class="flex items-center justify-center gap-2 text-white font-bold px-6 py-3 min-w-[180px] rounded-full text-sm no-underline"
        style="background:linear-gradient(135deg,#6c63ff,#9b59f5);box-shadow:0 8px 25px rgba(108,99,255,0.3);">
        <i class="fa-solid fa-rocket"></i> Mulai Sekarang
      </a>
      <a href="{{ route('kebijakan.index') }}"
        class="flex items-center justify-center gap-2 font-bold px-6 py-3 min-w-[180px] rounded-full text-sm no-underline transition-colors"
        style="border:2px solid rgba(108,99,255,0.4);background:transparent;color:#6c63ff;"
        onmouseover="this.style.background='rgba(108,99,255,0.15)'"
        onmouseout="this.style.background='transparent'">
        <i class="fa-solid fa-shield-halved"></i> Kebijakan Privasi
      </a>
    </div>

  </div>
</section>

<!-- ===== ABOUT ===== -->
<section id="aboutSection" class="relative overflow-hidden z-[1] py-20 px-[5%] md:py-20" style="background:linear-gradient(180deg,#07080f 0%,#0c0d1d 100%);">
  <div id="aboutInner" class="max-w-[1200px] mx-auto w-full">

    <div id="aboutHeader" class="mb-6">
      <div class="inline-flex items-center gap-1.5 rounded-full px-4 py-1.5 text-[0.8rem] font-bold mb-4" style="background:rgba(108,99,255,0.12);border:1px solid rgba(108,99,255,0.25);color:#6c63ff;">
        <i class="fa-solid fa-circle-question"></i> Tentang Kami
      </div>
      <h2 class="font-extrabold tracking-tight leading-[1.2] text-white mb-3" style="font-size:clamp(1.7rem,3.5vw,2.6rem);">
        Apa Itu <span class="gradient-text">NexFi?</span>
      </h2>
      <p class="leading-[1.7] text-[0.95rem]" style="color:var(--muted2);">
        Kelola finansialmu tanpa ribet dengan fitur pintar dari NexFi — solusi keuangan modern untuk kehidupan yang lebih terencana.
      </p>
    </div>

    <div id="aboutBottom" class="grid grid-cols-2 gap-12 items-start">

      <!-- Features -->
      <div>
        <div id="featureGrid" class="flex flex-col gap-3">

          <div class="card-dark flex flex-col gap-2 p-4 cursor-default">
            <div class="w-[38px] h-[38px] rounded-xl flex items-center justify-center text-white text-sm" style="background:linear-gradient(135deg,#6c63ff,#9b59f5);box-shadow:0 4px 12px rgba(108,99,255,0.3);">
              <i class="fa-solid fa-chart-line"></i>
            </div>
            <div>
              <div class="font-bold text-[0.92rem] text-white">Pantau cashflow real-time</div>
              <div class="text-[0.83rem] mt-1 leading-[1.5]" style="color:var(--muted2);">Monitor penghasilan dan pengeluaran dalam satu dashboard.</div>
            </div>
          </div>

          <div class="card-dark flex flex-col gap-2 p-4 cursor-default">
            <div class="w-[38px] h-[38px] rounded-xl flex items-center justify-center text-white text-sm" style="background:linear-gradient(135deg,#6c63ff,#9b59f5);box-shadow:0 4px 12px rgba(108,99,255,0.3);">
              <i class="fa-solid fa-magnifying-glass-chart"></i>
            </div>
            <div>
              <div class="font-bold text-[0.92rem] text-white">Analisa finansial mudah</div>
              <div class="text-[0.83rem] mt-1 leading-[1.5]" style="color:var(--muted2);">Insight mendalam dan laporan otomatis setiap saat.</div>
            </div>
          </div>

          <div class="card-dark flex flex-col gap-2 p-4 cursor-default">
            <div class="w-[38px] h-[38px] rounded-xl flex items-center justify-center text-white text-sm" style="background:linear-gradient(135deg,#6c63ff,#9b59f5);box-shadow:0 4px 12px rgba(108,99,255,0.3);">
              <i class="fa-solid fa-shield-halved"></i>
            </div>
            <div>
              <div class="font-bold text-[0.92rem] text-white">Keamanan terjamin</div>
              <div class="text-[0.83rem] mt-1 leading-[1.5]" style="color:var(--muted2);">Enkripsi data & proteksi berlapis untuk akun kamu.</div>
            </div>
          </div>

        </div>
        <button class="inline-flex items-center gap-2 mt-6 text-white font-bold px-6 py-3 rounded-full border-none cursor-pointer text-sm font-inter" style="background:linear-gradient(135deg,#6c63ff,#9b59f5);box-shadow:0 8px 25px rgba(108,99,255,0.3);">
          Pelajari Lebih Lanjut <i class="fa-solid fa-arrow-right"></i>
        </button>
      </div>

      <!-- PDF Card -->
      <div id="ytCardWrap" class="flex justify-center items-start">
        <div id="youtubeCard" class="w-full rounded-[22px] overflow-hidden" style="border:1px solid rgba(108,99,255,0.2);box-shadow:0 16px 60px rgba(108,99,255,0.15);background:#0c0d1d;">
          <div class="pdf-thumb" id="openPdf">
            <img src="{{ asset('assets_public/bg guide.png') }}" alt="Guidebook NexFi">
            <div class="pdf-play">
              <div><i class="fa-solid fa-book-open" style="margin-left:2px;"></i></div>
            </div>
          </div>
          <div class="p-5 pb-6">
            <p class="text-[0.88rem] leading-[1.6] mb-4" style="color:var(--muted2);">Lihat langsung bagaimana NexFi membantu kamu mengelola keuangan dengan lebih cerdas dan efisien.</p>
            <button class="flex items-center justify-center gap-2 text-white font-bold px-3 py-3 rounded-full w-full text-[0.9rem] border-none cursor-pointer font-inter" id="openPdfBtn" style="background:linear-gradient(135deg,#6c63ff,#9b59f5);box-shadow:0 8px 24px rgba(108,99,255,0.35);transition:opacity 0.2s,transform 0.15s;" onmouseover="this.style.opacity='0.88';this.style.transform='translateY(-1px)'" onmouseout="this.style.opacity='1';this.style.transform='translateY(0)'">
              <i class="fa-solid fa-file-pdf"></i> Buka Guidebook PDF
            </button>
          </div>
        </div>
      </div>

    </div>
  </div>
</section>

<!-- ===== PDF MODAL - REDESIGNED ===== -->
<div id="pdfModal" class="pdf-modal">
  <div class="pdf-modal-inner">
    <!-- Header -->
    <div class="pdf-modal-header">
      <div class="pdf-modal-title">
        <i class="fa-solid fa-file-pdf"></i>
        <span>Guidebook NexFi</span>
      </div>
      <div class="pdf-modal-actions">
        <!-- Fullscreen button -->
        <button class="pdf-modal-btn" onclick="toggleFullscreen()" title="Fullscreen">
          <i class="fa-solid fa-expand"></i>
        </button>
        <!-- Download button -->
        <a href="https://drive.google.com/file/d/1tkIY1Y_NwjYn5eFM_idOaP_M9RJtSIYD/view" 
           target="_blank" 
           rel="noopener noreferrer"
           class="pdf-modal-btn" 
           title="Download PDF"
           style="text-decoration:none;">
          <i class="fa-solid fa-download"></i>
        </a>
        <!-- Close button -->
        <button class="pdf-modal-close" id="closePdfModal" title="Tutup">
          <i class="fa-solid fa-xmark"></i>
        </button>
      </div>
    </div>
    
    <!-- Body -->
    <div class="pdf-modal-body">
      <!-- Loading -->
      <div class="pdf-loading" id="pdfLoading">
        <div class="pdf-loading-spinner"></div>
        <div class="pdf-loading-text">Memuat dokumen...</div>
      </div>
      
      <!-- PDF Iframe -->
      <iframe id="pdfFrame" 
              src="" 
              allow="autoplay"
              allowfullscreen>
      </iframe>
    </div>
    
    <!-- Footer -->
    <div class="pdf-modal-footer">
      <i class="fa-solid fa-shield-halved"></i>
      <span>Dokumen resmi NexFi • Didukung oleh Google Drive</span>
    </div>
  </div>
</div>

<!-- ===== TESTIMONI ===== -->
<section id="testi" class="relative overflow-hidden z-[1] py-20 px-[5%]" style="background:#10132a;">
  <div class="section-divider absolute top-0 left-0 right-0"></div>
  <div class="section-divider absolute bottom-0 left-0 right-0"></div>

  <div class="max-w-[1200px] mx-auto w-full">
    <div class="text-center mb-10">
      <div class="inline-flex items-center gap-1.5 rounded-full px-4 py-1.5 text-[0.8rem] font-bold mb-4" style="background:rgba(108,99,255,0.12);border:1px solid rgba(108,99,255,0.25);color:#6c63ff;">
        <i class="fa-solid fa-comments"></i> Testimoni
      </div>
      <h2 class="font-extrabold tracking-tight text-white mb-2" style="font-size:clamp(1.7rem,3.5vw,2.6rem);">Apa Kata <span class="gradient-text">Mereka?</span></h2>
      <p class="text-[0.95rem] max-w-[480px] mx-auto leading-[1.6]" style="color:var(--muted2);">Ribuan pengguna sudah merasakan manfaat NexFi.</p>
    </div>

    <div class="overflow-hidden">
      <div class="testi-track" id="testiTrack">
        @php $publishedTestis = \App\Models\Testimonial::where('status','published')->latest()->get(); @endphp
        @forelse($publishedTestis as $testi)
        <div class="testi-slide">
          <div class="card-dark p-5 flex flex-col h-full" style="min-height:210px;">
            <div class="mb-3" style="color:#f59e0b;">
              @for($i=1;$i<=5;$i++)
                @if($i <= $testi->rating)
                  <i class="fa-solid fa-star"></i>
                @else
                  <i class="fa-regular fa-star" style="color:rgba(255,255,255,0.18);"></i>
                @endif
              @endfor
            </div>
            <p class="text-[0.88rem] leading-[1.6] italic flex-1 mb-5" style="color:var(--muted2);">"{{ $testi->isi }}"</p>
            <div class="flex items-center gap-3 pt-3 border-t" style="border-color:rgba(255,255,255,0.07);">
              @if($testi->foto)
                <img src="{{ asset('storage/'.$testi->foto) }}" alt="{{ $testi->nama }}" class="w-10 h-10 rounded-full object-cover flex-shrink-0" style="border:1.5px solid rgba(108,99,255,0.3);">
              @else
                <img src="{{ asset('images/anon.png') }}" alt="anon" class="w-10 h-10 rounded-full object-cover flex-shrink-0" style="border:1.5px solid rgba(108,99,255,0.3);">
              @endif
              <div>
                <div class="font-bold text-[0.9rem] text-white">{{ $testi->nama }}</div>
                <div class="text-[0.75rem]" style="color:var(--muted);">{{ $testi->created_at->format('M Y') }}</div>
              </div>
            </div>
          </div>
        </div>
        @empty
        <div class="testi-slide">
          <div class="card-dark p-5 flex items-center justify-content-center" style="min-height:210px;">
            <p class="italic text-center" style="color:var(--muted);">Belum ada testimoni. Jadilah yang pertama!</p>
          </div>
        </div>
        @endforelse
      </div>
      <div class="testi-dots" id="testiDots"></div>
    </div>
  </div>
</section>

<!-- ===== KONTAK ===== -->
<section id="kontak" class="relative overflow-hidden z-[1] py-20 px-[5%]" style="background:#07080f;">
  <div class="section-divider absolute top-0 left-0 right-0"></div>
  <div class="absolute rounded-full pointer-events-none" style="top:-96px;left:-80px;width:420px;height:420px;background:radial-gradient(circle,rgba(108,99,255,0.1),transparent 70%);"></div>
  <div class="absolute rounded-full pointer-events-none" style="bottom:-96px;right:-80px;width:380px;height:380px;background:radial-gradient(circle,rgba(155,89,245,0.1),transparent 70%);"></div>

  <div class="max-w-[960px] mx-auto w-full relative z-10">
    <div class="text-center mb-10">
      <div class="inline-flex items-center gap-2 rounded-full px-4 py-1.5 text-[0.8rem] font-bold mb-5" style="background:rgba(108,99,255,0.12);border:1px solid rgba(108,99,255,0.25);color:#6c63ff;">
        <i class="fa-solid fa-headset"></i> Hubungi Kami
      </div>
      <h2 class="font-extrabold text-white mb-4" style="font-size:clamp(1.4rem,4vw,2.5rem);">Ada Pertanyaan atau Saran?<br><span class="gradient-text">Kami Siap Membantu</span></h2>
      <p class="text-[0.9rem] max-w-[480px] mx-auto" style="color:var(--muted2);">Pilih menu di bawah untuk mengirim pesan atau testimoni.</p>

      @auth
      <div class="flex justify-center mt-8">
        <div class="flex p-1 rounded-full" style="background:rgba(255,255,255,0.06);border:1px solid rgba(255,255,255,0.08);">
          <button id="btnTesti" onclick="activateTesti()" class="px-6 py-2.5 rounded-full text-sm font-bold text-white border-none cursor-pointer font-inter" style="background:linear-gradient(135deg,#6c63ff,#9b59f5);box-shadow:0 4px 14px rgba(108,99,255,0.4);">
            <i class="fa-solid fa-star mr-1.5"></i>Testimoni
          </button>
          <button id="btnKoran" onclick="activateKoran()" class="px-6 py-2.5 rounded-full text-sm font-bold border-none cursor-pointer font-inter" style="color:var(--muted2);background:transparent;">
            <i class="fa-solid fa-envelope mr-1.5"></i>Kontak
          </button>
        </div>
      </div>
      @endauth
    </div>

    <div class="rounded-3xl p-6" style="background:#0c0d1d;border:1px solid rgba(108,99,255,0.2);box-shadow:0 10px 45px rgba(108,99,255,0.12);">

      @auth
        <!-- Form Testi -->
        <form id="formTesti" class="form-grid">
          <div>
            <label class="form-label">Nama Lengkap</label>
            <div class="relative">
              <input type="text" name="nama" value="{{ auth()->user()->name }}" class="inp-dark" readonly style="padding-right:40px;">
              <i class="fa-solid fa-lock absolute right-3.5 top-1/2 -translate-y-1/2 pointer-events-none" style="color:rgba(108,99,255,0.45);font-size:0.72rem;"></i>
            </div>
            <div class="text-[0.7rem] mt-1.5" style="color:rgba(108,99,255,0.6);"><i class="fa-solid fa-circle-info mr-0.5"></i>Diambil otomatis dari akun kamu</div>
          </div>
          <div>
            <label class="form-label">Email</label>
            <div class="relative">
              <input type="email" name="email" value="{{ auth()->user()->email }}" class="inp-dark" readonly style="padding-right:40px;">
              <i class="fa-solid fa-lock absolute right-3.5 top-1/2 -translate-y-1/2 pointer-events-none" style="color:rgba(108,99,255,0.45);font-size:0.72rem;"></i>
            </div>
            <div class="text-[0.7rem] mt-1.5" style="color:rgba(108,99,255,0.6);"><i class="fa-solid fa-circle-info mr-0.5"></i>Diambil otomatis dari akun kamu</div>
          </div>
          <div style="grid-column:1/-1;">
            <label class="form-label">Foto Profil</label>
            <div class="flex items-center gap-4 flex-wrap">
              <div class="w-14 h-14 rounded-full overflow-hidden flex items-center justify-center flex-shrink-0" style="border:1px solid rgba(108,99,255,0.3);background:rgba(108,99,255,0.1);">
                <img id="avatarPreview" src="" style="display:none;width:100%;height:100%;object-fit:cover;">
                <i id="avatarIcon" class="fa-solid fa-user" style="color:rgba(108,99,255,0.5);font-size:1.1rem;"></i>
              </div>
              <label class="flex-1 min-w-[160px] flex items-center gap-3 cursor-pointer rounded-xl p-4" style="background:rgba(255,255,255,0.04);border:1.5px dashed rgba(108,99,255,0.3);">
                <i class="fa-solid fa-cloud-arrow-up flex-shrink-0" style="color:#6c63ff;"></i>
                <div>
                  <div class="font-semibold text-[0.875rem]" style="color:rgba(255,255,255,0.7);">Klik untuk upload foto</div>
                  <div class="text-[0.75rem]" style="color:var(--muted);">PNG / JPG (max 2MB)</div>
                </div>
                <input type="file" name="foto" id="fotoInput" accept="image/*" class="hidden">
              </label>
            </div>
          </div>
          <div style="grid-column:1/-1;">
            <label class="form-label">Rating</label>
            <div id="ratingStars" class="flex gap-2 text-[1.7rem] cursor-pointer">
              <i class="fa-solid fa-star" data-value="1" style="color:rgba(255,255,255,0.15);transition:color 0.15s,transform 0.15s;"></i>
              <i class="fa-solid fa-star" data-value="2" style="color:rgba(255,255,255,0.15);transition:color 0.15s,transform 0.15s;"></i>
              <i class="fa-solid fa-star" data-value="3" style="color:rgba(255,255,255,0.15);transition:color 0.15s,transform 0.15s;"></i>
              <i class="fa-solid fa-star" data-value="4" style="color:rgba(255,255,255,0.15);transition:color 0.15s,transform 0.15s;"></i>
              <i class="fa-solid fa-star" data-value="5" style="color:rgba(255,255,255,0.15);transition:color 0.15s,transform 0.15s;"></i>
            </div>
            <input type="hidden" name="rating" id="ratingInput">
          </div>
          <div style="grid-column:1/-1;">
            <label class="form-label">Testimoni</label>
            <textarea name="isi" rows="4" placeholder="Ceritakan pengalamanmu..." class="inp-dark" style="resize:none;" required></textarea>
          </div>
          <button type="button" onclick="submitTesti(this)" class="btn-kirim">
            <i class="fa-solid fa-paper-plane"></i> Kirim Testimoni
          </button>
        </form>

        <!-- Form Kontak -->
        <form id="formKoran" class="form-grid" style="display:none;">
          <div>
            <label class="form-label">Nama Lengkap</label>
            <div class="relative">
              <input type="text" name="name" value="{{ auth()->user()->name }}" class="inp-dark" readonly style="padding-right:40px;">
              <i class="fa-solid fa-lock absolute right-3.5 top-1/2 -translate-y-1/2 pointer-events-none" style="color:rgba(108,99,255,0.45);font-size:0.72rem;"></i>
            </div>
            <div class="text-[0.7rem] mt-1.5" style="color:rgba(108,99,255,0.6);"><i class="fa-solid fa-circle-info mr-0.5"></i>Diambil otomatis dari akun kamu</div>
          </div>
          <div>
            <label class="form-label">Email</label>
            <div class="relative">
              <input type="email" name="email" value="{{ auth()->user()->email }}" class="inp-dark" readonly style="padding-right:40px;">
              <i class="fa-solid fa-lock absolute right-3.5 top-1/2 -translate-y-1/2 pointer-events-none" style="color:rgba(108,99,255,0.45);font-size:0.72rem;"></i>
            </div>
            <div class="text-[0.7rem] mt-1.5" style="color:rgba(108,99,255,0.6);"><i class="fa-solid fa-circle-info mr-0.5"></i>Diambil otomatis dari akun kamu</div>
          </div>
          <div style="grid-column:1/-1;"><label class="form-label">Subjek</label><input type="text" name="subject" placeholder="Topik pesan" class="inp-dark"></div>
          <div style="grid-column:1/-1;"><label class="form-label">Pesan</label><textarea rows="5" name="message" placeholder="Tulis pesan kamu..." class="inp-dark" style="resize:none;"></textarea></div>
          <button type="button" onclick="handleSubmitKoran(this)" class="btn-kirim">
            <i class="fa-solid fa-paper-plane"></i> Kirim Pesan
          </button>
        </form>

      @else
        <div class="auth-gate">
          <div class="auth-gate-icon">
            <i class="fa-solid fa-lock" style="font-size:1.75rem;color:#6c63ff;"></i>
          </div>
          <h3 class="text-[1.15rem] font-extrabold text-white m-0">Login dulu, ya!</h3>
          <p class="text-[0.9rem] m-0 max-w-[340px] leading-[1.6]" style="color:var(--muted2);">Kamu harus login untuk bisa mengirim testimoni atau pesan kepada kami.</p>
          <div class="flex gap-3 flex-wrap justify-center mt-2">
            <a href="{{ route('login') }}" class="inline-flex items-center gap-2 text-white font-bold px-7 py-3 rounded-full no-underline text-sm" style="background:linear-gradient(135deg,#6c63ff,#9b59f5);box-shadow:0 8px 25px rgba(108,99,255,0.3);">
              <i class="fa-solid fa-right-to-bracket"></i> Login Sekarang
            </a>
            <a href="{{ route('register') }}" class="inline-flex items-center gap-2 font-bold px-7 py-3 rounded-full no-underline text-sm transition-colors" style="color:#6c63ff;border:2px solid rgba(108,99,255,0.4);background:transparent;" onmouseover="this.style.background='rgba(108,99,255,0.1)'" onmouseout="this.style.background='transparent'">
              <i class="fa-solid fa-user-plus"></i> Daftar Gratis
            </a>
          </div>
        </div>
      @endauth

    </div>
  </div>
</section>

<!-- ===== FOOTER ===== -->
<footer class="relative z-[1] px-[6%] pt-12 pb-6" style="background:#04050c;border-top:1px solid rgba(108,99,255,0.2);">
  <div class="max-w-[1200px] mx-auto">

    <div class="flex flex-wrap items-start justify-between gap-8 pb-8 border-b" style="border-color:rgba(255,255,255,0.07);">

      <!-- Brand -->
      <div>
        <div class="flex items-center gap-2 mb-2">
          <img src="{{ asset('assets_public/logo.png') }}" alt="NexFi" class="h-[52px] w-auto object-contain">
        </div>
        <p class="text-[0.83rem] max-w-[220px] m-0" style="color:var(--muted);">
          Atur keuanganmu dengan lebih cerdas bersama NexFi.
        </p>
      </div>

      <!-- Sosial -->
      <div>
        <div class="text-[0.78rem] font-bold uppercase tracking-widest mb-3" style="color:rgba(255,255,255,0.3);">Ikuti Kami</div>
        <div class="flex items-center gap-3 flex-wrap">
          <a href="https://youtu.be/p8Ho0LaeNuo?si=GHu4zQvr9mlXiG3W" target="_blank"
            class="w-9 h-9 rounded-full flex items-center justify-center no-underline transition-all"
            style="background:rgba(255,255,255,0.06);color:rgba(255,255,255,0.4);"
            onmouseover="this.style.background='#dc2626';this.style.color='#fff'"
            onmouseout="this.style.background='rgba(255,255,255,0.06)';this.style.color='rgba(255,255,255,0.4)'">
            <i class="fa-brands fa-youtube text-sm"></i>
          </a>
        </div>
      </div>

      <!-- Kontak -->
      <div>
        <div class="text-[0.78rem] font-bold uppercase tracking-widest mb-3" style="color:rgba(255,255,255,0.3);">Kontak</div>
        <div class="flex flex-col gap-2">
          <a href="https://wa.me/62895404171275" target="_blank" class="flex items-center gap-2 text-[0.85rem] no-underline transition-colors" style="color:rgba(255,255,255,0.4);" onmouseover="this.style.color='#fff'" onmouseout="this.style.color='rgba(255,255,255,0.4)'">
            <i class="fa-brands fa-whatsapp text-[0.75rem]"></i> +62 895-4041-7275
          </a>
          <span class="flex items-center gap-2 text-[0.85rem]" style="color:rgba(255,255,255,0.4);">
            <i class="fa-solid fa-location-dot text-[0.75rem]"></i> Indonesia
          </span>
        </div>
      </div>

    </div>

    <div class="pt-5 text-center text-[0.82rem]" style="color:rgba(255,255,255,0.2);">
      &copy; 2026 <strong style="color:rgba(255,255,255,0.35);">NexFi</strong>. Seluruh hak dilindungi.
    </div>

  </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
/* ===== SWEETALERT2 ===== */
const NexSwal = Swal.mixin({
  customClass: { popup: 'nexfi-alert' },
  background: '#0e0f20', color: '#ffffff',
  timerProgressBar: true, showClass: { popup: '' }, hideClass: { popup: '' }
});
function nexIcon(type) {
  const map = {
    success: { bg:'rgba(108,99,255,0.15)', color:'#a78bfa', icon:'fa-circle-check' },
    error:   { bg:'rgba(239,68,68,0.12)',  color:'#f87171', icon:'fa-circle-xmark' },
    warning: { bg:'rgba(245,158,11,0.12)', color:'#fbbf24', icon:'fa-triangle-exclamation' },
    info:    { bg:'rgba(56,189,248,0.12)', color:'#38bdf8', icon:'fa-circle-info' },
  };
  const m = map[type] || map.info;
  return `<div style="width:64px;height:64px;border-radius:50%;background:${m.bg};display:flex;align-items:center;justify-content:center;margin:0 auto 4px;"><i class="fa-solid ${m.icon}" style="font-size:1.75rem;color:${m.color};"></i></div>`;
}
function showAlert({ type, title, html, confirmText = 'Oke!', timer = 0 }) {
  return NexSwal.fire({
    html: `${nexIcon(type)}<div style="font-size:1.1rem;font-weight:800;color:#fff;margin:12px 0 6px;letter-spacing:-0.01em;">${title}</div><div style="font-size:0.85rem;color:rgba(255,255,255,0.5);line-height:1.7;">${html}</div>`,
    showConfirmButton: true, confirmButtonText: confirmText, confirmButtonColor: '#6c63ff',
    timer: timer || undefined, padding: '32px 28px 24px', width: 420, buttonsStyling: true,
  });
}

/* ===== NAVBAR ===== */
function applyNavLayout() {
  var d = window.innerWidth >= 768;
  document.getElementById('navLinks').style.display       = d ? 'flex'  : 'none';
  document.getElementById('navAuthDesktop').style.display = d ? 'block' : 'none';
  document.getElementById('hamburger').style.display      = d ? 'none'  : 'flex';
}
applyNavLayout();
window.addEventListener('resize', applyNavLayout);

var menuOpen = false;
function toggleMenu() {
  menuOpen = !menuOpen;
  document.getElementById('mobileMenu').style.display = menuOpen ? 'flex' : 'none';
}
document.querySelectorAll('#mobileMenu a').forEach(function(a) {
  a.addEventListener('click', function() { menuOpen = false; document.getElementById('mobileMenu').style.display = 'none'; });
});
window.addEventListener('scroll', function() {
  document.getElementById('navbar').style.boxShadow = window.scrollY > 20 ? '0 4px 30px rgba(0,0,0,0.5)' : 'none';
});

/* ===== KONTAK TABS ===== */
function activateTesti() {
  var fT = document.getElementById('formTesti');
  var fK = document.getElementById('formKoran');
  var bT = document.getElementById('btnTesti');
  var bK = document.getElementById('btnKoran');
  if (!fT || !fK) return;
  fT.style.display = 'grid';
  fK.style.display = 'none';
  bT.style.cssText = 'padding:10px 24px;border-radius:9999px;font-size:0.875rem;font-weight:700;color:#fff;border:none;cursor:pointer;font-family:Inter,sans-serif;background:linear-gradient(135deg,#6c63ff,#9b59f5);box-shadow:0 4px 14px rgba(108,99,255,0.4);';
  bK.style.cssText = 'padding:10px 24px;border-radius:9999px;font-size:0.875rem;font-weight:700;color:rgba(255,255,255,0.45);border:none;cursor:pointer;font-family:Inter,sans-serif;background:transparent;';
}
function activateKoran() {
  var fT = document.getElementById('formTesti');
  var fK = document.getElementById('formKoran');
  var bT = document.getElementById('btnTesti');
  var bK = document.getElementById('btnKoran');
  if (!fT || !fK) return;
  fK.style.display = 'grid';
  fT.style.display = 'none';
  bK.style.cssText = 'padding:10px 24px;border-radius:9999px;font-size:0.875rem;font-weight:700;color:#fff;border:none;cursor:pointer;font-family:Inter,sans-serif;background:linear-gradient(135deg,#6c63ff,#9b59f5);box-shadow:0 4px 14px rgba(108,99,255,0.4);';
  bT.style.cssText = 'padding:10px 24px;border-radius:9999px;font-size:0.875rem;font-weight:700;color:rgba(255,255,255,0.45);border:none;cursor:pointer;font-family:Inter,sans-serif;background:transparent;';
}

/* ===== RATING STARS ===== */
var selectedRating = 0;
var starEls = document.querySelectorAll('#ratingStars i');
function paintStars(val) {
  starEls.forEach(function(s) {
    var v = parseInt(s.getAttribute('data-value'));
    s.style.color = v <= val ? '#F59E0B' : 'rgba(255,255,255,0.15)';
    s.style.transform = v <= val ? 'scale(1.15)' : 'scale(1)';
  });
}
starEls.forEach(function(star) {
  star.addEventListener('click', function() { selectedRating = parseInt(this.getAttribute('data-value')); paintStars(selectedRating); });
  star.addEventListener('mouseover', function() { paintStars(parseInt(this.getAttribute('data-value'))); });
  star.addEventListener('mouseout', function() { paintStars(selectedRating); });
});

/* ===== AVATAR UPLOAD ===== */
var fotoInput = document.getElementById('fotoInput');
if (fotoInput) {
  fotoInput.addEventListener('change', function() {
    if (!fotoInput.files.length) return;
    var reader = new FileReader();
    reader.onload = function(e) {
      document.getElementById('avatarPreview').src = e.target.result;
      document.getElementById('avatarPreview').style.display = 'block';
      document.getElementById('avatarIcon').style.display = 'none';
    };
    reader.readAsDataURL(fotoInput.files[0]);
  });
}

/* ===== SUBMIT TESTIMONI ===== */
function submitTesti(btn) {
  var form = document.getElementById('formTesti');
  var isi  = form.querySelector('textarea[name="isi"]').value.trim();
  if (!isi || selectedRating === 0) {
    showAlert({ type:'warning', title:'Form belum lengkap!', html:'Mohon tulis testimoni kamu dan pilih <strong style="color:#fbbf24;">rating bintang</strong> terlebih dahulu ya.', confirmText:'Siap, isi dulu! ✍️' });
    return;
  }
  btn.disabled = true;
  var orig = btn.innerHTML;
  btn.innerHTML = '<i class="fa-solid fa-spinner fa-spin"></i> Mengirim...';
  var data = new FormData();
  data.append('_token', '{{ csrf_token() }}');
  data.append('rating', selectedRating);
  data.append('isi', isi);
  var fotoFile = document.getElementById('fotoInput').files[0];
  if (fotoFile) data.append('foto', fotoFile);
  fetch('{{ route("testimonial.store") }}', { method:'POST', body:data })
    .then(function(r) { return r.json(); })
    .then(function(res) {
      if (res.success) {
        showAlert({ type:'success', title:'Terima Kasih! 🎉', html:'Terima kasih atas testimoni Anda.<br><br><span style="color:rgba(255,255,255,0.4);font-size:0.82rem;">Kami akan menyaring konten sebelum mempublish. Tunggu sebentar ya!</span>', confirmText:'Oke, siap! 👍', timer:7000 });
        form.querySelector('textarea[name="isi"]').value = '';
        selectedRating = 0; paintStars(0);
        document.getElementById('avatarPreview').style.display = 'none';
        document.getElementById('avatarIcon').style.display = '';
        document.getElementById('fotoInput').value = '';
      } else {
        showAlert({ type:'error', title:'Gagal Mengirim', html:'Maaf, testimoni kamu gagal terkirim.', confirmText:'Coba Lagi' });
      }
      btn.disabled = false; btn.innerHTML = orig;
    })
    .catch(function() {
      showAlert({ type:'error', title:'Server Error', html:'Terjadi kesalahan pada server.', confirmText:'Tutup' });
      btn.disabled = false; btn.innerHTML = orig;
    });
}

/* ===== SUBMIT KONTAK ===== */
function handleSubmitKoran(btn) {
  var form    = document.getElementById('formKoran');
  var subject = form.querySelector('input[name="subject"]').value.trim();
  var message = form.querySelector('textarea[name="message"]').value.trim();
  if (!subject || !message) {
    showAlert({ type:'warning', title:'Form belum lengkap!', html:'Mohon isi <strong style="color:#fbbf24;">subjek</strong> dan <strong style="color:#fbbf24;">pesan</strong> kamu ya.', confirmText:'Oke, lengkapi dulu!' });
    return;
  }
  btn.disabled = true;
  var btnText = btn.innerHTML;
  btn.innerHTML = '<i class="fa-solid fa-spinner fa-spin"></i> Mengirim...';
  fetch('{{ route("kontak.store") }}', { method:'POST', headers:{'X-CSRF-TOKEN':'{{ csrf_token() }}'}, body:new FormData(form) })
    .then(function(res) { return res.json(); })
    .then(function(res) {
      if (res.success) {
        showAlert({ type:'success', title:'Pesan Terkirim! ✉️', html:'Terima kasih! Tim kami akan segera menghubungi kamu.', confirmText:'Siap, terima kasih! 🙌', timer:7000 });
        form.querySelector('input[name="subject"]').value = '';
        form.querySelector('textarea[name="message"]').value = '';
      } else {
        showAlert({ type:'error', title:'Gagal Mengirim', html:'Pesan gagal terkirim.', confirmText:'Coba Lagi' });
      }
      btn.disabled = false; btn.innerHTML = btnText;
    })
    .catch(function() {
      showAlert({ type:'error', title:'Server Error', html:'Terjadi kesalahan.', confirmText:'Tutup' });
      btn.disabled = false; btn.innerHTML = btnText;
    });
}

/* ===== TESTIMONIAL SLIDER ===== */
(function() {
  var track    = document.getElementById('testiTrack');
  var dotsWrap = document.getElementById('testiDots');
  if (!track || !dotsWrap) return;
  var slides   = track.querySelectorAll('.testi-slide');
  var total    = slides.length, current = 0, startX = 0, isDragging = false, dragDelta = 0;
  function isMobile()  { return window.innerWidth < 768; }
  function perPage()   { return isMobile() ? 1 : 3; }
  function pageCount() { return Math.ceil(total / perPage()); }
  function slideW()    { return slides[0].offsetWidth + (isMobile() ? 16 : 24); }
  function buildDots() {
    dotsWrap.innerHTML = '';
    for (var i = 0; i < pageCount(); i++) {
      (function(idx) {
        var d = document.createElement('button');
        d.className = 'testi-dot' + (idx === current ? ' active' : '');
        d.addEventListener('click', function() { goTo(idx); });
        dotsWrap.appendChild(d);
      })(i);
    }
  }
  function updateDots() { dotsWrap.querySelectorAll('.testi-dot').forEach(function(d,i){ d.classList.toggle('active', i===current); }); }
  function goTo(idx) {
    current = Math.max(0, Math.min(pageCount()-1, idx));
    track.style.transform = 'translateX(-' + (current * perPage() * slideW()) + 'px)';
    updateDots();
  }
  track.addEventListener('touchstart', function(e){ startX=e.touches[0].clientX; isDragging=true; dragDelta=0; },{passive:true});
  track.addEventListener('touchmove',  function(e){ if(isDragging) dragDelta=e.touches[0].clientX-startX; },{passive:true});
  track.addEventListener('touchend',   function(){ if(!isDragging)return; isDragging=false; if(dragDelta<-60) goTo(current+1); else if(dragDelta>60) goTo(current-1); });
  track.addEventListener('mousedown',  function(e){ startX=e.clientX; isDragging=true; dragDelta=0; track.style.cursor='grabbing'; });
  window.addEventListener('mousemove', function(e){ if(isDragging) dragDelta=e.clientX-startX; });
  window.addEventListener('mouseup',   function(){ if(!isDragging)return; isDragging=false; track.style.cursor='grab'; if(dragDelta<-60) goTo(current+1); else if(dragDelta>60) goTo(current-1); dragDelta=0; });
  window.addEventListener('resize',    function(){ current=0; track.style.transform='translateX(0)'; buildDots(); });
  track.style.cursor = 'grab';
  buildDots();
})();

/* ===== PDF MODAL - REDESIGNED ===== */
const PDF_EMBED_URL = 'https://drive.google.com/file/d/1tkIY1Y_NwjYn5eFM_idOaP_M9RJtSIYD/preview';
const pdfModal = document.getElementById('pdfModal');
const pdfFrame = document.getElementById('pdfFrame');
const pdfLoading = document.getElementById('pdfLoading');

function openPdf() {
  pdfModal.classList.add('open');
  pdfFrame.src = PDF_EMBED_URL;
  pdfLoading.style.display = 'flex';
  document.body.style.overflow = 'hidden';
  
  // Hide loading when PDF is loaded
  pdfFrame.onload = function() {
    setTimeout(function() {
      pdfLoading.style.display = 'none';
    }, 800);
  };
}

function closePdf() {
  pdfModal.classList.remove('open');
  pdfFrame.src = '';
  pdfLoading.style.display = 'flex';
  document.body.style.overflow = '';
}

function toggleFullscreen() {
  const inner = document.querySelector('.pdf-modal-inner');
  if (!document.fullscreenElement) {
    if (inner.requestFullscreen) {
      inner.requestFullscreen();
    } else if (inner.webkitRequestFullscreen) {
      inner.webkitRequestFullscreen();
    } else if (inner.msRequestFullscreen) {
      inner.msRequestFullscreen();
    }
  } else {
    if (document.exitFullscreen) {
      document.exitFullscreen();
    } else if (document.webkitExitFullscreen) {
      document.webkitExitFullscreen();
    } else if (document.msExitFullscreen) {
      document.msExitFullscreen();
    }
  }
}

// Event listeners
document.getElementById('openPdf').addEventListener('click', openPdf);
document.getElementById('openPdfBtn').addEventListener('click', openPdf);
document.getElementById('closePdfModal').addEventListener('click', closePdf);
pdfModal.addEventListener('click', function(e) { 
  if (e.target === pdfModal) closePdf(); 
});

// Keyboard shortcuts
document.addEventListener('keydown', function(e) {
  if (!pdfModal.classList.contains('open')) return;
  
  if (e.key === 'Escape') {
    closePdf();
  } else if (e.key === 'f' || e.key === 'F') {
    // Prevent typing 'f' in inputs
    if (document.activeElement === document.body) {
      e.preventDefault();
      toggleFullscreen();
    }
  }
});
</script>
</body>
</html>