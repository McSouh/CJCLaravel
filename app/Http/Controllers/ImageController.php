<?php

namespace App\Http\Controllers;

use App\Image;
use App\Galery;
use Illuminate\Http\Request;
use App\Traits\ImagesTrait;

class ImageController extends Controller
{
    use ImagesTrait;

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($galery_id)
    {
        $galery = Galery::find($galery_id);

        return view('admin.photos.photos_create', compact('galery'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($galery_id)
    {
        request()->validate([
            'image' => 'required',
            'image.*' => 'image'
        ], [
            'image.required' => 'Tu as oublié l\'image',
            'image.*.image' => 'Ce ne sont pas que des images.'
        ]);
        foreach(request()->image as $image){
            $attributes['image'] = $this->uploadImages($image);
            $attributes['galery_id'] = $galery_id;
            Image::create($attributes);
        }
        return redirect('/admin/galeries/' . $galery_id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function show(Image $image)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function edit(Image $image)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Image $image)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $image = Image::find($id);
        if(!empty($image)){
            $this->deleteImage($image->image);
            $image->delete();
        }
        return back();
    }
}
