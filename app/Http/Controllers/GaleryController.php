<?php

namespace App\Http\Controllers;

use App\Galery;
use Illuminate\Http\Request;
use App\Traits\ImageTrait;

class GaleryController extends Controller
{
    use ImageTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $galeries = Galery::orderBy('created_at', 'desc')->get();

        return view('admin.photos.galeries', compact('galeries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.photos.galeries_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $attributes = request()->validate([
            'title' => 'required'
        ], [
            'title.required' => 'Tu as oublié le titre.'
        ]);

        Galery::create($attributes);

        return redirect('admin/galeries');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Galery  $galery
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $galery = Galery::find($id);

        return view('admin.photos.galeries_edit', compact('galery'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Galery  $galery
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        $galery = Galery::find($id);

        $attributes = request()->validate([
            'title' => 'required'
        ], [
            'title.required' => 'Tu as oublié le titre.'
        ]);

        $galery->update($attributes);

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Galery  $galery
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $galery = Galery::find($id);

        $photos = $galery->images;
        foreach($photos as $photo){
            $this->deleteImage($photo->image);
            $photo->delete();
        }

        $galery->delete();

        return redirect('admin/galeries');
    }
}
