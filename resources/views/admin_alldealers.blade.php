<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>مدیریت نمایندگی‌ها | پنل ادمین</title>
     <link rel="icon" type="image/png" href="{{ asset('/etminansaf.jpg') }}">
    <link rel="shortcut icon" href="{{ asset('/etminansaf.jpg') }}">
    <style>
    * { box-sizing: border-box; }
    body {
        font-family: Arial, sans-serif;
        background-color: #111;
        color: #f5f5f5;
        margin: 0; padding: 0;
    }
    a { text-decoration: none; }
    header {
        background: linear-gradient(90deg, #000 0%, #111 40%, #b91c1c 100%);
        color: white; padding: 16px 0;
        box-shadow: 0 4px 10px rgba(0,0,0,0.5);
    }
    .container { width: 90%; max-width: 1200px; margin: 0 auto; }
    header .flex {
        display: flex; justify-content: space-between; align-items: center;
    }
    header a {
        background-color: #b91c1c; padding: 8px 16px;
        border-radius: 8px; color: white; transition: all 0.3s ease;
    }
    header a:hover { background-color: #dc2626; transform: scale(1.05); }
    main { padding: 24px 0; }
    h2 { font-size: 1.5rem; color: #f87171; }
    .add-btn {
        background-color: #b91c1c; color: white;
        padding: 8px 16px; border-radius: 8px;
        transition: background-color 0.3s, transform 0.2s;
    }
    .add-btn:hover { background-color: #dc2626; transform: scale(1.05); }
    table {
        width: 100%; border-collapse: collapse;
        background-color: #1a1a1a; border-radius: 12px;
        overflow: hidden; box-shadow: 0 4px 15px rgba(0,0,0,0.4);
    }
    th, td {
        padding: 12px; border-bottom: 1px solid #333;
        text-align: right; color: #f5f5f5;
    }
    th { background-color: #b91c1c; color: white; }
    tr:hover { background-color: #2a2a2a; }
    img.agent-img {
        width: 64px; height: 64px; object-fit: cover;
        border-radius: 8px; border: 2px solid #b91c1c;
    }
    .actions { display: flex; gap: 8px; }
    .edit-btn, .delete-btn {
        padding: 6px 12px; border: none; border-radius: 8px;
        color: white; cursor: pointer;
        transition: transform 0.2s, background-color 0.3s;
    }
    .edit-btn { background-color: #2563eb; }
    .edit-btn:hover { background-color: #1d4ed8; transform: scale(1.05); }
    .delete-btn { background-color: #b91c1c; }
    .delete-btn:hover { background-color: #dc2626; transform: scale(1.05); }
   .pagination {
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 6px;
    margin-top: 16px;
    flex-wrap: wrap;
    font-size: 0.9rem;
}

.pagination a,
.pagination span {
    display: inline-block;
    padding: 6px 12px;
    border-radius: 8px;
    background-color: #1a1a1a;
    color: #f5f5f5;
    border: 1px solid #333;
    text-decoration: none;
    transition: 0.2s;
}

.pagination a:hover {
    background-color: #b91c1c;
    transform: scale(1.05);
}

.pagination .active {
    background-color: #dc2626;
    border-color: #b91c1c;
    color: white;
}

.pagination .disabled {
    opacity: 0.5;
    cursor: not-allowed;
}

    @media (max-width: 768px) {
        th, td { padding: 8px; font-size: 0.875rem; }
        .flex { flex-direction: column; gap: 8px; }
        .actions { flex-direction: column; }
    }
    </style>
</head>
<body>
    <!-- هدر -->
    <header>
        <div class="container flex">
            <h1>🔧 پنل مدیریت</h1>
            <a href="{{ route('admin.index') }}">بازگشت به پنل مدیریت</a>
        </div>
    </header>

    <!-- محتوای اصلی -->
    <main class="container">
        <div class="flex" style="justify-content: space-between; align-items: center; margin-bottom: 16px;">
            <h2>🏢 مدیریت نمایندگی‌ها</h2>
            <a href="{{ route('admin.dealers.create') }}" class="add-btn">➕ افزودن نمایندگی</a>
        </div>

        <table>
            <thead>
                <tr>
                    <th>عکس فروشگاه</th>
                    <th>نام نمایندگی</th>
                    <th>شهر</th>
                    <th>آدرس</th>
                    <th>نام فروشنده</th>
                    <th>شماره موبایل</th>
                    <th>تاریخ ایجاد</th>
                    <th>عملیات</th>
                </tr>
            </thead>
            <tbody>
                @forelse($dealers as $dealer)
                <tr>
                    <td>
                        @if($dealer->image)
                             <img src="{{ asset($dealer->image) }}" class="agent-img">
                        @else
                            -
                        @endif
                    </td>
                    <td>{{ $dealer->getTranslatedName() }}</td>
                    <td>{{ $dealer->getTranslatedCity() }}</td>
                    <td>{{ $dealer->getTranslatedAddress() }}</td>
                    <td>{{ $dealer->seller_name }}</td>
                    <td>{{ $dealer->mobile }}</td>
                    <td>{{ $dealer->created_at->format('Y/m/d') }}</td>
                    <td class="actions">
                        <a href="{{ route('admin.dealers.edit', $dealer->id) }}" class="edit-btn">✏️ ویرایش</a>
                        <form method="POST" action="{{ route('admin.dealers.destroy', $dealer->id) }}">
                            @csrf
                            @method('DELETE')
                            <button onclick="return confirm('آیا مطمئن هستید؟')" class="delete-btn" type="submit">🗑 حذف</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="8" style="text-align:center; padding: 24px; color:#6b7280;">
                        هیچ نمایندگی‌ای یافت نشد 🙁
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>

        <!-- صفحه‌بندی -->
       <div class="pagination">
    {{-- قبلی --}}
    @if ($dealers->onFirstPage())
        <span class="disabled">قبلی</span>
    @else
        <a href="{{ $dealers->previousPageUrl() }}">قبلی</a>
    @endif

    {{-- صفحات --}}
    @foreach ($dealers->getUrlRange(max(1, $dealers->currentPage()-2), min($dealers->lastPage(), $dealers->currentPage()+2)) as $page => $url)
        @if ($page == $dealers->currentPage())
            <span class="active">{{ $page }}</span>
        @else
            <a href="{{ $url }}">{{ $page }}</a>
        @endif
    @endforeach

    {{-- بعدی --}}
    @if ($dealers->hasMorePages())
        <a href="{{ $dealers->nextPageUrl() }}">بعدی</a>
    @else
        <span class="disabled">بعدی</span>
    @endif
</div>

    </main>
</body>
</html>
