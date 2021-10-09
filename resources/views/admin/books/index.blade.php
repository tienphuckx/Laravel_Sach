@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header text-danger text-center h3">LIST BOOK</div>

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
                            <th scope="col">IMG</th>
                            <th scope="col">NAME</th>
                            <th scope="col">SLUG</th>
                            <th scope="col">CATEGORY</th>
                            {{-- <th scope="col">DESC</th> --}}
                            <th scope="col">STATUS</th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                          </tr>
                        </thead>

                        <tbody>
                            @foreach($books as $book)
                          <tr>
                            <th scope="row">{{ $book->id }}</th>
                            <td>
                                <img
                                height="200"
                                width="250"
                                src="{{ asset('/uploads/books/'.$book->book_img) }}"
                                alt="">
                            </td>
                            <td>{{ $book->book_name }}</td>
                            <td>{{ $book->book_slug }}</td>
                            {{-- <td>{{ $book->book_desc }}</td> --}}
                            <td>{{ $book->category->title }}</td>

                            <td>
                                @if ($book->book_status === 1)
                                    <p class="text-success">Enable</p>
                                @else
                                    <p class="text-danger">Disable</p>
                                @endif
                            </td>

                            <td>
                                <a href="{{ route('truyen.edit',['truyen' => $book->id]) }}" class="btn btn-primary">Edit</a>
                            </td>
                            <td>

                                <form action="{{ route('truyen.destroy',['truyen' => $book->id]) }}" method="POST">
                                    @method('DELETE')
                                    @csrf

                                    <button
                                    onclick="return confirm('Are you sure you want to delete this book?');"
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
