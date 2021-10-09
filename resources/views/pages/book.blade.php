@extends('master')

@section('content')
    <style type="text/css">
        .gr-book-info{
            list-style: none;
        }
        .gr-popular-books{
            list-style: none;
            padding-left: 5px;

        }
        .gr-popular-books > li > a{
            color: white;
            text-decoration: none;
            display: inline-block;
            margin-top: 7px;
        }
        .gr-chapters{
            list-style: none;
        }
    </style>

    <div class="container bg-light">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Library</a></li>
                <li class="breadcrumb-item active" aria-current="page">Data</li>
            </ol>
        </nav>

        <div class="row">
            <div class="col-md-9 ">
                <div class="row mb-4">
                    <div class="col-md-6">
                        <img class="card-img-top" src="{{ asset('/uploads/books/123.jpg') }}"/>
                    </div>

                    <div class="col-md-6">
                        <ul class="gr-book-info p-0 m-0">
                            <li>Title: <strong>Lorem ipsum dolor sit amet.</strong></li>
                            <li>Slug: <strong>Lorem, ipsum dolor.</strong></li>
                            <li>View: <strong>2000</strong></li>
                            <li>Chapter number: <strong>30</strong></li>
                        </ul>
                        <a href="#" class="mt-3 btn btn-success">Read online</a>
                    </div>
                </div>
                <hr>
                <div class="col-md-12">
                    <p>Desc</p>
                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Voluptatem aliquam exercitationem rem saepe voluptatibus iste minima maiores ex, unde voluptates ratione velit laboriosam pariatur culpa consequatur ad magni earum ullam doloribus adipisci distinctio itaque? Odit vitae fuga enim quo rerum..Lorem ipsum dolor, sit amet consectetur adipisicing elit. Rem, laborum commodi. Ex, tempora. Doloribus unde consectetur odio dolore adipisci possimus, dignissimos error accusantium dicta quis a. Quibusdam, magni? Cupiditate commodi possimus aliquid, dolorem natus, ad hic aperiam magnam cumque dolores, facere totam quos! Consequuntur alias provident illo dolores mollitia eveniet?</p>
                </div>
                <hr>

                <div>
                    <div>
                        <h4>Chapter</h4>
                    </div>

                    <ul class="gr-chapters p-0">
                        <li>
                            <a href="#">Chap 1.1 Lorem ipsum dolor sit amet.</a>
                        </li>
                        <li>
                            <a href="#">Chap 1.1 Lorem ipsum dolor sit amet.</a>
                        </li>
                        <li>
                            <a href="#">Chap 1.1 Lorem ipsum dolor sit amet.</a>
                        </li>
                        <li>
                            <a href="#">Chap 1.1 Lorem ipsum dolor sit amet.</a>
                        </li>
                    </ul>

                </div>

                <hr>
                <div>
                    <h4>Propose</h4>
                    <div class="container border border-light mb-10">
                        <div class="owl-carousel owl-theme mt-1 bg-dark p-1">
                            <div class="item">
                                <a href="#">
                                    <img src="{{ asset('/uploads/books/123.jpg') }}" alt="">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
            </div>
            <div class="col-md-3 ">
                <h4 class="mb-3">Popular books</h4>
                <ul class="gr-popular-books bg-secondary">
                    <li>
                        <a href="#">Lorem ipsum dolor</a>
                    </li>
                    <li>
                        <a href="#">Lorem ipsum dolor</a>
                    </li>
                    <li>
                        <a href="#">Lorem ipsum dolor</a>
                    </li>
                    <li>
                        <a href="#">Lorem ipsum dolor</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
@endsection
