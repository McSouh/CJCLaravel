<?php

namespace App\Http\Controllers;

use App\Statut;
use Illuminate\Http\Request;
use App\Traits\FileTrait;

class StatutController extends Controller
{
    use FileTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $statuts = Statut::orderBy('created_at', 'desc')->get();

        return view('admin.statuts.statuts', compact('statuts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.statuts.statuts_create');
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
            'name' => 'required',
            'file' => 'required|mimes:pdf'
        ], [
            'name.required' => 'Tu as oublié le nom.',
            'file.required' => 'Tu as oublié le fichier.',
            'file.mimes' => 'Le fichier doit être au format PDF.'
        ]);

        $attributes['file'] = $this->uploadFile();
        Statut::create($attributes);

        return redirect('/admin/statuts');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\statuts  $statuts
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $statut = Statut::find($id);
        return view('admin.statuts.statuts_edit', compact('statut'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\statuts  $statuts
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        $statut = Statut::find($id);
        $attributes = request()->validate([
            'name' => 'required',
            'file' => 'mimes:pdf'
        ], [
            'name.required' => 'Tu as oublié le nom.',
            'file.mimes' => 'Le fichier doit être au format PDF.'
        ]);
        if(request()->has('file')){
            $this->deletefile($statut->file);
            $attributes['file'] = $this->uploadFile();
        }
        $statut->update($attributes);

        return redirect('/admin/statuts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\statuts  $statuts
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $statut = Statut::find($id);
        $this->deletefile($statut->file);
        $statut->delete();

        return redirect('/admin/statuts');
    }
}
