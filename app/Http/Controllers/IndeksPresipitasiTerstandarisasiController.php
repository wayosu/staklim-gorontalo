<?php

namespace App\Http\Controllers;

use App\Models\IndeksPresipitasiTerstandarisasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class IndeksPresipitasiTerstandarisasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $indekspt = DB::table('indeks_presipitasi_terstandarisasis')->orderBy('id', 'desc')->get();
        return view('admin.indeks-pt.index', compact('indekspt'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.indeks-pt.create');
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
            'first_pdf' => ['required', 'mimes:pdf', 'max:2000'],
            'second_img' => ['required', 'mimes:png,jpg,jpeg', 'max:2000'],
            'second_pdf' => ['required', 'mimes:pdf', 'max:2000'],
        ],
        [
            'first_img.max' => 'Ukuran gambar lebih dari 2 MB.',
            'first_pdf.max' => 'Ukuran file lebih dari 2 MB.',
            'second_img.max' => 'Ukuran gambar lebih dari 2 MB.',
            'second_pdf.max' => 'Ukuran file lebih dari 2 MB.'
        ]);

        $first_img = $request->first_img;
        $first_pdf = $request->first_pdf;
        $second_img = $request->second_img;
        $second_pdf = $request->second_pdf;
        $new_first_img  = time().$first_img->getClientOriginalName();
        $new_first_pdf  = time().$first_pdf->getClientOriginalName();
        $new_second_img  = time().$second_img->getClientOriginalName();
        $new_second_pdf  = time().$second_pdf->getClientOriginalName();

        $indekspt = IndeksPresipitasiTerstandarisasi::create([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'desc' => $request->desc,
            'first_img' => 'uploads/indekspt/img/'.$new_first_img,
            'first_pdf' => 'uploads/indekspt/pdf/'.$new_first_pdf,
            'second_img' => 'uploads/indekspt/img/'.$new_second_img,
            'second_pdf' => 'uploads/indekspt/pdf/'.$new_second_pdf,
        ]);

        if ($indekspt)
        {
            $first_img->move('uploads/indekspt/img/', $new_first_img);
            $first_pdf->move('uploads/indekspt/pdf/', $new_first_pdf);
            $second_img->move('uploads/indekspt/img/', $new_second_img);
            $second_pdf->move('uploads/indekspt/pdf/', $new_second_pdf);
            return redirect()->route('indekspt.index');
        }
        else
        {
            return redirect()->route('indekspt.index');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\IndeksPresipitasiTerstandarisasi  $indeksPresipitasiTerstandarisasi
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $indekspt = IndeksPresipitasiTerstandarisasi::findorfail($id);
        return view('admin.indeks-pt.edit', compact('indekspt'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\IndeksPresipitasiTerstandarisasi  $indeksPresipitasiTerstandarisasi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => ['required'],
            'first_img' => ['mimes:png,jpg,jpeg', 'max:2000'],
            'first_pdf' => ['mimes:pdf', 'max:2000'],
            'second_img' => ['mimes:png,jpg,jpeg', 'max:2000'],
            'second_pdf' => ['mimes:pdf', 'max:2000'],
        ],
        [
            'first_img.max' => 'Ukuran gambar lebih dari 2 MB.',
            'first_pdf.max' => 'Ukuran file lebih dari 2 MB.',
            'second_img.max' => 'Ukuran gambar lebih dari 2 MB.',
            'second_pdf.max' => 'Ukuran file lebih dari 2 MB.'
        ]);

        $indekspt = IndeksPresipitasiTerstandarisasi::findorfail($id);

        if ($request->has('first_img')) {
            $destination1 = $request->first_img_lama;
            if (File::exists($destination1)) {
                File::delete($destination1);
            }
            $first_img = $request->first_img;
            $new_first_img = time().$first_img->getClientOriginalName();
            $first_img->move('uploads/indekspt/img/', $new_first_img);
        }

        if ($request->has('first_pdf')) {
            $destination2 = $request->first_pdf_lama;
            if (File::exists($destination2)) {
                File::delete($destination2);
            }
            $first_pdf = $request->first_pdf;
            $new_first_pdf = time().$first_pdf->getClientOriginalName();
            $first_pdf->move('uploads/indekspt/pdf/', $new_first_pdf);
        }

        if ($request->has('second_img')) {
            $destination3 = $request->second_img_lama;
            if (File::exists($destination3)) {
                File::delete($destination3);
            }
            $second_img = $request->second_img;
            $new_second_img = time().$second_img->getClientOriginalName();
            $second_img->move('uploads/indekspt/img/', $new_second_img);
        }

        if ($request->has('second_pdf')) {
            $destination4 = $request->second_pdf_lama;
            if (File::exists($destination4)) {
                File::delete($destination4);
            }
            $second_pdf = $request->second_pdf;
            $new_second_pdf = time().$second_pdf->getClientOriginalName();
            $second_pdf->move('uploads/indekspt/pdf/', $new_second_pdf);
        }

        $indekspt_data = [
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'desc' => $request->desc,
        ];

        if ($request->has('first_img')) {
            $req_first_img = ['first_img' => 'uploads/indekspt/img/'.$new_first_img];
            $indekspt_data = array_merge($indekspt_data, $req_first_img);
        }

        if ($request->has('first_pdf')) {
            $req_first_pdf = ['first_pdf' => 'uploads/indekspt/pdf/'.$new_first_pdf];
            $indekspt_data = array_merge($indekspt_data, $req_first_pdf);
        }
        
        if ($request->has('second_img')) {
            $req_second_img = ['second_img' => 'uploads/indekspt/img/'.$new_second_img];
            $indekspt_data = array_merge($indekspt_data, $req_second_img);
        }

        if ($request->has('second_pdf')) {
            $req_second_pdf = ['second_pdf' => 'uploads/indekspt/pdf/'.$new_second_pdf];
            $indekspt_data = array_merge($indekspt_data, $req_second_pdf);
        }
        
        // dd($indekspt_data);

        $indekspt->update($indekspt_data);

        return redirect()->route('indekspt.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\IndeksPresipitasiTerstandarisasi  $indeksPresipitasiTerstandarisasi
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $indekspt = IndeksPresipitasiTerstandarisasi::findOrFail($id);
        $destination1 = $indekspt->first_img;
        if (File::exists($destination1)) {
            File::delete($destination1);
        }

        $destination2 = $indekspt->second_img;
        if (File::exists($destination2)) {
            File::delete($destination2);
        }

        $destination3 = $indekspt->first_pdf;
        if (File::exists($destination3)) {
            File::delete($destination3);
        }

        $destination4 = $indekspt->second_pdf;
        if (File::exists($destination4)) {
            File::delete($destination4);
        }

        $indekspt = IndeksPresipitasiTerstandarisasi::where('id', $id)->delete();

        return redirect()->route('indekspt.index');
    }
}
