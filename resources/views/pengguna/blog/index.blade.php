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
                colors: { bg3: '#10132a', acc: '#6c63ff', acc2: '#9b59f5' }
            }
        }
    }
</script>

<style>
    body, input, button, a { font-family: inherit; }
    
    /* Card hover effect */
    .blog-card {
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }
    .blog-card:hover {
        transform: translateY(-6px);
        box-shadow: 0 20px 40px rgba(108, 99, 255, 0.15), 0 0 0 1px rgba(108, 99, 255, 0.2);
    }
    .blog-card:hover .blog-thumb {
        transform: scale(1.05);
    }
    .blog-card:hover .blog-arrow {
        transform: translateX(4px);
        color: #6c63ff;
    }
    
    /* Thumbnail transition */
    .blog-thumb {
        transition: transform 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    }
    
    /* Arrow transition */
    .blog-arrow {
        transition: all 0.3s ease;
    }
    
    /* Category badge */
    .category-badge {
        background: rgba(108, 99, 255, 0.15);
        backdrop-filter: blur(10px);
        border: 1px solid rgba(108, 99, 255, 0.2);
    }
    
    /* Filter buttons */
    .filter-btn {
        transition: all 0.3s ease;
    }
    .filter-btn.active {
        background: linear-gradient(135deg, #6c63ff, #9b59f5);
        color: white;
        border-color: transparent;
    }
    
    /* Skeleton loading */
    @keyframes shimmer {
        0% { background-position: -200% 0; }
        100% { background-position: 200% 0; }
    }
    .skeleton {
        background: linear-gradient(90deg, rgba(255,255,255,0.03) 25%, rgba(255,255,255,0.08) 50%, rgba(255,255,255,0.03) 75%);
        background-size: 200% 100%;
        animation: shimmer 1.5s infinite;
    }
    
    /* Partnership badge */
    .partnership-badge {
        background: linear-gradient(135deg, #6c63ff, #9b59f5);
        animation: pulse-glow 2s infinite;
    }
    @keyframes pulse-glow {
        0%, 100% { box-shadow: 0 0 20px rgba(108, 99, 255, 0.3); }
        50% { box-shadow: 0 0 35px rgba(108, 99, 255, 0.5); }
    }
</style>

<div class="flex flex-col gap-5 w-full">

    {{-- ══ HERO / HEADER SECTION ══ --}}
    <div class="relative overflow-hidden rounded-[24px] p-6 sm:p-8 border border-acc/20" 
         style="background: linear-gradient(135deg, rgba(108,99,255,0.08), rgba(155,89,245,0.05));">
        
        {{-- Decorative elements --}}
        <div class="absolute top-0 right-0 w-40 h-40 rounded-full opacity-10" 
             style="background: radial-gradient(circle, #6c63ff, transparent); transform: translate(30%, -30%);"></div>
        <div class="absolute bottom-0 left-0 w-32 h-32 rounded-full opacity-8"
             style="background: radial-gradient(circle, #9b59f5, transparent); transform: translate(-20%, 20%);"></div>
        
        <div class="relative flex flex-col sm:flex-row items-center gap-5">
            {{-- Logo GrowFin --}}
            <div class="flex-shrink-0">
                <div class="w-20 h-20 sm:w-24 sm:h-24 rounded-2xl flex items-center justify-center overflow-hidden border-2 border-acc/30"
                     style="background: rgba(255,255,255,0.05); backdrop-filter: blur(10px);">
                    <img src="https://growfin.my.id/assets/images/logo.png" 
                         alt="GrowFin Logo"
                         class="w-14 h-14 sm:w-16 sm:h-16 object-contain"
                         onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                    <div class="hidden items-center justify-center text-3xl sm:text-4xl font-extrabold text-acc">
                        GF
                    </div>
                </div>
            </div>
            
            {{-- Info --}}
            <div class="flex-1 text-center sm:text-left">
                <div class="inline-flex items-center gap-2 partnership-badge px-3 py-1.5 rounded-full text-[10px] sm:text-[11px] font-bold text-white mb-2">
                    <i class="fa-solid fa-handshake"></i>
                    Official Partner
                </div>
                <h2 class="text-lg sm:text-xl font-extrabold text-white/90 mb-1.5">
                    NexFi <span class="text-acc">×</span> GrowFin
                </h2>
                <p class="text-[12px] sm:text-[13px] text-white/40 leading-relaxed max-w-xl">
                    Kolaborasi untuk menghadirkan konten edukasi finansial berkualitas. 
                    Dapatkan insight terbaru seputar keuangan, investasi, dan teknologi finansial.
                </p>
                <a href="https://growfin.my.id" 
                   target="_blank" 
                   rel="noopener noreferrer"
                   class="inline-flex items-center gap-2 mt-3 px-4 py-2 rounded-[10px] text-[12px] font-bold text-acc border border-acc/30 transition-all hover:bg-acc/10 hover:border-acc/50">
                    <i class="fa-solid fa-arrow-up-right-from-square"></i>
                    Kunjungi GrowFin
                </a>
            </div>
        </div>
    </div>

    {{-- ══ FILTER KATEGORI ══ --}}
    <div class="flex items-center gap-2 flex-wrap" id="filterContainer">
        <button class="filter-btn active px-3.5 py-2 rounded-[10px] border border-acc/20 text-[11px] sm:text-[12px] font-bold text-white/50 transition-all hover:border-acc/40 hover:text-white/70"
                onclick="filterArticles('all', this)">
            <i class="fa-solid fa-grid-2 mr-1.5"></i>Semua
        </button>
        @foreach($categories as $category)
        <button class="filter-btn px-3.5 py-2 rounded-[10px] border border-acc/20 text-[11px] sm:text-[12px] font-bold text-white/50 transition-all hover:border-acc/40 hover:text-white/70"
                onclick="filterArticles('{{ $category }}', this)">
            <i class="fa-solid fa-tag mr-1.5"></i>{{ $category }}
        </button>
        @endforeach
    </div>

    {{-- ══ GRID ARTIKEL ══ --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4" id="articlesGrid">
        @foreach($articles as $article)
        <a href="{{ route('pengguna.blog.visit', $article['slug']) }}" 
           target="_blank"
           rel="noopener noreferrer"
           class="blog-card group block bg-bg3/80 backdrop-blur-sm border border-acc/[0.12] rounded-[18px] overflow-hidden no-underline"
           data-category="{{ $article['category'] }}">
            
            {{-- Thumbnail --}}
            <div class="relative overflow-hidden aspect-[16/9] bg-white/[0.02]">
                <img src="{{ $article['thumbnail'] }}" 
                     alt="{{ $article['title'] }}"
                     class="blog-thumb w-full h-full object-cover"
                     loading="lazy"
                     onerror="this.style.display='none'; this.parentElement.querySelector('.thumb-fallback').style.display='flex';">
                <div class="thumb-fallback hidden w-full h-full items-center justify-center bg-acc/10">
                    <i class="fa-solid fa-newspaper text-3xl text-acc/30"></i>
                </div>
                
                {{-- Category Badge --}}
                <div class="absolute top-3 left-3">
                    <span class="category-badge px-2.5 py-1 rounded-[8px] text-[10px] font-bold text-acc/80">
                        {{ $article['category'] }}
                    </span>
                </div>
                
                {{-- Read time --}}
                <div class="absolute top-3 right-3">
                    <span class="px-2 py-1 rounded-[6px] text-[10px] font-medium text-white/40 bg-black/40 backdrop-blur-sm">
                        <i class="fa-regular fa-clock mr-1"></i>{{ $article['read_time'] }} min
                    </span>
                </div>
            </div>
            
            {{-- Content --}}
            <div class="p-4 sm:p-5">
                {{-- Meta info --}}
                <div class="flex items-center gap-3 text-[10px] sm:text-[11px] text-white/20 mb-2">
                    <span class="flex items-center gap-1">
                        <i class="fa-regular fa-calendar"></i>
                        {{ \Carbon\Carbon::parse($article['published_at'])->format('d M Y') }}
                    </span>
                    <span class="flex items-center gap-1">
                        <i class="fa-regular fa-user"></i>
                        {{ $article['author'] }}
                    </span>
                </div>
                
                {{-- Title --}}
                <h3 class="text-[13px] sm:text-[14px] font-extrabold text-white/85 leading-snug mb-2 group-hover:text-white transition-colors line-clamp-2">
                    {{ $article['title'] }}
                </h3>
                
                {{-- Excerpt --}}
                <p class="text-[11px] sm:text-[12px] text-white/30 leading-relaxed mb-3 line-clamp-2">
                    {{ $article['excerpt'] }}
                </p>
                
                {{-- Read more --}}
                <div class="flex items-center gap-1.5 text-[11px] font-bold text-acc/50 group-hover:text-acc transition-colors">
                    Baca Selengkapnya
                    <i class="fa-solid fa-arrow-right blog-arrow text-[10px]"></i>
                </div>
            </div>
        </a>
        @endforeach
    </div>

    {{-- ══ EMPTY STATE ══ --}}
    <div id="emptyState" class="hidden flex-col items-center justify-center py-16 text-center">
        <div class="w-16 h-16 rounded-2xl flex items-center justify-center mb-4" style="background: rgba(108,99,255,0.1);">
            <i class="fa-solid fa-magnifying-glass text-2xl text-acc/40"></i>
        </div>
        <h3 class="text-[14px] font-extrabold text-white/50 mb-1">Tidak ada artikel ditemukan</h3>
        <p class="text-[12px] text-white/25">Coba pilih kategori lain atau periksa kembali nanti.</p>
    </div>

    {{-- ══ FOOTER NOTE ══ --}}
    <div class="flex items-center justify-center gap-2 py-4 text-[11px] text-white/15">
        <i class="fa-solid fa-shield-halved"></i>
        Konten disediakan oleh 
        <a href="https://growfin.my.id" 
           target="_blank" 
           rel="noopener noreferrer"
           class="text-acc/40 hover:text-acc/70 transition-colors font-bold">
            GrowFin
        </a>
    </div>

</div>

{{-- ══ SCRIPT ══ --}}
<script>
// Filter artikel berdasarkan kategori
function filterArticles(category, btn) {
    // Update active button
    document.querySelectorAll('.filter-btn').forEach(b => b.classList.remove('active'));
    btn.classList.add('active');
    
    // Filter cards
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
    
    // Toggle empty state
    const emptyState = document.getElementById('emptyState');
    if (visibleCount === 0) {
        emptyState.classList.remove('hidden');
        emptyState.classList.add('flex');
    } else {
        emptyState.classList.add('hidden');
        emptyState.classList.remove('flex');
    }
}

// Lazy loading animation
document.addEventListener('DOMContentLoaded', function() {
    const cards = document.querySelectorAll('.blog-card');
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.opacity = '1';
                entry.target.style.transform = 'translateY(0)';
            }
        });
    }, { threshold: 0.1 });
    
    cards.forEach((card, index) => {
        card.style.opacity = '0';
        card.style.transform = 'translateY(20px)';
        card.style.transition = `all 0.5s ease ${index * 0.1}s`;
        observer.observe(card);
        
        // Trigger animation
        setTimeout(() => {
            card.style.opacity = '1';
            card.style.transform = 'translateY(0)';
        }, 100 + (index * 100));
    });
});
</script>

@endsection