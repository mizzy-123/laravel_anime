@extends('main.layouts.main')

@section('title', 'Show-all')

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

<!-- Breadcrumb Begin -->
<div class="breadcrumb-option">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb__links">
                    <a href="/"><i class="fa fa-home"></i> Home</a>
                    <a href="#">Show</a>
                    <span>
                        @if (request('category'))
                        {{ request('category') }}

                        @elseif (request('genre'))
                        {{ request('genre') }}
                        @else
                        All
                        @endif
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb End -->

<!-- Product Section Begin -->
<section class="product-page spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="product__page__content">
                    <div class="product__page__title">
                        <div class="row">
                            <div class="col-lg-8 col-md-8 col-sm-6">
                                <div class="section-title">
                                    <h4>
                                        @if (request('category'))
                                        {{ request('category') }}

                                        @elseif (request('genre'))
                                        {{ request('genre') }}
                                        @else
                                        All
                                        @endif
                                    </h4>
                                </div>
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
                                        <div class="comment"> {{ $p->created_at->diffForHumans() }}</div>
                                        <div class="view"><i class="fa fa-eye"></i> {{ $p->views()->first()->views }}</div>
                                    </div>
                                </a>
                                <div class="product__item__text">
                                    <ul>
                                        @foreach ($p->genre()->get() as $g)
                                        <li class="text-white"><a href="/show?genre={{ $g->name }}" class="text-decoration-none">{{ $g->name }}</a></li>
                                        @endforeach
                                    </ul>
                                    <h5><a href="/show/detail/{{ $p->slug }}">{{ $p->title }}</a></h5>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="product__pagination">
                    {{ $posts->links('vendor.pagination.custom') }}
                </div>

            </div>
            <div class="col-lg-4 col-md-6 col-sm-8">
                <div class="product__sidebar">
                    <div class="product__sidebar__view">
                        <div class="section-title">
                            <h5>Top Views</h5>
                        </div>
                        {{-- <ul class="filter__controls">
                            <li class="active" data-filter="*">Week</li>
                        </ul> --}}
                        <div class="filter__gallery">
                            @foreach ($topViews as $p)
                                <a href="/show/detail/{{ $p->slug }}">
                                    <div class="product__sidebar__view__item set-bg mix day" data-setbg="{{ asset('image/'.$p->gambarV) }}">
                                        <div class="ep">Total eps: {{ $p->jum_episodes }}</div>
                                        <div class="view"><i class="fa fa-eye"></i> {{ $p->views()->first()->views }}</div>
                                        <h5 class="shadow-text text-white">{{ $p->title }}</h5>
                                    </div>
                                </a>
                            @endforeach
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
                                <h5 class="text-white"><a href="/show/detail/{{ $new->slug }}">{{ $new->title }}</a></h5>
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