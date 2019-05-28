<?php

namespace App\Http\Controllers;

use App\Pvs;
use Illuminate\Http\Request;
use App\Traits\FileTrait;

class PvsController extends Controller
{
    use FileTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pvs = Pvs::orderBy('created_at', 'desc')->get();

        return view('admin.pvs.pvs', compact('pvs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pvs.pvs_create');
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
        Pvs::create($attributes);

        return redirect('/admin/pvs');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pvs  $pvs
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pv = Pvs::find($id);
        return view('admin.pvs.pvs_edit', compact('pv'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pvs  $pvs
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        $pv = Pvs::find($id);
        $attributes = request()->validate([
            'name' => 'required',
            'file' => 'mimes:pdf'
        ], [
            'name.required' => 'Tu as oublié le nom.',
            'file.mimes' => 'Le fichier doit être au format PDF.'
        ]);
        if(request()->has('file')){
            $this->deletefile($pv->file);
            $attributes['file'] = $this->uploadFile();
        }
        $pv->update($attributes);

        return redirect('/admin/pvs');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pvs  $pvs
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pv = Pvs::find($id);
        $this->deletefile($pv->file);
        $pv->delete();

        return redirect('/admin/pvs');
    }
}
