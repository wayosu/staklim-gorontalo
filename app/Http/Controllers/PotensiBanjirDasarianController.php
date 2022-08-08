<?php

namespace App\Http\Controllers;

use App\Models\PotensiBanjirDasarian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class PotensiBanjirDasarianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ptnbd = DB::table('potensi_banjir_dasarians')->orderBy('id', 'desc')->get();
        return view('admin.potensi-bd.index', compact('ptnbd'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.potensi-bd.create');
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
            'three_img' => ['required', 'mimes:png,jpg,jpeg', 'max:2000'],
            'three_pdf' => ['required', 'mimes:pdf', 'max:2000'],
        ],
        [
            'first_img.max' => 'Ukuran gambar lebih dari 2 MB.',
            'first_pdf.max' => 'Ukuran file lebih dari 2 MB.',
            'second_img.max' => 'Ukuran gambar lebih dari 2 MB.',
            'second_pdf.max' => 'Ukuran file lebih dari 2 MB.',
            'three_img.max' => 'Ukuran gambar lebih dari 2 MB.',
            'three_pdf.max' => 'Ukuran file lebih dari 2 MB.',
        ]);

        $first_img = $request->first_img;
        $first_pdf = $request->first_pdf;
        $second_img = $request->second_img;
        $second_pdf = $request->second_pdf;
        $three_img = $request->three_img;
        $three_pdf = $request->three_pdf;
        $new_first_img  = time().$first_img->getClientOriginalName();
        $new_first_pdf  = time().$first_pdf->getClientOriginalName();
        $new_second_img  = time().$second_img->getClientOriginalName();
        $new_second_pdf  = time().$second_pdf->getClientOriginalName();
        $new_three_img  = time().$three_img->getClientOriginalName();
        $new_three_pdf  = time().$three_pdf->getClientOriginalName();

        $ptnbd = PotensiBanjirDasarian::create([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'desc' => $request->desc,
            'first_img' => 'uploads/ptnbd/img/'.$new_first_img,
            'first_pdf' => 'uploads/ptnbd/pdf/'.$new_first_pdf,
            'second_img' => 'uploads/ptnbd/img/'.$new_second_img,
            'second_pdf' => 'uploads/ptnbd/pdf/'.$new_second_pdf,
            'three_img' => 'uploads/ptnbd/img/'.$new_three_img,
            'three_pdf' => 'uploads/ptnbd/pdf/'.$new_three_pdf,
        ]);

        if ($ptnbd)
        {
            $first_img->move('uploads/ptnbd/img/', $new_first_img);
            $first_pdf->move('uploads/ptnbd/pdf/', $new_first_pdf);
            $second_img->move('uploads/ptnbd/img/', $new_second_img);
            $second_pdf->move('uploads/ptnbd/pdf/', $new_second_pdf);
            $three_img->move('uploads/ptnbd/img/', $new_three_img);
            $three_pdf->move('uploads/ptnbd/pdf/', $new_three_pdf);
            return redirect()->route('potensi-banjir-dasarian.index');
        }
        else
        {
            return redirect()->route('potensi-banjir-dasarian.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PotensiBanjirDasarian  $potensiBanjirDasarian
     * @return \Illuminate\Http\Response
     */
    public function show(PotensiBanjirDasarian $potensiBanjirDasarian)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PotensiBanjirDasarian  $potensiBanjirDasarian
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ptnbd = PotensiBanjirDasarian::findorfail($id);
        return view('admin.potensi-bd.edit', compact('ptnbd'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PotensiBanjirDasarian  $potensiBanjirDasarian
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
            'three_img' => ['mimes:png,jpg,jpeg', 'max:2000'],
            'three_pdf' => ['mimes:pdf', 'max:2000'],
        ],
        [
            'first_img.max' => 'Ukuran gambar lebih dari 2 MB.',
            'first_pdf.max' => 'Ukuran file lebih dari 2 MB.',
            'second_img.max' => 'Ukuran gambar lebih dari 2 MB.',
            'second_pdf.max' => 'Ukuran file lebih dari 2 MB.',
            'three_img.max' => 'Ukuran gambar lebih dari 2 MB.',
            'three_pdf.max' => 'Ukuran file lebih dari 2 MB.',
        ]);

        $ptnbd = PotensiBanjirDasarian::findorfail($id);

        if ($request->has('first_img')) {
            $destination1 = $request->first_img_lama;
            if (File::exists($destination1)) {
                File::delete($destination1);
            }
            $first_img = $request->first_img;
            $new_first_img = time().$first_img->getClientOriginalName();
            $first_img->move('uploads/ptnbd/img/', $new_first_img);
        }

        if ($request->has('first_pdf')) {
            $destination2 = $request->first_pdf_lama;
            if (File::exists($destination2)) {
                File::delete($destination2);
            }
            $first_pdf = $request->first_pdf;
            $new_first_pdf = time().$first_pdf->getClientOriginalName();
            $first_pdf->move('uploads/ptnbd/pdf/', $new_first_pdf);
        }

        if ($request->has('second_img')) {
            $destination3 = $request->second_img_lama;
            if (File::exists($destination3)) {
                File::delete($destination3);
            }
            $second_img = $request->second_img;
            $new_second_img = time().$second_img->getClientOriginalName();
            $second_img->move('uploads/ptnbd/img/', $new_second_img);
        }

        if ($request->has('second_pdf')) {
            $destination4 = $request->second_pdf_lama;
            if (File::exists($destination4)) {
                File::delete($destination4);
            }
            $second_pdf = $request->second_pdf;
            $new_second_pdf = time().$second_pdf->getClientOriginalName();
            $second_pdf->move('uploads/ptnbd/pdf/', $new_second_pdf);
        }

        if ($request->has('three_img')) {
            $destination3 = $request->three_img_lama;
            if (File::exists($destination3)) {
                File::delete($destination3);
            }
            $three_img = $request->three_img;
            $new_three_img = time().$three_img->getClientOriginalName();
            $three_img->move('uploads/ptnbd/img/', $new_three_img);
        }

        if ($request->has('three_pdf')) {
            $destination4 = $request->three_pdf_lama;
            if (File::exists($destination4)) {
                File::delete($destination4);
            }
            $three_pdf = $request->three_pdf;
            $new_three_pdf = time().$three_pdf->getClientOriginalName();
            $three_pdf->move('uploads/ptnbd/pdf/', $new_three_pdf);
        }

        $ptnbd_data = [
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'desc' => $request->desc,
        ];

        if ($request->has('first_img')) {
            $req_first_img = ['first_img' => 'uploads/ptnbd/img/'.$new_first_img];
            $ptnbd_data = array_merge($ptnbd_data, $req_first_img);
        }

        if ($request->has('first_pdf')) {
            $req_first_pdf = ['first_pdf' => 'uploads/ptnbd/pdf/'.$new_first_pdf];
            $ptnbd_data = array_merge($ptnbd_data, $req_first_pdf);
        }
        
        if ($request->has('second_img')) {
            $req_second_img = ['second_img' => 'uploads/ptnbd/img/'.$new_second_img];
            $ptnbd_data = array_merge($ptnbd_data, $req_second_img);
        }

        if ($request->has('second_pdf')) {
            $req_second_pdf = ['second_pdf' => 'uploads/ptnbd/pdf/'.$new_second_pdf];
            $ptnbd_data = array_merge($ptnbd_data, $req_second_pdf);
        }

        if ($request->has('three_img')) {
            $req_three_img = ['three_img' => 'uploads/ptnbd/img/'.$new_three_img];
            $ptnbd_data = array_merge($ptnbd_data, $req_three_img);
        }

        if ($request->has('three_pdf')) {
            $req_three_pdf = ['three_pdf' => 'uploads/ptnbd/pdf/'.$new_three_pdf];
            $ptnbd_data = array_merge($ptnbd_data, $req_three_pdf);
        }
        
        // dd($ptnbd_data);

        $ptnbd->update($ptnbd_data);

        return redirect()->route('potensi-banjir-dasarian.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PotensiBanjirDasarian  $potensiBanjirDasarian
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ptnbd = PotensiBanjirDasarian::findOrFail($id);

        $destination1 = $ptnbd->first_img;
        if (File::exists($destination1)) {
            File::delete($destination1);
        }

        $destination2 = $ptnbd->second_img;
        if (File::exists($destination2)) {
            File::delete($destination2);
        }

        $destination3 = $ptnbd->three_img;
        if (File::exists($destination3)) {
            File::delete($destination3);
        }

        $destination4 = $ptnbd->first_pdf;
        if (File::exists($destination4)) {
            File::delete($destination4);
        }

        $destination5 = $ptnbd->second_pdf;
        if (File::exists($destination5)) {
            File::delete($destination5);
        }

        $destination6 = $ptnbd->three_pdf;
        if (File::exists($destination6)) {
            File::delete($destination6);
        }

        $ptnbd = PotensiBanjirDasarian::where('id', $id)->delete();

        return redirect()->route('potensi-banjir-dasarian.index');
    }
}
