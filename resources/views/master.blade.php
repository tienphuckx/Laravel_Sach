<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <title>Home</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css">

    {{-- App.css --}}
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    {{-- Owl.css --}}
    <link href="{{ asset('css/owl.carousel.css') }}" rel="stylesheet">
    <link href="{{ asset('css/owl.theme.default.css') }}" rel="stylesheet">

    {{-- Slider.css --}}
    <link href="{{ asset('css/slider.css') }}" rel="stylesheet">


</head>

<body>

    <div class="container-fluid bg-dark p-0">

        {{-- ----------------------------------NAV --}}
        @include('pages.nav')

        {{-- ----------------------------------SLIDER FULL --}}
        {{-- @include('pages.slider') --}}

        {{-- ----------------------------------SLIDE HOT --}}
        {{-- @include('pages.slider-hot') --}}

        @yield('slider')

        @yield('slider-hot')

        @yield('content')

    </div>

    @include('pages.footer')





    <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/slider.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/owl.carousel.js') }}"></script>


    <script>
        $('.owl-carousel').owlCarousel({
            loop: true,
            margin: 10,
            // nav:true,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 3
                },
                1000: {
                    items: 5
                }
            }
        })
    </script>
    <script>
        $(document).ready(function() {

            $("#owl-example").owlCarousel({
                navigation: true,
                slideSpeed: 300,
                paginationSpeed: 400,
                singleItem: true,
                pagination: false,
                rewindSpeed: 500
            });

        });
    </script>
</body>

</html>
