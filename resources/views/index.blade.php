<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <!-- داخل تگ <head> بذار -->
    <link rel="icon" type="image/png" href="{{ asset('/etminansaf.jpg') }}">
    <link rel="shortcut icon" href="{{ asset('/etminansaf.jpg') }}">
     <meta name="description" content="خدمات نمایندگی‌های ETMINANSAF در سراسر کشور. مشاهده آدرس، شماره تماس و مشخصات نمایندگان.">
    <title>etminansaf</title>
    <style>
  * { box-sizing: border-box; }
body {
    font-family: Arial, sans-serif;
    background: linear-gradient(135deg, #111827, #000000);
    margin: 0;
    padding: 0;
    color: #f3f4f6;
}
a { text-decoration: none; color: inherit; }

/* ----- Header ----- */
header {
    background-color: #b91c1c;
    color: white;
    padding: 16px;
    position: sticky;
    top: 0;
     z-index: 9999;   /* خیلی بالا */
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
    align-items: center;
}
.logo { font-size: 1.5rem; font-weight: bold; transition: transform 0.2s; }
.logo:hover { transform: scale(1.05); }

/* ----- Search ----- */
.search-form {
    display: flex; background-color: #1f2937;
    border-radius: 50px; overflow: hidden;
    box-shadow: 0 4px 8px rgba(0,0,0,0.6);
    margin: 8px 0;
}
.search-form input[type="text"] {
    padding: 8px 12px; border: none; outline: none; width: 200px;
    background: transparent; color: #f3f4f6;
}
.search-form button {
    background-color: #dc2626; color: white;
    border: none; padding: 0 12px;
    cursor: pointer; transition: background-color 0.2s;
}
.search-form button:hover { background-color: #991b1b; }

/* ----- Auth Buttons ----- */
.auth-buttons { display: flex; gap: 8px; flex-wrap: wrap; }
.auth-buttons button, .auth-buttons a {
    padding: 8px 16px; border-radius: 12px; font-weight: bold;
    color: white; border: none; cursor: pointer;
    transition: background-color 0.2s, transform 0.2s;
}
.auth-buttons button:hover, .auth-buttons a:hover { transform: scale(1.05); }
.logout-btn { background-color: #ef4444; }
.logout-btn:hover { background-color: #1f2937; }
.login-btn { background-color: #26dc35; }
.login-btn:hover { background-color: #1f2937; }

/* ----- Categories Navbar ----- */
nav.categories {
    background-color: #1f2937;
    box-shadow: 0 2px 8px rgba(0,0,0,0.5);
    padding: 8px 0;
}
nav.categories .container {
    max-width: 1200px; margin: 0 auto;
    display: flex; flex-wrap: wrap;
    justify-content: center; gap: 8px;
    padding: 0 16px;
}
nav.categories a {
    padding: 6px 16px; border-radius: 50px;
    color: #f87171; background-color: #111827;
    border: 1px solid #b91c1c;
    transition: background-color 0.2s, color 0.2s;
}
nav.categories a:hover { background-color: #b91c1c; color: white; }

/* ----- Main ----- */
main {
    max-width: 1200px; margin: 24px auto;
    padding: 0 16px 40px;
}
main h2 {
    font-size: 1.75rem; font-weight: bold; color: #f3f4f6;
    border-right: 4px solid #dc2626; padding-right: 12px;
    margin-bottom: 24px;
}

/* ----- Products Grid ----- */
.products-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 24px;
}
.product-card {
    background-color: #1f2937; border-radius: 24px;
    overflow: hidden; box-shadow: 0 4px 12px rgba(0,0,0,0.6);
    display: flex; flex-direction: column;
    transition: transform 0.3s, box-shadow 0.3s;
}
.product-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 12px 24px rgba(0,0,0,0.9);
}
/* .product-card img {
    width: 100%; height: 180px; object-fit: cover;
} */
 /* استایل عکس‌های محصولات */
.product-card img {
    width: 100%;
    height: auto;          /* ارتفاع بر اساس نسبت تصویر */
    object-fit: contain;   /* عکس کامل دیده میشه */
    border-radius: 12px;
    background-color: #000;
    display: block;
    margin: 0 auto;        /* وسط‌چین بشه */
}
.product-card .content {
    padding: 16px; flex-grow: 1;
    display: flex; flex-direction: column; justify-content: space-between;
}
.product-card h3 {
    font-size: 1.1rem; font-weight: bold;
    color: #f3f4f6; margin: 0; transition: color 0.2s;
}
.product-card h3:hover { color: #dc2626; }
.product-card p {
    color: #d1d5db; font-size: 0.875rem;
    margin-top: 8px; flex-grow: 1;
}
.product-card .footer {
    display: flex; justify-content: space-between;
    align-items: center; margin-top: 12px;
}
.product-card .price { font-weight: bold; color: #dc2626; }
.product-card .details-btn {
    background-color: #dc2626; color: white;
    padding: 6px 12px; border-radius: 12px;
    font-weight: bold; cursor: pointer;
    transition: background-color 0.2s, transform 0.2s;
}
.product-card .details-btn:hover {
    background-color: #991b1b; transform: scale(1.05);
}

/* ----- Footer ----- */
footer {
    background-color: #111827; color: #f3f4f6;
    padding: 24px 16px;
    box-shadow: inset 0 2px 4px rgba(0,0,0,0.5);
}
footer .container {
    max-width: 1200px; margin: 0 auto;
    display: flex; flex-wrap: wrap;
    justify-content: space-between; align-items: center;
    font-size: 0.875rem;
}
footer p { margin: 4px 0; }

/* ----- Responsive ----- */
@media (max-width: 768px) {
    .products-grid { grid-template-columns: 1fr; }
    .search-form input[type="text"] { width: 140px; }
}
.pagination {
    display: flex;
    justify-content: center;
    gap: 6px;
    margin-top: 24px;
    flex-wrap: wrap;
}
.pagination a,
.pagination span {
    display: inline-block;
    padding: 6px 12px;
    border-radius: 8px;
    background-color: #1f2937;
    color: #f3f4f6;
    border: 1px solid #333;
    text-decoration: none;
    transition: 0.2s;
}
.pagination a:hover {
    background-color: #dc2626;
    transform: scale(1.05);
}
.pagination .active {
    background-color: #ef4444;
    border-color: #b91c1c;
    color: white;
}
.pagination .disabled {
    opacity: 0.5;
    cursor: not-allowed;
}

/* ----- Slider ----- */
/* استایل عکس‌های اسلایدر */
.swiper-slide img {
    width: 100%;
    height: 100%;
    object-fit: contain;   /* کل عکس رو نشون میده */
    border-radius: 12px;   /* گوشه‌ها گرد بشن */
    background-color: #000; /* پس‌زمینه پشت عکس برای جای خالی */
}

.swiper {
  width: 100%;
  height: 420px;
  margin-bottom: 32px;
  border-radius: 20px;
  overflow: hidden;
  box-shadow: 0 8px 20px rgba(0,0,0,0.5);
  position: relative; /* برای کنترل z-index */
   z-index: 1; /* کمتر از هدر */
}

.swiper-wrapper {
  display: flex;
}

.swiper-slide {
  flex-shrink: 0;
  width: 100%;
  height: 100%;
}

/* .swiper-slide img {
  width: 100%;
  height: 100%;
  object-fit: cover;
  transition: transform 5s ease;
} */

/* نقاط صفحه‌بندی */
.swiper-pagination {
  position: absolute;
  bottom: 15px;
  left: 0;
  width: 100%;
  text-align: center;
  z-index: 20;
}

.swiper-pagination-bullet {
  width: 12px;
  height: 12px;
  background: rgba(243, 244, 246, 0.7);
  border: 2px solid #fff;
  opacity: 1;
  transition: all 0.3s ease;
  margin: 0 6px !important;
}

.swiper-pagination-bullet-active {
  background: #dc2626;
  border-color: #b91c1c;
  transform: scale(1.3);
  box-shadow: 0 0 8px rgba(220,38,38,0.7);
}

/* دکمه‌های ناوبری */
.swiper-button-next,
.swiper-button-prev {
  color: #fff;
  background: rgba(0,0,0,0.4);
  width: 48px;
  height: 48px;
  border-radius: 50%;
  display: flex;
  justify-content: center;
  align-items: center;
  transition: 0.3s;
  z-index: 50;              /* بالاتر از عکس */
  position: absolute;       /* حتما absolute باشه */
  top: 50%;                 /* وسط عمودی */
  transform: translateY(-50%);
}
.swiper-button-next {
  right: 16px;              /* فاصله از راست */
   z-index: 10; /* فقط بالاتر از اسلایدر، نه از هدر */
}

.swiper-button-prev {
  left: 16px;          /* فاصله از چپ */
   z-index: 10; /* فقط بالاتر از اسلایدر، نه از هدر */
}

.swiper-button-next:hover,
.swiper-button-prev:hover {
  background: rgba(220,38,38,0.8);
}
.language-switcher {
    display: flex;
    justify-content: flex-end;
    gap: 10px;
    padding: 10px;
}

.lang-btn {
    padding: 6px 14px;
    border-radius: 8px;
    color: #fff;
    font-weight: bold;
    text-decoration: none;
    transition: 0.3s ease;
    font-family: inherit;
}

/* گرادیانت برای هر زبان */
.lang-btn.fa {
    background: linear-gradient(45deg, #6b21a8, #4f46e5); /* بنفش */
}
.lang-btn.en {
    background: linear-gradient(45deg, #059669, #14b8a6); /* سبز */
}
.lang-btn.ar {
    background: linear-gradient(45deg, #dc2626, #ec4899); /* قرمز */
}

/* افکت hover */
.lang-btn:hover {
    opacity: 0.85;
    transform: scale(1.05);
}
.logo {
    display: flex;
    align-items: center;
    gap: 10px;
    font-size: 1.4rem;
    font-weight: bold;
    color: white;
}

.logo-img {
    height: 40px;
    width: auto;
    border-radius: 8px;
}


    </style>
</head>
<body>

<header>
    <a href="{{ route('index', ['lang' => app()->getLocale()]) }}" class="logo">
        <img src="{{ asset('/etminansaf.jpg') }}" alt="Etminan saf" class="logo-img">
        <span>ETMINANSAF</span>
    </a>

    <div class="language-switcher">
        <a href="{{ request()->fullUrlWithQuery(['lang' => 'fa']) }}" class="lang-btn fa">🇮🇷 فارسی</a>
    <a href="{{ request()->fullUrlWithQuery(['lang' => 'en']) }}" class="lang-btn en">🇺🇸 English</a>
    <a href="{{ request()->fullUrlWithQuery(['lang' => 'ar']) }}" class="lang-btn ar">🇮🇶 العربية</a>
    </div>

   <form method="GET" action="{{ route('index') }}" class="search-form">
    {{-- زبان همیشه همراه درخواست بره --}}
    <input type="hidden" name="lang" value="{{ app()->getLocale() }}">

    <input type="text" name="search" placeholder="{{ __('messages.search') }}" value="{{ request('search') }}">
    <button type="submit">🔍</button>
</form>


    <div class="auth-buttons">
        <a href="{{ route('agencies.index', ['lang' => app()->getLocale()]) }}" class="login-btn">{{ __('messages.agencies') }}</a>

        @auth
        <form method="POST" action="{{ route('logout', ['lang' => app()->getLocale()]) }}">
            @csrf
            <button type="submit" class="logout-btn">{{ __('messages.logout') }}</button>
        </form>
        @else
        <a href="{{ route('login', ['lang' => app()->getLocale()]) }}" class="login-btn">{{ __('messages.login') }}</a>
        @endauth
    </div>
</header>

<nav class="categories">
    <div class="container">
        <a href="{{ route('index', ['lang' => app()->getLocale()]) }}">
            {{ __('messages.all_products') }}
        </a>
        @foreach($categories as $category)
            <a href="{{ route('index', ['category' => $category->id, 'lang' => app()->getLocale()]) }}">
                {{ $category->getTranslatedName(app()->getLocale()) }}
            </a>
        @endforeach
    </div>
</nav>

<main>

    <!-- اسلایدر -->
  <div class="swiper mySwiper">
  <div class="swiper-wrapper">
    @foreach($sliders as $slider)
      <div class="swiper-slide">
        <img src="{{ asset('$slider->image) }}" alt="اسلاید {{ $loop->iteration }}">
      </div>
    @endforeach
  </div>

<!-- نقاط و دکمه‌ها -->
  <div class="swiper-pagination"></div>
  <div class="swiper-button-next"></div>
  <div class="swiper-button-prev"></div>
</div>

<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script>
  var swiper = new Swiper(".mySwiper", {
    loop: true,
    autoplay: {
      delay: 3000,
      disableOnInteraction: false,
    },
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
    effect: "slide",
    speed: 800
  });
</script>


    <h2>{{ __('messages.products') }}</h2>
    <div class="products-grid">
        @foreach($products as $product)
        <div class="product-card">
            <div style="position: relative;">
               <img
                src="{{ $product->images->first() ? asset($product->images->first()->image) : asset('default.png') }}"
                alt="{{ $product->getTranslatedName() }}">

            </div>
            <div class="content">
               <h3>{{ $product->getTranslatedName() }}</h3>
                <p>{{ Str::limit($product->getTranslatedDescription(), 80) }}</p>
                <div class="footer">
                    <span class="price">{{ number_format($product->getTranslatedPrice()) }} {{ __('messages.currency') }}</span>
                    <a href="{{ route('product.show', ['id' => $product->id, 'lang' => app()->getLocale()]) }}" class="details-btn">
                        {{ __('messages.details') }}
                    </a>
                </div>
            </div>
        </div>
        @endforeach
    </div>

   <div class="pagination">
    @if ($products->onFirstPage())
        <span class="disabled">{{ __('messages.previous') }}</span>
    @else
        <a href="{{ $products->previousPageUrl() }}">{{ __('messages.previous') }}</a>
    @endif

    @foreach ($products->getUrlRange(max(1, $products->currentPage()-2), min($products->lastPage(), $products->currentPage()+2)) as $page => $url)
        @if ($page == $products->currentPage())
            <span class="active">{{ $page }}</span>
        @else
            <a href="{{ $url }}">{{ $page }}</a>
        @endif
    @endforeach

    @if ($products->hasMorePages())
        <a href="{{ $products->nextPageUrl() }}">{{ __('messages.next') }}</a>
    @else
        <span class="disabled">{{ __('messages.next') }}</span>
    @endif
</div>

</main>

<footer>
    <div class="container">
       © 2025 {{ __('messages.footer') }}
       <a href="{{ route('about.contact', ['lang' => app()->getLocale()]) }}">
    {{ __('messages.about_contact') }}
</a>

    </div>

</footer>

</body>
</html>
