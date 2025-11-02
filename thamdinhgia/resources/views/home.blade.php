@extends('layouts.app')

@section('content')
@php
  use Illuminate\Support\Facades\File;

  // HERO background
  $heroUrl = File::exists(public_path('images/hero-big.jpg'))
      ? asset('images/hero-big.jpg')
      : (File::exists(public_path('images/placeholder-hero.jpg'))
          ? asset('images/placeholder-hero.jpg')
          : asset('images/placeholder-hero.svg'));

  // APAC media
  $apacVideo = File::exists(public_path('videos/apac.mp4')) ? asset('videos/apac.mp4') : null;
  $apacMap   = File::exists(public_path('images/apac-map.jpg'))
      ? asset('images/apac-map.jpg')
      : 'https://images.unsplash.com/photo-1549693578-d683be217e58?q=80&w=2400&auto=format&fit=crop';

  $pacificLogo  = File::exists(public_path('images/pacific-logo.png')) ? asset('images/pacific-logo.png') : null;
  $pacificBadge = File::exists(public_path('images/pacific-badge.png')) ? asset('images/pacific-badge.png') : null;
@endphp

<style>
  :root{
    --header-h: var(--header-h,72px);
    --dur: 2200ms;
    --delay: 280ms;
    --brand: #22c681;
    --ink: #e8f3ee;
    --ink-sub: #cfe9dd;
    --bg-deep:#0b1e3a;
  }
  html,body{scroll-behavior:smooth}

  /* ===== HERO TO ===== */
  .hero-full{
    min-height:calc(100vh - var(--header-h));
    background-size:cover;background-position:center;
    position:relative;isolation:isolate;
  }
  .hero-inner{height:100%;display:grid;place-items:center;text-align:center;color:#fff;text-shadow:0 6px 26px rgba(0,0,0,.32)}
  .hero-title{font-weight:800;letter-spacing:.5px}
  .scroll-cue{position:absolute;left:50%;bottom:18px;transform:translateX(-50%);width:46px;height:46px;border-radius:999px;border:1px solid #ffffff66;color:#fff;background:transparent}
  .scroll-cue:hover{transform:translateX(-50%) translateY(-2px)}

  /* ===== APAC SECTION (full viewport, snap dừng ở đây) ===== */
  .apac-hero{
    position:relative;isolation:isolate;
    min-height:calc(100vh - var(--header-h));
    background:var(--bg-deep);
    overflow:hidden;
    scroll-margin-top: var(--header-h); /* click mũi tên sẽ dừng đúng edge */
  }
  .apac-hero .video, .apac-hero .image{
    position:absolute;inset:0;object-fit:cover;opacity:.85;
    filter:contrast(1.06) saturate(1.06) brightness(.9);
  }
  .apac-hero .image{
    width:160%;max-width:none;height:160%;
    transform-origin:70% 35%;
    animation: apacPan var(--dur) cubic-bezier(.25,.7,.2,1) forwards;
  }
  @keyframes apacPan {
    0%  {transform:scale(1) translate(0,0)}
    100%{transform:scale(1.8) translate(-12%, -6%)}
  }

  .apac-hero::after{content:'';position:absolute;inset:0;z-index:1;
    background:radial-gradient(60% 60% at 70% 35%,transparent 0, rgba(11,30,58,.22) 55%, rgba(11,30,58,.55) 85%)}

  .apac-hero .content{
    position:relative;z-index:2;max-width:1100px;margin:0 auto;
    padding:clamp(40px,6vw,72px) 20px 28px;text-align:center;color:var(--ink);
  }
  .apac-hero .logo-in{
    width:52px;height:52px;border-radius:14px;background:#0f2750;border:1px solid #20427c;
    display:inline-grid;place-items:center;margin-bottom:12px;
    box-shadow:0 10px 30px #102a4d80;opacity:0;transform:translateY(6px) scale(.96);
    animation: fadeUp .7s ease forwards; animation-delay: calc(var(--delay));
  }
  .apac-hero .kicker{
    display:inline-flex;align-items:center;gap:8px;font-weight:700;letter-spacing:.08em;
    color:#bfe7d0;text-transform:uppercase;font-size:.85rem;
    background:rgba(255,255,255,.08);border:1px solid rgba(255,255,255,.14);
    padding:8px 12px;border-radius:999px;backdrop-filter:blur(4px);
    opacity:0;transform:translateY(6px);
    animation: fadeUp .7s ease forwards; animation-delay: calc(var(--delay) + 80ms);
  }
  .apac-hero h2{
    margin:12px 0 8px;font-weight:800;line-height:1.08;
    font-size:clamp(28px,3.8vw,46px);color:#c7f0d9;
    opacity:0;transform:translateY(8px);
    animation: fadeUp .8s ease forwards; animation-delay: calc(var(--delay) + 180ms);
  }
  .apac-hero .lead{
    font-size:clamp(16px,2vw,20px);color:#e6efe9cc;
    max-width:920px;margin:0 auto;
    opacity:0;transform:translateY(10px);
    animation: fadeUp .8s ease forwards; animation-delay: calc(var(--delay) + 360ms);
  }
  .apac-hero .underline{
    width:0;height:3px;background:var(--brand);margin:12px auto;border-radius:999px;opacity:.95;
    animation: lineGrow .9s ease forwards; animation-delay: calc(var(--delay) + 420ms);
  }
  @keyframes lineGrow{to{width:min(360px,42vw)}}
  @keyframes fadeUp{to{opacity:1;transform:none}}

  .apac-hero .badge{
    display:inline-flex;align-items:center;gap:10px;margin-top:16px;padding:10px 14px;border-radius:12px;
    background:#102a4d;border:1px solid #1b3c6f;color:#cfe9dd;
    opacity:0;transform:translateY(10px) scale(.98);
    animation: fadeUp .7s ease forwards; animation-delay: calc(var(--delay) + 560ms);
  }
  .apac-hero .badge img{width:22px;height:22px;object-fit:contain}
  .apac-hero .badge a{color:#cfe9dd;text-decoration:none}
  .apac-hero .badge a:hover{color:#fff;text-decoration:underline}

  /* Pulsing dots */
  .apac-dots{position:absolute;inset:0;z-index:2;pointer-events:none}
  .apac-dot{position:absolute;width:10px;height:10px;background:var(--brand);border-radius:999px;
    box-shadow:0 0 0 0 rgba(34,198,129,.7);animation:pulse 1800ms infinite;opacity:0;
    animation-delay: calc(var(--delay) + 600ms);animation-fill-mode:forwards}
  .apac-dot::after{content:'';position:absolute;inset:-6px;border:2px solid #22c68166;border-radius:50%;opacity:.8}
  @keyframes pulse{0%{opacity:1;box-shadow:0 0 0 0 rgba(34,198,129,.55)}70%{box-shadow:0 0 0 14px rgba(34,198,129,0)}100%{box-shadow:0 0 0 0 rgba(34,198,129,0)}}

  /* vị trí dots tương đối vùng Thái Bình Dương */
  .dot-sg{left:58%; top:51%}
  .dot-my{left:55%; top:49%}
  .dot-hk{left:67.5%; top:40%}
  .dot-vn{left:60.5%; top:44%}
  .dot-th{left:58.7%; top:45%}
  .dot-id{left:57%; top:56%}

  @media (prefers-reduced-motion:reduce){
    .apac-hero .image{animation:none;transform:scale(1.3) translate(-6%,-3%)}
    .apac-hero .logo-in,.apac-hero .kicker,.apac-hero h2,.apac-hero .lead,.apac-hero .badge{animation:none;opacity:1;transform:none}
    .apac-hero .underline{animation:none;width:min(360px,42vw)}
    .apac-dot{animation:none;opacity:1}
  }

  /* ===== DỊCH VỤ NỔI BẬT (như cũ) ===== */
  .services-grid{display:grid;gap:1rem;grid-template-columns:repeat(2,minmax(0,1fr))}
  @media(min-width:576px){.services-grid{grid-template-columns:repeat(3,1fr)}}
  @media(min-width:992px){.services-grid{grid-template-columns:repeat(4,1fr)}}
  @media(min-width:1200px){.services-grid{grid-template-columns:repeat(5,1fr)}}
  .service-card{display:flex;gap:12px;align-items:flex-start;border:1px solid #e9f0ea;border-radius:16px;background:#fff;box-shadow:var(--shadow);padding:14px;text-decoration:none;color:#0f172a;transition:transform .2s,box-shadow .2s,border-color .2s}
  .service-card:hover{transform:translateY(-4px);box-shadow:0 16px 44px rgba(30,155,90,.14);border-color:#d7efe2}
  .service-ico{flex:0 0 auto;border-radius:999px;background:#f2fbf6;padding:10px;display:grid;place-items:center;width:42px;height:42px}
  .service-ico svg{width:20px;height:20px;color:#1e9b5a}
  .service-title{font-weight:700}
  .service-desc{color:#63726b;font-size:.92rem;line-height:1.35}
</style>

{{-- ===== 1) BANNER TO ===== --}}
<section class="hero-full" style="background-image:url('{{ $heroUrl }}')">
  <div class="hero-inner">
    <div>
      <h1 class="hero-title">VINAP</h1>
      <p class="hero-sub">Chuyên Nghiệp – Minh Bạch – Chính Xác – Khách Quan</p>
      <a href="#apac-hero" class="btn btn-success mt-3">Khám phá VINAP</a>
    </div>
  </div>
  <button id="scrollCue" class="scroll-cue" aria-label="Cuộn xuống">
    <svg viewBox="0 0 24 24" fill="none"><path d="M6 9l6 6 6-6" stroke="currentColor" stroke-width="2" stroke-linecap="round"/></svg>
  </button>
</section>

{{-- ===== 2) APAC ANIMATION ===== --}}
<section id="apac-hero" class="apac-hero" aria-label="VPC Asia Pacific coverage">
  <div class="map-wrap" aria-hidden="true">
    @if($apacVideo)
      <video class="video" src="{{ $apacVideo }}" autoplay muted playsinline loop></video>
    @endif
    <img class="image" src="{{ $apacMap }}" alt="World map focusing to Asia Pacific">
    <div class="apac-dots">
      <span class="apac-dot dot-my"></span>
      <span class="apac-dot dot-sg" style="animation-delay: calc(var(--delay) + 750ms)"></span>
      <span class="apac-dot dot-hk" style="animation-delay: calc(var(--delay) + 900ms)"></span>
      <span class="apac-dot dot-vn" style="animation-delay: calc(var(--delay) + 1050ms)"></span>
      <span class="apac-dot dot-th" style="animation-delay: calc(var(--delay) + 1200ms)"></span>
      <span class="apac-dot dot-id" style="animation-delay: calc(var(--delay) + 1350ms)"></span>
    </div>
  </div>
  <div class="content">
    <div class="logo-in">@if($pacificLogo)<img src="{{ $pacificLogo }}" alt="VPC">@endif</div>
    <div class="kicker">VPC Pacific Asia</div>
    <h2>Thành viên của Mạng lưới <span style="color:var(--brand)">VPC Asia Pacific</span></h2>
    <div class="underline"></div>
    <p class="lead">
      VINAP là thành viên chính thức của <strong>VPC Asia Pacific Group</strong> — mạng lưới tư vấn và thẩm định giá quốc tế
      với văn phòng tại <em>Malaysia, Singapore, Hong Kong, Vietnam, Thailand, Indonesia</em>…
      <span class="d-block mt-1" style="color:var(--ink-sub); font-style:italic;">VINAP proudly represents Vietnam in the VPC Asia Pacific professional valuation network.</span>
    </p>
    <div class="badge">
      @if($pacificBadge)<img src="{{ $pacificBadge }}" alt="vpc">@endif
      <a href="http://www.vpcasiapacific.com/" target="_blank" rel="noopener">VPC Asia Pacific Coverage</a>
    </div>
  </div>
</section>

{{-- ===== 3) DỊCH VỤ NỔI BẬT ===== --}}
<section id="info-start" class="container my-5" data-animate>
  <div class="section-title mb-3">Dịch vụ nổi bật</div>
  <div class="services-grid">
    @php
      $iconMap = ['thẩm định'=>'home','đấu giá'=>'briefcase','chuyển'=>'gear','tư vấn đầu tư'=>'chart','bđs'=>'chart','nghiên cứu'=>'map','thị trường'=>'map'];
      $tiles = config('site.home.serviceTiles') ?? [];
    @endphp
    @foreach($tiles as $t)
      @php
        $title = $t['title'] ?? 'Dịch vụ'; $icon = 'home';
        foreach($iconMap as $k=>$i){ if(mb_stripos($title,$k)!==false){ $icon=$i; break; } }
      @endphp
      <a href="#contact" class="service-card">
        <div class="service-ico"><svg><use href="#icon-{{ $icon }}"/></svg></div>
        <div>
          <div class="service-title">{{ $title }}</div>
          <div class="service-desc">{{ $t['desc'] ?? ($t['hint'] ?? 'Giải pháp nhanh, chuẩn, minh bạch') }}</div>
        </div>
      </a>
    @endforeach
  </div>
</section>

{{-- ===== 4) HOẠT ĐỘNG + TIN TỨC + SIDEBAR ===== --}}
<section class="container mb-5">
  <div class="row g-4">
    <div class="col-lg-8">
      <div class="section-title mb-3" data-animate>Hoạt động công ty</div>
      <div class="list-group mb-4">
        @foreach(config('site.home.companyActivities') as $a)
          <div class="list-group-item" data-animate>
            <div class="d-flex gap-3">
              <img src="{{ $a['img'] ?? '/images/placeholder-thumb.svg' }}" alt=""
                   style="width:84px;height:64px;object-fit:cover;border-radius:10px">
              <div>
                <div class="fw-bold">{{ $a['title'] }}</div>
                <div class="text-muted small">{{ $a['desc'] }}</div>
                <div class="small text-muted mt-1">{{ $a['date'] ?? '' }}</div>
              </div>
            </div>
          </div>
        @endforeach
      </div>

      <div class="section-title mb-3" id="news" data-animate>Tin tức</div>
      <div class="list-group">
        @foreach(config('site.home.news') as $n)
          <div class="list-group-item d-flex justify-content-between align-items-center" data-animate>
            <span>{{ $n['title'] }}</span>
            <span class="text-muted small">{{ $n['date'] }}</span>
          </div>
        @endforeach
      </div>
    </div>

    <aside class="col-lg-4">
      <div class="section-title mb-3" data-animate>Dịch vụ đã thực hiện</div>
      @php $done = config('site.home.deliveredServices')[0] ?? null; @endphp
      @if($done)
      <div class="card-lite p-0 mb-4" data-animate>
        <img src="{{ $done['img'] }}" alt="" class="w-100" style="height:220px;object-fit:cover">
        <div class="p-3">{{ $done['caption'] }}</div>
      </div>
      @endif

      <div class="section-title mb-3" data-animate>Văn bản pháp luật</div>
      <div class="card-lite p-3 mb-4" data-animate>
        <ul class="list-unstyled m-0">
          @foreach(config('site.laws') as $law)
            <li class="mb-2">{{ $law }}</li>
          @endforeach
        </ul>
      </div>

      <div class="section-title mb-3" data-animate>Liên kết web</div>
      <div class="card-lite p-3" data-animate>
        <ul class="list-unstyled m-0">
          @foreach(config('site.links') as $link)
            <li class="mb-2"><a href="{{ $link['href'] }}" class="text-decoration-none" target="_blank" rel="noopener">{{ $link['label'] }}</a></li>
          @endforeach
        </ul>
      </div>
    </aside>
  </div>
</section>

{{-- ===== 5) LIÊN HỆ ===== --}}
<section id="contact" class="container mb-5" data-animate>
  <div class="section-title mb-3">Liên hệ VINAP</div>
  <div class="card-lite p-4">
    <div class="row g-3">
      <div class="col-md-6"><input class="form-control" placeholder="Họ tên"></div>
      <div class="col-md-6"><input class="form-control" placeholder="Số điện thoại"></div>
      <div class="col-12"><input class="form-control" placeholder="Nội dung cần thẩm định"></div>
      <div class="col-12"><button class="btn btn-success">Gửi yêu cầu</button></div>
    </div>
    <div class="small text-muted mt-2">Form minh họa, không lưu dữ liệu.</div>
  </div>
</section>

<script>
  // Cuộn từ banner xuống APAC và khóa overshoot một nhịp
  (function(){
    const banner = document.querySelector('.hero-full');
    const apac   = document.getElementById('apac-hero');
    const cue    = document.getElementById('scrollCue');

    const goApac = ()=>{
      apac.scrollIntoView({behavior:'smooth', block:'start'});
      const stop = e => e.preventDefault();
      window.addEventListener('wheel', stop, {passive:false});
      setTimeout(()=>window.removeEventListener('wheel', stop), 700);
    };

    cue?.addEventListener('click', e => { e.preventDefault(); goApac(); });
    banner?.addEventListener('wheel', e=>{
      if(e.deltaY>0){ e.preventDefault(); goApac(); }
    }, {passive:false});
    banner?.addEventListener('keydown', e=>{
      if(['PageDown',' ','Spacebar','ArrowDown'].includes(e.key)){ e.preventDefault(); goApac(); }
    });
  })();
</script>
@endsection
