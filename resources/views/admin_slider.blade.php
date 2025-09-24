<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>مدیریت اسلایدرها | پنل ادمین</title>
    <link rel="icon" type="image/png" href="{{ asset('/etminansaf.jpg') }}">
    <link rel="shortcut icon" href="{{ asset('/etminansaf.jpg') }}">
    <style>
        * { box-sizing: border-box; }
        body {
            font-family: Arial, sans-serif;
            margin: 0; padding: 0;
            min-height: 100vh;
            background: linear-gradient(to right, #000, #111, #b91c1c);
            color: #f3f4f6;
        }
        .container {
            max-width: 1200px;
            margin: 32px auto;
            padding: 0 16px;
        }
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 32px;
            flex-wrap: wrap;
            gap: 12px;
        }
        .header h1 { font-size: 1.75rem; color: #f87171; }
        .header .buttons { display: flex; gap: 10px; }
        .header a {
            background: linear-gradient(to right, #b91c1c, #dc2626);
            padding: 10px 18px;
            border-radius: 12px;
            color: white;
            font-weight: bold;
            transition: transform 0.2s, box-shadow 0.2s;
            text-decoration: none;
        }
        .header a:hover {
            transform: scale(1.05);
            box-shadow: 0 6px 15px rgba(0,0,0,0.6);
        }
        .sliders-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit,minmax(250px,1fr));
            gap: 24px;
        }
        .slider-card {
            background: #1a1a1a;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 10px 25px rgba(0,0,0,0.6);
            display: flex;
            flex-direction: column;
            transition: transform 0.3s, box-shadow 0.3s;
        }
        .slider-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 12px 32px rgba(0,0,0,0.9);
        }
        .slider-card img {
            width: 100%;
            height: 180px;
            object-fit: cover;
        }
        .slider-card .content {
            padding: 16px;
            flex-grow: 1;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }
        .slider-card h3 {
            font-size: 1.1rem;
            font-weight: bold;
            margin: 0;
            color: #f3f4f6;
        }
        .actions {
            margin-top: 12px;
            display: flex;
            justify-content: space-between;
        }
        .actions a,
        .actions form button {
            padding: 8px 14px;
            border-radius: 12px;
            font-weight: bold;
            cursor: pointer;
            border: none;
            color: white;
            transition: transform 0.2s, box-shadow 0.2s;
        }
        .edit-btn { background: #4f46e5; }
        .edit-btn:hover { background: #4338ca; transform: scale(1.05); }
        .delete-btn { background: #ef4444; }
        .delete-btn:hover { background: #991b1b; transform: scale(1.05); }
        .empty { text-align: center; font-size: 1rem; color: #d1d5db; margin-top: 40px; }
    </style>
</head>
<body>

<div class="container">
    <div class="header">
        <h1>مدیریت اسلایدرها</h1>
        <div class="buttons">
            <a href="{{ route('admin.index') }}">⬅ بازگشت</a>
            <a href="{{ route('admin.sliders.create') }}">➕ افزودن اسلایدر</a>
        </div>
    </div>

    <div class="sliders-grid">
        @forelse($sliders as $slider)
            <div class="slider-card">
                @if($slider->image && file_exists(public_path($slider->image)))
                    <img src="{{ asset($slider->image) }}" alt="{{ $slider->title }}">
                @else
                    <img src="https://via.placeholder.com/300x180?text=No+Image" alt="بدون تصویر">
                @endif
                <div class="content">
                    <h3>{{ $slider->title ?? 'بدون عنوان' }}</h3>
                    <div class="actions">
                        <a href="{{ route('admin.sliders.edit', $slider) }}" class="edit-btn">✏️ ویرایش</a>
                        <form action="{{ route('admin.sliders.destroy', $slider) }}" method="POST" onsubmit="return confirm('آیا مطمئن هستید؟')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="delete-btn">🗑 حذف</button>
                        </form>
                    </div>
                </div>
            </div>
        @empty
            <p class="empty">هیچ اسلایدی موجود نیست 🙁</p>
        @endforelse
    </div>

    {{-- <!--<div style="margin-top: 20px;">-->
    <!--    {{ $sliders->links() }}-->
    <!--</div>--> --}}
</div>

</body>
</html>
