@php
  $sd     = config('site.home.deliveredServices')[0] ?? null;
  $laws   = config('site.laws') ?? [];
  $links  = config('site.links') ?? [];
@endphp

{{-- DỊCH VỤ ĐÃ THỰC HIỆN (STICKY) --}}
@if($sd)
  <div class="sticky-aside">   {{-- << thêm wrapper sticky --}}
    <div class="section-title mb-3" data-animate>Dịch vụ đã thực hiện</div>
    <div class="card-lite p-0 mb-4" data-animate>
      <img src="{{ $sd['img'] }}" alt="{{ $sd['caption'] ?? '' }}"
           class="w-100" style="height:220px;object-fit:cover">
      <div class="p-3 small">{{ $sd['caption'] ?? '' }}</div>
    </div>
@endif

{{-- VĂN BẢN PHÁP LUẬT (không sticky) --}}
@if(count($laws))
  <div class="section-title mb-3" data-animate>Văn bản pháp luật</div>
  <div class="card-lite p-3 mb-4" data-animate>
    <ul class="list-unstyled m-0">
      @foreach($laws as $l)
        <li class="mb-2"><a href="#" class="text-decoration-none">{{ $l }}</a></li>
      @endforeach
    </ul>
  </div>
@endif

{{-- LIÊN KẾT WEB (không sticky) --}}
@if(count($links))
  <div class="section-title mb-3" data-animate>Liên kết web</div>
  <div class="card-lite p-3" data-animate>
    <ul class="list-unstyled m-0">
      @foreach($links as $ln)
        <li class="mb-2"><a href="{{ $ln['href'] ?? '#' }}" target="_blank" class="text-decoration-none">
          {{ $ln['label'] ?? '' }}</a></li>
      @endforeach
    </ul>
  </div>
</div>
@endif
