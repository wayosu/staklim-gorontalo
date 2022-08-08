<?php

namespace App\Http\Controllers;

use App\Models\LogoBmkg;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class LogoBmkgController extends Controller
{
    public function index()
    {
        $logobmkg = LogoBmkg::first();

        return view('admin.profil.logobmkg', compact('logobmkg'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'img' => ['mimes:png,jpg,jpeg', 'max:2000'],
        ],
        [
            'img.max' => 'Ukuran gambar lebih dari 2 MB.',
        ]);

        $logobmkg = LogoBmkg::findorfail($id);

        if ($request->has('img')) {
            $destination = $request->img_lama;
            if (File::exists($destination)) {
                File::delete($destination);
            }

            $img = $request->img;
            $new_img = time().$img->getClientOriginalName();
            $img->move('uploads/logobmkg/', $new_img);

            $logobmkg_data = [
                'desc' => $request->desc,
                'img' => 'uploads/logobmkg/'.$new_img,
            ];
        } else {
            $logobmkg_data = [
                'desc' => $request->desc,
            ];
        }

        $logobmkg->update($logobmkg_data);

        return redirect()->route('logobmkg');
    }
}
