<?php

namespace App\Http\Controllers;

use App\Delegue;
use Illuminate\Http\Request;
use App\Comite;
use App\Traits\ImageTrait;

class DelegueController extends Controller
{
    use ImageTrait;

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($comite_id)
    {
        $comite = Comite::find($comite_id);
        return view('admin.comites.delegue_create', compact('comite'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($comite_id)
    {
        $comite = Comite::find($comite_id);

        $attributes = request()->validate([
            'name' => 'required',
            'poste' => 'required',
            'image' => 'required|image'
        ], [
            'name.required' => 'Tu as oublié le nom.',
            'poste.required' => 'Tu as oublié le poste.',
            'image.required' => 'Tu as oublié l\'image.',
            'image.image' => 'Ce n\'est pas une image.'
        ]);

        $attributes['image'] = $this->uploadImage();
        $attributes['comite_id'] = $comite->id;
        Delegue::create($attributes);
        return redirect('/admin/comites/' . $comite->id);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Delegue  $delegue
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $delegue = Delegue::find($id);
        return view('admin.comites.delegue_edit', compact('delegue'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Delegue  $delegue
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        $delegue = Delegue::find($id);
        
        $attributes = request()->validate([
            'name' => 'required',
            'poste' => 'required',
        ], [
            'name.required' => 'Tu as oublié le nom.',
            'poste.required' => 'Tu as oublié le poste.',
        ]);

        if(request()->has('image')){
            $this->deleteImage($delegue->image);
            request()->validate([
                'image' => 'required|image'
            ], [
                'image.required' => 'Tu as oublié l\'image.',
                'image.image' => 'Ce n\'est pas une image.',
            ]);
            $attributes['image'] = $this->uploadImage();
        }

        $delegue->update($attributes);

        return redirect('/admin/comites/' . $delegue->comite_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Delegue  $delegue
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delegue = Delegue::find($id);
        $this->deleteImage($delegue->image);
        $delegue->delete();
        
        return back();
    }
}
