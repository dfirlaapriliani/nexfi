<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NexFi – Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="icon" type="image/png" href="{{ asset('assets_public/nex.png') }}">
    <link rel="shortcut icon" type="image/png" href="{{ asset('assets_public/nex.png') }}">
    <style>
        * { font-family: 'Inter', sans-serif; }
        
        /* Custom styles */
        .bg-grid {
            background-image: 
                linear-gradient(rgba(108,99,255,0.07) 1px, transparent 1px),
                linear-gradient(90deg, rgba(108,99,255,0.07) 1px, transparent 1px);
            background-size: 40px 40px;
        }
        
        .card-shadow {
            box-shadow: 
                0 0 0 1px rgba(108,99,255,0.1),
                0 30px 80px rgba(0,0,0,0.7),
                0 0 80px rgba(108,99,255,0.08);
        }
        
        .card-inner-grid {
            background-image: 
                linear-gradient(rgba(255,255,255,0.015) 1px, transparent 1px),
                linear-gradient(90deg, rgba(255,255,255,0.015) 1px, transparent 1px);
            background-size: 36px 36px;
        }
        
        .animate-rise {
            animation: rise 0.7s cubic-bezier(0.22,1,0.36,1) both;
        }
        
        @keyframes rise {
            from { opacity: 0; transform: translateY(32px) scale(0.97); }
            to { opacity: 1; transform: translateY(0) scale(1); }
        }
        
        .inp-focus-ring:focus {
            box-shadow: 0 0 0 4px rgba(108,99,255,0.12);
        }

        /* Biarkan autofill background default untuk login */
        input:-webkit-autofill,
        input:-webkit-autofill:hover,
        input:-webkit-autofill:focus,
        input:-webkit-autofill:active {
            -webkit-text-fill-color: #ffffff !important;
            -webkit-box-shadow: 0 0 0px 1000px #1a1f3a inset !important;
            transition: background-color 5000s ease-in-out 0s;
            caret-color: white;
            border: 1px solid rgba(108,99,255,0.3);
        }
    </style>
</head>
<body class="min-h-screen bg-[#080a18] flex items-center justify-center p-3 sm:p-4 md:p-6 relative overflow-x-hidden">

    <!-- Background Elements -->
    <div class="fixed inset-0 pointer-events-none z-0 bg-grid opacity-50 sm:opacity-100"></div>
    
    <!-- Orbs -->
    <div class="fixed w-[300px] sm:w-[400px] md:w-[600px] h-[300px] sm:h-[400px] md:h-[600px] rounded-full pointer-events-none z-0 top-[-100px] sm:top-[-140px] left-[-100px] sm:left-[-140px] opacity-50 sm:opacity-100"
         style="background: radial-gradient(circle, rgba(108,99,255,0.22) 0%, transparent 70%);">
    </div>
    <div class="fixed w-[250px] sm:w-[350px] md:w-[500px] h-[250px] sm:h-[350px] md:h-[500px] rounded-full pointer-events-none z-0 bottom-[-80px] sm:bottom-[-120px] right-[-80px] sm:right-[-100px] opacity-50 sm:opacity-100"
         style="background: radial-gradient(circle, rgba(155,89,245,0.16) 0%, transparent 70%);">
    </div>
    <div class="fixed w-[200px] sm:w-[250px] md:w-[350px] h-[200px] sm:h-[250px] md:h-[350px] rounded-full pointer-events-none z-0 top-1/2 left-[60%] -translate-x-1/2 -translate-y-1/2 opacity-30 sm:opacity-50"
         style="background: radial-gradient(circle, rgba(108,99,255,0.1) 0%, transparent 70%);">
    </div>

    <!-- Card -->
    <div class="relative z-10 w-full max-w-sm sm:max-w-lg md:max-w-2xl lg:max-w-3xl xl:max-w-4xl animate-rise">
        <div class="bg-[#10132a] rounded-xl sm:rounded-2xl border border-[rgba(108,99,255,0.2)] card-shadow overflow-hidden relative">
            
            <!-- Inner grid pattern -->
            <div class="absolute inset-0 card-inner-grid pointer-events-none opacity-30 sm:opacity-100"></div>
            
            <!-- Top accent line -->
            <div class="absolute top-0 left-0 right-0 h-[1px] sm:h-[2px] bg-gradient-to-r from-transparent via-[#6c63ff] via-[#9b59f5] to-transparent pointer-events-none"></div>
            
            <!-- Content -->
            <div class="relative z-10 p-4 sm:p-6 md:p-8 lg:p-10">
                
                <!-- Header -->
                <div class="mb-4 sm:mb-6">
                    <div class="flex items-center gap-2 sm:gap-3 mb-2 sm:mb-4">
                        <!-- Logo Icon -->
                        <div class="w-8 h-8 sm:w-10 sm:h-10 bg-gradient-to-br from-[#6c63ff] to-[#9b59f5] rounded-lg sm:rounded-xl flex items-center justify-center shadow-lg shrink-0"
                             style="box-shadow: 0 6px 20px rgba(108,99,255,0.35);">
                            <svg width="16" height="16" sm:width="20" sm:height="20" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2.2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                            </svg>
                        </div>
                        <span class="text-xl sm:text-2xl font-extrabold text-white tracking-tight">
                            Nex<span class="bg-gradient-to-r from-[#6c63ff] to-[#9b59f5] bg-clip-text text-transparent">Fi</span>
                        </span>
                    </div>
                    
                    <h1 class="text-xl sm:text-2xl md:text-3xl font-extrabold text-white mb-0.5 sm:mb-1 tracking-tight">Selamat Datang 👋</h1>
                    <p class="text-xs sm:text-sm text-white/40 font-medium">Masuk ke akun NexFi Anda</p>
                </div>
                
                <!-- Alert -->
                @if(session('success'))
                <div class="mb-4 sm:mb-5 p-2 sm:p-3 rounded-lg sm:rounded-xl bg-[rgba(74,222,128,0.07)] border border-[rgba(74,222,128,0.25)] flex items-center gap-2">
                    <svg class="w-4 h-4 text-[#4ade80] shrink-0" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                    </svg>
                    <span class="text-xs sm:text-sm font-medium text-[#4ade80] break-words">{{ session('success') }}</span>
                </div>
                @endif

                @if($errors->any())
                <div class="mb-4 sm:mb-5 p-2 sm:p-3 rounded-lg sm:rounded-xl bg-[rgba(239,68,68,0.07)] border border-[rgba(239,68,68,0.25)] flex items-center gap-2">
                    <svg class="w-4 h-4 text-[#ef4444] shrink-0" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                    </svg>
                    <span class="text-xs sm:text-sm font-medium text-[#ef4444] break-words">{{ $errors->first() }}</span>
                </div>
                @endif

                <!-- Form - Login boleh autofill -->
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    
                    <!-- Grid layout untuk form -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 md:gap-6">
                        <!-- Kolom Kiri -->
                        <div class="space-y-4">
                            <!-- Email/Username -->
                            <div>
                                <label class="block text-[10px] sm:text-[11px] font-bold uppercase tracking-wider text-white/35 mb-1 sm:mb-2">Email / Username</label>
                                <div class="relative">
                                    <input type="text" 
                                           name="login" 
                                           value="{{ old('login') }}"
                                           required 
                                           autocomplete="username"
                                           class="w-full bg-white/5 border border-white/10 rounded-lg sm:rounded-xl py-2.5 sm:py-3.5 pl-9 sm:pl-11 pr-3 sm:pr-4 text-xs sm:text-sm font-medium text-white placeholder:text-white/20 focus:bg-[rgba(108,99,255,0.08)] focus:border-[#6c63ff] inp-focus-ring focus:outline-none transition-all"
                                           placeholder="nama@email.com">
                                    <span class="absolute left-3 sm:left-4 top-1/2 -translate-y-1/2 text-[#6c63ff]/45">
                                        <svg width="13" height="13" sm:width="15" sm:height="15" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                        </svg>
                                    </span>
                                </div>
                            </div>
                        </div>

                        <!-- Kolom Kanan -->
                        <div class="space-y-4">
                            <!-- Password -->
                            <div>
                                <div class="flex items-center justify-between mb-1 sm:mb-2">
                                    <label class="text-[10px] sm:text-[11px] font-bold uppercase tracking-wider text-white/35">Password</label>
                                </div>
                                <div class="relative">
                                    <input type="password" 
                                           name="password" 
                                           id="pwd" 
                                           required 
                                           autocomplete="current-password"
                                           class="w-full bg-white/5 border border-white/10 rounded-lg sm:rounded-xl py-2.5 sm:py-3.5 pl-9 sm:pl-11 pr-10 sm:pr-12 text-xs sm:text-sm font-medium text-white placeholder:text-white/20 focus:bg-[rgba(108,99,255,0.08)] focus:border-[#6c63ff] inp-focus-ring focus:outline-none transition-all"
                                           placeholder="Masukkan password">
                                    <span class="absolute left-3 sm:left-4 top-1/2 -translate-y-1/2 text-[#6c63ff]/45">
                                        <svg width="13" height="13" sm:width="15" sm:height="15" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                                        </svg>
                                    </span>
                                    <button type="button" onclick="togglePwd()" class="absolute right-3 sm:right-4 top-1/2 -translate-y-1/2 text-white/20 hover:text-[#6c63ff] transition-colors">
                                        <svg id="eye" width="14" height="14" sm:width="16" sm:height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Remember me - Di bawah grid -->
                    <div class="mt-4 sm:mt-6">
                        <div class="flex items-center gap-2.5">
                            <input type="checkbox" id="remember" name="remember" 
                                   class="w-3.5 h-3.5 sm:w-4 sm:h-4 accent-[#6c63ff] cursor-pointer">
                            <label for="remember" class="text-xs sm:text-sm text-white/35 cursor-pointer font-normal">Ingat saya</label>
                        </div>
                    </div>

                    <!-- Submit Button & Register Link -->
                    <div class="mt-4 sm:mt-6 space-y-3 sm:space-y-4">
                        <!-- Submit Button -->
                        <button type="submit" class="w-full bg-gradient-to-r from-[#6c63ff] to-[#9b59f5] text-white font-bold text-xs sm:text-[14.5px] py-2.5 sm:py-3.5 px-4 sm:px-5 rounded-lg sm:rounded-xl flex items-center justify-center gap-2 transition-all hover:from-[#6c63ff]/90 hover:to-[#9b59f5]/90 relative overflow-hidden group"
                                style="box-shadow: 0 4px 16px rgba(108,99,255,0.2);">
                            <span class="absolute inset-0 bg-gradient-to-r from-white/10 to-transparent opacity-0 group-hover:opacity-100 transition-opacity"></span>
                            <span>Masuk Sekarang</span>
                            <svg width="13" height="13" sm:width="15" sm:height="15" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                            </svg>
                        </button>

                        <!-- Register link -->
                        <p class="text-center text-xs sm:text-sm text-white/35 font-medium">
                            Belum punya akun? 
                            <a href="{{ route('register') }}" class="text-[#6c63ff] font-semibold hover:underline">Daftar Gratis →</a>
                        </p>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        function togglePwd() {
            const p = document.getElementById('pwd'), e = document.getElementById('eye');
            if (p.type === 'password') {
                p.type = 'text';
                e.innerHTML = `<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21"/>`;
            } else {
                p.type = 'password';
                e.innerHTML = `<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>`;
            }
        }
    </script>
</body>
</html>