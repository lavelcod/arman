<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
<meta charset="UTF-8">
<title>داشبورد مدیریت</title>
 <link rel="icon" type="image/png" href="{{ asset('storage/logo/etminansaf.jpg') }}">
    <link rel="shortcut icon" href="{{ asset('storage/logo/etminansaf.jpg') }}">
<style>
* { box-sizing: border-box; }
body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background: linear-gradient(135deg, #111827, #000000);
    color: #f3f4f6;
}
a { text-decoration: none; color: inherit; }

/* ----- Navbar ----- */
header {
        background: linear-gradient(90deg, #000 0%, #111 40%, #b91c1c 100%); /* مشکی-قرمز */
        color: white;
        padding: 16px 0;
        box-shadow: 0 4px 10px rgba(0,0,0,0.5);
    }
    .container {
        width: 90%;
        max-width: 1200px;
        margin: 0 auto;
    }
    header .flex {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
    header a {
        background-color: #b91c1c;
        padding: 8px 16px;
        border-radius: 8px;
        color: white;
        transition: all 0.3s ease;
    }
    header a:hover {
        background-color: #dc2626;
        transform: scale(1.05);
    }
    .logout-btn {
    background: linear-gradient(to right, #b91c1c, #dc2626);
    color: white;
    padding: 8px 16px;
    border: none;
    border-radius: 8px;
    cursor: pointer;
    font-weight: bold;
    transition: transform 0.2s, background 0.3s;
}

.logout-btn:hover {
    transform: scale(1.05);
    background: linear-gradient(to right, #dc2626, #b91c1c);
}

/* ----- Dashboard Cards ----- */
.container {
    max-width: 1200px;
    margin: 40px auto;
    padding: 0 16px;
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 24px;
}
.card {
    background-color: #1f2937;
    border-radius: 24px;
    padding: 24px;
    text-align: center;
    box-shadow: 0 8px 20px rgba(0,0,0,0.6);
    transition: transform 0.3s, box-shadow 0.3s;
}
.card:hover {
    transform: translateY(-8px);
    box-shadow: 0 12px 32px rgba(0,0,0,0.9);
}
.card h2 {
    font-weight: bold;
    font-size: 1.25rem;
    margin-bottom: 8px;
}
.products { color: #dc2626; }
.categories { color: #8b5cf6; }
.website { color: #10b981; }
.slider {color: #ef4444}
.dealers{color:#8b5cf6}
.card p { color: #d1d5db; margin: 0; }

@media (max-width: 768px) {
    .container { grid-template-columns: 1fr; }
}
</style>
</head>
<body>
 <header>
        <div class="container flex">
            <h1>🔧 پنل مدیریت</h1>
        <form method="POST" action="{{ route('logout') }}" style="margin:0;">
            @csrf
            <button type="submit" class="btn logout-btn">خروج</button>
        </form>

        </div>
</header>
<div class="container">
     <a href="{{ route('admin.dealers.index') }}" class="card">
        <h2 class="dealers">مدیریت نمایندگی ها</h2>
        <p>افزودن، ویرایش و حذف نمایندگی</p>
    </a>
    <a href="{{ route('admin.products.index') }}" class="card">
        <h2 class="products">مدیریت محصولات</h2>
        <p>افزودن، ویرایش و حذف محصول</p>
    </a>
    <a href="{{ route('admin.categories.index') }}" class="card">
        <h2 class="categories">مدیریت دسته‌ها</h2>
        <p>مدیریت گروه‌بندی محصولات</p>
    </a>
     <a href="{{ route('admin.sliders.index') }}" class="card">
        <h2 class="slider">مدیریت اسلایدر</h2>
        <p>افزودن، ویرایش و حذف اسلایدر</p>
    </a>
    <a href="{{ route('index') }}" class="card">
        <h2 class="website">بازگشت به سایت</h2>
        <p>مشاهده فروشگاه</p>
    </a>
</div>

</body>
</html>
