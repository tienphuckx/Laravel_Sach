@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header text-danger text-center h3">CREATE A NEW CHAPTER</div>

                <div class="card-body">
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
                    <form method="POST" action="{{ route('chapter.store') }}">
                        @csrf

                        {{-- BOOK  --}}
                        <div class="mb-3">
                            <label  class="form-label">Book</label>
                            <select name="chapter_book_id" class="custom-select form-control">
                                @foreach ($books as $book)
                                    <option value="{{ $book->id }}">{{ $book->book_name }}</option>
                                @endforeach
                            </select>
                        </div>

                        {{-- CHAPTER TITLE  --}}
                        <div class="mb-3">
                          <label  class="form-label">Chapter title</label>
                          <input name="chapter_title" type="text" value="{{ old('chapter_title') }}" class="form-control" onkeyup="ChangeToSlug();" id="slug" >
                        </div>

                        {{-- CHAPTER SLUG  --}}
                        <div class="mb-3">
                            <label  class="form-label">Chapter slug</label>
                            <input name="chapter_slug" type="text" value="{{ old('chapter_slug') }}" class="form-control" id="convert_slug" >
                          </div>

                        {{-- CHAPTER DESC  --}}
                        <div class="mb-3">
                            <label  class="form-label">Chapter desc</label>
                            <textarea name="chapter_desc" class="form-control" id="desc" rows="5">
                                {{ old('chapter_desc') }}
                            </textarea>
                          </div>

                        {{-- CHAPTER CONTENT  --}}
                          <div class="mb-3">
                            <label  class="form-label">Chapter content</label>
                            <textarea name="chapter_content" class="form-control" id="desc" rows="10">
                                {{ old('chapter_content') }}
                            </textarea>
                          </div>



                        {{-- CHAPTER STATUS  --}}
                        <div class="mb-3">
                            <label  class="form-label">Chapter status</label>
                            <select name="chapter_status" class="custom-select form-control">
                                <option selected value="1">Enable</option>
                                <option value="0">Disable</option>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>

                      </form>
                    {{-- END FORM  --}}

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
