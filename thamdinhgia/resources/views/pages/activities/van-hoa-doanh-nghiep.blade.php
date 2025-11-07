@extends('layouts.app')
@section('title','Xây dựng văn hoá doanh nghiệp')

@php
  use Illuminate\Support\Facades\File;
  use Illuminate\Support\Str;
  $banner = File::exists(public_path('images/hoatdong/vanhoa.jpg'))
      ? asset('images/hoatdong/vanhoa.jpg')
      : 'https://images.unsplash.com/photo-1521737604893-d14cc237f11d?q=80&w=1600&auto=format&fit=crop';
  $slug   = 'xay-dung-van-hoa-doanh-nghiep';
  $all    = config('site.home.companyActivities') ?? [];
  $related = collect($all)
    ->filter(fn($x)=> mb_strtoupper($x['title']??'') !== 'XÂY DỰNG VĂN HÓA DOANH NGHIỆP')
    ->shuffle()->take(rand(4,6));
   $actImg = function(array $a) {
    $fallback = asset('images/placeholder-thumb.svg');

    if (!empty($a['img'])) {
        $pathOnly = ltrim(parse_url($a['img'], PHP_URL_PATH) ?? '', '/');
        if ($pathOnly && File::exists(public_path($pathOnly))) return asset($pathOnly);
        return $a['img'];
    }

    $slug = $a['slug'] ?? Str::slug($a['title'] ?? '');
    foreach (["image/{$slug}.jpg", "images/hoatdong/{$slug}.jpg"] as $rel) {
        if (File::exists(public_path($rel))) return asset($rel);
    }

    $titleU = mb_strtoupper($a['title'] ?? '');
    $map = [
        'VĂN HÓA'    => 'image/xaydung',
        'CHIẾN LƯỢC' => 'image/chienluoc',
        'TẠO DỰNG'   => 'image/taodung',
        'THẮNG THẾ'  => 'image/thangthe',
    ];

    foreach ($map as $kw => $rel) {
        if (!str_contains($titleU, $kw)) continue;

        $abs = public_path($rel);

        // Nếu là thư mục: lấy file ảnh đầu tiên
        if (File::isDirectory($abs)) {
            $files = collect(File::files($abs))
                ->filter(fn($f) => preg_match('/\.(jpe?g|png|webp)$/i', $f->getFilename()))
                ->sortBy(fn($f) => $f->getFilename())
                ->values();
            if ($files->isNotEmpty()) {
                $first = trim(str_replace(public_path(), '', $files[0]->getPathname()), DIRECTORY_SEPARATOR);
                return asset($first);
            }
        }

        // Nếu là file đơn: xaydung.jpg...
        if (File::exists($abs.'.jpg')) return asset($rel.'.jpg');
        if (File::exists($abs.'.png')) return asset($rel.'.png');
        if (File::exists($abs.'.webp')) return asset($rel.'.webp');
    }

    return $fallback;
};
@endphp

@section('content')
<style>
  .hero-mini{position:relative;min-height:42vh;border-radius:18px;overflow:hidden}
  .hero-mini::before{content:"";position:absolute;inset:0;background:linear-gradient(180deg,rgba(0,0,0,.25),rgba(0,0,0,.6))}
  .hero-mini .inner{position:absolute;inset:0;display:grid;place-items:end start;color:#fff;padding:24px}
  .article h1{font-weight:800}
  .article img.figure{border-radius:14px;width:100%;height:auto;object-fit:cover}
  .rating .star{cursor:pointer;font-size:22px}
  .comment-card{border:1px solid #e8eee9;border-radius:12px;padding:12px}
  .pager button{border:1px solid #e5e9e8;border-radius:8px;padding:6px 10px;background:#fff}
  .card-lite{border:1px solid #e7efe9;border-radius:16px;background:#fff;box-shadow:0 8px 26px rgba(16,123,79,.06)}
  .related-thumb{
    width:96px;height:64px;object-fit:cover;border-radius:8px;flex:0 0 auto
  }
</style>

<section class="container my-3">
  <div class="hero-mini" style="background:url('{{ $banner }}') center/cover no-repeat">
    <div class="inner">
      <div>
        <div class="badge bg-success-subtle text-success mb-2">Hoạt động công ty</div>
        <h1 class="m-0">Xây dựng văn hoá doanh nghiệp</h1>
      </div>
    </div>
  </div>
</section>

<section class="container my-4">
  <div class="row g-4">
    <div class="col-lg-8">
      <article class="article card-lite p-4">
        <img class="figure mb-3" src="https://images.unsplash.com/photo-1556761175-129418cb2dfe?q=80&w=1600&auto=format&fit=crop" alt="Corporate Culture">

        <h4 class="mb-3 text-success">Văn hoá doanh nghiệp</h4>
        <p>Trong một doanh nghiệp, đặc biệt là những doanh nghiệp có quy mô lớn, là một tập hợp những con người khác nhau về trình độ chuyên môn, trình độ văn hóa, mức độ nhận thức, quan hệ xã hội, vùng miền địa lý, tư tưởng văn hóa… chính sự khác nhau này tạo ra một môi trường làm việc đa dạng và phức tạp.</p>

        <p>Bên cạnh đó, với sự cạnh tranh gay gắt của nền kinh tế thị trường và xu hướng toàn cầu hóa, buộc các doanh nghiệp để tồn tại và phát triển phải liên tục tìm tòi những cái mới, sáng tạo và thay đổi cho phù hợp với thực tế.</p>

        <p>Vậy làm thế nào để doanh nghiệp trở thành nơi tập hợp, phát huy mọi nguồn lực con người, làm gia tăng nhiều lần giá trị của từng nguồn lực con người đơn lẻ, góp phần vào sự phát triển bền vững của doanh nghiệp. Điều này đòi hỏi doanh nghiệp phải xây dựng và duy trì một nề nếp văn hóa đặc thù phát huy được năng lực và thúc đẩy sự đóng góp của tất cả mọi người vào việc đạt được mục tiêu chung của tổ chức — đó là <strong>Văn hóa doanh nghiệp (VHDN)</strong>.</p>

        {{-- Rating --}}
        <hr>
        <div class="rating d-flex align-items-center gap-2" id="rateBox">
          <span class="me-2">Đánh giá bài viết:</span>
          @for($i=1; $i<=5; $i++)
            <span class="star" data-val="{{ $i }}">★</span>
          @endfor
          <span class="ms-2 small text-muted" id="rateAvg"></span>
        </div>
      </article>

      {{-- Comments --}}
      <section class="card-lite p-4 mt-3" id="cmtBox">
        <h5 class="mb-3">Bình luận</h5>
        <form id="cmtForm" class="row g-2">
          @csrf
          <div class="col-md-6"><input required class="form-control" name="name" placeholder="Tên của bạn"></div>
          <div class="col-md-6"><input class="form-control" name="email" placeholder="Email (không bắt buộc)"></div>
          <div class="col-12"><textarea required class="form-control" name="content" rows="3" placeholder="Nội dung bình luận"></textarea></div>
          <div class="col-12"><button class="btn btn-success">Gửi bình luận</button></div>
        </form>

        <div class="mt-3" id="cmtList"></div>

        <div class="d-flex gap-2 align-items-center mt-2 pager">
          <button type="button" id="prevCmt">Trang trước</button>
          <span class="small text-muted" id="cmtMeta"></span>
          <button type="button" id="nextCmt">Trang sau</button>
        </div>
      </section>
    </div>

    {{-- Sidebar --}}
    <aside class="col-lg-4">
      <div class="card-lite p-3">
        <h6 class="mb-2">Bài viết liên quan</h6>
        <ul class="list-unstyled m-0">
          @foreach($related as $r)
            @php
              $href = isset($r['route']) ? route($r['route']) : ($r['url'] ?? '#');
              $img  = $actImg($r);   // <-- thay vì picsum
            @endphp
            <li class="d-flex gap-2 mb-2">
              <a href="{{ $href }}">
                    <img src="{{ $img }}" alt="" class="related-thumb">
              </a>
              <div>
                <a class="text-decoration-none fw-semibold" href="{{ $href }}">
                  {{ $r['title'] ?? 'Bài viết' }}
                </a>
                @if(!empty($r['date'])) <div class="small text-muted">{{ $r['date'] }}</div> @endif
              </div>
            </li>
          @endforeach
        </ul>
      </div>
    </aside>
  </div>
</section>

<script>
(function(){
  const SLUG = @json($slug);
  const RATE_KEY = 'rate:' + SLUG;
  const CMT_KEY  = 'cmt:'  + SLUG;
  const PER_PAGE = 5;

  const stars = document.querySelectorAll('#rateBox .star');
  const avgEl = document.getElementById('rateAvg');
  function getRate(){try{return JSON.parse(localStorage.getItem(RATE_KEY))||{sum:0,count:0}}catch{return{sum:0,count:0}}}
  function setRate(v){const r=getRate();r.sum+=v;r.count++;localStorage.setItem(RATE_KEY,JSON.stringify(r));paint()}
  function paint(){const r=getRate();avgEl.textContent=r.count?`${(r.sum/r.count).toFixed(1)}/5 • ${r.count} lượt`:'Chưa có đánh giá'}
  stars.forEach(s=>{s.style.color='#999';s.onclick=()=>setRate(+s.dataset.val)});
  paint();

  const form=document.getElementById('cmtForm'),list=document.getElementById('cmtList'),meta=document.getElementById('cmtMeta');
  const prevB=document.getElementById('prevCmt'),nextB=document.getElementById('nextCmt');let page=1;
  function seed(){return [
    {name:'Linh',content:'Bài viết sâu sắc.',time:Date.now()-86400000*2},
    {name:'Tuấn',content:'Cảm hứng về văn hoá tổ chức.',time:Date.now()-86400000*3},
    {name:'Nga',content:'Thực tế và dễ hiểu.',time:Date.now()-86400000*4},
    {name:'Phúc',content:'Rất đúng với doanh nghiệp Việt.',time:Date.now()-86400000*5},
  ]}
  function getCmts(){try{return JSON.parse(localStorage.getItem(CMT_KEY))||seed()}catch{return seed()}}
  function saveCmts(a){localStorage.setItem(CMT_KEY,JSON.stringify(a))}
  function render(){const a=getCmts().sort((x,y)=>y.time-x.time),t=a.length,p=Math.max(1,Math.ceil(t/PER_PAGE));
    page=Math.min(Math.max(1,page),p);
    const c=a.slice((page-1)*PER_PAGE,page*PER_PAGE);list.innerHTML='';
    c.forEach(i=>{list.innerHTML+=`<div class='comment-card mb-2'><strong>${i.name}</strong><div>${i.content}</div>
      <div class='small text-muted'>${new Date(i.time).toLocaleString()}</div></div>`});
    meta.textContent=`Trang ${page}/${p} • ${t} bình luận`;prevB.disabled=page<=1;nextB.disabled=page>=p;}
  form.onsubmit=e=>{e.preventDefault();const f=new FormData(form);const n=f.get('name'),c=f.get('content');if(!n||!c)return;
    const a=getCmts();a.push({name:n,content:c,time:Date.now()});saveCmts(a);form.reset();page=1;render()}
  prevB.onclick=()=>{page--;render()};nextB.onclick=()=>{page++;render()};
  if(!localStorage.getItem(CMT_KEY))saveCmts(getCmts());render();
})();
</script>
@endsection
