@extends('layouts.app')
@section('title','Khách hàng')

@php
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

/* -------- Banner -------- */
$banner = File::exists(public_path('images/hoatdong/khachhang-hero.jpg'))
  ? asset('images/hoatdong/khachhang-hero.jpg')
  : asset('image/banner.jpg'); // fallback cũ

/* -------- Ảnh scan phụ lục (tự nhận) -------- */
$scanDir = public_path('images/clients');
$scans = [];
if (File::isDirectory($scanDir)) {
  $files = collect(File::files($scanDir))
    ->filter(fn($f)=>preg_match('/\.(jpe?g|png|webp)$/i',$f->getFilename()))
    ->sortBy(fn($f)=>$f->getFilename())
    ->values();
  foreach ($files as $f) {
    $scans[] = asset('images/clients/'.$f->getFilename());
  }
}

/* ================= CSV LOADER =================
   Đọc public/clients.csv -> groups[state|banks|corp]
   Cấu trúc cột: group,vn,en,logo
   - Nếu 'logo' trống: auto dùng Str::slug(vn) để tìm file trong public/images/logos
   - Nếu không có CSV: fallback sang config('site.clients')
================================================ */
$csvPath = public_path('clients.csv');

/** Trả về mảng đã chuẩn hóa: ['state'=>[], 'banks'=>[], 'corp'=>[]] */
$fromCsv = ['state'=>[], 'banks'=>[], 'corp'=>[]];

if (File::exists($csvPath)) {
  $raw = file($csvPath, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

  if ($raw !== false && count($raw)) {
    // xử lý BOM
    if (substr($raw[0], 0, 3) === "\xEF\xBB\xBF") {
      $raw[0] = substr($raw[0], 3);
    }
    $rows = array_map('str_getcsv', $raw);
    $headers = array_map('trim', array_shift($rows) ?: []);
    $headers = array_map(fn($h)=>mb_strtolower($h), $headers);

    // map index cột
    $idx = [
      'group' => array_search('group', $headers),
      'vn'    => array_search('vn',    $headers),
      'en'    => array_search('en',    $headers),
      'logo'  => array_search('logo',  $headers),
    ];

    foreach ($rows as $r) {
      $g = isset($r[$idx['group']]) ? trim($r[$idx['group']]) : '';
      if (!in_array($g, ['state','banks','corp'])) continue;

      $vn   = isset($r[$idx['vn']])   ? trim($r[$idx['vn']])   : '';
      $en   = isset($r[$idx['en']])   ? trim($r[$idx['en']])   : '';
      $logo = isset($r[$idx['logo']]) ? trim($r[$idx['logo']]) : '';

      // nếu logo trống, dùng slug của vn để tìm
      if ($logo === '' && $vn) {
        $logo = Str::slug($vn);
      }

      $fromCsv[$g][] = compact('vn','en','logo');
    }
  }
}

// fallback: nếu CSV trống, dùng config
$cfg = (array) (config('site.clients') ?? []);
$groups = [
  'state' => count($fromCsv['state']) ? $fromCsv['state'] : ($cfg['state'] ?? []),
  'banks' => count($fromCsv['banks']) ? $fromCsv['banks'] : ($cfg['banks'] ?? []),
  'corp'  => count($fromCsv['corp'])  ? $fromCsv['corp']  : ($cfg['corp']  ?? []),
];

/* -------- Helper logo url -------- */
$logoUrl = function($file){
  if (!$file) return asset('images/placeholder-thumb.svg');

  // nếu truyền sẵn URL đầy đủ
  if (preg_match('#^https?://#', $file)) return $file;

  // nếu truyền 'abc.png' thì thử trực tiếp ở public/
  $pathOnly = ltrim(parse_url($file, PHP_URL_PATH) ?? '','/');
  if ($pathOnly && File::exists(public_path($pathOnly))) return asset($pathOnly);

  // nếu truyền slug (abc) thì thử /images/logos/abc.{ext}
  $base = pathinfo($file, PATHINFO_FILENAME);
  foreach (['png','webp','jpg','jpeg','svg'] as $ext) {
    $rel = "images/logos/{$base}.{$ext}";
    if (File::exists(public_path($rel))) return asset($rel);
  }

  return asset('images/placeholder-thumb.svg');
};

// đếm tổng
$totals = [
  'state' => count($groups['state']),
  'banks' => count($groups['banks']),
  'corp'  => count($groups['corp']),
];
@endphp

@section('content')
<style>
  .hero-mini{position:relative;min-height:42vh;border-radius:18px;overflow:hidden}
  .hero-mini::before{content:"";position:absolute;inset:0;background:linear-gradient(180deg,rgba(0,0,0,.25),rgba(0,0,0,.6))}
  .hero-mini .inner{position:absolute;inset:0;display:grid;place-items:end start;color:#fff;padding:24px}

  .clients-wrap .tab-btn{border:1px solid #e6efe9;background:#fff;border-radius:999px;padding:.5rem .9rem;font-weight:700}
  .clients-wrap .tab-btn.active{background:#0f7751;color:#fff;border-color:#0f7751}
  .clients-card{border:1px solid #e7efe9;border-radius:16px;background:#fff;box-shadow:0 8px 26px rgba(16,123,79,.06)}
  .clients-table{width:100%;border-collapse:separate;border-spacing:0}
  .clients-table th,.clients-table td{border:1px solid #e3ece6;padding:.6rem .7rem;vertical-align:middle}
  .clients-table thead th{background:#f6fbf8;font-weight:800}
  .clients-table th.stt,.clients-table td.stt{width:60px;text-align:center}
  .clients-table td.en{font-style:italic;color:#53645c}
  .logo-cell{width:86px;text-align:center}
  .logo-cell img{width:60px;height:60px;object-fit:contain;filter:drop-shadow(0 1px 2px rgba(0,0,0,.15))}
  .clients-footnote{color:#60746b}
  .scan-slider{position:relative;overflow:hidden;border-radius:16px}
  .scan-track{display:flex;transition:transform .35s cubic-bezier(.22,.8,.32,1)}
  .scan-slide{flex:0 0 100%;display:grid;place-items:center;background:#0b1f18}
  .scan-slide img{max-width:100%;height:auto}
  .scan-nav{position:absolute;top:50%;transform:translateY(-50%);width:40px;height:40px;border-radius:999px;border:1px solid #e1efe8;background:#fff;display:grid;place-items:center}
  .scan-prev{left:10px}.scan-next{right:10px}
  .scan-dots{display:flex;gap:8px;justify-content:center;margin-top:8px}
  .scan-dots button{width:8px;height:8px;border-radius:999px;border:0;background:#cfe1d8}
  .scan-dots button[aria-current="true"]{background:#0f7751}
  .rel-grid{display:grid;grid-template-columns:repeat(auto-fit,minmax(220px,1fr));gap:12px}
  .rel-grid img{width:100%;height:140px;object-fit:cover;border-radius:12px}
</style>

<section class="container my-3">
  <div class="hero-mini" style="background:url('{{ $banner }}') center/cover no-repeat">
    <div class="inner">
      <div>
        <div class="badge bg-success-subtle text-success mb-2">Năng lực & Đối tác</div>
        <h1 class="m-0">Khách hàng của VINAP</h1>
      </div>
    </div>
  </div>
</section>

<section class="container clients-wrap my-4">
  <div class="d-flex flex-wrap gap-2 mb-3">
    <button class="tab-btn active" data-tab="state">Đơn vị cơ quan Nhà nước ({{ $totals['state'] }})</button>
    <button class="tab-btn" data-tab="banks">Tổ chức tín dụng ({{ $totals['banks'] }})</button>
    <button class="tab-btn" data-tab="corp">Doanh nghiệp ({{ $totals['corp'] }})</button>
  </div>

  {{-- BẢNG: CƠ QUAN NHÀ NƯỚC --}}
  <div class="clients-card p-3 tab-pane" id="tab-state">
    <div class="section-title mb-2">Đơn vị cơ quan Nhà nước</div>
    <div class="table-responsive">
      <table class="clients-table">
        <thead>
          <tr>
            <th class="stt">STT</th>
            <th>Khách hàng (VN)</th>
            <th style="min-width:280px">Clients (EN)</th>
            <th class="logo-cell">Logo</th>
          </tr>
        </thead>
        <tbody>
          @foreach($groups['state'] as $i => $c)
            <tr>
              <td class="stt">{{ $i+1 }}</td>
              <td>{{ $c['vn'] ?? '' }}</td>
              <td class="en">{{ $c['en'] ?? '' }}</td>
              <td class="logo-cell">
                <img src="{{ $logoUrl($c['logo'] ?? '') }}" alt="logo">
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>

  {{-- BẢNG: TỔ CHỨC TÍN DỤNG --}}
  <div class="clients-card p-3 tab-pane d-none" id="tab-banks">
    <div class="section-title mb-2">Tổ chức tín dụng</div>
    <div class="table-responsive">
      <table class="clients-table">
        <thead>
        <tr>
          <th class="stt">STT</th>
          <th>Tên (VN)</th>
          <th>English</th>
          <th class="logo-cell">Logo</th>
        </tr>
        </thead>
        <tbody>
        @foreach($groups['banks'] as $i => $c)
          <tr>
            <td class="stt">{{ $i+1 }}</td>
            <td>{{ $c['vn'] ?? '' }}</td>
            <td class="en">{{ $c['en'] ?? '' }}</td>
            <td class="logo-cell">
              <img src="{{ $logoUrl($c['logo'] ?? '') }}" alt="logo">
            </td>
          </tr>
        @endforeach
        </tbody>
      </table>
    </div>
  </div>

  {{-- BẢNG: DOANH NGHIỆP --}}
  <div class="clients-card p-3 tab-pane d-none" id="tab-corp">
    <div class="section-title mb-2">Doanh nghiệp</div>
    <div class="table-responsive">
      <table class="clients-table">
        <thead>
        <tr>
          <th class="stt">STT</th>
          <th>Tên (VN)</th>
          <th>English</th>
          <th class="logo-cell">Logo</th>
        </tr>
        </thead>
        <tbody>
        @foreach($groups['corp'] as $i => $c)
          <tr>
            <td class="stt">{{ $i+1 }}</td>
            <td>{{ $c['vn'] ?? '' }}</td>
            <td class="en">{{ $c['en'] ?? '' }}</td>
            <td class="logo-cell">
              <img src="{{ $logoUrl($c['logo'] ?? '') }}" alt="logo">
            </td>
          </tr>
        @endforeach
        </tbody>
      </table>
    </div>
  </div>
</section>

{{-- PHỤ LỤC: ẢNH SCAN --}}
@if(count($scans))
<section class="container my-4">
  <div class="section-title mb-2">Phụ lục: Danh sách khách hàng (bản scan)</div>

  <div class="scan-slider mb-2" id="scanSlider" aria-label="Scan pages">
    <div class="scan-track" id="scanTrack" style="width:{{ count($scans)*100 }}%">
      @foreach($scans as $src)
        <div class="scan-slide"><img src="{{ $src }}" alt="scan page"></div>
      @endforeach
    </div>
    <button class="scan-nav scan-prev" id="scanPrev" aria-label="Trang trước">
      <svg viewBox="0 0 24 24" width="18" height="18"><path d="M15 18l-6-6 6-6" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"/></svg>
    </button>
    <button class="scan-nav scan-next" id="scanNext" aria-label="Trang sau">
      <svg viewBox="0 0 24 24" width="18" height="18"><path d="M9 6l6 6-6 6" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"/></svg>
    </button>
  </div>
  <div class="scan-dots" id="scanDots"></div>

  <div class="rel-grid">
    @foreach($scans as $src)
      <a href="{{ $src }}" target="_blank" rel="noopener">
        <img src="{{ $src }}" alt="scan thumb">
      </a>
    @endforeach
  </div>
  <div class="small text-muted mt-2">Thả ảnh vào <code>public/images/clients/</code> là tự nhận.</div>
</section>
@endif

<script>
(function(){
  // Tabs
  const btns=[...document.querySelectorAll('.clients-wrap .tab-btn')];
  const panes={
    state:document.getElementById('tab-state'),
    banks:document.getElementById('tab-banks'),
    corp: document.getElementById('tab-corp')
  };
  btns.forEach(b=>{
    b.addEventListener('click',()=>{
      btns.forEach(x=>x.classList.remove('active'));
      b.classList.add('active');
      const t=b.dataset.tab;
      Object.values(panes).forEach(p=>p.classList.add('d-none'));
      panes[t]?.classList.remove('d-none');
    });
  });

  // Scan slider
  const track=document.getElementById('scanTrack');
  const dotsWrap=document.getElementById('scanDots');
  const prev=document.getElementById('scanPrev');
  const next=document.getElementById('scanNext');
  if(track){
    const N=track.children.length; let i=0;
    for(let k=0;k<N;k++){
      const d=document.createElement('button');
      d.addEventListener('click',()=>set(k));
      dotsWrap.appendChild(d);
    }
    function set(idx){
      i=(idx+N)%N;
      track.style.transform=`translateX(${-i*100}%)`;
      [...dotsWrap.children].forEach((b,k)=>b.setAttribute('aria-current',k===i?'true':'false'));
    }
    const step=d=>set(i+d);
    prev.addEventListener('click',()=>step(-1));
    next.addEventListener('click',()=>step(1));
    set(0);
  }
})();
</script>
@endsection
