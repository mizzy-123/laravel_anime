<header class="header">
    <div class="container">
      <div class="row">
        <div class="col-lg-2">
          <div class="header__logo">
            <a href="/">
              <h3 class="text-white"><span class="text-white">Tito</span><span class="text-danger">nime</span></h3>
            </a>
          </div>
        </div>
        <div class="col-lg-8">
          <div class="header__nav">
            <nav class="header__menu mobile-menu">
              <ul>
                <li class="{{ Request::is('/') || Request::is('show') ? 'active' : '' }}"><a href="/">Homepage</a></li>
                <li>
                  <a href="#">Categories <span class="arrow_carrot-down"></span></a>
                  <ul class="dropdown">
                    @php
                        use App\Models\Category;
                        $categories = Category::all();
                    @endphp
                    @foreach ($categories as $c)
                      <li><a href="/show?category={{ $c->name }}">{{ $c->name }}</a></li>
                    @endforeach
                  </ul>
                </li>
                <li class="{{ Request::is('anime-genre') ? 'active' : '' }}"><a href="/anime-genre">Genres</a></li>
                <li class="{{ Request::is('anime-list') ? 'active' : '' }}"><a href="/anime-list">Anime List</a></li>
              </ul>
            </nav>
          </div>
        </div>
        <div class="col-lg-2">
          <div class="header__right">
            <a href="#" class="search-switch"><span class="icon_search"></span></a>
            @auth
            <a href="/dashboard">{{ auth()->user()->name }}</a>
            @else
            <a href="/login"><span class="icon_profile"></span></a>
            @endauth
          </div>
        </div>
      </div>
      <div id="mobile-menu-wrap"></div>
    </div>
  </header>