<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;


class IndexController extends Controller
{
    public function home()
    {
        $categories = Category::orderBy('id','DESC')->get();
        return view('pages.home')->with(compact('categories'));
    }

    public function findbook()
    {
        return view('pages.book');
    }

    public function readbook($id)
    {
        return view('pages.book');
    }
}
