

<section>
    <div class="p-0 mt-2">
        <div id="demo" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <ul class="carousel-indicators">
                <li data-target="#demo" data-slide-to="0" class="active"></li>
                <li data-target="#demo" data-slide-to="1"></li>
                <li data-target="#demo" data-slide-to="2"></li>
            </ul>

            <!-- The slideshow -->
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img style="width: 100%; height:500px;" src="{{ asset('/uploads/books/slider/6.jpg') }}"
                        alt="Los Angeles">
                </div>
                <div class="carousel-item">
                    <img style="width: 100%; height:500px;" src="{{ asset('/uploads/books/slider/6.jpg') }}"
                        alt="Chicago">
                </div>
                <div class="carousel-item">
                    <img style="width: 100%; height:500px;" src="{{ asset('/uploads/books/slider/6.jpg') }}"
                        alt="New York">
                </div>
            </div>

            <!-- Left and right controls -->
            <a class="carousel-control-prev" href="#demo" data-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </a>
            <a class="carousel-control-next" href="#demo" data-slide="next">
                <span class="carousel-control-next-icon"></span>
            </a>

        </div>
        {{-- </div>
        </div> --}}
    </div>
</section>
