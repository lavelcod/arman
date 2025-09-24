<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\Dealer;
use App\Models\Slider;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    // صفحه اصلی: لیست محصولات + دسته‌بندی‌ها
    public function index(Request $request)
    {
        // گرفتن دسته‌بندی‌ها برای منو
        $categories = Category::all();
        $products = Product::paginate(8);
        $sliders = Slider::all(); // اسلایدرها
        // جستجو و فیلتر
        $query = Product::with('category');

        if ($request->filled('search')) {
            $query->where(function($q) use ($request) {
                $q->where('name', 'like', '%' . $request->search . '%')
                  ->orWhere('description', 'like', '%' . $request->search . '%');
            });
        }

        if ($request->filled('category')) {
            $query->where('category_id', $request->category);
        }

        // صفحه‌بندی + نگه داشتن پارامترها در لینک‌های paginate
        $products = $query->paginate(9)->appends($request->query());

        return view('index', compact('products', 'categories','sliders'));
    }

    // نمایش جزئیات یک محصول
    public function show($id)
    {
        $product = Product::with('category')->findOrFail($id);
        return view('products_info', compact('product'));
    }

    // داشبورد ادمین
    public function adminIndex(Request $request)
    {
         // گرفتن دسته‌بندی‌ها برای منو
        $categories = Category::all();
        $products = Product::paginate(12);
        $sliders = Slider::all(); // اسلایدرها
        // جستجو و فیلتر
        $query = Product::with('category');

        if ($request->filled('search')) {
            $query->where(function($q) use ($request) {
                $q->where('name', 'like', '%' . $request->search . '%')
                  ->orWhere('description', 'like', '%' . $request->search . '%');
            });
        }

        if ($request->filled('category')) {
            $query->where('category_id', $request->category);
        }

        // صفحه‌بندی + نگه داشتن پارامترها در لینک‌های paginate
        $products = $query->paginate(9)->appends($request->query());

        return view('dashboard', compact('products', 'categories','sliders'));
    }

public function dealer(Request $request)
{
    $query = Dealer::query();

    // جستجو
    if ($request->has('search') && $request->search != '') {
        $search = $request->search;
        $query->where(function($q) use ($search) {
            $q->where('name', 'like', "%{$search}%")
              ->orWhere('address', 'like', "%{$search}%")
              ->orWhere('city', 'like', "%{$search}%");
        });
    }

    // فیلتر شهر
    if ($request->has('city') && $request->city != '') {
        $query->where('city', $request->city);
    }

    // گرفتن لیست یکتا از شهرها
    $cities = Dealer::select('city')->distinct()->pluck('city');

    // صفحه‌بندی نمایندگی‌ها (۱۲ تا در هر صفحه)
    $agencies = $query->orderBy('name')->paginate(12);

    return view('dealers_info', compact('agencies', 'cities'));
}


}
