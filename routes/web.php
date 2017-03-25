<?php
use App\Show;
use App\Genre;
use App\Episode;
use App\EpTitle;
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

Route::get('/', function () {
    $firstVisit = true;
    if (Cookie::get('visit'))
        $firstVisit = false;
    $ongoing = Show::where(['ongoing' => 1, 'type' => 1])->orderBy('airdate', 'desc')->get();
    //return Show::find(1)->episodes; // SELECT * FROM `episodes` WHERE `show_id`='1'
    $latest = Episode::orderBy('date', 'desc')->limit(8)->get();
    $featured = Show::where('featured', 1)->orderBy('airdate', 'desc')->get();

    return view('home', ['firstVisit' => $firstVisit, 'ongoing' => $ongoing, 'latest' => $latest, 'featured' => $featured]);
});

Route::get('listing/{type?}', 'ShowController@Index');

Route::get('drama/{name}', ['uses' => 'ShowController@Show', 'as' => 'drama']);
Route::get('variety/{name}', ['uses' => 'ShowController@Show', 'as' => 'variety']);
Route::get('movie/{name}', ['uses' => 'ShowController@Show', 'as' => 'movie']);


Auth::routes();

#Route::get('/home', 'HomeController@index');
