<?php

namespace App\Http\Controllers;

use App\Models\PrakiraanMusim;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class PrakiraanMusimController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $prams = DB::table('prakiraan_musims')->orderBy('id', 'desc')->get();
        return view('admin.prakiraan-m.index', compact('prams'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.prakiraan-m.create');
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
            'desc' => ['required'],
            'img' => ['required', 'mimes:png,jpg,jpeg', 'max:2000'],
            'pdf' => ['required', 'mimes:pdf', 'max:2000'],
        ],
        [
            'img.max' => 'Ukuran gambar lebih dari 2 MB.',
            'pdf.max' => 'Ukuran file lebih dari 2 MB.',
        ]);

        $img = $request->img;
        $pdf = $request->pdf;
        $new_img  = time().$img->getClientOriginalName();
        $new_pdf  = time().$pdf->getClientOriginalName();

        $pram = PrakiraanMusim::create([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'desc' => $request->desc,
            'img_path' => 'uploads/pram/img/'.$new_img,
            'pdf_path' => 'uploads/pram/pdf/'.$new_pdf,
        ]);

        if ($pram)
        {
            $img->move('uploads/pram/img/', $new_img);
            $pdf->move('uploads/pram/pdf/', $new_pdf);
            return redirect()->route('prakiraan-musim.index');
        }
        else
        {
            return redirect()->route('prakiraan-musim.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PrakiraanMusim  $prakiraanMusim
     * @return \Illuminate\Http\Response
     */
    public function show(PrakiraanMusim $prakiraanMusim)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PrakiraanMusim  $prakiraanMusim
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pram = PrakiraanMusim::findorfail($id);
        return view('admin.prakiraan-m.edit', compact('pram'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PrakiraanMusim  $prakiraanMusim
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => ['required'],
            'desc' => ['required'],
            'img' => ['mimes:png,jpg,jpeg', 'max:2000'],
            'pdf' => ['mimes:pdf', 'max:2000'],
        ],
        [
            'img.max' => 'Ukuran gambar lebih dari 2 MB.',
            'pdf.max' => 'Ukuran file lebih dari 2 MB.',
        ]);

        $pram = PrakiraanMusim::findorfail($id);

        if ($request->has('img') || $request->has('pdf')) {

            if ($request->has('img')) {
                $destination1 = $request->img_lama;
                if (File::exists($destination1)) {
                    File::delete($destination1);
                }
                $img = $request->img;
                $new_img = time().$img->getClientOriginalName();
                $img->move('uploads/pram/img/', $new_img);
            }

            if ($request->has('pdf')) {
                $destination2 = $request->pdf_lama;
                if (File::exists($destination2)) {
                    File::delete($destination2);
                }
                $pdf = $request->pdf;
                $new_pdf = time().$pdf->getClientOriginalName();
                $pdf->move('uploads/pram/pdf/', $new_pdf);
            }

            $pram_data = [
                'title' => $request->title,
                'slug' => Str::slug($request->title),
                'desc' => $request->desc,
            ];

            if ($request->has('img') && $request->has('pdf')) {
                $pram_data = [
                    'img_path' => 'uploads/pram/img/'.$new_img,
                    'pdf_path' => 'uploads/pram/pdf/'.$new_pdf,
                ];
            } else if ($request->has('img')) {
                $pram_data = [
                    'img_path' => 'uploads/pram/img/'.$new_img,
                ];
            } else if ($request->has('pdf')) {
                $pram_data = [
                    'pdf_path' => 'uploads/pram/pdf/'.$new_pdf,
                ];
            }
        } else {
            $pram_data = [
                'title' => $request->title,
                'slug' => Str::slug($request->title),
                'desc' => $request->desc,
            ];
        }

        $pram->update($pram_data);

        return redirect()->route('prakiraan-musim.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PrakiraanMusim  $prakiraanMusim
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pram = PrakiraanMusim::findOrFail($id);
        $destination1 = $pram->img_path;
        if (File::exists($destination1)) {
            File::delete($destination1);
        }

        $destination2 = $pram->pdf_path;
        if (File::exists($destination2)) {
            File::delete($destination2);
        }

        $pram = PrakiraanMusim::where('id', $id)->delete();

        return redirect()->route('prakiraan-musim.index');
    }
}
