<?php

namespace App\Http\Controllers;

use App\Models\SliderPeta;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class SliderPetaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliderpeta = SliderPeta::get();

        return view('admin.slider-peta.index', compact('sliderpeta'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SliderPeta  $sliderPeta
     * @return \Illuminate\Http\Response
     */
    public function show(SliderPeta $sliderPeta)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SliderPeta  $sliderPeta
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sliderpeta = SliderPeta::findorfail($id);

        return view('admin.slider-peta.edit', compact('sliderpeta'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SliderPeta  $sliderPeta
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

        $sliderpeta = SliderPeta::findorfail($id);

        if ($request->has('img')) {
            $destination = $request->img_lama;
            if (File::exists($destination)) {
                File::delete($destination);
            }

            $img = $request->img;
            $new_img = time().$img->getClientOriginalName();
            $img->move('uploads/sliderpeta/', $new_img);

            $sliderpeta_data = [
                'title' => $request->title,
                'slug' => Str::slug($request->title),
                'desc' => $request->desc,
                'img' => 'uploads/sliderpeta/'.$new_img,
            ];
        } else {
            $sliderpeta_data = [
                'title' => $request->title,
                'slug' => Str::slug($request->title),
                'desc' => $request->desc,
            ];
        }

        $sliderpeta->update($sliderpeta_data);

        return redirect()->route('sliderpeta');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SliderPeta  $sliderPeta
     * @return \Illuminate\Http\Response
     */
    public function destroy(SliderPeta $sliderPeta)
    {
        //
    }
}
