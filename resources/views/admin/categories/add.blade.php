@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header text-danger text-center h3">CREATE A NEW CATEGORY</div>

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
                    <form method="POST" action="{{ route('danhmuc.store') }}">
                        @csrf

                        <div class="mb-3">
                          <label for="exampleInputEmail1" class="form-label">Title</label>
                          <input name="title" type="text" value="{{ old('title') }}" class="form-control" onkeyup="ChangeToSlug();" id="slug" >

                        </div>

                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Slug category</label>
                            <input name="slug" type="text" value="{{ old('slug') }}" class="form-control" id="convert_slug" >
                          </div>

                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Desc</label>
                            <textarea name="desc" class="form-control" id="desc" rows="3">
                                {{ old('desc') }}
                            </textarea>
                          </div>

                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Status</label>
                            <select name="status" class="custom-select form-control">

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
