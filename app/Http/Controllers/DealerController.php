<?php

namespace App\Http\Controllers;

use App\Models\Dealer;
use Illuminate\Http\Request;

class DealerController extends Controller
{
    public function index()
    {
        $dealers = Dealer::latest()->paginate(12);
        return view('admin_alldealers', compact('dealers'));
    }

    public function create()
    {
        return view('admin_adddealer');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name.fa'     => 'required|string|max:255',
            'name.en'     => 'nullable|string|max:255',
            'name.ar'     => 'nullable|string|max:255',
            'city.fa'     => 'required|string|max:255',
            'city.en'     => 'nullable|string|max:255',
            'city.ar'     => 'nullable|string|max:255',
            'address.fa'  => 'required|string|max:500',
            'address.en'  => 'nullable|string|max:500',
            'address.ar'  => 'nullable|string|max:500',
            'seller_name' => 'required|string|max:255',
            'mobile'      => 'required|string|max:20',
            'image'       => 'nullable|image|max:10240',
        ]);

        $data = [
            'name'        => $request->input('name'),
            'city'        => $request->input('city'),
            'address'     => $request->input('address'),
            'seller_name' => $request->input('seller_name'),
            'mobile'      => $request->input('mobile'),
        ];

        if ($request->hasFile('image')) {
            $file     = $request->file('image');
            $fileName = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $destination = public_path('storage/dealers');
            if (!file_exists($destination)) mkdir($destination, 0775, true);

            $file->move($destination, $fileName);
            $data['image'] = 'storage/dealers/' . $fileName;
        }

        Dealer::create($data);

        return redirect()->route('admin.dealers.index')
                         ->with('success', 'نمایندگی با موفقیت ایجاد شد ✅');
    }

    public function edit(Dealer $dealer)
    {
        return view('admin_editdealer', compact('dealer'));
    }

    public function update(Request $request, Dealer $dealer)
    {
        $validated = $request->validate([
            'name'        => 'required|array',
            'name.fa'     => 'required|string|max:255',
            'name.en'     => 'nullable|string|max:255',
            'name.ar'     => 'nullable|string|max:255',
            'city'        => 'required|array',
            'city.fa'     => 'required|string|max:255',
            'city.en'     => 'nullable|string|max:255',
            'city.ar'     => 'nullable|string|max:255',
            'address'     => 'required|array',
            'address.fa'  => 'required|string|max:500',
            'address.en'  => 'nullable|string|max:500',
            'address.ar'  => 'nullable|string|max:500',
            'seller_name' => 'required|string|max:255',
            'mobile'      => 'required|string|max:20',
            'image'       => 'nullable|image|max:10240',
        ]);

        $data = [
            'name'        => $request->input('name'),
            'city'        => $request->input('city'),
            'address'     => $request->input('address'),
            'seller_name' => $request->input('seller_name'),
            'mobile'      => $request->input('mobile'),
        ];

        if ($request->hasFile('image')) {
            if ($dealer->image && file_exists(public_path($dealer->image))) unlink(public_path($dealer->image));

            $file     = $request->file('image');
            $fileName = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $destination = public_path('storage/dealers');
            if (!file_exists($destination)) mkdir($destination, 0775, true);

            $file->move($destination, $fileName);
            $data['image'] = 'storage/dealers/' . $fileName;
        }

        $dealer->update($data);

        return redirect()->route('admin.dealers.index')
                         ->with('success', 'نمایندگی با موفقیت ویرایش شد ✏️');
    }

    public function destroy(Dealer $dealer)
    {
        if ($dealer->image && file_exists(public_path($dealer->image))) unlink(public_path($dealer->image));

        $dealer->delete();

        return redirect()->route('admin.dealers.index')
                         ->with('success', 'نمایندگی حذف شد ❌');
    }
}
