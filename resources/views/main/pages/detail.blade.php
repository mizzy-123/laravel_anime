@extends('main.layouts.main')

@section('title', 'Detail')

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
                    <a href="/show">Show</a>
                    <span>{{ $post->title }}</span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb End -->

<!-- Anime Section Begin -->
<section class="anime-details spad">
    <div class="container">
        <div class="anime__details__content">
            <div class="row">
                <div class="col-lg-3">
                    <div class="anime__details__pic set-bg" data-setbg="{{ asset('image/'.$post->gambar) }}">
                        {{-- <div class="comment"><i class="fa fa-comments"></i> 11</div> --}}
                        <div class="comment">{{ $post->created_at->diffForHumans() }}</div>
                        <div class="view"><i class="fa fa-eye"></i> {{ $post->views()->first()->views }}</div>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="anime__details__text">
                        <div class="anime__details__title">
                            <h3>{{ $post->title }}</h3>
                            {{-- <span>フェイト／ステイナイト, Feito／sutei naito</span> --}}
                        </div>
                        {{-- <div class="anime__details__rating">
                            <div class="rating">
                                <a href="#"><i class="fa fa-star"></i></a>
                                <a href="#"><i class="fa fa-star"></i></a>
                                <a href="#"><i class="fa fa-star"></i></a>
                                <a href="#"><i class="fa fa-star"></i></a>
                                <a href="#"><i class="fa fa-star-half-o"></i></a>
                            </div>
                            <span>1.029 Votes</span>
                        </div> --}}
                        <p>{!! $post->sinopsis !!}</p>
                        <div class="anime__details__widget">
                            <div class="row">
                                <div class="col-lg-12 col-md-12">
                                    <ul>
                                        <li><span>Type:</span> {{ $post->category()->first()->name }}</li>
                                        {{-- <li><span>Studios:</span> Lerche</li> --}}
                                        {{-- <li><span>Date aired:</span> Oct 02, 2019 to ?</li> --}}
                                        {{-- <li><span>Status:</span> Airing</li> --}}
                                        <li><span>Genre:</span> @foreach ($post->genre()->get() as $g)
                                            {{ $g->name }}
                                            @if ($loop->last)
                                                
                                            @else
                                                , 
                                            @endif
                                        @endforeach</li>
                                        <li><span>Duration:</span> {{ $post->durasi }}</li>
                                        <li><span>Views:</span> {{ $post->views()->first()->views }}</li>
                                    </ul>
                                </div>
                                {{-- <div class="col-lg-6 col-md-6">
                                    <ul>
                                        <li><span>Scores:</span> 7.31 / 1,515</li>
                                        <li><span>Rating:</span> 8.5 / 161 times</li>
                                        <li><span>Duration:</span> 24 min/ep</li>
                                        <li><span>Quality:</span> HD</li>
                                        <li><span>Views:</span> 131,541</li>
                                    </ul>
                                </div> --}}
                            </div>
                        </div>
                        <div class="anime__details__btn">
                            {{-- <a href="#" class="follow-btn"><i class="fa fa-heart-o"></i> Follow</a> --}}
                            <a href="{{ $post->link }}" class="watch-btn" target="_blank"><span>Download Now</span> <i
                                class="fa fa-angle-right"></i></a>
                            @auth
                                <a href="/tambah-anime" class="watch-btn"><span>Create new post</span></a>
                                <a href="/edit-anime/{{ $post->slug }}" class="watch-btn"><span>Edit post</span></a>
                                <a href="/delete-anime/{{ $post->slug }}" class="watch-btn"><span>Delete post</span></a>
                            @endauth
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 col-md-8">
                    <div class="anime__details__review">
                        <div class="section-title">
                            <h5>Reviews</h5>
                        </div>
                        @foreach ($post->comments()->get() as $c)
                            @if ($c->akses == 1)
                            <div class="anime__review__item">
                                {{-- <div class="anime__review__item__pic">
                                    <img src="img/anime/review-1.jpg" alt="">
                                </div> --}}
                                <div class="anime__review__item__text">
                                    <h6> {{ $c->name }} <svg width="15" height="15" viewBox="0 0 24 24">
                                        <svg id="Layer_1" style="enable-background:new 0 0 128 128;" version="1.1" viewBox="0 0 128 128" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><style type="text/css">
                                            .st0{fill:#0004f7;}
                                            .st1{fill:#FFFFFF;}
                                        </style><g><circle class="st0" cx="64" cy="64" r="64"/></g><g><path class="st1" d="M54.3,97.2L24.8,67.7c-0.4-0.4-0.4-1,0-1.4l8.5-8.5c0.4-0.4,1-0.4,1.4,0L55,78.1l38.2-38.2   c0.4-0.4,1-0.4,1.4,0l8.5,8.5c0.4,0.4,0.4,1,0,1.4L55.7,97.2C55.3,97.6,54.7,97.6,54.3,97.2z"/></g></svg>
                                      </svg> - <span>{{ $c->created_at->diffForHumans() }}</span> @auth <a href="/comment/{{ $c->id }}" class="mx-3 text-danger">Delete comment</a> @endauth</h6>
                                    <p>{{ $c->comment }}</p>
                                    
                                </div>
                            </div>
                            @else
                            <div class="anime__review__item">
                                <div class="anime__review__item__text">
                                    <h6>{{ $c->name }} - <span>{{ $c->created_at->diffForHumans() }}</span> @auth <a href="/comment/{{ $c->id }}" class="mx-3 text-danger">Delete comment</a> @endauth </h6>
                                    <p>{{ $c->comment }}</p>
                                </div>
                            </div>
                            @endif
                        @endforeach
                    </div>
                    @auth
                    <div class="anime__details__form">
                        <div class="section-title">
                            <h5>Your Comment</h5>
                        </div>
                        <form action="/comment/{{ $post->slug }}" method="POST">
                            @csrf
                            <input type="hidden" name="name" value="{{ auth()->user()->name }}">
                            {{-- <input type="text" class="text-dark" name="name" placeholder="Your Comment"> --}}
                            <textarea placeholder="Your Comment" class="text-dark" name="comment" required></textarea>
                            <button type="submit"><i class="fa fa-location-arrow"></i> Review</button>
                        </form>
                    </div>
                    @else
                    <div class="anime__details__form">
                        <div class="section-title">
                            <h5>Your Comment</h5>
                        </div>
                        <form action="/comment/{{ $post->slug }}" method="POST">
                            @csrf
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="Your Name" name="name" required>
                            </div>
                            {{-- <input type="text" class="text-dark" name="name" placeholder="Your Comment"> --}}
                            <textarea placeholder="Your Comment" class="text-dark" name="comment" required></textarea>
                            <button type="submit"><i class="fa fa-location-arrow"></i> Review</button>
                        </form>
                    </div>
                    @endauth
                </div>
                <div class="col-lg-4 col-md-4 mt-3">
                    <div class="anime__details__sidebar">
                        <div class="section-title">
                            <h5>you might like...</h5>
                        </div>
                        @foreach ($side as $s)
                        <a href="/show/detail/{{ $s->slug }}">
                            <div class="product__sidebar__view__item set-bg" data-setbg="{{ asset('image/'.$s->gambarV) }}">
                                <div class="ep">Total eps: {{ $s->jum_episodes }}</div>
                                <div class="view"><i class="fa fa-eye"></i> {{ $s->views()->first()->views }}</div>
                                <h5 class="shadow-text text-white">{{ $s->title }}</h5>
                            </div>
                        </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
</section>
<!-- Anime Section End -->
@endsection