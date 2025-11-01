@extends('layouts.app')
@section('title','VINAP • Hồ sơ năng lực')

@section('content')
@php
  use Illuminate\Support\Facades\File;

  // Banner ưu tiên HSNL
  $banner = File::exists(public_path('images/hsnl-banner.jpg'))
      ? asset('images/hsnl-banner.jpg')
      : (File::exists(public_path('images/placeholder-hero.jpg'))
          ? asset('images/placeholder-hero.jpg')
          : 'https://picsum.photos/seed/vinap-capacity/1600/800');

  // Strip dịch vụ (giống Thư ngỏ)
  $featuredServices = [
    ['icon'=>'home','title'=>'Thẩm định giá','url'=>route('services.index')],
    ['icon'=>'briefcase','title'=>'Đấu giá BĐS, tài sản','url'=>route('services.index')],
    ['icon'=>'gear','title'=>'Chuyển nhượng dự án','url'=>route('services.index')],
    ['icon'=>'chart','title'=>'Tư vấn đầu tư - BĐS','url'=>route('services.index')],
    ['icon'=>'map','title'=>'Nghiên cứu thị trường','url'=>route('services.index')],
  ];

  // Dữ liệu từ config/site.php
  $hr   = config('site.capacity.hr')   ?? [];
  $team = config('site.capacity.team') ?? [];

  // Fallback bullets HR (nếu thiếu config)
  $fallbackHr = [
    ['vi'=>'Số nhân viên có trình độ Cao học: 7 người.','en'=>'Master Degree: Seven individuals.'],
    ['vi'=>'Tỷ lệ nhân sự có trình độ Đại học: 100%.','en'=>'University level: One hundred percent.'],
    ['vi'=>'Thẻ Thẩm định viên về giá: 5 người.','en'=>'Valuer Certificate: Five individuals.'],
    ['vi'=>'Chứng chỉ hành nghề đấu giá: 1 người.','en'=>'Auction certificate: One individual.'],
    ['vi'=>'Chứng chỉ môi giới bất động sản: 2 người.','en'=>'Estate Agent Appraisal certificate: Two individuals.'],
    ['vi'=>'Chứng chỉ định giá đất: 9 người.','en'=>'Land valuation certificate: Nine individuals.'],
  ];

  $laws  = config('site.laws')  ?? [];
  $links = config('site.links') ?? [];
  $deliveredServices = config('site.home.deliveredServices') ?? [];
@endphp

<style>
  /* =========== Shared look & feel giống Thư ngỏ =========== */
  .hero-full{position:relative;background-size:cover;background-position:center;border-radius:18px;overflow:hidden}
  .hero-full::after{content:"";position:absolute;inset:0;background:linear-gradient(to top, rgba(0,0,0,.35), rgba(0,0,0,.05))}
  .hero-inner{position:relative;z-index:2;padding:100px 16px;color:#fff}
  .hero-title{font-size:clamp(28px,3.6vw,44px);font-weight:800;letter-spacing:.2px}
  .hero-sub{opacity:.95;margin-top:6px;font-size:clamp(14px,1.6vw,18px)}

  .scroll-cue{position:absolute;left:50%;bottom:16px;transform:translateX(-50%);width:42px;height:42px;border-radius:999px;
    border:1px solid rgba(255,255,255,.5);color:#fff;background:rgba(0,0,0,.2);display:grid;place-items:center}
  .scroll-cue:hover{background:rgba(0,0,0,.35)}

  .section-title{font-weight:800;color:#0f7751;letter-spacing:.2px}
  .card-lite{border:1px solid #e9f0ea;background:#fff;border-radius:16px;box-shadow:0 8px 28px rgba(16,123,79,.06)}

  /* Strip 5 cột dịch vụ */
  .services-grid{display:grid;gap:1rem;grid-template-columns:repeat(2,minmax(0,1fr))}
  @media(min-width:576px){.services-grid{grid-template-columns:repeat(3,1fr)}}
  @media(min-width:992px){.services-grid{grid-template-columns:repeat(4,1fr)}}
  @media(min-width:1200px){.services-grid{grid-template-columns:repeat(5,1fr)}}
  .svc-card{display:flex;height:100%;align-items:center;border:1px solid #e9f0ea;border-radius:16px;background:#fff;
    box-shadow:0 6px 22px rgba(30,155,90,.08);transition:transform .18s,box-shadow .18s,border-color .18s;padding:14px}
  .svc-card:hover{transform:translateY(-4px);box-shadow:0 16px 44px rgba(30,155,90,.14);border-color:#d7efe2}
  .svc-card .icon-wrap{flex:0 0 auto;border-radius:999px;background:#f2fbf6;padding:12px;display:grid;place-items:center;width:48px;height:48px;margin-right:12px}
  .svc-card .i{width:22px;height:22px;color:#1e9b5a}
  .svc-card .desc{color:#63726b;font-size:.92rem;line-height:1.35}

  /* =========== Card nhân sự dọc =========== */
  .person{display:block;position:relative;overflow:hidden}
  .person-header{display:flex;gap:14px;align-items:flex-start}
  .person-badge{display:inline-flex;align-items:center;gap:8px;background:#f2fbf6;color:#0f7751;border:1px solid #d7efe2;
    padding:6px 10px;border-radius:999px;font-size:12px;font-weight:600}
  .person-name{font-weight:800;font-size:clamp(18px,2vw,22px);color:#0e1d17}
  .person-role{color:#3d4d46;font-size:13px}
  .person-role-en{color:#6b7a73;font-style:italic;font-size:12.5px}
  .certs li{margin-bottom:6px}
  .pill{display:inline-block;background:#0f7751;color:#fff;border-radius:10px;padding:2px 8px;font-size:12px}

  .block-title{display:inline-block;font-weight:800;color:#0f7751;border-bottom:3px solid #cfeee3;padding-bottom:4px}
  .kv{margin-top:8px}
  .kv .vi{font-size:14px;color:#21332b}
  .kv .en{font-size:13px;color:#66756f;font-style:italic}

  /* Accent hàng quan trọng */
  .highlight{background:#f6fbf8;border:1px dashed #d7efe2;border-radius:12px;padding:10px 12px}

  /* Sidebar sticky */
  .sticky-wrap{position:sticky;top:calc(var(--header-h,64px) + 20px)}

  /* Hiệu suất: ẩn dần khi chờ render */
  .fade-enter{opacity:0;transform:translateY(6px)}
  .fade-enter.fade-enter-active{opacity:1;transform:none;transition:opacity .25s ease, transform .25s ease}
</style>

{{-- ========== BANNER + SCROLL CUE ========== --}}
<section class="hero-full" style="background-image:url('{{ $banner }}');min-height:calc(100vh - var(--header-h,64px));">
  <div class="hero-inner text-center">
    <h1 class="hero-title">Hồ sơ năng lực</h1>
    <p class="hero-sub">Capability Profile</p>
  </div>
  <button id="scrollCue" class="scroll-cue" aria-label="Cuộn xuống">
    <svg width="22" height="22" viewBox="0 0 24 24" fill="none" aria-hidden="true">
      <path d="M6 9l6 6 6-6" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
    </svg>
  </button>
</section>

{{-- ========== DỊCH VỤ NỔI BẬT (giống Thư ngỏ) ========== --}}
<section id="info-start" class="container my-5">
  <div class="section-title mb-3">Dịch vụ nổi bật</div>
  <div class="services-grid">
    @foreach($featuredServices as $s)
      <a class="text-decoration-none text-dark" href="{{ $s['url'] }}">
        <div class="svc-card">
          <div class="icon-wrap">
            <svg class="i"><use href="#icon-{{ $s['icon'] }}"/></svg>
          </div>
          <div class="d-flex flex-column justify-content-center">
            <div class="fw-bold">{{ $s['title'] }}</div>
            <div class="desc">Giải pháp nhanh, chuẩn, minh bạch.</div>
          </div>
        </div>
      </a>
    @endforeach
  </div>
</section>

{{-- ========== MAIN ========== --}}
<section class="container mb-5">
  <div class="row g-4">

    {{-- ===== LEFT ===== --}}
    <div class="col-lg-8">

      {{-- Link HSNL PDF --}}
      <article class="card-lite p-4 fade-enter" data-animate>
        <p class="mb-2 text-muted" style="font-size:14px">
          Quý khách hàng xem chi tiết hồ sơ năng lực, vui lòng
          <a href="https://vinap.vn/image/data/ho-so-nang-luc/HSNL_VINAP_T9.2024_opt.pdf" target="_blank" rel="noopener" class="text-success fw-semibold text-decoration-underline">
            click vào đây
          </a>.
        </p>
      </article>

      {{-- HR BULLETS --}}
      <article class="card-lite p-4 fade-enter" data-animate>
        <h2 class="section-title mb-2">Nguồn nhân lực <span class="text-muted fw-normal">/ Human resources</span></h2>
        <p class="mb-1">
          Công ty có đội ngũ lãnh đạo chuyên nghiệp là các chuyên gia có năng lực và nhiều năm kinh nghiệm thực tiễn về ngành giá
          cũng như hoạt động thẩm định giá; đội ngũ thẩm định viên, chuyên viên có nền tảng đa ngành.
        </p>
        <p class="fst-italic text-muted">
          Our organization has professional valuers who have a wealth of experience and specialized skills in appraisal and appraisal activities.
          In addition to their expertise in valuation, our professional appraisal officers possess knowledge of other professions.
        </p>
        <div class="row g-3 mt-1">
          @foreach(count($hr)?$hr:$fallbackHr as $item)
            <div class="col-12 col-sm-6">
              <div class="card-lite p-3 h-100">
                <div>{{ $item['vi'] ?? '' }}</div>
                @if(!empty($item['en']))<div class="small fst-italic text-muted">{{ $item['en'] }}</div>@endif
              </div>
            </div>
          @endforeach
        </div>
      </article>

      {{-- ====== DANH SÁCH NHÂN SỰ: MỖI NGƯỜI 1 CARD DỌC ====== --}}
      @foreach($team as $i => $m)
      <article class="card-lite p-4 fade-enter" data-animate id="person-{{ $i+1 }}">
        {{-- Header --}}
        <div class="person-header mb-2">
          <div>
            <div class="person-badge" aria-label="Số thứ tự">
              <span>#{{ $i+1 }}</span>
              <span class="pill">VINAP</span>
            </div>
            <h3 class="person-name mt-2 mb-1">{{ $m['name'] ?? '' }}</h3>
            @if(!empty($m['role_vi'])) <div class="person-role">{{ $m['role_vi'] }}</div>@endif
            @if(!empty($m['role_en'])) <div class="person-role-en">{{ $m['role_en'] }}</div>@endif
          </div>
        </div>

        {{-- Chứng chỉ --}}
        @if(!empty($m['certs']))
        <div class="highlight mb-3">
          <div class="block-title">Chứng chỉ <span class="text-muted fw-normal">/ Certificates</span></div>
          <ul class="mt-2 certs small mb-0">
            @foreach($m['certs'] as $c) <li>{!! $c !!}</li> @endforeach
          </ul>
        </div>
        @endif

        {{-- Trình độ chuyên môn nghiệp vụ --}}
        @php
          $eduVi = $m['edu_vi'] ?? [];
          $eduEn = $m['edu_en'] ?? [];
        @endphp
        @if(count($eduVi))
        <div class="mb-3">
          <div class="block-title">Trình độ chuyên môn nghiệp vụ</div>
          <div class="kv">
            @foreach($eduVi as $k => $vi)
              <div class="vi mt-2">{{ $vi }}</div>
              @if(isset($eduEn[$k]))<div class="en">{{ $eduEn[$k] }}</div>@endif
            @endforeach
          </div>
        </div>
        @endif

        {{-- Kinh nghiệm công tác --}}
        @php
          $expVi = $m['exp_vi'] ?? [];
          $expEn = $m['exp_en'] ?? [];
        @endphp
        @if(count($expVi))
        <div class="mb-2">
          <div class="block-title">Kinh nghiệm công tác</div>
          <div class="kv">
            @foreach($expVi as $k => $vi)
              <div class="vi mt-2">+ {{ $vi }}</div>
              @if(isset($expEn[$k]))<div class="en">{{ $expEn[$k] }}</div>@endif
            @endforeach
          </div>
        </div>
        @endif

        {{-- Thâm niên --}}
        @if(!empty($m['years']))
          <div class="small text-muted mt-3">
            <strong>Thâm niên công tác:</strong> {{ $m['years'] }}
            <span class="fst-italic">/ Employee Recording: {{ $m['years'] }}</span>
          </div>
        @endif
      </article>
      @endforeach
    </div>

    {{-- ===== RIGHT / SIDEBAR ===== --}}
    <aside class="col-lg-4">
      <div class="sticky-wrap">
        {{-- Dịch vụ đã thực hiện --}}
        @if(!empty($deliveredServices))
          <div class="section-title mb-2">Dịch vụ đã thực hiện</div>
          @foreach($deliveredServices as $idx => $sd)
            @break($idx > 0) {{-- chỉ hiển thị 1 khối giống các trang khác --}}
            <div class="card-lite p-0 mb-4">
              <img loading="lazy" src="{{ $sd['img'] }}" alt="case" class="w-100"
                   style="height:220px;object-fit:cover;border-radius:12px 12px 0 0">
              <div class="p-3">{{ $sd['caption'] ?? '' }}</div>
            </div>
          @endforeach
        @endif

        {{-- Văn bản pháp luật --}}
        <div class="section-title mb-2">Văn bản pháp luật</div>
        <div class="card-lite p-3 mb-4">
          <ul class="list-unstyled m-0">
            @foreach($laws as $law)
              <li class="mb-2"><a href="#" class="text-decoration-none text-success">{{ $law }}</a></li>
            @endforeach
          </ul>
        </div>

        {{-- Liên kết web --}}
        <div class="section-title mb-2">Liên kết web</div>
        <div class="card-lite p-3">
          <ul class="list-unstyled m-0">
            @foreach($links as $link)
              <li class="mb-2"><a href="{{ $link['href'] }}" class="text-decoration-none text-success">{{ $link['label'] }}</a></li>
            @endforeach
          </ul>
        </div>
      </div>
    </aside>

  </div>
</section>

<script>
  // Cue scroll xuống Services
  (function(){
    const cue = document.getElementById('scrollCue');
    const target = document.querySelector('#info-start');
    if(cue && target){
      cue.addEventListener('click', ()=> target.scrollIntoView({behavior:'smooth', block:'start'}));
    }
  })();

  // Nhẹ nhàng hiện các khối (chống cảm giác "load chậm")
  (function(){
    const els = document.querySelectorAll('[data-animate]');
    const io = new IntersectionObserver((entries)=>{
      entries.forEach(e=>{
        if(e.isIntersecting){
          e.target.classList.add('fade-enter-active');
          e.target.classList.remove('fade-enter');
          io.unobserve(e.target);
        }
      });
    }, {rootMargin: '50px 0px', threshold: 0.05});
    els.forEach(el=>{
      el.classList.add('fade-enter');
      io.observe(el);
    });
  })();
</script>
@endsection
