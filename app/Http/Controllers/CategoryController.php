<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::paginate(10);
        return view('admin_allcategories', compact('categories'));
    }

    public function create()
    {
        return view('admin_addcategory');
    }

  public function store(Request $request)
{
    $data = $request->validate([
        'name.fa' => 'required|string|max:255',
        'name.en' => 'nullable|string|max:255',
        'name.ar' => 'nullable|string|max:255',
    ]);

    Category::create([
        'name' => $data['name'], // اینجا لاراول خودش JSON ذخیره می‌کنه
    ]);

    return redirect()->route('admin.categories.index')
                     ->with('success', 'دسته‌بندی ایجاد شد.');
}

    public function show(Category $category)
    {
        return view('admin_allcategories', compact('category'));
    }

    public function edit(Category $category)
    {
        return view('admin_editcategory', compact('category'));
    }

  public function update(Request $request, Category $category)
{
    // ولیدیشن
    $validated = $request->validate([
        'name.fa' => 'required|string|max:255',
        'name.en' => 'nullable|string|max:255',
        'name.ar' => 'nullable|string|max:255',
    ]);

    // بروزرسانی
    $category->update([
        'name' => $request->input('name'), // کل آرایه name
    ]);

    return redirect()->route('admin.categories.index')
                     ->with('success', 'دسته‌بندی با موفقیت بروزرسانی شد ✅');
}

    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->route('admin.categories.index')
                         ->with('success', 'دسته‌بندی با موفقیت حذف شد.');
    }
}
