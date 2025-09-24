<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>{{ $product->getTranslatedName() }} | ETMINANSAF</title>
     <link rel="icon" type="image/png" href="{{ asset('/etminansaf.jpg') }}">
    <link rel="shortcut icon" href="{{ asset('/etminansaf.jpg') }}">
    <!-- ðŸ”¹ Schema.org Product -->


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
        header {
            background-color: #b91c1c;
            color: white;
            padding: 16px;
            position: sticky;
            top: 0;
            z-index: 50;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .logo { font-size: 1.5rem; font-weight: bold; }
        main { max-width: 900px; margin: 24px auto; padding: 0 16px 40px; }
        .product-container {
            display: flex;
            flex-wrap: wrap;
            gap: 24px;
            background-color: #1f2937;
            border-radius: 20px;
            padding: 24px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.6);
        }
        .product-image {
            flex: 1 1 300px;
            text-align: center;
        }
        .product-image img {
            max-width: 100%;
            border-radius: 16px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.6);
        }
        .product-details {
            flex: 1 1 300px;
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
        }
        .product-details h1 {
            font-size: 2rem;
            margin-bottom: 16px;
            color: #f3f4f6;
        }
        .product-details .price {
            font-size: 1.5rem;
            font-weight: bold;
            color: #dc2626;
            margin-bottom: 12px;
        }
        .product-details .category {
            font-size: 1rem;
            margin-bottom: 16px;
            color: #f87171;
        }
        .product-details .description {
            font-size: 1rem;
            color: #d1d5db;
            line-height: 1.6;
            margin-bottom: 24px;
        }
        .back-btn {
            display: inline-block;
            background-color: #ce3030;
            color: white;
            padding: 10px 20px;
            border-radius: 12px;
            font-weight: bold;
            transition: 0.2s;
        }
        .back-btn:hover {
            background-color: #dc2626;
            transform: scale(1.05);
        }
        .deales-btn {
            display: inline-block;
            background-color: #26dc35;
            color: white;
            padding: 10px 20px;
            border-radius: 12px;
            font-weight: bold;
            transition: 0.2s;
        }
        .deales-btn:hover {
            background-color: #26dc35;
            transform: scale(1.05);
        }
        @media(max-width:768px){
            .product-container { flex-direction: column; }
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
    <a href="{{ route('agencies.index', ['lang' => app()->getLocale()]) }}" class="deales-btn">{{ __('messages.agencies') }}</a>
    <a href="{{ route('index', ['lang' => app()->getLocale()]) }}" class="back-btn">{{ __('messages.back_to_site') }}</a>
</header>

<main>
    <div class="product-container">
        <div class="product-image">
            @if($product->images->first())
                <img src="{{ asset($product->images->first()->image) }}" alt="{{ $product->getTranslatedName() }}">
            @endif
        </div>
        <div class="product-details">
            <h1>{{ $product->getTranslatedName() }}</h1>
            <div class="price">{{ $product->getFormattedPrice() }}</div>
            <div class="category">
                {{ __('messages.category') }}:
                {{ $product->category ? $product->category->getTranslatedName() : '-' }}
            </div>
            <div class="description">{{ $product->getTranslatedDescription() }}</div>
            <a href="{{ route('index', ['lang' => app()->getLocale()]) }}" class="back-btn">{{ __('messages.back_to_site') }}</a>
        </div>
    </div>
</main>

<footer style="background-color:#111827; color:#f3f4f6; padding:24px 16px; text-align:center;">
    Â© 2025 {{ __('messages.footer') }}
</footer>

</body>
</html>
