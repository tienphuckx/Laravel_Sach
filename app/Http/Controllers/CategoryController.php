<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::orderBy('id','DESC')->get();
        return view('admin.categories.index')->with(compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categories.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate(
            [
                'title' => 'required|unique:categories|max:255',
                'slug' => 'required|unique:categories',
                'desc' => 'required|max:255',
                'status' => 'required',
            ],
            [
                'title.required' => 'Son of a bitch! You have to input the title.',
                'desc.required' => 'Son of a bitch! You have to input the Desc.',
                'slug.required' => 'You have input the slug',
            ]);

        $category           = new Category();
        $category->title    = $data['title'];
        $category->slug     = $data['slug'];
        $category->desc     = $data['desc'];
        $category->status   = $data['status'];
        $category->save();

        return redirect()->back()->with('status','Add new category successfully!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::find($id);
        return view('admin.categories.edit')->with(compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // dd($request);
        $data = $request->validate(
            [
                'title' => 'required|max:255',
                'slug' => 'required',
                'desc' => 'required|max:255',
                'status' => 'required',
            ],
            [
                'title.required' => 'Son of a bitch! You have to input the title.',
                'desc.required' => 'Son of a bitch! You have to input the Desc.',
                'slug.required' => 'You have to input the Slug',
            ]);

        $category           = Category::find($id);
        $category->title    = $data['title'];
        $category->slug     = $data['slug'];
        $category->desc     = $data['desc'];
        $category->status   = $data['status'];
        $category->save();

        return redirect()->back()->with('status','Update category successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Category::find($id)->delete();
        return redirect()->back()->with('status','Delete category successfully!');

    }
}
