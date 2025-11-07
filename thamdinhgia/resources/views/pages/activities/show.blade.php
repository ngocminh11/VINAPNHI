@extends('layouts.app')
@section('title', ($article['title'] ?? 'Bài viết') . ' • VINAP')

@section('content')
@php
  $laws  = config('site.laws')  ?? [];
  $links = config('site.links') ?? [];
  $bodyView = 'pages.activities.bodies.' . $slug;
@endphp

<section class="container my-4">
  <div class="row g-4">
    <div class="col-lg-8">

      {{-- Header + ảnh --}}
      <article class="card-lite p-0 mb-3">
        @if(!empty($article['img']))
          <img src="{{ $article['img'] }}" alt="" class="w-100" style="height:360px;object-fit:cover;border-radius:16px 16px 0 0">
        @endif
        <div class="p-4">
          <h1 class="mb-2">{{ $article['title'] ?? '' }}</h1>
          @if(!empty($article['date']))
            <div class="text-muted small mb-3">
              {{ \Illuminate\Support\Carbon::parse($article['date'])->format('d/m/Y') }}
            </div>
          @endif

          {{-- Nội dung bài --}}
          @includeIf($bodyView)
        </div>
      </article>

      {{-- Điểm trung bình + tổng số bình luận --}}
      <div class="card-lite p-3 mb-3">
        <div class="d-flex align-items-center gap-3">
          <div class="fs-4 fw-bold">{{ $avgRating ?: '—' }}</div>
          <div class="stars" aria-label="Đánh giá trung bình">
            @for($s=1;$s<=5;$s++)
              <span style="color:{{ ($avgRating >= $s-0.5) ? '#f59e0b' : '#cbd5e1' }}">★</span>
            @endfor
          </div>
          <div class="text-muted small">
            {{ $comments->count() }} bình luận
          </div>
        </div>
      </div>

      {{-- Form bình luận --}}
      <div class="card-lite p-4 mb-3">
        @if(session('ok'))
          <div class="alert alert-success py-2 mb-3">{{ session('ok') }}</div>
        @endif
        <h3 class="h5 mb-3">Để lại bình luận</h3>
        <form method="POST" action="{{ route('activities.comment', $slug) }}">
          @csrf
          <div class="row g-3">
            <div class="col-md-6">
              <label class="form-label">Họ tên</label>
              <input name="name" class="form-control" required value="{{ old('name') }}">
              @error('name')<div class="text-danger small">{{ $message }}</div>@enderror
            </div>
            <div class="col-md-6">
              <label class="form-label">Đánh giá</label>
              <select name="rating" class="form-select" required>
                @for($i=5;$i>=1;$i--)
                  <option value="{{ $i }}" {{ old('rating')==$i?'selected':'' }}>{{ $i }} sao</option>
                @endfor
              </select>
              @error('rating')<div class="text-danger small">{{ $message }}</div>@enderror
            </div>
            <div class="col-12">
              <label class="form-label">Nội dung</label>
              <textarea name="body" rows="4" class="form-control" required>{{ old('body') }}</textarea>
              @error('body')<div class="text-danger small">{{ $message }}</div>@enderror
            </div>
            <div class="col-12">
              <button class="btn btn-success">Gửi bình luận</button>
            </div>
          </div>
        </form>
      </div>

      {{-- Danh sách bình luận --}}
      <div class="card-lite p-4">
        <h3 class="h5 mb-3">Bình luận</h3>
        @forelse($comments as $c)
          <div class="mb-3 pb-3 border-bottom">
            <div class="d-flex align-items-center justify-content-between">
              <strong>{{ $c->name }}</strong>
              <div class="small text-muted">{{ $c->created_at->format('d/m/Y H:i') }}</div>
            </div>
            <div class="stars small">
              @for($s=1;$s<=5;$s++)
                <span style="color:{{ ($c->rating >= $s) ? '#f59e0b' : '#cbd5e1' }}">★</span>
              @endfor
            </div>
            <div class="mt-1">{{ nl2br(e($c->body)) }}</div>
          </div>
        @empty
          <div class="text-muted">Chưa có bình luận nào. Hãy là người đầu tiên.</div>
        @endforelse
      </div>
    </div>

    <aside class="col-lg-4">
      {{-- Bài viết liên quan: random 4–6 --}}
      <div class="section-title mb-2">Bài viết liên quan</div>
      <div class="card-lite p-3 mb-4">
        <div class="list-group">
          @foreach($related as $r)
            <a href="{{ route('activities.show', $r['slug']) }}" class="list-group-item list-group-item-action">
              <div class="d-flex gap-3">
                <img src="{{ $r['img'] ?? '/images/placeholder-thumb.svg' }}" alt=""
                     style="width:96px;height:72px;object-fit:cover;border-radius:8px">
                <div>
                  <div class="fw-semibold small">{{ $r['title'] }}</div>
                  <div class="text-muted xsmall">{{ $r['excerpt'] ?? '' }}</div>
                </div>
              </div>
            </a>
          @endforeach
        </div>
      </div>

      <div class="section-title mb-2">Văn bản pháp luật</div>
      <div class="card-lite p-3 mb-4">
        <ul class="list-unstyled m-0">
          @foreach($laws as $law)
            @php $label = is_array($law)?($law['label']??'Tài liệu'):$law; $href = is_array($law)?($law['href']??'#'):'#'; @endphp
            <li class="mb-2"><a class="text-success text-decoration-none" target="_blank" rel="noopener" href="{{ $href }}">{{ $label }}</a></li>
          @endforeach
        </ul>
      </div>

      <div class="section-title mb-2">Liên kết web</div>
      <div class="card-lite p-3">
        <ul class="list-unstyled m-0">
          @foreach($links as $link)
            <li class="mb-2"><a class="text-success text-decoration-none" target="_blank" rel="noopener" href="{{ $link['href'] ?? '#' }}">{{ $link['label'] ?? 'Link' }}</a></li>
          @endforeach
        </ul>
      </div>
    </aside>
  </div>
</section>
@endsection
