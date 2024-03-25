@extends('main.layouts.main')

@section('title', 'anime-genres')

@section('container')
@php
    $array_h = ["A", "B", "C", "D", "F", "G", "H", "I", "J", "K", "L", "M", "N", "O", "P", "Q", "R", "S", "T", "U", "V", "W", "X", "Z"];
@endphp

<section class="anime-details spad">
    <div class="container">
        <div class="anime__details__content">
            <div class="row" style="font-size: 13px;">
                @foreach ($array_h as $a)
                    @php
                        $cek = false;
                    @endphp
    
                    @foreach ($genres as $z)
                        @if ($a == strtoupper(substr($z->name, 0, 1)))
                            @php
                                $cek = true;
                            @endphp
                        @endif
                    @endforeach
    
                    @if ($cek)
                        <div class="col-6 mt-4 text-white">
                            <h6>{{ $a }}</h6>
                            <hr class="my-1 bg-white">
    
                            @foreach ($genres as $x)
                                @if ($a == strtoupper(substr($x->name, 0, 1)))
                                        <div class="p-3 col-3">
                                            <a href="/show?genre={{ $x->name }}" class="text-decoration-none">{{ $x->name }}</a>
                                        </div>
                                @endif
                            @endforeach
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
</section>
@endsection
