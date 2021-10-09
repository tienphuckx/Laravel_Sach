<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Book;
// use App\Http\Controllers\File;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::with('category')->orderBy('id','DESC')->get();
        return view('admin.books.index')->with(compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::orderBy('id','DESC')->get();
        return view('admin.books.add')->with(compact('categories'));
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
                'book_name'             => 'required|max:255',
                'book_slug'             => 'required',
                'book_desc'             => 'required|max:255',
                'book_img'              => 'required|mimes:jpeg,jpg,png,gif',
                'book_status'           => 'required',
                'book_category_id'      => 'required',
            ],
            [
                'book_name.required' => 'Son of a bitch! You have to input the title.',
                'book_desc.required' => 'Son of a bitch! You have to input the Desc.',
                'book_slug.required' => 'You have input the slug',
                'book_slug.unique'   => 'The slug name has already exist',
                'book_img.required'  => 'You have input the imgage',
            ]);


        $book = new Book();
        $book->book_name        = $data['book_name'];
        $book->book_slug        = $data['book_slug'];
        $book->book_desc        = $data['book_desc'];
        $book->book_status      = $data['book_status'];
        $book->book_category_id = $data['book_category_id'];

        // dd($book->book_category_id);

        // IMG
        // $get_image         = $data['book_img'];
        $get_image = $request->book_img;
        $path = 'uploads/books/';
        $get_name_img = $get_image->getClientOriginalName();
        $name_image = current(explode('.',$get_name_img));
        $new = time().time().'.'.$get_image->getClientOriginalExtension();
        $get_image->move($path, $new);
        $book->book_img = $new;
        // dd($book);
        $book->save();

        return redirect()->back()->with('status','Add new book successfully!');
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
        $book = Book::find($id);
        $categories = Category::orderBy('id','DESC')->get();
        return view('admin.books.edit')->with(compact('book','categories'));
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
                'book_name'             => 'required|max:255',
                'book_slug'             => 'required',
                'book_desc'             => 'required|max:255',

                'book_status'           => 'required',
                'book_category_id'      => 'required',
            ],
            [
                'book_name.required' => 'Son of a bitch! You have to input the title.',
                'book_desc.required' => 'Son of a bitch! You have to input the Desc.',


            ]);


        $book = Book::find($id);
        $book->book_name        = $data['book_name'];
        $book->book_slug        = $data['book_slug'];
        $book->book_desc        = $data['book_desc'];
        $book->book_status      = $data['book_status'];
        $book->book_category_id = $data['book_category_id'];


        $get_image = $request->book_img;
            if($get_image)
            {
                /* IF CHOISE NEW IMG --> THEN UNLINK THE OLD OWN */
                $path = 'uploads/books/'.$book->book_img;
                if(file_exists($path))
                {
                    unlink($path);
                }

                /* UPLOAD THE NEW IMG */
                $path = 'uploads/books/';
                $get_name_img = $get_image->getClientOriginalName();
                $name_image = current(explode('.',$get_name_img));
                $new = $name_image.time().'.'.$get_image->getClientOriginalExtension();
                $get_image->move($path, $new);
                $book->book_img = $new;
            }




        $book->save();

        return redirect()->back()->with('status','Update book successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $book = Book::find($id);
        $path = 'uploads/books/'.$book->book_img;
        if(file_exists($path))
        {
            unlink($path);
        }
        Book::find($id)->delete();
        return redirect()->back()->with('status','Delete book successfully!');
    }
}
