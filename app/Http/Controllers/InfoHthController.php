<?php

namespace App\Http\Controllers;

use App\Models\InfoHth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class InfoHthController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $infohths = DB::table('info_hths')->orderBy('id', 'desc')->get();
        return view('admin.info-hth.index', compact('infohths'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.info-hth.create');
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
            'img' => ['required', 'mimes:png,jpg,jpeg', 'max:2000'],
        ],
        [
            'img.max' => 'Ukuran gambar lebih dari 2 MB.'
        ]);


        $title = $request->title;
        $slug = Str::slug($request->title);
        $desc = $request->desc;

        $img = $request->img;
        $new_img = time().$img->getClientOriginalName();

        $infohth = InfoHth::create([
            'title' => $title,
            'slug' => $slug,
            'desc' => $desc,
            'img' => 'uploads/infohth/'.$new_img,
        ]);

        if ($infohth)
        {
            $img->move('uploads/infohth/', $new_img);
            return redirect()->route('infohth');
        }
        else
        {
            return redirect()->route('infohth');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\InfoHth  $infoHth
     * @return \Illuminate\Http\Response
     */
    public function show(InfoHth $infoHth)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\InfoHth  $infoHth
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $infohth = InfoHth::findorfail($id);
        return view('admin.info-hth.edit', compact('infohth'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\InfoHth  $infoHth
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => ['required'],
            'img' => ['mimes:png,jpg,jpeg', 'max:2000'],
        ],
        [
            'img.max' => 'Ukuran gambar lebih dari 2 MB.'
        ]);

        $infohth = InfoHth::findorfail($id);

        if ($request->has('img')) {
            $destination = $request->img_lama;
            if (File::exists($destination)) {
                File::delete($destination);
            }

            $img = $request->img;
            $new_img = time().$img->getClientOriginalName();
            $img->move('uploads/infohth/', $new_img);

            $infohth_data = [
                'title' => $request->title,
                'slug' => Str::slug($request->title),
                'desc' => $request->desc,
                'img' => 'uploads/infohth/'.$new_img,
            ];
        } else {
            $infohth_data = [
                'title' => $request->title,
                'slug' => Str::slug($request->title),
                'desc' => $request->desc,
            ];
        }

        $infohth->update($infohth_data);

        return redirect()->route('infohth');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\InfoHth  $infoHth
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $infohth = InfoHth::findOrFail($id);
        $destination = $infohth->img;
        if (File::exists($destination)) {
            File::delete($destination);
        }

        $infohth = InfoHth::where('id', $id)->delete();

        return redirect()->route('infohth');
    }
}
