@php
  $delivered = array_values(config('site.home.deliveredServices') ?? []);
  $sid = 'delivSlider_'.\Illuminate\Support\Str::random(6);
@endphp

@if(count($delivered))
<div class="section-title mb-2">Dịch vụ đã thực hiện</div>

<div id="{{ $sid }}" class="deliv-slider card-lite p-0">
  <div class="deliv-viewport">
    <div class="deliv-track">
      @foreach($delivered as $it)
        @php
          $img = $it['img'] ?? '/images/placeholder-thumb.svg';
          $cap = $it['caption'] ?? 'Case study';
        @endphp
        <article class="deliv-slide">
          <div class="deliv-card">
            <div class="deliv-media">
              <img src="{{ $img }}" alt="{{ $cap }}" loading="lazy">
            </div>
            <div class="deliv-cap">{{ $cap }}</div>
          </div>
        </article>
      @endforeach
    </div>
  </div>

  @if(count($delivered) > 1)
    <button class="deliv-nav prev" aria-label="Trước">
      <svg viewBox="0 0 24 24" width="18" height="18"><path d="M15 18l-6-6 6-6" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"/></svg>
    </button>
    <button class="deliv-nav next" aria-label="Sau">
      <svg viewBox="0 0 24 24" width="18" height="18"><path d="M9 6l6 6-6 6" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"/></svg>
    </button>
    <div class="deliv-dots" role="tablist" aria-label="Slide indicators"></div>
  @endif
</div>

<style>
  /* ==== scope theo id để không đụng CSS khác ==== */
  #{{ $sid }}{ position:relative; isolation:isolate; border-radius:18px; overflow:hidden }
  #{{ $sid }} .deliv-viewport{ overflow:hidden; }
  #{{ $sid }} .deliv-track{ display:flex; transition:transform .45s cubic-bezier(.22,.8,.32,1) }

  /* mỗi slide chiếm 100% bề ngang viewport */
  #{{ $sid }} .deliv-slide{ flex:0 0 100% }

  /* card + ảnh đồng bộ radius, fix lệch */
  #{{ $sid }} .deliv-card{ background:#fff }
  #{{ $sid }} .deliv-media{
    width:100%;
    aspect-ratio:16/9;         /* chiều cao cố định theo tỉ lệ, không giật */
    overflow:hidden;
    border-radius:18px 18px 0 0;
    background:#f3f6f5;
  }
  #{{ $sid }} .deliv-media img{
    width:100%; height:100%;
    object-fit:cover; object-position:center; display:block; user-select:none;
  }

  #{{ $sid }} .deliv-cap{
    padding:16px; font-weight:600; color:#0f1f19;
    border-radius:0 0 18px 18px;
  }

  /* nav nằm trong ảnh, căn giữa tuyệt đối, click dễ – không đè text */
  #{{ $sid }} .deliv-nav{
    position:absolute; top:calc(16px + 50%); transform:translateY(-50%);
    z-index:3; width:36px; height:36px; border-radius:999px;
    border:1px solid #d9efe3; background:#fff; color:#0f7751;
    display:grid; place-items:center;
    box-shadow:0 6px 16px rgba(16,123,79,.14);
    transition:background .2s, color .2s, transform .2s;
  }
  #{{ $sid }} .deliv-nav:hover{ background:#0f7751; color:#fff; transform:translateY(-50%) scale(1.06) }
  #{{ $sid }} .deliv-nav.prev{ left:12px }
  #{{ $sid }} .deliv-nav.next{ right:12px }

  /* dots gọn ở dưới, không trôi lệch */
  #{{ $sid }} .deliv-dots{ display:flex; gap:6px; justify-content:center; padding:10px 0 12px }
  #{{ $sid }} .deliv-dots button{
    width:8px; height:8px; border-radius:999px; border:0; background:#dfeee7
  }
  #{{ $sid }} .deliv-dots button[aria-current="true"]{ background:#0f7751 }
</style>

<script>
(function(){
  const root = document.getElementById(@json($sid));
  if(!root) return;

  const track = root.querySelector('.deliv-track');
  const slides = [...root.querySelectorAll('.deliv-slide')];
  const prev = root.querySelector('.deliv-nav.prev');
  const next = root.querySelector('.deliv-nav.next');
  const dotsWrap = root.querySelector('.deliv-dots');
  const N = slides.length; if (!N) return;

  let i = 0, timer = null, hover = false;

  const set = idx => {
    i = (idx + N) % N;
    track.style.transform = `translateX(${-i * 100}%)`;
    if(dotsWrap){
      [...dotsWrap.children].forEach((b,k)=> b.setAttribute('aria-current', k===i ? 'true':'false'));
    }
  };

  if (dotsWrap) {
    slides.forEach((_, k) => {
      const b = document.createElement('button');
      b.type = 'button';
      b.addEventListener('click', ()=> set(k));
      dotsWrap.appendChild(b);
    });
  }

  const step = d => set(i + d);
  prev?.addEventListener('click', ()=> step(-1));
  next?.addEventListener('click', ()=> step(1));

  // auto-play có pause khi hover
  const play = ()=> timer = setInterval(()=> { if(!hover && N>1) step(1); }, 3500);
  const stop = ()=> { if(timer) clearInterval(timer); timer=null; };
  root.addEventListener('mouseenter', ()=> { hover = true; });
  root.addEventListener('mouseleave', ()=> { hover = false; });

  // swipe mobile
  let sx=null;
  root.addEventListener('touchstart', e=> sx = e.touches[0].clientX, {passive:true});
  root.addEventListener('touchend', e=>{
    if(sx===null) return;
    const dx = e.changedTouches[0].clientX - sx;
    if(Math.abs(dx) > 40) step(dx<0 ? 1 : -1);
    sx=null;
  }, {passive:true});

  set(0); play();
})();
</script>
@endif
