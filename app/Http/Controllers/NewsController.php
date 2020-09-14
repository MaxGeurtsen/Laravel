<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function show()
    {

        $items = \App\NewsItem::all();
        return view('newsitems', ['items' => $items]);
    }
}
