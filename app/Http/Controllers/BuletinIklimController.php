<?php

namespace App\Http\Controllers;

use App\Models\BuletinIklim;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class BuletinIklimController extends Controller
{
    public function index()
    {
        $buletiniklims = DB::table('buletin_iklims')->orderBy('id', 'desc')->get();
        return view('admin.buletin-iklim.index', compact('buletiniklims'));
    }

    public function create()
    {
        return view('admin.buletin-iklim.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required'],
            'desc' => ['required'],
            'pdf' => ['required', 'mimes:pdf', 'max:2000'],
        ],
        [
            'pdf.max' => 'Ukuran file lebih dari 2 MB.'
        ]);

        $pdf = $request->pdf;
        $new_pdf = time().$pdf->getClientOriginalName();

        $buletiniklim = BuletinIklim::create([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'desc' => $request->desc,
            'pdf_path' => 'uploads/buletiniklim/'.$new_pdf,
        ]);

        if ($buletiniklim)
        {
            $pdf->move('uploads/buletiniklim/', $new_pdf);
            return redirect()->route('buletin-iklim.index');
        }
        else
        {
            return redirect()->route('buletin-iklim.index');
        }
    }

    public function edit($id)
    {
        $buletiniklim = BuletinIklim::findorfail($id);
        return view('admin.buletin-iklim.edit', compact('buletiniklim'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => ['required'],
            'desc' => ['required'],
            'pdf' => ['mimes:pdf', 'max:2000'],
        ],
        [
            'pdf.max' => 'Ukuran file lebih dari 2 MB.'
        ]);

        $buletiniklim = BuletinIklim::findorfail($id);

        if ($request->has('pdf')) {
            $destination = $request->pdf_lama;
            if (File::exists($destination)) {
                File::delete($destination);
            }

            $pdf = $request->pdf;
            $new_pdf = time().$pdf->getClientOriginalName();
            $pdf->move('uploads/buletiniklim/', $new_pdf);

            $buletiniklim_data = [
                'title' => $request->title,
                'slug' => Str::slug($request->title),
                'desc' => $request->desc,
                'pdf_path' => 'uploads/buletiniklim/'.$new_pdf,
            ];
        } else {
            $buletiniklim_data = [
                'title' => $request->title,
                'slug' => Str::slug($request->title),
                'desc' => $request->desc,
            ];
        }

        $buletiniklim->update($buletiniklim_data);

        return redirect()->route('buletin-iklim.index');
    }

    public function destroy($id)
    {
        $buletiniklim = BuletinIklim::findOrFail($id);
        $destination = $buletiniklim->pdf_path;
        if (File::exists($destination)) {
            File::delete($destination);
        }

        $buletiniklim = BuletinIklim::where('id', $id)->delete();

        return redirect()->route('buletin-iklim.index');
    }
}
