<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;
use App\Traits\ImageTrait;

class ArticleController extends Controller
{
    use ImageTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::orderBy('created_at', 'desc')->get();

        return view('admin.articles.articles', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.articles.articles_create');
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
            'title' => 'required',
            'description' => 'required',
            'image' => 'required|image'
        ], [
            'title.required' => 'Tu as oublié le titre.',
            'description.required' => 'Tu as oublié la description.',
            'image.required' => 'Tu as oublié l\'image.',
            'image.image' => 'Ce n\'est pas une image.',
        ]);
        
        $attributes['image'] = $this->uploadImage();
        Article::create($attributes);

        return redirect('/admin/actualites');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $article = Article::find($id);

        return view('admin.articles.articles_edit', compact('article'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Article $article)
    {
        $attributes = request()->validate([
            'title' => 'required',
            'description' => 'required',
        ], [
            'title.required' => 'Tu as oublié le titre.',
            'description.required' => 'Tu as oublié la description.',
        ]);

        if(request()->has('image')){
            $this->deleteImage($article->image);
            request()->validate([
                'image' => 'required|image'
            ], [
                'image.required' => 'Tu as oublié l\'image.',
            'image.image' => 'Ce n\'est pas une image.',
            ]);
            $attributes['image'] = $this->uploadImage();
        }

        $article->update($attributes);

        return redirect('/admin/actualites');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $article = Article::find($id);
        $this->deleteImage($article->image);
        $article->delete();
        return redirect('/admin/actualites');
    }
}
