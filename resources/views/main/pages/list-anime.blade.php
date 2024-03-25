@extends('main.layouts.main')

@section('title', 'anime-lists')

@section('container')
@php
    $array_h = ["A", "B", "C", "D", "F", "G", "H", "I", "J", "K", "L", "M", "N", "O", "P", "Q", "R", "S", "T", "U", "V", "W", "X", "Z"];
@endphp

<section class="anime-details spad">
    <div class="container">
        <div class="anime__details__content">
            
                @foreach ($array_h as $a)
                    @php
                        $cek = false;
                    @endphp
    
                    @foreach ($posts as $z)
                        @if ($a == strtoupper(substr($z->title, 0, 1)))
                            @php
                                $cek = true;
                            @endphp
                        @endif
                    @endforeach
    
                    @if ($cek)
                        
                            <h6 class="text-white">{{ $a }}</h6>
                            <hr class="my-1 bg-white">
                            <div class="row mb-3" style="font-size: 13px;">
    
                            @foreach ($posts as $x)
                                @if ($a == strtoupper(substr($x->title, 0, 1)))
                                <div class="col-3 mt-4 text-white">
                                        <div class="p-3">
                                            <a href="tampil.php?judul={{ $x->title }}" class="text-decoration-none">{{ $x->title }}</a>
                                        </div>
                                </div>
                                @endif
                            @endforeach
                            </div>
                        
                    @endif
                @endforeach
            
        </div>
    </div>
</section>
@endsection





