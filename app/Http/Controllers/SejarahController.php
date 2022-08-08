<?php

namespace App\Http\Controllers;

use App\Models\Sejarah;
use Illuminate\Http\Request;

class SejarahController extends Controller
{

    public function index()
    {
        $sejarah = Sejarah::first();

        return view('admin.profil.sejarah', compact('sejarah'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'desc' => ['required']
        ]);

        $sejarah = Sejarah::findorfail($id);

        $sejarah->update([
            'desc' => $request->desc
        ]);

        return redirect()->route('sejarah');
    }

}
