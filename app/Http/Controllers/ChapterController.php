<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Chapter;
use App\Models\Book;

class ChapterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $chapters = Chapter::orderBy('id','DESC')->get();

        $chapters = Chapter::with('book')->orderBy('id','DESC')->get();
        // dd($chapter);
        return view('admin.chapters.index')->with(compact('chapters'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $books = Book::orderBy('id','DESC')->get();
        return view('admin.chapters.add')->with(compact('books'));
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
                'chapter_book_id'   => 'required',
                'chapter_title'     => 'required',
                'chapter_slug'      => 'required',
                'chapter_desc'      => 'required|max:255',
                'chapter_content'   => 'required',
                'chapter_status'    => 'required',
            ],
            [
                'chapter_title.required'    => 'Son of a bitch! You have to input the chapter title.',
                'chapter_desc.required'     => 'Son of a bitch! You have to input the chapter desc.',
                'chapter_slug.required'     => 'You have input the slug',
                'chapter_content.required'  => 'You have input the slug',
            ]);
        $chapter = new Chapter();
        $chapter->chapter_book_id   = $data['chapter_book_id'];
        $chapter->chapter_title     = $data['chapter_title'];
        $chapter->chapter_slug      = $data['chapter_slug'];
        $chapter->chapter_desc      = $data['chapter_desc'];
        $chapter->chapter_content   = $data['chapter_content'];
        $chapter->chapter_status    = $data['chapter_status'];
        $chapter->save();
        return redirect()->back()->with('status','Add new chapter successfully!');
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
        $chapter = Chapter::find($id);
        return view('admin.chapters.edit')->with(compact('chapter'));
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
        $data = $request->validate(
            [
                'chapter_book_id'   => 'required',
                'chapter_title'     => 'required',
                'chapter_slug'      => 'required',
                'chapter_desc'      => 'required|max:255',
                'chapter_content'   => 'required',
                'chapter_status'    => 'required',
            ],
            [
                'chapter_title.required'    => 'Son of a bitch! You have to input the chapter title.',
                'chapter_desc.required'     => 'Son of a bitch! You have to input the chapter desc.',
                'chapter_slug.required'     => 'You have input the slug',
                'chapter_content.required'  => 'You have input the slug',
            ]);

        $chapter = Chapter::find($id);
        $chapter->chapter_book_id   = $data['chapter_book_id'];
        $chapter->chapter_title     = $data['chapter_title'];
        $chapter->chapter_slug      = $data['chapter_slug'];
        $chapter->chapter_desc      = $data['chapter_desc'];
        $chapter->chapter_content   = $data['chapter_content'];
        $chapter->chapter_status    = $data['chapter_status'];
        $chapter->save();

        return redirect()->back()->with('status','Updated chapter successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Chapter::find($id)->delete();
        return redirect()->back()->with('status','Deleted a chapter successfully!');
    }
}
