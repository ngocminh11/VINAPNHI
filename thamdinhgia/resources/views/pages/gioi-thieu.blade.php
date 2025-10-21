@extends('layouts.app')

@section('title','VINAP • Giới thiệu')

@section('content')
@php
  use Illuminate\Support\Facades\File;

  // Hero background with fallback
  $heroUrl = File::exists(public_path('images/hero-about.jpg'))
              ? asset('images/hero-about.jpg')
              : (File::exists(public_path('images/hero-big.jpg'))
                    ? asset('images/hero-big.jpg')
                    : (File::exists(public_path('images/placeholder-hero.jpg'))
                        ? asset('images/placeholder-hero.jpg')
                        : asset('images/placeholder-hero.svg')));

  $laws  = config('site.laws', []);
  $links = config('site.links', []);
  $featured = data_get(config('site.home'), 'serviceTiles', []);
  $delivered = data_get(config('site.home'), 'deliveredServices', []);

  $deliveredImg = $delivered[0]['img'] ?? null;
@endphp

{{-- HERO --}}
<section class="hero-full" style="background-image:url('{{ $heroUrl }}')">
  <div class="hero-inner" data-animate>
    <h1 class="hero-title">Giới thiệu</h1>
    <p class="hero-sub">Overview • Business Information • Branches • Associated Institution</p>
  </div>
  <button id="scrollCue" class="scroll-cue" aria-label="Cuộn xuống">
    <svg viewBox="0 0 24 24" fill="none"><path d="M6 9l6 6 6-6" stroke="currentColor" stroke-width="2" stroke-linecap="round"/></svg>
  </button>
</section>

{{-- STRIP: DỊCH VỤ NỔI BẬT (ngay sau banner) --}}
<section id="info-start" class="container py-4" data-animate>
  <div class="section-title mb-3">Dịch vụ nổi bật</div>
  <div class="services-grid">
    {{-- 1. Thẩm định giá --}}
    <a href="/#services" class="svc-card text-decoration-none text-dark">
      <div class="p-3 d-flex gap-3 align-items-start">
        <div class="icon-wrap"><svg class="i"><use href="#icon-home"/></svg></div>
        <div>
          <div class="fw-bold">Thẩm định giá</div>
          <div class="desc">Giải pháp nhanh, chuẩn, minh bạch.</div>
        </div>
      </div>
    </a>
    {{-- 2. Đấu giá BĐS, tài sản --}}
    <a href="/#services" class="svc-card text-decoration-none text-dark">
      <div class="p-3 d-flex gap-3 align-items-start">
        <div class="icon-wrap"><svg class="i"><use href="#icon-briefcase"/></svg></div>
        <div>
          <div class="fw-bold">Đấu giá BĐS, tài sản</div>
          <div class="desc">Minh bạch thủ tục, triển khai nhanh.</div>
        </div>
      </div>
    </a>
    {{-- 3. Chuyển nhượng dự án --}}
    <a href="/#services" class="svc-card text-decoration-none text-dark">
      <div class="p-3 d-flex gap-3 align-items-start">
        <div class="icon-wrap"><svg class="i"><use href="#icon-gear"/></svg></div>
        <div>
          <div class="fw-bold">Tư vấn chuyển nhượng dự án</div>
          <div class="desc">M&A, pháp lý, cấu trúc giao dịch.</div>
        </div>
      </div>
    </a>
    {{-- 4. Tư vấn đầu tư - BĐS --}}
    <a href="/#services" class="svc-card text-decoration-none text-dark">
      <div class="p-3 d-flex gap-3 align-items-start">
        <div class="icon-wrap"><svg class="i"><use href="#icon-chart"/></svg></div>
        <div>
          <div class="fw-bold">Tư vấn đầu tư • BĐS</div>
          <div class="desc">Chiến lược, tài chính, phát triển.</div>
        </div>
      </div>
    </a>
    {{-- 5. Nghiên cứu thị trường --}}
    <a href="/#services" class="svc-card text-decoration-none text-dark">
      <div class="p-3 d-flex gap-3 align-items-start">
        <div class="icon-wrap"><svg class="i"><use href="#icon-gear"/></svg></div>
        <div>
          <div class="fw-bold">Nghiên cứu thị trường</div>
          <div class="desc">Dữ liệu giá, xu hướng, báo cáo.</div>
        </div>
      </div>
    </a>
  </div>
</section>

{{-- MAIN CONTENT + SIDEBAR --}}
<section class="container my-4">
  <div class="row g-4">

    {{-- LEFT: Nội dung giới thiệu đầy đủ song ngữ --}}
    <div class="col-lg-8">

      {{-- Giới thiệu chung / Overview --}}
      <article class="card-lite p-4 mb-4 reveal">
        <div class="section-title mb-2">Giới thiệu chung <span class="text-muted">/ Overview</span></div>

        <div class="mb-3">
          <p>Công ty Cổ phần Thẩm định giá và Tư vấn đầu tư Việt Nam (VINAP) xin trân trọng gửi tới Quý Khách hàng lời chúc sức khỏe và thành công trong công việc.</p>
          <p class="fst-italic">We at Viet Nam Appraisal and Investment Consulting Corporation (VINAP) extend our best wishes for your well-being and future success in business.</p>
        </div>

        <div class="mb-3">
          <p>Là một trong những Doanh nghiệp Thẩm định giá - Tư vấn đầu tư chuyên nghiệp tại Việt Nam với trên 10 năm hoạt động. VINAP đã tạo được uy tín trong thị trường dịch vụ thẩm định giá, tư vấn đầu tư. VINAP không ngừng hoàn thiện nhằm mang lại sự phục vụ chu đáo, chuyên nghiệp, an tâm về chất lượng, kịp thời, cùng tính chính xác cao, góp phần minh bạch thị trường, đáp ứng kịp thời và tốt nhất yêu cầu của Quý Khách hàng.</p>
          <p class="fst-italic">In the valuation and investment consulting service market, VINAP has established a reputation as one of the professional Valuation - Investment Consulting Enterprises in Vietnam, with more than 10 years of operation. VINAP is committed to providing professional, mindful service that is timely, accurate, and of high quality. This effort contributes to market transparency and ensures that the requirements of our clients are fulfilled quickly and effectively.</p>
        </div>

        <div class="mb-3">
          <p><strong>Công ty Cổ phần Thẩm định giá và Tư vấn Đầu tư Việt Nam</strong> có mã số doanh nghiệp: <strong>0312126946</strong> do Phòng Đăng ký kinh doanh - Sở Kế hoạch và Đầu tư thành phố Hồ Chí Minh cấp, đăng ký lần đầu ngày 16/01/2013, đăng ký thay đổi lần thứ 6 ngày 18/04/2020 và được Bộ Tài chính cấp Giấy chứng nhận đủ điều kiện kinh doanh dịch vụ thẩm định giá lần đầu ngày 24/09/2015, cấp lại lần thứ 3 ngày 21/05/2020 với mã số <strong>096/TĐG</strong>.</p>
          <p class="fst-italic">Viet Nam Appraisal and Investment Consulting Corporation was initially registered on January 16, 2013, and was issued a business code of 0312126946 by the Business Registration Office of the Department of Planning and Investment of Ho Chi Minh City. The fifth modification was signed on May 21, 2020, under the code 096/TDG.</p>
          <p>Danh sách doanh nghiệp thẩm định giá và thẩm định viên về giá đủ điều kiện hành nghề thẩm định giá tài sản hàng năm.</p>
          <p class="fst-italic">The annual listing includes appraisers and valuation businesses authorized to perform asset appraisals.</p>
          <p>Thẻ thẩm định viên về giá do Bộ Tài chính cấp.</p>
          <p class="fst-italic mb-0">A certificate for valuers is issued by the Ministry of Finance.</p>
        </div>
      </article>

      {{-- Phương châm & Mục tiêu --}}
      <article class="card-lite p-4 mb-4 reveal">
        <div class="section-title mb-2">Phương châm & Mục tiêu <span class="text-muted">/ Principle & Development Orientation</span></div>

        <p><strong>Với phương châm CHUYÊN NGHIỆP – CHÍNH XÁC – MINH BẠCH – KHÁCH QUAN</strong>, VINAP luôn nỗ lực cao nhất để cung cấp đến quý Khách hàng dịch vụ thẩm định giá với độ tin cậy và chuyên nghiệp, nhằm xác định giá trị thực tài sản sở hữu và góp phần minh bạch thị trường, đáp ứng kịp thời và tốt nhất yêu cầu của quý Khách hàng.</p>
        <p class="fst-italic">VINAP is committed to delivering professional and dependable valuation services to its clients, and it consistently strives to ascertain the true value of assets in accordance with the guidelines PROFESSION - PRECISION - TRANSPARENCY - OBJECTIVITY. Our standard is to meet our clients' highest standards, deliver our product on time, and contribute to market transparency.</p>

        <div class="mt-3">
          <div class="fw-bold mb-2">Mục tiêu hành động / Development Orientation:</div>
          <ul class="mb-2">
            <li>Cung cấp sản phẩm dịch vụ có chất lượng cao nhất, tốt nhất.</li>
            <li>Xây dựng đội ngũ nhân viên chuyên nghiệp, trung thực, đạo đức nghề nghiệp.</li>
            <li>Gắn bó và đồng hành cùng khách hàng trong quá trình phát triển.</li>
          </ul>
          <ul class="fst-italic">
            <li>We are committed to delivering products and services of the highest quality.</li>
            <li>We are establishing a staff that is ethical, professional, and honest.</li>
            <li>We are committed to adhering to and supporting clients throughout the development process.</li>
          </ul>
        </div>

        <p class="mt-3">Bằng uy tín, chất lượng dịch vụ của mình, trong nhiều năm qua VINAP đã nhận được sự hợp tác và ủng hộ của đông đảo quý Khách hàng trong phạm vi toàn quốc.</p>
        <p class="fst-italic">VINAP has gained the cooperation and support of numerous consumers over the years due to its quality services and prestige.</p>

        <p>Qua đây, chúng tôi xin giới thiệu những thông tin mới nhất về VINAP và mong muốn được đóng góp vào sự thành công của quý Khách hàng trong thời gian tới. Rất mong nhận được sự tín nhiệm của quý khách hàng trong và ngoài nước.</p>
        <p class="fst-italic mb-0">Here, we would like to provide the most recent information about VINAP and our aspiration is to assist clients in achieving future success. We are eager to earn the confidence of both domestic and international consumers.</p>
      </article>

      {{-- Thông tin doanh nghiệp / Business Information --}}
      <article class="card-lite p-4 mb-4 reveal">
        <div class="section-title mb-2">Thông tin doanh nghiệp <span class="text-muted">/ Business Information</span></div>

        <div class="row g-3">
          <div class="col-md-6">
            <div class="fw-semibold">Tên tiếng Việt</div>
            <div>CÔNG TY CỔ PHẦN THẨM ĐỊNH GIÁ VÀ TƯ VẤN ĐẦU TƯ VIỆT NAM</div>
          </div>
          <div class="col-md-6">
            <div class="fw-semibold">Trade name</div>
            <div>VIETNAM APPRAISAL AND INVESTMENT CONSULTING CORPORATION</div>
          </div>

          <div class="col-md-6">
            <div class="fw-semibold">Tên viết tắt</div>
            <div>VINAP</div>
          </div>
          <div class="col-md-6">
            <div class="fw-semibold">Business License</div>
            <div>0312126946</div>
          </div>

          <div class="col-md-6">
            <div class="fw-semibold">Mã số đủ điều kiện KD DV Thẩm định giá</div>
            <div>096/TĐG</div>
          </div>
          <div class="col-md-6">
            <div class="fw-semibold">Eligibility code for appraisal business</div>
            <div>096/TDG</div>
          </div>

          <div class="col-md-12"><hr class="my-2"></div>

          <div class="col-md-6">
            <div class="fw-semibold">Trụ sở chính</div>
            <div>Khu biệt thự Nine South, Nhà số 9 đường số 7, khu dân cư Vina Nam Phú, Phước Kiển, Nhà Bè, TP.HCM.</div>
            <div>Điện thoại: (+8428) 3933 0833 · Website: <a href="http://www.vinap.vn">www.vinap.vn</a> · Hotline: (+84) 917 168 816</div>
          </div>
          <div class="col-md-6">
            <div class="fw-semibold">Head office (EN)</div>
            <div>Nine South Estates, villa no 9, road no 7, Vina Nam Phu Residential Area, Nha Be, Ho Chi Minh City.</div>
            <div>Tel: (+8428) 3933 0833 · Website: <a href="http://www.vinap.vn">www.vinap.vn</a> · Hotline: (+84) 917 168 816</div>
          </div>
        </div>
      </article>

      {{-- Hệ thống chi nhánh / System of Branches --}}
      <article class="card-lite p-4 mb-4 reveal">
        <div class="section-title mb-2">Hệ thống chi nhánh <span class="text-muted">/ System of Branches</span></div>

        <div class="mb-3">
          <div class="fw-semibold">Chi nhánh Trà Vinh</div>
          <div>Số 357, đường Nguyễn Thị Minh Khai, khóm 9, phường 7, TP Trà Vinh, tỉnh Trà Vinh, Việt Nam.</div>
          <div>Tel: (+84) 978 910 555 · (+84) 964 881919 · Hotline: (+84) 917 168 816</div>
          <div class="fst-italic">Branch Tra Vinh: No 357, Nguyen Thi Minh Khai Rd, Hamlet 9, Ward 7, Tra Vinh City, Tra Vinh Province, Viet Nam.<br>Tel: (+84) 978 910 555 · (+84) 964 881919 · Hotline: (+84) 917 168 816</div>
        </div>

        <div class="mb-3">
          <div class="fw-semibold">Chi nhánh Long An</div>
          <div>Số 35, Nguyễn Hữu Thọ, phường 3, thị xã Kiến Tường, tỉnh Long An, Việt Nam.</div>
          <div>Hotline: (+84) 917 168 816 · (+84) 942 335 346</div>
          <div class="fst-italic">Branch Long An: No 35, Nguyen Huu Tho, quarter 3, Long An Province, Viet Nam. Hotline: (+84) 917 168 816 · (+84) 942 335 346</div>
        </div>

        <div>
          <div class="fw-semibold">Văn phòng đại diện Vũng Tàu</div>
          <div>Số 25 Ung Văn Khiêm, phường Long Toàn, thành phố Bà Rịa, tỉnh Bà Rịa – Vũng Tàu, Việt Nam.</div>
          <div>Điện thoại: (+84) 917 61 77 88 · Hotline: (+84) 917 168 816</div>
          <div class="fst-italic">Representative office Vung Tau: No 25 Ung Van Khiem, Long Toan ward, Ba Ria City, Ba Ria - Vung Tau Province, Viet Nam.<br>Tel: (+84) 917 61 77 88 · Hotline: (+84) 917 168 816</div>
        </div>
      </article>

      {{-- Tổ chức liên kết / Associated Institution --}}
      <article class="card-lite p-4 mb-4 reveal">
        <div class="section-title mb-2">Tổ chức liên kết <span class="text-muted">/ Associated Institution</span></div>

        <div class="mb-2">
          <div class="fw-semibold">Trung Tâm Kỹ thuật Tài nguyên và Môi trường tỉnh Bà Rịa - Vũng Tàu</div>
          <div>Địa chỉ: Số 368 Lê Hồng Phong, phường 3, thành phố Vũng Tàu, Việt Nam.</div>
          <div>Điện thoại: (+84254) 3530 717 · Hotline: (+84) 917 168 816</div>
        </div>

        <div class="fst-italic">
          Technical Assistance Center for Natural Resources and Environment, Ba Ria - Vung Tau Province.<br>
          Add: No. 368 Le Hong Phong Rd, quarter 3, Vung Tau City, Viet Nam.<br>
          Tel: (+84254) 3530 717 · Hotline: (+84) 917 168 816
        </div>
      </article>

    </div>

    {{-- RIGHT: Sidebar dính --}}
    <aside class="col-lg-4">
      <div class="sticky-aside">

        {{-- Dịch vụ đã thực hiện --}}
        <div class="section-title mb-2" data-animate>Dịch vụ đã thực hiện</div>
        <div class="card-lite p-0 mb-4" data-animate>
          @php
            $sd = $delivered[0] ?? null;
            $img = $deliveredImg ?? asset('images/placeholder-thumb.svg');
          @endphp
          <img src="{{ $img }}" data-fallback="/images/placeholder-thumb.svg" alt="" class="w-100" style="height:220px;object-fit:cover">
          <div class="p-3">{{ $sd['caption'] ?? 'Một số dự án tiêu biểu' }}</div>
        </div>

        {{-- Văn bản pháp luật --}}
        <div class="section-title mb-2" data-animate>Văn bản pháp luật</div>
        <div class="card-lite p-3 mb-4" data-animate>
          <ul class="list-unstyled m-0">
            @foreach($laws as $law)
              <li class="mb-2"><a href="#" class="text-decoration-none">{{ $law }}</a></li>
            @endforeach
          </ul>
        </div>

        {{-- Liên kết web --}}
        <div class="section-title mb-2" data-animate>Liên kết web</div>
        <div class="card-lite p-3 mb-4" data-animate>
          <ul class="list-unstyled m-0">
            @foreach($links as $l)
              <li class="mb-2"><a href="{{ $l['href'] }}" class="text-decoration-none">{{ $l['label'] }}</a></li>
            @endforeach
          </ul>
        </div>

      </div>
    </aside>

  </div>
</section>
@endsection
