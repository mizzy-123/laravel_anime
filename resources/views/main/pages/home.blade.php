@extends('main.layouts.main')

@section('title', 'Home')

@push('style')
  <style>
    .shadow-text {
      text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
      background-color: rgba(0, 0, 0, 0.5);
      color: white;
      padding: 2px;
    }
  </style>
@endpush

@section('container')

<!-- Hero Section Begin -->
<section class="hero">
    <div class="container">
      <div class="hero__slider owl-carousel">
        @foreach ($carousel as $c)
        <div class="hero__items set-bg" data-setbg="{{ asset('image/'.$c->gambarV) }}">
          <div class="row">
            <div class="col-lg-6">
              <div class="hero__text">
                @foreach ($c->genre()->get() as $g)
                <div class="label"><a href="/show?genre={{ $g->name }}" class="text-decoration-none text-danger">{{ $g->name }}</a></div>
                @endforeach
                <div class="text-white">
                  <h2 class="shadow-text">{{ $c->title }}</h2>
                  <p class="shadow-text">{{ $c->excerpt }}</p>
                </div>
                <a href="/show/detail/{{ $c->slug }}"><span>Download Now</span> <i class="fa fa-angle-right"></i></a>
              </div>
            </div>
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </section>
  <!-- Hero Section End -->

  <!-- Product Section Begin -->
  <section class="product spad">
    <div class="container">
      <div class="row">
        <div class="col-lg-8">

          <div class="recent__product">
            <div class="row">
              <div class="col-lg-8 col-md-8 col-sm-8">
                <div class="section-title">
                  <h4>Baru baru ini ditambahkan</h4>
                </div>
              </div>
              <div class="col-lg-4 col-md-4 col-sm-4">
                {{-- <div class="btn__all">
                  <a href="#" class="primary-btn">View All <span class="arrow_right"></span></a>
                </div> --}}
              </div>
            </div>
            <div class="row">
              @foreach ($newPosts as $new)
              <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="product__item">
                  <a href="/show/detail/{{ $new->slug }}">
                    <div class="product__item__pic set-bg" data-setbg="{{ asset('image/'.$new->gambar) }}">
                      <div class="ep">Total eps: {{ $new->jum_episodes  }}</div>
                      <div class="comment">{{ $new->created_at->diffForHumans() }}</div>
                      <div class="view"><i class="fa fa-eye"></i> {{ $new->views()->first()->views }}</div>
                    </div>
                  </a>
                  <div class="product__item__text">
                    <ul>
                      @foreach ($new->genre()->get() as $g)
                      <li><a href="/show?genre={{ $g->name }}" class="text-decoration-none text-white">{{ $g->name }}</a></li>
                      @endforeach
                    </ul>
                    <h5><a href="/show/detail/{{ $new->slug }}">{{ $new->title }}</a></h5>
                  </div>
                </div>
              </div>
              @endforeach
            </div>
          </div>

          <div class="trending__product">
            <div class="row">
              <div class="col-lg-8 col-md-8 col-sm-8">
                <div class="section-title">
                  <h4>Semua anime</h4>
                </div>
              </div>
              <div class="col-lg-4 col-md-4 col-sm-4">
                <div class="btn__all">
                  <a href="/show" class="primary-btn">View All <span class="arrow_right"></span></a>
                </div>
              </div>
            </div>
            <div class="row">
              @foreach ($posts as $p)
              <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="product__item">
                  <a href="/show/detail/{{ $p->slug }}">
                    <div class="product__item__pic set-bg" data-setbg="{{ asset('image/'.$p->gambar) }}">
                      <div class="ep">Total eps: {{ $p->jum_episodes }}</div>
                      <div class="comment">{{ $p->created_at->diffForHumans() }}</div>
                      <div class="view"><i class="fa fa-eye"></i> {{ $p->views()->first()->views }}</div>
                    </div>
                  </a>
                  <div class="product__item__text">
                    <ul>
                      @foreach ($p->genre()->get() as $g)
                      <li><a href="/show?genre={{ $g->name }}" class="text-decoration-none text-white">{{ $g->name }}</a></li>
                      @endforeach
                    </ul>
                    <h5><a href="/show/detail/{{ $p->slug }}">{{ $p->title }}</a></h5>
                  </div>
                </div>
              </div>
              @endforeach
            </div>
          </div>
          

        </div>
        <div class="col-lg-4 col-md-6 col-sm-8">
          <div class="product__sidebar">
            <div class="product__sidebar__view">
              <div class="section-title">
                <h5>Top Views</h5>
              </div>
              {{-- <ul class="filter__controls">
                <li class="active" data-filter="*">Day</li>
                <li data-filter=".week">Week</li>
                <li data-filter=".month">Month</li>
                <li data-filter=".years">Years</li>
              </ul> --}}
              <div class="filter__gallery">
                @foreach ($topViews as $t)
                <a href="/show/detail/{{ $t->slug }}">
                  <div class="product__sidebar__view__item set-bg mix day years" data-setbg="{{ asset('image/'.$t->gambarV) }}">
                    <div class="ep">Total eps: {{ $t->jum_episodes }}</div>
                    <div class="view"><i class="fa fa-eye"></i> {{ $t->views()->first()->views }}</div>
                    <h5 class="shadow-text text-white">{{ $t->title }}</h5>
                  </div>
                </a>
                @endforeach
                {{-- <div class="product__sidebar__view__item set-bg mix day years" data-setbg="img/sidebar/tv-1.jpg">
                  <div class="ep">18 / ?</div>
                  <div class="view"><i class="fa fa-eye"></i> 9141</div>
                  <h5><a href="#">Boruto: Naruto next generations</a></h5>
                </div>
                <div class="product__sidebar__view__item set-bg mix month week" data-setbg="img/sidebar/tv-2.jpg">
                  <div class="ep">18 / ?</div>
                  <div class="view"><i class="fa fa-eye"></i> 9141</div>
                  <h5><a href="#">The Seven Deadly Sins: Wrath of the Gods</a></h5>
                </div>
                <div class="product__sidebar__view__item set-bg mix week years" data-setbg="img/sidebar/tv-3.jpg">
                  <div class="ep">18 / ?</div>
                  <div class="view"><i class="fa fa-eye"></i> 9141</div>
                  <h5><a href="#">Sword art online alicization war of underworld</a></h5>
                </div>
                <div class="product__sidebar__view__item set-bg mix years month" data-setbg="img/sidebar/tv-4.jpg">
                  <div class="ep">18 / ?</div>
                  <div class="view"><i class="fa fa-eye"></i> 9141</div>
                  <h5><a href="#">Fate/stay night: Heaven's Feel I. presage flower</a></h5>
                </div>
                <div class="product__sidebar__view__item set-bg mix day" data-setbg="img/sidebar/tv-5.jpg">
                  <div class="ep">18 / ?</div>
                  <div class="view"><i class="fa fa-eye"></i> 9141</div>
                  <h5><a href="#">Fate stay night unlimited blade works</a></h5>
                </div> --}}
              </div>
            </div>
            <div class="product__sidebar__comment">
              <div class="section-title">
                  <h5>New Comment</h5>
              </div>
              @foreach ($newComment as $new)
              @if ($new->comments()->count() > 0)
              <div class="product__sidebar__comment__item">
                  <div class="product__sidebar__comment__item__pic">
                      <img src="{{ asset('image/'.$new->gambar) }}" alt="" width="90px" height="130px">
                  </div>
                  <div class="product__sidebar__comment__item__text">
                      <ul>
                          @foreach ($new->genre()->get() as $g)
                          <li class="text-white"><a href="/show?genre={{ $g->name }}" class="text-decoration-none">{{ $g->name }}</a></li>
                          @endforeach
                      </ul>
                      <h5><a href="/show/detail/{{ $new->slug }}">{{ $new->title }}</a></h5>
                      <span class="comment"><i class="fa fa-comments"></i> {{ $new->comments()->count() }}</span>
                  </div>
              </div>
              @endif
              @endforeach
          </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Product Section End -->

  
    
@endsection