<?php

namespace App\Http\Controllers;

use App\Models\InformasiHujanDasarian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class InformasiHujanDasarianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $infohds = DB::table('informasi_hujan_dasarians')->orderBy('id', 'desc')->get();
        return view('admin.info-hd.index', compact('infohds'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.info-hd.create');
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

        $infohd = InformasiHujanDasarian::create([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'desc' => $request->desc,
            'first_img' => 'uploads/infohd/'.$new_first_img,
            'second_img' => 'uploads/infohd/'.$new_second_img,
        ]);

        if ($infohd)
        {
            $first_img->move('uploads/infohd/', $new_first_img);
            $second_img->move('uploads/infohd/', $new_second_img);
            return redirect()->route('informasi-hujan-dasarian.index');
        }
        else
        {
            return redirect()->route('informasi-hujan-dasarian.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\InformasiHujanDasarian  $informasiHujanDasarian
     * @return \Illuminate\Http\Response
     */
    public function show(InformasiHujanDasarian $informasiHujanDasarian)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\InformasiHujanDasarian  $informasiHujanDasarian
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $infohd = InformasiHujanDasarian::findorfail($id);
        return view('admin.info-hd.edit', compact('infohd'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\InformasiHujanDasarian  $informasiHujanDasarian
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => ['required'],
            'first_img' => ['mimes:png,jpg,jpeg', 'max:2000'],
            'second_img' => ['mimes:png,jpg,jpeg', 'max:2000'],
        ],
        [
            'first_img.max' => 'Ukuran gambar lebih dari 2 MB.',
            'second_img.max' => 'Ukuran gambar lebih dari 2 MB.',
        ]);

        $infohd = InformasiHujanDasarian::findorfail($id);

        if ($request->has('first_img') || $request->has('second_img')) {

            if ($request->has('first_img')) {
                $destination1 = $request->first_img_lama;
                if (File::exists($destination1)) {
                    File::delete($destination1);
                }
                $first_img = $request->first_img;
                $new_first_img = time().$first_img->getClientOriginalName();
                $first_img->move('uploads/infohd/', $new_first_img);
            }

            if ($request->has('second_img')) {
                $destination2 = $request->second_img_lama;
                if (File::exists($destination2)) {
                    File::delete($destination2);
                }
                $second_img = $request->second_img;
                $new_second_img = time().$second_img->getClientOriginalName();
                $second_img->move('uploads/infohd/', $new_second_img);
            }

            $infohd_data = [
                'title' => $request->title,
                'slug' => Str::slug($request->title),
                'desc' => $request->desc,
            ];

            if ($request->has('first_img') && $request->has('second_img')) {
                $infohd_data = [
                    'first_img' => 'uploads/infohd/'.$new_first_img,
                    'second_img' => 'uploads/infohd/'.$new_second_img,
                ];
            } else if ($request->has('first_img')) {
                $infohd_data = [
                    'first_img' => 'uploads/infohd/'.$new_first_img
                ];
            } else if ($request->has('second_img')) {
                $infohd_data = [
                    'second_img' => 'uploads/infohd/'.$new_second_img
                ];
            }
        } else {
            $infohd_data = [
                'title' => $request->title,
                'slug' => Str::slug($request->title),
                'desc' => $request->desc,
            ];
        }

        $infohd->update($infohd_data);

        return redirect()->route('informasi-hujan-dasarian.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\InformasiHujanDasarian  $informasiHujanDasarian
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $infohb = InformasiHujanDasarian::findOrFail($id);
        $destination1 = $infohb->first_img;
        if (File::exists($destination1)) {
            File::delete($destination1);
        }

        $destination2 = $infohb->second_img;
        if (File::exists($destination2)) {
            File::delete($destination2);
        }

        $infohb = InformasiHujanDasarian::where('id', $id)->delete();

        return redirect()->route('informasi-hujan-dasarian.index');
    }
}
