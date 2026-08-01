@extends('layout_pengguna.pengguna')

@section('title', 'Blog GrowFin')
@section('page-title', 'Blog & Edukasi')

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
<script src="https://cdn.tailwindcss.com"></script>
<script>
    tailwind.config = {
        theme: {
            extend: {
                colors: { bg3: '#10132a', acc: '#6c63ff', acc2: '#9b59f5' },
                screens: {
                    'xs': '475px',
                }
            }
        }
    }
</script>

<style>
    body, input, button, a { font-family: inherit; }
    
    .blog-card {
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        background: rgba(16, 19, 42, 0.6);
        backdrop-filter: blur(8px);
        border: 1px solid rgba(108, 99, 255, 0.12);
    }
    .blog-card:hover {
        transform: translateY(-6px);
        box-shadow: 0 16px 40px rgba(108, 99, 255, 0.13);
        border-color: rgba(108, 99, 255, 0.25);
    }
    .blog-card:hover .blog-thumb {
        transform: scale(1.04);
    }
    
    .blog-thumb {
        transition: transform 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    }
    
    .category-badge {
        background: rgba(108, 99, 255, 0.15);
        backdrop-filter: blur(10px);
        border: 1px solid rgba(108, 99, 255, 0.2);
    }
    
    .partnership-badge {
        background: linear-gradient(135deg, #6c63ff, #9b59f5);
        animation: pulse-glow 2s infinite;
    }
    @keyframes pulse-glow {
        0%, 100% { box-shadow: 0 0 20px rgba(108, 99, 255, 0.3); }
        50% { box-shadow: 0 0 35px rgba(108, 99, 255, 0.5); }
    }

    .social-link {
        transition: all 0.3s ease;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 38px;
        height: 38px;
        border-radius: 10px;
        background: rgba(255,255,255,0.04);
        border: 1px solid rgba(255,255,255,0.06);
        color: rgba(255,255,255,0.3);
        font-size: 15px;
    }
    .social-link:hover {
        background: rgba(108, 99, 255, 0.15);
        border-color: rgba(108, 99, 255, 0.3);
        color: #6c63ff;
        transform: translateY(-2px);
    }

    .filter-btn {
        transition: all 0.3s ease;
        background: rgba(16, 19, 42, 0.4);
        backdrop-filter: blur(4px);
        border: 1px solid rgba(108, 99, 255, 0.12);
        white-space: nowrap;
    }
    .filter-btn.active {
        background: linear-gradient(135deg, #6c63ff, #9b59f5);
        color: white;
        border-color: transparent;
    }

    .banner-growfin {
        background: linear-gradient(135deg, #0a1628, #141834);
        border-color: rgba(108, 99, 255, 0.35);
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
    }
    .banner-growfin:hover {
        border-color: rgba(108, 99, 255, 0.6);
        box-shadow: 0 0 50px rgba(108, 99, 255, 0.12);
    }
    .banner-growfin:hover .banner-arrow {
        transform: translateX(6px);
    }
    .banner-arrow {
        transition: transform 0.3s ease;
    }

    .filter-scroll {
        -ms-overflow-style: none;
        scrollbar-width: none;
    }
    .filter-scroll::-webkit-scrollbar {
        display: none;
    }

    @media (max-width: 640px) {
        .social-link {
            width: 32px;
            height: 32px;
            font-size: 13px;
        }
        .filter-btn {
            padding: 8px 12px;
            font-size: 11px;
        }
    }

    @media (max-width: 475px) {
        .filter-btn {
            padding: 6px 10px;
            font-size: 10px;
        }
    }
</style>

<div class="flex flex-col gap-4 sm:gap-5 md:gap-6 w-full max-w-full overflow-hidden">

    {{-- ══ HEADER ══ --}}
    <div class="relative overflow-hidden rounded-2xl sm:rounded-[20px] p-4 sm:p-5 md:p-6 border border-acc/30" 
        style="background: linear-gradient(135deg, rgba(108,99,255,0.12), rgba(155,89,245,0.06));">
        
        {{-- Decorative elements --}}
        <div class="absolute top-0 right-0 w-24 h-24 sm:w-32 sm:h-32 md:w-48 md:h-48 rounded-full opacity-5" 
            style="background: radial-gradient(circle, #6c63ff, transparent); transform: translate(20%, -20%);"></div>
        <div class="absolute bottom-0 left-0 w-20 h-20 sm:w-24 sm:h-24 md:w-36 md:h-36 rounded-full opacity-5"
            style="background: radial-gradient(circle, #9b59f5, transparent); transform: translate(-20%, 20%);"></div>
        
        <div class="relative flex flex-col sm:flex-row items-center sm:items-start justify-between gap-3 sm:gap-4 md:gap-6">
            
            {{-- LEFT: Informasi --}}
            <div class="flex-1 text-center sm:text-left w-full sm:w-auto">
                <div class="inline-flex items-center gap-1.5 sm:gap-2 partnership-badge px-2 sm:px-2.5 md:px-3 py-1 sm:py-1.5 rounded-full text-[9px] sm:text-[10px] md:text-[11px] font-bold text-white mb-2 sm:mb-2.5">
                    <i class="fa-solid fa-handshake text-[8px] sm:text-[9px] md:text-[10px]"></i>
                    Official Partnership
                </div>
                <h2 class="text-lg sm:text-xl md:text-2xl lg:text-3xl font-extrabold text-white/90 mb-1 sm:mb-1.5">
                    NexFi <span class="text-acc">×</span> GrowFin
                </h2>
                <p class="text-[10px] sm:text-[11px] md:text-[12px] lg:text-[13px] text-white/50 leading-relaxed max-w-full sm:max-w-lg">
                    Kolaborasi untuk menghadirkan konten edukasi finansial berkualitas. 
                    Dapatkan insight terbaru seputar keuangan, investasi, dan teknologi finansial dari GrowFin.
                </p>
                
                <div class="flex items-center justify-center sm:justify-start gap-1.5 sm:gap-2 mt-2.5 sm:mt-3 flex-wrap">
                    <span class="text-[8px] sm:text-[9px] md:text-[10px] text-white/20 font-medium mr-0.5 sm:mr-1">Follow:</span>
                    <a href="https://www.instagram.com/growfin.id/" target="_blank" rel="noopener noreferrer" class="social-link">
                        <i class="fa-brands fa-instagram"></i>
                    </a>
                </div>
            </div>

            {{-- RIGHT: Logo NexGrow - Hidden on mobile --}}
            <div class="hidden sm:block flex-shrink-0 -my-2 sm:-my-4 md:-my-6">
                <div class="relative">
                    <div class="absolute -inset-4 md:-inset-6 rounded-full bg-acc/5 blur-2xl"></div>
                    
                    <div class="w-28 h-28 sm:w-36 sm:h-36 md:w-44 md:h-44 lg:w-52 lg:h-52 flex items-center justify-center relative z-10">
                        <img src="{{ asset('assets_public/nexgrow.png') }}" 
                            alt="NexFi × GrowFin"
                            class="w-full h-full object-contain drop-shadow-xl"
                            onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                        <div class="hidden items-center justify-center text-2xl sm:text-3xl md:text-4xl font-extrabold text-acc">
                            NG
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- ══ BANNER: Akses GrowFin ══ --}}
    <a href="https://mygrowfin.id" 
       target="_blank" 
       rel="noopener noreferrer"
       class="banner-growfin block rounded-2xl sm:rounded-[16px] p-3 sm:p-3.5 md:p-4 lg:p-5 border transition-all no-underline relative z-10 group">
        
        <div class="relative z-10 flex flex-col sm:flex-row items-center justify-between gap-2.5 sm:gap-3 md:gap-4">
            <div class="flex items-center gap-2.5 sm:gap-3 md:gap-4 w-full sm:w-auto">
                <div class="w-8 h-8 sm:w-9 sm:h-9 md:w-10 md:h-10 lg:w-12 lg:h-12 rounded-xl flex items-center justify-center flex-shrink-0"
                     style="background: rgba(108, 99, 255, 0.2); border: 1px solid rgba(108, 99, 255, 0.3);">
                    <i class="fa-solid fa-graduation-cap text-acc/70 text-sm sm:text-base md:text-lg lg:text-xl"></i>
                </div>
                <div class="text-center sm:text-left">
                    <h3 class="text-[13px] sm:text-[14px] md:text-[16px] lg:text-[18px] font-extrabold text-white">
                        Akses <span style="color: #8b9cff; text-shadow: 0 0 30px rgba(108, 99, 255, 0.3);">GrowFin</span> Lewat Sini
                    </h3>
                    <p class="text-[10px] sm:text-[11px] md:text-[12px] lg:text-[13px] text-white/50 hidden xs:block">
                        Temukan ribuan artikel edukasi finansial untuk masa depanmu
                    </p>
                </div>
            </div>
            <div class="flex items-center gap-2 sm:gap-3 flex-shrink-0 w-full sm:w-auto justify-center sm:justify-end">
                <span class="text-[9px] sm:text-[10px] md:text-[11px] lg:text-[12px] font-bold text-white/40 hidden sm:inline">mygrowfin.id</span>
                <span class="px-3 sm:px-3.5 md:px-4 py-1.5 sm:py-1.5 md:py-2 rounded-lg sm:rounded-[10px] text-[10px] sm:text-[11px] md:text-[12px] lg:text-[13px] font-bold flex items-center gap-1.5 sm:gap-2 transition-all group-hover:scale-105 w-full sm:w-auto justify-center"
                      style="background: linear-gradient(135deg, #6c63ff, #9b59f5); color: white; box-shadow: 0 0 30px rgba(108, 99, 255, 0.25);">
                    Kunjungi
                    <i class="fa-solid fa-arrow-right banner-arrow text-[9px] sm:text-[10px] md:text-[11px]"></i>
                </span>
            </div>
        </div>
    </a>

    {{-- ══ FILTER KATEGORI ══ --}}
    <div class="filter-scroll overflow-x-auto -mx-4 sm:mx-0 px-4 sm:px-0">
        <div class="flex items-center gap-1.5 sm:gap-2 flex-nowrap min-w-max pb-1" id="filterContainer">
            <button class="filter-btn active px-2.5 sm:px-3 md:px-3.5 py-1.5 sm:py-1.5 md:py-2 rounded-lg sm:rounded-[10px] text-[10px] sm:text-[11px] md:text-[12px] font-bold text-white/50 transition-all hover:border-acc/40 hover:text-white/70"
                    onclick="filterArticles('all', this)">
                <i class="fa-solid fa-grid-2 mr-1 sm:mr-1.5 text-[9px] sm:text-[10px]"></i>Semua
            </button>
            @foreach($categories as $category)
            <button class="filter-btn px-2.5 sm:px-3 md:px-3.5 py-1.5 sm:py-1.5 md:py-2 rounded-lg sm:rounded-[10px] text-[10px] sm:text-[11px] md:text-[12px] font-bold text-white/50 transition-all hover:border-acc/40 hover:text-white/70"
                    onclick="filterArticles('{{ $category }}', this)">
                <i class="fa-solid fa-tag mr-1 sm:mr-1.5 text-[9px] sm:text-[10px]"></i>{{ $category }}
            </button>
            @endforeach
        </div>
    </div>

    {{-- ══ GRID ARTIKEL UTAMA ══ --}}
    <div class="grid grid-cols-1 xs:grid-cols-2 lg:grid-cols-3 gap-3 sm:gap-4 md:gap-5" id="articlesGrid">
        
        {{-- BLOG 1: The Art of Budgeting --}}
        <a href="https://www.mygrowfin.id/article/c1607630-7d73-4bc0-859a-c79a68d1bacc" 
           target="_blank"
           rel="noopener noreferrer"
           class="blog-card group block rounded-xl sm:rounded-2xl overflow-hidden no-underline"
           data-category="Keuangan">
            
            <div class="relative overflow-hidden aspect-[16/9] bg-white/[0.02]">
                <img src="{{ asset('assets_public/dollar.jpg') }}" 
                     alt="The Art of Budgeting"
                     class="blog-thumb w-full h-full object-cover"
                     loading="lazy"
                     onerror="this.style.display='none'; this.parentElement.querySelector('.thumb-fallback').style.display='flex';">
                <div class="thumb-fallback hidden w-full h-full items-center justify-center bg-acc/10">
                    <i class="fa-solid fa-newspaper text-2xl sm:text-3xl md:text-4xl text-acc/30"></i>
                </div>
                
                <div class="absolute top-2 sm:top-2.5 md:top-3 left-2 sm:left-2.5 md:left-3">
                    <span class="category-badge px-1.5 sm:px-2 md:px-2.5 py-0.5 sm:py-0.5 md:py-1 rounded-md sm:rounded-lg text-[8px] sm:text-[9px] md:text-[10px] font-bold text-acc/80">
                        Keuangan
                    </span>
                </div>
                
                <div class="absolute bottom-2 sm:bottom-2.5 md:bottom-3 left-2 sm:left-2.5 md:left-3">
                    <span class="text-[8px] sm:text-[9px] font-medium text-white/30 bg-black/40 backdrop-blur-sm px-1.5 sm:px-2 py-0.5 rounded text-[7px] sm:text-[8px] border border-white/5">
                        <i class="fa-regular fa-circle-check mr-0.5 sm:mr-1 text-acc/50"></i>GrowFin
                    </span>
                </div>
            </div>
            
            <div class="p-2.5 sm:p-3 md:p-4 lg:p-5">
                <h3 class="text-[11px] sm:text-[12px] md:text-[13px] lg:text-[15px] font-extrabold text-white/85 leading-snug mb-1 sm:mb-1.5 md:mb-2 group-hover:text-white transition-colors line-clamp-2">
                    The Art of Budgeting: Cara Teknis Mencatat Pengeluaran Tanpa Ribet
                </h3>
                
                <div class="flex items-center gap-1.5 sm:gap-2 md:gap-3 text-[8px] sm:text-[9px] md:text-[10px] text-white/20 mb-1.5 sm:mb-2 md:mb-3 flex-wrap">
                    <span class="flex items-center gap-0.5 sm:gap-1">
                        <i class="fa-regular fa-calendar"></i>
                        20 Jan 2025
                    </span>
                    <span class="flex items-center gap-0.5 sm:gap-1">
                        <i class="fa-regular fa-user"></i>
                        GrowFin
                    </span>
                </div>
                
                <div class="flex items-center justify-between pt-1.5 sm:pt-2 md:pt-2.5 border-t border-white/5">
                    <span class="text-[7px] sm:text-[8px] md:text-[9px] text-white/15">
                        <i class="fa-regular fa-clock mr-0.5 sm:mr-1"></i>5 min read
                    </span>
                    <span class="text-[9px] sm:text-[10px] md:text-[11px] font-bold text-acc/40 group-hover:text-acc transition-colors flex items-center gap-1 sm:gap-1.5">
                        Visit
                        <i class="fa-solid fa-arrow-up-right-from-square text-[8px] sm:text-[9px] md:text-[10px] group-hover:translate-x-0.5 group-hover:-translate-y-0.5 transition-transform"></i>
                    </span>
                </div>
            </div>
        </a>

        {{-- BLOG 2: Digital Envelope Method --}}
        <a href="https://www.mygrowfin.id/article/81a1f27e-4a01-407a-bbb1-7ebfaadf048e" 
           target="_blank"
           rel="noopener noreferrer"
           class="blog-card group block rounded-xl sm:rounded-2xl overflow-hidden no-underline"
           data-category="Keuangan">
            
            <div class="relative overflow-hidden aspect-[16/9] bg-white/[0.02]">
                <img src="{{ asset('assets_public/rekening.jpg') }}" 
                     alt="Digital Envelope Method"
                     class="blog-thumb w-full h-full object-cover"
                     loading="lazy"
                     onerror="this.style.display='none'; this.parentElement.querySelector('.thumb-fallback').style.display='flex';">
                <div class="thumb-fallback hidden w-full h-full items-center justify-center bg-acc/10">
                    <i class="fa-solid fa-newspaper text-2xl sm:text-3xl md:text-4xl text-acc/30"></i>
                </div>
                
                <div class="absolute top-2 sm:top-2.5 md:top-3 left-2 sm:left-2.5 md:left-3">
                    <span class="category-badge px-1.5 sm:px-2 md:px-2.5 py-0.5 sm:py-0.5 md:py-1 rounded-md sm:rounded-lg text-[8px] sm:text-[9px] md:text-[10px] font-bold text-acc/80">
                        Keuangan
                    </span>
                </div>
                
                <div class="absolute bottom-2 sm:bottom-2.5 md:bottom-3 left-2 sm:left-2.5 md:left-3">
                    <span class="text-[8px] sm:text-[9px] font-medium text-white/30 bg-black/40 backdrop-blur-sm px-1.5 sm:px-2 py-0.5 rounded text-[7px] sm:text-[8px] border border-white/5">
                        <i class="fa-regular fa-circle-check mr-0.5 sm:mr-1 text-acc/50"></i>GrowFin
                    </span>
                </div>
            </div>
            
            <div class="p-2.5 sm:p-3 md:p-4 lg:p-5">
                <h3 class="text-[11px] sm:text-[12px] md:text-[13px] lg:text-[15px] font-extrabold text-white/85 leading-snug mb-1 sm:mb-1.5 md:mb-2 group-hover:text-white transition-colors line-clamp-2">
                    Digital Envelope Method: Cara Alokasi Gaji Biar Tetap Slay Tanpa Ribet Banyak Rekening
                </h3>
                
                <div class="flex items-center gap-1.5 sm:gap-2 md:gap-3 text-[8px] sm:text-[9px] md:text-[10px] text-white/20 mb-1.5 sm:mb-2 md:mb-3 flex-wrap">
                    <span class="flex items-center gap-0.5 sm:gap-1">
                        <i class="fa-regular fa-calendar"></i>
                        18 Jan 2025
                    </span>
                    <span class="flex items-center gap-0.5 sm:gap-1">
                        <i class="fa-regular fa-user"></i>
                        GrowFin
                    </span>
                </div>
                
                <div class="flex items-center justify-between pt-1.5 sm:pt-2 md:pt-2.5 border-t border-white/5">
                    <span class="text-[7px] sm:text-[8px] md:text-[9px] text-white/15">
                        <i class="fa-regular fa-clock mr-0.5 sm:mr-1"></i>6 min read
                    </span>
                    <span class="text-[9px] sm:text-[10px] md:text-[11px] font-bold text-acc/40 group-hover:text-acc transition-colors flex items-center gap-1 sm:gap-1.5">
                        Visit
                        <i class="fa-solid fa-arrow-up-right-from-square text-[8px] sm:text-[9px] md:text-[10px] group-hover:translate-x-0.5 group-hover:-translate-y-0.5 transition-transform"></i>
                    </span>
                </div>
            </div>
        </a>

        {{-- BLOG 3: Checklist Barang Wajib vs Keinginan --}}
        <a href="https://www.mygrowfin.id/article/eec35771-253e-4c14-8209-2e724bbc43c4" 
           target="_blank"
           rel="noopener noreferrer"
           class="blog-card group block rounded-xl sm:rounded-2xl overflow-hidden no-underline"
           data-category="Keuangan">
            
            <div class="relative overflow-hidden aspect-[16/9] bg-white/[0.02]">
                <img src="{{ asset('assets_public/laper.jpg') }}" 
                     alt="Checklist Barang Wajib vs Keinginan"
                     class="blog-thumb w-full h-full object-cover"
                     loading="lazy"
                     onerror="this.style.display='none'; this.parentElement.querySelector('.thumb-fallback').style.display='flex';">
                <div class="thumb-fallback hidden w-full h-full items-center justify-center bg-acc/10">
                    <i class="fa-solid fa-newspaper text-2xl sm:text-3xl md:text-4xl text-acc/30"></i>
                </div>
                
                <div class="absolute top-2 sm:top-2.5 md:top-3 left-2 sm:left-2.5 md:left-3">
                    <span class="category-badge px-1.5 sm:px-2 md:px-2.5 py-0.5 sm:py-0.5 md:py-1 rounded-md sm:rounded-lg text-[8px] sm:text-[9px] md:text-[10px] font-bold text-acc/80">
                        Keuangan
                    </span>
                </div>
                
                <div class="absolute bottom-2 sm:bottom-2.5 md:bottom-3 left-2 sm:left-2.5 md:left-3">
                    <span class="text-[8px] sm:text-[9px] font-medium text-white/30 bg-black/40 backdrop-blur-sm px-1.5 sm:px-2 py-0.5 rounded text-[7px] sm:text-[8px] border border-white/5">
                        <i class="fa-regular fa-circle-check mr-0.5 sm:mr-1 text-acc/50"></i>GrowFin
                    </span>
                </div>
            </div>
            
            <div class="p-2.5 sm:p-3 md:p-4 lg:p-5">
                <h3 class="text-[11px] sm:text-[12px] md:text-[13px] lg:text-[15px] font-extrabold text-white/85 leading-snug mb-1 sm:mb-1.5 md:mb-2 group-hover:text-white transition-colors line-clamp-2">
                    Checklist Barang Wajib vs Keinginan: Biar Gak Kena Trap "Lapar Mata" Era
                </h3>
                
                <div class="flex items-center gap-1.5 sm:gap-2 md:gap-3 text-[8px] sm:text-[9px] md:text-[10px] text-white/20 mb-1.5 sm:mb-2 md:mb-3 flex-wrap">
                    <span class="flex items-center gap-0.5 sm:gap-1">
                        <i class="fa-regular fa-calendar"></i>
                        15 Jan 2025
                    </span>
                    <span class="flex items-center gap-0.5 sm:gap-1">
                        <i class="fa-regular fa-user"></i>
                        GrowFin
                    </span>
                </div>
                
                <div class="flex items-center justify-between pt-1.5 sm:pt-2 md:pt-2.5 border-t border-white/5">
                    <span class="text-[7px] sm:text-[8px] md:text-[9px] text-white/15">
                        <i class="fa-regular fa-clock mr-0.5 sm:mr-1"></i>4 min read
                    </span>
                    <span class="text-[9px] sm:text-[10px] md:text-[11px] font-bold text-acc/40 group-hover:text-acc transition-colors flex items-center gap-1 sm:gap-1.5">
                        Visit
                        <i class="fa-solid fa-arrow-up-right-from-square text-[8px] sm:text-[9px] md:text-[10px] group-hover:translate-x-0.5 group-hover:-translate-y-0.5 transition-transform"></i>
                    </span>
                </div>
            </div>
        </a>
    </div>

    {{-- ══ 6 BLOG TAMBAHAN ══ --}}
    <div class="mt-1 sm:mt-2">
        <div class="flex items-center gap-2 mb-2 sm:mb-2.5 md:mb-3">
            <i class="fa-regular fa-newspaper text-acc/40 text-[10px] sm:text-xs md:text-sm"></i>
            <h3 class="text-[10px] sm:text-[11px] md:text-[13px] font-bold text-white/50">Artikel Populer dari GrowFin</h3>
            <div class="flex-1 h-px bg-gradient-to-r from-white/5 to-transparent"></div>
        </div>
        
        <div class="grid grid-cols-1 xs:grid-cols-2 lg:grid-cols-3 gap-2.5 sm:gap-3 md:gap-4">
            
            {{-- BLOG 1: Paylater --}}
            <a href="https://www.mygrowfin.id/article/59f92d6d-3815-4025-bbfa-2932617a220c" 
               target="_blank" 
               rel="noopener noreferrer"
               class="blog-card group block rounded-xl sm:rounded-2xl overflow-hidden no-underline">
                <div class="relative overflow-hidden aspect-[16/9] bg-white/[0.02]">
                    <img src="{{ asset('assets_public/musuh.jpg') }}" 
                         alt="Paylater"
                         class="blog-thumb w-full h-full object-cover"
                         loading="lazy">
                    <div class="absolute top-2 left-2">
                        <span class="category-badge px-1.5 sm:px-2 py-0.5 rounded-md sm:rounded-lg text-[8px] sm:text-[9px] font-bold text-acc/80">Keuangan</span>
                    </div>
                </div>
                <div class="p-2.5 sm:p-3 md:p-3.5">
                    <h4 class="text-[11px] sm:text-[12px] font-bold text-white/80 group-hover:text-white transition-colors line-clamp-2">
                        Paylater: Sahabat Saat Butuh atau Musuh dalam Selimut?
                    </h4>
                    <div class="flex items-center justify-between mt-1.5">
                        <span class="text-[8px] sm:text-[9px] text-white/20">GrowFin</span>
                        <span class="text-[9px] sm:text-[10px] text-acc/40 group-hover:text-acc transition-colors">
                            Visit <i class="fa-solid fa-arrow-up-right-from-square text-[7px] sm:text-[8px] ml-0.5"></i>
                        </span>
                    </div>
                </div>
            </a>

            {{-- BLOG 2: Self-reward vs Self-destruction --}}
            <a href="https://www.mygrowfin.id/article/e4ff98d5-2325-48a1-959c-7e7c52012df1" 
               target="_blank" 
               rel="noopener noreferrer"
               class="blog-card group block rounded-xl sm:rounded-2xl overflow-hidden no-underline">
                <div class="relative overflow-hidden aspect-[16/9] bg-white/[0.02]">
                    <img src="{{ asset('assets_public/sawer.jpg') }}" 
                         alt="Self-reward vs Self-destruction"
                         class="blog-thumb w-full h-full object-cover"
                         loading="lazy">
                    <div class="absolute top-2 left-2">
                        <span class="category-badge px-1.5 sm:px-2 py-0.5 rounded-md sm:rounded-lg text-[8px] sm:text-[9px] font-bold text-acc/80">Keuangan</span>
                    </div>
                </div>
                <div class="p-2.5 sm:p-3 md:p-3.5">
                    <h4 class="text-[11px] sm:text-[12px] font-bold text-white/80 group-hover:text-white transition-colors line-clamp-2">
                        Self-reward vs Self-destruction: Batasan Antara Apresiasi dan Pemborosan
                    </h4>
                    <div class="flex items-center justify-between mt-1.5">
                        <span class="text-[8px] sm:text-[9px] text-white/20">GrowFin</span>
                        <span class="text-[9px] sm:text-[10px] text-acc/40 group-hover:text-acc transition-colors">
                            Visit <i class="fa-solid fa-arrow-up-right-from-square text-[7px] sm:text-[8px] ml-0.5"></i>
                        </span>
                    </div>
                </div>
            </a>

            {{-- BLOG 3: Rumus 50/30/20 --}}
            <a href="https://www.mygrowfin.id/article/34fae8d0-6a36-4d26-8f02-233e414925f4" 
               target="_blank" 
               rel="noopener noreferrer"
               class="blog-card group block rounded-xl sm:rounded-2xl overflow-hidden no-underline">
                <div class="relative overflow-hidden aspect-[16/9] bg-white/[0.02]">
                    <img src="{{ asset('assets_public/ngitung.jpg') }}" 
                         alt="Rumus 50/30/20"
                         class="blog-thumb w-full h-full object-cover"
                         loading="lazy">
                    <div class="absolute top-2 left-2">
                        <span class="category-badge px-1.5 sm:px-2 py-0.5 rounded-md sm:rounded-lg text-[8px] sm:text-[9px] font-bold text-acc/80">Keuangan</span>
                    </div>
                </div>
                <div class="p-2.5 sm:p-3 md:p-3.5">
                    <h4 class="text-[11px] sm:text-[12px] font-bold text-white/80 group-hover:text-white transition-colors line-clamp-2">
                        Rumus 50/30/20: Auto Slay
                    </h4>
                    <div class="flex items-center justify-between mt-1.5">
                        <span class="text-[8px] sm:text-[9px] text-white/20">GrowFin</span>
                        <span class="text-[9px] sm:text-[10px] text-acc/40 group-hover:text-acc transition-colors">
                            Visit <i class="fa-solid fa-arrow-up-right-from-square text-[7px] sm:text-[8px] ml-0.5"></i>
                        </span>
                    </div>
                </div>
            </a>

            {{-- BLOG 4: Dari Calo Jadi Triliuner --}}
            <a href="https://www.mygrowfin.id/article/3b5671a2-c5a4-4190-aa86-0950d5add509" 
               target="_blank" 
               rel="noopener noreferrer"
               class="blog-card group block rounded-xl sm:rounded-2xl overflow-hidden no-underline">
                <div class="relative overflow-hidden aspect-[16/9] bg-white/[0.02]">
                    <img src="{{ asset('assets_public/triliuner.jpg') }}" 
                         alt="Dari Calo Jadi Triliuner"
                         class="blog-thumb w-full h-full object-cover"
                         loading="lazy">
                    <div class="absolute top-2 left-2">
                        <span class="category-badge px-1.5 sm:px-2 py-0.5 rounded-md sm:rounded-lg text-[8px] sm:text-[9px] font-bold text-acc/80">Bisnis</span>
                    </div>
                </div>
                <div class="p-2.5 sm:p-3 md:p-3.5">
                    <h4 class="text-[11px] sm:text-[12px] font-bold text-white/80 group-hover:text-white transition-colors line-clamp-2">
                        Dari Calo Jadi Triliuner?! Spill Rahasia Bos Lion Air yang Bikin Kita No More FOMO Traveling!
                    </h4>
                    <div class="flex items-center justify-between mt-1.5">
                        <span class="text-[8px] sm:text-[9px] text-white/20">GrowFin</span>
                        <span class="text-[9px] sm:text-[10px] text-acc/40 group-hover:text-acc transition-colors">
                            Visit <i class="fa-solid fa-arrow-up-right-from-square text-[7px] sm:text-[8px] ml-0.5"></i>
                        </span>
                    </div>
                </div>
            </a>

            {{-- BLOG 5: Rupiah Tembus 17k --}}
            <a href="https://www.mygrowfin.id/article/32dd70de-3c0e-48c0-b768-10f4cbb3dc81" 
               target="_blank" 
               rel="noopener noreferrer"
               class="blog-card group block rounded-xl sm:rounded-2xl overflow-hidden no-underline">
                <div class="relative overflow-hidden aspect-[16/9] bg-white/[0.02]">
                    <img src="{{ asset('assets_public/nabung.jpg') }}" 
                         alt="Rupiah Tembus 17k"
                         class="blog-thumb w-full h-full object-cover"
                         loading="lazy">
                    <div class="absolute top-2 left-2">
                        <span class="category-badge px-1.5 sm:px-2 py-0.5 rounded-md sm:rounded-lg text-[8px] sm:text-[9px] font-bold text-acc/80">Ekonomi</span>
                    </div>
                </div>
                <div class="p-2.5 sm:p-3 md:p-3.5">
                    <h4 class="text-[11px] sm:text-[12px] font-bold text-white/80 group-hover:text-white transition-colors line-clamp-2">
                        Rupiah Tembus 17k?! BI Akhirnya Spill Cara Biar Kita Gak Boncos!
                    </h4>
                    <div class="flex items-center justify-between mt-1.5">
                        <span class="text-[8px] sm:text-[9px] text-white/20">GrowFin</span>
                        <span class="text-[9px] sm:text-[10px] text-acc/40 group-hover:text-acc transition-colors">
                            Visit <i class="fa-solid fa-arrow-up-right-from-square text-[7px] sm:text-[8px] ml-0.5"></i>
                        </span>
                    </div>
                </div>
            </a>

            {{-- BLOG 6: Future-Self First --}}
            <a href="https://www.mygrowfin.id/article/d0e85bd2-c49e-4def-9127-eaff92e6ec54" 
               target="_blank" 
               rel="noopener noreferrer"
               class="blog-card group block rounded-xl sm:rounded-2xl overflow-hidden no-underline">
                <div class="relative overflow-hidden aspect-[16/9] bg-white/[0.02]">
                    <img src="{{ asset('assets_public/hemat.jpg') }}" 
                         alt="Future-Self First"
                         class="blog-thumb w-full h-full object-cover"
                         loading="lazy">
                    <div class="absolute top-2 left-2">
                        <span class="category-badge px-1.5 sm:px-2 py-0.5 rounded-md sm:rounded-lg text-[8px] sm:text-[9px] font-bold text-acc/80">Keuangan</span>
                    </div>
                </div>
                <div class="p-2.5 sm:p-3 md:p-3.5">
                    <h4 class="text-[11px] sm:text-[12px] font-bold text-white/80 group-hover:text-white transition-colors line-clamp-2">
                        Future-Self First: Glow-Up Financial Lewat Delayed Gratification
                    </h4>
                    <div class="flex items-center justify-between mt-1.5">
                        <span class="text-[8px] sm:text-[9px] text-white/20">GrowFin</span>
                        <span class="text-[9px] sm:text-[10px] text-acc/40 group-hover:text-acc transition-colors">
                            Visit <i class="fa-solid fa-arrow-up-right-from-square text-[7px] sm:text-[8px] ml-0.5"></i>
                        </span>
                    </div>
                </div>
            </a>
        </div>
    </div>

    {{-- ══ EMPTY STATE ══ --}}
    <div id="emptyState" class="hidden flex-col items-center justify-center py-8 sm:py-10 md:py-12 text-center">
        <div class="w-10 h-10 sm:w-12 sm:h-12 md:w-14 md:h-14 rounded-2xl flex items-center justify-center mb-2 sm:mb-2.5 md:mb-3" style="background: rgba(108,99,255,0.1);">
            <i class="fa-solid fa-magnifying-glass text-base sm:text-lg md:text-xl text-acc/40"></i>
        </div>
        <h3 class="text-[11px] sm:text-[12px] md:text-[13px] font-extrabold text-white/50 mb-0.5">Tidak ada artikel</h3>
        <p class="text-[9px] sm:text-[10px] md:text-[11px] text-white/25">Coba pilih kategori lain.</p>
    </div>

    {{-- ══ FOOTER ══ --}}
    <div class="flex flex-col sm:flex-row items-center justify-between gap-2 py-3 text-[8px] sm:text-[9px] md:text-[10px] text-white/15 border-t border-white/5 mt-1">
        <div class="flex items-center gap-1 sm:gap-1.5 md:gap-2">
            <i class="fa-solid fa-shield-halved"></i>
            <span>Konten oleh</span>
            <a href="https://mygrowfin.id" target="_blank" rel="noopener noreferrer" class="text-acc/40 hover:text-acc/70 transition-colors font-bold">GrowFin</a>
        </div>
        <div class="flex items-center gap-2 sm:gap-3">
            <span class="hidden xs:inline">NexFi × GrowFin</span>
            <span class="w-px h-3 bg-white/10 hidden xs:block"></span>
            <div class="flex items-center gap-1.5">
                <a href="https://www.instagram.com/growfin.id/" target="_blank" rel="noopener noreferrer" class="text-white/15 hover:text-acc/50 transition-colors text-[10px] sm:text-[11px] md:text-[12px]"><i class="fa-brands fa-instagram"></i></a>
                </div>
        </div>
    </div>

</div>

<script>
function filterArticles(category, btn) {
    document.querySelectorAll('.filter-btn').forEach(b => b.classList.remove('active'));
    btn.classList.add('active');
    
    const cards = document.querySelectorAll('#articlesGrid .blog-card');
    let visibleCount = 0;
    
    cards.forEach(card => {
        if (category === 'all' || card.dataset.category === category) {
            card.style.display = 'block';
            visibleCount++;
        } else {
            card.style.display = 'none';
        }
    });
    
    const emptyState = document.getElementById('emptyState');
    if (visibleCount === 0) {
        emptyState.classList.remove('hidden');
        emptyState.classList.add('flex');
    } else {
        emptyState.classList.add('hidden');
        emptyState.classList.remove('flex');
    }
}

document.addEventListener('DOMContentLoaded', function() {
    const cards = document.querySelectorAll('#articlesGrid .blog-card');
    cards.forEach((card, index) => {
        card.style.opacity = '0';
        card.style.transform = 'translateY(15px)';
        card.style.transition = `all 0.4s ease ${index * 0.07}s`;
        
        setTimeout(() => {
            card.style.opacity = '1';
            card.style.transform = 'translateY(0)';
        }, 100 + (index * 70));
    });
});
</script>

@endsection