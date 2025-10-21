@php
  $services = config('site.home.serviceTiles') ?? [];
  $icons = ['home','briefcase','gear','chart','map']; // fallback icon cho 5 dịch vụ
@endphp

@if(count($services))
<section class="container my-5" data-animate>
  <div class="section-title mb-4">Dịch vụ nổi bật</div>

  <div class="row g-4 stagger">
    @foreach($services as $i => $s)
      <div class="col-12 col-sm-6 col-lg-4 col-xl-2 flex-fill">
        <a href="{{ route('services.show', \Illuminate\Support\Str::slug($s['title'])) }}"
           class="text-decoration-none text-dark">
          <div class="card-lite p-4 h-100 ripple d-flex flex-column align-items-start">
            <div class="rounded-circle p-3 mb-3" style="background:#f2fbf6">
              <svg class="i i-lg" aria-hidden="true">
                <use href="#icon-{{ $icons[$i % count($icons)] }}"/>
              </svg>
            </div>
            <div class="fw-bold mb-1">{{ $s['title'] }}</div>
            @if(!empty($s['desc']))
              <div class="text-muted small">{{ $s['desc'] }}</div>
            @endif
          </div>
        </a>
      </div>
    @endforeach
  </div>
</section>
@endif
