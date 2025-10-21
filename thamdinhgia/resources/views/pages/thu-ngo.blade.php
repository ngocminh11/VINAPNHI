@extends('layouts.app')
@section('title','VINAP • Thư ngỏ')

@section('content')
@php
  use Illuminate\Support\Facades\File;

  // Banner ưu tiên ảnh thật, sau đó placeholder
  $banner = File::exists(public_path('images/thu-ngo-banner.jpg'))
      ? asset('images/thu-ngo-banner.jpg')
      : (File::exists(public_path('images/placeholder-hero.jpg'))
          ? asset('images/placeholder-hero.jpg')
          : 'https://picsum.photos/seed/vinap-letter/1600/900');

  // Strip dịch vụ nổi bật (5 ô)
  $featuredServices = [
    ['icon'=>'home',      'title'=>'Thẩm định giá',         'url'=>route('services.index')],
    ['icon'=>'briefcase', 'title'=>'Đấu giá BĐS, tài sản',  'url'=>route('services.index')],
    ['icon'=>'gear',      'title'=>'Chuyển nhượng dự án',   'url'=>route('services.index')],
    ['icon'=>'chart',     'title'=>'Tư vấn đầu tư - BĐS',   'url'=>route('services.index')],
    ['icon'=>'map',       'title'=>'Nghiên cứu thị trường', 'url'=>route('services.index')],
  ];
@endphp

<style>
  /* Strip 5 cột đều nhau như trang chủ */
  .services-grid{display:grid;gap:1rem;grid-template-columns:repeat(2,minmax(0,1fr))}
  @media(min-width:576px){.services-grid{grid-template-columns:repeat(3,1fr)}}
  @media(min-width:992px){.services-grid{grid-template-columns:repeat(4,1fr)}}
  @media(min-width:1200px){.services-grid{grid-template-columns:repeat(5,1fr)}}
  .svc-card{display:flex;height:100%;align-items:stretch;border:1px solid #e9f0ea;border-radius:16px;background:#fff;box-shadow:var(--shadow);transition:transform .2s,box-shadow .2s,border-color .2s}
  .svc-card:hover{transform:translateY(-4px);box-shadow:0 16px 44px rgba(30,155,90,.14);border-color:#d7efe2}
  .svc-card .icon-wrap{flex:0 0 auto;border-radius:999px;background:#f2fbf6;padding:12px;display:grid;place-items:center;width:48px;height:48px}
  .svc-card .i{width:22px;height:22px;color:#1e9b5a}
  .svc-card .desc{color:#63726b;font-size:.92rem;line-height:1.35}
  /* Bảng testimonials kiểu “dọc” */
  .testi-table thead th{white-space:nowrap}
  .testi-table td{vertical-align:top}
  .testi-person{font-weight:600}
  .testi-role{font-style:italic;color:#6b7b73;font-size:.95rem}
</style>

{{-- BANNER full-screen + cue kéo xuống --}}
<section class="hero-full" style="background-image:url('{{ $banner }}');min-height:calc(100vh - var(--header-h));">
  <div class="hero-inner text-center">
    <h1 class="hero-title" data-animate>Thư ngỏ từ VINAP</h1>
    <p class="hero-sub" data-animate>Kính gửi Quý Khách hàng • Dear Clients</p>
  </div>
  <button id="scrollCue" class="scroll-cue" aria-label="Cuộn xuống">
    <svg viewBox="0 0 24 24" fill="none"><path d="M6 9l6 6 6-6" stroke="currentColor" stroke-width="2" stroke-linecap="round"/></svg>
  </button>
</section>

{{-- DỊCH VỤ NỔI BẬT: ngay dưới banner --}}
<section id="info-start" class="container my-5" data-animate>
  <div class="section-title mb-3">Dịch vụ nổi bật</div>
  <div class="services-grid">
    @foreach($featuredServices as $s)
      <a class="text-decoration-none text-dark" href="{{ $s['url'] }}">
        <div class="svc-card p-3">
          <div class="icon-wrap me-3">
            <svg class="i"><use href="#icon-{{ $s['icon'] }}"/></svg>
          </div>
          <div class="d-flex flex-column justify-content-center">
            <div class="fw-bold">{{ $s['title'] }}</div>
            <div class="desc">Giải pháp nhanh, chuẩn, minh bạch.</div>
          </div>
        </div>
      </a>
    @endforeach
  </div>
</section>

{{-- THƯ NGỎ + SIDEBAR --}}
<section class="container mb-5">
  <div class="row g-4">
    {{-- MAIN --}}
    <div class="col-lg-8">
      <article class="card-lite p-4" data-animate>
        <h2 class="fw-bold text-success mb-2">Kính gửi: Quý Khách hàng</h2>
        <p><strong>Dear Clients</strong></p>

        <p>Công ty Cổ phần Thẩm định giá và Tư vấn đầu tư Việt Nam (VINAP) xin trân trọng gửi tới Quý Khách hàng lời chúc sức khỏe và thành công.</p>
        <p class="fst-italic">Vietnam Appraisal and Investment Consulting Corporation (VINAP) respectfully extends our best wishes for your well-being and prosperity.</p>

        <p>Là một trong những Doanh nghiệp Thẩm định giá - Tư vấn đầu tư chuyên nghiệp tại Việt Nam với trên 10 năm hoạt động. VINAP đã tạo được uy tín trong thị trường dịch vụ thẩm định giá, tư vấn đầu tư. VINAP không ngừng hoàn thiện nhằm mang lại sự phục vụ chu đáo, chuyên nghiệp, an tâm về chất lượng, kịp thời, cùng tính chính xác cao, góp phần minh bạch thị trường, đáp ứng kịp thời và tốt nhất yêu cầu của Quý Khách hàng.</p>
        <p class="fst-italic">In the valuation and investment consulting service market, VINAP has established a reputation as one of the professional Valuation - Investment Consulting Enterprises in Vietnam, with more than 10 years of operation. VINAP is committed to providing professional, mindful service that is timely, accurate, and of high quality. This effort contributes to market transparency and ensures that the requirements of our clients are fulfilled quickly and effectively.</p>

        <p>VINAP đã và đang thực hiện thẩm định giá tài sản cho Hội đồng tố tụng hình sự cấp thành phố, Tòa Án, Thi hành án, các hồ sơ thực hiện nghĩa vụ tài chính, thanh lý tài sản Nhà nước… Bên cạnh đó, VINAP vinh dự được một số ngân hàng trong và ngoài nước tín nhiệm sử dụng dịch vụ thẩm định giá tài sản đảm bảo, xử lý nợ…</p>
        <p class="fst-italic">VINAP has been conducting asset valuations for the City-level Criminal Proceedings Council, courts, enforcement of judgments, financial obligation performance valuation, and liquidation of State assets. VINAP is grateful for the trust placed in us by numerous domestic and foreign banks to provide valuation services as collateral for debt settlement.</p>

        <p>Đáp lại sự tin cậy của Quý Khách hàng, VINAP đã không ngừng cải tiến, hoàn thiện chính mình. VINAP đã xây dựng hệ thống các chi nhánh, văn phòng đại diện, công ty liên kết và đặc biệt có đội ngũ cộng tác viên vững mạnh trải đều trên khắp mọi miền đất nước (Hà Nội, Nghệ An, Đà Nẵng, Quảng Nam, Quảng Ngãi, Bình Thuận, Lâm Đồng, Tây Ninh, Vĩnh Long…) và có khả năng đáp ứng tốt nhất các nhu cầu của Khách hàng.</p>
        <p class="fst-italic">VINAP has steadily enhanced and perfected ourselves in response to the confidence of our customers. VINAP has established a network of branches, representative offices, and affiliated companies, as well as an outstanding team of collaborators across the country (Hanoi, Nghe An, Da Nang, Quang Nam, Quang Ngai, Binh Thuan, Lam Dong, Tay Ninh, Vinh Long, etc.). This system is capable of effectively meeting client demands.</p>

        <p>VINAP cam kết thực hiện thẩm định giá đúng với giá trị của tài sản, đảm bảo rằng các giá trị được cung cấp trong Báo cáo thẩm định giá được chứng nhận sẽ sát với giá thị trường; nếu có sai lệch hoặc không minh bạch về giá trị VINAP sẽ hoàn phí thẩm định giá <strong>200%</strong> giá trị hợp đồng tư vấn. Ngoài ra, VINAP cung cấp dịch vụ hỗ trợ tư vấn 24/7 qua hình thức online cho mọi thắc mắc hoặc khiếu nại của khách hàng.</p>
        <p class="fst-italic">VINAP is fully committed to conducting the valuation in accordance with the asset's value, ensuring that the values provided in the verified valuation report are close to market price. In case of any discrepancy or lack of transparency, VINAP will refund the valuation fee at <strong>200%</strong> of the consulting value. Furthermore, VINAP offers 24/7 consultation support via online form for any inquiries or complaints.</p>

        <p>Ban giám đốc VINAP xin chân thành cảm ơn sự quan tâm, tín nhiệm và hợp tác mà Quý Khách hàng đang và sẽ dành cho Công ty.</p>
        <p class="fst-italic">The Board of Directors of VINAP would like to extend sincere thanks for the trust, cooperation, and attention that our clients have given and will continue to demonstrate.</p>

        <p class="mb-1"><strong>Trân trọng kính chào và hợp tác.</strong></p>
        <p class="fst-italic">We convey an enthusiastic welcome and look forward to your cooperation.</p>

        <div class="mt-3 p-3 rounded-3" style="background:#f6fbf8;border:1px solid #e4f1ea">
          <div class="fw-bold mb-1">Hotline liên hệ</div>
          <div>(+84) 917 168 816 <strong>Mrs Lily</strong>; (+84) 941 168 816 <strong>Mrs Hạnh</strong></div>
          <div class="text-muted small fst-italic mt-1">Hotline: Mrs. Lily (+84) 917 168 816, and Mrs. Hanh (+84) 941 168 816</div>
        </div>
      </article>

      {{-- TESTIMONIALS dạng bảng dọc + 2 ảnh xếp dọc ở cuối trang --}}
      <article class="card-lite p-4 mt-4" data-animate>
        <h3 class="fw-bold mb-3">Lời khen – Đánh giá / Testimonials from Customers</h3>
        <p class="mb-3">
          Tại VINAP, các nhân viên của chúng tôi luôn làm việc chăm chỉ để hỗ trợ những người dùng cuối và đối tác của chúng tôi.
          Hãy xem mọi người nói gì về Dịch vụ Hỗ trợ Khách hàng của VINAP:
        </p>
        <p class="fst-italic text-muted mb-4">
          At VINAP, our employees exert considerable effort to provide assistance to our partners and end users.
          View the opinions expressed by others regarding VINAP Customer Support.
        </p>

        <div class="table-responsive reveal">
          <table class="table table-bordered testi-table border-success-subtle shadow-sm">
            <thead class="table-light">
              <tr class="fw-bold text-center">
                <th style="width: 36%">Người đánh giá / Reviewer</th>
                <th>Nội dung đánh giá / Testimonial</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>
                  <div class="testi-person">Trần Ngọc Trí Nhân (Giám đốc, quản lý cấp cao)</div>
                  <div class="testi-role">Tran Ngoc Tri Nhan (Senior Manager, Director)</div>
                </td>
                <td>
                  “Hạnh rất nhanh nhẹn và kỹ lưỡng và đã có thể giải quyết dứt điểm vấn đề cho chúng tôi...”
                  <br><em>“Hanh successfully managed to resolve the issue in a timely and comprehensive manner...”</em>
                </td>
              </tr>
              <tr>
                <td>
                  <div class="testi-person">Lê Anh Quỳnh (Tổng Giám đốc, Cố vấn pháp lý dự án)</div>
                  <div class="testi-role">Le Anh Quynh (General Director, Project Legal Advisor)</div>
                </td>
                <td>
                  “Hương có kiến thức rất tốt và rất nhiệt tình...”
                  <br><em>“Huong is not only highly knowledgeable but also extremely enthusiastic...”</em>
                </td>
              </tr>
              <tr>
                <td>
                  <div class="testi-person">Lê Anh Tuấn (Chủ tịch HĐQT Công ty Tư vấn & BĐS)</div>
                  <div class="testi-role">Le Anh Tuan (Chairman of the Board, Consulting & Real Estate)</div>
                </td>
                <td>
                  “Lily rất tận tình. Cô ấy đã đảm bảo mọi thắc mắc của tôi được giải đáp...”
                  <br><em>“Lily is exceedingly dedicated. She ensured that all of my inquiries were addressed...”</em>
                </td>
              </tr>
              <tr>
                <td>
                  <div class="testi-person">Cham Jayson (Giám đốc Tư vấn, Nghiên cứu)</div>
                  <div class="testi-role">Cham Jayson (Director of Consulting and Research)</div>
                </td>
                <td>
                  “Chúng tôi đã cùng làm việc để giải quyết vấn đề...”
                  <br><em>“We collaborated to resolve the issue... I am grateful to Sam for the positive experience.”</em>
                </td>
              </tr>
              <tr>
                <td>
                  <div class="testi-person">James Wong (GĐ điều hành VPC Malaysia & GĐ Quốc tế VPC AP)</div>
                  <div class="testi-role">James Wong (Managing Director of VPC Malaysia)</div>
                </td>
                <td>
                  “Ông James Wong... đánh giá cao chất lượng báo cáo và quy trình chuyên nghiệp của VINAP...”
                  <br><em>“He recognized VINAP for outstanding report quality and professional process...”</em>
                </td>
              </tr>
              <tr>
                <td>
                  <div class="testi-person">Ngô Nhân Đức (Phó phòng pháp lý Cty Kinh doanh BĐS)</div>
                  <div class="testi-role">Ngo Nhan Duc (Deputy Head of Legal Department)</div>
                </td>
                <td>
                  “Loan rất nhiệt tình... Tôi biết ơn vì đã đi tới 100% vấn đề...”
                  <br><em>“Loan was exceedingly enthusiastic... we arrived at 100% answers.”</em>
                </td>
              </tr>
            </tbody>
          </table>
        </div>

        {{-- 2 ẢNH ĐÁNH GIÁ xếp dọc, nằm cuối nội dung trước footer --}}
        <div class="mt-4 d-flex flex-column align-items-center gap-3 reveal">
          <img src="http://vinap.vn/image/data/thu-ngo/DG_01.jpg" alt="Testimonial photo 1"
               class="img-fluid rounded shadow-sm" style="max-width:980px">
          <img src="http://vinap.vn/image/data/thu-ngo/DG_02.jpg" alt="Testimonial photo 2"
               class="img-fluid rounded shadow-sm" style="max-width:980px">
        </div>
      </article>
    </div>

    {{-- SIDEBAR --}}
    <aside class="col-lg-4">
      <div class="sticky-top" style="top:calc(var(--header-h) + 20px);">
        @php $sd = config('site.home.deliveredServices')[0] ?? null; @endphp
        @if($sd)
          <div class="section-title mb-2" data-animate>Dịch vụ đã thực hiện</div>
          <div class="card-lite p-0 mb-4" data-animate>
            <img src="{{ $sd['img'] }}" alt="" class="w-100" style="height:220px;object-fit:cover;border-radius:12px 12px 0 0">
            <div class="p-3">{{ $sd['caption'] }}</div>
          </div>
        @endif

        <div class="section-title mb-2" data-animate>Văn bản pháp luật</div>
        <div class="card-lite p-3 mb-4" data-animate>
          <ul class="list-unstyled m-0">
            @foreach(config('site.laws') as $law)
              <li class="mb-2"><a href="#" class="text-decoration-none text-success">{{ $law }}</a></li>
            @endforeach
          </ul>
        </div>

        <div class="section-title mb-2" data-animate>Liên kết web</div>
        <div class="card-lite p-3" data-animate>
          <ul class="list-unstyled m-0">
            @foreach(config('site.links') as $link)
              <li class="mb-2"><a href="{{ $link['href'] }}" class="text-decoration-none text-success">{{ $link['label'] }}</a></li>
            @endforeach
          </ul>
        </div>
      </div>
    </aside>
  </div>
</section>

{{-- Snap xuống strip khi bấm mũi tên --}}
<script>
  (function(){
    const cue = document.getElementById('scrollCue');
    const target = document.querySelector('#info-start');
    if(!cue || !target) return;
    cue.addEventListener('click', ()=> target.scrollIntoView({behavior:'smooth', block:'start'}));
  })();
</script>
@endsection
