@extends('layouts.app')
@section('title','Chiến lược kinh doanh hiệu quả')

@php
  use Illuminate\Support\Facades\File;
  $banner = File::exists(public_path('images/hoatdong/chienthuat.jpg'))
      ? asset('images/hoatdong/chienthuat.jpg')
      : 'https://images.unsplash.com/photo-1552664730-d307ca884978?q=80&w=1600&auto=format&fit=crop';
  $slug   = 'chien-luoc-kinh-doanh-hieu-qua';
  $all    = config('site.home.companyActivities') ?? [];
  // Bài liên quan ngẫu nhiên 4-6 (lọc trùng tiêu đề hiện tại)
  $related = collect($all)
    ->filter(fn($x)=> mb_strtoupper($x['title']??'') !== 'CHIẾN LƯỢC KINH DOANH HIỆU QUẢ')
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
        <h1 class="m-0">Chiến lược kinh doanh hiệu quả</h1>
      </div>
    </div>
  </div>
</section>

<section class="container my-4">
  <div class="row g-4">
    <div class="col-lg-8">
      <article class="article card-lite p-4">
        <img class="figure mb-3" src="https://images.unsplash.com/photo-1522071820081-009f0129c71c?q=80&w=1600&auto=format&fit=crop" alt="Business Strategy">
        <p><strong>Một chiến lược kinh doanh hiệu quả</strong> khi và chỉ khi nó tạo ra được sự khác biệt và sự khác biệt đó phải mang lại thành công cho doanh nghiệp. Kiến thức - Chiến lược kinh doanh hiệu quả - chiến lược tạo sự khác biệt.</p>

        <p>Mọi chiến lược thành công đều liên quan đến việc tạo sự khác biệt, ngay cả chiến lược dẫn đầu về chi phí thấp. “Chúng tôi có thể đưa quý vị bay đến Genoa nhanh hơn các đối thủ cạnh tranh”, “Hàng của chúng tôi không thể bán rẻ hơn được nữa”,… Nhưng với hầu hết công ty, sự khác biệt được thể hiện theo cách mà khách hàng đánh giá cao.</p>

        <p>Ví dụ, khi Thomas Edison bắt đầu tiếp thị hệ thống đèn điện của mình, các đối thủ chính của ông là những công ty gas địa phương. Cả hai phương pháp chiếu sáng này đều hiệu quả, nhưng phương pháp của Edison có sự khác biệt rõ ràng mà phần lớn khách hàng đều ủng hộ.</p>

        <p>Khác với đèn dùng gas, đèn điện không tỏa nhiệt nhiều trong phòng vào những đêm hè nóng bức. Đèn điện lại thuận tiện hơn, chỉ cần ấn nhẹ công tắc để bật hoặc tắt đèn, và nó còn loại bỏ được nguy cơ hỏa hoạn nghiêm trọng trong nhiều ứng dụng. Edison đã tạo ra những khác biệt này khi tấn công và loại bỏ sự thống trị ở lĩnh vực chiếu sáng đô thị của các công ty gas vào cuối thập niên 1800.</p>

        <p>Tương tự, ngày nay các công ty áp dụng chiến lược tạo nên sự khác biệt. Hãy xem ngành công nghiệp ô tô. Volvo giới thiệu đặc tính bền vững và an toàn để tạo nên sự khác biệt. Toyota nổi tiếng về chất lượng nhưng giá bán lại cao, và gần đây hãng này lại tạo nên sự khác biệt với mô hình xe Prius sử dụng động cơ hybrid. Mini Cooper thì tuyên bố với khách hàng rằng thật thú vị và đặc biệt khi dùng xe của họ. Porsche cũng làm cho mình khác biệt bằng cách tập trung phát triển các xe thể thao hiệu suất cao. Trong khi GM cung cấp các loại xe phù hợp với ngân sách của mọi gia đình và Toyota tự tin tuyên bố chất lượng và độ tin cậy cao, thì cả hai hãng này lại không tỏ ra hấp dẫn đối với những khách hàng quan tâm đến tốc độ, sự nhanh nhẹn và cảm giác điều khiển đường đua ở LeMans(1). Porsche đã làm được điều này thông qua chiến lược tạo nên sự khác biệt của mình.</p>

        <h5 class="mt-4">Làm sản phẩm thông thường trở nên khác biệt</h5>
        <p>Ngay cả với những sản phẩm thông thường, các nhà chiến lược kinh doanh cũng tìm thấy và khai thác các cơ hội để làm chúng trở nên khác biệt. Mặc dù giá cả và các đặc điểm sản phẩm có thể như nhau, nhưng vẫn có thể tạo nên sự khác biệt trên cơ sở dịch vụ. Ngành kinh doanh xi măng là một ví dụ. Xi măng vốn là một sản phẩm rất thông thường, không có gì đặc biệt. Tuy nhiên, công ty Cemex tại Mexico – nhà cung cấp lớn thứ ba thế giới – đã phát triển khả năng giao hàng nhanh chóng và tin cậy khiến sản phẩm của họ trở nên khác biệt rõ ràng so với các sản phẩm của nhiều đối thủ cạnh tranh.</p>

        <p>Cemex đã có được quyền lực công nghiệp mạnh mẽ trong nhiều thị trường vì họ đã chấp nhận chiến lược sản xuất và chiến lược hậu cần công nghệ cao nhằm giao hàng đúng hẹn đến 98% thời gian, so với 34% của hầu hết các đối thủ cạnh tranh. Trong lĩnh vực xây dựng, vốn luôn hoạt động theo quy trình chặt chẽ, việc giao hàng đúng hẹn được đánh giá rất cao, đặc biệt là khi việc giao hàng trễ đồng nghĩa với việc công nhân không có việc làm nhưng vẫn phải trả lương. Trong trường hợp này, uy tín cao đã tạo nên sự khác biệt hiệu quả cho một sản phẩm bình thường. Bạn có thể đạt được điều tương tự bằng cách cung cấp cho khách hàng dịch vụ hỗ trợ hoàn hảo.</p>

        <p class="text-muted fst-italic">Theo dntbinhduong.vn</p>

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

{{-- Icons sprite tối giản --}}
<svg width="0" height="0" style="position:absolute">
  <symbol id="icon-like" viewBox="0 0 24 24"><path fill="currentColor" d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 6 
  3.99 4 6.5 4c1.74 0 3.41 1.01 4.22 2.55C11.09 5.01 12.76 4 14.5 4 17 4 19 6 19 8.5c0 3.78-3.4 
  6.86-8.55 11.54L12 21.35z"/></symbol>
</svg>

<script>
(function(){
  const SLUG = @json($slug);
  const RATE_KEY = 'rate:' + SLUG;
  const CMT_KEY  = 'cmt:'  + SLUG;
  const PER_PAGE = 5;

  // -------- Rating (localStorage) --------
  const stars = document.querySelectorAll('#rateBox .star');
  const avgEl = document.getElementById('rateAvg');

  function getRate(){
    try{ return JSON.parse(localStorage.getItem(RATE_KEY)) || {sum:0, count:0}; }catch{ return {sum:0,count:0}; }
  }
  function setRate(v){
    const r = getRate();
    r.sum += v; r.count += 1;
    localStorage.setItem(RATE_KEY, JSON.stringify(r));
    paint();
  }
  function paint(){
    const r = getRate();
    const avg = r.count ? (r.sum/r.count).toFixed(1) : '—';
    avgEl.textContent = r.count ? `${avg}/5 • ${r.count} lượt` : 'Chưa có đánh giá';
  }
  stars.forEach(s=>{
    s.addEventListener('mouseenter', ()=> s.parentElement.querySelectorAll('.star').forEach(x=> x.style.color = (x.dataset.val <= s.dataset.val)?'#eab308':'#999'));
    s.addEventListener('mouseleave', ()=> s.parentElement.querySelectorAll('.star').forEach(x=> x.style.color = '#999'));
    s.addEventListener('click', ()=> setRate(Number(s.dataset.val)));
    s.style.color = '#999';
  });
  paint();

  // -------- Comments (localStorage + pagination) --------
  const form   = document.getElementById('cmtForm');
  const list   = document.getElementById('cmtList');
  const meta   = document.getElementById('cmtMeta');
  const prevB  = document.getElementById('prevCmt');
  const nextB  = document.getElementById('nextCmt');
  let page = 1;

  function getCmts(){
    try{ return JSON.parse(localStorage.getItem(CMT_KEY)) || seed(); }catch{ return seed(); }
  }
  function saveCmts(arr){ localStorage.setItem(CMT_KEY, JSON.stringify(arr)); }
  function seed(){
    // 4–6 mẫu ngẫu nhiên
    const sample = [
      {name:'Minh', content:'Bài viết rõ ràng. Điểm hay là ví dụ Cemex rất dễ áp dụng.', time:Date.now()-86400000*2},
      {name:'Trang', content:'Nhấn mạnh “khác biệt có giá trị” là chuẩn.', time:Date.now()-86400000*3},
      {name:'Hải', content:'Thêm case Việt Nam nữa thì càng đã.', time:Date.now()-86400000*4},
      {name:'Loan', content:'Phần ô tô đọc cuốn phết.', time:Date.now()-86400000*5},
      {name:'Dương', content:'Vote 5 sao.', time:Date.now()-86400000*6},
      {name:'Anh', content:'Giao hàng đúng hẹn là vũ khí dịch vụ, đồng ý.', time:Date.now()-86400000*7},
    ];
    const n = 4 + Math.floor(Math.random()*3);
    return sample.slice(0, n);
  }

  function render(){
    const all = getCmts().sort((a,b)=> b.time - a.time);
    const total = all.length;
    const pages = Math.max(1, Math.ceil(total / PER_PAGE));
    page = Math.min(Math.max(1, page), pages);
    const start = (page-1)*PER_PAGE, end = start + PER_PAGE;
    const chunk = all.slice(start, end);

    list.innerHTML = '';
    chunk.forEach(c=>{
      const el = document.createElement('div');
      el.className = 'comment-card mb-2';
      el.innerHTML = `
        <div class="d-flex justify-content-between">
          <strong>${escapeHtml(c.name||'Khách')}</strong>
          <span class="small text-muted">${new Date(c.time).toLocaleString()}</span>
        </div>
        <div class="mt-1">${escapeHtml(c.content||'')}</div>`;
      list.appendChild(el);
    });

    meta.textContent = `Trang ${page}/${pages} • ${total} bình luận`;
    prevB.disabled = page<=1; nextB.disabled = page>=pages;
  }

  function escapeHtml(s){ return String(s).replace(/[&<>"']/g, m=>({ '&':'&amp;','<':'&lt;','>':'&gt;','"':'&quot;',"'":'&#39;' }[m])); }

  form.addEventListener('submit', e=>{
    e.preventDefault();
    const fd = new FormData(form);
    const name = (fd.get('name')||'').trim();
    const content = (fd.get('content')||'').trim();
    if(!name || !content) return;
    const arr = getCmts();
    arr.push({name, content, time: Date.now()});
    saveCmts(arr);
    form.reset();
    page = 1; // về trang 1 để thấy bình luận mới
    render();
  });

  prevB.addEventListener('click', ()=> { page--; render(); });
  nextB.addEventListener('click', ()=> { page++; render(); });

  // init
  if(!localStorage.getItem(CMT_KEY)) saveCmts(getCmts());
  render();
})();
</script>
@endsection
