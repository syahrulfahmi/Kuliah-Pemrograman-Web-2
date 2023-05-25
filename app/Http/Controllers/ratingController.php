<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ratingController extends Controller
{
    //
    public function index(){
        $data_rating = \App\Models\Rating::all();
        return view('rating.index', ['data_rating' => $data_rating]);
    }

    public function create(Request $request)
    {
        \App\Models\Rating::create($request->all());
        return redirect('/rating');
    }
}
