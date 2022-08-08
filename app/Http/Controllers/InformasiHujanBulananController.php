<?php

namespace App\Http\Controllers;

use App\Models\InformasiHujanBulanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class InformasiHujanBulananController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $infohbs = DB::table('informasi_hujan_bulanans')->orderBy('id', 'desc')->get();
        return view('admin.info-hb.index', compact('infohbs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.info-hb.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required'],
            'first_img' => ['required', 'mimes:png,jpg,jpeg', 'max:2000'],
            'second_img' => ['required', 'mimes:png,jpg,jpeg', 'max:2000'],
        ],
        [
            'first_img.max' => 'Ukuran gambar lebih dari 2 MB.',
            'second_img.max' => 'Ukuran gambar lebih dari 2 MB.',
        ]);

        $first_img = $request->first_img;
        $second_img = $request->second_img;
        $new_first_img  = time().$first_img->getClientOriginalName();
        $new_second_img  = time().$second_img->getClientOriginalName();

        $infohb = InformasiHujanBulanan::create([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'desc' => $request->desc,
            'first_img' => 'uploads/infohb/'.$new_first_img,
            'second_img' => 'uploads/infohb/'.$new_second_img,
        ]);

        if ($infohb)
        {
            $first_img->move('uploads/infohb/', $new_first_img);
            $second_img->move('uploads/infohb/', $new_second_img);
            return redirect()->route('informasi-hujan-bulanan.index');
        }
        else
        {
            return redirect()->route('informasi-hujan-bulanan.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\InformasiHujanBulanan  $informasiHujanBulanan
     * @return \Illuminate\Http\Response
     */
    public function show(InformasiHujanBulanan $informasiHujanBulanan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\InformasiHujanBulanan  $informasiHujanBulanan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $infohb = InformasiHujanBulanan::findorfail($id);
        return view('admin.info-hb.edit', compact('infohb'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\InformasiHujanBulanan  $informasiHujanBulanan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => ['required'],
            'first_img' => ['mimes:png,jpg,jpeg', 'size:2000'],
            'second_img' => ['mimes:png,jpg,jpeg', 'size:2000'],
        ],
        [
            'first_img.max' => 'Ukuran gambar lebih dari 2 MB.',
            'second_img.max' => 'Ukuran gambar lebih dari 2 MB.',
        ]);

        $infohth = InformasiHujanBulanan::findorfail($id);

        if ($request->has('first_img') || $request->has('second_img')) {

            if ($request->has('first_img')) {
                $destination1 = $request->first_img_lama;
                if (File::exists($destination1)) {
                    File::delete($destination1);
                }
                $first_img = $request->first_img;
                $new_first_img = time().$first_img->getClientOriginalName();
                $first_img->move('uploads/infohb/', $new_first_img);
            }

            if ($request->has('second_img')) {
                $destination2 = $request->second_img_lama;
                if (File::exists($destination2)) {
                    File::delete($destination2);
                }
                $second_img = $request->second_img;
                $new_second_img = time().$second_img->getClientOriginalName();
                $second_img->move('uploads/infohb/', $new_second_img);
            }

            $infohth_data = [
                'title' => $request->title,
                'slug' => Str::slug($request->title),
                'desc' => $request->desc,
            ];

            if ($request->has('first_img') && $request->has('second_img')) {
                $infohth_data = [
                    'first_img' => 'uploads/infohb/'.$new_first_img,
                    'second_img' => 'uploads/infohb/'.$new_second_img,
                ];
            } else if ($request->has('first_img')) {
                $infohth_data = [
                    'first_img' => 'uploads/infohb/'.$new_first_img
                ];
            } else if ($request->has('second_img')) {
                $infohth_data = [
                    'second_img' => 'uploads/infohb/'.$new_second_img
                ];
            }
        } else {
            $infohth_data = [
                'title' => $request->title,
                'slug' => Str::slug($request->title),
                'desc' => $request->desc,
            ];
        }

        $infohth->update($infohth_data);

        return redirect()->route('informasi-hujan-bulanan.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\InformasiHujanBulanan  $informasiHujanBulanan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $infohb = InformasiHujanBulanan::findOrFail($id);
        $destination1 = $infohb->first_img;
        if (File::exists($destination1)) {
            File::delete($destination1);
        }

        $destination2 = $infohb->second_img;
        if (File::exists($destination2)) {
            File::delete($destination2);
        }

        $infohb = InformasiHujanBulanan::where('id', $id)->delete();

        return redirect()->route('informasi-hujan-bulanan.index');
    }
}
