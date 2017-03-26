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
			$episode = Episode::where('show_id', $request->get('id'))->where('number', $request->get('number'))->first();
			if ($episode)
				return back();
			$key = Key::where('uploader', $request->get('uploader'))->where('key', $request->get('key'))->get();
			if ($key->used != 1)
				return back();

			$episode = new Episode();
			$episode->show_id = $request->get('id');
			$episode->number = $request->get('number');
			$episode->drive = $request->get('drive');
			$episode->uploader = $request->get('uploader');
			$episode->encoder = $request->get('encoder');
			$episode->quality = $request->get('quality');
			$episode->subbed = 1;
			$episode->approved = 0;

			$episode->save();
			return view('upload');
		} else {
			return view('upload');
		}
	}
}
