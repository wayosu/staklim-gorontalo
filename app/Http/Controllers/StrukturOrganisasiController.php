<?php

namespace App\Http\Controllers;

use App\Models\StrukturOrganisasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class StrukturOrganisasiController extends Controller
{
    public function index()
    {
        $strukturorganisasi = StrukturOrganisasi::first();

        return view('admin.profil.strukturorganisasi', compact('strukturorganisasi'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'img' => ['mimes:png,jpg,jpeg', 'max:2000'],
        ],
        [
            'img.max' => 'Ukuran gambar lebih dari 2 MB.'
        ]);

        $strukturorganisasi = StrukturOrganisasi::findorfail($id);

        if ($request->has('img')) {
            $destination = $request->img_lama;
            if (File::exists($destination)) {
                File::delete($destination);
            }

            $img = $request->img;
            $new_img = time().$img->getClientOriginalName();
            $img->move('uploads/strukturorganisasi/', $new_img);

            $strukturorganisasi_data = [
                'desc' => $request->desc,
                'img' => 'uploads/strukturorganisasi/'.$new_img,
            ];
        } else {
            $strukturorganisasi_data = [
                'desc' => $request->desc,
            ];
        }

        $strukturorganisasi->update($strukturorganisasi_data);

        return redirect()->route('strukturorganisasi');
    }
}
