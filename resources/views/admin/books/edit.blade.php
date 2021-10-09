@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header text-danger text-center h3">UPDATE BOOK</div>

                <div class="card-body ">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    {{-- BEGIN FORM  --}}
                    <form method="POST" action="{{ route('truyen.update',[$book->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf

                        {{-- NAME BOOK  --}}
                        <div class="mb-3">
                          <label for="exampleInputEmail1" class="form-label">Book name</label>
                          <input
                                name="book_name"
                                type="text" value="{{ $book->book_name }}"
                                class="form-control"
                                onkeyup="ChangeToSlug();"
                                id="slug" >
                        </div>

                        {{-- SLUG  --}}
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Slug book</label>
                            <input name="book_slug" type="text" value="{{ $book->book_slug }}" class="form-control" id="convert_slug" >
                          </div>

                        {{-- SHORT DESC  --}}
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Sort Desc Book</label>
                            <textarea
                            name="book_desc"
                            class="form-control"
                            id="desc"
                            rows="5"
                            style="resize: none;">
                                {{ $book->book_desc }}
                            </textarea>
                          </div>

                        {{-- CATEGORY  --}}
                          <div class="mb-3">
                            <label class="form-label">Book Category</label>
                            <select name="book_category_id" class="custom-select form-control">
                                @foreach ($categories as $category)
                                    <option {{ $category->id == $book->book_category_id ? 'selected' : '' }} value="{{ $category->id }}">{{ $category->title }}</option>
                                @endforeach
                            </select>
                        </div>

                        {{-- IMG  --}}
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Image</label>
                            <input type="file" class="form-control-file" name="book_img">
                          </div>

                        <div class="mb-3">
                            <img src="{{ asset('/uploads/books/'.$book->book_img) }}" alt="" width="500px" height="350px">
                        </div>

                        {{-- STATUS  --}}
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Status</label>
                            <select name="book_status" class="custom-select form-control">
                                @if ($book->book_status == 1)
                                    <option selected value="1">Enable</option>
                                    <option value="0">Disable</option>
                                @else
                                    <option value="1">Enable</option>
                                    <option selected value="0">Disable</option>
                                @endif

                                <option selected value="1">Enable</option>
                                <option value="0">Disable</option>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary">Update</button>
                      </form>
                    {{-- END FORM  --}}

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
