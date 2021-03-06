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
    $featured = Show::where('featured', 1)->orderBy('airdate', 'desc')->get();
    $latest = Episode::where('approved', 1)->orderBy('date', 'desc')->orderBy('id', 'desc')->limit(8)->get();
    $ongoing = Show::where(['ongoing' => 1, 'type' => 1])->orderBy('airdate', 'desc')->get();
    
    return view('home', ['firstVisit' => $firstVisit, 'ongoing' => $ongoing, 'latest' => $latest, 'featured' => $featured]);
});

Route::get('listing/{type?}', 'ShowController@Index');

Route::get('drama/{name?}', 'ShowController@Show');
Route::get('variety/{name?}', 'ShowController@Show');
Route::get('movie/{name?}', 'ShowController@Show');

Route::get('drama/{name}/episode-{number}', 'ShowController@View');
Route::get('variety/{name}/episode-{number}', 'ShowController@View');
Route::get('movie/{name}/episode-{number}', 'ShowController@View');

Route::get('search', 'ShowController@Search');

Route::get('theme/{name}', 'ThemeController@SetTheme');

Route::group(['middleware' => ['auth']], function () {
    Route::get('upload', 'PageController@Upload');
});

Auth::routes();

Route::get('/logout', function()
{
    Auth::logout();
    Session::flush();
    return Redirect::to('/');
});

#Route::get('/home', 'HomeController@index');
