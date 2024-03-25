@extends('main.layouts.main')

@section('title', 'Login')

@section('container')

<!-- Normal Breadcrumb Begin -->
<section class="normal-breadcrumb set-bg" data-setbg="{{ asset('image/gambar-anime/704387.png') }}">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="normal__breadcrumb__text">
                    <h2>Login</h2>
                    <p>Welcome to the admin official Anime blog.</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Normal Breadcrumb End -->

<!-- Login Section Begin -->
<section class="login spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="login__form">
                    <h3>Login</h3>
                    <form action="/login" method="POST">
                        @csrf
                        <div class="input__item">
                            <input type="text" placeholder="Email address" name="email" class="text-dark">
                            <span class="icon_mail"></span>
                        </div>
                        <div class="input__item">
                            <input type="password" placeholder="Password" name="password" class="text-dark">
                            <span class="icon_lock"></span>
                        </div>
                        <button type="submit" class="site-btn">Login Now</button>
                    </form>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="login__register">
                    <h3>Login as admin</h3>
                    <p class="text-white">This page login only for admin Titonime official blog</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Login Section End -->
    
@endsection