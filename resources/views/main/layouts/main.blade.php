<!DOCTYPE html>
<html lang="zxx">
  <head>
    <meta charset="UTF-8" />
    <meta name="description" content="Anime Template" />
    <meta name="keywords" content="Anime, unica, creative, html" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Titonime | @yield('title')</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@300;400;500;600;700&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Mulish:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet" />

    <!-- Css Styles -->
    <link rel="stylesheet" href="{{ asset('anime/css/bootstrap.min.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('anime/css/font-awesome.min.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('anime/css/elegant-icons.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('anime/css/plyr.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('anime/css/nice-select.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('anime/css/owl.carousel.min.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('anime/css/slicknav.min.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('anime/css/style.css') }}" type="text/css" />
    @stack('style')
  </head>

  <body>
    <!-- Page Preloder -->
    {{-- <div id="preloder">
      <div class="loader"></div>
    </div> --}}

    <!-- Header Section Begin -->
    @include('main.components.header')
    <!-- Header End -->

    @yield('container')

    <!-- Footer Section Begin -->
    @include('main.components.footer')
    <!-- Footer Section End -->

    <!-- Search model Begin -->
    <div class="search-model">
      <div class="h-100 d-flex align-items-center justify-content-center">
        <div class="search-close-switch"><i class="icon_close"></i></div>
        <form action="/show" class="search-model-form" method="GET">
          @if (request('category'))
              <input type="hidden" name="category" value="{{ request('category') }}">
          @endif

          @if (request('genre'))
              <input type="hidden" name="genre" value="{{ request('genre') }}">
          @endif
          <input type="text" id="search-input" placeholder="Search here....." name="search" value="{{ request('search') }}" />
        </form>
      </div>
    </div>
    <!-- Search model end -->

    <!-- Js Plugins -->
    <script src="{{ asset('anime/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('anime/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('anime/js/player.js') }}"></script>
    <script src="{{ asset('anime/js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('anime/js/mixitup.min.js') }}"></script>
    <script src="{{ asset('anime/js/jquery.slicknav.js') }}"></script>
    <script src="{{ asset('anime/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('anime/js/main.js') }}"></script>
    {{-- <script src="https://kit.fontawesome.com/8eb93ea7f8.js" crossorigin="anonymous"></script> --}}
  </body>
</html>
