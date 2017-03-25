<?php

namespace App\Http\Controllers;

use App\Show;
use Illuminate\Http\Request;

class ShowController extends Controller
{
    public function Index(Request $request, $type = 'drama')
    {

        $allowedSorts = array('name', 'airdate');
        $allowedOrders = array('asc', 'desc');
        $sort = $request->get('sort');
        $order = $request->get('order');
        if (!in_array($request->get('sort'), $allowedSorts))
            $sort = 'name';
        if (!in_array($request->get('order'), $allowedOrders))
            $order = 'asc';

        switch ($type)
        {
            default:
            case "drama":
                $typeC = 1;
                $type = "drama";
                break;
            case "variety":
                $typeC = 2;
                break;
            case "movies":
                $typeC = 3;
                break;
        }
        $shows = Show::where('type', $typeC)->orderBy($sort, $order)->paginate(16);

        return view('listing', ['type' => ucfirst($type), 'shows' => $shows]);
    }

    public function Search(Request $request)
    {
        $query = $request->get('q');
        $results = Show::where('name', 'like', '%'.$query.'%')->orWhere('altname', 'like', '%'.$query.'%')->paginate(5);
        return view('search', ['results' => $results]);
    }

    public function Show($name = NULL)
    {
        $show = Show::where('slug', $name)->first();
        if (!$name)
            return redirect('/listing/drama');
        if (!$show)
            abort(404);

        return view('show', ['show' => $show]);
    }

    public function View($name = NULL, $number = NULL)
    {
        $show = Show::where('slug', $name)->first();
        if (!is_numeric($number) || !$show)
            abort(404);

        $episode = $show->episodes->where('number', $number)->first();
        if ($episode->count() == 0)
            abort(404);
        return view('watch', ['show' => $show, 'episode' => $episode]);
    }
}
