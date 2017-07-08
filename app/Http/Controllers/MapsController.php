<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Map;

class MapsController extends Controller
{
    public function maps()
    {
        return view('maps.index');
    }

     public function store(Request $request) 
    {
        $this->validate($request, [
            'title'  => 'required',
            'lat' => 'required',
            'lng' => 'required'
        ]);

        $input = $request->all();
        Map::create($input);

        return redirect()->back();
    }

    public function getAll()
    {
        return view('maps.getAll', compact('getAllMarkers'));
    }

    public function fetchAll()
    {
       $fetch = Map::all();

       return response()->json($fetch, 200);
    }
}
