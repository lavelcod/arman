<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
<meta charset="UTF-8">
<title>ورود | پنل مدیریت</title>
 <link rel="icon" type="image/png" href="{{ asset('storage/logo/etminansaf.jpg') }}">
    <link rel="shortcut icon" href="{{ asset('storage/logo/etminansaf.jpg') }}">
<style>
* { box-sizing: border-box; }
body {
    margin: 0;
    font-family: Arial, sans-serif;
    background: linear-gradient(135deg, #111827, #000000);
    min-height: 100vh;
    display: flex;
    flex-direction: column;
    align-items: center;
    color: #f3f4f6;
}
/* ----- Header ----- */
header {
    background-color: #b91c1c;
    color: white;
    padding: 16px;
    width: 100%;
    display: flex;
    justify-content: space-between;
    align-items: center;
    position: sticky;
    top: 0;
    z-index: 50;
}
header .logo {
    font-size: 1.5rem;
    font-weight: bold;
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
header a:hover {
    transform: scale(1.05);

}
/* ----- Login Container ----- */
.login-container {
    background-color: #1f2937;
    padding: 32px;
    border-radius: 24px;
    box-shadow: 0 8px 24px rgba(0,0,0,0.7);
    width: 100%;
    max-width: 400px;
    margin-top: 80px;
}
h1 {
    text-align: center;
    font-size: 1.5rem;
    font-weight: bold;
    color: #f87171;
    margin-bottom: 24px;
}
.error-msg {
    background-color: #fee2e2;
    color: #b91c1c;
    padding: 12px;
    border-radius: 12px;
    margin-bottom: 16px;
    font-size: 0.875rem;
}
form div { margin-bottom: 16px; }
label {
    display: block;
    margin-bottom: 4px;
    font-weight: 500;
    color: #d1d5db;
}
input[type="text"], input[type="password"] {
    width: 100%;
    padding: 12px;
    border: 1px solid #374151;
    background: #111827;
    color: #f3f4f6;
    border-radius: 12px;
    outline: none;
    transition: box-shadow 0.2s, border-color 0.2s;
}
input[type="text"]:focus, input[type="password"]:focus {
    box-shadow: 0 0 0 3px rgba(220, 38, 38, 0.5);
    border-color: #dc2626;
}
button {
    width: 100%;
    padding: 12px;
    background-color: #dc2626;
    color: white;
    font-weight: bold;
    border: none;
    border-radius: 16px;
    cursor: pointer;
    transition: background-color 0.2s, transform 0.2s;
}
button:hover {
    background-color: #991b1b;
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
header a.back-btn {
    background-color:  #1f2937;  /* قرمز اصلی */
    padding: 8px 16px;
    border-radius: 12px;
    font-weight: bold;
    color: white;
    text-decoration: none;
    transition: background-color 0.2s, transform 0.2s;
}

header a.back-btn:hover {
    background-color:  #1f2937; /* قرمز تیره‌تر در هاور */
    transform: scale(1.05);
}



</style>
</head>
<body>

<header>
    <a href="{{ route('index', ['lang' => app()->getLocale()]) }}" class="logo">
        <img src="{{ asset('storage/logo/etminansaf.jpg') }}" alt="Etminan saf" class="logo-img">
        <span>ETMINANSAF</span>
    </a>
    <a href="{{ route('index', ['lang' => app()->getLocale()]) }}" class="back-btn">بازگشت به سایت</a>
</header>

<div class="login-container">
    <h1>{{ __('messages.loginin') }}</h1>

    <!-- خطای ورود -->
    @if ($errors->any())
        <div class="error-msg">
            {{ $errors->first() }}
        </div>
    @endif

    <form action="{{ route('doLogin') }}" method="POST">
        @csrf
        <div>
            <label>{{ __('messages.username') }}</label>
            <input type="text" name="name">
        </div>
        <div>
            <label>{{ __('messages.password') }}</label>
            <input type="password" name="password">
        </div>
        <button type="submit">{{ __('messages.login') }}</button>
    </form>
</div>

</body>
</html>
