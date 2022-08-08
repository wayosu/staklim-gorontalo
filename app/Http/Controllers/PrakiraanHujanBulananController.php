<?php

namespace App\Http\Controllers;

use App\Models\PrakiraanHujanBulanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class PrakiraanHujanBulananController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $phbs = DB::table('prakiraan_hujan_bulanans')->orderBy('id', 'desc')->get();
        return view('admin.prakiraan-hb.index', compact('phbs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.prakiraan-hb.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);

        $request->validate([
            'title' => ['required'],
            'kategori' => ['required'],
            'bulan_tahun' => ['required'],
            'img' => ['required', 'mimes:png,jpg,jpeg', 'max:2000'],
        ],
        [
            'img.max' => 'Ukuran gambar lebih dari 2 MB.'
        ]);

        $img = $request->img;
        $new_img  = time().$img->getClientOriginalName();

        $phb = PrakiraanHujanBulanan::create([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'desc' => $request->desc,
            'img' => 'uploads/phb/'.$new_img,
            'kategori' => $request->kategori,
            'bulan_tahun' => $request->bulan_tahun,
        ]);

        if ($phb)
        {
            $img->move('uploads/phb/', $new_img);
            return redirect()->route('prakiraan-hujan-bulanan.index');
        }
        else
        {
            return redirect()->route('prakiraan-hujan-bulanan.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PrakiraanHujanBulanan  $prakiraanHujanBulanan
     * @return \Illuminate\Http\Response
     */
    public function show(PrakiraanHujanBulanan $prakiraanHujanBulanan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PrakiraanHujanBulanan  $prakiraanHujanBulanan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $phb = PrakiraanHujanBulanan::findorfail($id);
        return view('admin.prakiraan-hb.edit', compact('phb'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PrakiraanHujanBulanan  $prakiraanHujanBulanan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => ['required'],
            'img' => ['mimes:png,jpg,jpeg', 'max:2000'],
            'kategori' => ['required'],
            'bulan_tahun' => ['required'],
        ],
        [
            'img.max' => 'Ukuran gambar lebih dari 2 MB.'
        ]);

        $phb = PrakiraanHujanBulanan::findorfail($id);

        if ($request->has('img')) {
            $destination = $request->img_lama;
            if (File::exists($destination)) {
                File::delete($destination);
            }

            $img = $request->img;
            $new_img = time().$img->getClientOriginalName();
            $img->move('uploads/phb/', $new_img);

            $phb_data = [
                'title' => $request->title,
                'slug' => Str::slug($request->title),
                'desc' => $request->desc,
                'img' => 'uploads/phb/'.$new_img,
                'kategori' => $request->kategori,
                'bulan_tahun' => $request->bulan_tahun,
            ];
        } else {
            $phb_data = [
                'title' => $request->title,
                'slug' => Str::slug($request->title),
                'desc' => $request->desc,
                'kategori' => $request->kategori,
                'bulan_tahun' => $request->bulan_tahun,
            ];
        }

        $phb->update($phb_data);

        return redirect()->route('prakiraan-hujan-bulanan.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PrakiraanHujanBulanan  $prakiraanHujanBulanan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $phb = PrakiraanHujanBulanan::findOrFail($id);
        $destination = $phb->img;
        if (File::exists($destination)) {
            File::delete($destination);
        }

        $phb = PrakiraanHujanBulanan::where('id', $id)->delete();

        return redirect()->route('prakiraan-hujan-bulanan.index');
    }
}
