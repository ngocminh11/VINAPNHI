@extends('layouts.app')
@section('title','VINAP • Hồ sơ năng lực')

@section('content')
@php
  use Illuminate\Support\Facades\File;

  // Banner
  $banner = File::exists(public_path('images/hsnl-banner.jpg'))
      ? asset('images/hsnl-banner.jpg')
      : (File::exists(public_path('images/placeholder-hero.jpg'))
          ? asset('images/placeholder-hero.jpg')
          : 'https://picsum.photos/seed/vinap-capacity/1600/800');

  // Strip dịch vụ
  $featuredServices = [
    ['icon'=>'home','title'=>'Thẩm định giá','url'=>route('services.index')],
    ['icon'=>'briefcase','title'=>'Đấu giá BĐS, tài sản','url'=>route('services.index')],
    ['icon'=>'gear','title'=>'Chuyển nhượng dự án','url'=>route('services.index')],
    ['icon'=>'chart','title'=>'Tư vấn đầu tư - BĐS','url'=>route('services.index')],
    ['icon'=>'map','title'=>'Nghiên cứu thị trường','url'=>route('services.index')],
  ];

  // Data
  $hr   = config('site.capacity.hr')   ?? [];
  $team = config('site.capacity.team') ?? [];

  $fallbackHr = [
    ['vi'=>'Số nhân viên có trình độ Cao học: 7 người.','en'=>'Master Degree: Seven individuals.'],
    ['vi'=>'Tỷ lệ nhân sự có trình độ Đại học: 100%.','en'=>'University level: One hundred percent.'],
    ['vi'=>'Thẻ Thẩm định viên về giá: 5 người.','en'=>'Valuer Certificate: Five individuals.'],
    ['vi'=>'Chứng chỉ hành nghề đấu giá: 1 người.','en'=>'Auction certificate: One individual.'],
    ['vi'=>'Chứng chỉ môi giới BĐS: 2 người.','en'=>'Estate Agent Appraisal certificate: Two individuals.'],
    ['vi'=>'Chứng chỉ định giá đất: 9 người.','en'=>'Land valuation certificate: Nine individuals.'],
  ];

  $laws  = config('site.laws')  ?? [];
  $links = config('site.links') ?? [];
  $deliveredServices = config('site.home.deliveredServices') ?? [];
  $dg1 = File::exists(public_path('image/DG_01.jpg')) ? asset('image/DG_01.jpg') : 'https://picsum.photos/seed/dg1/900/600';
  $dg2 = File::exists(public_path('image/DG_02.jpg')) ? asset('image/DG_02.jpg') : 'https://picsum.photos/seed/dg2/900/600';
@endphp
<style>
  /* ====== FIX khoảng cách slider "Dịch vụ đã thực hiện" trong sidebar ====== */
  .sticky-wrap .deliv-slider{ margin-bottom:18px; }                  /* chừa đáy cho slider */
  .sticky-wrap .deliv-dots{ margin:10px auto 8px !important; }       /* chấm không đè xuống */
  .sticky-wrap .deliv-slider + .section-title{ margin-top:14px; }    /* nới heading liền kề */

  /* Nếu trang dùng class sticky-aside ở file khác thì chơi luôn cho chắc */
  .sticky-aside .deliv-slider{ margin-bottom:18px; }
  .sticky-aside .deliv-dots{ margin:10px auto 8px !important; }
  .sticky-aside .deliv-slider + .section-title{ margin-top:14px; }

  /* Nới nhẹ block Testimonials cho nhìn thoáng (không ảnh hưởng chỗ khác) */
  .card-lite h3 + .testi-grid{ margin-top:8px; }
  .card-lite .testi-grid{ display:flex; flex-direction:column; gap:18px; }
  .card-lite .testi-box{ width:100%; aspect-ratio:3/2; border-radius:12px; overflow:hidden; background:#f3f6f5; }
  .card-lite .testi-box > img{ display:block; width:100%; height:100%; object-fit:cover; object-position:center; }
</style>


{{-- Banner --}}
<section class="hero-full" style="background-image:url('{{ $banner }}')">
  <div class="hero-inner">
    <div>
      <h1 class="hero-title">Hồ sơ năng lực</h1>
      <p class="hero-sub">Capability Profile</p>
    </div>
  </div>
  <button id="scrollCue" class="scroll-cue" aria-label="Cuộn xuống">
    <svg viewBox="0 0 24 24" fill="none" width="22" height="22"><path d="M6 9l6 6 6-6" stroke="currentColor" stroke-width="2" stroke-linecap="round"/></svg>
  </button>
</section>

{{-- STRIP: Dịch vụ nổi bật (ngay dưới banner) --}}
<section id="info-start" class="container my-5">
  @include('partials.service-strip')
</section>

<section class="container mb-5">
  <div class="row g-4">

    {{-- LEFT --}}
    <div class="col-lg-8">

      {{-- Link HSNL PDF --}}
      <article class="card-lite p-4 mb-3">
        <p class="mb-2 text-muted" style="font-size:14px">
          Xem chi tiết hồ sơ năng lực, vui lòng
          <a href="https://vinap.vn/image/data/ho-so-nang-luc/HSNL_VINAP_T9.2024_opt.pdf" target="_blank" rel="noopener" class="text-success fw-semibold text-decoration-underline">
            click vào đây
          </a>.
        </p>
      </article>

      {{-- HR bullets --}}
      <article class="card-lite p-4 mb-3">
        <h2 class="section-title mb-2">Nguồn nhân lực <span class="text-muted fw-normal">/ Human resources</span></h2>
        <p class="mb-1">Công ty có đội ngũ lãnh đạo chuyên nghiệp…</p>
        <p class="fst-italic text-muted">Our organization has professional valuers…</p>
        <div class="row g-3 mt-1">
          @foreach(count($hr) ? $hr : $fallbackHr as $item)
            <div class="col-12 col-sm-6">
              <div class="card-lite p-3 h-100">
                <div>{{ $item['vi'] ?? '' }}</div>
                @if(!empty($item['en']))
                  <div class="small fst-italic text-muted">{{ $item['en'] }}</div>
                @endif
              </div>
            </div>
          @endforeach
        </div>
      </article>

      {{-- DANH SÁCH NHÂN SỰ: mỗi người 1 card dọc --}}
      @foreach($team as $i => $m)
      <article class="card-lite p-4 mb-3" id="person-{{ $i+1 }}">
        <div class="mb-2">
          <div class="small text-uppercase text-success fw-bold">#{{ $i+1 }} • VINAP</div>
          <h3 class="person-name mb-1">{{ $m['name'] ?? '' }}</h3>
          @if(!empty($m['role_vi'])) <div class="person-role">{{ $m['role_vi'] }}</div> @endif
          @if(!empty($m['role_en'])) <div class="person-role-en">{{ $m['role_en'] }}</div> @endif
        </div>

        @if(!empty($m['certs']))
          <div class="mb-3 p-3" style="background:#f6fbf8;border:1px dashed #d7efe2;border-radius:12px">
            <div class="block-title">Chứng chỉ <span class="text-muted fw-normal">/ Certificates</span></div>
            <ul class="mt-2 small mb-0">
              @foreach($m['certs'] as $c)
                <li>{!! $c !!}</li>
              @endforeach
            </ul>
          </div>
        @endif

        @php
          $eduVi = $m['edu_vi'] ?? [];
          $eduEn = $m['edu_en'] ?? [];
        @endphp
        @if(!empty($eduVi))
          <div class="mt-3">
            <div class="block-title">Trình độ chuyên môn nghiệp vụ</div>
            <div class="kv">
              @foreach($eduVi as $k => $vi)
                <div class="vi mt-2">{{ $vi }}</div>
                @if(!empty($eduEn[$k]))
                  <div class="en">{{ $eduEn[$k] }}</div>
                @endif
              @endforeach
            </div>
          </div>
        @endif

        @php
          $expVi = $m['exp_vi'] ?? [];
          $expEn = $m['exp_en'] ?? [];
        @endphp
        @if(!empty($expVi))
          <div class="mt-3">
            <div class="block-title">Kinh nghiệm công tác</div>
            <div class="kv">
              @foreach($expVi as $k => $vi)
                <div class="vi mt-2">+ {{ $vi }}</div>
                @if(!empty($expEn[$k]))
                  <div class="en">{{ $expEn[$k] }}</div>
                @endif
              @endforeach
            </div>
          </div>
        @endif

        @if(!empty($m['years']))
          <div class="small text-muted mt-3">
            <strong>Thâm niên công tác:</strong> {{ $m['years'] }}
            <span class="fst-italic">/ Employee Recording: {{ $m['years'] }}</span>
          </div>
        @endif
      </article>
      @endforeach

      {{-- 2 ẢNH: cho bằng nhau và fill khung --}}
      <article class="card-lite p-4 mt-2">
        <h3 class="fw-bold mb-3">Đánh giá từ đối tác / Testimonials</h3>
        <div class="testi-grid">
          <div class="testi-box">
            <img src="{{ $dg1 }}" alt="Testimonial 1" loading="lazy" decoding="async">
          </div>
          <div class="testi-box">
            <img src="{{ $dg2 }}" alt="Testimonial 2" loading="lazy" decoding="async">
          </div>
        </div>
      </article>

    </div>

    {{-- RIGHT / SIDEBAR --}}
    <aside class="col-lg-4">
      <div class="sticky-wrap">

        @include('partials.delivered-strip')


        <div class="section-title mb-2">Văn bản pháp luật</div>
        <div class="card-lite p-3 mb-4">
          <ul class="list-unstyled m-0">
            @foreach($laws as $law)
              @php
                $label = is_array($law) ? ($law['label'] ?? 'Tài liệu') : $law;
                $href  = is_array($law) ? ($law['href'] ?? '#')      : '#';
              @endphp
              <li class="mb-2"><a href="{{ $href }}" target="_blank" rel="noopener" class="text-decoration-none text-success">{{ $label }}</a></li>
            @endforeach
          </ul>
        </div>

        <div class="section-title mb-2">Liên kết web</div>
        <div class="card-lite p-3">
          <ul class="list-unstyled m-0">
            @foreach($links as $link)
              <li class="mb-2"><a href="{{ $link['href'] }}" target="_blank" rel="noopener" class="text-decoration-none text-success">{{ $link['label'] }}</a></li>
            @endforeach
          </ul>
        </div>

      </div>
    </aside>

  </div>
</section>

<script>
  // kéo xuống strip ngay dưới banner
  document.addEventListener('DOMContentLoaded', () => {
  const cue = document.getElementById('scrollCue');
  const target = document.getElementById('info-start');
  if (!cue || !target) return;

  cue.addEventListener('click', e => {
    e.preventDefault();
    target.scrollIntoView({ behavior: 'smooth', block: 'start' });
  });
});
</script>
@endsection
