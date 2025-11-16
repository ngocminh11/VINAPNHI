@extends('layouts.app')

@section('content')
@php
  use Illuminate\Support\Facades\File;

  // HERO background
  $heroUrl = File::exists(public_path('image/banner.jpg'))
      ? asset('image/banner.jpg')
      : (File::exists(public_path('images/banner.jpg'))
          ? asset('images/banner.jpg')
          : asset('images/placeholder-hero.svg'));

  // APAC background map (1536x1024)
  $apacMap = File::exists(public_path('image/world.png'))
      ? asset('image/world.png')
      : 'https://images.unsplash.com/photo-1549693578-d683be217e58?q=80&w=2400&auto=format&fit=crop';

  // VPC logo
  $vpcLogo = File::exists(public_path('image/VPC_web-300x198.jpg'))
      ? asset('image/VPC_web-300x198.jpg')
      : null;

  $tiles = config('site.home.serviceTiles') ?? [];
  $laws  = config('site.laws') ?? [];
  $links = config('site.links') ?? [];
@endphp

<style>
  :root{
    --header-h:72px;
    --brand:#22c681;
  }
  html,body{scroll-behavior:smooth}

  /* ================= HERO SLIDER ================= */
  .hero-slider{position:relative; isolation:isolate;}
  .hero-viewport{
    position:relative; overflow:hidden;
    min-height:calc(100vh - var(--header-h));
  }
  .hero-track{
    display:flex; width:100%; height:100%;
    transition:transform .55s cubic-bezier(.22,.8,.3,1);
  }
  .hero-slide{
    position:relative; flex:0 0 100%; height:calc(100vh - var(--header-h));
    display:flex; align-items:center; justify-content:center;
    color:#fff; text-align:center; text-shadow:0 4px 18px rgba(0,0,0,.35);
  }
  .hero-bg{
    position:absolute; inset:0; z-index:0;
    background-position:center; background-size:cover; background-repeat:no-repeat;
  }
  .hero-overlay{position:absolute; inset:0; z-index:0; background:linear-gradient(180deg,rgba(0,0,0,.25),rgba(0,0,0,.45))}
  .hero-content{position:relative; z-index:1; padding:0 16px; max-width:1000px}
  .hero-title{font-weight:900; font-size:clamp(40px,6vw,82px); letter-spacing:.3px}
  .hero-sub{opacity:.95}

  /* Slide 2: APAC focus */
  .hero-bg.apac{
    background-image:url('{{ $apacMap }}');
    background-position:80% 55%; /* focus APAC theo 1536x1024 */
    filter:brightness(.86) saturate(1.1);
  }
  .hero-overlay.apac{background:linear-gradient(180deg,rgba(0,0,0,.12),rgba(11,30,58,.65))}
  .apac-logo{display:flex; justify-content:center; margin-bottom:14px}
  .apac-logo img{width:150px; height:auto; object-fit:contain; border-radius:10px; box-shadow:0 6px 16px rgba(0,0,0,.28)}
  .apac-kicker{
    display:inline-block; margin-top:6px;
    font-weight:800; letter-spacing:.12em; text-transform:uppercase;
    color:#d7ffee; font-size:.86rem;
    padding:6px 12px; border-radius:999px;
    background:rgba(255,255,255,.08); border:1px solid rgba(255,255,255,.12);
  }
  .apac-title{margin:14px 0 12px; font-weight:900; line-height:1.12; color:#dff9ee; font-size:clamp(28px,3.2vw,46px)}
  .apac-underline{width:120px; height:3px; border-radius:999px; margin:0 auto 16px; background:var(--brand)}
  .apac-lead{color:#e6efe9cc; font-size:clamp(15px,1.3vw,19px); line-height:1.6; margin-bottom:20px}
  .apac-badge{display:inline-flex; align-items:center; gap:10px; padding:10px 16px; border-radius:10px; background:#102a4d; border:1px solid #1b3c6f; color:#cfe9dd}
  .apac-badge a{color:inherit; text-decoration:none}
  .apac-badge a:hover{color:#fff; text-decoration:underline}

  /* Controls */
  .hero-nav{
    position:absolute; top:50%; transform:translateY(-50%); z-index:3;
    width:40px; height:40px; border-radius:999px; border:1px solid #ffffff66;
    background:rgba(255,255,255,.1); color:#fff; display:grid; place-items:center;
    backdrop-filter:blur(4px); transition:background .2s, transform .2s;
  }
  .hero-nav:hover{background:rgba(255,255,255,.18); transform:translateY(-50%) scale(1.06)}
  .hero-nav.prev{left:14px}
  .hero-nav.next{right:14px}

  .hero-dots{position:absolute; bottom:16px; left:50%; transform:translateX(-50%); display:flex; gap:8px; z-index:3}
  .hero-dots button{width:8px; height:8px; border-radius:999px; background:#ffffff55; border:0}
  .hero-dots button[aria-current="true"]{background:#fff}

  /* Scroll cue (đưa xuống service strip) */
  .scroll-cue{
    position:absolute; left:50%; bottom:62px; transform:translateX(-50%);
    width:42px; height:42px; border-radius:50%; border:1px solid #fff9;
    background:transparent; color:#fff; display:grid; place-items:center; z-index:3;
  }
  .scroll-cue:hover{transform:translateX(-50%) translateY(-2px)}

  /* ================= Services strip ================= */
  .services-grid{display:grid; gap:1rem; grid-template-columns:repeat(2,minmax(0,1fr))}
  @media (min-width:576px){.services-grid{grid-template-columns:repeat(3,1fr)}}
  @media (min-width:992px){.services-grid{grid-template-columns:repeat(4,1fr)}}
  @media (min-width:1200px){.services-grid{grid-template-columns:repeat(5,1fr)}}
  .service-card{
    display:flex; gap:12px; align-items:flex-start;
    border:1px solid #e9f0ea; border-radius:16px; background:#fff;
    box-shadow:0 10px 26px rgba(17,68,43,.10);
    padding:14px; text-decoration:none; color:#0f172a;
    transition:transform .2s, box-shadow .2s, border-color .2s
  }
  .service-card:hover{transform:translateY(-4px); box-shadow:0 16px 44px rgba(30,155,90,.14); border-color:#d7efe2}
  .service-ico{flex:0 0 auto; border-radius:999px; background:#f2fbf6; padding:10px; display:grid; place-items:center; width:42px; height:42px}
  .service-ico svg{width:20px; height:20px; color:#1e9b5a}
  .service-title{font-weight:800}
  .service-desc{color:#63726b; font-size:.92rem; line-height:1.35}
  .list-group-item-action{ transition: transform .15s }
  .list-group-item-action:hover{ transform: translateY(-2px) }
  .list-group-item {
  border: 0;
  border-bottom: 1px solid #e9ecef;
  padding: 12px 16px;
  transition: background-color .15s, transform .15s;
}

.list-group-item:hover {
  background-color: #f8fdf9;
  transform: translateY(-2px);
}

.list-group-item img {
  flex-shrink: 0;
  width: 100px;
  height: 70px;
  object-fit: cover;
  border-radius: 10px;
  box-shadow: 0 4px 12px rgba(0,0,0,0.08);
}

.list-group-item .fw-bold {
  font-weight: 700;
  color: #0f172a;
}

.list-group-item .text-muted.small {
  color: #6c757d !important;
  line-height: 1.4;
}

</style>

{{-- ================= 1) HERO SLIDER (2 slides: VINAP + VPC/APAC) ================= --}}
<section class="hero-slider" aria-label="VINAP hero slider">
  <div class="hero-viewport" id="heroViewport">
    <div class="hero-track" id="heroTrack">
      {{-- Slide 1: VINAP --}}
      <div class="hero-slide" role="group" aria-roledescription="slide" aria-label="1 of 2">
        <div class="hero-bg" style="background-image:url('{{ $heroUrl }}')"></div>
        <div class="hero-overlay"></div>
        <div class="hero-content">
          <h1 class="hero-title">VINAP</h1>
          <p class="hero-sub">Chuyên Nghiệp • Minh Bạch • Chính Xác • Khách Quan</p>
        </div>
      </div>

      {{-- Slide 2: VPC/APAC --}}
      <div class="hero-slide" role="group" aria-roledescription="slide" aria-label="2 of 2">
        <div class="hero-bg apac"></div>
        <div class="hero-overlay apac"></div>
        <div class="hero-content">
          <div class="apac-logo">@if($vpcLogo)<img src="{{ $vpcLogo }}" alt="VPC Logo">@endif</div>
          <div class="apac-kicker">VPC Pacific Asia</div>
          <h2 class="apac-title">Thành viên của Mạng lưới <span style="color:var(--brand)">VPC Asia Pacific</span></h2>
          <div class="apac-underline"></div>
          <p class="apac-lead">
            VINAP là thành viên chính thức của <strong>VPC Asia Pacific Group</strong> — mạng lưới tư vấn và thẩm định giá quốc tế
            với văn phòng tại <em>Malaysia, Singapore, Hong Kong, Vietnam, Thailand, Indonesia</em>.<br>
            <span style="color:#cfe9dd; font-style:italic">
              VINAP proudly represents Vietnam in the VPC Asia Pacific professional valuation network.
            </span>
          </p>
          <div class="apac-badge">
            <a href="http://www.vpcasiapacific.com/" target="_blank" rel="noopener">VPC Asia Pacific Coverage</a>
          </div>
        </div>
      </div>
    </div>

    {{-- Controls --}}
    <button class="hero-nav prev" id="heroPrev" aria-label="Slide trước">
      <svg viewBox="0 0 24 24" width="18" height="18"><path d="M15 18l-6-6 6-6" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"/></svg>
    </button>
    <button class="hero-nav next" id="heroNext" aria-label="Slide sau">
      <svg viewBox="0 0 24 24" width="18" height="18"><path d="M9 6l6 6-6 6" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"/></svg>
    </button>

    <div class="hero-dots" id="heroDots" role="tablist" aria-label="Slide indicators"></div>

    {{-- Scroll cue xuống service strip --}}
    <button id="scrollCue" class="scroll-cue" aria-label="Cuộn xuống">
      <svg viewBox="0 0 24 24" fill="none" width="22" height="22"><path d="M6 9l6 6 6-6" stroke="currentColor" stroke-width="2" stroke-linecap="round"/></svg>
    </button>
  </div>
</section>

{{-- ================= 2) DỊCH VỤ NỔI BẬT ================= --}}
@include('partials.service-strip', [
  'tiles' => config('site.home.serviceTiles')
])

{{-- ================= 3) HOẠT ĐỘNG + TIN TỨC + SIDEBAR ================= --}}
<section class="container mb-5">
  <div class="row g-4">
    <div class="col-lg-8">
      <div class="section-title mb-3">Hoạt động công ty</div>

      @php
        $actImg = function(array $a){
            $fallback = asset('images/placeholder-thumb.svg');
            $title = mb_strtoupper($a['title'] ?? '');
            if (str_contains($title,'VĂN HÓA') && File::exists(public_path('image/xaydung.jpg'))) return asset('image/xaydung.jpg');
            if (str_contains($title,'CHIẾN LƯỢC') && File::exists(public_path('image/chienluoc.jpg'))) return asset('image/chienluoc.jpg');
            if (str_contains($title,'TẠO DỰNG') && File::exists(public_path('image/taodung.jpg'))) return asset('image/taodung.jpg');
            if (str_contains($title,'THẮNG THẾ') && File::exists(public_path('image/thangthe.jpg'))) return asset('image/thangthe.jpg');
            return $a['img'] ?? $fallback;
        };
      @endphp

      <div class="list-group mb-4">
        @foreach((array) config('site.home.companyActivities') as $a)
          @php
            $img = $actImg($a);
            $href = !empty($a['route']) ? route($a['route']) : ($a['url'] ?? '#');
          @endphp
          <a href="{{ $href }}" class="list-group-item list-group-item-action">
            <div class="d-flex gap-3 align-items-start">
              <img src="{{ $img }}" alt="" style="width:84px;height:64px;object-fit:cover;border-radius:10px">
              <div>
                <div class="fw-bold">{{ $a['title'] }}</div>
                <div class="text-muted small">{{ $a['desc'] ?? '' }}</div>
                <div class="small text-muted mt-1">{{ $a['date'] ?? '' }}</div>
              </div>
            </div>
          </a>
        @endforeach
      </div>
      <div class="section-title mb-3" id="news">Tin tức</div>
      <div class="list-group">
        @foreach(config('site.home.news') as $n)
          <div class="list-group-item d-flex justify-content-between align-items-center">
            <span>{{ $n['title'] }}</span>
            <span class="text-muted small">{{ $n['date'] }}</span>
          </div>
        @endforeach
      </div>
    </div>

    <aside class="col-lg-4">
      <div class="sticky-top" style="top:calc(var(--header-h) + 20px);">
        @php $sd = config('site.home.deliveredServices')[0] ?? null; @endphp
        @include('partials.delivered-strip')

        <div class="section-title mb-2" data-animate>Văn bản pháp luật</div>
        <div class="card-lite p-3 mb-4" data-animate>
          <ul class="list-unstyled m-0">
            @foreach($laws as $law)
              @php $label=is_array($law)?($law['label']??'Tài liệu'):$law; $href=is_array($law)?($law['href']??'#'):'#'; @endphp
              <li class="mb-2"><a href="{{ $href }}" target="_blank" rel="noopener" class="text-decoration-none text-success">{{ $label }}</a></li>
            @endforeach
          </ul>
        </div>

        <div class="section-title mb-2" data-animate>Liên kết web</div>
        <div class="card-lite p-3" data-animate>
          <ul class="list-unstyled m-0">
            @foreach($links as $link)
              @php $lLabel=$link['label']??'Link'; $lHref=$link['href']??'#'; @endphp
              <li class="mb-2"><a href="{{ $lHref }}" class="text-decoration-none text-success" target="_blank" rel="noopener">{{ $lLabel }}</a></li>
            @endforeach
          </ul>
        </div>
      </div>
    </aside>
  </div>
</section>

{{-- ================= 4) LIÊN HỆ ================= --}}
<section id="contact" class="container mb-5">
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
(function(){
  // Slider state
  const track = document.getElementById('heroTrack');
  const dotsWrap = document.getElementById('heroDots');
  const prev = document.getElementById('heroPrev');
  const next = document.getElementById('heroNext');
  const slides = [...track.children];
  const N = slides.length;
  let i = 0, timer = null, hover = false;

  // build dots
  for(let k=0;k<N;k++){
    const b = document.createElement('button');
    b.type = 'button';
    b.addEventListener('click', ()=> set(k));
    dotsWrap.appendChild(b);
  }

  function set(idx){
    i = (idx + N) % N;
    track.style.transform = `translateX(${-i*100}%)`;
    [...dotsWrap.children].forEach((b,k)=> b.setAttribute('aria-current', k===i ? 'true':'false'));
  }

  const step = d => set(i + d);
  prev.addEventListener('click', ()=> step(-1));
  next.addEventListener('click', ()=> step(1));

  // autoplay
  const play = ()=> timer = setInterval(()=> { if(!hover) step(1); }, 5000);
  const stop = ()=> { if(timer) clearInterval(timer); timer = null; };
  const viewport = document.getElementById('heroViewport');
  viewport.addEventListener('mouseenter', ()=> hover = true);
  viewport.addEventListener('mouseleave', ()=> hover = false);
  document.addEventListener('visibilitychange', ()=> document.hidden ? stop() : play());

  // swipe
  let sx = null;
  viewport.addEventListener('touchstart', e=> sx = e.touches[0].clientX, {passive:true});
  viewport.addEventListener('touchend', e=>{
    if(sx===null) return;
    const dx = e.changedTouches[0].clientX - sx;
    if(Math.abs(dx) > 40) step(dx<0 ? 1 : -1);
    sx = null;
  }, {passive:true});

  set(0); play();

  // scroll cue -> service strip
  const cue = document.getElementById('scrollCue');
  const target = document.getElementById('info-start');
  cue?.addEventListener('click', e => {
    e.preventDefault();
    target?.scrollIntoView({behavior:'smooth', block:'start'});
  });
})();
</script>
@endsection
