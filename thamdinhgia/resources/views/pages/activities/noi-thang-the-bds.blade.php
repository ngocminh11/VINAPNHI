@extends('layouts.app')
@section('title','Doanh nghiệp nội "thắng thế" trên mặt trận BĐS')

@php
  use Illuminate\Support\Facades\File;
  $banner = File::exists(public_path('images/hoatdong/noithang.jpg'))
      ? asset('images/hoatdong/noithang.jpg')
      : 'https://images.unsplash.com/photo-1501183638710-841dd1904471?q=80&w=1600&auto=format&fit=crop';
  $slug   = 'doanh-nghiep-noi-thang-the-tren-mat-tran-bds';
  $all    = config('site.home.companyActivities') ?? [];
  // Lấy 4-6 bài liên quan ngẫu nhiên
  $related = collect($all)
    ->filter(fn($x)=> mb_strtoupper($x['title']??'') !== 'DOANH NGHIỆP NỘI "THẮNG THẾ" TRÊN MẶT TRẬN BĐS')
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
        <h1 class="m-0">Doanh nghiệp nội “thắng thế” trên mặt trận BĐS</h1>
      </div>
    </div>
  </div>
</section>

<section class="container my-4">
  <div class="row g-4">
    <div class="col-lg-8">
      <article class="article card-lite p-4">
        <img class="figure mb-3" src="https://images.unsplash.com/photo-1460353581641-37baddab0fa2?q=80&w=1600&auto=format&fit=crop" alt="Vietnam Real Estate">

        <p><strong>Từng huy động vốn từ nước ngoài</strong> và tự mình phát triển thành công nhiều dự án bất động sản ở Việt Nam, Tổng giám đốc Indochina Land <strong>Peter Ryder</strong> mới đây bất ngờ tuyên bố sẽ bắt tay với một vài doanh nghiệp trong nước để đầu tư những dự án mới.</p>
        <p>Từng huy động vốn từ nước ngoài và tự mình phát triển thành công nhiều dự án bất động sản ở Việt Nam, Tổng giám đốc Indochina Land Peter Ryder mới đây bất ngờ tuyên bố sẽ bắt tay với một vài doanh nghiệp trong nước để đầu tư những dự án mới.</p>

        <h5>Doanh nghiệp Việt nâng tầm vị thế</h5>
        <p>Bước ngoặt trong chiến lược kinh doanh bắt nguồn từ thay đổi cách nhìn nhận vị thế của doanh nghiệp Việt trên thị trường bất động sản. Nhiều doanh nghiệp trong nước đã tích lũy được kinh nghiệm phát triển dự án, tiềm lực tài chính, quan hệ rộng và thấu hiểu văn hóa kinh doanh, đang dần vươn lên chiếm lĩnh thị trường. Lựa chọn khôn ngoan là tìm kiếm đối tác trong nước tin cậy để hợp tác đầu tư.</p>

        <h5>Những lời khen từ chuyên gia</h5>
        <p>Không chỉ nhà đầu tư như Peter Ryder, các nhà tư vấn chuyên nghiệp như <strong>Marc Townsend</strong> (Tổng giám đốc CBRE Việt Nam) cũng dành lời khen cho một số doanh nghiệp bất động sản trong nước. Với hơn 12 năm hoạt động tại thị trường Việt Nam, ông chứng kiến sự tiến bộ vượt bậc của <strong>Bitexco</strong>, <strong>Vingroup</strong>, <strong>Novaland</strong>.</p>
        <p>Những doanh nghiệp này đã chứng minh khả năng tự phát triển các dự án quy mô lớn, chất lượng cao, không thua kém nhà đầu tư nước ngoài. Thậm chí, nhiều dự án ở Việt Nam hiện có chất lượng tương đương Hồng Kông hoặc Singapore. Theo Marc Townsend, doanh nghiệp Việt đang chiếm thế áp đảo, lấn lướt cả nhà đầu tư ngoại.</p>

        <img class="figure mb-3" src="https://images.unsplash.com/photo-1494526585095-c41746248156?q=80&w=1600&auto=format&fit=crop" alt="Skyscraper">

        <h5>Bitexco: từ “bất khả thi” thành biểu tượng</h5>
        <p>Dù còn non trẻ, nhưng một số doanh nghiệp đã khẳng định vị thế. Bitexco là ví dụ điển hình: sau dự án The Manor tại Hà Nội và TP.HCM, họ tiếp tục phát triển các dự án tầm cỡ quốc tế như <strong>Bitexco Financial Tower 68 tầng</strong> và <strong>JW Marriott Hanoi</strong>.</p>
        <p>Khi bắt tay vào, hầu như không ai tin dự án sẽ thành hiện thực vì độ khó kỹ thuật và vốn đầu tư cực lớn. Nhưng Bitexco đã biến “không thể” thành “có thể”: <em>Bitexco Financial Tower</em> đưa vào hoạt động năm 2010, <em>JW Marriott Hanoi</em> năm 2013. Đây là doanh nghiệp Việt đầu tiên phát triển thành công nhà chọc trời và khách sạn 6 sao đủ tiêu chuẩn gắn thương hiệu quốc tế cao nhất là JW Marriott.</p>
        <p>Các tổ chức quốc tế đánh giá cao: năm 2014, Hội đồng nhà cao tầng (Mỹ) bình chọn Bitexco Financial Tower là một trong <strong>50 công trình sáng tạo nhất thập kỷ</strong>; năm 2013, <strong>CNN</strong> xếp vào Top 25 tòa nhà mang tính biểu tượng của thế giới.</p>
        <p>Về vận hành, cả hai dự án đều hoạt động tốt: công suất cho thuê của tòa tháp tại TP.HCM vượt 90%, công suất phòng của JW Marriott Hanoi đạt 79% trong nửa đầu 2015. Giá thuê phòng, văn phòng nằm trong nhóm cao nhất thị trường.</p>

        <h5>“Lật ngược thế cờ” trong khủng hoảng</h5>
        <p>Giai đoạn 2010–2013, thị trường rơi vào khủng hoảng: giá văn phòng giảm, khách sạn khó khăn, tín dụng siết chặt. Dù vậy, <strong>Vingroup</strong> vẫn hoàn thành các dự án lớn như Times City, Royal City; <strong>Novaland</strong> tranh thủ thâu tóm dự án, trở thành một trong những nhà đầu tư lớn nhất TP.HCM. <strong>Bitexco</strong> bám trụ, không cắt giảm chất lượng JW Marriott, đồng thời xúc tiến <em>The One HCMC</em> và <em>The Manor Central Park</em>.</p>

        <img class="figure mb-3" src="https://images.unsplash.com/photo-1542314831-068cd1dbfeeb?q=80&w=1600&auto=format&fit=crop" alt="Masterplan">

        <h5>The Manor Central Park: quy mô “khủng”</h5>
        <p><strong>The Manor Central Park</strong> có tổng vốn đầu tư gần 2 tỷ USD, diện tích gần 90ha, trải gần 1 km mặt đường Nguyễn Xiển. Đây được xem là “mảnh đất vàng” cuối cùng đủ lớn để phát triển một khu đô thị ở trung tâm Hà Nội. Với quy hoạch của các kiến trúc sư Mỹ, Nhật, dự án hướng đến một khu đô thị kiểu mẫu với hơn 1.000 biệt thự và nhà phố, hơn 7.000 căn hộ, trung tâm thương mại, trường học và công viên trung tâm 7ha. Dự kiến khởi công vào 08/2015.</p>

        <h5>Triển vọng phân khúc cao cấp</h5>
        <p>Theo ông <strong>Peter Ryder</strong>, dư địa thị trường Việt Nam còn rất lớn. Nhu cầu bất động sản cao cấp sẽ tiếp tục tăng. Tuy nhiên, không phải ai cũng làm được: các dự án cao cấp đòi hỏi ý tưởng khác biệt, năng lực triển khai chuyên nghiệp và khả năng tài chính vững.</p>
        <p>Một số tập đoàn trong nước đã vượt qua thách thức bằng cách kết hợp bản lĩnh, trí tuệ Việt với tinh hoa công nghệ quốc tế để đi tắt đón đầu, thậm chí làm tốt hơn nhà đầu tư ngoại.</p>

        <p class="text-muted fst-italic">Nguồn: DiaOcOnline.vn</p>

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

  // Rating
  const stars = document.querySelectorAll('#rateBox .star');
  const avgEl = document.getElementById('rateAvg');
  function getRate(){try{return JSON.parse(localStorage.getItem(RATE_KEY))||{sum:0,count:0}}catch{return{sum:0,count:0}}}
  function setRate(v){const r=getRate();r.sum+=v;r.count++;localStorage.setItem(RATE_KEY,JSON.stringify(r));paint()}
  function paint(){const r=getRate();avgEl.textContent=r.count?`${(r.sum/r.count).toFixed(1)}/5 • ${r.count} lượt`:'Chưa có đánh giá'}
  stars.forEach(s=>{s.style.color='#999';s.onclick=()=>setRate(+s.dataset.val)});
  paint();

  // Comments + pagination (localStorage demo)
  const form=document.getElementById('cmtForm'),list=document.getElementById('cmtList'),meta=document.getElementById('cmtMeta');
  const prevB=document.getElementById('prevCmt'),nextB=document.getElementById('nextCmt');let page=1;
  function seed(){return [
    {name:'Lan',content:'Phân tích rất chi tiết.',time:Date.now()-86400000*2},
    {name:'Hoàng',content:'Ví dụ Bitexco thuyết phục.',time:Date.now()-86400000*3},
    {name:'Nhi',content:'Đúng là doanh nghiệp Việt lên tay.',time:Date.now()-86400000*4},
    {name:'Tuấn',content:'Tổng hợp số liệu rõ ràng.',time:Date.now()-86400000*5},
    {name:'Long',content:'Đọc mượt, dễ hiểu.',time:Date.now()-86400000*6},
    {name:'Vy',content:'Mong có thêm phần số hóa.',time:Date.now()-86400000*7},
  ].slice(0,4+Math.floor(Math.random()*3))}
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
