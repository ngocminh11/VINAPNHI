<!doctype html>
<html lang="vi">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>VINAP · Chuyên Nghiệp - Minh Bạch - Chính Xác - Khách Quan</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    :root{
      --green:#1e9b5a; --green-2:#137c47; --text:#0c0f0e;
      --radius:16px; --shadow:0 10px 26px rgba(17,68,43,.10);
      --header-h:76px;
    }
    html{ scroll-behavior:smooth; scroll-padding-top: calc(var(--header-h) + 8px); font-size:20px }
    [id]{ scroll-margin-top: calc(var(--header-h) + 8px) }
    body{ color:var(--text); background:#fff; overflow-x:hidden }

    /* ===== Header ===== */
    .hdr{ position:sticky; top:0; z-index:1100; backdrop-filter:saturate(130%) blur(10px);
      background:rgba(255,255,255,.88); border-bottom:1px solid rgba(30,155,90,.10);
      transition:box-shadow .25s, background .25s }
    .hdr.scrolled{ background:rgba(255,255,255,.97); box-shadow:0 6px 18px rgba(0,0,0,.06) }
    .brand-wrap{ display:flex; align-items:center; gap:.7rem; text-decoration:none; white-space:nowrap }
    .brand-mark{ width:30px; height:30px; border-radius:10px;
      background:radial-gradient(120% 120% at 20% 15%, #3de793 0%, var(--green) 45%, #0f5d3a 100%);
      box-shadow:0 4px 10px rgba(30,155,90,.22), inset 0 1px 0 rgba(255,255,255,.35) }
    .brand-name{ font-weight:800; color:var(--green); line-height:1 }
    .brand-tag{ font-size:.9rem; color:#456053 }
    .navdesk{ flex:1; display:flex; justify-content:center; gap:.4rem; white-space:nowrap }
    .navdesk a{ position:relative; padding:.5rem .7rem; border-radius:10px; font-weight:750; color:#102019; text-decoration:none; transition: color .18s, background .18s, transform .18s }
    .navdesk a:hover{ color:var(--green); background:#f6fbf8; transform:translateY(-1px) }
    .navdesk a.active{ color:var(--green) }
    .navbtn{ display:inline-flex; width:42px; height:42px; border:1px solid #e2efe7; border-radius:12px; background:#fff }
    .hamb{ position:relative; width:22px; height:14px }
    .hamb span{ position:absolute; left:0; width:100%; height:2px; background:#1b2a23; transition: transform .25s, opacity .2s, top .25s }
    .hamb span:nth-child(1){ top:0 } .hamb span:nth-child(2){ top:6px } .hamb span:nth-child(3){ top:12px }
    .navbtn[aria-expanded="true"] .hamb span:nth-child(1){ top:6px; transform:rotate(45deg) }
    .navbtn[aria-expanded="true"] .hamb span:nth-child(2){ opacity:0 }
    .navbtn[aria-expanded="true"] .hamb span:nth-child(3){ top:6px; transform:rotate(-45deg) }
    .navmob{ position:fixed; inset: calc(var(--header-h)) 0 0 0; background:rgba(255,255,255,.98);
      transform:translateY(-6%); opacity:0; pointer-events:none; transition:transform .25s, opacity .25s; border-top:1px solid #e0eee6 }
    .navmob.show{ transform:none; opacity:1; pointer-events:auto }
    .navmob a{ display:block; padding:1rem 1.25rem; font-weight:700; color:#0c0f0e; text-decoration:none; border-bottom:1px solid #edf4ef }
    .navshade{ position:fixed; inset:0; background:rgba(0,0,0,.25); opacity:0; pointer-events:none; transition:opacity .25s }
    .navshade.show{ opacity:1; pointer-events:auto }

    /* ===== Hero ===== */
    .hero-full{ position:relative; min-height: calc(100dvh - var(--header-h));
      background:center/cover no-repeat; color:#fff; text-align:center;
      display:flex; align-items:center; justify-content:center; text-shadow:0 2px 10px rgba(0,0,0,.4) }
    .hero-full::before{ content:""; position:absolute; inset:0; background:linear-gradient(180deg, rgba(0,0,0,.25), rgba(0,0,0,.55)) }
    .hero-inner{ position:relative; z-index:2; padding:0 16px }
    .hero-title{ font-size:clamp(42px,6vw,82px); font-weight:900; line-height:1.05 }
    .scroll-cue{ position:absolute; left:50%; bottom:18px; transform:translateX(-50%);
      width:40px; height:40px; border-radius:999px; border:2px solid rgba(255,255,255,.9);
      display:grid; place-items:center; animation:cue 1.6s ease-in-out infinite }
    @keyframes cue{ 0%,100%{ transform:translate(-50%,0) } 50%{ transform:translate(-50%,8px) } }
/* === Services refined === */
:root{
  --svc-r:18px;
  --svc-border:linear-gradient(180deg,#ecf7f1,#dcefe7);
  --svc-soft:0 10px 28px rgba(16,123,79,.08);
  --svc-soft-lg:0 16px 44px rgba(16,123,79,.14);
}

.svc-grid{
  display:grid;
  gap:20px;
  grid-template-columns:repeat(auto-fit,minmax(240px,1fr));
}

.svc-card2{
  position:relative;
  display:grid;
  grid-template-columns:auto 1fr auto;
  align-items:start;
  gap:14px;
  padding:18px;
  min-height:150px;

  border:1px solid transparent;
  border-radius:var(--svc-r);
  background:
    linear-gradient(#fff,#fff) padding-box,
    var(--svc-border) border-box;
  box-shadow:var(--svc-soft);

  color:#0f1f19;
  text-decoration:none;
  transition:transform .18s ease, box-shadow .18s ease, border-color .18s ease;
}

.svc-card2:hover{ transform:translateY(-3px); box-shadow:var(--svc-soft-lg); }
.svc-card2:focus-visible{ outline:3px solid #bfe8d3; outline-offset:2px; }

.svc-icon{
  width:52px; height:52px; border-radius:999px;
  display:grid; place-items:center;
  background:radial-gradient(circle at 30% 30%, #dcf6ea, #c7eedf);
  border:1px solid #e4f3ec;
  box-shadow:inset 0 -8px 18px rgba(34,198,129,.08);
}

.svc-icon .i{ width:22px; height:22px; color:#1e9b5a; }

.svc-body{ display:block; }
.svc-title{
  display:block;
  font-weight:800;
  font-size:clamp(16px,1.1vw,18px);
  line-height:1.25;
  margin-top:2px;
  text-wrap:balance;
}
.svc-desc{
  display:block;
  color:#66756f;
  font-size:.95rem;
  line-height:1.35;
  margin-top:6px;
}

.svc-cta{
  align-self:center;
  width:34px; height:34px; border-radius:999px;
  display:grid; place-items:center;
  border:1px solid #e1efe8;
  background:#fff;
  color:#0f7751;
  box-shadow:0 6px 16px rgba(16,123,79,.1);
  transition:transform .18s ease, background .18s, color .18s;
}
.svc-card2:hover .svc-cta{ transform:translateX(2px); background:#0f7751; color:#fff; }

    /* ===== Sections & cards ===== */
    .section-title{ font-weight:900; position:relative; padding-left:16px; margin-bottom:1rem }
    .section-title::before{ content:""; position:absolute; left:0; top:6px; width:6px; height:70%;
      background:linear-gradient(180deg,var(--green),#49e08d); border-radius:3px }
    .card-lite{ background:#fff; border:1px solid #e9f0ea; border-radius:var(--radius); box-shadow:var(--shadow);
      transition: transform .25s, box-shadow .25s, border-color .25s }
    .card-lite:hover{ transform: translateY(-6px); box-shadow:0 16px 44px rgba(30,155,90,.16); border-color:#d7efe2 }

    /* Reveal */
    [data-animate]{ opacity:0; transform: translateY(40px); transition: all .8s cubic-bezier(.22,.8,.32,1) }
    [data-animate].show{ opacity:1; transform:none }
    .stagger > *{ opacity:0; transform: translateY(16px) }
    .stagger.show > *{ opacity:1; transform:none; transition: all .7s cubic-bezier(.22,.8,.32,1) }
    .stagger.show > *:nth-child(1){ transition-delay:.05s } .stagger.show > *:nth-child(2){ transition-delay:.12s } .stagger.show > *:nth-child(3){ transition-delay:.18s } .stagger.show > *:nth-child(4){ transition-delay:.24s } .stagger.show > *:nth-child(5){ transition-delay:.30s }

    /* Sticky sidebar helper */
    .sticky-aside{ position: sticky; top: calc(var(--header-h) + 16px); }
    @media (max-width: 991px){ .sticky-aside{ position: static; } }

    /* Featured services (giữ 1 định nghĩa duy nhất) */
    .services-grid{ display:grid; gap:1rem; grid-template-columns:repeat(2,minmax(0,1fr)) }
    @media(min-width:576px){ .services-grid{ grid-template-columns:repeat(3,1fr) } }
    @media(min-width:992px){ .services-grid{ grid-template-columns:repeat(4,1fr) } }
    @media(min-width:1200px){ .services-grid{ grid-template-columns:repeat(5,1fr) } }
    .svc-card{ display:flex; height:100%; align-items:stretch; border:1px solid #e9f0ea; border-radius:16px; background:#fff; box-shadow:var(--shadow);
      transition: transform .2s ease, box-shadow .2s ease, border-color .2s ease; }
    .svc-card:hover{ transform: translateY(-4px); box-shadow:0 16px 44px rgba(30,155,90,.14); border-color:#d7efe2; }
    .svc-card .icon-wrap{ flex:0 0 auto; border-radius:999px; background:#f2fbf6; padding:12px; display:grid; place-items:center; width:48px; height:48px }
    .svc-card .i{ width:22px; height:22px; color:#1e9b5a }
    .svc-card .desc{ color:#63726b; font-size:.92rem; line-height:1.35 }

    /* Footer */
    .i{ width:20px; height:20px; color:var(--green); vertical-align:-3px; margin-right:8px }
    .footer{ background:#edf8f1; border-top:1px solid #dbece3; padding:2.2rem 0 }
    .footer .meta{ color:#3b4a40; font-size:.95rem }
    .footer .grid{ display:grid; gap:1rem; align-items:start }
    @media (min-width:768px){ .footer .grid{ grid-template-columns:1fr 1fr 1fr } }
    .footer .item{ display:flex; align-items:flex-start; gap:.75rem }
    .footer .small-note{ color:#5a6a60; font-size:.9rem }

    /* Responsive */
    @media (max-width:1200px){ .brand-tag{ display:none } }
    @media (max-width:991px){ .navdesk{ display:none!important } }
    @media (min-width:992px){ .navbtn{ display:none } }
  </style>
</head>
<body>

<!-- SVG sprite -->
<svg width="0" height="0" style="position:absolute;left:-9999px;visibility:hidden">
  <symbol id="icon-home" viewBox="0 0 24 24"><path fill="currentColor" d="M12 3l9 8-1.4 1.4L18 10.2V20h-5v-5H11v5H6v-9.8L4.4 12.4 3 11l9-8z"/></symbol>
  <symbol id="icon-gear" viewBox="0 0 24 24"><path fill="currentColor" d="M12 8a4 4 0 110 8 4 4 0 010-8m8.94 4a7 7 0 00-.2-1.6l2.12-1.65-2-3.46-2.5 1a7.1 7.1 0 00-2.77-1.6L13.9 1h-3.8l-.71 2.69a7.1 7.1 0 00-2.77 1.6l-2.5-1-2 3.46L4.34 8.4A7 7 0 004.14 10l-2.12 1.6 2 3.46 2.5-1a7.1 7.1 0 002.77 1.6L10.1 23h3.8l.71-2.69a7.1 7.1 0 002.77-1.6l2.5 1 2-3.46-2.12-1.6z"/></symbol>
  <symbol id="icon-briefcase" viewBox="0 0 24 24"><path fill="currentColor" d="M10 4h4a2 2 0 012 2v1h3a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9a2 2 0 012-2h3V6a2 2 0 012-2m4 3V6h-4v1h4z"/></symbol>
  <symbol id="icon-chart" viewBox="0 0 24 24"><path fill="currentColor" d="M3 3h2v18H3V3m4 10h2v8H7v-8m4-6h2v14h-2V7m4 4h2v10h-2V11m4-6h2v16h-2V5z"/></symbol>
  <symbol id="icon-map" viewBox="0 0 24 24"><path fill="currentColor" d="M15 19l-6 3l-6-3V5l6 3l6-3l6 3v14l-6-3zM9 8v11l6-3V5l-6 3z"/></symbol>
  <symbol id="icon-phone" viewBox="0 0 24 24"><path fill="currentColor" d="M20 15.5c-1.25 0-2.47-.2-3.61-.57a1 1 0 00-1 .25l-2.2 2.2a15.1 15.1 0 01-6.62-6.62l2.2-2.2a1 1 0 00.25-1c-.36-1.14-.56-2.36-.56-3.62A1 1 0 007.5 2H4a2 2 0 00-2 2 18 18 0 0018 18 2 2 0 002-2v-3.5a1 1 0 00-1-1z"/></symbol>
  <symbol id="icon-mail" viewBox="0 0 24 24"><path fill="currentColor" d="M20 8l-8 5l-8-5V6l8 5l8-5m0-2H4a2 2 0 00-2 2v12a2 2 0 002 2h16a2 2 0 002-2V6a2 2 0 00-2-2z"/></symbol>
</svg>

<header id="header" class="hdr">
  <div class="container py-2 d-flex align-items-center justify-content-between">
    <a href="/" class="brand-wrap">
      <span class="brand-mark" aria-hidden="true"></span>
      <span>
        <div class="brand-name">VINAP</div>
        <div class="brand-tag">Chuyên Nghiệp - Minh Bạch - Chính Xác - Khách Quan</div>
      </span>
    </a>

    <nav class="navdesk">
      @foreach(config('site.nav') as $item)
        <a href="{{ $item['href'] }}" class="{{ url()->current() === url($item['href']) ? 'active' : '' }}">{{ strtoupper($item['label']) }}</a>
      @endforeach
    </nav>

    <button class="navbtn" id="navToggle" aria-label="Mở menu" aria-expanded="false" aria-controls="navmob">
      <span class="hamb" aria-hidden="true"><span></span><span></span><span></span></span>
    </button>
  </div>

  <div class="navshade" id="navshade"></div>
  <div class="navmob" id="navmob" role="dialog" aria-modal="true" aria-label="Menu">
    <div class="container py-2">
      @foreach(config('site.nav') as $item)
        <a href="{{ $item['href'] }}" onclick="closeNav()">{{ strtoupper($item['label']) }}</a>
      @endforeach
      <a href="tel:+84917168816"><strong>Hotline:</strong> (+84) 917 168 816</a>
    </div>
  </div>
</header>

<main id="main">@yield('content')</main>

<footer class="footer">
  <div class="container">
    <div class="text-center fw-bold mb-3">Công ty CP Thẩm định giá & Tư vấn Đầu tư Việt Nam - VINAP</div>
    <div class="grid mb-3">
      <div class="item"><svg class="i"><use href="#icon-map"/></svg>
        <div class="meta">Khu biệt thự Nine South - Nhà số 9, đường số 7, Khu dân cư Vina Nam Phú, Nhà Bè, TP.HCM</div></div>
      <div class="item"><svg class="i"><use href="#icon-phone"/></svg>
        <div class="meta">(+84.028) 3933 0833 · (+84) 917 168 816</div></div>
      <div class="item"><svg class="i"><use href="#icon-mail"/></svg>
        <div class="meta">hanh.tran@vinap.vn · www.vinap.vn</div></div>
    </div>
    <div class="text-center small-note">
      <div>© 2025 VINAP. All rights reserved.</div>
      <div>Thiết kế bởi YenNhi</div>
    </div>
  </div>
</footer>

<script>
  // Header state + CSS var height
  const headerEl = document.getElementById('header');
  const setHH = () => document.documentElement.style.setProperty('--header-h', (headerEl?.offsetHeight || 72) + 'px');
  addEventListener('scroll', ()=> headerEl.classList.toggle('scrolled', scrollY>40));
  addEventListener('load', setHH); addEventListener('resize', setHH); setTimeout(setHH,250);
  visualViewport?.addEventListener?.('resize', setHH);

  // Reveal on view
  const IO = new IntersectionObserver(es=>{
    es.forEach(e=>{ if(e.isIntersecting){ e.target.classList.add('show'); IO.unobserve(e.target); } })
  },{threshold:.15});
  document.querySelectorAll('[data-animate], .stagger').forEach(el=>IO.observe(el));

  // Mobile nav
  const navToggle = document.getElementById('navToggle'),
        navmob   = document.getElementById('navmob'),
        shade    = document.getElementById('navshade');
  function openNav(){ navmob.classList.add('show'); shade.classList.add('show'); navToggle.setAttribute('aria-expanded','true'); document.body.style.overflow='hidden'; setHH(); }
  function closeNav(){ navmob.classList.remove('show'); shade.classList.remove('show'); navToggle.setAttribute('aria-expanded','false'); document.body.style.overflow=''; setHH(); }
  navToggle?.addEventListener('click', ()=> navToggle.getAttribute('aria-expanded')==='true' ? closeNav() : openNav());
  shade?.addEventListener('click', closeNav);

  // ===== Hero snap: Ưu tiên section VPC nếu có =====
  (function () {
    const cue  = document.getElementById('scrollCue');
    const hero = document.querySelector('.hero-full');

    // Ưu tiên: [data-first-snap] -> #apac-hero -> #info-start
    const target =
      document.querySelector('[data-first-snap]') ||
      document.getElementById('apac-hero') ||
      document.getElementById('info-start');

    if (!cue || !hero || !target) return;

    const snap = () => {
      target.scrollIntoView({ behavior:'smooth', block:'start' });
      cleanup();
    };

    // Ẩn cue khi rời hero
    const cueIO = new IntersectionObserver(es=>{
      es.forEach(e=>{
        const vis = e.isIntersecting;
        cue.style.opacity = vis ? 1 : 0;
        cue.style.pointerEvents = vis ? 'auto' : 'none';
      });
    },{threshold:0.1});
    cueIO.observe(hero);

    // Click
    cue.addEventListener('click', e => { e.preventDefault(); snap(); });

    // Kéo lần đầu thì snap, xong tháo listener để khỏi “bật ngược”
    let armed = true, startY = null;
    const arm = () => { armed = window.scrollY < hero.offsetHeight * 0.6; };
    arm(); addEventListener('scroll', arm, { passive: true });

    function onWheel(e){ if(!armed) return; if(e.deltaY > 8){ e.preventDefault(); snap(); armed=false; } }
    function onStart(e){ startY = e.touches?.[0]?.clientY || 0; }
    function onMove(e){ if(!armed) return; const dy = startY - (e.touches?.[0]?.clientY || startY); if(dy > 14){ snap(); armed=false; } }
    function cleanup(){
      window.removeEventListener('wheel', onWheel, { passive:false });
      window.removeEventListener('touchstart', onStart);
      window.removeEventListener('touchmove', onMove);
    }
    window.addEventListener('wheel', onWheel, { passive:false });
    window.addEventListener('touchstart', onStart, { passive:true });
    window.addEventListener('touchmove', onMove, { passive:true });
  })();

  // IMG fallback
  addEventListener('error', function(e){
    const el = e.target;
    if (el.tagName === 'IMG' && el.dataset.fallback && el.src !== location.origin + el.dataset.fallback) {
      el.src = el.dataset.fallback;
    }
  }, true);
</script>

<!-- simple reveal helper for .reveal (nếu trang có dùng) -->
<script>
const observer = new IntersectionObserver((entries) => {
  entries.forEach(entry => {
    if (entry.isIntersecting) {
      entry.target.classList.add('reveal-show');
      observer.unobserve(entry.target);
    }
  });
}, { threshold: 0.15 });
document.querySelectorAll('.reveal').forEach(el => observer.observe(el));
</script>
<style>
.reveal { opacity:0; transform: translateY(40px);
  transition: opacity .9s cubic-bezier(.22,.8,.32,1), transform .9s cubic-bezier(.22,.8,.32,1); }
.reveal-show { opacity:1; transform: none; }
</style>

</body>
</html>
