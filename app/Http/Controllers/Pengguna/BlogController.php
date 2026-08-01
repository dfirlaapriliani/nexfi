<?php

namespace App\Http\Controllers\Pengguna;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class BlogController extends Controller
{
    /**
     * Ambil data artikel dari API GrowFin
     */
    private function fetchGrowFinArticles()
    {
        try {
            // Ganti dengan endpoint API GrowFin yang sebenarnya
            $response = Http::timeout(10)->get('https://growfin.my.id/api/articles');
            
            if ($response->successful()) {
                return $response->json()['data'] ?? [];
            }
            
            return [];
        } catch (\Exception $e) {
            // Fallback: data dummy kalau API tidak tersedia
            return $this->getDummyArticles();
        }
    }

    /**
     * Data dummy sebagai fallback
     */
    private function getDummyArticles()
    {
        return [
            [
                'id' => 1,
                'title' => 'Mengenal Financial Technology: Masa Depan Keuangan Digital',
                'slug' => 'mengenal-fintech-masa-depan-keuangan-digital',
                'thumbnail' => 'https://growfin.my.id/assets/images/blog/fintech.jpg',
                'excerpt' => 'Pelajari bagaimana financial technology mengubah cara kita mengelola keuangan...',
                'category' => 'Fintech',
                'author' => 'Tim GrowFin',
                'published_at' => '2026-07-28',
                'read_time' => 5,
                'url' => 'https://growfin.my.id/blog/mengenal-fintech'
            ],
            [
                'id' => 2,
                'title' => 'Strategi Investasi untuk Pemula: Mulai dari Mana?',
                'slug' => 'strategi-investasi-pemula',
                'thumbnail' => 'https://growfin.my.id/assets/images/blog/investasi.jpg',
                'excerpt' => 'Bingung mau mulai investasi? Simak panduan lengkap untuk investor pemula...',
                'category' => 'Investasi',
                'author' => 'Tim GrowFin',
                'published_at' => '2026-07-25',
                'read_time' => 7,
                'url' => 'https://growfin.my.id/blog/strategi-investasi-pemula'
            ],
            [
                'id' => 3,
                'title' => 'Crypto & Blockchain: Peluang dan Risiko di Tahun 2026',
                'slug' => 'crypto-blockchain-2026',
                'thumbnail' => 'https://growfin.my.id/assets/images/blog/crypto.jpg',
                'excerpt' => 'Update terbaru tentang cryptocurrency dan teknologi blockchain...',
                'category' => 'Crypto',
                'author' => 'Tim GrowFin',
                'published_at' => '2026-07-22',
                'read_time' => 6,
                'url' => 'https://growfin.my.id/blog/crypto-blockchain-2026'
            ],
            [
                'id' => 4,
                'title' => 'Manajemen Risiko Keuangan: Lindungi Aset Anda',
                'slug' => 'manajemen-risiko-keuangan',
                'thumbnail' => 'https://growfin.my.id/assets/images/blog/risk.jpg',
                'excerpt' => 'Cara cerdas mengelola risiko keuangan untuk masa depan yang lebih aman...',
                'category' => 'Edukasi',
                'author' => 'Tim GrowFin',
                'published_at' => '2026-07-20',
                'read_time' => 4,
                'url' => 'https://growfin.my.id/blog/manajemen-risiko'
            ],
            [
                'id' => 5,
                'title' => 'Budgeting ala Gen Z: Cara Atur Keuangan di Era Digital',
                'slug' => 'budgeting-gen-z',
                'thumbnail' => 'https://growfin.my.id/assets/images/blog/budgeting.jpg',
                'excerpt' => 'Tips budgeting kekinian yang cocok buat anak muda...',
                'category' => 'Lifestyle',
                'author' => 'Tim GrowFin',
                'published_at' => '2026-07-18',
                'read_time' => 5,
                'url' => 'https://growfin.my.id/blog/budgeting-gen-z'
            ],
            [
                'id' => 6,
                'title' => 'NexFi x GrowFin: Kolaborasi untuk Literasi Keuangan',
                'slug' => 'nexfi-growfin-kolaborasi',
                'thumbnail' => 'https://growfin.my.id/assets/images/blog/kolaborasi.jpg',
                'excerpt' => 'Dua platform keuangan bersatu untuk tingkatkan literasi finansial Indonesia...',
                'category' => 'Update',
                'author' => 'Tim GrowFin',
                'published_at' => '2026-08-01',
                'read_time' => 3,
                'url' => 'https://growfin.my.id/blog/nexfi-growfin'
            ],
        ];
    }

    /**
     * Halaman index blog
     */
    public function index()
    {
        $articles = $this->fetchGrowFinArticles();
        
        // Ambil kategori unik untuk filter
        $categories = collect($articles)->pluck('category')->unique()->values();
        
        return view('pengguna.blog.index', compact('articles', 'categories'));
    }

    /**
     * Redirect ke artikel GrowFin
     */
    public function visit($slug)
    {
        $articles = $this->fetchGrowFinArticles();
        $article = collect($articles)->firstWhere('slug', $slug);
        
        if (!$article) {
            return redirect()->route('pengguna.blog.index')->with('error', 'Artikel tidak ditemukan');
        }
        
        return redirect()->away($article['url']);
    }
}