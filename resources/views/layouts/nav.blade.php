
<div class="container mb-3">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">


                <div class="card-body">
                    {{-- BEGIN NAV  --}}

                <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                    {{-- <a class="navbar-brand" href="#">Navbar</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                    </button> --}}

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">

                        <li class="nav-item active">
                        <a class="nav-link" href="{{ route('admin.home') }}">Admin <span class="sr-only">(current)</span></a>
                        </li>

                        {{-- CATEGORY  --}}
                        <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Category Manager
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{route('danhmuc.index')}}">List</a>
                            <a class="dropdown-item" href="{{route('danhmuc.create')}}">Add a new category</a>
                        </div>
                        </li>

                        {{-- BOOK  --}}
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Book Manager
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{route('truyen.index')}}">List </a>
                            <a class="dropdown-item" href="{{route('truyen.create')}}">Add a new book</a>
                            </div>
                        </li>

                        {{-- CHAPTER  --}}
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Chapter Manager
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{route('chapter.index')}}">List </a>
                            <a class="dropdown-item" href="{{route('chapter.create')}}">Add a new chapter</a>
                            </div>
                        </li>


                    </ul>


                    <form class="form-inline my-2 my-lg-0">
                        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                    </form>

                    </div>
                </nav>

                {{-- END NAV  --}}


                </div>
            </div>
        </div>
    </div>
</div>



