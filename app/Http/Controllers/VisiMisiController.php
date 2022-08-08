<?php

namespace App\Http\Controllers;

use App\Models\VisiMisi;
use Illuminate\Http\Request;

class VisiMisiController extends Controller
{

    public function index()
    {
        $visimisi = VisiMisi::first();

        return view('admin.profil.visimisi', compact('visimisi'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'desc' => ['required']
        ]);

        $visimisi = VisiMisi::findorfail($id);

        $visimisi->update([
            'desc' => $request->desc
        ]);

        return redirect()->route('visimisi');
    }

}
