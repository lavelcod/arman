<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>{{ __('messages.agencies') }} | ETMINANSAF</title>
     <link rel="icon" type="image/png" href="{{ asset('/etminansaf.jpg') }}">
    <link rel="shortcut icon" href="{{ asset('/etminansaf.jpg') }}">

    <style>
        * { box-sizing: border-box; }
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #111827, #000000);
            margin: 0; padding: 0; color: #f3f4f6;
        }
        a { text-decoration: none; color: inherit; }

        /* Header */
        header {
            background-color: #b91c1c;
            color: white;
            padding: 16px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 12px;
            position: fixed;
            top: 0; left: 0;
            width: 100%; z-index: 1000;
        }
        header a {
            background-color: #b91c1c;
            padding: 8px 16px;
            border-radius: 12px;
            font-weight: bold;
            color: white;
            text-decoration: none;
            transition: transform 0.2s;
        }
        header a:hover { transform: scale(1.05); }
        .logo { font-size: 1.5rem; font-weight: bold; }

        /* Search */
        .search-form {
            display: flex; background-color: #1f2937;
            border-radius: 50px; overflow: hidden;
            box-shadow: 0 4px 8px rgba(0,0,0,0.6);
        }
        .search-form input {
            padding: 8px 12px; border: none; outline: none;
            background: transparent; color: #f3f4f6;
            width: 200px;
        }
        .search-form button {
            background: #dc2626; color: white; border: none;
            padding: 0 12px; cursor: pointer; transition: 0.2s;
        }
        .search-form button:hover { background: #991b1b; }

        /* Cities Navbar */
        nav.cities {
            background: #1f2937;
            padding: 8px 0;
            box-shadow: 0 2px 8px rgba(0,0,0,0.5);
            margin-top: 80px;
        }
        nav.cities .container {
            max-width: 1200px; margin: auto;
            display: flex; flex-wrap: wrap;
            justify-content: center; gap: 8px;
            padding: 0 16px;
        }
        nav.cities a {
            padding: 6px 16px; border-radius: 50px;
            background: #111827; color: #f87171;
            border: 1px solid #b91c1c;
            transition: 0.2s;
        }
        nav.cities a:hover, nav.cities .active {
            background: #b91c1c; color: white;
        }

        /* Main */
        main {
            max-width: 1200px;
            margin: 24px auto;
            padding: 0 16px 40px;
        }
        h2 {
    font-size: 1.75rem;
    border-{{ app()->getLocale() == 'fa' || app()->getLocale() == 'ar' ? 'right' : 'left' }}: 4px solid #dc2626;
    padding-{{ app()->getLocale() == 'fa' || app()->getLocale() == 'ar' ? 'right' : 'left' }}: 12px;
    margin-bottom: 24px;
}


        /* Agencies Grid */
        .agencies-grid {
            display: grid; gap: 24px;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        }
        .agency-card {
            background: #1f2937; border-radius: 24px;
            padding: 16px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.6);
            transition: 0.3s;
        }
        .agency-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 12px 24px rgba(0,0,0,0.9);
        }
        /* .agency-card img {
            width: 100%; height: 180px; object-fit: cover;
            border-radius: 16px; margin-bottom: 12px;
        } */
        .agency-card img {
            width: 100%;
            height: auto;          /* ارتفاع با توجه به نسبت تصویر */
            object-fit: contain;   /* کل عکس نشون داده میشه */
            border-radius: 16px;
            margin-bottom: 12px;
            background-color: #000; /* پس‌زمینه خالی اطراف عکس */
            display: block;
        }
        .agency-card h3 { margin: 0 0 8px; font-size: 1.2rem; }
        .agency-card p { margin: 0 0 8px; font-size: 0.9rem; color: #d1d5db; }
        .agency-card .contact { font-size: 0.9rem; color: #f87171; }

        /* Pagination */
        .pagination {
            display: flex; justify-content: center;
            gap: 6px; margin-top: 24px; flex-wrap: wrap;
        }
        .pagination a, .pagination span {
            padding: 6px 12px; border-radius: 8px;
            background: #1f2937; color: #f3f4f6;
            border: 1px solid #333;
            transition: 0.2s;
        }
        .pagination a:hover { background: #dc2626; }
        .pagination .active { background: #ef4444; border-color: #b91c1c; }

        /* Footer */
        footer {
            background: #111827; color: #f3f4f6;
            padding: 24px 16px; text-align: center;
        }

        @media(max-width:768px){
            header { flex-direction: column; align-items: stretch; }
            .search-form { width: 100%; }
            .main-btn { text-align: center; width: 100%; }
            .agencies-grid { grid-template-columns: 1fr; }
            .search-form input { width: 140px; }
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
    <form method="GET" action="{{ route('agencies.index') }}" class="search-form">
        <input type="hidden" name="lang" value="{{ app()->getLocale() }}">
        <input type="text" name="search" placeholder="{{ __('messages.search_agency') }}" value="{{ request('search') }}">
        <button type="submit">🔍</button>
    </form>
    <a href="{{ route('index') }}?lang={{ app()->getLocale() }}" style="background-color: #111827">{{ __('messages.back_to_site') }}</a>
</header>

<!-- Cities Navbar -->

<nav class="cities">
    <div class="container">
        {{-- همه نمایندگی‌ها --}}
        <a href="{{ route('agencies.index', ['lang' => app()->getLocale()]) }}">
            {{ __('messages.all_agencies') }}
        </a>

        {{-- لینک هر شهر --}}
        @foreach($cities as $city)
            @php
                $cityName = $city[app()->getLocale()] ?? $city['fa'];
            @endphp
            <a href="{{ route('agencies.index', ['city' => $cityName, 'lang' => app()->getLocale()]) }}">
                {{ $cityName }}
            </a>
        @endforeach
    </div>
</nav>

<main>
    <h2>{{ __('messages.agencies') }}</h2>
    <div class="agencies-grid">
        @forelse($agencies as $agency)
            <div class="agency-card">
                @if($agency->image)
                    <img src="{{ asset($agency->image) }}" alt="{{ $agency->getTranslatedName() }}">
                @endif
                    <h3>{{ $agency->getTranslatedName() }}</h3>
                    <p>{{ Str::limit($agency->getTranslatedAddress(), 80) }}</p>
                    <p class="contact">📍 {{ $agency->getTranslatedCity() }}</p>
                    <p class="contact">🧑 {{ $agency->seller_name }}</p>
                    <p class="contact">📞 {{ $agency->mobile }}</p>
            </div>
        @empty
            <p style="text-align:center; color:#6b7280;">{{ __('messages.no_agency_found') }}</p>
        @endforelse
    </div>

    <!-- Pagination -->
    <div class="pagination">
        @if ($agencies->onFirstPage())
            <span class="disabled">{{ __('messages.previous') }}</span>
        @else
            <a href="{{ $agencies->previousPageUrl() }}">{{ __('messages.previous') }}</a>
        @endif

        @foreach ($agencies->getUrlRange(max(1, $agencies->currentPage()-2), min($agencies->lastPage(), $agencies->currentPage()+2)) as $page => $url)
            @if ($page == $agencies->currentPage())
                <span class="active">{{ $page }}</span>
            @else
                <a href="{{ $url }}">{{ $page }}</a>
            @endif
        @endforeach

        @if ($agencies->hasMorePages())
            <a href="{{ $agencies->nextPageUrl() }}">{{ __('messages.next') }}</a>
        @else
            <span class="disabled">{{ __('messages.next') }}</span>
        @endif
    </div>
</main>

<footer>
    © 2025 ETMINANSAF
</footer>

</body>
</html>

