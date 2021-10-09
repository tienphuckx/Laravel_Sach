@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header text-danger text-center h3">LIST CATEGORY</div>

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
                            <th scope="col">TITLE</th>
                            <th scope="col">Slug</th>
                            <th scope="col">DESC</th>
                            <th scope="col">STATUS</th>

                            <th scope="col"></th>
                            <th scope="col"></th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach($categories as $category)
                          <tr>
                            <th scope="row">{{ $category->id }}</th>
                            <td>{{ $category->title }}</td>
                            <td>{{ $category->slug }}</td>
                            <td>{{ $category->desc }}</td>
                            <td>
                                @if ($category->status === 1)
                                    <p class="text-success">Enable</p>
                                @else
                                    <p class="text-danger">Disable</p>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('danhmuc.edit',['danhmuc' => $category->id]) }}" class="btn btn-primary">Edit</a>

                            </td>
                            <td>

                                    <form action="{{ route('danhmuc.destroy',['danhmuc' => $category->id]) }}" method="POST">
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
