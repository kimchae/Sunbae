<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ThemeController extends Controller
{
	public function SetTheme(Request $request, $name)
    {
		$themes = array('light', 'dark');
		if (!in_array($name, $themes))
			abort(404);

		return Redirect::to('/')->withCookie(cookie('theme', $name, 24*30*365));
	}
}
