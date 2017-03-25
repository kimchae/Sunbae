<?php

use Illuminate\Foundation\Inspiring;
use App\Show;
/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->describe('Display an inspiring quote');

Artisan::command('ongoing', function () {
    $shows = Show::where('tvdb', '>', '0')->get();
    foreach ($shows as $show) {
        $tvdb = TVDB::series($show->tvdb)->get();
        if ($tvdb->data->status == 'Ended')
            continue;
        $show->ongoing = 1;
        $show->save();
    }
})->describe('Updates the on-going value of each show.');
