@php
  use Illuminate\Support\Str;

  // Dùng config đã có; mỗi item có thể thêm 'img' và 'url'
  $tiles = array_values(config('site.home.serviceTiles') ?? []);

  // Fallback nhanh nếu thiếu
  if (empty($tiles)) {
    $tiles = [
      ['title'=>'Thẩm định giá','url'=>'/dich-vu/tham-dinh-gia','img'=>'http://vinap.vn/image/data/dich-vu/Tai-san-nha-o.jpg'],
      ['title'=>'Đấu giá BĐS, tài sản','url'=>'/dich-vu/dau-gia','img'=>'http://vinap.vn/image/data/dich-vu/ban-dau-gia.jpg'],
      ['title'=>'Tư vấn chuyển nhượng dự án','url'=>'/dich-vu/chuyen-nhuong-du-an','img'=>'http://vinap.vn/image/data/dich-vu/chuyen-nhuong.jpg'],
      ['title'=>'Tư vấn đầu tư - BĐS','url'=>'/dich-vu/tu-van-dau-tu','img'=>'http://vinap.vn/image/data/dich-vu/tu-van-bds.jpg'],
      ['title'=>'Nghiên cứu thị trường','url'=>'/dich-vu/nghien-cuu-thi-truong','img'=>'http://vinap.vn/image/data/dich-vu/research.jpg'],
    ];
  }

  $sid = 'svcStrip_'.Str::random(6);
@endphp

@if(count($tiles))
<section id="{{ $sid }}" class="container my-5" data-animate>
  <div class="section-title mb-3">Dịch vụ nổi bật</div>

  <div class="svc-grid">
    @foreach($tiles as $it)
      @php
        $title = $it['title'] ?? 'Dịch vụ';
        $url   = $it['url']   ?? '#';
        $img   = $it['img']   ?? 'https://picsum.photos/seed/vinap-svc/800/500';
      @endphp
      <a href="{{ $url }}" class="svc-card" aria-label="{{ $title }}">
        <figure class="svc-media">
          <img src="{{ $img }}" alt="{{ $title }}" loading="lazy">
          <span class="svc-veil"></span>
          <span class="svc-cta" aria-hidden="true">
            <svg viewBox="0 0 24 24" width="18" height="18"><path d="M9 6l6 6-6 6" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"/></svg>
          </span>
        </figure>
        <figcaption class="svc-caption">
          <div class="svc-title">{{ $title }}</div>
          <div class="svc-sub">Giải pháp nhanh, chuẩn, minh bạch.</div>
        </figcaption>
      </a>
    @endforeach
  </div>
</section>

<style>
  /* ===== scoped theo id để không đè global ===== */
  #{{ $sid }} .svc-grid{
    display:grid;
    grid-template-columns: repeat(5, minmax(220px, 1fr)); /* Desktop: đúng 5 ô */
    gap: 22px;
  }
  @media (max-width: 1199.98px){ #{{ $sid }} .svc-grid{ grid-template-columns: repeat(3, minmax(220px,1fr)); } }
  @media (max-width: 767.98px){  #{{ $sid }} .svc-grid{ grid-template-columns: repeat(2, minmax(200px,1fr)); } }
  @media (max-width: 480px){      #{{ $sid }} .svc-grid{ grid-template-columns: 1fr; } }

  #{{ $sid }} .svc-card{
    display:flex; flex-direction:column; text-decoration:none; color:#0f172a;
    border:1px solid #e9f0ea; border-radius:18px; overflow:hidden;
    background:#fff; box-shadow:0 10px 26px rgba(17,68,43,.08);
    transition:transform .2s, box-shadow .2s, border-color .2s;
  }
  #{{ $sid }} .svc-card:hover{
    transform:translateY(-4px);
    box-shadow:0 18px 48px rgba(30,155,90,.18);
    border-color:#d7efe2;
  }

  #{{ $sid }} .svc-media{ position:relative; width:100%; aspect-ratio: 16/9; margin:0; overflow:hidden; }
  #{{ $sid }} .svc-media img{ width:100%; height:100%; object-fit:cover; object-position:center; transform:scale(1.02); transition:transform .35s ease; display:block; }
  #{{ $sid }} .svc-card:hover .svc-media img{ transform:scale(1.08); }

  #{{ $sid }} .svc-veil{
    position:absolute; inset:0;
    background:linear-gradient(to top, rgba(0,0,0,.35), rgba(0,0,0,.05));
    opacity:.4; transition:opacity .25s ease;
  }
  #{{ $sid }} .svc-card:hover .svc-veil{ opacity:.55; }

  #{{ $sid }} .svc-cta{
    position:absolute; right:12px; bottom:12px;
    width:36px; height:36px; border-radius:999px;
    display:grid; place-items:center;
    background:#ffffff; color:#0f7751; border:1px solid #d9efe3;
    box-shadow:0 6px 16px rgba(16,123,79,.18);
    transform:translateY(8px); opacity:0; transition:.25s ease;
  }
  #{{ $sid }} .svc-card:hover .svc-cta{ transform:none; opacity:1; }

  #{{ $sid }} .svc-caption{ padding:14px 16px 16px; }
  #{{ $sid }} .svc-title{
    font-weight:800; line-height:1.25; font-size: clamp(15px, 1.1vw, 18px);
  }
  #{{ $sid }} .svc-sub{
    margin-top:6px; color:#63726b; font-size:.93rem; line-height:1.35;
  }
</style>
@endif
