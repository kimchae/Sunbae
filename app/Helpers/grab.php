<?php
/* Slugify all shows

foreach (Show::all() as $show)
{
    $show->slug = str_slug($show->name);
    $show->save();
}
*/

/* Useless Atm */

/* Get Show Data
$shows = Show::where('tvdb', '>', '0')->get();
foreach ($shows as $show) {
    $tvdb = TVDB::series($show->tvdb)->get();
    $show->name = $tvdb->data->seriesName;
    //$show->altname = $tvdb->aliases->first();
    $show->synopsis = $tvdb->data->overview;
    $show->network = $tvdb->data->network;
    $show->imdb = $tvdb->data->imdbId;
    $show->airdate = $tvdb->data->firstAired.' 00:00:00';
    $show->airday = $tvdb->data->airsDayOfWeek;

    foreach ($tvdb->data->genre as $tvgenre)
    {
        $genre = new Genre;
        $genre->did = $show->id;
        $genre->name = $tvgenre;

        $genre->save();
    }

    $show->save();
}
return $shows;
*/

/* Get Cover Images

$shows = Show::where('tvdb', '>', '0')->get();
$boop = "";
foreach ($shows as $show) {
    if (file_exists("M:/Projects/Sunbae/public/img/covers/{$show->id}.jpg"))
        continue;
    try {
        copy("http://thetvdb.com/banners/fanart/original/{$show->tvdb}-1.jpg", "M:/Projects/Sunbae/public/img/covers/{$show->id}.jpg");
    } catch(Exception $e) {
        try {
            copy("http://thetvdb.com/banners/fanart/original/{$show->tvdb}-2.jpg", "M:/Projects/Sunbae/public/img/covers/{$show->id}.jpg");
        } catch (Exception $ee) {
            $boop += $show->tvdb." ";
            continue;
        }
    }
}
return $boop;
*/

/* Get Poster Images

$shows = Show::where('tvdb', '>', '0')->get();
$boop = "";
foreach ($shows as $show) {
    if (file_exists("M:/Projects/Sunbae/public/img/posters/{$show->id}.jpg"))
        continue;
    try {
        copy("http://thetvdb.com/banners/posters/{$show->tvdb}-1.jpg", "M:/Projects/Sunbae/public/img/posters/{$show->id}.jpg");
    } catch(Exception $e) {
        try {
            copy("http://thetvdb.com/banners/posters/{$show->tvdb}-2.jpg", "M:/Projects/Sunbae/public/img/posters/{$show->id}.jpg");
        } catch (Exception $ee) {
            $boop += $show->tvdb." ";
            continue;
        }
    }
}
return $boop;
*/

/* Episode Titles
set_time_limit(0);
$shows = Show::where('tvdb', '>', '0')->get();
foreach ($shows as $show) {
    $tvdb = TVDB::series($show->tvdb)->episodes();
    $i = 1;
    foreach ($tvdb->data as $ep)
    {
        if (EpTitle::where(['did' => $show->id, 'ep' => $i])->count() > 0)
            continue;
        $eptitle = new EpTitle;
        $eptitle->did = $show->id;
        $eptitle->ep = $i;
        $eptitle->title = $ep->episodeName;
        $eptitle->save();
        $i++;
    }
}
return $shows;
*/
?>
