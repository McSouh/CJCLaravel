<?php
use App\Pvs;
use App\Comite;
use App\Statut;
use App\Galery;
use App\Plume;
use App\Article;
use App\Image;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

Route::group(['middleware' => 'auth'], function() {
    Route::get('/admin', function () {
        return view('admin.dashboard');
    });
    Route::resource('/admin/actualites', 'ArticleController');
    Route::resource('/admin/pvs', 'PvsController');
    Route::resource('/admin/statuts', 'StatutController');
    Route::resource('/admin/comites', 'ComiteController');
    Route::resource('/admin/plumes', 'PlumeController');
    Route::get('/admin/comites/{comite_id}/delegues/create', 'DelegueController@create');
    Route::post('/admin/comites/{comite_id}/delegues', 'DelegueController@store');
    Route::get('/admin/delegues/{delegue_id}', 'DelegueController@show');
    Route::patch('/admin/delegues/{delegue_id}', 'DelegueController@update');
    Route::delete('/admin/delegues/{delegue_id}', 'DelegueController@destroy');
    Route::resource('/admin/galeries', 'GaleryController');
    Route::get('/admin/galeries/{galery_id}/photos/create', 'ImageController@create');
    Route::post('/admin/galeries/{galery_id}/photos', 'ImageController@store');
    Route::delete('/admin/photos/{photo_id}', 'ImageController@destroy');

});

Route::get('/', function(){
    return view('home.home');
});

Route::get('/cercle', function(){
    return view('home.cercle.presentation');
});

Route::get('/actualites', function(){
    $actualites = Article::orderBy('created_at', 'desc')->paginate(5);
    return view('home.actualites.actualites', compact('actualites'));
});

Route::get('/comites', function(){
    $comites = Comite::orderBy('year', 'desc')->get();
    return view('home.cercle.comites', compact('comites'));
});

Route::get('/comites/{id}', function($id){
    $comites = Comite::all();
    $comite = Comite::find($id);
    return view('home.cercle.comite', compact(['comites', 'comite']));
});


Route::get('/statuts', function(){
    $statuts = Statut::all();
    return view('home.cercle.statuts', compact('statuts'));
});

Route::get('/pv', function(){
    $pvs = Pvs::all();
    return view('home.cercle.pv', compact('pvs'));
});

Route::get('/photos', function(){
    $galeries = Galery::all();
    return view('home.photos.galeries', compact('galeries'));
});

Route::get('/photos/{id}', function($id){
    $galery = Galery::find($id);
    $photos = Image::where('galery_id', $id)->paginate(12);
    
    return view('home.photos.photos', compact('photos', 'galery'));
});

Route::get('/plumes', function(){
    $plumes = Plume::orderBy('year', 'desc')->get();
    return view('home.plumes.plumes', compact('plumes'));
});

Route::get('/plumes/{id}', function($id){
    $plume = Plume::find($id);
    return view('home.plumes.plume', compact('plume'));
});


Route::get('/contact', function(){
    return view('home.contact.contact');
});

