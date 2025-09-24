<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DealerController;
use App\Http\Controllers\SliderController;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\App;

// ----------------------
// صفحات عمومی (فروشگاه)
// ----------------------
Route::get('/', [IndexController::class, 'index'])->name('index');
Route::get('/product/{id}', [IndexController::class, 'show'])->name('product.show');
Route::get('/category/{id}', [IndexController::class, 'category'])->name('category.show');
Route::get('/agencies', [IndexController::class, 'dealer'])->name('agencies.index');
Route::get('/about-contact', function () {
    return view('aboutus'); // مسیر فایل resources/views/about-contact.blade.php
})->name('about.contact');

// ----------------------
// احراز هویت
// ----------------------
Route::get('/login', [AuthController::class, 'login'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'doLogin'])->name('doLogin')->middleware('guest');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

// ----------------------
// مدیریت (Admin)
// ----------------------
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    // صفحه اصلی ادمین
    Route::get('/', [IndexController::class, 'adminIndex'])->name('index');
    // ویو: admin_index.blade.php
    // مدیریت محصولات
    Route::get('/products', [ProductController::class, 'index'])->name('products.index');
    // ویو: admin_allproducts.blade.php
    Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
    // ویو: admin_addproduct.blade.php
    Route::post('/products', [ProductController::class, 'store'])->name('products.store');
    Route::get('/products/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');
    // ویو: admin_editproduct.blade.php
    Route::put('/products/{product}', [ProductController::class, 'update'])->name('products.update');
    Route::delete('/products/{product}', [ProductController::class, 'destroy'])->name('products.destroy');

    // مدیریت دسته‌بندی‌ها
    Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
    // ویو: admin_allcategories.blade.php
    Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');
    // ویو: admin_addcategory.blade.php
    Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');
    Route::get('/categories/{category}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
    // ویو: admin_editcategory.blade.php
    Route::put('/categories/{category}', [CategoryController::class, 'update'])->name('categories.update');
    //delete
   Route::delete('/categories/{category}', [CategoryController::class, 'destroy'])->name('categories.destroy');

    // مدیریت اسلایدر
    Route::get('/sliders', [SliderController::class, 'index'])->name('sliders.index');
    // ویو: admin_slider.blade.php
    Route::get('/sliders/create', [SliderController::class, 'create'])->name('sliders.create');
    // ویو: create_slider.blade.php
    Route::post('/sliders', [SliderController::class, 'store'])->name('sliders.store');
    Route::get('/sliders/{slider}/edit', [SliderController::class, 'edit'])->name('sliders.edit');
    // ویو: edit_slider.blade.php
    Route::put('/sliders/{slider}', [SliderController::class, 'update'])->name('sliders.update');
    Route::delete('/sliders/{slider}', [SliderController::class, 'destroy'])->name('sliders.destroy');

    // مدیریت نمایندگی‌ها
Route::get('/dealers', [DealerController::class, 'index'])->name('dealers.index');
// ویو: admin_alldealers.blade.php

Route::get('/dealers/create', [DealerController::class, 'create'])->name('dealers.create');
// ویو: admin_adddealer.blade.php

Route::post('/dealers', [DealerController::class, 'store'])->name('dealers.store');

Route::get('/dealers/{dealer}/edit', [DealerController::class, 'edit'])->name('dealers.edit');
// ویو: admin_editdealer.blade.php

Route::put('/dealers/{dealer}', [DealerController::class, 'update'])->name('dealers.update');
Route::delete('/dealers/{dealer}', [DealerController::class, 'destroy'])->name('dealers.destroy');

//lang

Route::get('/locale/{locale}', function ($locale) {
    // فقط زبان‌های مجاز
    $available = ['fa', 'en', 'ar'];

    if (in_array($locale, $available)) {
        Session::put('locale', $locale);
        App::setLocale($locale);
    }

    return redirect()->back(); // برگرد به همون صفحه قبلی
})->name('locale.switch');
});


// ----------------------
// صفحه ۴۰۴ (اختیاری)
// ----------------------
// Route::fallback(function () {
//     return redirect()->route('index');
// });

// صفحه اصلی فروشگاه → index.blade.php

// محصولات یک دسته → category.blade.php

// تمام محصولات (کاربر) → allproducts.blade.php

// تمام دسته‌ها (کاربر) → allcategories.blade.php

// لاگین → login.blade.php

// داشبورد ادمین → dashboard.blade.php

// محصولات (مدیریت)

// لیست → admin_allproducts.blade.php

// افزودن → admin_addproduct.blade.php

// ویرایش → admin_editproduct.blade.php

// دسته‌بندی‌ها (مدیریت)

// لیست → admin_allcategories.blade.php

// افزودن → admin_addcategory.blade.php

// ویرایش → admin_editcategory.blade.php

// اسلایدرها (مدیریت)

// لیست → admin_slider.blade.php

// افزودن → create_slider.blade.php

// ویرایش → edit_slider.blade.php
