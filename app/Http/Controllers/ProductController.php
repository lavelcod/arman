<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\ProductImage;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('category', 'images')->paginate(10);
        return view('admin_allproducts', compact('products'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin_addproduct', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name.fa'        => 'required|string|max:255',
            'name.en'        => 'required|string|max:255',
            'name.ar'        => 'required|string|max:255',
            'description.fa' => 'nullable|string',
            'description.en' => 'nullable|string',
            'description.ar' => 'nullable|string',
            'price.toman'    => 'required|numeric',
            'price.dollar'   => 'required|numeric',
            'images.*'       => 'nullable|image|mimes:jpg,jpeg,png|max:10240',
            'category_id'    => 'required|exists:categories,id',
        ]);

        $product = Product::create([
            'name'        => $request->input('name'),
            'description' => $request->input('description'),
            'price'       => $request->input('price'),
            'category_id' => $request->category_id,
        ]);

        if ($request->hasFile('images')) {
            $destination = public_path('storage/products');
            if (!file_exists($destination)) mkdir($destination, 0775, true);

            foreach ($request->file('images') as $file) {
                $fileName = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
                $file->move($destination, $fileName);

                $product->images()->create([
                    'image' => 'storage/products/' . $fileName,
                ]);
            }
        }

        return redirect()->route('admin.products.index')
                         ->with('success', 'محصول با موفقیت اضافه شد.');
    }

    public function edit(Product $product)
    {
        $categories = Category::all();
        $product->load('images');
        return view('admin_editproduct', compact('product', 'categories'));
    }

    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            'name.fa'        => 'required|string|max:255',
            'name.en'        => 'nullable|string|max:255',
            'name.ar'        => 'nullable|string|max:255',
            'description.fa' => 'nullable|string',
            'description.en' => 'nullable|string',
            'description.ar' => 'nullable|string',
            'price.toman'    => 'required|numeric',
            'price.dollar'   => 'nullable|numeric',
            'image'          => 'nullable|image|mimes:jpg,jpeg,png|max:10240',
            'category_id'    => 'required|exists:categories,id',
        ]);

        $product->update([
            'name'        => $request->input('name'),
            'description' => $request->input('description'),
            'price'       => $request->input('price'),
            'category_id' => $request->category_id,
        ]);

        if ($request->hasFile('image')) {
            $oldImage = $product->images()->first();
            if ($oldImage) {
                if ($oldImage->image && file_exists(public_path($oldImage->image))) unlink(public_path($oldImage->image));
                $oldImage->delete();
            }

            $destination = public_path('storage/products');
            if (!file_exists($destination)) mkdir($destination, 0775, true);

            $file = $request->file('image');
            $fileName = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move($destination, $fileName);

            $product->images()->create([
                'image' => 'storage/products/' . $fileName,
            ]);
        }

        return redirect()->route('admin.products.index')
                         ->with('success', 'محصول با موفقیت بروزرسانی شد.');
    }

    public function destroy(Product $product)
    {
        foreach ($product->images as $img) {
            if ($img->image && file_exists(public_path($img->image))) {
                unlink(public_path($img->image));
            }
            $img->delete();
        }

        $product->delete();
        return redirect()->route('admin.products.index')
                         ->with('success', 'محصول با موفقیت حذف شد.');
    }
}
