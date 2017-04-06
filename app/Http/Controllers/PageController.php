<?php

namespace App\Http\Controllers;

use App\Show;
use App\Key;
use App\Episode;
use Illuminate\Http\Request;

class PageController extends Controller
{
	public function Upload(Request $request)
    {
		if (!config('app.contributing'))
			abort(404);
		if ($request->get('step') == '2')
		{
			$results = Show::where('name', 'like', '%'.$request->get('q').'%')->orWhere('altname', 'like', '%'.$request->get('q').'%')->paginate(5);
			return view('upload', ['results' => $results]);
		} else if ($request->get('step') == '3')
		{
			$show = Show::where('id', $request->get('id'))->first();
			$key = str_random(10);
			$keyNew = new Key();
			$keyNew->uploader = \Auth::user()->name;
			$keyNew->key = $key;

			$keyNew->save();
			return view('upload', ['show' => $show, 'key' => $key]);
		} else if ($request->get('step') == '4')
		{
			$episode = Episode::where('show_id', $request->get('id'))->where('number', $request->get('number'))->where('approved', 1)->first();
			if ($episode)
				return back();
			/* TODO: Bot
			$key = Key::where('uploader', $request->get('uploader'))->where('key', $request->get('key'))->get();
			if ($key->used != 1)
				return back();
			$key->used = 2;
			$key->save();*/

			$episode = new Episode();
			$episode->show_id = $request->get('id');
			$episode->number = $request->get('number');
			$episode->drive = $request->get('drive');
			$episode->uploader = $request->get('uploader');
			$episode->encoder = $request->get('encoder');
			$episode->quality = $request->get('quality');
			$episode->subbed = 1;
			if ($request->get('uploader') == 'aegyo')
				$episode->approved = 1;
			else
				$episode->approved = 0;

			$episode->save();
			return view('upload');
		} else {
			return view('upload');
		}
	}
}
