<?php

namespace App\Http\Controllers;

use App\Comite;
use Illuminate\Http\Request;
use App\Traits\ImageTrait;

class ComiteController extends Controller
{
    use ImageTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comites = Comite::orderBy('created_at', 'desc')->get();
        return view('admin.comites.comites', compact('comites'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.comites.comites_create');
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
            'year' => 'required'
        ], [
            'year.required' => 'Tu as oublié l\'année du mandat.'
        ]);

        Comite::create($attributes);

        return redirect('/admin/comites');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Comite  $comite
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $comite = Comite::find($id);

        return view('admin.comites.comites_edit', compact('comite'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Comite  $comite
     * @return \Illuminate\Http\Response
     */
    public function update(Comite $comite)
    {
        $attributes = request()->validate([
            'year' => 'required'
        ], [
            'year.required' => 'Tu as oublié l\'année du mandat.'
        ]);
        
        $comite->update($attributes);

        return redirect('/admin/comites');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Comite  $comite
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comite $comite)
    {
        $delegues = $comite->delegues;
        foreach($delegues as $delegue){
            $this->deleteImage($delegue->image);
            $delegue->delete();
        }
        $comite->delete();

        return redirect('/admin/comites');
    }
}
