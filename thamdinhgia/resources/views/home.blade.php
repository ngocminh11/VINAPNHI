@extends('layouts.app')

@section('content')
@php
  use Illuminate\Support\Facades\File;
  // Hero: dùng ảnh featured đầu nếu có, hoặc placeholder
  $firstTile = config('site.home.serviceTiles')[0]['img'] ?? null;
  $heroUrl = $firstTile ?: (File::exists(public_path('images/hero-big.jpg'))
              ? asset('images/hero-big.jpg')
              : (File::exists(public_path('images/placeholder-hero.jpg'))
                    ? asset('images/placeholder-hero.jpg')
                    : asset('images/placeholder-hero.svg')));
@endphp

{{-- HERO --}}
<section class="hero-full" style="background-image:url('{{ $heroUrl }}')">
  <div class="hero-inner" data-animate>
    <h1 class="hero-title">VINAP</h1>
    <p class="hero-sub">Chuyên Nghiệp - Minh Bạch - Chính Xác - Khách Quan</p>
    <a href="#info-start" class="btn btn-success mt-3">Bắt đầu khám phá</a>
  </div>
  <button id="scrollCue" class="scroll-cue" aria-label="Cuộn xuống">
    <svg viewBox="0 0 24 24" fill="none"><path d="M6 9l6 6 6-6" stroke="currentColor" stroke-width="2" stroke-linecap="round"/></svg>
  </button>
</section>

{{-- DỊCH VỤ NỔI BẬT --}}
<section id="info-start" class="container my-5" data-animate>
  <div class="section-title mb-3">Dịch vụ nổi bật</div>
  <div class="services-grid stagger">
    @php
      // map icon theo keyword
      $iconMap = [
        'thẩm định' => 'home',
        'đấu giá' => 'briefcase',
        'chuyển' => 'gear',
        'tư vấn đầu tư' => 'chart',
        'bđs' => 'chart',
        'nghiên cứu' => 'map',
        'thị trường' => 'map',
      ];
      $tiles = config('site.home.serviceTiles') ?? [];
    @endphp
    @foreach($tiles as $t)
      @php
        $title = $t['title'] ?? 'Dịch vụ';
        $icon = 'home';
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

{{-- HOẠT ĐỘNG + TIN TỨC + SIDEBAR --}}
<section class="container mb-5">
  <div class="row g-4">
    <div class="col-lg-8">
      <div class="section-title mb-3" data-animate>Hoạt động công ty</div>
      <div class="list-group mb-4">
        @foreach(config('site.home.companyActivities') as $a)
          @php
            $src = $a['img'] ?? '';
            $bad = str_starts_with($src,'httpsum'); // bạn gõ sai domain
            $thumb = $bad ? '' : $src;
          @endphp
          <div class="list-group-item" data-animate>
            <div class="d-flex gap-3">
              <img src="{{ $thumb }}" data-fallback="/images/placeholder-thumb.svg" alt=""
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
      <div class="card-lite p-0 mb-4" data-animate>
        @php $done = config('site.home.deliveredServices')[0] ?? null; @endphp
        <img src="{{ $done['img'] ?? '' }}" data-fallback="/images/placeholder-thumb.svg" alt="" class="w-100" style="height:220px;object-fit:cover">
        <div class="p-3">{{ $done['caption'] ?? '' }}</div>
      </div>

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

{{-- KHÁCH HÀNG / CASES --}}
<section id="customer" class="container mb-5" data-animate>
  <div class="section-title mb-3">Khách hàng & dự án tiêu biểu</div>
  <div class="row g-4 stagger">
    @foreach(config('site.home.cases') as $c)
      <div class="col-12 col-md-6 col-lg-4">
        <div class="card-lite overflow-hidden h-100">
          <img src="{{ $c['img'] }}" data-fallback="/images/placeholder-thumb.svg" alt="" class="w-100" style="height:180px;object-fit:cover">
          <div class="p-3">
            <div class="small text-success fw-bold mb-1">{{ $c['tag'] }}</div>
            <div class="fw-bold">{{ $c['title'] }}</div>
          </div>
        </div>
      </div>
    @endforeach
  </div>
</section>

{{-- LIÊN HỆ --}}
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

    <div class="ratio ratio-21x9 mt-3">
      <iframe src="{{ config('site.contact_map_embed') }}" style="border:0" loading="lazy" referrerpolicy="no-referrer-when-downgrade" allowfullscreen></iframe>
    </div>
  </div>
</section>
@endsection
