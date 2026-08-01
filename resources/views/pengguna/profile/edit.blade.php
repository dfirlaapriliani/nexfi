@extends('layout_pengguna.pengguna')

@section('title','Edit Profile')
@section('page-title','Edit Profile')

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
    body, input, button, label { font-family: inherit; }
    .btn-save { background: linear-gradient(135deg,#6c63ff,#9b59f5); }
    .avatar-shadow { box-shadow: 0 0 0 3px rgba(108,99,255,0.5), 0 8px 28px rgba(108,99,255,0.3); }
    .avatar-ph { background: linear-gradient(135deg,#6c63ff,#9b59f5); }
    .badge-grad { background: linear-gradient(135deg,#6c63ff,#9b59f5); }
    input:focus { box-shadow: 0 0 0 3px rgba(108,99,255,0.12); }
    input.err { border-color: rgba(239,68,68,0.5) !important; box-shadow: 0 0 0 3px rgba(239,68,68,0.1); }
</style>

<div class="flex flex-col gap-4 w-full max-w-6xl mx-auto">

    @if(session('success'))
        <div class="px-4 py-3 rounded-xl border flex items-center gap-2.5 text-[13px] font-semibold text-green-400" style="background:rgba(34,197,94,0.1);border-color:rgba(34,197,94,0.25)">
            <i class="fa-solid fa-circle-check"></i> {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('pengguna.profile.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        {{-- ══ CARD 1: FOTO PROFILE ══ --}}
        <div class="bg-bg3 border border-acc/[0.14] rounded-[18px] overflow-hidden mb-4">
            <div class="flex items-center gap-2.5 px-4 sm:px-5 py-3 sm:py-3.5 border-b border-acc/[0.08]">
                <div class="w-7 h-7 sm:w-8 sm:h-8 rounded-[8px] sm:rounded-[9px] flex items-center justify-center text-[11px] sm:text-[12px] text-purple-400 flex-shrink-0" style="background:rgba(108,99,255,0.12)">
                    <i class="fa-solid fa-camera"></i>
                </div>
                <span class="text-[10px] sm:text-[11px] font-bold uppercase tracking-widest text-white/35">Foto Profile</span>
            </div>

            <div class="px-4 sm:px-7 py-4 sm:py-6">
                <div class="flex flex-col sm:flex-row items-center sm:items-start gap-4 sm:gap-7">
                    {{-- Avatar Container --}}
                    <div class="relative flex-shrink-0">
                        {{-- Tampilkan foto yang sudah ada atau placeholder --}}
                        <img id="avatarPreview"
                             class="w-20 h-20 sm:w-24 sm:h-24 rounded-full object-cover border-[3px] border-bg3 avatar-shadow {{ $user->photo ? 'block' : 'hidden' }}"
                             src="{{ $user->photo ? asset('assets_public/' . $user->photo) : '' }}"
                             alt="Foto Profile">
                        
                        <div id="avatarPlaceholder"
                             class="avatar-ph w-20 h-20 sm:w-24 sm:h-24 rounded-full border-[3px] border-bg3 avatar-shadow {{ $user->photo ? 'hidden' : 'flex' }} items-center justify-center text-xl sm:text-[2.2rem] font-extrabold text-white">
                            {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                        </div>
                        
                        <div class="badge-grad absolute bottom-0 sm:bottom-[3px] right-0 sm:right-[3px] w-6 h-6 sm:w-[26px] sm:h-[26px] rounded-full border-2 border-bg3 flex items-center justify-center text-[9px] sm:text-[10px] text-white cursor-pointer hover:scale-110 transition-transform"
                             onclick="document.getElementById('photoInput').click()">
                            <i class="fa-solid fa-pen"></i>
                        </div>
                    </div>

                    {{-- Upload Info --}}
                    <div class="flex-1 min-w-0 text-center sm:text-left">
                        <div class="text-[13px] sm:text-[14px] font-extrabold text-white/90 mb-1">
                            {{ $user->photo ? 'Ganti Foto Profile' : 'Upload Foto Profile' }}
                        </div>
                        <div class="text-[11px] sm:text-[12px] text-white/25 mb-3 sm:mb-3.5 leading-relaxed">
                            Format JPG, PNG, atau GIF. Ukuran maks. 2MB.
                        </div>
                        <div class="flex flex-col sm:flex-row items-center sm:items-center gap-2 sm:gap-2.5">
                            <label class="inline-flex items-center gap-1.5 px-4 sm:px-[18px] py-2 sm:py-2.5 rounded-[10px] border border-acc/30 text-purple-400 text-[11px] sm:text-[12.5px] font-bold cursor-pointer transition-all hover:border-acc/50 hover:text-purple-300 hover:scale-105 w-full sm:w-auto justify-center" 
                                   style="background:rgba(108,99,255,0.14)" 
                                   for="photoInput">
                                <i class="fa-solid fa-upload"></i>
                                {{ $user->photo ? 'Ganti Foto' : 'Pilih Foto' }}
                            </label>
                            <input class="hidden" type="file" id="photoInput" name="photo" accept="image/*">
                            <span class="text-[10px] sm:text-[11.5px] text-white/20 font-mono break-all w-full sm:w-auto text-center sm:text-left" id="fileName">
                                {{ $user->photo ? basename($user->photo) : 'Belum ada file dipilih' }}
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- ══ ROW BAWAH: 2 kolom ══ --}}
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-4">

            {{-- Info Pribadi --}}
            <div class="bg-bg3 border border-acc/[0.14] rounded-[18px] overflow-hidden flex flex-col">
                <div class="flex items-center gap-2.5 px-4 sm:px-5 py-3 sm:py-3.5 border-b border-acc/[0.08]">
                    <div class="w-7 h-7 sm:w-8 sm:h-8 rounded-[8px] sm:rounded-[9px] flex items-center justify-center text-[11px] sm:text-[12px] text-purple-400 flex-shrink-0" style="background:rgba(108,99,255,0.12)">
                        <i class="fa-solid fa-user"></i>
                    </div>
                    <span class="text-[10px] sm:text-[11px] font-bold uppercase tracking-widest text-white/35">Informasi Pribadi</span>
                </div>
                <div class="p-4 sm:p-5 flex flex-col gap-3 sm:gap-3.5 flex-1">

                    <div class="flex flex-col gap-1 sm:gap-1.5">
                        <label class="text-[9px] sm:text-[10.5px] font-bold uppercase tracking-widest text-white/30 flex items-center gap-1 sm:gap-1.5" for="name">
                            <i class="fa-solid fa-id-card text-acc/60 text-[9px] sm:text-[10px]"></i> Nama Lengkap
                        </label>
                        <input class="w-full px-3 sm:px-3.5 py-2.5 sm:py-[11px] rounded-[10px] sm:rounded-[11px] border border-acc/15 bg-white/[0.03] text-white/90 text-[12px] sm:text-[13.5px] outline-none transition-all focus:border-acc/50 focus:bg-acc/[0.06] {{ $errors->has('name') ? 'err' : '' }}"
                               type="text" id="name" name="name"
                               value="{{ old('name', $user->name) }}" placeholder="Nama lengkap kamu">
                        @error('name')<span class="text-[10px] sm:text-[11px] text-red-400 flex items-center gap-1"><i class="fa-solid fa-circle-exclamation"></i> {{ $message }}</span>@enderror
                    </div>

                    <div class="flex flex-col gap-1 sm:gap-1.5">
                        <label class="text-[9px] sm:text-[10.5px] font-bold uppercase tracking-widest text-white/30 flex items-center gap-1 sm:gap-1.5" for="username">
                            <i class="fa-solid fa-at text-acc/60 text-[9px] sm:text-[10px]"></i> Username
                        </label>
                        <input class="w-full px-3 sm:px-3.5 py-2.5 sm:py-[11px] rounded-[10px] sm:rounded-[11px] border border-acc/15 bg-white/[0.03] text-white/90 text-[12px] sm:text-[13.5px] outline-none transition-all focus:border-acc/50 focus:bg-acc/[0.06] {{ $errors->has('username') ? 'err' : '' }}"
                               type="text" id="username" name="username"
                               value="{{ old('username', $user->username) }}" placeholder="username_kamu">
                        @error('username')<span class="text-[10px] sm:text-[11px] text-red-400 flex items-center gap-1"><i class="fa-solid fa-circle-exclamation"></i> {{ $message }}</span>@enderror
                    </div>

                    <div class="flex flex-col gap-1 sm:gap-1.5">
                        <label class="text-[9px] sm:text-[10.5px] font-bold uppercase tracking-widest text-white/30 flex items-center gap-1 sm:gap-1.5" for="email">
                            <i class="fa-solid fa-envelope text-acc/60 text-[9px] sm:text-[10px]"></i> Email
                        </label>
                        <input class="w-full px-3 sm:px-3.5 py-2.5 sm:py-[11px] rounded-[10px] sm:rounded-[11px] border border-acc/15 bg-white/[0.03] text-white/90 text-[12px] sm:text-[13.5px] outline-none transition-all focus:border-acc/50 focus:bg-acc/[0.06] {{ $errors->has('email') ? 'err' : '' }}"
                               type="email" id="email" name="email"
                               value="{{ old('email', $user->email) }}" placeholder="email@kamu.com">
                        @error('email')<span class="text-[10px] sm:text-[11px] text-red-400 flex items-center gap-1"><i class="fa-solid fa-circle-exclamation"></i> {{ $message }}</span>@enderror
                    </div>

                    <div class="flex flex-col gap-1 sm:gap-1.5">
                        <label class="text-[9px] sm:text-[10.5px] font-bold uppercase tracking-widest text-white/30 flex items-center gap-1 sm:gap-1.5" for="no_telp">
                            <i class="fa-solid fa-phone text-acc/60 text-[9px] sm:text-[10px]"></i> No. Telepon
                        </label>
                        <input class="w-full px-3 sm:px-3.5 py-2.5 sm:py-[11px] rounded-[10px] sm:rounded-[11px] border border-acc/15 bg-white/[0.03] text-white/90 text-[12px] sm:text-[13.5px] outline-none transition-all focus:border-acc/50 focus:bg-acc/[0.06] {{ $errors->has('no_telp') ? 'err' : '' }}"
                               type="text" id="no_telp" name="no_telp"
                               value="{{ old('no_telp', $user->no_telp) }}" placeholder="08xxxxxxxxxx">
                        @error('no_telp')<span class="text-[10px] sm:text-[11px] text-red-400 flex items-center gap-1"><i class="fa-solid fa-circle-exclamation"></i> {{ $message }}</span>@enderror
                    </div>

                </div>
            </div>

            {{-- Keamanan --}}
            <div class="bg-bg3 border border-acc/[0.14] rounded-[18px] overflow-hidden flex flex-col">
                <div class="flex items-center gap-2.5 px-4 sm:px-5 py-3 sm:py-3.5 border-b border-acc/[0.08]">
                    <div class="w-7 h-7 sm:w-8 sm:h-8 rounded-[8px] sm:rounded-[9px] flex items-center justify-center text-[11px] sm:text-[12px] text-purple-400 flex-shrink-0" style="background:rgba(108,99,255,0.12)">
                        <i class="fa-solid fa-lock"></i>
                    </div>
                    <span class="text-[10px] sm:text-[11px] font-bold uppercase tracking-widest text-white/35">Keamanan & Password</span>
                </div>

                <div class="p-4 sm:p-5 flex flex-col gap-3 sm:gap-3.5 flex-1">

                    <p class="text-[11px] sm:text-[12px] text-white/22 leading-relaxed">Kosongkan jika tidak ingin mengubah password.</p>

                    <div class="flex flex-col gap-1 sm:gap-1.5">
                        <label class="text-[9px] sm:text-[10.5px] font-bold uppercase tracking-widest text-white/30 flex items-center gap-1 sm:gap-1.5" for="password">
                            <i class="fa-solid fa-key text-acc/60 text-[9px] sm:text-[10px]"></i> Password Baru
                        </label>
                        <div class="relative">
                            <input class="w-full px-3 sm:px-3.5 py-2.5 sm:py-[11px] pr-[42px] rounded-[10px] sm:rounded-[11px] border border-acc/15 bg-white/[0.03] text-white/90 text-[12px] sm:text-[13.5px] outline-none transition-all focus:border-acc/50 focus:bg-acc/[0.06] {{ $errors->has('password') ? 'border-red-400/60 bg-red-400/[0.04]' : '' }}"
                                type="password" id="password" name="password"
                                placeholder="Min. 8 karakter" autocomplete="new-password">
                            <button type="button"
                                    class="absolute right-3 top-1/2 -translate-y-1/2 bg-transparent border-none cursor-pointer text-white/25 text-[12px] sm:text-[13px] p-1 transition-colors hover:text-white/55"
                                    onclick="togglePw('password','eye1')">
                                <i class="fa-solid fa-eye" id="eye1"></i>
                            </button>
                        </div>
                        @error('password')
                            <span class="text-[10px] sm:text-[11px] text-red-400 flex items-center gap-1">
                                <i class="fa-solid fa-circle-exclamation"></i> {{ $message }}
                            </span>
                        @enderror
                    </div>

                    <div class="flex flex-col gap-1 sm:gap-1.5">
                        <label class="text-[9px] sm:text-[10.5px] font-bold uppercase tracking-widest text-white/30 flex items-center gap-1 sm:gap-1.5" for="password_confirmation">
                            <i class="fa-solid fa-shield-halved text-acc/60 text-[9px] sm:text-[10px]"></i> Konfirmasi Password
                        </label>
                        <div class="relative">
                            <input class="w-full px-3 sm:px-3.5 py-2.5 sm:py-[11px] pr-[42px] rounded-[10px] sm:rounded-[11px] border border-acc/15 bg-white/[0.03] text-white/90 text-[12px] sm:text-[13.5px] outline-none transition-all focus:border-acc/50 focus:bg-acc/[0.06]"
                                type="password" id="password_confirmation" name="password_confirmation"
                                placeholder="Ulangi password baru" autocomplete="new-password">
                            <button type="button"
                                    class="absolute right-3 top-1/2 -translate-y-1/2 bg-transparent border-none cursor-pointer text-white/25 text-[12px] sm:text-[13px] p-1 transition-colors hover:text-white/55"
                                    onclick="togglePw('password_confirmation','eye2')">
                                <i class="fa-solid fa-eye" id="eye2"></i>
                            </button>
                        </div>
                    </div>
                </div>

                {{-- ══ TOGGLE LEADERBOARD ══ --}}
                <div class="mx-4 sm:mx-5 mb-4 p-3 sm:p-4 rounded-[12px] sm:rounded-[14px] border border-acc/20 bg-acc/[0.03]">
                    <div class="flex items-start gap-2 sm:gap-3">
                        {{-- Toggle switch --}}
                        <label class="relative inline-flex items-center cursor-pointer mt-0.5 flex-shrink-0">
                            <input type="hidden" name="show_on_leaderboard" value="0">
                            <input type="checkbox" name="show_on_leaderboard" value="1" id="leaderboardToggle"
                                   class="sr-only peer"
                                   {{ old('show_on_leaderboard', $user->show_on_leaderboard ?? true) ? 'checked' : '' }}>
                            <div class="w-9 sm:w-10 h-5 rounded-full bg-white/10 relative transition-all duration-300 peer-checked:bg-acc
                                        after:content-[''] after:absolute after:top-0.5 after:left-0.5
                                        after:bg-white after:rounded-full after:h-4 after:w-4 after:transition-all after:duration-300
                                        peer-checked:after:translate-x-4 sm:peer-checked:after:translate-x-5"></div>
                        </label>
                        {{-- Label --}}
                        <div class="flex-1">
                            <label for="leaderboardToggle" class="text-[12px] sm:text-[13px] font-semibold text-white/80 cursor-pointer">
                                Tampilkan di Leaderboard
                            </label>
                            <p class="text-[10px] sm:text-[11.5px] text-white/30 mt-1 leading-relaxed">
                                Aktifkan agar kamu muncul di ranking publik berdasarkan skor konsistensi.
                                Nominal & saldo kamu <span class="font-bold text-acc/60">tidak akan ditampilkan</span>.
                            </p>
                            <div class="mt-1.5 flex items-center gap-1.5 text-[9px] sm:text-[10.5px] text-white/20">
                                <i class="fa-solid fa-shield-halved text-acc/40"></i>
                                Hanya streak, level, dan kebiasaan yang terlihat
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Footer tombol --}}
                <div class="px-4 sm:px-5 pt-3 sm:pt-3.5 pb-4 sm:pb-[18px] border-t border-acc/[0.08] flex flex-col sm:flex-row items-stretch sm:items-center justify-end gap-2 sm:gap-2.5 mt-auto">
                    <a href="{{ route('pengguna.profile') }}"
                       class="flex items-center justify-center gap-1.5 px-4 sm:px-5 py-2.5 sm:py-[11px] rounded-[10px] sm:rounded-[12px] border border-white/[0.08] bg-white/[0.04] text-white/40 text-[12px] sm:text-[13px] font-bold no-underline transition-all hover:bg-white/[0.08] hover:text-white/70 hover:border-white/15 order-2 sm:order-1">
                        <i class="fa-solid fa-xmark"></i> Batal
                    </a>
                    <button type="submit"
                            class="btn-save flex items-center justify-center gap-2 px-5 sm:px-6 py-2.5 sm:py-[11px] rounded-[10px] sm:rounded-[12px] border-none text-white text-[12px] sm:text-[13px] font-extrabold cursor-pointer transition-all hover:opacity-90 hover:-translate-y-px active:translate-y-0 order-1 sm:order-2"
                            style="box-shadow:0 4px 18px rgba(108,99,255,0.35)">
                        <i class="fa-solid fa-floppy-disk"></i> Simpan Perubahan
                    </button>
                </div>
            </div>

        </div>{{-- /grid --}}

    </form>
</div>

{{-- TARUH SCRIPT DI SINI, BUKAN DI @push --}}
<script>
// Toggle password visibility
function togglePw(inputId, iconId) {
    const input = document.getElementById(inputId);
    const icon  = document.getElementById(iconId);
    if (input.type === 'password') {
        input.type = 'text';
        icon.classList.replace('fa-eye', 'fa-eye-slash');
    } else {
        input.type = 'password';
        icon.classList.replace('fa-eye-slash', 'fa-eye');
    }
}

// Preview foto sebelum upload - INI BAGIAN PENTING UNTUK PREVIEW
document.addEventListener('DOMContentLoaded', function() {
    const photoInput = document.getElementById('photoInput');
    const avatarPreview = document.getElementById('avatarPreview');
    const avatarPlaceholder = document.getElementById('avatarPlaceholder');
    const fileName = document.getElementById('fileName');
    
    if (photoInput) {
        photoInput.addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (!file) return;
            
            // Validasi ukuran file (max 2MB)
            if (file.size > 2 * 1024 * 1024) {
                alert('Ukuran file terlalu besar! Maksimal 2MB.');
                this.value = '';
                return;
            }
            
            // Validasi tipe file
            const allowedTypes = ['image/jpeg', 'image/png', 'image/gif', 'image/webp'];
            if (!allowedTypes.includes(file.type)) {
                alert('Format file tidak didukung! Gunakan JPG, PNG, atau GIF.');
                this.value = '';
                return;
            }
            
            // Update nama file
            if (fileName) {
                fileName.textContent = file.name;
            }
            
            // Preview gambar menggunakan FileReader
            const reader = new FileReader();
            reader.onload = function(event) {
                if (avatarPreview) {
                    avatarPreview.src = event.target.result;
                    avatarPreview.style.display = 'block';
                }
                if (avatarPlaceholder) {
                    avatarPlaceholder.style.display = 'none';
                }
            };
            reader.readAsDataURL(file);
        });
    }
});
</script>

@endsection