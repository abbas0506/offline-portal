<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>RSGCRL</title>
    <link rel="icon" href="{{ asset('/images/logo/fav-ico.png') }}">
    <!-- Fonts -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Styles -->
    @vite(['resources/js/app.js', 'resources/css/app.css'])

    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('/css/swiper.css') }}">
    <!-- End Google Tag Manager -->
</head>

<body>
    @yield('header')
    @yield('sidebar')

    @yield('content')

    <script src="{{ asset('js/sweetalert2@10.js') }}"></script>
    <script type="module" src="{{ asset('js/collapsible.js') }}"></script>
    <script type="module" src="{{ asset('js/swiper.js') }}"></script>
    <script type="module" src="{{ asset('js/testimonial.js') }}"></script>
    <script type="module" src="{{ asset('js/flowbite.min.js') }}"></script>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=es6"></script>
    <script id="MathJax-script" async src="https://cdn.jsdelivr.net/npm/mathjax@3/es5/tex-mml-chtml.js"></script>
    @yield('script')
    @yield('footer')

    <div class="responsive-body">
        @yield('page-content')
    </div>

    <script type="module">
        $('#menu').click(function() {
            $("aside").toggleClass('shown');
        });

        $('.responsive-container').click(function(event) {
            var box = $('#sidebar');
            if (!box.is(event.target) && box.has(event.target).length === 0) {
                box.removeClass('shown');
            }
        })
    </script>
</body>

</html>