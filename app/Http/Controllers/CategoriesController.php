<?php

namespace App\Http\Controllers;

use App\categories;
use App\users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class CategoriesController extends Controller
{
    public function index()
    {

        $Allcategories = categories::all();

        return view('admin.create_category', [
            'Allcategories' => $Allcategories
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            "category" => 'required|unique:categories',
        ]);

        $categories = new categories();
        $categories->category = ucfirst($request->get('category')) ;
        $categories->save();

        $Allcategories = categories::all();

        return view('admin.create_category', [
            'categories' => $categories,
            'Allcategories' => $Allcategories
        ]);

    }

    public function active(Request $request)
    {
        $onoff = $request->get('input');
        $id = $request->get('id');

        if ($onoff == 'on') {
            categories::whereId($id)
                ->update(['active' => null]);

        } elseif ($onoff == 'off') {
            categories::whereId($id)
                ->update(['active' => '1']);
        }

        $Allcategories = categories::all();
        return view('admin.create_category', [
            'Allcategories' => $Allcategories
        ]);
    }
}
