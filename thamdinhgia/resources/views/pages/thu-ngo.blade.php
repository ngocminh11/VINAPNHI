@extends('layouts.app')
@section('title','VINAP • Thư ngỏ')

@section('content')
@php
  use Illuminate\Support\Facades\File;

  $banner = File::exists(public_path('images/thu-ngo-banner.jpg'))
      ? asset('images/thu-ngo-banner.jpg')
      : (File::exists(public_path('images/placeholder-hero.jpg'))
          ? asset('images/placeholder-hero.jpg')
          : 'https://picsum.photos/seed/vinap-letter/1600/900');

  $featuredServices = [
    ['icon'=>'home','title'=>'Thẩm định giá','url'=>route('services.index')],
    ['icon'=>'briefcase','title'=>'Đấu giá BĐS, tài sản','url'=>route('services.index')],
    ['icon'=>'gear','title'=>'Chuyển nhượng dự án','url'=>route('services.index')],
    ['icon'=>'chart','title'=>'Tư vấn đầu tư - BĐS','url'=>route('services.index')],
    ['icon'=>'map','title'=>'Nghiên cứu thị trường','url'=>route('services.index')],
  ];

  $laws  = config('site.laws')  ?? [];
  $links = config('site.links') ?? [];
@endphp

<style>
  /* FIX khoảng cách cho slider 'Dịch vụ đã thực hiện' trong sidebar */
  aside .sticky-wrap,
  aside .sticky-top { overflow: visible !important; }

  /* tạo khoảng dưới slider */
  aside .deliv-slider { margin-bottom: 18px !important; }

  /* chấm tròn (dots) có khoảng trên, tránh đè vào caption */
  aside .deliv-dots { margin: 10px auto 6px !important; }

  /* tiêu đề kế tiếp (Văn bản pháp luật) luôn có khoảng trên */
  aside .deliv-slider + .section-title { margin-top: 18px !important; }

  /* bo góc ảnh cho gọn, không ảnh hưởng nội dung khác */
  aside .deliv-viewport { border-radius: 16px; }
</style>


<section class="hero-full" style="background-image:url('{{ $banner }}');min-height:calc(100vh - var(--header-h));">
  <div class="hero-inner text-center">
    <h1 class="hero-title" data-animate>Thư ngỏ từ VINAP</h1>
    <p class="hero-sub" data-animate>Kính gửi Quý Khách hàng • Dear Clients</p>
  </div>
  <button id="scrollCue" class="scroll-cue" aria-label="Cuộn xuống">
    <svg viewBox="0 0 24 24" fill="none"><path d="M6 9l6 6 6-6" stroke="currentColor" stroke-width="2" stroke-linecap="round"/></svg>
  </button>
</section>

<div class="mb-4">
  @include('partials.delivered-strip')
</div>

<section class="container mb-5">
  <div class="row g-4">
    <div class="col-lg-8">
      {{-- nội dung thư giữ nguyên như bản bạn gửi trước --}}
      @yield('letter_body', view('partials.letter-body'))
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

<script>
  (function(){
    const cue = document.getElementById('scrollCue');
    const target = document.querySelector('#info-start');
    cue && target && cue.addEventListener('click', ()=> target.scrollIntoView({behavior:'smooth', block:'start'}));
  })();
</script>
@endsection
