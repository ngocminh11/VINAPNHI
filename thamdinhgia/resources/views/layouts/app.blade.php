<!doctype html>
<html lang="vi">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>{{ config('site.brand.name') }} · {{ config('site.brand.tagline') }}</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    :root{
      --green:#1e9b5a; --green-2:#137c47; --green-3:#e8f7ef;
      --text:#0c0f0e; --muted:#666; --radius:16px;
      --shadow:0 10px 26px rgba(17,68,43,.10);
      --header-h: 76px; /* cập nhật bằng JS */
    }

    html{ scroll-behavior:smooth; scroll-padding-top: calc(var(--header-h) + 8px); font-size:18px }
    [id]{ scroll-margin-top: calc(var(--header-h) + 8px) }
    body{ color:var(--text); background:#fff; overflow-x:hidden }

    /* ===== HEADER ===== */
    .hdr{
      position:sticky; top:0; z-index:1100;
      backdrop-filter:saturate(130%) blur(10px);
      background:rgba(255,255,255,.88);
      border-bottom:1px solid rgba(30,155,90,.10);
      transition:box-shadow .25s, background .25s, border-color .25s;
    }
    .hdr.scrolled{ background:rgba(255,255,255,.97); box-shadow:0 6px 18px rgba(0,0,0,.06); border-color:rgba(30,155,90,.16) }
    .hdr .container{ gap:1rem } /* giảm “phình” khoảng cách */

    .brand-wrap{ display:flex; align-items:center; gap:.7rem; text-decoration:none; white-space:nowrap }
    .brand-mark{
      width:30px; height:30px; border-radius:10px; flex:0 0 30px;
      background: radial-gradient(120% 120% at 20% 15%, #3de793 0%, var(--green) 45%, #0f5d3a 100%);
      box-shadow:0 4px 10px rgba(30,155,90,.22), inset 0 1px 0 rgba(255,255,255,.35);
    }
    .brand-name{ font-weight:800; letter-spacing:.2px; color:var(--green); line-height:1 }
    .brand-tag{ font-size:.9rem; color:#456053; margin-top:1px }

    .navdesk{ flex:1; display:flex; justify-content:center; align-items:center; gap:.4rem; white-space:nowrap }
    .navdesk a{
      position:relative; display:inline-flex; align-items:center;
      padding:.5rem .7rem; border-radius:10px; font-weight:750;
      color:#102019; text-decoration:none; transition: color .18s, background .18s, transform .18s;
    }
    .navdesk a:hover{ color:var(--green); background:#f6fbf8; transform:translateY(-1px) }
    .navdesk a::after{
      content:""; position:absolute; left:10px; right:10px; bottom:4px; height:2px;
      background:var(--green); border-radius:2px; transform:scaleX(0); transform-origin:center;
      transition:transform .22s;
    }
    .navdesk a.active{ color:var(--green); background:transparent }
    .navdesk a:hover::after, .navdesk a.active::after{ transform:scaleX(1) }

    .hotline{
      display:inline-flex; align-items:center; gap:.45rem;
      padding:.5rem .95rem; border-radius:999px; font-weight:800;
      color:var(--green); background:#fff; border:1.5px solid rgba(30,155,90,.35);
      box-shadow:0 2px 8px rgba(30,155,90,.10);
      transition: color .18s, background .18s, box-shadow .18s, transform .18s, border-color .18s;
      white-space:nowrap;
    }
    .hotline svg{ width:18px; height:18px; color:currentColor }
    .hotline:hover{ color:#fff; background:var(--green); border-color:var(--green); transform:translateY(-1px); box-shadow:0 10px 20px rgba(19,124,71,.22) }

    /* MOBILE NAV */
    .navbtn{ display:inline-flex; align-items:center; justify-content:center; width:42px; height:42px; border-radius:12px; border:1px solid #e2efe7; background:#fff }
    .hamb{ position:relative; width:22px; height:14px }
    .hamb span{ position:absolute; left:0; width:100%; height:2px; background:#1b2a23; transition: transform .25s, opacity .2s, top .25s }
    .hamb span:nth-child(1){ top:0 } .hamb span:nth-child(2){ top:6px } .hamb span:nth-child(3){ top:12px }
    .navbtn[aria-expanded="true"] .hamb span:nth-child(1){ top:6px; transform:rotate(45deg) }
    .navbtn[aria-expanded="true"] .hamb span:nth-child(2){ opacity:0 }
    .navbtn[aria-expanded="true"] .hamb span:nth-child(3){ top:6px; transform:rotate(-45deg) }

    .navmob{ position:fixed; inset: calc(var(--header-h)) 0 0 0; background:rgba(255,255,255,.98); backdrop-filter:blur(8px);
             transform:translateY(-6%); opacity:0; pointer-events:none; transition:transform .25s, opacity .25s; border-top:1px solid #e0eee6 }
    .navmob.show{ transform:none; opacity:1; pointer-events:auto }
    .navmob a{ display:block; padding:1rem 1.25rem; font-weight:700; color:#0c0f0e; text-decoration:none; border-bottom:1px solid #edf4ef }
    .navmob a:active{ background:#f2fbf6 }
    .navshade{ position:fixed; inset:0; background:rgba(0,0,0,.25); opacity:0; pointer-events:none; transition:opacity .25s }
    .navshade.show{ opacity:1; pointer-events:auto }

    /* ===== HERO ===== */
    .hero-full{
      position:relative;
      min-height: calc(100dvh - var(--header-h)); /* FIX: không “dư” so với viewport */
      background:center/cover no-repeat fixed; color:#fff; text-align:center;
      display:flex; align-items:center; justify-content:center; text-shadow:0 2px 10px rgba(0,0,0,.4)
    }
    .hero-full::before{ content:""; position:absolute; inset:0; background:linear-gradient(180deg, rgba(0,0,0,.25), rgba(0,0,0,.55)) }
    .hero-inner{ position:relative; z-index:2; padding:0 16px }
    .hero-title{ font-size:clamp(42px,6vw,82px); font-weight:900; line-height:1.05 }
    .hero-sub{ font-size:clamp(18px,2.2vw,24px); opacity:.95 }

    .scroll-cue{
      position:absolute; left:50%; bottom:18px; transform:translateX(-50%);
      width:40px; height:40px; border-radius:999px; border:2px solid rgba(255,255,255,.9);
      display:grid; place-items:center; cursor:pointer; user-select:none; backdrop-filter:blur(2px);
      animation:cue 1.6s ease-in-out infinite; z-index:3; transition:opacity .2s;
    }
    .scroll-cue svg{ width:18px; height:18px; color:#fff }
    @keyframes cue{ 0%,100%{ transform:translate(-50%,0) } 50%{ transform:translate(-50%,8px) } }

    /* ===== Sections / Cards / Animations ===== */
    .section-title{ font-weight:900; position:relative; padding-left:16px; margin-bottom:1rem }
    .section-title::before{ content:""; position:absolute; left:0; top:6px; width:6px; height:70%; background:linear-gradient(180deg,var(--green),#49e08d); border-radius:3px }
    .card-lite{ background:#fff; border:1px solid #e9f0ea; border-radius:var(--radius); box-shadow:var(--shadow); transition: transform .25s, box-shadow .25s, border-color .25s }
    .card-lite:hover{ transform: translateY(-6px); box-shadow:0 16px 44px rgba(30,155,90,.16); border-color:#d7efe2 }
    [data-animate]{ opacity:0; transform: translateY(40px); transition: all .8s cubic-bezier(.22,.8,.32,1) }
    [data-animate].show{ opacity:1; transform:none }
    .stagger > *{ opacity:0; transform: translateY(16px) }
    .stagger.show > *{ opacity:1; transform:none; transition: all .7s cubic-bezier(.22,.8,.32,1) }
    .stagger.show > *:nth-child(1){ transition-delay:.05s } .stagger.show > *:nth-child(2){ transition-delay:.12s }
    .stagger.show > *:nth-child(3){ transition-delay:.18s } .stagger.show > *:nth-child(4){ transition-delay:.24s }

    .ripple{ position:relative; overflow:hidden }
    .ripple::after{ content:""; position:absolute; left:var(--x,50%); top:var(--y,50%); width:0; height:0; background:rgba(255,255,255,.35); border-radius:50%; transform:translate(-50%,-50%); pointer-events:none; opacity:0 }
    .ripple.is-anim::after{ animation:ripple .6s ease-out }
    @keyframes ripple{ 0%{ width:0; height:0; opacity:.5 } 100%{ width:360px; height:360px; opacity:0 } }

    footer{ background:var(--green-3); border-top:1px solid #dce8e1; padding:2rem 0 }

    @media (max-width:1200px){ .brand-tag{ display:none } .hotline{ display:none } } /* FIX: tránh menu xuống dòng */
    @media (max-width: 991px){ .navdesk{ display:none !important } .hdr .right-tools{ gap:.4rem } }
    @media (min-width: 992px){ .navbtn{ display:none } }
    @media (prefers-reduced-motion:reduce){ *{ transition:none!important; animation:none!important } }

    /* --- Footer fix --- */
.i{ width:20px; height:20px; color:var(--green); vertical-align:-3px; margin-right:8px }
.footer{ background:#edf8f1; border-top:1px solid #dbece3; padding:2.2rem 0 }
.footer .meta{ color:#3b4a40; font-size:.95rem }
.footer .grid{ display:grid; gap:1rem; align-items:start }
@media (min-width:768px){ .footer .grid{ grid-template-columns: 1fr 1fr 1fr } }
.footer .item{ display:flex; align-items:flex-start; gap:.75rem }
.footer .item svg{ flex:0 0 auto }
.footer .small-note{ color:#5a6a60; font-size:.9rem }

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
    <a href="{{ route('home') }}" class="brand-wrap">
      <span class="brand-mark" aria-hidden="true"></span>
      <span>
        <div class="brand-name">{{ config('site.brand.name') }}</div>
        <div class="brand-tag">{{ config('site.brand.tagline') }}</div>
      </span>
    </a>

    <nav class="navdesk">
      @foreach(config('site.menu') as $item)
        @php $href = route($item['route']) . ($item['hash'] ?? ''); @endphp
        <a href="{{ $href }}" class="{{ request()->routeIs($item['route']) ? 'active' : '' }}">
          {{ strtoupper($item['label']) }}
        </a>
      @endforeach
    </nav>

    <div class="right-tools d-flex align-items-center gap-2">
      <a class="hotline d-none d-xl-inline-flex ripple" href="tel:{{ config('site.brand.hotline') }}">
        <svg viewBox="0 0 24 24" fill="none" aria-hidden="true">
          <path d="M6.6 10.8a15.1 15.1 0 006.6 6.6l2.2-2.2a1 1 0 011-.25c1.14.36 2.36.57 3.61.57a1 1 0 011 1V21a2 2 0 01-2 2A18 18 0 013 5a2 2 0 012-2h3.5a1 1 0 011 1c0 1.26.2 2.48.56 3.62a1 1 0 01-.25 1L6.6 10.8z" stroke="currentColor" stroke-width="1.8" fill="none" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>
        {{ config('site.brand.hotline') }}
      </a>

      <button class="navbtn" id="navToggle" aria-label="Mở menu" aria-expanded="false" aria-controls="navmob">
        <span class="hamb" aria-hidden="true"><span></span><span></span><span></span></span>
      </button>
    </div>
  </div>

  <div class="navshade" id="navshade"></div>
  <div class="navmob" id="navmob" role="dialog" aria-modal="true" aria-label="Menu">
    <div class="container py-2">
      @foreach(config('site.menu') as $item)
        @php $href = route($item['route']) . ($item['hash'] ?? ''); @endphp
        <a href="{{ $href }}" onclick="closeNav()">{{ strtoupper($item['label']) }}</a>
      @endforeach
      <a href="tel:{{ config('site.brand.hotline') }}"><strong>Hotline:</strong> {{ config('site.brand.hotline') }}</a>
    </div>
  </div>
</header>

<main id="main">@yield('content')</main>

<footer class="footer">
  <div class="container">
    <div class="text-center fw-bold mb-3">
      {{ config('site.company.full_name') }}
    </div>

    <div class="grid mb-3">
      <div class="item">
        <svg class="i"><use href="#icon-map"/></svg>
        <div class="meta">{{ config('site.company.address') }}</div>
      </div>

      <div class="item">
        <svg class="i"><use href="#icon-phone"/></svg>
        <div class="meta">{{ config('site.company.phone') }}</div>
      </div>

      <div class="item">
        <svg class="i"><use href="#icon-mail"/></svg>
        <div class="meta">{{ config('site.company.email') }} · {{ config('site.company.website') }}</div>
      </div>
    </div>

    <div class="text-center small-note">
      <div>{{ config('site.company.license') }}</div>
      <div>{{ config('site.company.copyright') }}</div>
      <div>{{ config('site.company.footer_note') }}</div>
    </div>
  </div>
</footer>

<script>
  // Header shadow + header height var
  const headerEl = document.getElementById('header');
  const setHH = () => document.documentElement.style.setProperty('--header-h', (headerEl?.offsetHeight || 72) + 'px');
  addEventListener('scroll', ()=> headerEl.classList.toggle('scrolled', scrollY>40));
  addEventListener('load', setHH); addEventListener('resize', setHH); setTimeout(setHH, 250);
  visualViewport?.addEventListener?.('resize', setHH);

  // Reveal
  const IO = new IntersectionObserver(es=>{
    es.forEach(e=>{ if(e.isIntersecting){ e.target.classList.add('show'); IO.unobserve(e.target); } });
  },{threshold:.15});
  document.querySelectorAll('[data-animate], .stagger').forEach(el=>IO.observe(el));

  // Ripple
  document.addEventListener('click', (e)=>{
    const t = e.target.closest('.ripple'); if(!t) return;
    const r = t.getBoundingClientRect(); const x = e.clientX - r.left; const y = e.clientY - r.top;
    t.style.setProperty('--x', x+'px'); t.style.setProperty('--y', y+'px');
    t.classList.remove('is-anim'); void t.offsetWidth; t.classList.add('is-anim');
  });

  // Mobile menu
  const navToggle = document.getElementById('navToggle');
  const navmob = document.getElementById('navmob');
  const shade = document.getElementById('navshade');
  function openNav(){ navmob.classList.add('show'); shade.classList.add('show'); navToggle.setAttribute('aria-expanded','true'); document.body.style.overflow='hidden'; setHH(); }
  function closeNav(){ navmob.classList.remove('show'); shade.classList.remove('show'); navToggle.setAttribute('aria-expanded','false'); document.body.style.overflow=''; setHH(); }
  navToggle?.addEventListener('click', ()=> navToggle.getAttribute('aria-expanded')==='true' ? closeNav() : openNav());
  shade?.addEventListener('click', closeNav);
  addEventListener('keydown', e=>{ if(e.key==='Escape') closeNav(); });

  // Snap + auto-ẩn cue ngoài hero
  (function(){
    const cue = document.getElementById('scrollCue');
    const hero = document.querySelector('.hero-full');
    const target = document.querySelector('#info-start');
    if(!cue || !hero || !target) return;

    const snap = ()=> target.scrollIntoView({ behavior:'smooth', block:'start' });
    cue.addEventListener('click', snap);

    // Ẩn cue khi rời hero (hết hiện “trôi” sang section dưới)
    const CUEIO = new IntersectionObserver(es=>{
      es.forEach(e=>{
        const v = e.isIntersecting;
        cue.style.opacity = v ? 1 : 0;
        cue.style.pointerEvents = v ? 'auto' : 'none';
      });
    },{threshold:0.1});
    CUEIO.observe(hero);

    // Lần kéo đầu tiên từ hero thì snap
    let armed = true, startY = null;
    const arm = ()=> armed = (scrollY < innerHeight*0.6);
    arm(); addEventListener('scroll', arm, { passive:true });
    addEventListener('wheel', e=>{ if(!armed) return; if(e.deltaY>8){ e.preventDefault?.(); snap(); armed=false; } }, { passive:false });
    addEventListener('touchstart', e=> startY = e.touches?.[0]?.clientY ?? 0, { passive:true });
    addEventListener('touchmove', e=>{ if(!armed||startY===null) return; const dy = startY - (e.touches?.[0]?.clientY ?? startY); if(dy>14){ snap(); armed=false; } }, { passive:true });
  })();

  // Fallback ảnh
  addEventListener('error', function(e){
    const el = e.target;
    if (el.tagName === 'IMG' && el.dataset.fallback && el.src !== location.origin + el.dataset.fallback) {
      el.src = el.dataset.fallback;
    }
  }, true);
</script>
</body>
</html>
