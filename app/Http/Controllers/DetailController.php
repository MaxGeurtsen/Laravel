<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DetailController extends Controller
{
    public function show()
    {

        $id = request('id');
        $items = \App\NewsItem::all();

        return view('detail', ['id' => $id], ['items' => $items]);
    }
}
