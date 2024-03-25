@extends('dashboard.layouts.app')

@section('title', 'General Dashboard')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet"
        href="{{ asset('library/jqvmap/dist/jqvmap.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('library/summernote/dist/summernote-bs4.min.css') }}">
        <link rel="stylesheet" href="{{ asset('anime/css/bootstrap.min.css') }}" type="text/css" />
        <link rel="stylesheet" href="{{ asset('anime/css/font-awesome.min.css') }}" type="text/css" />
        <link rel="stylesheet" href="{{ asset('anime/css/elegant-icons.css') }}" type="text/css" />
        <link rel="stylesheet" href="{{ asset('anime/css/plyr.css') }}" type="text/css" />
        <link rel="stylesheet" href="{{ asset('anime/css/nice-select.css') }}" type="text/css" />
        <link rel="stylesheet" href="{{ asset('anime/css/owl.carousel.min.css') }}" type="text/css" />
        <link rel="stylesheet" href="{{ asset('anime/css/slicknav.min.css') }}" type="text/css" />
        <link rel="stylesheet" href="{{ asset('anime/css/style.css') }}" type="text/css" />
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Dashboard</h1>
            </div>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-12 col-sm-12">
                    <div class="card">
                        <div class="card-body">

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
                                            <div class="col-lg-6 col-md-6">
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
                                            <div class="col-lg-6 col-md-6">
                                                {{-- <ul>
                                                    <li><span>Scores:</span> 7.31 / 1,515</li>
                                                    <li><span>Rating:</span> 8.5 / 161 times</li>
                                                    <li><span>Duration:</span> 24 min/ep</li>
                                                    <li><span>Quality:</span> HD</li>
                                                    <li><span>Views:</span> 131,541</li>
                                                </ul> --}}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="anime__details__btn">
                                        {{-- <a href="#" class="follow-btn"><i class="fa fa-heart-o"></i> Follow</a> --}}
                                        <a href="{{ $post->link }}" class="watch-btn"><span>Download Now</span> <i
                                            class="fa fa-angle-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraies -->
    <script src="{{ asset('library/simpleweather/jquery.simpleWeather.min.js') }}"></script>
    <script src="{{ asset('library/chart.js/dist/Chart.min.js') }}"></script>
    <script src="{{ asset('library/jqvmap/dist/jquery.vmap.min.js') }}"></script>
    <script src="{{ asset('library/jqvmap/dist/maps/jquery.vmap.world.js') }}"></script>
    <script src="{{ asset('library/summernote/dist/summernote-bs4.min.js') }}"></script>
    <script src="{{ asset('library/chocolat/dist/js/jquery.chocolat.min.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('js/page/index-0.js') }}"></script>

    <script src="{{ asset('anime/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('anime/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('anime/js/player.js') }}"></script>
    <script src="{{ asset('anime/js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('anime/js/mixitup.min.js') }}"></script>
    <script src="{{ asset('anime/js/jquery.slicknav.js') }}"></script>
    <script src="{{ asset('anime/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('anime/js/main.js') }}"></script>
@endpush
