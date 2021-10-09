@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header text-danger text-center h3">LIST CHAPTER</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table class="table table-dark">
                        <thead>
                          <tr>
                            <th scope="col">ID</th>
                            <th scope="col">BOOK</th>
                            <th scope="col">TITLE</th>
                            <th scope="col">SLUG</th>
                            <th scope="col">DESC</th>
                            <th scope="col">STATUS</th>

                            <th scope="col"></th>
                            <th scope="col"></th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach($chapters as $chapter)
                          <tr>
                            <th scope="row">{{ $chapter->id }}</th>
                            <td>{{ $chapter->book->book_name }}</td>
                            <td>{{ $chapter->chapter_title }}</td>
                            <td>{{ $chapter->chapter_slug }}</td>
                            <td>{{ $chapter->chapter_desc }}</td>
                            <td>
                                @if ($chapter->chapter_status === 1)
                                    <p class="text-success">Enable</p>
                                @else
                                    <p class="text-danger">Disable</p>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('chapter.edit',['chapter' => $chapter->id])  }}" class="btn btn-primary">Edit</a>
                            </td>
                            <td>

                                    <form action="{{ route('chapter.destroy',['chapter' => $chapter->id]) }}" method="POST">
                                        @method('DELETE')
                                        @csrf

                                        <button
                                        onclick="return confirm('Are you sure you want to delete this category?');"
                                        class="btn btn-danger">Delete</button>

                                    </form>

                            </td>
                          </tr>
                            @endforeach
                        </tbody>
                      </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
