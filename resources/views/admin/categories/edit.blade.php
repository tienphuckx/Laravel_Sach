@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header text-danger text-center h3">EDIT CATEGORY</div>

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
                    <form method="POST" action="{{ route('danhmuc.update', [$category->id]) }}">
                        @method('PUT')
                        @csrf

                        <div class="mb-3">
                          <label for="exampleInputEmail1" class="form-label">Title</label>
                          <input name="title" type="text" class="form-control" id="slug" onkeyup="ChangeToSlug();" value="{{ $category->title }}">
                        </div>

                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Slug category</label>
                            <input name="slug" type="text" value="{{ $category->slug }}" class="form-control" id="convert_slug" >
                          </div>

                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Desc</label>
                            <textarea name="desc" class="form-control" id="desc" rows="3" >
                            {{ $category->desc }}
                            </textarea>
                        </div>

                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Status</label>
                            <select name="status" class="custom-select form-control">
                                @if ($category->status == 1)
                                    <option selected value="1">Enable</option>
                                    <option value="0">Disable</option>
                                @else
                                    <option  value="1">Enable</option>
                                    <option selected value="0">Disable</option>
                                @endif
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
