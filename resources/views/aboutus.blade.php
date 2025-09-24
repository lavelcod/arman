<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>{{ __('messages.about_contact') }} | ETMINANSAF</title>
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
            background-color: #b91c1c; color: white;
            padding: 16px; display: flex; justify-content: space-between; align-items: center;
        }
        .logo { font-size: 1.5rem; font-weight: bold; }

        /* Main container */
        main {
            max-width: 1000px;
            margin: 40px auto;
            padding: 0 20px;
            display: flex;
            flex-direction: column;
            gap: 30px;
        }

        h2 {
            font-size: 1.6rem;
            border-right: 4px solid #dc2626;
            padding-right: 12px;
            margin-bottom: 16px;
        }

        /* Cards */
        .card {
            background: #1f2937;
            border-radius: 16px;
            padding: 24px;
            box-shadow: 0 6px 16px rgba(0,0,0,0.6);
            transition: transform 0.3s;
        }
        .card:hover { transform: translateY(-6px); }

        .card p {
            line-height: 1.8;
            text-align: justify;
            margin: 0;
        }

        /* Contact info */
        .contact-list {
            list-style: none;
            padding: 0;
            margin: 0;
            display: flex;
            flex-direction: column;
            gap: 12px;
        }
        .contact-list li {
            background: #111827;
            padding: 12px 16px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            gap: 10px;
            transition: 0.2s;
        }
        .contact-list li:hover {
            background: #dc2626;
            color: white;
        }
        .contact-list a { color: inherit; font-weight: bold; }

        /* Footer */
        footer {
            background: #111827;
            text-align: center;
            padding: 20px;
            color: #f3f4f6;
            font-size: 0.9rem;
        }

        @media(max-width:768px){
            main{ padding: 0 12px; }
        }
        .header-buttons {
    display: flex;
    gap: 12px;
}

.btn-header {
    background: #dc2626;
    padding: 10px 18px;
    border-radius: 8px;
    font-size: 0.95rem;
    font-weight: bold;
    color: white;
    transition: background 0.3s, transform 0.2s;
}

.btn-header:hover {
    background: #aa1515;
    transform: translateY(-2px);
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
    <div class="header-buttons">
        <a href="{{ route('agencies.index', ['lang' => app()->getLocale()]) }}" class="btn-header">
            {{ __('messages.agencies') }}
        </a>
        <a href="{{ route('index', ['lang' => app()->getLocale()]) }}" class="btn-header">
            {{ __('messages.back_to_site') }}
        </a>
    </div>
</header>



<main>
    <!-- درباره ما -->
    <section class="card">
        <h2>📌 {{ __('messages.about_us') }}</h2>
        <p>{{ __('messages.about_text') }}</p>
    </section>

    <!-- ارتباط با ما -->
    <section class="card">
        <h2>📞 {{ __('messages.contact_us') }}</h2>
        <ul class="contact-list">
            <li>📱 <a href="tel:+989137287006">09137287006 , 09133519756</a></li>
            <li>💬 <a href="https://wa.me/9809137287006">{{ __('messages.whatsapp') }}</a></li>
            <li>📧 <a href="mailto:info@etminansaf.com">info@etminansaf.com</a></li>
        </ul>
    </section>
</main>

<footer>
    © 2025 ETMINANSAF | {{ __('messages.footer') }}
</footer>

</body>
</html>
