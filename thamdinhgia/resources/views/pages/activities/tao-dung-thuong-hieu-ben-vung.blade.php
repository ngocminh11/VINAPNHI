@extends('layouts.app')
@section('title','Tạo dựng thương hiệu bền vững')

@php
  use Illuminate\Support\Facades\File;
  $banner = File::exists(public_path('images/hoatdong/thuonghieu2.jpg'))
      ? asset('images/hoatdong/thuonghieu2.jpg')
      : 'https://images.unsplash.com/photo-1611162617213-7dc88b1a6f8f?q=80&w=1600&auto=format&fit=crop';
  $slug   = 'tao-dung-thuong-hieu-ben-vung';
  $all    = config('site.home.companyActivities') ?? [];
  $related = collect($all)
    ->filter(fn($x)=> mb_strtoupper($x['title']??'') !== 'TẠO DỰNG THƯƠNG HIỆU BỀN VỮNG')
    ->shuffle()->take(rand(4,6));
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
</style>

<section class="container my-3">
  <div class="hero-mini" style="background:url('{{ $banner }}') center/cover no-repeat">
    <div class="inner">
      <div>
        <div class="badge bg-success-subtle text-success mb-2">Hoạt động công ty</div>
        <h1 class="m-0">Tạo dựng thương hiệu bền vững</h1>
      </div>
    </div>
  </div>
</section>

<section class="container my-4">
  <div class="row g-4">
    <div class="col-lg-8">
      <article class="article card-lite p-4">
        <img class="figure mb-3" src="https://images.unsplash.com/photo-1519389950473-47ba0277781c?q=80&w=1600&auto=format&fit=crop" alt="Brand Strategy">
        
        <p><strong>Xây dựng thương hiệu</strong> là một quá trình liên tục và không có điểm kết thúc. Công ty xây dựng thương hiệu chính là việc xây dựng sự phát triển bền vững và dài hạn.</p>
        <p>Có 2 bước chính để tạo dựng thương hiệu và bạn cần phải gắn kết các bước này đến mọi hoạt động của doanh nghiệp:</p>

        <h5>1. Kiên trì và luôn sáng tạo</h5>
        <p>Thương hiệu không thể xây dựng được trong một sớm một chiều. Để xây dựng được một thương hiệu, bạn phải kiên nhẫn và không được bỏ cuộc. Bạn phải luôn đưa ra những thông điệp và tạo các kinh nghiệm thương hiệu để thông tin và hỗ trợ một cách nhất quán lời hứa thương hiệu của mình. Không chỉ vậy, trong quá trình xây dựng và định vị thương hiệu, ý tưởng sáng tạo luôn luôn được ưu tiên phát huy nhất.</p>
        <p>Có lẽ đây là một trong những bí quyết xây dựng thương hiệu mà các doanh nghiệp Việt Nam thường lãng quên. Các kế hoạch thương hiệu của doanh nghiệp Việt thường mang tính chất ngắn hạn, nỗ lực xây dựng thương hiệu và tiếp thị thường mang tính chất sự vụ nhằm đáp ứng nhu cầu tăng trưởng doanh thu hay giải quyết hàng tồn kho hơn là có một kế hoạch xây dựng thương hiệu dài hạn và chiến lược.</p>
        <p>Xây dựng thương hiệu cần sự kiên trì và sáng tạo; một thương hiệu mạnh được tạo ra bằng sự kiên trì, và duy trì sức mạnh thương hiệu càng đòi hỏi sự kiên trì của doanh nghiệp. Xây dựng thương hiệu là một quá trình liên tục và không có điểm kết thúc.</p>

        <p>Một ví dụ điển hình trong làng thương hiệu Việt bền vững đó là <strong>Cà phê Trung Nguyên</strong>. Vào giữa những năm 1990, Việt Nam đã là một trong ba nhà sản xuất cà phê lớn nhất thế giới. Tuy nhiên, hầu hết cà phê của Việt Nam đều có chất lượng thấp và xuất khẩu với giá thấp. Với niềm tin rằng những hạt cà phê chất lượng, đặc biệt của Việt Nam có thể được sản xuất và bán với giá trị cao tương xứng, năm 1996 doanh nhân <strong>Đặng Lê Nguyên Vũ</strong> đã thành lập Trung Nguyên, công ty sản xuất cà phê cùng hệ thống quán cà phê.</p>

        <p>Cách làm thương hiệu của Trung Nguyên là khơi lại tinh thần Việt kết hợp di sản văn hóa và tính hiện đại, được thể hiện rõ trên bao bì, trong mô hình thiết kế, trang trí của các quán cà phê. Với slogan <em>“Khơi nguồn sáng tạo”</em>, Trung Nguyên đã tạo cảm hứng, thúc đẩy sáng tạo cho những người thưởng thức cà phê.</p>

        <h5>2. Nhất quán</h5>
        <p>Thương hiệu được tạo dựng khi khách hàng tin vào lời hứa của thương hiệu mà họ đã được kiểm chứng bằng những trải nghiệm trong thực tế. Những trải nghiệm này tạo thành nhận thức và mong đợi. Nếu thương hiệu của bạn không đáp ứng được mong đợi của khách hàng tại mọi điểm tiếp xúc của thương hiệu thì khách hàng sẽ cảm thấy bối rối và kết cục là họ sẽ tìm kiếm một thương hiệu khác.</p>

        <p>Để đạt được sự nhất quán này, bạn phải có một chiến lược thương hiệu xuyên suốt, kết nối được chiến lược này vào mọi công đoạn trong mô hình kinh doanh, thể hiện được chiến lược này thông qua các thông điệp truyền thông cũng như hình ảnh nhất quán (hệ thống nhận diện thương hiệu).</p>

        <p>Nhìn lại thương hiệu <strong>Vinamilk</strong> bền vững. Phát triển vươn mình từ doanh nghiệp 100% vốn nhà nước, bước sang thời kỳ đổi mới Vinamilk hiểu để phát triển mở rộng sản xuất, đa dạng hóa sản phẩm sữa hơn lúc nào hết phải chủ động xây dựng nguồn nguyên liệu tại chỗ đảm bảo chất lượng. Chính vì vậy, dù cho rất nhiều mặt hàng sữa ngoại xâm nhập thị trường Việt nhưng Vinamilk vẫn giữ được thị trường và phát triển.</p>

        <p>Đặc biệt, vừa qua trong khi một loạt thương hiệu sữa ngoại dính nghi vấn nhiễm khuẩn, Vinamilk vẫn tiếp tục khẳng định sự phát triển bền vững của mình với phương châm “Chất lượng là hàng đầu”.</p>

        <p class="mt-3"><strong>Tóm lại</strong>, xây dựng thương hiệu là một quá trình liên tục và không có điểm kết thúc. Khi bạn xây dựng thương hiệu chính là bạn đang xây dựng sự phát triển bền vững và dài hạn. Mặc dù giá trị thương hiệu không được ghi nhận trong bản cân đối kế toán, nhưng thương hiệu là một tài sản vô giá của doanh nghiệp – điều này đã được thừa nhận.</p>

        <p class="text-muted fst-italic">Nguyễn Hảo (TH)</p>

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
              $img  = $r['img'] ?? 'https://picsum.photos/seed/rel/120/80';
            @endphp
            <li class="d-flex gap-2 mb-2">
              <a href="{{ $href }}">
                <img src="{{ $img }}" alt="" width="96" height="64" style="object-fit:cover;border-radius:8px">
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
  function getCmts(){try{return JSON.parse(localStorage.getItem(CMT_KEY))||seed()}catch{return seed()}}
  function saveCmts(a){localStorage.setItem(CMT_KEY,JSON.stringify(a))}
  function seed(){const s=[
    {name:'Mai',content:'Phân tích Trung Nguyên quá hay.',time:Date.now()-86400000*2},
    {name:'Đức',content:'Rất đúng: thương hiệu phải kiên trì.',time:Date.now()-86400000*3},
    {name:'Hạnh',content:'Ví dụ Vinamilk rất chuẩn.',time:Date.now()-86400000*4},
    {name:'Khoa',content:'Đọc xong muốn làm branding luôn.',time:Date.now()-86400000*5},
    {name:'Trí',content:'Chi tiết mà dễ hiểu.',time:Date.now()-86400000*6},
  ];return s.slice(0,4+Math.floor(Math.random()*3))}
  function render(){const a=getCmts().sort((x,y)=>y.time-x.time),t=a.length,p=Math.ceil(t/5);page=Math.min(Math.max(1,page),p);
    const c=a.slice((page-1)*5,page*5);list.innerHTML='';
    c.forEach(i=>{list.innerHTML+=`<div class='comment-card mb-2'><strong>${i.name}</strong><div>${i.content}</div>
      <div class='small text-muted'>${new Date(i.time).toLocaleString()}</div></div>`});
    meta.textContent=`Trang ${page}/${p} • ${t} bình luận`;prevB.disabled=page<=1;nextB.disabled=page>=p;}
  form.onsubmit=e=>{e.preventDefault();const f=new FormData(form);const n=f.get('name'),c=f.get('content');if(!n||!c)return;
    const a=getCmts();a.push({name:n,content:c,time:Date.now()});saveCmts(a);form.reset();page=1;render();}
  prevB.onclick=()=>{page--;render()};nextB.onclick=()=>{page++;render()};
  if(!localStorage.getItem(CMT_KEY))saveCmts(getCmts());render();
})();
</script>
@endsection
