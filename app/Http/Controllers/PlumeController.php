<?php

namespace App\Http\Controllers;

use App\Plume;
use Illuminate\Http\Request;

class PlumeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $plumes = Plume::orderBy('year', 'desc')->get();

        return view('admin.plumes.plumes', compact('plumes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.plumes.plumes_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        if(request()->validation == null){
            request()->validate([
                'validation' => 'required'
            ], [
                'validation.required' => ''
            ]);
        }
        $attributes = request()->validate([
            'year' => 'required',
            'title' => 'required',
            'url' => 'required'
        ], [
            'year.required' => 'Tu as oublié l\'année.',
            'title.required' => 'Tu as oublié le titre.',
            'url.required' => 'Tu as oublié le lien Issuu.',
        ]);

        Plume::create($attributes);

        return redirect('/admin/plumes');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Plume  $plume
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $plume = Plume::find($id);

        return view('admin.plumes.plumes_edit', compact('plume'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Plume  $plume
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {

        if(request()->validation == null){
            request()->validate([
                'validation' => 'required'
            ], [
                'validation.required' => ''
            ]);
        }
        
        $plume = Plume::find($id);

        $attributes = request()->validate([
            'year' => 'required',
            'title' => 'required',
            'url' => 'required'
        ], [
            'year.required' => 'Tu as oublié l\'année.',
            'title.required' => 'Tu as oublié le titre.',
            'url.required' => 'Tu as oublié le lien Issuu.',
        ]);

        $plume->update($attributes);

        return redirect('/admin/plumes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Plume  $plume
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $plume = Plume::find($id);

        $plume->delete();

        return back();
    }
}
