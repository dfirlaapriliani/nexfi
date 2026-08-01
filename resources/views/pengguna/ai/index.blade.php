@extends('layout_pengguna.pengguna')

@section('title', 'AI NexFi')
@section('page-title', 'AI NexFi')

@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

<style>
  :root {
    --bg:       #07080f;
    --bg2:      #0c0d1d;
    --bg3:      #10132a;
    --accent:   #6c63ff;
    --accent2:  #9b59f5;
    --border:   rgba(108,99,255,0.18);
    --glow:     rgba(108,99,255,0.2);
    --muted:    rgba(255,255,255,0.3);
    --muted2:   rgba(255,255,255,0.5);
    --text:     rgba(255,255,255,0.88);
    --font:     'Plus Jakarta Sans', sans-serif;
  }

  *, *::before, *::after { box-sizing: border-box; }

  #ai-wrap {
    display: flex;
    flex-direction: column;
    height: calc(100vh - 80px);
    max-width: 960px;
    margin: 0 auto;
    font-family: var(--font);
  }

  /* ── HEADER ── */
  #ai-header {
    display: flex;
    align-items: center;
    gap: 12px;
    padding: 14px 18px;
    background: linear-gradient(135deg, #0d0e22, #10122b);
    border: 1px solid var(--border);
    border-radius: 18px 18px 0 0;
    position: relative;
    overflow: hidden;
  }
  #ai-header::after {
    content: '';
    position: absolute;
    inset: 0;
    background: radial-gradient(ellipse at top left, rgba(108,99,255,0.08) 0%, transparent 60%);
    pointer-events: none;
  }

  .ai-avatar {
    width: 44px; height: 44px;
    border-radius: 13px;
    background: linear-gradient(135deg, var(--accent), var(--accent2));
    display: flex; align-items: center; justify-content: center;
    flex-shrink: 0;
    box-shadow: 0 4px 18px rgba(108,99,255,0.35);
    position: relative;
  }
  .ai-avatar::after {
    content: '';
    position: absolute;
    inset: -1px;
    border-radius: 14px;
    background: linear-gradient(135deg, rgba(255,255,255,0.15), transparent);
    pointer-events: none;
  }
  .ai-avatar i { font-size: 1.15rem; color: #fff; position: relative; z-index: 1; }

  .ai-header-info { flex: 1; }
  .ai-header-info h3 {
    margin: 0;
    font-size: 0.95rem;
    font-weight: 800;
    color: #fff;
    letter-spacing: -0.02em;
  }
  .ai-online {
    display: flex; align-items: center; gap: 5px;
    font-size: 0.71rem; color: var(--muted2); margin-top: 2px;
  }
  .online-dot {
    width: 7px; height: 7px; border-radius: 50%;
    background: #4ade80;
    box-shadow: 0 0 8px rgba(74,222,128,0.6);
    animation: blink 2s infinite;
    flex-shrink: 0;
  }
  @keyframes blink { 0%,100%{opacity:1} 50%{opacity:0.3} }

  .header-actions { display: flex; gap: 6px; }
  .ai-header-btn {
    width: 34px; height: 34px;
    border-radius: 9px;
    border: 1px solid var(--border);
    background: rgba(255,255,255,0.03);
    color: var(--muted2);
    display: flex; align-items: center; justify-content: center;
    cursor: pointer; font-size: 0.78rem;
    transition: all 0.18s;
  }
  .ai-header-btn:hover {
    background: rgba(239,68,68,0.1);
    color: #f87171;
    border-color: rgba(239,68,68,0.25);
  }

  /* ── CHAT BOX WITH BLUR ── */
  #chat-box {
    flex: 1;
    overflow-y: auto;
    padding: 20px 18px;
    background: #07080f;
    border-left: 1px solid var(--border);
    border-right: 1px solid var(--border);
    display: flex;
    flex-direction: column;
    gap: 10px;
    scroll-behavior: smooth;
    will-change: scroll-position;
    -webkit-overflow-scrolling: touch;
    position: relative;
  }
  #chat-box::-webkit-scrollbar { width: 4px; }
  #chat-box::-webkit-scrollbar-track { background: transparent; }
  #chat-box::-webkit-scrollbar-thumb { background: rgba(108,99,255,0.2); border-radius: 4px; }
  #chat-box::-webkit-scrollbar-thumb:hover { background: rgba(108,99,255,0.4); }

  /* ── BLUR OVERLAY ── */
  #blur-overlay {
    position: absolute;
    inset: 0;
    background: rgba(7, 8, 15, 0.75);
    backdrop-filter: blur(12px);
    -webkit-backdrop-filter: blur(12px);
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    z-index: 10;
    gap: 12px;
    border-radius: 0;
    animation: fadeIn 0.5s ease;
  }

  @keyframes fadeIn {
    from { opacity: 0; }
    to { opacity: 1; }
  }

  #blur-overlay .lock-icon {
    width: 64px;
    height: 64px;
    border-radius: 50%;
    background: rgba(108, 99, 255, 0.1);
    border: 2px solid rgba(108, 99, 255, 0.2);
    display: flex;
    align-items: center;
    justify-content: center;
    animation: pulse 2s ease-in-out infinite;
  }

  @keyframes pulse {
    0%, 100% { transform: scale(1); }
    50% { transform: scale(1.05); }
  }

  #blur-overlay .lock-icon i {
    font-size: 1.8rem;
    color: #8b7ff5;
  }

  #blur-overlay h2 {
    font-size: 1.5rem;
    font-weight: 800;
    color: rgba(255, 255, 255, 0.9);
    margin: 0;
    letter-spacing: -0.02em;
  }

  #blur-overlay p {
    font-size: 0.85rem;
    color: rgba(255, 255, 255, 0.4);
    margin: 0;
    text-align: center;
    max-width: 280px;
    line-height: 1.6;
  }

  #blur-overlay .coming-badge {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    padding: 4px 14px;
    border-radius: 9999px;
    background: rgba(108, 99, 255, 0.12);
    border: 1px solid rgba(108, 99, 255, 0.15);
    font-size: 0.7rem;
    color: rgba(255, 255, 255, 0.3);
    font-weight: 600;
    letter-spacing: 0.05em;
    text-transform: uppercase;
  }

  #blur-overlay .coming-badge i {
    font-size: 0.5rem;
    color: #fbbf24;
  }

  /* ── MESSAGES (tetap ada tapi di-blur) ── */
  .msg-row {
    display: flex; gap: 9px; align-items: flex-end;
    animation: msgIn .22s cubic-bezier(.34,1.56,.64,1);
    contain: layout style;
  }
  @keyframes msgIn {
    from { opacity:0; transform:translateY(10px) scale(0.97); }
    to   { opacity:1; transform:translateY(0) scale(1); }
  }
  .msg-row.user { flex-direction: row-reverse; }

  .msg-icon {
    width: 30px; height: 30px;
    border-radius: 9px;
    display: flex; align-items: center; justify-content: center;
    flex-shrink: 0; font-size: 0.73rem;
    align-self: flex-end;
  }
  .msg-icon.ai-ic {
    background: linear-gradient(135deg, #5b54e8, #8644d8);
    color: #fff;
    box-shadow: 0 2px 8px rgba(108,99,255,0.25);
  }
  .msg-icon.user-ic {
    background: rgba(255,255,255,0.05);
    border: 1px solid rgba(255,255,255,0.08);
    color: var(--muted2);
  }

  .msg-col {
    display: flex; flex-direction: column;
    flex: 1; min-width: 0;
  }
  .msg-row.user .msg-col { align-items: flex-end; }
  .msg-row.ai  .msg-col { align-items: flex-start; }

  .msg-bubble {
    max-width: min(88%, 720px);
    width: fit-content;
    padding: 11px 15px;
    border-radius: 16px;
    font-size: 0.86rem;
    line-height: 1.7;
    word-break: break-word;
    white-space: pre-wrap;
  }
  .msg-row.ai .msg-bubble {
    background: #0e1028;
    border: 1px solid rgba(108,99,255,0.14);
    color: var(--text);
    border-bottom-left-radius: 4px;
    box-shadow: 0 2px 12px rgba(0,0,0,0.3);
  }
  .msg-row.user .msg-bubble {
    background: linear-gradient(135deg, #5b54e8, #8645d9);
    color: #fff;
    border-bottom-right-radius: 4px;
    box-shadow: 0 4px 16px rgba(108,99,255,0.25);
  }
  .msg-time { font-size: 0.63rem; color: var(--muted); margin-top: 4px; padding: 0 3px; }

  /* ── DATE SEP ── */
  .date-sep {
    display: flex; align-items: center; gap: 10px;
    font-size: 0.65rem; color: var(--muted);
    text-transform: uppercase; letter-spacing: 0.08em;
    margin: 4px 0; user-select: none;
  }
  .date-sep::before, .date-sep::after {
    content:''; flex:1; height:1px;
    background: rgba(255,255,255,0.05);
  }

  /* ── EMPTY STATE (di-blur juga) ── */
  #empty-state {
    display: flex; flex-direction: column;
    align-items: center; justify-content: center;
    flex: 1; text-align: center;
    gap: 0; padding: 20px 20px 30px;
    pointer-events: none;
  }
  .es-greeting {
    display: flex; align-items: center; gap: 10px;
    padding: 10px 18px; margin-bottom: 28px;
    background: rgba(108,99,255,0.07);
    border: 1px solid rgba(108,99,255,0.16);
    border-radius: 12px;
    font-size: 0.82rem; color: var(--muted2);
    pointer-events: none;
    animation: msgIn .35s ease;
  }
  .es-greeting .g-icon {
    width: 28px; height: 28px; border-radius: 8px;
    background: rgba(108,99,255,0.14);
    display: flex; align-items: center; justify-content: center;
    flex-shrink: 0;
  }
  .es-greeting .g-icon i { font-size: 0.72rem; color: #a78bfa; }
  .es-greeting strong { color: rgba(255,255,255,0.85); }

  .empty-icon {
    width: 68px; height: 68px; border-radius: 20px;
    background: rgba(108,99,255,0.09);
    border: 1px solid rgba(108,99,255,0.2);
    display: flex; align-items: center; justify-content: center;
    animation: floatIt 3.5s ease-in-out infinite;
    margin-bottom: 14px;
  }
  .empty-icon i { font-size: 1.7rem; color: #8b7ff5; }
  @keyframes floatIt {
    0%,100%{ transform:translateY(0); }
    50%    { transform:translateY(-7px); }
  }
  #empty-state h4 { margin:0 0 6px; font-size:.97rem; font-weight:700; color:rgba(255,255,255,0.75); }
  #empty-state p  { margin:0 0 18px; font-size:.8rem; color:var(--muted2); max-width:280px; line-height:1.65; }

  .chips { display: flex; flex-wrap: wrap; gap: 7px; justify-content: center; pointer-events: all; }
  .chip {
    display: flex; align-items: center; gap: 6px;
    padding: 7px 14px; border-radius: 9999px;
    background: rgba(108,99,255,0.07);
    border: 1px solid rgba(108,99,255,0.18);
    color: rgba(255,255,255,0.55);
    font-size: 0.75rem; font-weight: 600;
    cursor: pointer; transition: all 0.17s ease;
    font-family: var(--font);
  }
  .chip:hover {
    background: rgba(108,99,255,0.2);
    color: rgba(255,255,255,0.9);
    border-color: rgba(108,99,255,0.4);
    transform: translateY(-1px);
    box-shadow: 0 4px 14px rgba(108,99,255,0.15);
  }
  .chip:active { transform: translateY(0); }
  .chip i { font-size: 0.67rem; color: #9580ff; }

  /* ── INPUT (tetap ada tapi disabled) ── */
  #ai-input-wrap {
    background: #0c0d1d;
    border: 1px solid var(--border);
    border-top: none;
    border-radius: 0 0 18px 18px;
    position: relative;
  }
  #ai-input-area {
    display: flex; align-items: flex-end;
    gap: 9px; padding: 12px 14px;
    border-top: 1px solid rgba(108,99,255,0.08);
  }
  #pesan {
    flex: 1;
    background: rgba(255,255,255,0.04);
    border: 1.5px solid rgba(255,255,255,0.07);
    border-radius: 12px;
    padding: 10px 14px;
    color: #fff; font-size: 0.855rem;
    font-family: var(--font);
    outline: none; resize: none;
    max-height: 180px; min-height: 42px;
    overflow-y: auto; line-height: 1.6;
    transition: border-color .2s, background .2s, box-shadow .2s;
    opacity: 0.4;
    cursor: not-allowed;
  }
  #pesan::placeholder { color: rgba(255,255,255,0.15); }
  #pesan:focus {
    border-color: rgba(108,99,255,0.2);
    background: rgba(255,255,255,0.02);
    box-shadow: none;
  }
  #pesan::-webkit-scrollbar { width: 3px; }
  #pesan::-webkit-scrollbar-thumb { background: rgba(108,99,255,0.25); border-radius: 3px; }

  #send-btn {
    width: 42px; height: 42px;
    border-radius: 12px;
    background: rgba(108,99,255,0.2);
    border: 1px solid rgba(108,99,255,0.15);
    color: rgba(255,255,255,0.2);
    cursor: not-allowed;
    display: flex; align-items: center; justify-content: center;
    flex-shrink: 0;
    transition: all 0.2s;
    position: relative;
    overflow: hidden;
  }
  #send-btn i { font-size: 0.84rem; }

  #ai-disclaimer {
    padding: 7px 16px 10px;
    text-align: center;
    font-size: 0.66rem;
    color: rgba(255,255,255,0.15);
    line-height: 1.55;
  }
  #ai-disclaimer i { font-size: 0.6rem; margin-right: 3px; opacity: .65; }

  /* ── RESPONSIVE ── */
  @media (max-width: 640px) {
    #ai-wrap { height: calc(100vh - 60px); }
    .msg-bubble { max-width: 90%; font-size: .84rem; }
    #ai-header { padding: 12px 13px; border-radius: 13px 13px 0 0; }
    #ai-input-wrap { border-radius: 0 0 13px 13px; }
    .chip { font-size: .71rem; padding: 5px 10px; }
    #pesan { font-size: 0.82rem; }
    #blur-overlay h2 { font-size: 1.2rem; }
    #blur-overlay .lock-icon { width: 50px; height: 50px; }
    #blur-overlay .lock-icon i { font-size: 1.4rem; }
  }
</style>

<div id="ai-wrap">

  {{-- HEADER --}}
  <div id="ai-header">
    <div class="ai-avatar">
      <i class="fa-solid fa-robot"></i>
    </div>
    <div class="ai-header-info">
      <h3>AI NexFi</h3>
      <div class="ai-online">
        <span class="online-dot"></span>
        Online &bull; Asisten Keuanganmu
      </div>
    </div>
    <div class="header-actions">
      <button class="ai-header-btn" onclick="alert('AI NexFi sedang dalam masa perbaikan. Mohon bersabar!')" title="Info">
        <i class="fa-solid fa-info-circle"></i>
      </button>
    </div>
  </div>

  {{-- CHAT BOX WITH BLUR OVERLAY --}}
  <div id="chat-box">
    <!-- Empty state (tetap ada, tapi di-blur) -->
    <div id="empty-state">
      <div class="es-greeting">
        <div class="g-icon"><i class="fa-solid fa-hand-point-right"></i></div>
        <div>Halo, <strong>{{ $user->name }}</strong>! Tanya apa saja seputar keuangan dan Nexfi.</div>
      </div>
      <div class="empty-icon"><i class="fa-solid fa-robot"></i></div>
      <h4>Mulai percakapan</h4>
      <p>Tanyakan apa saja tentang keuangan atau cara menggunakan NexFi.</p>
      <div class="chips">
        <button class="chip" onclick="alert('Fitur sedang dalam perbaikan')">
          <i class="fa-solid fa-wallet"></i> Saldo saya
        </button>
        <button class="chip" onclick="alert('Fitur sedang dalam perbaikan')">
          <i class="fa-solid fa-chart-pie"></i> Analisa keuangan
        </button>
        <button class="chip" onclick="alert('Fitur sedang dalam perbaikan')">
          <i class="fa-solid fa-lightbulb"></i> Tips hemat
        </button>
        <button class="chip" onclick="alert('Fitur sedang dalam perbaikan')">
          <i class="fa-solid fa-book-open"></i> Cara pakai Nexfi
        </button>
      </div>
    </div>

    {{-- BLUR OVERLAY --}}
    <div id="blur-overlay">
      <div class="lock-icon">
        <i class="fa-solid fa-robot"></i>
      </div>
      <div class="coming-badge">
        <i class="fa-solid fa-circle"></i>
        Dalam Perbaikan
      </div>
      <h2>Coming Soon</h2>
      <p>AI Assistant sedang dalam masa perbaikan untuk memberikan pengalaman yang lebih baik</p>
    </div>
  </div>

  {{-- INPUT (disabled) --}}
  <div id="ai-input-wrap">
    <div id="ai-input-area">
      <textarea
        id="pesan" rows="1"
        placeholder="Fitur sedang dalam perbaikan..."
        disabled
      ></textarea>
      <button id="send-btn" disabled>
        <i class="fa-solid fa-paper-plane"></i>
      </button>
    </div>
    <div id="ai-disclaimer">
      <i class="fa-solid fa-triangle-exclamation"></i>
      AI NexFi sedang dalam masa perbaikan. Mohon bersabar menunggu pembaruan berikutnya.
    </div>
  </div>

</div>

<script>
  // Biar ada efek smooth
  console.log('AI NexFi - Coming Soon! 🚀');
</script>

@endsection