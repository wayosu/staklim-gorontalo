<?php

namespace App\Http\Controllers;

use App\Models\TugasFungsi;
use Illuminate\Http\Request;

class TugasFungsiController extends Controller
{

    public function index()
    {
        $tugasfungsi = TugasFungsi::first();

        return view('admin.profil.tugasfungsi', compact('tugasfungsi'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'desc' => ['required']
        ]);

        $tugasfungsi = TugasFungsi::findorfail($id);

        $tugasfungsi->update([
            'desc' => $request->desc
        ]);

        return redirect()->route('tugasfungsi');
    }

}
