@extends('layouts.app')

@section('content')
@php
  use Illuminate\Support\Facades\File;
  // Hero background: nếu có hero-big.jpg dùng, không thì dùng placeholder
  $heroUrl = File::exists(public_path('images/hero-big.jpg'))
              ? asset('images/hero-big.jpg')
              : (File::exists(public_path('images/placeholder-hero.jpg'))
                    ? asset('images/placeholder-hero.jpg')
                    : asset('images/placeholder-hero.svg'));
@endphp

{{-- BANNER FULL --}}
<section class="hero-full" style="background-image:url('{{ $heroUrl }}')">
  <div class="hero-inner" data-animate>
    <h1 class="hero-title">{{ config('site.brand.name') }}</h1>
    <p class="hero-sub">{{ config('site.brand.tagline') }}</p>
    <a href="#info-start" class="btn btn-success mt-3 ripple">Bắt đầu khám phá</a>
  </div>
  <button id="scrollCue" class="scroll-cue" aria-label="Cuộn xuống">
    <svg viewBox="0 0 24 24" fill="none"><path d="M6 9l6 6 6-6" stroke="currentColor" stroke-width="2" stroke-linecap="round"/></svg>
  </button>
</section>

{{-- THÔNG TIN CHÍNH (điểm neo để snap) --}}
<section id="info-start" class="container my-5" data-animate>
  <div class="section-title mb-3">Dịch vụ nổi bật</div>
  <div class="row g-4 stagger">
    @foreach(config('site.services_top') as $s)
      <div class="col-12 col-md-6 col-lg-3">
        <a href="{{ $s['url'] }}" class="text-decoration-none text-dark">
          <div class="card-lite p-3 h-100 ripple">
            <div class="d-flex align-items-start gap-3">
              <div class="rounded-circle p-3" style="background:#f2fbf6">
                {{-- icon SVG sprite theo 'icon' trong config: home/gear/briefcase/chart --}}
                <svg class="i i-lg" aria-hidden="true">
                  <use href="#icon-{{ $s['icon'] ?? 'home' }}"/>
                </svg>
              </div>
              <div>
                <div class="fw-bold">{{ $s['title'] }}</div>
                <div class="text-muted">{{ $s['desc'] }}</div>
              </div>
            </div>
          </div>
        </a>
      </div>
    @endforeach
  </div>
</section>

{{-- HOẠT ĐỘNG + TIN TỨC + SIDEBAR --}}
<section class="container mb-5">
  <div class="row g-4">
    <div class="col-lg-8">
      <div class="section-title mb-3" data-animate>Hoạt động công ty</div>
      <div class="list-group mb-4">
        @foreach(config('site.activities') as $a)
          @php
            $thumb = ltrim($a['thumb'] ?? '', '/');
            $thumb = \Illuminate\Support\Facades\File::exists(public_path($thumb)) ? '/'.$thumb : '/images/placeholder-thumb.svg';
          @endphp
          <a href="{{ $a['url'] }}" class="list-group-item list-group-item-action" data-animate>
            <div class="d-flex gap-3">
              <img src="{{ $thumb }}" data-fallback="/images/placeholder-thumb.svg"
                   alt="" style="width:64px;height:64px;object-fit:cover;border-radius:10px">
              <div>
                <div class="fw-bold">{{ $a['title'] }}</div>
                <div class="text-muted small">{{ $a['excerpt'] }} <span class="text-decoration-underline">Xem tiếp</span></div>
              </div>
            </div>
          </a>
        @endforeach
      </div>

      <div class="section-title mb-3" id="news" data-animate>Tin tức</div>
      <div class="list-group">
        @foreach(config('site.news') as $n)
          <a href="{{ $n['url'] }}" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center" data-animate>
            <span>{{ $n['title'] }}</span>
            <span class="text-muted small">{{ $n['date'] }}</span>
          </a>
        @endforeach
      </div>
    </div>

    <aside class="col-lg-4">
      @php
        $sd = config('site.service_done');
        $sdImg = ltrim($sd['image'] ?? '', '/');
        $sdImg = \Illuminate\Support\Facades\File::exists(public_path($sdImg)) ? '/'.$sdImg : '/images/placeholder-thumb.svg';
      @endphp

      <div class="section-title mb-3" data-animate>Dịch vụ đã thực hiện</div>
      <div class="card-lite p-0 mb-4" data-animate>
        <img src="{{ $sdImg }}" data-fallback="/images/placeholder-thumb.svg"
             alt="" class="w-100" style="height:220px;object-fit:cover">
        <div class="p-3">{{ $sd['caption'] ?? '' }}</div>
      </div>

      <div class="section-title mb-3" data-animate>Văn bản pháp luật</div>
      <div class="card-lite p-3 mb-4" data-animate>
        <ul class="list-unstyled m-0">
          @foreach(config('site.legal_docs') as $doc)
            <li class="mb-2"><a href="{{ $doc['url'] }}" class="text-decoration-none">{{ $doc['title'] }}</a></li>
          @endforeach
        </ul>
      </div>

      <div class="section-title mb-3" data-animate>Liên kết web</div>
      <div class="card-lite p-3" data-animate>
        <ul class="list-unstyled m-0">
          @foreach(config('site.web_links') as $link)
            <li class="mb-2"><a href="{{ $link['url'] }}" class="text-decoration-none">{{ $link['title'] }}</a></li>
          @endforeach
        </ul>
      </div>
    </aside>
  </div>
</section>

{{-- KHÁCH HÀNG --}}
<section id="customer" class="container mb-5" data-animate>
  <div class="section-title mb-3">Khách hàng & dự án tiêu biểu</div>
  <div class="row g-4 stagger">
    @foreach(config('site.cases') as $c)
      @php
        $logo = ltrim($c['logo'] ?? '', '/');
        $logo = \Illuminate\Support\Facades\File::exists(public_path($logo)) ? '/'.$logo : '/images/placeholder-logo.svg';
      @endphp
      <div class="col-6 col-md-3">
        <div class="card-lite p-3 d-flex align-items-center justify-content-center" style="height:110px">
          <img src="{{ $logo }}" data-fallback="/images/placeholder-logo.svg"
               alt="{{ $c['name'] ?? 'Khách hàng' }}" style="max-height:60px;object-fit:contain">
        </div>
      </div>
    @endforeach
  </div>
</section>

{{-- BÁO GIÁ --}}
<section id="pricing" class="container mb-5" data-animate>
  <div class="section-title mb-3">Báo giá tham khảo</div>
  <div class="card-lite p-4">
    <ul class="mb-2">
      <li>BĐS nhà ở đô thị: <strong>1.5–3 triệu</strong>/chứng thư</li>
      <li>Dự án/đặc thù: báo giá theo quy mô khảo sát</li>
      <li>Máy móc thiết bị: tùy loại tài sản</li>
    </ul>
    <div class="text-muted">{{ config('site.pricing_note') }}</div>
  </div>
</section>

{{-- LIÊN HỆ --}}
<section id="contact" class="container mb-5" data-animate>
  <div class="section-title mb-3">Liên hệ {{ config('site.brand.name') }}</div>
  <div class="card-lite p-4">
    <div class="row g-3">
      <div class="col-md-6"><input class="form-control" placeholder="Họ tên"></div>
      <div class="col-md-6"><input class="form-control" placeholder="Số điện thoại"></div>
      <div class="col-12"><input class="form-control" placeholder="Nội dung cần thẩm định"></div>
      <div class="col-12"><button class="btn btn-success ripple">Gửi yêu cầu</button></div>
    </div>
    <div class="small text-muted mt-2">Form minh họa, không lưu dữ liệu.</div>
  </div>
</section>
@endsection
