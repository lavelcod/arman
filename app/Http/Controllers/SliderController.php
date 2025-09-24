<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    public function index()
    {
        $sliders = Slider::latest()->paginate(10);
        return view('admin_slider', compact('sliders'));
    }

    public function create()
    {
        return view('create_slider');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'nullable|string|max:255',
            'image' => 'required|image|mimes:jpg,jpeg,png,webp|max:10240',
        ]);

        $data = ['title' => $request->title];

        if ($request->hasFile('image')) {
            $file     = $request->file('image');
            $fileName = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $destination = public_path('storage/sliders');

            if (!file_exists($destination)) {
                mkdir($destination, 0775, true);
            }

            $file->move($destination, $fileName);
            $data['image'] = 'storage/sliders/' . $fileName;
        }

        Slider::create($data);

        return redirect()->route('admin.sliders.index')->with('success', 'اسلاید با موفقیت ایجاد شد.');
    }

    public function edit(Slider $slider)
    {
        return view('edit_slider', compact('slider'));
    }

    public function update(Request $request, Slider $slider)
    {
        $request->validate([
            'title' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:10240',
        ]);

        $data = ['title' => $request->title];

        if ($request->hasFile('image')) {
            if ($slider->image && file_exists(public_path($slider->image))) {
                unlink(public_path($slider->image));
            }

            $file     = $request->file('image');
            $fileName = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $destination = public_path('storage/sliders');

            if (!file_exists($destination)) {
                mkdir($destination, 0775, true);
            }

            $file->move($destination, $fileName);
            $data['image'] = 'storage/sliders/' . $fileName;
        }

        $slider->update($data);

        return redirect()->route('admin.sliders.index')->with('success', 'اسلاید ویرایش شد.');
    }

    public function destroy(Slider $slider)
    {
        if ($slider->image && file_exists(public_path($slider->image))) {
            unlink(public_path($slider->image));
        }

        $slider->delete();

        return redirect()->route('admin.sliders.index')->with('success', 'اسلاید حذف شد.');
    }
}
